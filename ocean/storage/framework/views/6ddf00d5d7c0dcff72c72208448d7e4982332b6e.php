<div class="ui-select-wrapper">
    <?php
        Arr::set($selectAttributes, 'class', Arr::get($selectAttributes, 'class') . ' ui-select');
    ?>
    <select name="<?php echo e($name); ?>" class='form-select select2_google_fonts_picker'>
        <?php
            $field['options'] = config('core.base.general.google_fonts', []);

            $customGoogleFonts = config('core.base.general.custom_google_fonts');

            if ($customGoogleFonts) {
                $field['options'] = array_merge($field['options'], explode(',', $customGoogleFonts));
            }
        ?>
        <?php $__currentLoopData = ['' => __('-- Select --')] + array_combine($field['options'], $field['options']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value='<?php echo e($key); ?>' <?php if($key == $selected): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <svg class="svg-next-icon svg-next-icon-size-16">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
    </svg>
</div>

<?php if (! $__env->hasRenderedOnce('d4900697-d3fd-40cd-8aea-f756406a0aea')): $__env->markAsRenderedOnce('d4900697-d3fd-40cd-8aea-f756406a0aea'); ?>
    <?php $__env->startPush('footer'); ?>
        <link href="<?php echo e(BaseHelper::getGoogleFontsURL()); ?>/css?family=<?php echo e(implode('|', array_map('urlencode', array_filter($field['options'])))); ?>&display=swap" rel="stylesheet" type="text/css">
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php /**PATH /home/oceanboats/public_html/platform/core/base/resources/views/forms/partials/google-fonts.blade.php ENDPATH**/ ?>