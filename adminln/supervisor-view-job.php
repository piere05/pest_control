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
<a href="supervisor-list-job.php" class="btn btn-danger">Back</a>

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
<? }}?>




</div>
</div>

</div>

  </div>

<div class="col-xl-6">
<div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Job Order Details</h5>
<div class="card-body p-5">
<div class="row g-3">
<?}if($job_date!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Date:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=date("d-m-Y",strtotime($job_date));?> </p>
</div>

<?}if($job_time!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Time:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$job_time;?> </p>
</div>


<?}if($status>='1'){

$select_technician=mysqli_query($conn,"select * from technician_log where job_order_id='$ID'");
$technician_name=[];

while($row_technican=mysqli_fetch_array($select_technician)){
  $technician_name[]=$row_technican['technician_name']." - ". $row_technican['technician_mobile'];

}

  ?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Technicians:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=implode(", ", $technician_name);?>  </p>
</div>
<?}?>
<?if($job_inspection_description!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Inspection Description:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$job_inspection_description;?> </p>
</div>
<?}?>
</div>
</div>

</div>

  </div>


  <div class="col-xl-6">
    <div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Service Details</h5>
<div class="card-body p-5">
<div class="row text-center g-2 mt-1 mb-3 ">

<div class="w-25 w50">
<label for="inputLastName" class="form-label mt-20 mb-0 ">Job Type</label>

</div>
<div class="w-25 w50">
<label for="inputLastName" class="form-label mt-20 mb-0">Duration</label>

</div>
<div class="w-25 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">AMC From & To Date</label>
</div>

<div class="w-25 w50 sm-margin-t">
<label for="inputLastName" class="form-label mt-20 mb-0">Description</label>

</div>

</div>
<?
$select_joborder_product=mysqli_query($conn,"select * from job_order_product where job_order_id='$ID'");
if (mysqli_num_rows($select_joborder_product)>>0) {
 
while($row_joborder_pro=mysqli_fetch_array($select_joborder_product)){

$job_type=$row_joborder_pro['job_type'];
$duration=strtoupper($row_joborder_pro['duration']);

 if($row_joborder_pro['amc_fromdate']!='0000-00-00'){
  $amc_fromdate=date("d-m-Y",strtotime($row_joborder_pro['amc_fromdate']));
$amc_todate=date("d-m-Y",strtotime($row_joborder_pro['amc_todate']));
$amc_description="(".$row_joborder_pro['amc_description'].")";
}else{
  $amc_fromdate=" - ";
  $amc_todate=" - ";
  $amc_description="";
}


$description=$row_joborder_pro['description'];


?>

<div class="row text-center py-2 bdr-tp-gray ">

<div class="w-25 w50">
<p class="my-2"><span class="fw-500"><b><?=$job_type;?></b></span></p>
</div>
<div class="w-25 w50">
<p class="my-2"><?=$duration;?></p>
</div>
<div class="w-25 w50 sm-margin-t">
<p class="my-2"><?=$amc_fromdate." - ".$amc_todate;?><br><?=$amc_description;?></p>
</div>


<div class="w-25 w50 sm-margin-t">
<p class="my-2"><?=$description;?></p>
</div>


<div>

</div>

</div>



<?}?>

</div>
</div>
  </div>

<?
if($status>>0){

?>
  <div class="col-lg-8 col-xl-6 col-sm-12">
<div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Technician Details</h5>
<div class="card-body p-5">
<div class="row g-3">

<div class="col-md-5 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0  font-14">Technician </h6>
</div>

<div class="col-md-3 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0 font-14">Clock In</h6>
</div>
<div class="col-md-3 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0 font-14">Clock Out</h6>
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
<h6 for="inputFirstName" class="form-label mb-0 font-14"><?=$technician_name;?></h6>
</div>

<div class="col-md-3 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0 font-14"><?=$clockin;?></h6>
</div>
<div class="col-md-3 w-sm-33">
<h6 for="inputFirstName" class="form-label mb-0 font-14"><?=$clockout;?></h6>
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

<?}?>
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

<?}?>
  
</div>
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