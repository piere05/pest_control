<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');

$url_Status=$_GET['status'];

if ($url_Status!='') {
$url_subqry="and status=0";
}else{
	$url_subqry="";
}

if($from_date!='' && $end_date!=''){
  $from_date=$from_date;
  $end_date=$end_date;
}else{
$from_date=date('Y-m-01');
$end_date=date('Y-m-t');
}
if ($url_Status=="") {
	

if ($search_customer_id!='') {
$subqry.="and customer_id='$search_customer_id'";
}

if ($status!='') {
$subqry.="and status='$status'";
}
$subqry.="and  (date(quotation_date) between '".$from_date."' and '".$end_date."')";
}
?>





<script src="crop/jquery.min.js"></script>  
<script src="crop/bootstrap.min.js"></script>
<script src="crop/croppie.js"></script>
<link rel="stylesheet" href="crop/croppie.css"/>


<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<h5 class="mb-0 text-dark">Quotation Report</h5>
</div>
<hr/>
<? if($msg !=''){ ?><div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
<div class="d-flex align-items-center">
<div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
</div>
<div class="ms-3">
<h6 class="mb-0 text-white">Success Alerts</h6>
<div class="text-white"><?=$msg; ?></div>
</div>
</div>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> <? } ?>
<? if($alert_msg !=''){ ?> <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
<div class="d-flex align-items-center">
<div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
</div>
<div class="ms-3">
<h6 class="mb-0 text-white">Alerts</h6>
<div class="text-white"><?=$alert_msg; ?></div>
</div>
</div>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> <? } ?>

<form method="POST">
<div class="row g-3 mb-5">

<div class="col-md-2">

	<div class="mb-10">
<label for="inputAddress" class="form-label width-100">Status</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio0" value="" <?if ($status=='') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio0">All</label>

</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0" <?if ($status=='0') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio1">Pending</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1" <?if ($status=='1') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio2">Approved</label>
</div>
</div>
	
</div>


<div class="col-md-3">
<label for="inputFirstName" class="form-label">Select Company / Customer</label>
<select class="single-select" name="search_customer_id" id="search_customer_id">
<option value="">Select Company / Customer</option> 

<?
$select_customer=mysqli_query($conn,"select * from customers where status=1");

while ($row_customer=mysqli_fetch_array($select_customer)) {

   $customer_name=$row_customer['customer_name'];
   $mobile_no=$row_customer['mobile'];
   $company_name=$row_customer['company_name'];
   $Customer_id=$row_customer['id'];
?>
<option value="<?=$Customer_id?>" <?if($search_customer_id==$Customer_id){echo "selected";}?>><?=$company_name." / ".$customer_name." - ".$mobile_no;?></option>
<?
}
?>
</select>
</div>


<div class="col-md-2">
<label for="inputFirstName" class="form-label">From</label>
<input type="date" name="from_date" class="form-control" value="<?=$from_date;?>" required>
</div>

<div class="col-md-2">
<label for="inputFirstName" class="form-label">To</label>
<input type="date" name="end_date" class="form-control" value="<?=$end_date;?>" required>
</div>


<div class="col-md-3 mt-46">
<input type="submit" name="Submit" class="btn btn-primary px-3" value="Search">
</div>

</div>
</form>




<? $select_quotation=mysqli_query($conn,"select * from quotation where 1=1 $subqry order by id desc");

if(mysqli_num_rows($select_quotation)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th>Date </th>
<th>Customer Details </th>
<th>No. of Service</th>
<th>Taxable Amount</th>
<th>VAT Amount</th>

<th>Grand Total</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_quotation=mysqli_fetch_array($select_quotation))
{ 
$SNo = $SNo + 1; 
$id=$row_quotation['id'];
$Company_name=$row_quotation['company_name'];
$customer_id=$row_quotation['customer_id'];

$select_customer_quotation=mysqli_query($conn,"select * from customers where id='$customer_id'");

$row_quo_customer=mysqli_fetch_array($select_customer_quotation);


$Customer_name=$row_quo_customer['customer_name'];

$Customer_mobile=$row_quotation['customer_mobile'];

$total_amount=$row_quotation['total_amount'];
$service_count=$row_quotation['service_count'];
$quotation_date=$row_quotation['quotation_date'];
$status=$row_quotation['status'];

$select_quotation_product=mysqli_query($conn,"select * from quotation_product where quotation_id='$id'");

$taxamt=0;
$vatamt=0;
while ($row_product=mysqli_fetch_array($select_quotation_product)) {

$vat = $row_product['vat'];

  $amount = $row_product['amount'];
$vat_amount = ($amount * $vat) / 100;
$vatamt+=$vat_amount;
  $taxamt+=$amount;

}


if ($status==1) {
	$Status_tl='<span class="sts-appr rounded-2">Approved</span>';
}else{
		$Status_tl='<span class="sts-pnd rounded-2"> Pending </span>';
}
?>
<tr>

<td class="d-none"><?=$SNo; ?></td>
<td><?=date("d-m-Y",strtotime($quotation_date)); ?></td>
<td><?= $Company_name; ?> - <?=$Customer_name; ?><p class="mb-1">+971 <?=$Customer_mobile; ?></p><p class="mb-1"><?=$email; ?></p></td>

<td><?=$service_count; ?></td>
<td>AED <?=number_format($taxamt, 2);?></td>
<td>AED <?=number_format($vatamt, 2);?></td>
<td>AED <?=$total_amount; ?></td>
<td><?=$Status_tl; ?></td>


</tr>
<? }
}else{ echo "<p>No Record Found</p>";} ?>
</tbody>
</table>
</div>
</div>
</div>






<script>
	$('.single-select').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
allowClear: Boolean($(this).data('allow-clear')),
});
</script>




	
<?php
}
include 'template.php';
?>