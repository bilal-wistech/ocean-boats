<section class="mt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12">
                <div class="contact-from-area  padding-20-row-col wow tmFadeInUp animated" style="visibility: visible;">
                    <h3 class="mb-50"><span class="billing">FEEL FREE </span>TO CONTACT US</h3>
                    <!--<div class="checkboxes mb-30">-->
                    <!--    <input type="checkbox" id="pleasure" name="option" value="1" checked>-->
                    <!--    <label for="pleasure">Pleasure</label>-->
                    <!--    <input type="checkbox" id="commercial" name="option" value="2">-->
                    <!--    <label for="commercial">Commercial</label>-->
                    <!--</div>-->
                 <div class="checkboxes mb-30">
                        <input type="checkbox" id="pleasure" name="option" value="1" checked class="d-none">
                        <label for="pleasure">Pleasure</label>
                        <input type="checkbox" id="commercial" name="option" value="2" class="d-none">
                        <label for="commercial">Commercial</label>
                    </div>
                    <?php echo Form::open(['route' => 'public.send.contact', 'class' => 'contact-form-style text-center contact-form', 'method' => 'POST']); ?>

                        <?php echo apply_filters('pre_contact_form', null); ?>

                        <div id="option1" class="option">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-style mb-20">
                                    <input name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Name')); ?>" type="text">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <input name="phone" value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(__('Phone')); ?>" type="tel">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email')); ?>">
                                </div>
                            </div>
                            <input type="hidden" name="type" value="pleasure">
                            <!-- <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <input name="address" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(__('Address')); ?>" type="text">
                                </div>
                            </div> -->
            
                            <!-- <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <input name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('Subject')); ?>" type="text">
                                </div>
                            </div> -->
                            <div class="col-lg-12 col-md-12">
                                <div class="textarea-style">
                                    <textarea name="content" placeholder="<?php echo e(__('Message')); ?>"><?php echo e(old('content')); ?></textarea>
                                </div>

                                <?php if(is_plugin_active('captcha')): ?>
                                    <?php if(setting('enable_captcha')): ?>
                                        <div class="col-md-12">
                                            <?php echo Captcha::display(); ?>

                                        </div>
                                    <?php endif; ?>

                                    <?php if(setting('enable_math_captcha_for_contact_form', 0)): ?>
                                        <div class="col-md-12 text-left">
                                            <label for="math-group"><?php echo e(app('math-captcha')->label()); ?></label>
                                            <?php echo app('math-captcha')->input(['class' => 'form-control', 'id' => 'math-group']); ?>

                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php echo apply_filters('after_contact_form', null); ?>

                                <button class="submit submit-auto-width mt-30" type="submit"><?php echo e(__('Send message')); ?></button>
                            </div>
                             <div class="form-group">
                            <div class="contact-message contact-success-message mt-30 alert alert-success" role="alert" style="display: none"></div>
                            <div class="contact-message contact-error-message mt-30" style="display: none"></div>
                        </div>
                        </div>
                        </div>
                        <?php echo Form::close(); ?>

                        <?php echo Form::open(['route' => 'public.send.contact', 'class' => 'contact-form-style text-center contact-form', 'method' => 'POST']); ?>

                        <div id="option2" class="option">
                        <div class="row">
                        <div class="col-12">
                                <div class="input-style mb-20">
                                    <input name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Company Name')); ?>" type="text">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <input name="phone" value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(__('Phone')); ?>" type="tel">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email')); ?>">
                                </div>
                            </div>
                            <input type="hidden" name="type" value="commercial">
                            <div class="col-lg-12 col-md-12">
                                <div class="textarea-style">
                                    <textarea name="content" placeholder="<?php echo e(__('Boats of interest')); ?>"><?php echo e(old('content')); ?></textarea>
                                </div>

                                <?php if(is_plugin_active('captcha')): ?>
                                    <?php if(setting('enable_captcha')): ?>
                                        <div class="col-md-12">
                                            <?php echo Captcha::display(); ?>

                                        </div>
                                    <?php endif; ?>

                                    <?php if(setting('enable_math_captcha_for_contact_form', 0)): ?>
                                        <div class="col-md-12 text-left">
                                            <label for="math-group"><?php echo e(app('math-captcha')->label()); ?></label>
                                            <?php echo app('math-captcha')->input(['class' => 'form-control', 'id' => 'math-group']); ?>

                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php echo apply_filters('after_contact_form', null); ?>

                                <button class="submit submit-auto-width mt-30" type="submit"><?php echo e(__('Send message')); ?></button>
                            </div>
                        </div>
                        </div>
                        <?php echo Form::close(); ?>

                      
                    <!-- <?php echo Form::close(); ?> -->
                </div>
            </div>

            <div class="col-lg-5 mt-50 bg-grey">
            <div class="Address-form"> 
            <?php if(theme_option('address') || theme_option('phone') || theme_option('working_hours')): ?>
            <h4 class="mt-20 mb-10 fw-600 wow fadeIn animated"><?php echo e(__('Address')); ?></h4>
            <?php if(theme_option('address')): ?>
                <p class="wow fadeIn mb-40 animated text-black">
                <?php echo e(theme_option('address')); ?>

                </p>
            <?php endif; ?>
            <h4 class="mt-20 mb-10 fw-600 wow fadeIn animated"><?php echo e(__('Information')); ?></h4>
            <?php if(theme_option('phone')): ?>
                <p class="wow fadeIn animated d-inline-block text-black">
                  <?php echo e(theme_option('phone')); ?>

                </p>
            <?php endif; ?>
                    <?php if(theme_option('contact_email')): ?>
                    <p class="wow fadeIn animated text-black mb-40">
                        <?php echo e(theme_option('contact_email')); ?>

                    </p>
                <?php endif; ?>
                <h4 class="mt-20 mb-10 fw-600 wow fadeIn animated"><?php echo e(__('Follow us')); ?></h4>
                <div class="social-icons d-flex mb-40">
                    <ul>
                        <?php $__currentLoopData = json_decode(theme_option('social_links'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($socialLink) == 4): ?>
                                <li><a href="<?php echo e($socialLink[2]['value']); ?>"><i class="<?php echo e($socialLink[1]['value']); ?>"></i></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
           <h4 class="mt-20 mb-10 fw-600 wow fadeIn animated"><?php echo e(__('Working Hours')); ?></h4>
            <?php if(theme_option('working_hours')): ?>
                <p class="wow fadeIn animated text-black">
                   <?php echo e(theme_option('working_hours')); ?>

                </p>
            <?php endif; ?>
            
        <?php endif; ?>  
</div>
</div>  
     <!-- <?php if(theme_option('contact_info_boxes')): ?>
   
        <div class="col-lg-4">
            <?php $__currentLoopData = json_decode(theme_option('contact_info_boxes'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($item) == 4): ?>
                   
                        <h4 class="mb-15 text-muted"><?php echo BaseHelper::clean($item[0]['value']); ?></h4>
                        <?php echo BaseHelper::clean($item[1]['value']); ?><br>
                        <abbr title="<?php echo e(__('Phone')); ?>"><?php echo e(__('Phone')); ?>:</abbr> <?php echo BaseHelper::clean($item[2]['value']); ?><br>
                        <abbr title="<?php echo e(__('Email')); ?>"><?php echo e(__('Email')); ?>: </abbr><?php echo BaseHelper::clean($item[3]['value']); ?><br>
                        <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up" href="https://maps.google.com/?q=<?php echo e(urlencode(clean($item[1]['value']))); ?>"><i class="fa fa-map text-muted mr-15"></i><?php echo e(__('View map')); ?></a>
                   
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
   
    <hr>
<?php endif; ?> -->

        </div>
    </div>
</section>
<style>
.option {
  display: none;
}
#pleasure {
  display: block;
}
</style>

<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/shortcodes/contact-form.blade.php ENDPATH**/ ?>