<?php
    SeoHelper::setTitle(__('404 - Not found'));
    Theme::fireEventGlobalAssets();
?>

<?php echo Theme::partial('header'); ?>


<main class="main page-404">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-8 m-auto mt-50 mb-50">
                <p class="mb-50"><img src="<?php echo e(Theme::asset()->url('images/404.png')); ?>" alt="<?php echo e(theme_option('site_title')); ?>" class="hover-up"></p>
                <h2 class="mb-30"><?php echo e(__('Page Not Found')); ?></h2>
                <p class="font-lg text-grey-700 mb-30">
                    <?php echo BaseHelper::clean(__('The link you clicked may be broken or the page may have been removed.<br> visit the <a href=":link"> <span> Homepage</span></a> or <a href=":mail"><span>Contact us</span></a> about the problem.', ['link' => route('public.index'), 'mail' => 'mailto:' . theme_option('email')])); ?>

                </p>
                <?php if(is_plugin_active('ecommerce')): ?>
                    <form class="contact-form-style text-center" id="contact-form" action="<?php echo e(route('public.products')); ?>" method="GET">
                        <div class="row">
                            <div class="col-lg-6 m-auto">
                                <div class="input-style mb-20 hover-up">
                                    <input name="q" placeholder="<?php echo e(__('Search...')); ?>" type="text">
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-default submit-auto-width font-xs hover-up" href="<?php echo e(route('public.index')); ?>"><?php echo e(__('Back To Home Page')); ?></a>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php echo Theme::partial('footer'); ?>



<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/404.blade.php ENDPATH**/ ?>