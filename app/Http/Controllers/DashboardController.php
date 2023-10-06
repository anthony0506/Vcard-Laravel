<?php

namespace App\Http\Controllers;

use App\Models\ScheduleAppointment;
use App\Models\User;
use App\Models\Vcard;
use App\Repositories\DashboardRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends AppBaseController
{
    /* @var DashboardRepository */
    private DashboardRepository $dashboardRepository;

    /**
     * @param  DashboardRepository  $dashboardRepo
     */
    public function __construct(DashboardRepository $dashboardRepo)
    {
        $this->dashboardRepository = $dashboardRepo;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $activeUsersCount = User::whereHas('roles', function ($q) {
            $q->where('name', '!=', 'super_admin');
        })->where('is_active', 1)->count();

        $deActiveUsersCount = User::whereHas('roles', function ($q) {
            $q->where('name', '!=', 'super_admin');
        })->where('is_active', 0)->count();

        $enquiry = $this->dashboardRepository->getEnquiryCountAttribute();
        $appointment = $this->dashboardRepository->getAppointmentCountAttribute();

        if (\Request::is('sadmin/dashboard')) {
            $activeVcard = Vcard::whereStatus(1)->count();
            $deActiveVcard = Vcard::whereStatus(0)->count();

            return view('dashboard.index', compact('activeUsersCount', 'deActiveUsersCount', 'activeVcard', 'deActiveVcard', ));
        }

        $activeVcard = Vcard::whereTenantId(auth()->user()->tenant_id)->whereStatus(1)->count();
        $deActiveVcard = Vcard::whereTenantId(auth()->user()->tenant_id)->whereStatus(0)->count();

        return view('dashboard.index', compact('enquiry', 'appointment', 'activeVcard', 'deActiveVcard'));
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function getUsersList(Request $request): JsonResponse
    {
        $input = $request->all();

        $data['users'] = $this->dashboardRepository->usersData($input);

        return $this->sendResponse($data, 'Users retrieved successfully.');
    }

    public function appointments(): JsonResponse
    {
        $vcardIds = Vcard::toBase()->whereTenantId(getLogInTenantId())->pluck('id')->toArray();

        $today = Carbon::now()->format('Y-m-d');

        $appointments = ScheduleAppointment::with('vcard')->whereIn('vcard_id', $vcardIds)->where('date',
            $today)->orderBy('created_at', 'DESC')
            ->paginate(5);

        return $this->sendResponse($appointments, 'Appointment retrieved successfully.');
    }

    /**
     * @return JsonResponse
     */
    public function planChartData(): JsonResponse
    {
        $data = $this->dashboardRepository->planChartData();

        return $this->sendResponse($data, 'Plan chart data fetch successfully.');
    }

    /**
     * @return JsonResponse
     */
    public function incomeChartData(): JsonResponse
    {
        $data = $this->dashboardRepository->incomeChartData();

        return $this->sendResponse($data, 'Income chart data fetch successfully.');
    }
}
