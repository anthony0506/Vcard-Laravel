<?php

namespace App\Repositories;

use App\Models\Feature;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * Class featureRepository
 */
class featureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name', 'description',
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
        return Feature::class;
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function update($input, $id)
    {
        $feature = Feature::findOrFail($id);

        $feature->update($input);

        if (isset($input['featureImage']) && ! empty($input['featureImage'])) {
            $feature->clearMediaCollection(Feature::PROFILE);
            $feature->addMedia($input['featureImage'])->toMediaCollection(Feature::PROFILE, config('app.media_disc'));
        }

        return $feature;
    }
}
