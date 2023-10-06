<?php

namespace App\Http\Controllers;

use App\Http\Requests\createWithdrawAmountRequest;
use App\Jobs\SendWithdrawRequestMailJob;
use App\Models\AffiliateUser;
use App\Models\Withdrawal;
use App\Models\WithdrawalTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliationWithdrawController extends AppBaseController
{

    public function affiliateWithdraw()
    {
        $currentPlan = getCurrentSubscription()->plan;

        if (!$currentPlan->planFeature->affiliation) {
            return redirect()->route('admin.dashboard');
        }

        $currentUserId = Auth::id();
        $totalAmount = AffiliateUser::whereAffiliatedBy($currentUserId)->sum('amount');
        $currentAmount = currentAffiliateAmount($currentUserId);

        return view('user-settings.affiliationWithdraw.index', compact('totalAmount', 'currentAmount'));
    }

    public function withdrawAmount(createWithdrawAmountRequest $request)
    {
        $currentUserId = getLogInUserId();
        $inProcessWithdrawal = Withdrawal::whereUserId($currentUserId)->whereIsApproved(Withdrawal::INPROCESS)->first();
        if ($inProcessWithdrawal) {
            return $this->sendError('Your Last Withdraw Request is pending, you can not add another request.');
        }
        $input = $request->all();

        if ($input['amount'] > currentAffiliateAmount()) {
            return $this->sendError('Your can not withdraw more than your current balance');
        }

        if (getUserSettingValue('paypal_email', $currentUserId) != $input['paypal_email']) {
            return $this->sendError("The Email does not match with your PayPal email.");
        }

        $withdrawal = new Withdrawal();
        $withdrawal->amount = $input['amount'];
        $withdrawal->user_id = $currentUserId;
        $withdrawal->email = $input['paypal_email'];
        $withdrawal->is_approved = Withdrawal::INPROCESS;
        $withdrawal->save();

        return $this->sendResponse($withdrawal, 'Withdraw request sent successfully.');
    }

    public function affiliationWithdraw()
    {

        return view('sadmin.affiliationWithdraw.index');
    }

    public function changeWithdrawalStatus(Request $request, $id, $approval)
    {
        $rejectionNote = $request->rejectionNote;
        $meta = $request->meta;
        $withdrawal = Withdrawal::find($id);
        $withdrawal->update([
            'is_approved'    => $approval,
            'rejection_note' => ($approval == Withdrawal::REJECTED) ? $rejectionNote : null,
        ]);

        if ($approval == Withdrawal::APPROVED) {
            WithdrawalTransaction::create([
                'withdrawal_id' => $withdrawal->id,
                'amount'        => $withdrawal->amount,
                'paid_by'       => $meta ? WithdrawalTransaction::PAYPAL : WithdrawalTransaction::MANUALLY,
                'payment_meta'  => $meta,
            ]);
        }

        SendWithdrawRequestMailJob::dispatch($withdrawal->id, $approval);

        return $this->sendResponse($withdrawal, 'Withdrawal status updated successfully');
    }

    public function withdrawTransaction()
    {
        return view('sadmin.withdrawalTransactions.index');
    }

    public function showAffiliationWithdraw($id)
    {
        $affiliationWithdraw = Withdrawal::with('user')->find($id);
        $affiliationWithdraw['formattedAmount'] = currencyFormat($affiliationWithdraw->amount,2);

        if (isAdmin() && $affiliationWithdraw->user_id !== getLogInUserId()) {
            return $this->sendError('Withdrawal data not found');
        }

        return $this->sendResponse($affiliationWithdraw, 'Withdrawal data retrieved successfully.');
    }
}
