@extends('layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')
@role('super_admin')
<div class="container-fluid">
    <div class="d-flex flex-column">
        <div class="row">

            {{-- Card --}}
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <div class="bg-primary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center
                            justify-content-between my-3">
                            <div
                                class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user fs-1-xl text-white"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-1-xxl fw-bolder text-white">{{ $activeUsersCount }}</h2>
                                <h3 class="mb-0 fs-4 fw-light">{{__('messages.common.total_active_users')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <div
                            class="bg-success shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                            <div
                                class="bg-green-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user-large-slash fs-1-xl text-white"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-1-xxl fw-bolder text-white">{{ $activeVcard }}</h2>
                                <h3 class="mb-0 fs-4 fw-light">{{ __('messages.common.total__active_vcards') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <div
                            class="bg-info shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                            <div
                                class="bg-blue-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-id-card-clip fs-1-xl text-white"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-1-xxl fw-bolder text-white">{{ $deActiveUsersCount }}</h2>
                                <h3 class="mb-0 fs-4 fw-light">{{ __('messages.common.total_deactive_users') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <div
                            class="bg-warning shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                            <div
                                class="bg-yellow-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-id-card-clip fs-1-xl text-white"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-1-xxl fw-bolder text-white">{{ $deActiveVcard }}</h2>
                                <h3 class="mb-0 fs-4 fw-light">{{ __('messages.common.total__deactive_vcards') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Plan By User--}}
            <div class="col-xxl-4 col-12 mb-7 mb-xxl-0">
                <div class="card">
                    <div class="card-header pb-0 px-10">
                        <h3 class="mb-0">{{ __('messages.sadmin_dashboard.plans_by_users') }}</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="dashboardPlanPieChart"></canvas>
                    </div>
                </div>
            </div>

            {{--Income Chart--}}
            <div class="col-xxl-8 col-12 mb-7 mb-xxl-0">
                <div class="card">
                    <div class="card-header pb-0 px-10">
                        <h3 class="mb-0">{{ __('messages.sadmin_dashboard.income') }}</h3>
                        <button type="button" class="btn btn-icon btn-outline-primary me-5" title="Switch Chart">
                                    <span class="svg-icon svg-icon-1 m-0 text-center" id="dashboardChangeIncomeChart">
                                    <i class="fa-solid fa-chart-line income-chart"></i>
                                </span>
                        </button>
                    </div>
                    <div class="mt-6 mx-6">
                        <div id="incomeChartCanvas">
                            <canvas id="dashboardIncomeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            {{--Register user table--}}
            <div class="col-12 mt-7">
                    <div class="d-flex">
                        <h3 class="card-title align-items-start flex-column">
                            <span
                                class="fw-bolder fs-3 mb-1">{{__('messages.sadmin_dashboard.recent_users_registration')}}</span>
                        </h3>
                        <div class="card-toolbar ms-auto">
                            <ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="dayData" role="tablist">
                                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                                    <button class="nav-link active p-0" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview"
                                            type="button" role="tab" aria-controls="overview" aria-selected="true">
                                        {{__('messages.sadmin_dashboard.day')}}
                                    </button>
                                </li>
                                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                                    <button class="nav-link p-0" id="vweekData" data-bs-toggle="tab" data-bs-target="#vcards"
                                            type="button" role="tab" aria-controls="cases" aria-selected="false">
                                        {{__('messages.sadmin_dashboard.week')}}
                                    </button>
                                </li>
                                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                                    <button class="nav-link p-0" id="monthData" data-bs-toggle="tab" data-bs-target="#vcards"
                                            type="button" role="tab" aria-controls="cases" aria-selected="false">
                                        {{__('messages.sadmin_dashboard.month')}}
                                    </button>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="pb-2">
                        <div class="tab-content">
                            <div class="tab-pane fade active" id="month">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>{{__('messages.sadmin_dashboard.name')}}</th>
                                            <th>{{__('messages.sadmin_dashboard.email')}}</th>
                                            <th class="text-nowrap">{{__('messages.sadmin_dashboard.contact')}}</th>
                                            <th class="text-nowrap">{{__('messages.sadmin_dashboard.registered_on')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody id="monthlyReport" class="text-gray-600 fw-bold">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="week">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>{{__('messages.sadmin_dashboard.name')}}</th>
                                            <th>{{__('messages.sadmin_dashboard.email')}}</th>
                                            <th class="text-nowrap">{{__('messages.sadmin_dashboard.contact')}}</th>
                                            <th class="text-nowrap">{{__('messages.sadmin_dashboard.registered_on')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody id="weeklyReport" class="text-gray-600 fw-bold">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="day">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>{{__('messages.sadmin_dashboard.name')}}</th>
                                            <th>{{__('messages.sadmin_dashboard.email')}}</th>
                                            <th class="text-nowrap">{{__('messages.sadmin_dashboard.contact')}}</th>
                                            <th class="text-nowrap">{{__('messages.sadmin_dashboard.registered_on')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody id="dailyReport" class="text-gray-600 fw-bold">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endrole

@role('admin')
<div class="container-fluid">
    <div class="d-flex flex-column">
        <div class="row">

            {{-- Card --}}
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <div class="bg-primary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center
                            justify-content-between my-3">
                            <div class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user fs-1-xl text-white"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-1-xxl fw-bolder text-white">{{ $activeVcard }}</h2>
                                <h3 class="mb-0 fs-4 fw-light">{{ __('messages.common.total__active_vcards') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <div class="bg-success shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                            <div class="bg-green-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user-large-slash fs-1-xl text-white"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-1-xxl fw-bolder text-white">{{ $deActiveVcard }}</h2>
                                <h3 class="mb-0 fs-4 fw-light">{{ __('messages.common.total__deactive_vcards') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <div class="bg-info shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                            <div class="bg-blue-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-question fs-1-xl text-white"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-1-xxl fw-bolder text-white">{{ $enquiry }}</h2>
                                <h3 class="mb-0 fs-4 fw-light">{{ __('messages.common.today_enquiry') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <div class="bg-warning shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                            <div class="bg-yellow-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-calendar-check fs-1-xl text-white"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-1-xxl fw-bolder text-white">{{ $appointment }}</h2>
                                <h3 class="mb-0 fs-4 fw-light">{{ __('messages.common.today_appointments') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Vcard Analytic--}}
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header pb-0 px-10">
                        <h3 class="mb-0">{{ __('messages.analytic.vcard_analytic') }}</h3>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-icon btn-outline-primary me-5" title="Switch Chart">
                                    <span class="svg-icon svg-icon-1 m-0 text-center" id="dashboardChangeChart">
                                    <i class="fa-solid fa-chart-line chart"></i>
                                </span>
                            </button>

                        </div>
                        <div id="dashboardTimeRange" class="time_range
                                    btn btn-outline-primary align-items-center">
                            <i class="far fa-calendar-alt" aria-hidden="true"></i>
                            &nbsp;&nbsp<span></span> <b class="caret"></b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div id="dashboardWeeklyUserBarChartContainer">
                                <canvas id="dashboardWeeklyUserBarChart" height="200" width="905"
                                        style="display: block; width: 905px; height: 200px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Today Appointment--}}
            <div class="col-12">
                    <div class="mt-3 mb-5">
                        <h3>{{ __('messages.common.today_appointments') }}</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-nowrap">{{__('messages.vcard.vcard_name')}}</th>
                                <th>{{__('messages.common.name')}}</th>
                                <th>{{__('messages.common.phone')}}</th>
                                <th>{{__('messages.common.email')}}</th>
                            </tr>
                            </thead>
                            <tbody id="appointmentReport">

                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endrole

@include('dashboard.templates.templates')
@include('dashboard.templates.userTemplate')
@endsection

