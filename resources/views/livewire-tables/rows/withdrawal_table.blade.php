@if(!isAdmin())
    <x-livewire-tables::table.cell>
        <div class="d-flex align-items-center">
            <a href="{{ !isAdmin() ? route('users.show', $row->user->id) : 'javascript:void(0)' }}">
                <div class="image image-circle image-mini me-3">
                    <img src="{{$row->user->profile_image}}" alt="user" class="user-img">
                </div>
            </a>
            <div class="d-flex flex-column">
                <a href="{{ !isAdmin() ? route('users.show', $row->user->id) : 'javascript:void(0)' }}"
                   class="mb-1 text-decoration-none fs-6">
                    {!! $row->user->full_name !!}
                </a>
                <span class="fs-6">{{$row->user->email}}</span>
            </div>
        </div>
    </x-livewire-tables::table.cell>
@endif

<x-livewire-tables::table.cell>
    <span class="badge bg-success me-2">
       {{ currencyFormat($row->amount,2) }}
    </span>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @php
        $bgColor = $row->is_approved == \App\Models\Withdrawal::APPROVED ? 'bg-success' : ($row->is_approved == \App\Models\Withdrawal::INPROCESS ? 'bg-warning' :'bg-danger');
    @endphp
    <span class="badge {{ $bgColor }} me-2">
        {{ \App\Models\Withdrawal::APPROVAL_STATUS[$row->is_approved] }}
    </span>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <span class="badge bg-secondary me-2">
       {{ Carbon\Carbon::parse($row->created_at)->isoFormat('Do MMM, YYYY') }}
    </span>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell class="text-center">
	@if( $row->is_approved == \App\Models\Withdrawal::INPROCESS && !isAdmin())
		<div class="">
			<button class="btn btn-success dropdown-toggle" id="dropdownMenuLink"
			        data-bs-toggle="dropdown" aria-expanded="false" data-bs-boundary="viewport">
				{{ __('messages.affiliation.approval_status') }}
			</button>
			<ul class="dropdown-menu withdraw-approval-dropdown" aria-labelledby="dropdownMenuLink">
				<li><a class="dropdown-item" href="#" data-amount="{{ currencyFormat($row->amount,2) }}"
				       data-id="{{ $row->id }}" id="approveWithdrawalBtn">{{ __('messages.affiliation.approve') }}</a>
				</li>
				<li><a class="dropdown-item" href="#" data-id="{{ $row->id }}"
				       id="rejectWithdrawalBtn">{{ __('messages.affiliation.reject') }}</a>
				</li>
			</ul>
		</div>
	@else
		<span id="showAffiliationWithdrawBtn" data-id="{{ $row->id }}" type="button" data-bs-toggle="tooltip"
		      data-placement="top"
		      data-bs-original-title="{{__('messages.common.view')}}"><i class="fa-solid fa-eye text-info"></i></span>
	@endif
</x-livewire-tables::table.cell>
