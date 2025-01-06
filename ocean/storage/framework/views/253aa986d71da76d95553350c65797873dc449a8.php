<div class="flexbox-annotated-section">

    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2><?php echo e(trans($data['name'])); ?></h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note"><?php echo e(trans($data['description'])); ?></p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="table-wrap">
                <table class="table product-list ws-nm">
                    <thead>
                    <tr>
                        <th class="border-none-b"><?php echo e(trans('core/setting::setting.template')); ?></th>
                        <th class="border-none-b"> <?php echo e(trans('core/setting::setting.description')); ?> </th>
                        <?php if($type !== 'core'): ?>
                            <th class="border-none-b text-center"> <?php echo e(trans('core/setting::setting.enable')); ?></th>
                        <?php else: ?>
                            <th>&nbsp;</th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data['templates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a class="hover-underline a-detail-template"
                                   href="<?php echo e(route('setting.email.template.edit', [$type, $module, $key])); ?>">
                                    <?php echo e(trans($template['title'])); ?>

                                </a>
                            </td>
                            <td><?php echo e(trans($template['description'])); ?></td>

                            <td class="text-center template-setting-on-off">
                                <?php if($type !== 'core' && Arr::get($template, 'can_off', false)): ?>
                                    <div class="form-group mb-3">
                                        <?php echo Form::onOff(get_setting_email_status_key($type, $module, $key),
                                            get_setting_email_status($type, $module, $key) == 1,
                                            ['data-key' => 'email-config-status-btn', 'data-change-url' => route('setting.email.status.change')]
                                        ); ?>

                                    </div>
                                <?php elseif($type !== 'core'): ?>
                                    <div class="form-group mb-3">
                                        <?php echo Form::onOff(get_setting_email_status_key($type, $module, $key), 1,
                                            ['disabled' => true, 'readonly' => true]
                                        ); ?>

                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/core/setting/resources/views/template-line.blade.php ENDPATH**/ ?>