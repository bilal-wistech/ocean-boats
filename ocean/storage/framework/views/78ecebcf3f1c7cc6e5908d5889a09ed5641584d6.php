<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => ['api.settings.update']]); ?>

    <div class="max-width-1200">
        <div class="flexbox-annotated-section">
            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2><?php echo e(trans('packages/api::api.setting_title')); ?></h2>
                </div>
                <div class="annotated-section-description pd-all-20 p-none-t">
                    <p class="color-note"><?php echo e(trans('packages/api::api.setting_description')); ?></p>
                </div>
            </div>

            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">

                    <div class="form-group mb-3">
                        <label class="text-title-field"
                               for="api_enabled"><?php echo e(trans('packages/api::api.api_enabled')); ?>

                        </label>
                        <label class="me-2">
                            <input type="radio" name="api_enabled" value="1" <?php if(ApiHelper::enabled()): ?> checked <?php endif; ?>>
                            <?php echo e(trans('core/base::base.yes')); ?>

                        </label>
                        <label>
                            <input type="radio" name="api_enabled" value="0" <?php if(!ApiHelper::enabled()): ?> checked <?php endif; ?>>
                            <?php echo e(trans('core/base::base.no')); ?>

                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flexbox-annotated-section" style="border: none">
            <div class="flexbox-annotated-section-annotation">
                &nbsp;
            </div>
            <div class="flexbox-annotated-section-content">
                <button class="btn btn-info" type="submit"><?php echo e(trans('packages/api::api.save_settings')); ?></button>
            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/packages/api/resources/views/settings.blade.php ENDPATH**/ ?>