<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCouponCodeRequest;
use App\Http\Requests\UpdateCouponCodeRequest;
use App\Models\CouponCode;
use App\Repositories\CouponCodeRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponCodeController extends AppBaseController
{
    public function index()
    {
        return view('sadmin.couponCodes.index');
    }

    public function store(AddCouponCodeRequest $request)
    {
        $input = $request->all();
        $input['expire_at'] = Carbon::parse($input['expire_at']);
        $input['status'] = isset($input['status']);
        CouponCode::create($input);

        return $this->sendSuccess('Coupon Code created successfully.');
    }

    public function edit($couponCodeId)
    {
        $couponCode = CouponCode::findOrFail($couponCodeId);

        return $this->sendResponse($couponCode, 'Coupon Code Retrieved Successfully.');
    }

    public function update(UpdateCouponCodeRequest $request, $id)
    {
        $couponCode = CouponCode::findOrFail($id);
        $input = $request->all();
        $input['expire_at'] = Carbon::parse($input['expire_at']);
        $input['status'] = isset($input['status']);
        $couponCode->update($input);

        return $this->sendSuccess('Coupon Code updated successfully.');
    }

    public function destroy($couponCodeId)
    {
        $couponCode = CouponCode::findOrFail($couponCodeId);
        $couponCode->delete();

        return $this->sendSuccess('Coupon Code deleted Successfully.');
    }

    public function changeCouponCodeStatus(Request $request, $couponCodeId)
    {
        $couponCode = CouponCode::findOrFail($couponCodeId);
        $couponCode->status = $request->get('status') == 'true' ? 1 : 0;
        $couponCode->update();

        return $this->sendSuccess('Coupon Code status updated successfully.');
    }

    public function applyCouponCode(Request $request, $couponCode = null)
    {

        $input = $request->all();
        $input['couponCode'] = $couponCode;
        $couponCodeRepo = App(CouponCodeRepository::class);
        $newPlan = $couponCodeRepo->getAfterDiscountData($input);

        return $this->sendResponse($newPlan, 'Coupon Code applied Successfully.');
    }
}
