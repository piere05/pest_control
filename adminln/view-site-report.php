<?php
function main() {
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
$Act=$_GET['act'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');

?>



<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
  

<div class="ms-auto">
<div class="col">
<!-- Button trigger modal -->
<a href="site-report.php" class="btn btn-danger">Back</a>

</div>
</div>
</div>
<hr/>

<?  $select_leads=mysqli_query($conn,"select * from site where id='$ID'"); 
if(mysqli_num_rows($select_leads)>>0){ 
$row_leads=mysqli_fetch_array($select_leads);
foreach($row_leads as $K1=>$V1) $$K1 = $V1;

 
 $select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
 $row_customer=mysqli_fetch_array($select_customer);
$customer_name=$row_customer['customer_name'];
?>
<form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm(this)" name="form1">
<div class="row form-label">
<div class="col-xl-6">
<div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Customer Details</h5>
<div class="card-body p-5">
<div class="row g-3">

<?if($company_name!=''){?>
<div class="col-md-6 w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Company Name:</h6>
</div>

<div class="col-md-6 w-sm-50">
<p for="client_name" class="client mb-0"><?=$company_name;?> </p>
</div> 
<?}if($customer_name!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Customer Name:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$customer_name;?> </p>
</div>
<? }if($mobile!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Customer Mobile:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$mobile;?> </p>
</div>

<? }if($email!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Customer Email:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$email;?> </p>
</div>
<? }
  
?>




</div>
</div>

</div>

  </div>

<div class="col-xl-6">
<div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Site Details</h5>
<div class="card-body p-5">
<div class="row g-3">


<?if($site_name!=''){?>
<div class="col-md-6 w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Site Name:</h6>
</div>

<div class="col-md-6 w-sm-50">
<p for="client_name" class="client mb-0"><?=$site_name;?> </p>
</div>
<?}if($site_address!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Site Address:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$site_address;?> </p>
</div>

<?}if($location!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Location:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><a href="<?=$location;?>" target="_blank">Go To Location </a></p>
</div>

<?}if($incharge_name!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Site Incharge Name:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$incharge_name;?></p>
</div>

<?}if($mobile!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Site Incharge Mobile:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$mobile;?></p>
</div>

<?}if($email!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Site Incharge Email:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$email;?></p>
</div>
<?}?>
</div>
</div>

</div>

  </div>
  


<?
$select_quotation_product=mysqli_query($conn,"select * from quotation where site_id='$ID'");

if (mysqli_num_rows($select_quotation_product)>>0) {?>


<div class="col-xl-12">
    <div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Quotation Reports</h5>
<div class="card-body p-5">
<div class="row g-2 mt-1 mb-3 ">

<div class="w-12  w50">
<label for="inputLastName" class="form-label mt-20 mb-0">Date</label>

</div>


<div class="w-15 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">No.of Service</label>

</div>

<div class="w-17 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Taxable Amount </label>
</div>

  <div class="w-20 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">VAT Amount</label>

</div>
<div class="w-20 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Grand Total</label>

</div>
<div class="w-15 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Report</label>
</div>
</div>
<?   


$SNo = 0;
while($row_quotation=mysqli_fetch_array($select_quotation_product))
{ 
$SNo = $SNo + 1; 
$quotation_id=$row_quotation['id'];
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

$select_quotation_product=mysqli_query($conn,"select * from quotation_product where quotation_id='$quotation_id'");

$taxamt=0;
$vatamt=0;
while ($row_product=mysqli_fetch_array($select_quotation_product)) {

$vat = $row_product['vat'];

  $amount = $row_product['amount'];
$vat_amount = ($amount * $vat) / 100;
$vatamt+=$vat_amount;
  $taxamt+=$amount;

}
?>

<div class="row py-2 bdr-tp-gray ">

<div class="w-12 w50">
<p class="my-2"><span class="fw-500"><b><?=date("d-m-Y",strtotime($quotation_date));?></b></span></p>

</div>

<div class="w-15 w50">
<p><?=$service_count; ?></p>
</div>
<div class="w-17 w50 sm-margin-t">
<p class="my-2"><?=$duration;?></p>
<p class="my-2">AED <?=$amount;?></p>
</div>

<div class="w-20 w50 sm-margin-t">
<p class="my-2">AED <?=$vatamt;?></p>
</div>
<div class="w-20 w50 sm-margin-t">
<p class="my-2">AED <?=$total_amount;?></p>
</div>
<div class="w-15 p-0 w50 sm-margin-t">
<p class="my-2"><a href="export-invoice.php?id=<?=$quotation_id; ?>" target="_blank"  class="btn btn-add btn-sm ms-3" tooltip="Print"><i class="bx bxs-printer"></i></a></p>
</div>

<div>

</div>

</div>

<?}?>


</div>
</div>
  </div>
<?}?>




<?
$select_job_order=mysqli_query($conn,"select * from job_order where site_id='$ID' and status=3");

if (mysqli_num_rows($select_job_order)>>0) {?>


<div class="col-xl-12">
    <div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Completed Job Order Reports</h5>
<div class="card-body p-5">
<div class="row g-2 mt-1 mb-3 ">

<div class="w-12  w50">
<label for="inputLastName" class="form-label mt-20 mb-0">Created Date</label>

</div>


<div class="w-15 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Job Date</label>

</div>

<div class="w-17 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Job Time </label>
</div>

  <div class="w-20 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Supervisor</label>

</div>
<div class="w-20 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Technician</label>

</div>
<div class="w-15 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Report</label>
</div>
</div>
<?   


$SNo = 0;
while($row_job_order=mysqli_fetch_array($select_job_order))
{ 
$SNo = $SNo + 1; 
$job_order_id=$row_job_order['id'];

$created_date=$row_job_order['created_datetime'];
$job_date=$row_job_order['job_date'];
$job_time=$row_job_order['job_time'];

$supervisor_id=$row_job_order['supervisor_id'];


$service_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");
$row_supervisor=mysqli_fetch_array($service_supervisor);
$supervisor_name=$row_supervisor['name'];
$supervisor_mobile=$row_supervisor['UserName'];



$select_technician=mysqli_query($conn,"select * from technician_log where job_order_id='$job_order_id'");
$technician_name=[];
while($row_technican=mysqli_fetch_array($select_technician)){
  $technician_name[]=$row_technican['technician_name'];

}
if ($technician_name!='') {
$technician_details=implode(", ", $technician_name);
}else{
  $technician_details=" - ";
}
if ($row_job_order['type_of_report']!=1) {
 $report_url="export-pestcontrol-report.php?id=$job_order_id";
   $select_pen_report=mysqli_query($conn,"select * from pestcontrol_report where job_order_id='$job_order_id'");
}else{
 $report_url="export-watertank-report.php?id=$job_order_id";
   $select_pen_report=mysqli_query($conn,"select * from pestcontrol_report where job_order_id='$job_order_id'");
}
?>

<div class="row py-2 bdr-tp-gray ">

<div class="w-12 w50">
<p class="my-2"><span class="fw-500"><b><?=date("d-m-Y",strtotime($created_date));?></b></span></p>

</div>

<div class="w-15 w50">
<p><?=date("d-m-Y",strtotime($job_date));?></p>
</div>
<div class="w-17 w50 sm-margin-t">
<p class="my-2"><?=$job_time;?></p>
</div>

<div class="w-20 w50 sm-margin-t">
<p class="my-2"> <?=$supervisor_name." - ".$supervisor_mobile;?></p>
</div>
<div class="w-20 w50 sm-margin-t">
<p class="my-2"><?=$technician_details;?></p>
</div>
<div class="w-15 p-0 w50 sm-margin-t">
  <?
if (mysqli_num_rows($select_pen_report)>>0) {
  ?>
<p class="my-2"><a href="<?=$report_url;?>" target="_blank"  class="btn btn-add btn-sm ms-3" tooltip="Print"><i class="bx bxs-printer"></i></a></p>
<?}else{ echo " - - ";}?></div>

<div>

</div>

</div>

<?}?>


</div>
</div>
  </div>
<?}?>




<?
$select_upcoming_order=mysqli_query($conn,"select * from job_order where site_id='$ID' and status!=3");

if (mysqli_num_rows($select_upcoming_order)>>0) {?>


<div class="col-xl-12">
    <div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Upcoming Job Order Reports</h5>
<div class="card-body p-5">
<div class="row g-2 mt-1 mb-3 ">




<div class="w-20 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Job Date</label>

</div>

<div class="w-20 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Job Time </label>
</div>

  <div class="w-20 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Supervisor</label>

</div>
<div class="w-20 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Technician</label>

</div>
<div class="w-20 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Report</label>
</div>
</div>
<?   


$SNo = 0;
while($row_upcoming_job_order=mysqli_fetch_array($select_upcoming_order))
{ 
$SNo = $SNo + 1; 
$job_order_id=$row_upcoming_job_order['id'];

$created_date=$row_upcoming_job_order['created_datetime'];
$job_date=$row_upcoming_job_order['job_date'];
$job_time=$row_upcoming_job_order['job_time'];

$supervisor_id=$row_upcoming_job_order['supervisor_id'];


$service_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");
$row_supervisor=mysqli_fetch_array($service_supervisor);
$supervisor_name=$row_supervisor['name'];
$supervisor_mobile=$row_supervisor['UserName'];



$select_upcoming_technician=mysqli_query($conn,"select * from technician_log where job_order_id='$job_order_id'");
$technician_name=[];
while($row_upcoming_technican=mysqli_fetch_array($select_upcoming_technician)){
  $technician_name[]=$row_upcoming_technican['technician_name'];

}
if ($technician_name!='') {
$technician_details=implode(", ", $technician_name);
}else{
  $technician_details=" - ";
}
if ($row_upcoming_job_order['type_of_report']!=1) {
 $report_url="export-pestcontrol-report.php?id=$job_order_id";
  $select_report=mysqli_query($conn,"select * from pestcontrol_report where job_order_id='$job_order_id'");
}else{
 $report_url="export-watertank-report.php?id=$job_order_id";
  $select_report=mysqli_query($conn,"select * from watertank_report where job_order_id='$job_order_id'");

}

?>

<div class="row py-2 bdr-tp-gray ">


<div class="w-20 w50">
<p><?=date("d-m-Y",strtotime($job_date));?></p>
</div>
<div class="w-20 w50 sm-margin-t">
<p class="my-2"><?=$job_time;?></p>
</div>

<div class="w-20 w50 sm-margin-t">
<p class="my-2"> <?=$supervisor_name." - ".$supervisor_mobile;?></p>
</div>
<div class="w-20 w50 sm-margin-t">
<p class="my-2"><?=$technician_details;?></p>
</div>
<div class="w-20 p-0 w50 sm-margin-t">

  <?
if (mysqli_num_rows($select_report)>>0) {
  ?>
<p class="my-2"><a href="<?=$report_url;?>" target="_blank"  class="btn btn-add btn-sm ms-3" tooltip="Print"><i class="bx bxs-printer"></i></a></p>
<?}else{ echo " - - ";}?>
</div>

<div>

</div>

</div>

<?}?>


</div>
</div>
  </div>
<?}?>

  </div> 






</form>




<? } else { echo "No Records Found";  } ?>
<?php
}
include 'template.php';
?>