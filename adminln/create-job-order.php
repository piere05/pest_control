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


if($Submit=='Create Job Order')
{
$select_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");
$row_supervisor=mysqli_fetch_array($select_supervisor);
$supervisor_name=$row_supervisor['name'];
$job_time=$time_hr.":".$time_min." ".$time_am;

if($amc_duration=='0'){
 
 
$insert_job_order=mysqli_query($conn,"insert into job_order set customer_id='$customer_id',quotation_id='$ID',company_name='$company_name',customer_mobile='$customer_mobile',location='$location',job_date='$job_date',job_time='$job_time',job_order_date='$job_order_date',site_id='$site_id',site_name='$site_name',site_address='$site_address',supervisor_id='$supervisor_id',type_of_report='$type_of_report',supervisor_name='$supervisor_name',total_amount='$grandtot',status='0',created_datetime='$currentTime'");

 $last_job_id = $conn->insert_id;

 
$select_job_order_Det=mysqli_query($conn,"select * from quotation_product where quotation_id='$ID'");

while($row_pro_details=mysqli_fetch_array($select_job_order_Det)){
$job_type_id=$row_pro_details['job_type_id'];
$job_type=$row_pro_details['job_type'];
$duration=$row_pro_details['duration'];
$amc_fromdate=$row_pro_details['amc_fromdate'];
$amc_todate=$row_pro_details['amc_todate'];
$amc_description=$row_pro_details['amc_description'];
$amount=$row_pro_details['amount'];
$vat=$row_pro_details['vat'];
$total=$row_pro_details['total'];
$description=$row_pro_details['description'];

$insert_job_order_product=mysqli_query($conn,"insert into job_order_product set job_order_id='$last_job_id',job_type='$job_type',job_type_id='$job_type_id',duration='$duration',amc_fromdate='$amc_fromdate',amc_todate='$amc_todate',amc_description='$amc_description',amount='$amount',vat='$vat',total='$total',description='$description',created_datetime='$currentTime'");
}


}else{


if ($ends_duration == 0) {
    $to_date = $amc_end_on_date;
} else {
    $current = strtotime($amc_from_date);

    if ($main_amc_duration == "days") {
        $to_date = date('Y-m-d', strtotime("+" . ($repeat_every * ($amc_no_of_occurrence - 1)) . " days", $current));
    } else if ($main_amc_duration == "weeks") {
        $to_date = date('Y-m-d', strtotime("+" . ($repeat_every * 7 * ($amc_no_of_occurrence - 1)) . " days", $current));
    } else if ($main_amc_duration == "months") {
        $to_date = date('Y-m-d', strtotime("+" . ($repeat_every * ($amc_no_of_occurrence - 1)) . " months", $current));
    } else if ($main_amc_duration == "years") {
        $to_date = date('Y-m-d', strtotime("+" . ($repeat_every * ($amc_no_of_occurrence - 1)) . " years", $current));
    } else {
        $to_date = $amc_from_date;
    }
}


if ($main_amc_duration == "days") {
    $increment_date = "+" . $repeat_every . " days";
} else if ($main_amc_duration == "weeks") {
    $increment_date = "+" . ($repeat_every * 7) . " days";
} else if ($main_amc_duration == "months") {
    $increment_date = "+" . $repeat_every . " months";
} else if ($main_amc_duration == "years") {
    $increment_date = "+" . $repeat_every . " years";
} else {
    $increment_date = "+1 day";
}


for ($current = strtotime($amc_from_date); $current <= strtotime($to_date); $current = strtotime($increment_date, $current)) {
    $job_date_final=date("Y-m-d", $current);
$insert_job_order=mysqli_query($conn,"insert into job_order set customer_id='$customer_id',type_of_job='1',quotation_id='$ID',company_name='$company_name',customer_mobile='$customer_mobile',location='$location',job_date='$job_date_final',job_time='$job_time',job_order_date='$job_order_date',site_id='$site_id',site_name='$site_name',site_address='$site_address',supervisor_id='$supervisor_id',type_of_report='$type_of_report',supervisor_name='$supervisor_name',total_amount='$grandtot',status='0',created_datetime='$currentTime'");


 $last_job_id = $conn->insert_id;

 $select_job_order_Det=mysqli_query($conn,"select * from quotation_product where quotation_id='$ID'");

while($row_pro_details=mysqli_fetch_array($select_job_order_Det)){
$job_type_id=$row_pro_details['job_type_id'];
$job_type=$row_pro_details['job_type'];
$duration=$row_pro_details['duration'];
$amc_fromdate=$row_pro_details['amc_fromdate'];
$amc_todate=$row_pro_details['amc_todate'];
$amc_description=$row_pro_details['amc_description'];
$amount=$row_pro_details['amount'];
$vat=$row_pro_details['vat'];
$total=$row_pro_details['total'];
$description=$row_pro_details['description'];

$insert_job_order_product=mysqli_query($conn,"insert into job_order_product set job_order_id='$last_job_id',job_type='$job_type',job_type_id='$job_type_id',duration='$duration',amc_fromdate='$amc_fromdate',amc_todate='$amc_todate',amc_description='$amc_description',amount='$amount',vat='$vat',total='$total',description='$description',created_datetime='$currentTime'");
}


}



}


$update_quotation=mysqli_query($conn,"update quotation set status=1 where id='$ID'");
 
if ($insert_job_order && $update_quotation) {
$msg='Job Order Created Successfully';
header("Location:list-job-order.php?msg=$msg");
}else{
   $alert_msg='Job Order Not Created'; 
header("Location:list-job-order.php?alert_msg=$alert_msg");
}
}





