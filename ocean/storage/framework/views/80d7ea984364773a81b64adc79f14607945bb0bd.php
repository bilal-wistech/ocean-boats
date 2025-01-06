<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => ['settings.email.edit']]); ?>

    <div class="max-width-1200 email-settings">
        <?php if(config('core.setting.general.enable_email_smtp_settings', true)): ?>
            <div class="flexbox-annotated-section">

            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2><?php echo e(trans('core/setting::setting.email_setting_title')); ?></h2>
                </div>
                <div class="annotated-section-description pd-all-20 p-none-t">
                    <p class="color-note"><?php echo e(trans('core/setting::setting.email.description')); ?></p>
                </div>
            </div>

            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20" id="email-config-form">
                    <div class="form-group mb-3">
                        <label class="text-title-field" for="email_driver"><?php echo e(trans('core/setting::setting.email.mailer')); ?></label>
                        <div class="ui-select-wrapper">
                            <select name="email_driver" class="ui-select setting-select-options" id="email_driver">
                                <option value="smtp" <?php if(setting('email_driver', config('mail.default')) == 'smtp'): ?> selected <?php endif; ?>>SMTP</option>

                                <?php if(function_exists('proc_open')): ?>
                                    <option value="sendmail" <?php if(setting('email_driver', config('mail.default')) == 'sendmail'): ?> selected <?php endif; ?>>Sendmail</option>
                                <?php endif; ?>

                                <option value="mailgun" <?php if(setting('email_driver', config('mail.default')) == 'mailgun'): ?> selected <?php endif; ?>>Mailgun</option>
                                <option value="ses" <?php if(setting('email_driver', config('mail.default')) == 'ses'): ?> selected <?php endif; ?>>SES</option>
                                <option value="postmark" <?php if(setting('email_driver', config('mail.default')) == 'postmark'): ?> selected <?php endif; ?>>Postmark</option>
                                <option value="log" <?php if(setting('email_driver', config('mail.default')) == 'log'): ?> selected <?php endif; ?>>Log</option>
                                <option value="array" <?php if(setting('email_driver', config('mail.default')) == 'array'): ?> selected <?php endif; ?>>Array</option>
                            </select>
                            <svg class="svg-next-icon svg-next-icon-size-16">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                            </svg>
                        </div>
                    </div>
                    <div data-type="smtp" class="setting-wrapper <?php if(setting('email_driver', config('mail.default')) !== 'smtp'): ?> hidden <?php endif; ?>">
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="email_port"><?php echo e(trans('core/setting::setting.email.port')); ?></label>
                            <input data-counter="10" type="number" class="next-input" name="email_port" id="email_port"
                                   value="<?php echo e(setting('email_port', config('mail.mailers.smtp.port'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.port_placeholder')); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="email_host"><?php echo e(trans('core/setting::setting.email.host')); ?></label>
                            <input data-counter="60" type="text" class="next-input" name="email_host" id="email_host"
                                   value="<?php echo e(setting('email_host', config('mail.mailers.smtp.host'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.host_placeholder')); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="email_username"><?php echo e(trans('core/setting::setting.email.username')); ?></label>
                            <input data-counter="120" type="text" class="next-input" name="email_username" id="email_username"
                                   value="<?php echo e(setting('email_username', config('mail.mailers.smtp.username'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.username_placeholder')); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="email_password"><?php echo e(trans('core/setting::setting.email.password')); ?></label>
                            <input data-counter="120" type="password" class="next-input" name="email_password" id="email_password"
                                   value="<?php echo e(setting('email_password', config('mail.mailers.smtp.password'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.password_placeholder')); ?>">
                        </div>
                        <div class="form-group mb-3" style="margin-bottom: 1em;">
                            <label class="text-title-field" for="email_encryption"><?php echo e(trans('core/setting::setting.email.encryption')); ?></label>
                            <input data-counter="20" type="text" class="next-input" name="email_encryption" id="email_encryption"
                                   value="<?php echo e(setting('email_encryption', config('mail.mailers.smtp.encryption'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.encryption_placeholder')); ?>">
                        </div>
                    </div>

                    <div data-type="mailgun" class="setting-wrapper <?php if(setting('email_driver', config('mail.default')) !== 'mailgun'): ?> hidden <?php endif; ?>">
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="email_mail_gun_domain"><?php echo e(trans('core/setting::setting.email.mail_gun_domain')); ?></label>
                            <input data-counter="120" type="text" class="next-input" name="email_mail_gun_domain" id="email_mail_gun_domain"
                                   value="<?php echo e(setting('email_mail_gun_domain', config('services.mailgun.domain'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.mail_gun_domain_placeholder')); ?>">
                        </div>
                        <?php if(!app()->environment('demo')): ?>
                            <div class="form-group mb-3">
                                <label class="text-title-field" for="email_mail_gun_secret"><?php echo e(trans('core/setting::setting.email.mail_gun_secret')); ?></label>
                                <input data-counter="120" type="text" class="next-input" name="email_mail_gun_secret" id="email_mail_gun_secret"
                                       value="<?php echo e(setting('email_mail_gun_secret', config('services.mailgun.secret'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.mail_gun_secret_placeholder')); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="form-group mb-3" style="margin-bottom: 1em;">
                            <label class="text-title-field" for="email_mail_gun_endpoint"><?php echo e(trans('core/setting::setting.email.mail_gun_endpoint')); ?></label>
                            <input data-counter="120" type="text" class="next-input" name="email_mail_gun_endpoint" id="email_mail_gun_endpoint"
                                   value="<?php echo e(setting('email_mail_gun_endpoint', config('services.mailgun.endpoint'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.mail_gun_endpoint_placeholder')); ?>">
                        </div>
                    </div>

                    <div data-type="ses" class="setting-wrapper <?php if(setting('email_driver', config('mail.default')) !== 'ses'): ?> hidden <?php endif; ?>">
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="email_ses_key"><?php echo e(trans('core/setting::setting.email.ses_key')); ?></label>
                            <input data-counter="120" type="text" class="next-input" name="email_ses_key" id="email_ses_key"
                                   value="<?php echo e(setting('email_ses_key', config('services.ses.key'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.ses_key_placeholder')); ?>">
                        </div>
                        <?php if(!app()->environment('demo')): ?>
                            <div class="form-group mb-3">
                                <label class="text-title-field" for="email_ses_secret"><?php echo e(trans('core/setting::setting.email.ses_secret')); ?></label>
                                <input data-counter="120" type="text" class="next-input" name="email_ses_secret" id="email_ses_secret"
                                       value="<?php echo e(setting('email_ses_secret', config('services.ses.secret'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.ses_secret_placeholder')); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="form-group mb-3" style="margin-bottom: 1em;">
                            <label class="text-title-field" for="email_ses_region"><?php echo e(trans('core/setting::setting.email.ses_region')); ?></label>
                            <input data-counter="120" type="text" class="next-input" name="email_ses_region" id="email_ses_region"
                                   value="<?php echo e(setting('email_ses_region', config('services.ses.region'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.ses_region_placeholder')); ?>">
                        </div>
                    </div>

                    <div data-type="postmark" class="setting-wrapper <?php if(setting('email_driver', config('mail.default')) !== 'postmark'): ?> hidden <?php endif; ?>">
                        <?php if(!app()->environment('demo')): ?>
                            <div class="form-group mb-3">
                                <label class="text-title-field" for="email_postmark_token"><?php echo e(trans('core/setting::setting.email.postmark_token')); ?></label>
                                <input data-counter="120" type="text" class="next-input" name="email_postmark_token" id="email_postmark_token"
                                       value="<?php echo e(setting('email_postmark_token', config('services.postmark.token'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.postmark_token_placeholder')); ?>">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div data-type="sendmail" class="setting-wrapper <?php if(setting('email_driver', config('mail.default')) !== 'sendmail'): ?> hidden <?php endif; ?>">
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="email_sendmail_path"><?php echo e(trans('core/setting::setting.email.sendmail_path')); ?></label>
                            <input type="text" class="next-input" name="email_sendmail_path" id="email_sendmail_path"
                                   value="<?php echo e(setting('email_sendmail_path', config('mail.mailers.sendmail.path'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.sendmail_path')); ?>">
                            <span class="help-ts"><?php echo e(trans('core/setting::setting.email.default')); ?>: <code><?php echo e(config('mail.mailers.sendmail.path')); ?></code></span>
                        </div>
                    </div>

                    <div data-type="log" class="setting-wrapper <?php if(setting('email_driver', config('mail.default')) !== 'log'): ?> hidden <?php endif; ?>">
                        <div class="form-group mb-3" style="margin-bottom: 1em;">
                            <label class="text-title-field" for="email_log_channel"><?php echo e(trans('core/setting::setting.email.log_channel')); ?></label>
                            <?php echo Form::customSelect('email_log_channel', array_combine(array_keys(config('logging.channels', [])), array_keys(config('logging.channels', []))), setting('email_log_channel', config('mail.mailers.log.channel'))); ?>

                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="text-title-field" for="email_from_name"><?php echo e(trans('core/setting::setting.email.sender_name')); ?></label>
                        <input data-counter="60" type="text" class="next-input" name="email_from_name" id="email_from_name"
                               value="<?php echo e(setting('email_from_name', config('mail.from.name'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.email.sender_name_placeholder')); ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label class="text-title-field" for="email_from_address"><?php echo e(trans('core/setting::setting.email.sender_email')); ?></label>
                        <input data-counter="60" type="text" class="next-input" name="email_from_address" id="email_from_address"
                               value="<?php echo e(setting('email_from_address', config('mail.from.address'))); ?>" placeholder="admin@example.com">
                    </div>

                    <div class="form-group mb-3">
                        <button class="btn btn-info send-test-email-trigger-button" type="button" data-saving="<?php echo e(trans('core/setting::setting.saving')); ?>"><?php echo e(trans('core/setting::setting.test_send_mail')); ?></button>
                    </div>

                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php echo apply_filters(BASE_FILTER_AFTER_SETTING_EMAIL_CONTENT, null); ?>


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


    <?php echo Form::modalAction('send-test-email-modal', trans('core/setting::setting.test_email_modal_title'), 'info', view('core/setting::partials.test-email')->render(), 'send-test-email-btn', trans('core/setting::setting.send')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/core/setting/resources/views/email.blade.php ENDPATH**/ ?>