<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PlanTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $primaryKey = 'plan_id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh', 'resetPageTable'];

    protected string $pageName = 'plan-table';

    public function query(): Builder
    {
        return Plan::with(['currency', 'planFeature'])->select('plans.*');
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
                'componentName' => 'sadmin.plans.add-button',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.plan.price'), 'price')
                ->sortable()->searchable()->addClass('d-flex justify-content-end'),
            Column::make(__('messages.plan.duration'), 'frequency')
                ->sortable()->searchable()->addClass('duration-center'),
            Column::make(__('messages.plan.make_default'), 'is_default')
                ->sortable(),
            Column::make(__('messages.common.action'))->addClass('w-100px justify-content-center d-flex'),
        ];
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.plan_table';
    }

    public function resetPageTable($pageName = 'plan-table')
    {
        $this->customResetPage($pageName);
    }
}
