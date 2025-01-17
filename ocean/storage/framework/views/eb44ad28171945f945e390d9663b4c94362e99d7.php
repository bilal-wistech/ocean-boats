<?php if(setting('payment_stripe_status') == 1): ?>
    <li class="list-group-item">
        <input class="magic-radio js_payment_method" type="radio" name="payment_method" id="payment_stripe"
               value="stripe" <?php if($selecting == STRIPE_PAYMENT_METHOD_NAME): ?> checked <?php endif; ?> data-bs-toggle="collapse" data-bs-target=".payment_stripe_wrap" data-toggle="collapse" data-target=".payment_stripe_wrap" data-parent=".list_payment_method">
        <label for="payment_stripe" class="text-start">
            <?php echo e(setting('payment_stripe_name', trans('plugins/payment::payment.payment_via_card'))); ?>

        </label>
        <div class="payment_stripe_wrap payment_collapse_wrap collapse <?php if($selecting == STRIPE_PAYMENT_METHOD_NAME): ?> show <?php endif; ?>" style="padding: 15px 0;">
            <p><?php echo BaseHelper::clean(get_payment_setting('description', STRIPE_PAYMENT_METHOD_NAME)); ?></p>
            <?php if(get_payment_setting('payment_type', STRIPE_PAYMENT_METHOD_NAME, 'stripe_api_charge') == 'stripe_api_charge'): ?>
                <div class="card-checkout" style="max-width: 350px">
                    <div class="form-group mt-3 mb-3">
                        <div class="stripe-card-wrapper"></div>
                    </div>
                    <div class="form-group mb-3 <?php if($errors->has('number') || $errors->has('expiry')): ?> has-error <?php endif; ?>">
                        <div class="row">
                            <div class="col-sm-8">
                                <input placeholder="<?php echo e(trans('plugins/payment::payment.card_number')); ?>"
                                       class="form-control" type="text" id="stripe-number" data-stripe="number" autocomplete="off">
                            </div>
                            <div class="col-sm-4">
                                <input placeholder="<?php echo e(trans('plugins/payment::payment.mm_yy')); ?>" class="form-control"
                                       type="text" id="stripe-exp" data-stripe="exp" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 <?php if($errors->has('name') || $errors->has('cvc')): ?> has-error <?php endif; ?>">
                        <div class="row">
                            <div class="col-sm-8">
                                <input placeholder="<?php echo e(trans('plugins/payment::payment.full_name')); ?>"
                                       class="form-control" id="stripe-name" type="text" data-stripe="name" autocomplete="off">
                            </div>
                            <div class="col-sm-4">
                                <input placeholder="<?php echo e(trans('plugins/payment::payment.cvc')); ?>" class="form-control"
                                       type="text" id="stripe-cvc" data-stripe="cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="payment-stripe-key" data-value="<?php echo e(setting('payment_stripe_client_id')); ?>"></div>
            <?php endif; ?>
        </div>
    </li>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/stripe/resources/views/methods.blade.php ENDPATH**/ ?>