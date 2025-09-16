<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$pestiside_used = addslashes($pestiside_used);
if($Submit=='Add')
{
$insert_pestiside_used=mysqli_query($conn,"INSERT INTO pestiside_used set pestiside_used = '$pestiside_used', status = '$status',  created_by = ".$_SESSION['UID'].", created_datetime = '$currentTime'  ");
if($insert_pestiside_used)
{
$msg = 'Pestiside Used Added Successfully';
header('Location:manage-pestiside-used.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to add try once again!!!';
}
}
if($Submit=='Update')
{
$update_pestiside_used=mysqli_query($conn,"update pestiside_used set pestiside_used = '$pestiside_used', status = '$status', modified_by = ".$_SESSION['UID'].", modified_datetime ='$currentTime'  where id='$MainId' ");
if($update_pestiside_used)
{
$msg = 'Pestiside Used Updated Successfully';
header('Location:manage-pestiside-used.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
}
}
if($act=='delete' && $ID>0) 
{
$pestiside_used_DeleteValues = mysqli_query($conn,"delete from pestiside_used where id ='$ID' ");
if($pestiside_used_DeleteValues)
{
$alert_msg = 'Pestiside Used Details Successfully';
header('Location:manage-pestiside-used.php?alert_msg='.$alert_msg);
}
else
{
$alert_msg = 'Could not able to delete try once again!!!';
header('Location:manage-pestiside-used.php?alert_msg='.$alert_msg);
}
}


if($_POST['act']=='ust')
{
   ob_clean();
   if($id != '' && $status != '')
   {
      $rs_UpdReg = mysqli_query($conn,"update pestiside_used set status = '$status' where id = '$id'");
   }
   ?>
<?
    $rs_SelReg = mysqli_query($conn,"select * from pestiside_used where id = '$id'");
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
            url:'manage-pestiside-used.php',
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
<div class="breadcrumb-title pe-3">Manage Pestiside Used</div>
<div class="ps-3">
<nav aria-label="breadcrumb">
<ol class="breadcrumb mb-0 p-0">
<li class="breadcrumb-item"><a href="home.php"><i class="bx bx-home-alt color-af251c"></i></a>
</li>
<li class="breadcrumb-item active" aria-current="page">List Pestiside Used</li>
</ol>
</nav>
</div>
<div class="ms-auto">
<div class="col">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onClick="getedit(0)">Add Pestiside Used</button>
<!-- Modal -->
</div>
</div>
</div>
<h6 class="mb-0 text-uppercase">List Pestiside Used</h6>
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
<?  $select_pestiside_used=mysqli_query($conn,"select * from pestiside_used order by id desc "); 
if(mysqli_num_rows($select_pestiside_used)>>0){ 
?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th>SNo</th>
<th>Pestiside Used </th>
<th>Status</th>
<th>Created By</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?   
$SNo = 0;
while($row_pestiside_used=mysqli_fetch_array($select_pestiside_used))
{ 
$SNo = $SNo + 1; 
$id=$row_pestiside_used['id'];
$pestiside_used=$row_pestiside_used['pestiside_used'];
$scope_of_work=$row_pestiside_used['scope_of_work'];

if ($scope_of_work!='') {
 $Scope_of_work=$scope_of_work;
}else{
   $Scope_of_work=" - ";
}
$status=$row_pestiside_used['status'];
$created_datetime=$row_pestiside_used['created_datetime'];
$created_by=$row_pestiside_used['created_by'];
$select_name=mysqli_query($conn,"select * from user where Id='$created_by'");
$row_name=mysqli_fetch_array($select_name); 
$created_name =stripslashes($row_name['name']);      
?>
<tr>

<td><?=$SNo; ?></td>
<td><?=$pestiside_used; ?></td>
<td><div id="spSt<?=$id?>"></div>
            <script>drwStatus('<?=$id?>', '<?=$status?>')</script></td>
<td><?=$created_name; ?></td>
<td>
<div class="d-flex order-actions">
<a href="#" class="btn btn-add btn-sm" tooltip="Edit" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onClick="getedit(<?=$id; ?>)"><i class="bx bxs-edit"></i></a>
<a href="#" class="ms-3" data-toggle="modal" tooltip="Delete" data-target="#customer2" onClick="if(confirm('Are you sure want to delete this?')) { window.location.href='manage-pestiside-used.php?act=delete&id=<?=$id ?> ' }"><i class="bx bxs-trash"></i></a>
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
data: "id="+val+"&act=pestiside_used",
success: function(result){
$("#output").html(result);
}});
}
</script> 
<?php
}
include 'template.php';
?>