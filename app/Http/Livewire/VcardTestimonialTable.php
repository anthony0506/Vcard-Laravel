<?php

namespace App\Http\Livewire;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VcardTestimonialTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    public string $primaryKey = 'testimonial_id';

    protected string $pageName = 'vcard-testimonial-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public $vcardId;

    public function columns(): array
    {
        return [
            Column::make(__('messages.vcard.image'), 'id'),
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable()->addClass('w-800px'),
            Column::make(__('messages.common.action'))->addClass('w-150px justify-content-center d-flex'),
        ];
    }

    public function query(): Builder
    {
        return Testimonial::whereVcardId($this->vcardId)->select('testimonials.*');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.vcard_testimonial_table';
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
                'componentName' => 'vcards.testimonials.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'vcard-testimonial-table')
    {
        $this->customResetPage($pageName);
    }
}
