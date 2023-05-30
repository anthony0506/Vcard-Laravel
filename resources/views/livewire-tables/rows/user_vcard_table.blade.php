<x-livewire-tables::table.cell>
    <?php
        $defaultTemplate = asset('assets/images/default_cover_image.jpg');
    ?>
    <div class="d-flex align-items-center">
        <div class="image image-circle image-mini me-3">
            <img src="{{ empty($row->template) ? $defaultTemplate : $row->template->template_url }}" alt="Vcard">
        </div>
        <div class="d-flex flex-column">
            <a href="{{ route('vcards.edit', $row->id) }}" class="mb-1 text-decoration-none fs-6">
                {{ $row->name }}
            </a>
            <span class="fs-6">{{ $row->occupation }}</span>
        </div>
    </div>
</x-livewire-tables::table.cell>


<x-livewire-tables::table.cell>
    @if ($row->status == 1)
        <a href="{{ route('vcard.show', ['alias' => $row->url_alias]) }}" id="vcardUrl{{ $row->id }}"
           target="_blank" class="text-decoration-none fs-6">{{ route('vcard.show', ['alias' => $row->url_alias]) }}</a>
        <button class="btn px-2 text-primary fs-2 user-edit-btn copy-clipboard"
                data-id="{{ $row->id }}" title="{{'copy'}}">
            <i class="fa-regular fa-copy fs-2"></i>
        </button>
    @else
        <span id="vcardUrl{{$row->id}}" target="_blank"> {{ route('vcard.show', ['alias' => $row->url_alias]) }} </span>
    @endif
</x-livewire-tables::table.cell>


<x-livewire-tables::table.cell>
    <a href="{{ route('vcard.analytics', $row->id)}}">
        <i class="fa-solid fa-chart-line fs-2"></i>
    </a>

</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <label class="form-check form-switch d-flex justify-content-center">
        <input name="is_active" data-id="{{$row->id}}" class="form-check-input vcardStatus"
               type="checkbox" value="1" {{ $row->status == 1 ? 'checked': ''}}>
    </label>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <span class="badge bg-secondary me-2">
        {{ Carbon\Carbon::parse($row->created_at)->isoFormat('Do MMM, YYYY') }}
    </span>
</x-livewire-tables::table.cell>


<x-livewire-tables::table.cell>
	<div class="justify-content-center d-flex">
		<div class="qr-code-image d-none">
			{!! QrCode::size($row->qr_code_download_size)->format('svg')->generate(route('vcard.show', ['alias' => $row->url_alias])); !!}
		</div>
		<a title="{{ __('messages.vcard.qr_code') }}"
		   class="btn px-1 text-info fs-3 vcard-qr-code-btn" download="qr_code.png">
			<i class="fa-solid fa-qrcode"></i>
		</a>
		<a title="{{ __('messages.vcard.download_vcard') }}"
		   class="btn px-1 text-info fs-3"
		   onclick="downloadVcard('{{ $row->name }}.vcf',{{ $row->id }})">
			<i class="fas fa-download"></i>
		</a>
		@if(route('enquiry.index', $row->id))
			<a title="{{ __('messages.common.view') }}" href="{{route('enquiry.index', $row->id)}}"
			   class="btn px-1 text-info fs-3">
				<i class="fa-solid fa-eye"></i>
			</a>
		@endif
		@if($makeVcard)
			<a href="javascript:void(0)" class="duplicate-vcard-btn btn px-1 text-secondary fs-3"
			   data-id="{{ $row->id }}"
			   title="{{ __('Duplicate VCard') }}">
				<i class="fa-solid fa-copy"></i>
        </a>
            @endif
        <a href="{{ route('vcards.edit', $row->id) }}" title="{{ __('messages.common.edit') }}"
           class="btn px-1 text-primary fs-3">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.common.delete') }}"
           class="btn px-1 text-danger fs-3 vcard_delete-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>

</x-livewire-tables::table.cell>
