<section class="mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($products->total()): ?>
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col" colspan="2"><?php echo e(__('Product')); ?></th>
                                    <th scope="col"><?php echo e(__('Price')); ?></th>
                                    <th scope="col"><?php echo e(__('Stock Status')); ?></th>
                                    <th scope="col"><?php echo e(__('Action')); ?></th>
                                    <th scope="col"><?php echo e(__('Remove')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img alt="<?php echo e($product->name); ?>" src="<?php echo e(RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage())); ?>">
                                        </td>
                                        <td class="product-des product-name">
                                            <p class="product-name"><a href="<?php echo e($product->url); ?>"><?php echo e($product->name); ?></a></p>
                                        </td>

                                        <td class="price" data-title="<?php echo e(__('Price')); ?>">
                                            <span><?php echo e(format_price($product->front_sale_price_with_taxes)); ?></span>
                                            <?php if($product->front_sale_price != $product->price): ?>
                                                <small><del><?php echo e(format_price($product->price_with_taxes)); ?></del></small>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center" data-title="<?php echo e(__('Stock Status')); ?>">
                                            <span class="color3 font-weight-bold">
                                                <?php echo BaseHelper::clean($product->stock_status_html); ?>

                                            </span>
                                        </td>

                                        <td class="text-right" data-title="<?php echo e(__('Action')); ?>">
                                            <a href="#" class="btn btn-rounded btn-sm add-to-cart-button" data-id="<?php echo e($product->id); ?>" data-url="<?php echo e(route('public.cart.add-to-cart')); ?>"><i class="far fa-shopping-bag mr-5"></i><?php echo e(__('Add to cart')); ?></a>
                                        </td>

                                        <td class="action" data-title="<?php echo e(__('Remove')); ?>">
                                            <a href="#" class="js-remove-from-wishlist-button" data-url="<?php echo e(route('public.wishlist.remove', $product->id)); ?>"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php echo $products->withQueryString()->links(Theme::getThemeNamespace() . '::partials.custom-pagination'); ?>

                <?php else: ?>
                    <p><?php echo e(__('No item in wishlist!')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/wishlist.blade.php ENDPATH**/ ?>