$select_lead=mysqli_query($conn,"select * from leads where id='$Lead_id'");

if(mysqli_num_rows($select_lead)>0){ 
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
$site_name=$row_values['site_name'];
$Lead_id=$row_values['lead_id'];


$select_lead=mysqli_query($conn,"select * from leads where id='$Lead_id'");

$row_lead=mysqli_fetch_array($select_lead);


$lead_type=$row_lead['lead_type'];
$work_description=$row_lead['work_description'];
$inspection_status=$row_lead['inspection_status'];
$inspection_date=$row_lead['inspection_date'];
$inspection_time=$row_lead['inspection_time'];
$supervisor_name=$row_lead['supervisor_name'];

$inspection_description=$row_lead['inspection_description'];
$inspected_datetime=$row_lead['inspected_datetime'];

$p_location=$row_values['location'];
$p_required_date=$row_values['required_date'];
if ($p_required_date!='0000-00-00') {
   $P_required_date=$p_required_date;
}else{
    $P_required_date="";
}

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


if (mysqli_num_rows($select_customer)>0) {
   
   $row_customer=mysqli_fetch_array($select_customer);
$customer_org_name=$row_customer['customer_name'];
$customer_old_email=$row_customer['email'];
$customer_old_alternate_mobile=$row_customer['alternate_mobile'];

$customer_old_address=$row_customer['address'];

$customer_old_city=$row_customer['city'];

}else{
       $customer_org_name=$customer_name;
}


}



