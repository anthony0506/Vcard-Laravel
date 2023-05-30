<style>
    .plan-amount div {
        justify-content: end;
    !important;
    }

    .date-align div {
        justify-content: center;
    !important;
    }
</style>
<x-livewire-tables::bs5.table.cell>
    <span class="">{{$row->plan->name}}</span>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-end">
    <span class="">{{ currencyFormat($row->plan_amount,0, $row->plan->currency->currency_code) }}</span>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-center">
    <span class="">{{Carbon\Carbon::parse($row->starts_at)->isoFormat('Do MMM, YYYY')}}</span>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
        <span class="">{{Carbon\Carbon::parse($row->ends_at)->isoFormat('Do MMM, YYYY')}}</span>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    @if ($row->status == 1)
        <span class="badge bg-success">{{__('messages.common.active')}}</span>
    @else
        <span class="badge bg-danger">{{ __('messages.common.closed') }}</span>
    @endif
</x-livewire-tables::bs5.table.cell>
