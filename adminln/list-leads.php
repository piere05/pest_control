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

$Subqry.="and status='$url_Status' ";
}





if ($search_customer_id!='' || $status!='' || $from_date!='') {
$Subqry="";
}

if ($Subqry=="") {
  if($from_date!='' && $end_date!=''){
  $from_date=$from_date;
  $end_date=$end_date;
}else{
$from_date=date('Y-m-01');
$end_date=date('Y-m-t');
}


if ($search_customer_id!='') {
$subqry.="and customer_name='$search_customer_id'";
}

if ($status!='') {
$subqry.="and status='$status'";
}
$subqry.="and  (date(created_datetime) between '".$from_date."' and '".$end_date."')";
}


?>

<?
if($_GET['act']=='delete' && $ID!='')
{

$delete_lead=mysqli_query($conn,"delete from leads where id='$id'");


if ($delete_lead) {


$msg = 'Deleted Successfully';
header('Location:list-leads.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
header('Location:list-leads.php?alert_msg='.$alert_msg);
}



}


if($_POST['act']=='ust')
{
ob_clean();
if($id != '' && $status != '')
{
$rs_UpdReg = mysqli_query($conn,"update leads set status = '$status' where id = '$id'");
}
?>
<?
$rs_SelReg = mysqli_query($conn,"select * from leads where id = '$id'");
if(mysqli_num_rows($rs_SelReg)>0)
{
$rows_Reg = mysqli_fetch_array($rs_SelReg);
}        
?>
<script>drwStatus('<?=$rows_Reg['id']?>', '<?=$rows_Reg['status']?>')</script>
<?
exit();
}
?>
<script language="javascript">

function chStatus(id,st){
$.ajax({
url:'list-leads.php',
data:'act=ust&id='+id+"&status="+st,      
type:'POST',
success:function(data){  
drwStatus(id, st)
}        
});
}</script>
<script>
function drwStatus(id, St){

if(St=='1'){

document.getElementById("spSt"+id).innerHTML = '<span style="cursor:pointer" onclick="chStatus(\''+id+'\',\'0\')" title="Click To Change Active" class="btn btn-success padx-5 radius-30">Active</span>';
}  
else{
document.getElementById("spSt"+id).innerHTML = '<span style="cursor:pointer" onclick="chStatus(\''+id+'\',\'1\')" title="Click To change Inactive" class="btn btn-danger padx-5 radius-30">Inactive</span>';

}
}
</script>

<script src="crop/jquery.min.js"></script>  
<script src="crop/bootstrap.min.js"></script>
<script src="crop/croppie.js"></script>
<link rel="stylesheet" href="crop/croppie.css"/>


<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<h5 class="mb-0 text-dark">Manage Leads</h5>
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

<? 
$select_leads=mysqli_query($conn,"select * from leads where 1=1  $Subqry $subqry order by id desc ");

if(mysqli_num_rows($select_leads)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th >Lead Priority & Lead Type</th>
<th>Company Name</th>

<th>Site Details</th>
<th>Work Description</th>
<th >Inspection Details</th>
<th>Lead Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_leads=mysqli_fetch_array($select_leads))
{ 
$SNo = $SNo + 1; 
$id=$row_leads['id'];
$lead_type=$row_leads['lead_type'];
$customer_name=$row_leads['customer_name'];
$company_name=$row_leads['company_name'];
$mobile=$row_leads['mobile'];
$site_name=$row_leads['site_name'];
$site_address=$row_leads['site_address'];
$work_description=$row_leads['work_description'];

if ($work_description!='') {
 $Work_description=$work_description;
}else{
   $Work_description=" - ";
}
$lead_priority=$row_leads['lead_priority'];
$city=$row_leads['city'];
$location=$row_leads['location'];
$inspection_status=$row_leads['inspection_status'];
$inspection_description=$row_leads['inspection_description'];

$created_datetime=$row_leads['created_datetime'];
$is_inspection_required=$row_leads['is_inspection_required'];
$status=$row_leads['status'];
$inspected_datetime=date("d-m-Y",strtotime($row_leads['inspected_datetime']));

$required_date=date("d-m-Y",strtotime($row_leads['required_date']));
$required_time=$row_leads['required_time'];


if ($required_date!='30-11--0001' && $required_time!='') {
 $required_details=$required_date." - ".$required_time;
}else{
$required_details="";
}

if($status == '1'){
$Status= '<span class="btn disabled btn-outline-success font-12">Completed</span>';
}

else if(($status==0) && (($is_inspection_required == 1 && $inspection_status == 0) || ($is_inspection_required ==0 ) )){
$Status=' - ';
}
else{
$Status = '<a class="btn btn-danger radius-30 text-white font-12" href="create-quotation.php?lead_id=' . $id . '">Pending</a>';
}



if($inspection_status == '1' && $is_inspection_required == '1'){
$Inspection_status = '<span class="btn btn-outline-success disabled   font-12">Insepection Completed</span>';

if ($status==0) {
$penicon="<a href='update-inspection.php?id=$id&act=lead'  class='btn btn-add btn-sm' tooltip='Edit'><i class='bx bxs-edit'></i></a>";
}
 $details= "<p class='mt-2'>(  <b>".$inspected_datetime."</b>". " ) $penicon</p>";

}
elseif($inspection_status == '0' && $is_inspection_required==3 ) {

$Inspection_status ='<span class="btn disabled btn-outline-danger font-12">Inspection Not Required</span>';
$details='';

}
elseif ($inspection_status == '0' && $is_inspection_required==1 ) {
$Inspection_status ='<span class="btn disabled btn-outline-danger font-12">Inspection Pending</span>';
$details='';
}
else{
  $Inspection_status=" - "; 
  $details='';
}




if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{
  $location_icon="";
}

?>
<tr>

<td class="d-none"><?=$SNo; ?></td>
<td><span class="mb-1  <?=$lead_priority; ?>"><?=$lead_priority; ?></span> <span class=> ( <?=$lead_type; ?> ) <?if ($lead_type=='Website') {?><i class='bx bx-globe globe'></i><?}?></span>
<p class="mb-0"> <?=date('d-m-Y',strtotime($created_datetime));?> <?=date('h:m A',strtotime($created_datetime));?></p>
</td>

<td><?=$company_name; ?><p class="mt-2 "><?=$customer_name. " - "."+971 ".$mobile; ?></p></td>

<td><p class="mb-0"> <?=$site_name; ?></p>
<p class="mb-0"> <? echo wordwrap($site_address, 30, "<br />\n"); ?><?=$location_icon;?></p></td>
<td><? echo wordwrap($Work_description, 25, "<br />\n"); ?><p class="mt-1"><b><?=$required_details;?></b></p></td>

<td><?echo $Inspection_status ." " . $details;?></td>
<td>
<?=$Status; ?>
</td>


<td>
<div class="d-flex order-actions">

<a href="view-leads.php?id=<?=$id; ?>" class="btn btn-add btn-sm" tooltip="View"><i class="lni lni-eye"></i></a>
<?if ($inspection_status !='1' && $status!=1) {?>
<a href="create-leads.php?id=<?=$id; ?>"  class="btn btn-add btn-sm ms-3" tooltip="Edit"><i class="bx bxs-edit"></i></a>

<a href="#" class="ms-3" data-toggle="modal" tooltip="Delete" data-target="#customer2" onClick="if(confirm('Are you sure want to delete this?')) { window.location.href='list-leads.php?act=delete&id=<?=$id ?> ' }"><i class="bx bxs-trash"></i></a>
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










<?php
}
include 'template.php';
?>