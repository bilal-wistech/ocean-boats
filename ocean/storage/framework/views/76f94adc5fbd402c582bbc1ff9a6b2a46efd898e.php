<section class="mt-60 mb-60">
    <div class="container">
    <form class="form--shopping-cart" method="post" action="<?php echo e(route('public.cart.update')); ?>">
        <div class="row">
       
            <div class="col-lg-8 col-sm-12 col-md-12 section--shopping-cart border p-md-4 border-radius-6">
                <?php echo csrf_field(); ?> <?php if(count($products) > 0): ?> <div class="table-responsive">
                        <table class="table shopping-summery text-center clean table--cart">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col"><?php echo e(__('Product')); ?></th>
                                    <!-- <th scope="col"><?php echo e(__('Name')); ?></th> -->
                                    <th scope="col"><?php echo e(__('Price')); ?></th>
                                    <th scope="col"><?php echo e(__('Quantity')); ?></th>
                                    <th scope="col"><?php echo e(__('Subtotal')); ?></th>
                                    <th scope="col"><?php echo e(__('Remove')); ?></th>
                                </tr>
                            </thead>
                            <tbody> <?php $__currentLoopData = Cart::instance('cart')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $product = $products->find($cartItem->id); ?> <?php if(!empty($product)): ?> <tr>
                                    <td class="image product-thumbnail">
                                        <input type="hidden" name="items[<?php echo e($key); ?>][rowId]" value="<?php echo e($cartItem->rowId); ?>">
                                        <div class="product-container">
                                            <a href="<?php echo e($product->original_product->url); ?>">
                                                <img src="<?php echo e($cartItem->options['image']); ?>" alt="<?php echo e($product->name); ?>" />
                                            </a>
                                            <div class="product-des">
                                                <p class="product-name"><a href="<?php echo e($product->original_product->url); ?>"><?php echo e($product->name); ?> <?php if($product->isOutOfStock()): ?> <span class="stock-status-label">(<?php echo $product->stock_status_html; ?>)</span> <?php endif; ?></a></p>
                                                <p class="mb-0"><small><?php echo e($cartItem->options['attributes'] ?? ''); ?></small></p> <?php if(!empty($cartItem->options['options'])): ?> <?php echo render_product_options_info($cartItem->options['options'], $product, true); ?> <?php endif; ?> <?php if(!empty($cartItem->options['extras']) && is_array($cartItem->options['extras'])): ?> <?php $__currentLoopData = $cartItem->options['extras']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(!empty($option['key']) && !empty($option['value'])): ?> <p class="mb-0"><small><?php echo e($option['key']); ?>: <strong> <?php echo e($option['value']); ?></strong></small></p> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td class="product-des product-name">
                                                <p class="product-name"><a href="<?php echo e($product->original_product->url); ?>"><?php echo e($product->name); ?>  <?php if($product->isOutOfStock()): ?> <span class="stock-status-label">(<?php echo $product->stock_status_html; ?>)</span> <?php endif; ?></a></p>
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
                                            </td> -->
                                    <td class="price" data-title="<?php echo e(__('Price')); ?>">
                                        <span><?php echo e(format_price_cart($cartItem->price)); ?></span> <?php if($product->front_sale_price != $product->price): ?> <small><del><?php echo e(format_price_cart($product->price)); ?></del></small> <?php endif; ?>
                                    </td>
                                    <td class="text-center" data-title="<?php echo e(__('Quantity')); ?>">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" class="qty-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            <input type="number" min="1" value="<?php echo e($cartItem->qty); ?>" name="items[<?php echo e($key); ?>][values][qty]" class="qty-val qty-input" />
                                            <a href="#" class="qty-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="<?php echo e(__('Subtotal')); ?>">
                                        <span><?php echo e(format_price_cart($cartItem->price * $cartItem->qty)); ?></span>
                                    </td>
                                    <td class="action" data-title="<?php echo e(__('Remove')); ?>">
                                        <a href="#" class="text-muted remove-cart-button" data-url="<?php echo e(route('public.cart.remove', $cartItem->rowId)); ?>"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr> 
                                <?php endif; ?> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </tbody>
                        </table>
                    
                    <!-- <div class="cart-action text-end">
                        <a class="btn btn-rounded" href="<?php echo e(route('public.products')); ?>"><i class="far fa-cart-plus mr-5"></i><?php echo e(__('Continue Shopping')); ?></a>
                    </div> --> <?php if(Cart::instance('cart')->count() > 0): ?>
                    <!-- <div class="divider center_icon mt-50 mb-50"><i class="fa fa-gem"></i></div> -->
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-30 mt-20">
                                <!-- <div class="heading_s1 mb-3">
                                        <h4><?php echo e(__('Apply Coupon')); ?></h4>
                                    </div> -->
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon form-coupon-wrapper">
                                            <div class="form-row row justify-content-center">
                                                <div class="form-group col-lg-6 d-flex justify-content-center">
                                                    <input class="font-medium coupon-code" type="text" name="coupon_code" value="<?php echo e(old('coupon_code')); ?>" placeholder="<?php echo e(__('Enter coupon code')); ?>">
                                                    <button class="btn btn-sm btn-apply-coupon-code" type="button" data-url="<?php echo e(route('public.coupon.apply')); ?>"><i class="far fa-bookmark mr-5"></i><?php echo e(__('Apply')); ?></button>
                                                </div>
                                                <div class="cart-action col-lg-6 col-sm-12 text-center">
                                                    <a class="btn btn-rounded" href="<?php echo e(route('public.products')); ?>"><i class="far fa-cart-plus mr-5"></i><?php echo e(__('Continue Shopping')); ?></a>
                                                </div>
                                                <!-- <div class="form-group col-lg-6">
                                                        <button class="btn btn-sm btn-apply-coupon-code" type="button" data-url="<?php echo e(route('public.coupon.apply')); ?>"><i class="far fa-bookmark mr-5"></i><?php echo e(__('Apply')); ?></button>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
             <?php endif; ?>
              <?php else: ?> <p class="text-center"><?php echo e(__('Your cart is empty!')); ?></p> 
              <?php endif; ?>
            </div>
        <div class="col-lg-4 col-md-12">
            <div class="border border-radius-2 cart-total justify-content-center">
                                <div class="heading_s1 mb-3">
                                    <p>Cart Total
                                    <p>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mt-15">
                                        <tbody> <?php if(EcommerceHelper::isTaxEnabled()): ?> <tr>
                                                <td class="cart_total_label fw-600">Subtotal</td>
                                                <td class="cart_total_amount"><span class="font-xl text-brand"><?php echo e(format_price_cart(Cart::instance('cart')->rawSubTotal())); ?></span></span></td>
                                            <!--</tr> <?php endif; ?> <tr>-->
                                            <!--    <td class="cart_total_label fw-600">Shipping</td>-->
                                            <!--    <td class="cart_total_amount"><span class="font-xl text-brand">Free Shipping</span></span></td>-->
                                            <!--</tr>-->
                                            <tr>
                                                <td class="cart_total_label fw-600"><?php echo e(__('VAT 5%')); ?></td>
                                                <td class="cart_total_amount"><span class="font-xl text-brand"><?php echo e(format_price_cart(Cart::instance('cart')->rawTax())); ?></span></span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label fw-600"><?php echo e(__('Total')); ?></td>
                                                <td class="cart_total_amount"><span class="font-xl text-brand"><?php echo e(($promotionDiscountAmount + $couponDiscountAmount) > Cart::instance('cart')->rawTotal() ? format_price_cart(0) : format_price_cart(Cart::instance('cart')->rawTotal() - $promotionDiscountAmount - $couponDiscountAmount)); ?></span></span></td>
                                            </tr>
                                        </tbody>
                                        <!-- <tbody>
                                                <?php if(EcommerceHelper::isTaxEnabled()): ?>
                                                    <tr>
                                                        <td class="cart_total_label"><?php echo e(__('Tax')); ?></td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand"><?php echo e(format_price_cart(Cart::instance('cart')->rawTax())); ?></span></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if($couponDiscountAmount > 0 && session('applied_coupon_code')): ?>
                                                    <tr>
                                                        <td class="cart_total_label"><?php echo e(__('Coupon code: :code', ['code' => session('applied_coupon_code')])); ?> (<small><a class="btn-remove-coupon-code text-danger" data-url="<?php echo e(route('public.coupon.remove')); ?>" href="javascript:void(0)" data-processing-text="<?php echo e(__('Removing...')); ?>"><?php echo e(__('Remove')); ?></a></small>)<span></td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand"><?php echo e(format_price_cart($couponDiscountAmount)); ?></span></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if($promotionDiscountAmount): ?>
                                                    <tr>
                                                        <td class="cart_total_label"><?php echo e(__('Discount promotion')); ?></td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand"><?php echo e(format_price_cart($promotionDiscountAmount)); ?></span></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <tr>
                                                    <td class="cart_total_label"><?php echo e(__('Total')); ?> <small>(<?php echo e(__('Shipping fees not included')); ?>)</small></td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand"><?php echo e(($promotionDiscountAmount + $couponDiscountAmount) > Cart::instance('cart')->rawTotal() ? format_price_cart(0) : format_price_cart(Cart::instance('cart')->rawTotal() - $promotionDiscountAmount - $couponDiscountAmount)); ?></span></span></strong></td>
                                                </tr>
                                            </tbody> -->
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12 mx-auto justify-content-center d-flex">
                                        <button type="submit" name="checkout" class="btn mt-30 mb-50"> <i class="fa fa-share-square mr-10"></i> <?php echo e(__('Proceed To Checkout')); ?></button>
                                    </div>
                                </div>
            </div>
           </div>
        </div>
    </div>
</div>
</section><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/cart.blade.php ENDPATH**/ ?>