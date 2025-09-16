<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$currentDate = date('Y-m-d');
?>

<?

if($Submit=='Create Lead')
{



$Select_Supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id' and user_type='2'");

$Row_Supervisor=mysqli_fetch_array($Select_Supervisor);
$Supervisor_Name=$Row_Supervisor['name'];

$inspection_time=$inspection_time_hr.":".$inspection_time_min." ".$inspection_time_am;

if($is_inspection_required==0 || $is_inspection_required==3){
$supervisor_id=0;
$Supervisor_Name="";
$inspection_date="";
$inspection_time="";
}




if ($time_hr!='') {
$required_time=$time_hr.":".$time_min.$time_am; 
}

$insert_new_lead=mysqli_query($conn,"insert into  leads set lead_type='$lead_type',job_type='$job_type',company_name='$company_name',customer_name='$customer_name',email='$email',mobile='$mobile',required_date='$required_date',required_time='$required_time',site_name='$site_name',site_address='$site_address',work_description='$work_description',location='$location',lead_priority='$lead_priority',is_inspection_required='$is_inspection_required',supervisor_id='$supervisor_id',supervisor_name='$Supervisor_Name',inspection_date='$inspection_date',inspection_time='$inspection_time',status='0',created_datetime='$currentTime'");




if($insert_new_lead)
{
$msg = 'Lead Details Added Successfully';
  header('Location:list-leads.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to add try once again!!!';
  header('Location:list-leads.php?alert_msg='.$alert_msg);
}

}
if($Submit=='Update Lead')
{


  $Select_Supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id' and user_type='2'");

$Row_Supervisor=mysqli_fetch_array($Select_Supervisor);
$Supervisor_Name=$Row_Supervisor['name'];

$inspection_time=$inspection_time_hr.":".$inspection_time_min." ".$inspection_time_am;

if($is_inspection_required==0){
$supervisor_id=0;
$Supervisor_Name="";
$inspection_date="";
$inspection_time="";
}

if ($job_type=="Others") {
  $Jobtype=$other_job_type;
}else{
$Jobtype=$job_type;
}

$select_old_job_type=mysqli_query($conn,"select * from job_type where  job_type='$Jobtype'  order by id desc");

if (mysqli_num_rows($select_old_job_type)==0) {
  $insert_job_type=mysqli_query($conn,"insert into job_type set job_type='$Jobtype',status = '1',  created_by = ".$_SESSION['UID'].", created_datetime = '$currentTime'");
}

if ($time_hr!='') {
$required_time=$time_hr.":".$time_min.$time_am; 
}
$update_lead=mysqli_query($conn,"update leads set lead_type='$lead_type',required_date='$required_date',required_time='$required_time',job_type='$Jobtype',company_name='$company_name',customer_name='$customer_name',email='$email',mobile='$mobile',site_name='$site_name',site_address='$site_address',work_description='$work_description',location='$location',lead_priority='$lead_priority',is_inspection_required='$is_inspection_required',supervisor_id='$supervisor_id',supervisor_name='$Supervisor_Name',inspection_date='$inspection_date',inspection_time='$inspection_time',status='0',modified_datetime='$currentTime' where id='$ID'");



if($update_lead)
{
$msg = 'Lead Details Updated Successfully';
  header('Location:list-leads.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
  header('Location:list-leads.php?alert_msg='.$alert_msg);
}

}

?>

<script src="crop/jquery.min.js"></script>  
<script src="crop/bootstrap.min.js"></script>
<script src="crop/croppie.js"></script>
<link rel="stylesheet" href="crop/croppie.css"/>


<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
  <h5 class="mb-0 text-dark">Create Lead</h5>
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
  

$select_leads=mysqli_query($conn,"select * from leads where Id='$ID'");

$row_R=mysqli_fetch_array($select_leads);
foreach($row_R as $K1=>$V1) $$K1 = $V1;

}

if ($lead_type=='Website') {
   $readonly="readonly";
}
if ($is_inspection_required =='1') {

$required='required';
}
?>


<form action="#" method="post" enctype="multipart/form-data" >
<div class="row form-label">
<div class="col-xl-12 ">

<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">

<div class="row g-3">

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Select Lead Type</label>
    <? if($lead_type!='Website'){?>
<select class="form-select" name="lead_type" <?=$readonly;?> required>

<option value="">Select Lead Type</option>

<?
$select_lead_type=mysqli_query($conn,"select * from lead_type where status=1 order by id desc");

while($row_lead_type=mysqli_fetch_array($select_lead_type)){
    $Lead_type=$row_lead_type['lead_type'];
        $Lead_type_id=$row_lead_type['id'];
?>
<option value="<?=$Lead_type;?>" <?if($Lead_type==$lead_type){echo "selected";}?>><?=$Lead_type;?></option>

<?}}else{?>
    <br>
<label class="form-label"><?=$lead_type;?></label>
<input type="hidden" name="lead_type" value="<?=$lead_type;?>">
<?}?>
</select>
</div>


<div class="col-md-3">
<label for="inputFirstName" class="form-label">Select Job Type <span class="req">*</span></label>
<?

$select_others=mysqli_query($conn,"select * from job_type where job_type='$job_type'");
$select_tot_job=mysqli_query($conn,"select * from job_type where status=1 order by id desc");
?>
<select class="form-select" onchange="getjobtype()" id="job_type" name="job_type" required>
<option value="">Select Job Type</option>

<?
while($row_job_type=mysqli_fetch_array($select_tot_job)){
    $Job_type=$row_job_type['job_type'];
        $job_type_id=$row_job_type['id'];
?>
<option value="<?=$Job_type;?>" <?if($Job_type==$job_type){echo "selected";}?>><?=$Job_type;?></option>

<?}?>
<option value="Others" <?if(mysqli_num_rows($select_others)==0 && $ID!=''){echo "selected";}?>>Others</option>
</select>


<div id="othersdiv" class="mt-2" style="<?if(mysqli_num_rows($select_others)!=0 || $job_type==""){echo "display:none";}?>">
  <input type="text" name="other_job_type" value="<?=$job_type;?>" placeholder="Others" id="other_job_type" class="form-control">
</div>
</div>


<div class="col-md-3">
<label for="inputFirstName" class="form-label">Company Name</label>
<input type="text" name="company_name" class="form-control" value="<?=$company_name;?>" placeholder="Company Name">
</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Contact Person Name <span class="req">*</span></label>
<input type="text" name="customer_name" class="form-control" value="<?=$customer_name;?>" placeholder="Contact Person Name" required>
</div>
<div class="col-md-2">
<label for="inputFirstName" class="form-label">Mobile<span class="req"> *</span></label>
<input type="text" name="mobile" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9" value="<?=$mobile;?>" placeholder=" Mobile" required>
</div>

<div class="col-md-2">
<label for="inputFirstName" class="form-label">Email ID: <span class="req">*</span></label>
<input type="email" required name="email" required class="form-control" value="<?=$email;?>" placeholder="Email ID">
</div>

<div class="col-md-2">
<label for="inputFirstName" class="form-label">Location URL:</label>
<input type="url" class="form-control" value="<?=$location;?>" name="location" placeholder="Location">
</div>

<div class="col-md-3">
<label for="inputFirstName" class="form-label">Site Name</label>
<input type="text" name="site_name" class="form-control" value="<?=$site_name;?>" placeholder="Site Name">
</div>


<div class="col-md-3">
<label for="inputFirstName" class="form-label">Site Address <span class="req">*</span></label>
<textarea name="site_address" class="form-control" required placeholder="Site Address"><?=$site_address;?></textarea>
</div>

<div class="col-md-2">
<label for="inputFirstName" class="form-label">Job Date:</label>
<input type="date" class="form-control" min="<?=$currentDate;?>" value="<?=$required_date;?>" name="required_date" placeholder="Required Date">
</div>
<?

if ($ID!='') {
    $time_part=explode(' ', $required_time);
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
<select class="form-select pad-select noreq" name="time_hr" id="time_hr"><option value="">Hr</option>
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
<select class="form-select pad-select noreq" name="time_min" id="time_min">
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
<select class="form-select pad-select noreq" name="time_am" id="time_am"><option value="AM" <?if ($ampm=='AM') {
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
<label for="inputFirstName" class="form-label">Work Description: <span class="req">*</span></label>
<textarea name="work_description" class="form-control" placeholder="Work Description"><?=$work_description;?></textarea>
</div>



<div class="col-md-4">
<label for="inputAddress" class="form-label width-100" >Lead Priority</label>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onchange="radioChange(this.value,'lead_priority')" name="lead_priority" id="hot" value="hot" <? if ($lead_priority == 'hot' || $lead_priority=='') { echo 'checked'; } ?> required>

<label class="form-check-label hot" for="hot">Hot</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onchange="radioChange(this.value,'lead_priority')" name="lead_priority" id="warm" value="warm" <? if($lead_priority =='warm') { echo 'checked'; } ?> required>
<label class="form-check-label warm" for="warm">Warm</label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onchange="radioChange(this.value,'lead_priority')" name="lead_priority"  value="cold" id="cold" <? if($lead_priority =='cold') { echo 'checked'; } ?> required>
<label class="form-check-label cold" for="cold">Cold</label>
</div>
</div>

<div class="col-md-8 mt-4">
<label for="inputAddress" class="form-label width-100 fw-600 font-20" >Inspection Required</label>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio"  name="is_inspection_required" onclick="chstatus()"  value="1" id="yes" <? if($is_inspection_required =='1') { echo 'checked'; } ?> <?=$required;?>>
<label class="form-check-label font-16" for="yes">Yes</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onclick="chstatus()"  name="is_inspection_required"  value="0" id="no" <? if($is_inspection_required =='0' ) { echo 'checked'; } ?> <?=$required;?>>
<label class="form-check-label font-16" for="no">No</label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onclick="chstatus()"  name="is_inspection_required"  value="3" id="not_req" <? if($is_inspection_required =='3' || $is_inspection_required =='') { echo 'checked'; } ?> <?=$required;?>>
<label class="form-check-label font-16" for="not_req">Not Required</label>
</div>
</div>

<?

if ($ID!='') {
    $inspection_time_part=explode(' ', $inspection_time);
    $from_hrmin=$inspection_time_part[0];
          $from_ampm=$inspection_time_part[1];
      $inspection_time_time=explode(':', $from_hrmin);
     $from_hr=$inspection_time_time[0];
       $from_min=$inspection_time_time[1];
}

?>

 <div id="inspection_main" style="<?if ($is_inspection_required !='1') {
 ?>display:none;<?}?>">
<div class="row">

<div class="col-md-3 col-xl-3 col-xxl-2 col-12 mb-3">
<label for="inputFirstName" class="form-label">Select Supervisor</label>
<select class="form-select noreq" id="supervisor_id" 
onchange="supervisorst('supervisor',this.value)" name="supervisor_id" <?=$required;?>>
<option value="">Select Supervisor</option>

<?
$select_Supervisor=mysqli_query($conn,"select * from user where user_type='2' and status=1 order by id desc");

while($row_Supervisor=mysqli_fetch_array($select_Supervisor)){
    $supervisor=$row_Supervisor['name'];
        $Supervisor_id=$row_Supervisor['Id'];
?>
<option value="<?=$Supervisor_id;?>" <?if ($supervisor_id==$Supervisor_id) {
    echo "selected";
}?>><?=$supervisor;?></option>

<?}?>
</select>
</div>

<div class="col-md-3 col-xl-3 col-xxl-2 col-12 mb-3">
<label for="inputFirstName"  class="form-label noreq">Select Inspection Date</label>
<input type="date" id="inspection_date"  min="<?=$currentDate;?>" value="<?=$inspection_date;?>" onchange="supervisorst('date',this.value)" name="inspection_date" class="form-control" <?=$required;?>>
</div>


<div class="col-md-6 col-xl-4 col-xxl-4 col-12 mb-3">
<label for="inputFirstName" class="form-label">Inspection Visiting Time</label>
<div class="row timess">
<div class="col-md-3">  
<select class="form-select pad-select noreq" name="inspection_time_hr" id="inspection_time_hr" <?=$required;?>><option value="">Hr</option>
<option value="1" <?if($from_hr==1){echo "selected";}?>>1</option>
<option value="2" <?if($from_hr==2){echo "selected";}?>>2</option>
<option value="3" <?if($from_hr==3){echo "selected";}?>>3</option>
<option value="4" <?if($from_hr==4){echo "selected";}?>>4</option>
<option value="5" <?if($from_hr==5){echo "selected";}?>>5</option>
<option value="6" <?if($from_hr==6){echo "selected";}?>>6</option>
<option value="7" <?if($from_hr==7){echo "selected";}?>>7</option>
<option value="8" <?if($from_hr==8){echo "selected";}?>>8</option>
<option value="9" <?if($from_hr==9){echo "selected";}?>>9</option>
<option value="10" <?if($from_hr==10){echo "selected";}?>>10</option>
<option value="11" <?if($from_hr==11){echo "selected";}?>>11</option>
<option value="12" <?if($from_hr==12){echo "selected";}?>>12</option>
</select></div>
<div class="col-md-3">  
<select class="form-select pad-select noreq" name="inspection_time_min" id="inspection_time_min" <?=$required;?>>
<option value="00" <?if($from_min==00){echo "selected";}?>>00</option>
<option value="05" <?if($from_min==05){echo "selected";}?>>05</option>
<option value="10" <?if($from_min==10){echo "selected";}?>>10</option>
<option value="15" <?if($from_min==15){echo "selected";}?>>15</option>
<option value="20" <?if($from_min==20){echo "selected";}?>>20</option>
<option value="25" <?if($from_min==25){echo "selected";}?>>25</option>
<option value="30" <?if($from_min==30){echo "selected";}?>>30</option>
<option value="35" <?if($from_min==35){echo "selected";}?>>35</option>
<option value="40" <?if($from_min==40){echo "selected";}?>>40</option>
<option value="45" <?if($from_min==45){echo "selected";}?>>45</option>
<option value="50" <?if($from_min==50){echo "selected";}?>>50</option>
<option value="55" <?if($from_min==55){echo "selected";}?>>55</option>

</select></div>
<div class="col-md-3">  
<select class="form-select pad-select noreq" name="inspection_time_am" id="inspection_time_am" <?=$required;?> ><option value="AM" <?if ($from_ampm=='AM') {
echo "selected";
}?>>AM</option>
<option value="PM" <?if ($from_ampm=='PM') {
echo "selected";
}?>>PM</option>
</select>
</div>
</div>
</div>




</div>

<div id="output">
    
</div>

      
    </div>

<div class="col-md-12 align-self-center">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<?if($ID!=''){echo"Update Lead";}else{echo"Create Lead";}?>" >
</div>




</div>
</div>
</div>
</div>
</div>
</form>



    
<script>
  

  function getjobtype(){
  val= $("#job_type").val();


if (val=="Others") {
$("#othersdiv").css("display","block");
$("#other_job_type").attr("required",true);
}else{
$("#othersdiv").css("display","none");
$("#other_job_type").attr("required",false);
}

}



  function chstatus() {
    if ($('#yes').is(':checked')) {
     $('#inspection_main').css("display","block");
$('.noreq').attr("required",true);

    }else if($('#no').is(':checked')){
         $('#inspection_main').css("display","none");
 $('.noreq').attr("required",false);


    }
    else if($('#not_req').is(':checked')){
         $('#inspection_main').css("display","none");
 $('.noreq').attr("required",false);


    }
  }




  function supervisorst(type,val){
   inspectiondate = $("#inspection_date").val();
   supervisor_id = $("#supervisor_id").val();

  if (type === 'supervisor') {
    supervisor_id = val;
  } else {
    inspectiondate = val;
  }


    $.ajax({
url: "ajax-supervisor-schedule.php", 
type: "POST",
data: "id="+supervisor_id+"&date="+inspectiondate,
success: function(result){
$("#output").html(result);
}});
  }



</script>






<?php
}
include 'template.php';
?>