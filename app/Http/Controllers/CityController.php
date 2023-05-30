<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Repositories\CityRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class CityController extends AppBaseController
{
    private CityRepository $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('sadmin.cities.index');
    }

    /**
     * @param  CreateCityRequest  $request
     * @return JsonResponse
     */
    public function store(CreateCityRequest $request): JsonResponse
    {
        $input = $request->all();
        $state = $this->cityRepository->create($input);

        return $this->sendResponse($state, __('messages.flash.city_create'));
    }

    /**
     * @param  City  $city
     * @return JsonResponse
     */
    public function edit(City $city): JsonResponse
    {
        return $this->sendResponse($city, 'City successfully retrieved.');
    }

    /**
     * @param  UpdateCityRequest  $request
     * @param  City  $city
     * @return JsonResponse
     */
    public function update(UpdateCityRequest $request, City $city): JsonResponse
    {
        $input = $request->all();
        $this->cityRepository->update($input, $city->id);

        return $this->sendSuccess(__('messages.flash.city_update'));
    }

    /**
     * @param  City  $city
     * @return JsonResponse
     */
    public function destroy(City $city): JsonResponse
    {
        $city->delete();

        return $this->sendSuccess('City deleted successfully.');
    }
}
