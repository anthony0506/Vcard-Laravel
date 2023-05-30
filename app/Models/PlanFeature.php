<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\PlanFeature
 *
 * @property int $id
 * @property int $plan_id
 * @property int $products_services
 * @property int $testimonials
 * @property int $hide_branding
 * @property int $enquiry_form
 * @property int $social_links
 * @property int $password
 * @property int $custom_css
 * @property int $custom_js
 * @property int $custom_fonts
 * @property int $products
 * @property int $gallery
 * @property int $appointments
 * @property int $analytics
 * @property int $seo
 * @property int $blog
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Plan $plan
 *
 * @method static Builder|PlanFeature newModelQuery()
 * @method static Builder|PlanFeature newQuery()
 * @method static Builder|PlanFeature query()
 * @method static Builder|PlanFeature whereAnalytics($value)
 * @method static Builder|PlanFeature whereAppointments($value)
 * @method static Builder|PlanFeature whereBlog($value)
 * @method static Builder|PlanFeature whereCreatedAt($value)
 * @method static Builder|PlanFeature whereCustomCss($value)
 * @method static Builder|PlanFeature whereCustomFonts($value)
 * @method static Builder|PlanFeature whereCustomJs($value)
 * @method static Builder|PlanFeature whereEnquiryForm($value)
 * @method static Builder|PlanFeature whereGallery($value)
 * @method static Builder|PlanFeature whereHideBranding($value)
 * @method static Builder|PlanFeature whereId($value)
 * @method static Builder|PlanFeature wherePassword($value)
 * @method static Builder|PlanFeature wherePlanId($value)
 * @method static Builder|PlanFeature whereProducts($value)
 * @method static Builder|PlanFeature whereProductsServices($value)
 * @method static Builder|PlanFeature whereSeo($value)
 * @method static Builder|PlanFeature whereSocialLinks($value)
 * @method static Builder|PlanFeature whereTestimonials($value)
 * @method static Builder|PlanFeature whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PlanFeature extends Model
{
    use HasFactory;

    protected $table = 'plan_features';

    /**
     * @var array
     */
    protected $fillable = [
        'plan_id',
        'products_services',
        'testimonials',
        'hide_branding',
        'enquiry_form',
        'social_links',
        'password',
        'custom_css',
        'custom_js',
        'custom_fonts',
        'products',
        'appointments',
        'gallery',
        'analytics',
        'seo',
        'blog',
        'affiliation',
    ];

    protected $casts = [
        'plan_id'           => 'integer',
        'products_services' => 'integer',
        'testimonials'      => 'integer',
        'hide_branding'     => 'integer',
        'enquiry_form'      => 'integer',
        'social_links'      => 'integer',
        'password'          => 'integer',
        'custom_css'        => 'integer',
        'custom_js'         => 'integer',
        'custom_fonts'      => 'integer',
        'products'          => 'integer',
        'appointments'      => 'integer',
        'gallery'           => 'integer',
        'analytics'         => 'integer',
        'seo'               => 'integer',
        'blog'              => 'integer',
        'affiliation'       => 'integer',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
