<!-- Placed at the end of the document so the pages load faster ============================================= -->

    <!-- Jquery Core Js -->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Jquery Validation Plugin Css -->
    <script src="<?=base_url()?>assets/plugins/jquery-validation/jquery.validate.js"></script>

	<!-- Sweet Alert Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/node-waves/waves.js"></script>

<!-- Moment Plugin Js -->
<!--    <script src="<?=base_url()?>assets/plugins/momentjs/moment.js"></script>-->

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<!--    <script src="<?=base_url()?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>-->

<!-- Jquery DataTable Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?=base_url()?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Autosize Plugin Js -->
<!--    <script src="<?=base_url()?>assets/plugins/autosize/autosize.js"></script>-->



    <!-- Custom Js -->	
    <script src="<?=base_url()?>assets/js/admin.js"></script>

	<?php
	if($this->uri->segment(1) == "" || $this->uri->segment(1) == "login"){
		?>
	<script>
				$(function () {
    $('.count-to').countTo();

    $('.sales-count-to').countTo({
        formatter: function (value, options) {
            return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
        }
    });

//    initRealTimeChart();
    //initDonutChart();
    initSparkline();
});
	</script>
	<?php
	}
	?>
    <script src="<?=base_url()?>assets/js/pages/index.js"></script>
 	<script src="<?=base_url()?>assets/js/pages/tables/jquery-datatable.js"></script>
	<script src="<?=base_url()?>assets/js/pages/forms/form-validation.js"></script>
    <!-- Demo Js -->
    <script src="<?=base_url()?>assets/js/demo.js"></script>



<!-- DATEPICKER -->
<!--<script type="text/javascript" src="<?=base_url()?>assets/date_picker_bootstrap/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>-->
<!--<script type="text/javascript" src="<?=base_url()?>assets/date_picker_bootstrap/bootstrap/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="<?=base_url()?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?=base_url()?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
 $('.form_date').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  minView: 2,
  forceParse: 0
    });
</script>
<!-- AUTOCOMPLETE Core Js -->
<script src="<?=base_url()?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
	   var pemrograman = [
		<?= $list_produk ?>
		];
	    $( "#id_produk" ).autocomplete({
		source: pemrograman
	    });	
	});
</script>
