<?php

namespace App\Http\Livewire;

use App\Models\VcardBlog;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VcardBlogTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $primaryKey = 'blog_id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public $vcardId;

    protected $listeners = ['refresh' => '$refresh', 'resetPageTable'];

    protected string $pageName = 'blog-vcard-table';

    public function query(): Builder
    {
        return VcardBlog::whereVcardId($this->vcardId)->select('vcard_blog.*');
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
                'componentName' => 'vcards.blogs.add-button',

            ]);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.icon'), 'id'),
            Column::make(__('messages.front_cms.title'), 'title')
                ->sortable()->searchable()->addClass('w-800px'),
            Column::make(__('messages.common.action'))->addClass('w-150px justify-content-center d-flex'),
        ];
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.vcard_blog_table';
    }

    public function resetPageTable($pageName = 'blog-vcard-table')
    {
        $this->customResetPage($pageName);
    }
}
