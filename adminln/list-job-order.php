<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$url_Status=$_GET['status'];
if ($url_Status!='') {
$url_subqry="and status=$url_Status";
}else{
	$url_subqry="";
}

if($from_date!='' && $end_date!=''){
  $from_date=$from_date;
  $end_date=$end_date;
}else{
$from_date=date('Y-m-01');
$end_date=date('Y-m-t');
}
if ($url_Status=="") {
  

if ($search_customer_id!='') {
$subqry.="and customer_id='$search_customer_id'";
}

if ($quote_status!='') {
$subqry.="and status='$quote_status'";
}
$subqry.="and  (date(job_date) between '".$from_date."' and '".$end_date."')";
}


if ($Submit=='Update Supervisor') {
	$select_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");

$row_supervisor=mysqli_fetch_array($select_supervisor);

$supervisor_name=$row_supervisor['name'];
 $job_time=$time_hr.":".$time_min." ".$time_am;


	$update_job_order=mysqli_query($conn,"update job_order set location='$location',job_date='$job_date',job_time='$job_time',supervisor_id='$supervisor_id',supervisor_name='$supervisor_name' where id='$MainId'");

	if ($update_job_order) {
	  $msg='Job Order Updated Successfully';
header("Location:list-job-order.php?msg=$msg");
}else{
   $alert_msg='Job Order Not Updated'; 
   header("Location:list-job-order.php?alert_msg=$alert_msg");
}
	
}


if ($Submit=='Update') {

if(count($technician) > 1){ $technician_str =implode(',' , $technician); }else{ $technician_str =$technician[0]; }
$technician_count=count($technician);


$delete_old_tech=mysqli_query($conn,"delete from technician_log where job_order_id='$MainId'");

	for ($i=0; $i <$technician_count ; $i++) { 
		   $tech_id = $technician[$i];
		$select_technician=mysqli_query($conn,"select * from user where Id='$tech_id' ");
			$row_single_tech=mysqli_fetch_array($select_technician);
  $technician_name = $row_single_tech['name'];
  $technician_mobile = $row_single_tech['UserName'];
    
    $insert_technician=mysqli_query($conn,"insert into technician_log set job_order_id='$MainId',supervisor_id='$supervisor_id',technician_id='$tech_id',technician_name='$technician_name',technician_mobile='$technician_mobile',created_datetime='$currentTime'");

	}




$update_job_order=mysqli_query($conn,"update job_order set status=1 where id='$MainId'");

	if ($update_job_order) {
	  $msg='Job Order Updated Successfully';
header("Location:list-job-order.php?msg=$msg");
}else{
   $alert_msg='Job Order Not Updated'; 
   header("Location:list-job-order.php?alert_msg=$alert_msg");
}
}

if ($feedback=='Send') {
	
$select_feedback_job_order=mysqli_query($conn,"select * from job_order where id='$MainId'");

$row_feedback=mysqli_fetch_array($select_feedback_job_order);
$supervisor_id=$row_feedback['supervisor_id'];

$customer_id=$row_feedback['customer_id'];
$select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
$row_customer=mysqli_fetch_array($select_customer);
$customer_name=$row_customer['customer_name'];
$customer_email=$row_customer['email'];
 $jobid=encrypt_decrypt('encrypt',$MainId);
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
             <td colspan="2" align="left" style="color:#0d577a;font-size:16px;font-weight:bold"><strong>Hello '.$customer_name.', </strong></td>
           </tr>        
           <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="30%" style=" font-size:14px; line-height:22px;">Thank you for choosing Supernova for your recent pest control service.
We hope our service met your expectations and helped create a safer, pest-free environment at your site.</td>
           </tr>
           <tr>
             <td width="5%" height="30">&nbsp;&nbsp;</td>
             <td width="30%" style=" font-size:14px; line-height:22px;padding-top:10px;"><b>Please Share Your Feedback, which helps us improve and serve you better.</b></td>
           </tr>
           <tr>
             <td width="5%" height="30">&nbsp;&nbsp;</td>
             <td width="30%" style=" font-size:14px; line-height:22px;padding-top:10px;"><b><a href="https://pestcontrol.mistcareer.com/customer-feedback.php?job_order_id='.$jobid.'" target="_blank">Click Here</a> </b></td>
           </tr>';


$messages.='<tr>
            <td width="5%" height="30">&nbsp;&nbsp;</td>
             <td width="30%" style=" font-size:14px; line-height:22px;padding-top:10px;"><b>Best regards,</b></td>
           </tr>
           <tr>
            <td width="5%" height="30">&nbsp;&nbsp;</td>
             <td width="30%" style=" font-size:14px; line-height:22px;padding-top:10px;"><a href="https://pestcontrol.mistcareer.com/" target="_blank" style="color: #0d577a;"><strong> Supernova Pest Control</strong></a></td>
           </tr>
            </tbody>
       </table>';

      $subject="Feedback for Recent Pest Control Service ";
        $to=$customer_email;
    
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'Sender: <noreply@mistcareer.com>' . "\r\n";
        $headers .= 'From: Supernova <noreply@mistcareer.com>' . "\r\n";

        $headers .= 'Reply-To: Supernova <noreply@mistcareer.com>' . "\r\n";
        $headers .= 'Bcc:'.'info@supernovaemirates.com'. "\r\n";
            
        $res1=mail($to , $subject, $messages, $headers, '-fnoreply@mistcareer.com');

//echo $messages;
if ($res1) {
	 $msg = 'Feedback Mail Sent Successfully';
header('Location:list-job-order.php?msg='.$msg);
}else{
 $alert_msg = 'Feedback Mail Not Sent';
 header('Location:list-job-order.php?alert_msg='.$alert_msg);
}

}


