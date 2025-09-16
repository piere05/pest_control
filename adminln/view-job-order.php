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
<a href="list-job-order.php" class="btn btn-danger">Back</a>

</div>
</div>
</div>
<hr/>

<?  $select_job_order=mysqli_query($conn,"select * from job_order where id='$ID'"); 
if(mysqli_num_rows($select_job_order)>>0){ 
$row_job_order=mysqli_fetch_array($select_job_order);
foreach($row_job_order as $K1=>$V1) $$K1 = $V1;

if ($status==0) {
 $tl_Status="Pending";
}elseif ($status==1) {
 $tl_Status="Ready To Job";
}elseif($status==2){
 $tl_Status="Work in Progress";
}else{
  $tl_Status="Completed";
}


$select_customer=mysqli_query($conn,"select * from customers where mobile='$customer_mobile'");
$row_customer=mysqli_fetch_array($select_customer);

$customer_name=$row_customer['customer_name'];



$select_quotation_id=mysqli_query($conn,"select * from quotation where id='$quotation_id'");

$row_quotation_id=mysqli_fetch_array($select_quotation_id);

$lead_id=$row_quotation_id['lead_id'];


$select_lead=mysqli_query($conn,"select * from leads where id='$lead_id'");

$row_lead=mysqli_fetch_array($select_lead);

$lead_work_description=$row_lead['work_description'];

$lead_type=$row_lead['lead_type'];
$lead_priority=$row_lead['lead_priority'];

$is_inspection_required=$row_lead['is_inspection_required'];

$inspection_date=$row_lead['inspection_date'];
 $inspection_time=$row_lead['inspection_time'];
 $inspection_description=$row_lead['inspection_description'];
 $supervisor_name=$row_lead['supervisor_name'];
 $inspection_image1=$row_lead['image1'];
 $inspection_image2=$row_lead['image2'];
 $inspection_image3=$row_lead['image3'];
 $inspection_image4=$row_lead['image4'];
 $inspection_image5=$row_lead['image5'];



 //-----------------------------------------------

 $select_job_order_Details=mysqli_query($conn,"select * from job_order_details where job_order_id='$ID'");

$row_detials=mysqli_fetch_array($select_job_order_Details);

$job_inspection_image1=$row_detials['inspection_image1'];
$job_inspection_image2=$row_detials['inspection_image2'];
$job_inspection_image3=$row_detials['inspection_image3'];
$job_inspection_image4=$row_detials['inspection_image4'];
$job_inspection_image5=$row_detials['inspection_image5'];
$job_inspection_description=$row_detials['inspection_description'];

$before_image1=$row_detials['before_image1'];
$before_image2=$row_detials['before_image2'];
$before_image3=$row_detials['before_image3'];
$before_image4=$row_detials['before_image4'];
$before_image5=$row_detials['before_image5'];

$after_image1=$row_detials['after_image1'];
$after_image2=$row_detials['after_image2'];
$after_image3=$row_detials['after_image3'];
$after_image4=$row_detials['after_image4'];
$after_image5=$row_detials['after_image5'];


$service_image1=$row_detials['service_image1'];
$service_image2=$row_detials['service_image2'];
$service_image3=$row_detials['service_image3'];
$service_image4=$row_detials['service_image4'];
$service_image5=$row_detials['service_image5'];

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
<? }if($customer_mobile!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Customer Mobile:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$customer_mobile;?> </p>
</div>
<?}if($site_name!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Site Name:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
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
<p for="client_name" class="client mb-0"><a href="<?=$location;?>" target="_blank">Go To Location</a>  </p>
</div>
<?}if($lead_type!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Lead Type:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$lead_type;?> </p>
</div>
<?}if($lead_work_description!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Customer Requirement:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$lead_work_description;?> </p>
</div>

<?}if($lead_priority!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0 ">Lead Priority:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0 <?=$lead_priority;?>"><?=$lead_priority;?> </p>
</div>
<? } 
 if ($is_inspection_required==1) {
  
  
?>


<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Inspection Date and Time:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=date("d-m-Y",strtotime($inspection_date))." | ".$inspection_time;?> </p>
</div>


<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Inspection Description:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$inspection_description;?> </p>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Supervisor Name:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$supervisor_name;?> </p>
</div>

<?
if($inspection_image1!=''){?>
  <div class="row bdr-tp-gray mt-3">
<div class="col-md-3 col-lg-3 ">
<h6 for="inputFirstName" class="form-label mb-0">Images:</h6>
</div>

<div class="col-md-3 col-lg-3 w-sm-50 sm-mt-3">
   <a href="uploads/inspection-images/<?=$inspection_image1;?>" class="btn-gallery">
      <img src="uploads/inspection-images/<?=$inspection_image1;?>" width="80px" alt="" />
    </a>
   
</div>

<?if($inspection_image2!=''){?>
<div class="col-md-3 col-lg-3 w-sm-50 sm-mt-3">
  <a href="uploads/inspection-images/<?=$inspection_image2;?>" class="btn-gallery">
<img src="uploads/inspection-images/<?=$inspection_image2;?>" width="80px">
</a>
</div>
<?}if($inspection_image3!=''){?>
<div class="col-md-3 col-lg-3 col-12  w-sm-50 sm-mt-3">
  <a href="uploads/inspection-images/<?=$inspection_image3;?>" class="btn-gallery">
<img src="uploads/inspection-images/<?=$inspection_image3;?>" width="80px">
</a>
</div>
<?}if($inspection_image4!=''){?>

<div class="col-md-3 col-lg-3 col-12 mt-3  w-sm-50 sm-mt-3">
  <a href="uploads/inspection-images/<?=$inspection_image4;?>" class="btn-gallery">
<img src="uploads/inspection-images/<?=$inspection_image4;?>" width="80px">
</a>
</div>
<?}if($inspection_image5!=''){?>
<div class="col-md-3 col-lg-3 col-12 mt-3  w-sm-50 sm-mt-3">
  <a href="uploads/inspection-images/<?=$image5;?>" class="btn-gallery">
<img src="uploads/inspection-images/<?=$inspection_image5;?>" width="80px">
</a>
</div>

<? }?>


</div>
<? }
}

