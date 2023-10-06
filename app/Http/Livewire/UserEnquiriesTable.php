<?php

namespace App\Http\Livewire;

use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserEnquiriesTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh'];

    public string $primaryKey = 'id';

    protected string $pageName = 'enquiry-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public $vcardId;

    public function columns(): array
    {
        return [

            Column::make(__('messages.common.name'), 'name')->sortable()->searchable(),
            Column::make(__('messages.common.email'), 'email')->searchable()->sortable(),
            Column::make(__('messages.common.phone'), 'phone')->searchable(),
            Column::make(__('messages.vcard.created_on'), 'created_at')->sortable()->searchable()
                ->addClass('text-nowrap'),
            Column::make(__('messages.common.action'))->addClass('justify-content-center d-flex'),
        ];
    }

    public function query(): Builder
    {
        return Enquiry::query()->where('vcard_id', '=', $this->vcardId);
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'livewire-tables.rows.user_enquiries_table';
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
