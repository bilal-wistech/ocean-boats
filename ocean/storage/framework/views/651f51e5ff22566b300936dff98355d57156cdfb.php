<ul class="<?php echo e($className ?? ''); ?>">
    <?php $__currentLoopData = $categories->where('parent_id', $parent_id ?? 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $totalChildren = $categories->where('parent_id', $category->id)->count()
        ?>
        <li class="folder-root open" data-id="<?php echo e($category->id); ?>">
            <a href="<?php echo e($canEdit && $editRoute ? route($editRoute, $category->id) : ''); ?>" class="fetch-data category-name">
                <?php if($totalChildren): ?>
                    <i class="far fa-folder"></i>
                <?php else: ?>
                    <i class="far fa-file"></i>
                <?php endif; ?>
                <span><?php echo e($category->name); ?></span>
                <?php if($category->badge_with_count): ?>
                    <?php echo $category->badge_with_count; ?>

                <?php endif; ?>
            </a>
            <?php if($category->url): ?>
                <a href="<?php echo e($category->url); ?>"
                    target="_blank"
                    class="text-info"
                    data-bs-toggle="tooltip"
                    data-bs-original-title="<?php echo e(trans('core/base::forms.view_new_tab')); ?>">
                    <i class="fas fa-external-link-alt"></i>
                </a>
            <?php endif; ?>
            <?php if($canDelete): ?>
                <a href="#"
                    class="btn btn-icon btn-danger deleteDialog"
                    data-section="<?php echo e(route($deleteRoute, $category->id)); ?>"
                    role="button"
                    data-bs-toggle="tooltip"
                    data-bs-original-title="<?php echo e(trans('core/table::table.delete')); ?>">
                    <i class="fa fa-trash"></i>
                </a>
            <?php endif; ?>
            <?php if($totalChildren): ?>
                <i class="far fa-minus-square file-opener-i"></i>
                <?php echo $__env->make('core/base::forms.partials.tree-category', ['parent_id' => $category->id, 'className' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/forms/partials/tree-category.blade.php ENDPATH**/ ?>