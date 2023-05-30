<?php

namespace App\Http\Livewire;

use App\Models\ScheduleAppointment;
use App\Models\Vcard;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ScheduleAppointmentTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    public string $primaryKey = 'schedule_appointment_id';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'changeFilterStatus', 'resetPageTable'];

    protected string $pageName = 'schedule-appointment-table';

    public int $typeFilter = ScheduleAppointment::ALL;

    public int $statusFilter = ScheduleAppointment::STATUS_ALL;

    public function columns(): array
    {
        return [
            Column::make(__('messages.vcard.vcard_name'), 'vcard.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Vcard::select('name')->whereColumn('id', 'vcard_id'),
                        $direction);
                })->searchable(),
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.common.email'), 'email')
                ->sortable()->searchable(),
            Column::make(__('messages.common.phone'), 'phone')
                ->sortable()->searchable(),
            Column::make(__('messages.mail.appointment_time'), 'date')
                ->sortable()->searchable(),
            Column::make(__('messages.common.status'), 'status')
                ->sortable()->addClass('w-100px'),
            Column::make(__('messages.common.type'), 'id')->addClass('w-100px'),
            Column::make(__('messages.common.action'), 'id')->addClass('text-center'),
        ];
    }

    public function changeFilter($value)
    {
        $this->typeFilter = $value;
    }

    public function changeFilterStatus($value)
    {
        $this->statusFilter = $value;
    }

    public function query(): Builder
    {
        $vcardIds = Vcard::whereTenantId(getLogInTenantId())->pluck('id')->toArray();

        $scheduleAppointments = ScheduleAppointment::with('vcard')->whereIn('vcard_id', $vcardIds);

        if (isset($this->typeFilter) && $this->typeFilter != ScheduleAppointment::ALL) {
            return $this->typeFilter == ScheduleAppointment::PAID
                ? $scheduleAppointments->whereNotNull('appointment_tran_id')
                : $scheduleAppointments->whereNull('appointment_tran_id');
        }
        if (isset($this->statusFilter) && $this->statusFilter != ScheduleAppointment::ALL) {
            return $this->statusFilter == ScheduleAppointment::COMPLETED
                ? $scheduleAppointments->where('status', ScheduleAppointment::COMPLETED)
                : $scheduleAppointments->where('status', ScheduleAppointment::PENDING);
        }

        return $scheduleAppointments;
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.schedule_appointment_table';
    }

    public function render()
    {
        $types = ScheduleAppointment::TYPES;
        $status = ScheduleAppointment::STATUS;

        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns' => $this->columns(),
                'rowView' => $this->rowView(),
                'filtersView' => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows' => $this->rows,
                'modalsView' => $this->modalsView(),
                'bulkActions' => $this->bulkActions,
                'componentName' => 'appointment.calander-button',
                'filterComponent' => 'appointment.type-filter',
                'types' => $types,
                'status' => $status,
            ]);
    }

    public function resetPageTable($pageName = 'user-table')
    {
        $this->customResetPage($pageName);
    }
}
