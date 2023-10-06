<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            [
                'name' => 'Share your VCards',
                'description' => 'Share Your Business Information with your prospects directly via SMS, Email or any other ways.',
            ],
            [
                'name' => 'Scan QR Code',
                'description' => 'By scanning Your QR Code, your client can see your details and also then can share your QR Code to others.',
            ],
            [
                'name' => 'Social Media Links',
                'description' => 'Your Client can follow you on social media account. You can also inc areas your bussiness by sharing your social link.',
            ],
            [
                'name' => 'Various Range of Templates',
                'description' => 'You Can select various templates for your VCards and share to your clients.',
            ],
            [
                'name' => 'Pricing And Plans',
                'description' => 'We provide various plan from which you can choose plan according to your requirement.',
            ],
            [
                'name' => 'Click On Call',
                'description' => 'Your client can reach you by just tap on phone number and contact you for any query.',
            ],
        ];
        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
