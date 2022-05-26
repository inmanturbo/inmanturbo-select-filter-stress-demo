<?php

namespace App\Http\Livewire;

use App\ColumnData;
use App\DatatableConfig;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GeneralLedger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class VOne extends DataTableComponent
{
    protected $model = GeneralLedger::class;

    public array $columnsMeta = [];
    public array $configMeta = [];

    public function configure(): void
    {
        $config = DatatableConfig::from($this->configMeta);
        $this->setPrimaryKey('id')
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
        return $this->secondaryHeaderSelectFilters();
    }

    protected function secondaryHeaderSelectFilters(){
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
}
