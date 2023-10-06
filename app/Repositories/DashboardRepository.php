<?php

namespace App\Repositories;

use App\Models\Enquiry;
use App\Models\Plan;
use App\Models\ScheduleAppointment;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vcard;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CityRepository
 *
 * @version July 31, 2021, 7:41 am UTC
 */
class DashboardRepository
{
    /**
     * @return \App\Models\Builder|User|User[]|\Illuminate\Database\Eloquent\Builder|Collection
     */
    public function getUsers()
    {
        return User::whereHas('roles', function ($q) {
            $q->where('name', '!=', 'super_admin');
        })->get();
    }

    /**
     * @return Vcard[]|Collection
     */
    public function getVcards()
    {
        return Vcard::all();
    }

    /**
     * @return Plan[]|Collection
     */
    public function getPlans()
    {
        return Plan::all();
    }

    /**
     * @return mixed
     */
    public function getVcardsCount()
    {
        return Vcard::where('tenant_id', auth()->user()->tenant_id)->get();
    }

    /**
     * @return mixed
     */
    public function getEnquiryCountAttribute()
    {
        $vcardIds = Vcard::where('tenant_id', auth()->user()->tenant_id)->select('id');

        return Enquiry::whereIn('vcard_id', $vcardIds)->whereDate('created_at', \Carbon\Carbon::today())->count();
    }

    /**
     * @return mixed
     */
    public function getAppointmentCountAttribute()
    {
        $vcardIds = Vcard::where('tenant_id', auth()->user()->tenant_id)->select('id');

        $today = Carbon::now()->format('Y-m-d');

        return ScheduleAppointment::whereIn('vcard_id', $vcardIds)->where('date', $today)->count();
    }

    /**
     * @param $input
     * @return mixed
     */
    public function usersData($input)
    {
        if (isset($input['day'])) {
            $data = User::whereRaw('Date(created_at) = CURDATE()')->orderBy('created_at', 'DESC')
                ->paginate(5);

            return $data;
        }

        if (isset($input['week'])) {
            $now = Carbon::now();
            $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
            $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
            $data = User::whereBetween('created_at', [$weekStartDate, $weekEndDate])
                ->orderBy('created_at', 'DESC')
                ->paginate(5);

            return $data;
        }

        if (isset($input['month'])) {
            $data = User::whereMonth('created_at', Carbon::now()->month)
                ->orderBy('created_at', 'DESC')
                ->paginate(5);

            return $data;
        }
    }

    /**
     * @return array
     */
    public function planChartData()
    {
        $plans = Plan::withCount([
            'subscriptions' => function ($q) {
                $q->where('status', true);
            },
        ])->pluck('subscriptions_count', 'name')->toArray();

        $totalSubsPlan = array_sum($plans);
        $data = [];
        foreach ($plans as $name => $planCount) {
            $data['labels'][] = $name;
            $data['breakDown'][] = number_format($planCount * 100 / $totalSubsPlan, 2);
        }

        return $data;
    }

    /**
     * @return array
     */
    public function incomeChartData(): array
    {
        $manualPayment = Subscription::wherePaymentType('paid')
            ->whereYear('created_at', Carbon::now()->year)->get()
            ->groupBy(function ($q) {
                return Carbon::parse($q->created_at)->isoFormat('MMM');
            });

        $transactions = Transaction::whereStatus(1)
            ->whereYear('created_at', Carbon::now()->year)->get()
            ->groupBy(function ($q) {
                return Carbon::parse($q->created_at)->isoFormat('MMM');
            });

        $data = [];
        $periods = CarbonPeriod::create(Carbon::now()->startOfYear(), '1 month', Carbon::now()->endOfYear());
        $labels = [];
        $dataset = [];
        $colors = [];
        $borderColors = [];
        foreach ($periods as $key => $period) {
            $month = $period->isoFormat('MMM');
            $labels[] = $month;
            $colors[] = getBGColors($key).')';
            $borderColors[] = getBGColors($key).', 0.75)';
            $amounts = isset($transactions[$month])
                ? $transactions[$month]->pluck('amount')->toArray() : [0];
            $amounts = isset($manualPayment[$month])
                ? array_merge($amounts, $manualPayment[$month]->pluck('payable_amount')->toArray()) : $amounts;
            $dataset[] = removeCommaFromNumbers(number_format(array_sum($amounts), 2));
        }

        $data['labels'] = $labels;
        $data['breakDown'][] = [
            'label' => 'Total Amount',
            'data' => $dataset,
            'backgroundColor' => $colors,
            'borderColor' => $borderColors,
            'lineTension' => 0.5,
            'radius' => 4,
        ];

        return $data;
    }
}
