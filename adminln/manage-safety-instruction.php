<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$safety_instruction = addslashes($safety_instruction);
if($Submit=='Create Instructions')
{
$insert_safety_instruction=mysqli_query($conn,"INSERT INTO safety_instructions set safety_instruction = '$safety_instruction',  created_by = ".$_SESSION['UID'].", created_datetime = '$currentTime'");

if($insert_safety_instruction)
{
$msg = 'Safety Instructions Added Successfully';
header('Location:manage-safety-instruction.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to add try once again!!!';
header('Location:manage-safety-instruction.php?alert_msg='.$alert_msg);
}
}
if($Submit=='Update Instructions')
{
$update_safety_instruction=mysqli_query($conn,"update safety_instructions set safety_instruction = '$safety_instruction', modified_by = ".$_SESSION['UID'].", modified_datetime ='$currentTime'  where id='$ID' ");
if($update_safety_instruction)
{
$msg = 'Safety Instructions Updated Successfully';
header('Location:manage-safety-instruction.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
header('Location:manage-safety-instruction.php?alert_msg='.$alert_msg);
}
}


?>




<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<div class="breadcrumb-title pe-3">Manage Safety Instructions</div>
<div class="ps-3">
<nav aria-label="breadcrumb">
<ol class="breadcrumb mb-0 p-0">
<li class="breadcrumb-item"><a href="home.php"><i class="bx bx-home-alt color-af251c"></i></a>
</li>
<li class="breadcrumb-item active" aria-current="page">List Safety Instructions</li>
</ol>
</nav>
</div>

</div>


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
</div> <? } 
$select_safety_instruction=mysqli_query($conn,"select * from safety_instructions order by id desc "); 


if ($ID!='') {
 
  

$select_instruction =mysqli_query($conn,"select * from safety_instructions where id='$ID'");

$row_R=mysqli_fetch_array($select_instruction);
foreach($row_R as $K1=>$V1) $$K1 = $V1;
 
?>


<form action="#" method="post" enctype="multipart/form-data" >
<div class="row form-label">
<div class="col-xl-12 ">

<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">

<div class="row g-3">

<div class="col-md-8">
<label for="inputFirstName" class="form-label">Safety Instructions</label>

<textarea class="form-control" name="safety_instruction" class="safety_instruction" placeholder="Safety Instructions" id="editor" ><?=$safety_instruction;?></textarea>

</div>


<div class="col-md-5  mt-5">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<?if($ID!=''){echo "Update Instructions";}else{echo "Create Instructions";}?>">
</div>

</div>
</div>
</div>
</div>
</div>
</form>
<?}?>

<?  
if(mysqli_num_rows($select_safety_instruction)>>0){ 
?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th>SNo</th>
<th>Safety Instructions</th>
<th>Created By</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?   
$SNo = 0;
while($row_safety_instruction=mysqli_fetch_array($select_safety_instruction))
{ 
$SNo = $SNo + 1; 
$id=$row_safety_instruction['id'];
$safety_instruction=$row_safety_instruction['safety_instruction'];

if ($scope_of_work!='') {
 $Scope_of_work=$scope_of_work;
}else{
   $Scope_of_work=" - ";
}
$status=$row_safety_instruction['status'];
$created_datetime=$row_safety_instruction['created_datetime'];
$created_by=$row_safety_instruction['created_by'];
$select_name=mysqli_query($conn,"select * from user where Id='$created_by'");
$row_name=mysqli_fetch_array($select_name); 
$created_name =stripslashes($row_name['name']);      
?>
<tr>

<td><?=$SNo; ?></td>
<td><?=$safety_instruction; ?></td>
<td><?=$created_name; ?></td>
<td>
<div class="d-flex order-actions">
<a href="?id=<?=$id; ?>" class="btn btn-add btn-sm" tooltip="Edit"  ><i class="bx bxs-edit"></i></a>

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



<script src="assets/plugins/ckeditor/ckeditor.js"></script>
  
    <script>
      ClassicEditor.create( document.querySelector( '#editor' ) ).catch( error => {
    console.error(error);
  });
    </script>
<?php
}
include 'template.php';
?>