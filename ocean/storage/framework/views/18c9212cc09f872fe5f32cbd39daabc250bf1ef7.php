<section class="pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 mb-20 text-center">
                            <h3 class="mb-20"><?php echo e(__('Order tracking')); ?></h3>
                            <p><?php echo e(__('Tracking your order status')); ?></p>
                        </div>
                        <form method="GET" action="<?php echo e(route('public.orders.tracking')); ?>">
                            <div class="form-group">
                                <label for="txt-order-id"><?php echo e(__('Order ID')); ?><sup>*</sup></label>
                                <input class="form-control" name="order_id" id="txt-order-id" type="text" value="<?php echo e(old('order_id', request()->input('order_id'))); ?>" placeholder="<?php echo e(__('Order ID')); ?>">
                                <?php if($errors->has('order_id')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('order_id')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="txt-email"><?php echo e(__('Email Address')); ?><sup>*</sup></label>
                                <input class="form-control" name="email" id="txt-email" type="email" value="<?php echo e(old('email', request()->input('email'))); ?>" placeholder="<?php echo e(__('Your Email')); ?>">
                                <?php if($errors->has('email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group submit">
                                <button class="btn btn-fill-out btn-block hover-up" type="submit"><?php echo e(__('Find')); ?></button>
                            </div>
                    </form>

                <?php if($order): ?>
                    <div class="customer-order-detail" style="margin-top: 60px">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><?php echo e(__('Order information')); ?></h5>
                                <p>
                                    <span><?php echo e(__('Order number')); ?>:</span>
                                    <strong><?php echo e(get_order_code($order->id)); ?></strong>
                                </p>
                                <p>
                                    <span><?php echo e(__('Time')); ?>:</span> <strong><?php echo e($order->created_at->format('h:m d/m/Y')); ?></strong>
                                </p>
                                <p>
                                    <span><?php echo e(__('Order status')); ?>:</span> <strong class="text-info"><?php echo e($order->status->label()); ?></strong>
                                </p>

                                <p>
                                    <span><?php echo e(__('Payment method')); ?>:</span> <strong class="text-info"><?php echo e($order->payment->payment_channel->label()); ?></strong>
                                </p>

                                <p>
                                    <span><?php echo e(__('Payment status')); ?>:</span> <strong class="text-info"><?php echo e($order->payment->status->label()); ?></strong>
                                </p>
                                <?php if($order->description): ?>
                                    <p>
                                        <span><?php echo e(__('Note')); ?>:</span> <strong class="text-warning"><i><?php echo e($order->description); ?></i></strong>
                                    </p>
                                <?php endif; ?>

                            </div>
                            <div class="col-md-6 customer-information-box text-right">
                                <h5><?php echo e(__('Customer information')); ?></h5>

                                <p>
                                    <span><?php echo e(__('Full Name')); ?>:</span> <strong><?php echo e($order->address->name); ?> </strong>
                                </p>

                                <p>
                                    <span><?php echo e(__('Phone')); ?>:</span> <strong><?php echo e($order->address->phone); ?> </strong>
                                </p>

                                <p>
                                    <span><?php echo e(__('Address')); ?>:</span> <strong> <?php echo e($order->address->address); ?> </strong>
                                </p>

                                <p>
                                    <span><?php echo e(__('City')); ?>:</span> <strong><?php echo e($order->address->city); ?> </strong>
                                </p>
                                <p>
                                    <span><?php echo e(__('State')); ?>:</span> <strong> <?php echo e($order->address->state); ?> </strong>
                                </p>
                                <?php if(EcommerceHelper::isUsingInMultipleCountries()): ?>
                                    <p>
                                        <span><?php echo e(__('Country')); ?>:</span> <strong> <?php echo e($order->address->country_name); ?> </strong>
                                    </p>
                                <?php endif; ?>
                                <?php if(EcommerceHelper::isZipCodeEnabled()): ?>
                                    <p>
                                        <span><?php echo e(__('Zip code')); ?>:</span> <strong> <?php echo e($order->address->zip_code); ?> </strong>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <br>
                        <h5><?php echo e(__('Order detail')); ?></h5>
                        <div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center"><?php echo e(__('Image')); ?></th>
                                        <th><?php echo e(__('Product')); ?></th>
                                        <th class="text-center"><?php echo e(__('Amount')); ?></th>
                                        <th class="text-right" style="width: 100px"><?php echo e(__('Quantity')); ?></th>
                                        <th class="price text-right"><?php echo e(__('Total')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $product = get_products([
                                                'condition' => [
                                                    'ec_products.id' => $orderProduct->product_id,
                                                ],
                                                'take' => 1,
                                                'select' => [
                                                    'ec_products.id',
                                                    'ec_products.images',
                                                    'ec_products.name',
                                                    'ec_products.price',
                                                    'ec_products.sale_price',
                                                    'ec_products.sale_type',
                                                    'ec_products.start_date',
                                                    'ec_products.end_date',
                                                    'ec_products.sku',
                                                    'ec_products.is_variation',
                                                    'ec_products.status',
                                                    'ec_products.order',
                                                    'ec_products.created_at',
						                        ],
						                        'include_out_of_stock_products' => true,
                                            ]);

                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($key + 1); ?></td>
                                            <td class="text-center">
                                                <img src="<?php echo e(RvMedia::getImageUrl($product ? $product->image : null, 'thumb', false, RvMedia::getDefaultImage())); ?>" width="50" alt="<?php echo e($orderProduct->product_name); ?>">
                                            </td>
                                            <td>
                                                <?php if($product): ?>
                                                    <?php echo e($product->original_product->name); ?> <?php if($product->sku): ?> (<?php echo e($product->sku); ?>) <?php endif; ?>
                                                    <?php if($product->is_variation): ?>
                                                        <p class="mb-0">
                                                            <small>
                                                                <?php $attributes = get_product_attributes($product->id) ?>
                                                                <?php if(!empty($attributes)): ?>
                                                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php echo e($attribute->attribute_set_title); ?>: <?php echo e($attribute->title); ?><?php if(!$loop->last): ?>, <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </small>
                                                        </p>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php echo e($orderProduct->product_name); ?>

                                                <?php endif; ?>

                                                <?php if(!empty($orderProduct->options) && is_array($orderProduct->options)): ?>
                                                    <?php $__currentLoopData = $orderProduct->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($option['key']) && !empty($option['value'])): ?>
                                                            <p class="mb-0"><small><?php echo e($option['key']); ?>: <strong> <?php echo e($option['value']); ?></strong></small></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(format_price($orderProduct->price, $orderProduct->currency)); ?></td>
                                            <td class="text-center"><?php echo e($orderProduct->qty); ?></td>
                                            <td class="money text-right">
                                                <strong>
                                                    <?php echo e(format_price($orderProduct->price * $orderProduct->qty, $orderProduct->currency)); ?>

                                                </strong>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                            <p>
                                <span><?php echo e(__('Shipping fee')); ?>:</span> <strong>  <?php echo e(format_price($order->shipping_amount)); ?> </strong>
                            </p>

                            <?php if(EcommerceHelper::isTaxEnabled()): ?>
                                <p>
                                    <span><?php echo e(__('Tax')); ?>:</span> <strong> <?php echo e(format_price($order->tax_amount)); ?> </strong>
                                </p>
                            <?php endif; ?>

                            <p>
                                <span><?php echo e(__('Discount')); ?>: </span> <strong> <?php echo e(format_price($order->discount_amount)); ?></strong>
                                <?php if($order->discount_amount): ?>
                                    <?php if($order->coupon_code): ?>
                                        (<?php echo __('Coupon code: ":code"', ['code' => Html::tag('strong', $order->coupon_code)->toHtml()]); ?>)
                                    <?php elseif($order->discount_description): ?>
                                        (<?php echo e($order->discount_description); ?>)
                                    <?php endif; ?>
                                <?php endif; ?>
                            </p>

                            <p>
                                <span><?php echo e(__('Total Amount')); ?>:</span> <strong> <?php echo e(format_price($order->amount)); ?> </strong>
                            </p>
                        </div>
                        <?php if($order->shipment->id): ?>
                            <br>
                            <h5><?php echo e(__('Shipping Information:')); ?></h5>
                            <p><span class="d-inline-block"><?php echo e(__('Shipping Status')); ?></span>: <strong class="d-inline-block text-info"><?php echo BaseHelper::clean($order->shipment->status->toHtml()); ?></strong></p>
                            <?php if($order->shipment->shipping_company_name): ?>
                                <p><span class="d-inline-block"><?php echo e(__('Shipping Company Name')); ?></span>: <strong class="d-inline-block"><?php echo e($order->shipment->shipping_company_name); ?></strong></p>
                            <?php endif; ?>
                            <?php if($order->shipment->tracking_id): ?>
                                <p><span class="d-inline-block"><?php echo e(__('Tracking ID')); ?></span>: <strong class="d-inline-block"><?php echo e($order->shipment->tracking_id); ?></strong></p>
                            <?php endif; ?>
                            <?php if($order->shipment->tracking_link): ?>
                                <p><span class="d-inline-block"><?php echo e(__('Tracking Link')); ?></span>: <strong class="d-inline-block"><a
                                            href="<?php echo e($order->shipment->tracking_link); ?>" target="_blank"><?php echo e($order->shipment->tracking_link); ?></a></strong></p>
                            <?php endif; ?>
                            <?php if($order->shipment->note): ?>
                                <p><span class="d-inline-block"><?php echo e(__('Delivery Notes')); ?></span>: <strong class="d-inline-block"><?php echo e($order->shipment->note); ?></strong></p>
                            <?php endif; ?>
                            <?php if($order->shipment->estimate_date_shipped): ?>
                                <p><span class="d-inline-block"><?php echo e(__('Estimate Date Shipped')); ?></span>: <strong class="d-inline-block"><?php echo e($order->shipment->estimate_date_shipped); ?></strong></p>
                            <?php endif; ?>
                            <?php if($order->shipment->date_shipped): ?>
                                <p><span class="d-inline-block"><?php echo e(__('Date Shipped')); ?></span>: <strong class="d-inline-block"><?php echo e($order->shipment->date_shipped); ?></strong></p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php elseif(request()->input('order_id') || request()->input('email')): ?>
                            <p class="text-center text-danger mt-40"><?php echo e(__('Order not found!')); ?></p>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/order-tracking.blade.php ENDPATH**/ ?>