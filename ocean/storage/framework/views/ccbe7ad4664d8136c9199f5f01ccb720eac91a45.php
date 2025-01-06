<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <!-- maryam -->
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.css">
        <!-- end -->
        <link rel="preconnect" href="<?php echo e($fontURL = config('core.base.general.google_fonts_url', 'https://fonts.bunny.net')); ?>">
        <link href="<?php echo e($fontURL); ?>/css2?family=<?php echo e(urlencode(theme_option('font_text', 'Poppins'))); ?>:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
        
        <style>
            :root {
                --font-text: <?php echo e(theme_option('font_text', 'Poppins')); ?>, sans-serif;
                --color-brand: <?php echo e(theme_option('color_brand', '#5897fb')); ?>;
                --color-brand-2: <?php echo e(theme_option('color_brand_2', '#3256e0')); ?>;
                --color-primary: <?php echo e(theme_option('color_primary', '#3f81eb')); ?>;
                --color-secondary: <?php echo e(theme_option('color_secondary', '#41506b')); ?>;
                --color-warning: <?php echo e(theme_option('color_warning', '#ffb300')); ?>;
                --color-danger: <?php echo e(theme_option('color_danger', '#ff3551')); ?>;
                --color-success: <?php echo e(theme_option('color_success', '#3ed092')); ?>;
                --color-info: <?php echo e(theme_option('color_info', '#18a1b7')); ?>;
                --color-text: <?php echo e(theme_option('color_text', '#4f5d77')); ?>;
                --color-heading: <?php echo e(theme_option('color_heading', '#222222')); ?>;
                --color-grey-1: <?php echo e(theme_option('color_grey_1', '#111111')); ?>;
                --color-grey-2: <?php echo e(theme_option('color_grey_2', '#242424')); ?>;
                --color-grey-4: <?php echo e(theme_option('color_grey_4', '#90908e')); ?>;
                --color-grey-9: <?php echo e(theme_option('color_grey_9', '#f4f5f9')); ?>;
                --color-muted: <?php echo e(theme_option('color_muted', '#8e8e90')); ?>;
                --color-body: <?php echo e(theme_option('color_body', '#4f5d77')); ?>;
            }
        </style>

        <?php echo Theme::header(); ?>


        <?php
            $headerStyle = theme_option('header_style') ?: '';
            $page = Theme::get('page');
            if ($page) {
                $headerStyle = $page->getMetaData('header_style', true) ?: $headerStyle;
            }
            $headerStyle = ($headerStyle && in_array($headerStyle, array_keys(get_layout_header_styles()))) ? $headerStyle : '';
        ?>
        
        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YENJX9LDVZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YENJX9LDVZ');
</script>

    </head>
    <body <?php if(BaseHelper::siteLanguageDirection() == 'rtl'): ?> dir="rtl" <?php endif; ?> class="<?php if(BaseHelper::siteLanguageDirection() == 'rtl'): ?> rtl <?php endif; ?> header_full_true wowy-template css_scrollbar lazy_icons btnt4_style_2 zoom_tp_2 css_scrollbar template-index wowy_toolbar_true hover_img2 swatch_style_rounded swatch_list_size_small label_style_rounded wrapper_full_width header_full_true header_sticky_true hide_scrolld_true des_header_3 h_banner_true top_bar_true prs_bordered_grid_1 search_pos_canvas lazyload <?php if(Theme::get('bodyClass')): ?> <?php echo e(Theme::get('bodyClass')); ?> <?php endif; ?>">
        <?php echo apply_filters(THEME_FRONT_BODY, null); ?>

        <div id="alert-container"></div>

        <?php echo Theme::partial('preloader'); ?>


 <!-- maryam -->
