<div class="col-lg-3 col-md-4 mb-lg-0 mb-md-5 mb-sm-5 widget-filter-item" data-type="text">
    <h5 class="mb-15 widget__title" data-title="<?php echo e($set->title); ?>" ><?php echo e(__('By :name', ['name' => $set->title])); ?></h5>
    <div class="list-filter size-filter font-small ps-custom-scrollbar">
        <?php $__currentLoopData = $attributes->where('attribute_set_id', $set->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li data-slug="<?php echo e($attribute->slug); ?>">
                <label>
                    <input class="product-filter-item" type="checkbox" name="attributes[]" value="<?php echo e($attribute->id); ?>" <?php echo e(in_array($attribute->id, $selected) ? 'checked' : ''); ?>>
                    <span><?php echo e($attribute->title); ?></span>
                </label>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/attributes/_layouts-filter/text.blade.php ENDPATH**/ ?>