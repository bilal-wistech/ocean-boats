<?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['list-group-item', 'read' => $notification->read_at !== null]) ?>" id="notification-<?php echo e($notification->id); ?>">
        <div class="notification-info">
            <span class="icon"><i class="fa fa-bell"></i></span>
            <p title="<?php echo e(BaseHelper::clean($notification->title)); ?>"><?php echo Str::limit(BaseHelper::clean($notification->title), 30); ?></p>
            <div class="txt-info">
                <p class="time"><?php echo e($notification->created_at->diffForHumans()); ?></p>
                <strong class="description-notification-<?php echo e($notification->id); ?>"><?php echo Str::limit(BaseHelper::clean($notification->description), 80); ?></strong>
                <span class="btn-toggle-description" <?php if(Str::length(BaseHelper::clean($notification->description)) <= 80): ?> style="display: none" <?php endif; ?>>
                    <a href="javascript:void(0)" class="show-more-description show-more-<?php echo e($notification->id); ?>" data-id="<?php echo e($notification->id); ?>" data-class="description-notification-<?php echo e($notification->id); ?>"
                       data-description="<?php echo e(BaseHelper::clean($notification->description)); ?>"><?php echo e(trans('core/base::notifications.show_more')); ?></a>
                    <a href="javascript:void(0)" style="display: none" class="show-less-description show-less-<?php echo e($notification->id); ?>" data-id="<?php echo e($notification->id); ?>" data-class="description-notification-<?php echo e($notification->id); ?>"
                       data-description="<?php echo e(Str::limit(BaseHelper::clean($notification->description))); ?>"><?php echo e(trans('core/base::notifications.show_less')); ?></a>
                </span>
                <br>
                <?php if($notification->action_url && $notification->action_url !== '#'): ?>
                    <a href="<?php echo e(route('notifications.read-notification', $notification->id)); ?>" class="action-view"><?php echo e($notification->action_label ? __($notification->action_label) : trans('core/base::notifications.view')); ?></a>
                <?php endif; ?>
            </div>
            <a href="#" data-href="<?php echo e(route('notifications.destroy-notification', $notification->id)); ?>" class="close-notification btn-delete-notification">x</a>
        </div>
    </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
   <div class="text-center no-data-notification">
       <i class="fa fa-bell fa-2xl text-warning mb-4"></i>
       <h5 class="title"><?php echo e(trans('core/base::notifications.no_notification_here')); ?></h5>
       <p class="text-dark description"><?php echo e(trans('core/base::notifications.please_check_again_later')); ?></p>
   </div>
<?php endif; ?>

<?php if(! empty($notification) && $notifications->hasMorePages()): ?>
    <li style="background-color: unset">
        <div class="text-center mt-2 mb-2 wrap-view-more">
            <a href="javascript:void(0)" class="view-more-notification"><?php echo e(trans('core/base::notifications.view_more')); ?></a>
        </div>
    </li>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/notification/partials/notification-item.blade.php ENDPATH**/ ?>