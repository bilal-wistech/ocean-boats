<div class="sidebar-widget widget_search mb-50">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title"><?php echo e($config['name']); ?></h5>
    </div>
    <div class="search-form">
        <form action="<?php echo e(route('public.search')); ?>" method="GET">
            <input type="text" name="q" value="<?php echo e(BaseHelper::stringify(request()->query('q'))); ?>" placeholder="<?php echo e(__('Search...')); ?>">
            <button type="submit"> <i class="far fa-search"></i> </button>
        </form>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/////widgets/blog-search/templates/frontend.blade.php ENDPATH**/ ?>