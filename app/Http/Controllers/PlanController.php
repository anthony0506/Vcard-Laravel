<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\Subscription;
use App\Repositories\PlanRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class PlanController extends AppBaseController
{
    /**
     * @var PlanRepository
     */
    private $planRepository;

    /**
     * PlanController constructor.
     *
     * @param  PlanRepository  $planRepository
     */
    public function __construct(PlanRepository $planRepository)
    {
        $this->planRepository = $planRepository;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('sadmin.plans.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('sadmin.plans.create');
    }

    /**
     * @param  CreatePlanRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreatePlanRequest $request)
    {
        $input = $request->all();

        $this->planRepository->store($input);

        Flash::success(__('messages.flash.plan_create'));

        return redirect(route('plans.index'));
    }

    public function show($id)
    {
        //
    }

    /**
     * @param  Plan  $plan
     * @return Application|Factory|View
     */
    public function edit(Plan $plan)
    {
        $templates = $plan->templates()->pluck('template_id')->toArray();
        $feature = PlanFeature::wherePlanId($plan->id)->first();

        return view('sadmin.plans.edit', compact('plan', 'feature', 'templates'));
    }

    /**
     * @param  UpdatePlanRequest  $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdatePlanRequest $request, $id)
    {
        $input = $request->all();

        $this->planRepository->update($input, $id);

        Flash::success(__('messages.flash.plan_update'));

        return redirect(route('plans.index'));
    }

    /**
     * @param  Plan  $plan
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Plan $plan)
    {
        $plan->update([
            'is_active' => ! $plan->is_active,
        ]);

        return $this->sendSuccess(__('messages.flash.plan_status'));
    }

    /**
     * @param  Plan  $plan
     * @return mixed
     */
    public function destroy(Plan $plan)
    {
        $subscription = Subscription::where('plan_id', $plan->id)->where('status', Subscription::ACTIVE)->count();

        if ($plan->is_default == Plan::IS_DEFAULT){
            return $this->sendError(__('messages.placeholder.default_plan_can_not_be_delete'));
        }

        if ($subscription > 0) {
            return $this->sendError(__('messages.placeholder.plan_already_used'));
        }
        $plan->delete();

        return $this->sendSuccess('Plan deleted successfully.');
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     */
    public function makePlanDefault($id)
    {
        $defaultSubscriptionPlan = Plan::where('is_default', 1)->first();
        $defaultSubscriptionPlan->update(['is_default' => 0]);

        $subscriptionPlan = Plan::find($id);
        if (empty($subscriptionPlan)) {
            $defaultSubscriptionPlan->update(['is_default' => 1]);

            return $this->sendSuccess(__('messages.flash.plan_default'));
        }

        if ($subscriptionPlan->trial_days == 0) {
            $subscriptionPlan->trial_days = Plan::TRIAL_DAYS;
        }
        $subscriptionPlan->is_default = 1;
        $subscriptionPlan->save();

        return $this->sendSuccess(__('messages.flash.plan_default'));
    }
}
