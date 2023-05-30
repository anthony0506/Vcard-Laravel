<?php

namespace App\Http\Controllers;

use App\Mail\ManualPaymentGuideMail;
use App\Mail\SuperAdminManualPaymentMail;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\Subscription;
use App\Repositories\SubscriptionRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;
use Stripe\Exception\ApiErrorException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class SubscriptionController extends AppBaseController
{
    private SubscriptionRepository $subscriptionRepo;

    /**
     * @param SubscriptionRepository $subscriptionRepo
     */
    public function __construct(SubscriptionRepository $subscriptionRepo)
    {
        $this->subscriptionRepo = $subscriptionRepo;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $currentPlan = getCurrentSubscription();

        $days = $remainingDay = '';
        if ($currentPlan->ends_at > Carbon::now()) {
            $days = Carbon::parse($currentPlan->ends_at)->diffInDays();
            $remainingDay = $days.' Days';
        }

        if ($days >= 30 && $days <= 365) {
            $remainingDay = '';
            $months = floor($days / 30);
            $extraDays = $days % 30;
            if ($extraDays > 0) {
                $remainingDay .= $months.' Month '.$extraDays.' Days';
            } else {
                $remainingDay .= $months.' Month ';
            }
        }

        if ($days >= 365) {
            $remainingDay = '';
            $years = floor($days / 365);
            $extraMonths = floor($days % 365 / 30);
            $extraDays = floor($days % 365 % 30);
            if ($extraMonths > 0 && $extraDays < 1) {
                $remainingDay .= $years.' Years '.$extraMonths.' Month ';
            } elseif ($extraDays > 0 && $extraMonths < 1) {
                $remainingDay .= $years.' Years '.$extraDays.' Days';
            } elseif ($years > 0 && $extraDays > 0 && $extraMonths > 0) {
                $remainingDay .= $years.' Years '.$extraMonths.' Month '.$extraDays.' Days';
            } else {
                $remainingDay .= $years.' Years ';
            }
        }

        return view('subscription.index', compact('currentPlan', 'remainingDay'));
    }

    public function choosePaymentType($planId, $context = null, $fromScreen = null)
    {

        // code for checking the current plan is active or not, if active then it should not allow to choose that plan
        $subscriptionsPricingPlan = Plan::findOrFail($planId);
        $paymentTypes = getPaymentGateway();

        return view('subscription.payment_for_plan', compact('subscriptionsPricingPlan', 'paymentTypes'));
    }

    /**
     * @return Application|Factory|View
     */
    public function upgrade()
    {
        $plans = Plan::with(['currency', 'planFeature'])
            ->get();

        $monthlyPlans = $plans->where('frequency', Plan::MONTHLY);
        $yearlyPlans = $plans->where('frequency', Plan::YEARLY);
        $unLimitedPlans = $plans->where('frequency', Plan::UNLIMITED);

        return view('subscription.upgrade',
            compact('monthlyPlans', 'yearlyPlans', 'unLimitedPlans'));
    }

    /**
     * @param Plan $plan
     * @return JsonResponse
     */
    public function setPlanZero(Plan $plan): JsonResponse
    {
        try {
            DB::beginTransaction();

            Subscription::whereTenantId(getLogInTenantId())
                ->whereIsActive(true)->update(['is_active' => false]);

            $expiryDate = setExpiryDate($plan);
            Subscription::create([
                'plan_id' => $plan->id,
                'ends_at' => $expiryDate,
                'status'  => true,
            ]);

            DB::commit();

            return $this->sendSuccess(__('messages.placeholder.subscribed_plan'));
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param Request $request
     */
    public function manualPay(Request $request)
    {
        $input = $request->all();
        if (isset($input['attachment']) && $input['attachment']->getClientMimeType() == 'text/php') {

            return $this->sendError('PHP file is not valid type for attachment');
        }
        $this->subscriptionRepo->manageSubscription($input);
        $data = Subscription::whereTenantId(getLogInTenantId())->orderBy('created_at', 'desc')->first();
        Subscription::whereId($data->id)->update(['payment_type' => 'Cash']);
        $is_on = Setting::where('key', 'is_manual_payment_guide_on')->first();
        $manual_payment_guide_step = Setting::where('key', 'manual_payment_guide')->first();
        $user = \Illuminate\Support\Facades\Auth::user();
        $super_admin_data = [
            'super_admin_msg' => $user->full_name.' created request for payment of '.$data->plan->currency->currency_icon.''.$data->payable_amount,
            'attachment'      => $data->attachment ?? "",
            'notes'           => $data->notes ?? "",
            'id'              => $data->id,
        ];

        if ($is_on['value'] == '1') {
            Mail::to($user['email'])
                ->send(new ManualPaymentGuideMail($manual_payment_guide_step['value'], $user));

            Mail::to('sadmin@vcard.com')
                ->send(new SuperAdminManualPaymentMail($super_admin_data, 'sadmin@vcard.com'));
        }

        return $this->sendSuccess(__('messages.placeholder.subscribed_plan_wait'));
    }

    public function downloadAttachment($id): \Illuminate\Http\Response|Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $subscription = Subscription::findOrFail($id);

        [$file, $headers] = $this->subscriptionRepo->downloadAttachment($subscription);

        return response($file, 200, $headers);
    }
    
    public function downloadMailAttachment($id)
    {
        $subscription = Subscription::whereTenantId(getLogInTenantId())->findOrFail($id);
        
        $headers = [
            'Content-Type' => $subscription->media[0]->mime_type,
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "attachment; filename={$subscription->media[0]->file_name}",
            'filename' => $subscription->media[0]->file_name,
        ];
        
        return response()->download($subscription->media[0]->getPath(), $subscription->media[0]->file_name, $headers);
    }

    /**
     * @return Application|Factory|View
     */
    public function cashPlan()
    {
        return view('sadmin.planPyment.index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function planStatus(Request $request)
    {
        Subscription::whereTenantId($request->tenant_id)
            ->where('id', '!=', $request->id)
            ->update(['status' => 0]);

        Subscription::where('id', $request->id)->update([
            'status'       => 1,
            'payment_type' => 'paid',
        ]);

        return $this->sendSuccess(__('messages.placeholder.payment_received'));
    }

    public function purchaseSubscription(Request $request)
    {
        $input = $request->all();
        $result = $this->subscriptionRepo->purchaseSubscriptionForStripe($input);
        // returning from here if the plan is free.
        if (isset($result['status']) && $result['status'] == true) {
            return $this->sendSuccess($result['subscriptionPlan']->name.' '.__('messages.subscription.has_been_subscribed'));
        } else {
            if (isset($result['status']) && $result['status'] == false) {
                return $this->sendError(__('messages.placeholder.cannot_switch_to_zero'));
            }
        }

        return $this->sendResponse($result, 'Session created successfully.');
    }

    /**
     * @param Request $request
     * @throws ApiErrorException
     * @return Application|Factory|View
     *
     */
    public function paymentSuccess(Request $request)
    {
        /** @var SubscriptionRepository $subscriptionRepo */
        $subscriptionRepo = app(SubscriptionRepository::class);
        $subscription = $subscriptionRepo->paymentUpdate($request);
        Flash::success($subscription->plan->name.' '.__('messages.subscription.has_been_subscribed'));

        return view('sadmin.plans.payment.paymentSuccess');
    }

    /**
     * @return Application
     */
    public function handleFailedPayment()
    {
        $subscriptionPlanId = session('subscription_plan_id');
        /** @var SubscriptionRepository $subscriptionRepo */
        $subscriptionRepo = app(SubscriptionRepository::class);
        $subscriptionRepo->paymentFailed($subscriptionPlanId);
        Flash::error(__('messages.placeholder.unable_to_process_payment'));

        return view('sadmin.plans.payment.paymentcancel');
    }

    /**
     * @return Application|Factory|View
     */
    public function userSubscribedPlan()
    {
        return view('sadmin.subscriptionPlan.index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function userSubscribedPlanEdit(Request $request): JsonResponse
    {
        $subscription = Subscription::with([
            'plan:id,name,currency_id', 'tenant.user', 'plan.currency',
        ])->whereId($request->id)->first();

        return $this->sendResponse($subscription, 'Subscription successfully retrieved.');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function userSubscribedPlanUpdate(Request $request)
    {
        $subscription = Subscription::where('id', $request->id)->update([
            'ends_at' => $request->end_date,
            'status'  => Subscription::ACTIVE,
        ]);

        return $this->sendResponse($subscription, __('messages.placeholder.subscription_date_updated'));
    }
}
