<?php

namespace App\Repositories;

use App\Models\VcardService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Yajra\DataTables\Exceptions\Exception;

class VcardServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return VcardService::class;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            $vcardService = VcardService::create($input);

            if (isset($input['service_icon']) && ! empty($input['service_icon'])) {
                $vcardService->addMedia($input['service_icon'])->toMediaCollection(VcardService::SERVICES_PATH,
                    config('app.media_disc'));
            }

            DB::commit();

            return $vcardService;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  array  $input
     * @param  int  $id
     * @return Builder|Builder[]|Collection|Model
     */
    public function update($input, $id)
    {
        try {
            DB::beginTransaction();

            $vcardService = VcardService::findOrFail($id);
            $vcardService->update($input);

            if (isset($input['service_icon']) && ! empty($input['service_icon'])) {
                $vcardService->clearMediaCollection(VcardService::SERVICES_PATH);
                $vcardService->addMedia($input['service_icon'])->toMediaCollection(VcardService::SERVICES_PATH,
                    config('app.media_disc'));
            }

            DB::commit();

            return $vcardService;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
