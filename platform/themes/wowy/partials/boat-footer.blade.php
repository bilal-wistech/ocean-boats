<footer class="main">
    <section class="section-padding-60">
        <div class="container">
            <div class="row">
                {!! dynamic_sidebar('footer_sidebar') !!}
            </div>
        </div>
    </section>
    <div class="container pb-20 wow fadeIn animated">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm mb-0">{{ theme_option('copyright') }} {{ __('All rights reserved.') }}</p>
            </div>
            {{-- <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm mb-0">
                    Made with <i class="fa fa-heart" style="color:red"></i> Wisdom
                </p>
            </div> --}}
        </div>
    </div>
</footer>

<!-- Quick view -->
<div class="modal fade custom-modal" id="quick-view-modal" tabindex="-1" aria-labelledby="quick-view-modal-label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="half-circle-spinner loading-spinner">
                    <div class="circle circle-1"></div>
                    <div class="circle circle-2"></div>
                </div>
                <div class="quick-view-content"></div>
            </div>
        </div>
    </div>
</div>

@if (is_plugin_active('ecommerce'))
    <script>
        window.currencies = {!! json_encode(get_currencies_json()) !!};
    </script>
@endif

{!! Theme::footer() !!}

<script>
    window.trans = {
        "Views": "{{ __('Views') }}",
        "Read more": "{{ __('Read more') }}",
        "days": "{{ __('days') }}",
        "hours": "{{ __('hours') }}",
        "mins": "{{ __('mins') }}",
        "sec": "{{ __('sec') }}",
        "No reviews!": "{{ __('No reviews!') }}"
    };
</script>

{!! Theme::place('footer') !!}

@if (session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
    <script type="text/javascript">
        window.onload = function () {
            @if (session()->has('success_msg'))
            window.showAlert('alert-success', '{{ session('success_msg') }}');
            @endif

            @if (session()->has('error_msg'))
            window.showAlert('alert-danger', '{{ session('error_msg') }}');
            @endif

            @if (isset($error_msg))
            window.showAlert('alert-danger', '{{ $error_msg }}');
            @endif

            @if (isset($errors))
            @foreach ($errors->all() as $error)
            window.showAlert('alert-danger', '{!! BaseHelper::clean($error) !!}');
            @endforeach
            @endif
        };
    </script>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const colorPickers = document.querySelectorAll('[data-color-picker="true"]');

        colorPickers.forEach(pickerElement => {
            const pickr = Pickr.create({
                el: pickerElement,
                theme: 'classic',
                swatches: [
                    'rgba(244, 67, 54, 1)',
                    'rgba(233, 30, 99, 0.95)',
                    'rgba(156, 39, 176, 0.9)',
                    'rgba(103, 58, 183, 0.85)',
                    'rgba(63, 81, 181, 0.8)',
                    'rgba(33, 150, 243, 0.75)',
                    'rgba(3, 169, 244, 0.7)',
                    'rgba(0, 188, 212, 0.7)',
                    'rgba(0, 150, 136, 0.75)',
                    'rgba(76, 175, 80, 0.8)',
                    'rgba(139, 195, 74, 0.85)',
                    'rgba(205, 220, 57, 0.9)',
                    'rgba(255, 235, 59, 0.95)',
                    'rgba(255, 193, 7, 1)'
                ],
                components: {
                    preview: true,
                    opacity: true,
                    hue: true,
                    interaction: {
                        hex: true,
                        rgba: true,
                        input: true,
                        clear: true,
                        save: true
                    }
                }
            });

            pickr.on('save', (color, instance) => {
                const colorOptionId = pickerElement.getAttribute('data-color-option-id');
                const colorType = pickerElement.getAttribute('data-color-option-type');
                const colorPrice = pickerElement.getAttribute('data-color-price'); // Add this line to get the price attribute

                if (colorOptionId && colorType) {
                    const colorSelected = color.toHEXA().toString();
                    const inputName = `option[${colorType}]`;
                    const inputElement = document.querySelector(`input[name="${inputName}"]`);

                    if (inputElement) {
                        inputElement.value = `${colorOptionId}-${colorSelected}`;
                        updateTotalPrice(colorPrice); // Add this line to update the total price
                    } else {
                        console.error(`Input element with name ${inputName} not found.`);
                    }
                } else {
                    console.error('Color option ID or type not found.');
                }
            });
        });
    });

    function updateTotalPrice(colorPrice) {
        let totalPrice = parseFloat($('input[name="total_price"]').val());
        totalPrice += parseFloat(colorPrice);

        const currency = "<?php echo get_application_currency()['symbol']; ?>";
        const vatPrice = (totalPrice * 5) / 100;
        const vatTotal = totalPrice + vatPrice;

        $('.sub-total').text(totalPrice.toLocaleString('en-US') + currency);
        $('.vat-price').text(vatPrice.toLocaleString('en-US') + currency);
        $('.vat-total').text(vatTotal.toLocaleString('en-US') + currency);
        $('input[name="total_price"]').val(totalPrice);
    }

