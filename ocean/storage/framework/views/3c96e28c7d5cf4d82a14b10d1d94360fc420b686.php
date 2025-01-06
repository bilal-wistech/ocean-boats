<?php if(isset($products) && $products): ?>
    <p><?php echo e(__('Product(s)')); ?>:</p>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $cartItem = $product->cartItem;
        ?>

        <?php if(!empty($product)): ?>
            <?php echo $__env->make('plugins/ecommerce::orders.checkout.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <hr>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/orders/checkout/products.blade.php ENDPATH**/ ?>