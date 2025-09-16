<?php
function main() {
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$LeadID=$_GET['id'];
$Act=$_GET['act'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');


if ($Act!='') {
 $backurl='list-inspection.php';
}else{
  $backurl='list-leads.php';
}

?>



<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
  

<div class="ms-auto">
<div class="col">
<!-- Button trigger modal -->
<a href="<?=$backurl;?>" class="btn btn-danger">Back</a>

</div>
</div>
</div>
<hr/>

<?  $select_leads=mysqli_query($conn,"select * from leads where id='$LeadID'"); 
if(mysqli_num_rows($select_leads)>>0){ 
$row_leads=mysqli_fetch_array($select_leads);
foreach($row_leads as $K1=>$V1) $$K1 = $V1;

if ($status==0) {
 $tl_Status="Pending";
}else{
  $tl_Status="Completed";
}
 
?>
<form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm(this)" name="form1">
<div class="row form-label">
<div class="col-xl-6">
<div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Lead Details</h5>
<div class="card-body p-5">
<div class="row g-3">

<? 
  if($lead_type!=''){?>
<div class="col-md-6  w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Lead Type :</h6>
</div>

<div class="col-md-6  w-sm-50">
 <p for="client_name" class="client mb-0"><?=$lead_type;?></p>
</div>


<?}if($job_type!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Type:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$job_type;?> </p>
</div>

<?}if($company_name!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Company Name:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
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
<? }if($required_date!='0000-00-00'){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Date:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=date("d-m-Y",strtotime($required_date));?> </p>
</div>

<?}if($required_time!=':00AM' && $required_time!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Time:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$required_time;?> </p>
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
<?}if($work_description!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Customer Requirement:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$work_description;?> </p>
</div>

<?}if($location!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Location:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><a href="<?=$location;?>" target="_blank">Go To Location </a></p>
</div>
<?}if($lead_priority!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Lead Priority:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0 <?=$lead_priority;?>"><?=$lead_priority;?> </p>
</div>

<? } if($status!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Status:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
 <p for="client_name" class="client mb-0"><?=$tl_Status?></p>
</div>  
<? }
  
?>




</div>
</div>

</div>

  </div>
<?

if ($is_inspection_required==1) {
if ($inspection_status==0) {
$Inspection_status="Pending";
}else{
$Inspection_status="Completed";
}
?>

<div class="col-xl-6">
<div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Inspection  Details</h5>
<div class="card-body p-5">
<div class="row g-3">

<? 
  if($supervisor_name!=''){?>
<div class="col-md-6 w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Supervisor Name :</h6>
</div>

<div class="col-md-6 w-sm-50">
 <p for="client_name" class="client mb-0"><?=$supervisor_name;?></p>
</div>
<?}if($inspection_date!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Inspection Date:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?= date('d-m-Y', strtotime($inspection_date)); ?> </p>
</div> 
<?}if($inspection_time!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Inspection Time:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$inspection_time;?> </p>
</div>

<? }if($inspection_description!=''){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Inspection Description:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$inspection_description;?> </p>
</div>


<? }if($image1!=''){?>
  <div class="row bdr-tp-gray mt-3">
<div class="col-md-3 col-lg-3 ">
<h6 for="inputFirstName" class="form-label mb-0">Images:</h6>
</div>

<div class="col-md-3 col-lg-3 w-sm-50 sm-mt-3">
   <a href="uploads/inspection-images/<?=$image1;?>" class="btn-gallery">
      <img src="uploads/inspection-images/<?=$image1;?>" width="100px" alt="" />
    </a>
   
</div>

<?if($image2!=''){?>
<div class="col-md-3 col-lg-3 w-sm-50 sm-mt-3">
  <a href="uploads/inspection-images/<?=$image2;?>" class="btn-gallery">
<img src="uploads/inspection-images/<?=$image2;?>" width="100px">
</a>
</div>
<?}if($image3!=''){?>
<div class="col-md-3 col-lg-3 col-12  w-sm-50 sm-mt-3">
  <a href="uploads/inspection-images/<?=$image3;?>" class="btn-gallery">
<img src="uploads/inspection-images/<?=$image3;?>" width="100px">
</a>
</div>
<?}if($image4!=''){?>

<div class="col-md-3 col-lg-3 col-12 mt-3  w-sm-50 sm-mt-3">
  <a href="uploads/inspection-images/<?=$image4;?>" class="btn-gallery">
<img src="uploads/inspection-images/<?=$image4;?>" width="100px">
</a>
</div>
<?}if($image5!=''){?>
<div class="col-md-3 col-lg-3 col-12 mt-3  w-sm-50 sm-mt-3">
  <a href="uploads/inspection-images/<?=$image5;?>" class="btn-gallery">
<img src="uploads/inspection-images/<?=$image5;?>" width="100px">
</a>
</div>

<? }?>


</div>
<? }if($Inspection_status!=''){?>



<? }if($Inspection_status!=''){?>
  <div class="row mt-3">
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Inspection Status:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$Inspection_status;?> </p>
</div>
</div>
<? }
  
?>




</div>
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