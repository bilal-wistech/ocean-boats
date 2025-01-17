<?php $__env->startSection('content'); ?>

    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-6 dashboard-address-item <?php if($address->is_default): ?> is-address-default <?php endif; ?>">
                <div class="card h-100 mb-3 mb-lg-0 mb-2">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e($address->name); ?>

                            <?php if($address->is_default): ?>
                                <small class="badge bg-primary"><?php echo e(__('Default')); ?></small>
                            <?php endif; ?>
                        </h5>
                    </div>
                    <div class="card-body">
                        <address>
                            <?php echo e($address->address); ?><br> <?php echo e($address->city); ?>,<br> <?php echo e($address->state); ?>

                            <?php if(EcommerceHelper::isUsingInMultipleCountries()): ?>
                                <p><?php echo e($address->country_name); ?></p>
                            <?php endif; ?>
                            <?php if(EcommerceHelper::isZipCodeEnabled()): ?>
                                <p><?php echo e($address->zip_code); ?></p>
                            <?php endif; ?>
                        </address>
                        <?php if($address->phone): ?>
                            <p>
                                <i class="fas fa-phone-square-alt"></i>
                                <span class="ml-1"><?php echo e($address->phone); ?></span>
                            </p>
                        <?php endif; ?>
                        <?php if($address->email): ?>
                            <p>
                                <i class="fas fa-envelope-square"></i>
                                <span class="ml-1"><?php echo e($address->email); ?></span>
                            </p>
                        <?php endif; ?>

                    </div>
                    <div class="card-footer border-top-0">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <a href="<?php echo e(route('customer.address.edit', $address->id)); ?>"><?php echo e(__('Edit')); ?></a>
                            </div>
                            <div class="col-auto">
                                <a class="text-danger btn-trigger-delete-address"
                                   href="#" data-url="<?php echo e(route('customer.address.destroy', $address->id)); ?>"><?php echo e(__('Remove')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="alert alert-dark d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Info:">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </svg>

                    <div><?php echo BaseHelper::clean(__('You don\'t have an address book, you can create it <a href=":here">here</a>', ['here' => route('customer.address.create')])); ?></div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-12 m-2">
            <a class="add-address" href="<?php echo e(route('customer.address.create')); ?>">
                <i class="fa fa-plus"></i>
                <span><?php echo e(__('Add a new address')); ?></span>
            </a>
        </div>
    </div>

    <div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong><?php echo e(__('Confirm delete')); ?></strong></h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(__('Do you really want to delete this address?')); ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-small btn-secondary" type="button" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button class="btn btn-small btn-danger btn-confirm-delete" type="submit"><?php echo e(__('Delete')); ?></button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/address/list.blade.php ENDPATH**/ ?>