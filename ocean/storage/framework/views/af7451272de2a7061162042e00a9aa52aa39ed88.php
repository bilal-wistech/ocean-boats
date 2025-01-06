<?php
    Theme::layout('full-width');
?>

<section class="pt-50 pb-100">
    <div class="container">
        <div class="row">
        <?php if(cache()->has('boat_data')): ?>
            <div class="alert alert-success">
                Your data has been saved in our local storage. Please register to save and submit enquiry.!
            </div>
        <?php endif; ?>
            <div class="col-lg-6 m-auto">
                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 mb-20">
                            <h3 class="mb-20"><?php echo e(__('Register')); ?></h3>
                            <p><?php echo e(__('Please fill in the information below')); ?></p>
                        </div>

                        <form class="form--auth" method="POST" action="<?php echo e(route('customer.register.post')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form__content">
                                <div class="form-group">
                                    <label for="txt-name" class="required"><?php echo e(__('Name')); ?></label>
                                    <input class="form-control" name="name" id="txt-name" type="text" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Please enter your name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="txt-email" class="required"><?php echo e(__('Email Address')); ?></label>
                                    <input class="form-control" name="email" id="txt-email" type="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Please enter your email address')); ?>">
                                    <?php if($errors->has('email')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="required"><?php echo e(__('Phone')); ?>:</label>
                                    <input id="phone"
                                        type="text"
                                        class="form-control square"
                                        name="phone"
                                        value="<?php echo e(old('phone')); ?>"
                                        placeholder="0123456789"
                                        required>
                                    <?php echo Form::error('phone', $errors); ?>

                                </div>
                                <div class="form-group">
                                    <label for="txt-password" class="required"><?php echo e(__('Password')); ?></label>
                                    <input class="form-control" type="password" name="password" id="txt-password" placeholder="<?php echo e(__('Please enter your password')); ?>">
                                    <?php if($errors->has('password')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="txt-password-confirmation" class="required"><?php echo e(__('Password confirmation')); ?></label>
                                    <input class="form-control" type="password" name="password_confirmation" id="txt-password-confirmation" placeholder="<?php echo e(__('Please enter your password confirmation')); ?>">
                                    <?php if($errors->has('password_confirmation')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></span>
                                    <?php endif; ?>
                                </div>

				<?php if(is_plugin_active('captcha') && setting('enable_captcha') && get_ecommerce_setting('enable_recaptcha_in_register_page', 0)): ?>
                        	    <div class="form-group">
                        	       <?php echo Captcha::display(); ?>

            		            </div>
	                        <?php endif; ?>

                                <div class="form-group">
                                    <div class="ps-checkbox">

                                    </div>
                                    <?php if($errors->has('agree_terms_and_policy')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('agree_terms_and_policy')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input type="hidden" name="agree_terms_and_policy" value="0">
                                            <input class="form-check-input" type="checkbox" name="agree_terms_and_policy" id="agree-terms-and-policy" value="1" <?php if(old('agree_terms_and_policy') == 1): ?> checked <?php endif; ?>>
                                            <label class="form-check-label" for="agree-terms-and-policy"><span><?php echo e(__('I agree to terms & Policy.')); ?></span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block hover-up"><?php echo e(__('Register')); ?></button>
                                </div>

                                <br>
                                <p><?php echo e(__('Have an account already?')); ?> <a href="<?php echo e(route('customer.login')); ?>" class="d-inline-block"><?php echo e(__('Login')); ?></a></p>

                                <div class="text-left">
                                    <?php echo apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Ecommerce\Models\Customer::class); ?>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/register.blade.php ENDPATH**/ ?>