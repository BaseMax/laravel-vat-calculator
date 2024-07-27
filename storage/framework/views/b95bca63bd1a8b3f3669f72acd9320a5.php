<?php $__env->startSection('content'); ?>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Create a new report
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <?php echo e($users_count); ?> User(s)
                                            </div>
                                            <div class="text-muted">
                                                <?php echo e($users_login_count); ?> users signed in at least once
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-calculator">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                    <path
                                                        d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                                                    <path d="M8 14l0 .01" />
                                                    <path d="M12 14l0 .01" />
                                                    <path d="M16 14l0 .01" />
                                                    <path d="M8 17l0 .01" />
                                                    <path d="M12 17l0 .01" />
                                                    <path d="M16 17l0 .01" />
                                                </svg> </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <?php echo e($requests_count); ?> Request(s)
                                            </div>
                                            <div class="text-muted">
                                                <?php echo e($requests_uniqe_count); ?>

                                                request<?php echo e($requests_uniqe_count != 1 ? 's' : ''); ?>

                                                unique count
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-calculator">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                    <path
                                                        d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                                                    <path d="M8 14l0 .01" />
                                                    <path d="M12 14l0 .01" />
                                                    <path d="M16 14l0 .01" />
                                                    <path d="M8 17l0 .01" />
                                                    <path d="M12 17l0 .01" />
                                                    <path d="M16 17l0 .01" />
                                                </svg> </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <?php echo e($requests_count_today); ?> Today request(s)
                                            </div>
                                            <div class="text-muted">
                                                <?php echo e($requests_uniqe_count_today); ?> today unique
                                                request<?php echo e($requests_uniqe_count_today != 1 ? 's' : ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-calculator">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                    <path
                                                        d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                                                    <path d="M8 14l0 .01" />
                                                    <path d="M12 14l0 .01" />
                                                    <path d="M16 14l0 .01" />
                                                    <path d="M8 17l0 .01" />
                                                    <path d="M12 17l0 .01" />
                                                    <path d="M16 17l0 .01" />
                                                </svg> </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <?php echo e($requests_count_yesterday); ?> Yesterday request(s)
                                            </div>
                                            <div class="text-muted">
                                                <?php echo e($requests_uniqe_yesterday); ?> unique yesterday
                                                request<?php echo e($requests_uniqe_yesterday != 1 ? 's' : ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Traffic summary</h3>
                            <div id="chart-mentions" class="chart-lg"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Locations</h3>
                            <div class="ratio ratio-21x9">
                                <div>
                                    <div id="map-world" class="w-100 h-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-3"><strong><?php echo e($requests_uniqe_count); ?> unique requests</strong> out of
                                        <?php echo e($requests_count); ?></p>
                                    <div class="progress progress-separated mb-3">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: <?php echo e($add_percentage); ?>%" aria-label="Add">
                                        </div>
                                        <div class="progress-bar bg-success" role="progressbar"
                                            style="width: <?php echo e($exclude_percentage); ?>%" aria-label="Exclude">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto d-flex align-items-center pe-2">
                                            <span class="legend me-2 bg-primary"></span>
                                            <span>Addition</span>
                                        </div>
                                        <div class="col-auto d-flex align-items-center px-2">
                                            <span class="legend me-2 bg-success"></span>
                                            <span>Excluded</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card" style="height: 27.4rem">
                                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                    <div class="divide-y">
                                        <?php $__currentLoopData = $recent_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_request_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div onclick="fill_model(<?php echo e($recent_request_item->request_id); ?>)"
                                                data-bs-toggle="modal" data-bs-target="#modal-report-show"
                                                class="cursor-pointer">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <a
                                                            href="<?php echo e(route('users.edit', ['user' => $recent_request_item->user_id])); ?>">
                                                            <span class="avatar"
                                                                style="background-image: url(<?php echo e(asset(getImageProfile($recent_request_item->user_id))); ?>)"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <div class="text-truncate">
                                                            <a class="text-reset"
                                                                href="<?php echo e(route('users.edit', ['user' => $recent_request_item->user_id])); ?>">
                                                                <strong><?php echo e($recent_request_item->user->name); ?></strong>
                                                            </a>
                                                            <?php echo e($recent_request_item->type === App\Enums\RequestType::ADD()->value ? 'Gross amount' : 'Net amount'); ?>

                                                            of
                                                            <?php echo e($recent_request_item->vat); ?>% VAT on
                                                            <?php echo e($recent_request_item->amount); ?>

                                                            <?php echo e($recent_request_item->currency_name); ?>

                                                        </div>
                                                        <div class="text-muted">
                                                            <?php echo e(formatCreatedAt($recent_request_item->created_at)); ?>

                                                        </div>
                                                    </div>

                                                    <?php if(isDateTimeToday($recent_request_item->created_at)): ?>
                                                        <div class="col-auto align-self-center">
                                                            <div class="badge bg-primary"></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="height: 35.8rem">
                        <div class="card-header border-0">
                            <div class="card-title">Recent Sessions (<?php echo e($total_sessions); ?>)</div>
                        </div>
                        <div class="card-body card-body-scrollable position-relative">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Name</th>

                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $recent_sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_session_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="w-1">
                                                <a
                                                    href="<?php echo e(route('users.edit', ['user' => $recent_session_item->user_id])); ?>">
                                                    <span class="avatar"
                                                        style="background-image: url(<?php echo e(asset(getImageProfile($recent_session_item->user_id))); ?>)"></span>
                                                </a>
                                            </td>
                                            <td class="td-truncate">
                                                <div class="text-truncate">
                                                    <a class="text-reset"
                                                        href="<?php echo e(route('users.edit', ['user' => $recent_session_item->user_id])); ?>">
                                                        <?php echo e($recent_session_item->user_name); ?>

                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-nowrap text-muted">
                                                <?php echo e(formatCreatedAt($recent_session_item->created_at)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <?php echo $__env->make('requests.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts.modal.request-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ali/Desktop/projects/tax/resources/views/dashboard.blade.php ENDPATH**/ ?>