<?php
$parallelslider=\Botble\Theme\Models\ParallelSlider::where('status',1)->get();
?>
 <div id="fullpage">
    <?php $__currentLoopData = $parallelslider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="section hero">
      <img class="w-100 h-100" src="<?php echo e(RvMedia::getImageUrl($value->image)); ?>" alt="Ocean Boats Banner Image">
      <div class="banner-text">
        <h1 class="heading1"><?php echo e($value->title); ?></h1>
        <p class="text1 d-none d-md-block mt-40"><?php echo e($value->description); ?></p>
        <a href="<?php echo e(url('/'.$value->action)); ?>"><button type="button" class="btn explore mt-40"><?php echo e($value->action_title); ?></button></a>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

       
 <header class="header-areac <?php echo e($headerStyle); ?>">
        <div class="header-laptop">
        <div id="header-top1">
            <div class="header-bar-container">
                <div class="logo1">
                    <a href="<?php echo e(route('public.index')); ?>"><img
                            src="<?php echo e(RvMedia::getImageUrl(theme_option('logo'))); ?>"
                            alt="<?php echo e(theme_option('site_title')); ?>"></a>
                </div>
                <div class="header-thin">
                    <ul class="header-navbar-nav">
                        <li><a href="">Have any Questions?</a></li>
                        <?php if(theme_option('phone')): ?>
                            <li><a href=""><?php echo e(theme_option('phone')); ?></a></li>
                        <?php endif; ?>
                        <?php if(theme_option('contact_email')): ?>
                            <li><a href=""><?php echo e(theme_option('contact_email')); ?></a></li>
                        <?php endif; ?>
                        <li><form id="standard-3" action="<?php echo e(route('public.products')); ?>" id="form2">
                        <input type="text" class="search-txt-input" name="q" maxlength="100" placeholder="Search...">
                        <button type="submit" form="form2"  class="search-button">
                       <i class="fa fa-search"></i></button>
                       </form></li>
                    </ul>
                    <ul class="header-navbar-nav-right header-navbar-nav">
                        <?php $__currentLoopData = json_decode(theme_option('social_links'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($socialLink) == 4): ?>
                                <li><a href="<?php echo e($socialLink[2]['value']); ?>" target="_blank"><i class="<?php echo e($socialLink[1]['value']); ?>"></i></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="line-break"></div>  
            </div>
        </div> 
        <div id="header-bottom1">
                
                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block main-menu-light-white hover-boder hover-boder-white">
                            <nav>
                                <?php echo Menu::renderMenuLocation('main-menu', [
                                        'view' => 'main-menu',
                                    ]); ?>

                            </nav>
                        </div>
               
                <ul class="header-navbar-bottom-right header-navbar-bottom">
                <div class="header-action-2">
                    <div class="header-action-icon-2">
                        <a href="<?php echo e(route('public.wishlist')); ?>" class="wishlist-count">
                            <img class="svgInject" alt="<?php echo e(__('Wishlist')); ?>" src="<?php echo e(Theme::asset()->url('images/icons/icon-heart-white.svg')); ?>">
                                <span class="pro-count blue"><?php if(auth('customer')->check()): ?><span><?php echo e(auth('customer')->user()->wishlist()->count()); ?></span> <?php else: ?> <span><?php echo e(Cart::instance('wishlist')->count()); ?></span><?php endif; ?></span>
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="<?php echo e(route('public.cart')); ?>">
                            <img alt="<?php echo e(__('Cart')); ?>" src="<?php echo e(Theme::asset()->url('images/icons/icon-cart-white.svg')); ?>">
                                <span class="pro-count blue"><?php echo e(Cart::instance('cart')->count()); ?></span>
                        </a>
                    </div>
                                    
                </div>
                <?php if(auth('customer')->check()): ?>
                    <li><a href="<?php echo e(route('customer.overview')); ?>"><img alt="<?php echo e(__('Sign In')); ?>" src="<?php echo e(Theme::asset()->url('images/icons/icon-user-white.svg')); ?>" style="width: 18%;position: absolute;float: right;"></a></li>
                    <?php else: ?>
                    <li><a href="<?php echo e(route('customer.login')); ?>"><button type="button" class="btn login">Log In</button></li>
                    <?php endif; ?>
                <!--<li><a href="<?php echo e(route('customer.login')); ?>"><button type="button" class="btn login">Log In</button></li>-->
                </ul>
        </div>
        </div>
        <div class="header-mobile">
        <div id="header-top1">
            <div class="thin-header">
                    <ul class="header-navbar-nav">
                        <li><a href="">Have any Questions?</a></li>
                        <?php if(theme_option('phone')): ?>
                            <li><a href=""><?php echo e(theme_option('phone')); ?></a></li>
                        <?php endif; ?>
                        <?php if(theme_option('contact_email')): ?>
                            <li><a href=""><?php echo e(theme_option('contact_email')); ?></a></li>
                        <?php endif; ?>
                    </ul>
                    <ul class="header-navbar-nav-right header-navbar-nav">
                        <?php if(theme_option('social_links')): ?>
                        <?php $__currentLoopData = json_decode(theme_option('social_links'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($socialLink[2]['value']); ?>"><i class="<?php echo e($socialLink[1]['value']); ?>"></i></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                
            </div>
        </div> 
        <div class="logo1">
                    <a href="<?php echo e(route('public.index')); ?>"><img
                            src="<?php echo e(RvMedia::getImageUrl(theme_option('logo'))); ?>"
                            alt="<?php echo e(theme_option('site_title')); ?>"></a>
                </div>
        <div id="header-bottom1">
               <ul class="header-navbar-bottom-right header-navbar-bottom">
                <div class="header-action-2">
                    <div class="header-action-icon-2">
                        <a href="<?php echo e(route('public.wishlist')); ?>" class="wishlist-count">
                            <img class="svgInject" alt="<?php echo e(__('Wishlist')); ?>" src="<?php echo e(Theme::asset()->url('images/icons/icon-heart-white.svg')); ?>">
                                <span class="pro-count blue"><?php if(auth('customer')->check()): ?><span><?php echo e(auth('customer')->user()->wishlist()->count()); ?></span> <?php else: ?> <span><?php echo e(Cart::instance('wishlist')->count()); ?></span><?php endif; ?></span>
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="<?php echo e(route('public.cart')); ?>">
                            <img alt="<?php echo e(__('Cart')); ?>" src="<?php echo e(Theme::asset()->url('images/icons/icon-cart-white.svg')); ?>">
                                <span class="pro-count blue"><?php echo e(Cart::instance('cart')->count()); ?></span>
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                        <a href="<?php echo e(route('customer.login')); ?>">
                            <img alt="<?php echo e(__('Sign In')); ?>" src="<?php echo e(Theme::asset()->url('images/icons/icon-user-white.svg')); ?>">
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>                 
                </div>
               
                </ul>
        </div>
        </div>
        
</div>

   <!-- end -->
            <div class="header-top header-top-ptb-1 d-none d-lg-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-4">
                            <div class="header-info">
                                <ul>
                                    <?php if(theme_option('hotline')): ?>
                                        <li><i class="fa fa-phone-alt mr-5"></i><a href="tel:<?php echo e(theme_option('hotline')); ?>"><?php echo e(theme_option('hotline')); ?></a></li>
                                    <?php endif; ?>

                                    <?php if(is_plugin_active('ecommerce') && EcommerceHelper::isOrderTrackingEnabled()): ?>
                                        <li><i class="far fa-anchor mr-5"></i><a href="<?php echo e(route('public.orders.tracking')); ?>"><?php echo e(__('Track Your Order')); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-5 col-lg-4">
                            <div class="text-center">
                                <?php if(theme_option('header_messages')): ?>
                                    <div id="news-flash" class="d-inline-block">
                                        <ul>
                                            <?php $__currentLoopData = json_decode(theme_option('header_messages'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headerMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(count($headerMessage) == 4): ?>
                                                    <li>
                                                        <?php if($headerMessage[0]['value']): ?>
                                                            <i class="<?php echo e($headerMessage[0]['value']); ?> d-inline-block mr-5"></i>
                                                        <?php endif; ?>

                                                        <?php if($headerMessage[1]['value']): ?>
                                                            <span class="d-inline-block">
                                                                <?php echo BaseHelper::clean($headerMessage[1]['value']); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                        <?php if($headerMessage[2]['value'] && $headerMessage[3]['value']): ?>
                                                            <a class="active d-inline-block" href="<?php echo e(url($headerMessage[2]['value'])); ?>"><?php echo BaseHelper::clean($headerMessage[3]['value']); ?></a>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php $currencies = is_plugin_active('ecommerce') ? get_all_currencies() : []; ?>

                        <?php if(is_plugin_active('ecommerce') || is_plugin_active('language')): ?>
                            <div class="col-xl-4 col-lg-4">
                                <div class="header-info header-info-right">
                                        <ul>
                                            <?php if(is_plugin_active('language')): ?>
                                                <?php echo Theme::partial('language-switcher'); ?>

                                            <?php endif; ?>

                                            <?php if(is_plugin_active('ecommerce')): ?>
                                                <?php if(count($currencies) > 1): ?>
                                                    <li>
                                                        <a class="language-dropdown-active" href="#"> <i class="fa fa-coins"></i> <?php echo e(get_application_currency()->title); ?> <i class="fa fa-chevron-down"></i></a>
                                                        <ul class="language-dropdown">
                                                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($currency->id !== get_application_currency_id()): ?>
                                                                    <li><a href="<?php echo e(route('public.change-currency', $currency->title)); ?>"><?php echo e($currency->title); ?></a></li>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if(auth('customer')->check()): ?>
                                                    <li><a href="<?php echo e(route('customer.overview')); ?>"><?php echo e(auth('customer')->user()->name); ?></a></li>
                                                <?php else: ?>
                                                    <li><a href="<?php echo e(route('customer.login')); ?>"><?php echo e(__('Log In / Sign Up')); ?></a></li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            
            
            <!-- end -->
        </header>
    
        </div>
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <?php if(theme_option('logo')): ?>
                        <div class="mobile-header-logo">
                            <a href="<?php echo e(route('public.index')); ?>"><img src="<?php echo e(RvMedia::getImageUrl(theme_option('logo'))); ?>" alt="<?php echo e(theme_option('site_title')); ?>"></a>
                        </div>
                    <?php endif; ?>
                    <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                        <button class="close-style search-close">
                            <i class="icon-top"></i>
                            <i class="icon-bottom"></i>
                        </button>
                    </div>
                </div>
                <?php if(is_plugin_active('ecommerce')): ?>
                    <div class="mobile-header-content-area">
                    <div class="mobile-search search-style-3 mobile-header-border">
                        <form action="<?php echo e(route('public.products')); ?>">
                            <input type="text" name="q" placeholder="<?php echo e(__('Search...')); ?>">
                            <button type="submit"> <i class="far fa-search"></i> </button>
                        </form>
                    </div>
                    <!-- maryam -->
                    <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                            <?php echo Menu::renderMenuLocation('main-menu', [
                                    'options' => ['class' => 'mobile-menu'],
                                    'view'    => 'mobile-menu',
                                ]); ?>

                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    

                    <?php if(theme_option('social_links')): ?>
                        <div class="mobile-social-icon">
                            <?php $__currentLoopData = json_decode(theme_option('social_links'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($socialLink) == 4): ?>
                                    <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/home-header.blade.php ENDPATH**/ ?>