<?php

namespace App\Repositories;

use App\Models\AboutUs;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class UserRepository
 */
class AboutUsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return AboutUs::class;
    }

    public function getFieldsSearchable()
    {
        //
    }

    /**
     * @param $input
     * @param $UserId
     * @return mixed
     */
    public function store($inputs)
    {
        try {
            DB::beginTransaction();

            foreach ($inputs['title'] as $id => $input) {
                $aboutUs = AboutUs::whereId($id)->first();
                $aboutUs->update([
                    'title' => $input,
                    'description' => $inputs['description'][$id],
                ]);

                if (! empty($inputs['image']) && ! empty($inputs['image'][$id])) {
                    $aboutUs->clearMediaCollection(AboutUs::PATH);
                    $aboutUs->addMedia($inputs['image'][$id])->toMediaCollection(AboutUs::PATH,
                        config('app.media_disc'));
                }
            }

            DB::commit();

            return $aboutUs;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $aboutUs
     * @param $file
     */
    public function fileUpload($aboutUs, $file)
    {
        $aboutUs->clearMediaCollection(AboutUs::PATH);
        $media = $aboutUs->addMedia($file)->toMediaCollection(AboutUs::PATH, config('app.media_disc'));
        $aboutUs->update(['value' => $media->getFullUrl()]);
    }
}
