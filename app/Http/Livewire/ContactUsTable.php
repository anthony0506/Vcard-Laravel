<?php

namespace App\Http\Livewire;

use App\Models\ContactUs;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ContactUsTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $primaryKey = 'contact_us_id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh'];

    protected string $pageName = 'contact_us-table';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.common.email'), 'email')
                ->sortable()->searchable(),
            Column::make(__('messages.common.subject'), 'subject')
                ->sortable()->searchable(),
            Column::make(__('messages.common.message'), 'message')
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return ContactUs::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.contact_us_table';
    }
}
