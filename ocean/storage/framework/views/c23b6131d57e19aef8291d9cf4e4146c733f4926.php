<div class="list-photo-hover-overlay">
    <ul class="photo-overlay-actions">
        <li>
            <a class="mr10 btn-trigger-edit-product-image" data-bs-toggle="tooltip" data-placement="bottom" data-bs-original-title="<?php echo e(trans('core/base::base.change_image')); ?>">
                <i class="fa fa-edit"></i>
            </a>
        </li>
        <li>
            <a class="mr10 btn-trigger-remove-product-image" data-bs-toggle="tooltip" data-placement="bottom" data-bs-original-title="<?php echo e(trans('core/base::base.delete_image')); ?>">
                <i class="fa fa-trash"></i>
            </a>
        </li>
    </ul>
</div>
<div class="custom-image-box image-box">
    <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>" class="image-data">
    <img src="<?php echo e($thumb); ?>" alt="<?php echo e(trans('core/base::base.preview_image')); ?>" class="preview_image">
    <div class="image-box-actions">
        <a class="btn-images" data-result="<?php echo e($name); ?>" data-action="select-image">
            <?php echo e(trans('core/base::forms.choose_image')); ?>

        </a> |
        <a class="btn_remove_image">
            <span></span>
        </a>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/components/form/image.blade.php ENDPATH**/ ?>