<?php

namespace App\Http\Livewire;

use App\ColumnData;
use App\DatatableConfig;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GeneralLedger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class VOne extends DataTableComponent
{
    public ?string $modelBaseName = null;

    public array $columnsMeta = [];
    public array $configMeta = [];

    /**
    * The base query.
    */
    public function builder() : Builder
    {
        if (!isset($this->modelBaseName)) {
            return $this->hasModel() ? parent::builder() : abort(404);
        }
        
        $classBaseName = str_replace('_', '', ucwords($this->modelBaseName, '_'));
        $className = 'App\\Models\\' . $classBaseName;

        if (file_exists(base_path('app/Models/' . $classBaseName . '.php')) && class_exists($className)) {
            return (new $className)->query();
        }

        //check if there is a database table with the same name
        if (Schema::hasTable($this->modelBaseName)) {

            $GLOBALS['livewire-tables-database-table-name'] = $this->modelBaseName;

            $model = new class extends \Illuminate\Database\Eloquent\Model {

                public function getTable()
                {
                    return $GLOBALS['livewire-tables-database-table-name'];
                }
            };
          
            return $model->query();
        }

        return abort(404);
    }

    public function configure(): void
    {
        $config = DatatableConfig::from($this->configMeta);
        $this->setPrimaryKey('id')
            ->setPerPage($config->getPerPage())
            ->setPerPageAccepted($config->getPerPageOptions())
            ->setConfigurableAreas($config->getConfigurableAreas())
            ->setTrAttributes(function ($row, $index) use ($config) {
                return [
                    'class' => $config->getTrClass($index),
                    'default' => false,
                ];
            })
            ->setTableAttributes([
                'class' => $config->getTableClass(),
                'default' => false,
            ])->setTbodyAttributes([
                'class' => $config->getTBodyClass(),
                'default' => false,
            ])
            ->setThSortButtonAttributes(function (Column $column) {
                return [
                    'class' => 'flex flex-row font-medium uppercase',
                    'default' => false,
                ];
            })
            ->setThAttributes(function (Column $column) {
                foreach ($this->columnsMeta as $columnMeta) {
                    $columnData = ColumnData::from($columnMeta);
                    if ($column->isField($columnData->getName())) {
                        return [
                            'class' => $columnData->getHeaderClass(),
                            'default' => false,
                        ];
                    }
                }
            })
            ->setFooterTdAttributes(function (Column $column, $rows) {
                foreach ($this->columnsMeta as $columnMeta) {
                    $columnData = ColumnData::from($columnMeta);
                    if ($column->isField($columnData->getName())) {
                        return [
                            'class' => $columnData->getFooterClass(),
                            'default' => false,
                        ];
                    }
                }
            })
            ->setSecondaryHeaderTdAttributes(function (Column $column, $rows) {
                foreach ($this->columnsMeta as $columnMeta) {
                    $columnData = ColumnData::from($columnMeta);
                    if ($column->isField($columnData->getName())) {
                        return [
                            'class' => $columnData->getSecondaryHeaderClass(),
                            'default' => false,
                        ];
                    }
                }
            })
            ->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
                foreach ($this->columnsMeta as $columnMeta) {
                    $columnData = ColumnData::from($columnMeta);
                    if ($column->isField($columnData->getName())) {
                        return [
                            'class' => $columnData->getClass(),
                            'default' => false,
                        ];
                    }
                }
            });
    }

    public function filters(): array
    {
        return array_merge($this->secondaryHeaderSelectFilters(), $this->dateFilters());
    }

    protected function dateFilters(): array
    {
        $dateFilters = [];
        $config = DatatableConfig::from($this->configMeta);
        if ($config->hasDateFilters()) {
            $dateFilters['date_from'] = DateFilter::make('Date From')
                ->filter(function (Builder $builder, string $value) use ($config) {
                    if ($value) {
                        $builder->where($config->getDateColumn(), '>=', $value);
                    }
                });
            $dateFilters['date_to'] = DateFilter::make('Date To')
                ->filter(function (Builder $builder, string $value) use ($config) {
                    if ($value) {
                        $builder->where($config->getDateColumn(), '<=', $value);
                    }
                });
        }

        return $dateFilters;
    }

    protected function secondaryHeaderSelectFilters()
    {
        $filters = [];
        foreach ($this->columnsMeta as $columnMeta) {
            $columnData = ColumnData::from($columnMeta);
            if ($columnData->hasSecondaryHeaderSelect()) {
                $filter = SelectFilter::make($columnData->getLabel(), $columnData->getName())
                    ->options($columnData->getOptions())
                    ->filter(function (Builder $builder, string $value) use ($columnData) {
                        if ($value) {
                            $builder->where($columnData->getName(), $value);
                        }
                    })
                    ->hiddenFromMenus();
                $filters[$columnData->getName()] = $filter;
            }
        }
        return $filters;
    }

    public function boot(): void
    {
        parent::boot();
        $this->setQueryStringAlias(basename(request()->path()) .'-'. $this->getDataTableFingerprint());
    }

    public function columns(): array
    {
        $columns = [];
        foreach ($this->columnsMeta as $columnMeta) {
            $columnData = ColumnData::from($columnMeta);
            $column = Column::make($columnData->getLabel(), $columnData->getName());
            if ($columnData->hasSecondaryHeaderSelect()) {
                $column->secondaryHeader(
                    function () use ($columnData) {
                        return view('livewire-tables.select-filter', [
                                'component' => $this,
                                'filter' => $this->filters()[$columnData->getName()],
                            ]);
                    }
                );
            }
            if ($columnData->isSortable()) {
                $column->sortable();
            }
            if ($columnData->isSearchable()) {
                $column->searchable();
            }
            if ($columnData->hasTotal()) {
                $column->footer(function ($rows) use ($columnData) {
                    return number_format($rows->sum($columnData->getName()), 2);
                })->secondaryHeader(function ($rows) use ($columnData) {
                    $baseQuery = $this->getRows();
                    if ($baseQuery->hasPages()) {
                        $baseQuery = $this->baseQuery()->offset(-1)->limit(-1);
                    }
    
                    return number_format($baseQuery->sum($columnData->getName()), 2);
                })->format(
                    fn ($value, $row, Column $column) => number_format($value ?? 0, 2)
                );
            }
            $columns[] = $column;
        }
        return $columns;
    }

    public function exportPage()
    {
        $selected = $this->selectedColumns;

        $columns = collect($this->columns())->filter(function ($column) use ($selected) {
            return $column->hasField() && in_array($column->getSlug(), $selected);
        });

        $fields = $columns->map(function ($column) {
            return $column->getField();
        })->toArray();

        $headings = $columns->map(function ($column) {
            return $column->getTitle();
        })->toArray();



        $spreadSheet = new class($this->baseQuery()->offset($this->getPerPage() * ($this->page - 1))->limit($this->getPerPage())->get(), $fields, $headings) implements FromCollection, WithMapping, WithHeadings {
            use Exportable;
        
            public $collection;

            public $columns;

            public $headings;
        
            /**
             * UserExport constructor.
             *
             * @param  Builder  $builder
             */
            public function __construct($collection, $columns, $headings)
            {
                $this->collection = $collection;
                $this->columns = $columns;
                $this->headings = $headings;
            }

            public function collection()
            {
                return $this->collection;
            }
        
            /**
             * @return string[]
             */
            public function headings(): array
            {
                return $this->headings;
            }
        
            /**
             * @param  mixed  $row
             *
             * @return array
             */
            public function map($row): array
            {
                $arr = [];
                foreach ($this->columns as $column) {
                    if ($row->{$column} instanceof Carbon) {
                        $arr[] = $row->{$column}->format('m/d/Y');
                    } else {
                        $arr[] = $row->{$column};
                    }
                }

                return $arr;
            }
        };

        return $spreadSheet->download('general-ledger.csv');
    }

    public function exportAll()
    {
        $selected = $this->selectedColumns;

        $columns = collect($this->columns())->filter(function ($column) use ($selected) {
            return $column->hasField() && in_array($column->getSlug(), $selected);
        });

        $fields = $columns->map(function ($column) {
            return $column->getField();
        })->toArray();

        $headings = $columns->map(function ($column) {
            return $column->getTitle();
        })->toArray();

        $query = $this->baseQuery()->offset(-1)->limit(-1);



        $spreadSheet = new class($query, $fields, $headings) implements FromQuery, WithMapping, WithHeadings {
            use Exportable;
        
            public $builder;

            public $columns;

            public $headings;
        
            /**
             * UserExport constructor.
             *
             * @param  Builder  $builder
             */
            public function __construct(Builder $builder, $columns, $headings)
            {
                $this->builder = $builder;
                $this->columns = $columns;
                $this->headings = $headings;
            }

            public function query()
            {
                return $this->builder;
            }
        
            /**
             * @return string[]
             */
            public function headings(): array
            {
                return $this->headings;
            }
        
            /**
             * @param  mixed  $row
             *
             * @return array
             */
            public function map($row): array
            {
                $arr = [];
                foreach ($this->columns as $column) {
                    if ($row->{$column} instanceof Carbon) {
                        $arr[] = $row->{$column}->format('m/d/Y');
                    } else {
                        $arr[] = $row->{$column};
                    }
                }

                return $arr;
            }
        };

        return $spreadSheet->download('general-ledger.csv');
    }

    public function resetTable()
    {
        $this->selectAllColumns();
        $this->clearSearch();
        $this->emit('clearFilters');
        $this->clearSorts();
        $this->resetPage();
    }
}
