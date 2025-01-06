<?php
    $layout = 'customize-boat';
    Theme::layout($layout);

    Theme::asset()->usePath()->add('jquery-ui-css', 'css/plugins/jquery-ui.css');
    Theme::asset()->container('footer')->usePath()->add('jquery-ui-js', 'js/plugins/jquery-ui.js');
    Theme::asset()->container('footer')->usePath()->add('jquery-ui-touch-punch-js', 'js/plugins/jquery.ui.touch-punch.min.js');

    $categories=PredefinedCategories();

?>

<div class="col-lg-12">
  <ul class="nav nav-pills" id="myTab" role="tablist">
    <!-- desktop -->
    <li class="nav-item d-none d-md-block" role="presentation">
      <a class="boat-category nav-link <?php echo e(request()->input('cat_id') ? '' : 'active'); ?>" id="all-boats-tab" data-bs-toggle="tab" data-value="<?php echo e(request()->fullUrlWithQuery(['cat_id' => 0])); ?>" data-bs-target="#all-boats" type="button" role="tab" aria-controls="all-boats" aria-selected="true">All Boats</a>
    </li>
    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="nav-item d-none d-md-block" role="presentation">
      <button class="boat-category nav-link <?php echo e(request()->input('cat_id')==$value->id ? 'active' : ''); ?>" id="<?php echo e('tab-' . $value->id); ?>" data-bs-toggle="tab" data-value="<?php echo e(request()->fullUrlWithQuery(['cat_id' => $value->id])); ?>" data-bs-target="<?php echo e('#tabContent-' . $value->id); ?>" type="button" role="tab" aria-controls="<?php echo e('tabContent-' . $value->id); ?>" aria-selected="false"><?php echo e($value->name); ?></button>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
    <!-- mobile -->
<!-- mobile -->
<li class="nav-item d-md-none w-100">
  <div class="dropdown mobile">
    <button class="btn boat dropdown-toggle w-100" type="button" id="mobileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      All Boats
    </button>
    <ul class="dropdown-menu w-100 text-center" aria-labelledby="mobileDropdown">
      <li class="nav-item">
        <button class="boat-category dropdown-item active" id="all-boats-mobile" data-value="<?php echo e(request()->fullUrlWithQuery(['cat_id' =>0])); ?>" data-bs-toggle="tab" data-bs-target="#all-boats" type="button" role="tab" aria-controls="all-boats" aria-selected="true">All Boats</button>
      </li>
      <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <li class="nav-item">
        <button class="boat-category dropdown-item" id="<?php echo e('tab-' . $value->id); ?>-mobile" data-value="<?php echo e(request()->fullUrlWithQuery(['cat_id' => $value->id])); ?>" data-bs-toggle="tab" data-bs-target="<?php echo e('#tabContent-' . $value->id); ?>" type="button" role="tab" aria-controls="<?php echo e('tabContent-' . $value->id); ?>" aria-selected="false"><?php echo e($value->name); ?></button>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <?php endif; ?>
    </ul>
  </div>
</li>


  </ul>
</div>

<input type="hidden" name="cat_id" value="<?php echo e(request()->input('cat_id')); ?>">

<div class="products-listing position-relative mt-70">
  <?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.includes.boat-items', compact('products'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/boats.blade.php ENDPATH**/ ?>