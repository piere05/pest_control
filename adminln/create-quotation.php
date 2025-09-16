<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$currentdate = date('Y-m-d');
$Lead_id=$_GET['lead_id'];
if($Submit=='Create Quotation')
{

$select_old_customer=mysqli_query($conn,"select * from customers where mobile='$customer_mobile' and company_name='$company_name' and customer_name='$customer_name'");


if (mysqli_num_rows($select_old_customer)>>0) {
   $row_old_customer=mysqli_fetch_array($select_old_customer);
   $last_customer_id=$row_old_customer['id'];
   $update_customer=mysqli_query($conn,"update customers set customer_name='$customer_name',email='$email',alternate_mobile='$alternate_mobile',address='$address',city='$city',modified_by=".$_SESSION['UID'].",modified_datetime='$currentTime' where company_name='$company_name' and mobile='$customer_mobile'");
}else{
     $update_customer=mysqli_query($conn,"insert into customers set company_name='$company_name',mobile='$customer_mobile',customer_name='$customer_name',email='$email',alternate_mobile='$alternate_mobile',address='$address',city='$city',status=1,created_by=".$_SESSION['UID'].",created_datetime='$currentTime'");
     $last_customer_id = $conn->insert_id;
}
if ($Lead_id!='') {
   $sitesubqry=" and site_name='$site_name' ";

}else{
     $sitesubqry=" and id='$site_name'";

}
$select_site=mysqli_query($conn,"select * from site where company_name='$company_name' $sitesubqry");

if (mysqli_num_rows($select_site)>>0) {
      $row_old_site=mysqli_fetch_array($select_site);

   $last_site_id=$row_old_site['id'];
   $Site_name=$row_old_site['site_name'];
   $update_site=mysqli_query($conn,"update site set site_name='$Site_name',site_address='$site_address',modified_by=".$_SESSION['UID'].",incharge_name='$incharge_name',mobile='$incharge_phone',email='$incharge_email',status=1,modified_datetime='$currentTime' where company_name='$company_name' and site_name='$Site_name'");

}else{
    $Site_name=$site_name;
    $update_site=mysqli_query($conn,"insert into site set customer_id='$last_customer_id',company_name='$company_name',customer_mobile='$customer_mobile',site_name='$Site_name',site_address='$site_address',incharge_name='$incharge_name',mobile='$incharge_phone',email='$incharge_email',status=1,created_by=".$_SESSION['UID'].",created_datetime='$currentTime'");

    $last_site_id = $conn->insert_id;
}

if ($Lead_id!='') {
$update_lead=mysqli_query($conn,"update leads set status=1 where id='$Lead_id'");
}
 $p_count = count($job_type); 
 $required_time=$time_hr.":".$time_min.$time_am;
$insert_quotation=mysqli_query($conn,"insert into quotation set customer_id='$last_customer_id',service_count='$p_count',company_name='$company_name',customer_mobile='$customer_mobile',location='$location',required_date='$required_date',required_time='$required_time',site_id='$last_site_id',site_name='$Site_name',lead_id='$Lead_id',quotation_date='$quotation_date',terms_condition='$terms_condition',total_amount='$grandtot',status='0',created_datetime='$currentTime'");


 $last_quotation_id = $conn->insert_id;

 
$job_type1=0;
  $duration1=0;
  $amount1=0;
$vat1=0;
  $description1=0;
$total_amount1=0;

      for ($i = 0; $i < $p_count; $i++) {
$index = $i + 1;
$job_type1=$job_type[$i];
$amount1=$amount[$i];
$vat1=$vat[$i];
$total_amount1=$total_amount[$i];
$duration1=$duration[$i];
$description1=$description[$i];


$amcfrom1=$amcfrom[$i];
 $amcto1=$amcto[$i];
 $amcdesc1=$amcdescription[$i];
if ($duration1 == 'amc') {
 $amc_from1=$amcfrom[$i];
 $amc_to1=$amcto[$i];

}else{
       $amc_from1 = '';
         $amc_to1   = '';
}

$select_job=mysqli_query($conn,"select * from job_type where id='$job_type1'");
$row_job=mysqli_fetch_array($select_job);
$job_type_name=$row_job['job_type'];


$insert_quotation_product=mysqli_query($conn," insert into quotation_product set quotation_id='$last_quotation_id',job_type_id='$job_type1',job_type='$job_type_name',duration='$duration1',amc_fromdate='$amcfrom1',amc_todate='$amcto1',amc_description='$amcdesc1',amount='$amount1',vat='$vat1',total='$total_amount1',description='$description1',created_datetime='$currentTime'");
 $last_product_id = $conn->insert_id;
$insert_price_log=mysqli_query($conn,"insert into price_log set quotation_id='$last_quotation_id',product_id='$last_product_id',job_type='$job_type_name',job_id='$job_type1',amount='$amount1',vat='$vat1',total='$total_amount1',created_datetime='$currentTime'");
      }
if ($update_customer &&  $update_site && $insert_quotation &&  $insert_quotation_product) {
    $msg='Quotation Created Successfully';
header("Location:list-quotation.php?msg=$msg");
}else{
   $alert_msg='Quotation Not Created'; 
}
}

