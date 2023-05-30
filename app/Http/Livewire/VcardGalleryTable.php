<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VcardGalleryTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    public string $primaryKey = 'gallery_id';

    protected string $pageName = 'vcard-gallery-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public $vcardId;

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.type'), 'type'),
            Column::make(__('messages.common.link'), 'link')
                ->sortable()->searchable()->addClass('w-800px'),
            Column::make(__('messages.common.action'), )->addClass('w-150px justify-content-center d-flex'),

        ];
    }

    public function query(): Builder
    {
        return Gallery::with('media')->whereVcardId($this->vcardId);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.vcard_gallery_table';
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
                'componentName' => 'vcards.gallery.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'vcard-gallery-table')
    {
        $this->customResetPage($pageName);
    }
}
