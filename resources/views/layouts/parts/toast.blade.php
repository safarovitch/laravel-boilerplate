<div class="toast-container" style="top: 80px; right: 20px; z-index: 1000; position: fixed !important;">
    <!-- Toast -->
    <div id="liveToast" class="position-fixed toast hide fade" role="alert" aria-live="assertive" aria-atomic="true"
        style="position: relative !important;">
        <div class="toast-header">
            <div class="d-flex align-items-center flex-grow-1">
                <div class="flex-shrink-0">
                    <img class="avatar avatar-sm avatar-circle" src="{{ asset('svg/illustrations/oc-megaphone.svg')}}"
                        alt="Image description">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0">Notification</h5>
                    {{-- <small class="ms-auto">0 mins ago</small> --}}
                </div>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <div class="toast-body"></div>
    </div>
</div>
<!-- End Toast -->