<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => ['settings.media']]); ?>

    <div class="max-width-1200">
        <div class="flexbox-annotated-section">

            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2><?php echo e(trans('core/setting::setting.media.title')); ?></h2>
                </div>
                <div class="annotated-section-description pd-all-20 p-none-t">
                    <p class="color-note"><?php echo e(trans('core/setting::setting.media.description')); ?></p>
                </div>
            </div>

            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">
                    <div class="form-group mb-3">
                        <label class="text-title-field"
                               for="media_driver"><?php echo e(trans('core/setting::setting.media.driver')); ?>

                        </label>
                        <div class="ui-select-wrapper">
                            <select name="media_driver" class="ui-select setting-select-options" id="media_driver">
                                <option value="public" <?php if(config('filesystems.default') === 'public'): ?> selected <?php endif; ?>>Local disk</option>
                                <option value="s3" <?php if(config('filesystems.default') === 's3'): ?> selected <?php endif; ?>>Amazon S3</option>
                                <option value="do_spaces" <?php if(config('filesystems.default') === 'do_spaces'): ?> selected <?php endif; ?>>DigitalOcean Spaces</option>
                                <option value="wasabi" <?php if(config('filesystems.default') === 'wasabi'): ?> selected <?php endif; ?>>Wasabi</option>
                                <option value="bunnycdn" <?php if(config('filesystems.default') === 'bunnycdn'): ?> selected <?php endif; ?>>BunnyCDN</option>
                            </select>
                            <svg class="svg-next-icon svg-next-icon-size-16">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                            </svg>
                        </div>
                    </div>

                    <div data-type="s3" class="setting-wrapper <?php if(setting('media_driver', config('filesystems.default')) !== 's3'): ?> hidden <?php endif; ?>">
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_aws_access_key_id"><?php echo e(trans('core/setting::setting.media.aws_access_key_id')); ?></label>
                            <input type="text" class="next-input" name="media_aws_access_key_id" id="media_aws_access_key_id"
                                   value="<?php echo e(config('filesystems.disks.s3.key')); ?>" placeholder="Ex: AKIAIKYXBSNBXXXXXX">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_aws_secret_key"><?php echo e(trans('core/setting::setting.media.aws_secret_key')); ?></label>
                            <input type="text" class="next-input" name="media_aws_secret_key" id="media_aws_secret_key"
                                   value="<?php echo e(config('filesystems.disks.s3.secret')); ?>" placeholder="Ex: +fivlGCeTJCVVnzpM2WfzzrFIMLHGhxxxxxxx">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_aws_default_region"><?php echo e(trans('core/setting::setting.media.aws_default_region')); ?></label>
                            <input type="text" class="next-input" name="media_aws_default_region" id="media_aws_default_region"
                                   value="<?php echo e(config('filesystems.disks.s3.region')); ?>" placeholder="Ex: ap-southeast-1">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_aws_bucket"><?php echo e(trans('core/setting::setting.media.aws_bucket')); ?></label>
                            <input type="text" class="next-input" name="media_aws_bucket" id="media_aws_bucket"
                                   value="<?php echo e(config('filesystems.disks.s3.bucket')); ?>" placeholder="Ex: botble">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_aws_url"><?php echo e(trans('core/setting::setting.media.aws_url')); ?></label>
                            <input type="text" class="next-input" name="media_aws_url" id="media_aws_url"
                                   value="<?php echo e(config('filesystems.disks.s3.url')); ?>" placeholder="Ex: https://s3-ap-southeast-1.amazonaws.com/botble">
                        </div>
                        <div class="form-group mb-3" style="margin-bottom: 1rem;">
                            <label class="text-title-field"
                                   for="media_aws_endpoint"><?php echo e(trans('core/setting::setting.media.aws_endpoint')); ?></label>
                            <input type="text" class="next-input" name="media_aws_endpoint" id="media_aws_endpoint"
                                   value="<?php echo e(config('filesystems.disks.s3.endpoint')); ?>" placeholder="<?php echo e(trans('core/setting::setting.media.optional')); ?>">
                        </div>
                    </div>

                    <div data-type="do_spaces" class="setting-wrapper <?php if(setting('media_driver', config('filesystems.default')) !== 'do_spaces'): ?> hidden <?php endif; ?>">
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_do_spaces_access_key_id"><?php echo e(trans('core/setting::setting.media.do_spaces_access_key_id')); ?></label>
                            <input type="text" class="next-input" name="media_do_spaces_access_key_id" id="media_do_spaces_access_key_id"
                                   value="<?php echo e(config('filesystems.disks.do_spaces.key')); ?>" placeholder="Ex: AKIAIKYXBSNBXXXXXX">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_do_spaces_secret_key"><?php echo e(trans('core/setting::setting.media.do_spaces_secret_key')); ?></label>
                            <input type="text" class="next-input" name="media_do_spaces_secret_key" id="media_do_spaces_secret_key"
                                   value="<?php echo e(config('filesystems.disks.do_spaces.secret')); ?>" placeholder="Ex: +fivlGCeTJCVVnzpM2WfzzrFIMLHGhxxxxxxx">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_do_spaces_default_region"><?php echo e(trans('core/setting::setting.media.do_spaces_default_region')); ?></label>
                            <input type="text" class="next-input" name="media_do_spaces_default_region" id="media_do_spaces_default_region"
                                   value="<?php echo e(config('filesystems.disks.do_spaces.region')); ?>" placeholder="Ex: SGP1">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_do_spaces_bucket"><?php echo e(trans('core/setting::setting.media.do_spaces_bucket')); ?></label>
                            <input type="text" class="next-input" name="media_do_spaces_bucket" id="media_do_spaces_bucket"
                                   value="<?php echo e(config('filesystems.disks.do_spaces.bucket')); ?>" placeholder="Ex: botble">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_do_spaces_endpoint"><?php echo e(trans('core/setting::setting.media.do_spaces_endpoint')); ?></label>
                            <input type="text" class="next-input" name="media_do_spaces_endpoint" id="media_do_spaces_endpoint"
                                   value="<?php echo e(config('filesystems.disks.do_spaces.endpoint')); ?>" placeholder="Ex: https://sfo2.digitaloceanspaces.com">
                        </div>
                        <div class="form-group mb-3">
                            <input type="hidden" name="media_do_spaces_cdn_enabled" value="0">
                            <label>
                                <input type="checkbox"  value="1" <?php if(setting('media_do_spaces_cdn_enabled')): ?> checked <?php endif; ?> name="media_do_spaces_cdn_enabled">
                                <?php echo e(trans('core/setting::setting.media.do_spaces_cdn_enabled')); ?>

                            </label>
                        </div>
                        <div class="form-group mb-3" style="margin-bottom: 1rem;">
                            <label class="text-title-field"
                                   for="media_do_spaces_cdn_custom_domain"><?php echo e(trans('core/setting::setting.media.media_do_spaces_cdn_custom_domain')); ?></label>
                            <input type="text" class="next-input" name="media_do_spaces_cdn_custom_domain" id="media_do_spaces_cdn_custom_domain"
                                   value="<?php echo e(setting('media_do_spaces_cdn_custom_domain')); ?>" placeholder="<?php echo e(trans('core/setting::setting.media.media_do_spaces_cdn_custom_domain_placeholder')); ?>">
                        </div>
                    </div>

                    <div data-type="wasabi" class="setting-wrapper <?php if(setting('media_driver', config('filesystems.default')) !== 'wasabi'): ?> hidden <?php endif; ?>">
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_wasabi_access_key_id"><?php echo e(trans('core/setting::setting.media.wasabi_access_key_id')); ?></label>
                            <input type="text" class="next-input" name="media_wasabi_access_key_id" id="media_wasabi_access_key_id"
                                   value="<?php echo e(config('filesystems.disks.wasabi.key')); ?>" placeholder="Ex: AKIAIKYXBSNBXXXXXX">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_wasabi_secret_key"><?php echo e(trans('core/setting::setting.media.wasabi_secret_key')); ?></label>
                            <input type="text" class="next-input" name="media_wasabi_secret_key" id="media_wasabi_secret_key"
                                   value="<?php echo e(config('filesystems.disks.wasabi.secret')); ?>" placeholder="Ex: +fivlGCeTJCVVnzpM2WfzzrFIMLHGhxxxxxxx">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_wasabi_default_region"><?php echo e(trans('core/setting::setting.media.wasabi_default_region')); ?></label>
                            <input type="text" class="next-input" name="media_wasabi_default_region" id="media_wasabi_default_region"
                                   value="<?php echo e(config('filesystems.disks.wasabi.region')); ?>" placeholder="Ex: us-east-1">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_wasabi_bucket"><?php echo e(trans('core/setting::setting.media.wasabi_bucket')); ?></label>
                            <input type="text" class="next-input" name="media_wasabi_bucket" id="media_wasabi_bucket"
                                   value="<?php echo e(config('filesystems.disks.wasabi.bucket')); ?>" placeholder="Ex: botble">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_wasabi_root"><?php echo e(trans('core/setting::setting.media.wasabi_root')); ?></label>
                            <input type="text" class="next-input" name="media_wasabi_root" id="media_wasabi_root"
                                   value="<?php echo e(config('filesystems.disks.wasabi.root')); ?>" placeholder="Default: /">
                        </div>
                    </div>

                    <div data-type="bunnycdn" class="setting-wrapper <?php if(setting('media_driver', config('filesystems.default')) !== 'bunnycdn'): ?> hidden <?php endif; ?>">
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_bunnycdn_hostname"><?php echo e(trans('core/setting::setting.media.bunnycdn_hostname')); ?></label>
                            <input type="text" class="next-input" name="media_bunnycdn_hostname" id="media_bunnycdn_hostname"
                                   value="<?php echo e(setting('media_bunnycdn_hostname')); ?>" placeholder="Ex: botble.b-cdn.net">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_bunnycdn_zone"><?php echo e(trans('core/setting::setting.media.bunnycdn_zone')); ?></label>
                            <input type="text" class="next-input" name="media_bunnycdn_zone" id="media_bunnycdn_zone"
                                   value="<?php echo e(setting('media_bunnycdn_zone')); ?>" placeholder="Ex: botble">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_bunnycdn_key"><?php echo e(trans('core/setting::setting.media.bunnycdn_key')); ?></label>
                            <input type="text" class="next-input" name="media_bunnycdn_key" id="media_bunnycdn_key"
                                   value="<?php echo e(setting('media_bunnycdn_key')); ?>" placeholder="Ex: 9a734df7-844b-...">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_bunnycdn_region"><?php echo e(trans('core/setting::setting.media.bunnycdn_region')); ?></label>
                            <div class="ui-select-wrapper">
                                <select name="media_bunnycdn_region" class="ui-select">
                                    <option value="" <?php if(setting('media_bunnycdn_region') === ''): ?> selected <?php endif; ?>>Falkenstein</option>
                                    <option value="ny" <?php if(setting('media_bunnycdn_region') === 'ny'): ?> selected <?php endif; ?>>New York</option>
                                    <option value="la" <?php if(setting('media_bunnycdn_region') === 'la'): ?> selected <?php endif; ?>>Los Angeles</option>
                                    <option value="sg" <?php if(setting('media_bunnycdn_region') === 'sg'): ?> selected <?php endif; ?>>Singapore</option>
                                    <option value="syd" <?php if(setting('media_bunnycdn_region') === 'syd'): ?> selected <?php endif; ?>>Sydney</option>
                                </select>
                                <svg class="svg-next-icon svg-next-icon-size-16">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="text-title-field"
                               for="media_turn_off_automatic_url_translation_into_latin"><?php echo e(trans('core/setting::setting.media.turn_off_automatic_url_translation_into_latin')); ?>

                        </label>
                        <label class="me-2">
                            <input type="radio" name="media_turn_off_automatic_url_translation_into_latin"
                                   value="1"
                                   <?php if(RvMedia::turnOffAutomaticUrlTranslationIntoLatin()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                        </label>
                        <label>
                            <input type="radio" name="media_turn_off_automatic_url_translation_into_latin"
                                   value="0"
                                   <?php if(!RvMedia::turnOffAutomaticUrlTranslationIntoLatin()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                        </label>
                    </div>

                    <div class="form-group mb-3">
                        <label class="text-title-field"
                               for="media_default_placeholder_image"><?php echo e(trans('core/setting::setting.media.default_placeholder_image')); ?>

                        </label>
                        <?php echo Form::mediaImage('media_default_placeholder_image', setting('media_default_placeholder_image')); ?>

                    </div>

                    <div class="form-group mb-3">
                        <label class="text-title-field"
                               for="max_upload_filesize"><?php echo e(trans('core/setting::setting.media.max_upload_filesize')); ?></label>
                        <input type="number" class="next-input" name="max_upload_filesize" id="max_upload_filesize" step="0.01"
                               value="<?php echo e(setting('max_upload_filesize')); ?>" placeholder="<?php echo e(trans('core/setting::setting.media.max_upload_filesize_placeholder', ['size' => $maxSize = BaseHelper::humanFilesize(RvMedia::getServerConfigMaxUploadFileSize())])); ?>">
                        <?php echo e(Form::helper(trans('core/setting::setting.media.max_upload_filesize_helper', ['size' => $maxSize]))); ?>

                    </div>

                    <div class="form-group mb-3">
                        <label class="text-title-field"
                               for="media_chunk_enabled"><?php echo e(trans('core/setting::setting.media.enable_chunk')); ?>

                        </label>
                        <label class="me-2">
                            <input type="radio" name="media_chunk_enabled" class="setting-selection-option" data-target="#media-chunk-settings"
                                   value="1"
                                   <?php if(RvMedia::isChunkUploadEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                        </label>
                        <label>
                            <input type="radio" name="media_chunk_enabled" class="setting-selection-option" data-target="#media-chunk-settings"
                                   value="0"
                                   <?php if(!RvMedia::isChunkUploadEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                        </label>

                        <?php echo e(Form::helper(trans('core/setting::setting.enable_chunk_description'))); ?>

                    </div>

                    <div id="media-chunk-settings" class="mb-4 border rounded-top rounded-bottom p-3 bg-light <?php if(!RvMedia::isChunkUploadEnabled()): ?> d-none <?php endif; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="text-title-field"
                                           for="media_chunk_size"><?php echo e(trans('core/setting::setting.media.chunk_size')); ?></label>
                                    <input type="number" class="next-input" name="media_chunk_size" id="media_chunk_size"
                                           value="<?php echo e(setting('media_chunk_size', RvMedia::getConfig('chunk.chunk_size'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.media.chunk_size_placeholder')); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="text-title-field"
                                           for="media_max_file_size"><?php echo e(trans('core/setting::setting.media.max_file_size')); ?></label>
                                    <input type="number" class="next-input" name="media_max_file_size" id="media_max_file_size"
                                           value="<?php echo e(setting('media_max_file_size', RvMedia::getConfig('chunk.max_file_size'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.media.max_file_size_placeholder')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="text-title-field"
                               for="media_watermark_enabled"><?php echo e(trans('core/setting::setting.media.enable_watermark')); ?>

                        </label>
                        <label class="me-2">
                            <input type="radio" name="media_watermark_enabled" class="setting-selection-option" data-target="#media-watermark-settings"
                                   value="1"
                                   <?php if(setting('media_watermark_enabled', RvMedia::getConfig('watermark.enabled'))): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                        </label>
                        <label>
                            <input type="radio" name="media_watermark_enabled" class="setting-selection-option" data-target="#media-watermark-settings"
                                   value="0"
                                   <?php if(!setting('media_watermark_enabled', RvMedia::getConfig('watermark.enabled'))): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                        </label>
                    </div>

                    <div id="media-watermark-settings" class="mb-4 border rounded-top rounded-bottom p-3 bg-light <?php if(!setting('media_watermark_enabled', RvMedia::getConfig('watermark.enabled'))): ?> d-none <?php endif; ?>">
                        <div class="mb-3">
                            <?php echo e(Form::helper(trans('core/setting::setting.watermark_description'))); ?>

                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_folders_can_add_watermark"><?php echo e(trans('core/setting::setting.media.media_folders_can_add_watermark')); ?>

                            </label>
                            <label><input type="checkbox" class="check-all" data-set=".media-folder"><?php echo e(trans('core/setting::setting.media.all')); ?></label>
                            <div class="form-group form-group-no-margin">
                                <div class="multi-choices-widget list-item-checkbox">
                                    <ul>
                                        <?php $folderIds = json_decode(setting('media_folders_can_add_watermark'), true); ?>
                                        <?php $__currentLoopData = app(\Botble\Media\Repositories\Interfaces\MediaFolderInterface::class)->pluck('name', 'id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <input type="checkbox"
                                                       class="styled media-folder"
                                                       name="media_folders_can_add_watermark[]"
                                                       value="<?php echo e($key); ?>"
                                                       id="media-folder-item-<?php echo e($key); ?>"
                                                       <?php if(empty($folderIds) || in_array($key, $folderIds)): ?> checked="checked" <?php endif; ?>>
                                                <label for="media-folder-item-<?php echo e($key); ?>"><?php echo e($item); ?></label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="media_watermark_source"><?php echo e(trans('core/setting::setting.media.watermark_source')); ?>

                            </label>
                            <?php echo Form::mediaImage('media_watermark_source', setting('media_watermark_source')); ?>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="text-title-field"
                                           for="media_watermark_size"><?php echo e(trans('core/setting::setting.media.watermark_size')); ?></label>
                                    <input type="number" class="next-input" name="media_watermark_size" id="media_watermark_size"
                                           value="<?php echo e(setting('media_watermark_size', RvMedia::getConfig('watermark.size'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.media.watermark_size_placeholder')); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="text-title-field"
                                           for="watermark_opacity"><?php echo e(trans('core/setting::setting.media.watermark_opacity')); ?></label>
                                    <input type="number" class="next-input" name="watermark_opacity" id="watermark_opacity"
                                           value="<?php echo e(setting('watermark_opacity', RvMedia::getConfig('watermark.opacity'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.media.watermark_opacity_placeholder')); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label class="text-title-field" for="media_watermark_position"><?php echo e(trans('core/setting::setting.media.watermark_position')); ?></label>
                                    <div class="ui-select-wrapper">
                                        <select name="media_watermark_position" class="ui-select" id="media_watermark_position">
                                            <option value="top-left" <?php if(setting('media_watermark_position', RvMedia::getConfig('watermark.position')) == 'top-left' ): ?> selected <?php endif; ?>><?php echo e(trans('core/setting::setting.media.watermark_position_top_left')); ?></option>
                                            <option value="top-right" <?php if(setting('media_watermark_position', RvMedia::getConfig('watermark.position')) == 'top-right' ): ?> selected <?php endif; ?>><?php echo e(trans('core/setting::setting.media.watermark_position_top_right')); ?></option>
                                            <option value="bottom-left" <?php if(setting('media_watermark_position', RvMedia::getConfig('watermark.position')) == 'bottom-left' ): ?> selected <?php endif; ?>><?php echo e(trans('core/setting::setting.media.watermark_position_bottom_left')); ?></option>
                                            <option value="bottom-right" <?php if(setting('media_watermark_position', RvMedia::getConfig('watermark.position')) == 'bottom-right' ): ?> selected <?php endif; ?>><?php echo e(trans('core/setting::setting.media.watermark_position_bottom_right')); ?></option>
                                            <option value="center" <?php if(setting('media_watermark_position', RvMedia::getConfig('watermark.position')) == 'center' ): ?> selected <?php endif; ?>><?php echo e(trans('core/setting::setting.media.watermark_position_center')); ?></option>
                                        </select>
                                        <svg class="svg-next-icon svg-next-icon-size-16">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label class="text-title-field"
                                           for="watermark_position_x"><?php echo e(trans('core/setting::setting.media.watermark_position_x')); ?></label>
                                    <input type="number" class="next-input" name="watermark_position_x" id="watermark_position_x"
                                           value="<?php echo e(setting('watermark_position_x', RvMedia::getConfig('watermark.x'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.media.watermark_position_x')); ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label class="text-title-field"
                                           for="watermark_position_y"><?php echo e(trans('core/setting::setting.media.watermark_position_y')); ?></label>
                                    <input type="number" class="next-input" name="watermark_position_y" id="watermark_position_y"
                                           value="<?php echo e(setting('watermark_position_y', RvMedia::getConfig('watermark.y'))); ?>" placeholder="<?php echo e(trans('core/setting::setting.media.watermark_position_y')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="text-title-field"
                               for="media_image_processing_library"><?php echo e(trans('core/setting::setting.media.image_processing_library')); ?>

                        </label>
                        <label class="me-2">
                            <input type="radio" name="media_image_processing_library" value="gd"
                                <?php if(RvMedia::getImageProcessingLibrary() == 'gd'): echo 'checked'; endif; ?>>GD Library
                        </label>
                        <?php if(extension_loaded('imagick')): ?>
                            <label>
                                <input type="radio" name="media_image_processing_library" value="imagick"
                                    <?php if(RvMedia::getImageProcessingLibrary() == 'imagick'): echo 'checked'; endif; ?>>Imagick
                            </label>
                        <?php endif; ?>
                    </div>

                    <hr>

                    <div>
                        <h5 class="mb-3"><?php echo e(trans('core/setting::setting.media.sizes')); ?>:</h5>
                        <?php $__currentLoopData = RvMedia::getSizes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $sizeExploded = explode('x', $size); ?>
                            <?php if(count($sizeExploded) > 0): ?>
                                <div class="form-group mb-3">
                                    <label class="text-title-field"><?php echo e(str_replace('-', ' ', Str::title(Str::slug($name)))); ?> <small>(<?php echo e(trans('core/setting::setting.media.default_size_value', ['size' => RvMedia::getConfig('sizes.' . $name)])); ?>)</small></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="next-input--stylized">
                                                <span class="next-input-add-on next-input__add-on--before"><?php echo e(trans('core/setting::setting.media.width')); ?>:</span>
                                                <input type="number" class="next-input next-input--invisible" name="media_sizes_<?php echo e($name); ?>_width"
                                                       value="<?php echo e(setting('media_sizes_' . $name . '_width', $sizeExploded[0])); ?>" placeholder="0">
                                                <span class="next-input-add-on next-input__add-on--after">px</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="next-input--stylized">
                                                <span class="next-input-add-on next-input__add-on--before"><?php echo e(trans('core/setting::setting.media.height')); ?>:</span>
                                                <input type="number" class="next-input next-input--invisible" name="media_sizes_<?php echo e($name); ?>_height"
                                                       value="<?php echo e(setting('media_sizes_' . $name . '_height', $sizeExploded[1])); ?>" placeholder="0">
                                                <span class="next-input-add-on next-input__add-on--after">px</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e(Form::helper(trans('core/setting::setting.media.media_sizes_helper'))); ?>

                    </div>

                </div>
            </div>

        </div>

        <div class="flexbox-annotated-section" style="border: none">
            <div class="flexbox-annotated-section-annotation">
                &nbsp;
            </div>
            <div class="flexbox-annotated-section-content">
                <button class="btn btn-info" type="submit"><?php echo e(trans('core/setting::setting.save_settings')); ?></button> &nbsp;
                <button class="btn btn-warning generate-thumbnails-trigger-button" type="button" data-saving="<?php echo e(trans('core/setting::setting.saving')); ?>"><?php echo e(trans('core/setting::setting.generate_thumbnails')); ?></button>
            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>


    <?php echo Form::modalAction('generate-thumbnails-modal', trans('core/setting::setting.generate_thumbnails'), 'warning', trans('core/setting::setting.generate_thumbnails_description'), 'generate-thumbnails-button', trans('core/setting::setting.generate')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/core/setting/resources/views/media.blade.php ENDPATH**/ ?>