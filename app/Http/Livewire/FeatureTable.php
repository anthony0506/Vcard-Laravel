<?php

namespace App\Http\Livewire;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class FeatureTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $primaryKey = 'feature_id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh'];

    protected string $pageName = 'feature-table';

    public function columns(): array
    {
        return [
            Column::make(__('messages.feature.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.feature.image')),
            Column::make(__('messages.feature.description'), 'description')
                ->sortable()->searchable(),
            Column::make(__('messages.common.action'))->addClass('justify-content-center d-flex'),
        ];
    }

    public function query(): Builder
    {
        return Feature::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.feature_table';
    }
}
