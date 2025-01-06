<?php if($displayBasePrice): ?>
    <small style="display:block"><?php echo e(trans('plugins/ecommerce::product-option.price')); ?>: <strong style="float: right"><?php echo e(format_price($product->original_product->front_sale_price_with_taxes)); ?></strong></small>
<?php endif; ?>

<?php $__currentLoopData = $productOptions['optionCartValue']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $price = 0;
        $totalOptionValue = count($optionValue);
    ?>
    <?php if(!$totalOptionValue) continue; ?>
    <small style="display: block">
        <?php echo e($productOptions['optionInfo'][$key]); ?>:

        <?php $__currentLoopData = $optionValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if ($value['affect_type'] == 1) {
                    $price += ($product->original_product->front_sale_price_with_taxes * $value['affect_price']) / 100;
                } else {
                    $price += $value['affect_price'];
                }
            ?>

            <strong><?php echo e($value['option_value']); ?></strong>
            <?php if($key + 1 < $totalOptionValue): ?> , <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($price > 0): ?>
            <strong style="float: right">+ <?php echo e(format_price($price)); ?></strong>
        <?php endif; ?>
    </small>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/themes/options/render-options-info.blade.php ENDPATH**/ ?>