<?php if(app(Botble\Shippo\Shippo::class)->canCreateTransaction($shipment)): ?>
    <?php
        $url = route('ecommerce.shipments.shippo.show', $shipment->id);
        if (!is_in_admin(true) && is_plugin_active('marketplace')) {
            $url = route('marketplace.vendor.orders.shippo.show', $shipment->id);
        }
    ?>
    <button type="button" class="btn btn-primary"
        data-bs-toggle="modal" data-bs-target="#shippo-view-n-create-transaction"
        data-url="<?php echo e($url); ?>">
        <img src="<?php echo e(url('vendor/core/plugins/shippo/images/icon.svg')); ?>" alt="shippo" height="16">
        <span><?php echo e(trans('plugins/shippo::shippo.transaction.view_and_create')); ?></span>
    </button>

    <div class="modal fade" id="shippo-view-n-create-transaction" tabindex="-1" aria-labelledby="shippo-view-n-create-transaction-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shippo-view-n-create-transaction-label"><?php echo e(trans('plugins/shippo::shippo.transaction.view_and_create')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if($shipment->label_url): ?>
    <a class="btn btn-success" href="<?php echo e($shipment->label_url); ?>" target="_blank" rel="noopener noreferrer">
        <i class="fa fa-print"></i>
        <span><?php echo e(trans('plugins/shippo::shippo.print_label')); ?></span>
    </a>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/shippo/resources/views/buttons.blade.php ENDPATH**/ ?>