<?php if(is_plugin_active('blog')): ?>
    <?php
        $posts = get_recent_posts($config['number_display']);
    ?>
    <?php if($posts->count()): ?>
        <div class="sidebar-widget widget_alitheme_lastpost mb-50">
            <div class="widget-header position-relative mb-20 pb-10">
                <h5 class="widget-title"><?php echo e($config['name']); ?></h5>
            </div>
            <div class="row">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                            <a href="<?php echo e($post->url); ?>">
                                <img src="<?php echo e(RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($post->name); ?>">
                            </a>
                        </div>
                        <div class="post-content media-body">
                            <a href="<?php echo e($post->url); ?>"><h6 class="post-title mb-10 text-limit-2-row"><?php echo e($post->name); ?></h6></a>
                            <div class="entry-meta meta-1 font-xxs color-grey">
                                <span class="post-on has-dot"><?php echo e($post->created_at->translatedFormat('M d, Y')); ?></span>
                                <span class="hit-count has-dot"><?php echo e(__(':count Views', ['count' => number_format($post->views)])); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/////widgets/recent-posts/templates/frontend.blade.php ENDPATH**/ ?>