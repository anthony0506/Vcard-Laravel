<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PlanTemplate
 *
 * @property int $id
 * @property int $plan_id
 * @property int $template_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|PlanTemplate newModelQuery()
 * @method static Builder|PlanTemplate newQuery()
 * @method static Builder|PlanTemplate query()
 * @method static Builder|PlanTemplate whereCreatedAt($value)
 * @method static Builder|PlanTemplate whereId($value)
 * @method static Builder|PlanTemplate wherePlanId($value)
 * @method static Builder|PlanTemplate whereTemplateId($value)
 * @method static Builder|PlanTemplate whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PlanTemplate extends Model
{
    use HasFactory;

    protected $table = 'plan_template';

    protected $casts = [
        'plan_id'     => 'integer',
        'template_id' => 'integer',
    ];
}
