<?php
    $layout = MetaBox::getMetaData($post, 'layout', true);
    $layout = ($layout && in_array($layout, array_keys(get_blog_single_layouts()))) ? $layout : 'blog-right-sidebar';
    Theme::layout($layout);
?>

<div class="single-page">
    <div class="single-header style-2">
        <h1 class="mb-30"><?php echo e($post->name); ?></h1>
        <div class="single-header-meta">
            <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                <span class="post-by"><?php echo e(__('By')); ?> <?php echo e($post->author->name); ?></span>
                <span class="post-on has-dot"><?php echo e($post->created_at->translatedFormat('M d, Y')); ?></span>
                <span class="time-reading has-dot"><?php echo e(__(':count mins read', ['count' => get_time_to_read($post)])); ?></span>
                <span class="hit-count has-dot"><?php echo e(__(':count Views', ['count' => number_format($post->views)])); ?></span>
            </div>
            <div class="social-icons social-icons-colored-hover">
                <ul class="text-grey-5 d-inline-block">
                    <li><strong class="mr-10"><?php echo e(__('Share this')); ?>:</strong></li>
                    <li class="social-facebook">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode($post->url)); ?>" target="_blgiank"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="social-twitter">
                        <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode($post->url)); ?>&text=<?php echo e(strip_tags($post->description)); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="social-linkedin">
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode($post->url)); ?>&summary=<?php echo e(rawurldecode(strip_tags($post->description))); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="single-content">
        <?php echo BaseHelper::clean($post->content); ?>


        <br>
        <?php echo apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' ? Theme::partial('comments') : null); ?>

    </div>
    <div class="entry-bottom mt-50 mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
        <div class="tags w-50 w-sm-100">
            <?php if(!$post->tags->isEmpty()): ?>
                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($tag->url); ?>" rel="tag" class="hover-up btn btn-sm btn-rounded mr-10 mb-10"><?php echo e($tag->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="social-icons social-icons-colored-hover">
            <ul class="text-grey-5 d-inline-block">
                <li><strong class="mr-10"><?php echo e(__('Share this')); ?>:</strong></li>
                <li class="social-facebook">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode($post->url)); ?>" target="_blgiank"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="social-twitter">
                    <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode($post->url)); ?>&text=<?php echo e(strip_tags($post->description)); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="social-linkedin">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode($post->url)); ?>&summary=<?php echo e(rawurldecode(strip_tags($post->description))); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php $relatedPosts = get_related_posts($post->id, 2); ?>
<?php if($relatedPosts->count()): ?>
    <div class="loop-grid pr-30">
        <h4 class="mb-20"><?php echo e(__('Related Articles')); ?></h4>
        <div class="row">
            <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6 col-md-6">
                    <article class="wow fadeIn animated hover-up mb-30">
                        <div class="post-thumb img-hover-scale">
                            <a href="<?php echo e($relatedItem->url); ?>">
                                <img src="<?php echo e(RvMedia::getImageUrl($relatedItem->image, 'medium', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($relatedItem->name); ?>">
                            </a>
                            <?php if($relatedItem->first_category->name): ?>
                                <div class="entry-meta">
                                    <a class="entry-meta meta-2" href="<?php echo e($relatedItem->first_category->url); ?>"><?php echo e($relatedItem->first_category->name); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="entry-content-2">
                            <h3 class="post-title mb-15">
                                <a href="<?php echo e($relatedItem->url); ?>"><?php echo e($relatedItem->name); ?></a></h3>
                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                <div>
                                    <span class="post-on has-dot"> <i class="far fa-clock"></i> <?php echo e($relatedItem->created_at->translatedFormat('M d, Y')); ?></span>
                                    <span class="hit-count has-dot"><?php echo e(__(':count Views', ['count' => number_format($relatedItem->views)])); ?></span>
                                </div>
                                <a href="<?php echo e($relatedItem->url); ?>" class="text-brand"><?php echo e(__('Read more')); ?> <i class="fa fa-arrow-right fw-300 text-brand ml-5"></i></a>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/post.blade.php ENDPATH**/ ?>