
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