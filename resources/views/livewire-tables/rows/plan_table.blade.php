<style>
    .duration-center div {
        justify-content: center !important;
    }
</style>
<x-livewire-tables::bs5.table.cell>
    {{$row->name}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-end">
{{--    {{ $row->currency->currency_icon . ' ' . number_format($row->price) }}--}}
    {{ currencyFormat($row->price,0,$row->currency->currency_code) }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-center">
    @if ($row->frequency == 1)
        <span class="badge bg-light-info">
            {{__('messages.plan.monthly')}}
        </span>
    @elseif ($row->frequency == 2)
        <span class="badge bg-light-primary">
            {{__('messages.plan.yearly')}}
        </span>
    @elseif($row->frequency == 3)
        <span class="badge bg-info me-2">
            {{__('messages.plan.unlimited')}}
        </span>
    @else
        <span class="badge bg-light-info">
            {{__('messages.plan.monthly')}}
        </span>
    @endif

</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->is_default == \App\Models\Plan::IS_DEFAULT)
        <span class="badge bg-light-success">{{__('messages.plan.default_Plan')}}<span>
    @else
                    <div class="form-check form-switch">
        <input class="form-check-input is_default " type="checkbox" name="is_default" data-id="{{$row->id}}">
    </div>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="justify-content-center d-flex">
        <a href="{{ route('plans.edit', $row->id) }}" title="{{ __('messages.common.edit') }}"
           class="btn px-1 text-primary fs-3">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.common.delete') }}"
           class="btn px-1 text-danger fs-3 plan-delete-btn" data-turbolinks="false">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>

