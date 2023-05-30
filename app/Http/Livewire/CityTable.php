<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CityTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    public string $primaryKey = 'city_id';

    protected string $pageName = 'city-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.city.city_name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.city.state_name'), 'state_id')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(State::select('name')
                        ->whereColumn('cities.state_id', 'states.id'),
                        $direction);
                })->searchable(),
            Column::make(__('messages.common.action'))->addClass('w-100px justify-content-center d-flex'),
        ];
    }

    public function query(): Builder
    {
        return City::with('state')->select('cities.*');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.city_table';
    }

    public function render()
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns' => $this->columns(),
                'rowView' => $this->rowView(),
                'filtersView' => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows' => $this->rows,
                'modalsView' => $this->modalsView(),
                'bulkActions' => $this->bulkActions,
                'componentName' => 'sadmin.cities.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'city-table')
    {
        $this->customResetPage($pageName);
    }
}
