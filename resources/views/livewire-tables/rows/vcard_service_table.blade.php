<x-livewire-tables::table.cell>
    <div class="d-flex align-items-center">
        <a href="javascript:void(0)">
            <div class="image image-circle image-mini me-3">
                <img src="{{ $row->service_icon}}" alt="user" class="user-img">
            </div>
        </a>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {!! $row->name !!}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if($row->service_url)
        <a href="{{ $row->service_url }}" class="text-decoration-none" target="_blank">{{ $row->service_url }}</a>
    @else
        N/A
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="justify-content-center d-flex">
        <a title="{{__('messages.common.view')}}" class="btn px-1  service-view-btn text-info fs-3"
           href="javascript:void(0)" data-id="{{$row->id}}">
            <i class="fa-solid fa-eye"></i>
    </a>
    
    <a href="javascript:void(0)" class="btn px-1 text-primary service-edit-btn fs-3"
       data-id="{{$row->id}}" title="{{__('messages.common.edit')}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="javascript:void(0)" title="<?php echo __('messages.common.delete'); ?>" data-id="{{$row->id}}"
       class="service-delete-btn btn px-1 text-danger fs-3">
        <i class="fa-solid fa-trash"></i>         
    </a>
</div>
</x-livewire-tables::table.cell>