//------------------------------------------------------



if($Submit=='Update Quotation')
{

  $select_old_customer=mysqli_query($conn,"select * from customers where  mobile='$customer_mobile'");


if (mysqli_num_rows($select_old_customer)>>0) {
   $row_old_customer=mysqli_fetch_array($select_old_customer);
   $last_customer_id=$row_old_customer['id'];
   $update_customer=mysqli_query($conn,"update customers set customer_name='$customer_name',email='$email',alternate_mobile='$alternate_mobile',address='$address',city='$city',modified_by=".$_SESSION['UID'].",modified_datetime='$currentTime' where company_name='$company_name' and mobile='$customer_mobile'");
}  


$select_site=mysqli_query($conn,"select * from site where company_name='$company_name' and site_name='$site_name'");

if (mysqli_num_rows($select_site)>>0) {
      $row_old_site=mysqli_fetch_array($select_site);
   $last_site_id=$row_old_site['id'];
   $update_site=mysqli_query($conn,"update site set site_name='$site_name',site_address='$site_address',modified_by=".$_SESSION['UID'].",status=1,modified_datetime='$currentTime' where company_name='$company_name' and site_name='$site_name'");
}

$p_count = count($job_type); 
 $required_time=$time_hr.":".$time_min.$time_am;

$update_quotation=mysqli_query($conn,"update quotation set quotation_date='$quotation_date',location='$location',required_date='$required_date',required_time='$required_time',site_name='$site_name',service_count='$p_count',terms_condition='$terms_condition',total_amount='$grandtot',status='0',is_mail_sent='0',modified_datetime='$currentTime' where id='$ID'");
$quotation_ProductDelete = mysqli_query($conn,"delete from quotation_product where quotation_id ='$ID' ");


 
$job_type1=0;
  $duration1=0;
  $amount1=0;
$vat1=0;
  $description1=0;
$total_amount1=0;
$amc_from1=0;
$amc_to1=0;
      for ($i = 0; $i < $p_count; $i++) {

$job_type1=$job_type[$i];
$amount1=$amount[$i];
$vat1=$vat[$i];
$total_amount1=$total_amount[$i];
$duration1=$duration[$i];
$description1=$description[$i];

$amcfrom1=$amcfrom[$i];
 $amcto1=$amcto[$i];
 $amcdesc1=$amcdescription[$i];
if ($duration1 == 'amc') {
 $amc_from1=$amcfrom[$i];
 $amc_to1=$amcto[$i];

}else{
       $amc_from1 = '';
         $amc_to1   = '';
}

$select_job=mysqli_query($conn,"select * from job_type where id='$job_type1'");
$row_job=mysqli_fetch_array($select_job);
$job_type_name=$row_job['job_type'];

$insert_quotation_product=mysqli_query($conn," insert into quotation_product set quotation_id='$ID',job_type_id='$job_type1',job_type='$job_type_name',duration='$duration1',amc_fromdate='$amcfrom1',amc_todate='$amcto1',amc_description='$amcdesc1',amount='$amount1',vat='$vat1',total='$total_amount1',description='$description1',created_datetime='$currentTime'");
 $last_product_id = $conn->insert_id;

 $select_old_values=mysqli_query($conn,"select * from price_log where quotation_id='$ID' and amount='$amount1' and vat='$vat1' and total='$total_amount1' and job_type='$job_type_name' order by id desc limit 1");
 if (mysqli_num_rows($select_old_values)==0) {
    

$insert_price_log=mysqli_query($conn,"insert into price_log set quotation_id='$ID',product_id='$last_product_id',job_type='$job_type_name',job_id='$job_type1',amount='$amount1',vat='$vat1',total='$total_amount1',created_datetime='$currentTime'");

      }
 }

      if ($update_customer &&  $update_site && $update_quotation &&  $insert_quotation_product) {
    $msg='Quotation Updated Successfully';
header("Location:list-quotation.php?msg=$msg");
}else{
   $alert_msg='Quotation Not Created'; 
}

}



$select_lead=mysqli_query($conn,"select * from leads where id='$Lead_id'");

if(mysqli_num_rows($select_lead)>>0){ 
$row_leads=mysqli_fetch_array($select_lead);
foreach($row_leads as $K1=>$V1) $$K1 = $V1;

}
   
$sel_values=mysqli_query($conn,"select * from quotation where id = '$ID'"); 

$row_values=mysqli_fetch_array($sel_values);
if ($ID!='') {
$customer_id=$row_values['customer_id'];
$site_id=$row_values['site_id'];
$customer_mobile=$row_values['customer_mobile'];
$p_company_name=$row_values['company_name'];

$p_location=$row_values['location'];
$p_required_date=$row_values['required_date'];
$p_required_time=$row_values['required_time'];



}else{
    $p_location=$location;
    $p_required_date=$required_date;
    $p_required_time=$required_time;
}
 $terms_condition=$row_values['terms_condition'];
  $q_grand_tot=$row_values['total_amount'];
