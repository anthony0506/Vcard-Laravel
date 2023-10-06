<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VcardProductTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPageTable'];

    public string $primaryKey = 'product_id';

    protected string $pageName = 'vcard-product-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public $vcardId;

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.icon'), ),
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.common.product_url'), 'product_url'),
            Column::make(__('messages.plan.price'), 'price')
                ->sortable()->searchable(),
            Column::make(__('messages.common.action'))->addClass('w-150px justify-content-center d-flex'),
        ];
    }

    public function query(): Builder
    {
        return Product::with('currency')->whereVcardId($this->vcardId);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.vcard_product_table';
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
                'componentName' => 'vcards.products.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'vcard-product-table')
    {
        $this->customResetPage($pageName);
    }
}
