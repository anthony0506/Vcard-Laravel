<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\ScheduleAppointment
 *
 * @property int $id
 * @property int $vcard_id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string $date
 * @property string $from_time
 * @property string $to_time
 * @property int|null $status
 * @property int|null $appointment_tran_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\AppointmentTransaction|null $appointmentTransaction
 * @property-read string $paid_amount
 * @property-read \App\Models\Vcard $vcard
 *
 * @method static Builder|ScheduleAppointment newModelQuery()
 * @method static Builder|ScheduleAppointment newQuery()
 * @method static Builder|ScheduleAppointment query()
 * @method static Builder|ScheduleAppointment whereAppointmentTranId($value)
 * @method static Builder|ScheduleAppointment whereCreatedAt($value)
 * @method static Builder|ScheduleAppointment whereDate($value)
 * @method static Builder|ScheduleAppointment whereEmail($value)
 * @method static Builder|ScheduleAppointment whereFromTime($value)
 * @method static Builder|ScheduleAppointment whereId($value)
 * @method static Builder|ScheduleAppointment whereName($value)
 * @method static Builder|ScheduleAppointment wherePhone($value)
 * @method static Builder|ScheduleAppointment whereStatus($value)
 * @method static Builder|ScheduleAppointment whereToTime($value)
 * @method static Builder|ScheduleAppointment whereUpdatedAt($value)
 * @method static Builder|ScheduleAppointment whereVcardId($value)
 * @mixin Eloquent
 */
class ScheduleAppointment extends Model
{
    use HasFactory;

    protected $table = 'schedule_appointments';

    protected $fillable = [
        'name',
        'email',
        'date',
        'phone',
        'from_time',
        'to_time',
        'vcard_id',
        'appointment_tran_id',
        'status',
    ];

    protected $casts = [
        'name'                => 'string',
        'email'               => 'string',
        'date'                => 'string',
        'phone'               => 'string',
        'from_time'           => 'string',
        'to_time'             => 'string',
        'vcard_id'            => 'integer',
        'appointment_tran_id' => 'integer',
        'status'              => 'integer',
    ];
    
    public static $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email:filter',
        'phone' => 'nullable|numeric|min:0',
    ];

    const FREE = 0;

    const PAID = 1;

    const ALL = 3;

    const TYPES = [
        self::ALL => 'All',
        self::FREE => 'Free',
        self::PAID => 'Paid',
    ];

    const PENDING = 0;

    const COMPLETED = 1;

    const STATUS_ALL = 3;

    const STATUS = [
        self::STATUS_ALL => 'All',
        self::PENDING => 'Pending',
        self::COMPLETED => 'Completed',
    ];

    protected $appends = ['paid_amount'];

    /**
     * @return string
     */
    public function getPaidAmountAttribute(): string
    {
        $transaction = $this->appointmentTransaction;
        if ($transaction) {
            return getCurrencyAmount($transaction->amount,$transaction->currency_symbol);
        }

        return '';
    }

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class);
    }

    public function appointmentTransaction(): BelongsTo
    {
        return $this->belongsTo(AppointmentTransaction::class, 'appointment_tran_id');
    }
}
