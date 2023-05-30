<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVcardServiceRequest;
use App\Http\Requests\UpdateVcardServiceRequest;
use App\Models\VcardService;
use App\Repositories\VcardServiceRepository;
use Illuminate\Http\JsonResponse;

class VcardServiceController extends AppBaseController
{
    /**
     * @var VcardServiceRepository
     */
    private $vcardServiceRepo;

    /**
     * VcardServiceController constructor.
     *
     * @param  VcardServiceRepository  $vcardServiceRepo
     */
    public function __construct(VcardServiceRepository $vcardServiceRepo)
    {
        $this->vcardServiceRepo = $vcardServiceRepo;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function index($id)
    {
    }

    /**
     * @param  CreateVcardServiceRequest  $request
     * @return JsonResponse
     */
    public function store(CreateVcardServiceRequest $request)
    {
        $input = $request->all();

        $service = $this->vcardServiceRepo->store($input);

        return $this->sendResponse($service, __('messages.flash.create_service'));
    }

    /**
     * @param  VcardService  $vcardService
     * @return JsonResponse
     */
    public function edit(VcardService $vcardService)
    {
        return $this->sendResponse($vcardService, 'VCard  successfully retrieved.');
    }

    /**
     * @param  UpdateVcardServiceRequest  $request
     * @param  VcardService  $vcardService
     * @return JsonResponse
     */
    public function update(UpdateVcardServiceRequest $request, VcardService $vcardService)
    {
        $input = $request->all();

        $service = $this->vcardServiceRepo->update($input, $vcardService->id);

        return $this->sendResponse($service, __('messages.flash.update_service'));
    }

    /**
     * @param  VcardService  $vcardService
     * @return JsonResponse
     */
    public function destroy(VcardService $vcardService)
    {
        $vcardService->clearMediaCollection(VcardService::SERVICES_PATH);
        $vcardService->delete();

        return $this->sendSuccess(__('messages.flash.delete_service'));
    }
}
