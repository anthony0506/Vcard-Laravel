<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use App\Models\State;
use App\Repositories\CountryRepository;
use Illuminate\Http\JsonResponse;

class CountryController extends AppBaseController
{
    private CountryRepository $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        return view('sadmin.countries.index');
    }

    /**
     * @param  CreateCountryRequest  $request
     * @return JsonResponse
     */
    public function store(CreateCountryRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['short_code'] = strtoupper($input['short_code']);
        $country = $this->countryRepository->create($input);

        return $this->sendResponse($country, __('messages.flash.country_create'));
    }

    /**
     * @param  Country  $country
     * @return JsonResponse
     */
    public function edit(Country $country): JsonResponse
    {
        return $this->sendResponse($country, 'Country successfully retrieved.');
    }

    /**
     * @param  UpdateCountryRequest  $request
     * @param  Country  $country
     * @return JsonResponse
     */
    public function update(UpdateCountryRequest $request, Country $country): JsonResponse
    {
        $input = $request->all();
        $input['short_code'] = strtoupper($input['short_code']);

        $this->countryRepository->update($input, $country->id);

        return $this->sendSuccess(__('messages.flash.country_update'));
    }

    /**
     * @param  Country  $country
     * @return JsonResponse
     */
    public function destroy(Country $country): JsonResponse
    {
        $states = State::whereCountryId($country->id)->count();
        if ($states > 0) {
            return $this->sendError(__('messages.flash.country_used'));
        }
        $country->delete();

        return $this->sendSuccess('Country deleted successfully.');
    }
}
