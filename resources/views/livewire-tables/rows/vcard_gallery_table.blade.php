<x-livewire-tables::table.cell>
{{$row->type_name}}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if($row->link == null && $row->type == 0)
        <a href="{{$row->gallery_image}}" target="_blank">{{$row->gallery_image}}</a>
   @elseif($row->link == null && $row->type == 2)
        <a href="{{$row->gallery_image}}" target="_blank">{{$row->gallery_image}}</a>
    @else
<a href="{{$row->link}}" target="_blank">{{$row->link}}</a>
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="justify-content-center d-flex">
        <a href="javascript:void(0)" class="btn px-1 text-primary gallery-edit-btn fs-3" data-id="{{$row->id}}"
           title="{{__('messages.common.edit')}} ">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <a href="javascript:void(0)" title="{{__('messages.common.delete')}}" data-id="{{$row->id}}"
           class="btn px-1 text-danger fs-3 gallery-delete-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::table.cell>

