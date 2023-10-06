<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CountryTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    public string $primaryKey = 'country_id';

    protected string $pageName = 'country-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.country.short_code'), 'short_code')
                ->sortable()->searchable(),
            Column::make(__('messages.country.phone_code'), 'phone_code')
                ->sortable()->searchable(),
            Column::make(__('messages.common.action'))->addClass('w-150px justify-content-center d-flex'),

        ];
    }

    public function query(): Builder
    {
        return Country::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.country_table';
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
                'componentName' => 'sadmin.countries.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'country-table')
    {
        $this->customResetPage($pageName);
    }
}
