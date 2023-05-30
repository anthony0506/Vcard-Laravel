<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\WithdrawalTransaction;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class WithdrawalTransactionTable extends DataTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected string $pageName = 'withdrawal-transaction-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.user'), "withdrawal_id")
                ->sortable(function (Builder $query, $direction) {
                    return $query->whereHas('withdrawal', function ($q) use ($direction) {
                        return $q->orderBy(User::select('first_name')->whereColumn('user_id', 'users.id'),
                            $direction);
                    });
                })->searchable(function (Builder $query, $direction) {
                    return $query->whereHas('withdrawal', function (Builder $q) use ($direction) {
                        $q->whereHas('user', function (Builder $q) use ($direction) {
                            $q->whereRaw(
                                "TRIM(CONCAT(first_name, ' ', last_name)) like '%{$direction}%'"
                            );
                        });
                    });
                }),
            Column::make(__('messages.subscription.amount'), "amount")->searchable(),
            Column::make(__('messages.payment_type'), "paid_by"),
            Column::make(__('messages.date'), "created_at"),
        ];
    }

    public function query(): Builder
    {
        return WithdrawalTransaction::with('withdrawal.user');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.withdrawal_transaction_table';
    }
}
