<style>
    .plan-amount div {
        justify-content: end;
    }

    .date-align div {
        justify-content: center;
    }
</style>
<x-livewire-tables::bs5.table.cell>
    {{ !empty($row->tenant->user) ? $row->tenant->user->full_name : '' }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ ($row->plan->name) }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-end">
	{{ currencyFormat($row->plan_amount,0,$row->plan->currency->currency_code) }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-end">
	{{ currencyFormat($row->payable_amount,0,$row->plan->currency->currency_code) }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-center">
    {{ \Carbon\Carbon::parse($row->starts_at)->isoFormat('Do MMMM YYYY')}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-center">
        {{ \Carbon\Carbon::parse($row->ends_at)->isoFormat('Do MMM YYYY')}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if($row->attachment)
        <a href="{{ url('download-attachment'.'/' .$row->id) }}" target="_blank" class="text-decoration-none">Download</a>
    @else
        N/A
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{$row->notes ?? "N/A"}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-center">
    @if ($row->payment_type == 'Cash')
        <div class="form-check form-switch d-flex justify-content-center">
            <input type="checkbox" class="form-check-input" id="subscriptionPlanStatus" name="is_active"
                   {{$row->status == 1   ? 'disabled checked' : ''}}  data-id="{{$row->id}}"
                   data-tenant="{{$row->tenant_id}}">
        </div>
    @else
        <span class="badge bg-light-success">Approved</span>
    @endif

</x-livewire-tables::bs5.table.cell>



