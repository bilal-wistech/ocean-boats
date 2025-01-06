<ul <?php echo $options; ?>>
    <?php $menu_nodes->loadMissing('metadata'); ?>
    <?php $__currentLoopData = $menu_nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="<?php echo e($row->css_class); ?>">
            <a href="<?php echo e(url($row->url)); ?>" <?php if($row->active): ?> class="active" <?php endif; ?> target="<?php echo e($row->target); ?>">
                <?php if($iconImage = $row->getMetadata('icon_image', true)): ?>
                    <img src="<?php echo e(RvMedia::getImageUrl($iconImage)); ?>" alt="icon image" width="14" height="14" style="vertical-align: middle; margin-top: -2px"/>
                <?php elseif($row->icon_font): ?><i class='<?php echo e(trim($row->icon_font)); ?>'></i> <?php endif; ?><?php echo e($row->title); ?>

                <?php if($row->has_child): ?>
                    <?php if($row->parent_id): ?> <i class="fa fa-chevron-right"></i> <?php else: ?> <i class="fa fa-chevron-down"></i> <?php endif; ?>
                <?php endif; ?>
            </a>
            <?php if($row->has_child): ?>
                <?php echo Menu::generateMenu([
                        'menu'       => $menu,
                        'view'       => 'main-menu',
                        'options'    => ['class' => $row->parent_id ? 'level-menu level-menu-modify' : 'sub-menu'],
                        'menu_nodes' => $row->child,
                    ]); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/main-menu.blade.php ENDPATH**/ ?>