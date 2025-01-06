<ul <?php echo $options; ?>>
    <?php $__currentLoopData = $menu_nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="<?php if($row->has_child): ?> menu-item-has-children <?php endif; ?> <?php echo e($row->css_class); ?>">
            <?php if($row->has_child): ?>
                <span class="menu-expand"></span>
            <?php endif; ?>
            <a href="<?php echo e(url($row->url)); ?>" target="<?php echo e($row->target); ?>">
                <?php if($row->icon_font): ?><i class='<?php echo e(trim($row->icon_font)); ?>'></i> <?php endif; ?><?php echo e($row->title); ?>

            </a>
            <?php if($row->has_child): ?>
                <?php echo Menu::generateMenu([
                        'menu'       => $menu,
                        'view'       => 'mobile-menu',
                        'options'    => ['class' => 'dropdown'],
                        'menu_nodes' => $row->child,
                    ]); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/mobile-menu.blade.php ENDPATH**/ ?>