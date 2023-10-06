<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VcardTemplate
 *
 * @method static Builder|VcardTemplate newModelQuery()
 * @method static Builder|VcardTemplate newQuery()
 * @method static Builder|VcardTemplate query()
 * @mixin Eloquent
 */
class VcardTemplate extends Model
{
    use HasFactory;

    protected $table = 'vcard_template';
}
