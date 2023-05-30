<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\VcardProductRepository;

class ProductController extends AppBaseController
{
    /**
     * @var VcardProductRepository
     */
    private $vcardProductRepo;

    /**
     * @param  VcardProductRepository  $vcardProductRepo
     */
    public function __construct(VcardProductRepository $vcardProductRepo)
    {
        $this->vcardProductRepo = $vcardProductRepo;
    }

    /**
     * @param $id
     * @return mixed
     */

    /**
     * @param  CreateProductRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $service = $this->vcardProductRepo->store($input);

        return $this->sendResponse($service, __('messages.flash.create_product'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $product = Product::with('currency')->where('id', $id)->first();
        if($product->currency){
            $product['formatted_amount'] = getCurrencyAmount($product->price,$product->currency->currency_icon);
        }

        return $this->sendResponse($product, 'Product successfully retrieved.');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->clearMediaCollection(Product::PRODUCT_PATH);
        $product->delete();

        return $this->sendSuccess('Product deleted successfully.');
    }

    /**
     * @param  UpdateProductRequest  $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $input = $request->all();

        $service = $this->vcardProductRepo->update($input, $id);

        return $this->sendResponse($service, __('messages.flash.update_product'));
    }
}
