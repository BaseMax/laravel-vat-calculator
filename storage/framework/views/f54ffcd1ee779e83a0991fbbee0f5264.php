<?php if(session('status')): ?>
    <div class="mt-3 mb-0 alert alert-important alert-<?php echo e(session('status') && session('status')['status'] == true ? 'success' : 'danger'); ?> alert-dismissible"
        role="alert">
        <div class="d-flex">
            <div>
                <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
            </div>
            <div>
                <?php echo e(session('status')['message'] ?? session('status')); ?>

            </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
<?php endif; ?>
<?php /**PATH /home/ali/Desktop/projects/tax/resources/views/layouts/errors.blade.php ENDPATH**/ ?>