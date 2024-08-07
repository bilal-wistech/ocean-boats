<div class="mb-4">
    <div class="align-items-center mb-5">
        <ul class="order-info">
        <li>{{ __('Order No') }}:<br>{{ $order->code }}</li>
        <li>{{ __('Date') }}:<br>{{ \Carbon\Carbon::parse(BaseHelper::formatDate($order->created_at))->format('F j, Y') }}</li>
        <li>{{ __('Status') }}:<br>{{ $order->status }}</li>
        <li>{{ __('Order Amount') }}:<br>{{ format_price($order->amount) }}</li>
        <li>{{ __('Payment Method') }}:<br>{{ BaseHelper::clean($order->payment->payment_channel->label() ?: '&mdash;') }}</li>

        </ul>
    </div>

    <div class="checkout-success-products">
        <div class="order-item mb-5"><h5>Order item (2)</h5></div>
        <div class="row show-cart-row d-none p-2">
            <div class="col-9">
                <a class="show-cart-link"
                   href="javascript:void(0);"
                   data-bs-toggle="collapse"
                   data-bs-target="{{ '#cart-item-' . $order->id }}">
                    {{ __('Order information :order_id', ['order_id' => $order->code]) }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-3">
                <p class="text-end mobile-total"> {{ format_price($order->amount) }} </p>
            </div>
        </div>
        <div id="{{ 'cart-item-' . $order->id }}" class="collapse collapse-products  mb-40">
            @foreach ($order->products as $orderProduct)
                @php
                    $product = get_products([
                        'condition' => [
                            'ec_products.id' => $orderProduct->product_id,
                        ],
                        'take'   => 1,
                        'select' => [
                            'ec_products.id',
                            'ec_products.image',
                            'ec_products.images',
                            'ec_products.name',
                            'ec_products.price',
                            'ec_products.sale_price',
                            'ec_products.sale_type',
                            'ec_products.start_date',
                            'ec_products.end_date',
                            'ec_products.sku',
                            'ec_products.is_variation',
                            'ec_products.status',
                            'ec_products.order',
                            'ec_products.created_at',
                        ],
                    ]);
                @endphp

                @if ($product)
                    <div class="row cart-item">
                    <div class="col-lg-1 col-md-2 col-3">
                        <div class="checkout-product-img-wrapper">
                            <img class="item-thumb img-thumbnail img-rounded"
                                 src="{{ RvMedia::getImageUrl($orderProduct->product_image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                 alt="{{ $product->name . '(' . $product->sku . ')'}}">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-3">
                        <p class="mb-0">{{ $product->name }}</p>
                        <p class="mb-0">
                            <small>{{ $product->variation_attributes }}</small>
                        </p>
                        @if (!empty($orderProduct->product_options) && is_array($orderProduct->product_options))
                            {!! render_product_options_info($orderProduct->product_options, $product, true) !!}
                        @endif
                        @if (!empty($orderProduct->options) && is_array($orderProduct->options))
                            @foreach($orderProduct->options as $option)
                                @if (!empty($option['key']) && !empty($option['value']))
                                    <p class="mb-0">
                                        <small>{{ $option['key'] }}: <strong> {{ $option['value'] }}</strong></small>
                                    </p>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="col-lg-2 col-md-3 col-3 float-end text-end">
                    <span class="checkout-quantity1">QTY : {{ $orderProduct->qty }}</span>
                    </div>
                    <div class="col-lg-2 col-md-3 col-3 float-end text-end">
                        <p>{{ format_price($orderProduct->price) }}</p>
                    </div>
                </div> <!--  /item -->
                @endif
            @endforeach

            @if (!empty($isShowTotalInfo))
                @include('plugins/ecommerce::orders.thank-you.total-info', compact('order'))
            @endif
        </div>
        <div class="row">
        <div class="col-10">
        <hr>
        </div>
        </div>
    </div>
</div>
