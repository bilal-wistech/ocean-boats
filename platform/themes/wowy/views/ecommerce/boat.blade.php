@php
    $layout = 'customize-boat';
    Theme::layout($layout);

    Theme::asset()->usePath()->add('jquery-ui-css', 'css/plugins/jquery-ui.css');
    Theme::asset()->container('footer')->usePath()->add('jquery-ui-js', 'js/plugins/jquery-ui.js');
    Theme::asset()->container('footer')->usePath()->add('jquery-ui-touch-punch-js', 'js/plugins/jquery.ui.touch-punch.min.js');

    $categories = $product->childitems_display();
@endphp
<div class="bg-blue">
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
                <div id="loader">
                    <div class="spinner"></div>
                    <p>Loading Model...</p>
                </div>
                <div id="Three-model" style="width: 100%; height: 500px; overflow:hidden"></div>
            </div>

            <input type="hidden" name="boat_price" value="{{ $product->price }}">

        </div>

        <div class="col-lg-4 col-12">
            <form id="submit-form" action="{{ route('public.customize-boat.submit') }}" method="post">
                @csrf
                <input type="hidden" name="boat_id" value="{{ $product->id }}">
                <input type="hidden" name="total_price" value="{{ $product->price ?? 0 }}">
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
                                @if ($value->ltitle == 'Colors')
                                    <div class="mt-5 mb-5">
                                        <div class="colors-title">{{ $value1->ltitle }}</div>
                                    </div>
                                @else
                                    <div class="btn options-boat dropdown-toggle mt-5 mb-15" data-bs-toggle="collapse"
                                         href="#collapse{{ $key1 }}"
                                         aria-expanded="{{ $key1 == 0 ? 'true' : 'false' }}">
                                        <div class="title">{{ $value1->ltitle }}</div>
                                    </div>
                                @endif
                                <div class="collapse {{ $key1 == 0 || $value->ltitle == 'Colors' ? 'show' : '' }}"
                                     id="collapse{{ $key1 }}">
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
                                                   style="background-color: {{ $option->color ?: '#ffffff' }};">
                                                <div class="tick-icon"><img
                                                            src="{{ asset('/storage/check_circle.png') }}">
                                                </div>
                                                <div class="color-name">{{ $option->ltitle }}</div>
                                            </label>
                                        @elseif($option->side_layout == 'toggle')
                                            <div class="form-check">
                                                @if ($value->multi_select != 3)
                                                    <input class="form-check-input cat-item-check checkradio"
                                                           name="{{ $value->multi_select == 2 ? 'option[' . $value->type . ']' : 'option[' . $value1->type . ']' }}"
                                                           type="{{ $value->multi_select == 1 ? 'checkbox' : 'radio' }}"
                                                           value="{{ $option->id }}"
                                                           data-typename="{{ $value1->ltitle }}"
                                                           data-type="{{ $value->multi_select == 2 ? $value->type : $value1->type }}"
                                                           data-parent="{{ $option->parent_id }}"
                                                           data-waschecked="{{ $option->is_standard_option == 1 ? 'true' : 'false' }}"
                                                           data-model="{{ asset('storage/' . $option->file) }}"
                                                           id="collapse-{{ $option->id }}"
                                                           {{ $option->is_standard_option == 1 ? 'checked' : '' }}
                                                           data-price="{{ $option->price ?? 0 }}">
                                                @endif


                                                <label class="form-check-label" for="collapse-{{ $option->id }}">
                                                    <div data-bs-toggle="{{ $option->main_image ? 'collapse' : '' }}"
                                                         data-bs-target="#color-details-{{ $option->id }}"
                                                         aria-expanded="false"
                                                         aria-controls="color-details-{{ $option->id }}"
                                                         class="tog {{ $option->main_image ? 'dropdown-toggle' : '' }}">
                                                        {{ $option->ltitle }} ({{ format_price($option->price) }})
                                                    </div>
                                                </label>
                                                {{-- Image to be show if we add then there will be a dropdown on which on clicking image is shown --}}
                                                <div class="collapse" id="color-details-{{ $option->id }}">
                                                    <div class="content-boat">
                                                        <img class="img-fluid img-thumbnail landscape"
                                                             src="{{ RvMedia::getImageUrl($option->main_image) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- color options --}}
                                            {{--                                    @elseif($option->side_layout == 'color') --}}
                                            {{--                                        <label for="{{ $option->id }}" --}}
                                            {{--                                            class="control-label color-picker {{ $option->type }}" --}}
                                            {{--                                            data-color-option-id="{{ $option->id }}" --}}
                                            {{--                                            data-color-option-type="{{ $option->type }}" data-color-picker="true" --}}
                                            {{--                                            data-color-price="{{ $option->price }}">{{ $option->ltitle }}</label> --}}
                                            {{--                                        <input type="hidden" name="option[{{ $option->type }}]" value="" --}}
                                            {{--                                            class="form-control color-picker" --}}
                                            {{--                                            data-color-option-id="{{ $option->id }}" --}}
                                            {{--                                            data-color-option-type="{{ $option->type }}" --}}
                                            {{--                                            data-color-price="{{ $option->price }}"> --}}
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                            @empty
                            @endforelse

                            <div class=" row">
                                <div class="col-8">
                                    <p class="text-center" style="font-size:16px"><b>Sub Total</b>: <span
                                                class="sub-total">{{ format_price($product->price) }}</span></p>
                                    <p class="text-center" style="font-size:16px"><b>VAT 5%</b>: <span
                                                class="vat-price">{{ format_price(($product->price * 5) / 100) }}</span>
                                    </p>
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
                                <button class="btn card-btn" type="button"
                                        data-curval="{{ $categories[$key]->type }}"
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
                        <button type="submit" class="btn card-btn" style="border-radius: unset;">Save &
                            Exit
                        </button>
                        <button type="button" class="btn view-summary">View Your Summary</button>
                        <button type="button" class="btn card-btn submit-btn" style="border-radius: unset;">Book
                            Boat
                            Now
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>For booking confirmation of your Boat, you need to
                        pay {{ format_price(get_ecommerce_setting('down_payment')) }} as a downpayment. This will
                        confirm
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
                    <div class="row m-2">
                        <div class="col-9 text-end">
                            <p><b>Sub Total</b>: <span class="sub-total">{{ format_price($product->price) }}</span>
                            </p>
                            <p><b>VAT 5%</b>: <span
                                        class="vat-price">{{ format_price(($product->price * 5) / 100) }}</span>
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
</div>
<!-- scrolling -->
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    jQuery(function ($) {
        var offset = $('#custom-boat-container').offset().top - 1;
        $('html, body').animate({
            scrollTop: offset
        }, 'slow');
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three/examples/js/controls/OrbitControls.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three/examples/js/loaders/GLTFLoader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three/examples/js/loaders/DRACOLoader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modelPath = '{{ asset('storage/' . $modelPath) }}';
    const container = document.getElementById('Three-model');

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.set(0, 0, 6);
    camera.lookAt(scene.position);

    const renderer = new THREE.WebGLRenderer({
        antialias: true
    });
    renderer.physicallyCorrectLights = true;
    renderer.outputEncoding = THREE.sRGBEncoding;
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.6;
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setClearColor(0x182955);
    renderer.shadowMap.enabled = true;
    renderer.shadowMap.type = THREE.PCFSoftShadowMap;
    container.appendChild(renderer.domElement);

    const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
    directionalLight.position.set(5, 5, 5).normalize();
    directionalLight.castShadow = true;
    scene.add(directionalLight);

    const directionalLight2 = new THREE.DirectionalLight(0xffffff, 0.5);
    directionalLight2.position.set(-5, -5, -5).normalize();
    scene.add(directionalLight2);

    const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
    scene.add(ambientLight);

    const hemiLight = new THREE.HemisphereLight(0xffffff, 0x444444, 0.5);
    scene.add(hemiLight);

    const dracoLoader = new THREE.DRACOLoader();
    dracoLoader.setDecoderPath("https://www.gstatic.com/draco/versioned/decoders/1.4.1/");

    const loader = new THREE.GLTFLoader();
    loader.setDRACOLoader(dracoLoader);

    let baseModel, additionalModels = [];
    let originalMaterials = {};
    let originalColors = {};

    const loadingIndicator = document.getElementById('loader');

    function loadModel(path, targetSize, callback) {
        loadingIndicator.style.display = 'block';
        loader.load(path, function (gltf) {
            const model = gltf.scene;
            model.userData.path = path;

            model.traverse(child => {
                if (child.isMesh) {
                    child.castShadow = true;
                    child.receiveShadow = true;
                    
                    originalMaterials[child.name] = child.material.clone();
                    originalColors[child.name] = child.material.color.clone();
                    
                    const newMaterial = new THREE.MeshStandardMaterial({
                        color: child.material.color,
                        metalness: 0.5,
                        roughness: 0.5
                    });
                    child.material = newMaterial;
                }
            });

            const bbox = new THREE.Box3().setFromObject(model);
            const size = new THREE.Vector3();
            bbox.getSize(size);
            const maxDimension = Math.max(size.x, size.y, size.z);
            const scaleFactor = targetSize / maxDimension;
            model.scale.set(scaleFactor, scaleFactor, scaleFactor);
            bbox.setFromObject(model);
            const center = new THREE.Vector3();
            bbox.getCenter(center);

            model.position.x -= center.x;
            model.position.y -= center.y;
            model.position.z -= center.z;

            callback(model);
            loadingIndicator.style.display = 'none';
        }, undefined, function (error) {
            console.error('Error loading model:', path, error);
            loadingIndicator.style.display = 'none';
        });
    }

    function calculateTargetSize() {
        return window.innerWidth < 768 ? 6 : 12;
    }

    loadingIndicator.style.display = 'block';
    loadModel(modelPath, calculateTargetSize(), function (model) {
        baseModel = model;
        scene.add(baseModel);
        loadingIndicator.style.display = 'none';

        function handleCheckboxClick(input) {
            const modelPath = input.dataset.model;
            const isChecked = input.checked;
            toggleAdditionalModel(modelPath, isChecked);
        }

        let previousSelectedRadio = {};

        function handleRadioClick(input) {
            const modelPath = input.dataset.model;
            const radioGroupName = input.name;
            let isDeselecting = input === previousSelectedRadio[radioGroupName];

            if (input.classList.contains('checkradio')) {
                document.querySelectorAll(`input[name="${radioGroupName}"]`).forEach(radio => {
                    const otherModelPath = radio.dataset.model;
                    const modelIndex = additionalModels.findIndex(m => m.userData.path === otherModelPath);
                    if (modelIndex !== -1) {
                        scene.remove(additionalModels[modelIndex]);
                        additionalModels.splice(modelIndex, 1);
                    }

                    const modelPart = radio.dataset.typename.split(' ')[0].toLowerCase();
                    resetColor(modelPart);
                });

                if (isDeselecting) {
                    previousSelectedRadio[radioGroupName] = null;
                } else if (input.checked) {
                    toggleAdditionalModel(modelPath, true);
                    previousSelectedRadio[radioGroupName] = input;
                }
            }
        }

        document.querySelectorAll('.cat-item-check').forEach(input => {
            if (input.type === 'checkbox') {
                handleCheckboxClick(input);
            } else if (input.type === 'radio') {
                handleRadioClick(input);
            }
            input.addEventListener('click', function () {
                if (this.type === 'checkbox') {
                    handleCheckboxClick(this);
                } else if (this.type === 'radio') {
                    handleRadioClick(this);
                }
            });
        });

        document.querySelectorAll('.color-box').forEach(label => {
            label.addEventListener('click', function () {
                const input = document.getElementById(this.htmlFor);
                const modelPart = input.dataset.typename.split(' ')[0].toLowerCase();

                if (input.checked) {
                    input.checked = false;
                    resetColor(modelPart);
                } else {
                    input.checked = true;
                    applyColorChange(this.style.backgroundColor, input);
                }
            });
        });
    });

    function toggleAdditionalModel(path, add) {
        if (add) {
            loadingIndicator.style.display = 'block';
            loadModel(path, 4, function (model) {
                additionalModels.push(model);
                if (baseModel) {
                    model.position.copy(baseModel.position);
                    model.scale.copy(baseModel.scale);
                }
                scene.add(model);
                loadingIndicator.style.display = 'none';
            });
        } else {
            const modelIndex = additionalModels.findIndex(m => m.userData.path === path);
            if (modelIndex !== -1) {
                scene.remove(additionalModels[modelIndex]);
                additionalModels.splice(modelIndex, 1);
            }
        }
    }

    function applyColorChange(color, input) {
        const colorOptionId = input.value;
        const colorTitle = input.dataset.typename;

        if (colorOptionId && colorTitle) {
            const colorSelected = new THREE.Color(color);
            const titleToMatch = colorTitle.split(' ')[0].toLowerCase();

            function applyColorToModel(model) {
                model.traverse(child => {
                    if (child.isMesh && child.material) {
                        if (!originalColors[child.name]) {
                            originalColors[child.name] = child.material.color.clone();
                        }
                        child.material.color.set(colorSelected);
                    }
                });
            }

            if (typeof additionalModels !== 'undefined') {
                additionalModels.forEach(model => {
                    const modelLabel = model.userData.path.toLowerCase();
                    if (modelLabel.includes(titleToMatch)) {
                        applyColorToModel(model);
                    }
                });
            }

            if (typeof baseModel !== 'undefined') {
                baseModel.traverse(child => {
                    if (child.name) {
                        const childName = child.name.trim().toLowerCase();
                        if (childName.includes(titleToMatch)) {
                            applyColorToModel(child);
                        }
                    }
                });
            }
        } else {
            console.error('Color option ID or title not found.');
        }
    }

    function resetColor(modelPart) {
        function resetModelColor(model) {
            model.traverse(child => {
                if (child.isMesh && child.material && originalColors[child.name]) {
                    child.material.color.copy(originalColors[child.name]);
                }
            });
        }

        if (typeof additionalModels !== 'undefined') {
            additionalModels.forEach(model => {
                const modelLabel = model.userData.path.toLowerCase();
                if (modelLabel.includes(modelPart)) {
                    resetModelColor(model);
                }
            });
        }

        if (typeof baseModel !== 'undefined') {
            baseModel.traverse(child => {
                if (child.name) {
                    const childName = child.name.trim().toLowerCase();
                    if (childName.includes(modelPart)) {
                        resetModelColor(child);
                    }
                }
            });
        }
    }

    const controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.05;
    controls.minDistance = 3;
    controls.maxDistance = 10;
    controls.enabled = false;
    container.addEventListener('pointerenter', () => {
        controls.enabled = true;
    });
    container.addEventListener('pointerleave', () => {
        controls.enabled = false;
    });

    function animate() {
        requestAnimationFrame(animate);
        controls.update();
        renderer.render(scene, camera);
    }

    animate();

    function updateTotalPrice() {
        const currency = "<?php echo get_application_currency()['symbol']; ?>";
        const vatPrice = (totalPrice * 5) / 100;
        const vatTotal = totalPrice + vatPrice;

        $('.sub-total').text(totalPrice.toLocaleString('en-US') + currency);
        $('.vat-price').text(vatPrice.toLocaleString('en-US') + currency);
        $('.vat-total').text(vatTotal.toLocaleString('en-US') + currency);
        $('input[name="total_price"]').val(totalPrice);
    }
});
</script>
