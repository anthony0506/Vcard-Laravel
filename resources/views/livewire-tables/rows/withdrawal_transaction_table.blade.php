<x-livewire-tables::table.cell>
    <div class="d-flex align-items-center">
        <a href="{{ route('users.show', $row->withdrawal->user->id)}}">
            <div class="image image-circle image-mini me-3">
                <img src="{{$row->withdrawal->user->profile_image}}" alt="user" class="user-img">
            </div>
        </a>
        <div class="d-flex flex-column">
            <a href="{{route('users.show' ,$row->withdrawal->user->id)}}"
               class="mb-1 text-decoration-none fs-6">
                {!! $row->withdrawal->user->full_name !!}
            </a>
            <span class="fs-6">{{$row->withdrawal->user->email}}</span>
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <span class="badge bg-success me-2">
       {{ currencyFormat($row->amount,2) }}
    </span>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <span class="badge bg-primary me-2">
       {{ \App\Models\WithdrawalTransaction::PAID_BY[$row->paid_by] }}
    </span>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <span class="badge bg-secondary me-2">
       {{ Carbon\Carbon::parse($row->created_at)->isoFormat('Do MMM, YYYY') }}
    </span>
</x-livewire-tables::table.cell>
