<?php
    $status = setting('shipping_shippo_status', 0);
    $testKey = setting('shipping_shippo_test_key') ?: '';
    $prodKey = setting('shipping_shippo_production_key') ?: '';
    $test = setting('shipping_shippo_sandbox', 1) ?: 0;
    $logging = setting('shipping_shippo_logging', 1) ?: 0;
    $webhook = setting('shipping_shippo_webhooks', 1) ?: 0;
?>
<table class="table mt-4 bg-white">
    <tbody>
        <tr class="border-pay-row">
            <td class="border-pay-col">
                <i class="fas fa-shipping-fast"></i>
            </td>
            <td style="width: 20%;">
                <img class="filter-black" src="<?php echo e(url('vendor/core/plugins/shippo/images/logo-dark.svg')); ?>" alt="Shippo">
            </td>
            <td class="border-right">
                <ul>
                    <li>
                        <a href="https://goshippo.com/" target="_blank">Shippo</a>
                        <p><?php echo e(trans('plugins/shippo::shippo.description')); ?></p>
                    </li>
                </ul>
            </td>
        </tr>
        <tr class="bg-white">
            <td colspan="3">
                <div class="float-start" style="margin-top: 5px;">
                    <div class="payment-name-label-group  <?php if($status == 0): ?> d-none <?php endif; ?>">
                        <span class="payment-note v-a-t"><?php echo e(trans('plugins/payment::payment.use')); ?>:</span>
                        <label class="ws-nm inline-display method-name-label">Shippo</label>
                    </div>
                </div>
                <div class="float-end">
                    <a class="btn btn-secondary" data-bs-toggle="collapse"
                        href="#collapse-shipping-method-shippo" role="button" aria-expanded="false"
                        aria-controls="collapse-shipping-method-shippo">
                        <?php if($status == 0): ?> <?php echo e(trans('core/base::forms.edit')); ?> <?php else: ?> <?php echo e(trans('core/base::layouts.settings')); ?> <?php endif; ?>
                    </a>
                </div>
            </td>
        </tr>
        <tr class="collapse" id="collapse-shipping-method-shippo">
            <td class="border-left" colspan="3">
                <?php echo Form::open(['route' => 'ecommerce.shipments.shippo.settings.update']); ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <ul>

                                <li>
                                    <div class="alert alert-warning">
                                        <h5 class="text-danger"><?php echo e(trans('plugins/shippo::shippo.note_0')); ?></h5>
                                        <ul class="ps-3">
                                            <li style="list-style-type: circle;">
                                                <span><?php echo BaseHelper::clean(trans('plugins/shippo::shippo.note_1', ['link' => 'https://docs.botble.com/farmart/1.x/usage-location'])); ?></span>
                                            </li>
                                            <li style="list-style-type: circle;">
                                                <span><?php echo e(trans('plugins/shippo::shippo.note_2')); ?></span>
                                            </li>
                                            <li style="list-style-type: circle;">
                                                <span><?php echo BaseHelper::clean(trans('plugins/shippo::shippo.note_3', ['link' => route('ecommerce.settings')])); ?></span>
                                            </li>
                                            <li style="list-style-type: circle;">
                                                <span><?php echo BaseHelper::clean(trans('plugins/shippo::shippo.note_6', ['link' => 'https://goshippo.com/docs/reference#parcels-extras'])); ?></span>
                                            </li>
                                            <?php if(is_plugin_active('marketplace')): ?>
                                                <li style="list-style-type: circle;">
                                                    <span><?php echo e(trans('plugins/shippo::shippo.note_4')); ?></span>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label><?php echo e(trans('plugins/shippo::shippo.configuration_instruction', ['name' => 'Shippo'])); ?></label>
                                </li>
                                <li class="text-secondary">
                                    <p><?php echo e(trans('plugins/shippo::shippo.configuration_requirement', ['name' => 'Shippo'])); ?>:</p>
                                    <ul class="ms-3 ps-2">
                                        <li style="list-style-type: decimal">
                                            <p>
                                                <a href="https://apps.goshippo.com/join" target="_blank">
                                                    <?php echo e(trans('plugins/shippo::shippo.service_registration', ['name' => 'Shippo'])); ?>

                                                </a>
                                            </p>
                                        </li>
                                        <li style="list-style-type: decimal">
                                            <p><?php echo e(trans('plugins/shippo::shippo.after_service_registration_msg', ['name' => 'Shippo'])); ?></p>
                                        </li>
                                        <li style="list-style-type: decimal">
                                            <p><?php echo e(trans('plugins/shippo::shippo.enter_api_key')); ?></p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <div class="well">
                                <p class="text-secondary">
                                    <?php echo e(trans('plugins/shippo::shippo.please_provide_information')); ?>

                                    <a target="_blank" href="https://goshippo.com/">Shippo</a>:
                                </p>
                                <div class="form-group mb-3">
                                    <label class="control-label" for="shipping_shippo_test_key"><?php echo e(trans('plugins/shippo::shippo.test_api_token')); ?></label>
                                    <input type="text" class="form-control" placeholder="<API-KEY>" id="shipping_shippo_test_key"
                                        name="shipping_shippo_test_key"
                                        <?php if(app()->environment('demo')): ?> disabled value="<?php echo e(Str::mask($testKey, '*', 10)); ?>" <?php else: ?> value="<?php echo e($testKey); ?>" <?php endif; ?>>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label" for="shipping_shippo_production_key"><?php echo e(trans('plugins/shippo::shippo.live_api_token')); ?></label>
                                    <div class="input-option">
                                        <input type="text" class="form-control" placeholder="<API-KEY>" id="shipping_shippo_production_key"
                                            name="shipping_shippo_production_key"
                                            <?php if(app()->environment('demo')): ?> disabled value="<?php echo e(Str::mask($prodKey, '*', 10)); ?>" <?php else: ?> value="<?php echo e($prodKey); ?>" <?php endif; ?>>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label" for="shipping_shippo_sandbox">
                                        <?php echo Form::onOff('shipping_shippo_sandbox', $test); ?>

                                        <?php echo e(trans('plugins/shippo::shippo.sandbox_mode')); ?>

                                    </label>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label" for="shipping_shippo_status">
                                        <?php echo Form::onOff('shipping_shippo_status', $status); ?>

                                        <?php echo e(trans('plugins/shippo::shippo.activate')); ?>

                                    </label>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label" for="shipping_shippo_logging">
                                        <?php echo Form::onOff('shipping_shippo_logging', $logging); ?>

                                        <?php echo e(trans('plugins/shippo::shippo.logging')); ?>

                                    </label>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label" for="shipping_shippo_webhooks">
                                        <?php echo Form::onOff('shipping_shippo_webhooks', $webhook); ?>

                                        <?php echo e(trans('plugins/shippo::shippo.webhooks')); ?>

                                    </label>
                                    <div class="help-block">
                                        <a href="https://goshippo.com/docs/webhooks" target="_blank" rel="noopener noreferrer" class="text-warning fw-bold">
                                            <span>Webhooks</span>
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                        <div>URL: <i><?php echo e(route('shippo.webhooks', ['_token' => '__API_TOKEN__'])); ?></i></div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label" for="shipping_shippo_validate">
                                        <?php echo Form::checkbox('shipping_shippo_validate', 1); ?>

                                        <?php echo e(trans('plugins/shippo::shippo.check_validate_token')); ?>

                                    </label>
                                </div>
                            </div>
                            <?php if(app()->environment('demo')): ?>
                                <div class="col-12">
                                    <div class="alert alert-warning">
                                        <strong><?php echo e(trans('plugins/shippo::shippo.disabled_in_demo_mode')); ?></strong>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-12 text-end">
                                    <button class="btn btn-info" type="submit"><?php echo e(trans('core/base::forms.update')); ?></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    </tbody>
</table>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/shippo/resources/views/settings.blade.php ENDPATH**/ ?>