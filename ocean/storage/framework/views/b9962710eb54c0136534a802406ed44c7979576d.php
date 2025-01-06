<div class="col-lg-4 col-md-6">
    <div class="widget-about font-md mb-md-5 mb-lg-0">
        <?php if(theme_option('logo')): ?>
            <div class="logo logo-width-1 wow fadeIn  mb-10   animated">
                <a href="<?php echo e(route('public.index')); ?>">
                    <img src="<?php echo e(RvMedia::getImageUrl(theme_option('logo_light'))); ?>" alt="<?php echo e(theme_option('site_title')); ?>">
                </a>
            </div>
        <?php endif; ?>
        <?php if(theme_option('address') || theme_option('phone')): ?>
            <?php if(theme_option('address')): ?>
                <p class="wow fadeIn animated">
                    <?php echo e(theme_option('address')); ?>

                </p>
            <?php endif; ?>
            <?php if(theme_option('phone')): ?>
                <p class="wow fadeIn animated">
                    <i class="fa-phone fas"></i>&nbsp; <?php echo e(theme_option('phone')); ?>

                </p>
            <?php endif; ?>
                <?php if(theme_option('contact_email')): ?>
                    <p class="wow fadeIn animated">
                        <i class="fa-envelope fas"></i>&nbsp; <?php echo e(theme_option('contact_email')); ?>

                    </p>
                <?php endif; ?>
        <?php endif; ?>
        <?php if(theme_option('social_links')): ?>
        <div class="social-icons d-flex mt-30">
            <ul>
                <?php $__currentLoopData = json_decode(theme_option('social_links'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($socialLink) == 4 && $socialLink[1]['value'] && $socialLink[2]['value']): ?>
                        <li><a href="<?php echo e($socialLink[2]['value']); ?>" target="_blank"><i class="<?php echo e($socialLink[1]['value']); ?>"></i></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/////widgets/site-info/templates/frontend.blade.php ENDPATH**/ ?>