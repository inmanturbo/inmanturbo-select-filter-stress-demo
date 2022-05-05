<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GeneralLedger;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class GeneralLedgerTable extends DataTableComponent
{
    protected $model = GeneralLedger::class;

    public $columnsWithSelectFilter = [
        'year',
        'month',
        'date',
        'department',
        'account_holder',
        'status',
        'transaction_type',
        'check_number',
        'payee',
        'transaction_id',
        'project',
        'reference_number',
        'division',
        'account',
        'memo',
    ];

    public $displayedColumns = [
        'year',
        'month',
        'date',
        'department',
        'account_holder',
        'status',
        'transaction_type',
        'check_number',
        'payee',
        'transaction_id',
        'project',
        'reference_number',
        'division',
        'account',
        'memo',
        'debit',
        'credit',
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setFiltersVisibilityStatus(false);
        $this->setPerPageAccepted([10, 25, 50, 100, 1000]);
        // Takes a callback that gives you the current column.
        $this->setThAttributes(function (Column $column) {
            if ($column->isField('debit') || $column->isField('credit')) {
                return [
                    'class' => 'text-right tx-sm whitespace-nowrap',
                    'default' => false,
                ];
            }

            return [
                'class' => 'text-left tx-sm whitespace-nowrap',
                'default' => false,
            ];
        });

        // Takes a callback that gives you the current column.
        $this->setThSortButtonAttributes(function (Column $column) {
            if ($column->isField('debit') || $column->isField('credit')) {
                return [
                    'class' => 'text-right tx-sm whitespace-nowrap',
                    'default' => false,
                ];
            }

                return [
                    'class' => 'text-left tx-sm whitespace-nowrap',
                    'default' => false,
                ];
        });

        $this->setTrAttributes(function ($row, $index) {
            if ($index % 2 === 0) {
                return [
                    'default' => false,
                    'class' => 'bg-gray-50',
                ];
            }
      
            return ['default' => false];
        });

        // Takes a callback that gives you the current column, row, column index, and row index
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('debit')) {
                return [
                    'class' => 'text-right text-xs whitespace-nowrap text-red-500',
                    'default' => false,
                ];
            }

            if ($column->isField('credit')) {
                return [
                    'class' => 'text-right text-xs whitespace-nowrap text-blue-500',
                    'default' => false,
                ];
            }

            return [
                'class' => 'p-0.5 text-left text-xs whitespace-nowrap',
                'default' => false,
            ];
        });

        $this->setSecondaryHeaderTrAttributes(function ($rows) {
            return [
                'default' => false,
                'class' => '',
            ];
        });

        $this->setSecondaryHeaderTdAttributes(function (Column $column, $rows) {
            if ($column->isField('debit')) {
                return [
                    'class' => 'text-right text-xs whitespace-nowrap text-red-500',
                    'default' => false,
                ];
            }

            if ($column->isField('credit')) {
                return [
                    'class' => 'text-right text-xs whitespace-nowrap text-blue-500',
                    'default' => false,
                ];
            }

            return [
                'class' => 'text-left text-xs whitespace-nowrap p-0.5',
                'default' => false,
            ];
        });

        $this->setFooterTdAttributes(function (Column $column, $rows) {
            if ($column->isField('debit')) {
                return [
                    'class' => 'text-red-500 text-xs w-1 px-0.5 text-right',
                    'default' => false,
                ];
            } elseif ($column->isField('credit')) {
                return [
                    'class' => 'text-indigo-500 text-xs w-1 px-0.5 text-right',
                    'default' => false,
                ];
            }

            return [
                'class' => '',
                'default' => false,
            ];
        });
    }

    public function filters(): array
    {
        $filters = [];
        foreach ($this->columnsWithSelectFilter as $column) {
            $config = $this->columnConfig($column);
            $filters[$column] = SelectFilter::make($config['label'], $column)
                ->options($config['options'])
                ->filter(function (Builder $builder, string $value) use ($column) {
                    if ($value) {
                        $builder->where($column, $value);
                    }
                });
        }
        $filters['date_from'] =  DateFilter::make('Verified From')
        ->filter(function (Builder $builder, string $value) {
            if ($value) {
                $builder->where('date', '>=', $value);
            }
        });
        return $filters;
    }

    public function columns(): array
    {
        $columns = [];
        foreach ($this->displayedColumns as $column) {
            $config = $this->columnConfig($column);

            $columnObject = Column::make($config['label'], $column);

            if (isset($config['sortable']) && $config['sortable']) {
                $columnObject->sortable();
            }

            if (isset($config['searchable']) && $config['searchable']) {
                $columnObject->searchable();
            }

            if (in_array($column, $this->columnsWithSelectFilter)) {
                $columnObject->secondaryHeader(
                    function () use ($column) {
                            return view('select-filter', [
                                'component' => $this,
                                'filter' => $this->filters()[$column],
                            ]);
                        }
                );
            }

            if ($column == 'debit' || $column == 'credit') {
                $columnObject->footer(function ($rows) use ($column) {
                    return number_format($rows->sum($column), 2);
                })->secondaryHeader(function ($rows) use ($column) {
                    $baseQuery = $this->getRows();
                    if($baseQuery->hasPages()){
                        $baseQuery = $this->baseQuery()->offset(-1)->limit(-1);
                    }
                    return number_format($baseQuery->sum($column), 2);
                });
            }


            $columns[] = $columnObject;
        }
        return $columns;
    }

    protected function columnConfig($column): array
    {
        $configs = [
            'year' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Year',
                'options' => include(base_path('bootstrap/cache/year.php'))
            ],
            'month' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Month',
                'options' => include(base_path('bootstrap/cache/month.php'))
            ],
            'date' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Date',
                'options' => include(base_path('bootstrap/cache/date.php'))
            ],
            'department' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Department',
                'options' => include(base_path('bootstrap/cache/department.php'))
            ],
            'account_holder' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Account Holder',
                'options' => include(base_path('bootstrap/cache/account_holder.php'))
            ],
            'status' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Status',
                'options' => include(base_path('bootstrap/cache/status.php'))
            ],
            'transaction_type' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Transaction Type',
                'options' => include(base_path('bootstrap/cache/transaction_type.php'))
            ],
            'check_number' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Check NO.',
                'options' => include(base_path('bootstrap/cache/check_number.php'))
            ],
            'payee' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Payee',
                'options' => include(base_path('bootstrap/cache/payee.php'))
            ],
            'transaction_id' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Transaction Id',
                'options' => include(base_path('bootstrap/cache/transaction_id.php'))
            ],
            'credit' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Credit',
                'options' => include(base_path('bootstrap/cache/credit.php'))
            ],
            'debit' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Debit',
                'options' => include(base_path('bootstrap/cache/debit.php'))
            ],
            'project' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Project',
                'options' => include(base_path('bootstrap/cache/project.php'))
            ],
            'reference_number' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Ref NO.',
                'options' => include(base_path('bootstrap/cache/reference_number.php'))
            ],
            'division' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Division',
                'options' => include(base_path('bootstrap/cache/division.php'))
            ],
            'account' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Account',
                'options' => include(base_path('bootstrap/cache/account.php'))
            ],
            'memo' => [
                'searchable' => true,
                // 'sortable' => true,
                'label' => 'Memo',
                'options' => include(base_path('bootstrap/cache/memo.php'))
            ],
        ];

        return $configs[$column];
    }
}
