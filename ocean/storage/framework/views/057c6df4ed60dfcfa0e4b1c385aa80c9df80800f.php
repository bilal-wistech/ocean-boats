<?php echo Theme::partial('header'); ?>


<main class="main" id="main-section">
    <?php if(Theme::get('hasBreadcrumb', true)): ?>
        <?php echo Theme::partial('breadcrumb'); ?>

    <?php endif; ?>

    <section class="mt-60 mb-60">
        <div class="container">
            <?php echo Theme::content(); ?>

        </div>
    </section>
</main>

<?php echo Theme::partial('footer'); ?>



<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/layouts/product-full-width.blade.php ENDPATH**/ ?>