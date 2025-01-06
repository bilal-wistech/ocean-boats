<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5><?php echo e(__('Account Details')); ?></h5>
        </div>
        <div class="card-body">
            <?php echo Form::open(['route' => 'customer.edit-account']); ?>

                <div class="row">
                    <div class="form-group col-md-12 <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
                        <label class="required" for="name"><?php echo e(__('Full Name')); ?>:</label>
                        <input required class="form-control square" name="name" type="text" id="name" value="<?php echo e(auth('customer')->user()->name); ?>">
                        <?php echo Form::error('name', $errors); ?>

                    </div>
                    <div class="form-group col-md-12 <?php if($errors->has('dob')): ?> has-error <?php endif; ?>">
                        <label for="date_of_birth"><?php echo e(__('Date of birth')); ?>:</label>
                        <input id="date_of_birth" type="text" class="form-control square" name="dob" placeholder="Y-m-d" value="<?php echo e(auth('customer')->user()->dob); ?>">
                        <?php echo Form::error('name', $errors); ?>

                    </div>
                    <div class="form-group col-md-12">
                        <label for="email"><?php echo e(__('Email')); ?>:</label>
                        <input id="email" type="text" class="form-control" disabled="disabled" value="<?php echo e(auth('customer')->user()->email); ?>" name="email">
                    </div>
                    <div class="form-group col-md-12 <?php if($errors->has('phone')): ?> has-error <?php endif; ?>">
                        <label for="phone"><?php echo e(__('Phone')); ?>:</label>
                        <input type="text" class="form-control square" name="phone" id="phone" placeholder="<?php echo e(__('Phone')); ?>" value="<?php echo e(auth('customer')->user()->phone); ?>">
                        <?php echo Form::error('name', $errors); ?>

                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit"><?php echo e(__('Update')); ?></button>
                    </div>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/edit-account.blade.php ENDPATH**/ ?>