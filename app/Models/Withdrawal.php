<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Withdrawal
 * @property int $id
 * @property int $user_id
 * @property int $amount
 * @property int $is_approved
 * @property string|null $rejection_note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereRejectionNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereUserId($value)
 * @mixin \Eloquent
 */
class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'amount',
        'is_approved',
        'rejection_note',
    ];

    protected $casts = [
        'user_id'        => 'integer',
        'email'          => 'string',
        'amount'         => 'integer',
        'is_approved'    => 'integer',
        'rejection_note' => 'string',
    ];

    const INPROCESS = '0';
    const APPROVED = '1';
    const REJECTED = '2';

    const APPROVAL_STATUS = [
        self::INPROCESS => 'In Process',
        self::APPROVED  => 'Approved',
        self::REJECTED  => 'Rejected',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
