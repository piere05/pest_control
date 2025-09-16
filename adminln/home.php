<?php
function main() {
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
date_default_timezone_set('Asia/Kolkata');
$currentdate = date('Y-m-d');
$one_week_end_date = date('Y-m-d', strtotime($currentdate . ' +30 days'));

$dateqry=" and (date(inspection_date) between '".$currentdate."' and '".$one_week_end_date."')";


$dateqry_job=" and (date(job_date) between '".$currentdate."' and '".$one_week_end_date."')";
$user_id=$_SESSION['UID'];
$User_type=$_SESSION['USERTYPE'];

if ($User_type==2) {
  $Subqry.="and supervisor_id='$user_id'";
}

if ($User_type<='1') {

$select_pending_inspection=mysqli_query($conn,"select * from leads where inspection_status='0' and is_inspection_required='1'");

$select_pending_leads=mysqli_query($conn,"select * from leads where status=0 and (is_inspection_required != 1 or (is_inspection_required = 1 and inspection_status = 1))");


$select_completed_inspection=mysqli_query($conn,"select * from leads where inspection_status='1' and is_inspection_required='1'");
$select_total_quotation=mysqli_query($conn,"select COALESCE(sum(total_amount),0) as total, count(*) as Totalquotation from quotation");
$row_quotation=mysqli_fetch_array($select_total_quotation);

$no_of_quotation=$row_quotation['Totalquotation'];
$total_quotation_amt=$row_quotation['total'];
$select_pending_quotation=mysqli_query($conn,"select COALESCE(sum(total_amount),0) as total, count(*) as Totalquotation from quotation where status=0");
$row_pending_quotation=mysqli_fetch_array($select_pending_quotation);
$no_of_pending_quotation=$row_pending_quotation['Totalquotation'];
$total_pending_quotation_amt=$row_pending_quotation['total'];



$select_total_job_order=mysqli_query($conn,"select COALESCE(sum(total_amount),0) as total, count(*) as Totaljob_order from job_order");

$row_job_order=mysqli_fetch_array($select_total_job_order);

$no_of_job_order=$row_job_order['Totaljob_order'];
$total_job_order_amt=$row_job_order['total'];


$select_pending_job_order=mysqli_query($conn,"select COALESCE(sum(total_amount),0) as total, count(*) as Totaljob_order from job_order where status=0");

$row_pending_job_order=mysqli_fetch_array($select_pending_job_order);

$no_of_pending_job_order=$row_pending_job_order['Totaljob_order'];
$total_pending_job_order_amt=$row_pending_job_order['total'];



$no_of_process_job_order=mysqli_query($conn,"select * from job_order where status=2");

$no_of_ready_job_order=mysqli_query($conn,"select * from job_order where status=1");


$no_of_completed_order=mysqli_query($conn,"select * from job_order where status=3");
?>
<div class="ms-auto d-flex">
<h4 class="mt-3">Super Admin Dashboard</h4>
<div class="col mt-3 text-end">
<!-- Button trigger modal -->
<a href="create-leads.php" class="btn btn-primary">Add Lead</a>
<!-- Modal -->
</div>
</div>
<hr>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">


<div class="col">
<div class="card radius-10 bg-success Delivered">
<div class="card-body"><a href="list-leads.php?status=0">
<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Follow Up Leads </h6>
<h4 class="my-1 text-white"><?=mysqli_num_rows($select_pending_leads);?></h4>

</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-support"></i>
</div>
</div></a>
</div>
</div>
</div>

<div class="col">
<div class="card radius-10 bg-success Packed">
<div class="card-body"><a href="list-inspection.php?status=0">
<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Pending Inspection  </h6>
<h4 class="my-1 text-white"><?=mysqli_num_rows($select_pending_inspection);?></h4>

</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-support"></i>
</div>
</div></a>
</div>
</div>
</div>


<div class="col">
<div class="card radius-10 bg-success Order">
<div class="card-body"><a href="list-inspection.php?status=1">
<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Completed Inspection  </h6>
<h4 class="my-1 text-white"><?=mysqli_num_rows($select_completed_inspection);?></h4>

</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-support"></i>
</div>
</div></a>
</div>
</div>
</div>
<div class="col">
 <div class="card radius-10 bg-success Shipped">
<div class="card-body"><a href="list-quotation.php?status=all">

<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Total Quotation </h6>
<div class="d-flex ">
<h5 class="my-1 text-white"><?=$no_of_quotation;?> </h5>
<h5 class="my-1 text-white mx-1">|  AED <?=$total_quotation_amt;?> </h5>
</div>
</div>

<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-cart-alt"></i>
</div>
</div></a>
</div>
</div>

</div>

<div class="col">
 <div class="card radius-10 bg-success Cancelled">
<div class="card-body"><a href="list-quotation.php?status=0">

<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Pending Quotation </h6>
<div class="d-flex ">
<h5 class="my-1 text-white"><?=$no_of_pending_quotation;?> </h5>
<h5 class="my-1 text-white mx-1">|  AED <?=$total_pending_quotation_amt;?> </h5>
</div>
</div>

<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-cart-alt"></i>
</div>
</div></a>
</div>
</div>

</div>


<div class="col">
 <div class="card radius-10 bg-success">
<div class="card-body"><a href="list-job-order.php">

<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Total Job Order </h6>
<div class="d-flex ">
<h5 class="my-1 text-white"><?=$no_of_job_order;?> </h5>
<h5 class="my-1 text-white mx-1">|  AED <?=$total_job_order_amt;?> </h5>
</div>
</div>

<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark lni lni-delivery"></i>
</div>
</div></a>
</div>
</div>

</div>

<div class="col">
 <div class="card radius-10 bg-success Delivered">
<div class="card-body"><a href="list-job-order.php?status=0">

<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Pending Job Order </h6>
<div class="d-flex ">
<h5 class="my-1 text-white"><?=$no_of_pending_job_order;?> </h5>
</div>
</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark lni lni-delivery"></i>
</div>
</div></a>
</div>
</div>

</div>

<div class="col">
 <div class="card radius-10 bg-success Cancelled">
<div class="card-body"><a href="list-job-order.php?status=1">

<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Ready To Job</h6>
<div class="d-flex ">
<h5 class="my-1 text-white"><?=mysqli_num_rows($no_of_ready_job_order);?> </h5>
</div>
</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark lni lni-delivery"></i>
</div>
</div></a>
</div>
</div>

</div>

<div class="col">
 <div class="card radius-10 bg-success Packed">
<div class="card-body"><a href="list-job-order.php?status=2">

<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Job in Progress</h6>
<div class="d-flex ">
<h5 class="my-1 text-white"><?=mysqli_num_rows($no_of_process_job_order);?> </h5>
</div>
</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark lni lni-delivery"></i>
</div>
</div></a>
</div>
</div>

</div>


<div class="col">
 <div class="card radius-10 bg-success Shipped">
<div class="card-body"><a href="list-job-order.php?status=3">

<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Completed Jobs</h6>
<div class="d-flex ">
<h5 class="my-1 text-white"><?=mysqli_num_rows($no_of_completed_order);?> </h5>
</div>
</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark lni lni-delivery"></i>
</div>
</div></a>
</div>
</div>

</div>

</div>

<?}elseif ($User_type=='2') {

$Supervisor_pending_inspection=mysqli_query($conn,"select * from leads where supervisor_id='$user_id' and inspection_status='0' and is_inspection_required=1");


$Supervisor_completed_inspection=mysqli_query($conn,"select * from leads where supervisor_id='$user_id' and inspection_status='1' and is_inspection_required=1");

$Supervisor_total_inspection=mysqli_query($conn,"select * from leads where supervisor_id='$user_id'");

$select_supervisor_job_order=mysqli_query($conn,"select * from job_order where supervisor_id='$user_id' and status=0");

$select_ready_job_order=mysqli_query($conn,"select * from job_order where supervisor_id='$user_id' and status=1");

$select_progress_job_order=mysqli_query($conn,"select * from job_order where supervisor_id='$user_id' and status=2");

$select_completed_job_order=mysqli_query($conn,"select * from job_order where supervisor_id='$user_id' and status=3  ");

   ?>

   <h4 class="mt-3">Supervisor Dashboard</h4>

<hr>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">

<div class="col">
<div class="card radius-10 bg-success Order">
<div class="card-body"><a href="list-inspection.php?status=0">
<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Pending Inspection </h6>
<h4 class="my-1 text-white"><?=mysqli_num_rows($Supervisor_pending_inspection);?> </h4>

</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-support"></i>
</div>
</div></a>
</div>
</div>
</div>

<div class="col">
<div class="card radius-10 bg-success Shipped">
<div class="card-body"><a href="list-inspection.php?status=1">
<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Completed Inspection </h6>
<h4 class="my-1 text-white"><?=mysqli_num_rows($Supervisor_completed_inspection);?> </h4>

</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-support"></i>
</div>
</div></a>
</div>
</div>
</div>

<div class="col">
<div class="card radius-10 bg-success Delivered">
<div class="card-body"><a href="supervisor-list-job.php?status=0">
<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Pending Job Order </h6>
<h4 class="my-1 text-white"><?=mysqli_num_rows($select_supervisor_job_order);?> </h4>

</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-calendar"></i>
</div>
</div></a>
</div>
</div>
</div>

<div class="col">
<div class="card radius-10 bg-success Shipped">
<div class="card-body"><a href="supervisor-list-job.php?status=1">
<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Ready To Job </h6>
<h4 class="my-1 text-white"><?=mysqli_num_rows($select_ready_job_order);?> </h4>

</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-calendar"></i>
</div>
</div></a>
</div>
</div>
</div>


<div class="col">
<div class="card radius-10 bg-success">
<div class="card-body"><a href="supervisor-list-job.php?status=2">
<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Job in Progress</h6>
<h4 class="my-1 text-white"><?=mysqli_num_rows($select_progress_job_order);?> </h4>

</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-calendar"></i>
</div>
</div></a>
</div>
</div>
</div>

<div class="col">
<div class="card radius-10 bg-success Cancelled">
<div class="card-body"><a href="supervisor-list-job.php?status=3">
<div class="d-flex align-items-center">
<div>
<h6 class="mb-0 text-white">Completed Job Order </h6>
<h4 class="my-1 text-white"><?=mysqli_num_rows($select_completed_job_order);?> </h4>

</div>
<div class="widgets-icons bg-white ms-auto"><i class="fadeIn animated text-dark bx bx-calendar"></i>
</div>
</div></a>
</div>
</div>
</div>
</div>
<?}?>


<div class="row">

<?
$select_upcoming_inspection=mysqli_query($conn,"select * from leads where 1=1 $Subqry $dateqry  and inspection_status!=1 and is_inspection_required=1");
?>

<?




if (mysqli_num_rows($select_upcoming_inspection)>0) {
  

      ?>
   <div class="col-md-6">
      <h4 class="mt-3">Upcoming Inspection</h4>
      <hr>

      
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>

<th>Inspection Date <br>& Time</th>
<?if ($User_type<=1) {?>
<th>Supervisor</th>
  <?}?>
<th>Company Name</th>
<th>Site Details</th>
<th>Customer <br>Requirement</th>
</tr>
</thead>
<tbody>
<?   


$SNo1 = 0;
while($row_leads=mysqli_fetch_array($select_upcoming_inspection))
{ 

   $SNo1=$SNo1+1;
$inspection_date=$row_leads['inspection_date'];
$inspection_time=$row_leads['inspection_time'];
$customer_name=$row_leads['customer_name'];
$company_name=$row_leads['company_name'];
$mobile=$row_leads['mobile'];
$location=$row_leads['location'];
$site_name=$row_leads['site_name'];
$site_address=$row_leads['site_address'];
$supervisor_name=$row_leads['supervisor_name'];
$work_description=$row_leads['work_description'];


if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{$location_icon="";}
   ?>



   <tr>

<td class="d-none"><?=$SNo1; ?></td>

<td>
  <p class="mb-0"><?= date('d-m-Y', strtotime($inspection_date)); ?></p>
  <p class="mb-0"><?=$inspection_time;?></p>
 
</td>

<?if ($User_type<=1) {?>
<td><?=$supervisor_name;?></td>
  <?}?>
<td><?=$company_name; ?>
  <p class="mt-2"><?=$customer_name. " - "."+971 ".$mobile; ?></p>
</td>

<td><p class="mb-0"> <?=$site_name; ?></p>
<p class="mb-0"> <?echo wordwrap($site_address, 25, "<br />\n"); ?><?=$location_icon;?></p></td>
<td><p class="mb-0"> <?echo wordwrap($work_description, 25, "<br />\n"); ?></p></td>

</tr>


   <?}?>
</tbody>
</table>




</div>
</div>
</div>
  </div>
<?}?>
 

   <?

$select_upcoming_job_order=mysqli_query($conn,"select * from job_order where 1=1 $Subqry $dateqry_job  and status=0 order by job_date asc");
if (mysqli_num_rows($select_upcoming_job_order)>0) {
  

      ?>
 <div class="col-md-6">
      <h4 class="mt-3">Upcoming Job Orders</h4>
      <hr>

   
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example3" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th>Job Details</th>
<th>Customer</th>
<th>Site Details</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_job_order=mysqli_fetch_array($select_upcoming_job_order))
{ 

   $SNo=$SNo+1;
$job_date=$row_job_order['job_date'];
$job_time=$row_job_order['job_time'];
$customer_id=$row_job_order['customer_id'];


$select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");

$Row_customer=mysqli_fetch_array($select_customer);

$customer_name=$Row_customer['customer_name'];
$company_name=$row_job_order['company_name'];
$mobile=$row_job_order['customer_mobile'];
$location=$row_job_order['location'];
$site_name=$row_job_order['site_name'];
$site_address=$row_job_order['site_address'];
$supervisor_name=$row_job_order['supervisor_name'];
$work_description=$row_job_order['work_description'];


if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{$location_icon="";}
   ?>



   <tr>

<td class="d-none"><?=$SNo; ?></td>

<td>
  <p class="mb-0"><?= date('d-m-Y', strtotime($job_date)); ?></p>
  <p class="mb-0"><?=$job_time;?></p>
 
</td>


<td><?=$company_name; ?>
  <p class="mt-2"><?=$customer_name. " - "."+971 ".$mobile; ?></p>
</td>

<td><p class="mb-0"> <?=$site_name; ?></p>
<p class="mb-0"> <?echo wordwrap($site_address, 25, "<br />\n"); ?><?=$location_icon;?></p></td>


</tr>


   <?}?>
</tbody>
</table>




</div>
</div>
</div>
  </div>
<?}?>
 
</div>
   <?php 
}
include 'template.php';

?>