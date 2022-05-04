<?php

namespace App;

use Spatie\LaravelData\Data;

class ColumnData extends Data
{
    public function __construct(
        public string $name,
        public string $label,
        public string $class = '',
        public string $headerClass = '',
        public string $secondaryHeaderClass = '',
        public bool $hasView = false,
        public string $view = '',
        public string $footerClass = '',
        public bool $hasFooterView = false,
        public string $footerView = '',
        public bool $hasSecondaryHeaderView = false,
        public bool $hasSecondaryHeader = false,
        public string $secondaryHeaderView = '',
        public array $options = [],
        public $formatter = null,
        public $hasTotal = false,
    )
    {

    }

    public function hasTotal(): bool
    {
        return $this->hasTotal;
    }

    public function withTotal(): self
    {
        $this->hasTotal = true;

        return $this;
    }

    public function formatter($callback)
    {
        $this->formatter = $callback;

        return $this;
    }

    public function secondaryHeader($callback)
    {
        $this->hasSecondaryHeader = true;
        $this->secondaryHeaderCallback = $callback;

        return $this;
    }

    public function renderSecondaryHeader()
    {
        return isset($this->secondaryHeaderCallback) ? call_user_func($this->secondaryHeaderCallback) : '';
    }

    public function footerCallback($callback)
    {
        $this->hasFooter = true;
        $this->footerCallback = $callback;

        return $this;
    }

    public function renderFooter()
    {
        return isset($this->footerCallback) ? call_user_func($this->footerCallback) : '';
    }

    public function format($value)
    {
        return isset($this->formatter) ? call_user_func($this->formatter, $value) : $value;
    }


    public function options(array $options)
    {
        $this->options = $options;

        return $this;
    }

    public function class($class)
    {
        $this->class = $class;

        return $this;
    }

    public function headerClass($class)
    {
        $this->headerClass = $class;

        return $this;
    }

    public function secondaryHeaderClass($class)
    {
        $this->secondaryHeaderClass = $class;

        return $this;
    }

    public function footerClass($class)
    {
        $this->footerClass = $class;

        return $this;
    }

    public function view(string $view): self
    {
        $this->hasView = true;
        $this->view = $view;

        return $this;
    }

    public function footerView(string $view): self
    {
        $this->hasFooterView = true;
        $this->footerView = $view;

        return $this;
    }

    public function secondaryHeaderView(string $view): self
    {
        $this->hasSecondaryHeaderView = true;
        $this->hasSecondaryHeader = true;
        $this->secondaryHeaderView = $view;

        return $this;
    }
}