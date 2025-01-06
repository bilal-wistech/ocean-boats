<?php if(Auth::user()->hasPermission('users.edit')): ?>
    <a href="<?php echo e(route('users.profile.view', $item->id)); ?>" class="btn btn-icon btn-primary" data-bs-toggle="tooltip"
       data-bs-original-title="<?php echo e(trans('core/acl::users.view_user_profile')); ?>"><i class="fa fa-eye"></i></a>
<?php endif; ?>

<?php if(Auth::user()->hasPermission('users.destroy')): ?>
    <a href="#" class="btn btn-icon btn-danger deleteDialog" data-bs-toggle="tooltip"
       data-section="<?php echo e(route('users.destroy', $item->id)); ?>" role="button"
       data-bs-original-title="<?php echo e(trans('core/base::tables.delete_entry')); ?>">
        <i class="fa fa-trash"></i>
    </a>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/core/acl/resources/views/users/partials/actions.blade.php ENDPATH**/ ?>