@php use NaeemAwan\PredefinedLists\Models\PredefinedList; @endphp
@extends(Theme::getThemeNamespace() . '::views.ecommerce.customers.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Saved Boat details') }}</h5>
        </div>
        <div class="card-body">
            <div class="customer-order-detail">
                <div class="row">
                    <div class="col-auto me-auto">
                        <div class="order-slogan">
                            @php
                                $logo = theme_option('logo_in_the_checkout_page') ?: theme_option('logo');
                            @endphp
                            @if ($logo)
                                <img width="100" src="{{ RvMedia::getImageUrl($logo) }}"
                                     alt="{{ theme_option('site_title') }}">
                                <br/>
                            @endif
                            {{ setting('contact_address') }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="order-meta">
                            <span class="d-inline-block">{{ __('Time') }}:</span>
                            <strong class="order-detail-value">{{ $boat->created_at->format('h:m d/m/Y') }}</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 border-top pt-2">
                        <h4>{{ __('Boat information') }}</h4>
                        <div>
                            <div>
                                <span class="d-inline-block">{{ __('Boat Name') }}:</span>
                                <strong class="order-detail-value">{{ $boat->boat->ltitle }}</strong>
                            </div>
                            <div>
                                <span class="d-inline-block">{{ __('Boat Price') }}:</span>
                                <strong class="order-detail-value"> {{ format_price($boat->boat->price) }} </strong>
                            </div>
                        </div>

                        <h4 class="mt-3 mb-1">{{ __('Final Model') }}</h4>
                        @php
                            $modelPath = $boat->boat->file;
                        @endphp
                        <div class="row">
                            {{--3d model div starts --}}
                            <div id="3d-model" style="width: 100%; height: 500px;"></div>
                            {{--3d model div ends --}}

                            <h4 class="mt-3 mt-50">{{ __('Options Selected') }}</h4>
                            <div class="card-body summary-card justify-content-center d-flex flex-row flex-wrap">
                                @foreach($boat->details as $key=>$value)
                                    <div class="card m-1">
                                        <div class="card-body text-center">
                                            <p>
                                                <b>{{ $value->slug->ltitle }}:</b>
                                                @if($value->slug->parent)
                                                    <span>
                                                        @if($value->color)
                                                            <span style="background-color: {{ $value->color }};">{{ $value->ltitle }}</span>
                                                        @else
                                                            {{ $value->ltitle }}
                                                        @endif
                                                        @if($value->is_standard_option == 1)
                                                            <small>(Standard Option)</small>
                                                        @endif
                                                </span>
                                            @endif
                                            <p><b>Price</b> : {{ format_price($value->enquiry_option->price) }}</p>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <h4 class="mt-3 mb-1">{{ __('Total') }}</h4>
                        <div>
                            <div>
                                <span class="d-inline-block">{{ __('Total Price Included Vat') }}:</span>
                                <strong class="order-detail-value">{{ format_price($boat->vat_total) }}</strong>
                            </div>
                            @if($boat->is_finished)
                                <hr/>
                                <div>
                                    <span class="d-inline-block">{{ __('Paid') }}:</span>
                                    <strong class="order-detail-value">{{ format_price($boat->paid_amount) }}</strong>
                                </div>
                                <div>
                                    <span class="d-inline-block">{{ __('Remaining') }}:</span>
                                    <strong class="order-detail-value">{{ format_price($boat->vat_total - $boat->paid_amount) }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three/examples/js/controls/OrbitControls.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three/examples/js/loaders/GLTFLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three/examples/js/loaders/DRACOLoader.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modelPath = '{{ asset('storage/' . $modelPath) }}';
            const container = document.getElementById('3d-model');

            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
            camera.position.set(0, 0, 6);
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

            let baseModel, additionalModels = [];

            function loadModel(path, targetSize = 8, callback) {
                loader.load(path, function (gltf) {
                    const model = gltf.scene;
                    model.userData.path = path;
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
                }, undefined, function (error) {
                    console.error('Error loading model:', path, error);
                });
            }

            loadModel(modelPath, 8, function (model) {
                baseModel = model;
                scene.add(baseModel);

                document.querySelectorAll('.cat-item-check').forEach(input => {
                    if (input.getAttribute('data-waschecked') === 'true') {
                        const modelPath = input.dataset.model;
                        toggleAdditionalModel(modelPath, true);
                    }
                    input.addEventListener('click', function () {
                        const modelPath = this.dataset.model;
                        const wasChecked = this.getAttribute('data-waschecked') === 'false';
                        if (wasChecked) {
                            toggleAdditionalModel(modelPath, true);
                        } else {
                            toggleAdditionalModel(modelPath, false);
                        }
                    });
                });
            });

            function toggleAdditionalModel(path, add) {
                if (add) {
                    loadModel(path, 4, function (model) {
                        additionalModels.push(model);
                        if (baseModel) {
                            model.position.copy(baseModel.position);
                            model.scale.copy(baseModel.scale);
                        }
                        scene.add(model);
                    });
                } else {
                    const modelIndex = additionalModels.findIndex(m => m.userData.path === path);
                    if (modelIndex !== -1) {
                        scene.remove(additionalModels[modelIndex]);
                        additionalModels.splice(modelIndex, 1);
                    }
                }
            }

            const controls = new THREE.OrbitControls(camera, renderer.domElement);
            controls.enableDamping = false;
            controls.minDistance = 3;
            controls.maxDistance = 13;

            function animate() {
                requestAnimationFrame(animate);
                renderer.render(scene, camera);
                controls.update();
            }

            animate();
        });

    </script>
@endsection
