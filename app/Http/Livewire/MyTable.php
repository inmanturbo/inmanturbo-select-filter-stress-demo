<?php

namespace App\Http\Livewire;

use App\ColumnData;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MyTable extends Component
{
    use WithPagination;

    public $state = [];

    public $model;

    public $columnData;

    protected $listeners = [
        'setFilter' => 'setFilter',
    ];

    public function mount($columns, $model, $config = [])
    {
        $this->model = $model;

        $this->columnData = $columns;

        $this->state = [
            'search' => null,
            'columns' => $columns,
            'rows' => [],
            'filters' => [],
            'perPage' => $config['perPage'] ?? 20,
            'perPageOptions' => $config['perPageOptions'] ?? [20, 10, 100, 500, 1000],
            'class' => $config['class'] ?? 'table-auto',
            'headerClass' => $config['headerClass'] ?? 'bg-gray-50',
            'dateFrom' => $config['dateFrom'] ?? null,
            'dateTo' => $config['dateTo'] ?? null,
            'dateColumn' => $config['dateColumn'] ?? 'date',
        ];
    }

    public function clearAll()
    {
        $this->state['search'] = null;
        $this->state['filters'] = [];
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
        $this->render();
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
                    return number_format($this->state['rows']->sum($name), 2);
                });

                $column->callback(function ($row, $rows, $column) {
                    return number_format($row->{$column->name}, 2);
                });

            }
            $columns[] = $column;
        }
        return $columns;
    }

    public function processFilters($query)
    {
        if (count($this->state['filters']) > 0) {
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
        if ($this->state['dateColumn']) {
            if ($this->state['dateFrom'] && $this->state['dateTo']) {
                $query->whereBetween($this->state['dateColumn'], [$this->state['dateFrom'], $this->state['dateTo']]);
            } elseif ($this->state['dateFrom']) {
                $query->where($this->state['dateColumn'], '>=', $this->state['dateFrom']);
            } elseif ($this->state['dateTo']) {
                $query->where($this->state['dateColumn'], '<=', $this->state['dateTo']);
            }
        }
        return $query;
    }

    public function processSearch($query)
    {
        if ($this->state['search']) {
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
        return $query;
    }

    public function executeQuery()
    {
        return $this->baseQuery()->paginate($this->state['perPage']);
    }

    public function render()
    {
        $this->state['rows'] = ($paginator = $this->executeQuery());

        $columns = $this->columns();

        return view('livewire.my-table', compact('columns'));
    }
}
