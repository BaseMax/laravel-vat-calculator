

<div class="btn-list flex-nowrap">
    <a href="<?php echo e(route('users.edit', $model->id)); ?>" class="btn">
      Edit
    </a>
    <form class="float-end text-nowrap" method="POST" action="<?php echo e(route('users.destroy', $model->id)); ?>"
        onsubmit="return confirm('Are you sure?')">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
    
        <button type="submit" class="btn">Delete</button>
    </form>
  </div><?php /**PATH /home/ali/Desktop/projects/tax/resources/views/users/actions.blade.php ENDPATH**/ ?>