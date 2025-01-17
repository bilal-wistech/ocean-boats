<?php if(empty($widgetSetting) || $widgetSetting->status == 1): ?>
    <div class="<?php echo e($widget->column); ?> col-12 widget_item" id="<?php echo e($widget->name); ?>" data-url="<?php echo e($widget->route); ?>">
        <div class="portlet light bordered portlet-no-padding <?php if($widget->hasLoadCallback): ?> widget-load-has-callback <?php endif; ?>">
            <div class="portlet-title">
                <div class="caption">
                    <i class="<?php echo e($widget->icon); ?> font-dark fw-bold" data-bs-toggle="tooltip" title="<?php echo e($widget->title); ?>"></i>
                    <span class="caption-subject font-dark d-none d-xl-inline"><?php echo e($widget->title); ?></span>
                </div>
                <?php echo $__env->make('core/dashboard::partials.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="portlet-body <?php if($widget->isEqualHeight): ?> equal-height <?php endif; ?> widget-content <?php echo e($widget->bodyClass); ?> <?php echo e(Arr::get($settings, 'state')); ?>"></div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/core/dashboard/resources/views/widgets/base.blade.php ENDPATH**/ ?>