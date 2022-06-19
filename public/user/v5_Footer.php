    <div class="header bg-primary" style="bottom: 0;position: relative;">
      <div class="container-fluid">
        <div class="header-body">
  <?php
if (isset($sess_data_var['sess_user_id'])) {
  ?>
<div style="background-color: transparent;" class="row text-center">
      <div style="width: 48%;">
        <a class="text-white" href="<?= $call_config->base_url() ?>application/view/user/cart/">My Cart</a>
            <br><a href="<?= $call_config->base_url() ?>application/view/user/about_us/" class="text-white" aria-expanded="true" aria-controls="navbar-dashboards">About Us!</a>
      </div>
      <div style="width: 48%;">
        <a class="text-white" href="<?= $call_config->base_url() ?>application/view/user/orders/">Orders</a>
            <br><a href="#" class="text-white" data-toggle="modal" data-target="#help_modal"  role="button" aria-expanded="true" aria-controls="navbar-dashboards">Help!</a>
      </div>
  </div>
  <?php
}
else
{
  ?>
<div style="background-color: transparent;" class="row text-center">
      <div style="width: 48%;">
    <a class="text-white" href="#" data-toggle="modal" data-target="#login_model">Login</a>
            <br><a href="<?= $call_config->base_url() ?>application/view/user/about_us/" class="text-white" aria-expanded="true" aria-controls="navbar-dashboards">About Us!</a>
            <br>
            <a href="<?= $call_config->base_url()?>application/view/user/dashboard/" class="text-white">Home</a>
      </div>
      <div style="width: 48%;">
        <a class="text-white" href="#" data-dismiss="modal" data-target="#register_model" data-toggle="modal">Register</a>
            <br><a href="#" class="text-white" data-toggle="modal" data-target="#help_modal"  role="button" aria-expanded="true" aria-controls="navbar-dashboards">Help!</a>
            <br>
            <a class="text-white" href="#" data-dismiss="modal" data-target="#f_password" data-toggle="modal">Forget Password</a>
      </div>
  </div>
  <?php
}
  ?>
</div>
</div>
</div>

  <div class="modal fade mt-6" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content" style="text-align: center;">
<div class="row">
  <div class="col-md-12 p-5">
    <button type="button" class="close float-right mt--4" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
    <a href="<?= $call_config->base_url() ?>application/view/user/orders/" class="btn btn-primary float-center">My Orders</a>
    <br>
    <label class="text-muted mt-2">or,</label>
    <h2 class="mt-3">Contact Us.</h2>
    <br>
    <a href="tel:+918210386968" class="btn btn-danger btn-sm"><i class="fas fa-phone-alt"></i></a> OR &nbsp;<a href="https://api.whatsapp.com/send?phone=+918210386968" class="btn btn-neutral text-green btn-sm"><i class="fab fa-whatsapp"></i></a>
  </div>
</div>

</div>
</div>
</div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo $call_config->base_url() ?>app-assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo $call_config->base_url() ?>app-assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $call_config->base_url() ?>app-assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo $call_config->base_url() ?>app-assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo $call_config->base_url() ?>app-assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo $call_config->base_url() ?>app-assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo $call_config->base_url() ?>app-assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo $call_config->base_url() ?>app-assets/js/argon.min5438.js?v=1.2.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?php echo $call_config->base_url() ?>app-assets/js/demo.min.js"></script>

  <!-- oldtemletescriptpart -->
  <!-- <script src="<?php echo $call_config->base_url() ?>app-assets/vendors/js/vendors.min.js" type="text/javascript"></script> -->
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo $call_config->base_url() ?>app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url() ?>app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url() ?>app-assets/vendors/js/tables/buttons.flash.min.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url() ?>app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url() ?>app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url() ?>app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url() ?>app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url() ?>app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="<?php echo $call_config->base_url() ?>app-assets/js/scripts/tables/datatables/datatable-advanced.min.js" type="text/javascript"></script>
    <!-- END: Page JS-->
    <!-- oldtemletescriptpart -->
  <script>
    // Facebook Pixel Code Don't Delete
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window,
      document, 'script', '<?php echo $call_config->base_url() ?>connect.facebook.net/en_US/fbevents.js');

    try {
      fbq('init', '111649226022273');
      fbq('track', "PageView");

    } catch (err) {
      console.log('Facebook Track Error:', err);
    }
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
  </noscript>
</body>


<!-- Mirrored from demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Apr 2020 00:36:32 GMT -->
</html>