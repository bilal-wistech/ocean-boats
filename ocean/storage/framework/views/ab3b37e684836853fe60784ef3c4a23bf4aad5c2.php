<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            <?php $__currentLoopData = $crumbs = Theme::breadcrumb()->getCrumbs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($i != (count($crumbs) - 1)): ?>
                    <div itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb-item d-inline-block">
                        <a href="<?php echo e($crumb['url']); ?>" itemprop="item" title="<?php echo e($crumb['label']); ?>">
                            <?php echo e($crumb['label']); ?>

                            <meta itemprop="name" content="<?php echo e($crumb['label']); ?>" />
                        </a>
                        <meta itemprop="position" content="<?php echo e($i + 1); ?>" />
                    </div>
                    <span></span>
                <?php else: ?>
                    <div class="breadcrumb-item d-inline-block active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <span itemprop="item">
                            <?php echo $crumb['label']; ?>

                        </span>
                        <meta itemprop="name" content="<?php echo e($crumb['label']); ?>" />
                        <meta itemprop="position" content="<?php echo e($i + 1); ?>" />
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/breadcrumb.blade.php ENDPATH**/ ?>