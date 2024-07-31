@if ($product)
    @php
        $discount = 0;
        $discount_type = '';
        foreach ($product->discounts as $boat_discount) {
            $discount = $boat_discount->discount;
            $discount_type = $boat_discount->discount_type;
        }
        // Calculate the final price after applying the discount
        $original_price = $product->price;

        if ($discount_type == 'percentage') {
            $discounted_price = $original_price - $original_price * ($discount / 100);
            $discount_display = $discount . '% OFF';
        } elseif ($discount_type == 'amount') {
            $discounted_price = $original_price - $discount;
            $discount_display = format_price($discount) . ' OFF';
        } else {
            $discounted_price = $original_price; // No discount
            $discount_display = '';
        }

        $formatted_price = format_price($discounted_price);
    @endphp
    <div class="product-cart-wrap boat-custom mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="{{ url('/customize-boat/' . $product->type) }}">
                    <img class="default-img"
                        src="{{ RvMedia::getImageUrl($product->main_image, '', false, RvMedia::getDefaultImage()) }}"
                        alt="{{ $product->name }}">
                </a>
            </div>
        </div>
        <div class="product-content-wrap text-center">
            <h2>{{ $product->ltitle }}</h2>
            <div class="product-price">
                STARTING AT
                <span>&nbsp;{{ $formatted_price }}</span>
                @if ($discount_display)
                    <span class="discount-display"> ({{ $discount_display }})</span>
                @endif
            </div>
            <div class="justify-content-center desc">
                <span>{{ $product->descp }}</span>
            </div>
            <div class="justify-content-center mt-20 mb-20">
                <a href="{{ url('/customize-boat/' . $product->type) }}"><button type="button" class="btn boat">Build
                        Your Boat</button></a>
            </div>
        </div>
    </div>
@endif
