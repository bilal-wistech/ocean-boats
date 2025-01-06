<?php
    Theme::layout('full-width');
?>

<section class="login pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 mb-20">
                            <h3 class="mb-30"><?php echo e(__('Reset Password')); ?></h3>
                        </div>

                        <form class="form--auth form--login" method="POST" action="<?php echo e(route('customer.password.request')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form__content">
                                <div class="form-group">
                                    <label for="txt-email" class="required"><?php echo e(__('Email Address')); ?></label>
                                    <input class="form-control" name="email" id="txt-email" type="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Please enter your email address')); ?>">
                                    <?php if($errors->has('email')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block hover-up"><?php echo e(__('Send Password Reset Link')); ?></button>
                            </div>

                            <?php if(session('status')): ?>
                                <div class="text-success">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/passwords/email.blade.php ENDPATH**/ ?>