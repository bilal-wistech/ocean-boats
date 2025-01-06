<div class="flexbox-annotated-section">
    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2><?php echo e(trans('packages/optimize::optimize.settings.title')); ?></h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note"><?php echo e(trans('packages/optimize::optimize.settings.description')); ?></p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="form-group mb-3">
                <label class="text-title-field"
                       for="optimize_page_speed_enable"><?php echo e(trans('packages/optimize::optimize.settings.enable')); ?>

                </label>
                <label class="me-2">
                    <input type="radio" name="optimize_page_speed_enable" class="setting-selection-option" data-target="#pagespeed-optimize-settings"
                           value="1"
                           <?php if(setting('optimize_page_speed_enable')): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                </label>
                <label>
                    <input type="radio" name="optimize_page_speed_enable" class="setting-selection-option" data-target="#pagespeed-optimize-settings"
                           value="0"
                           <?php if(!setting('optimize_page_speed_enable')): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                </label>
            </div>

            <div id="pagespeed-optimize-settings" class="mb-4 border rounded-top rounded-bottom p-3 bg-light <?php if(!setting('optimize_page_speed_enable')): ?> d-none <?php endif; ?>">
                <div class="form-group mb-3">
                    <input type="hidden" name="optimize_collapse_white_space" value="0">
                    <label>
                        <input type="checkbox" value="1" <?php if(setting('optimize_collapse_white_space', 0)): ?> checked <?php endif; ?> name="optimize_collapse_white_space"> <?php echo e(trans('packages/optimize::optimize.collapse_white_space')); ?> </label>
                    <?php echo e(Form::helper(trans('packages/optimize::optimize.collapse_white_space_description'))); ?>

                </div>
                <div class="form-group mb-3">
                    <input type="hidden" name="optimize_elide_attributes" value="0">
                    <label>
                        <input type="checkbox" value="1" <?php if(setting('optimize_elide_attributes', 0)): ?> checked <?php endif; ?> name="optimize_elide_attributes"> <?php echo e(trans('packages/optimize::optimize.elide_attributes')); ?> </label>
                    <?php echo e(Form::helper(trans('packages/optimize::optimize.elide_attributes_description'))); ?>

                </div>
                <div class="form-group mb-3">
                    <input type="hidden" name="optimize_inline_css" value="0">
                    <label>
                        <input type="checkbox" value="1" <?php if(setting('optimize_inline_css', 0)): ?> checked <?php endif; ?> name="optimize_inline_css"> <?php echo e(trans('packages/optimize::optimize.inline_css')); ?> </label>
                    <?php echo e(Form::helper(trans('packages/optimize::optimize.inline_css_description'))); ?>

                </div>
                <div class="form-group mb-3">
                    <input type="hidden" name="optimize_insert_dns_prefetch" value="0">
                    <label>
                        <input type="checkbox" value="1" <?php if(setting('optimize_insert_dns_prefetch', 0)): ?> checked <?php endif; ?> name="optimize_insert_dns_prefetch"> <?php echo e(trans('packages/optimize::optimize.insert_dns_prefetch')); ?> </label>
                    <?php echo e(Form::helper(trans('packages/optimize::optimize.insert_dns_prefetch_description'))); ?>

                </div>
                <div class="form-group mb-3">
                    <input type="hidden" name="optimize_remove_comments" value="0">
                    <label>
                        <input type="checkbox" value="1" <?php if(setting('optimize_remove_comments', 0)): ?> checked <?php endif; ?> name="optimize_remove_comments"> <?php echo e(trans('packages/optimize::optimize.remove_comments')); ?> </label>
                    <?php echo e(Form::helper(trans('packages/optimize::optimize.remove_comments_description'))); ?>

                </div>

                <div class="form-group">
                    <input type="hidden" name="optimize_remove_quotes" value="0">
                    <label>
                        <input type="checkbox" value="1" <?php if(setting('optimize_remove_quotes', 0)): ?> checked <?php endif; ?> name="optimize_remove_quotes"> <?php echo e(trans('packages/optimize::optimize.remove_quotes')); ?> </label>
                    <?php echo e(Form::helper(trans('packages/optimize::optimize.remove_quotes_description'))); ?>

                </div>

                <div class="form-group">
                    <input type="hidden" name="optimize_defer_javascript" value="0">
                    <label>
                        <input type="checkbox" value="1" <?php if(setting('optimize_defer_javascript', 0)): ?> checked <?php endif; ?> name="optimize_defer_javascript"> <?php echo e(trans('packages/optimize::optimize.defer_javascript')); ?> </label>
                    <?php echo e(Form::helper(trans('packages/optimize::optimize.defer_javascript_description'))); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/packages/optimize/resources/views/setting.blade.php ENDPATH**/ ?>