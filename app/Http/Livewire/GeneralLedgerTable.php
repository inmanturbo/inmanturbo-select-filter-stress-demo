<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GeneralLedger;
use Illuminate\Database\Eloquent\Builder;
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
        return $filters;
    }

    public function columns(): array
    {
        $columns = [];
        foreach($this->displayedColumns as $column) {
            $config = $this->columnConfig($column);

            $columnObject = Column::make($config['label'], $column);

            if(isset($config['sortable']) && $config['sortable']) {
                $columnObject->sortable();
            }

            if(isset($config['searchable']) && $config['searchable']) {
                $columnObject->searchable();
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
                'orderable' => true,
                'label' => 'Year',
                'options' => include(base_path('bootstrap/cache/year.php'))
            ],
            'month' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Month',
                'options' => include(base_path('bootstrap/cache/month.php'))
            ],
            'date' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Date',
                'options' => include(base_path('bootstrap/cache/date.php'))
            ],
            'department' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Department',
                'options' => include(base_path('bootstrap/cache/department.php'))
            ],
            'account_holder' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Account Holder',
                'options' => include(base_path('bootstrap/cache/account_holder.php'))
            ],
            'status' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Status',
                'options' => include(base_path('bootstrap/cache/status.php'))
            ],
            'transaction_type' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Transaction Type',
                'options' => include(base_path('bootstrap/cache/transaction_type.php'))
            ],
            'check_number' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Check NO.',
                'options' => include(base_path('bootstrap/cache/check_number.php'))
            ],
            'payee' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Payee',
                'options' => include(base_path('bootstrap/cache/payee.php'))
            ],
            'transaction_id' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Transaction Id',
                'options' => include(base_path('bootstrap/cache/transaction_id.php'))
            ],
            'credit' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Credit',
                'options' => include(base_path('bootstrap/cache/credit.php'))
            ],
            'debit' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Debit',
                'options' => include(base_path('bootstrap/cache/debit.php'))
            ],
            'project' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Project',
                'options' => include(base_path('bootstrap/cache/project.php'))
            ],
            'reference_number' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Ref NO.',
                'options' => include(base_path('bootstrap/cache/reference_number.php'))
            ],
            'division' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Division',
                'options' => include(base_path('bootstrap/cache/division.php'))
            ],
            'account' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Account',
                'options' => include(base_path('bootstrap/cache/account.php'))
            ],
            'memo' => [
                'searchable' => true,
                'orderable' => true,
                'label' => 'Memo',
                'options' => include(base_path('bootstrap/cache/memo.php'))
            ],
        ];

        return $configs[$column];
    }

    
}
