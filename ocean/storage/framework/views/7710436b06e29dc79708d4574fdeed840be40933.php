<?php if($product): ?>
    <div class="product-cart-wrap boat-custom mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="<?php echo e(url('/customize-boat/'.$product->id)); ?>">
                    <img class="default-img" src="<?php echo e(RvMedia::getImageUrl($product->main_image, '', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($product->name); ?>">
                    <!-- <img class="hover-img" src="<?php echo e(RvMedia::getImageUrl($product->image[1] ?? $product->image, 'product-thumb', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($product->name); ?>"> -->
                </a>
            </div>
            <!-- <div class="product-action-1">
                <a aria-label="<?php echo e(__('Quick View')); ?>" href="#" class="action-btn hover-up js-quick-view-button" data-url="<?php echo e(route('public.ajax.quick-view', $product->id)); ?>"><i class="far fa-eye"></i></a>
                <?php if(EcommerceHelper::isWishlistEnabled()): ?>
                    <a aria-label="<?php echo e(__('Add To Wishlist')); ?>" href="#" class="action-btn hover-up js-add-to-wishlist-button" data-url="<?php echo e(route('public.wishlist.add', $product->id)); ?>"><i class="far fa-heart"></i></a>
                <?php endif; ?>
                <?php if(EcommerceHelper::isCompareEnabled()): ?>
                    <a aria-label="<?php echo e(__('Add To Compare')); ?>" href="#" class="action-btn hover-up js-add-to-compare-button" data-url="<?php echo e(route('public.compare.add', $product->id)); ?>"><i class="far fa-exchange-alt"></i></a>
                <?php endif; ?>
            </div> -->
            
        </div>
        <div class="product-content-wrap text-center">
            <h2><?php echo e($product->ltitle); ?></h2>


            <div class="product-price">
                STARTING AT
                <span>&nbsp;<?php echo e(format_price($product->price)); ?></span>
            </div>

            <div class="justify-content-center desc">
                <span><?php echo e($product->descp); ?></span>
            </div>

            <div class="justify-content-center mt-20 mb-20">
                <a href="<?php echo e(url('/customize-boat/'.$product->id)); ?>"><button type="button" class="btn boat">Build Your Boat</button></a>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/includes/boat-item.blade.php ENDPATH**/ ?>