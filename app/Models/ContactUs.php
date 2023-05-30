<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ContactUs
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|ContactUs newModelQuery()
 * @method static Builder|ContactUs newQuery()
 * @method static Builder|ContactUs query()
 * @method static Builder|ContactUs whereCreatedAt($value)
 * @method static Builder|ContactUs whereEmail($value)
 * @method static Builder|ContactUs whereId($value)
 * @method static Builder|ContactUs whereMessage($value)
 * @method static Builder|ContactUs whereName($value)
 * @method static Builder|ContactUs whereSubject($value)
 * @method static Builder|ContactUs whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

    protected $casts = [
        'name'    => 'string',
        'email'   => 'string',
        'subject' => 'string',
        'message' => 'string',
    ];
    
    public static $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email:filter',
        'subject' => 'required',
        'message' => 'required|min:2',
    ];
}
