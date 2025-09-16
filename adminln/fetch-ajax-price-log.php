<?

extract($_REQUEST);
include 'dilg/cnt/join.php';
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');
$quotation_id = $_POST['id'];


$select_price_log=mysqli_query($conn,"select * from price_log where quotation_id='$quotation_id' order by id desc");


?>
<table id="example" class="table table-striped table-bordered no-tbl-bdr dataTable no-footer" style="width: 100%; border-collapse: separate; border-spacing: 0px 10px;">
<thead>
<tr role="row">
	<th class="d-none sorting_asc">SNo</th>
	<th class="d-none sorting">Time</th>
	<th class="d-none sorting">Log Details</th>
</tr>
</thead>
<tbody>

<?
$Sno=0;
while ($row_price=mysqli_fetch_array($select_price_log)) {

$Sno+=1;

$created_time=date("h:i:s A",strtotime($row_price['created_datetime']));
$created_date=date("d-m-Y",strtotime($row_price['created_datetime']));
$job_type=$row_price['job_type'];

$amount=$row_price['amount'];
$vat=$row_price['vat'];
$total=$row_price['total'];



$select_product=mysqli_query($conn,"select * from quotation_product where quotation_id='$quotation_id' and job_type='$job_type'");

$row_product=mysqli_fetch_array($select_product);

$product_amount=$row_product['amount'];


if ($amount==$product_amount) {

	
	$bg_color="bg-log-alter";
	$border_color="log-tbl-alter";
	$img='<div class="position-relative"><img src="assets/images/Our/new2.png" class="new-png" width="40px"></div>';
}else{
	$bg_color="bg-log-green";
	$border_color="log-tbl-green";
	$img="";
}

?>

<tr class="v-m" role="row">
<td class="d-none sorting_1"><?=$Sno;?></td>
<td class="w-15 text-center <?=$bg_color;?>">
	<?=$img;?>
	<p class="mb-0"><?=$created_date;?></p><p class="mb-0"><?=$created_time;?></p></td>
<td class="<?=$bg_color;?> <?=$border_color;?> lh-18"><span class="mb-0 fw-500 product-clr"><b><?=$job_type;?></b></span><br>
<p class=" mb-0">Amount: AED  <?=$amount;?> | <span>VAT: <?=$vat;?>%</span> <i class="lni lni-arrow-right fw-bolder"></i> <b>AED  <?=$total;?></b></p></td>
</tr>

<?}?>

</tbody>

</table>







<script>
$(document).ready(function() {
var table = $('#example').DataTable( {
lengthChange: false,
pageLength: 8,
} );
table.buttons().container()
.appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>





