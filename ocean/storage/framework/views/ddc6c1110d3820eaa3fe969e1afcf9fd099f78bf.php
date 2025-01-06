<div class="col-lg-3 col-md-4 mb-lg-0 mb-md-5 mb-sm-5 widget-filter-item" data-type="visual">
    <h5 class="mb-20 widget__title" data-title="<?php echo e($set->title); ?>"><?php echo e(__('By :name', ['name' => $set->title])); ?></h5>
    <ul class="list-filter ps-custom-scrollbar">
        <?php $__currentLoopData = $attributes->where('attribute_set_id', $set->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li data-slug="<?php echo e($attribute->slug); ?>"
                data-toggle="tooltip"
                data-placement="top"
                title="<?php echo e($attribute->title); ?>"
                class="mx-1">
                <div class="custom-checkbox">
                    <label>
                        <input class="form-control product-filter-item" type="checkbox" name="attributes[]" value="<?php echo e($attribute->id); ?>" <?php echo e(in_array($attribute->id, $selected) ? 'checked' : ''); ?>>
			            <span style="<?php echo e($attribute->getAttributeStyle()); ?>"></span>
                    </label>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/attributes/_layouts-filter/visual.blade.php ENDPATH**/ ?>