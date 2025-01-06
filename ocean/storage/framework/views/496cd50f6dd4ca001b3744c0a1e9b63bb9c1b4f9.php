<div class="customer-address-payment-form">

    <?php if(EcommerceHelper::isEnabledGuestCheckout() && !auth('customer')->check()): ?>
        <div class="form-group mb-3">
            <p><?php echo e(__('Already have an account?')); ?> <a href="<?php echo e(route('customer.login')); ?>"><?php echo e(__('Login')); ?></a></p>
        </div>
    <?php endif; ?>

    <?php if(auth('customer')->check()): ?>
        <?php
            $addresses = get_customer_addresses();
            $isAvailableAddress = !$addresses->isEmpty();
            $sessionAddressId = Arr::get($sessionCheckoutData, 'address_id', $isAvailableAddress ? $addresses->first()->id : null);
        ?>
        <div class="form-group mb-3">

            <?php if($isAvailableAddress): ?>
                <label class="control-label mb-2" for="address_id"><?php echo e(__('Select available addresses')); ?>:</label>
            <?php endif; ?>

            <div class="list-customer-address <?php if(!$isAvailableAddress): ?> d-none <?php endif; ?>">
                <div class="select--arrow">
                    <select name="address[address_id]" class="form-control address-control-item" id="address_id">
                        <option value="new" <?php if(old('address.address_id', $sessionAddressId) == 'new'): ?> selected <?php endif; ?>><?php echo e(__('Add new address...')); ?></option>
                        <?php if($isAvailableAddress): ?>
                            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    value="<?php echo e($address->id); ?>"
                                    <?php if(
                                        ($address->is_default && !$sessionAddressId) ||
                                        ($sessionAddressId == $address->id) ||
                                        (!old('address.address_id', $sessionAddressId) && $loop->first)
                                    ): ?>
                                        selected="selected"
                                    <?php endif; ?>
                                >
                                    <?php echo e($address->address); ?>, <?php echo e($address->city_name); ?>, <?php echo e($address->state_name); ?><?php if(EcommerceHelper::isUsingInMultipleCountries()): ?>, <?php echo e($address->country_name); ?> <?php endif; ?> <?php if(EcommerceHelper::isZipCodeEnabled() && $address->zip_code): ?>, <?php echo e($address->zip_code); ?> <?php endif; ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <i class="fas fa-angle-down"></i>
                </div>
                <br>
                <div class="address-item-selected <?php if($sessionAddressId == 'new'): ?> d-none <?php endif; ?>">
                    <?php if($isAvailableAddress): ?>
                        <?php if($sessionAddressId && $addresses->contains('id', $sessionAddressId)): ?>
                            <?php echo $__env->make('plugins/ecommerce::orders.partials.address-item', ['address' => $addresses->firstWhere('id', $sessionAddressId)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php elseif($defaultAddress = get_default_customer_address()): ?>
                            <?php echo $__env->make('plugins/ecommerce::orders.partials.address-item', ['address' => $defaultAddress], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('plugins/ecommerce::orders.partials.address-item', ['address' => Arr::first($addresses)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="list-available-address d-none">
                    <?php if($isAvailableAddress): ?>
                        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="address-item-wrapper" data-id="<?php echo e($address->id); ?>">
                                <?php echo $__env->make('plugins/ecommerce::orders.partials.address-item', compact('address'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="address-form-wrapper <?php if(auth('customer')->check() && $isAvailableAddress && (!empty($sessionAddressId) && $sessionAddressId !== 'new')): ?> d-none <?php endif; ?>">
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-4 <?php if($errors->has('address.name')): ?> has-error <?php endif; ?>">
                    <input type="text" name="address[name]" id="address_name" placeholder="First Name" class="form-control address-control-item address-control-item-required checkout-input"
                           value="<?php echo e(old('address.name', Arr::get($sessionCheckoutData, 'name'))); ?>">
                    <?php echo Form::error('address.name', $errors); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-4 <?php if($errors->has('address.lname')): ?> has-error <?php endif; ?>">
                    <input type="text" name="address[lname]" id="address_lname" placeholder="Last Name" class="form-control address-control-item address-control-item-required checkout-input"
                           value="<?php echo e(old('address.lname', Arr::get($sessionCheckoutData, 'lname'))); ?>">
                    <?php echo Form::error('address.lname', $errors); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="form-group mb-4 <?php if($errors->has('address.email')): ?> has-error <?php endif; ?>">
                    <input type="text" name="address[email]" id="address_email" placeholder="Email" class="form-control address-control-item address-control-item-required checkout-input" value="<?php echo e(old('address.email', Arr::get($sessionCheckoutData, 'email'))); ?>">
                    <?php echo Form::error('address.email', $errors); ?>

                </div>
            </div>
        </div>

        
        <!-- comment -->
        <!-- <div class="row">
            <div class="col-lg-8 col-12">
                <div class="form-group  <?php if($errors->has('address.email')): ?> has-error <?php endif; ?>">
                    <input type="text" name="address[email]" id="address_email" placeholder="<?php echo e(__('Email')); ?>" class="form-control address-control-item address-control-item-required checkout-input" value="<?php echo e(old('address.email', Arr::get($sessionCheckoutData, 'email'))); ?>">
                    <?php echo Form::error('address.email', $errors); ?>

                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="form-group  <?php if($errors->has('address.phone')): ?> has-error <?php endif; ?>">
                    <?php echo Form::phoneNumber('address[phone]', old('address.phone', Arr::get($sessionCheckoutData, 'phone')), ['id' => 'address_phone', 'class' => 'form-control address-control-item ' . (!EcommerceHelper::isPhoneFieldOptionalAtCheckout() ? 'address-control-item-required' : '') . ' checkout-input']); ?>

                    <?php echo Form::error('address.phone', $errors); ?>

                </div>
            </div>
        </div> -->

        <!-- comment end -->

        <div class="row">
            <?php if(EcommerceHelper::isUsingInMultipleCountries()): ?>
                <div class="col-12">
                    <div class="form-group mb-4 <?php if($errors->has('address.country')): ?> has-error <?php endif; ?>">
                        <div class="select--arrow">
                            <select onchange="phonefield()" name="address[country]" class="form-control address-control-item address-control-item-required" id="address_country" data-type="country">
                                <?php $__currentLoopData = EcommerceHelper::getAvailableCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryCode => $countryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($countryCode); ?>" <?php if(old('address.country', Arr::get($sessionCheckoutData, 'country')) == $countryCode): ?> selected <?php endif; ?>><?php echo e($countryName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <?php echo Form::error('address.country', $errors); ?>

                    </div>
                </div>
            <?php else: ?>
                <input type="hidden" name="address[country]" id="address_country" value="<?php echo e(EcommerceHelper::getFirstCountryId()); ?>">
            <?php endif; ?>
            
           
            <div class="col-12">
            <div class="form-group mb-4 <?php if($errors->has('address.phone')): ?> has-error <?php endif; ?>">
            <input type="text"  style="display:none; width:100%;" name="address[phone]" id="address_phone" placeholder="Phone Number" class="form-control address-control-item address-control-item-required checkout-input" value="<?php echo e(old('address.phone', Arr::get($sessionCheckoutData, 'phone'))); ?>">
                    <?php echo Form::error('address.phone', $errors); ?>

                </div>
            </div>
        
 <!-- comment -->
            <!-- <div class="col-sm-6 col-12">
                <div class="form-group mb-3 <?php if($errors->has('address.state')): ?> has-error <?php endif; ?>">
                    <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                        <div class="select--arrow">
                            <select name="address[state]" class="form-control address-control-item address-control-item-required" id="address_state" data-type="state" data-url="<?php echo e(route('ajax.states-by-country')); ?>">
                                <option value=""><?php echo e(__('Select state...')); ?></option>
                                <?php if(old('address.country', Arr::get($sessionCheckoutData, 'country')) || !EcommerceHelper::isUsingInMultipleCountries()): ?>
                                    <?php $__currentLoopData = EcommerceHelper::getAvailableStatesByCountry(old('address.country', Arr::get($sessionCheckoutData, 'country'))); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stateId => $stateName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($stateId); ?>" <?php if(old('address.state', Arr::get($sessionCheckoutData, 'state')) == $stateId): ?> selected <?php endif; ?>><?php echo e($stateName); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <i class="fas fa-angle-down"></i>
                        </div>
                    <?php else: ?>
                        <input id="address_state" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="<?php echo e(__('State')); ?>" name="address[state]" value="<?php echo e(old('address.state', Arr::get($sessionCheckoutData, 'state'))); ?>">
                    <?php endif; ?>
                    <?php echo Form::error('address.state', $errors); ?>

                </div>
            </div> -->

            <!-- <div class="col-sm-6 col-12">
                <div class="form-group  <?php if($errors->has('address.city')): ?> has-error <?php endif; ?>">
                    <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                        <div class="select--arrow">
                            <select name="address[city]" class="form-control address-control-item address-control-item-required" id="address_city" data-type="city" data-url="<?php echo e(route('ajax.cities-by-state')); ?>">
                                <option value=""><?php echo e(__('Select city...')); ?></option>
                                <?php if(old('address.state', Arr::get($sessionCheckoutData, 'state'))): ?>
                                    <?php $__currentLoopData = EcommerceHelper::getAvailableCitiesByState(old('address.state', Arr::get($sessionCheckoutData, 'state'))); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityId => $cityName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cityId); ?>" <?php if(old('address.city', Arr::get($sessionCheckoutData, 'city')) == $cityId): ?> selected <?php endif; ?>><?php echo e($cityName); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <i class="fas fa-angle-down"></i>
                        </div>
                    <?php else: ?>
                        <input id="address_city" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="<?php echo e(__('City')); ?>" name="address[city]" value="<?php echo e(old('address.city', Arr::get($sessionCheckoutData, 'city'))); ?>">
                    <?php endif; ?>
                    <?php echo Form::error('address.city', $errors); ?>

                </div>
            </div> -->
 <!-- comment end -->
             <div class="col-12">
                <div class="form-group mb-4 <?php if($errors->has('address.area')): ?> has-error <?php endif; ?>">
                    <input id="address_area" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="District or Area" name="address[area]" value="<?php echo e(old('address.area', Arr::get($sessionCheckoutData, 'area'))); ?>">
                    <?php echo Form::error('address.area', $errors); ?>

                </div>
            </div>
            <div class="col-12">
                <div class="form-group mb-4 <?php if($errors->has('address.address')): ?> has-error <?php endif; ?>">
                    <input id="address_address" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="Street Name" name="address[address]" value="<?php echo e(old('address.address', Arr::get($sessionCheckoutData, 'address'))); ?>">
                    <?php echo Form::error('address.address', $errors); ?>

                </div>
            </div>


            <!--<div class="col-12">-->
            <!--    <div class="form-group mb-4 <?php if($errors->has('address.streetname')): ?> has-error <?php endif; ?>">-->
            <!--        <input id="address_streetname" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="Street Name" name="address[streetname]" value="<?php echo e(old('address.streetname', Arr::get($sessionCheckoutData, 'streetname'))); ?>">-->
            <!--        <?php echo Form::error('address.streetname', $errors); ?>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="col-12">
                <div class="form-group mb-4 <?php if($errors->has('address.building')): ?> has-error <?php endif; ?>">
                    <input id="address_building" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="Building or Villa No." name="address[building]" value="<?php echo e(old('address.building', Arr::get($sessionCheckoutData, 'building'))); ?>">
                    <?php echo Form::error('address.building', $errors); ?>

                </div>
            </div>

            <div class="col-12">
                <div class="form-group mb-4 <?php if($errors->has('address.floor')): ?> has-error <?php endif; ?>">
                    <input id="address_floor" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="Floor or Flat No." name="address[floor]" value="<?php echo e(old('address.floor', Arr::get($sessionCheckoutData, 'floor'))); ?>">
                    <?php echo Form::error('address.floor', $errors); ?>

                </div>
            </div>

            <?php if(EcommerceHelper::isZipCodeEnabled()): ?>
                <div class="col-12">
                    <div class="form-group mb-3 <?php if($errors->has('address.zip_code')): ?> has-error <?php endif; ?>">
                        <input id="address_zip_code" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="<?php echo e(__('Zip code')); ?>" name="address[zip_code]" value="<?php echo e(old('address.zip_code', Arr::get($sessionCheckoutData, 'zip_code'))); ?>">
                        <?php echo Form::error('address.zip_code', $errors); ?>

                    </div>
                </div>
            <?php endif; ?>
            <div class="col-12">
            <div class="form-group mb-4 <?php if($errors->has('description')): ?> has-error <?php endif; ?>">
                    <textarea name="description" id="description" rows="3" class="form-control" placeholder="Message&nbsp;(optional)"><?php echo e(old('description')); ?></textarea>
                    <?php echo Form::error('description', $errors); ?>

                </div>
            </div>
        </div>
    </div>

    <?php if(!auth('customer')->check()): ?>
        <div class="form-group mb-3">
            <input type="checkbox" name="create_account" value="1" id="create_account" <?php if(empty($errors) && old('create_account') == 1): ?> checked <?php endif; ?>>
            <label for="create_account" class="control-label" style="padding-left: 5px"><?php echo e(__('Register an account with above information?')); ?></label>
        </div>

        <div class="password-group <?php if(!$errors->has('password') && !$errors->has('password_confirmation')): ?> d-none <?php endif; ?>">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <input id="password" type="password" class="form-control checkout-input" name="password" autocomplete="password" placeholder="<?php echo e(__('Password')); ?>">
                        <?php echo Form::error('password', $errors); ?>

                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                        <input id="password-confirm" type="password" class="form-control checkout-input" autocomplete="password-confirmation" placeholder="<?php echo e(__('Password confirmation')); ?>" name="password_confirmation">
                        <?php echo Form::error('password_confirmation', $errors); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/core/core/base/libraries/intl-tel-input/css/intlTelInput.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('footer'); ?>
    <script src="<?php echo e(asset('vendor/core/core/base/libraries/intl-tel-input/js/intlTelInput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/core/core/base/js/phone-number-field.js')); ?>"></script>
    <script type="text/javascript">
    var iti;
        function phonefield() {
            var x = document.getElementById("address_country").value;
            if (iti) {
                iti.destroy();
            }
            var input = document.querySelector("#address_phone");
            input.style.display = "block";
            iti = window.intlTelInput(input,({
                allowDropdown:false,
                separateDialCode:true,
                initialCountry:x,
            }));
        }
        
    </script>
<?php $__env->stopPush(); ?>
<style>
    .iti--separate-dial-code .iti__selected-flag{
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;

    }
    .iti{
        display: block !important;
    }
</style>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/orders/partials/address-form.blade.php ENDPATH**/ ?>