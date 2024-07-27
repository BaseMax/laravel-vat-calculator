<div class="btn-list flex-nowrap">
    <a onclick="fill_model(<?php echo e($model->id); ?>)" class="btn" data-bs-toggle="modal" data-bs-target="#modal-report-show">
        Show
    </a>
    <form class="float-end text-nowrap" method="POST" action="<?php echo e(route('requests.destroy', $model->id)); ?>"
        onsubmit="return confirm('Are you sure?')">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>

        <button type="submit" class="btn">Delete</button>
    </form>
</div>
<?php /**PATH /home/ali/Desktop/projects/tax/resources/views/requests/actions.blade.php ENDPATH**/ ?>