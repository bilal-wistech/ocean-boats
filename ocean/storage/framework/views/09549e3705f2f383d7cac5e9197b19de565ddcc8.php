<div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['mb-3', 'widget-item', 'col-md-' . $columns => $columns]) ?>" id="<?php echo e($id . '-parent'); ?>">
    <div class="h-100 bg-<?php echo e($color); ?>-opacity position-relative">
        <div class="d-flex px-2 py-3 position-relative">
            <?php if($icon): ?>
                <div class="block-left d-flex mr-1">
            <span class="align-self-center bg-white p-1">
                <i class="<?php echo e($icon); ?> fa-2x m-2"></i>
            </span>
                </div>
            <?php endif; ?>
            <div class="block-content mx-3">
                <p class="mb-1"><?php echo e($label); ?></p>
                <h5><?php echo e($value); ?></h5>
            </div>
        </div>
        <?php if($hasChart): ?>
            <div id="<?php echo e($id); ?>" class="position-absolute fixed-bottom"></div>
        <?php endif; ?>
    </div>

    <?php if($hasChart): ?>
        <?php echo $__env->make('core/base::widgets.partials.chart-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/widgets/card.blade.php ENDPATH**/ ?>