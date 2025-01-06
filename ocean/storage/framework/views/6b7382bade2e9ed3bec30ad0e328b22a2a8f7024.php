<?php if($contact): ?>
    <div id="reply-wrapper">
        <?php if(count($contact->replies) > 0): ?>
            <?php $__currentLoopData = $contact->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e(trans('plugins/contact::contact.tables.time')); ?>: <i><?php echo e($reply->created_at); ?></i></p>
                <p><?php echo e(trans('plugins/contact::contact.tables.content')); ?>:</p>
                <pre class="message-content"><?php echo BaseHelper::clean($reply->message); ?></pre>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p><?php echo e(trans('plugins/contact::contact.no_reply')); ?></p>
        <?php endif; ?>
    </div>

    <p><button class="btn btn-info answer-trigger-button"><?php echo e(trans('plugins/contact::contact.reply')); ?></button></p>

    <div class="answer-wrapper">
        <div class="form-group mb-3">
            <?php echo render_editor('message', null, false, ['without-buttons' => true, 'class' => 'form-control']); ?>

        </div>

        <div class="form-group mb-3">
            <input type="hidden" value="<?php echo e($contact->id); ?>" id="input_contact_id">
            <button class="btn btn-success answer-send-button"><i class="fas fa-reply"></i> <?php echo e(trans('plugins/contact::contact.send')); ?></button>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/contact/resources/views/reply-box.blade.php ENDPATH**/ ?>