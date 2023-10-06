<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\EmailSubscription
 *
 * @property int $id
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|EmailSubscription newModelQuery()
 * @method static Builder|EmailSubscription newQuery()
 * @method static Builder|EmailSubscription query()
 * @method static Builder|EmailSubscription whereCreatedAt($value)
 * @method static Builder|EmailSubscription whereEmail($value)
 * @method static Builder|EmailSubscription whereId($value)
 * @method static Builder|EmailSubscription whereUpdatedAt($value)
 * @mixin Eloquent
 */
class EmailSubscription extends Model
{
    use HasFactory;

    public $fillable = [
        'email',
    ];

    protected $casts = [
        'email' => 'string',
    ];
    
    public static $rules = [
        'email' => 'email:filter|unique:email_subscriptions,email',
    ];
}
