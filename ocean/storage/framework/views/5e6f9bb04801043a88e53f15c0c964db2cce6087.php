<?php $__env->startSection('content'); ?>
    <?php do_action(BASE_ACTION_TOP_FORM_CONTENT_NOTIFICATION, request(), $payment) ?>
    <?php echo Form::open(['route' => ['payment.update', $payment->id]]); ?>

        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-md-9">
                <div class="widget meta-boxes">
                    <div class="widget-title">
                        <h4>
                            <span><?php echo e(trans('plugins/payment::payment.information')); ?></span>
                        </h4>
                    </div>
                    <div class="widget-body">
                        <p><?php echo e(trans('plugins/payment::payment.created_at')); ?>: <strong><?php echo e($payment->created_at); ?></strong></p>
                        <p><?php echo e(trans('plugins/payment::payment.payment_channel')); ?>: <strong><?php echo e($payment->payment_channel->label()); ?></strong></p>
                        <p><?php echo e(trans('plugins/payment::payment.total')); ?>: <strong><?php echo e($payment->amount); ?> <?php echo e($payment->currency); ?></strong></p>
                        <p><?php echo e(trans('plugins/payment::payment.status')); ?>: <strong><?php echo $payment->status->label(); ?></strong></p>
                        <?php if($payment->customer_id && $payment->customer && $payment->customer_type && class_exists($payment->customer_type)): ?>
                            <p><?php echo e(trans('plugins/payment::payment.payer_name')); ?>: <strong><?php echo e($payment->customer->name); ?></strong></p>
                            <p><?php echo e(trans('plugins/payment::payment.email')); ?>: <strong><?php echo e($payment->customer->email); ?></strong></p>
                            <?php if($payment->customer->phone): ?>
                                <p><?php echo e(trans('plugins/payment::payment.phone')); ?>: <strong><?php echo e($payment->customer->phone); ?></strong></p>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php echo $detail; ?>

                    </div>
                </div>
                <?php do_action(BASE_ACTION_META_BOXES, 'advanced', $payment) ?>
            </div>
            <div class="col-md-3 right-sidebar">
                <?php echo $__env->make('core/base::forms.partials.form-actions', ['title' => trans('plugins/payment::payment.action')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="widget meta-boxes">
                    <div class="widget-title">
                        <h4><label for="status" class="control-label required"><?php echo e(trans('core/base::tables.status')); ?></label></h4>
                    </div>
                    <div class="widget-body">
                        <?php echo Form::customSelect('status', $paymentStatuses, $payment->status); ?>

                    </div>
                </div>
                <?php do_action(BASE_ACTION_META_BOXES, 'side', $payment) ?>
            </div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/plugins/payment/resources/views/show.blade.php ENDPATH**/ ?>