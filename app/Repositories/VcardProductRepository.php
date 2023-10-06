<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class VcardProductRepository extends BaseRepository
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
        return Product::class;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            $vcardProduct = Product::create($input);

            if (isset($input['product_icon']) && ! empty($input['product_icon'])) {
                $vcardProduct->addMedia($input['product_icon'])->toMediaCollection(Product::PRODUCT_PATH,
                    config('app.media_disc'));
            }

            DB::commit();

            return $vcardProduct;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  array  $input
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function update($input, $id)
    {
        try {
            DB::beginTransaction();

            $vcardProduct = Product::findOrFail($id);
            $vcardProduct->update($input);

            if (isset($input['product_icon']) && ! empty($input['product_icon'])) {
                $vcardProduct->clearMediaCollection(Product::PRODUCT_PATH);
                $vcardProduct->addMedia($input['product_icon'])->toMediaCollection(Product::PRODUCT_PATH,
                    config('app.media_disc'));
            }

            DB::commit();

            return $vcardProduct;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