$select_site=mysqli_query($conn,"select * from site where id='$site_id'");
if (mysqli_num_rows($select_site)>0) {
     $row_site=mysqli_fetch_array($select_site);

$Site_address=$row_site['site_address'];

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
 <a href="list-job-order.php" class="btn btn-danger">Back</a> 
</div>

    <hr>
  
        <div class="col-md-2">
<label class="form-label">Date:</label>
  <input type="date" name="job_order_date" class="form-control font-16" value="<?=$currentdate;?>">
</div>
       

<div class="col-md-3">
<label class="form-label">Company Name</label>
<? if($Lead_id!='' || $ID!=''){?>
<input type="text" <?=$Readonly;?> name="company_name" class="form-control" value="<?=$p_company_name;?>" placeholder="Company Name" required>
<?}else{?>

<select class="form-select"  onchange="getcompany(this.value)" name="company_name" required>
    <option value="">Select Company</option>
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
<label class="form-label">Contact Person Name</label>
<input type="text" name="customer_name" class="form-control remcl customer_read" <?=$Readonly;?> value="<?=$customer_org_name;?>" id='customer_name' placeholder="Contact Person Name" required>
<input type="hidden" name="customer_id" value="<?=$customer_id;?>">
</div>



<div class="col-md-2">
<label class="form-label">Email</label>
<input type="text" <?=$Readonly;?> name="email" class="form-control remcl customer_read" value="<?=$customer_old_email;?>" id='email' placeholder="Email Address" required>
</div>

<div class="col-md-2">
<label  class="form-label">Mobile</label>
<input type="text" readonly  name="customer_mobile" class="form-control remcl customer_read" value="<?=$customer_e_mobile;?>" placeholder="Mobile" aria-required="true" id='customer_mobile'   pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9"  required>

<input type="hidden" name="grandtot" value="<?=$q_grand_tot;?>">
</div>

<div class="col-md-2">
<label class="form-label">Alternate Mobile</label>
<input type="text" name="alternate_mobile" class="form-control remcl customer_read" <?=$Readonly;?> value="<?=$customer_old_alternate_mobile;?>" placeholder="Alternate Mobile" aria-required="true" id='alternate_mobile' pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9" required>


</div>

<div class="col-md-3">
<label class="form-label">Address</label>
<textarea type="textarea" <?=$Readonly;?> id="address" name="address" class="form-control remcl customer_read" placeholder="Address" required><?=$customer_old_address;?></textarea>
</div>
<div class="col-md-2">
<label class="form-label">City</label>
<input type="text" id="city" name="city" class="form-control remcl customer_read" <?=$Readonly;?> value="<?=$customer_old_city;?>" placeholder="City" required>    
</div>
<div class="col-md-2">
<label class="form-label">Site Name</label>
<div id="site_Name">
<input type="text" <?=$Readonly;?> id="site_name" name="site_name" class="form-control remcl site_details" value="<?=$site_name;?>" placeholder="Site Name"  required>
<input type="hidden" name="site_id" value="<?=$site_id;?>">
</div>
</div>


<div class="col-md-3">
<label class="form-label">Site Address</label>
<textarea type="textarea" <?=$Readonly;?> id="site_address" name="site_address" class="form-control remcl site_details" placeholder="Site Address" required><?=$Site_address;?></textarea>
</div>

<?if ($lead_type!='') {?>

<div class="row g-3 mt-3">

    <h5 class="mb-0">Lead & Inspection Details</h5>
    <hr>

<div class="col-md-2 col-xl-2 col-lg-2">
    <label class="form-label width-100 fw-600" >Lead Type:</label>

<h6 class="form-label width-100" > <span><?=$lead_type;?></span></h6>
</div>


<div class="col-md-3">
    <label class="form-label width-100 fw-600" >Customer Requirement:</label>

<h6 class="form-label width-100 " > <span><?=$work_description;?></span></h6>
</div>

<?

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




<div class="row mt-4">


    <div class="col-md-2">
<label class="form-label">Location URL</label>
<div id="site_Name">
<input type="url" id="location" name="location" class="form-control remcl " value="<?=$p_location;?>" placeholder="Location"  required>
</div>
</div>

<div class="col-md-2  me-3" id="onetime-jobdate">
<label for="inputFirstName" class="form-label">Job Date:</label>
<input type="date" class="form-control" onchange="getsupervisor()" value="<?=$P_required_date;?>" id='job_date' min="<?=$currentdate;?>"  required name="job_date" placeholder="Job Date">
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
<select class="form-select pad-select " required name="time_hr" id="time_hr"><option value="">Hr</option>
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
<select class="form-select pad-select" required name="time_min" id="time_min">
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
<select class="form-select pad-select" required name="time_am" id="time_am"><option value="AM" <?if ($ampm=='AM') {
echo "selected";
}?>>AM</option>
<option value="PM" <?if ($ampm=='PM') {
echo "selected";
}?>>PM</option>
</select>
</div>
</div>
</div>

<div class="col-md-3">
<label class="form-label">Select Supervisor </label>
<select class="single-select1" multiple="multiple" onchange="getsupervisor()" name="supervisor_id" id="supervisor_id" required>
    <?
    $select_supervisor=mysqli_query($conn,"select * from user where user_type=2 and status=1");
   
    while ($row_supervisor=mysqli_fetch_array($select_supervisor)) {
        $Supervisor_id=$row_supervisor['Id'];
        $supervisor_name=$row_supervisor['name'];
    ?>
    <option value="<?=$Supervisor_id;?>" <?if ($supervisor_id==$Supervisor_id) {
       echo "selected";
    }?>><?=$supervisor_name;?></option>

    <?}?>
</select>

<div class="mt-3" id="output1">
    
</div>
</div>

<div class="col-md-12  mb-3">
<label class="form-label width-100" >Duration</label>
<div class="form-check form-check-inline">
<input class="form-check-input" onclick="getduration(0)" type="radio" name="amc_duration" id="onetime" value="0" <? if($duration =='0' || $duration=='') { echo 'checked'; } ?> required>
<label class="form-check-label" for="onetime">One Time</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onclick="getduration(1)" name="amc_duration" id="amc_radio" value="1" <? if($duration =='1') { echo 'checked'; } ?>>
<label class="form-check-label" for="amc_radio">AMC</label>
</div>


<div class="my-3" id="amcdiv" style="display:none;">
<div class="row">
<?
$select_amc_job=mysqli_query($conn,"select * from quotation_product  where duration='amc' and quotation_id='$ID'");
$row_amc_job=mysqli_fetch_array($select_amc_job);
$amc_fromdate=$row_amc_job['amc_fromdate'];
   ?>
<div class="col-md-2  me-3">
<label for="inputFirstName" class="form-label">AMC From Date:</label>
<input type="date" onchange="amctodate()" class="form-control amcdate" id='amc_from_date' value="<?=$amc_fromdate;?>" min="<?=$currentdate;?>"  name="amc_from_date" >
</div>
<div class="col-md-2  me-3">
<label for="inputFirstName" class="form-label">Repeat Every:</label>
<div class="row">
    <div class="col-md-4 ">
  <input type="text" class="form-control amcdate" id='repeat_every '  name="repeat_every" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="3" placeholder="No.">
</div>
<div class="col-md-8">
  <select class="form-select amcdate" name="main_amc_duration">
<option>Select Duration</option>
<option value="days">Days</option>
<option value="weeks">Weeks</option>
<option value="months">Months</option>
<option value="years">Years</option>
</select>
</div>
</div>

<div class="mt-2 text-center">
<p class="text-danger font-14 fw-600" id="warning"></p>
</div>
</div>

<div class="col-md-2  me-3">
<label for="inputFirstName" class="form-label width-100">Ends:</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onclick="getenddate(0)" name="ends_duration" id="on" value="0" <? if($ends_duration =='0' || $ends_duration=='') { echo 'checked'; } ?> required>
<label class="form-check-label" for="on">On</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onclick="getenddate(1)" name="ends_duration" id="after" value="1" <? if($ends_duration =='1') { echo 'checked'; } ?>>
<label class="form-check-label" for="after">After</label>
</div>


<div class="my-3">
    <div id="end_on">
      <input type="date" class="form-control  end_date" id='amc_end_on_date'  name="amc_end_on_date" >
    </div>
    <div id="end_after" style="display:none;">
         <div class="input-group mb-2 mr-sm-2">
  <input type="text" class="form-control end_date" id="amc_no_of_occurrence" name="amc_no_of_occurrence" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="3" placeholder="No.of">
  <div class="input-group-append">
    <div class="input-group-text">Occurrence</div>
  </div>
</div>

    </div>
</div>

</div>


 </div>
</div>


</div>


<div class="col-md-12">
<label class="form-label width-100" >Type of Report</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="type_of_report" id="inlineRadio1" value="0" <? if($type_of_report =='0') { echo 'checked'; } ?> required>
<label class="form-check-label" for="inlineRadio1">Pest Control</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="type_of_report" id="inlineRadio2" value="1" <? if($type_of_report =='1') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio2">Water Tank</label>
</div>


<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="type_of_report" id="inlineRadio3" value="2" <? if($type_of_report =='2') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio3">General</label>
</div>
</div>
    

</div>



<div class="row g-3 mt-3">
<div class="row">


    <div class="col-md-12 mt-3 table-responsive">
        <table class="table table-bordered ">
  <thead>
    <tr class="table-active">
      <th scope="col">Job Type</th>
      <th scope="col">Duration</th>
      <th scope="col">Amount</th>
      <th scope="col">Vat</th>
      <th scope="col">Description</th>
      <th scope="col">Total</th>

    </tr>
  </thead>
  <tbody>

    <?
    $select_job_product=mysqli_query($conn,"select * from quotation_product where quotation_id='$ID'");

    while ($row_job_product=mysqli_fetch_array($select_job_product)) {
        
$job_type=$row_job_product['job_type'];
$job_type_id=$row_job_product['job_type_id'];


$select_Scopre=mysqli_query($conn,"select * from job_type where id='$job_type_id'");

$row_scope=mysqli_fetch_array($select_Scopre);

$scope_of_work=$row_scope['scope_of_work'];


if ($scope_of_work!='') {
 $Scope_of_work="( ".$scope_of_work." )";
}else{
  $Scope_of_work=" - ";
}



$duration=strtoupper($row_job_product['duration']);

 if($row_job_product['amc_fromdate']!='0000-00-00'){
  $amc_fromdate=date("d-m-Y",strtotime($row_job_product['amc_fromdate']));
$amc_todate=date("d-m-Y",strtotime($row_job_product['amc_todate']));
$amc_description="(".$row_job_product['amc_description'].")";
}else{
  $amc_fromdate="";
  $amc_todate="";
  $amc_description="";
}

$amount=$row_job_product['amount'];
$vat=$row_job_product['vat'];
$total=$row_job_product['total'];
$description=$row_job_product['description'];

 $nettot=$row_job_product['nettot'];
    ?>
    <tr>
      <td ><?=$job_type;?><p><? echo wordwrap($Scope_of_work, 100, "<br />\n"); ?></p></td>
      <td><p class="my-2"><?=$duration;?></p>
<p class="my-2"><?=$amc_fromdate." - ".$amc_todate;?><br><?=$amc_description;?></p></td>
      <td>AED <?=$amount;?></td>
      <td><?=$vat.' %';?></td>
       <td><?=$description;?></td>
        <td>AED <?=$total;?></td>
    </tr>
    <?}?>
  </tbody>
</table>
    </div>
    
</div>

<div class="col-md-12 text-center  mt-5">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="Create Job Order">
</div>
</div>

</div>
</div>
</div>
</div>
</form>





<script>
$('.single-select').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
allowClear: Boolean($(this).data('allow-clear')),
});

function getsupervisor(){

    supervisor_id = $("#supervisor_id").val();
    job_date=$("#job_date").val();


    $.ajax({
url: "ajax-supervisor-job-schedule.php", 
type: "POST",
data: "id="+supervisor_id+"&job_date="+job_date,
success: function(result){
$("#output1").html(result);
}});

}



function getduration(val){


if (val==1) {
    $("#amcdiv").css("display","block");
     $("#onetime-jobdate").css("display","none");
    $(".amcdate").attr("required",true);
    $("#amc_end_on_date").attr("required",true);
    $("#job_date").attr("required",false);

}else{
    $("#amcdiv").css("display","none");
    $(".amcdate").attr("required",false);
    $("#job_date").attr("required",true);
      $("#amc_end_on_date").attr("required",false);
    $("#onetime-jobdate").css("display","block");
}
}


function getenddate(val){


if (val==1) {
    $("#end_after").css("display","block");
     $("#amc_end_on_date").css("display","none");
    $(".end_date").attr("required",false);
    $("#amc_no_of_occurrence").attr("required",true);

}else{
    $("#end_after").css("display","none");
    $(".end_date").attr("required",true);
    $("#amc_no_of_occurrence").attr("required",false);
    $("#amc_end_on_date").css("display","block");
}
}



function amctodate(){

fromdate=$("#amc_from_date").val();
 d = new Date(fromdate);
    d.setDate(d.getDate() + 1);
    $("#amc_end_on_date").attr("min", d.toISOString().split("T")[0]);

}
</script> 


<?php
}
include 'template.php';
?>