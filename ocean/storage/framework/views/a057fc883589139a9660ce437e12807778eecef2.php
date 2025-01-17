<div class="flexbox-annotated-section">
    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2><?php echo e(trans('plugins/contact::contact.settings.title')); ?></h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note"><?php echo e(trans('plugins/contact::contact.settings.description')); ?></p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="form-group mb-3">
                <label class="text-title-field"
                       for="blacklist_keywords"><?php echo e(trans('plugins/contact::contact.settings.blacklist_keywords')); ?></label>
                <textarea data-counter="250" class="next-input tags" name="blacklist_keywords" id="blacklist_keywords" rows="3" placeholder="<?php echo e(trans('plugins/contact::contact.settings.blacklist_keywords_placeholder')); ?>"><?php echo e(setting('blacklist_keywords')); ?></textarea>
                <?php echo e(Form::helper(trans('plugins/contact::contact.settings.blacklist_keywords_helper'))); ?>

            </div>
            <div class="form-group mb-3">
                <label class="text-title-field"
                       for="blacklist_email_domains"><?php echo e(trans('plugins/contact::contact.settings.blacklist_email_domains')); ?></label>
                <textarea data-counter="250" class="next-input tags" name="blacklist_email_domains" id="blacklist_email_domains" rows="3" placeholder="<?php echo e(trans('plugins/contact::contact.settings.blacklist_email_domains_placeholder')); ?>"><?php echo e(setting('blacklist_email_domains')); ?></textarea>
                <?php echo e(Form::helper(trans('plugins/contact::contact.settings.blacklist_email_domains_helper'))); ?>

            </div>
            <div class="form-group">
                <input type="hidden" name="enable_math_captcha_for_contact_form" value="0">
                <label>
                    <input type="checkbox"  value="1" <?php if(setting('enable_math_captcha_for_contact_form', 0)): ?> checked <?php endif; ?> name="enable_math_captcha_for_contact_form">
                    <?php echo e(trans('plugins/contact::contact.settings.enable_math_captcha')); ?>

                </label>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/contact/resources/views/settings.blade.php ENDPATH**/ ?>