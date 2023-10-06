<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\SocialLink
 *
 * @property int $id
 * @property int $vcard_id
 * @property string|null $website
 * @property string|null $twitter
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $youtube
 * @property string|null $reddit
 * @property string|null $tumblr
 * @property string|null $linkedin
 * @property string|null $whatsapp
 * @property string|null $pinterest
 * @property string|null $tiktok
 * @property string|null $discord
 * @property string|null $shop
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Vcard $vcard
 *
 * @method static Builder|SocialLink newModelQuery()
 * @method static Builder|SocialLink newQuery()
 * @method static Builder|SocialLink query()
 * @method static Builder|SocialLink whereCreatedAt($value)
 * @method static Builder|SocialLink whereFacebook($value)
 * @method static Builder|SocialLink whereId($value)
 * @method static Builder|SocialLink whereInstagram($value)
 * @method static Builder|SocialLink whereLinkedin($value)
 * @method static Builder|SocialLink wherePinterest($value)
 * @method static Builder|SocialLink whereReddit($value)
 * @method static Builder|SocialLink whereTiktok($value)
 * @method static Builder|SocialLink whereTumblr($value)
 * @method static Builder|SocialLink whereTwitter($value)
 * @method static Builder|SocialLink whereUpdatedAt($value)
 * @method static Builder|SocialLink whereVcardId($value)
 * @method static Builder|SocialLink whereWebsite($value)
 * @method static Builder|SocialLink whereWhatsapp($value)
 * @method static Builder|SocialLink whereYoutube($value)
 * @mixin Eloquent
 */
class SocialLink extends Model
{
    use HasFactory;

    protected $table = 'social_links';

    /**
     * @var string[]
     */
    protected $fillable = [
        'vcard_id',
        'website',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'tumblr',
        'reddit',
        'linkedin',
        'etsy',
        'pinterest',
        'tiktok',
        'discord',
        'shop'
    ];

    protected $casts = [
        'vcard_id'  => 'integer',
        'website'   => 'string',
        'twitter'   => 'string',
        'facebook'  => 'string',
        'instagram' => 'string',
        'youtube'   => 'string',
        'tumblr'    => 'string',
        'reddit'    => 'string',
        'linkedin'  => 'string',
        'etsy'      => 'string',
        'pinterest' => 'string',
        'tiktok'    => 'string',
        'discord'   => 'string',
        'shop'      => 'string'
    ];

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class, 'vcard_id');
    }
}
