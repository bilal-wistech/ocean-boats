<?php echo Theme::partial('header'); ?>



<main class="main" id="main-section">
    <?php if(Theme::get('hasBreadcrumb', true)): ?>
        <?php echo Theme::partial('breadcrumb'); ?>

    <?php endif; ?>

    <?php echo Theme::content(); ?>

</main>

<?php echo Theme::partial('footer'); ?>

<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/layouts/full-width.blade.php ENDPATH**/ ?>