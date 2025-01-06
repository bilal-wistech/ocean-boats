<div class="form-group variant-radio product-option product-option-<?php echo e(Str::slug($option->name)); ?> product-option-<?php echo e($option->id); ?>">
    <div class="product-option-item-wrapper">
        <div class="product-option-item-label">
            <label class="<?php echo e($option->required ? 'required' : ''); ?>">
                <?php echo e($option->name); ?>

            </label>
        </div>
        <div class="product-option-item-values">
            <input type="hidden" name="options[<?php echo e($option->id); ?>][option_type]" value="dropdown" />
            <select <?php echo e($option->required ? 'required' : ''); ?> name="options[<?php echo e($option->id); ?>][values]"
                    class="form-select">
                <?php $__currentLoopData = $option->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $price = 0;
                        if (!empty($value->affect_price) && doubleval($value->affect_price) > 0) {
                            $price = $value->affect_type == 0 ? $value->affect_price : (floatval($value->affect_price) * $product->front_sale_price_with_taxes) / 100;
                        }
                    ?>
                    <option data-extra-price="<?php echo e($price); ?>"
                            value="<?php echo e($value->option_value); ?>"><?php echo e($value->option_value); ?> <?php echo e($price > 0 ? '+' . format_price($price) : ''); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/themes/options/dropdown.blade.php ENDPATH**/ ?>