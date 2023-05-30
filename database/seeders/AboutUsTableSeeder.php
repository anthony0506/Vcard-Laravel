<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutUs1 = AboutUs::create([
            'title' => 'Make Smart Business Card',
            'description' => 'Make Your Own Smart business Card with us and grow your business easily.',
        ]);

        $aboutUs2 = AboutUs::create([
            'title' => 'About2',
            'description' => 'Make Your Own Smart business Card with us and grow your business easily.',
        ]);

        $aboutUs3 = AboutUs::create([
            'title' => 'About3',
            'description' => 'Make Your Own Smart business Card with us and grow your business easily.',
        ]);
    }
}
