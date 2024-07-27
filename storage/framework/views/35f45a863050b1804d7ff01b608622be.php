<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Users
                    </div>
                    <h2 class="page-title">
                        Users Management (<?php echo e($count); ?>)
                    </h2>
                </div>

                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <?php if(auth()->user()->is_admin === \App\Enums\UserRole::ADMIN()->value): ?>
                            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>

                                Register a new user
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default table-responsive">
                        <?php echo $dataTable->table(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ali/Desktop/projects/tax/resources/views/users/index.blade.php ENDPATH**/ ?>