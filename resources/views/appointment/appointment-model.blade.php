<div class="modal fade" id="patientEventModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{__('messages.appointment.appointment_details')}}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex">
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fas fa-user fs-3 me-4 btn-outline-secondary"></i>
                            <span class="fs-4  me-3" data-calendar="event_name"></span>
                        </div>
                        <span class="ms-8 text-muted" data-calendar="event_email"></span>
                        <br>
                        <span class="ms-8 text-muted" data-calendar="event_phone"></span>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-7 mb-2">
                    <i class="fa-solid fa-circle me-3 text-success"></i>
                    <div class="fs-6">
                        <span class="">{{__('messages.appointment.starts')}}</span>
                        <span data-calendar="event_start_date"></span>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-7 mb-9">
                    <i class="fa-solid fa-circle me-3 text-danger"></i>
                    <div class="fs-6">
                        <span class="">{{__('messages.appointment.ends')}}</span>
                        <span data-calendar="event_end_date"></span>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-id-card fs-3 me-3 btn-outline-secondary"></i>
                            <span class="fs-4  me-3" data-calendar="event_vcard_name"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
