@extends('layouts.app')
@section('title')
    {{ __('messages.analytic.vcard_analytic') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1>@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                @if(getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                    <a href="{{ route('vcards.index') }}"
                       class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
                @else
                    <a href="{{ route('sadmin.vcards.index') }}"
                       class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('layouts.errors')
    @if(!empty($data['noRecord']))
        <div class="w-100 d-flex justify-content-center align-items-center">
            <span>{{$data['noRecord']}}</span>
        </div>
    @else
        {{ Form::hidden('analytic_vcard_id', $vcard->id, ['id' => 'analyticVcardId']) }}
        {{ Form::hidden('visitors', __('messages.analytics.visitors'), ['id' => 'analyticVisitors']) }}
        <div class="container-fluid">
            <div class="d-flex flex-column">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('messages.analytic.vcard_analytic') }}</h1>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-icon btn-outline-primary me-5" id="changeChart">
                                <i class="fas fa-chart-bar  fs-1 fw-boldest chart"></i>
                            </button>
                        </div>
                        <div id="timeRange"
                             class="time_range d-flex time_range_width w-30 h-40px border p-2 justify-content-center align-items-center rounded-2">
                            <i class="far fa-calendar-alt "
                               aria-hidden="true"></i>&nbsp;&nbsp<span></span> <b
                                    class="caret"></b>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="chart-container">
                            <div id="weeklyUserBarChartContainer">
                                <canvas id="weeklyUserBarChart" height="200" width="905"
                                        style="display: block; width: 905px; height: 200px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-8">
                    @if(getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                        @include('vcards.sub_analytics')
                    @else
                        @include('sadmin.vcards.sub_analytics')
                    @endif
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @if($partName == 'overview')
                                <div class="col-12 col-lg-6 my-3">
                                    <div class="card border">
                                        <div class="card-body pb-4">
                                            <h3 class="h5">{{__('messages.analytics.countries')}}</h3>
                                            @foreach($data['country'] as $name => $country)
                                                @if($loop->index < 5)
                                                    <div class="mt-4">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <div class="text-truncate">
                                                                <span class="me-2">
                                                                    @if(file_exists('vendor/blade-flags/country-'.getCountryShortCode($name).'.svg'))
                                                                        <img src="{{ asset('vendor/blade-flags/country-'.getCountryShortCode($name).'.svg') }}" width="25" height="25"/>
                                                                    @endif
                                                                </span>
                                                                <a class="align-middle">{{$name}}</a>
                                                            </div>
                                                            <div>
                                                                <small class="text-muted">{{round($country['per'])}}
                                                                    %</small>
                                                                <span class="ml-3">{{$country['count']}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="progress mb-3">
                                                            <div class="progress-bar bg-{{getRandColor()}}"
                                                                 role="progressbar" style="width: {{$country['per']}}%;"
                                                                 aria-valuenow="{{$country['per']}}" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>

                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="px-9 pt-2 pb-5">
                                            @if(getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                                                <a href="{{config('app.url')}}/admin/vcard/{{$data['vcardID']}}/analytics?part=country"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @else
                                                <a href="{{config('app.url')}}/sadmin/vcard/{{$data['vcardID']}}/analytics?part=country"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 my-3">
                                    <div class="card h-100 border">
                                        <div class="card-body pb-3">
                                            <h3 class="h5">{{__('messages.analytics.devices')}}</h3>
                                            <p></p>

                                            @foreach($data['device'] as $name => $device)
                                                @if($loop->index < 5)
                                                    <div class="mt-4">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <div class="text-truncate">
                                                                <span>{{(ucfirst($name))}}</span>
                                                            </div>

                                                            <div>
                                                                <small class="text-muted">{{round($device['per'])}}
                                                                    %</small>
                                                                <span class="ml-3">{{$device['count']}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="progress mb-3">
                                                            <div class="progress-bar bg-{{getRandColor()}}"
                                                                 role="progressbar" style="width: {{$device['per']}}%;"
                                                                 aria-valuenow="{{$device['per']}}" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>

                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>

                                        <div class="px-9 pt-2 pb-5">
                                            @if(getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                                                <a href="{{config('app.url')}}/admin/vcard/{{$data['vcardID']}}/analytics?part=device"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @else
                                                <a href="{{config('app.url')}}/sadmin/vcard/{{$data['vcardID']}}/analytics?part=device"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 my-3">
                                    <div class="card h-100 border">
                                        <div class="card-body pb-4">
                                            <h3 class="h5">{{__('messages.analytics.os')}}</h3>
                                            <p></p>

                                            @foreach($data['operating_system'] as $name => $os)
                                                @if($loop->index < 5)
                                                    <div class="mt-4">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <div class="text-truncate">
                                                                <span>{{$name}}</span>
                                                            </div>
                                                            <div>
                                                                <small class="text-muted">{{round($os['per'])}}%</small>
                                                                <span class="ml-3">{{$os['count']}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="progress mb-3">
                                                            <div class="progress-bar bg-{{getRandColor()}}"
                                                                 role="progressbar" style="width: {{$os['per']}}%;"
                                                                 aria-valuenow="{{$os['per']}}" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>

                                        <div class="px-9 pt-2 pb-5">
                                            @if(getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                                                <a href="{{config('app.url')}}/admin/vcard/{{$data['vcardID']}}/analytics?part=os"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @else
                                                <a href="{{config('app.url')}}/sadmin/vcard/{{$data['vcardID']}}/analytics?part=os"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 my-3">
                                    <div class="card h-100 border">
                                        <div class="card-body pb-4">
                                            <h3 class="h5">{{__('messages.analytics.browsers')}}</h3>
                                            <p></p>

                                            @foreach($data['browser'] as $name => $browser)
                                                @if($loop->index < 5)
                                                    <div class="mt-4">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <div class="text-truncate">
                                                                <span>{{$name}}</span>
                                                            </div>

                                                            <div>
                                                                <small class="text-muted">{{round($browser['per'])}}
                                                                    %</small>
                                                                <span class="ml-3">{{$browser['count']}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="progress mb-3">
                                                            <div class="progress-bar bg-{{getRandColor()}}"
                                                                 role="progressbar" style="width: {{$browser['per']}}%;"
                                                                 aria-valuenow="{{$browser['per']}}" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>

                                        <div class="px-9 pt-2 pb-5">
                                            @if(getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                                                <a href="{{config('app.url')}}/admin/vcard/{{$data['vcardID']}}/analytics?part=browser"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @else
                                                <a href="{{config('app.url')}}/sadmin/vcard/{{$data['vcardID']}}/analytics?part=browser"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 my-3">
                                    <div class="card h-100 border">
                                        <div class="card-body pb-4">
                                            <h3 class="h5">{{__('messages.analytics.languages')}}</h3>
                                            @foreach($data['language'] as $name => $language)
                                                @if($loop->index < 5)
                                                    <div class="mt-4">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <div class="text-truncate">
                                                                <span>{{ $name != '' ? \App\Models\User::ALL_LANGUAGES[$name] : ''}}</span>
                                                            </div>

                                                            <div>
                                                                <small class="text-muted">{{round($language['per'])}}
                                                                    %</small>
                                                                <span class="ml-3">{{$language['count']}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="progress mb-3">
                                                            <div class="progress-bar bg-{{getRandColor()}}"
                                                                 role="progressbar"
                                                                 style="width: {{$language['per']}}%;"
                                                                 aria-valuenow="{{$language['per']}}" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>

                                        <div class="px-9 pt-2 pb-5">
                                            @if(getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                                                <a href="{{config('app.url')}}/admin/vcard/{{$data['vcardID']}}/analytics?part=language"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @else
                                                <a href="{{config('app.url')}}/sadmin/vcard/{{$data['vcardID']}}/analytics?part=language"
                                                   class="text-muted">{{__('messages.analytics.view_more')}}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($partName == 'country')
                                <div class="col-12 my-3">
                                    <div class="card h-100 border">
                                        <div class="card-body">
                                            <h3 class="h5">{{__('messages.analytics.countries')}}</h3>
                                            <p></p>
                                            @foreach($data['country'] as $name => $country)
                                                <div class="d-flex justify-content-between mb-1 mt-4">
                                                    <div class="text-truncate">
                                                        <span class="me-2">
                                                                    @if(file_exists('vendor/blade-flags/country-'.getCountryShortCode($name).'.svg'))
                                                                <img src="{{ asset('vendor/blade-flags/country-'.getCountryShortCode($name).'.svg') }}" width="25" height="25"/>
                                                            @endif
                                                        </span>
                                                        <a class="align-middle">{{$name}}</a>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted">{{round($country['per'])}}
                                                            %</small>
                                                        <span class="ml-3">{{$country['count']}}</span>
                                                    </div>
                                                </div>

                                                <div class="progress" style="height: 6px;">
                                                    <div class="progress-bar bg-{{getRandColor()}}"
                                                         role="progressbar"
                                                         style="width: {{$country['per']}}%;"
                                                         aria-valuenow="{{$country['per']}}" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($partName == 'device')
                                <div class="col-12 my-3">
                                    <div class="card h-100 border">
                                        <div class="card-body">
                                            <h3 class="h5">{{__('messages.analytics.devices')}}</h3>
                                            <p></p>

                                            @foreach($data['device'] as $name => $device)
                                                <div class="mt-4">
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <div class="text-truncate">
                                                            <span>{{(ucfirst($name))}}</span>
                                                        </div>

                                                        <div>
                                                            <small class="text-muted">{{round($device['per'])}}
                                                                %</small>
                                                            <span class="ml-3">{{$device['count']}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-{{getRandColor()}}"
                                                             role="progressbar"
                                                             style="width: {{$device['per']}}%;"
                                                             aria-valuenow="{{$device['per']}}" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            @endif
                            @if($partName == 'os')
                                <div class="col-12 my-3">
                                    <div class="card h-100 border">
                                        <div class="card-body">
                                            <h3 class="h5">{{__('messages.analytics.os')}}</h3>
                                            <p></p>

                                            @foreach($data['operating_system'] as $name => $os)
                                                <div class="mt-4">
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <div class="text-truncate">
                                                            <span>{{$name}}</span>
                                                        </div>

                                                        <div>
                                                            <small class="text-muted">{{round($os['per'])}}%</small>
                                                            <span class="ml-3">{{$os['count']}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-{{getRandColor()}}"
                                                             role="progressbar"
                                                             style="width: {{$os['per']}}%;"
                                                             aria-valuenow="{{$os['per']}}"
                                                             aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            @endif
                            @if($partName == 'browser')
                                <div class="col-12 my-3">
                                    <div class="card h-100 border">
                                        <div class="card-body">
                                            <h3 class="h5">{{__('messages.analytics.browsers')}}</h3>
                                            <p></p>

                                            @foreach($data['browser'] as $name => $browser)
                                                <div class="mt-4">
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <div class="text-truncate">
                                                            <span>{{$name}}</span>
                                                        </div>

                                                        <div>
                                                            <small class="text-muted">{{round($browser['per'])}}
                                                                %</small>
                                                            <span class="ml-3">{{$browser['count']}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-{{getRandColor()}}"
                                                             role="progressbar"
                                                             style="width: {{$browser['per']}}%;"
                                                             aria-valuenow="{{$browser['per']}}" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            @endif
                            @if($partName == 'language')
                                <div class="col-12  my-3">
                                    <div class="card h-100 border">
                                        <div class="card-body">
                                            <h3 class="h5">{{__('messages.analytics.languages')}}</h3>
                                            <p></p>
                                            @foreach($data['language'] as $name => $language)
                                                <div class="mt-4">
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <div class="text-truncate">
                                                            <span>{{$name != '' ? \App\Models\User::ALL_LANGUAGES[$name] : ''}}</span>
                                                        </div>

                                                        <div>
                                                            <small class="text-muted">{{round($language['per'])}}
                                                                %</small>
                                                            <span class="ml-3">{{$language['count']}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-{{getRandColor()}}"
                                                             role="progressbar"
                                                             style="width: {{$language['per']}}%;"
                                                             aria-valuenow="{{$language['per']}}" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
