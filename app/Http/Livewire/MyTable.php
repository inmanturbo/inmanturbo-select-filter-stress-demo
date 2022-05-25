<?php

namespace App\Http\Livewire;

use App\ColumnData;
use App\RowData;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MyTable extends Component
{
    use WithPagination;

    public $state;

    public $config;

    public $data = [];

    public $model;

    public $rowData;

    public $columnData;

    protected $listeners = [
        'setFilter' => 'setFilter',
    ];

    /**
     * Set the custom query string array for this specific table
     *
     * @return array|\null[][]
     */
    public function queryString(): array
    {
        if ($this->queryStringIsEnabled()) {
            return [
                'state' => ['except' => null],
                'columns' => ['except' => null],
            ];
        }

        return [];
    }

    public function queryStringIsEnabled(): bool
    {
        return true;
    }

    public function mount($columns, $model, $rowData, $options = [])
    {
        $defaultState = [
            'search' => '',
            'filters' => [],
            'perPage' => 20,
            'dateFrom' => null,
            'dateTo' => null,
            'sort' => [
                'column' => 'id',
                'direction' => 'desc',
            ],
        ];

        $defaultConfig = [
            'columns' => [],
            'perPageOptions' => [20, 10, 100, 500, 1000],
            'class' => 'table-auto',
            'headerClass' => 'bg-gray-50',
            'dateColumn' => null,
        ];

        $this->rowData = $rowData;

        $this->model = $model;

        $this->columnData = $columns;

        $this->state = array_merge($defaultState, $this->state ?? [], $options['state'] ?? []);

        $this->config = array_merge($defaultConfig, $this->config, $options['config'] ?? []);
    }

    public function sortBy($column)
    {
        if (isset($this->state['sort']['column']) && $this->state['sort']['column'] === $column) {
            $this->state['sort']['direction'] = $this->state['sort']['direction'] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->state['sort']['column'] = $column;
            $this->state['sort']['direction'] = 'asc';
        }
    }

    public function clearAll()
    {
        $this->state['search'] = null;
        $this->state['filters'] = [];
        $this->state['sort'] = [
            'column' => 'id',
            'direction' => 'asc',
        ];
        $this->clearDates();
    }

    public function clearDates()
    {
        $this->state['dateFrom'] = null;
        $this->state['dateTo'] = null;
    }

    public function setFilter($filter, $value = '')
    {
        $this->resetPage();
        if (strlen($value) > 0) {
            $this->state['filters'][$filter] = $value;
        } elseif (isset($this->state['filters'][$filter])) {
            unset($this->state['filters'][$filter]);
        }
    }

    public function updatedState()
    {
        $this->resetPage();
    }

    public function columns()
    {
        $columns = [];
        foreach ($this->columnData as $column) {
            $column = ColumnData::from($column);
            if ($column->hasTotal()) {
                $name = $column->getName();
                $column->secondaryHeaderCallback(function () use ($name) {
                    return number_format($this->baseQuery()->sum($name), 2);
                });

                $column->footerCallback(function () use ($name) {
                    return number_format($this->data['rows']->sum($name), 2);
                });

                $column->callback(function ($row, $rows, $column) {
                    return number_format($row->{$column->name}, 2);
                });
            }
            $column->sortable();
            $columns[] = $column;
        }
        return $columns;
    }

    public function row()
    {
        return RowData::from($this->rowData);
    }

    public function processFilters($query)
    {
        if (isset($this->state['filters']) && count($this->state['filters']) > 0) {
            foreach ($this->state['filters'] as $key => $value) {
                if (strlen($value) < 1) {
                    unset($this->state['filters'][$key]);
                    continue;
                }
                $query->where($key, $value);
            }
        }
        return $query;
    }

    public function processDates($query)
    {
        if ($this->config['dateColumn']) {
            if ($this->state['dateFrom'] && $this->state['dateTo']) {
                $query->whereBetween($this->config['dateColumn'], [$this->state['dateFrom'], $this->state['dateTo']]);
            } elseif ($this->state['dateFrom']) {
                $query->where($this->config['dateColumn'], '>=', $this->state['dateFrom']);
            } elseif ($this->state['dateTo']) {
                $query->where($this->config['dateColumn'], '<=', $this->state['dateTo']);
            }
        }
        return $query;
    }

    public function processSearch($query)
    {
        if (isset($this->state['search']) && strlen($this->state['search']) > 0) {
            $query->where(function ($query) {
                $query->where($this->columnData[0]['name'], 'like', '%'.$this->state['search'].'%');
                foreach ($this->columnData as $column) {
                    if ($column['name'] != $this->columnData[0]['name']) {
                        $query->orWhere($column['name'], 'like', '%'.$this->state['search'].'%');
                    }
                }
            });
        }
        return $query;
    }

    public function processSort($query)
    {
        if (isset($this->state['sort']['column']) && isset($this->state['sort']['direction'])) {
            $query->orderBy($this->state['sort']['column'], $this->state['sort']['direction']);
        }
        return $query;
    }

    public function builder()
    {
        return $this->model instanceof \Illuminate\Database\Eloquent\Model ?
        $this->model->getQuery() :
        DB::table($this->model);
    }

    public function baseQuery()
    {
        $query = $this->builder();
        $query = $this->processSearch($query);
        $query = $this->processFilters($query);
        $query = $this->processDates($query);
        $query = $this->processSort($query);
        return $query;
    }

    public function executeQuery()
    {
        return $this->baseQuery()->paginate($this->state['perPage']);
    }

    public function render()
    {
        $this->data['rows'] = ($paginator = $this->executeQuery());

        $columns = $this->columns();

        $row = $this->row();

        return view('livewire.my-table', compact('columns', 'row'));
    }
}
