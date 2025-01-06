<div
    class="form-group variant-radio product-option product-option-<?php echo e(Str::slug($option->name)); ?> product-option-<?php echo e($option->id); ?>"
    style="margin-bottom:10px">
    <div class="product-option-item-wrapper">
        <div class="product-option-item-label">
            <label class="<?php echo e(($option->required) ? 'required' : ''); ?>">
                <?php echo e($option->name); ?>

            </label>
        </div>
        <div class="product-option-item-values">
            <input type="hidden" name="options[<?php echo e($option->id); ?>][option_type]" value="checkbox"/>
            <?php $__currentLoopData = $option->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $price = 0;
                    if (!empty($value->affect_price) && doubleval($value->affect_price) > 0) {
                        $price = $value->affect_type == 0 ? $value->affect_price : (floatval($value->affect_price) * $product->front_sale_price_with_taxes) / 100;
                    }
                ?>
                <div class="form-checkbox">
                    <input data-extra-price="<?php echo e($price); ?>" type="checkbox" name="options[<?php echo e($option->id); ?>][values][]"
                           value="<?php echo e($value->option_value); ?>"
                           id="option-<?php echo e($option->id); ?>-value-<?php echo e(Str::slug($value->option_value)); ?>"  <?php if($option->required && $loop->first): ?> checked <?php endif; ?>>
                    <label for="option-<?php echo e($option->id); ?>-value-<?php echo e(Str::slug($value->option_value)); ?>">
                        &nbsp;<?php echo e($value->option_value); ?>

                        <?php if($price > 0): ?>
                            <strong class="extra-price">+ <?php echo e(format_price($price)); ?></strong>
                        <?php endif; ?>
                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/themes/options/checkbox.blade.php ENDPATH**/ ?>