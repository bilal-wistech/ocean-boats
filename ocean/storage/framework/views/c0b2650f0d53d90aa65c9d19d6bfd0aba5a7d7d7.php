<div class="card">
    <div class="card-header">
        <h5><?php echo e($title); ?></h5>
    </div>
    <div class="card-body">
        <?php echo Form::open(['route' => $route]); ?>

            <div class="form-group">
                <label for="name" class="required"><?php echo e(__('Full Name')); ?>:</label>
                <input id="name"
                    type="text"
                    class="form-control square"
                    name="name"
                    value="<?php echo e(old('name', $address->id ? $address->name : auth('customer')->user()->name)); ?>"
                    placeholder="<?php echo e(__('Enter your full name')); ?>"
                    required>
                <?php echo Form::error('name', $errors); ?>

            </div>

            <div class="form-group">
                <label for="email"><?php echo e(__('Email')); ?>:</label>
                <input id="email"
                    type="email"
                    class="form-control square"
                    name="email"
                    value="<?php echo e(old('email', $address->id ? $address->email : auth('customer')->user()->email)); ?>"
                    placeholder="your-email@domain.com">
                <?php echo Form::error('email', $errors); ?>

            </div>

            <div class="form-group">
                <label for="phone" class="required"><?php echo e(__('Phone')); ?>:</label>
                <input id="phone"
                    type="text"
                    class="form-control square"
                    name="phone"
                    value="<?php echo e(old('phone', $address->id ? $address->phone : auth('customer')->user()->phone)); ?>"
                    placeholder="0123456789"
                    required>
                <?php echo Form::error('phone', $errors); ?>

            </div>

            <?php if(EcommerceHelper::isUsingInMultipleCountries()): ?>
                <div class="form-group <?php if($errors->has('country')): ?> has-error <?php endif; ?>">
                    <label for="country" class="required"><?php echo e(__('Country')); ?>:</label>
                    <select name="country" required class="form-control square" id="country" data-type="country">
                        <?php $__currentLoopData = ['' => __('Select country...')] + EcommerceHelper::getAvailableCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryCode => $countryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($countryCode); ?>" <?php if(old('country', $address->country) == $countryCode): ?> selected <?php endif; ?>><?php echo e($countryName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php echo Form::error('country', $errors); ?>

                </div>
            <?php else: ?>
                <input type="hidden" name="country" value="<?php echo e(EcommerceHelper::getFirstCountryId()); ?>">
            <?php endif; ?>

            <div class="form-group <?php if($errors->has('state')): ?> has-error <?php endif; ?>">
                <label for="state" class="required"><?php echo e(__('State')); ?>:</label>
                <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                    <select name="state" class="form-control" id="state" data-type="state" data-placeholder="<?php echo e(__('Select state...')); ?>" data-url="<?php echo e(route('ajax.states-by-country')); ?>">
                        <option value=""><?php echo e(__('Select state...')); ?></option>
                        <?php if(old('country', $address->country) || !EcommerceHelper::isUsingInMultipleCountries()): ?>
                            <?php $__currentLoopData = EcommerceHelper::getAvailableStatesByCountry(old('country', $address->country)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stateId => $stateName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($stateId); ?>" <?php if(old('state', $address->state) == $stateId): ?> selected <?php endif; ?>><?php echo e($stateName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                <?php else: ?>
                    <input id="state"
                        type="text"
                        class="form-control square"
                        name="state"
                        value="<?php echo e(old('state', $address->state)); ?>"
                        required
                        placeholder="<?php echo e(__('Enter your state')); ?>">
                <?php endif; ?>
                <?php echo Form::error('state', $errors); ?>

            </div>

            <div class="form-group <?php if($errors->has('city')): ?> has-error <?php endif; ?>">
                <label for="city" class="required"><?php echo e(__('City')); ?>:</label>
                <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                    <select name="city" class="form-control" id="city" data-type="city" data-placeholder="<?php echo e(__('Select city...')); ?>" data-url="<?php echo e(route('ajax.cities-by-state')); ?>">
                        <option value=""><?php echo e(__('Select city...')); ?></option>
                        <?php if(old('state', $address->state)): ?>
                            <?php $__currentLoopData = EcommerceHelper::getAvailableCitiesByState(old('state', $address->state)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityId => $cityName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cityId); ?>" <?php if(old('city', $address->city) == $cityId): ?> selected <?php endif; ?>><?php echo e($cityName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                <?php else: ?>
                    <input id="city"
                        type="text"
                        class="form-control square"
                        name="city"
                        value="<?php echo e(old('city', $address->city)); ?>"
                        required
                        placeholder="<?php echo e(__('Enter your city')); ?>">
                <?php endif; ?>
                <?php echo Form::error('city', $errors); ?>

            </div>

            <div class="form-group">
                <label for="address" class="required"><?php echo e(__('Address')); ?>:</label>
                <input id="address"
                    type="text"
                    class="form-control square"
                    name="address"
                    value="<?php echo e(old('address', $address->address)); ?>"
                    required
                    placeholder="<?php echo e(__('Enter your address')); ?>">
                <?php echo Form::error('address', $errors); ?>

            </div>

            <?php if(EcommerceHelper::isZipCodeEnabled()): ?>
                <div class="form-group">
                    <label for="zip_code" class="required"><?php echo e(__('Zip code')); ?>:</label>
                    <input id="zip_code"
                        type="text"
                        class="form-control"
                        name="zip_code"
                        value="<?php echo e(old('zip_code', $address->zip_code)); ?>"
                        required
                        placeholder="<?php echo e(__('Enter your zip code')); ?>">
                    <?php echo Form::error('zip_code', $errors); ?>

                </div>
            <?php endif; ?>

            <div class="form-group">
                <div class="custome-checkbox">
                    <input class="form-check-input"
                        <?php if(old('is_default', $address->is_default)): ?> checked <?php endif; ?>
                        type="checkbox"
                        name="is_default"
                        value="1"
                        id="is_default">
                    <label for="is_default" class="form-check-label">
                        <span><?php echo e(__('Use this address as default.')); ?></span>
                    </label>
                </div>
                <?php echo Form::error('is_default', $errors); ?>

            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-fill-out submit"><?php echo e($button); ?></button>
            </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/address/form.blade.php ENDPATH**/ ?>