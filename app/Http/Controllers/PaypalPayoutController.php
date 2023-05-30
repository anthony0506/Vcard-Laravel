<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use PaypalPayoutsSDK\Core\PayPalHttpClient;
use PaypalPayoutsSDK\Core\ProductionEnvironment;
use PaypalPayoutsSDK\Core\SandboxEnvironment;
use PaypalPayoutsSDK\Payouts\PayoutsPostRequest;

class PaypalPayoutController extends AppBaseController
{
    public function payout(Request $request)
    {
        $withdrawal = Withdrawal::find($request->get('withdrawalId'));
        $referenceId = $withdrawal->id;
        $email = $withdrawal->email;
        $amount = $withdrawal->amount;
        $currency = getSuperAdminSettingValue('default_currency');

        $clientId = getSelectedPaymentGateway('paypal_client_id');
        $clientSecret = getSelectedPaymentGateway('paypal_secret');
        $mode = getenv('PAYPAL_MODE');

        if ($mode == 'live') {
            $environment = new ProductionEnvironment($clientId, $clientSecret);
        } else {
            $environment = new SandboxEnvironment($clientId, $clientSecret);
        }

        if (json_encode($currency) != null && ! in_array(strtoupper(json_encode($currency)),
                getPayPalSupportedCurrencies())) {
            return $this->sendError(__('messages.placeholder.this_currency_is_not_supported'));
        }

        $client = new PayPalHttpClient($environment);
        $request = new PayoutsPostRequest();

        $note = "Your ".currencyFormat($amount,2)." Payout";
        $body = json_decode(
            '{
                "sender_batch_header":
                {
                  "email_subject": "SDK payouts test txn"
                },
                "items": [
                {
                  "recipient_type": "EMAIL",
                  "receiver": '.json_encode($email).',
                  "note": "'.$note.'",
                  "sender_item_id": '.json_encode($referenceId).',
                  "amount":
                  {
                    "currency": '.json_encode($currency).',
                    "value": '.json_encode($amount).'
                  }
                }]
              }',
            true);
        $request->body = $body;
        $response = $client->execute($request);

        return $this->sendResponse($response, __('messages.placeholder.withdrawal_request_send'));
    }
}