$CountQtn = mysqli_num_rows($sel_values); 



?>


<style>
    .form-control {
    display: block;
    width: 100%;
    padding: .185rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #0d577a45;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.form-select {
    display: block;
    width: 100%;
    padding: .185rem 1.75rem .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    vertical-align: middle;
    background-color: #fff;
    background-repeat: no-repeat;
    background-position: right .75rem center;
    background-size: 16px 12px;
    border: 1px solid #0d577a52;
    border-radius: .25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
</style>
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





if ($Lead_id!='') {
   $readonly="readonly";

}


if ($ID!='') {
  $Readonly="readonly";
}

if ($is_inspection_required==1) {
  $quotation_type='Inspection';
}else{
    $quotation_type='Direct';
}

if ($ID!='') {
   $cus_subqry.="mobile=$customer_mobile and company_name='$p_company_name'";
   $customer_e_mobile=$customer_mobile;

}else{
      $cus_subqry.="mobile=$mobile";
      $customer_e_mobile=$mobile; 
}

if ($ID!='' || $Lead_id!='') {

$select_customer=mysqli_query($conn,"select * from customers where $cus_subqry");


if (mysqli_num_rows($select_customer)>>0) {
   
   $row_customer=mysqli_fetch_array($select_customer);
$customer_org_name=$row_customer['customer_name'];
$customer_old_email=$row_customer['email'];
$customer_old_alternate_mobile=$row_customer['alternate_mobile'];

$customer_old_address=$row_customer['address'];

$customer_old_city=$row_customer['city'];

}else{
    $customer_old_email=$email;
       $customer_org_name=$customer_name;
}


}


if ($Lead_id!='') {
   $p_company_name=$company_name;
 
   $Site_query.=" and customer_mobile='$customer_e_mobile'";
if ($site_name!='') {
 $Site_query.=" and site_name='$site_name'";

}
 
}else{
    $Site_query.="and id='$site_id'";
}


$select_site=mysqli_query($conn,"select * from site where 1=1 $Site_query");



if (mysqli_num_rows($select_site)==1) {
     $row_site=mysqli_fetch_array($select_site);
$Site_name=$row_site['site_name'];
$Site_address=$row_site['site_address'];
$Incharge_name=$row_site['incharge_name'];
$Incharge_mobile=$row_site['mobile'];
$Incharge_email=$row_site['email'];

}else{

      $Site_name=$site_name;
   $Site_address=$site_address;

}


?>



<form action="#" method="post" enctype="multipart/form-data" >
<div class="row form-label">
<div class="col-xl-12 ">

<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">




<div class="row g-3 mt-1">

  
   <div class="d-flex justify-space-between align-items-center">
 <h5 class="mb-0 mt-1">Customer & Site Details</h5>
 <a href="list-quotation.php" class="btn btn-danger">Back</a> 
</div>

    <hr>
  
        <div class="col-md-2">
<label class="form-label">Date:</label>
  <input type="date" name="quotation_date" class="form-control font-16" value="<?=$currentdate;?>">
</div>
       

<div class="col-md-3">
<label class="form-label">Company Name <span class="req">*</span></label>
<? if($Lead_id!='' || $ID!=''){?>
<input type="text" <?=$Readonly;?> name="company_name" class="form-control" value="<?=$p_company_name;?>" placeholder="Company Name" required>
<?}else{?>

<select class="single-select1" multiple="multiple" onchange="getcompany(this.value)" name="company_name" id="company_name" required>

    <?
    $select_company=mysqli_query($conn,"select * from customers where status=1");
    while ($row_company=mysqli_fetch_array($select_company)) {
       $company_name=$row_company['company_name'];
  
    ?>
    <option value="<?=$company_name;?>"> <?=$company_name?></option>

    <?}?>
</select>
<?}?>
<div id="company_id"></div>
</div>


<div class="col-md-3">
<label class="form-label">Contact Person Name <span class="req">*</span></label>
<input type="text" name="customer_name" class="form-control remcl customer_read" value="<?=$customer_org_name;?>" id='customer_name' placeholder="Contact Person Name" required>
</div>



<div class="col-md-2">
<label class="form-label">Email <span class="req">*</span></label>
<input type="text" <?=$Readonly;?> name="email" class="form-control remcl customer_read" value="<?=$customer_old_email;?>" id='email' placeholder="Email Address" required>
</div>

<div class="col-md-2">
<label  class="form-label">Mobile <span class="req">*</span></label>
<input type="text" <?=$readonly;echo $Readonly;?>  name="customer_mobile" class="form-control remcl customer_read" value="<?=$customer_e_mobile;?>" placeholder="Mobile" aria-required="true" id='customer_mobile'   pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9"  required>
</div>

<div class="col-md-2">
<label class="form-label">Alternate Mobile</label>
<input type="text" name="alternate_mobile" class="form-control remcl customer_read" value="<?=$customer_old_alternate_mobile;?>" placeholder="Alternate Mobile" id='alternate_mobile' pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9" >


</div>

<div class="col-md-3">
<label class="form-label">Address <span class="req">*</span></label>
<textarea type="textarea" id="address" name="address" class="form-control remcl customer_read" placeholder="Address" required><?=$customer_old_address;?></textarea>
</div>
<div class="col-md-2">
<label class="form-label">City <span class="req">*</span></label>
<input type="text" id="city" name="city" class="form-control remcl customer_read" value="<?=$customer_old_city;?>" placeholder="City" required>    
</div>
<div class="col-md-2">
<label class="form-label">Site Name <span class="req">*</span></label>

<?
if (mysqli_num_rows($select_site)<=1) {


?>
<div id="site_Name">
<input type="text" <?=$Readonly;?> id="site_name" name="site_name" class="form-control remcl site_details" value="<?=$Site_name;?>" placeholder="Site Name"  required>
</div>

<?}else{?>
<select class="form-select" name="site_name_select" id="site_name" onchange="getsiteaddress(this.value)">
       <option> Select Site Name</option>
<?
while($row_site=mysqli_fetch_array($select_site)){
    $Site_name=$row_site['site_name'];
    $Site_id=$row_site['id'];
?>
    <option value="<?=$Site_id;?>"><?=$Site_name;?></option>
    <?}?>
</select>
<input type="hidden" name="site_name" id="site_name_lead">
<?}?>
</div>


<div class="col-md-3">
<label class="form-label">Site Address <span class="req">*</span></label>
<textarea type="textarea" id="site_address" name="site_address" class="form-control remcl site_details" placeholder="Site Address" required><?=$Site_address;?></textarea>
<div id="siteoutput"></div>
</div>


<div class="col-md-3">
<label class="form-label">Site Incharge Name <span class="req">*</span></label>
<input type="text" id="incharge_name" name="incharge_name" class="form-control remcl" placeholder="Site Incharge Name" required value="<?=$Incharge_name;?>">
</div>

<div class="col-md-3">
<label class="form-label">Site Incharge Phone <span class="req">*</span></label>
<input type="text"  pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9" id="incharge_phone" name="incharge_phone" class="form-control remcl" placeholder="Site Incharge Phone" required value="<?=$Incharge_mobile;?>">
</div>

<div class="col-md-3">
<label class="form-label">Site Incharge Email <span class="req">*</span></label>
<input type="email" id="incharge_email" name="incharge_email" class="form-control remcl" placeholder="Site Incharge Email" required value="<?=$Incharge_email;?>">
</div>




<div class="col-md-2">
<label class="form-label">Location URL</label>
<div id="site_Name">
<input type="url" id="location" name="location" class="form-control remcl " value="<?=$p_location;?>" placeholder="Location" >
</div>
</div>

<div class="col-md-2">
<label for="inputFirstName" class="form-label">Job Date:</label>
<input type="date" class="form-control" value="<?=$p_required_date;?>" min="<?=$currentdate;?>"  name="required_date" placeholder="Required Date">
</div>

<?
if ($Lead_id!='' || $ID!='') {
    $time_part=explode(' ', $p_required_time);
    $hrmin=$time_part[0];
          $ampm=$time_part[1];
      $time_2=explode(':', $hrmin);
     $hour=$time_2[0];
       $min=$time_2[1];
}

?>
<div class="col-md-3">
<label for="inputFirstName" class="form-label">Job Time:</label>
<div class="row timess">
<div class="col-md-4 p-0 pr-8">  
<select class="form-select pad-select "  name="time_hr" id="time_hr"><option value="">Hr</option>
<option value="1"  <?if($hour==1){echo "selected";}?>>1</option>
<option value="2"  <?if($hour==2){echo "selected";}?>>2</option>
<option value="3"  <?if($hour==3){echo "selected";}?>>3</option>
<option value="4"  <?if($hour==4){echo "selected";}?>>4</option>
<option value="5"  <?if($hour==5){echo "selected";}?>>5</option>
<option value="6"  <?if($hour==6){echo "selected";}?>>6</option>
<option value="7"  <?if($hour==7){echo "selected";}?>>7</option>
<option value="8"  <?if($hour==8){echo "selected";}?>>8</option>
<option value="9"  <?if($hour==9){echo "selected";}?>>9</option>
<option value="10" <?if($hour==10){echo "selected";}?> >10</option>
<option value="11" <?if($hour==11){echo "selected";}?>>11</option>
<option value="12" <?if($hour==12){echo "selected";}?>>12</option>
</select></div>
<div class="col-md-4 p-0 pr-8">  
<select class="form-select pad-select"  name="time_min" id="time_min">
<option value="00" <?if($min==00){echo "selected";}?>>00</option>
<option value="05" <?if($min==05){echo "selected";}?>>05</option>
<option value="10" <?if($min==10){echo "selected";}?>>10</option>
<option value="15" <?if($min==15){echo "selected";}?>>15</option>
<option value="20" <?if($min==20){echo "selected";}?>>20</option>
<option value="25" <?if($min==25){echo "selected";}?>>25</option>
<option value="30" <?if($min==30){echo "selected";}?>>30</option>
<option value="35" <?if($min==35){echo "selected";}?>>35</option>
<option value="40" <?if($min==40){echo "selected";}?>>40</option>
<option value="45" <?if($min==45){echo "selected";}?>>45</option>
<option value="50" <?if($min==50){echo "selected";}?>>50</option>
<option value="55" <?if($min==55){echo "selected";}?>>55</option>

</select></div>
<div class="col-md-4 p-0 pr-8">  
<select class="form-select pad-select"  name="time_am" id="time_am"><option value="AM" <?if ($ampm=='AM') {
echo "selected";
}?>>AM</option>
<option value="PM" <?if ($ampm=='PM') {
echo "selected";
}?>>PM</option>
</select>
</div>
</div>
</div>


<div class="col-md-2">
<label for="inputAddress" class="form-label width-100" >Is Reservice</label>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onchange="radioChange(this.value,'is_reservice')" name="is_reservice"  value="1" <? if($is_reservice =='1' ) { echo 'checked'; } ?>id="yes">
<label class="form-check-label" for="yes">Yes</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onchange="radioChange(this.value,'is_reservice')" name="is_reservice"  value="0" <? if($is_reservice =='0' || $is_reservice=='') { echo 'checked'; } ?> id="no">
<label class="form-check-label"  for="no">No</label>
</div>
</div>

</div>


<?if ($Lead_id!='') {
   ?>

<div class="row g-3 mt-3">

    <h5 class="mb-0">Lead & Inspection Details</h5>
    <hr>

<div class="col-md-2 col-xl-2 col-lg-2">
    <label class="form-label width-100 fw-600" >Lead Type:</label>

<h6 class="form-label width-100" > <span><?=$lead_type;?></span></h6>
</div>

<?
if ($work_description!='') {
    
?>
<div class="col-md-3">
    <label class="form-label width-100 fw-600" >Customer Requirement:</label>

<h6 class="form-label width-100 " > <span><?=$work_description;?></span></h6>
</div>

<?
}
if ($inspection_status==1) {
$inspection_date_time=date("d-m-Y",strtotime($inspection_date)).' - '.$inspection_time; 
?>
<div class="col-md-2">
    <label class="form-label width-100 fw-600" >Inspection Date & Time :</label>

<h6 class="form-label width-100 " > <span><?=$inspection_date_time;?></span></h6>
</div>

<div class="col-md-2">
    <label class="form-label width-100 fw-600" >Supervisor Name :</label>

<h6 class="form-label width-100 " > <span><?=$supervisor_name;?></span></h6>
</div>



<div class="col-md-3">
    <label class="form-label width-100 fw-600" >Inspection Details :</label>

<h6 class="form-label width-100 " > <p class="mb-0"><?=$inspection_description;?></p><p class="mt-1"><?echo " ( ". date("d-m-Y h:m A",strtotime($inspected_datetime)) .")";?></p></h6>
</div>

<?}?>



</div>
<?}?>

<div class="row g-3 mt-3">




<div class="bg-primary text-center rounded-1">
<h5 class="text-white py-1">Quotation Details</h5>
</div>


<div id="frm_scents">
<? if($CountQtn =='0') { ?>

<div class="row g-2 mt-1 mb-2">

  <div class="w-15 pad-l13">
<label class="form-label mt-20 mb-0">Select Job Type</label>

</div>
<div class="w-17 pad-l13">
<label class="form-label mt-20 mb-0">Select Duration</label>

</div>

<div class="w-15 pad-l13">
<label class="form-label mt-20 mb-0">Amount (AED)</label>

</div>


<div class="w-11 pad-l13">
<label class="form-label mt-20 mb-0">VAT (%)</label>
</div>

<div class="w-17 pad-l13">
<label class="form-label mt-20 mb-0">Description</label>
</div>

<div class="w-15 pad-l13 text-center">
<label class="form-label mt-20 mb-0">Total</label>

</div>

  <div class="w-10  text-center">
<label class="form-label mt-20 mb-0">Action</label>

</div>
</div>

<div id="p_scents">
  <div>
 <div  class="row mb-4">  

  <div class="w-15">
    <div class="d-flex">
    <div class="w-80">
<select class="single-select" onchange="jobtypedesc(1)" name="job_type[]" id="job_type1"  required>
<option value="">Select Job Type</option>
  <?
$select_brand=mysqli_query($conn,"select * from job_type where status='1' order by job_type asc");
while($row_brand=mysqli_fetch_array($select_brand)){
$Job_type=$row_brand['job_type'];
$jobtype_id=$row_brand['id'];
?>
<option value="<?=$jobtype_id;?>"><?=$Job_type;?></option>

<?}?>
</select>
</div>
<div id="viewscope1">
    
</div>
</div>
</div>

<div class="w-17">
<div class="d-flex">
    <div class="w-80">
<select class="form-select" onchange="getamc(1)" name="duration[]" id="duration1"  required >
<option value="">Select Duration</option>
<option value="one-time" <?  if($duration=='one-time'){echo "selected";}?>>One-Time</option>
<option value="amc" <?if($duration=='amc'){echo "selected";}?>>AMC </option>
</select>
</div>
<div id="viewamc1">
</div>
</div>
<input type="hidden" name="amcfrom[]" id="amcfrom1">
<input type="hidden" name="amcto[]" id="amcto1">
<input type="hidden" name="amcdescription[]" id="amcdescription1">




</div>
<div class="w-15">
<input type="text" value="" class="form-control p-qnt" id="amount1" name="amount[]" value="<?=$amount;?>" onchange="getTotal(1)" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Amount" min="1" required >

</div>

<div class="w-11">
<select class="form-select p-qnt" onchange="getTotal(1)" name="vat[]" id="vat1">
<option value="0" >0%</option>
<option value="5" selected>5%</option>
</select>
</div>
<div class="w-17">
<textarea class="form-control" rows="1" id="description1" name="description[]" placeholder="Description"></textarea>
</div>
<div class="w-15  text-center">
<label class="ItemTotal fw-6" id="tot1">AED 0
</label>
<input type="hidden" id="tot_val1" name="total_amount[]">
</div>


<div class="w-10 text-center">
<a type="button" id="addScnt" tooltip="Add" class="pe-1"  style="width: auto;"><img src="assets/images/Our/plus2.png" width="27px;"> </a>

</div>

</div>
</div>
</div>


</div>
<div class="row">
<div class="w-50">
    
</div>
<div class="w-10">
    
</div>
<div class="w-35 text-center">
    <p><b>Net Total: <span id="nettot"> AED 0.00 </span></b></p>
    <input type="hidden" name="grandtot" id="grandtot">
</div>
</div>
<?}else{?>
<div class="row g-2 mt-1 mb-2">

  <div class="w-15 pad-l13">
<label class="form-label mt-20 mb-0">Select Job Type</label>

</div>
<div class="w-17 pad-l13">
<label class="form-label mt-20 mb-0">Select Duration</label>

</div>

<div class="w-15 pad-l13">
<label class="form-label mt-20 mb-0">Amount (AED)</label>

</div>


<div class="w-11 pad-l13">
<label class="form-label mt-20 mb-0">VAT (%)</label>
</div>

<div class="w-17 pad-l13">
<label class="form-label mt-20 mb-0">Description</label>
</div>

<div class="w-15 pad-l13 text-center">
<label class="form-label mt-20 mb-0">Total</label>

</div>

  <div class="w-10  text-center">
<label class="form-label mt-20 mb-0">Action</label>

</div>
</div>

<div id="p_scents">

<?
$select_quotation_product=mysqli_query($conn,"select * from quotation_product where quotation_id='$ID'");

$SNo =0; 
while($row_product=mysqli_fetch_array($select_quotation_product)){

$SNo = $SNo + 1; 

$P_Job_type=$row_product['job_type'];
$P_Job_type_id=$row_product['job_type_id'];
$p_duration=$row_product['duration'];
$p_amount=$row_product['amount'];

$p_vat=$row_product['vat'];
$p_description=$row_product['description'];
$p_total=$row_product['total'];
$p_amc_fromdate=$row_product['amc_fromdate'];
$p_amc_todate=$row_product['amc_todate'];
$p_amc_description=$row_product['amc_description'];


?>

  <div>
 <div  class="row mb-4">  

  <div class="w-15">
    <div class="d-flex">
    <div class="w-80">
<select class="single-select" onchange="jobtypedesc(<?=$SNo;?>)" name="job_type[]" id="job_type<?=$SNo;?>"  required>
<option value="">Select Job Type</option>
  <?
$select_brand=mysqli_query($conn,"select * from job_type where status='1' order by job_type asc");
while($row_brand=mysqli_fetch_array($select_brand)){
$Job_type=$row_brand['job_type'];
$jobtype_id=$row_brand['id'];
?>
<option value="<?=$jobtype_id;?>" <? if ($jobtype_id==$P_Job_type_id) {echo "selected";
}?>><?=$Job_type;?></option>

<?}?>
</select>
</div>
<div id="viewscope<?=$SNo;?>">

<?
if ($P_Job_type_id!='') {
?>
    
  <a href="javascript:void(0);"  onclick="jobtypedesc(<?=$SNo;?>)" class="btn btn-add btn-sm" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal2" tooltip="Scope of Work"><i class="lni lni-eye"></i></a>  <?}?>
</div>
</div>
</div>

<div class="w-17">
<div class="d-flex">
    <div class="w-80">
<select class="form-select" onchange="getamc(<?=$SNo;?>)" name="duration[]" id="duration<?=$SNo;?>"  required >
<option value="">Select Duration</option>
<option value="one-time" <?  if($p_duration=='one-time'){echo "selected";}?>>One-Time</option>
<option value="amc" <?if($p_duration=='amc'){echo "selected";}?>>AMC </option>
</select>
</div>
<div id="viewamc<?=$SNo;?>">
    <?if($p_duration=='amc'){?>

<a href="javascript:void(0);" onclick="getamc(<?=$SNo;?>)" class="btn btn-add btn-sm" tooltip="View"><i class="lni lni-eye"></i></a>
        <?}?>
</div>
</div>
<input type="hidden" name="amcfrom[]" id="amcfrom<?=$SNo;?>" value="<?=$p_amc_fromdate;?>">
<input type="hidden" name="amcto[]" id="amcto<?=$SNo;?>" value="<?=$p_amc_todate;?>">
<input type="hidden" name="amcdescription[]" id="amcdescription<?=$SNo;?>" value="<?=$p_amc_description;?>">


</div>
<div class="w-15">
<input type="text" class="form-control p-qnt" id="amount<?=$SNo;?>" name="amount[]" value="<?=$p_amount;?>" onchange="getTotal(<?=$SNo;?>)" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Amount" min="1" required >

</div>

<div class="w-11">
<select class="form-select p-qnt" onchange="getTotal(<?=$SNo;?>)" name="vat[]" id="vat<?=$SNo;?>">
<option value="0" <?if ($p_vat=0) { echo "selected";}?>>0%</option>
<option value="5" <?if ($p_vat=5 || $p_vat=='') {echo "selected";}?>>5%</option>
</select>
</div>
<div class="w-17">
<textarea class="form-control" rows="1" id="description<?=$SNo;?>" name="description[]" placeholder="Description"><?=$p_description;?></textarea>
</div>
<div class="w-15 text-center">
<label class="ItemTotal fw-6" id="tot<?=$SNo;?>">AED <?=$p_total;?>
</label>
<input type="hidden" id="tot_val<?=$SNo;?>" value='<?=$p_total;?>' name="total_amount[]">
</div>


<? if($SNo == 1){ ?>
<div class="w-10 text-center">
<a type="button" id="addScnt" class="pe-1" tooltip="Add Product" style="width: auto;" ><img src="assets/images/Our/plus2.png" width="27px;"> </a></div>
<?} else { ?>
<div class="w-10 text-center" id="remScnt" onclick="removeCont(this);"><a type="button" tooltip="Remove Product"  style="width: auto" class="pe-1"><img src="assets/images/Our/minus.png" width="27px;"></a></div>
<? } ?>

</div>
</div>

<?}?>
</div>


</div>
<div class="row">
<div class="w-50">
    
</div>
<div class="w-10">
    
</div>
<div class="w-35 text-center">
    <p><b>Net Total: <span id="nettot"> AED <?=$q_grand_tot;?> </span></b></p>
    <input type="hidden" name="grandtot" value="<?=$q_grand_tot;?>" id="grandtot">
</div>
</div>

    <?}?>



<div class="col-md-6">
<label class="form-label">Terms & Condition</label>
 <textarea id="editor" rows="5" name="terms_condition"><?
if ($ID!='') {
    echo $terms_condition;
}else{
echo "<ul>
    <li>Building Management/ Client responsible for Water and Power during the cleaning.</li>
    <li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li>
    <li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li>
    <li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li>
    <li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li>
    <li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li>
    <li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li>
    <li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li>
    <li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li>
    <li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li>
      <li>As per the federal Regulation, VAT will be applied on the Total Amount.</li>
        <li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li>
</ul>
";
}
?></textarea>
</div>



<div class="col-md-5  mt-5">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<?if($ID!=''){echo "Update Quotation";}else{echo "Create Quotation";}?>">
</div>
</div>

</div>
</div>
</div>
</div>
</form>


<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">

<div class="modal-dialog modal-x">
<div class="modal-content">
<div class="modal-header">

</div>
<div class="modal-body">
<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">
        <h6>AMC Duration</h6>
    <hr>
    <form method="POST">

    <div id="output">
    </div>

    </form>
</div>
</div>
</div>

</div>
</div>
</div>  

<div class="modal fade" id="exampleExtraLargeModal2" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-x">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">

<div id="output1"></div>
</div>
</div>
</div>

</div>
</div>
</div>



<script src="assets/js/addmore.js"></script>


<script>

var i = $("[id^=job_type]").length + 1;


$(function() {
    var scntDiv = $("#frm_scents");
$("#addScnt").click(function() {
$('<div><div class="row mb-4 "><div class="w-15"><div class="d-flex"><div class="w-80"><select class="single-select" name="job_type[]" onchange="jobtypedesc('+i+')" id="job_type'+i+'" required><option value="">Select Job Type</option> <?$select_brand=mysqli_query($conn,"select * from job_type where status='1' order by job_type asc");while($row_brand=mysqli_fetch_array($select_brand)){$Job_type=$row_brand['job_type'];$jobtype_id=$row_brand['id'];?><option value="<?=$jobtype_id;?>"><?=$Job_type;?></option><?}?></select></div><div id="viewscope' + i + '"></div></div></div><div class="w-17"><div class="d-flex"><div class="w-80"><select class="form-select" onchange="getamc('+i+')" name="duration[]" id="duration'+i+'" required ><option value="">Select Duration</option><option value="one-time">One-Time</option><option value="amc">AMC </option></select></div><div id="viewamc' + i + '"></div></div><input type="hidden" name="amcfrom[]" id="amcfrom' + i + '"><input type="hidden" name="amcto[]" id="amcto' + i + '"><input type="hidden" name="amcdescription[]" id="amcdescription' + i + '"><div id="viewamc' + i + '"></div></div><div class="w-15"><input type="text" value="" class="form-control p-qnt" id="amount'+i+'" name="amount[]" onchange="getTotal(' + i + ')" oninput="this.value=this.value.replace(/[^0-9]/g,\'\');" placeholder="Amount" min="1" required ></div><div class="w-11"><select class="form-select p-qnt" onchange="getTotal(' + i + ')" name="vat[]" id="vat'+i+'"><option value="0" >0%</option><option value="5" selected>5%</option></select></div><div class="w-17"><textarea class="form-control" rows="1" id="description'+i+'" name="description[]" placeholder="Description"></textarea></div><div class="w-15 text-center"><label class="ItemTotal fw-6" id="tot'+i+'">AED 0</label><input type="hidden" id="tot_val'+i+'" name="total_amount[]"></div><div class="w-10 text-center" id="remScnt" onclick="removeCont(this);"><a type="button" tooltip="Remove" style="width: auto;" class="pe-1"><img src="assets/images/Our/minus.png" width="27px;"></a></div></div>').appendTo(scntDiv);
$('.single-select').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
allowClear: Boolean($(this).data('allow-clear')),
});
i++;
return false;
});
});
function removeCont(_this) {

if (i > 1) {
$(_this).parent().parent().remove();
calgrand();
}}


