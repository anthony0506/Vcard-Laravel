<div class="table-striped">
    <livewire:vcard-testimonial-table :vcard-id="$vcard->id" />
</div>
@include('vcards.testimonials.create')
@include('vcards.testimonials.edit')
@include('vcards.testimonials.show')
<div class="mt-5 d-flex">
    <div class="width-320">
        <input type="text" name="review_url" id="review_url_input" class="form-control" placeholder="Please input URL">
    </div>
    <a href="" type="button" id="review_btn" class="btn btn-primary ms-8" target="_blank">Leave a REVIEW</a>
</div>

<script type="text/javascript">
    const reviewUrlInput = document.getElementById('review_url_input');
    const reviewBtn = document.getElementById('review_btn');

    reviewBtn.addEventListener('click', function() {
        const reviewUrl = reviewUrlInput.value;
        reviewBtn.href = reviewUrl;
    });
</script>