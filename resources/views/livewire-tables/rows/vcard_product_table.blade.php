<x-livewire-tables::table.cell>
    <div class="d-flex align-items-center">
        <a href="javascript:void(0)">
            <div class="image image-circle image-mini me-3">
                <img src="{{ $row->product_icon}}" alt="product image" class="user-img">
            </div>
        </a>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{$row->name}}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if($row->product_url != null)
        <a href="{{ $row->product_url }}" id="productUrl{{ $row->id }}"
           target="_blank" class="text-decoration-none fs-6 product_url">{{ $row->product_url }}</a>
    @else
        N/A
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if($row->currency_id && $row->price != null)
		{{ currencyFormat($row->price,0,$row->currency->currency_code) }}
    @elseif($row->price != null)
    {{number_format($row->price)}}
    @else
        <!-- N/A -->
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="justify-content-center d-flex">
    <a title="{{__('messages.common.view')}}" class="btn px-1 text-info product-view-btn fs-3" href="javascript:void(0)"
       data-id="{{$row->id}}">
        <i class="fa-solid fa-eye"></i>
    </a>
    
    <a href="javascript:void(0)" class="btn px-1 text-primary product-edit-btn fs-3"
       data-id="{{$row->id}}" title="{{__('messages.common.edit')}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    
    <a href="#" title="<?php echo __('messages.common.delete'); ?>" data-id="{{$row->id}}"
       class="product-delete-btn btn px-1 text-danger fs-3">
        <i class="fa-solid fa-trash"></i>
    </a>
    </div>
</x-livewire-tables::table.cell>
