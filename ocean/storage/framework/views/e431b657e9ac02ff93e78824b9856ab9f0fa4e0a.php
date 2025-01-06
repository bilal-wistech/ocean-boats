<div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['mb-3', 'col-md-' . $columns => $columns]) ?>">
    <div class="rp-card bg-white h-100">
        <div class="rp-card-header">
            <h5 class="p-2"><?php echo e($label); ?></h5>
        </div>
        <div class="rp-card-content equal-height">
            <?php echo $table; ?>

        </div>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/widgets/table.blade.php ENDPATH**/ ?>