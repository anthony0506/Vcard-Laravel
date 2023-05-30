<?php

namespace App\Jobs;

use App\Models\Withdrawal;
use App\Repositories\WithdrawalRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWithdrawRequestMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $withdrawalId;
    protected int $isApproved;

    /**
     * Create a new job instance.
     * @return void
     */
    public function __construct($withdrawalId, $isApproved)
    {
        $this->withdrawalId = $withdrawalId;
        $this->isApproved = $isApproved;
    }

    /**
     * Execute the job.
     * @return void
     */
    public function handle()
    {
        $withdrawal = Withdrawal::with('user')->find($this->withdrawalId);
        $withdrawalRepo = App(WithdrawalRepository::class);
        if ($this->isApproved == Withdrawal::APPROVED) {
            $withdrawalRepo->SendWithdrawalApprovedMail($withdrawal);
        } else {
            $withdrawalRepo->SendWithdrawalRejectedMail($withdrawal);
        }
    }
}