if ($feedback=='Post') {
  
$select_feedback_job_order=mysqli_query($conn,"select * from job_order where id='$MainId'");

$row_feedback=mysqli_fetch_array($select_feedback_job_order);

$supervisor_id=$row_feedback['supervisor_id'];

$customer_id=$row_feedback['customer_id'];
$select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
$row_customer=mysqli_fetch_array($select_customer);
$customer_name=$row_customer['customer_name'];
$customer_email=$row_customer['email'];
 $jobid=encrypt_decrypt('encrypt',$MainId);
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
             <td colspan="2" align="left" style="color:#0d577a;font-size:16px;font-weight:bold"><strong>Hello '.$customer_name.', </strong></td>
           </tr>';

  $insert_feedback=mysqli_query($conn,"insert into feedback set job_order_id='$MainId',supervisor_id='$supervisor_id',ratings='$rating',description='$description',created_datetime='$currentTime'");
    $update_job_order=mysqli_query($conn,"update job_order set feedback_posted=1 where id='$MainId'");
  $messages.= '         
           <tr>
             <td width="5%" height="25">&nbsp;</td>
             <td width="30%" style=" font-size:14px; line-height:22px;"><b>Thank you for sharing your valuable feedback. Your input helps us improve and continue providing the best service possible.</b></td>
           </tr>
          ';



$messages.='<tr>
            <td width="5%" height="30">&nbsp;&nbsp;</td>
             <td width="30%" style=" font-size:14px; line-height:22px;padding-top:10px;"><b>Best regards,</b></td>
           </tr>
           <tr>
            <td width="5%" height="30">&nbsp;&nbsp;</td>
             <td width="30%" style=" font-size:14px; line-height:22px;padding-top:10px;"><a href="https://pestcontrol.mistcareer.com/" target="_blank" style="color: #0d577a;"><strong> Supernova Pest Control</strong></a></td>
           </tr>
            </tbody>
       </table>';

      $subject="Feedback for Recent Pest Control Service ";
        $to=$customer_email;
    
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'Sender: <noreply@mistcareer.com>' . "\r\n";
        $headers .= 'From: '.$customer_name.' <noreply@mistcareer.com>' . "\r\n";
        $headers .= 'Reply-To: '.$customer_name.' <'.$email.'>' . "\r\n";
        $headers .= 'Bcc:'.'info@supernovaemirates.com'. "\r\n";
            
        $res1=mail($to , $subject, $messages, $headers, '-fnoreply@mistcareer.com');

//echo $messages;
if ($res1) {
   $msg = 'Feedback Mail Sent Successfully';
header('Location:list-job-order.php?msg='.$msg);
}else{
 $alert_msg = 'Feedback Mail Not Sent';
header('Location:list-job-order.php?alert_msg='.$alert_msg);
}

}
?>


<script src="crop/jquery.min.js"></script>  
<script src="crop/bootstrap.min.js"></script>
<script src="crop/croppie.js"></script>
<link rel="stylesheet" href="crop/croppie.css"/>


<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<h5 class="mb-0 text-dark">Manage Job Order</h5>
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

<form method="POST">
<div class="row g-3 mb-5">

<div class="col-md-3">

  <div class="mb-10">
<label for="inputAddress" class="form-label width-100">Status</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="quote_status" id="inlineRadio0" value="" <?if ($quote_status=='') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio0">All</label>

