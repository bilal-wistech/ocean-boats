<?php
    $sorts = EcommerceHelper::getSortParams();
    $sortBy = request()->input('sort-by', 'default_sorting');
?>

    <div class="sort-by-cover products_sortby">
        <div class="sort-by-product-wrap">
            <div class="sort-by">
                <span><i class="fa fa-sort-amount-down"></i><?php echo e(__('Sort by:')); ?></span>
            </div>
            <div class="sort-by-dropdown-wrap">
                <span><span><?php echo Arr::get($sorts, $sortBy); ?></span> <i class="far fa-angle-down"></i></span>
            </div>
        </div>
        <div class="sort-by-dropdown products_ajaxsortby" data-name="sort-by">
            <ul>
                <?php $__currentLoopData = $sorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a data-label="<?php echo e($label); ?>"
                        class="<?php if($sortBy == $key): ?> active <?php endif; ?>"
                        href="<?php echo e(request()->fullUrlWithQuery(['sort-by' => $key])); ?>"><?php echo e($label); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>

<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/includes/sort.blade.php ENDPATH**/ ?>