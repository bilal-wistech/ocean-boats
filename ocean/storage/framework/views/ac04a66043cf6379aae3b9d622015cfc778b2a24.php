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
                <div class="col-lg-6 d-none">
                    <p class="text-lg-end text-start font-sm mb-0">
                        Made with <i class="fa fa-heart" style="color:red"></i> <a href="https://www.wistech.biz/" style="color:white"> Wisdom</a>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.js"></script>

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
  $(document).ready(function() {
  $('#fullpage').fullpage({
    scrollingSpeed: 1000,
    verticalCentered: false,
    css3: true,
    navigation: false,
    navigationTooltips: ['Image 1', 'Image 2', 'Image 3'],
    fitToSection: true,
    afterRender: function(){
      $.fn.fullpage.moveTo(1);
    }
  });

   $('.option').not(':first').hide();
      $('input[type="checkbox"]').click(function() {
      $('input[type="checkbox"]').not(this).prop('checked', false);
      $('.option').hide();
      if ($(this).prop('checked')) {
          $('#option' + $(this).val()).show();
        }
  });
  
  $('#book-now').on('click', function(event) {
    var dataValue = $(this).data('value');
    $('.modal-footer #link').attr('href',dataValue);
  });


});

</script>

        <div id="scrollUp"><i class="fal fa-long-arrow-up"></i></div>
    </body>
</html>
<?php /**PATH /home/oceanboats/public_html/platform/themes/wowy/partials/footer.blade.php ENDPATH**/ ?>