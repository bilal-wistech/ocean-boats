<?php
    $shows = EcommerceHelper::getShowParams();
    $showing = (int)request()->input('num', (int)theme_option('number_of_products_per_page', 12));
?>


<div class="sort-by-cover mr-10 products_sortby">
        <div class="sort-by-product-wrap">
            <div class="sort-by">
                <span><i class="fa fa-th"></i><?php echo e(__('Show:')); ?></span>
            </div>
            <div class="sort-by-dropdown-wrap">
                <span> <?php echo Arr::get($shows, $showing, (int)theme_option('number_of_products_per_page', 12)); ?> <i class="far fa-angle-down"></i></span>
            </div>
        </div>
        <div class="sort-by-dropdown products_ajaxsortby" data-name="num">
            <ul>
                <?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a data-label="<?php echo e($label); ?>"
                            class="<?php if($showing == $key): ?> active <?php endif; ?>"
                            href="<?php echo e(request()->fullUrlWithQuery(['num' => $key])); ?>"><?php echo e($label); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/includes/gridsize.blade.php ENDPATH**/ ?>