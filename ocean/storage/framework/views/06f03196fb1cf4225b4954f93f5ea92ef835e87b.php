<?php
    $content_parts = explode("[", $page->content);
?>

<section class="mt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text">
                <h3 class="mb-40 fw-800"><span class="billing"><?php echo e($page->name); ?></span></h3>
                <?php echo apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, BaseHelper::clean($content_parts[0]), $page); ?>

            </div>
            <div class="col-md-6">
                <div class="image-stack">
                    <div class="image-stack__item image-stack__item--bottom">
                        <img src="<?php echo e(RvMedia::getImageUrl(isset($page->images[2]) ? $page->images[2] : '', '', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($page->name); ?>">
                    </div>
                    <div class="image-stack__item image-stack__item--top">
                        <img src="<?php echo e(RvMedia::getImageUrl(isset($page->images[1]) ? $page->images[1] : '', '', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($page->name); ?>" >
                    </div>
                </div>
            </div>
          
        </div>
    </div>
<div class="bottom-section mt-80">
    <img src="<?php echo e(RvMedia::getImageUrl(isset($page->images[3])? $page->images[3] : '', '', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($page->name); ?>" class="bottom-img">
    <div class="card-container about">
    <?php $__currentLoopData = $content_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key>0): ?>
            <?php echo apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, BaseHelper::clean('['.$content), $page); ?>

        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>
</section>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/includes/about-us.blade.php ENDPATH**/ ?>