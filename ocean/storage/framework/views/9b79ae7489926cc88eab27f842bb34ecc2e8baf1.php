<div class="flexbox-annotated-section">
    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2><?php echo e(trans('packages/theme::theme.settings.title')); ?></h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note"><?php echo e(trans('packages/theme::theme.settings.description')); ?></p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="form-group mb-3">
                <label class="text-title-field"
                       for="enable_cache_site_map"><?php echo e(trans('core/setting::setting.general.enable_cache_site_map')); ?>

                </label>
                <label class="me-2">
                    <input type="radio" name="enable_cache_site_map" value="1" <?php if(setting('enable_cache_site_map', true)): ?> checked <?php endif; ?> class="setting-selection-option" data-target="#cache-sitemap-settings">
                    <?php echo e(trans('core/setting::setting.general.yes')); ?>

                </label>
                <label>
                    <input type="radio" name="enable_cache_site_map" value="0" <?php if(!setting('enable_cache_site_map', true)): ?> checked <?php endif; ?> class="setting-selection-option" data-target="#cache-sitemap-settings">
                    <?php echo e(trans('core/setting::setting.general.no')); ?>

                </label>
            </div>

            <div id="cache-sitemap-settings" class="mb-4 border rounded-top rounded-bottom p-3 bg-light <?php if(!setting('enable_cache_site_map')): ?> d-none <?php endif; ?>">
                <div class="form-group mb-3">
                    <label class="text-title-field"
                           for="cache_time_site_map"><?php echo e(trans('core/setting::setting.general.cache_time_site_map')); ?> (<?php echo e(trans('core/setting::setting.general.minutes')); ?>)</label>
                    <input type="number" class="next-input" name="cache_time_site_map" id="cache_time_site_map"
                           value="<?php echo e(setting('cache_time_site_map', 60)); ?>">
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="mt5">
                    <input type="hidden" name="show_admin_bar" value="0">
                    <label>
                        <input type="checkbox" value="1" <?php if(setting('show_admin_bar', 1)): ?> checked <?php endif; ?> name="show_admin_bar"> <?php echo e(trans('packages/theme::theme.show_admin_bar')); ?> </label>
                </div>
            </div>

            <div class="form-group">
                <label class="text-title-field"
                       for="redirect_404_to_homepage"><?php echo e(trans('packages/theme::theme.settings.redirect_404_to_homepage')); ?>

                </label>
                <label class="me-2">
                    <input type="radio" name="redirect_404_to_homepage"
                           value="1"
                           <?php if(setting('redirect_404_to_homepage', 0)): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                </label>
                <label>
                    <input type="radio" name="redirect_404_to_homepage"
                           value="0"
                           <?php if(!setting('redirect_404_to_homepage', 0)): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                </label>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/packages/theme/resources/views/setting.blade.php ENDPATH**/ ?>