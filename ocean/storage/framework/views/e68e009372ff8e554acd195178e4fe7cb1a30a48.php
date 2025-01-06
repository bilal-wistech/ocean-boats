<div class="form-group">
    <label for="header_style" class="control-label"><?php echo e(__('Header style')); ?></label>
    <?php echo Form::customSelect('header_style', get_layout_header_styles(), $headerStyle, ['class' => 'form-control', 'id' => 'header_style']); ?>

</div>

<?php if($page && $page->template == 'homepage'): ?>
    <div class="form-group">
        <label for="expanding_product_categories_on_the_homepage" class="control-label"><?php echo e(__('Expanding product categories on the homepage?')); ?></label>
        <?php echo Form::customSelect(
            'expanding_product_categories_on_the_homepage',
            [
                'yes' => trans('core/base::base.yes'),
                'no'  => trans('core/base::base.no'),
            ],
            'no',
            ['class' => 'form-control', 'id' => 'expanding_product_categories_on_the_homepage']
        ); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/additional-page-fields.blade.php ENDPATH**/ ?>