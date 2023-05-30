<x-livewire-tables::table.cell>
    <div class="d-flex align-items-center">
        <a href="javascript:void(0)">
            <div class="image image-circle image-mini me-3">
                <img src="{{ $row->image_url}}" alt="testimonials image" class="user-img">
            </div>
        </a>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{$row->name}}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="justify-content-center d-flex">
    <a title="{{__('messages.common.view')}}" class="btn px-1 text-info testimonial-view-btn fs-3" href="javascript:void(0)"  data-id="{{$row->id}}">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a href="javascript:void(0)" class="btn px-1 text-primary testimonial-edit-btn fs-3" data-id="{{$row->id}}" title="{{__('messages.common.edit')}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="#" title="{{__('messages.common.delete')}}" data-id="{{$row->id}}" class="testimonial-delete-btn btn px-1 text-danger fs-3">
        <i class="fa-solid fa-trash"></i>          
    </a>

    </div>
</x-livewire-tables::table.cell>

