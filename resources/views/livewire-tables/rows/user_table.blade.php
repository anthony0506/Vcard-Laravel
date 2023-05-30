<x-livewire-tables::bs5.table.cell>
    <div class="d-flex align-items-center">
        <a href="{{route('users.show', $row->id)}}">
            <div class="image image-circle image-mini me-3">
                <img src="{{$row->profile_image}}" alt="user" class="user-img">
            </div>
        </a>
        <div class="d-flex flex-column">
            <a href="{{route('users.show', $row->id)}}" class="mb-1 text-decoration-none fs-6">
                {!! $row->full_name !!}
            </a>
            <span class="fs-6">{{$row->email}}</span>
        </div>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-center">
    <span class="badge bg-light-success">{{$row->plan_name}}</span>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @php
        $checked = $row->email_verified_at == null
         ? ''
         : 'checked disabled'
    @endphp

    <label class="form-check form-switch d-flex justify-content-center cursor-pointer">
        <input name="email_verified" data-id="{{$row->id}}" class="form-check-input user-is-verified cursor-pointer"
               type="checkbox"
               value="1" {{$checked}}>
        <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>

</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="d-flex justify-content-center">
        @if($row->is_active)
            <a data-turbo="false" href="javascript:void(0)" data-id="{{ $row->id }}" class="btn btn-sm btn-info user-impersonate">
                {{ __('messages.user.impersonate') }}
            </a>
        @else
            <a data-turbo="false" href="javascript:void(0)" data-id="{{ $row->id }}" style="pointer-events: none;
   cursor: default;" class="btn btn-sm btn-secondary user-impersonate">
                {{ __('messages.user.impersonate') }}
            </a>
        @endif
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @php
        $checked = $row->is_active === 0
         ? ''
         : 'checked';
    @endphp
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-center cursor-pointer">
        <input type="checkbox" name="is_active" class="form-check-input user-active cursor-pointer"
               data-id="{{$row->id}}" {{$checked}}>
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="justify-content-center d-flex">
        <a title="{{ __('messages.user.change_password') }}"
            class="btn px-1 text-warning fs-3 user-change-password" data-id="{{$row->id}}">
            <i class="fa fa-key" aria-hidden="true"></i>
        </a>
    <a  href="{{ route('users.edit', $row->id) }}" title="{{ __('messages.common.edit') }}"
        class="btn px-1 text-primary fs-3 user-edit-btn" data-id="{{$row->id}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.common.delete') }}"
       class="btn px-1 text-danger fs-3 user-delete-btn">
        <i class="fa-solid fa-trash"></i>
    </a>
    </div>
</x-livewire-tables::bs5.table.cell>

