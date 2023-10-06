<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\PrivacyPolicy
 *
 * @property int $id
 * @property string $privacy_policy
 * @property int $vcard_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Vcard $vcard
 *
 * @method static Builder|PrivacyPolicy newModelQuery()
 * @method static Builder|PrivacyPolicy newQuery()
 * @method static Builder|PrivacyPolicy query()
 * @method static Builder|PrivacyPolicy whereCreatedAt($value)
 * @method static Builder|PrivacyPolicy whereId($value)
 * @method static Builder|PrivacyPolicy wherePrivacyPolicy($value)
 * @method static Builder|PrivacyPolicy whereUpdatedAt($value)
 * @method static Builder|PrivacyPolicy whereVcardId($value)
 * @mixin Eloquent
 */
class PrivacyPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'privacy_policy',
        'vcard_id',
    ];

    protected $casts = [
        'privacy_policy' => 'string',
        'vcard_id'       => 'integer',
    ];

    const PRIVACY_POLICY = 'privacy-policy';

    public $table = 'privacy_policies';

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class, 'vcard_id');
    }
}
