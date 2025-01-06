<?php
    Arr::set($attributes, 'class', Arr::get($attributes, 'class') . ' icon-select');
    Arr::set($attributes, 'data-empty', __('None'));
?>

<?php echo Form::customSelect($name, [$value => $value], $value, $attributes); ?>


<?php if (! $__env->hasRenderedOnce('f786fa66-fad3-45f2-853a-566829f11220')): $__env->markAsRenderedOnce('f786fa66-fad3-45f2-853a-566829f11220'); ?>
    <?php if(request()->ajax()): ?>
        <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(Theme::asset()->url('css/vendors/fontawesome-all.min.css')); ?>">
        <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(Theme::asset()->url('css/vendors/wowy-font.css')); ?>">
        <script src="<?php echo e(Theme::asset()->url('js/icons-field.js')); ?>?v=1.0.1"></script>
    <?php else: ?>
        <?php $__env->startPush('header'); ?>
            <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(Theme::asset()->url('css/vendors/fontawesome-all.min.css')); ?>">
            <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(Theme::asset()->url('css/vendors/wowy-font.css')); ?>">
            <script src="<?php echo e(Theme::asset()->url('js/icons-field.js')); ?>?v=1.0.1"></script>
        <?php $__env->stopPush(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/forms/fields/icons-field.blade.php ENDPATH**/ ?>