<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class MyTable extends Component
{
    use WithPagination;

    public $state = [];

    public $search;

    public $model;

    public $columns;

    protected $listeners = [
        'setFilter' => 'setFilter',
    ];

    public function mount($columns, $model)
    {
        $this->model = $model;

        $this->columns = $columns;

        $this->state = [
            'search' => null,
            'columns' => $columns,
            'rows' => [],
            'filters' => [],
        ];
    }

    public function setFilter($filter, $value = '')
    {
        $this->resetPage();
        if(strlen($value) > 0) {
            $this->state['filters'][$filter] = $value;
        } elseif(isset($this->state['filters'][$filter])) {
            unset($this->state['filters'][$filter]);
        }
    }

    public function updatedStateSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = $this->model::query();

        if($this->state['search']) {
            $query->where($this->columns[0]['name'], 'like', '%'.$this->state['search'].'%');
            foreach($this->columns as $column) {
                if($column['name'] != $this->columns[0]['name']) {
                    $query->orWhere($column['name'], 'like', '%'.$this->state['search'].'%');
                }
            }
        }
        

        if(count($this->state['filters']) > 0) {
            foreach ($this->state['filters'] as $key => $value) {
                $query->where($key, $value);
            }
        }

        $this->state['rows'] = ($paginator = $query->paginate(10))->toArray();

        return view('livewire.my-table', compact('paginator'));
    }
}
