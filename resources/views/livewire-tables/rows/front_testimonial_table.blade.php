<x-livewire-tables::bs5.table.cell>

    <div class="d-flex align-items-center">
        <div class="image image-circle image-mini me-3">
            <img src="{{$row->testimonial_url}}" alt="user" class="user-img">
        </div>
        <div class="d-flex flex-column">
            <span class="fs-6">{{ \Illuminate\Support\Str::limit($row->name, 30) }}</span>
        </div>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="justify-content-center d-flex">
    <a title = "{{ __('messages.common.view') }}" href="javascript:void(0)"
       data-id="{{ $row->id }}" class="btn px-1 text-info fs-3 view-testimonial-btn ">
        <i class="fa-solid fa-eye"></i>
    </a>

    <a href="javascript:void(0)" title="{{ __('messages.common.edit') }}"
        class="btn px-1 text-primary fs-3 front-testimonial-edit-btn" data-id="{{$row->id}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>

    <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.common.delete') }}"
       class="btn px-1 text-danger fs-3 front-testimonial-delete-btn">
        <i class="fa-solid fa-trash"></i>
    </a>
    </div>
</x-livewire-tables::bs5.table.cell>
