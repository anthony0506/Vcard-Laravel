<?php

namespace App\Http\Livewire;

use App\Models\CouponCode;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CouponCodeTable extends LivewireTableComponent
{

    public string $primaryKey = 'id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh','resetPageTable'];

    protected string $pageName = 'coupon-code-table';

    public function columns(): array
    {
        return [
            Column::make(__('messages.coupon_code.coupon_name'), "coupon_name")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.coupon_code.coupon_type'), "type")
                ->sortable(),
            Column::make(__('messages.coupon_code.coupon_discount'), "discount")
                ->sortable(),
            Column::make(__('messages.coupon_code.expire_at'), "expire_at")
                ->sortable(),
            Column::make(__('messages.common.status'), "status"),
            Column::make(__('messages.common.action'), "id")->addClass('text-center'),
        ];
    }

    public function query(): Builder
    {
        return CouponCode::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.coupon_code_table';
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
                'componentName' => 'sadmin.couponCodes.add-button',
            ]);

    }
    public function resetPageTable($pageName = 'coupon-code-table')
    {
        $this->customResetPage($pageName);
    }
}
