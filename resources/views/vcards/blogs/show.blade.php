<div class="modal fade" id="showBlogModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('messages.vcard.blog_details') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 mb-5">
                        <label class="form-label fs-6 fw-bolder text-gray-700">
                            {{__('messages.front_cms.title').':'}}
                        </label>
                        <p id="showTitle" class="text-gray-600 fw-bold mb-0"></p>
                    </div>
                    <div class="col-sm-12 mb-5">
                        <label class="form-label fs-6 fw-bolder text-gray-700">
                            {{__('messages.common.description').':'}}
                        </label>
                        <p id="showDesc" class="text-gray-600 fw-bold mb-0 show-blog-scroll"></p>
                    </div>
                    <div class="col-sm-12 mb-5">
                        <div class="mb-3" io-image-input="true">
                            <label for="showBlogIcon"
                                   class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.vcard.blog_icon').':' }}</label>
                            <div class="d-block">
                                <div class="image-picker">
                                    <div class="image previewImage" id="showBlogIcon"
                                         style="background-image: url('{{ asset('assets/images/default_service.png') }}')"></div>
                                    <div class="image-upload d-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
