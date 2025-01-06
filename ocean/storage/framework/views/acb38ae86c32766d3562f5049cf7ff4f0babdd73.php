<?php
    Theme::layout('full-width');

    $menus = [
        [
            'key'   => 'customer.overview',
            'label' => __('Overview'),
            'icon'  => 'fa fa-atom',
        ],
        [
            'key'   => 'customer.edit-account',
            'label' => __('Profile'),
            'icon'  => 'fa fa-user-edit',
        ],
        [
            'key'   => 'customer.orders',
            'label' => __('Orders'),
            'icon'  => 'fa fa-shopping-basket',
            'routes'    => ['customer.orders.view'],
        ],
        [
            'key'   => 'customer.saved_boats',
            'label' => __('Saved Boats'),
            'icon'  => 'fa fa-ship',
            'routes'    => [
                'customer.saved_boats.view',
            ]
        ],
        [
            'key'   => 'customer.address',
            'label' => __('Address books'),
            'icon'  => 'fa fa-map-marked',
            'routes'    => [
                'customer.address.create',
                'customer.address.edit',
            ]
        ],
        [
            'key'   => 'public.wishlist',
            'label' => __('Wishlist'),
            'icon'  => 'fas fa-heart',
        ],
        [
            'key'   => 'customer.change-password',
            'label' => __('Change password'),
            'icon'  => 'fa fa-key',
        ],
        [
            'key'   => 'customer.logout',
            'label' => __('Logout'),
            'icon'  => 'fa fa-sign-out-alt',
        ],
    ];

    if (!EcommerceHelper::isEnabledSupportDigitalProducts()) {
        unset($menus[3]);
    }
?>
<section class="pt-50 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-4">
                                <div class="profile-sidebar crop-avatar">
                                    <form id="avatar-upload-form" enctype="multipart/form-data" action="javascript:void(0)" onsubmit="return false">
                                        <div class="avatar-upload-container">
                                            <div class="form-group mb-0">
                                                <div id="account-avatar">
                                                    <div class="profile-image">
                                                        <div class="avatar-view mt-card-avatar">
                                                            <img class="br2 align-middle" src="<?php echo e(auth('customer')->user()->avatar_url); ?>" alt="<?php echo e(auth('customer')->user()->name); ?>">
                                                            <div class="mt-overlay br2">
                                                                <span><i class="fa fa-edit"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="print-msg" class="text-danger hidden"></div>
                                        </div>
                                    </form>
                                    <div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modal-label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form class="avatar-form" method="post" action="<?php echo e(route('customer.avatar')); ?>" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="avatar-modal-label"><i class="til_img"></i><strong><?php echo e(__('Profile Image')); ?></strong></h4>
                                                        <button type="button" class="btn-close" data-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="avatar-body">
                                                            <!-- Upload image and data -->
                                                            <div class="avatar-upload">
                                                                <input class="avatar-src" name="avatar_src" type="hidden">
                                                                <input class="avatar-data" name="avatar_data" type="hidden">
                                                                <?php echo csrf_field(); ?>

                                                                <label for="avatarInput"><?php echo e(__('New image')); ?></label>
                                                                <input class="avatar-input avatar-input bg-transparent ms-0" id="avatarInput" name="avatar_file" type="file">
                                                            </div>

                                                            <div class="loading" tabindex="-1" role="img" aria-label="<?php echo e(__('Loading')); ?>"></div>

                                                            <!-- Crop and preview -->
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <div class="avatar-wrapper"></div>
                                                                    <div class="error-message text-danger" style="display: none"></div>
                                                                </div>
                                                                <div class="col-md-3 avatar-preview-wrapper">
                                                                    <div class="avatar-preview preview-lg"></div>
                                                                    <div class="avatar-preview preview-md"></div>
                                                                    <div class="avatar-preview preview-sm"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-small btn-secondary" type="button" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                                        <button class="btn btn-small btn-primary avatar-save" type="submit"><?php echo e(__('Save')); ?></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="profile-usertitle-name pt-2">
                                    <strong><?php echo e(auth('customer')->user()->name); ?></strong>
                                    <p><small><?php echo e(auth('customer')->user()->email); ?></small></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="dashboard-menu">
                            <ul class="nav flex-column">
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Arr::get($item, 'key') == 'public.wishlist' && !EcommerceHelper::isWishlistEnabled()): ?>
                                        <?php continue; ?>
                                    <?php endif; ?>
                                    <li class="nav-item">
                                        <a class="nav-link
                                            <?php if(Route::currentRouteName() == Arr::get($item, 'key')
                                                || in_array(Route::currentRouteName(), Arr::get($item, 'routes', []))): ?> active <?php endif; ?>"
                                            href="<?php echo e(route(Arr::get($item, 'key'))); ?>"
                                            aria-controls="dashboard"
                                            aria-selected="false">
                                            <?php if(Arr::get($item, 'icon')): ?>
                                                <i class="<?php echo e(Arr::get($item, 'icon')); ?> mr-15" aria-hidden="true"></i>
                                            <?php endif; ?>
                                            <?php echo e(Arr::get($item, 'label')); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/customers/master.blade.php ENDPATH**/ ?>