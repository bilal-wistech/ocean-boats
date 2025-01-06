<div class="tab-pane" id="tab_history">
    <div class="form-group mb-3" style="min-height: 400px;">
        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th><?php echo e(trans('core/base::tables.author')); ?></th>
                    <th><?php echo e(trans('core/base::tables.column')); ?></th>
                    <th><?php echo e(trans('core/base::tables.origin')); ?></th>
                    <th><?php echo e(trans('core/base::tables.after_change')); ?></th>
                    <th><?php echo e(trans('core/base::tables.created_at')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if($model->revisionHistory !== null && count($model->revisionHistory)>0): ?>
                    <?php $__currentLoopData = $model->revisionHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="min-width: 145px;"><?php echo e($history->userResponsible() ? $history->userResponsible()->name : 'N/A'); ?></td>
                            <td style="min-width: 145px;"><?php echo e($history->fieldName()); ?></td>
                            <td><?php echo e($history->oldValue()); ?></td>
                            <td><span class="html-diff-content" data-original="<?php echo e($history->oldValue()); ?>"><?php echo e($history->newValue()); ?></span></td>
                            <td style="min-width: 145px;"><?php echo e(BaseHelper::formatDateTime($history->created_at)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr class="text-center">
                        <td colspan="5"><?php echo e(trans('core/base::tables.no_record')); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/packages/revision/resources/views/history-content.blade.php ENDPATH**/ ?>