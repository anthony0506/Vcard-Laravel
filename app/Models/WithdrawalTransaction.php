<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'withdrawal_id',
        'paid_by',
        'amount',
        'payment_meta',
    ];

    protected $casts = [
        'withdrawal_id' => 'integer',
        'paid_by'       => 'integer',
        'amount'        => 'integer',
        'payment_meta'  => 'json',
    ];


    const MANUALLY = '0';
    const PAYPAL = '1';

    const PAID_BY = [
        self::MANUALLY => 'Cash',
        self::PAYPAL   => 'Paypal',
    ];

    public function withdrawal(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Withdrawal::class, 'withdrawal_id');
    }
}
