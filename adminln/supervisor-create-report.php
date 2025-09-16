<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
$report_id=$_GET['report_id'];
$Act=$_GET['act'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$currentdate = date('Y-m-d');



if ($Submit=="Create") {
if ($type_of_report!=1) {
if(count($inspection_details) > 1){ $inspection_details=implode(',' , $inspection_details); }else{ $inspection_details=$inspection_details[0]; }

if(count($type_of_treatment) > 1){ $type_of_treatment=implode(',' , $type_of_treatment); }else{ $type_of_treatment=$type_of_treatment[0]; }
$inspection_detail= rtrim($inspection_details,",");
$type_of_treatments= rtrim($type_of_treatment,",");
if(count($sanitation_level) > 1){ $sanitation_level=implode(',' , $sanitation_level); }else{ $sanitation_level=$sanitation_level[0]; }

 $sanitation_levels= rtrim($sanitation_level,",");

  $start_time=$time_hr.":".$time_min." ".$time_am;
  $end_time=$end_time_hr.":".$end_time_min." ".$end_time_am;
 $insert_report=mysqli_query($conn,"insert into pestcontrol_report SET job_order_id='$ID',client_name='$customer_name',site_name='$site_name',mobile='$customer_mobile',site_mobile='$site_mobile',site_incharge='$site_incharge',address='$site_address',visit_no='$visit_no',sl_no='$sl_no',date='$date',start_time='$start_time' , end_time='$end_time',inspection_details='$inspection_detail',sanitation_level='$sanitation_levels',area='$area_of_treatment',infestation_level='$infestation_level',type_of_treatment='$type_of_treatments',customer_sign_name='$customer_sign_name',customer_sign_mobile='$customer_sign_mobile',remarks='$customer_remarks',created_datetime='$currentTime'");
$report_id=$conn->insert_id;

$p_count=count($pestiside_used);
for ($i=0; $i < $p_count; $i++) { 
   $concentration1=$concentration[$i];
   $pestiside_used1=$pestiside_used[$i];
   $remarks1=$remarks[$i];
   $insert_product=mysqli_query($conn,"insert into pestcontrol_report_product set pest_control_report_id='$report_id',concentration='$concentration1',pestiside_used='$pestiside_used1',remarks='$remarks1',created_datetime='$currentTime'");
}
}elseif ($type_of_report==1) {



if ($nature_of_job=="Others") {
 $Natureof_job=$other_nature_of_job;
}else{
  $Natureof_job=$nature_of_job;;
}

 $insert_report=mysqli_query($conn,"insert into watertank_report set job_order_id='$ID',sl_no='$sl_no',client_name='$customer_name',site_name='$site_name',mobile='$customer_mobile',site_mobile='$site_mobile',site_incharge='$site_incharge',address='$site_address',visit_no='$visit_no',date='$date',type_of_facility='$type_of_facility',nature_of_job='$Natureof_job',start_date='$start_date',completed_date='$completed_date',defects='$defects',chemical_used='$chemical_used',date_of_cleaning='$date_of_cleaning',next_cleaning_date='$next_cleaning_date',gas_leveling_finding='$gas_leveling_finding',job_completed='$job_completed',further_action='$further_action',remarks='$water_tank_remarks',customer_sign_name='$customer_sign_name',customer_sign_mobile='$customer_sign_mobile',created_datetime='$currentTime'");
$report_id=$conn->insert_id;
 
 $p_count=count($type_of_tank);
for ($i=0; $i < $p_count; $i++) { 
   $type_of_tank1=$type_of_tank[$i];
   $size_of_tank1=$size_of_tank[$i];
   $location1=$location[$i];
   $insert_product=mysqli_query($conn,"insert into watertank_report_product set watertank_report_id ='$report_id',type_of_tank='$type_of_tank1',size_of_tank='$size_of_tank1',location='$location1',created_datetime='$currentTime'");
}
}

if ($insert_report && $insert_product) { $msg = 'Report Created Successfully';
 header('Location:supervisor-list-job.php?msg='.$msg); 
} 
 else{ $alert_msg= 'Could not able to Create try once again!!!'; 
header('Location:supervisor-list-job.php?alert_msg='.$alert_msg); 
}


}

if ($Submit=="Update") {
if ($type_of_report!=1) {

if(count($inspection_details) > 1){ $inspection_details=implode(',' , $inspection_details); }else{ $inspection_details=$inspection_details[0]; }

if(count($type_of_treatment) > 1){ $type_of_treatment=implode(',' , $type_of_treatment); }else{ $type_of_treatment=$type_of_treatment[0]; }
$inspection_detail= rtrim($inspection_details,",");

$type_of_treatments= rtrim($type_of_treatment,",");
if(count($sanitation_level) > 1){ $sanitation_level=implode(',' , $sanitation_level); }else{ $sanitation_level=$sanitation_level[0]; }

 $sanitation_levels= rtrim($sanitation_level,",");

  $start_time=$time_hr.":".$time_min." ".$time_am;
  $end_time=$end_time_hr.":".$end_time_min." ".$end_time_am;
 $update_report=mysqli_query($conn,"update pestcontrol_report SET client_name='$customer_name',site_name='$site_name',mobile='$customer_mobile',site_mobile='$site_mobile',site_incharge='$site_incharge',address='$site_address',visit_no='$visit_no',sl_no='$sl_no',date='$date',start_time='$start_time' , end_time='$end_time',inspection_details='$inspection_detail',sanitation_level='$sanitation_levels',area='$area_of_treatment',infestation_level='$infestation_level',type_of_treatment='$type_of_treatments',customer_sign_name='$customer_sign_name',customer_sign_mobile='$customer_sign_mobile',remarks='$customer_remarks',created_datetime='$currentTime' where id='$main_report_id'");


$delete_pest_product=mysqli_query($conn,"delete from pestcontrol_report_product where pest_control_report_id='$main_report_id'");

$p_count=count($pestiside_used);
for ($i=0; $i < $p_count; $i++) { 
   $concentration1=$concentration[$i];
   $pestiside_used1=$pestiside_used[$i];
   $remarks1=$remarks[$i];
   $update_product=mysqli_query($conn,"insert into pestcontrol_report_product set pest_control_report_id='$main_report_id',concentration='$concentration1',pestiside_used='$pestiside_used1',remarks='$remarks1',created_datetime='$currentTime'");
}
}elseif ($type_of_report==1) {

if ($nature_of_job=="Others") {
 $Natureof_job=$other_nature_of_job;
}else{
  $Natureof_job=$nature_of_job;;
}
 $update_report=mysqli_query($conn,"update watertank_report set sl_no='$sl_no',client_name='$customer_name',site_name='$site_name',mobile='$customer_mobile',site_mobile='$site_mobile',site_incharge='$site_incharge',address='$site_address',visit_no='$visit_no',date='$date',type_of_facility='$type_of_facility',nature_of_job='$Natureof_job',start_date='$start_date',completed_date='$completed_date',defects='$defects',chemical_used='$chemical_used',date_of_cleaning='$date_of_cleaning',next_cleaning_date='$next_cleaning_date',gas_leveling_finding='$gas_leveling_finding',job_completed='$job_completed',further_action='$further_action',remarks='$water_tank_remarks',customer_sign_name='$customer_sign_name',customer_sign_mobile='$customer_sign_mobile',created_datetime='$currentTime' where id='$main_report_id'");


$delete_watertank_product=mysqli_query($conn,"delete from watertank_report_product where watertank_report_id='$main_report_id'");

 
 $p_count=count($type_of_tank);
for ($i=0; $i < $p_count; $i++) { 
   $type_of_tank1=$type_of_tank[$i];
   $size_of_tank1=$size_of_tank[$i];
   $location1=$location[$i];
   $update_product=mysqli_query($conn,"insert into watertank_report_product set watertank_report_id ='$main_report_id',type_of_tank='$type_of_tank1',size_of_tank='$size_of_tank1',location='$location1',created_datetime='$currentTime'");
}
}

if ($update_report && $update_product) {

  $update_job_order=mysqli_query($conn,"update job_order set is_mail_sent=0 where id='$ID'");

$msg = 'Report Updated Successfully';
header('Location:supervisor-list-job.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to Update try once again!!!';
header('Location:supervisor-list-job.php?alert_msg='.$alert_msg);
}


}



$select_leads=mysqli_query($conn,"select * from job_order where id='$ID'"); 
$row_leads=mysqli_fetch_array($select_leads);
foreach($row_leads as $K1=>$V1) $$K1 = $V1;
$select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
$row_customer=mysqli_fetch_array($select_customer);
$customer_name=$row_customer['customer_name'];
$customer_email=$row_customer['email'];
$select_site=mysqli_query($conn,"select * from site where id='$site_id'");
$row_Site=mysqli_fetch_array($select_site);
$site_incharge=$row_Site['incharge_name'];
$site_mobile=$row_Site['mobile'];

if($type_of_report!=1){
$select_report=mysqli_query($conn,"select * from pestcontrol_report where job_order_id='$ID'");
}else{
  $select_report=mysqli_query($conn,"select * from watertank_report where job_order_id='$ID'");
}


if($type_of_report==0){

$report_name="Pest Control";
}elseif ($type_of_report==1) {
$report_name="Water Tank";
}else{
$report_name="General";
}
if (mysqli_num_rows($select_report)==0) {
  $edit_values=0;
}else{
  $edit_values=1;
}
$row_report=mysqli_fetch_array($select_report);
$report_id=$row_report['id'];
$report_sl_no=$row_report['sl_no'];
$report_customer_name=$row_report['client_name'];
$report_site_name=$row_report['site_name'];
$report_address=$row_report['address'];
$report_site_incharge=$row_report['site_incharge'];
$report_site_mobile=$row_report['site_mobile'];
$report_visit_no=$row_report['visit_no'];
$report_date=$row_report['date'];
$report_remarks=$row_report['remarks'];
$report_customer_sign_name=$row_report['customer_sign_name'];
$report_customer_sign_mobile=$row_report['customer_sign_mobile'];
if ($type_of_report!=1) {
 $report_inspection_details=$row_report['inspection_details'];
$report_start_time=$row_report['start_time'];

$report_end_time=$row_report['end_time'];

$report_sanitation_level=$row_report['sanitation_level'];
$report_infestation_level=$row_report['infestation_level'];
$report_type_of_treatment=$row_report['type_of_treatment'];
$report_area=$row_report['area'];

}else{


$report_type_of_facility=$row_report['type_of_facility'];
$report_nature_of_job=$row_report['nature_of_job'];
$report_start_date=$row_report['start_date'];
$report_completed_date=$row_report['completed_date'];
$report_defects=$row_report['defects'];
$report_chemical_used=$row_report['chemical_used'];
$report_date_of_cleaning=$row_report['date_of_cleaning'];
$report_next_cleaning_date=$row_report['next_cleaning_date'];
$report_gas_leveling_finding=$row_report['gas_leveling_finding'];
$report_job_completed=$row_report['job_completed'];
$report_further_action=$row_report['further_action'];

}

?>

<style>
    .form-control {
    display: block;
    width: 100%;
    padding: .185rem .75rem !important;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #0d577a45 !important;
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
<div class="page-breadcrumb d-flex align-items-center mb-3">
<div class="breadcrumb-title border-0 pe-3"><?=$report_name;?> Report</div>

<div class="ms-auto">
<div class="col">
<!-- Button trigger modal -->
<a href="supervisor-list-job.php" class="text-white btn btn-danger">Back</a>
<!-- Modal -->
</div>
</div>
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


<form action="#" method="post" enctype="multipart/form-data" >
<div class="row form-label">
<div class="col-xl-12 ">

<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">


<div class="row">
<?


if ($customer_name!='') {
  $client_name=$customer_name;
}else{
  $client_name=$company_name;
}
  ?>

<div class="col-md-3 mt-3">
<label class="form-label font-16">SL. No: </label>

<input type="text" class="form-control" placeholder="SL. No"  name="sl_no" required value="<?=$report_sl_no;?>" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
</div>

<div class="col-md-3 mt-2">
<label class="form-label font-16">Client/Company Name: </label>
<input type="text" class="form-control" placeholder="Client/Company Name" name="customer_name" required value="<?  if ($edit_values==1) {echo $report_customer_name;}else{echo $client_name;}?>">

<input type="hidden" name="type_of_report" value="<?=$type_of_report;?>">

<input type="hidden" name="main_report_id" value="<?=$report_id
;?>">
</div>

<div class="col-md-3 mt-2 sm-mt-3">
<label class="form-label font-16">Contact No: </label><br>
<label class="form-label font-16">+971 <?=$customer_mobile;?></label>
<input type="hidden" name="customer_mobile" value="<?=$customer_mobile;?>">
</div>

<div class="col-md-3 mt-2 sm-mt-3">
<label class="form-label font-16">Site Name: </label>
<input type="text" name="site_name" required class="form-control" placeholder="Site Name" value="<?if ($edit_values==1) {echo $report_site_name;}else{echo $site_name;}?>">
</div>
<div class="col-md-3 mt-2 sm-mt-3">
<label class="form-label font-16">Address: </label>
<textarea name="site_address" required class="form-control"><?if ($edit_values==1) {echo $report_address;}else{echo $site_address;}?></textarea>
</div>

<div class="col-md-3 mt-3">
<label class="form-label font-16">Site Incharge: </label>
<input type="text" name="site_incharge" required class="form-control" placeholder="Site Incharge" value="<?if ($edit_values==1) {echo $report_site_incharge;}else{echo $site_incharge;}?>">
</div>

<div class="col-md-3 mt-2 sm-mt-3">
<label class="form-label font-16">Site Mobile: </label>
<input type="text" name="site_mobile" required class="form-control" placeholder="Site Mobile" value="<?if ($edit_values==1) {echo $report_site_mobile;}else{echo $site_mobile;}?>" pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9">
</div>

<div class="col-md-3 mt-3 w-sm-50 sm-mt-3">
<label class="form-label font-16">Visit No: </label>

<input type="text" name="visit_no" required class="form-control" placeholder="Visit No" value="<?if ($edit_values==1) {echo $report_visit_no;}?>" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="3">
</div>

<div class="col-md-3 mt-4 w-sm-50 sm-mt-3">
<label class="form-label font-16">Report Date: </label>
<input type="date" name="date" value="<?if ($edit_values==1) {echo $report_date;}else{echo $job_date;}?>" required class="form-control" >
</div>

<? if($type_of_report!=1){

$time_part=explode(' ', $report_start_time);
$hrmin=$time_part[0];
$ampm=$time_part[1];
$time_2=explode(':', $hrmin);
$hour=$time_2[0];
$min=$time_2[1];

$time_part1=explode(' ', $report_end_time);
$hrmin1=$time_part1[0];
$end_ampm=$time_part1[1];
$time_21=explode(':', $hrmin1);
$end_hour=$time_21[0];
$end_min=$time_21[1];

  ?>
<div class="col-md-4 mt-4">
<label  class="form-label font-16">Start Time:</label>
<div class="row mx-2">
<div class="col-md-4 p-0 pr-8 w-sm-33 sm-mt-3">  
<select class="form-select pad-select noreq" required name="time_hr" id="time_hr"><option value="">Hr</option>
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
<div class="col-md-4 p-0 pr-8 sm-mt-3 w-sm-33">  
<select class="form-select pad-select noreq" required name="time_min" id="time_min">
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
<div class="col-md-4 p-0 pr-8 sm-mt-3 w-sm-33">  
<select class="form-select pad-select noreq" required name="time_am" id="time_am"><option value="AM" <?if ($ampm=='AM') {
echo "selected";
}?>>AM</option>
<option value="PM" <?if ($ampm=='PM') {
echo "selected";
}?>>PM</option>
</select>
</div>
</div>
</div>


<div class="col-md-4 mt-4">
<label  class="form-label font-16">End Time:</label>
<div class="row mx-2">
<div class="col-md-4 p-0 pr-8 w-sm-33 sm-mt-3 ">  
<select class="form-select pad-select noreq" required name="end_time_hr" id="end_time_hr"><option value="">Hr</option>
<option value="1"  <?if($end_hour==1){echo "selected";}?>>1</option>
<option value="2"  <?if($end_hour==2){echo "selected";}?>>2</option>
<option value="3"  <?if($end_hour==3){echo "selected";}?>>3</option>
<option value="4"  <?if($end_hour==4){echo "selected";}?>>4</option>
<option value="5"  <?if($end_hour==5){echo "selected";}?>>5</option>
<option value="6"  <?if($end_hour==6){echo "selected";}?>>6</option>
<option value="7"  <?if($end_hour==7){echo "selected";}?>>7</option>
<option value="8"  <?if($end_hour==8){echo "selected";}?>>8</option>
<option value="9"  <?if($end_hour==9){echo "selected";}?>>9</option>
<option value="10" <?if($end_hour==10){echo "selected";}?> >10</option>
<option value="11" <?if($end_hour==11){echo "selected";}?>>11</option>
<option value="12" <?if($end_hour==12){echo "selected";}?>>12</option>
</select></div>
<div class="col-md-4 p-0 pr-8 w-sm-33 sm-mt-3">  
<select class="form-select pad-select noreq" required name="end_time_min" id="end_time_min">
<option value="00" <?if($end_min==00){echo "selected";}?>>00</option>
<option value="05" <?if($end_min==05){echo "selected";}?>>05</option>
<option value="10" <?if($end_min==10){echo "selected";}?>>10</option>
<option value="15" <?if($end_min==15){echo "selected";}?>>15</option>
<option value="20" <?if($end_min==20){echo "selected";}?>>20</option>
<option value="25" <?if($end_min==25){echo "selected";}?>>25</option>
<option value="30" <?if($end_min==30){echo "selected";}?>>30</option>
<option value="35" <?if($end_min==35){echo "selected";}?>>35</option>
<option value="40" <?if($end_min==40){echo "selected";}?>>40</option>
<option value="45" <?if($end_min==45){echo "selected";}?>>45</option>
<option value="50" <?if($end_min==50){echo "selected";}?>>50</option>
<option value="55" <?if($end_min==55){echo "selected";}?>>55</option>

</select></div>
<div class="col-md-4 p-0 pr-8 w-sm-33 sm-mt-3">  
<select class="form-select pad-select noreq" required name="end_time_am" id="end_time_am"><option value="AM" <?if ($end_ampm=='AM') {
echo "selected";
}?>>AM</option>
<option value="PM" <?if ($end_ampm=='PM') {
echo "selected";
}?>>PM</option>
</select>
</div>

</div>
</div>
<?}?>
<?
if ($type_of_report!=1) {

$rep_inspection_details=explode(",", $report_inspection_details);

?>
		<div id="pest-control" class="mt-4">

<?if ($type_of_report==0) {?>
  <hr>
<div class="mb-4">
			<h5>Inspection Details</h5>
<div class="form-check form-check-inline mt-2">
<input class="form-check-input" <? if($edit_values==0){ echo "checked";}?> type="checkbox" id="cockroaches"  <? if (in_array("Cockroaches", $rep_inspection_details)) { echo "checked"; } ?> name="inspection_details[]" value="Cockroaches">
  <label class="form-check-label" for="cockroaches">Cockroaches</label>
</div>
<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="bed_bugs" name="inspection_details[]"  <? if (in_array("Bed Bugs", $rep_inspection_details)) { echo "checked"; } ?> value="Bed Bugs">
  <label class="form-check-label" for="bed_bugs">Bed Bugs</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="rodents" name="inspection_details[]"   <? if (in_array("Rodents", $rep_inspection_details)) { echo "checked"; } ?> value="Rodents">
  <label class="form-check-label" for="rodents">Rodents</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id=" flying_insects" name="inspection_details[]"   <? if (in_array("Flying Insects", $rep_inspection_details)) { echo "checked"; } ?> value="Flying Insects">
  <label class="form-check-label" for=" flying_insects">Flying Insects</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="crawling_insects" name="inspection_details[]"   <? if (in_array("Crawling Insects", $rep_inspection_details)) { echo "checked"; } ?> value="Crawling Insects">
  <label class="form-check-label" for="crawling_insects">Crawling Insects</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="cats_dogs" name="inspection_details[]"  <? if (in_array("Cats & dogs", $rep_inspection_details)) { echo "checked"; } ?>  value="Cats & dogs">
  <label class="form-check-label" for="cats_dogs">Cats & dogs</label>
</div>
<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="termites" name="inspection_details[]"  <? if (in_array("Termites", $rep_inspection_details)) { echo "checked"; } ?> value="Termites">
  <label class="form-check-label" for="termites">Termites</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="snakes_scorpions" name="inspection_details[]"  <? if (in_array("Snakes & Scorpions", $rep_inspection_details)) { echo "checked"; } ?> value="Snakes & Scorpions">
  <label class="form-check-label" for="snakes_scorpions">Snakes & Scorpions</label>
</div>
		

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="general_pest_control" name="inspection_details[]"  <? if (in_array("General Pest Control", $rep_inspection_details)) { echo "checked"; } ?> value="General Pest Control">
  <label class="form-check-label" for="general_pest_control">General Pest Control</label>
</div>


<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="birds" name="inspection_details[]"  <? if (in_array("Birds", $rep_inspection_details)) { echo "checked"; } ?> value="Birds">
  <label class="form-check-label" for="birds">Birds</label>
</div>	


<?php
$value = '';
foreach ($rep_inspection_details as $detail) {
    if (!in_array($detail, ['Cockroaches', 'Birds', 'Bed Bugs', 'Rodents', 'Flying Insects', 'Crawling Insects', 'Cats & dogs', 'Termites', 'Snakes & Scorpions', 'General Pest Control'])) {
        $value = $detail;
        break;
    }
}
?>

<div class="mt-3">
  <label class="form-label" for="birds">If Other, Specify</label>
  <input type="text" name="inspection_details[]" class="form-control w-260" placeholder="Others" value="<?=$value;?>">
</div>
</div>



<div>  
<hr>
<h5>Sanitation Level : </h5>


<?
$rep_sanitation_details=explode(",", $report_sanitation_level);
?>
<div class="form-check form-check-inline mt-2">
<input class="form-check-input" <? if($edit_values==0){ echo "checked";}?> type="checkbox" id="clean" name="sanitation_level[]" <? if (in_array("Clean", $rep_sanitation_details)) { echo "checked"; } ?> value="Clean">
  <label class="form-check-label" for="clean">Clean</label>
</div>
<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="dirty" name="sanitation_level[]" <? if (in_array("Dirty", $rep_sanitation_details)) { echo "checked"; } ?> value="Dirty">
  <label class="form-check-label" for="dirty">Dirty</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" <? if (in_array("Oily", $rep_sanitation_details)) { echo "checked"; } ?> type="checkbox" id="oily" name="sanitation_level[]" value="Oily">
  <label class="form-check-label" for="oily">Oily</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="watery" name="sanitation_level[]" <? if (in_array("Watery", $rep_sanitation_details)) { echo "checked"; } ?> value="Watery">
  <label class="form-check-label" for="watery">Watery</label>
</div>
</div>

<div class="col-md-12 mt-3">
	<hr>
<h5 class="form-label width-100">Infestation Level : </h5>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="infestation_level" id="high" value="2" <? if($report_infestation_level =='2') { echo 'checked'; } ?>>
<label class="form-check-label" for="high">High</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio"  name="infestation_level"  value="0" id="medium" <? if($report_infestation_level =='1') { echo 'checked'; } ?>>
<label class="form-check-label"  for="medium">Medium</label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input" id="low" type="radio" name="infestation_level"  value="0" <? if($report_infestation_level =='0' || $report_infestation_level=='') { echo 'checked'; } ?>>
<label class="form-check-label"  for="low">Low</label>

</div>
</div>

<div>	
<hr>
<h5>Type Of Treatment :</h5>
<?


$rep_type_of_treatment=explode(",", $report_type_of_treatment);

?>
<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="Spray" name="type_of_treatment[]" <? if($edit_values==0){ echo "checked";}?> value="Spray" <? if (in_array("Spray", $rep_type_of_treatment)) { echo "checked"; } ?>>
  <label class="form-check-label" for="Spray">Spray</label>
</div>


<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="Rodent Control" name="type_of_treatment[]" value="Rodent Control" <? if (in_array("Rodent Control", $rep_type_of_treatment)) { echo "checked"; } ?>>
  <label class="form-check-label" for="Rodent Control">Rodent Control</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="Thermal Fogging" name="type_of_treatment[]" value="Thermal Fogging" <? if (in_array("Thermal Fogging", $rep_type_of_treatment)) { echo "checked"; } ?>>
  <label class="form-check-label" for="Thermal Fogging">Thermal Fogging</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="Gel" name="type_of_treatment[]" value="Gel" <? if (in_array("Gel", $rep_type_of_treatment)) { echo "checked"; } ?>>
  <label class="form-check-label" for="Gel">Gel</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="Termite Injection" name="type_of_treatment[]" value="Termite Injection" <? if (in_array("Termite Injection", $rep_type_of_treatment)) { echo "checked"; } ?>>
  <label class="form-check-label" for="Termite Injection">Termite Injection</label>
</div>

<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="Fumigation" name="type_of_treatment[]" value="Fumigation" <? if (in_array("Fumigation", $rep_type_of_treatment)) { echo "checked"; } ?>>
  <label class="form-check-label" for="Fumigation">Fumigation</label>
</div>
<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="ULV fogging" name="type_of_treatment[]" value="ULV fogging" <? if (in_array("ULV fogging", $rep_type_of_treatment)) { echo "checked"; } ?>>
  <label class="form-check-label" for="ULV fogging">ULV fogging</label>
</div>


<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="PCC Termite" name="type_of_treatment[]" value="PCC Termite" <? if (in_array("PCC Termite", $rep_type_of_treatment)) { echo "checked"; } ?>>
  <label class="form-check-label" for="PCC Termite">PCC Termite</label>
</div>
<?}?>


</div>


<div>
  
  <hr>
<h5>Area of Treatment :</h5>

<div class=" mt-3">
  <input type="text" value="<?=$report_area;?>" name="area_of_treatment" class="form-control w-260" placeholder="Area of Treatment">
</div>

</div>


<div class="mt-3">
<hr>
<div id="frm_scents">

  <?
  if ($edit_values==0) {?>

<div class="row">
      <div class="w-lg-25 w-sm-50 fw-500">Pestiside Used</div>
      <div class="w-lg-25 w-sm-50 fw-500">Concentration</div>
      <div class="w-lg-25 w-sm-50 sm-mt-3 fw-500">Remarks</div>
      <div class="w-lg-25 w-sm-50 sm-mt-3 fw-500">Action</div>
</div>
 
 <div id="p_scents">

  <div class="row mt-3">
      
      <div class="w-lg-25 w-sm-50">
      	<select class="single-select" required name="pestiside_used[]" id="pestiside_used1">
      		<option value="">Pestiside Used</option>
      	<?
      		$select_pestiside_used=mysqli_query($conn,"select * from pestiside_used where status=1 order by pestiside_used asc");
      		while($row_pestiside_used=mysqli_fetch_array($select_pestiside_used)){
      			$pestiside_used=$row_pestiside_used['pestiside_used'];
      	?>

      	<option value="<?=$pestiside_used;?>"><?=$pestiside_used;?></option>
      	<?}?>
      </select>
  </div>

  <div class="w-lg-25 w-sm-50">
<input type="text" name="concentration[]" id="concentration1" class="form-control" placeholder="Concentration" required>
</div>


      <div class="w-lg-25 w-sm-50 sm-mt-3">
      	<input type="text" name="remarks[]" id="remarks1" class="form-control" placeholder="Remarks">
      </div>

      <div class="w-lg-25 w-sm-50 text-small-center sm-mt-3">
<a type="button" id="addScnt" class="pe-1" tooltip="Add More" style="width: auto;" >
	<img src="assets/images/Our/plus2.png" width="27px;"> </a>
</div>
    
</div>
</div>
<?}else{?>
<div class="row">
      <div class="w-lg-25 w-sm-50 fw-500">Pestiside Used</div>
      <div class="w-lg-25 w-sm-50 fw-500">Concentration</div>
      <div class="w-lg-25 w-sm-50 sm-mt-3 fw-500">Remarks</div>
      <div class="w-lg-25 w-sm-50 sm-mt-3 fw-500">Action</div>
</div>
 
 <div id="p_scents">

  <?
$select_pest_product=mysqli_query($conn,"select * from pestcontrol_report_product where pest_control_report_id='$report_id'");
$Sno1=0;
while ($row_pest_product=mysqli_fetch_array($select_pest_product)) {

$Sno1=$Sno1+1;

$report_concentration=$row_pest_product['concentration'];
$report_pestiside_used=$row_pest_product['pestiside_used'];

$report_remarks=$row_pest_product['remarks'];

  ?>

  <div class="row mt-3">
      
      <div class="w-lg-25 w-sm-50">
        <select class="single-select" required name="pestiside_used[]" id="pestiside_used<?=$Sno1;?>">
          <option value="">Pestiside Used</option>
        <?
          $select_pestiside_used=mysqli_query($conn,"select * from pestiside_used where status=1 order by pestiside_used asc");
          while($row_pestiside_used=mysqli_fetch_array($select_pestiside_used)){
            $pestiside_used=$row_pestiside_used['pestiside_used'];
        ?>

        <option <? if($report_pestiside_used==$pestiside_used){echo "selected";}?> value="<?=$pestiside_used;?>"><?=$pestiside_used;?></option>
        <?}?>
      </select>
  </div>

  <div class="w-lg-25 w-sm-50">
<input type="text" name="concentration[]" value="<?=$report_concentration;?>" id="concentration<?=$Sno1;?>" class="form-control" placeholder="Concentration" required>
</div>
      <div class="w-lg-25 w-sm-50 sm-mt-3">
        <input type="text" name="remarks[]" value="<?=$report_remarks;?>" id="remarks<?=$Sno1;?>" class="form-control" placeholder="Remarks">
      </div>
<? if($Sno1 == 1){ ?>
      <div class="w-lg-25 w-sm-50 text-small-center sm-mt-3">
<a type="button" id="addScnt" class="pe-1" tooltip="Add More" style="width: auto;" >
  <img src="assets/images/Our/plus2.png" width="27px;"> </a>
</div>
    <?}else{?>

<div class="w-lg-25 w-sm-50 text-small-center sm-mt-3"><a type="button" id="remScnt1" onclick="removeCont1(this);" class="pe-1" tooltip="Remove" style="width: auto;" ><img src="assets/images/Our/minus.png" width="27px;"> </a></div>
      <?}?>
</div>

<?}?>

</div>
  <?}?>

		
	</div>
	
</div>


<div class="mt-3">
<hr>

<h6>Remarks to Customers for Improvement : </h6>

<textarea class="form-control sm-w" name="customer_remarks"  placeholder="Remarks to Customers"><?=$report_remarks?></textarea>
</div>	

<!--pestworkdiv -->
		</div>
<?}elseif($type_of_report==1){?>

<div class="mt-4">
<div class="row">

  <div class="bg-primary text-center rounded-1 p-0">
<h5 class="text-white py-1">Water Tank Details</h5>
</div>

<div class="col-md-4 mt-3  sm-mt-3">
<label class="form-label font-16">Type Of Facility: </label>
<select class="form-select" name="type_of_facility">
  <option>Select Facility</option>
  <option value="Building" <? if($report_type_of_facility=='Building'){echo "selected";}?>>Building</option>
  <option value="Villa" <? if($report_type_of_facility=='Villa'){echo "selected";}?>>Villa</option>
  <option value="Restaurant" <? if($report_type_of_facility=='Restaurant'){echo "selected";}?>>Restaurant</option>
  <option value="Other" <? if($report_type_of_facility=='Other'){echo "selected";}?>>Other</option>
</select>
</div>

<div class="col-md-4 mt-3  sm-mt-3">
<label class="form-label font-16">Nature Of Job: </label>
<select class="form-select" name="nature_of_job" id="nature_of_job" onchange="fetchothers()" required>


  <?
if ($report_nature_of_job!='Domestic Water Tank Cleaning & Disinfection' &&  $report_nature_of_job!='Microbiological/Legionella Lab Report' && $report_nature_of_job!='Waste water tank' && $report_nature_of_job!='Sewage tank Cleaning' && $report_nature_of_job!='Irrigation tank Cleaning' && $report_nature_of_job!='Fire water tank Cleaning' && $nature_of_job!='') {
$others_selected="selected";
}

  ?>
  <option>Select Nature of Job</option>
  <option value="Domestic Water Tank Cleaning & Disinfection" <? if($report_nature_of_job=='Domestic Water Tank Cleaning & Disinfection'){echo "selected";}?>>Domestic Water Tank Cleaning &<br> Disinfection</option>
  <option value="Microbiological/Legionella Lab Report" <? if($report_nature_of_job=='Microbiological/Legionella Lab Report'){echo "selected";}?>>Microbiological/Legionella Lab Report</option>
  <option value="Waste water tank" <? if($report_nature_of_job=='Waste water tank'){echo "selected";}?>>Waste water tank</option>
  <option value="Sewage tank Cleaning" <? if($report_nature_of_job=='Sewage tank Cleaning'){echo "selected";}?>>Sewage tank Cleaning</option>
  <option value="Irrigation tank Cleaning" <? if($report_nature_of_job=='Irrigation tank Cleaning'){echo "selected";}?>>Irrigation tank Cleaning</option>

  <option value="Fire water tank Cleaning" <? if($report_nature_of_job=='Fire water tank Cleaning'){echo "selected";}?>>Fire water tank Cleaning</option>
  <option value="Others" <?=$others_selected;?>>Others</option>
</select>
<div id="otherdiv" style="<?if ($others_selected=='') {?>display:none;<?}?>">
  <input type="text" value="<?if ($others_selected!='') { echo$report_nature_of_job;}?>" name="other_nature_of_job" class="form-control mt-2" id="other_nature_of_job" placeholder="Others">
</div>
</div>
  


<div class="mt-3">
<hr>
<div id="frm_scents1">



<div class="row">
      <div class="w-lg-25 w-sm-50 fw-500">Type of Tank & Quality </div>
      <div class="w-lg-25 w-sm-50 fw-500">Size of Tank</div>
      <div class="w-lg-25 w-sm-50 sm-mt-3 fw-500">Location</div>
      <div class="w-lg-25 w-sm-50 sm-mt-3 fw-500">Action</div>
</div>
 <?if ($edit_values==0) {?>
 <div id="p_scents">
  <div class="row mt-3">
     
      <div class="w-lg-25 w-sm-50">
        <select class="single-select" required name="type_of_tank[]" id="type_of_tank1">
          <option value="">Type</option>
    <option value="GRP Tank">GRP Tank</option>
    <option value="Fiber Tank">Fiber Tank</option>
    <option value="Polyurethane">Polyurethane</option>
    <option value="RCC Tank">RCC Tank</option>
    <option value="Other">Other</option>
      </select>
  </div>

   <div class="w-lg-25 w-sm-50">
<input type="text" name="size_of_tank[]" id="size_of_tank1" class="form-control" placeholder="Size of Tank" required>
</div>
      <div class="w-lg-25 w-sm-50 sm-mt-3">
    <select class="single-select" required name="location[]" id="location1">
          <option value="">Location</option>
    <option value="Roof Top">Roof Top</option>
    <option value="Ground">Ground</option>
    <option value="Basement">Basement</option>
    <option value="Floor/Podium">Floor/Podium</option>
    <option value="Other">Other</option>
      </select>
      </div>
      <div class="w-lg-25 w-sm-50 text-small-center sm-mt-3">
<a type="button" id="addScnt1" class="pe-1" tooltip="Add More" style="width: auto;" >
  <img src="assets/images/Our/plus2.png" width="27px;"> </a>
</div>  
</div>
</div>
<?}else{?>
<div id="p_scents">

  <?
  $select_watertank_product=mysqli_query($conn,"select * from watertank_report_product where watertank_report_id='$report_id'");
$Sno2=0;
while($row_watertank_product=mysqli_fetch_array($select_watertank_product)){

  $Sno2=$Sno2+1;


  $report_type_of_tank=$row_watertank_product['type_of_tank'];
   $report_size_of_tank=$row_watertank_product['size_of_tank'];
  $report_location=$row_watertank_product['location'];

  ?>
  <div class="row mt-3">
     
      <div class="w-lg-25 w-sm-50">
        <select class="single-select" required name="type_of_tank[]" id="type_of_tank<?=$Sno2;?>">
          <option value="">Type</option>
<option value="GRP Tank" <? if($report_type_of_tank=="GRP Tank"){echo "selected";}?>>GRP Tank</option>
<option value="Fiber Tank" <? if($report_type_of_tank=="Fiber Tank"){echo "selected";}?>>Fiber Tank</option>
<option value="Polyurethane" <? if($report_type_of_tank=="Polyurethane"){echo "selected";}?>>Polyurethane</option>
<option value="RCC Tank" <? if($report_type_of_tank=="RCC Tank"){echo "selected";}?>>RCC Tank</option>
<option value="Other" <? if($report_type_of_tank=="Other"){echo "selected";}?>>Other</option>
      </select>
  </div>

   <div class="w-lg-25 w-sm-50">
<input type="text" name="size_of_tank[]" id="size_of_tank<?=$Sno2;?>" class="form-control" value="<?=$report_size_of_tank;?>" placeholder="Size of Tank" required>
</div>
      <div class="w-lg-25 w-sm-50 sm-mt-3">
    <select class="single-select" required name="location[]" id="location<?=$Sno2;?>">
          <option value="">Location</option>
    <option value="Roof Top" <? if($report_location=="Roof Top"){echo "selected";}?>>Roof Top</option>
    <option value="Ground" <? if($report_location=="Ground"){echo "selected";}?>>Ground</option>
    <option value="Basement" <? if($report_location=="Basement"){echo "selected";}?>>Basement</option>
    <option value="Floor/Podium" <? if($report_location=="Floor/Podium"){echo "selected";}?>>Floor/Podium</option>
    <option value="Other" <? if($report_location=="Other"){echo "selected";}?>>Other</option>
      </select>
      </div>
      <? if($Sno2 == 1){ ?>

      <div class="w-lg-25 w-sm-50 text-small-center sm-mt-3">
<a type="button" id="addScnt1" class="pe-1" tooltip="Add More" style="width: auto;" >
  <img src="assets/images/Our/plus2.png" width="27px;"> </a>
</div>
    <?}else{?>

<div class="w-lg-25 w-sm-50 text-small-center sm-mt-3"><a type="button" id="remScnt" onclick="removeCont(this);" class="pe-1" tooltip="Remove" style="width: auto;" ><img src="assets/images/Our/minus.png" width="27px;"> </a></div>
      <?}?>  
</div>

<?}?>
</div>


  <?}?>
  </div>
</div>



<div>
<hr>
<div class="row">
<div class="col-md-3 mt-4 w-sm-50 sm-mt-3">
<label class="form-label font-14">Start Date: </label>

<input type="date" name="start_date" value="<?=$report_start_date;?>"  required class="form-control" >
</div>

<div class="col-md-3 mt-4 w-sm-50 sm-mt-3">
<label class="form-label font-14">Completed Date: </label>

<input type="date" value="<?=$report_completed_date;?>" name="completed_date" id="completed_date" onchange="completeddate()"  required class="form-control" >
</div>

</div>




<div class="mt-3">
<hr>

<h6>Defects Found, Rectifications / Actions Taken : </h6>

<textarea class="form-control sm-w mt-3" name="defects" placeholder="Defects Found, Rectifications / Actions Taken"><?=$report_defects;?></textarea>
</div> 



<div class="row mt-2">
  <div class="col-md-3 mt-3">
<label class="form-label font-16">Chemical Used: </label>
<input type="text" name="chemical_used" value="<?=$report_chemical_used;?>" class="form-control" placeholder="Chemical Used" >
</div> 


 <div class="col-md-3 mt-3">
<label class="form-label font-16">Date of Cleaning: </label>
<input type="date" value="<?=$report_date_of_cleaning;?>" readonly name="date_of_cleaning" id="date_of_cleaning" class="form-control">
</div> 


 <div class="col-md-3 mt-3">
<label class="form-label font-16">Next Cleaning Date: </label>
<input type="date" value="<?=$report_next_cleaning_date;?>"  name="next_cleaning_date" id="next_cleaning_date" class="form-control">
</div>

 <div class="col-md-3 mt-3">
<label class="form-label font-16">Gas Leveling Finding: </label>
<input type="text" value="<?=$report_gas_leveling_finding;?>" name="gas_leveling_finding" class="form-control" placeholder="Gas Leveling Finding" >
</div>


<div class="col-md-4 mt-3  sm-mt-3">
<label class="form-label font-16">Job Completed: </label>
<select class="form-select" name="job_completed">
  <option value="yes" <?if($report_job_completed=='yes'){echo "selected";}?>>Yes</option>
  <option value="no" <?if($report_job_completed=='no'){echo "selected";}?>>No</option>

</select>
</div>




 <div class="col-md-3 mt-3">
<label class="form-label font-16">Further Action Required: </label>
<input type="text" name="further_action" class="form-control" placeholder="Further Action Required" value="<?=$report_further_action;?>">
</div>

 <div class="col-md-5 mt-3">

<label class="form-label font-16">Remarks : </label>
<textarea class="form-control"  name="water_tank_remarks" placeholder="Remarks"><?=$report_remarks;?></textarea>
</div> 
</div>

</div>

</div>
<!--watertankdiv -->
</div>
  <?}?>


<div>
  
  <hr>
<h5>Customer Signature :</h5>


<div class="row">


<div class="col-md-3">
  <div class=" mt-3">
  <label class="form-label">Customer Name: </label>
  <input type="text" value="<?=$report_customer_sign_name;?>" name="customer_sign_name" class="form-control w-260" placeholder="Customer Name" required>
</div>
  
</div>  

<div class="col-md-3">
  <div class=" mt-3">
  <label class="form-label">Customer Mobile: </label>
  <input type="text" value="<?=$report_customer_sign_mobile;?>" name="customer_sign_mobile" pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9" class="form-control w-260" placeholder="Customer Mobile" required>
</div>
  
</div> 
</div>


</div>

	<div class="col-md-9 align-self-center mt-5">
<input type="submit" name="Submit" id="submit-btn" class="btn btn-primary px-5" value="<? if($edit_values==1){ echo "Update";}else{ echo "Create";}?>" >
</div>
	
</div>







</div>
</div>
</div>
</div>
</form>

<script src="assets/js/addmore.js"></script>


<script>





var i = $("[id^=pestiside_used]").length + 1;


$(function() {
    var scntDiv = $("#frm_scents");
$("#addScnt").click(function() {
$('<div class="row mt-3"><hr><div class="w-lg-25 w-sm-50"><select class="single-select" required name="pestiside_used[]" id="pestiside_used'+i+'"><option value="">Pestiside Used</option><?$select_pestiside_used=mysqli_query($conn,"select * from pestiside_used where status=1 order by pestiside_used asc");while($row_pestiside_used=mysqli_fetch_array($select_pestiside_used)){$pestiside_used=$row_pestiside_used['pestiside_used'];?>
<option value="<?=$pestiside_used;?>"><?=$pestiside_used;?></option><?}?></select></div><div class="w-lg-25 w-sm-50"><input type="text" name="concentration[]" id="concentration'+i+'" class="form-control" placeholder="Concentration" required></div><div class="w-lg-25 w-sm-50  sm-mt-3"><input type="text" name="remarks[]" id="remarks'+i+'" class="form-control" placeholder="Remarks"></div><div class="w-lg-25 w-sm-50 text-small-center sm-mt-3"><a type="button" id="remScnt1" onclick="removeCont1(this);" class="pe-1" tooltip="Remove" style="width: auto;" ><img src="assets/images/Our/minus.png" width="27px;"> </a></div></div>').appendTo(scntDiv);

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

function removeCont1(_this) {

if (i > 1) {
$(_this).parent().parent().remove();
}}
	



var j = $("[id^=type_of_tank]").length + 1;


$(function() {
    var scntDiv1 = $("#frm_scents1");
$("#addScnt1").click(function() {
$('<div class="row mt-3"><hr> <div class="w-lg-25 w-sm-50"><select class="single-select" required name="type_of_tank[]" id="type_of_tank'+j+'"><option value="">Type</option><option value="GRP Tank">GRP Tank</option><option value="Fiber Tank">Fiber Tank</option><option value="Polyurethane">Polyurethane</option><option value="RCC Tank">RCC Tank</option><option value="Other">Other</option></select></div><div class="w-lg-25 w-sm-50"><input type="text" name="size_of_tank[]" id="size_of_tank'+j+'" class="form-control" placeholder="Size of Tank" required></div><div class="w-lg-25 w-sm-50 sm-mt-3"><select class="single-select" required name="location[]" id="location'+j+'"><option value="">Location</option><option value="Roof Top">Roof Top</option><option value="Ground">Ground</option><option value="Basement">Basement</option><option value="Floor/Podium">Floor/Podium</option><option value="Other">Other</option></select></div><div class="w-lg-25 w-sm-50 text-small-center sm-mt-3"><a type="button" id="remScnt" onclick="removeCont(this);" class="pe-1" tooltip="Remove" style="width: auto;" ><img src="assets/images/Our/minus.png" width="27px;"></a></div></div>').appendTo(scntDiv1);

$('.single-select').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
allowClear: Boolean($(this).data('allow-clear')),
});
j++;
return false;
});
});

function removeCont(_this) {

if (j > 1) {
$(_this).parent().parent().remove();
}}
  

  function fetchothers() {
val=$("#nature_of_job").val();
    if (val=="Others") {
        $("#otherdiv").css("display","block");
        $("#other_nature_of_job").attr("required",true);
    }else{
      $("#otherdiv").css("display","none");
        $("#other_nature_of_job").attr("required",false);
    }
  }



  function completeddate(){
    val=$("#completed_date").val();
    $("#date_of_cleaning").val(val);

     completed_date = new Date(val);                          
    completed_date.setMonth(completed_date.getMonth() + 6);                   
     plus_six_month = completed_date.toISOString().split('T')[0]; 
$("#next_cleaning_date").val(plus_six_month);

  }
</script>
<?
}
include 'template.php';

?>