<?php

namespace App\Http\Livewire;

use App\Models\AffiliateUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AffiliateUserTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected string $pageName = 'affiliate-user-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.affiliation.affiliated_by'), "affiliated_by")
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(User::select('first_name')->whereColumn('affiliate_users.affiliated_by',
                        'users.id'),
                        $direction);
                })->hideIf(isAdmin()),
            Column::make(__('messages.common.user'), "user_id")
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(User::select('first_name')->whereColumn('affiliate_users.user_id',
                        'users.id'),
                        $direction);
                })->searchable(function (Builder $query, $direction) {
                    return $query->whereHas('user', function (Builder $q) use ($direction) {
                        $q->whereRaw(
                            "TRIM(CONCAT(first_name, ' ', last_name)) like '%{$direction}%'"
                        );
                    });
                }),
            Column::make(__('messages.setting.affiliation_amount'), "amount")
                ->sortable()->searchable(),
            Column::make(__('messages.date'), "created_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        $query = AffiliateUser::with('user', 'affiliated_by_user');

        if (isAdmin()) {
            $query->whereAffiliatedBy(getLogInUserId());
        }

        return $query;
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.affiliate_user_table';
    }

    public function render()
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns'       => $this->columns(),
                'rowView'       => $this->rowView(),
                'filtersView'   => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows'          => $this->rows,
                'modalsView'    => $this->modalsView(),
                'bulkActions'   => $this->bulkActions,
            ]);
    }
}
