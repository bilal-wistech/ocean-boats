<li class="dropdown dropdown-extended dropdown-inbox">
    <a href="javascript:;" class="dropdown-toggle dropdown-header-name" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-envelope-open"></i>
        <span class="badge badge-default"> <?php echo e($contacts->total()); ?> </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li class="external">
            <h3><?php echo BaseHelper::clean(trans('plugins/contact::contact.new_msg_notice', ['count' => $contacts->total()])); ?></h3>
            <a href="<?php echo e(route('contacts.index')); ?>"><?php echo e(trans('plugins/contact::contact.view_all')); ?></a>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: <?php echo e($contacts->total() * 70); ?>px;" data-handle-color="#637283">
                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('contacts.edit', $contact->id)); ?>">
                            <span class="photo">
                                <img src="<?php echo e($contact->avatar_url); ?>" class="rounded-circle" alt="<?php echo e($contact->name); ?>">
                            </span>
                            <span class="subject"><span class="from"> <?php echo e($contact->name); ?> </span><span class="time"><?php echo e($contact->created_at->toDateTimeString()); ?> </span></span>
                            <span class="message"> <?php echo e($contact->phone); ?> - <?php echo e($contact->email); ?> </span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($contacts->total() > 10): ?>
                    <li class="text-center"><a href="<?php echo e(route('contacts.index')); ?>"><?php echo e(trans('plugins/contact::contact.view_all')); ?></a></li>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
</li>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/contact/resources/views/partials/notification.blade.php ENDPATH**/ ?>