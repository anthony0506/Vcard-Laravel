<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAboutUsRequest;
use App\Models\AboutUs;
use App\Repositories\AboutUsRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class AboutUsController extends Controller
{
    private AboutUsRepository $aboutUsRepository;

    /**
     * @param  AboutUsRepository  $aboutUsRepository
     */
    public function __construct(AboutUsRepository $aboutUsRepository)
    {
        $this->aboutUsRepository = $aboutUsRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $aboutUs = AboutUs::with('media')->get();

        return view('sadmin.aboutUs.index', compact('aboutUs'));
    }

    /**
     * @param  CreateAboutUsRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateAboutUsRequest $request)
    {
        $this->aboutUsRepository->store($request->all());

        Flash::success(__('messages.flash.about_us_create'));

        return redirect(route('aboutUs.index'));
    }
}
