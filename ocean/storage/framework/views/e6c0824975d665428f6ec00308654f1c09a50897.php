<?php
    $layout = 'customize-boat';
    Theme::layout($layout);

    Theme::asset()->usePath()->add('jquery-ui-css', 'css/plugins/jquery-ui.css');
    Theme::asset()->container('footer')->usePath()->add('jquery-ui-js', 'js/plugins/jquery-ui.js');
    Theme::asset()->container('footer')->usePath()->add('jquery-ui-touch-punch-js', 'js/plugins/jquery.ui.touch-punch.min.js');

    $categories=$product->childitems();
?>

<div class="row" id="custom-boat-container">
  <div class="col-lg-8 col-12">
      <ul class="row customboat-nav">
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="col cat-item cat-<?php echo e($value->type); ?> <?php echo e($key==0 ? 'selected' : ''); ?>">
          <a class="customboat-nav-link " data-value="<?php echo e($value->type); ?>"><?php echo e($value->ltitle); ?></a>
        </li> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
        <li class="col cat-item cat-summary">
          <a class="customboat-nav-link" data-value="<?php echo e($product->id); ?>" data-type="summary">Summary</a>
        </li>
      </ul>
      <div class="row">
        <div id="carouselExampleControls" class="custom-boat carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <?php $__currentLoopData = $product->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $category->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($category->multi_select == 1): ?>
              <?php $__currentLoopData = $value->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div style="position:absolute;" class="cat-<?php echo e($option->id); ?>-img1"  >
                <img src="<?php echo e(RvMedia::getImageUrl('transparent-pic-150x150.png', '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <div style="position:absolute;" class="cat-<?php echo e($value->id); ?>-img1"  >
                <img src="<?php echo e(RvMedia::getImageUrl('transparent-pic-150x150.png', '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="" style="z-index:0">
                 <img src="<?php echo e(RvMedia::getImageUrl($product->image[1] ?? $product->image, '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
            </div>

            <div class="carousel-item">
              <?php $__currentLoopData = $product->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $category->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($category->multi_select == 1): ?>
              <?php $__currentLoopData = $value->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div style="position:absolute;" class="cat-<?php echo e($option->id); ?>-img2"  >
                <img src="<?php echo e(RvMedia::getImageUrl('transparent-pic-150x150.png', '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <div style="position:absolute;" class="cat-<?php echo e($value->id); ?>-img2"  >
                <img src="<?php echo e(RvMedia::getImageUrl('transparent-pic-150x150.png', '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="" style="z-index:0">
                <img src="<?php echo e(RvMedia::getImageUrl($product->image[2] ?? $product->image, '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
            </div>

            <div class="carousel-item">
              <?php $__currentLoopData = $product->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $category->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($category->multi_select == 1): ?>
              <?php $__currentLoopData = $value->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div style="position:absolute;" class="cat-<?php echo e($option->id); ?>-img3"  >
                <img src="<?php echo e(RvMedia::getImageUrl('transparent-pic-150x150.png', '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <div style="position:absolute;" class="cat-<?php echo e($value->id); ?>-img3"  >
                <img src="<?php echo e(RvMedia::getImageUrl('transparent-pic-150x150.png', '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="" style="z-index:0">
                <img src="<?php echo e(RvMedia::getImageUrl($product->image[3] ?? $product->image, '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
            </div>

            <?php if(isset($product->image[4])): ?>
            <div class="carousel-item">
              <?php $__currentLoopData = $product->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $category->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($category->multi_select == 1): ?>
              <?php $__currentLoopData = $value->childitems_sorted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div style="position:absolute;" class="cat-<?php echo e($option->id); ?>-img4"  >
                <img src="<?php echo e(RvMedia::getImageUrl('transparent-pic-150x150.png', '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <div style="position:absolute;" class="cat-<?php echo e($value->id); ?>-img4"  >
                <img src="<?php echo e(RvMedia::getImageUrl('transparent-pic-150x150.png', '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="" style="z-index:0">
                <img src="<?php echo e(RvMedia::getImageUrl($product->image[4] ?? $product->image, '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
              </div>
            </div>
            <?php endif; ?>

          </div>
          <button style="left: 40% !important; top: 100% !important;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button style="left: 50% !important; top: 100% !important;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
      </div>
    </div>

    <input type="hidden" name="boat_price" value="<?php echo e($product->price); ?>" > 

  </div>

  <div class="col-lg-4 col-12">
    <form id="submit-form" action="<?php echo e(route('public.customize-boat.submit')); ?>" method="post">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="boat_id" value="<?php echo e($product->id); ?>" > 
      <input type="hidden" name="total_price" value="0" > 
      <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <?php
      $i=$key+1;
      ?>
        <div class="customboat-card card-category card-<?php echo e($value->type); ?> <?php echo e($key>0 ? 'd-none' : ''); ?>">
            <div class="customboat-card-header">
                <h4 class="category cat-title"><?php echo e($i); ?>. Choose your <?php echo e($value->ltitle); ?></h4>
            </div>
            <div class="customboat-card-body cat-body">
                <?php $__empty_2 = true; $__currentLoopData = $value->childitems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                  <div class="col btn options-boat dropdown-toggle mt-5 mb-15" data-bs-toggle="collapse" href="#collapse<?php echo e($key1); ?>" aria-expanded="<?php echo e($key1==0 ? 'true': 'false'); ?>">
                    <div class="title"><?php echo e($value1->ltitle); ?></div>
                  </div>
                  <div class="collapse <?php echo e($key1==0 ? 'show': ''); ?>" id="collapse<?php echo e($key1); ?>">
                    <?php $__empty_3 = true; $__currentLoopData = $value1->childitems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
                    <?php if($option->side_layout=='radio'): ?>
                      <input class="form-check-input visually-hidden cat-item-check" type="<?php echo e($value->multi_select == 1 ? 'checkbox' : 'radio'); ?>" id="<?php echo e($option->id); ?>" value="<?php echo e($option->id); ?>" data-typename="<?php echo e($value1->ltitle); ?>" data-type="<?php echo e($value->multi_select == 2 ? $value->type : $value1->type); ?>" name="<?php echo e($value->multi_select == 2 ? 'option['.$value->type.']' : 'option['.$value1->type.']'); ?>" data-parent="<?php echo e($option->parent_id); ?>" data-waschecked="false">
                      <label class="form-check-label color-box" for="<?php echo e($option->id); ?>" style="background-image: url(<?php echo e(RvMedia::getImageUrl($option->main_image)); ?>);">
                      <div class="tick-icon"> <img src="<?php echo e(asset('/storage/check_circle.png')); ?>"></div>
                      <div class="color-name"><?php echo e($option->ltitle); ?></div>
                     </label>
                    
                    <?php elseif($option->side_layout=='toggle'): ?>
                    <div class="form-check">
                      <input class="form-check-input cat-item-check" name="<?php echo e($value->multi_select == 2 ? 'option['.$value->type.']' : 'option['.$value1->type.']'); ?>" type="<?php echo e($value->multi_select == 1 ? 'checkbox' : 'radio'); ?>" value="<?php echo e($option->id); ?>" data-typename="<?php echo e($value1->ltitle); ?>" data-type="<?php echo e($value->multi_select == 2 ? $value->type : $value1->type); ?>" data-parent="<?php echo e($option->parent_id); ?>" data-waschecked="false" id="collapse-<?php echo e($option->id); ?>">
                      <label class="form-check-label" for="collapse-<?php echo e($value->id); ?>">
                        <div data-bs-toggle="<?php echo e($option->main_image? 'collapse' : ''); ?>" data-bs-target="#color-details-<?php echo e($option->id); ?>" aria-expanded="false" aria-controls="color-details-<?php echo e($option->id); ?>" class="tog <?php echo e($option->main_image? 'dropdown-toggle' : ''); ?>">
                          <?php echo e($option->ltitle); ?>  (<?php echo e(format_price($option->price)); ?>)
                        </div>
                      </label>
                      <div class="collapse" id="color-details-<?php echo e($option->id); ?>">
                        <div class="content-boat">
                        <!--<p><?php echo e($option->preview_enabled ? '' : '(Nothing to preview)'); ?></p>-->
                        <img class="img-fluid img-thumbnail landscape" src="<?php echo e(RvMedia::getImageUrl($option->main_image)); ?>">
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>
                    <?php endif; ?>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                <?php endif; ?>
                <p class="text-center" style="font-size:16px"><b>Sub Total</b>: <span class="sub-total"><?php echo e(format_price($product->price)); ?></span></p>
                <p class="text-center" style="font-size:16px"><b>VAT 5%</b>: <span class="vat-price"><?php echo e(format_price(($product->price * 5)/100)); ?></span></p>
                <p class="text-center mb-10" style="font-size:16px"><b>Total</b>: <span class="vat-total"><?php echo e(format_price($product->price + (($product->price * 5)/100))); ?></span></p>
            </div>
            <div class="customboat-card-footer d-flex justify-content-between flex-row">
              <?php if(isset($categories[$key+1])): ?>
                <?php if($key>0): ?>
                  <button class="btn card-btn prv" data-curval="<?php echo e($categories[$key]->type); ?>" data-value="<?php echo e($categories[$key-1]->type); ?>" type="button">Back</button>
                <?php endif; ?>
                <button class="btn card-btn" type="button" data-curval="<?php echo e($categories[$key]->type); ?>" data-value="<?php echo e(isset($categories[$key+1]) ? $categories[$key+1]->type : ''); ?>">Next Step</button>
              <?php else: ?>
                <button class="btn card-btn prv" data-curval="<?php echo e($categories[$key]->type); ?>" data-value="<?php echo e(isset($categories[$key-1]) ? $categories[$key-1]->type : ''); ?>" type="button">Back</button>
                <button class="btn card-btn" data-curval="<?php echo e($categories[$key]->type); ?>" data-value="summary" type="button">Next Step</button>
              <?php endif; ?>
            </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <?php endif; ?>
      <div class="customboat-card card-category card-summary mb-5 d-none">
        <div class="customboat-card-header">
            <h4 class="category cat-title"><?php echo e($i+1); ?>. Final Step</h4>
        </div>
        <div class="customboat-card-body">
            <div class="form-group">
              <div class="textarea-style">
                <textarea name="message" placeholder="<?php echo e(__('Message')); ?>"></textarea>
              </div>
            </div>
        </div>
        <input type="hidden" name="redirect_url_pay" value="0">
        <div class="mt-10 customboat-card-footer d-flex flex-row flex-wrap">
          <button type="button" class="btn card-btn prv" data-curval="summary" data-value="<?php echo e(lastitem($product->id)->type); ?>">Back</button>
          <button type="submit" class="btn card-btn" style="border-radius: unset;" >Save & Exit</button>
          <button type="button" class="btn view-summary">View Your Summary</button>
          <button type="button" class="btn card-btn submit-btn" style="border-radius: unset;" >Book Boat Now</button>
        </div>
      </div>
    </form>
  </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>For booking confirmation of your Boat, you need to pay <?php echo e(format_price(get_ecommerce_setting('down_payment'))); ?> as a downpayment. This will confirm your booking and our team will get in touch with you further.</p>
        <p class="alert alert-success">Note: All Credit/Debit card and Apple Pay payments are accepted.</p>
      </div>
      <div class="modal-footer">
         <a id="submit-boot" class="btn btn-small d-block" href="#">Proceed to checkout</a>
      </div>
    </div>
  </div>
</div>

<div class="row mt-60" id="summary-end">
  <div class="col-md-8 col-12 m-auto">
    <div style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
    <div class="card card-custom">
      <div class="card-header text-center bg-brand">
        <h4 class="text-white">Summary</h4>
      </div>
      <div class="card-body summary-card justify-content-center d-flex flex-row flex-wrap">
      </div>
      <div class="card-body list-style">
        <h4>Included:</h4>
      <?php echo $product->detail->standard_options; ?>

      </div>
    </div>
    <div class="card-footer">
      <div class="row m-2">
        <div class="col text-end">
          <p><b>Sub Total</b>: <span class="sub-total"><?php echo e(format_price($product->price)); ?></span></p>
          <p><b>VAT 5%</b>: <span class="vat-price"><?php echo e(format_price(($product->price * 5)/100)); ?></span></p>
          <p><b>Total</b>: <span class="vat-total"><?php echo e(format_price($product->price + (($product->price * 5)/100))); ?></span></p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
   




<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/boat.blade.php ENDPATH**/ ?>