<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
$user_id=$_SESSION['UID'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$url_Status=$_GET['status'];
if ($url_Status!='') {
$url_subqry="and status=$url_Status";
}else{
	$url_subqry="";
}

?>



<script src="crop/jquery.min.js"></script>  
<script src="crop/bootstrap.min.js"></script>
<script src="crop/croppie.js"></script>
<link rel="stylesheet" href="crop/croppie.css"/>


<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<h5 class="mb-0 text-dark">Customer Feedback</h5>
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


<? 
$select_feedback=mysqli_query($conn,"select * from feedback where supervisor_id='$user_id'  order by id desc"); 

if(mysqli_num_rows($select_feedback)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th> Job Details</th>
<th>Company & Customer Details</th>
<th>Staff Detials</th>
<th>Feedback</th>
<th>Ratings</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_feedback=mysqli_fetch_array($select_feedback))
{ 
$SNo = $SNo + 1; 
 $jobid=$row_feedback['job_order_id'];


$select_job_order=mysqli_query($conn,"select * from job_order where id='$jobid'");

$row_job_order=mysqli_fetch_array($select_job_order);

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

$select_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");

$row_supervisor=mysqli_fetch_array($select_supervisor);

$supervisor_mobile=$row_supervisor['UserName'];
$location=$row_job_order['location'];





$select_technician=mysqli_query($conn,"select * from technician_log where job_order_id='$jobid'");
$technician_name=[];

while($row_technican=mysqli_fetch_array($select_technician)){
  $technician_name[]=$row_technican['technician_name'];

}
$technician_details="Technician: ".implode(", ", $technician_name);




if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{
  $location_icon="";
}



 $tot_rating=$row_feedback['ratings'];
$description=$row_feedback['description'];
$created_datetime=date("d-m-Y",strtotime($row_feedback['created_datetime']));

?>
<tr>

<td class="d-none"><?=$SNo; ?></td>
<td><p class="mb-0 ">Job Date: <?=$job_date;?></p><p class="mt-1 ">Job Time: <?=$job_time;?></p></td>
<td><?=$company_name; ?><p class="mt-1"><?=$customer_name. " - "."+971 ".$mobile; ?></p></td>


<td><p class="mb-0"> <?=$supervisor_name." - ".$supervisor_mobile; ?> 	</p> <p class="mb-0 mt-1">  <?=$technician_details; ?></p>

<td> <? echo wordwrap($description, 30, "<br />\n"); ?></td>
<td class="job-ratings">
  <?
   if($tot_rating>=1){

   

  ?>
        <div class="your-review d-flex">
<span class="text-black"> ( <?=$tot_rating;?> )</span>
        <?php for ($i = 5; $i >= 1; $i--) { ?>
          <input type="radio" value="<?= $i ?>" id="rating-<?= $SNo ?>-<?= $i ?>" 
            <?php if ($tot_rating == $i) { echo "checked"; } ?> disabled>
          <label for="rating-<?=$SNo; ?>-<?= $i ?>" class="me-2"></label>
        <?php } ?>
          
      </div>

      <?}else{echo " - ";}?>
  
</td>


</tr>
<? }}else{ echo "<p>No Record Found</p>";} ?>
</tbody>
</table>
</div>
</div>
</div>












<?php
}
include 'template.php';
?>