<?php
    $layout = MetaBox::getMetaData($product, 'layout', true);
    $layout = ($layout && in_array($layout, array_keys(get_product_single_layouts()))) ? $layout : 'product-right-sidebar';
    Theme::layout($layout);

    Theme::asset()->usePath()->add('lightGallery-css', 'plugins/lightGallery/css/lightgallery.min.css');
    Theme::asset()->container('footer')->usePath()
        ->add('lightGallery-js', 'plugins/lightGallery/js/lightgallery.min.js', ['jquery']);
?>

<div class="product-detail accordion-detail">
    <div class="row mb-50">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="detail-gallery">
                <!-- MAIN SLIDES -->
                <div class="product-image-slider">
                    <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <figure class="border-radius-10">
                            <a href="<?php echo e(RvMedia::getImageUrl($img)); ?>">
                                <img src="<?php echo e(RvMedia::getImageUrl($img, 'medium')); ?>" alt="<?php echo e($product->name); ?>">
                            </a>
                        </figure>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- THUMBNAILS -->
                <div class="slider-nav-thumbnails pr-15">
                    <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div><img src="<?php echo e(RvMedia::getImageUrl($img, 'thumb')); ?>" alt="<?php echo e($product->name); ?>"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!-- End Gallery -->
            <!-- <div class="single-social-share clearfix mt-50 mb-15">
                <p class="mb-15 mt-30 font-sm"> <i class="fa fa-share-alt mr-5"></i> <span class="d-inline-block"><?php echo e(__('Share this')); ?></span></p>
                <div class="mobile-social-icon wow fadeIn  mb-sm-5 mb-md-0 animated">
                    <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(url()->current())); ?>&text=<?php echo e(strip_tags(strip_tags(SeoHelper::getDescription()))); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode(url()->current())); ?>&summary=<?php echo e(rawurldecode(strip_tags(SeoHelper::getDescription()))); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div> -->
            <!-- <a class="mail-to-friend font-sm color-grey" href="mailto:someone@example.com?subject=<?php echo e(__('Buy')); ?> <?php echo e($product->name); ?>&body=<?php echo e(__('Buy this one: :link', ['link' => $product->url])); ?>"><i class="far fa-envelope"></i> <?php echo e(__('Email to a Friend')); ?></a> -->
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="detail-info">
             <p class="title1 mb-15">Accessory</p>
                <h2 class="title-detail mb-10"><?php echo e($product->name); ?></h2>
                <!-- <div class="product-detail-rating">
                    <?php if($product->brand->id): ?>
                        <div class="pro-details-brand">
                            <span class="d-inline-block"><?php echo e(__('Brands')); ?>:</span> <a href="<?php echo e($product->brand->url); ?>"><?php echo e($product->brand->name); ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if(EcommerceHelper::isReviewEnabled()): ?>
                        <div class="product-rate-cover text-end">
                            <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width: <?php echo e($product->reviews_avg * 20); ?>%"></div>
                                </div>
                                <span class="rating_num">(<?php echo e(__(':count reviews', ['count' => $product->reviews_count])); ?>)</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div> -->
                <div class="clearfix product-price-cover">
                    <div class="product-price primary-color float-left">
                        <ins><span class="text-brand"><?php echo e(format_price($product->front_sale_price_with_taxes)); ?></span></ins>
                        <?php if($product->front_sale_price !== $product->price): ?>
                            <ins><span class="old-price font-md ml-15"><?php echo e(format_price($product->price_with_taxes)); ?></span></ins>
                            <span class="save-price font-md color3 ml-15"><span class="percentage-off d-inline-block"><?php echo e(get_sale_percentage($product->price, $product->front_sale_price)); ?></span> <span class="d-inline-block"><?php echo e(__('Off')); ?></span></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                <div class="short-desc mb-30">
                    <div class="detail-heading mb-20">
                    <h4>Detail Description:</h4>
                    </div>
                    <?php echo apply_filters('ecommerce_before_product_description', null, $product); ?>

                    <?php echo BaseHelper::clean($product->description); ?>

                    <?php echo apply_filters('ecommerce_after_product_description', null, $product); ?>

                </div>

                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                <form class="add-to-cart-form" method="POST" action="<?php echo e(route('public.cart.add-to-cart')); ?>">
                    <?php echo csrf_field(); ?>

                    <?php if($product->variations()->count() > 0): ?>
                        <div class="pr_switch_wrap">
                            <?php echo render_product_swatches($product, [
                                'selected' => $selectedAttrs,
                                'view'     => Theme::getThemeNamespace() . '::views.ecommerce.attributes.swatches-renderer'
                            ]); ?>

                        </div>
                        <div class="number-items-available" style="<?php if(!$product->isOutOfStock()): ?> display: none; <?php endif; ?> margin-bottom: 10px;">
                            <?php if($product->isOutOfStock()): ?>
                                <span class="text-danger">(<?php echo e(__('Out of stock')); ?>)</span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo render_product_options($product); ?>


                    <?php echo apply_filters(ECOMMERCE_PRODUCT_DETAIL_EXTRA_HTML, null, $product); ?>

                    <input type="hidden" name="id" class="hidden-product-id" value="<?php echo e(($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id); ?>"/>
                    <div class="detail-extralink">
                        <?php if(EcommerceHelper::isCartEnabled()): ?>
                            <div class="detail-qty border radius">
                                <a href="#" class="qty-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                <input type="number" min="1" value="1" name="qty" class="qty-val qty-input" />
                                <a href="#" class="qty-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                            </div>
                        <?php endif; ?>

                        <div class="product-extra-link2 <?php if(EcommerceHelper::isQuickBuyButtonEnabled()): ?> has-buy-now-button <?php endif; ?>">
                            <?php if(EcommerceHelper::isCartEnabled()): ?>
                                <button type="submit" class="button button-add-to-cart <?php if($product->isOutOfStock()): ?> btn-disabled <?php endif; ?>" type="submit" <?php if($product->isOutOfStock()): ?> disabled <?php endif; ?>><?php echo e(__('Add to cart')); ?></button>
                                <!-- <?php if(EcommerceHelper::isQuickBuyButtonEnabled()): ?>
                                    <button class="button button-buy-now ms-2 <?php if($product->isOutOfStock()): ?> btn-disabled <?php endif; ?>" type="submit" name="checkout" <?php if($product->isOutOfStock()): ?> disabled <?php endif; ?>><?php echo e(__('Buy Now')); ?></button>
                                <?php endif; ?> -->
                            <?php endif; ?>
