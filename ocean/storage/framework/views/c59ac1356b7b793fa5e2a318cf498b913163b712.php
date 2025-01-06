<?php
$reviews=\Botble\Ecommerce\Models\Review::where('show_on_page',1)->get();
?>
<section class="mt-50 pb-50">
    <div class="mt-50">
        <ul class="testimonial-wrapper row d-flex justify-content-center">
            <div class="row">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="col-lg-6 col-12">
                    <div class="testimonial-content">

                        <div class="spacing">
                            <div class="quote">
                                <i class='fas fa-quote-left fa-flip-vertical fa-3x'></i>
                            </div>
                            <p class="text2 text-left"><?php echo e($review->comment); ?></p>
                        </div>
                        <div class="user-info d-flex">
                            <!-- <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dXNlciUyMHByb2ZpbGV8ZW58MHx8MHx8&w=1000&q=80"
                                class="user-image"> -->
                            <img src="<?php echo e(RvMedia::getImageUrl($review->user->avatar, 'thumb')); ?>" alt="<?php echo e($review->user->name); ?>" class="user-image">
                            <div class="detail-info">
                                <p class="name"><?php echo e($review->user->name); ?></p>
                                <p class="occupation">Our Customer</p>
                            </div>
                        </div>

                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>

        </ul>

    </div>


</section><?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/shortcodes/reviews-testimonials.blade.php ENDPATH**/ ?>