<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class WithdrawalTable extends LivewireTableComponent
{

    public $paginationTheme = 'bootstrap-5';

    protected string $pageName = 'withdrawal-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh'];

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.user'), "user_id")
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(User::select('first_name')->whereColumn('withdrawals.user_id',
                        'users.id'),
                        $direction);
                })->searchable(function (Builder $query, $direction) {
                    if (!isAdmin()) {
                        return $query->whereHas('user', function (Builder $q) use ($direction) {
                            $q->whereRaw(
                                "TRIM(CONCAT(first_name, ' ', last_name)) like '%{$direction}%'"
                            );
                        });
                    }
                })->hideIf(isAdmin()),
            Column::make(__('messages.subscription.amount'), "amount")
                ->sortable()->searchable(),
            Column::make(__('messages.affiliation.approval_status'), "is_approved")
                ->sortable(),
            Column::make(__('messages.date'), "created_at")
                ->sortable(),
            Column::make(__('messages.common.action'), "id")->addClass('text-center'),
        ];
    }

    public function query(): Builder
    {
        $query = Withdrawal::with('user');

        if (isAdmin()) {
            $query->whereUserId(getLogInUserId());
        }

        return $query;
    }


    public function rowView(): string
    {
        return 'livewire-tables.rows.withdrawal_table';
    }

    public function render()
    {
        $view = view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns'       => $this->columns(),
                'rowView'       => $this->rowView(),
                'filtersView'   => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows'          => $this->rows,
                'modalsView'    => $this->modalsView(),
                'bulkActions'   => $this->bulkActions,
            ]);
        if (isAdmin()) {
            $view->with(['componentName' => 'user-settings.affiliationWithdraw.withdraw-button']);
        }

        return $view;
    }
}
