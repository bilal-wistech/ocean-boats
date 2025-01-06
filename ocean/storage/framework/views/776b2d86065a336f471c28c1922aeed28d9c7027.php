<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <span><?php echo BaseHelper::clean($indent); ?></span>
    <input class="form-check-input category-filter-input" data-id="<?php echo e($category->id); ?>" data-parent-id="<?php echo e($category->parent_id); ?>"
           name="categories[]"
           type="checkbox"
           id="category-filter-<?php echo e($category->id); ?>"
           value="<?php echo e($category->id); ?>"
           <?php if(in_array($category->id, request()->input('categories', []))): ?> checked <?php endif; ?>>
    <label class="form-check-label" for="category-filter-<?php echo e($category->id); ?>">
        <span class="d-inline-block"><?php echo e($category->name); ?></span>
    </label>
    <br>

    <?php if($category->activeChildren->count()): ?>
        <?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.includes.filter-product-category', ['categories' => $category->activeChildren, 'indent' => $indent . '&nbsp;&nbsp;'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/includes/filter-product-category.blade.php ENDPATH**/ ?>