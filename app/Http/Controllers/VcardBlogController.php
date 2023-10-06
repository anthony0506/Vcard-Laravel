<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVcardBlogRequest;
use App\Http\Requests\UpdateVcardBlogRequest;
use App\Models\VcardBlog;
use App\Repositories\VcardBlogRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class VcardBlogController extends AppBaseController
{
    /**
     * @var VcardBlogRepository
     */
    private $vcardBlogRepo;

    /**
     * VcardServiceController constructor.
     *
     * @param  VcardBlogRepository  $vcardBlogRepo
     */
    public function __construct(VcardBlogRepository $vcardBlogRepo)
    {
        $this->vcardBlogRepo = $vcardBlogRepo;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('vcards.blogs.index');
    }

    /**
     * @param  CreateVcardBlogRequest  $request
     * @return mixed
     */
    public function store(CreateVcardBlogRequest $request)
    {
        $input = $request->all();

        $blog = $this->vcardBlogRepo->store($input);

        return $this->sendResponse($blog, __('messages.flash.create_blog'));
    }

    /**
     * @param  VcardBlog  $vcardBlog
     * @return mixed
     */
    public function edit(VcardBlog $vcardBlog)
    {
        return $this->sendResponse($vcardBlog, 'VCard  successfully retrieved.');
    }

    /**
     * @param  UpdateVcardBlogRequest  $request
     * @param  VcardBlog  $vcardBlog
     * @return mixed
     */
    public function update(UpdateVcardBlogRequest $request, VcardBlog $vcardBlog)
    {
        $input = $request->all();

        $service = $this->vcardBlogRepo->update($input, $vcardBlog->id);

        return $this->sendResponse($service, __('messages.flash.update_blog'));
    }

    /**
     * @param  VcardBlog  $vcardBlog
     * @return mixed
     */
    public function destroy(VcardBlog $vcardBlog)
    {
        $vcardBlog->clearMediaCollection(VcardBlog::BLOG_PATH);
        $vcardBlog->delete();

        return $this->sendSuccess(__('messages.flash.delete_blog'));
    }
}
