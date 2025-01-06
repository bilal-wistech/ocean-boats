<?php
    Theme::layout('full-width');
?>

<section class="pt-50 pb-100">
    <div class="container">
        <?php if(cache()->has('boat_data')): ?>
            <div class="alert alert-success">
                Your data has been saved in our local storage. Please login to save and submit enquiry.!
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 mb-20">
                            <h3 class="mb-20"><?php echo e(__('Login')); ?></h3>
                            <p><?php echo e(__('Please enter your email address and password')); ?></p>
                        </div>
                        <form class="form--auth form--login" method="POST" action="<?php echo e(route('customer.login.post')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($errors) && $errors->has('confirmation')): ?>
                                <div class="alert alert-danger">
                                    <span><?php echo $errors->first('confirmation'); ?></span>
                                </div>
                                <br>
                            <?php endif; ?>
                            <div class="form__content">
                                <div class="form-group">
                                    <label for="txt-email" class="required"><?php echo e(__('Email Address')); ?></label>
                                    <input name="email" id="txt-email" type="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Please enter your email address')); ?>">
                                    <?php if($errors->has('email')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="txt-password" class="required"><?php echo e(__('Password')); ?></label>
                                    <div class="form__password">
                                        <input type="password" name="password" id="txt-password" placeholder="<?php echo e(__('Please enter your password')); ?>">
                                    </div>
                                    <?php if($errors->has('password')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember-me-checkbox">
                                            <label class="form-check-label" for="remember-me-checkbox"><span><?php echo e(__('Remember me')); ?></span></label>
                                        </div>
                                    </div>
                                    <a class="text-muted" href="<?php echo e(route('customer.password.reset')); ?>"><?php echo e(__('Forgot password?')); ?></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block hover-up"><?php echo e(__('Login')); ?></button>
                            </div>
                            <br>
                            <p><?php echo e(__("Don't have an account?")); ?> <a href="<?php echo e(route('customer.register')); ?>" class="d-inline-block"><?php echo e(__('Create one')); ?></a></p>

                            <div class="text-left">
                                <?php echo apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Ecommerce\Models\Customer::class); ?>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/login.blade.php ENDPATH**/ ?>