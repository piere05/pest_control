<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$site = addslashes($site);

if ($search_customer_id!='') {
$subqry.="and customer_id='$search_customer_id'";
}
?>

 



<h5 class="mb-0 text-uppercase">List Site</h5>
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

<div class="card border-top border-0 border-4 border-primary">
   <div class="card-body">
      <div class="row g-3">
      <div class="col-md-3">
<label class="form-label">Select Customer</label>
<select class="single-select" name="search_customer_id" id="search_customer_id" required>
<option value="">Select Customer</option> 

<?
$select_customer=mysqli_query($conn,"select * from customers where status=1");
while ($row_customer=mysqli_fetch_array($select_customer)) {

   $customer_name=$row_customer['customer_name'];
   $mobile_no=$row_customer['mobile'];
   $Customer_id=$row_customer['id'];
   $company_name=$row_customer['company_name'];


   if ($company_name!="") {
    $Company_name=$company_name." / ";
   }else{
       $Company_name="";
   }

?>
<option value="<?=$Customer_id?>" <?if($search_customer_id==$Customer_id){echo "selected";}?>><?=$Company_name;?><?=$customer_name." - ".$mobile_no;?></option>
<?
}
?>
</select>
</div>


<div class="col-md-1 mt-3 align-self-end">
<input type="submit" name="Submit" class="btn btn-primary px-3" value="Search">
</div>
<div class="col-md-1 mt-3 align-self-end">
<a href="site-report.php"  class="btn btn-danger px-3">Clear</a>
</div>
   </div>
   
</div>



</div>
</form>

<?  $select_site=mysqli_query($conn,"select * from site where 1=1 $subqry order by id desc "); 
if(mysqli_num_rows($select_site)>>0){ 
?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th>SNo</th>
<th>Customer Details</th>
<th>Site Name </th>
<th>Incharge Details</th>
<th>Site Address </th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?   
$SNo = 0;
while($row_site=mysqli_fetch_array($select_site))
{ 
$SNo = $SNo + 1; 
$id=$row_site['id'];
$site=$row_site['site_name'];
$description=$row_site['description'];
$site_address=$row_site['site_address'];
$status=$row_site['status'];
$created_datetime=$row_site['created_datetime'];
$mobile=$row_site['mobile'];
$email=$row_site['email'];
$location=$row_site['location'];
$incharge_name=$row_site['incharge_name'];

if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{
  $location_icon="";
}

if ($mobile!='' && $email!='' && $incharge_name!='') {
   $Mobile="$incharge_name"."<br>"." +971 ".$mobile."<br> ".$email;
}elseif ($mobile!='' && $email=='') {

   $Mobile="+971 ".$mobile;
}else{
   $Mobile=" - ";
}

$customer_id=$row_site['customer_id'];
$select_name=mysqli_query($conn,"select * from customers where id='$customer_id'");
$row_name=mysqli_fetch_array($select_name); 
$customer_name =$row_name['customer_name'];   
$customer_mobile =$row_name['mobile']; 

   $Company_name=$row_name['company_name'];
?>
<tr>

<td><?=$SNo; ?></td>
<td><?=$Company_name."<br>"." ( ".$customer_name." - "."+971 ".$customer_mobile." )";?></td>
<td><?=$site; ?></td>
<td><?=$Mobile; ?></td>
<td> <? echo wordwrap($site_address, 30, "<br />\n"); ?><?=$location_icon;?></td>
<td><?if($description!=''){echo $description;}else{echo " - ";} ?></td>

<td>
<div class="d-flex order-actions">
<a href="view-site-report.php?id=<?=$id; ?>" class="btn btn-add btn-sm me-3"><i class="lni lni-eye"></i></a>

<a href="view-site-calendar.php?id=<?=$id; ?>" toooltip="Calendar" class="btn btn-add btn-sm"><i class="lni lni-calendar"></i></a>
</div>
</td>
</tr>
<? } ?>
</tbody>
</table>
</div>
</div>
</div>
<? } else { echo "No Records Found";  } ?>





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