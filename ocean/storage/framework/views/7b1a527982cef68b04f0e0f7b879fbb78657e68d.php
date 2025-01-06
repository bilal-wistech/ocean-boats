<?php if(Cart::instance('cart')->count() > 0): ?>
    <?php
        $products = get_products([
            'condition' => [
                ['ec_products.id', 'IN', Cart::instance('cart')->content()->pluck('id')->all()],
            ],
            'with' => ['slugable'],
        ]);
    ?>
    <?php if(count($products)): ?>
        <ul>
            <?php $__currentLoopData = Cart::instance('cart')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $product = $products->find($cartItem->id);
                ?>

                <?php if(!empty($product)): ?>
                    <li>
                        <div class="shopping-cart-img">
                            <a href="<?php echo e($product->original_product->url); ?>"><img alt="<?php echo e($product->name); ?>" src="<?php echo e(Arr::get($cartItem->options, 'image', $product->original_product->image)); ?>"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="<?php echo e($product->original_product->url); ?>"><?php echo e($product->name); ?>  <?php if($product->isOutOfStock()): ?> <span class="stock-status-label">(<?php echo $product->stock_status_html; ?>)</span> <?php endif; ?></a></h4>
                            <h3><span class="d-inline-block"><?php echo e($cartItem->qty); ?></span> <span class="d-inline-block"> x </span> <span class="d-inline-block"><?php echo e(format_price($cartItem->price)); ?></span> <?php if($product->front_sale_price != $product->price): ?>
                                    <small><del><?php echo e(format_price($product->price)); ?></del></small><?php endif; ?></h3>
                            <p class="mb-0"><small><?php echo e($cartItem->options['attributes'] ?? ''); ?></small></p>

                            <?php if(!empty($cartItem->options['options'])): ?>
                                <?php echo render_product_options_info($cartItem->options['options'], $product, true); ?>

                            <?php endif; ?>

                            <?php if(!empty($cartItem->options['extras']) && is_array($cartItem->options['extras'])): ?>
                                <?php $__currentLoopData = $cartItem->options['extras']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($option['key']) && !empty($option['value'])): ?>
                                        <p class="mb-0"><small><?php echo e($option['key']); ?>: <strong> <?php echo e($option['value']); ?></strong></small></p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="#" data-url="<?php echo e(route('public.cart.remove', $cartItem->rowId)); ?>" class="remove-cart-item"><i class="far fa-times"></i></a>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
    <div class="shopping-cart-footer">
        <div class="shopping-cart-total">
            <?php if(EcommerceHelper::isTaxEnabled()): ?>
                <h5><strong class="d-inline-block"><?php echo e(__('Sub Total')); ?>:</strong> <span><?php echo e(format_price(Cart::instance('cart')->rawSubTotal())); ?></span></h5>
                <div class="clearfix"></div>
                <h5><strong class="d-inline-block"><?php echo e(__('Tax')); ?>:</strong> <span><?php echo e(format_price(Cart::instance('cart')->rawTax())); ?></span></h5>
                <div class="clearfix"></div>
                <h4><strong class="d-inline-block"><?php echo e(__('Total')); ?>:</strong> <span><?php echo e(format_price(Cart::instance('cart')->rawSubTotal() + Cart::instance('cart')->rawTax())); ?></span></h4>
            <?php else: ?>
                <h4><strong class="d-inline-block"><?php echo e(__('Sub Total')); ?>:</strong> <span><?php echo e(format_price(Cart::instance('cart')->rawSubTotal())); ?></span></h4>
            <?php endif; ?>
        </div>
        <div class="shopping-cart-button">
            <a href="<?php echo e(route('public.cart')); ?>"><?php echo e(__('View cart')); ?></a>
            <?php if(session('tracked_start_checkout')): ?>
                <a href="<?php echo e(route('public.checkout.information', session('tracked_start_checkout'))); ?>"><?php echo e(__('Checkout')); ?></a>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <span><?php echo e(__('No products in the cart.')); ?></span>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/cart-panel.blade.php ENDPATH**/ ?>