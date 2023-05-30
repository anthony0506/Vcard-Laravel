@if ($showSearch)
    <div class="mb-3 mb-sm-0">
        <form class="d-flex position-relative">
            <div class="position-relative d-flex width-320">
                              <span
                                  class="position-absolute d-flex align-items-center top-0 bottom-0 left-0 text-gray-600 ms-3">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                <input class="form-control ps-8" wire:model{{ $this->searchFilterOptions }}="filters.search" type="search" placeholder="{{__('auth.app.search')}}" aria-label="Search">
            </div>
        </form>
        @if (isset($filters['search']) && strlen($filters['search']))
        @endif
    </div>
@endif
