<x-livewire-tables::bs5.table.cell>
    {{$row->vcard->name}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->email }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if($row->phone)
       {{ $row->phone }}
    @else
        {{'N/A'}}
    @endif
</x-livewire-tables::bs5.table.cell>
    
<x-livewire-tables::bs5.table.cell >

    <div class="badge bg-primary">
        <div class="mb-2">
            {{ getUserSettingValue('time_format',getLogInUserId()) == 1 ? date("H:i", strtotime($row->from_time)).' - '.date("H:i", strtotime($row->to_time)): date("h:i A", strtotime($row->from_time)).' - '.date("h:i A", strtotime($row->to_time))}}
        </div>
        <div class="">{{ \Carbon\Carbon::parse($row->date)->format('jS M, Y') }}
        </div>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->status == \App\Models\ScheduleAppointment::COMPLETED)
        <span class="badge bg-success">{{__('messages.common.completed')}}</span>
    @else
        <a href="javascript:void(0)" data-id="{{ $row->id }}"
           class="completed-appointment" data-turbolinks="false">
            <span class="badge bg-warning ">{{__('messages.common.pending')}}   <i class="fa fa-check"
                                                                                   aria-hidden="true"></i> </span>
        </a>
    @endif
</x-livewire-tables::bs5.table.cell>

{{--<x-livewire-tables::bs5.table.cell class="text-center">--}}
{{--    {{ $row->to_time }}--}}
{{--</x-livewire-tables::bs5.table.cell>--}}

<x-livewire-tables::bs5.table.cell>
    @if($row->paid_amount)
        <span class="badge bg-success">{{__('messages.appointment.paid').' '.$row->paid_amount}}</span>
    @else
        <span class="badge bg-primary">{{__('messages.appointment.free')}}</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="justify-content-center d-flex">
    <a title = "{{ __('messages.common.delete') }}" data-id="{{$row->id}}"
       class="btn px-1 text-danger fs-3 appointment-delete-btn">
        <i class="fa-solid fa-trash"></i>
    </a>
    </div>
</x-livewire-tables::bs5.table.cell>
