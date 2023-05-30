<?php

namespace App\Http\Livewire;

use App\Models\FrontTestimonial;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class FrontTestimonialTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $primaryKey = 'front_testimonial_id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    protected string $pageName = 'front-testimonial-table';

    public function query(): Builder
    {
        return FrontTestimonial::query();
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
                'componentName' => 'sadmin.testimonial.add-button',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.common.action'))->addClass('justify-content-center d-flex'),
        ];
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.front_testimonial_table';
    }

    public function resetPageTable($pageName = 'front-testimonial-table')
    {
        $this->customResetPage($pageName);
    }
}
