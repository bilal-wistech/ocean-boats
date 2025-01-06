<div class="banner-img wow fadeIn animated <?php echo e($class ?? ''); ?>">
    <img class="border-radius-10" src="<?php echo e(RvMedia::getImageUrl($ads->image)); ?>" alt="<?php echo e($ads->name); ?>">
    <div class="banner-text">
        <span><?php echo e($ads->name); ?></span>
        <h4><?php echo BaseHelper::clean(nl2br($ads->getMetaData('subtitle', true) ?: '')); ?></h4>
        <a href="<?php echo e(route('public.ads-click', $ads->key)); ?>">
            <?php echo e($ads->getMetaData('button_text', true) ?: __('Shop Now')); ?> <i class="fa fa-arrow-right"></i>
        </a>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/shortcodes/ads/item.blade.php ENDPATH**/ ?>