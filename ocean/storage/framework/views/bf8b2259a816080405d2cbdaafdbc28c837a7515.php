
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Order successfully. Order number :id', ['id' => $order->code])); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="thankyou text-center">
                <h2>Thank you! Your order has been recieved. We have sent a copy of receipt on your email <?php echo e($order->user->email ?: $order->address->email); ?> aswell.</h2>
            </div>
            <!-- <div class="col-lg-7 col-md-6 col-12 left"> -->
                <!-- <?php echo $__env->make('plugins/ecommerce::orders.partials.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->

                <!-- <div class="thank-you">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <div class="d-inline-block">
                        <h3 class="thank-you-sentence">
                            <?php echo e(__('Your order is successfully placed')); ?>

                        </h3>
                        <p><?php echo e(__('Thank you for purchasing our products!')); ?></p>
                    </div>
                </div>

                <?php echo $__env->make('plugins/ecommerce::orders.thank-you.customer-info', compact('order'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <a href="<?php echo e(route('public.index')); ?>" class="btn payment-checkout-btn"> <?php echo e(__('Continue shopping')); ?> </a> -->
            <!-- </div> -->
            <!---------------------- start right column ------------------>
            <div class="order-container col-11 mx-auto">

                <?php echo $__env->make('plugins/ecommerce::orders.thank-you.order-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

               

                <!-- total info -->
                <?php echo $__env->make('plugins/ecommerce::orders.thank-you.total-info', ['order' => $order], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mx-auto mb-5 text-center">
                <a href="<?php echo e(route('public.index')); ?>" class="btn payment-checkout-btn"> <?php echo e(__('Continue shopping')); ?> </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plugins/ecommerce::orders.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/orders/thank-you.blade.php ENDPATH**/ ?>