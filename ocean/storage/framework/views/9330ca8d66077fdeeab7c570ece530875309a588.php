
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><?php echo e(__('Saved Boat details')); ?></h5>
    </div>
    <div class="card-body">
        <div class="customer-order-detail">
            <div class="row">
                <div class="col-auto me-auto">
                    <div class="order-slogan">
                        <?php
                            $logo = theme_option('logo_in_the_checkout_page') ?: theme_option('logo');
                        ?>
                        <?php if($logo): ?>
                            <img width="100" src="<?php echo e(RvMedia::getImageUrl($logo)); ?>"
                                 alt="<?php echo e(theme_option('site_title')); ?>">
                            <br/>
                        <?php endif; ?>
                        <?php echo e(setting('contact_address')); ?>

                    </div>
                </div>
                <div class="col-auto">
                    <div class="order-meta">
                        <span class="d-inline-block"><?php echo e(__('Time')); ?>:</span>
                        <strong class="order-detail-value"><?php echo e($boat->created_at->format('h:m d/m/Y')); ?></strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 border-top pt-2">
                    <h4><?php echo e(__('Boat information')); ?></h4>
                    <div>
                        <div>
                            <span class="d-inline-block"><?php echo e(__('Boat Name')); ?>:</span>
                            <strong class="order-detail-value"><?php echo e($boat->boat->ltitle); ?></strong>
                        </div>
                        <div>
                            <span class="d-inline-block"><?php echo e(__('Boat Price')); ?>:</span>
                            <strong class="order-detail-value"> <?php echo e(format_price($boat->boat->price)); ?> </strong>
                        </div>
                    </div>

                    <h4 class="mt-3 mb-1"><?php echo e(__('Final Image')); ?></h4>
                    <div class="row">
                        <div id="carouselExampleControls" class="custom-boat carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($value->enquiry_option->image[1])): ?>
                                <div style="position:absolute;"  >
                                    <img src="<?php echo e(RvMedia::getImageUrl($value->enquiry_option->image[1], '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="" style="z-index:0">
                                <img src="<?php echo e(RvMedia::getImageUrl($boat->boat->image[1] ?? $boat->boat->image, '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
                            </div>
                            </div>

                            <div class="carousel-item">
                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($value->enquiry_option->image[2])): ?>
                                <div style="position:absolute;"  >
                                    <img src="<?php echo e(RvMedia::getImageUrl($value->enquiry_option->image[2], '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="" style="z-index:0">
                                <img src="<?php echo e(RvMedia::getImageUrl($boat->boat->image[2] ?? $boat->boat->image, '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
                            </div>
                            </div>

                            <div class="carousel-item">
                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($value->enquiry_option->image[3])): ?>
                                <div style="position:absolute;"  >
                                    <img src="<?php echo e(RvMedia::getImageUrl($value->enquiry_option->image[3], '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="" style="z-index:0">
                                <img src="<?php echo e(RvMedia::getImageUrl($boat->boat->image[3] ?? $boat->boat->image, '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
                            </div>
                            </div>

                            <?php if(isset($boat->boat->image[4])): ?>
                            <div class="carousel-item">
                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($value->enquiry_option->image[4])): ?>
                                <div style="position:absolute;"  >
                                    <img src="<?php echo e(RvMedia::getImageUrl($value->enquiry_option->image[4], '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="" style="z-index:0">
                                <img src="<?php echo e(RvMedia::getImageUrl($boat->boat->image[4] ?? $boat->boat->image, '', false, RvMedia::getDefaultImage())); ?>" class="d-block w-100" alt="...">
                            </div>
                            </div>
                            <?php endif; ?>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div>
                    
                    <h4 class="mt-3 mt-50"><?php echo e(__('Options Selected')); ?></h4>
                    <div class="card-body summary-card justify-content-center d-flex flex-row flex-wrap">
                    <?php $__currentLoopData = $boat->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card m-1">
                            <div class="card-body text-center">
                                <p><b><?php echo e($value->slug->ltitle); ?>: </b><?php echo e($value->slug->parent ? $value->slug->parent->ltitle : ''); ?></p>
                                <p><b>Price</b> : <?php echo e(format_price($value->enquiry_option->price)); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="card-body list-style">
                        <h4>Standard Options</h4>
                    <?php echo $boat->boat->detail->standard_options; ?>

                    </div>
                    </div>
                    <h4 class="mt-3 mb-1"><?php echo e(__('Total')); ?></h4>
                    <div>
                        <div>
                            <span class="d-inline-block"><?php echo e(__('Total Price Included Vat')); ?>:</span>
                            <strong class="order-detail-value"><?php echo e(format_price($boat->vat_total)); ?></strong>
                        </div>
                        <?php if($boat->is_finished): ?>
                        <hr/>
                        <div>
                            <span class="d-inline-block"><?php echo e(__('Paid')); ?>:</span>
                            <strong class="order-detail-value"><?php echo e(format_price($boat->paid_amount)); ?></strong>
                        </div>
                        <div>
                            <span class="d-inline-block"><?php echo e(__('Remaining')); ?>:</span>
                            <strong class="order-detail-value"><?php echo e(format_price($boat->vat_total - $boat->paid_amount)); ?></strong>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/saved_boats/view.blade.php ENDPATH**/ ?>