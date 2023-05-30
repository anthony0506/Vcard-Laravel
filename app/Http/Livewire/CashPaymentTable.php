<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CashPaymentTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter'];

    public string $primaryKey = 'subscriptions_id';

    protected string $pageName = 'cash-payment-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.vcard.user_name'), 'tenant.user.first_name')
                ->searchable(function (Builder $query, $value) {
                    return $query->whereHas('tenant.user', function ($q) use ($value) {
                        $q->where('first_name', 'like', '%'.$value.'%');
                    });
                })->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(User::select('first_name')
                        ->whereColumn('subscriptions.tenant_id', 'users.tenant_id'),
                        $direction);
                }),
            Column::make(__('messages.subscription.plan_name'), 'plan.name')
                ->searchable()
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Plan::select('name')
                        ->whereColumn('subscriptions.plan_id', 'plans.id'),
                        $direction);
                }),
            Column::make(__('messages.subscription.plan_price'), 'plan_amount')
                ->sortable()->addClass('plan-amount'),
            Column::make(__('messages.subscription.payable_amount'), 'payable_amount')
                ->sortable()->addClass('plan-amount px-10'),
            Column::make(__('messages.subscription.start_date'), 'starts_at')
                ->sortable()->addClass('date-align'),
            Column::make(__('messages.subscription.end_date'), 'ends_at')
                ->sortable()->addClass('date-align'),
            Column::make("Attachment", 'id'),
            Column::make("Notes", 'notes'),
            Column::make(__('messages.common.status'))->addClass('text-center'),

        ];
    }

    public function query()
    {
        return Subscription::with(['tenant.user', 'plan.currency'])->whereNotNull('payment_type');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.cash_payment_table';
    }
}
