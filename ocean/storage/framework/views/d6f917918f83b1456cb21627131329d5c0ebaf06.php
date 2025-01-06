<?php if($contact): ?>
    <p><?php echo e(trans('plugins/contact::contact.tables.time')); ?>: <i><?php echo e($contact->created_at); ?></i></p>
    <p><?php echo e(trans('plugins/contact::contact.tables.full_name')); ?>: <i><?php echo e($contact->name); ?></i></p>
    <p><?php echo e(trans('plugins/contact::contact.tables.email')); ?>: <i><a href="mailto:<?php echo e($contact->email); ?>"><?php echo e($contact->email); ?></a></i></p>
    <p><?php echo e(trans('plugins/contact::contact.tables.phone')); ?>: <i><?php if($contact->phone): ?> <a href="tel:<?php echo e($contact->phone); ?>"><?php echo e($contact->phone); ?></a> <?php else: ?> N/A <?php endif; ?></i></p>
    <p><?php echo e(trans('plugins/contact::contact.tables.address')); ?>: <i><?php echo e($contact->address ?: 'N/A'); ?></i></p>
    <p><?php echo e(trans('plugins/contact::contact.tables.subject')); ?>: <i><?php echo e($contact->subject ?: 'N/A'); ?></i></p>
    <p><?php echo e(trans('plugins/contact::contact.tables.content')); ?>:</p>
    <pre class="message-content"><?php echo e($contact->content ?: '...'); ?></pre>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/contact/resources/views/contact-info.blade.php ENDPATH**/ ?>