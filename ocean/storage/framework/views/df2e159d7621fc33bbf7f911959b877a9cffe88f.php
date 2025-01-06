<div class="sidebar-widget widget_tags mb-50">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title"><?php echo e($config['name']); ?></h5>
    </div>
    <div class="tagcloud">
        <?php $__currentLoopData = get_popular_tags($config['number_display'], ['slugable'], ['posts']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="tag-cloud-link" href="<?php echo e($tag->url); ?>"><?php echo e($tag->name); ?> </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/////widgets/tags/templates/frontend.blade.php ENDPATH**/ ?>