<?php

namespace App\Http\Livewire;

use App\Models\Enquiry;
use App\Models\Vcard;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class EnquiriesTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh'];

    protected string $pageName = 'enquiries-table';

    public function columns(): array
    {
        return [
            Column::make(__('messages.vcard.vcard_name'), 'vcard.name')->searchable()->sortable(function (
                Builder $query,
                $direction
            ) {
                return $query->orderBy(vcard::select('name')->whereColumn('vcards.id', 'enquiries.vcard_id'),
                    $direction);
            }),
            Column::make(__('messages.common.name'), 'name')->sortable()->searchable(),
            Column::make(__('messages.common.email'), 'email')->searchable()->sortable(),
            Column::make(__('messages.common.phone'), 'phone')->searchable(),
            Column::make(__('messages.vcard.created_on'), 'created_at')->sortable()->searchable()
                ->addClass('text-nowrap'),
            Column::make(__('messages.common.action'))->addClass('justify-content-center d-flex'),
        ];
    }

    public function query()
    {
        $vcardIds = Vcard::whereTenantId(getLogInTenantId())->pluck('id')->toArray();

        return Enquiry::with('vcard')->whereIn('vcard_id', $vcardIds);
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'livewire-tables.rows.enquiries_table';
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
