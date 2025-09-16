<?php
ob_start();
ob_clean();
session_start();
extract($_REQUEST);
include 'adminln/dilg/cnt/join.php';
include 'adminln/global-functions.php';
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');

$currentdate = date('Y-m-d');
if ($Submit=='Book Now') {

if ($time_hr!='') {
$required_time=$time_hr.":".$time_min.$time_am;	
}


if ($job_type=="Others") {
  $Jobtype=$other_job_type;
}else{
$Jobtype=$job_type;
}

$messages.= '<table width="683" border="0" align="left" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
 <tbody>
   <tr>
     <td width="677"><table width="680" border="0" align="left" cellpadding="0" cellspacing="0">
         <tbody>
           <tr>
             <td height="40">&nbsp;</td>
             <td colspan="2" align="left" style="font-size:22px; font-weight:bold; color:#b68d57;"><strong>Supernova Pest Control</strong></td>
           </tr>
            <tr>
             <td height="40">&nbsp;</td>
             <td colspan="2" align="left" style="color:#0d577a;font-size:16px;font-weight:bold"><strong>Enquiry Details From '.$customer_name.' </strong></td>
           </tr>

          
           <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Job Type </strong></td>
             <td width="70%">'.$Jobtype.'</td>
           </tr>

            <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Mobile</strong></td>
             <td width="70%">'.$mobile.'</td>
           </tr>
          
            <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Contact Person Name: </strong></td>
             <td width="70%">'.$customer_name.'</td>
           </tr>
  
           
           <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Email Id</strong></td>
             <td width="70%">'.$email.'</td>
           </tr>

         
           <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Site Address</strong></td>
             <td width="70%">'.$site_address.'</td>
           </tr>
';
if ($company_name!='') {
	$messages.= ' <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Company Name</strong></td>
             <td width="70%">'.$company_name.'</td>
           </tr>';
}

if ($required_date!='') {
	$messages.= ' <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Required Date</strong></td>
             <td width="70%">'.date("d-m-Y",strtotime($required_date)).'</td>
           </tr>';
}


if ($time_hr!='') {
	$messages.= ' <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Required Time</strong></td>
             <td width="70%">'.$required_time.'</td>
           </tr>';
}


if ($site_name!='') {
	$messages.= ' <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Site Name</strong></td>
             <td width="70%">'.$site_name.'</td>
           </tr>';
}

if ($work_description!='') {
	$messages.= ' <tr>
             <td width="5%" height="25">&nbsp;</td>
<td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Requirement</strong></td>
             <td width="70%">'.$work_description.'</td>
           </tr>';
}

if ($location!='') {
	$messages.= ' <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="25%" style=" font-size:12px; font-weight:bold;"><strong>Location</strong></td>
             <td width="70%">'.$location.'</td>
           </tr>';
}

           
   $messages.= '      </tbody>
       </table></td>
   </tr>
   <tr>
     <td>
     <table width="680" border="0" align="left" cellpadding="0" cellspacing="0">
         <tbody>
           <tr>
             <td height="40">&nbsp;</td>
             <td>Warm Regards, </td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td height="40">&nbsp;&nbsp;</td>
 <td><a href="https://pestcontrol.mistcareer.com/" target="_blank" style="color: #0d577a;"><strong> Supernova Pest Control</strong></a></td>
             <td>&nbsp;</td>
           </tr>
         </tbody>
       </table></td>
   </tr>
 </tbody>
</table>';
        $subject="Website Enquiry Details From ".$customer_name;
        $to="admin@supernovaemirates.com";
    
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'Sender: <noreply@mistcareer.com>' . "\r\n";
        $headers .= 'From: Supernova <noreply@mistcareer.com>' . "\r\n";
        $headers .= 'Reply-To: '.$customer_name.' <'.$email.'>' . "\r\n";
            
        $res1=mail($to , $subject, $messages, $headers, '-fnoreply@mistcareer.com');
       

        //echo $messages;



$insert_lead=mysqli_query($conn,"insert into leads set lead_type='Website',job_type='$Jobtype',company_name='$company_name',customer_name='$customer_name',mobile='$mobile',email='$email',required_date='$required_date',required_time='$required_time',site_name='$site_name',site_address='$site_address',work_description='$work_description',location='$location',created_datetime='$currentTime'");


if ($insert_lead) {
	$msg="Thanks for your Enquiry — we’ll be in touch soon!";
	header("Location:index.php?msg=$msg");
}else{

	$alertmsg="Please Try Again Once";
	header("Location:index.php?alertmsg=$alertmsg");
}
}
?>

<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--favicon-->
<link rel="icon" href="adminln/assets/images/Our/fav-icon-1.png" type="image/png" />
<!--plugins-->

<link href="adminln/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
<link href="adminln/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
<link href="adminln/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
<!-- loader-->
<link href="adminln/assets/css/pace.min.css" rel="stylesheet" />
<script src="adminln/assets/js/pace.min.js"></script>

