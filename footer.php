

<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="material-icons">keyboard_arrow_up</i></a>
<!-- end scroll to top btn -->


<!-- ================== BEGIN BASE JS ================== -->
<script src="<?=$base_url;?>/assets/plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<!--[if lt IE 9]>
<script src="<?=$base_url;?>/assets/crossbrowserjs/html5shiv.js"></script>
<script src="<?=$base_url;?>/assets/crossbrowserjs/respond.min.js"></script>
<script src="<?=$base_url;?>/assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="<?=$base_url;?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/js-cookie/js.cookie.js"></script>
<script src="<?=$base_url;?>/assets/js/theme/material.min.js"></script>
<script src="<?=$base_url;?>/assets/js/apps.js"></script>
<!-- ================== END BASE JS ================== -->
<script src="<?=$base_url;?>/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=$base_url;?>/assets/js/demo/table-manage-responsive.demo.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=$base_url;?>/assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/masked-input/masked-input.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/password-indicator/js/password-indicator.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
<script src="<?=$base_url;?>/assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=$base_url;?>/assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-show-password/bootstrap-show-password.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
<script src="<?=$base_url;?>/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
<script src="<?=$base_url;?>/assets/plugins/clipboard/clipboard.min.js"></script>
<script src="<?=$base_url;?>/assets/js/demo/form-plugins.demo.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/switchery/switchery.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/powerange/powerange.min.js"></script>
<script src="<?=$base_url;?>/assets/js/demo/form-slider-switcher.demo.min.js"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?=$base_url;?>/assets/js/demo/table-manage-buttons.demo.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script src="<?=$base_url;?>/assets/plugins/flot/jquery.flot.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/sparkline/jquery.sparkline.js"></script>
<script src="<?=$base_url;?>/assets/js/demo/dashboard.min.js"></script>
<script src="<?=$base_url;?>/assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
<!-- 	<script src="<?=$base_url;?>/assets/js/demo/ui-modal-notification.demo.js"></script>
-->

<script>
$(document).ready(function() {
Dashboard.init();
App.init();
TableManageButtons.init();
TableManageResponsive.init();
FormPlugins.init();
FormSliderSwitcher.init();
Notification.init();
});
</script>
