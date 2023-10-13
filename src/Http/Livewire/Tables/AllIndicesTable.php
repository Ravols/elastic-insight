<?php

namespace Ravols\ElasticInsight\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AllIndicesTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {

        $this->setPrimaryKey('id');

    }

    public function columns(): array
    {

        return [
            Column::make('ID', 'id')
                ->sortable(),
            Column::make('Name')
                ->sortable(),
        ];

    }
}
