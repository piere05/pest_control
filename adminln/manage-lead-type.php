<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$lead_type = addslashes($lead_type);
if($Submit=='Add')
{
$insert_lead_type=mysqli_query($conn,"INSERT INTO lead_type set lead_type = '$lead_type', status = '$status',  created_by = ".$_SESSION['UID'].", created_datetime = '$currentTime'  ");
if($insert_lead_type)
{
$msg = 'Lead Type Added Successfully';
header('Location:manage-lead-type.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to add try once again!!!';
}
}
if($Submit=='Update')
{
$update_lead_type=mysqli_query($conn,"update lead_type set lead_type = '$lead_type', status = '$status', modified_by = ".$_SESSION['UID'].", modified_datetime ='$currentTime'  where id='$MainId' ");
if($update_lead_type)
{
$msg = 'Lead Type Updated Successfully';
header('Location:manage-lead-type.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
}
}
if($act=='delete' && $ID>0) 
{
$lead_type_DeleteValues = mysqli_query($conn,"delete from lead_type where id ='$ID' ");
if($lead_type_DeleteValues)
{
$alert_msg = 'Lead Type Details Successfully';
header('Location:manage-lead-type.php?alert_msg='.$alert_msg);
}
else
{
$alert_msg = 'Could not able to delete try once again!!!';
header('Location:manage-lead-type.php?alert_msg='.$alert_msg);
}
}


if($_POST['act']=='ust')
{
   ob_clean();
   if($id != '' && $status != '')
   {
      $rs_UpdReg = mysqli_query($conn,"update lead_type set status = '$status' where id = '$id'");
   }
   ?>
<?
    $rs_SelReg = mysqli_query($conn,"select * from lead_type where id = '$id'");
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
            url:'manage-lead-type.php',
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
<div class="breadcrumb-title pe-3">Manage Lead Type</div>
<div class="ps-3">
<nav aria-label="breadcrumb">
<ol class="breadcrumb mb-0 p-0">
<li class="breadcrumb-item"><a href="home.php"><i class="bx bx-home-alt color-af251c"></i></a>
</li>
<li class="breadcrumb-item active" aria-current="page">List Lead Type</li>
</ol>
</nav>
</div>
<div class="ms-auto">
<div class="col">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onClick="getedit(0)">Add Lead Type</button>
<!-- Modal -->
</div>
</div>
</div>
<h6 class="mb-0 text-uppercase">List Lead Type</h6>
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
<?  $select_lead_type=mysqli_query($conn,"select * from lead_type order by id desc "); 
if(mysqli_num_rows($select_lead_type)>>0){ 
?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th>SNo</th>
<th>Lead Type </th>
<th>Status</th>
<th>Created By</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?   
$SNo = 0;
while($row_lead_type=mysqli_fetch_array($select_lead_type))
{ 
$SNo = $SNo + 1; 
$id=$row_lead_type['id'];
$lead_type=$row_lead_type['lead_type'];
$status=$row_lead_type['status'];
$created_datetime=$row_lead_type['created_datetime'];
$created_by=$row_lead_type['created_by'];
$select_name=mysqli_query($conn,"select * from user where Id='$created_by'");
$row_name=mysqli_fetch_array($select_name); 
$created_name =stripslashes($row_name['name']);      
?>
<tr>

<td><?=$SNo; ?></td>
<td><?=$lead_type; ?></td>
<td><div id="spSt<?=$id?>"></div>
            <script>drwStatus('<?=$id?>', '<?=$status?>')</script></td>
<td><?=$created_name; ?></td>
<td>
<div class="d-flex order-actions">
<a href="#" class="btn btn-add btn-sm" tooltip="Edit" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onClick="getedit(<?=$id; ?>)"><i class="bx bxs-edit"></i></a>
<a href="#" class="ms-3" data-toggle="modal" tooltip="Delete" data-target="#customer2" onClick="if(confirm('Are you sure want to delete this?')) { window.location.href='manage-lead-type.php?act=delete&id=<?=$id ?> ' }"><i class="bx bxs-trash"></i></a>
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
function getedit(val){

$.ajax({
url: "ajax-modal.php", 
type: "POST",
data: "id="+val+"&act=lead_type",
success: function(result){
$("#output").html(result);
}});
}
</script> 
<?php
}
include 'template.php';
?>