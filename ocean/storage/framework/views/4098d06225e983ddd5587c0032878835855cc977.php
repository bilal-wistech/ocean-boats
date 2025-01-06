<?php
    $layout = 'customize-boat';
?>

<div class="list-content-loading">
    <div class="half-circle-spinner">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>
</div>

<div class="shop-product-filter">
    <div class="totall-product">
        <p><?php echo BaseHelper::clean(__('We found :total items for you!', ['total' => '<strong class="text-brand">' . $products->total() . '</strong>'])); ?></p>
    </div>
    <div class="sort-by-product-area">
        <?php echo $__env->make(Theme::getThemeNamespace() . '::views/ecommerce/includes/gridsize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>


<input type="hidden" name="page" data-value="<?php echo e($products->currentPage()); ?>">
<input type="hidden" name="num" value="<?php echo e(request()->input('num')); ?>">
<input type="hidden" name="q" value="<?php echo e(BaseHelper::stringify(request()->query('q'))); ?>">

<div class="row boats">
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mx-auto boat-item" data-category="<?php echo e($product->detail->category_id); ?>">
            <?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.includes.boat-item', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="mt__60 mb__60 text-center">
            <p><?php echo e(__('No products found!')); ?></p>
        </div>
    <?php endif; ?>
</div>

<?php if($products->total() > 0): ?>
    <br>
    <?php echo $products->withQueryString()->onEachSide(1)->links(Theme::getThemeNamespace() . '::partials.custom-pagination'); ?>

<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/includes/boat-items.blade.php ENDPATH**/ ?>