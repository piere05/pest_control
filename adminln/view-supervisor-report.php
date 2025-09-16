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
$url_subqry="and status=0";
}else{
	$url_subqry="";
}


if ($url_Status=="") {
	

if ($search_supervisor_id!='') {
$subqry.="and Id='$search_supervisor_id'";
}

if ($status!='') {
$subqry.="and status='$status'";
}
}
?>





<script src="crop/jquery.min.js"></script>  
<script src="crop/bootstrap.min.js"></script>
<script src="crop/croppie.js"></script>
<link rel="stylesheet" href="crop/croppie.css"/>


<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<h5 class="mb-0 text-dark">Supervisor Report</h5>
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
<label for="inputFirstName" class="form-label">Select Supervisor</label>
<select class="single-select" name="search_supervisor_id" id="search_supervisor_id">
<option value="">Select Supervisor</option> 

<?
$select_supervisor=mysqli_query($conn,"select * from user where user_type='2'");

while ($row_customer=mysqli_fetch_array($select_supervisor)) {

   $supervisor_name=$row_customer['name'];
   $mobile_no=$row_customer['UserName'];
   $company_name=$row_customer['company_name'];
   $supervisor_id=$row_customer['Id'];
?>
<option value="<?=$supervisor_id?>" <?if($search_supervisor_id==$supervisor_id){echo "selected";}?>><?=$supervisor_name." - ".$mobile_no;?></option>
<?
}
?>
</select>
</div>



<div class="col-md-3 mt-46">
<input type="submit" name="Submit" class="btn btn-primary px-3" value="Search">
</div>

</div>
</form>




<? $select_report=mysqli_query($conn,"select * from user where 1=1 and user_type=2 $subqry order by id desc");



if(mysqli_num_rows($select_report)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th>Supervisor Name </th>
<th>Supervisor Mobile </th>
<th>No. of <br>Inspected Site</th>
<th>No. of Job Orders</th>


</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_report=mysqli_fetch_array($select_report))
{ 
$SNo = $SNo + 1; 
$id=$row_report['Id'];
$Supervisor_mobile=$row_report['UserName'];
$Supervisor_name=$row_report['name'];

$select_inspection=mysqli_query($conn,"select * from leads where supervisor_id='$id'");

$select_job_order=mysqli_query($conn,"select * from job_order where supervisor_id='$id'");


$select_feedback=mysqli_query($conn,"select sum(ratings) as tot_rating from feedback where supervisor_id='$id' ");

$row_feedback=mysqli_fetch_array($select_feedback);

 $tot_rating=$row_feedback['tot_rating'];
?>
<tr>

<td class="d-none"><?=$SNo; ?></td>
<td><?=$Supervisor_name;?></td>
<td>+971 <?= $Supervisor_mobile; ?> </td>

<td><?=mysqli_num_rows($select_inspection); ?></td>

<td><?=mysqli_num_rows($select_job_order); ?></td>


</tr>
<? }
}else{ echo "<p>No Record Found</p>";} ?>
</tbody>
</table>
</div>
</div>
</div>






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