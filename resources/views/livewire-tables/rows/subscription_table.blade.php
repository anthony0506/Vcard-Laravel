<x-livewire-tables::bs5.table.cell>
        {{ !empty($row->tenant->user) ? $row->tenant->user->full_name : '' }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->plan->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ \Carbon\Carbon::parse($row->starts_at)->isoFormat('Do MMM YYYY')}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ \Carbon\Carbon::parse($row->ends_at)->isoFormat('Do MMM YYYY')}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
	<div class="form-check form-switch">
		<input class="form-check-input" type="checkbox" id="planStatus" name="is_active"
		       {{ $row->status == 1 ? 'disabled checked' : ''}} data-id="{{$row->id}}"
		       data-tenant="{{$row->tenant_id}}">
	</div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
	<div class="justify-content-center d-flex">
		<a title="{{ __('messages.common.view') }}" href="javascript:void(0)"
		   data-id="{{ $row->id }}" class="btn px-1 text-info fs-3 subscribed-user-plan-view-btn">
			<i class="fa-solid fa-eye"></i>
		</a>
		<a title="{{ __('messages.common.edit') }}" class="btn px-1 text-primary fs-3 subscribed-user-plan-edit-btn"
		   data-id="{{$row->id}}" data-turbolinks="false">
			<i class="fa-solid fa-pen-to-square"></i>
		</a>
	</div>
</x-livewire-tables::bs5.table.cell>
