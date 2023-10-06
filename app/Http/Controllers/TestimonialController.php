<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Repositories\TestimonialRepository;
use Illuminate\Http\JsonResponse;

class TestimonialController extends AppBaseController
{
    /**
     * @var TestimonialRepository
     */
    private $testimonialRepo;

    /**
     * TestimonialController constructor.
     *
     * @param  TestimonialRepository  $testimonialRepo
     */
    public function __construct(TestimonialRepository $testimonialRepo)
    {
        $this->testimonialRepo = $testimonialRepo;
    }

    /**
     * @param  CreateTestimonialRequest  $request
     * @return JsonResponse
     */
    public function store(CreateTestimonialRequest $request)
    {
        $input = $request->all();

        $testimonial = $this->testimonialRepo->store($input);

        return $this->sendResponse($testimonial, __('messages.flash.create_testimonial'));
    }

    /**
     * @param  Testimonial  $testimonial
     * @return JsonResponse
     */
    public function edit(Testimonial $testimonial)
    {
        return $this->sendResponse($testimonial, 'Testimonial successfully retrieved.');
    }

    /**
     * @param  UpdateTestimonialRequest  $request
     * @param  Testimonial  $testimonial
     * @return JsonResponse
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $input = $request->all();

        $testimonial = $this->testimonialRepo->update($input, $testimonial->id);

        return $this->sendResponse($testimonial, __('messages.flash.update_testimonial'));
    }

    /**
     * @param  Testimonial  $testimonial
     * @return JsonResponse
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->clearMediaCollection(Testimonial::TESTIMONIAL_PATH);
        $testimonial->delete();

        return $this->sendSuccess('Testimonial deleted successfully.');
    }
}