$('.single-select').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
allowClear: Boolean($(this).data('allow-clear')),
});

    $('.single-select1').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
 maximumSelectionLength: 1,
allowClear: Boolean($(this).data('allow-clear')),
});
function getTotal(rowId) {


amount = parseFloat($('#amount'+rowId).val())|| 0; 

vatpercentage = parseFloat($('#vat'+rowId).val()); 
vat=parseFloat(amount * vatpercentage/100);

nettot=parseFloat(amount)+parseFloat(vat);
$('#tot'+rowId).html("AED "+nettot.toFixed(2));
$('#tot_val'+rowId).val(nettot.toFixed(2));
calgrand();

}

function calgrand(){
    grandtot=0;

$('[id^="tot_val"]').each(function (){
tot=parseFloat($(this).val());
if (!isNaN(tot)) {
grandtot+=tot;
$('#nettot').html("AED " + grandtot.toFixed(2));
$('#grandtot').val(grandtot.toFixed(2));
}
});
}

    $('#exampleExtraLargeModal').modal({
  backdrop: 'static',
  keyboard: false
});



function getamc(rowId) {
duaration = $('#duration' + rowId).val();
if (duaration == 'amc') {
$.ajax({
url: "ajax-amc-date.php",
type: "POST",
data:'act=amc&RowID='+rowId,      
success: function (result) {
$("#output").html(result);
      $('#modal_amcfrom').val($('#amcfrom'+rowId).val());
      
    $('#modal_amcto').val($('#amcto'+rowId).val());
    $('#modal_amc_description').val($('#amcdescription'+rowId).val());

$('#exampleExtraLargeModal').modal('show');

}
});





}else{
    $("#amcfrom"+rowId).val("");
    $("#amcto"+rowId).val("");
    $("#amcdescription"+rowId).val("");
    $("#viewamc"+rowId).html("");
}
}

