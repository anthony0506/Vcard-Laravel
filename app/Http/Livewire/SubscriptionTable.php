<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubscriptionTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter'];

    public string $primaryKey = 'subscription_id';

    protected string $pageName = 'subscription-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.vcard.user_name'), 'tenant.user.first_name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(User::select('first_name')->whereColumn('subscriptions.tenant_id', 'users.tenant_id'),
                        $direction);
                })->searchable(),
            Column::make(__('messages.vcard.user_name'), 'tenant.user.last_name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(User::select('first_name')->whereColumn('subscriptions.tenant_id', 'users.tenant_id'),
                        $direction);
                })->searchable()->hideIf(1),
            Column::make(__('messages.subscription.plan_name'), 'plan.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Plan::select('name')->whereColumn('id', 'plan_id'),
                        $direction);
                })->searchable(),
            Column::make(__('messages.subscription.start_date'), 'starts_at')
            ->sortable(),
            Column::make(__('messages.subscription.end_date'), 'ends_at')
                ->sortable(),
            Column::make(__('messages.common.status'), 'status'),
            Column::make(__('messages.common.action'))->addClass('justify-content-center d-flex'),
        ];
    }

    public function query()
    {
        return Subscription::with(['tenant.user', 'plan.currency'])->where('status',
            Subscription::ACTIVE);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.subscription_table';
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