?>
<?
$select_feedback=mysqli_query($conn,"select * from  feedback where job_order_id='$ID'");



if(mysqli_num_rows($select_feedback)>>0){
$row_feedback=mysqli_fetch_array($select_feedback);
 $tot_rating=$row_feedback['ratings'];
$description=$row_feedback['description'];


  ?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Feedback:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><? echo wordwrap($description, 30, "<br />\n"); ?> </p>
</div>


<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Ratings:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50 job-ratings">
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
</div>

<?}?>



</div>
</div>

</div>

  </div>


  <div class="col-xl-6">
<div class="card border-0 border-4 ">
<h5 class="p-2 text-center bg-063232 fw-3">Job Order Details</h5>
<div class="card-body p-5">
<div class="row g-3">


<?if($job_order_date!=''){?>
<div class="col-md-5 w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Order Date:</h6>
</div>

<div class="col-md-7 w-sm-50">
<p for="client_name" class="client mb-0"><?=date('d-m-Y',strtotime($job_order_date));?> </p>
</div> 

<?}if($supervisor_name!=''){

$select_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");

$row_supervisor=mysqli_fetch_array($select_supervisor);

$supervisor_mobile=$row_supervisor['UserName'];

  ?>
<div class="col-md-5 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Supervisor Name:</h6>
</div>

<div class="col-md-7 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$supervisor_name." - ".$supervisor_mobile;?> </p>
</div>
<?}if($job_date!=''){?>
<div class="col-md-5 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Date:</h6>
</div>

<div class="col-md-7 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=date("d-m-Y",strtotime($job_date));?> </p>
</div>

<?}if($job_time!=''){?>
<div class="col-md-5 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Time:</h6>
</div>

<div class="col-md-7 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$job_time;?> </p>
</div>

<?}
?>



<?if($total_amount!=''){?>
<div class="col-md-5 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Total Amount :</h6>
</div>

<div class="col-md-7 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0">AED <?=$total_amount;?> </p>
</div>

<?}if($status!=''){?>
<div class="col-md-5 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Status:</h6>
</div>

<div class="col-md-7 bdr-tp-gray w-sm-50">
 <p for="client_name" class="client mb-0"><?=$tl_Status?></p>
</div>  
<?}?>

