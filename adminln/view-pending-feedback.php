<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');

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
header('Location:view-pending-feedback.php?msg='.$msg);
}else{
 $alert_msg = 'Feedback Mail Not Sent';
header('Location:view-pending-feedback.php?alert_msg='.$alert_msg);
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
header('Location:view-customer-feedback.php?msg='.$msg);
}else{
 $alert_msg = 'Feedback Mail Not Sent';
header('Location:view-pending-feedback.php?alert_msg='.$alert_msg);
}

}
?>


<script src="crop/jquery.min.js"></script>  
<script src="crop/bootstrap.min.js"></script>
<script src="crop/croppie.js"></script>
<link rel="stylesheet" href="crop/croppie.css"/>


<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<h5 class="mb-0 text-dark">Pending Feedback</h5>
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




<? 
$select_job_order=mysqli_query($conn,"select * from job_order where 1=1 and status=3 and feedback_posted!=1 order by id desc "); 

if(mysqli_num_rows($select_job_order)>>0){ ?>
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<!-- <th>Date</th> -->
<th class="d-none">SNo</th>
<th>Company & Customer Details</th>
<th> Job Details</th>
<th>Site Details</th>
<th>Supervisor Name</th>
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

$select_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");

$row_supervisor=mysqli_fetch_array($select_supervisor);

$supervisor_mobile=$row_supervisor['UserName'];
$location=$row_job_order['location'];
$status=$row_job_order['status'];



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
	
	$mail_btn= '<a href="job-order-mail.php?id='.$id.'&act=print" tooltip="Send Mail" class="btn btn-add ms-3 btn-sm"><i class="lni lni-envelope"></i></a>';
}else{
	$mail_btn= '<a href="javascript:void(0);" tooltip="Mail Sent" class="btn btn-add ms-3 btn-sm"><i class="lni lni-envelope"></i></a>';
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


<td><?=$company_name; ?><p class="mt-1"><?=$customer_name. " - "."+971 ".$mobile; ?></p></td>
<td><p class="mb-0 ">Job Date: <?=$job_date;?></p><p class="mt-1 ">Job Time: <?=$job_time;?></p></td>
<td><p class="mb-0"> <?=$site_name; ?></p>
<p class="mb-0"> <? echo wordwrap($site_address, 50, "<br />\n"); ?><?=$location_icon;?></p></td>
<td><p class="mb-0"> <?=$supervisor_name." - ".$supervisor_mobile; ?> 	</p> <p class="mb-0 mt-1">  <?=$technician_details; ?>
</p>

<td>
	<div class="order-actions">
		
	
<div class="d-flex">



</div>
<div class="d-flex  mt-2">
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
	
</script>
<?php
}
include 'template.php';
?>