<?php

namespace App\Http\Controllers;

use App\Models\AffiliateUser;
use App\Models\User;
use App\Models\Appointment;
use App\Models\AppointmentTransaction;
use App\Models\Currency;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\Vcard;
use App\Repositories\AppointmentRepository;
use App\Repositories\SubscriptionRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class PaypalController extends AppBaseController
{
    /**
     * @var SubscriptionRepository
     */
    private SubscriptionRepository $subscriptionRepository;

    /**
     * @param SubscriptionRepository $subscriptionRepository
     */
    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * @param Request $request
     * @throws Throwable
     * @throws HttpException
     * @return JsonResponse
     *
     */
    public function onBoard(Request $request)
    {
        $current_user = Auth::user();
        return  response()->json($current_user);

        $plan = Plan::with('currency')->findOrFail($request->planId);

        if ($plan->currency->currency_code != null && ! in_array(strtoupper($plan->currency->currency_code),
                getPayPalSupportedCurrencies())) {
            return $this->sendError(__('messages.placeholder.this_currency_is_not_supported'));
        }

        $data = $this->subscriptionRepository->manageSubscription($request->all());

        if (! isset($data['plan'])) { // 0 amount plan or try to switch the plan if it is in trial mode
            // returning from here if the plan is free.
            if (isset($data['status']) && $data['status'] == true) {
                return $this->sendSuccess($data['subscriptionPlan']->name.' '.__('messages.subscription_pricing_plans.has_been_subscribed'));
            } else {
                if (isset($data['status']) && $data['status'] == false) {
                    return $this->sendError(__('messages.placeholder.cannot_switch_to_zero'));
                }
            }
        }

        $subscriptionsPricingPlan = $data['plan'];
        $subscription = $data['subscription'];

        $mode = getSelectedPaymentGateway('paypal_mode');
        $clientId = getSelectedPaymentGateway('paypal_client_id');
        $clientSecret = getSelectedPaymentGateway('paypal_secret');

        config([
            'paypal.mode'                  => $mode,
            'paypal.sandbox.client_id'     => $clientId,
            'paypal.sandbox.client_secret' => $clientSecret,
            'paypal.live.client_id'        => $clientId,
            'paypal.live.client_secret'    => $clientSecret,
        ]);

        $provider = new PayPalClient();
        $provider->getAccessToken();

        $data = [
            'intent'              => 'CAPTURE',
            'purchase_units'      => [
                [
                    'reference_id' => $subscription->id,
                    'amount'       => [
                        'value'         => $data['amountToPay'],
                        'currency_code' => $subscription->plan->currency->currency_code,
                    ],
                ],
            ],
            'application_context' => [
                'cancel_url' => route('paypal.failed'),
                'return_url' => route('paypal.success'),
            ],
        ];

        $order = $provider->createOrder($data);

        return response()->json(['link' => $order['links'][1]['href'], 'status' => 200]);

    }

    /**
     * @param $userId
     * @param $vcard
     * @param $input
     * @throws HttpException
     * @throws HttpException|Throwable
     * @return JsonResponse
     *
     */
    public function userOnBoard($userId, $vcard, $input): JsonResponse
    {
        $amount = $input['amount'];
        $currencyCode = $input['currency_code'];

        $mode = getSelectedPaymentGateway('paypal_mode');
        $clientId = getSelectedPaymentGateway('paypal_client_id');
        $clientSecret = getSelectedPaymentGateway('paypal_secret');

        config([
            'paypal.mode'                  => $mode,
            'paypal.sandbox.client_id'     => $clientId,
            'paypal.sandbox.client_secret' => $clientSecret,
            'paypal.live.client_id'        => $clientId,
            'paypal.live.client_secret'    => $clientSecret,
        ]);

        $provider = new PayPalClient();
        $provider->getAccessToken();

        $data = [
            'intent'              => 'CAPTURE',
            'purchase_units'      => [
                [
                    'reference_id' => $vcard->id,
                    'amount'       => [
                        'value'         => $amount,
                        'currency_code' => $currencyCode,
                    ],
                ],
            ],
            'application_context' => [
                'cancel_url' => route('user.paypal.failed'),
                'return_url' => route('user.paypal.success'),
            ],
        ];

        $order = $provider->createOrder($data);
        session()->put(['appointment_details' => $input]);
        session(['vcard_user_id' => $userId, 'tenant_id' => $vcard->tenant->id, 'vcard_id' => $vcard->id]);


        return response()->json(['link' => $order['links'][1]['href'], 'status' => 200]);
    }

    /**
     * @param Request $request
     * @throws IOException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface|Throwable
     * @return Application|RedirectResponse|Redirector|void
     *
     */
    public function userSuccess(Request $request)
    {
        $userId = session()->get('vcard_user_id');
        $clientId = getUserSettingValue('paypal_client_id', $userId);
        $clientSecret = getUserSettingValue('paypal_secret', $userId);
        $mode = getUserSettingValue('paypal_mode', $userId);
        $mode = getUserSettingValue('paypal_mode', $userId);
        $currencyCode = Currency::whereId(getUserSettingValue('currency_id', $userId))->first();
        $config = [
            'mode'           => $mode, // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            $mode            => [
                'client_id'     => $clientId,
                'client_secret' => $clientSecret,
            ],
            'payment_action' => config('paypal.payment_action'), // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => $currencyCode->currency_code,
            'notify_url'     => config('paypal.notify_url'), // Change this accordingly for your application.
            'locale'         => config('paypal.locale'),
            // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => config('paypal.validate_ssl'), // Validate SSL when creating api client.
        ];

        $provider = new PayPalClient;
        $provider->getAccessToken();
        $token = $request->get('token');
        $orderInfo = $provider->showOrderDetails($token);
        try {
            // Call API with your client and get a response for your call
            $response = $provider->capturePaymentOrder($token);
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            $vcardId = $response['purchase_units'][0]['reference_id'];
            $tenantId = session()->get('tenant_id');
            $amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $currencyCode = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $currencyId = Currency::whereCurrencyCode($currencyCode)->first()->id;
            $transactionId = $response['id'];
            $vcard = Vcard::with('tenant.user')->where('id', $vcardId)->first();

            $transactionDetails = [
                'vcard_id'       => $vcardId,
                'transaction_id' => $transactionId,
                'currency_id'    => $currencyId,
                'amount'         => $amount,
                'tenant_id'      => $tenantId,
                'type' => Appointment::PAYPAL,
                'status' => Transaction::SUCCESS,
                'meta' => json_encode($response),
            ];

            $appointmentTran = AppointmentTransaction::create($transactionDetails);
            $appointmentInput = session()->get('appointment_details');
            session()->forget('appointment_details');
            $appointmentInput['appointment_tran_id'] = $appointmentTran->id;

            /** @var AppointmentRepository $appointmentRepo */
            $appointmentRepo = App::make(AppointmentRepository::class);
            $vcardEmail = is_null($vcard->email) ? $vcard->tenant->user->email : $vcard->email;
            $appointmentRepo->appointmentStoreOrEmail($appointmentInput, $vcardEmail);

            session()->forget(['vcard_user_id', 'tenant_id', 'vcard_id']);

            Flash::success(__('messages.placeholder.payment_done'));

            return redirect(route('vcard.show', [$vcard->url_alias, __('messages.placeholder.appointment_created')]));


        } catch (HttpException $ex) {
            print_r($ex->getMessage());
        }
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function userFailed()
    {
        $vcardId = session('vcard_id');
        $vcard = Vcard::findOrFail($vcardId);
        session()->forget('appointment_details');
        session()->forget(['vcard_user_id', 'tenant_id', 'vcard_id']);

        Flash::error('Your Payment is Cancelled');

        return redirect(route('vcard.show', $vcard->url_alias));
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View|void
     *
     * @throws IOException
     */
    public function success(Request $request)
    {

        $mode = getSelectedPaymentGateway('paypal_mode');
        $clientId = getSelectedPaymentGateway('paypal_client_id');
        $clientSecret = getSelectedPaymentGateway('paypal_secret');

        config([
            'paypal.mode'                  => $mode,
            'paypal.sandbox.client_id'     => $clientId,
            'paypal.sandbox.client_secret' => $clientSecret,
            'paypal.live.client_id'        => $clientId,
            'paypal.live.client_secret'    => $clientSecret,
        ]);


        $provider = new PayPalClient;
        $provider->getAccessToken();
        $token = $request->get('token');
        $orderInfo = $provider->showOrderDetails($token);


        try {
            // Call API with your client and get a response for your call
            $response = $provider->capturePaymentOrder($token);
            $subscriptionId = $response['purchase_units'][0]['reference_id'];
            $subscriptionAmount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $transactionID = $response['id'];     // $response->result->id gives the orderId of the order created above

            Subscription::findOrFail($subscriptionId)->update(['status' => Subscription::ACTIVE]);
            // De-Active all other subscription
            Subscription::whereTenantId(getLogInTenantId())
                ->where('id', '!=', $subscriptionId)
                ->update([
                    'status' => Subscription::INACTIVE,
                ]);

            $transaction = Transaction::create([
                'transaction_id' => $transactionID,
                'type'           => Transaction::PAYPAL,
                'amount'         => $subscriptionAmount,
                'status'         => Subscription::ACTIVE,
                'meta'           => json_encode($response),
            ]);

            // updating the transaction id on the subscription table
            $subscription = Subscription::findOrFail($subscriptionId);
            $subscription->update(['transaction_id' => $transaction->id]);

            // Affiliate fee set part 
            $current_user = Auth::user();
            $current_user_referral_code = $current_user['referral_code'];
            $referral_user = '';
            if ($current_user_referral_code) {
                $referral_user = User::where('affiliate_code', $current_user_referral_code)->first();
            }

            if ($referral_user && $current_user['is_paid'] == 0) {
                $affiliateUser = new AffiliateUser();
                $affiliateUser->affiliated_by = $referral_user->id;
                $affiliateUser->user_id = $current_user->id;
                $affiliateUser->amount = getSuperAdminSettingValue('affiliation_amount');
                $affiliateUser->save();

                $current_user['is_paid'] = 1;
                $current_user->save();
            }

            return view('sadmin.plans.payment.paymentSuccess');
        } catch (HttpException $ex) {
            print_r($ex->getMessage());
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function failed()
    {
        return view('sadmin.plans.payment.paymentcancel');
    }
}
