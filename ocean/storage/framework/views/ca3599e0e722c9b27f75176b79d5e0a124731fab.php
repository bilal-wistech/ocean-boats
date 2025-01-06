<div class="sidebar-widget widget_categories mb-50">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title"><?php echo e($config['name']); ?></h5>
    </div>
    <div class="post-block-list post-module-1 post-module-5">
        <ul>
            <?php $__currentLoopData = app(\Botble\Blog\Repositories\Interfaces\CategoryInterface::class)->advancedGet(['condition' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED], 'take' => $config['number_display'], 'with' => ['slugable'], 'withCount' => ['posts']]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="cat-item cat-item-2">
                <a href="<?php echo e($category->url); ?>"><?php echo e($category->name); ?></a> (<?php echo e($category->posts_count); ?>)
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/////widgets/blog-categories/templates/frontend.blade.php ENDPATH**/ ?>