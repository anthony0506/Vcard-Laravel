<?php

namespace App\Repositories;

use App\Mail\SendWithdrawalRequestChangedMail;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Mail;

/**
 * Class UserRepository
 */
class WithdrawalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'is_approved',
        'amount',
        'user_id',
    ];


    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return Withdrawal::class;
    }

    public function SendWithdrawalApprovedMail($withdrawal)
    {

        $data['toName'] = $withdrawal->user->full_name;
        $data['amount'] = $withdrawal->amount;
        $subject = 'Withdrawal Request Approved';
        $mailview = 'emails.withdrawal_approved_mail';
        Mail::to($withdrawal->user->email)->send(new SendWithdrawalRequestChangedMail($data, $subject, $mailview));
    }

    public function SendWithdrawalRejectedMail($withdrawal)
    {

        $data['toName'] = $withdrawal->user->full_name;
        $data['amount'] = $withdrawal->amount;
        $data['rejectionNote'] = $withdrawal->rejection_note;
        $subject = 'Withdrawal Request Rejected';
        $mailview = 'emails.withdrawal_rejected_mail';
        Mail::to($withdrawal->user->email)->send(new SendWithdrawalRequestChangedMail($data, $subject, $mailview));
    }
}