<link href="adminln/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
<link href="adminln/assets/css/app.css" rel="stylesheet">
<link href="adminln/assets/css/icons.css" rel="stylesheet">
<title>Super Nova</title>
</head>

<body class="bg-img">

<div class="container-fluid">

<div class="row">

<div class="col-md-6 col-xl-7">
	
</div>

<div class="col-md-6 col-xl-5 mt-2">
	<div class="card">
<div class="card-body">
<div class="border p-3 rounded">
	<div class="mb-4 text-center">
<img src="adminln/assets/images/Our/logo.png" style="width:270px;">

</div>
<div class="text-center">

<h3 class="">Enquiry Form</h3>


</div>
<hr/>

<?if ($msg!='') {
	?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
	<span><?=$msg;?></span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
<?}?>

<?if ($alertmsg!='') {
	?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<span><?=$alertmsg;?></span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
<?}?>
<div class="form-body">
<form action="#" method="post" enctype="multipart/form-data" >
<div class="row form-label">
<div class="col-xl-12  justify-content-center">

<div class="row g-3">


<div class="col-md-6">
<label for="inputFirstName" class="form-label">Select Job Type <span class="req">*</span></label>

<select class="form-select" onchange="getjobtype()" id="job_type" name="job_type" required>
<option value="">Select Job Type</option>

<?
$select_job_type=mysqli_query($conn,"select * from job_type where status=1 order by id desc");

while($row_job_type=mysqli_fetch_array($select_job_type)){
    $Job_type=$row_job_type['job_type'];
        $job_type_id=$row_job_type['id'];
?>
<option value="<?=$Job_type?>"><?=$Job_type;?></option>

<?}?>
<option value="Others">Others</option>
</select>

<div id="othersdiv" class="mt-2" style="display: none;">
  <input type="text" name="other_job_type" placeholder="Others" id="other_job_type" class="form-control">
</div>
</div>





<div class="col-md-6">
<label for="inputFirstName" class="form-label">Contact Person Name <span class="req">*</span></label>
<input type="text" name="customer_name" class="form-control" value="" placeholder="Contact Person Name" required>
</div>
<div class="col-md-6">
<label for="inputFirstName" class="form-label">Mobile <span class="req">*</span></label>
<input type="text" name="mobile" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9" value="" placeholder=" Mobile" required>
</div>


<div class="col-md-6">
<label for="inputFirstName" class="form-label">Email Id <span class="req">*</span></label>
<input type="email" name="email" required class="form-control" value="" placeholder="Email">
</div>
<div class="col-md-6">
<label for="inputFirstName" class="form-label">Site Address <span class="req">*</span></label>
<textarea name="site_address" class="form-control" required placeholder="Site Address"></textarea>
</div>

<div class="col-md-6">
<label for="inputFirstName" class="form-label">Company Name</label>
<input type="text" name="company_name" class="form-control" value="" placeholder="Company Name">
</div>
<div class="col-md-6">
	
		<label for="inputFirstName" class="form-label">Date:</label>
<input type="date" min="<?=$currentdate;?>" name="required_date" class="form-control" value="" placeholder="date">
	

</div>


<div class="col-md-6">
	
		<label for="inputFirstName" class="form-label">Time:</label>
<div class="row timess">
<div class="col-md-4 p-0 pr-8">  
<select class="form-select pad-select noreq" name="time_hr" id="time_hr"><option value="">Hr</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
<option value="8" >8</option>
<option value="9" >9</option>
<option value="10" >10</option>
<option value="11">11</option>
<option value="12">12</option>
</select></div>
<div class="col-md-4 p-0 pr-8">  
<select class="form-select pad-select noreq" name="time_min" id="time_min">
<option value="00">00</option>
<option value="05">05</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="35">35</option>
<option value="40">40</option>
<option value="45">45</option>
<option value="50">50</option>
<option value="55">55</option>

</select></div>
<div class="col-md-4 p-0 pr-8">  
<select class="form-select pad-select noreq" name="time_am" id="time_am"><option value="AM">AM</option>
<option value="PM">PM</option>
</select>
</div>
</div>
	

</div>


<div class="col-md-6">
<label for="inputFirstName" class="form-label">Site Name</label>
<input type="text" name="site_name"  class="form-control" value="" placeholder="Site Name">
</div>


<div class="col-md-6">
<label for="inputFirstName" class="form-label">Requirement</label>
<textarea name="work_description" class="form-control" placeholder="Requirement"></textarea>
</div>

<div class="col-md-12">
<label for="inputFirstName" class="form-label">Location:</label>
<input type="url" class="form-control" name="location" placeholder="Location">
</div>



</div>




<div class="col-md-12 align-self-center mt-3 text-center">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="Book Now" >
</div>


      


</div>
</div>
</div>
</div>

</form>	

</div>
</div>
</div>

</div>

</div>

<script src="adminln/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="adminln/assets/js/jquery.min.js"></script>
<script src="adminln/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="adminln/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="adminln/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

<!--app JS-->
<script src="adminln/assets/js/app.js"></script>


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


</script>
</body>

</html>