<?php

namespace App\Http\Livewire\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Restaurant;

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
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Longitude", "longitude")
                ->sortable(),
            Column::make("Latitude", "latitude")
                ->sortable(),
            Column::make("Is available", "is_available")
                ->sortable(),
            Column::make("Is blocked", "is_blocked")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
