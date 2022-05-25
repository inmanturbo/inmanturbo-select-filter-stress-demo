<?php

namespace App\Http\Livewire;

use App\ColumnData;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GeneralLedger;
use Illuminate\Support\Str;

class VOne extends DataTableComponent
{
    protected $model = GeneralLedger::class;

    public $columnsMeta;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
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

    public function columns(): array
    {
        $columns = [];
        foreach ($this->columnsMeta as $columnMeta) {
            $columnData = ColumnData::from($columnMeta);
            $column = Column::make($columnData->getLabel(), $columnData->getName());
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
