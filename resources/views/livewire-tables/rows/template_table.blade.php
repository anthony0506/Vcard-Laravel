<x-livewire-tables::bs5.table.cell>
    <div class="d-flex align-items-center">
        <a href="/{{ $row->name }}" target="_blank">
            <div class="image image-circle image-mini me-3">
                <img src="{{$row->template_url}}" alt="user" class="user-img">
            </div>
        </a>
        <div class="d-flex flex-column">
            <a href="/{{ $row->name }}" target="_blank" class="mb-1 text-decoration-none fs-6">
                {{$row->name}}
            </a>
        </div>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if($row->vcards)
        <span class="badge badge-circle bg-info">{{$row->vcards->count()}}</span>
    @else
        <span>{{__('messages.common.notUsed')}}</span>
    @endif
</x-livewire-tables::bs5.table.cell>

