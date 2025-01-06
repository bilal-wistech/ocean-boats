<?php
    Assets::addScripts('apexchart')
        ->addStyles('apexchart')
?>

<?php $__env->startPush('footer'); ?>
    <script>
        $(document).ready(function () {
            (new ApexCharts(document.querySelector("#<?php echo e($id); ?>"), <?php echo json_encode($options, 15, 512) ?>)).render()
        })
    </script>
<?php $__env->stopPush(); ?>

<?php if(request()->ajax()): ?>
    <script>
        (new ApexCharts(document.querySelector("#<?php echo e($id); ?>"), <?php echo json_encode($options, 15, 512) ?>)).render()
    </script>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/widgets/partials/chart-script.blade.php ENDPATH**/ ?>