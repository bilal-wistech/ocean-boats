<?php ($revenues = fn (string $key): array => collect($count['revenues'])->pluck($key)->toArray()); ?>

<div class="mx-0 bg-white row report-chart-content pt-3 mb-3" id="report-chart">
    <div class="row">
        <div class="col-md-8 mb-2">
            <div class="rp-card rp-card-sale-report">
                <div class="rp-card-header">
                    <h5><?php echo e(trans('plugins/ecommerce::reports.sales_reports')); ?></h5>
                </div>

                <div class="rp-card__content">
                    <div id="sales-report-chart"></div>
                    <?php if($earningSales = $salesReport['earningSales']): ?>
                        <div class="row">
                            <div class="col-12">
                                <ul>
                                    <?php $__currentLoopData = $earningSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earningSale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <i class="fas fa-circle" style="color: <?php echo e($earningSale['color']); ?>"></i>
                                            <?php echo e($earningSale['text']); ?>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="rp-card rp-card-earning">
                <div class="rp-card-header">
                    <h5><?php echo e(trans('plugins/ecommerce::reports.earnings')); ?></h5>
                </div>
                <div class="rp-card-content">
                    <?php if(collect($count['revenues'])->count()): ?>
                        <div class="rp-card-chart position-relative mb-3">
                            <div id="revenue-chart"></div>
                            <div class="rp-card-information">
                                <i class="fas fa-wallet"></i>
                                <?php $__currentLoopData = collect($count['revenues'])->where('status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <strong><?php echo e(format_price($item['value'])); ?></strong>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <small><?php echo e(trans('plugins/ecommerce::reports.total_earnings')); ?></small>
                            </div>
                        </div>
                        <div class="rp-card-status text-center">
                            <?php $__currentLoopData = $count['revenues']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p>
                                    <small>
                                        <i class="fas fa-circle mr-2" style="color: <?php echo e(Arr::get($item, 'color')); ?>"></i>
                                    </small>
                                    <strong><?php echo e(format_price($item['value'])); ?></strong>
                                    <span><?php echo e($item['label']); ?></span>
                                </p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div>
                            <?php echo $__env->make('core/dashboard::partials.no-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(request()->ajax()): ?>
    <?php echo $__env->make('plugins/ecommerce::reports.widgets.chart-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php $__env->startPush('footer'); ?>
        <?php echo $__env->make('plugins/ecommerce::reports.widgets.chart-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/reports/widgets/revenues.blade.php ENDPATH**/ ?>