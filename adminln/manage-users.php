<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$session_user_type=$_SESSION['USERTYPE'];
if ($session_user_type!=0) {
   header("Location:index.php");
}
?>

<?

if($Submit=='Create User')
{

$select_user2 =mysqli_query($conn,"select * from user where  UserName='$User_name'");

if(mysqli_num_rows($select_user2)==0){

   $encrypted_password=encrypt_decrypt('encrypt', $new_password );
$insert_new_user=mysqli_query($conn,"insert into  user set user_type='$user_type',UserName='$User_name',name='$Name',status='$new_status',Password='$encrypted_password',AddedDate='$currentTime'");



if($insert_new_user)
{
$msg = 'User Details Added Successfully';
header('Location:manage-users.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to add try once again!!!';
  header('Location:manage-users.php?alert_msg='.$alert_msg);
}
}else{
    
$alert_msg = 'User Already exists, please try again!!!';
  header('Location:manage-users.php?alert_msg='.$alert_msg);
}


}
if($Submit=='Update User')
{


$select_user2 =mysqli_query($conn,"select * from user where  UserName='$User_name' and Id!='$ID'");

if(mysqli_num_rows($select_user2)==0){
      $encrypted_password=encrypt_decrypt('encrypt', $new_password );
$update_user=mysqli_query($conn,"update user set user_type='$user_type',UserName='$User_name',name='$Name',status='$new_status',Password='$encrypted_password',UpdatedDate ='$currentTime'  where id='$ID'");


if($update_user)
{
$msg = 'Users Details Updated Successfully';
header('Location:manage-users.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
  header('Location:manage-users.php?alert_msg='.$alert_msg);
}
}else{
      $alert_msg = 'Mobile Number exists, please try again!!!';
  header('Location:manage-users.php?alert_msg='.$alert_msg);
}

}

if($act=='delete' && $ID>0) 
{



      $user_DeleteValues = mysqli_query($conn,"delete from user where id ='$ID' ");

if($user_DeleteValues)
{
$alert_msg = 'User Details Deleted Successfully';
header('Location:manage-users.php?alert_msg='.$alert_msg);
}
else
{
$alert_msg = 'Could not able to delete try once again!!!';
header('Location:manage-users.php?alert_msg='.$alert_msg);
}
}


if($_POST['act']=='ust')
{
   ob_clean();
   if($id != '' && $status != '')
   {
      $rs_UpdReg = mysqli_query($conn,"update user set status = '$status' where id = '$id'");
   }
   ?>
<?
    $rs_SelReg = mysqli_query($conn,"select * from user where id = '$id'");
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
            url:'manage-users.php',
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
  <h5 class="mb-0 text-dark">Manage Users</h5>
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
</div> <? } 

if ($ID!='') {
  

$select_user1=mysqli_query($conn,"select * from user where Id='$ID'");

$row_R=mysqli_fetch_array($select_user1);
foreach($row_R as $K1=>$V1) $$K1 = $V1;

$Password_decode = encrypt_decrypt('decrypt', $Password );
}
?>


<form action="#" method="post" enctype="multipart/form-data" >
<div class="row form-label">
<div class="col-xl-12 ">

<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">

<div class="row g-3">

<div class="col-md-3">
<label for="inputAddress" class="form-label width-100" >User Type</label>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="user_type"  value="1" <? if($user_type =='1' || $user_type =='') { echo 'checked'; } ?> id="admin" required>
<label class="form-check-label"  for="admin">Admin</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="user_type"  value="2" <? if($user_type =='2') { echo 'checked'; } ?> id="supervisor" required>
<label class="form-check-label" for="supervisor">Supervisor</label>
</div>


<div class="form-check form-check-inline">
<input class="form-check-input" type="radio"  name="user_type"  value="3" <? if($user_type =='3') { echo 'checked'; } ?> id="technician" required>
<label class="form-check-label" for="technician">Technician</label>
</div>


</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Mobile - (Username) : <span class="alert-txt">Ex: 507558854</span></label>
<input type="text" name="User_name" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9" value="<?=$UserName;?>" placeholder="Mobile" required>
</div>
<div class="col-md-3">
<label for="inputFirstName" class="form-label">Name</label>
<input type="text" name="Name" class="form-control" value="<?=$name;?>" placeholder="Name" required>
</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Password</label>
<input type="text" name="new_password" class="form-control" value="<?=$Password_decode;?>" placeholder="Password" required>
</div>


<div class="col-md-4">
<label for="inputAddress" class="form-label width-100" >Status</label>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onchange="radioChange(this.value,'status')" name="new_status"  value="1" <? if($status =='1' || $status=='') { echo 'checked'; } ?>>
<label class="form-check-label" >Active</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onchange="radioChange(this.value,'status')" name="new_status"  value="0" <? if($status =='0') { echo 'checked'; } ?>>
<label class="form-check-label" >Inactive</label>
</div>
</div>


<div class="col-md-9 align-self-center">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<?if($ID!=''){echo"Update User";}else{echo"Create User";}?>" >
</div>




</div>
</div>
</div>
</div>
</div>
</form>
<? $select_users=mysqli_query($conn,"select * from user where user_type!=0 order by id desc "); 
if(mysqli_num_rows($select_users)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th>User Type</th>
<th>Mobile</th>
<th>Name</th>
<th>Password</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_customer=mysqli_fetch_array($select_users))
{ 
$SNo = $SNo + 1; 
$id=$row_customer['Id'];
$user_type=$row_customer['user_type'];
$UserName=$row_customer['UserName'];
$Name=$row_customer['name'];
$decrypt_Password=$row_customer['Password'];

$Original_Password = encrypt_decrypt('decrypt', $decrypt_Password );
$email=$row_customer['email'];
$state=$row_customer['state'];
$city=$row_customer['city'];
$alternate_mobile=$row_customer['alternate_mobile'];


$created_datetime=$row_customer['created_datetime'];
$status=$row_customer['status'];

if($user_type=='1'){
  $User_Type="Admin";
}elseif ($user_type=='2') {
$User_Type="Supervisor";
}elseif ($user_type=='3') {
   $User_Type="Technician";
}
?>
<tr>

<td class="d-none"><?=$SNo; ?></td>
<td><?=$User_Type; ?></td>

<td>+971 <?=$UserName; ?></td>
<td><?=$Name; ?></td>
<td><?=$Original_Password;?></td>

<td><div id="spSt<?=$id?>"></div>
            <script>drwStatus('<?=$id?>', '<?=$status?>')</script></td>
<td>
<div class="d-flex order-actions">
<a href="manage-users.php?id=<?=$id; ?>" class="btn btn-add btn-sm" tooltip="Edit"><i class="bx bxs-edit"></i></a>

<!-- <a href="#" class="ms-3" data-toggle="modal" tooltip="Delete" data-target="#customer2" onClick="if(confirm('Are you sure want to delete this?')) { window.location.href='manage-users.php?act=delete&id=<?=$id ?> ' }"><i class="bx bxs-trash"></i></a> -->
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