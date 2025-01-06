<nav aria-label="breadcrumb" class="d-inline-block">
    <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <?php $__currentLoopData = $crumbs = Theme::breadcrumb()->getCrumbs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($i != (count($crumbs) - 1)): ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb-item">
                    <a href="<?php echo e($crumb['url']); ?>" itemprop="item" title="<?php echo e($crumb['label']); ?>">
                        <?php echo BaseHelper::clean($crumb['label']); ?>

                        <meta itemprop="name" content="<?php echo e($crumb['label']); ?>" />
                    </a>
                    <meta itemprop="position" content="<?php echo e($i + 1); ?>" />
                </li>
            <?php else: ?>
                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="item">
                        <?php echo BaseHelper::clean($crumb['label']); ?>

                    </span>
                    <meta itemprop="name" content="<?php echo e($crumb['label']); ?>" />
                    <meta itemprop="position" content="<?php echo e($i + 1); ?>" />
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
</nav>
<?php /**PATH /home/oceanboats/public_html/platform/packages/theme/resources/views/partials/breadcrumb.blade.php ENDPATH**/ ?>