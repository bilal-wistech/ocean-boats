<?php $__currentLoopData = RvMedia::getConfig('libraries.javascript', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script src="<?php echo e(asset($js)); ?>" type="text/javascript"></script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/oceanboats/public_html/platform/core/media/resources/views/footer.blade.php ENDPATH**/ ?>