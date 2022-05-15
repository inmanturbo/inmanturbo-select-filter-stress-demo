<?php

namespace App;

use Spatie\LaravelData\Data;

class RowData extends Data
{
    public function __construct(
        public string $evenClass = '',
        public string $oddClass = '',
    ) {
    }

    public function evenClass($evenClass): self
    {
        $this->evenClass = $evenClass;

        return $this;
    }

    public function oddClass($oddClass): self
    {
        $this->oddClass = $oddClass;

        return $this;
    }

    /**
     * methods below this comment block
     * will go into an interface
     *
     */

     /**
      * the following methods take in callbacks and
      * can be used to modify the data
      * they are only usable from within the livewire component
      * after the columnData objects have been unserialized
      */

    public function classCallback($callback)
    {
        $this->classCallback = $callback;

        return $this;
    }

    public function getClass($index, $rowData)
    {
        if(isset($this->classCallback)) {
            return call_user_func($this->classCallback, $index, $rowData, $this);
        }

        return $index % 2 === 0 ? $this->evenClass : $this->oddClass;
    }
}
