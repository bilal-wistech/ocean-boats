<div class="hero-slider-1 dot-style-1 dot-style-1-position-1 <?php echo e($class ?? ''); ?>" data-autoplay="<?php echo e($shortcode->is_autoplay ?: 'yes'); ?>" data-autoplay-speed="<?php echo e(in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options()) ? $shortcode->autoplay_speed : 3000); ?>">
    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-hero-slider single-animation-wrap">
            <div class="container">
                <div class="row align-items-center slider-animated-1">
                    <div class="col-lg-5 col-md-6">
                        <?php echo Theme::partial('shortcodes.sliders.content', compact('slider')); ?>

                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="single-slider-img single-slider-img-1">
                            <img class="animated" src="<?php echo e(RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage())); ?>" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="slider-arrow hero-slider-1-arrow"></div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/shortcodes/sliders/grid.blade.php ENDPATH**/ ?>