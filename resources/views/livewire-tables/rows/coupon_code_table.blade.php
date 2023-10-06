<x-livewire-tables::table.cell>
	{{ $row->coupon_name }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
	<span class="badge {{ $row->type == 1 ? 'bg-success' : 'bg-info' }}  me-2">
		{{ \App\Models\CouponCode::TYPE[$row->type] }}
	</span>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
	{{ $row->discount }}{{ ($row->type == \App\Models\CouponCode::PERCENTAGE_TYPE) ? '%' : '' }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
	<span class="badge {{ $row->is_expired ? 'bg-danger' : 'bg-secondary' }}  me-2">
		{{ \Carbon\Carbon::parse($row->expire_at)->format('jS M, Y') }}
	</span>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
	<div class="form-check form-switch">
		<input class="form-check-input" type="checkbox" name="status" id="changeCouponStatus"
		       data-id="{{ $row->id }}" {{ $row->status ? 'checked' : '' }}>
	</div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
	<div class="justify-content-center d-flex">
		<a title="{{ __('messages.common.edit') }}" data-id="{{$row->id}}"
		   class="btn px-1 text-info fs-3 edit-coupon-code">
			<i class="fa-solid fa-pen-to-square"></i>
		</a>
		<a title="{{ __('messages.common.delete') }}" data-id="{{$row->id}}"
		   class="btn px-1 text-danger fs-3 delete-coupon-code">
			<i class="fa-solid fa-trash"></i>
		</a>
	</div>
</x-livewire-tables::table.cell>
