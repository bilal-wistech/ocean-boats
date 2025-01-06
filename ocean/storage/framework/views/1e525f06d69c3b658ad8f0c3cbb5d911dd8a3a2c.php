<section class="mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($products->count()): ?>
                    <div class="table-responsive table__compare">
                        <table class="table text-center">
                            <tbody>
                                <tr class="pr_image">
                                    <td class="text-muted font-md fw-600"><?php echo e(__('Preview')); ?></td>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="row_img">
                                            <a href="<?php echo e($product->original_product->url); ?>"><img src="<?php echo e(RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($product->name); ?>"></a>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-md fw-600"><?php echo e(__('Name')); ?></td>

                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="product_name">
                                            <h5><a href="<?php echo e($product->original_product->url); ?>"><?php echo e($product->name); ?></a></h5>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-md fw-600"><?php echo e(__('Price')); ?></td>

                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="product_price">
                                            <span class="price"><?php echo e(format_price($product->front_sale_price_with_taxes)); ?></span> <?php if($product->front_sale_price !== $product->price): ?> <del><?php echo e(format_price($product->price_with_taxes)); ?> </del> <small>(<?php echo e(get_sale_percentage($product->price, $product->front_sale_price)); ?>)</small> <?php endif; ?>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <?php if(EcommerceHelper::isReviewEnabled()): ?>
                                    <tr class="pr_rating">
                                        <td class="text-muted font-md fw-600"><?php echo e(__('Rating')); ?></td>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width: <?php echo e($product->reviews_avg * 20); ?>%"></div>
                                                    </div>
                                                    <span class="rating_num">(<?php echo e($product->reviews_count); ?>)</span>
                                                </div>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endif; ?>

                                <tr class="description">
                                    <td class="text-muted font-md fw-600"><?php echo e(__('Description')); ?></td>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="row_text font-xs">
                                            <p>
                                                <?php echo BaseHelper::clean($product->description); ?>

                                            </p>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>

                                <?php $__currentLoopData = $attributeSets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($attributeSet->is_comparable): ?>
                                        <tr>
                                            <td class="text-muted font-md fw-600">
                                                <?php echo e($attributeSet->title); ?>

                                            </td>

                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $attributes = app(\Botble\Ecommerce\Repositories\Interfaces\ProductInterface::class)->getRelatedProductAttributes($product)->where('attribute_set_id', $attributeSet->id)->sortBy('order');
                                                ?>

                                                <?php if($attributes->count()): ?>
                                                    <?php if($attributeSet->display_layout == 'dropdown'): ?>
                                                        <td>
                                                            <?php echo e($attributes->pluck('title')->implode(', ')); ?>

                                                        </td>
                                                    <?php elseif($attributeSet->display_layout == 'text'): ?>
                                                        <td>
                                                            <div class="attribute-values">
                                                                <ul class="text-swatch attribute-swatch color-swatch">
                                                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li class="attribute-swatch-item" style="display: inline-block">
                                                                            <label>
                                                                                <input class="form-control product-filter-item" type="radio" disabled>
                                                                                <span style="cursor: default"><?php echo e($attribute->title); ?></span>
                                                                            </label>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>
                                                            <div class="attribute-values">
                                                                <ul class="visual-swatch color-swatch attribute-swatch">
                                                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li class="attribute-swatch-item" style="display: inline-block">
                                                                            <div class="custom-radio">
                                                                                <label>
                                                                                    <input class="form-control product-filter-item" type="radio" disabled>
                                                                                    <span style="<?php echo e($attribute->image ? 'background-image: url(' . RvMedia::getImageUrl($attribute->image) . ');' : 'background-color: ' . $attribute->color . ';'); ?>; cursor: default;"></span>
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <td>&mdash;</td>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if(EcommerceHelper::isCartEnabled()): ?>
                                    <tr class="pr_add_to_cart">
                                        <td class="text-muted font-md fw-600"><?php echo e(__('Buy now')); ?></td>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td class="row_btn">
                                                <a href="#" class="btn btn-rounded btn-sm add-to-cart-button" data-id="<?php echo e($product->id); ?>" data-url="<?php echo e(route('public.cart.add-to-cart')); ?>">
                                                    <i class="far fa-shopping-bag mr-5"></i><?php echo e(__('Add To Cart')); ?>

                                                </a>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endif; ?>

                                <tr class="pr_remove text-muted">
                                    <td class="text-muted font-md fw-600">&nbsp;</td>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="row_remove">
                                            <a class="js-remove-from-compare-button" href="#" data-url="<?php echo e(route('public.compare.remove', $product->id)); ?>">
                                                <i class="fa fa-trash-alt mr-5"></i>
                                                <span><?php echo e(__('Remove')); ?></span>
                                            </a>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-center"><?php echo e(__('No products in compare list!')); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/compare.blade.php ENDPATH**/ ?>