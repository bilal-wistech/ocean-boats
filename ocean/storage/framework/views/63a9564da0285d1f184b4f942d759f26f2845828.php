<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => ['slug.settings']]); ?>

        <div class="max-width-1200">
            <div class="flexbox-annotated-section">

                <div class="flexbox-annotated-section-annotation">
                    <div class="annotated-section-title pd-all-20">
                        <h2><?php echo e(trans('packages/slug::slug.settings.title')); ?></h2>
                    </div>
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <p class="color-note"><?php echo e(trans('packages/slug::slug.settings.description')); ?></p>
                    </div>
                </div>

                <div class="flexbox-annotated-section-content">
                    <div class="wrapper-content pd-all-20">
                        <?php $__currentLoopData = SlugHelper::supportedModels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group mb-3">
                                <label class="text-title-field" for="<?php echo e(SlugHelper::getPermalinkSettingKey($model)); ?>"><?php echo e(trans('packages/slug::slug.prefix_for', ['name' => $name])); ?></label>
                                <input type="text" class="next-input form-control <?php echo e($errors->has(SlugHelper::getPermalinkSettingKey($model)) ? 'is-invalid' : ''); ?>" name="<?php echo e(SlugHelper::getPermalinkSettingKey($model)); ?>" id="<?php echo e(SlugHelper::getPermalinkSettingKey($model)); ?>"
                                       value="<?php echo e(ltrim(rtrim(old(SlugHelper::getPermalinkSettingKey($model), setting(SlugHelper::getPermalinkSettingKey($model), SlugHelper::getPrefix($model))), '/'), '/')); ?>">
                                <input type="hidden" name="<?php echo e(SlugHelper::getPermalinkSettingKey($model)); ?>-model-key" value="<?php echo e($model); ?>">
                                <?php if($errors->has(SlugHelper::getPermalinkSettingKey($model))): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first(SlugHelper::getPermalinkSettingKey($model))); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <span class="help-ts">
                                    <?php echo e(trans('packages/slug::slug.settings.preview')); ?>: <a href="javascript:void(0)"><?php echo e(url((string)setting(SlugHelper::getPermalinkSettingKey($model), SlugHelper::getPrefix($model)))); ?>/<?php echo e(Str::slug('your url here')); ?></a>
                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <hr>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="slug_turn_off_automatic_url_translation_into_latin"><?php echo e(trans('packages/slug::slug.settings.turn_off_automatic_url_translation_into_latin')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="slug_turn_off_automatic_url_translation_into_latin"
                                       value="1"
                                       <?php if(SlugHelper::turnOffAutomaticUrlTranslationIntoLatin()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="slug_turn_off_automatic_url_translation_into_latin"
                                       value="0"
                                       <?php if(!SlugHelper::turnOffAutomaticUrlTranslationIntoLatin()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

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
                    <button class="btn btn-info" type="submit"><?php echo e(trans('core/setting::setting.save_settings')); ?></button>
                </div>
            </div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/packages/slug/resources/views/settings.blade.php ENDPATH**/ ?>