<?php $__env->startSection('content'); ?>
    <section class="rp-card-report-statics">
        <div class="mb-1 text-end">
            <button
                class="select-date-range-btn date-range-picker"
                data-format-value="<?php echo e(trans('plugins/ecommerce::reports.date_range_format_value', ['from' => '__from__', 'to' => '__to__'])); ?>"
                data-format="<?php echo e(Str::upper(config('core.base.general.date_format.js.date'))); ?>"
                data-href="<?php echo e(route('ecommerce.report.index')); ?>"
                data-start-date="<?php echo e($startDate); ?>"
                data-end-date="<?php echo e($endDate); ?>"
            >
                <i class="fa fa-calendar"></i>
                <span>
                    <span><?php echo e(trans('plugins/ecommerce::reports.date_range_format_value', [
                        'from' => $startDate->format('Y-m-d'),
                        'to'   => $endDate->format('Y-m-d')
                    ])); ?></span>
                </span>
            </button>
        </div>

        <div id="report-stats-content">
            <?php echo $__env->make('plugins/ecommerce::reports.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
    <script>
        var BotbleVariables = BotbleVariables || {};
        BotbleVariables.languages = BotbleVariables.languages || {};
        BotbleVariables.languages.reports = <?php echo json_encode(trans('plugins/ecommerce::reports.ranges'), JSON_HEX_APOS); ?>

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/reports/index.blade.php ENDPATH**/ ?>