<?php if(theme_option('facebook_comment_enabled_in_post', 'no') == 'yes' || theme_option('facebook_comment_enabled_in_product', 'no') == 'yes' || (theme_option('facebook_chat_enabled', 'no') == 'yes' && theme_option('facebook_page_id'))): ?>
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v7.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <?php if(theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id')): ?>
        <div class="fb-customerchat"
             attribution="install_email"
             page_id="<?php echo e(theme_option('facebook_page_id')); ?>"
             theme_color="<?php echo e(theme_option('primary_color', '#56cfe1')); ?>">
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/facebook-integration.blade.php ENDPATH**/ ?>