<!-- 
                            <?php if(EcommerceHelper::isWishlistEnabled()): ?>
                                <a aria-label="<?php echo e(__('Add To Wishlist')); ?>" class="action-btn hover-up js-add-to-wishlist-button" data-url="<?php echo e(route('public.wishlist.add', $product->id)); ?>" href="#"><i class="far fa-heart"></i></a>
                            <?php endif; ?>
                            <?php if(EcommerceHelper::isCompareEnabled()): ?>
                                <a aria-label="<?php echo e(__('Add To Compare')); ?>" href="#" class="action-btn hover-up js-add-to-compare-button" data-url="<?php echo e(route('public.compare.add', $product->id)); ?>"><i class="far fa-exchange-alt"></i></a>
                            <?php endif; ?> -->
                        </div>
                    </div>
                </form>
                <ul class="rem-detail font-xs color-grey mt-50">
                    <?php if($product->sku): ?>
                        <li class="mb-5"><span class="d-inline-block" id="product-sku"><strong><?php echo e(__('SKU')); ?></span>:</strong>&nbsp;<span><?php echo e($product->sku); ?></span></li>
                    <?php endif; ?>

                    <?php if($product->categories->count()): ?>
                        <li class="mb-5"><span class="d-inline-block"><strontg><?php echo e(__('Categories')); ?>:</strong>&nbsp;</span>
                        <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($category->url); ?>" title="<?php echo e($category->name); ?>"><?php echo e($category->name); ?></a><?php if(!$loop->last): ?>,<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </li>
                    <?php endif; ?>
                    <?php if($product->tags->count()): ?>
                        <li class="mb-5"><span class="d-inline-block"><strong><?php echo e(__('Tags')); ?>:</span></strong>&nbsp;
                        <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($tag->url); ?>" rel="tag" title="<?php echo e($tag->name); ?>"><?php echo e($tag->name); ?></a><?php if(!$loop->last): ?>,<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    <?php endif; ?>

                    <li><span class="d-inline-block"><strong><?php echo e(__('Availability')); ?>:</span></strong>&nbsp;<span class="in-stock text-success ml-5"><?php echo BaseHelper::clean($product->stock_status_html); ?></span></li>
                </ul>
            </div>
            <!-- Detail Info -->

        </div>
    </div>
    <div class="tab-style3">
        <ul class="nav nav-tabs text-uppercase">
            <li class="nav-item">
                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description"><?php echo e(__('Description')); ?></a>
            </li>
            <?php if(EcommerceHelper::isReviewEnabled()): ?>
                <li class="nav-item">
                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews"><?php echo e(__('Reviews')); ?> (<?php echo e($product->reviews_count); ?>)</a>
                </li>
            <?php endif; ?>
            <!-- <?php if(is_plugin_active('faq')): ?>
                <?php if(count($product->faq_items) > 0): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-faq"><?php echo e(__('Questions and Answers')); ?></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?> -->
        </ul>
        <div class="tab-content shop_info_tab entry-main-content">
            <div class="tab-pane fade show active" id="Description">
                <?php echo BaseHelper::clean($product->content); ?>

                <?php if(theme_option('facebook_comment_enabled_in_product', 'yes') == 'yes'): ?>
                    <br />
                    <?php echo apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')); ?>

                <?php endif; ?>
            </div>

            <?php if(is_plugin_active('faq') && count($product->faq_items) > 0): ?>
                <div class="tab-pane fade faqs-list" id="tab-faq">
                    <div class="accordion" id="faq-accordion">
                        <?php $__currentLoopData = $product->faq_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-header" id="heading-faq-<?php echo e($loop->index); ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left <?php if(!$loop->first): ?> collapsed <?php endif; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-faq-<?php echo e($loop->index); ?>" aria-expanded="true" aria-controls="collapse-faq-<?php echo e($loop->index); ?>">
                                            <?php echo BaseHelper::clean($faq[0]['value']); ?>

                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse-faq-<?php echo e($loop->index); ?>" class="collapse <?php if($loop->first): ?> show <?php endif; ?>" aria-labelledby="heading-faq-<?php echo e($loop->index); ?>" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        <?php echo BaseHelper::clean($faq[1]['value']); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(EcommerceHelper::isReviewEnabled()): ?>
            <div class="tab-pane fade" id="Reviews">
                <?php if($product->reviews_count > 0): ?>
                    <!-- <?php if(count($product->review_images)): ?>
                        <div class="my-3">
                            <h4><?php echo e(__('Images from customer (:count)', ['count' => count($product->review_images)])); ?></h4>
                            <div class="block--review">
                                <div class="block__images row m-0 block__images_total">
                                    <?php $__currentLoopData = $product->review_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(RvMedia::getImageUrl($img)); ?>" class="col-lg-1 col-sm-2 col-3 more-review-images <?php if($loop->iteration > 6): ?> d-none <?php endif; ?>">
                                            <div class="border position-relative rounded">
                                                <img src="<?php echo e(RvMedia::getImageUrl($img, 'thumb')); ?>" alt="<?php echo e($product->name); ?>" class="img-responsive rounded h-100">
                                                <?php if($loop->iteration == 6 && (count($product->review_images) - $loop->iteration > 0)): ?>
                                                    <span>+<?php echo e(count($product->review_images) - $loop->iteration); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?> -->
                    <div class="comments-area">
                        <div class="row">
                            <!-- <div class="col-lg-8 block--product-reviews" id="product-reviews">
                                <h4 class="mb-30"><?php echo e(__('Customer questions & answers')); ?></h4>
                                <product-reviews-component url="<?php echo e(route('public.ajax.product-reviews', $product->id)); ?>"></product-reviews-component>
                            </div> -->
                            <div class="col-lg-4">
                                <h4 class="mb-30"><?php echo e(__('Customer reviews')); ?></h4>
                                <div class="d-flex mb-30">
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width: <?php echo e($product->reviews_avg * 20); ?>%"></div>
                                        </div>
                                        <span class="rating_num">(<?php echo e(__(':avg out of 5', ['avg' => number_format($product->reviews_avg, 2)])); ?>)</span>
                                    </div>
                                </div>

                                <?php $__currentLoopData = EcommerceHelper::getReviewsGroupedByProductId($product->id, $product->reviews_count); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="progress">
                                        <span><?php echo e(__(':number star', ['number' => $item['star']])); ?></span>

                                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($item['percent']); ?>%;" aria-valuenow="<?php echo e($item['percent']); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e($item['percent']); ?>%</div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p><?php echo e(__('No reviews!')); ?></p>
                <?php endif; ?>
                
                <div class="comment-form" <?php if(!$product->reviews_count): ?> style="border: none" <?php endif; ?>>
                    <h4 class="mb-15"><?php echo e(__('Add a review')); ?></h4>
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <?php echo Form::open(['route' => 'public.reviews.create', 'method' => 'post', 'class' => 'form-contact comment_form form-review-product', 'files' => true]); ?>

                                <?php if(!auth('customer')->check()): ?>
                                    <p class="text-danger"><?php echo e(__('Please')); ?> <a href="<?php echo e(route('customer.login')); ?>"><?php echo e(__('login')); ?></a> <?php echo e(__('to write review!')); ?></p>
                                <?php endif; ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                <div class="form-group">
                                    <label><?php echo e(__('Quality')); ?></label>
                                    <div class="rate">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <input type="radio" id="star<?php echo e($i); ?>" name="star" value="<?php echo e($i); ?>" <?php if($i == 5): ?> checked <?php endif; ?>>
                                            <label for="star<?php echo e($i); ?>" title="text"><?php echo e(__(':number star', ['number' => $i])); ?></label>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="<?php echo e(__('Write Comment')); ?>" <?php if(!auth('customer')->check()): ?> disabled <?php endif; ?>></textarea>
                                </div>

                                <!-- <div class="form-group">
                                    <script type="text/x-custom-template" id="review-image-template">
                                        <span class="image-viewer__item" data-id="__id__">
                                            <img src="<?php echo e(RvMedia::getDefaultImage()); ?>" alt="Preview" class="img-responsive d-block">
                                            <span class="image-viewer__icon-remove">
                                                <i class="far fa-times"></i>
                                            </span>
                                        </span>
                                    </script>
                                    <div class="image-upload__viewer d-flex">
                                        <div class="image-viewer__list position-relative">
                                            <div class="image-upload__uploader-container">
                                                <div class="d-table">
                                                    <div class="image-upload__uploader">
                                                        <i class="far fa-image image-upload__icon"></i>
                                                        <div class="image-upload__text"><?php echo e(__('Upload photos')); ?></div>
                                                        <input type="file"
                                                               name="images[]"
                                                               data-max-files="<?php echo e(EcommerceHelper::reviewMaxFileNumber()); ?>"
                                                               class="image-upload__file-input"
                                                               accept="image/png,image/jpeg,image/jpg"
                                                               multiple="multiple"
                                                               data-max-size="<?php echo e(EcommerceHelper::reviewMaxFileSize(true)); ?>"
                                                               data-max-size-message="<?php echo e(trans('validation.max.file', ['attribute' => '__attribute__', 'max' => '__max__'])); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loading">
                                                <div class="half-circle-spinner">
                                                    <div class="circle circle-1"></div>
                                                    <div class="circle circle-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="help-block d-inline-block">
                                            <?php echo e(__('You can upload up to :total photos, each photo maximum size is :max kilobytes', [
                                                'total' => EcommerceHelper::reviewMaxFileNumber(),
                                                'max'   => EcommerceHelper::reviewMaxFileSize(true),
                                            ])); ?>

                                        </span>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm" <?php if(!auth('customer')->check()): ?> disabled <?php endif; ?>><?php echo e(__('Submit Review')); ?></button>
                                </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>

            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php
        $crossSellProducts = get_cross_sale_products($product, $layout == 'product-full-width' ? 4 : 3);
    ?>
 
    <div class="row mt-60" id="related-products">
        <div class="col-12">
            <h3 class="section-title style-1 mb-30"><?php echo e(__('Related products')); ?></h3>
        </div>
        <related-products-component url="<?php echo e(route('public.ajax.related-products', $product->id)); ?>" :limit="<?php echo e($layout == 'product-full-width' ? 4 : 3); ?>"></related-products-component>
    </div>
</div>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/views/ecommerce/product.blade.php ENDPATH**/ ?>