</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="quote_status" id="inlineRadio1" value="0" <?if ($quote_status=='0') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio1">Pending</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="quote_status" id="inlineRadio2" value="1" <?if ($quote_status=='1') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio2">Ready To Job</label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="quote_status" id="inlineRadio3" value="2" <?if ($quote_status=='2') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio3">Job in Progress</label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="quote_status" id="inlineRadio4" value="3" <?if ($quote_status=='3') {echo "checked";
}?>>
<label class="form-check-label" for="inlineRadio4">Completed</label>
</div>
</div>
  
</div>


<div class="col-md-2">
<label for="inputFirstName" class="form-label">Select Company / Customer</label>
<select class="single-select" name="search_customer_id" id="search_customer_id">
<option value="">Select Company / Customer</option> 

<?
$select_customer=mysqli_query($conn,"select * from customers where status=1");

while ($row_customer=mysqli_fetch_array($select_customer)) {

   $customer_name=$row_customer['customer_name'];
   $mobile_no=$row_customer['mobile'];
   $company_name=$row_customer['company_name'];
   $Customer_id=$row_customer['id'];
?>
<option value="<?=$Customer_id?>" <?if($search_customer_id==$Customer_id){echo "selected";}?>><?=$company_name." / ".$customer_name." - ".$mobile_no;?></option>
<?
}
?>
</select>
</div>


<div class="col-md-2">
<label for="inputFirstName" class="form-label">From</label>
<input type="date" name="from_date" class="form-control" value="<?=$from_date;?>" required>
</div>

<div class="col-md-2">
<label for="inputFirstName" class="form-label">To</label>
<input type="date" name="end_date" class="form-control" value="<?=$end_date;?>" required>
</div>


<div class="col-md-3 mt-46">
<input type="submit" name="Submit" class="btn btn-primary px-3" value="Search">
</div>

</div>
</form>




<? 
$select_job_order=mysqli_query($conn,"select * from job_order where 1=1  $subqry  $url_subqry order by created_datetime desc "); 

