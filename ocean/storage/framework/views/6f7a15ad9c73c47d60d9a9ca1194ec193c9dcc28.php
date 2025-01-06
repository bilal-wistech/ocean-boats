<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><?php echo e(__('Your Orders')); ?></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo e(__('ID number')); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
                            <th><?php echo e(__('Total')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(get_order_code($order->id)); ?></td>
                                <td><?php echo e($order->created_at->format('Y/m/d h:m')); ?></td>
                                <td><?php echo e(__(':price for :total item(s)', ['price' => $order->amount_format, 'total' => $order->products_count])); ?></td>
                                <td><?php echo e($order->status->label()); ?></td>
                                <td>
                                    <a class="btn-small d-block" href="<?php echo e(route('customer.orders.view', $order->id)); ?>"><?php echo e(__('View')); ?></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-center" colspan="5"><?php echo e(__('No orders found!')); ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php echo $orders->links(Theme::getThemeNamespace() . '::partials.custom-pagination'); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/orders/list.blade.php ENDPATH**/ ?>