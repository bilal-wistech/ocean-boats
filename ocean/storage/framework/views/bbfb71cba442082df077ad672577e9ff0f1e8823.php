<?php if($product): ?>
    <div class="product-cart-wrap mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="<?php echo e($product->url); ?>">
                    <img class="default-img" src="<?php echo e(RvMedia::getImageUrl($product->image, 'product-thumb', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($product->name); ?>">
                    <img class="hover-img" src="<?php echo e(RvMedia::getImageUrl($product->images[1] ?? $product->image, 'product-thumb', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($product->name); ?>">
                </a>
            </div>
            <!-- maryam -->
            <!-- <div class="product-action-1">
                <a aria-label="<?php echo e(__('Quick View')); ?>" href="#" class="action-btn hover-up js-quick-view-button" data-url="<?php echo e(route('public.ajax.quick-view', $product->id)); ?>"><i class="far fa-eye"></i></a>
                <?php if(EcommerceHelper::isWishlistEnabled()): ?>
                    <a aria-label="<?php echo e(__('Add To Wishlist')); ?>" href="#" class="action-btn hover-up js-add-to-wishlist-button" data-url="<?php echo e(route('public.wishlist.add', $product->id)); ?>"><i class="far fa-heart"></i></a>
                <?php endif; ?>
                <?php if(EcommerceHelper::isCompareEnabled()): ?>
                    <a aria-label="<?php echo e(__('Add To Compare')); ?>" href="#" class="action-btn hover-up js-add-to-compare-button" data-url="<?php echo e(route('public.compare.add', $product->id)); ?>"><i class="far fa-exchange-alt"></i></a>
                <?php endif; ?>
            </div> -->
            <div class="product-badges product-badges-position product-badges-mrg">
                <?php if($product->isOutOfStock()): ?>
                    <span style="background-color: #000; font-size: 11px;"><?php echo e(__('Out Of Stock')); ?></span>
                <?php else: ?>
                    <?php if($product->productLabels->count()): ?>
                        <?php $__currentLoopData = $product->productLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span <?php if($label->color): ?> style="background-color: <?php echo e($label->color); ?>" <?php endif; ?>><?php echo e($label->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php elseif($product->front_sale_price !== $product->price && $percentSale = get_sale_percentage($product->price, $product->front_sale_price)): ?>
                        <span class="hot"><?php echo e($percentSale); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="product-content-wrap">
            <?php $category = $product->categories->sortByDesc('id')->first(); ?>

            <!-- maryam -->
            <!-- <?php if($category): ?>
                <div class="product-category">
                    <a href="<?php echo e($category->url); ?>"><?php echo e($category->name); ?></a>
                </div>
            <?php endif; ?> -->
            <h2><a href="<?php echo e($product->url); ?>"><?php echo e(strlen($product->name) > 20 ? substr($product->name, 0, 20) . '...' : $product->name); ?></a></h2>


            <!-- <?php if(EcommerceHelper::isReviewEnabled()): ?>
                <div class="rating_wrap">
                    <div class="rating">
                        <div class="product_rate" style="width: <?php echo e($product->reviews_avg * 20); ?>%"></div>
                    </div>
                    <span class="rating_num">(<?php echo e($product->reviews_count); ?>)</span>
                </div>
            <?php endif; ?> -->

            <?php echo apply_filters('ecommerce_before_product_price_in_listing', null, $product); ?>


            <div class="product-price">
                <span><?php echo e(format_price($product->front_sale_price_with_taxes)); ?></span>
                <?php if($product->front_sale_price !== $product->price): ?>
                    <span class="old-price"><?php echo e(format_price($product->price_with_taxes)); ?></span>
                <?php endif; ?>
            </div>

            <?php echo apply_filters('ecommerce_after_product_price_in_listing', null, $product); ?>


            <?php if(EcommerceHelper::isCartEnabled()): ?>
                <div class="product-action-1 show" <?php if(!EcommerceHelper::isReviewEnabled()): ?> style="bottom: 10px;" <?php endif; ?>>
                <a href="#" class="action-btn hover-up js-add-to-wishlist-button" data-url="<?php echo e(route('public.wishlist.add', $product->id)); ?>"><i class="far fa-heart"></i></a>
                <a class="action-btn hover-up add-to-cart-button" data-id="<?php echo e($product->id); ?>" data-url="<?php echo e(route('public.cart.add-to-cart')); ?>" href="#"><i class="far fa-shopping-bag"></i></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/includes/product-item.blade.php ENDPATH**/ ?>