if(mysqli_num_rows($select_job_order)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th >Created Date</th>
<th>Company & Customer Details</th>
<th> Job Details</th>
<th>Site Details</th>
<th>Supervisor Name</th>
<th >Total Amount</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?   


$SNo = 0;
while($row_job_order=mysqli_fetch_array($select_job_order))
{ 
$SNo = $SNo + 1; 
$id=$row_job_order['id'];

$job_order_date=$row_job_order['job_order_date'];



$customer_id=$row_job_order['customer_id'];
$company_name=$row_job_order['company_name'];
$mobile=$row_job_order['customer_mobile'];

$select_customer=mysqli_query($conn,"select * from customers where mobile='$mobile'");

$row_customer=mysqli_fetch_array($select_customer);
$customer_name=$row_customer['customer_name'];


$site_name=$row_job_order['site_name'];
$is_mail_sent=$row_job_order['is_mail_sent'];
$site_address=$row_job_order['site_address'];

$total_amount=$row_job_order['total_amount'];
$job_date=date("d-m-Y",strtotime($row_job_order['job_date']));
$job_time=$row_job_order['job_time'];
$supervisor_name=$row_job_order['supervisor_name'];
$supervisor_id=$row_job_order['supervisor_id'];
$type_of_report=$row_job_order['type_of_report'];
$select_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");

$row_supervisor=mysqli_fetch_array($select_supervisor);

$supervisor_mobile=$row_supervisor['UserName'];
$location=$row_job_order['location'];
$status=$row_job_order['status'];

if($status == '3'){
$Status= '<span class="btn disabled btn-outline-success">Completed</span>';
}elseif ($status == '2') {
$Status = '<span class="btn btn-outline-primary col-fd3550 disabled">Job in Progress</span>';
}elseif($status == '1'){
$Status = '<span class="btn btn-outline-warning  col-fd3550 disabled">Ready To Job</span>';
}else{
$Status = '<span class="btn btn-outline-danger disabled col-fd3550 ">Pending</span>';
}

if($status>='1'){

$select_technician=mysqli_query($conn,"select * from technician_log where job_order_id='$id'");
$technician_name=[];

while($row_technican=mysqli_fetch_array($select_technician)){
  $technician_name[]=$row_technican['technician_name'];

}
$technician_details="Technician: ".implode(", ", $technician_name);
}else  
{
$technician_details="";
}



if ($location!='') {
$location_icon='<a href="'.$location.'" target="_blank" class="mx-2 font-16"><i class="bx bx-location-plus"></i></a>';
}else{
  $location_icon="";
}

if ($is_mail_sent==0) {
	$mail_btn= '<a href="job-order-report-mail.php?id='.$id.'&act=print" tooltip="Send Mail" class="btn btn-add ms-3 btn-sm"><i class="lni lni-envelope"></i></a>';
}else
{
    $mail_btn= '';
}




if ($type_of_report!=1) {
  $report_url="export-pestcontrol-report.php?id=$id";
  $select_report=mysqli_query($conn,"select * from pestcontrol_report where job_order_id='$id'");
}else{
    $report_url="export-watertank-report.php?id=$id";
    $select_report=mysqli_query($conn,"select * from watertank_report where job_order_id='$id'");
}
$select_feedback=mysqli_query($conn,"select * from feedback where job_order_id='$id'");



if (mysqli_num_rows($select_feedback)==0 && $status==3) {
	$feedback_btn='<a href="" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onclick="feedback('.$id.')"  class="btn btn-add btn-sm ms-3" tooltip="Add Feedback"><i class="bx bxs-message-detail"></i></a>';
}else{
$feedback_btn='';
}
?>
<tr>

<td class="d-none"><?=$SNo; ?></td>
<td>
<p class="mb-0"> <?=date('d-m-Y',strtotime($job_order_date));?></p>
</td>

<td><?=$company_name; ?><p class="mt-1"><?=$customer_name. " - "."+971 ".$mobile; ?></p></td>
<td><p class="mb-0 ">Job Date: <?=$job_date;?></p><p class="mt-1 ">Job Time: <?=$job_time;?></p></td>
<td><p class="mb-0"> <?=$site_name; ?></p>
<p class="mb-0"> <? echo wordwrap($site_address, 30, "<br />\n"); ?><?=$location_icon;?></p></td>
<td><p class="mb-0"> <?=$supervisor_name." - ".$supervisor_mobile; ?> 	<? if ($status==0) {
	
?>
<a href="" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onclick="editjoborder('<?=$id;?>')"  class="btn btn-add btn-sm" tooltip="Edit Supervisor"><i class="bx bxs-edit"></i></a>
<?}?></p> <p class="mb-0 mt-1">  <?=$technician_details; ?>


<?if ($status<=1) {?>
<a href="" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" onclick="addtechnician('<?=$id;?>','<?=$formatted_SNo;?>')"   class="btn btn-add btn-sm" tooltip="Add Technician"><i class="bx bxs-user-rectangle"></i></a>
	<?}?></p>

<td>AED <?=$total_amount;?></td>
<td>
<?=$Status; ?>
</td>


<td>
	<div class="order-actions">
		
	
<div class="d-flex">

<a href="view-job-order.php?id=<?=$id; ?>" class="btn btn-add ms-3 btn-sm" tooltip="View"><i class="lni lni-eye"></i></a>
<?
if ($status==3 && mysqli_num_rows($select_report)>>0) {
?>
<a href="<?=$report_url;?>" target="_blank"  class="btn btn-add btn-sm ms-3" tooltip="Print"><i class="bx bxs-printer"></i></a>
<?}?>

</div>
<div class="d-flex  mt-2">
  <?
if ($status==3 && mysqli_num_rows($select_report)>>0) {
?>
<?=$mail_btn;?>
<?}?>
<?=$feedback_btn;?>
</div>

</div>
</td>
</tr>
<? }}else{ echo "<p>No Record Found</p>";} ?>
</tbody>
</table>
</div>
</div>
</div>







<div class="modal fade" id="exampleExtraLargeModal" tabindex="1" aria-hidden="false">
<div class="modal-dialog modal-md p-5">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body p-5">
<div class="card border-top border-0 border-4 border-primary">
<div class="card-body p-5">

<div id="output">
	
</div>
   


</div>

</div>
</div>
</div> 



<script>
	
	function feedback(val){
$.ajax({
url: "ajax-modal.php", 
type: "POST",
data: "id="+val+"&act=feedback",
success: function(result){
$("#output").html(result);
}
	});
	}



	function addtechnician(val,sno){

$.ajax({
url: "ajax-add-techinican.php", 
type: "POST",
data: "id="+val+"&sno="+sno,
success: function(result){
$("#output").html(result);
}
	});
}
	function editjoborder(val){

$.ajax({
url: "ajax-edit-job-order.php", 
type: "POST",
data: "id="+val,
success: function(result){
$("#output").html(result);
}
	});
}
</script>
<?php
}
include 'template.php';
?>