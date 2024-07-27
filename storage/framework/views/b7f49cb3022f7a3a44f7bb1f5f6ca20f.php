<div class="mb-3">
    <?php if($label): ?>
        <label class="form-label" for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
    <?php endif; ?>

    <input id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" type="<?php echo e($type ?? 'text'); ?>"
        value="<?php echo e($value ?? old($name, '')); ?>" class="form-control <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php echo e($attributes == 'select-2-js' ?  'select-2-js' : ''); ?>"
        <?php echo e($attributes); ?> />

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.select-2-js').select2();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/ali/Desktop/projects/tax/resources/views/components/form/input.blade.php ENDPATH**/ ?>