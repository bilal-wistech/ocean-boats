<?php if($posts->count() > 0): ?>
    <div class="single-header mb-80">
        <h1 class="font-xxl text-brand"><?php echo e(SeoHelper::getTitle()); ?></h1>

        <div class="entry-meta meta-1 font-xs mt-15 mb-15">
            <span class="post-by has-dot d-inline-block"><?php echo e(__(':count Categories', ['count' => app(\Botble\Blog\Repositories\Interfaces\CategoryInterface::class)->count(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED])])); ?></span>
            <span class="post-on d-inline-block has-dot"><?php echo e(__(':count Articles', ['count' => app(\Botble\Blog\Repositories\Interfaces\PostInterface::class)->count(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED])])); ?></span>
            <span class="hit-count d-inline-block has-dot"><?php echo e(__(':count Views', ['count' => number_format(app(\Botble\Blog\Repositories\Interfaces\PostInterface::class)->getModel()->sum('views'))])); ?></span>
        </div>
    </div>

    <div class="loop-grid pr-30">
        <div class="row">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->first): ?>
                    <div class="col-12">
                        <article class="first-post mb-30 wow fadeIn animated hover-up">
                            <div class="img-hover-slide position-relative overflow-hidden">
                                <span class="top-right-icon bg-dark"><i class="far fa-bookmark"></i></span>
                                <div class="post-thumb img-hover-scale">
                                    <a href="<?php echo e($post->url); ?>">
                                        <img src="<?php echo e(RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($post->name); ?>">
                                    </a>
                                </div>
                            </div>
                            <div class="entry-content">
                                <div class="entry-meta meta-1 mb-30">
                                    <?php if($post->first_category->name): ?>
                                        <a class="entry-meta meta-0" href="<?php echo e($post->first_category->url); ?>">
                                            <span class="post-in background4 text-brand font-xs"><?php echo e($post->first_category->name); ?></span>
                                        </a>
                                    <?php endif; ?>
                                    <div class="font-sm">
                                        <span><span class="mr-10 text-muted"><i class="fa fa-eye" aria-hidden="true"></i></span><?php echo e(number_format($post->views)); ?></span>
                                    </div>
                                </div>
                                <h2 class="post-title mb-20">
                                    <a href="<?php echo e($post->url); ?>"><?php echo e($post->name); ?></a></h2>
                                <p class="post-exerpt font-medium text-muted mb-30"><?php echo e($post->description); ?></p>
                                <div class="mb-20 entry-meta meta-2">
                                    <div class="font-xs ">
                                        <span class="post-by"><?php echo e(__('By')); ?> <?php echo e($post->author->name); ?></span>
                                        <span class="post-on"><?php echo e($post->created_at->translatedFormat('M d, Y')); ?></span>
                                        <span class="time-reading">8 mins read</span>
                                    </div>
                                    <div class="float-right">
                                        <a href="<?php echo e($post->url); ?>" class="read-more"><?php echo e(__('Read more')); ?> <span class="ml-10"><i class="fa fa-arrow-right fw-300 text-brand ml-5" aria-hidden="true"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php else: ?>
                    <div class="col-lg-6">
                        <article class="wow fadeIn animated hover-up mb-30">
                            <div class="post-thumb img-hover-scale">
                                <a href="<?php echo e($post->url); ?>">
                                    <img src="<?php echo e(RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($post->name); ?>">
                                </a>
                                <?php if($post->first_category->name): ?>
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2" href="<?php echo e($post->first_category->url); ?>"><?php echo e($post->first_category->name); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="entry-content-2">
                                <h3 class="post-title mb-15">
                                    <a href="<?php echo e($post->url); ?>"><?php echo e($post->name); ?></a></h3>
                                <p class="post-exerpt mb-30"><?php echo e($post->description); ?></p>
                                <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                    <div>
                                        <span class="post-on has-dot"> <i class="far fa-clock"></i> <?php echo e($post->created_at->translatedFormat('M d, Y')); ?></span>
                                        <span class="hit-count has-dot"><?php echo e(__(':count Views', ['count' => number_format($post->views)])); ?></span>
                                    </div>
                                    <a href="<?php echo e($post->url); ?>" class="text-brand"><?php echo e(__('Read more')); ?> <i class="fa fa-arrow-right fw-300 text-brand ml-5"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <?php echo $posts->withQueryString()->links(Theme::getThemeNamespace() . '::partials.custom-pagination'); ?>

<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/templates/posts.blade.php ENDPATH**/ ?>