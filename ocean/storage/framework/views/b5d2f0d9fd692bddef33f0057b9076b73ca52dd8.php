<div class="flexbox-annotated-section">
    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2><?php echo e(trans('plugins/newsletter::newsletter.settings.title')); ?></h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note"><?php echo e(trans('plugins/newsletter::newsletter.settings.description')); ?></p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="form-group mb-3">
                <label class="text-title-field"
                       for="enable_cache"><?php echo e(trans('plugins/newsletter::newsletter.settings.enable_newsletter_contacts_list_api')); ?>

                </label>
                <label class="me-2">
                    <input type="radio" name="enable_newsletter_contacts_list_api" value="1" <?php if(setting('enable_newsletter_contacts_list_api')): echo 'checked'; endif; ?> class="setting-selection-option" data-target="#newsletter-settings">
                    <?php echo e(trans('core/setting::setting.general.yes')); ?>

                </label>
                <label>
                    <input type="radio" name="enable_newsletter_contacts_list_api" value="0" <?php if(! setting('enable_newsletter_contacts_list_api')): echo 'checked'; endif; ?> class="setting-selection-option" data-target="#newsletter-settings">
                    <?php echo e(trans('core/setting::setting.general.no')); ?>

                </label>
            </div>

            <div id="newsletter-settings" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['mb-4 border rounded-top rounded-bottom p-3 bg-light', 'd-none' => ! setting('enable_newsletter_contacts_list_api')]) ?>">
                <div class="form-group mb-3">
                    <label class="text-title-field"
                           for="newsletter_mailchimp_api_key"><?php echo e(trans('plugins/newsletter::newsletter.settings.mailchimp_api_key')); ?></label>
                    <input data-counter="120" type="text" class="next-input" name="newsletter_mailchimp_api_key"
                           id="newsletter_mailchimp_api_key"
                           value="<?php echo e(setting('newsletter_mailchimp_api_key')); ?>"
                           placeholder="<?php echo e(trans('plugins/newsletter::newsletter.settings.mailchimp_api_key')); ?>">
                </div>
                <div class="form-group mb-3">
                    <?php if(empty($mailchimpContactList)): ?>
                        <label class="text-title-field"
                               for="newsletter_mailchimp_list_id"><?php echo e(trans('plugins/newsletter::newsletter.settings.mailchimp_list_id')); ?></label>
                        <input data-counter="120" type="text" class="next-input" name="newsletter_mailchimp_list_id"
                               id="newsletter_mailchimp_list_id"
                               value="<?php echo e(setting('newsletter_mailchimp_list_id')); ?>"
                               placeholder="<?php echo e(trans('plugins/newsletter::newsletter.settings.mailchimp_list_id')); ?>">
                    <?php else: ?>
                        <label class="text-title-field"
                               for="newsletter_mailchimp_list_id"><?php echo e(trans('plugins/newsletter::newsletter.settings.mailchimp_list')); ?></label>
                        <?php echo Form::customSelect('newsletter_mailchimp_list_id', $mailchimpContactList, setting('newsletter_mailchimp_list_id')); ?>

                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <label class="text-title-field"
                           for="newsletter_sendgrid_api_key"><?php echo e(trans('plugins/newsletter::newsletter.settings.sendgrid_api_key')); ?></label>
                    <input data-counter="120" type="text" class="next-input" name="newsletter_sendgrid_api_key"
                           id="newsletter_sendgrid_api_key"
                           value="<?php echo e(setting('newsletter_sendgrid_api_key')); ?>"
                           placeholder="<?php echo e(trans('plugins/newsletter::newsletter.settings.sendgrid_api_key')); ?>">
                </div>
                <div class="form-group mb-3">
                    <?php if(empty($sendGridContactList)): ?>
                        <label class="text-title-field"
                               for="newsletter_sendgrid_list_id"><?php echo e(trans('plugins/newsletter::newsletter.settings.sendgrid_list_id')); ?></label>
                        <input data-counter="120" type="text" class="next-input" name="newsletter_sendgrid_list_id"
                               id="newsletter_sendgrid_list_id"
                               value="<?php echo e(setting('newsletter_sendgrid_list_id')); ?>"
                               placeholder="<?php echo e(trans('plugins/newsletter::newsletter.settings.sendgrid_list_id')); ?>">
                    <?php else: ?>
                        <label class="text-title-field"
                               for="newsletter_sendgrid_list_id"><?php echo e(trans('plugins/newsletter::newsletter.settings.sendgrid_list')); ?></label>
                        <?php echo Form::customSelect('newsletter_sendgrid_list_id', $sendGridContactList, setting('newsletter_sendgrid_list_id')); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/newsletter/resources/views/setting.blade.php ENDPATH**/ ?>