function amcdata(rowId) {
    
    if ($('#modal_amcfrom').val()=="") {
        $('#modal_amcfrom').focus();
        return;
    }else if ($('#modal_amcto').val()=="") {
         $('#modal_amcto').focus();
        return;
    }
$('#amcfrom'+rowId).val($('#modal_amcfrom').val());
$('#amcto'+rowId).val($('#modal_amcto').val());
$('#amcdescription'+rowId).val($('#modal_amc_description').val());

$('#viewamc' + rowId).html('<a href="javascript:void(0);" onclick="getamc(' + rowId + ')" class="btn btn-add btn-sm" tooltip="View"><i class="lni lni-eye"></i></a>');

    $('#exampleExtraLargeModal').modal('hide');

}


function getcompany(val){
$.ajax({
url: "ajax-company-details.php", 
type: "POST",
data: "company_name="+val,
success: function(result){
$("#company_id").html(result);
}});
}




function getsiteaddress(val){


$.ajax({
url: "fetch-ajax-site.php", 
type: "POST",
data: "site_id="+val,
success: function(result){
    if (result!='') {
$("#siteoutput").html(result);

$(".site_details").attr("readonly",true);
}else{
    $(".site_details").attr("readonly",false);
}
}});
}


function jobtypedesc(rowid){

job_type_id=$("#job_type"+rowid).val();

if (job_type_id!='') {

$("#viewscope"+rowid).html('<a href="javascript:void(0);"  onclick="jobtypedesc('+rowid+')" class="btn btn-add btn-sm" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal2" tooltip="Scope of Work"><i class="lni lni-eye"></i></a> ')

}else{
    $("#viewscope"+rowid).html("");
}
$.ajax({
url: "ajax-modal.php", 
type: "POST",
data: "id="+job_type_id+"&act=scopeofwork",
success: function(result){
$("#output1").html(result);
}});
}
</script> 



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