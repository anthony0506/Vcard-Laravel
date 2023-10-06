<?php

namespace App\Http\Livewire;

use App\Models\VcardService;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VcardServiceTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    public string $primaryKey = 'services_id';

    protected string $pageName = 'service-vcard-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public $vcardId;

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.icon'), 'id'),
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable()->addClass('w-800px'),
            Column::make('Service URL', 'service_url'),
            Column::make(__('messages.common.action'))->addClass('w-100px justify-content-center d-flex'),
        ];
    }

    public function query(): Builder
    {
        return VcardService::whereVcardId($this->vcardId)->select('vcard_services.*');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.vcard_service_table';
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
                'componentName' => 'vcards.services.add-button',

            ]);
    }

    public function resetPageTable($pageName = 'service-vcard-table')
    {
        $this->customResetPage($pageName);
    }
}
