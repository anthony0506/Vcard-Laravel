<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Vcard;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserShowVCardTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh'];

    public string $primaryKey = 'id';

    protected string $pageName = 'user-show-v-card-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public $userId;

    public function columns(): array
    {
        return [
            Column::make(__('messages.vcard.vcard_name'), 'name')->sortable()->searchable(),
            Column::make(__('messages.vcard.occupation'), 'occupation')->sortable()->searchable(),
            Column::make(__('messages.vcard.preview_url'), 'url_alias'),
            Column::make(__('messages.vcard.status'), 'status'),
        ];
    }

    public function query(): Builder
    {
        $tenantId = User::where('id', $this->userId)->first()->tenant_id;

        return Vcard::where('tenant_id', $tenantId)->select('vcards.*');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.user_show_v_card_table';
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
