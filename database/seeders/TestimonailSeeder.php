<?php

namespace Database\Seeders;

use App\Models\FrontTestimonial;
use Illuminate\Database\Seeder;

class TestimonailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonial1 = FrontTestimonial::create([
            'name' => 'Testimonial1',
            'description' => 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.',
        ]);
        $testimonial1->addMediaFromUrl(asset('assets/img/testimonials/woman.jpeg'))->toMediaCollection(FrontTestimonial::PATH,
            config('app.media_disc'));

        $testimonial2 = FrontTestimonial::create([
            'name' => 'Testimonial2',
            'description' => 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.',
        ]);
        $testimonial2->addMediaFromUrl(asset('assets/img/testimonials/man.png'))->toMediaCollection(FrontTestimonial::PATH,
            config('app.media_disc'));

        $testimonial3 = FrontTestimonial::create([
            'name' => 'Testimonial3',
            'description' => 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.',
        ]);
        $testimonial3->addMediaFromUrl(asset('assets/img/testimonials/male.jpeg'))->toMediaCollection(FrontTestimonial::PATH,
            config('app.media_disc'));
    }
}
