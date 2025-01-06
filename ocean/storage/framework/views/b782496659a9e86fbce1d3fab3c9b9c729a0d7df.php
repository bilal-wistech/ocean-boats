<div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['mb-3', 'widget-item', 'col-md-' . $columns => $columns]) ?>" id="<?php echo e($id . '-parent'); ?>">
    <div class="bg-white p-3">
        <h5><?php echo e($label); ?></h5>
        <div id="<?php echo e($id); ?>"></div>
    </div>
    <?php echo $__env->make('core/base::widgets.partials.chart-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/widgets/chart.blade.php ENDPATH**/ ?>