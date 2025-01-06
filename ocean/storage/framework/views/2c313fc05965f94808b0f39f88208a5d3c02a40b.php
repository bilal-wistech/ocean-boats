<?php
    Theme::asset()->container('footer')->usePath()->add('jquery.theia.sticky-js', 'js/plugins/jquery.theia.sticky.js');
?>

<?php echo Theme::partial('header'); ?>


<main class="main" id="main-section">
    <?php if(Theme::get('hasBreadcrumb', true)): ?>
        <?php echo Theme::partial('breadcrumb'); ?>

    <?php endif; ?>

    <section class="mt-60 mb-60">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-9">
                    <?php echo Theme::content(); ?>

                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <?php echo dynamic_sidebar('primary_sidebar'); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php echo Theme::partial('footer'); ?>



<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/layouts/blog-right-sidebar.blade.php ENDPATH**/ ?>