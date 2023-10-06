<x-livewire-tables::table.cell>
    <div class="d-flex align-items-center">
        <a href="#">
            <div class="image image-circle image-mini me-3">
                <img src="{{ empty($row->template) ? asset('assets/images/default_cover_image.jpg')
            : $row->template->template_url }}" alt="user" class="user-img">
            </div>
        </a>
        <div class="d-flex flex-column">
            <a href="#" class="mb-1 text-decoration-none fs-6">
                {{ $row->name }}
            </a>
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->occupation }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if($row->status)
        <a id="vcardUrl{{$row->id}}" target="_blank" class="<text-primary></text-primary>"
           href="{{ route('vcard.show', ['alias' => $row->url_alias]) }}">
            {{ route('vcard.show', ['alias' => $row->url_alias]) }} </a>
    @else

        <span id="vcardUrl{{$row->id}}" target="_blank" class=""> {{ route('vcard.show', ['alias' => $row->url_alias]) }} </span>
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if ($row->status == 1)
    <span class="badge bg-success">{{ __('messages.common.active') }}</span>
    @else
    <span class="badge bg-danger">{{ __('messages.deactivate') }}</span>
    @endif
</x-livewire-tables::table.cell>
