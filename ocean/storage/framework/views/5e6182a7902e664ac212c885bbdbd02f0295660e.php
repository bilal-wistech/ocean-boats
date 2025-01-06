<footer class="main">
        <section class="section-padding-60">
            <div class="container">
                <div class="row">
                    <?php echo dynamic_sidebar('footer_sidebar'); ?>

                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm mb-0"><?php echo e(theme_option('copyright')); ?> <?php echo e(__('All rights reserved.')); ?></p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm mb-0">
                        Made with <i class="fa fa-heart" style="color:red"></i> Wisdom
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Quick view -->
    <div class="modal fade custom-modal" id="quick-view-modal" tabindex="-1" aria-labelledby="quick-view-modal-label" aria-hidden="true">
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

    <?php if(is_plugin_active('ecommerce')): ?>
        <script>
            window.currencies = <?php echo json_encode(get_currencies_json()); ?>;
        </script>
    <?php endif; ?>

    <?php echo Theme::footer(); ?>


    <script>
        window.trans = {
            "Views": "<?php echo e(__('Views')); ?>",
            "Read more": "<?php echo e(__('Read more')); ?>",
            "days": "<?php echo e(__('days')); ?>",
            "hours": "<?php echo e(__('hours')); ?>",
            "mins": "<?php echo e(__('mins')); ?>",
            "sec": "<?php echo e(__('sec')); ?>",
            "No reviews!": "<?php echo e(__('No reviews!')); ?>"
        };
    </script>

    <?php echo Theme::place('footer'); ?>


    <?php if(session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg)): ?>
            <script type="text/javascript">
                window.onload = function () {
                    <?php if(session()->has('success_msg')): ?>
                    window.showAlert('alert-success', '<?php echo e(session('success_msg')); ?>');
                    <?php endif; ?>

                    <?php if(session()->has('error_msg')): ?>
                    window.showAlert('alert-danger', '<?php echo e(session('error_msg')); ?>');
                    <?php endif; ?>

                    <?php if(isset($error_msg)): ?>
                    window.showAlert('alert-danger', '<?php echo e($error_msg); ?>');
                    <?php endif; ?>

                    <?php if(isset($errors)): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    window.showAlert('alert-danger', '<?php echo BaseHelper::clean($error); ?>');
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                };
            </script>
        <?php endif; ?>
        
        <script>


            $(document).on('click', '.boat-category', function (e) {
                e.preventDefault();
                const $this = $(e.currentTarget);
                const href = $this.attr('data-value');
                $(".list-content-loading").show();
                $.ajax({
                    url: href,
                    success: function(data){
                        console.log(data);
                        $(".list-content-loading").show();
                        $('.products-listing').empty();
                        $('.products-listing').append(data['data']);
                    }
                });
                // window.location.href = href;
            });

            var url="<?php echo url('/'); ?>";

            $(document).ready(function() {
                $('.dropdown-item').on('click', function() {
                    $('.dropdown-item').removeClass('active');
                    $(this).addClass('active');
                    $('.dropdown-toggle').text($(this).text());
                    $('.tab-pane').removeClass('show active');
                    $($(this).data('bs-target')).addClass('show active');
                });

                $('body').on('click','.card-btn',function(){
                    val=$(this).data('value');
                    curval=$(this).data('curval');
                    $('.card-'+val).removeClass('d-none');
                    $('.card-'+curval).addClass('d-none');

                    if ($(this).hasClass('prv')) {
                       $('.cat-'+curval).removeClass('selected'); 
                       $('.card-'+val).removeClass('d-none');
                       $('.card-'+curval).addClass('d-none'); 
                    }
                    $('.cat-'+val).addClass('selected'); 
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
                var price=0;
                var currency = "<?php echo get_application_currency()['symbol']; ?>"
                var boat_price=$('input[name="boat_price"]').val();
                var total_price=0;
                var vat_price = 0;
                var vat_total = 0;
                $('body').on('click','input[type="radio"]',function(){
                    var src=url+'/storage/'+'transparent-pic-150x150.png';
                    var value = $(this).val();
                    var parent = $(this).data('parent');
                    var typename = $(this).attr('data-typename');
                    var type = $(this).attr('data-type');
                    if($(this).prop('checked') && $(this).attr('data-waschecked')=='true'){
                        $('input[type="option['+type+']"]').attr('data-waschecked', false);
                        $(this).attr('data-waschecked', false);
                        $(this).prop('checked', false);
                        $('.cat-'+parent+'-img1').find('img').attr('src',src);
                        $('.cat-'+parent+'-img2').find('img').attr('src',src);
                        $('.cat-'+parent+'-img3').find('img').attr('src',src);
                        if($('.cat-'+parent+'-img4').length){
                            $('.cat-'+parent+'-img4').find('img').attr('src',src);
                        }
                        var prev_div = $('#summary-end .summary-card .' + type);
                        if (prev_div.length) {
                            var prev_price = prev_div.find('.price').text();
                            prev_price = prev_price.replace(",", "");
                            price -= parseFloat(prev_price);
                            prev_div.remove();
                            total_price = parseFloat(boat_price) + parseFloat(price);
                            $('.sub-total').text(total_price.toLocaleString('en-US')+currency);
                            vat_price = (total_price * 5)/100;
                            $('.vat-price').text(vat_price.toLocaleString('en-US')+currency);
                            vat_total = total_price + vat_price;
                            $('.vat-total').text(vat_total.toLocaleString('en-US')+currency);
                            $('input[name="total_price"]').val(total_price);
                        }
                    }else{
                        $.ajax({
                            type: "Post",
                            url: url+"/customize-type-content",
                            data: {
                                value:value,
                            },
                            success: function(data){
                                if(data['preview_enabled']){
                                    var src1=url+'/storage/'+data['image'][1];
                                    $('.cat-'+parent+'-img1').find('img').attr('src',src1);
                                    var src2=url+'/storage/'+data['image'][2];
                                    $('.cat-'+parent+'-img2').find('img').attr('src',src2);
                                    var src3=url+'/storage/'+data['image'][3];
                                    $('.cat-'+parent+'-img3').find('img').attr('src',src3);
                                    if(data['image'].hasOwnProperty(4)){
                                        var src4=url+'/storage/'+data['image'][4];
                                        $('.cat-'+parent+'-img4').find('img').attr('src',src4);
                                    }
                                }
                            
                            var html=`<div id=`+value+` class="shadow card m-2 `+type+`"><div class="head-cat card-header"><p class="text-center"><b>`+typename+`</b></p></div><div class="card-body text-center"><div class="spacing"><p>`+data['ltitle']+`</p>`;
                            if(data['main_image']){
                                html=html+`<img class="img-fluid img-thumbnail landscape2" src="`+url+'/storage/'+data['main_image']+`">`;
                            }
                            html=html+`<p><b>Price</b> : <span class="price">`+Math.trunc(data['price']).toLocaleString('en-US')+currency+`</span></p></div></div>`;
                            var prev_div = $('#summary-end .summary-card .' + type);
                            if (prev_div.length) {
                                var prev_price = prev_div.find('.price').text();
                                prev_price = prev_price.replace(",", "");
                                price -= parseFloat(prev_price);
                                prev_div.remove();
                            }
                            $('#summary-end .summary-card').append(html);

                            price +=  parseFloat(data['price']);
                            total_price = parseFloat(boat_price) + parseFloat(price);
                            $('.sub-total').text(total_price.toLocaleString('en-US')+currency);
                            vat_price = (total_price * 5)/100;
                            $('.vat-price').text(vat_price.toLocaleString('en-US')+currency);
                            vat_total = total_price + vat_price;
                            $('.vat-total').text(vat_total.toLocaleString('en-US')+currency);
                            $('input[name="total_price"]').val(total_price);
                        }
                    });
                    $('input[type="option['+type+']"]').attr('data-waschecked', false);
                    $(this).attr('data-waschecked', true);
                    $(this).prop('checked', true); 
                    }
                });

                $('body').on('click','input[type="checkbox"]',function(){
                    var src=url+'/storage/'+'transparent-pic-150x150.png';
                    var value = $(this).val();
                    var parent = $(this).data('parent');
                    var typename = $(this).attr('data-typename');
                    var type = $(this).attr('data-type');
                    if ($(this).is(':checked')) {
                    $.ajax({
                        type: "Post",
                        url: url+"/customize-type-content",
                        data: {
                            value:value,
                        },
                        success: function(data){
                            if(data['preview_enabled']){
                                var src1=url+'/storage/'+data['image'][1];
                                $('.cat-'+value+'-img1').find('img').attr('src',src1);
                                var src2=url+'/storage/'+data['image'][2];
                                $('.cat-'+value+'-img2').find('img').attr('src',src2);
                                var src3=url+'/storage/'+data['image'][3];
                                $('.cat-'+value+'-img3').find('img').attr('src',src3);
                                if(data['image'].hasOwnProperty(4)){
                                    var src4=url+'/storage/'+data['image'][4];
                                    $('.cat-'+value+'-img4').find('img').attr('src',src4);
                                }
                            }
                            var html=`<div id=`+value+` class="shadow card m-2 `+type+`"><div class="head-cat card-header"><p class="text-center"><b>`+typename+`</b></p></div><div class="card-body text-center"><div class="spacing"><p>`+data['ltitle']+`</p>`;
                            if(data['main_image']){
                                html=html+`<img class="img-fluid img-thumbnail landscape2" src="`+url+'/storage/'+data['main_image']+`">`;
                            }
                            html=html+`<p><b>Price</b> : <span class="price">`+Math.trunc(data['price']).toLocaleString('en-US')+currency+`</span></p></div></div>`;
                            var prev_div = $('#summary-end .summary-card .' + type);
                            $('#summary-end .summary-card').append(html);

                            price +=  parseFloat(data['price']);
                            total_price = parseFloat(boat_price) + parseFloat(price);
                            $('.sub-total').text(total_price.toLocaleString('en-US')+currency);
                            vat_price = (total_price * 5)/100;
                            $('.vat-price').text(vat_price.toLocaleString('en-US')+currency);
                            vat_total = total_price + vat_price;
                            $('.vat-total').text(vat_total.toLocaleString('en-US')+currency);
                            $('input[name="total_price"]').val(total_price);
                        }
                });
                }else{

                    $('.cat-'+value+'-img1').find('img').attr('src',src);
                    $('.cat-'+value+'-img2').find('img').attr('src',src);
                    $('.cat-'+value+'-img3').find('img').attr('src',src);
                    if($('.cat-'+value+'-img4').length){
                        $('.cat-'+value+'-img4').find('img').attr('src',src);
                    }

                    var prev_div = $('#summary-end .summary-card #' + value);
                    if (prev_div.length) {
                        var prev_price = prev_div.find('.price').text();
                        prev_price = prev_price.replace(",", "");
                        price -= parseFloat(prev_price);
                        prev_div.remove();
                        total_price = parseFloat(boat_price) + parseFloat(price);
                        $('.sub-total').text(total_price.toLocaleString('en-US')+currency);
                        vat_price = (total_price * 5)/100;
                        $('.vat-price').text(vat_price.toLocaleString('en-US')+currency);
                        vat_total = total_price + vat_price;
                        $('.vat-total').text(vat_total.toLocaleString('en-US')+currency);
                        $('input[name="total_price"]').val(total_price+currency);
                    }

                }


                });

                $('body').on('click','.view-summary',function(){
                    $('#summary-end').show();
                    $('html, body').animate({
                        scrollTop: $('#summary-end').offset().top
                    }, 1000);
                });

                $('body').on('click','.submit-btn',function(){
                    $("input[name='redirect_url_pay']").val(1);
                    $('#exampleModal').modal('show');
                });

                $('body').on('click', '#submit-boot', function() {
                // Add the "button-loading" class to the button
                 $(this).addClass("button-loading");
                 $('#submit-form').submit();
                 setTimeout(function() {
                 $('#submit-boot').removeClass("button-loading");
                 }, 3000);
                });

            });
        </script>


        <div id="scrollUp"><i class="fal fa-long-arrow-up"></i></div>
    </body>
</html>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/boat-footer.blade.php ENDPATH**/ ?>