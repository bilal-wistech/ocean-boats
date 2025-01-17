<?php $__env->startSection('content'); ?>
    <?php if($showStart): ?>
        <?php echo Form::open(Arr::except($formOptions, ['template'])); ?>

    <?php endif; ?>

    <?php
        do_action(BASE_ACTION_TOP_FORM_CONTENT_NOTIFICATION, request(), $form->getModel())
    ?>
    <div class="row">
        <div class="col-md-9">
            <?php if($showFields && $form->hasMainFields()): ?>
                <div class="main-form">
                    <div class="<?php echo e($form->getWrapperClass()); ?>">
                        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field->getName() == $form->getBreakFieldPoint()): ?>
                                <?php break; ?>
                            <?php else: ?>
                                <?php unset($fields[$key]); ?>
                            <?php endif; ?>
                            <?php if(!in_array($field->getName(), $exclude)): ?>
                                <?php echo $field->render(); ?>

                                <?php if(defined('BASE_FILTER_SLUG_AREA') && $field->getName() == SlugHelper::getColumnNameToGenerateSlug($form->getModel())): ?>
                                    <?php echo apply_filters(BASE_FILTER_SLUG_AREA, null, $form->getModel()); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php $__currentLoopData = $form->getMetaBoxes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $metaBox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $form->getMetaBox($key); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php do_action(BASE_ACTION_META_BOXES, 'advanced', $form->getModel()) ?>
        </div>
        <div class="col-md-3 right-sidebar">
            <?php echo $form->getActionButtons(); ?>

            <?php do_action(BASE_ACTION_META_BOXES, 'top', $form->getModel()) ?>

            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!in_array($field->getName(), $exclude)): ?>
                    <?php if($field->getType() == 'hidden'): ?>
                        <?php echo $field->render(); ?>

                    <?php else: ?>
                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4><?php echo Form::customLabel($field->getName(), $field->getOption('label'), $field->getOption('label_attr')); ?></h4>
                            </div>
                            <div class="widget-body">
                                <?php echo $field->render([], in_array($field->getType(), ['radio', 'checkbox'])); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php do_action(BASE_ACTION_META_BOXES, 'side', $form->getModel()) ?>
        </div>
    </div>

    <?php if($showEnd): ?>
        <?php echo Form::close(); ?>

    <?php endif; ?>

    <?php echo $__env->yieldContent('form_end'); ?>
<?php $__env->stopSection(); ?>

<?php if($form->getValidatorClass()): ?>
    <?php if($form->isUseInlineJs()): ?>
        <?php echo Assets::scriptToHtml('jquery'); ?>

        <?php echo Assets::scriptToHtml('form-validation'); ?>

        <?php echo $form->renderValidatorJs(); ?>

    <?php else: ?>
        <?php $__env->startPush('footer'); ?>
            <?php echo $form->renderValidatorJs(); ?>

        <?php $__env->stopPush(); ?>
    <?php endif; ?>
<?php endif; ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/forms/form.blade.php ENDPATH**/ ?>