</div>
</div>

</div>



  </div>
<?
if($status>>0){

?>
  <div class="col-lg-6 col-xl-6 col-sm-12">
<div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Technician Details</h5>
<div class="card-body p-5">
<div class="row g-3">

<div class="col-md-5 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0">Technician Name</h6>
</div>

<div class="col-md-3 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0">Clock In</h6>
</div>
<div class="col-md-3 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0">Clock Out</h6>
</div>

</div>

<?


$select_technician=mysqli_query($conn,"select * from technician_log where job_order_id='$ID'");


while($row_technican=mysqli_fetch_array($select_technician)){
  $technician_name=$row_technican['technician_name']." - ". $row_technican['technician_mobile'];

$clock_in_time=$row_technican['clock_in_time'];
$clock_out_time=$row_technican['clock_out_time'];

if ($clock_in_time=='' ) {
 $clockin=" - ";
}else
{
  $clockin=$clock_in_time;
}

if ($clock_out_time=='' ) {
 $clockout=" - ";
}else
{
  $clockout=$clock_out_time;
}

  ?>


<div class="row g-3 mt-1 pb-1 bdr-tp-gray">

<div class="col-md-5 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0"><?=$technician_name;?></h6>
</div>

<div class="col-md-3 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0"><?=$clockin;?></h6>
</div>
<div class="col-md-3 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0"><?=$clockout;?></h6>
</div>


</div>

<?}?>
</div>

</div>

  </div>
<?}?>


