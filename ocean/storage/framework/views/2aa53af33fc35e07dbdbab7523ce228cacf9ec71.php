<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo BaseHelper::clean(page_title()->getTitle()); ?></title>

    <meta name="robots" content="noindex,follow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php if(setting('admin_logo') || config('core.base.general.logo')): ?>
        <meta property="og:image" content="<?php echo e(setting('admin_logo') ? RvMedia::getImageUrl(setting('admin_logo')) : url(config('core.base.general.logo'))); ?>">
    <?php endif; ?>
    <meta name="description" content="<?php echo e(strip_tags(trans('core/base::layouts.copyright', ['year' => now()->format('Y'), 'company' => setting('admin_title', config('core.base.general.base_name')), 'version' => get_cms_version()]))); ?>">
    <meta property="og:description" content="<?php echo e(strip_tags(trans('core/base::layouts.copyright', ['year' => now()->format('Y'), 'company' => setting('admin_title', config('core.base.general.base_name')), 'version' => get_cms_version()]))); ?>">

    <?php if(setting('admin_favicon') || config('core.base.general.favicon')): ?>
        <link rel="icon shortcut" href="<?php echo e(setting('admin_favicon') ? RvMedia::getImageUrl(setting('admin_favicon'), 'thumb') : url(config('core.base.general.favicon'))); ?>">
    <?php endif; ?>

    <link rel="preconnect" href="<?php echo e(BaseHelper::getGoogleFontsURL()); ?>">
    <link href="<?php echo e(BaseHelper::getGoogleFontsURL()); ?>/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <?php echo Assets::renderHeader(['core']); ?>


    <script>
        window.siteUrl = "<?php echo e(url('')); ?>";
        window.siteEditorLocale = "<?php echo e(apply_filters('cms_site_editor_locale', App::getLocale())); ?>";
    </script>

    <?php if(BaseHelper::adminLanguageDirection() == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('vendor/core/core/base/css/rtl.css')); ?>">
    <?php endif; ?>

    <?php echo $__env->yieldContent('head'); ?>

    <?php echo $__env->yieldPushContent('header'); ?>
</head>
<body <?php if(BaseHelper::adminLanguageDirection() == 'rtl'): ?> dir="rtl" <?php endif; ?> class="<?php echo $__env->yieldContent('body-class', 'page-sidebar-closed-hide-logo page-content-white page-container-bg-solid'); ?> <?php echo e(session()->get('sidebar-menu-toggle') ? 'page-sidebar-closed' : ''); ?>" style="<?php echo $__env->yieldContent('body-style'); ?>">

    <?php echo apply_filters(BASE_FILTER_HEADER_LAYOUT_TEMPLATE, null); ?>


    <div id="app">
        <?php echo $__env->yieldContent('page'); ?>
    </div>

    <?php echo $__env->make('core/base::elements.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo Assets::renderFooter(); ?>


    <?php echo $__env->yieldContent('javascript'); ?>

    <div id="stack-footer">
        <?php echo $__env->yieldPushContent('footer'); ?>
    </div>

    <?php echo apply_filters(BASE_FILTER_FOOTER_LAYOUT_TEMPLATE, null); ?>

</body>
</html>
<?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/layouts/base.blade.php ENDPATH**/ ?>