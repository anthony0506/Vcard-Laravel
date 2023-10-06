<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\EmailVerification
 *
 * @property int $id
 * @property int $user_id
 * @property string $email
 * @property string $token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|EmailVerification newModelQuery()
 * @method static Builder|EmailVerification newQuery()
 * @method static Builder|EmailVerification query()
 * @method static Builder|EmailVerification whereCreatedAt($value)
 * @method static Builder|EmailVerification whereEmail($value)
 * @method static Builder|EmailVerification whereId($value)
 * @method static Builder|EmailVerification whereToken($value)
 * @method static Builder|EmailVerification whereUpdatedAt($value)
 * @method static Builder|EmailVerification whereUserId($value)
 * @mixin Eloquent
 */
class EmailVerification extends Model
{
    protected $table = 'email_verifications';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
        'token',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'user_id'=> 'integer',
        'email'=> 'string',
        'token'=>'string',
    ];
}
