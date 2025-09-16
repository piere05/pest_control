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
$url_subqry="and status=$url_Status";
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

if ($quote_status!='') {
$subqry.="and status='$quote_status'";
}
$subqry.="and  (date(job_date) between '".$from_date."' and '".$end_date."')";
}
?>



<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<h5 class="mb-0 text-dark">Manage AMC Job Order</h5>
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




<? 
$select_job_order=mysqli_query($conn,"select * from job_order where 1=1  $subqry  $url_subqry and type_of_job=1 order by created_datetime desc");
if(mysqli_num_rows($select_job_order)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th >Created Date</th>
<th>Company & Customer Details</th>
<th> Job Date</th>
<th> Job Time</th>
<th>Site Details</th>
<th >Total Amount</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_job_order=mysqli_fetch_array($select_job_order))
{ 
$SNo = $SNo + 1; 
$id=$row_job_order['id'];

$job_order_date=$row_job_order['job_order_date'];



$customer_id=$row_job_order['customer_id'];
$company_name=$row_job_order['company_name'];
$mobile=$row_job_order['customer_mobile'];

$select_customer=mysqli_query($conn,"select * from customers where mobile='$mobile'");

$row_customer=mysqli_fetch_array($select_customer);
$customer_name=$row_customer['customer_name'];


$site_name=$row_job_order['site_name'];
$is_mail_sent=$row_job_order['is_mail_sent'];
$site_address=$row_job_order['site_address'];

$total_amount=$row_job_order['total_amount'];
$job_date=date("d-m-Y",strtotime($row_job_order['job_date']));
$job_time=$row_job_order['job_time'];
$supervisor_name=$row_job_order['supervisor_name'];
$supervisor_id=$row_job_order['supervisor_id'];
$type_of_report=$row_job_order['type_of_report'];

$location=$row_job_order['location'];
$status=$row_job_order['status'];


if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{
  $location_icon="";
}
?>
<tr>

<td class="d-none"><?=$SNo; ?></td>
<td>
<p class="mb-0"> <?=date('d-m-Y',strtotime($job_order_date));?></p>
</td>

<td><?=$company_name; ?><p class="mt-1"><?=$customer_name. " - "."+971 ".$mobile; ?></p></td>
<td><p class="mb-0 "><?=$job_date;?></p></td>
<td><?=$job_time;?></td>
<td><p class="mb-0"> <?=$site_name; ?></p>
<p class="mb-0"> <? echo wordwrap($site_address, 50, "<br />\n"); ?><?=$location_icon;?></p></td>


<td>AED <?=$total_amount;?></td>


</tr>
<? }}else{ echo "<p>No Record Found</p>";} ?>
</tbody>
</table>
</div>
</div>
</div>







<div class="modal fade" id="exampleExtraLargeModal" tabindex="1" aria-hidden="false">
<div class="modal-dialog modal-md p-5">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body p-5">
<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">

<div id="output">
	
</div>
   


</div>

</div>
</div>
</div> 



<script>
	
	function feedback(val){
$.ajax({
url: "ajax-modal.php", 
type: "POST",
data: "id="+val+"&act=feedback",
success: function(result){
$("#output").html(result);
}
	});
	}



	function addtechnician(val,sno){

$.ajax({
url: "ajax-add-techinican.php", 
type: "POST",
data: "id="+val+"&sno="+sno,
success: function(result){
$("#output").html(result);
}
	});
}
	function editjoborder(val){

$.ajax({
url: "ajax-edit-job-order.php", 
type: "POST",
data: "id="+val,
success: function(result){
$("#output").html(result);
}
	});
}
</script>
<?php
}
include 'template.php';
?>