</script>
<script>

    // boats page thing for the boat category.....
    $(document).on('click', '.boat-category', function (e) {
        e.preventDefault();
        const $this = $(e.currentTarget);
        const href = $this.attr('data-value');
        $(".list-content-loading").show();
        $.ajax({
            url: href,
            success: function (data) {
                console.log(data);
                $(".list-content-loading").show();
                $('.products-listing').empty();
                $('.products-listing').append(data['data']);
            }
        });
        // window.location.href = href;
    });

    var url = "<?php echo url('/'); ?>";

    $(document).ready(function () {
        // $('.dropdown-item').on('click', function() {
        //     $('.dropdown-item').removeClass('active');
        //     $(this).addClass('active');
        //     $('.dropdown-toggle').text($(this).text());
        //     $('.tab-pane').removeClass('show active');
        //     $($(this).data('bs-target')).addClass('show active');
        // });

        $('body').on('click', '.card-btn', function () {
            val = $(this).data('value');
            curval = $(this).data('curval');
            $('.card-' + val).removeClass('d-none');
            $('.card-' + curval).addClass('d-none');

            if ($(this).hasClass('prv')) {
                $('.cat-' + curval).removeClass('selected');
                $('.card-' + val).removeClass('d-none');
                $('.card-' + curval).addClass('d-none');
            }
            $('.cat-' + val).addClass('selected');
        });
        $('.dropdown').hover(function () {
            $(this).find('.dropdown-menu').addClass('show');
            $(this).find('.dropdown-toggle').attr('aria-expanded', 'true');
        }, function () {
            $(this).find('.dropdown-menu').removeClass('show');
            $(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
        });
        $('.dropdown-menu').mouseleave(function () {
            $(this).removeClass('show');
            $(this).prev('.dropdown-toggle').attr('aria-expanded', 'false');
        });

        // $('body').on('click','input[type="radio"]',function(){
        //     var src=url+'/storage/'+'transparent-pic-150x150.png';
        //     var value = $(this).val();
        //     var parent = $(this).data('parent');
        //     var type = $(this).attr('name');
        //     if($(this).prop('checked') && $(this).attr('data-waschecked')=='true'){
        //         $('input[type="'+type+'"]').attr('data-waschecked', false);
        //         $(this).attr('data-waschecked', false);
        //         $(this).prop('checked', false);
        //         $('.cat-'+parent+'-img1').find('img').attr('src',src);
        //         $('.cat-'+parent+'-img2').find('img').attr('src',src);
        //         $('.cat-'+parent+'-img3').find('img').attr('src',src);
        //     }else{
        //         $.ajax({
        //             type: "Post",
        //             url: url+"/customize-type-content",
        //             data: {
        //                 value:value,
        //             },
        //             success: function(data){
        //                 var src1=url+'/storage/'+data['image'][1];
        //                 $('.cat-'+parent+'-img1').find('img').attr('src',src1);
        //                 var src2=url+'/storage/'+data['image'][2];
        //                 $('.cat-'+parent+'-img2').find('img').attr('src',src2);
        //                 var src3=url+'/storage/'+data['image'][3];
        //                 $('.cat-'+parent+'-img3').find('img').attr('src',src3);
        //                 var html=`<div class="card m-2 p-2"><div class="card-body text-center"><p><b>Color</b></p><p>Green</p><p><b>Price</b> : $120.00</p></div></div>`;
        //                 $('#summary-end').append(html);
        //             }
        //         });
        //         $('input[type="'+type+'"]').attr('data-waschecked', false);
        //         $(this).attr('data-waschecked', true);
        //         $(this).prop('checked', true);
        //     }
        // });

        $('#summary-end').hide();
        var price = 0;
        var currency = "<?php echo get_application_currency()['symbol']; ?>";
        var boat_price = $('input[name="boat_price"]').val();
        var total_price = 0;
        var vat_price = 0;
        var vat_total = 0;

        function calculateInitialPrice() {
            var standardOptions = $('input[type="checkbox"][data-waschecked="true"], input[type="radio"][data-waschecked="true"]');
            standardOptions.each(function () {
                var value = $(this).val();
                $.ajax({
                    type: "Post",
                    url: url + "/customize-type-content",
                    data: {
                        value: value,
                    },
                    async: false, // To ensure price is calculated before moving on
                    success: function (data) {
                        price += parseFloat(data['price']);
                        // Add the item to the summary
                        var html = generateSummaryHTML(data, value, $(this).attr('data-typename'), $(this).attr('data-type'));
                        $('#summary-end .summary-card').append(html);
                    }
                });
            });
            updateTotalPrice();
        }

        function generateSummaryHTML(data, value, typename, type) {
            return `<div id=${value} class="shadow card m-2 ${type}">
                <div class="head-cat card-header"><p class="text-center"><b>${typename}</b></p></div>
                <div class="card-body text-center"><div class="spacing">
                    <p>${data['ltitle']}</p>
                    ${data['main_image'] ? `<img class="img-fluid img-thumbnail landscape2" src="${url}/storage/${data['main_image']}">` : ''}
                    <p><b>Price</b> : <span class="price">${Math.trunc(data['price']).toLocaleString('en-US')}${currency}</span></p>
                </div></div>
            </div>`;
        }

        function updateTotalPrice() {
            total_price = parseFloat(boat_price) + parseFloat(price);
            $('.sub-total').text(total_price.toLocaleString('en-US') + currency);
            vat_price = (total_price * 5) / 100;
            $('.vat-price').text(vat_price.toLocaleString('en-US') + currency);
            vat_total = total_price + vat_price;
            $('.vat-total').text(vat_total.toLocaleString('en-US') + currency);
            $('input[name="total_price"]').val(total_price);
        }

        $(document).ready(function () {
            calculateInitialPrice();
        });

// events for clicking the radio buttons in the boat selection field
        $('body').on('click', 'input[type="radio"]', function () {
            var src = url + '/storage/' + 'transparent-pic-150x150.png';
            var value = $(this).val();
            var parent = $(this).data('parent');
            var typename = $(this).attr('data-typename');
            var type = $(this).attr('data-type');

            if ($(this).prop('checked') && $(this).attr('data-waschecked') == 'true') {
                // If unchecking a standard option, don't allow it
                $(this).prop('checked', true);
                return;
            }

            if ($(this).prop('checked') && $(this).attr('data-waschecked') == 'true') {
                $('input[type="option[' + type + ']"]').attr('data-waschecked', false);
                $(this).attr('data-waschecked', false);
                $(this).prop('checked', false);
                $('.cat-' + parent + '-img1').find('img').attr('src', src);
                $('.cat-' + parent + '-img2').find('img').attr('src', src);
                $('.cat-' + parent + '-img3').find('img').attr('src', src);
                if ($('.cat-' + parent + '-img4').length) {
                    $('.cat-' + parent + '-img4').find('img').attr('src', src);
                }
                var prev_div = $('#summary-end .summary-card .' + type);
                if (prev_div.length) {
                    var prev_price = prev_div.find('.price').text();
                    prev_price = prev_price.replace(",", "");
                    price -= parseFloat(prev_price);
                    prev_div.remove();
                    updateTotalPrice();
                }
            } else {
                $.ajax({
                    type: "Post",
                    url: url + "/customize-type-content",
                    data: {
                        value: value,
                    },
                    success: function (data) {
                        if (data['preview_enabled']) {
                            var src1 = url + '/storage/' + data['image'][1];
                            $('.cat-' + parent + '-img1').find('img').attr('src', src1);
                            var src2 = url + '/storage/' + data['image'][2];
                            $('.cat-' + parent + '-img2').find('img').attr('src', src2);
                            var src3 = url + '/storage/' + data['image'][3];
                            $('.cat-' + parent + '-img3').find('img').attr('src', src3);
                            if (data['image'].hasOwnProperty(4)) {
                                var src4 = url + '/storage/' + data['image'][4];
                                $('.cat-' + parent + '-img4').find('img').attr('src', src4);
                            }
                        }

                        var html = generateSummaryHTML(data, value, typename, type);
                        var prev_div = $('#summary-end .summary-card .' + type);
                        if (prev_div.length) {
                            var prev_price = prev_div.find('.price').text();
                            prev_price = prev_price.replace(",", "");
                            price -= parseFloat(prev_price);
                            prev_div.remove();
                        }
                        $('#summary-end .summary-card').append(html);

                        price += parseFloat(data['price']);
                        updateTotalPrice();
                    }
                });
                $('input[type="option[' + type + ']"]').attr('data-waschecked', false);
                $(this).attr('data-waschecked', true);
                $(this).prop('checked', true);
            }
        });

        $('body').on('click', 'input[type="checkbox"]', function () {
            var src = url + '/storage/' + 'transparent-pic-150x150.png';
            var value = $(this).val();
            var parent = $(this).data('parent');
            var typename = $(this).attr('data-typename');
            var type = $(this).attr('data-type');

            if ($(this).attr('data-waschecked') == 'true') {
                // If unchecking a standard option, don't allow it
                $(this).prop('checked', true);
                return;
            }

            if ($(this).is(':checked')) {
                $.ajax({
                    type: "Post",
                    url: url + "/customize-type-content",
                    data: {
                        value: value,
                    },
                    success: function (data) {
                        if (data['preview_enabled']) {
                            var src1 = url + '/storage/' + data['image'][1];
                            $('.cat-' + value + '-img1').find('img').attr('src', src1);
                            var src2 = url + '/storage/' + data['image'][2];
                            $('.cat-' + value + '-img2').find('img').attr('src', src2);
                            var src3 = url + '/storage/' + data['image'][3];
                            $('.cat-' + value + '-img3').find('img').attr('src', src3);
                            if (data['image'].hasOwnProperty(4)) {
                                var src4 = url + '/storage/' + data['image'][4];
                                $('.cat-' + value + '-img4').find('img').attr('src', src4);
                            }
                        }
                        var html = generateSummaryHTML(data, value, typename, type);
                        $('#summary-end .summary-card').append(html);

                        price += parseFloat(data['price']);
                        updateTotalPrice();
                    }
                });
            } else {
                $('.cat-' + value + '-img1').find('img').attr('src', src);
                $('.cat-' + value + '-img2').find('img').attr('src', src);
                $('.cat-' + value + '-img3').find('img').attr('src', src);
                if ($('.cat-' + value + '-img4').length) {
                    $('.cat-' + value + '-img4').find('img').attr('src', src);
                }

                var prev_div = $('#summary-end .summary-card #' + value);
                if (prev_div.length) {
                    var prev_price = prev_div.find('.price').text();
                    prev_price = prev_price.replace(",", "");
                    price -= parseFloat(prev_price);
                    prev_div.remove();
                    updateTotalPrice();
                }
            }
        });

        $('body').on('click', '.view-summary', function () {
            $('#summary-end').show();
            $('html, body').animate({
                scrollTop: $('#summary-end').offset().top
            }, 1000);
        });

        $('body').on('click', '.submit-btn', function () {
            $("input[name='redirect_url_pay']").val(1);
            $('#exampleModal').modal('show');
        });

        $('body').on('click', '#submit-boot', function () {
            // Add the "button-loading" class to the button
            $(this).addClass("button-loading");
            $('#submit-form').submit();
            setTimeout(function () {
                $('#submit-boot').removeClass("button-loading");
            }, 3000);
        });

    })

</script>


<div id="scrollUp"><i class="fal fa-long-arrow-up"></i></div>
</body>
</html>
