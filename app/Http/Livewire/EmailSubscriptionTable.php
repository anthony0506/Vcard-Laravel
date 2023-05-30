<?php

namespace App\Http\Livewire;

use App\Models\EmailSubscription;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class EmailSubscriptionTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $primaryKey = 'email_subscription_id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh', 'resetPageTable'];

    protected string $pageName = 'email-subscription-table';

    public function columns(): array
    {
        return [
            Column::make(__('messages.user.email'), 'email')
                ->sortable()->searchable(),
            Column::make(__('messages.common.action'))->addClass('d-flex justify-content-center'),
        ];
    }

    public function query(): Builder
    {
        return EmailSubscription::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.email_subscription_table';
    }

    public function resetPageTable($pageName = 'email-subscription-table')
    {
        $this->customResetPage($pageName);
    }
}
