<?php echo Form::open(['url' => $locator ? route('ecommerce.store-locators.edit.post', $locator->id) : route('ecommerce.store-locators.create')]); ?>

<div class="next-form-section">
    <div class="next-form-grid">
        <div class="next-form-grid-cell">
            <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::store-locator.store_name')); ?></label>
            <input type="text" class="next-input" name="name" placeholder="<?php echo e(trans('plugins/ecommerce::store-locator.store_name')); ?>" value="<?php echo e($locator ? $locator->name : null); ?>">
        </div>
        <div class="next-form-grid-cell">
            <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::store-locator.phone')); ?></label>
            <input type="text" class="next-input" name="phone" placeholder="<?php echo e(trans('plugins/ecommerce::store-locator.phone')); ?>" value="<?php echo e($locator ? $locator->phone : null); ?>">
        </div>
    </div>
    <div class="next-form-grid">
        <div class="next-form-grid-cell">
            <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::store-locator.email')); ?></label>
            <input type="text" class="next-input" name="email" placeholder="<?php echo e(trans('plugins/ecommerce::store-locator.email')); ?>" value="<?php echo e($locator ? $locator->email : null); ?>">
        </div>
    </div>
    <div class="next-form-grid">
        <div class="next-form-grid-cell">
            <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::store-locator.address')); ?></label>
            <input type="text" class="next-input" name="address" placeholder="<?php echo e(trans('plugins/ecommerce::store-locator.address')); ?>" value="<?php echo e($locator ? $locator->address : null); ?>">
        </div>
    </div>
    <div class="next-form-grid">
        <div class="next-form-grid-cell">
            <label class="text-title-field" for="store_country"><?php echo e(trans('plugins/ecommerce::store-locator.country')); ?></label>
            <div class="ui-select-wrapper">
                <select name="country" class="ui-select" id="store_country" data-type="country">
                    <?php $__currentLoopData = EcommerceHelper::getAvailableCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryCode => $countryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($countryCode); ?>" <?php if(($locator ? $locator->country : null) == $countryCode): ?> selected <?php endif; ?>><?php echo e($countryName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <svg class="svg-next-icon svg-next-icon-size-16">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                </svg>
            </div>
        </div>
    </div>
    <div class="next-form-grid">
        <div class="next-form-grid-cell">
            <label class="text-title-field" for="store_state"><?php echo e(trans('plugins/ecommerce::store-locator.state')); ?></label>
            <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                <div class="ui-select-wrapper">
                    <select name="state" class="ui-select" id="store_state" data-type="state" data-url="<?php echo e(route('ajax.states-by-country')); ?>">
                        <option value=""><?php echo e(__('Select state...')); ?></option>
                        <?php if($locator ? $locator->country : null || !EcommerceHelper::isUsingInMultipleCountries()): ?>
                            <?php $__currentLoopData = EcommerceHelper::getAvailableStatesByCountry($locator ? $locator->country : null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stateId => $stateName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($stateId); ?>" <?php if(($locator ? $locator->state : null) == $stateId): ?> selected <?php endif; ?>><?php echo e($stateName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <svg class="svg-next-icon svg-next-icon-size-16">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                    </svg>
                </div>
            <?php else: ?>
                <input type="text" class="next-input" name="state" id="store_state" value="<?php echo e($locator ? $locator->state : null); ?>">
            <?php endif; ?>
        </div>
        <div class="next-form-grid-cell">
            <label class="text-title-field" for="store_city"><?php echo e(trans('plugins/ecommerce::store-locator.city')); ?></label>
            <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                <div class="ui-select-wrapper">
                    <select name="city" class="ui-select" id="store_city" data-type="city" data-url="<?php echo e(route('ajax.cities-by-state')); ?>">
                        <option value=""><?php echo e(__('Select city...')); ?></option>
                        <?php if($locator ? $locator->state : null): ?>
                            <?php $__currentLoopData = EcommerceHelper::getAvailableCitiesByState($locator ? $locator->state : null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityId => $cityName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cityId); ?>" <?php if(($locator ? $locator->city : null) == $cityId): ?> selected <?php endif; ?>><?php echo e($cityName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <svg class="svg-next-icon svg-next-icon-size-16">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                    </svg>
                </div>
            <?php else: ?>
                <input type="text" class="next-input" name="city" id="store_city" value="<?php echo e($locator ? $locator->city : null); ?>">
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="next-label">

            <input type="checkbox" value="1" name="is_shipping_location" <?php if(!$locator || $locator->is_shipping_location): ?> checked <?php endif; ?>>

            <?php echo e(trans('plugins/ecommerce::store-locator.store_name')); ?>?
        </label>
    </div>
</div>
<?php echo Form::close(); ?>

<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/settings/store-locator-item.blade.php ENDPATH**/ ?>