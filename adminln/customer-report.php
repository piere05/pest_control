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

if($from_date!='' && $end_date!=''){
  $from_date=$from_date;
  $end_date=$end_date;
}else{
$from_date=date('Y-m-01');
$end_date=date('Y-m-t');
}
if ($url_Status=="") {
	

$subqry=" and (date(quotation_date) between '".$from_date."' and '".$end_date."')";
}
?>





<script src="crop/jquery.min.js"></script>  
<script src="crop/bootstrap.min.js"></script>
<script src="crop/croppie.js"></script>
<link rel="stylesheet" href="crop/croppie.css"/>


<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<h5 class="mb-0 text-dark">Customer Report</h5>
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
<label for="inputFirstName" class="form-label">From</label>
<input type="date" name="from_date" class="form-control" value="<?=$from_date;?>" required>
</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">To</label>
<input type="date" name="end_date" class="form-control" value="<?=$end_date;?>" required>
</div>


<div class="col-md-4 mt-3 align-self-end">
<input type="submit" name="Submit" class="btn btn-primary px-3" value="Search">
</div>

</div>
</form>




<? $select_customer=mysqli_query($conn,"select * from customers order by id desc "); 
if(mysqli_num_rows($select_customer)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th>Company Name </th>
<th>Customer Name</th>
<th>Mobile </th>
<th>Email</th>
<th>Address </th>
<th> TRN No</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_customer=mysqli_fetch_array($select_customer))
{ 
$SNo = $SNo + 1; 
$id=$row_customer['id'];
$company_name=$row_customer['company_name'];
$customer_name=$row_customer['customer_name'];
$mobile=$row_customer['mobile'];
$email=$row_customer['email'];
$trn_no=$row_customer['trn_no'];
$address=$row_customer['address'];
$city=$row_customer['city'];
$location=$row_customer['location'];

if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{
  $location_icon="";
}


if ($trn_no!='') {
	$Trn_no=$trn_no;
}else{
	$Trn_no=" - ";
}

?>
<tr>

<td class="d-none"><?=$SNo; ?></td>

<td><?= $company_name; ?> </td>

<td><?=$customer_name; ?></td>
<td> <p class="mb-1">+971 <?=$mobile; ?></p></td>
<td><p class="mb-1"><?=$email; ?></p></td>
<td> <p class="mb-0"> <? echo wordwrap($address, 30, "<br />\n")." - ".$city; ?><?=$location_icon;?></p></td>


<td><?=$Trn_no; ?></td>

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