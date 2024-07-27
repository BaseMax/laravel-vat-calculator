<?php $__env->startSection('content'); ?>
    <div class="page-body">
        <div class="container-xl">

            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card <?php if(session('status')): ?> mt-3 <?php endif; ?>">
                <div class="row g-0">
                    <div class="col-12 col-md-12 d-flex flex-column">
                        <form action="<?php echo e(route('profile.update')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="card-body">
                                <h2 class="mb-4">My Account</h2>
                                <h3 class="card-title">Profile Details</h3>
                                <div class="row align-items-center">
                                    <div class="col-auto"><span class="avatar avatar-xl"
                                            style="background-image: url(<?php echo e(asset(getImageProfile(auth()->user()->id))); ?>)"></span>
                                    </div>
                                    <div class="col-auto">
                                        <?php if (isset($component)) { $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['name' => 'image','type' => 'file','label' => 'Change profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'image','type' => 'file','label' => 'Change profile']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $attributes = $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $component = $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
                                    </div>
                                    <div class="col-auto">
                                        <a href="<?php echo e(route('profile.delete')); ?>" class="btn btn-ghost-danger">
                                            Delete avatar
                                        </a>
                                    </div>

                                </div>

                                <h3 class="card-title mt-4">Profile</h3>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Name</div>
                                        <input name="name" type="text" class="form-control"
                                            value="<?php echo e(auth()->user()->name); ?>">
                                    </div>
                                </div>
                                <h3 class="card-title mt-4">Email</h3>
                                <div>
                                    <div class="row g-3">
                                        <div class="col-md">
                                            <input name="email" type="text" class="form-control"
                                                value="<?php echo e(auth()->user()->email); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ali/Desktop/projects/tax/resources/views/profile/index.blade.php ENDPATH**/ ?>