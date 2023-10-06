<x-livewire-tables::bs5.table.cell>
    {{ $row->name  }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="image image-circle image-mini me-3">
        <img src="{{$row->profile_image}}" alt="user">
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->description  }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="justify-content-center d-flex">
    <a  href="{{ route('features.edit', $row->id) }}" title="{{ __('messages.common.edit') }}"
        class="btn px-1 text-primary fs-3">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    </div>
</x-livewire-tables::bs5.table.cell>
