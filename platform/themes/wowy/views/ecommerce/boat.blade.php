@php
    $layout = 'customize-boat';
    Theme::layout($layout);

    Theme::asset()->usePath()->add('jquery-ui-css', 'css/plugins/jquery-ui.css');
    Theme::asset()->container('footer')->usePath()->add('jquery-ui-js', 'js/plugins/jquery-ui.js');
    Theme::asset()->container('footer')->usePath()->add('jquery-ui-touch-punch-js', 'js/plugins/jquery.ui.touch-punch.min.js');

    $categories = $product->childitems_display();
@endphp

<div class="row" id="custom-boat-container">
    <div class="col-lg-8 col-12">
        <ul class="row customboat-nav">
            @forelse($categories as $key=>$value)
                <li class="col cat-item cat-{{ $value->type }} {{ $key == 0 ? 'selected' : '' }}">
                    <a class="customboat-nav-link " data-value="{{ $value->type }}">{{ $value->ltitle }}</a>
                </li>
            @empty
            @endforelse
            <li class="col cat-item cat-summary">
                <a class="customboat-nav-link" data-value="{{ $product->id }}" data-type="summary">Summary</a>
            </li>
        </ul>
        @php
            $modelPath = $product->file;
        @endphp
        <div class="row">
            <div id="3d-model" style="width: 100%; height: 500px;"></div>
        </div>

        <input type="hidden" name="boat_price" value="{{ $product->price }}">

    </div>

    <div class="col-lg-4 col-12">
        <form id="submit-form" action="{{ route('public.customize-boat.submit') }}" method="post">
            @csrf
            <input type="hidden" name="boat_id" value="{{ $product->id }}">
            <input type="hidden" name="total_price" value="0">
            @forelse($categories as $key=>$value)
                    <?php
                    $i = $key + 1;
                    ?>
                <div class="customboat-card card-category card-{{ $value->type }} {{ $key > 0 ? 'd-none' : '' }}">
                    <div class="customboat-card-header">
                        <h4 class="category cat-title">{{ $i }}. Choose your {{ $value->ltitle }}</h4>
                    </div>
                    <div class="customboat-card-body cat-body">
                        @forelse($value->childitems() as $key1 => $value1)
                            <div class="col btn options-boat dropdown-toggle mt-5 mb-15" data-bs-toggle="collapse"
                                 href="#collapse{{ $key1 }}" aria-expanded="{{ $key1 == 0 ? 'true' : 'false' }}">
                                <div class="title">{{ $value1->ltitle }}</div>
                            </div>
                            <div class="collapse {{ $key1 == 0 ? 'show' : '' }}" id="collapse{{ $key1 }}">
                                @forelse($value1->childitems() as $option)
                                    @if ($option->side_layout == 'radio')
                                        @if ($value->multi_select != 3)
                                            <input class="form-check-input visually-hidden cat-item-check"
                                                   type="{{ $value->multi_select == 1 ? 'checkbox' : 'radio' }}"
                                                   id="{{ $option->id }}" value="{{ $option->id }}"
                                                   data-typename="{{ $value1->ltitle }}"
                                                   data-type="{{ $value->multi_select == 2 ? $value->type : $value1->type }}"
                                                   name="{{ $value->multi_select == 2 ? 'option[' . $value->type . ']' : 'option[' . $value1->type . ']' }}"
                                                   data-parent="{{ $option->parent_id }}" data-waschecked="false">
                                        @endif
                                        <label class="form-check-label color-box" for="{{ $option->id }}"
                                               style="background-image: url({{ RvMedia::getImageUrl($option->main_image) }});">
                                            <div class="tick-icon"><img src="{{ asset('/storage/check_circle.png') }}">
                                            </div>
                                            <div class="color-name">{{ $option->ltitle }}</div>
                                        </label>
                                    @elseif($option->side_layout == 'toggle')
                                        <div class="form-check">
                                            @if ($value->multi_select != 3)
                                                {{--                                                @dd($value,$value1,$option)--}}
                                                <input class="form-check-input cat-item-check"
                                                       name="{{ $value->multi_select == 2 ? 'option[' . $value->type . ']' : 'option[' . $value1->type . ']' }}"
                                                       type="{{ $value->multi_select == 1 ? 'checkbox' : 'radio' }}"
                                                       value="{{ $option->id }}" data-typename="{{ $value1->ltitle }}"
                                                       data-type="{{ $value->multi_select == 2 ? $value->type : $value1->type }}"
                                                       data-parent="{{ $option->parent_id }}" data-waschecked="false"
                                                       id="collapse-{{ $option->id }}-{{ $option->file ?? '' }}">
                                            @endif
                                            {{--The title price of the options like ladder--}}
                                            <label class="form-check-label" for="collapse-{{ $value->id }}">
                                                <div data-bs-toggle="{{ $option->main_image ? 'collapse' : '' }}"
                                                     data-bs-target="#color-details-{{ $option->id }}"
                                                     aria-expanded="false"
                                                     aria-controls="color-details-{{ $option->id }}"
                                                     class="tog {{ $option->main_image ? 'dropdown-toggle' : '' }}">
                                                    {{ $option->ltitle }} ({{ format_price($option->price) }})
                                                </div>
                                            </label>
                                            {{--Image to be show if we add then there will be a dropdown on which on clicking image is shown--}}
                                            <div class="collapse" id="color-details-{{ $option->id }}">
                                                <div class="content-boat">
                                                    <img class="img-fluid img-thumbnail landscape"
                                                         src="{{ RvMedia::getImageUrl($option->main_image) }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                            </div>
                        @empty
                        @endforelse

                        <div class="row">
                            <div class="col-8">
                                <p class="text-center" style="font-size:16px"><b>Sub Total</b>: <span
                                            class="sub-total">{{ format_price($product->price) }}</span></p>
                                <p class="text-center" style="font-size:16px"><b>VAT 5%</b>: <span
                                            class="vat-price">{{ format_price(($product->price * 5) / 100) }}</span></p>
                                <p class="text-center mb-10" style="font-size:16px"><b>Total</b>: <span
                                            class="vat-total">{{ format_price($product->price + ($product->price * 5) / 100) }}</span>
                                </p>
                            </div>
                            <div class="col-4">
                                @php
                                    $currencies = get_all_currencies() ?? [];
                                    $selectedCurrency = $currencies->firstWhere('id', get_application_currency_id())->title ?? 'Select Currency';
                                @endphp

                                <div class="currency-dropdown dropdown">
                                    <button class="dropdown-toggle" type="button" id="currencyDropdown"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $selectedCurrency }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="currencyDropdown">
                                        @foreach ($currencies as $currency)
                                            @if ($currency->id !== get_application_currency_id())
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="{{ route('public.change-currency', $currency->title) }}">{{ $currency->title }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="customboat-card-footer d-flex justify-content-between flex-row">
                        @if (isset($categories[$key + 1]))
                            @if ($key > 0)
                                <button class="btn card-btn prv" data-curval="{{ $categories[$key]->type }}"
                                        data-value="{{ $categories[$key - 1]->type }}" type="button">Back
                                </button>
                            @endif
                            <button class="btn card-btn" type="button" data-curval="{{ $categories[$key]->type }}"
                                    data-value="{{ isset($categories[$key + 1]) ? $categories[$key + 1]->type : '' }}">
                                Next
                                Step
                            </button>
                        @else
                            <button class="btn card-btn prv" data-curval="{{ $categories[$key]->type }}"
                                    data-value="{{ isset($categories[$key - 1]) ? $categories[$key - 1]->type : '' }}"
                                    type="button">Back
                            </button>
                            <button class="btn card-btn" data-curval="{{ $categories[$key]->type }}"
                                    data-value="summary" type="button">Next Step
                            </button>
                        @endif
                    </div>
                </div>
            @empty
            @endforelse
            <div class="customboat-card card-category card-summary mb-5 d-none">
                <div class="customboat-card-header">
                    <h4 class="category cat-title">{{ $i + 1 }}. Final Step</h4>
                </div>
                <div class="customboat-card-body">
                    <div class="form-group">
                        <div class="textarea-style">
                            <textarea name="message" placeholder="{{ __('Message') }}"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="redirect_url_pay" value="0">
                <div class="mt-10 customboat-card-footer d-flex flex-row flex-wrap">
                    <button type="button" class="btn card-btn prv" data-curval="summary"
                            data-value="{{ lastitem($product->id)->type }}">Back
                    </button>
                    <button type="submit" class="btn card-btn" style="border-radius: unset;">Save & Exit</button>
                    <button type="button" class="btn view-summary">View Your Summary</button>
                    <button type="button" class="btn card-btn submit-btn" style="border-radius: unset;">Book Boat
                        Now
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>For booking confirmation of your Boat, you need to
                    pay {{ format_price(get_ecommerce_setting('down_payment')) }} as a downpayment. This will confirm
                    your booking and our team will get in touch with you further.</p>
                <p class="alert alert-success">Note: All Credit/Debit card and Apple Pay payments are accepted.</p>
            </div>
            <div class="modal-footer">
                <a id="submit-boot" class="btn btn-small d-block" href="#">Proceed to checkout</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-60" id="summary-end">
    <div class="col-md-8 col-12 m-auto">
        <div style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="card card-custom">
                <div class="card-header text-center bg-brand">
                    <h4 class="text-white">Summary</h4>
                </div>
                <div class="card-body summary-card justify-content-center d-flex flex-row flex-wrap">
                </div>
                <div class="card-body list-style">
                    <h4>Included:</h4>
                    {!! $product->detail->standard_options !!}
                </div>
            </div>
            <div class="card-footer">
                <div class="row m-2">
                    <div class="col-9 text-end">
                        <p><b>Sub Total</b>: <span class="sub-total">{{ format_price($product->price) }}</span></p>
                        <p><b>VAT 5%</b>: <span class="vat-price">{{ format_price(($product->price * 5) / 100) }}</span>
                        </p>
                        <p><b>Total</b>: <span
                                    class="vat-total">{{ format_price($product->price + ($product->price * 5) / 100) }}</span>
                        </p>
                    </div>
                    <div class="col-3">
                        <div class="currency-dropdown dropdown">
                            <button class="dropdown-toggle" type="button" id="currencyDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                AED
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="currencyDropdown">
                                <li><a class="dropdown-item" href="#" data-currency="AED">AED</a></li>
                                <li><a class="dropdown-item" href="#" data-currency="EUR">Euro</a></li>
                                <li><a class="dropdown-item" href="#" data-currency="USD">USD</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<!-- scrolling -->
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    jQuery(function ($) {
        var offset = $('#custom-boat-container').offset().top - 50;
        $('html, body').animate({
            scrollTop: offset
        }, 'slow');
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three/examples/js/controls/OrbitControls.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three/examples/js/loaders/GLTFLoader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three/examples/js/loaders/DRACOLoader.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modelPath = '{{ asset('storage/' . $modelPath) }}';
        const container = document.getElementById('3d-model');

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(
            75,
            container.clientWidth / container.clientHeight,
            0.1,
            1000
        );
        camera.position.set(0, 0, 6); // Initial camera position further from the scene
        camera.lookAt(scene.position);

        const renderer = new THREE.WebGLRenderer({antialias: true});
        renderer.gammaOutput = true;
        renderer.toneMapping = THREE.ACESFilmicToneMapping;
        renderer.toneMappingExposure = 2;

        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setClearColor(0xffffff);
        container.appendChild(renderer.domElement);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 2);
        directionalLight.position.set(5, 5, 5).normalize();
        scene.add(directionalLight);

        const directionalLight2 = new THREE.DirectionalLight(0xffffff, 2);
        directionalLight2.position.set(-5, -5, -5).normalize();
        scene.add(directionalLight2);

        const ambientLight = new THREE.AmbientLight(0xffffff, 1.5);
        scene.add(ambientLight);

        const dracoLoader = new THREE.DRACOLoader();
        dracoLoader.setDecoderPath("https://www.gstatic.com/draco/versioned/decoders/1.4.1/");

        const loader = new THREE.GLTFLoader();
        loader.setDRACOLoader(dracoLoader);

        loader.load(modelPath, function (gltf) {
            const model = gltf.scene;
            const scaleFactor = 0.01;
            model.scale.set(scaleFactor, scaleFactor, scaleFactor);
            scene.add(model);
            animate();
        }, undefined, function (error) {
            console.error(error);
        });

        const controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enableDamping = false;
        controls.minDistance = 3; // Allow zooming in closer
        controls.maxDistance = 13; // Adjust max distance accordingly

        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
            controls.update();
        }
    });
</script>

