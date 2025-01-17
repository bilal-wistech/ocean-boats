<?php $__env->startSection('content'); ?>
    <div class="max-width-1200">
        <div class="group">
            <div class="row">
                <div class="<?php if(count($shipping) > 0): ?> col-md-3 col-sm-12 <?php else: ?> col-sm-12 <?php endif; ?>">
                    <h4><?php echo e(trans('plugins/ecommerce::shipping.shipping_rules')); ?></h4>
                    <p><?php echo e(trans('plugins/ecommerce::shipping.shipping_rules_description')); ?></p>
                    <p><a href="#" class="btn btn-secondary btn-select-country"><?php echo e(trans('plugins/ecommerce::shipping.select_country')); ?></a></p>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="wrapper-content">
                        <div class="table-wrap">
                            <?php $__currentLoopData = $shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shippingItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="wrap-table-shipping-<?php echo e($shippingItem->id); ?>">
                                    <div class="pd-all-20 p-none-b">
                                        <label class="p-none-r"><?php echo e(trans('plugins/ecommerce::shipping.country')); ?>: <strong><?php echo e(Arr::get(EcommerceHelper::getAvailableCountries(), $shippingItem->title, $shippingItem->title)); ?></strong></label>
                                        <a href="#" class="btn-change-link float-end pl20 btn-add-shipping-rule-trigger"
                                            data-shipping-id="<?php echo e($shippingItem->id); ?>" data-country="<?php echo e($shippingItem->country); ?>"><?php echo e(trans('plugins/ecommerce::shipping.add_shipping_rule')); ?></a>
                                        <a href="#" class="btn-change-link float-end excerpt btn-confirm-delete-region-item-modal-trigger text-danger"
                                            data-id="<?php echo e($shippingItem->id); ?>" data-name="<?php echo e($shippingItem->title); ?>"><?php echo e(trans('plugins/ecommerce::shipping.delete')); ?></a>
                                    </div>
                                    <div class="pd-all-20 p-none-t p-b10 border-bottom">
                                        <?php $__currentLoopData = $shippingItem->rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('plugins/ecommerce::shipping.rules.item', compact('rule'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <?php echo apply_filters(SHIPPING_METHODS_SETTINGS_PAGE, null); ?>

                </div>
            </div>
        </div>
    </div>
    <br>
    <?php echo Form::modalAction('confirm-delete-price-item-modal', trans('plugins/ecommerce::shipping.delete_shipping_rate'), 'info', trans('plugins/ecommerce::shipping.delete_shipping_rate_confirmation'), 'confirm-delete-price-item-button', trans('plugins/ecommerce::shipping.confirm'), 'modal-xs'); ?>

    <?php echo Form::modalAction('confirm-delete-region-item-modal', trans('plugins/ecommerce::shipping.delete_shipping_area'), 'info', trans('plugins/ecommerce::shipping.delete_shipping_area_confirmation'), 'confirm-delete-region-item-button', trans('plugins/ecommerce::shipping.confirm'), 'modal-xs'); ?>

    <?php echo Form::modalAction('add-shipping-rule-item-modal', trans('plugins/ecommerce::shipping.add_shipping_fee_for_area'), 'info', view('plugins/ecommerce::shipping.rules.form', ['rule' => null])->render(), 'add-shipping-rule-item-button', trans('plugins/ecommerce::shipping.save')); ?>

    <div data-delete-region-item-url="<?php echo e(route('shipping_methods.region.destroy')); ?>"></div>
    <div data-delete-rule-item-url="<?php echo e(route('shipping_methods.region.rule.destroy')); ?>"></div>

    <?php echo Form::modalAction('select-country-modal', trans('plugins/ecommerce::shipping.add_shipping_region'), 'info', FormBuilder::create(\Botble\Ecommerce\Forms\AddShippingRegionForm::class)->renderForm(), 'add-shipping-region-button', trans('plugins/ecommerce::shipping.save'), 'modal-xs'); ?>


    <?php echo Form::modalAction('form-shipping-rule-item-detail-modal', '', 'info', '', 'save-shipping-rule-item-detail-button', trans('plugins/ecommerce::shipping.save')); ?>

    <?php echo Form::modalAction('confirm-delete-shipping-rule-item-modal', trans('plugins/ecommerce::shipping.rule.item.delete'), 'info', trans('plugins/ecommerce::shipping.rule.item.confirmation'), 'confirm-delete-shipping-rule-item-button', trans('plugins/ecommerce::shipping.confirm'), 'modal-xs'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/shipping/methods.blade.php ENDPATH**/ ?>