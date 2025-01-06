<?php $__env->startSection('content'); ?>
    <?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.address.form', [
        'title' => __('Create Address'),
        'route' => 'customer.address.create',
        'address'   => app(\Botble\Ecommerce\Repositories\Interfaces\AddressInterface::class)->getModel(),
        'button'    => __('Add a new address')
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/address/create.blade.php ENDPATH**/ ?>