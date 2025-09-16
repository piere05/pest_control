<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$site = addslashes($site);


if ($Submit=='Search') {
   if ($search_customer_id!='') {
       $Subqry.="and customer_id='$search_customer_id'";
   }

}
if($Submit=='Add')
{

   $select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
   $row_customer=mysqli_fetch_array($select_customer);

   $customer_mobile=$row_customer['mobile'];
    $company_name=$row_customer['company_name'];

$insert_site=mysqli_query($conn,"INSERT INTO site set customer_id='$customer_id',company_name='$company_name',customer_mobile='$customer_mobile',site_name = '$site_name',mobile = '$mobile',email = '$email',location = '$location',incharge_name = '$incharge_name',email_service = '$mail_service',site_address = '$site_address',description = '$description', status = '$status',  created_by = ".$_SESSION['UID'].", created_datetime = '$currentTime'  ");
if($insert_site)
{
$msg = 'Site Added Successfully';
header('Location:manage-site.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to add try once again!!!';
}
}
if($Submit=='Update')
{

   $select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
   $row_customer=mysqli_fetch_array($select_customer);
   $customer_mobile=$row_customer['mobile'];
   $company_name=$row_customer['company_name'];

$update_site=mysqli_query($conn,"update site set customer_id='$customer_id',company_name='$company_name',customer_mobile='$customer_mobile',site_name = '$site_name',incharge_name = '$incharge_name',email_service = '$mail_service',mobile = '$mobile',email = '$email',location = '$location',site_address = '$site_address',description = '$description', status = '$status', modified_by = ".$_SESSION['UID'].", modified_datetime ='$currentTime'  where id='$MainId' ");
if($update_site)
{
$msg = 'Site Updated Successfully';
header('Location:manage-site.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
}
}
if($act=='delete' && $ID>0) 
{
$site_DeleteValues = mysqli_query($conn,"delete from site where id ='$ID' ");
if($site_DeleteValues)
{
$alert_msg = 'Site Details Successfully';
header('Location:manage-site.php?alert_msg='.$alert_msg);
}
else
{
$alert_msg = 'Could not able to delete try once again!!!';
header('Location:manage-site.php?alert_msg='.$alert_msg);
}
}


if($_POST['act']=='ust')
{
   ob_clean();
   if($id != '' && $status != '')
   {
      $rs_UpdReg = mysqli_query($conn,"update site set status = '$status' where id = '$id'");
   }
   ?>
<?
    $rs_SelReg = mysqli_query($conn,"select * from site where id = '$id'");
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
            url:'manage-site.php',
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



<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<div class="breadcrumb-title pe-3">Manage Site</div>
<div class="ps-3">
<nav aria-label="breadcrumb">
<ol class="breadcrumb mb-0 p-0">
<li class="breadcrumb-item"><a href="home.php"><i class="bx bx-home-alt color-af251c"></i></a>
</li>
<li class="breadcrumb-item active" aria-current="page">List Site</li>
</ol>
</nav>
</div>
<div class="ms-auto">
<div class="col">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onClick="getedit(0)">Add Site</button>
<!-- Modal -->
</div>
</div>
</div>
<h6 class="mb-0 text-uppercase">List Site</h6>
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
<label class="form-label">Select Company /Customer Name</label>
<select class="single-select" name="search_customer_id" id="search_customer_id" required>
<option value="">Select Company /Customer Name</option> 

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
<a href="manage-site.php"  class="btn btn-danger px-3">Clear</a>
</div>
   </div>
   
</div>



</div>
</form>

<?  $select_site=mysqli_query($conn,"select * from site where 1=1 $Subqry order by id desc "); 
if(mysqli_num_rows($select_site)>>0){ 
?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th>SNo</th>
<th>Customer Details</th>
<th>Site Name </th>
<th>Incharge Details</th>
<th>Site Address </th>
<th>Description</th>
<th>Status</th>
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
<td><div id="spSt<?=$id?>"></div>
            <script>drwStatus('<?=$id?>', '<?=$status?>')</script></td>

<td>
<div class="d-flex order-actions">
<a href="#" class="btn btn-add btn-sm" tooltip="Edit" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onClick="getedit(<?=$id; ?>)"><i class="bx bxs-edit"></i></a>
<a href="#" class="ms-3" data-toggle="modal" tooltip="Delete" data-target="#customer2" onClick="if(confirm('Are you sure want to delete this?')) { window.location.href='manage-site.php?act=delete&id=<?=$id ?> ' }"><i class="bx bxs-trash"></i></a>
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

   $('.single-select').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
allowClear: Boolean($(this).data('allow-clear')),
});
function getedit(val){

$.ajax({
url: "ajax-modal.php", 
type: "POST",
data: "id="+val+"&act=site",
success: function(result){
$("#output").html(result);
}});
}
</script> 
<?php
}
include 'template.php';
?>