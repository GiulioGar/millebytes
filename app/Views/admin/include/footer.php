    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>/assetsa/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/extra-libs/taskboard/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assetsa/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?php echo base_url(); ?>/assetsa/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/js/app.init.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>/assetsa/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>/assetsa/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>/assetsa/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>/assetsa/js/feather.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/js/custom.min.js"></script>
    <!-- ############################################################### -->
    <!-- This Page Js Files Here -->
    <!-- ############################################################### -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoliAneRffQDyA7Ul9cDk3tLe7vaU4yP8"></script>
    <script src="<?php echo base_url(); ?>/assetsa/libs/gmaps/gmaps.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/js/pages/maps/map-google.init.js"></script>

    <script src="<?php echo base_url(); ?>/assetsa/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/libs/echarts/dist/echarts.min.js"></script>
    <!--c3 charts -->
    <script src="<?php echo base_url(); ?>/assetsa/libs/d3/dist/d3.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/libs/c3/c3.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/js/pages/dashboards/dashboard1.js"></script>

    <script src="<?php echo base_url(); ?>/assetsa/libs/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>/assetsa/js/pages/calendar/cal-init.js"></script>

    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
</body>

</html>