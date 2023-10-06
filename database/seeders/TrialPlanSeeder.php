<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\Template;
use Illuminate\Database\Seeder;

class TrialPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usd = Currency::whereCurrencyCode('USD')->first()->id;
        $input = [
            'name' => 'Standard',
            'currency_id' => $usd,
            'price' => 10,
            'frequency' => Plan::MONTHLY,
            'is_default' => 1,
            'trial_days' => 7,
            'no_of_vcards' => 7,
        ];

        $plan = Plan::create($input);

        PlanFeature::create([
            'plan_id' => $plan->id,
            'products_services' => true,
            'testimonials' => true,
            'social_links' => true,
            'enquiry_form' => true,
            'custom_fonts' => true,
        ]);

        $templateIds = Template::limit(5)->pluck('id')->toArray();
        $plan->templates()->sync($templateIds);
    }
}
