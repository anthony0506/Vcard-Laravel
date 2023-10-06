<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Transaction;
use App\Repositories\SubscriptionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class RazorpayController extends AppBaseController
{
    /**
     * @var SubscriptionRepository
     */
    private $subscriptionRepository;

    /**
     * @param  SubscriptionRepository  $subscriptionRepository
     */
    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function onBoard(Request $request)
    {
        $data = $this->subscriptionRepository->manageSubscription($request->all());

        $subscription = $data['subscription'];
        $api = new Api(getSelectedPaymentGateway('razorpay_key'), getSelectedPaymentGateway('razorpay_secret'));
        $orderData = [
            'receipt'  => 1,
            'amount'   => $data['amountToPay'] * 100,
            'currency' => $subscription->plan->currency->currency_code,
            'notes'    => [
                'email'          => Auth::user()->email,
                'name'           => Auth::user()->full_name,
                'subscriptionId' => $subscription->id,
                'amountToPay'    => $data['amountToPay'],
            ],
        ];

        session(['payment_type' => request()->get('payment_type')]);

        $razorpayOrder = $api->order->create($orderData);
        $data['id'] = $razorpayOrder->id;
        $data['amount'] = $data['amountToPay'];
        $data['name'] = Auth::user()->full_name;
        $data['email'] = Auth::user()->email;
        $data['contact'] = Auth::user()->contact;

        return $this->sendResponse($data, 'Order created successfully');
    }

    /**
     * @param  Request  $request
     * @return false|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function paymentSuccess(Request $request)
    {
        $input = $request->all();
        Log::info('RazorPay Payment Successfully');
        Log::info($input);
        $api = new Api(getSelectedPaymentGateway('razorpay_key'), getSelectedPaymentGateway('razorpay_secret'));
        if (count($input) && ! empty($input['razorpay_payment_id'])) {
            try {
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                $generatedSignature = hash_hmac('sha256', $payment['order_id'].'|'.$input['razorpay_payment_id'],
                    getSelectedPaymentGateway('razorpay_secret'));
                if ($generatedSignature != $input['razorpay_signature']) {
                    return redirect()->back();
                }
                // Create Transaction Here

                $subscriptionID = $payment['notes']['subscriptionId'];
                $amountToPay = $payment['notes']['amountToPay'];
                $subscription = Subscription::findOrFail($subscriptionID);

                Subscription::findOrFail($subscriptionID)->update(['status' => Subscription::ACTIVE]);
                // De-Active all other subscription
                Subscription::whereTenantId(getLogInTenantId())
                    ->where('id', '!=', $subscriptionID)
                    ->update([
                        'status' => Subscription::INACTIVE,
                    ]);

                $transaction = Transaction::create([
                    'tenant_id' => $subscription->tenant_id,
                    'transaction_id' => $payment->id,
                    'type' => session('payment_type'),
                    'amount' => $amountToPay,
                    'status' => Subscription::ACTIVE,
                    'meta' => json_encode($payment->toArray()),
                ]);

                $subscription = Subscription::findOrFail($subscriptionID);
                $subscription->update(['transaction_id' => $transaction->id]);

                return view('sadmin.plans.payment.paymentSuccess');
            } catch (Exception $e) {
                return false;
            }
        }

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function paymentFailed()
    {
        return view('sadmin.plans.payment.paymentcancel');
    }
}
