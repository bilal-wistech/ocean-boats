<?php
    $page->loadMissing('metadata');
    Theme::set('page', $page);
?>

<?php if($page->template == 'default' && $page->slug == "about-us"): ?>
    <section class="mt-60 mb-60">
    	<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.includes.about-us', compact('page'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php elseif($page->template == 'default'): ?>
	<section class="mt-60 mb-60">
        <?php if($page->slug != "contact"): ?>
    		<div class="container">
    	        <div class="row">
    	            <div class="col-12 text text-center">
    	                <h2 class="mb-40 fw-800"><?php echo $page->name; ?></h2>
    	                <p><?php echo e($page->description); ?></p>
    	            </div>
    	        </div>
        	</div>
        <?php endif; ?>
    	<?php echo apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, BaseHelper::clean($page->content), $page); ?>

    </section>
<?php else: ?>
    <?php echo apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, BaseHelper::clean($page->content), $page); ?>

<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/page.blade.php ENDPATH**/ ?>