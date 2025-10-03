<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');

if($Submit=='Create Customer')
{

$select_customer2 =mysqli_query($conn,"select * from customers where mobile='$mobile'");

if(mysqli_num_rows($select_customer2)==0){
$insert_customer=mysqli_query($conn,"insert into customers set company_name='$company_name',customer_name='$customer_name',email='$email', mobile='$mobile',trn_no='$trn_no',location='$location',alternate_mobile='$alternate_mobile',address='$address',city='$city', status = '$status',  created_by = ".$_SESSION['UID'].", created_datetime = '$currentTime'");
if($insert_customer)
{
$msg = 'Customer Details Added Successfully';
header('Location:manage-customer.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to add try once again!!!';
  header('Location:manage-customer.php?alert_msg='.$alert_msg);
}
}else{
    
$alert_msg = 'Mobile Number exists, please try again!!!';
  header('Location:manage-customer.php?alert_msg='.$alert_msg);
}
}
if($Submit=='Update Customer')
{


$select_customer2 =mysqli_query($conn,"select * from customers where mobile='$mobile' and id!='$ID'");

if(mysqli_num_rows($select_customer2)==0){
$update_customer=mysqli_query($conn,"update customers set company_name='$company_name',customer_name='$customer_name', mobile='$mobile', email='$email',alternate_mobile='$alternate_mobile',trn_no='$trn_no',location='$location',address='$address',city='$city', status = '$status',modified_by= ".$_SESSION['UID'].", modified_datetime ='$currentTime'  where id='$ID'");


if($update_customer)
{
$msg = 'Customer Details Updated Successfully';
header('Location:manage-customer.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
  header('Location:manage-customer.php?alert_msg='.$alert_msg);
}
}else{
      $alert_msg = 'Mobile Number exists, please try again!!!';
  header('Location:manage-customer.php?alert_msg='.$alert_msg);
}


}

if($act=='delete' && $ID>0) 
{
  $customer_DeleteValues = mysqli_query($conn,"delete from customers where id ='$ID' ");

if($customer_DeleteValues)
{
$alert_msg = 'Customer Details Deleted Successfully';
header('Location:manage-customer.php?alert_msg='.$alert_msg);
}
else
{
$alert_msg = 'Could not able to delete try once again!!!';
header('Location:manage-customer.php?alert_msg='.$alert_msg);
}
}


if($_POST['act']=='ust')
{
   ob_clean();
   if($id != '' && $status != '')
   {
      $rs_UpdReg = mysqli_query($conn,"update customers set status = '$status' where id = '$id'");
   }
   ?>
<?
    $rs_SelReg = mysqli_query($conn,"select * from customers where id = '$id'");
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
            url:'manage-customer.php',
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
  <h5 class="mb-0 text-dark">Manage Customer</h5>
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
  

$select_customer1 =mysqli_query($conn,"select * from customers where id='$ID'");

$row_R=mysqli_fetch_array($select_customer1);
foreach($row_R as $K1=>$V1) $$K1 = $V1;

}

?>



<form action="#" method="post" enctype="multipart/form-data" >
<div class="row form-label">
<div class="col-xl-12 ">

<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">

<div class="row g-3">

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Company Name</label>
<input type="text" name="company_name" class="form-control" value="<?=$company_name;?>" placeholder="Company Name" required>
</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Contact Person Name <span class="req">*</span></label>
<input type="text" name="customer_name" class="form-control" value="<?=$customer_name;?>" placeholder="Contact Person Name" required>
</div>



<div class="col-md-3">
<label for="inputFirstName" class="form-label">Email <span class="req">*</span></label>
<input type="text" name="email" class="form-control" value="<?=$email;?>" placeholder="Email Address" required>
</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Mobile <span class="req">*</span></label>
<input type="text" name="mobile" class="form-control" value="<?=$mobile;?>" placeholder="Mobile" aria-required="true"  value="" pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');"  maxlength="9" min="9"  required>
</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Alternate Mobile</label>
<input type="text" name="alternate_mobile" class="form-control" value="<?=$alternate_mobile;?>" placeholder="Alternate Mobile" aria-required="true" pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9">
</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Address <span class="req">*</span></label>
<textarea type="textarea" name="address" class="form-control" placeholder="Address" required><?=$address;?></textarea>
</div>


<div class="col-md-3">
<label for="inputFirstName" class="form-label">City <span class="req">*</span></label>
<input type="text" name="city" class="form-control" value="<?=$city;?>" placeholder="City" required>
</div>


<div class="col-md-3">
<label for="inputFirstName" class="form-label">TRN No</label>
<input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="trn_no" class="form-control" value="<?=$trn_no;?>" placeholder="TRN No">
</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Location URL: </label>
<input type="url" name="location" class="form-control" value="<?=$location;?>" placeholder="Location">
</div>

<div class="col-md-2">
<label for="inputAddress" class="form-label width-100" >Status</label>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onchange="radioChange(this.value,'status')" name="status"  value="1" <? if($status =='1' || $status=='') { echo 'checked'; } ?>>
<label class="form-check-label" >Active</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onchange="radioChange(this.value,'status')" name="status"  value="0" <? if($status =='0') { echo 'checked'; } ?>>
<label class="form-check-label" >Inactive</label>
</div>
</div>

<div class="col-md-9 align-self-center">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<?if($ID!=''){echo "Update Customer";}else{echo "Create Customer";}?>">
</div>




</div>
</div>
</div>
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
<th>Company Name</th>

<th>Contact Person Name</th>
<th>Mobile</th>
<th>Email</th>
<th>Alternate Mobile</th>
<th>Address</th>
<th>Status</th>
<th>Action</th>
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
$address=$row_customer['address'];
$street2=$row_customer['street2'];
$mobile=$row_customer['mobile'];
$email=$row_customer['email'];
$state=$row_customer['state'];
$city=$row_customer['city'];
$trn_no=$row_customer['trn_no'];
$location=$row_customer['location'];

$pin_code=$row_customer['pincode'];
$alternate_mobile=$row_customer['alternate_mobile'];

if ($alternate_mobile!='') {
  $Alternate_mobile="+971 ".$alternate_mobile;
}else{
    $Alternate_mobile="- ";
}
$created_datetime=$row_customer['created_datetime'];
$status=$row_customer['status'];

if($city!=''){
  $state1=" - ".$state. " - " . $pin_code;
} 
if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{
  $location_icon="";
}

?>
<tr>

<td class="d-none"><?=$SNo; ?></td>
<td><?= $company_name; ?></td>
<td><?=$customer_name; ?></td>

<td><? if($mobile !=''){ echo '+971 '.$mobile; }else { echo " - "; } ?></td>
<td><?=$email; ?></td>
<td> <?=$Alternate_mobile;?></td>
<td><?=wordwrap($address, 30, "<br/>\n").'<br/>'.$city; ?><?=$location_icon;?><p class="mt-1"><?=$trn_no;?></p></td>

<td><div id="spSt<?=$id?>"></div>
            <script>drwStatus('<?=$id?>', '<?=$status?>')</script></td>
<td>
<div class="d-flex order-actions">
<a href="manage-customer.php?id=<?=$id; ?>" class="btn btn-add btn-sm" tooltip="Edit"><i class="bx bxs-edit"></i></a>

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