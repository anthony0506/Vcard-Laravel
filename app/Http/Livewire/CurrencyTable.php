<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CurrencyTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $primaryKey = 'currency_id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh'];

    protected string $pageName = 'currency-table';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'currency_name')
                ->sortable()->searchable(),
            Column::make(__('messages.currency.currency_icon'), 'currency_icon')
                ->sortable()->searchable()->addClass('w-150px'),
            Column::make(__('messages.currency.currency_code'), 'currency_code')
                ->sortable()->searchable()->addClass('justify-content-center d-flex'),
        ];
    }

    public function query(): Builder
    {
        return Currency::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.currency_table';
    }
}
