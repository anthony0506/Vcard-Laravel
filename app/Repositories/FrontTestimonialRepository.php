<?php

namespace App\Repositories;

use App\Models\FrontTestimonial;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class FrontTestimonialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FrontTestimonial::class;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            $testimonial = FrontTestimonial::create($input);

            if (isset($input['image']) && ! empty($input['image'])) {
                $testimonial->addMedia($input['image'])->toMediaCollection(FrontTestimonial::PATH,
                    config('app.media_disc'));
            }

            DB::commit();

            return $testimonial;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function update($input, $id)
    {
        try {
            DB::beginTransaction();

            $testimonial = FrontTestimonial::findOrFail($id);
            $testimonial->update($input);

            if (isset($input['image']) && ! empty($input['image'])) {
                $testimonial->clearMediaCollection(FrontTestimonial::PATH);
                $testimonial->addMedia($input['image'])->toMediaCollection(FrontTestimonial::PATH,
                    config('app.media_disc'));
            }

            DB::commit();

            return $testimonial;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
