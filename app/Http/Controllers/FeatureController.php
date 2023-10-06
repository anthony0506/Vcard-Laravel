<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Feature;
use App\Repositories\featureRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class FeatureController extends AppBaseController
{
    /**
     * @var featureRepository
     */
    private $featureRepository;

    /**
     * @param  featureRepository  $featureRepository
     */
    public function __construct(featureRepository $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws \Exception
     */
    public function index()
    {
        return view('settings.features.index');
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param  Feature  $feature
     * @return Application|Factory|View
     */
    public function edit(Feature $feature)
    {
        return view('settings.features.edit', compact('feature'));
    }

    /**
     * @param  Request  $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     *
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function update(UpdateFeatureRequest $request, $id)
    {
        $this->featureRepository->update($request->all(), $id);

        Flash::success(__('messages.flash.feature_update'));

        return redirect(route('features.index'));
    }
}
