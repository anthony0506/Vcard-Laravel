<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class StateTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    public string $primaryKey = 'state_id';

    protected string $pageName = 'state-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.state.state_name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.state.country_name'), 'country_id')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Country::select('name')->whereColumn('id', 'country_id'),
                        $direction);
                })->searchable(),
            Column::make(__('messages.common.action'))->addClass('w-150px justify-content-center d-flex'),
        ];
    }

    public function query(): Builder
    {
        return State::with('country')->select('states.*');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.state_table';
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
                'componentName' => 'sadmin.states.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'state-table')
    {
        $this->customResetPage($pageName);
    }
}
