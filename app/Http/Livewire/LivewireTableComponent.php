<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;

/**
 * Class LivewireTableComponent
 */
class LivewireTableComponent extends DataTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public bool $showSearch = true;

    public bool $showPerPage = true;

    public bool $showSorting = false;

    public string $emptyMessage = ('messages.common.no_data_available');

    public $headerTopClass = 'p-0';

    public function columns(): array
    {
        // TODO: Implement columns() method.
    }

    public function query()
    {
        // TODO: Implement query() method.
    }

    /**
     * @param  string  $field
     * @return string|null
     */
    public function sortBy(string $field): ?string
    {
        if (! $this->sortingEnabled) {
            return null;
        }

        if ($this->singleColumnSorting && count($this->sorts) && ! isset($this->sorts[$field])) {
            $this->sorts = [];
        }

        if (! isset($this->sorts[$field])) {
            $this->resetSorts();

            return $this->sorts[$field] = 'asc';
        }

        if ($this->sorts[$field] === 'asc') {
            $this->resetSorts();

            return $this->sorts[$field] = 'desc';
        }
        if ($this->sorts[$field] === '1') {
            $this->resetSorts();

            return $this->sorts[$field] = '0';
        }

        unset($this->sorts[$field]);

        return null;
    }

    public function mountWithPerPagePagination(): void
    {
        if ($this->perPageAll) {
            $this->perPageAccepted[] = -1;
        }

        $this->perPage = $this->perPageAccepted[0] ?? 10;
    }

    public function customResetPage($pageName)
    {
        $rowsPropertyData = $this->getRowsProperty()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }
}
