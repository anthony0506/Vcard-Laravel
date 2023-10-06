@extends('layouts.app')
@section('title')
	{{__('messages.coupon_code.coupon_codes')}}
@endsection
@section('content')
	<div class="container-fluid">
		<div class="d-flex flex-column table-striped">
			@include('flash::message')
			<livewire:coupon-code-table/>
		</div>
		@include('sadmin.couponCodes.create-coupon-code-modal')
		@include('sadmin.couponCodes.edit-coupon-code-modal')
	</div>
@endsection
