<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$main_user_type=$_SESSION['USERTYPE'];

$user_id=$_SESSION['UID'];
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');



$url_Status=$_GET['status'];
if ($url_Status!='') {
 
$Subqry.="and inspection_status='$url_Status'";
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
$subqry.="and customer_name='$search_customer_id'";
}

if ($status!='') {
$subqry.="and status='$status'";
}
$subqry.="and  (date(created_datetime) between '".$from_date."' and '".$end_date."')";
}

if ($main_user_type=='2') {
   $supervisor_subqry.=" and supervisor_id='$user_id'";
}
?>




<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
  <h5 class="mb-0 text-dark"><?if ($url_Status=='Completed') {
    echo "Completed";
  }elseif($url_Status=='Pending'){echo "Pending";}else{echo "Manage";}?> Inspection</h5>
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

<div class="col-md-3">

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
<label class="form-check-label" for="inlineRadio2">Completed</label>
</div>
</div>
  
</div>


<div class="col-md-2">
<label for="inputFirstName" class="form-label">Select Company / Customer</label>
<select class="single-select" name="search_customer_id" id="search_customer_id">
<option value="">Select Company / Customer</option> 

<?
$select_customer=mysqli_query($conn,"select * from leads where status=1");

while ($row_customer=mysqli_fetch_array($select_customer)) {

   $customer_name=$row_customer['customer_name'];
   $mobile_no=$row_customer['mobile'];
   $company_name=$row_customer['company_name'];
   $Customer_id=$row_customer['id'];

   if ($company_name!='') {
  $Company_name=$company_name." / ";
   }else{
    $Company_name="";
   }
?>
<option value="<?=$customer_name?>" <?if($search_customer_id==$customer_name){echo "selected";}?>><?=$Company_name.$customer_name." - ".$mobile_no;?></option>
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


<? $select_inspection=mysqli_query($conn,"select * from leads where 1=1 $Subqry $subqry  $supervisor_subqry and is_inspection_required=1 order by id desc ");


if(mysqli_num_rows($select_inspection)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<?if ($main_user_type=='0') {

?>
<th>Supervisor Name</th>
<?}?>
<th>Inspection Date & Time</th>
<th>Company Name</th>
<th>Site Details</th>
<th>Work Description</th>
<th>Inspection Description</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_inspection=mysqli_fetch_array($select_inspection))
{ 
$SNo = $SNo + 1; 
$Lead_id=$row_inspection['id'];

$supervisor_name=$row_inspection['supervisor_name'];
$inspection_date=$row_inspection['inspection_date'];
$inspection_time=$row_inspection['inspection_time'];

$inspection_status=$row_inspection['inspection_status'];
$inspection_description=$row_inspection['inspection_description'];

$inspection_compltedtime=$row_inspection['inspected_datetime'];
$customer_name=$row_inspection['customer_name'];
$company_name=$row_inspection['company_name'];

$mobile=$row_inspection['mobile'];
$location=$row_inspection['location'];
$site_name=$row_inspection['site_name'];
$site_address=$row_inspection['site_address'];

$lead_status=$row_inspection['status'];
$work_description=$row_inspection['work_description'];
$lead_priority=$row_inspection['lead_priority'];

if($inspection_status == '1'){
$Inspection_status = '<span class="btn  disabled btn-outline-success  padx-5 radius-30 "> Completed</span>';
}else{
$Inspection_status ='<span class="btn disabled  btn-outline-danger padx-5 radius-30 ">Pending</span>';
}


if ($main_user_type==0 && $lead_status!=1) {
  $editb="<a href='update-inspection.php?id=$Lead_id'  class='btn btn-add btn-sm' tooltip='Edit'><i class='bx bxs-edit'></i></a>";
}else{
  $editb="";
}


if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{
  $location_icon="";
}
?>
<tr>

<td class="d-none"><?=$SNo; ?></td>
<?if ($main_user_type=='0') {

?>
<td><?=$supervisor_name; ?></td>
<?}?>
<td> <p class="<?=$lead_priority;?> mb-0"><?=$lead_priority; ?></p>
  <p class="mb-0"><?= date('d-m-Y', strtotime($inspection_date)); ?></p>
  <p class="mb-0"><?=$inspection_time;?></p>
 
</td>


<td><?=$company_name; ?>
  <p class="mt-2"><?=$customer_name. " - "."+971 ".$mobile; ?></p>
</td>

<td><p class="mb-0"> <?=$site_name; ?></p>
<p class="mb-0"> <?echo wordwrap($site_address, 25, "<br />\n"); ?><?=$location_icon;?></p></td>
<td><?if($work_description!=''){echo wordwrap($work_description, 25, "<br />\n"); }else{echo " - ";}?></td>

<td><?if($inspection_description!=''){echo wordwrap($inspection_description, 30, "<br />\n");?><?=$editb;?><a href="view-leads.php?id=<?=$Lead_id;?>&act=inspection" class="btn btn-add btn-sm" tooltip="View"><i class="lni lni-eye"></i></a>  <?}else{if($main_user_type==2 && $status!=1){?> <a href='update-inspection.php?id=<?=$Lead_id;?>' class='btn btn-primary px-2 mt-1'>Update</a><?}else{echo " - ";}}?></td>

<td><?=$Inspection_status; ?>
<p class="mt-2 "> <?if ($inspection_status ==1){echo " ( ". date("d-m-Y h:m A",strtotime($inspection_compltedtime)) .")";}?> </p>

</td>
</tr>
<? }}else{ echo "<p>No Record Found</p>";} ?>
</tbody>
</table>
</div>
</div>
</div>
<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-x">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">

<div id="output"></div>
</div>
</div>
</div>

</div>
</div>
</div>



<script>
function getedit(val){
$.ajax({
url: "ajax-modal.php", 
type: "POST",
data: "id="+val+"&act=inspection",
success: function(result){
$("#output").html(result);
}});
}
</script>

<?php
}
include 'template.php';
?>