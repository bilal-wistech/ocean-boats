<?php $__env->startSection('content'); ?>
    <?php
        $categories = $form->getFormOption('categories', collect());
        $canCreate = $form->getFormOption('canCreate');
        $canEdit = $form->getFormOption('canEdit');
        $canDelete = $form->getFormOption('canDelete');
        $indexRoute = $form->getFormOption('indexRoute');
        $createRoute = $form->getFormOption('createRoute');
        $editRoute = $form->getFormOption('editRoute');
        $deleteRoute = $form->getFormOption('deleteRoute');
    ?>
    <div class="row">
        <div class="col-12">
            <div class="my-2 text-end">
                <?php do_action(BASE_ACTION_META_BOXES, 'head', $form->getModel()) ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card tree-categories-container position-relative">
                <div class="tree-loading">
                    <?php echo $__env->make('core/base::elements.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tree-categories-body card-body">
                    <div class="mb-3 d-flex">
                        <button class="btn btn-primary toggle-tree"
                            type="button"
                            data-expand="<?php echo e(trans('core/base::forms.expand_all')); ?>"
                            data-collapse="<?php echo e(trans('core/base::forms.collapse_all')); ?>">
                            <?php echo e(trans('core/base::forms.collapse_all')); ?>

                        </button>
                        <?php if($createRoute): ?>
                            <a class="tree-categories-create btn btn-info mx-2
                                <?php if(!$canCreate): ?> d-none  <?php endif; ?>"
                                href="<?php echo e(route($createRoute)); ?>">
                                <?php echo $__env->make('core/table::partials.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="file-tree-wrapper" data-url="<?php echo e($indexRoute ? route($indexRoute) : ''); ?>">
                        <?php echo $__env->make('core/base::forms.partials.tree-categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card tree-form-container position-relative">
                <div class="tree-loading d-none">
                    <?php echo $__env->make('core/base::elements.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tree-form-body card-body">
                    <?php echo $__env->make('core/base::forms.form-no-wrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
    <?php echo $__env->make('core/table::modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/forms/form-tree-category.blade.php ENDPATH**/ ?>