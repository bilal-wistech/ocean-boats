<?php
    Theme::asset()->usePath()
                    ->add('custom-scrollbar-css', 'plugins/mcustom-scrollbar/jquery.mCustomScrollbar.css');
    Theme::asset()->container('footer')->usePath()
                ->add('custom-scrollbar-js', 'plugins/mcustom-scrollbar/jquery.mCustomScrollbar.js', ['jquery']);

    $categories = ProductCategoryHelper::getActiveTreeCategories();

    if (Route::currentRouteName() != 'public.products' && request()->input('categories', [])) {
        $categories = $categories->whereIn('id', (array)request()->input('categories', []));
    }
?>

<div class="shop-product-filter-header">
    <div class="row">
        <?php if(count($categories) > 0): ?>
            <div class="col-lg-3 col-md-4 mb-lg-0 mb-md-5 mb-sm-5 widget-filter-item">
                <h5 class="mb-20 widget__title" data-title="<?php echo e(__('Categories')); ?>"><?php echo e(__('By :name', ['name' => __('categories')])); ?></h5>
                <div class="custome-checkbox ps-custom-scrollbar">
                    <?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.includes.filter-product-category', ['categories' => $categories, 'indent' => null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php
            $brands = get_all_brands(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED], [], ['products']);
        ?>
        <?php if(count($brands) > 0): ?>
            <div class="col-lg-3 col-md-4 mb-lg-0 mb-md-5 mb-sm-5 widget-filter-item">
                <h5 class="mb-20 widget__title" data-title="<?php echo e(__('Brand')); ?>"><?php echo e(__('By :name', ['name' => __('Brands')])); ?></h5>
                <div class="custome-checkbox ps-custom-scrollbar">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input class="form-check-input"
                               name="brands[]"
                               type="checkbox"
                               id="brand-filter-<?php echo e($brand->id); ?>"
                               value="<?php echo e($brand->id); ?>"
                               <?php if(in_array($brand->id, request()->input('brands', []))): ?> checked <?php endif; ?>>
                        <label class="form-check-label" for="brand-filter-<?php echo e($brand->id); ?>"><span class="d-inline-block"><?php echo e($brand->name); ?></span> <span class="d-inline-block">(<?php echo e($brand->products_count); ?>)</span> </label>
                        <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php
            $tags = app(\Botble\Ecommerce\Repositories\Interfaces\ProductTagInterface::class)->advancedGet([
                'condition' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED],
                'withCount' => ['products'],
                'order_by'  => ['products_count' => 'desc'],
                'take'      => 20,
            ]);
        ?>
        <?php if(count($tags) > 0): ?>
            <div class="col-lg-3 col-md-4 mb-lg-0 mb-md-5 mb-sm-5 widget-filter-item">
                <h5 class="mb-20 widget__title" data-title="<?php echo e(__('Tag')); ?>"><?php echo e(__('By :name', ['name' => __('tags')])); ?></h5>
                <div class="custome-checkbox">
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input class="form-check-input"
                               name="tags[]"
                               type="checkbox"
                               id="tag-filter-<?php echo e($tag->id); ?>"
                               value="<?php echo e($tag->id); ?>"
                               <?php if(in_array($tag->id, request()->input('tags', []))): ?> checked <?php endif; ?>>
                        <label class="form-check-label" for="tag-filter-<?php echo e($tag->id); ?>"><span class="d-inline-block"><?php echo e($tag->name); ?></span> <span class="d-inline-block">(<?php echo e($tag->products_count); ?>)</span> </label>
                        <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-lg-3 col-md-4 mb-lg-0 mb-md-5 mb-sm-5 widget-filter-item" data-type="price">
            <h5 class="mb-20 widget__title" data-title="<?php echo e(__('Price')); ?>"><?php echo e(__('By :name', ['name' => __('Price')])); ?></h5>
            <div class="price-filter range">
                <div class="price-filter-inner">
                    <div class="slider-range"></div>
                    <input type="hidden"
                        class="min_price min-range"
                        name="min_price"
                        value="<?php echo e(request()->input('min_price', 0)); ?>"
                        data-min="0"
                        data-label="<?php echo e(__('Min price')); ?>"/>
                    <input type="hidden"
                        class="min_price max-range"
                        name="max_price"
                           value="<?php echo e(request()->input('max_price', (int)theme_option('max_filter_price', 100000) * get_current_exchange_rate())); ?>"
                           data-max="<?php echo e((int)theme_option('max_filter_price', 100000) * get_current_exchange_rate()); ?>"
                        data-label="<?php echo e(__('Max price')); ?>"/>
                    <div class="price_slider_amount">
                        <div class="label-input">
                            <span class="d-inline-block"><?php echo e(__('Range:')); ?> </span>
                            <span class="from d-inline-block"></span>
                            <span class="to d-inline-block"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="show-advanced-filters" href="#">
        <span class="title"><?php echo e(__('Advanced filters')); ?></span>
        <i class="far fa-angle-up angle-down"></i>
        <i class="far fa-angle-down angle-up"></i>
    </a>

    <div class="advanced-search-widgets" style="display: none">
        <div class="row">
            <?php echo render_product_swatches_filter([
                'view' => Theme::getThemeNamespace() . '::views.ecommerce.attributes.attributes-filter-renderer'
            ]); ?>

        </div>
    </div>

    <div class="widget">
        <a class="clear_filter dib clear_all_filter" href="<?php echo e(URL::current()); ?>"><?php echo e(__('Clear All Filter')); ?></a>

        <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-filter mr-5 ml-0"></i> <?php echo e(__('Filter')); ?></button>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/includes/filters.blade.php ENDPATH**/ ?>