<?if($status>>0 && $job_inspection_image1!=''){?>
  <div class="col-xl-6">
<div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Job Images </h5>
<div class="card-body p-5">
<div class="row g-3">
  <?
  if($job_inspection_image1!=''){?>
<div class="row g-3">

<div class="col-md-3 col-lg-3">
<h6 for="inputFirstName" class="form-label mb-0">Job Inspection Images:</h6>
</div>

<div class="col-md-2 col-lg-2 site-img w-sm-50" >
   <a href="uploads/job-inspection-images/<?=$job_inspection_image1;?>" class="btn-gallery">
      <img src="uploads/job-inspection-images/<?=$job_inspection_image1;?>" width="80px" alt="" />
    </a>
   
</div>

<?if($job_inspection_image2!=''){?>
<div class="col-md-2 col-lg-2 site-img  w-sm-50">
  <a href="uploads/job-inspection-images/<?=$job_inspection_image2;?>" class="btn-gallery">
<img src="uploads/job-inspection-images/<?=$job_inspection_image2;?>" width="80px">
</a>
</div>
<?}if($job_inspection_image3!=''){?>
<div class="col-md-2 col-lg-2 col-12 site-img  w-sm-50 sm-mt-3">
  <a href="uploads/job-inspection-images/<?=$job_inspection_image3;?>" class="btn-gallery">
<img src="uploads/job-inspection-images/<?=$job_inspection_image3;?>" width="80px">
</a>
</div>
<?}if($job_inspection_image4!=''){?>

<div class="col-md-2 col-lg-2 col-12 site-img mt-3  w-sm-50 sm-mt-3">
  <a href="uploads/job-inspection-images/<?=$job_inspection_image4;?>" class="btn-gallery">
<img src="uploads/job-inspection-images/<?=$job_inspection_image4;?>" width="80px">
</a>
</div>
<?}if($job_inspection_image5!=''){?>

<div class="col-md-2 col-lg-2 col-12 site-img mt-3  w-sm-50 sm-mt-3">
  <a href="uploads/job-inspection-images/<?=$job_inspection_image5;?>" class="btn-gallery">
<img src="uploads/job-inspection-images/<?=$job_inspection_image5;?>" width="80px">
</a>
</div>
<? }?>
</div>
<?}?>
  <div class="row g-3 bdr-tp-gray">
<?if($before_image1!=''){?>

<div class="col-md-3 col-lg-3 w-sm-50 ">
<h6 for="inputFirstName" class="form-label mb-0">Before Images:</h6>
</div>
<div class="col-md-3 col-lg-3 w-sm-50">
   <a href="uploads/before-images/<?=$before_image1;?>" class="btn-gallery">
      <img src="uploads/before-images/<?=$before_image1;?>" width="100px" alt="" />
    </a>
</div>

<?}if($before_image2!=''){?>
<div class="col-md-3 col-lg-3 w-sm-50">
  <a href="uploads/before-images/<?=$before_image2;?>" class="btn-gallery">
<img src="uploads/before-images/<?=$before_image2;?>" width="100px">
</a>
</div>
<?}if($before_image3!=''){?>
<div class="col-md-3 col-lg-3 col-12 w-sm-50 sm-mt-3">
  <a href="uploads/before-images/<?=$before_image3;?>" class="btn-gallery">
<img src="uploads/before-images/<?=$before_image3;?>" width="100px">
</a>
</div>
<?}if($before_image4!=''){?>

<div class="col-md-3 col-lg-3 col-12 mt-3 w-sm-50 sm-mt-3">
  <a href="uploads/before-images/<?=$before_image4;?>" class="btn-gallery">
<img src="uploads/before-images/<?=$before_image4;?>" width="100px">
</a>
</div>
<?}if($before_image5!=''){?>

<div class="col-md-3 col-lg-3 col-12 mt-3 w-sm-50 sm-mt-3">
  <a href="uploads/before-images/<?=$before_image5;?>" class="btn-gallery">
<img src="uploads/before-images/<?=$before_image5;?>" width="100px">
</a>
</div>
<? }?>


</div>
<?if($service_image1!=''){?>
<div class="row g-3 bdr-tp-gray">

<div class="col-md-3 col-lg-3">
<h6 for="inputFirstName" class="form-label mb-0">Service Images:</h6>
</div>

<div class="col-md-2 col-lg-2 site-img w-sm-50" >
   <a href="uploads/service-images/<?=$service_image1;?>" class="btn-gallery">
      <img src="uploads/service-images/<?=$service_image1;?>" width="80px" alt="" />
    </a>
   
</div>

<?if($service_image2!=''){?>
<div class="col-md-2 col-lg-2 site-img  w-sm-50">
  <a href="uploads/service-images/<?=$service_image2;?>" class="btn-gallery">
<img src="uploads/service-images/<?=$service_image2;?>" width="80px">
</a>
</div>
<?}if($service_image3!=''){?>
<div class="col-md-2 col-lg-2 col-12 site-img  w-sm-50 sm-mt-3">
  <a href="uploads/service-images/<?=$service_image3;?>" class="btn-gallery">
<img src="uploads/service-images/<?=$service_image3;?>" width="80px">
</a>
</div>
<?}if($service_image4!=''){?>

<div class="col-md-2 col-lg-2 col-12 site-img mt-3  w-sm-50 sm-mt-3">
  <a href="uploads/service-images/<?=$service_image4;?>" class="btn-gallery">
<img src="uploads/service-images/<?=$service_image4;?>" width="80px">
</a>
</div>
<?}if($service_image5!=''){?>

<div class="col-md-2 col-lg-2 col-12 site-img mt-3  w-sm-50 sm-mt-3">
  <a href="uploads/service-images/<?=$service_image5;?>" class="btn-gallery">
<img src="uploads/service-images/<?=$service_image5;?>" width="80px">
</a>
</div>
<? }?>
</div>
<?}?>
  <?if($after_image1!=''){?>
<div class="row mt-4 bdr-tp-gray">

<div class="col-md-3 col-lg-3">
<h6 for="inputFirstName" class="form-label mb-0">After Images:</h6>
</div>

<div class="col-md-3 col-lg-3">
   <a href="uploads/after-images/<?=$after_image1;?>" class="btn-gallery">
      <img src="uploads/after-images/<?=$after_image1;?>" width="100px" alt="" />
    </a>
   
</div>

<?if($after_image2!=''){?>
<div class="col-md-3 col-lg-3">
  <a href="uploads/after-images/<?=$after_image2;?>" class="btn-gallery">
<img src="uploads/after-images/<?=$after_image2;?>" width="100px">
</a>
</div>
<?}if($after_image3!=''){?>
<div class="col-md-3 col-lg-3 col-12">
  <a href="uploads/after-images/<?=$after_image3;?>" class="btn-gallery">
<img src="uploads/after-images/<?=$after_image3;?>" width="100px">
</a>
</div>
<?}if($after_image4!=''){?>

<div class="col-md-3 col-lg-3 col-12 mt-3">
  <a href="uploads/after-images/<?=$after_image4;?>" class="btn-gallery">
<img src="uploads/after-images/<?=$after_image4;?>" width="100px">
</a>
</div>
<? }?>


  
</div>
<?}?>
</div>

</div>
</div>
  </div>
  <?}?>
  <div class="col-xl-12">
    <div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Job Order Details</h5>
