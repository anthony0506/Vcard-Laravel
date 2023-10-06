<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Enquiry
 *
 * @property int $id
 * @property int $vcard_id
 * @property string $name
 * @property string $email
 * @property float|null $phone
 * @property string $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Vcard $vcard
 *
 * @method static Builder|Enquiry newModelQuery()
 * @method static Builder|Enquiry newQuery()
 * @method static Builder|Enquiry query()
 * @method static Builder|Enquiry whereCreatedAt($value)
 * @method static Builder|Enquiry whereEmail($value)
 * @method static Builder|Enquiry whereId($value)
 * @method static Builder|Enquiry whereMessage($value)
 * @method static Builder|Enquiry whereName($value)
 * @method static Builder|Enquiry wherePhone($value)
 * @method static Builder|Enquiry whereUpdatedAt($value)
 * @method static Builder|Enquiry whereVcardId($value)
 * @mixin Eloquent
 */
class Enquiry extends Model
{
    use HasFactory;

    protected $table = 'enquiries';

    /**
     * @var array
     */
    protected $fillable = [
        'vcard_id',
        'name',
        'email',
        'phone',
        'message',
    ];

    protected $casts = [
        'vcard_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'double',
        'message' => 'string',
    ];
    
    /**
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email:filter',
        'phone' => 'nullable|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'message' => 'required|min:2|max:255',
    ];

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class);
    }
}
