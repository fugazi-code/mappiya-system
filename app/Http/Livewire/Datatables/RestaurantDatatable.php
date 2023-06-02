<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Restaurant;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RestaurantDatatable extends DataTableComponent
{
    protected $model = Restaurant::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Acction', 'id')
                ->format(fn ($value) => view('livewire.partials.edit-btn', ['id' => $value]))
                ->sortable()
                ->html(),
            Column::make('Name', 'name')
                ->format(function ($value, $row) {
                    return '<a href="' . route('menu', ['restaurant_id' => $row->id])
                    . "\" class=\"btn btn-link\">{$row->name}</a>";
                })
                ->html()
                ->searchable()
                ->sortable(),
            Column::make('Is available', 'is_available')
                ->sortable(),
            Column::make('Is blocked', 'is_blocked')
                ->sortable(),
            Column::make('Created at', 'created_at')
                ->sortable(),
            Column::make('Updated at', 'updated_at')
                ->sortable(),
        ];
    }
}
