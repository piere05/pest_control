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
<a href="list-quotation.php" class="btn btn-danger">Back</a>

</div>
</div>
</div>
<hr/>

<?  $select_quotation=mysqli_query($conn,"select * from quotation where id='$ID'"); 
if(mysqli_num_rows($select_quotation)>>0){ 
$row_quotation=mysqli_fetch_array($select_quotation);
foreach($row_quotation as $K1=>$V1) $$K1 = $V1;

if ($status==0) {
 $tl_Status="Pending";
}else{
  $tl_Status="Completed";
}


$select_customer=mysqli_query($conn,"select * from customers where mobile='$customer_mobile'");
$row_customer=mysqli_fetch_array($select_customer);

$customer_name=$row_customer['customer_name'];


$select_site=mysqli_query($conn,"select * from site where id='$site_id'");
$row_site=mysqli_fetch_array($select_site);

$site_address=$row_site['site_address'];


$select_lead=mysqli_query($conn,"select * from leads where id='$lead_id'");

$row_lead=mysqli_fetch_array($select_lead);

$lead_work_description=$row_lead['work_description'];
$lead_type=$row_lead['lead_type'];
$lead_priority=$row_lead['lead_priority'];

$is_inspection_required=$row_lead['is_inspection_required'];

$inspection_date=$row_lead['inspection_date'];
 $inspection_time=$row_lead['inspection_time'];
 $supervisor_name=$row_lead['supervisor_name'];
 $inspection_description=$row_lead['inspection_description'];

 $inspection_image1=$row_lead['image1'];
 $inspection_image2=$row_lead['image2'];
 $inspection_image3=$row_lead['image3'];
 $inspection_image4=$row_lead['image4'];
 $inspection_image5=$row_lead['image5'];


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

<?}if($required_date!='0000-00-00'){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Date:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=date("d-m-Y",strtotime($required_date));?> </p>
</div>

<?}if($required_time!=':00AM'){?>
<div class="col-md-6 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Job Time:</h6>
</div>

<div class="col-md-6 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$required_time;?> </p>
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

<? }if ($is_inspection_required==1) {
  
  
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
  <div class="row bdr-tp-gray mt-3 w-sm-50">
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
  <a href="uploads/inspection-images/<?=$inspection_image5;?>" class="btn-gallery">
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
  <h5 class="p-2 text-center bg-063232 fw-3">Quotation Details</h5>
<div class="card-body p-5">
<div class="row g-3">


<?if($quotation_date!=''){?>
<div class="col-md-5 w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Quotation Date:</h6>
</div>

<div class="col-md-7 w-sm-50">
<p for="client_name" class="client mb-0"><?=date('d-m-Y',strtotime($quotation_date));?> </p>
</div> 
<?}if($total_amount!=''){?>
<div class="col-md-5 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Total Amount :</h6>
</div>

<div class="col-md-7 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0">AED <?=$total_amount;?> </p>
</div>
<? }if($terms_condition!=''){?>
<div class="col-md-5 bdr-tp-gray w-sm-50">
<h6 for="inputFirstName" class="form-label mb-0">Terms & Condition:</h6>
</div>

<div class="col-md-7 bdr-tp-gray w-sm-50">
<p for="client_name" class="client mb-0"><?=$terms_condition;?> </p>
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

  <div class="col-xl-12">
    <div class="card border-0 border-4 ">
  <h5 class="p-2 text-center bg-063232 fw-3">Service Details</h5>
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
$select_quotation_product=mysqli_query($conn,"select * from quotation_product where quotation_id='$ID'");

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