<div class="card-body p-5">
<div class="row g-2 mt-1 mb-3 ">

<div class="w-12  w50">
<label for="inputLastName" class="form-label mt-20 mb-0">Job Type</label>

</div>

<div class="w-20 w50">
<label for="inputLastName" class="form-label mt-20 mb-0">Scope of Work</label>

</div>

<div class="w-15 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Duration</label>

</div>

<div class="w-15 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Amount (AED)</label>
</div>

  <div class="w-10 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">VAT (%)</label>

</div>
<div class="w-15 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Description</label>

</div>
<div class="w-10 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Total</label>
</div>
</div>
<?
$select_quotation_product=mysqli_query($conn,"select * from job_order_product where job_order_id='$ID'");

if (mysqli_num_rows($select_quotation_product)>>0) {
 
while($row_quotation_pro=mysqli_fetch_array($select_quotation_product)){

$job_type=$row_quotation_pro['job_type'];
$job_type_id=$row_quotation_pro['job_type_id'];


$select_Scopre=mysqli_query($conn,"select * from job_type where id='$job_type_id'");

$row_scope=mysqli_fetch_array($select_Scopre);

$scope_of_work=$row_scope['scope_of_work'];


if ($scope_of_work!='') {
 $Scope_of_work=$scope_of_work;
}else{
  $Scope_of_work=" - ";
}



$duration=strtoupper($row_quotation_pro['duration']);

 if($row_quotation_pro['amc_fromdate']!='0000-00-00'){
  $amc_fromdate=date("d-m-Y",strtotime($row_quotation_pro['amc_fromdate']));
$amc_todate=date("d-m-Y",strtotime($row_quotation_pro['amc_todate']));
$amc_description="(".$row_quotation_pro['amc_description'].")";
}else{
  $amc_fromdate="";
  $amc_todate="";
  $amc_description="";
}

$amount=$row_quotation_pro['amount'];
$vat=$row_quotation_pro['vat'];
$total=$row_quotation_pro['total'];
$description=$row_quotation_pro['description'];

 $nettot=$row_quotation_pro['nettot'];

?>

<div class="row py-2 bdr-tp-gray ">

<div class="w-12 w50">
<p class="my-2"><span class="fw-500"><b><?=$job_type;?></b></span></p>

</div>

<div class="w-20 w50">
<p><? echo wordwrap($Scope_of_work, 100, "<br />\n"); ?></p>
</div>
<div class="w-15 w50 sm-margin-t">
<p class="my-2"><?=$duration;?></p>
<p class="my-2"><?=$amc_fromdate." - ".$amc_todate;?><br><?=$amc_description;?></p>
</div>

<div class="w-15 w50 sm-margin-t">
<p class="my-2">AED <?=$amount;?></p>
</div>
<div class="w-10 w50 sm-margin-t">
<p class="my-2"><?=$vat.' %';?></p>
</div>
<div class="w-15 p-0 w50 sm-margin-t">
<p class="my-2"><?=$description;?></p>
</div>
<div class="w-10 p-0 w50 sm-margin-t">
<p class="my-2"><?=$total;?></p>
</div>

<div>

</div>

</div>

<?}?>
<div class="text-end">
<p class="my-2 m-25 ">Net Total: <b>AED <?=$total_amount;?></b></p>
</div>
<?}?>

</div>
</div>
  </div>
  </div> 
</form>





<? } else { echo "No Records Found";  } ?>
<?php
}
include 'template.php';
?>