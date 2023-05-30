<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Models\City;
use App\Models\State;
use App\Repositories\StateRepository;
use Illuminate\Http\JsonResponse;

class StateController extends AppBaseController
{
    /**
     * @var StateRepository
     */
    private $stateRepository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    public function index()
    {
        return view('sadmin.states.index');
    }

    /**
     * @param  CreateStateRequest  $request
     * @return JsonResponse
     */
    public function store(CreateStateRequest $request)
    {
        $input = $request->all();
        $state = $this->stateRepository->create($input);

        return $this->sendResponse($state, __('messages.flash.state_create'));
    }

    /**
     * @param  State  $state
     * @return JsonResponse
     */
    public function edit(State $state)
    {
        return $this->sendResponse($state, 'State successfully retrieved.');
    }

    /**
     * @param  UpdateStateRequest  $request
     * @param  State  $state
     * @return JsonResponse
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        $input = $request->all();
        $this->stateRepository->update($input, $state->id);

        return $this->sendSuccess(__('messages.flash.state_update'));
    }

    /**
     * @param  State  $state
     * @return JsonResponse
     */
    public function destroy(State $state)
    {
        $cities = City::where('state_id', $state->id)->count();
        if ($cities > 0) {
            return $this->sendError(__('messages.flash.state_used'));
        }
        $state->delete();

        return $this->sendSuccess('State deleted successfully.');
    }
}
