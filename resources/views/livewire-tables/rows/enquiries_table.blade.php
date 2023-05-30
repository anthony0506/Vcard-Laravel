<x-livewire-tables::bs5.table.cell>
    {{$row->vcard->name}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a href="mailto:{{$row->email}}" class="text-decoration-none fs-6">{{$row->email}}</a>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if($row->phone)
        {{ $row->phone }}
    @else
        {{'N/A'}}
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ Carbon\Carbon::parse($row->created_at)->isoFormat('Do MMM, YYYY') }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="justify-content-center d-flex">
    <a title = "{{ __('messages.common.view') }}" data-id="{{$row->id}}"
       class="btn px-1 text-info fs-3 enquiries-view-btn">
        <i class="fa-solid fa-eye"></i>
    </a>
        <a title = "{{ __('messages.common.delete') }}" data-id="{{$row->id}}"
           class="btn px-1 text-danger fs-3 enquiries-delete-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>

