<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Meta
 *
 * @property int $id
 * @property string|null $site_title
 * @property string|null $home_title
 * @property string|null $meta_keyword
 * @property string|null $meta_description
 * @property string|null $google_analytics
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Meta newModelQuery()
 * @method static Builder|Meta newQuery()
 * @method static Builder|Meta query()
 * @method static Builder|Meta whereCreatedAt($value)
 * @method static Builder|Meta whereGoogleAnalytics($value)
 * @method static Builder|Meta whereHomeTitle($value)
 * @method static Builder|Meta whereId($value)
 * @method static Builder|Meta whereMetaDescription($value)
 * @method static Builder|Meta whereMetaKeyword($value)
 * @method static Builder|Meta whereSiteTitle($value)
 * @method static Builder|Meta whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Meta extends Model
{
    use HasFactory;

    protected $table = 'metas';

    protected $fillable = [
        'site_title',
        'home_title',
        'meta_keyword',
        'meta_description',
        'google_analytics',
    ];

    protected $casts = [
        'site_title'       => 'string',
        'home_title'       => 'string',
        'meta_keyword'     => 'string',
        'meta_description' => 'string',
        'google_analytics' => 'string',
    ];
}
