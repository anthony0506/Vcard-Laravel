<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    public string $primaryKey = 'user_id';

    protected string $pageName = 'user-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.user.full_name'), 'first_name')->sortable()->searchable(),
            Column::make(__('messages.user.full_name'), 'last_name')->sortable()->searchable()->hideIf(1),
            Column::make(__('messages.subscription.current_plan'),
                'subscription.plan.name')->searchable()->addClass('text-center'),
            Column::make(__('messages.user.email_verified'))->addClass('text-center'),
            Column::make(__('messages.user.impersonate'))->addClass('text-center'),
            Column::make(__('messages.common.is_active'))->addClass('text-center'),
            Column::make(__('messages.common.action'))->addClass('w-100px justify-content-center d-flex'),
        ];
    }

    /**
     * @throws \Exception
     */
    public function query(): Builder
    {
        return User::role('admin')->with(['media', 'subscriptions.plan'])->where('id', '!=', getLogInUserId());
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.user_table';
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
                'componentName' => 'users.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'user-table')
    {
        $this->customResetPage($pageName);
    }
}
