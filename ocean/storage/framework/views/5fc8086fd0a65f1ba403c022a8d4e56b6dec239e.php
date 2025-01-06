
<?php $__env->startSection('content'); ?>
    <?php if(cache()->has('boat_data')): ?>
        <div class="alert alert-success">
            Boat saved successfully. Click Book Now for payment!
        </div>
        <?php
        cache()->forget('boat_data');
        ?>
    <?php endif; ?>
    
    <?php if(cache()->has('payment_success')): ?>
        <div class="alert alert-success">
            Thanks for Booking, we have received your downpayment. Our team will get in touch with you shortly.
        </div>
        <?php
        cache()->forget('payment_success');
        ?>
    <?php endif; ?>
    <?php
    cache()->forget('boat_data');
    ?>
    <?php if(cache()->has('failure')): ?>
        <div class="alert alert-danger">
            Something went wrong! Please try again later
        </div>
        <?php
        cache()->forget('failure');
        ?>
    <?php endif; ?>
    <?php
    cache()->forget('boat_data');
    ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><?php echo e(__('Hello :name!', ['name' => auth('customer')->user()->name])); ?> </h5>
        </div>
        <div class="card-body">
            <p>
                <?php echo BaseHelper::clean(__('From your account dashboard. you can easily check &amp; view your <a href=":order">recent orders</a>', [
                    'order' => route('customer.orders'),
                ])); ?>,

                <?php echo BaseHelper::clean(__('manage your <a href=":address">shipping and billing addresses</a> and <a href=":profile">edit your password and account details.</a>', [
                    'profile' => route('customer.edit-account'),
                    'address' => route('customer.address'),
                ])); ?>

            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/overview.blade.php ENDPATH**/ ?>