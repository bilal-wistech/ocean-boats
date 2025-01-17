<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['url' => route('ecommerce.advanced-settings'), 'class' => 'main-setting-form']); ?>

        <div class="max-width-1200">

            <div class="flexbox-annotated-section">
                <div class="flexbox-annotated-section-annotation">
                    <div class="annotated-section-title pd-all-20">
                        <h2><?php echo e(trans('plugins/ecommerce::ecommerce.advanced_settings')); ?></h2>
                    </div>
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <p class="color-note"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.other_settings_description')); ?></p>
                    </div>
                </div>
                <div class="flexbox-annotated-section-content">
                    <div class="wrapper-content pd-all-20">
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="shopping_cart_enabled"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_cart')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="shopping_cart_enabled"
                                       value="1"
                                       <?php if(EcommerceHelper::isCartEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="shopping_cart_enabled"
                                       value="0"
                                       <?php if(!EcommerceHelper::isCartEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="wishlist_enabled"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_wishlist')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="wishlist_enabled"
                                       value="1"
                                       <?php if(EcommerceHelper::isWishlistEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="wishlist_enabled"
                                       value="0"
                                       <?php if(!EcommerceHelper::isWishlistEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="compare_enabled"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_compare')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="compare_enabled"
                                       value="1"
                                       <?php if(EcommerceHelper::isCompareEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="compare_enabled"
                                       value="0"
                                       <?php if(!EcommerceHelper::isCompareEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="ecommerce_tax_enabled"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_tax')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="ecommerce_tax_enabled"
                                       value="1"
                                       <?php if(EcommerceHelper::isTaxEnabled()): ?> checked <?php endif; ?> class="trigger-input-option" data-setting-container="#tax-settings"><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="ecommerce_tax_enabled"
                                       value="0"
                                       <?php if(!EcommerceHelper::isTaxEnabled()): ?> checked <?php endif; ?> class="trigger-input-option" data-setting-container="#tax-settings"><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div id="tax-settings" class="mb-4 border rounded-top rounded-bottom p-3 bg-light <?php if(!EcommerceHelper::isTaxEnabled()): ?> d-none <?php endif; ?>">
                            <div class="form-group mb-3">
                                <label class="text-title-field" for="default_tax_rate"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.default_tax_rate')); ?></label>
                                <?php echo Form::customSelect('default_tax_rate', [0 => trans('plugins/ecommerce::tax.select_tax')] + app(\Botble\Ecommerce\Repositories\Interfaces\TaxInterface::class)->pluck('title', 'id'), get_ecommerce_setting('default_tax_rate')); ?>

                                <span class="help-ts"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.default_tax_rate_description')); ?></span>
                            </div>

                            <div class="form-group mb-3">
                                <label class="text-title-field"
                                       for="display_product_price_including_taxes"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.display_product_price_including_taxes')); ?>

                                </label>
                                <label class="me-2">
                                    <input type="radio" name="display_product_price_including_taxes"
                                           value="1"
                                           <?php if(EcommerceHelper::isDisplayProductIncludingTaxes()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                                </label>
                                <label>
                                    <input type="radio" name="display_product_price_including_taxes"
                                           value="0"
                                           <?php if(!EcommerceHelper::isDisplayProductIncludingTaxes()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="order_tracking_enabled"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_order_tracking')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="order_tracking_enabled"
                                       value="1"
                                       <?php if(EcommerceHelper::isOrderTrackingEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="order_tracking_enabled"
                                       value="0"
                                       <?php if(!EcommerceHelper::isOrderTrackingEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="order_auto_confirmed"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_order_auto_confirmed')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="order_auto_confirmed"
                                       value="1"
                                       <?php if(EcommerceHelper::isOrderAutoConfirmedEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="order_auto_confirmed"
                                       value="0"
                                       <?php if(!EcommerceHelper::isOrderAutoConfirmedEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="review_enabled"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_review')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="review_enabled"
                                       value="1"
                                       class="trigger-input-option" data-setting-container=".review-settings-container"
                                       <?php if(EcommerceHelper::isReviewEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="review_enabled"
                                       value="0"
                                       class="trigger-input-option" data-setting-container=".review-settings-container"
                                       <?php if(!EcommerceHelper::isReviewEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="review-settings-container mb-4 border rounded-top rounded-bottom p-3 bg-light <?php if(!EcommerceHelper::isReviewEnabled()): ?> d-none <?php endif; ?>">
                            <div class="form-group mb-3">
                                <label class="text-title-field"
                                       for="review_max_file_size"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.review.max_file_size')); ?>

                                </label>
                                <div class="next-input--stylized">
                                    <span class="next-input-add-on next-input__add-on--before">MB</span>
                                    <input type="number" min="1" max="1024" name="review_max_file_size" class="next-input input-mask-number next-input--invisible" value="<?php echo e(EcommerceHelper::reviewMaxFileSize()); ?>">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="text-title-field" for="review_max_file_number"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.review.max_file_number')); ?></label>
                                <input type="number" min="1" max="100" name="review_max_file_number" class="next-input input-mask-number next-input--invisible" value="<?php echo e(EcommerceHelper::reviewMaxFileNumber()); ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="text-title-field"
                                       for="only_allow_customers_purchased_to_review"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.only_allow_customers_purchased_to_review')); ?>

                                </label>
                                <label class="me-2">
                                    <input type="radio" name="only_allow_customers_purchased_to_review"value="1"
                                        <?php if(EcommerceHelper::onlyAllowCustomersPurchasedToReview()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                                </label>
                                <label>
                                    <input type="radio" name="only_allow_customers_purchased_to_review"value="0"
                                        <?php if(!EcommerceHelper::onlyAllowCustomersPurchasedToReview()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="enable_quick_buy_button"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_quick_buy_button')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="enable_quick_buy_button"
                                       value="1"
                                       <?php if(EcommerceHelper::isQuickBuyButtonEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="enable_quick_buy_button"
                                       value="0"
                                       <?php if(!EcommerceHelper::isQuickBuyButtonEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="quick_buy_target_page"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.quick_buy_target')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="quick_buy_target_page"
                                       value="checkout"
                                       <?php if(EcommerceHelper::getQuickBuyButtonTarget() == 'checkout'): ?> checked <?php endif; ?>><?php echo e(trans('plugins/ecommerce::ecommerce.setting.checkout_page')); ?>

                            </label>
                            <label>
                                <input type="radio" name="quick_buy_target_page"
                                       value="cart"
                                       <?php if(EcommerceHelper::getQuickBuyButtonTarget() == 'cart'): ?> checked <?php endif; ?>><?php echo e(trans('plugins/ecommerce::ecommerce.setting.cart_page')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="zip_code_enabled"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.zip_code_enabled')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="zip_code_enabled"
                                       value="1"
                                       <?php if(EcommerceHelper::isZipCodeEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="zip_code_enabled"
                                       value="0"
                                       <?php if(!EcommerceHelper::isZipCodeEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="billing_address_enabled"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.billing_address_enabled')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="billing_address_enabled"
                                       value="1"
                                       <?php if(EcommerceHelper::isBillingAddressEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="billing_address_enabled"
                                       value="0"
                                       <?php if(!EcommerceHelper::isBillingAddressEnabled()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="verify_customer_email"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.verify_customer_email')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="verify_customer_email"
                                       value="1"
                                       <?php if(EcommerceHelper::isEnableEmailVerification()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="verify_customer_email"
                                       value="0"
                                       <?php if(!EcommerceHelper::isEnableEmailVerification()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <?php if(is_plugin_active('captcha')): ?>
                            <div class="form-group mb-3">
                                <label class="text-title-field"
                                       for="enable_recaptcha_in_register_page"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_recaptcha_in_register_page')); ?>

                                </label>
                                <label class="me-2">
                                    <input type="radio" name="enable_recaptcha_in_register_page"
                                           value="1"
                                           <?php if(get_ecommerce_setting('enable_recaptcha_in_register_page', 0) == 1): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                                </label>
                                <label class="me-2">
                                    <input type="radio" name="enable_recaptcha_in_register_page"
                                           value="0"
                                           <?php if(get_ecommerce_setting('enable_recaptcha_in_register_page', 0) == 0): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                                </label>
                                <span class="help-ts"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_recaptcha_in_register_page_description')); ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="enable_guest_checkout"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_guest_checkout')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="enable_guest_checkout"
                                       value="1"
                                       <?php if(EcommerceHelper::isEnabledGuestCheckout()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="enable_guest_checkout"
                                       value="0"
                                       <?php if(!EcommerceHelper::isEnabledGuestCheckout()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group">
                            <label class="text-title-field"
                                   for="how_to_display_product_variation_images"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.how_to_display_product_variation_images')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="how_to_display_product_variation_images"
                                       value="only_variation_images"
                                       <?php if(get_ecommerce_setting('how_to_display_product_variation_images', 'only_variation_images') == 'only_variation_images'): ?> checked <?php endif; ?>><?php echo e(trans('plugins/ecommerce::ecommerce.setting.only_variation_images')); ?>

                            </label>
                            <label>
                                <input type="radio" name="how_to_display_product_variation_images"
                                       value="variation_images_and_main_product_images"
                                       <?php if(get_ecommerce_setting('how_to_display_product_variation_images', 'only_variation_images') == 'variation_images_and_main_product_images'): ?> checked <?php endif; ?>><?php echo e(trans('plugins/ecommerce::ecommerce.setting.variation_images_and_main_product_images')); ?>

                            </label>
                        </div>

                        <div class="form-group">
                            <label class="text-title-field"
                                   for="show_number_of_products"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.show_number_of_products')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="show_number_of_products"
                                       value="1"
                                       <?php if(EcommerceHelper::showNumberOfProductsInProductSingle()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="show_number_of_products"
                                       value="0"
                                       <?php if(!EcommerceHelper::showNumberOfProductsInProductSingle()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group">
                            <label class="text-title-field"
                                   for="show_out_of_stock_products"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.show_out_of_stock_products')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="show_out_of_stock_products"
                                       value="1"
                                       <?php if(EcommerceHelper::showOutOfStockProducts()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="show_out_of_stock_products"
                                       value="0"
                                       <?php if(!EcommerceHelper::showOutOfStockProducts()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="minimum_order_amount"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.minimum_order_amount', ['currency' => get_application_currency()->title])); ?>

                            </label>
                            <div class="next-input--stylized">
                                <span class="next-input-add-on next-input__add-on--before unit-item-price-label"><?php echo e(get_application_currency()->symbol); ?></span>
                                <input type="text" name="minimum_order_amount" class="next-input input-mask-number next-input--invisible" data-thousands-separator="<?php echo e(EcommerceHelper::getThousandSeparatorForInputMask()); ?>" data-decimal-separator="<?php echo e(EcommerceHelper::getDecimalSeparatorForInputMask()); ?>" value="<?php echo e(get_ecommerce_setting('minimum_order_amount', 0)); ?>">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="make_phone_field_at_the_checkout_optional"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.make_phone_field_at_the_checkout_optional')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="make_phone_field_at_the_checkout_optional"
                                       value="1"
                                       <?php if(EcommerceHelper::isPhoneFieldOptionalAtCheckout()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="make_phone_field_at_the_checkout_optional"
                                       value="0"
                                       <?php if(!EcommerceHelper::isPhoneFieldOptionalAtCheckout()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="available_countries"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.available_countries')); ?>

                            </label>
                            <label><input type="checkbox" class="check-all" data-set=".available-countries"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.all')); ?></label>
                            <div class="form-group form-group-no-margin">
                                <div class="multi-choices-widget list-item-checkbox">
                                    <ul>
                                        <?php $__currentLoopData = \Botble\Base\Supports\Helper::countries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <input type="checkbox"
                                                       class="styled available-countries"
                                                       name="available_countries[]"
                                                       value="<?php echo e($key); ?>"
                                                       id="available-countries-item-<?php echo e($key); ?>"
                                                       <?php if(in_array($key, array_keys(EcommerceHelper::getAvailableCountries()))): ?> checked="checked" <?php endif; ?>>
                                                <label for="available-countries-item-<?php echo e($key); ?>"><?php echo e($item); ?></label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php if(is_plugin_active('location')): ?>
                            <div class="form-group mb-3">
                                <label class="text-title-field"
                                       for="load_countries_states_cities_from_location_plugin"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.load_countries_states_cities_from_location_plugin')); ?>

                                </label>
                                <label class="me-2">
                                    <input type="radio" name="load_countries_states_cities_from_location_plugin"
                                           value="1"
                                           <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                                </label>
                                <label>
                                    <input type="radio" name="load_countries_states_cities_from_location_plugin"
                                           value="0"
                                           <?php if(!EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                                </label>
                            </div>
                        <?php endif; ?>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="enable_customer_recently_viewed_products"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.recently_viewed.enable')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="enable_customer_recently_viewed_products"
                                       value="1"
                                       <?php if(EcommerceHelper::isEnabledCustomerRecentlyViewedProducts()): ?> checked <?php endif; ?> class="trigger-input-option" data-setting-container=".recently-viewed-products-settings-container"><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="enable_customer_recently_viewed_products"
                                       value="0"
                                       <?php if(!EcommerceHelper::isEnabledCustomerRecentlyViewedProducts()): ?> checked <?php endif; ?> class="trigger-input-option" data-setting-container=".recently-viewed-products-settings-container"><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="recently-viewed-products-settings-container mb-4 border rounded-top rounded-bottom p-3 bg-light <?php if(!EcommerceHelper::isEnabledCustomerRecentlyViewedProducts()): ?> d-none <?php endif; ?>">
                            <div class="form-group mb-3">
                                <label class="text-title-field" for="max_customer_recently_viewed_products"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.recently_viewed.max')); ?></label>
                                <input type="number" min="0" max="100" name="max_customer_recently_viewed_products" class="next-input input-mask-number next-input--invisible" value="<?php echo e(EcommerceHelper::maxCustomerRecentlyViewedProducts()); ?>">
                                <span class="help-ts"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.recently_viewed.max_helper')); ?></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flexbox-annotated-section">
                <div class="flexbox-annotated-section-annotation">
                    <div class="annotated-section-title pd-all-20">
                        <h2><?php echo e(trans('plugins/ecommerce::ecommerce.setting.company_settings')); ?></h2>
                    </div>
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <p class="color-note"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.company_settings_description')); ?></p>
                    </div>
                </div>
                <div class="flexbox-annotated-section-content">
                    <div class="wrapper-content pd-all-20">
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="company_name_for_invoicing"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.company_name')); ?></label>
                            <input type="text" class="form-control" name="company_name_for_invoicing" value="<?php echo e(get_ecommerce_setting('company_name_for_invoicing') ?: get_ecommerce_setting('store_name')); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="company_address_for_invoicing"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.company_address')); ?></label>
                            <input type="text" class="form-control" name="company_address_for_invoicing" value="<?php echo e(get_ecommerce_setting('company_address_for_invoicing') ?: (get_ecommerce_setting('store_address') . ', ' . get_ecommerce_setting('store_city') . ', ' . get_ecommerce_setting('store_state') . ', ' . EcommerceHelper::getCountryNameById(get_ecommerce_setting('store_country')))); ?>">
                        </div>
                        <?php if(EcommerceHelper::isZipCodeEnabled()): ?>
                            <div class="form-group mb-3">
                                <label class="text-title-field" for="company_zipcode_for_invoicing"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.company_zipcode')); ?></label>
                                <input type="text" class="form-control" name="company_zipcode_for_invoicing" value="<?php echo e(get_ecommerce_setting('company_zipcode_for_invoicing') ?: get_ecommerce_setting('store_zip_code')); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="company_email_for_invoicing"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.company_email')); ?></label>
                            <input type="text" class="form-control" name="company_email_for_invoicing" value="<?php echo e(get_ecommerce_setting('company_email_for_invoicing') ?: get_ecommerce_setting('store_email')); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="company_phone_for_invoicing"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.company_phone')); ?></label>
                            <input type="text" class="form-control" name="company_phone_for_invoicing" value="<?php echo e(get_ecommerce_setting('company_phone_for_invoicing') ?: get_ecommerce_setting('store_phone')); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="company_tax_id_for_invoicing"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.company_tax_id')); ?></label>
                            <input type="text" class="form-control" name="company_tax_id_for_invoicing" value="<?php echo e(get_ecommerce_setting('company_tax_id_for_invoicing') ?: get_ecommerce_setting('store_vat_number')); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="company_logo_for_invoicing"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.company_logo')); ?></label>
                            <?php echo Form::mediaImage('company_logo_for_invoicing', get_ecommerce_setting('company_logo_for_invoicing') ?: (theme_option('logo_in_invoices') ?: theme_option('logo')), ['allow_thumb' => false]); ?>

                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="using_custom_font_for_invoice"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.using_custom_font_for_invoice')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="using_custom_font_for_invoice"
                                       value="1"
                                       <?php if(get_ecommerce_setting('using_custom_font_for_invoice', 0) == 1): ?> checked <?php endif; ?> class="trigger-input-option" data-setting-container=".custom-font-settings-container"><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="using_custom_font_for_invoice"
                                       value="0"
                                       <?php if(get_ecommerce_setting('using_custom_font_for_invoice', 0) == 0): ?> checked <?php endif; ?> class="trigger-input-option" data-setting-container=".custom-font-settings-container"><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="custom-font-settings-container mb-4 border rounded-top rounded-bottom p-3 bg-light <?php if(get_ecommerce_setting('using_custom_font_for_invoice', 0) == 0): ?> d-none <?php endif; ?>">
                            <div class="form-group mb-3">
                                <label class="text-title-field" for="invoice_font_family"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.invoice_font_family')); ?></label>
                                <?php echo Form::googleFonts('invoice_font_family', get_ecommerce_setting('invoice_font_family')); ?>

                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="invoice_support_arabic_language"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.invoice_support_arabic_language')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="invoice_support_arabic_language"
                                       value="1"
                                       <?php if(get_ecommerce_setting('invoice_support_arabic_language', 0) == 1): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="invoice_support_arabic_language"
                                       value="0"
                                       <?php if(get_ecommerce_setting('invoice_support_arabic_language', 0) == 0): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="enable_invoice_stamp"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.enable_invoice_stamp')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="enable_invoice_stamp"
                                       value="1"
                                       <?php if(get_ecommerce_setting('enable_invoice_stamp', 1) == 1): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="enable_invoice_stamp"
                                       value="0"
                                       <?php if(get_ecommerce_setting('enable_invoice_stamp', 1) == 0): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="invoice_code_prefix"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.invoice_code_prefix')); ?></label>
                            <input type="text" class="form-control" name="invoice_code_prefix" value="<?php echo e(get_ecommerce_setting('invoice_code_prefix', 'INV-')); ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="disable_order_invoice_until_order_confirmed"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.disable_order_invoice_until_order_confirmed')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="disable_order_invoice_until_order_confirmed"
                                       value="1"
                                       <?php if(EcommerceHelper::disableOrderInvoiceUntilOrderConfirmed()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="disable_order_invoice_until_order_confirmed"
                                       value="0"
                                       <?php if(!EcommerceHelper::disableOrderInvoiceUntilOrderConfirmed()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flexbox-annotated-section">
                <div class="flexbox-annotated-section-annotation">
                    <div class="annotated-section-title pd-all-20">
                        <h2><?php echo e(trans('plugins/ecommerce::ecommerce.setting.search_products')); ?></h2>
                    </div>
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <p class="color-note"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.search_products_description')); ?></p>
                    </div>
                </div>
                <div class="flexbox-annotated-section-content">
                    <div class="wrapper-content pd-all-20">
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="search_for_an_exact_phrase"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.search_for_an_exact_phrase')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="search_for_an_exact_phrase"
                                       value="1"
                                       <?php if(get_ecommerce_setting('search_for_an_exact_phrase', 0) == 1): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="search_for_an_exact_phrase"
                                       value="0"
                                       <?php if(get_ecommerce_setting('search_for_an_exact_phrase', 0) == 0): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="search_products_by"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.search_products_by')); ?>

                            </label>
                            <div class="form-group form-group-no-margin">
                                <div class="multi-choices-widget list-item-checkbox">
                                    <ul>
                                        <?php $__currentLoopData = [
                                            'name' => trans('plugins/ecommerce::products.form.name'),
                                            'sku' => trans('plugins/ecommerce::products.sku'),
                                            'variation_sku' => trans('plugins/ecommerce::products.variation_sku'),
                                            'description' => trans('plugins/ecommerce::products.form.description'),
                                            'brand' => trans('plugins/ecommerce::products.form.brand'),
                                            'tag' => trans('plugins/ecommerce::products.form.tags'),
                                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <input type="checkbox"
                                                       class="styled"
                                                       name="search_products_by[]"
                                                       value="<?php echo e($key); ?>"
                                                       id="search_products_by-item-<?php echo e($key); ?>"
                                                       <?php if(in_array($key, EcommerceHelper::getProductsSearchBy())): ?> checked="checked" <?php endif; ?>>
                                                <label for="search_products_by-item-<?php echo e($key); ?>"><?php echo e($item); ?></label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flexbox-annotated-section">
                <div class="flexbox-annotated-section-annotation">
                    <div class="annotated-section-title pd-all-20">
                        <h2><?php echo e(trans('plugins/ecommerce::ecommerce.setting.webhook')); ?></h2>
                    </div>
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <p class="color-note"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.webhook_description')); ?></p>
                    </div>
                </div>
                <div class="flexbox-annotated-section-content">
                    <div class="wrapper-content pd-all-20">
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="order_placed_webhook_url"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.order_placed_webhook_url')); ?>

                            </label>
                            <input type="text" name="order_placed_webhook_url" class="next-input"  value="<?php echo e(get_ecommerce_setting('order_placed_webhook_url')); ?>" placeholder="https://...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flexbox-annotated-section">
                <div class="flexbox-annotated-section-annotation">
                    <div class="annotated-section-title pd-all-20">
                        <h2><?php echo e(trans('plugins/ecommerce::ecommerce.setting.return_request')); ?></h2>
                    </div>
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <p class="color-note"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.return_request_description')); ?></p>
                    </div>
                </div>
                <div class="flexbox-annotated-section-content">
                    <div class="wrapper-content pd-all-20">
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="can_custom_return_product_quantity"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.allow_partial_return')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="can_custom_return_product_quantity"
                                       value="1"
                                       <?php if(EcommerceHelper::allowPartialReturn()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="can_custom_return_product_quantity"
                                       value="0"
                                       <?php if(!EcommerceHelper::allowPartialReturn()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                            <span class="help-ts"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.allow_partial_return_description')); ?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="order_placed_webhook_url"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.returnable_days')); ?>

                            </label>
                            <input type="number" min="0" name="returnable_days" class="next-input"  value="<?php echo e(get_ecommerce_setting
                            ('returnable_days')); ?>" placeholder="<?php echo e(trans('plugins/ecommerce::ecommerce.setting.returnable_days')); ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flexbox-annotated-section">
                <div class="flexbox-annotated-section-annotation">
                    <div class="annotated-section-title pd-all-20">
                        <h2><?php echo e(trans('plugins/ecommerce::ecommerce.setting.digital_product')); ?></h2>
                    </div>
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <p class="color-note"></p>
                    </div>
                </div>
                <div class="flexbox-annotated-section-content">
                    <div class="wrapper-content pd-all-20">
                        <div class="form-group mb-3">
                            <label class="text-title-field"
                                   for="is_enabled_support_digital_products"><?php echo e(trans('plugins/ecommerce::ecommerce.setting.digital_product_title')); ?>

                            </label>
                            <label class="me-2">
                                <input type="radio" name="is_enabled_support_digital_products"
                                       value="1"
                                       <?php if(EcommerceHelper::isEnabledSupportDigitalProducts()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                            </label>
                            <label>
                                <input type="radio" name="is_enabled_support_digital_products"
                                       value="0"
                                       <?php if(!EcommerceHelper::isEnabledSupportDigitalProducts()): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flexbox-annotated-section" style="border: none">
                <div class="flexbox-annotated-section-annotation">
                    &nbsp;
                </div>
                <div class="flexbox-annotated-section-content">
                    <button class="btn btn-info" type="submit"><?php echo e(trans('plugins/ecommerce::currency.save_settings')); ?></button>
                </div>
            </div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/settings/advanced-settings.blade.php ENDPATH**/ ?>