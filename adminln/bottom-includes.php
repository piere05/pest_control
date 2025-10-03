<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<? if($Pagename !='new-registration.php') { ?><script src="assets/js/jquery.min.js"></script><? } ?>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!-- <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="assets/js/index.js"></script>
<script src="assets/js/magnific-popup.min.js"></script>
<!--app JS-->


<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
 
	
<? if($Pagename =='new-registration.php') { ?>

		$(".mobile-toggle-menu").on("click", function() {
		$(".wrapper").addClass("toggled")
	});
		$(".toggle-icon").click(function() {
		$(".wrapper").hasClass("toggled") ? ($(".wrapper").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($(".wrapper").addClass("toggled"), $(".sidebar-wrapper").hover(function() {
			$(".wrapper").addClass("sidebar-hovered")
		}, function() {
			$(".wrapper").removeClass("sidebar-hovered")
		}))
	});
    var currentLocation = window.location.href;
    $(".metismenu li a").each(function () {	
        if (this.href === currentLocation) {
            var $parentLi = $(this).parent().addClass("mm-active");

            while ($parentLi.is("li")) {
                $parentLi = $parentLi.parent().closest("li").addClass("mm-active").parent().addClass("mm-show");
            }
        }
    });
     $("#menu").metisMenu();

<? } ?>


$(document).ready(function() {
$('#example, #example1').DataTable({
<? if($Pagename =='add-stock.php'  || $Pagename =='manage-shop.php') { ?>
lengthChange: false,
paging: true,
<? if($Pagename =='manage-shop.php'){?>
pageLength: 25,
<? }else { ?>
pageLength: 100,
<? } } ?>
    });	


} );
</script>


<script src="assets/fullcalendar/js/moment.min.js"></script>
<script src="assets/fullcalendar/js/fullcalendar.min.js"></script>




  
<script>
$(document).ready(function() {
var table = $('#example2').DataTable( {
lengthChange: false,

pageLength: 1500,

buttons: [ 'copy', 'excel', <? if($Pagename !='home.php' && $Pagename !='list-allpoints.php' ) { ?>'pdf',<? } ?> 'print'] 
} );

table.buttons().container()
.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
} );

$(document).ready(function() {
var table = $('#example3').DataTable( {
lengthChange: false,

pageLength: 1500,

buttons: [ 'copy', 'excel', <? if($Pagename !='home.php' && $Pagename !='list-allpoints.php' ) { ?>'pdf',<? } ?> 'print'] 
} );

table.buttons().container()
.appendTo( '#example3_wrapper .col-md-6:eq(0)' );
} );
</script>

<script src="assets/plugins/select2/js/select2.min.js"></script>
<!-- <script src="assets/js/ui-auto.js"></script> -->
<script>
	$('.single-select1').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
 maximumSelectionLength: 1,
allowClear: Boolean($(this).data('allow-clear')),
});
$('.single-select').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
allowClear: Boolean($(this).data('allow-clear')),
});
$('.multiple-select').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
allowClear: Boolean($(this).data('allow-clear')),
});
</script>

	<script>
		$(function () {
			$('[data-bs-toggle="popover"]').popover();
			$('[data-bs-toggle="tooltip"]').tooltip();
		})

// $(function(){
// var products = [<?=$procts_listname; ?>];
// $("#autocomplete").autocomplete({
// source: products,
// select: function(event, ui) { 
// $("#autocomplete").val(ui.item.value); 
// }
// });

// });
</script>
	
<!--app JS-->
<script src="assets/js/app.js"></script>