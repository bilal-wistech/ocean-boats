<?php echo $__env->make('core/table::partials.modal-item', [
    'type' => 'danger',
    'name' => 'modal-confirm-delete',
    'title' => trans('core/base::tables.confirm_delete'),
    'content' => trans('core/base::tables.confirm_delete_msg'),
    'action_name' => trans('core/base::tables.delete'),
    'action_button_attributes' => [
        'class' => 'delete-crud-entry',
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('core/table::partials.modal-item', [
    'type' => 'danger',
    'name' => 'delete-many-modal',
    'title' => trans('core/base::tables.confirm_delete'),
    'content' => trans('core/base::tables.confirm_delete_many_msg'),
    'action_name' => trans('core/base::tables.delete'),
    'action_button_attributes' => [
        'class' => 'delete-many-entry-button',
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('core/table::partials.modal-item', [
    'type' => 'info',
    'name' => 'modal-bulk-change-items',
    'title' => trans('core/base::tables.bulk_changes'),
    'content' => '<div class="modal-bulk-change-content"></div>',
    'action_name' => trans('core/base::tables.submit'),
    'action_button_attributes' => [
        'class' => 'confirm-bulk-change-button',
        'data-load-url' => route('tables.bulk-change.data'),
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/core/table/resources/views/modal.blade.php ENDPATH**/ ?>