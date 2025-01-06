
<?php $__env->startSection('content'); ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>For booking confirmation of your Boat, you need to pay <?php echo e(format_price(get_ecommerce_setting('down_payment'))); ?> as a downpayment. This will confirm your booking and our team will get in touch with you further.</p>
      </div>
      <div class="modal-footer">
         <a id="link" class="btn btn-small d-block" href="#">Proceed to checkout</a>
      </div>
    </div>
  </div>
</div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><?php echo e(__('Your Saved Boats')); ?></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Enquiry ID')); ?></th>
                            <th><?php echo e(__('Boat Name')); ?></th>
                            <th><?php echo e(__('Submitted At')); ?></th>
                            <th><?php echo e(__('Total Price')); ?></th>
                            <th><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $boats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>OBCE-<?php echo e($boat->id); ?></td>
                                <td><?php echo e($boat->boat->ltitle); ?></td>
                                <td><?php echo e($boat->created_at->format('d-m-Y h:m')); ?></td>
                                <td><?php echo e(format_price($boat->vat_total)); ?></td>
                                <td>
                                    <a class="btn btn-small d-block mb-2" href="<?php echo e(route('customer.saved_boats.view', $boat->id)); ?>"><?php echo e(__('View Details')); ?></a>
                                    <?php if($boat->is_finished): ?>
                                    <a data-no-href class="btn btn-small d-block">Booked</a>
                                    <?php else: ?>
                                    <!-- <a class="btn btn-small d-block" href="<?php echo e(route('ngenius.transaction.id', $boat->id)); ?>"><?php echo e(__('Book Now')); ?></a> -->
                                    <button type="button" class="btn btn-small d-block" id="book-now" style="width:100%;" data-bs-toggle="modal" data-value="<?php echo e(route('ngenius.transaction.id', $boat->id)); ?>" data-bs-target="#exampleModal">
                                        <?php echo e(__('Book Now')); ?>

                                    </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-center" colspan="5"><?php echo e(__('No orders found!')); ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php echo $boats->links(Theme::getThemeNamespace() . '::partials.custom-pagination'); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/saved_boats/list.blade.php ENDPATH**/ ?>