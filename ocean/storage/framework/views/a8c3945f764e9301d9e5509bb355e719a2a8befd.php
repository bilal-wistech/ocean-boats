<div class="hero-slider-content-2">
    <?php if($subtitle = $slider->getMetaData('subtitle', true)): ?>
        <h4 class="animated"><?php echo BaseHelper::clean($subtitle); ?></h4>
    <?php endif; ?>

    <?php if($slider->title): ?>
        <h2 class="animated fw-900"><?php echo BaseHelper::clean($slider->title); ?></h2>
    <?php endif; ?>

    <?php if($highlightText = $slider->getMetaData('highlight_text', true)): ?>
        <h1 class="animated fw-900 text-brand"><?php echo BaseHelper::clean($highlightText); ?></h1>
    <?php endif; ?>

    <?php if($slider->description): ?>
        <p class="animated"><?php echo BaseHelper::clean($slider->description); ?></p>
    <?php endif; ?>
    <?php if($slider->link): ?>
        <a class="animated btn btn-default btn-rounded" href="<?php echo e(url($slider->link)); ?>"><?php echo BaseHelper::clean($slider->getMetaData('button_text', true)); ?> <i class="fa fa-arrow-right"></i> </a>
    <?php endif; ?>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/shortcodes/sliders/content.blade.php ENDPATH**/ ?>