
    <!-- <h5 class="widget-title  wow fadeIn animated"><?php echo BaseHelper::clean($config['name'] ?: __('Payments')); ?></h5> -->
    <div class="row mt-20">
        <div class="col-md-4 col-lg-12">
            <p class=" wow fadeIn animated mt-md-3"><?php echo BaseHelper::clean($config['description'] ?: __('Secured Payment Gateways')); ?></p>
            <?php if($config['image'] || theme_option('payment_methods')): ?>
                <img class="wow fadeIn animated" src="<?php echo e(RvMedia::getImageUrl($config['image'] ?: theme_option('payment_methods'))); ?>" alt="<?php echo e(__('Payment methods')); ?>">
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/////widgets/payment-methods/templates/frontend.blade.php ENDPATH**/ ?>