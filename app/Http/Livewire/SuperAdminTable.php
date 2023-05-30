<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SuperAdminTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $primaryKey = 'user_id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    protected string $pageName = 'user-table';

    /**
     * @throws \Exception
     */
    public function query(): Builder
    {
        return User::role('super_admin')->with(['media', 'subscriptions.plan'])->where('id', '!=', getLogInUserId());
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
                'componentName' => 'admin_users.add-button',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'first_name')->sortable()->searchable(),
            Column::make(__('messages.user.full_name'), 'last_name')->sortable()->searchable()->hideIf(1),
            Column::make(__('messages.user.email_verified'))->addClass('text-center'),
            Column::make(__('messages.common.is_active'))->addClass('text-center'),
            Column::make(__('messages.common.action'))->addClass('w-100px justify-content-center d-flex'),
        ];
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.admin_table';
    }

    public function resetPageTable($pageName = 'user-table')
    {
        $this->customResetPage($pageName);
    }
}
