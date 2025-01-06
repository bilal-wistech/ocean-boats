<div class="form-group">
    <label class="control-label" for="icon"><?php echo e(__('Font Icon')); ?></label>
    <?php echo Form::themeIcon('icon', $icon, ['class' =>'form-control', 'id' => 'icon-select']); ?>

</div>

<div class="form-group">
    <label class="control-label" for="icon_image"><?php echo e(__('Icon Image (It will replace Font Icon if it is present)')); ?></label>
    <?php echo Form::mediaImage('icon_image', $iconImage); ?>

</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/product-category-fields.blade.php ENDPATH**/ ?>