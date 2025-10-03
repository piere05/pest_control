<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');

$url_Status=$_GET['status'];

if ($url_Status!=''  && $url_Status!='all') {
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
if ($url_Status=="" && $url_Status!='all') {
if ($search_customer_id!='') {
$subqry.="and customer_id='$search_customer_id'";
}

if ($quote_status!='') {
$subqry.="and status='$quote_status'";
}
$subqry.=" and (date(quotation_date) between '".$from_date."' and '".$end_date."')";
}

?>

<?
if($_GET['act']=='delete' && $ID!='')
{
$select_lead=mysqli_query($conn,"select * from quotation where id='$id'");
$row_leadid=mysqli_fetch_array($select_lead);
$LEADID=$row_leadid['lead_id'];
if ($LEADID!=0) {
$update_lead=mysqli_query($conn,"update leads set status=0 where id='$LEADID'");
}


$delete_log=mysqli_query($conn,"delete from price_log where quotation_id='$id' ");

$delete_quotation_product=mysqli_query($conn,"delete from quotation_product where quotation_id='$id'");
$delete_quotation=mysqli_query($conn,"delete from quotation where id='$id'");

if ($delete_quotation && $delete_quotation_product) {
$msg = 'Deleted Successfully';
header('Location:list-quotation.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
header('Location:list-quotation.php?alert_msg='.$alert_msg);
}
}


?>

<script src="crop/jquery.min.js"></script>  
<script src="crop/bootstrap.min.js"></script>
<script src="crop/croppie.js"></script>
<link rel="stylesheet" href="crop/croppie.css"/>


<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<h5 class="mb-0 text-dark">Manage Quotation</h5>
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

<div class="col-md-2">

	<div class="mb-10">
<label for="inputAddress" class="form-label width-100">Status</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="quote_status" id="inlineRadio0" value="" <?if ($quote_status=='') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio0">All</label>

</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="quote_status" id="inlineRadio1" value="0" <?if ($quote_status=='0') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio1">Pending</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="quote_status" id="inlineRadio2" value="1" <?if ($quote_status=='1') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio2">Approved</label>
</div>
</div>
	
</div>


<div class="col-md-3">
<label for="inputFirstName" class="form-label">Select Company / Customer</label>
<select class="single-select" name="search_customer_id" id="search_customer_id">
<option value="">Select Company / Customer</option> 

<?
$select_customer=mysqli_query($conn,"select * from customers where status=1");

while ($row_customer=mysqli_fetch_array($select_customer)) {

   $customer_name=$row_customer['customer_name'];
   $mobile_no=$row_customer['mobile'];
   $company_name=$row_customer['company_name'];
   $Customer_id=$row_customer['id'];
?>
<option value="<?=$Customer_id?>" <?if($search_customer_id==$Customer_id){echo "selected";}?>><?=$company_name." / ".$customer_name." - ".$mobile_no;?></option>
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




<? 
$select_quotation=mysqli_query($conn,"select * from quotation where 1=1  $subqry $url_subqry order by id desc ");

if(mysqli_num_rows($select_quotation)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th >Date</th>
<th>Company Name</th>
<th>Customer Details</th>
<th>Site Details</th>
<th >Total Amount</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_quotation=mysqli_fetch_array($select_quotation))
{ 
$SNo = $SNo + 1; 
$id=$row_quotation['id'];

$quotation_date=$row_quotation['quotation_date'];

 $lead_id=$row_quotation['lead_id'];
$customer_id=$row_quotation['customer_id'];
$company_name=$row_quotation['company_name'];
$mobile=$row_quotation['customer_mobile'];

$select_customer=mysqli_query($conn,"select * from customers where mobile='$mobile'");

$row_customer=mysqli_fetch_array($select_customer);
$customer_name=$row_customer['customer_name'];




$site_name=$row_quotation['site_name'];
$site_id=$row_quotation['site_id'];
$status=$row_quotation['status'];
$location=$row_quotation['location'];
$select_site=mysqli_query($conn,"select * from site where id='$site_id'");

$row_site=mysqli_fetch_array($select_site);
$site_address=$row_site['site_address'];

$total_amount=$row_quotation['total_amount'];
$is_mail_sent=$row_quotation['is_mail_sent'];


if($status == '1'){
$Status= '<span class="btn btn-outline-success disabled">Completed</span>';
}

else{
$Status = '<a href="create-job-order.php?id='.$id.'" class="btn btn-danger" tooltip="Move To Job Order">Move to Job Order</a>';
}

if ($lead_id==0) {
	$label='<div class="position-relative"><img src="assets/images/Our/direct.jpg" class="direct" width="100px"></div>';
}else{
	$label="";
}

if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{
  $location_icon="";
}


if ($is_mail_sent==0) {
	
	$mail_btn= '<a href="quotation-mail.php?id='.$id.'&act=print" tooltip="Send Mail" class="btn btn-add ms-3 btn-sm"><i class="lni lni-envelope"></i></a>';
}
?>

<tr>

<td class="d-none"><?=$SNo; ?></td>
<td>
<p class="mb-0"> <?=date('d-m-Y',strtotime($quotation_date));?><?=$label;?></p>
</td>

<td><?=$company_name; ?></td>
<td><p class="mt-2 "><?=$customer_name. " - "."+971 ".$mobile; ?></p></td>
<td><p class="mb-0"> <?=$site_name; ?></p>
<p class="mb-0"> <? echo wordwrap($site_address, 25, "<br />\n"); ?><?=$location_icon;?></p></td>
<td>AED <?=$total_amount;?> <a type="button" class="ms-1 text-dark" tooltip="Price Log" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onclick="getlog('<?=$id;?>')"><i class="bx bx-info-circle"></i></a></td>
<td>
<?=$Status; ?>
</td>


<td>
	<div class="order-actions">
		
	
<div class="d-flex">

<a href="view-quotation.php?id=<?=$id; ?>" class="btn btn-add ms-3 btn-sm" tooltip="View"><i class="lni lni-eye"></i></a>
<a href="export-invoice.php?id=<?=$id; ?>" target="_blank"  class="btn btn-add btn-sm ms-3" tooltip="Print"><i class="bx bxs-printer"></i></a>
<?=$mail_btn;?>
</div>

<? if($status != '1'){?>
<div class="d-flex  mt-2">
	<a href="create-quotation.php?id=<?=$id; ?>"  class="btn btn-add btn-sm ms-3" tooltip="Edit"><i class="bx bxs-edit"></i></a>
<a href="#" class="ms-3 btn-sm ms-3" data-toggle="modal" tooltip="Delete" data-target="#customer2" onClick="if(confirm('Are you sure want to delete this?')) { window.location.href='list-quotation.php?act=delete&id=<?=$id ?> ' }"><i class="bx bxs-trash "></i></a>
</div>
<?}?>

</div>
</td>
</tr>
<? }}else{ echo "<p>No Record Found</p>";} ?>
</tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="exampleExtraLargeModal" tabindex="1" aria-hidden="false">
<div class="modal-dialog modal-lg p-5">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body p-5">
<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">
        <h6>Price Log</h6>
    <hr>
   
<style type="text/css">
#example_filter{
display: none;
}
#example_length{
display: none;
}

</style>
<div id="output">
	
</div>

</div>

</div>
</div>
</div> 



<script>
	

	function getlog(val){

$.ajax({
url: "fetch-ajax-price-log.php", 
type: "POST",
data: "id="+val,
success: function(result){
$("#output").html(result);
}
	});
}
</script>
<?php
}
include 'template.php';
?>