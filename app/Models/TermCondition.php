<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\TermCondition
 *
 * @property int $id
 * @property string $term_condition
 * @property int $vcard_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Vcard $vcard
 *
 * @method static Builder|TermCondition newModelQuery()
 * @method static Builder|TermCondition newQuery()
 * @method static Builder|TermCondition query()
 * @method static Builder|TermCondition whereCreatedAt($value)
 * @method static Builder|TermCondition whereId($value)
 * @method static Builder|TermCondition whereTermCondition($value)
 * @method static Builder|TermCondition whereUpdatedAt($value)
 * @method static Builder|TermCondition whereVcardId($value)
 * @mixin Eloquent
 */
class TermCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'term_condition',
        'vcard_id',
    ];

    protected $casts = [
        'term_condition' => 'string',
        'vcard_id'       => 'integer',
    ];

    public $table = 'term_conditions';

    const TERM_CONDITION = 'term-condition';

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class, 'vcard_id');
    }
}
