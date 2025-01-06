<?php $__env->startSection('content'); ?>
    <?php echo Form::open(); ?>

        <div id="main-discount">
            <div class="max-width-1200">
                <discount-component currency="<?php echo e(get_application_currency()->symbol); ?>"></discount-component>
            </div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('header'); ?>
    <script>
        'use strict';

        window.trans = window.trans || {};

        window.trans.discount = JSON.parse('<?php echo addslashes(json_encode(trans('plugins/ecommerce::discount'))); ?>');

        $(document).ready(function () {
            $(document).on('click', 'body', function (e) {
                let container = $('.box-search-advance');

                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.find('.panel').addClass('hidden');
                }
            });
        });
    </script>
    <?php
        Assets::addScripts(['form-validation']);
    ?>
    <?php echo JsValidator::formRequest(\Botble\Ecommerce\Http\Requests\DiscountRequest::class); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/discounts/create.blade.php ENDPATH**/ ?>