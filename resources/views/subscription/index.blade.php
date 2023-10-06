@extends('layouts.app')
@section('title')
    {{__('messages.subscription.manage_subscription')}}
@endsection
@section('content')
	<div class="container-fluid">
		<div class="d-flex flex-column">
			@include('flash::message')
			@include('layouts.errors')
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-7">
							<h2>{{ $currentPlan->plan->name }}</h2>
							<h4>{{ __('messages.plan.no_of_vcards').': '.$currentPlan->no_of_vcards }}</h4>
							<h5 class="mb-12">

								@if( \Carbon\Carbon::now() > $currentPlan->ends_at)
									<span class="text-danger">
                                    {{ __('messages.subscription.expired').' '.\Carbon\Carbon::parse($currentPlan->ends_at)->format('dS M, Y') }}
                                </span>
								@else
									<span class="text-success">
                                     {{ __('messages.subscription.active_until').' '.\Carbon\Carbon::parse($currentPlan->ends_at)->format('dS M, Y') }}
                                </span>
                                @endif
                            </h5>
                            <div class="fs-5 mb-2">
                                <div class="text-gray-800 fw-bolder me-1">
                                    {{ currencyFormat($currentPlan->plan_amount,2, $currentPlan->plan->currency->currency_code,) .'/ '.\App\Models\Plan::DURATION[$currentPlan->plan_frequency] }}
                                    {{--                                    {{ $currentPlan->plan->currency->currency_icon.' '.number_format($currentPlan->plan_amount).'/ '.\App\Models\Plan::DURATION[$currentPlan->plan_frequency] }}--}}
                                </div>
                                @if(!empty($currentPlan->trial_ends_at))
                                    @php
                                        $startsAt = \Carbon\Carbon::now();
                                        $totalDays = \Carbon\Carbon::parse($currentPlan->starts_at)->diffInDays($currentPlan->ends_at);
                                        $usedDays = \Carbon\Carbon::parse($currentPlan->starts_at)->diffInDays($startsAt);
                                        $remainingDays = $totalDays - $usedDays;
                                    @endphp
                                    <div class="text-gray-600 fw-bold">
                                        <small>
                                            @if($remainingDays > 0)
                                                {{__('messages.plan.trial_days')}} : {{ $remainingDays.' '.__('messages.plan.days').' '.__('messages.subscription.remaining') }}
                                            @endif
                                        </small>
                                    </div>
                                @endif
                            </div>
                            <div class="fs-6 text-gray-600 fw-bold mb-2">
                                {{ __('messages.subscription.subscribed_date').': '.\Carbon\Carbon::parse($currentPlan->starts_at)->format('dS M, Y') }}
                            </div>
                            <div>
                                @foreach(getPlanFeature($currentPlan->plan) as $feature => $value)
                                    @if($value)
                                        <span class="badge {{ getRandomColor($loop->index) }}  fs-7 m-1">{{ __('messages.feature.'.$feature) }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-5 mt-lg-0 mt-5">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary" href="{{ route('subscription.upgrade') }}">
                                    {{ __('messages.subscription.upgrade_plan') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="d-flex flex-column table-striped">
            <livewire:usersubscription-table/>
        </div>
    </div>
@endsection
