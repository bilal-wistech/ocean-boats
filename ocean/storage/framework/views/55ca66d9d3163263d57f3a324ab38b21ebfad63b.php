<div class="faqs-list">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryIndex => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($categories) > 1): ?>
            <h4><?php echo e($category->name); ?></h4>
        <?php endif; ?>
        <div class="accordion" id="faq-accordion-<?php echo e($categoryIndex); ?>">
            <?php $__currentLoopData = $category->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqIndex => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-header" id="heading-faq-<?php echo e($categoryIndex); ?>-<?php echo e($faqIndex); ?>">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left <?php if(!($categoryIndex == 0 && $faqIndex == 0)): ?> collapsed <?php endif; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-faq-<?php echo e($categoryIndex); ?>-<?php echo e($faqIndex); ?>" aria-expanded="true" aria-controls="collapse-faq-<?php echo e($categoryIndex); ?>-<?php echo e($faqIndex); ?>">
                                <?php echo BaseHelper::clean($faq->question); ?>

                            </button>
                        </h2>
                    </div>

                    <div id="collapse-faq-<?php echo e($categoryIndex); ?>-<?php echo e($faqIndex); ?>" class="collapse <?php if($categoryIndex == 0 && $faqIndex == 0): ?> show <?php endif; ?>" aria-labelledby="heading-faq-<?php echo e($categoryIndex); ?>-<?php echo e($faqIndex); ?>" data-parent="#faq-accordion-<?php echo e($categoryIndex); ?>">
                        <div class="card-body">
                            <?php echo BaseHelper::clean($faq->answer); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/shortcodes/faqs.blade.php ENDPATH**/ ?>