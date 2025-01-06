<?php $__env->startSection('content'); ?>
    <div class="widget meta-boxes">
        <div class="widget-title">
            <h4>
                <span><i class="fas fa-sync"></i> <?php echo e(trans('core/base::cache.cache_commands')); ?></span>
            </h4>
        </div>
        <div class="widget-body">
            <table class="table table-bordered vertical-middle table-hover">
                <colgroup>
                    <col width="70%">
                    <col width="30%">
                </colgroup>
                <tbody>
                    <tr>
                        <td>
                            <?php echo e(trans('core/base::cache.commands.clear_cms_cache.description')); ?>

                        </td>
                        <td>
                            <button class="btn btn-danger btn-block btn-clear-cache" data-type="clear_cms_cache" data-url="<?php echo e(route('system.cache.clear')); ?>">
                                <?php echo e(trans('core/base::cache.commands.clear_cms_cache.title')); ?>

                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e(trans('core/base::cache.commands.refresh_compiled_views.description')); ?>

                        </td>
                        <td>
                            <button class="btn btn-warning btn-block btn-clear-cache" data-type="refresh_compiled_views" data-url="<?php echo e(route('system.cache.clear')); ?>">
                                <?php echo e(trans('core/base::cache.commands.refresh_compiled_views.title')); ?>

                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e(trans('core/base::cache.commands.clear_config_cache.description')); ?>

                        </td>
                        <td>
                            <button class="btn green-meadow btn-block btn-clear-cache" data-type="clear_config_cache" data-url="<?php echo e(route('system.cache.clear')); ?>">
                                <?php echo e(trans('core/base::cache.commands.clear_config_cache.title')); ?>

                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e(trans('core/base::cache.commands.clear_route_cache.description')); ?>

                        </td>
                        <td>
                            <button class="btn green-meadow btn-block btn-clear-cache" data-type="clear_route_cache" data-url="<?php echo e(route('system.cache.clear')); ?>">
                                <?php echo e(trans('core/base::cache.commands.clear_route_cache.title')); ?>

                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e(trans('core/base::cache.commands.clear_log.description')); ?>

                        </td>
                        <td>
                            <button class="btn green-meadow btn-block btn-clear-cache" data-type="clear_log" data-url="<?php echo e(route('system.cache.clear')); ?>">
                                <?php echo e(trans('core/base::cache.commands.clear_log.title')); ?>

                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/system/cache.blade.php ENDPATH**/ ?>