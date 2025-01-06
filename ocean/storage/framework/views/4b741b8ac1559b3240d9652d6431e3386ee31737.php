<div class="dropdown-swatches-wrapper attribute-swatches-wrapper" data-type="dropdown">
    <div class="attribute-name"><?php echo e($set->title); ?></div>
    <div class="attribute-values">
        <div class="dropdown-swatch">
            <label>
                <select class="form-control product-filter-item">
                    <option value=""><?php echo e(__('Select') . ' ' . strtolower($set->title)); ?></option>
                    <?php $__currentLoopData = $attributes->where('attribute_set_id', $set->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                                value="<?php echo e($attribute->id); ?>"
                                data-id="<?php echo e($attribute->id); ?>"
                                <?php echo e($selected->where('id', $attribute->id)->count() ? 'selected' : ''); ?>

                                <?php if(!$variationInfo->where('id', $attribute->id)->count()): ?> disabled="disabled" <?php endif; ?>>
                            <?php echo e($attribute->title); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </label>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/attributes/_layouts/dropdown.blade.php ENDPATH**/ ?>