<?php echo Form::open(['url' => route('ecommerce.store-locators.update-primary-store')]); ?>

    <div class="next-form-section">
        <div class="next-form-grid">
            <div class="next-form-grid-cell">
                <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::store-locator.primary_store_is')); ?></label>
                <?php echo Form::customSelect('primary_store_id', $storeLocators->pluck('name', 'id')->all(), ($storeLocators->where('is_primary', true)->first() ? $storeLocators->where('is_primary', true)->first()->id : null), [
                        'class' => 'form-control',
                    ]); ?>

            </div>
        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/settings/store-locator-change-primary.blade.php ENDPATH**/ ?>