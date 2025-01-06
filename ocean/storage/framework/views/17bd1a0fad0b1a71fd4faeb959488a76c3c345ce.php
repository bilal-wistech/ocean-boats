<?php if(!$isNotDefaultLanguage): ?>
    <script id="product_attribute_template" type="text/x-custom-template">
        <li data-id="__id__" class="clearfix">
            <div class="swatch-is-default">
                <input type="radio" name="related_attribute_is_default" value="__position__" __checked__>
            </div>
            <div class="swatch-title">
                <input type="text" class="form-control" value="__title__">
            </div>
            <div class="swatch-slug">
                <input type="text" class="form-control" value="__slug__">
            </div>
            <div class="swatch-value">
                <input type="text" class="form-control input-color-picker" value="__color__">
            </div>
            <div class="swatch-image">
                <div class="image-box-container">
                    <?php echo $__env->make('plugins/ecommerce::components.form.image', [
                        'name' => '',
                        'value' => '__image__',
                        'thumb' => RvMedia::getDefaultImage(),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="remove-item"><a href="#" class="font-red"><i class="fa fa-trash"></i></a></div>
        </li>
    </script>
    <textarea name="deleted_attributes" id="deleted_attributes" class="hidden"></textarea>
<?php endif; ?>

<textarea name="attributes" id="attributes" class="hidden"><?php echo json_encode($attributes); ?></textarea>
<div class="swatches-container">
    <div class="header clearfix">
        <?php if(!$isNotDefaultLanguage): ?>
            <div class="swatch-is-default">
                <?php echo e(trans('plugins/ecommerce::product-attribute-sets.is_default')); ?>

            </div>
        <?php endif; ?>
        <div class="swatch-title text-start">
            <?php echo e(trans('plugins/ecommerce::product-attribute-sets.title')); ?>

        </div>
        <?php if(!$isNotDefaultLanguage): ?>
            <div class="swatch-slug">
                <?php echo e(trans('plugins/ecommerce::product-attribute-sets.slug')); ?>

            </div>
            <div class="swatch-value">
                <?php echo e(trans('plugins/ecommerce::product-attribute-sets.color')); ?>

            </div>
            <div class="swatch-image">
                <?php echo e(trans('plugins/ecommerce::product-attribute-sets.image')); ?>

            </div>
            <div class="remove-item"><?php echo e(trans('plugins/ecommerce::product-attribute-sets.remove')); ?></div>
        <?php endif; ?>
    </div>
    <ul class="swatches-list">
        <?php if(count($attributes) > 0): ?>
            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-id="<?php echo e($attribute->id); ?>" class="clearfix">
                    <?php if(!$isNotDefaultLanguage): ?>
                        <div class="swatch-is-default">
                            <input type="radio" name="related_attribute_is_default" value="<?php echo e($attribute->order); ?>" <?php if($attribute->is_default): ?> checked <?php endif; ?>>
                        </div>
                    <?php endif; ?>
                    <div class="swatch-title">
                        <input type="text" class="form-control" value="<?php echo e($attribute->title); ?>">
                    </div>
                    <?php if(!$isNotDefaultLanguage): ?>
                        <div class="swatch-slug">
                            <input type="text" class="form-control" value="<?php echo e($attribute->slug); ?>">
                        </div>
                        <div class="swatch-value">
                            <input type="text" class="form-control input-color-picker" value="<?php echo e($attribute->color); ?>">
                        </div>
                        <div class="swatch-image">
                            <div class="image-box-container">
                                <?php echo $__env->make('plugins/ecommerce::components.form.image', [
                                    'name' => '',
                                    'value' => $attribute->image,
                                    'thumb' => $attribute->image ? RvMedia::getImageUrl($attribute->image, 'thumb') : RvMedia::getDefaultImage(),
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="remove-item"><a href="#" class="font-red"><i class="fa fa-trash"></i></a></div>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
    <?php if(!$isNotDefaultLanguage): ?>
        <button type="button" class="btn purple js-add-new-attribute"><?php echo e(trans('plugins/ecommerce::product-attribute-sets.add_new_attribute')); ?></button>
    <?php endif; ?>
    <div class="clearfix"></div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/product-attributes/sets/list.blade.php ENDPATH**/ ?>