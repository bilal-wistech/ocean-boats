<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => ['social-login.settings']]); ?>

    <div class="max-width-1200">
        <div class="flexbox-annotated-section">

            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2><?php echo e(trans('plugins/social-login::social-login.settings.title')); ?></h2>
                </div>
                <div class="annotated-section-description pd-all-20 p-none-t">
                    <p class="color-note"><?php echo e(trans('plugins/social-login::social-login.settings.description')); ?></p>
                </div>
            </div>

            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">
                    <div class="form-group mb-0">
                        <input type="hidden" name="social_login_enable" value="0">
                        <label>
                            <input type="checkbox" class="hrv-checkbox" value="1"
                                   <?php if(setting('social_login_enable')): ?> checked <?php endif; ?> name="social_login_enable" id="social_login_enable">
                            <?php echo e(trans('plugins/social-login::social-login.settings.enable')); ?>

                        </label>
                    </div>

                </div>
            </div>
        </div>
        <div class="wrapper-list-social-login-options" <?php if(!SocialService::setting('enable')): ?> style="display:none;" <?php endif; ?>>
            <?php $__currentLoopData = SocialService::getProviders(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flexbox-annotated-section">

                    <div class="flexbox-annotated-section-annotation">
                        <div class="annotated-section-title pd-all-20">
                            <h2><?php echo e(trans('plugins/social-login::social-login.settings.' . $provider . '.title')); ?></h2>
                        </div>
                        <div class="annotated-section-description pd-all-20 p-none-t">
                            <p class="color-note"><?php echo e(trans('plugins/social-login::social-login.settings.' . $provider . '.description')); ?></p>
                        </div>
                    </div>

                    <div class="flexbox-annotated-section-content">
                        <div class="wrapper-content pd-all-20">
                            <div class="form-group mb-3 <?php if(!SocialService::getProviderEnabled($provider)): ?> mb-0 <?php endif; ?>">
                                <input type="hidden" name="social_login_<?php echo e($provider); ?>_enable" value="0">
                                <label>
                                    <input type="checkbox" class="hrv-checkbox enable-social-login-option" value="1"
                                        <?php if(SocialService::getProviderEnabled($provider)): ?> checked <?php endif; ?> name="social_login_<?php echo e($provider); ?>_enable">
                                    <?php echo e(trans('plugins/social-login::social-login.settings.enable')); ?>

                                </label>
                            </div>
                            <div class="enable-social-login-option-wrapper" <?php if(!SocialService::getProviderEnabled($provider)): ?> style="display:none;" <?php endif; ?>>
                                <?php $__currentLoopData = $item['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(in_array(app()->environment(), SocialService::getEnvDisableData()) && in_array($input, Arr::get($item, 'disable', []))): ?>
                                        <div class="form-group mb-3">
                                            <label class="text-title-field"><?php echo e(trans('plugins/social-login::social-login.settings.' . $provider . '.' . $input)); ?></label>
                                            <input type="text" disabled readonly class="next-input" value="<?php echo e(SocialService::getDataDisable($provider . '_' . $input)); ?>">
                                        </div>
                                    <?php else: ?>
                                        <div class="form-group mb-3">
                                            <label class="text-title-field"
                                                for="social_login_<?php echo e($provider); ?>_<?php echo e($input); ?>"><?php echo e(trans('plugins/social-login::social-login.settings.' . $provider . '.' . $input)); ?></label>
                                            <input data-counter="120" type="text" class="next-input" name="social_login_<?php echo e($provider); ?>_<?php echo e($input); ?>" id="social_login_<?php echo e($provider); ?>_<?php echo e($input); ?>"
                                                value="<?php echo e(SocialService::setting($provider . '_' . $input)); ?>">
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo Form::helper(trans('plugins/social-login::social-login.settings.' . $provider . '.helper', ['callback' => '<code>' . route('auth.social.callback', $provider) . '</code>'])); ?>

                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="flexbox-annotated-section" style="border: none">
            <div class="flexbox-annotated-section-annotation">
                &nbsp;
            </div>
            <div class="flexbox-annotated-section-content">
                <button class="btn btn-info" type="submit"><?php echo e(trans('core/setting::setting.save_settings')); ?></button>
            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/plugins/social-login/resources/views/settings.blade.php ENDPATH**/ ?>