<?php

namespace App\Http\Livewire;

use App\Models\Vcard;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Stancl\Tenancy\Database\Models\Tenant;

class VcardTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter'];

    public string $primaryKey = 'Vcard_id';

    protected string $pageName = 'Vcard-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.vcard.vcard_name'), 'name')->sortable()->searchable(),
            Column::make(__('messages.vcard.user_name'), 'tenant.tenant_username')->sortable(function (
                Builder $query,
                $direction
            ) {
                return $query->orderBy(Tenant::select('tenant_username')->whereColumn('tenants.id', 'vcards.tenant_id'),
                    $direction);
            })
                ->searchable(),
            Column::make(__('messages.vcard.preview_url'), 'url_alias')
                ->hideIf('url_alias')
                ->searchable(),
            Column::make(__('messages.vcard.preview_url'), 'url_alias')->sortable(),
            Column::make(__('messages.vcard.stats')),
            Column::make(__('messages.vcard.created_at'), 'created_at')->sortable(),
            Column::make(__('messages.vcard.status'), 'status')->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Vcard::with('template', 'tenant')->where('tenant_id', '!=', getLogInTenantId());
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.vcard_table';
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
