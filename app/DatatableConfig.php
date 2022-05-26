<?php

namespace App;

use Spatie\LaravelData\Data;

class DatatableConfig extends Data
{
    public function __construct(
        public string $tableClass = '',
        public string $tBodyClass = '',
        public string $evenTrClass = '',
        public string $oddTrClass = '',
    ) {
    }

    public function evenClass($evenClass): self
    {
        $this->evenTrClass = $evenClass;

        return $this;
    }

    public function oddClass($oddClass): self
    {
        $this->oddTrClass = $oddClass;

        return $this;
    }

    public function tableClass($tableClass): self
    {
        $this->tableClass = $tableClass;

        return $this;
    }

    public function getTableClass(): string
    {
        return $this->tableClass;
    }

    public function tBodyClass($tBodyClass): self
    {
        $this->tBodyClass = $tBodyClass;

        return $this;
    }

    public function getTBodyClass(): string
    {
        return $this->tBodyClass;
    }

    public function getTrClass($index)
    {
        return $index % 2 === 0 ? $this->evenTrClass : $this->oddTrClass;
    }
} 