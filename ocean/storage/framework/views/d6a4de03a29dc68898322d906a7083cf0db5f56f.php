<?php
$title=BaseHelper::clean(__($config['name']));
$description=BaseHelper::clean(__($config['subtitle']));

?>
<div class="col-lg-4">
	<h5 class="widget-title wow fadeIn   animated" style="visibility: visible;"><?php echo BaseHelper::clean($title); ?>

	</h5>
	<div class="row">
        <div class="col-md-4 col-lg-12">
            <p class=" wow fadeIn  mt-md-3  animated" style="visibility: visible;"><?php echo BaseHelper::clean($description); ?></p>
            <!-- Subscribe Form -->
                <form class="newsletter-form" method="post" action="<?php echo e(route('public.newsletter.subscribe')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-subcriber d-flex wow fadeIn animated ">
                        <input type="email" name="email" class="form-control bg-white font-small" placeholder="<?php echo e(__('Enter your email')); ?>">
                        <button class="btn bg-light subscribe" type="submit"><?php echo e(__('Subscribe')); ?></button>
                    </div>
                    <?php if(setting('enable_captcha') && is_plugin_active('captcha')): ?>
                        <div class="col-auto">
                            <?php echo Captcha::display(); ?>

                        </div>
                    <?php endif; ?>
                </form>
                <!-- End Subscribe Form -->
        </div>
    </div>


<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/////widgets/newsletter/templates/frontend.blade.php ENDPATH**/ ?>