<?php

namespace App\Http\Livewire;

use App\Models\Template;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TemplateTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter'];

    public string $primaryKey = 'id';

    protected string $pageName = 'Template-table';

    public string $defaultSortColumn = 'name';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable()->addClass('col-4'),
            Column::make(__('messages.vcards_template.used_count'))->addClass('col-4'),
        ];
    }

    public function query(): Builder
    {
        return Template::with(['vcards', 'media'])->select('templates.*');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.template_table';
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
            ]);
    }
}
