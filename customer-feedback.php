<?php
ob_start();
ob_clean();
session_start();
extract($_REQUEST);
include 'adminln/dilg/cnt/join.php';
include 'adminln/global-functions.php';
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$jobid=$_GET['job_order_id'];

$job_order_id=encrypt_decrypt('decrypt',$jobid);
$currentdate = date('Y-m-d');

$select_feedback_main=mysqli_query($conn,"select * from feedback where job_order_id='$job_order_id'");

$select_job_order=mysqli_query($conn,"select * from job_order where id='$job_order_id'");

if (mysqli_num_rows($select_feedback_main)>>0 && mysqli_num_rows($select_job_order)==0) {
  header("Location:index.php");
}
if ($Submit=='Post') {
$select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
$row_customer=mysqli_fetch_array($select_customer);
$customer_name=$row_customer['customer_name'];
$customer_email=$row_customer['email'];
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
';


	$insert_feedback=mysqli_query($conn,"insert into feedback set job_order_id='$job_order_id',supervisor_id='$supervisor_id',ratings='$rating',description='$description',created_datetime='$currentTime'");

  $update_job_order=mysqli_query($conn,"update job_order set feedback_posted=1 where id='$job_order_id'");

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
        $headers .= 'From: '.'Supernova Pest Control'.' <noreply@mistcareer.com>' . "\r\n";
        $headers .= 'Reply-To: '.$customer_name.' <'.$email.'>' . "\r\n";
            $headers .= 'Bcc:'.'info@supernovaemirates.com'. "\r\n";
        $res1=mail($to , $subject, $messages, $headers, '-fnoreply@mistcareer.com');

//echo $messages;
if ($res1 && $insert_feedback) {
header('Location:thank-you.php');
}else{
 $alert_msg = 'Feedback Not Submited';
header('Location:customer-feedback.php?alertmsg='.$alert_msg);
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

<body>

<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-12 col-xl-7 mt-2 d-flex justify-content-center">
	<div class="card">
<div class="card-body">
<div class="border p-3 rounded">
	<div class="mb-4 text-center">
<img src="adminln/assets/images/Our/logo.png" style="width:270px;">

</div>
<div class="text-center">

<h3 class="">Job Order Feedback Form</h3>


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

<?
$sel_rows=mysqli_query($conn,"select * from job_order where id='$job_order_id' ");
$rows_R = mysqli_fetch_object($sel_rows);

foreach($rows_R as $K1=>$V1) $$K1 = $V1;


?>
<div class="form-body">
<form action="#" method="post" enctype="multipart/form-data" >
<div class="row form-label">
<div class="col-xl-12  justify-content-center">

<div class="row g-3">
<input type="hidden" name="supervisor_id" value="<?=$supervisor_id?>">

<input type="hidden" name="customer_id" value="<?=$customer_id?>">

<div class="col-md-12 ">
<h4>Job Details:</h4>
<p>Site Name: <b><?=$site_name;?></b></p>
<p>Site Address: <b><?=$site_address;?></b></p>

<p>Job Date: <b><?=date("d-m-Y",strtotime($job_date));?></b></p>
<p>Job Time: <b><?=$job_time;?></b></p>

</div>
<div class="col-md-12 mt-0">

	<div class="d-flex">
			<label for="inputAddress" class="form-label me-3 align-self-center" >Ratings</label>
		<div class="star-rating">

            <input type="radio" id="star5" required class="rating-star" name="rating" value="5">
            <label for="star5"><i class="bx bxs-star"></i></label>

            <input type="radio" id="star4" required class="rating-star" name="rating" value="4">
            <label for="star4"><i class="bx bxs-star"></i></label>

            <input type="radio" id="star3" required class="rating-star" name="rating" value="3">
            <label for="star3"><i class="bx bxs-star"></i></label>

            <input type="radio" id="star2" required class="rating-star" name="rating" value="2">
            <label for="star2"><i class="bx bxs-star"></i></label>

            <input type="radio" id="star1" required class="rating-star" name="rating" value="1">
            <label for="star1"><i class="bx bxs-star"></i></label>


        </div>
		</div>
	</div>

	<div class="col-md-8 mt-2 mt-3">
<label for="" class="form-label">Customer Feedback:</label>
<textarea type="text" required name="description" rows=6 id="description" class="form-control rating-star" placeholder="Customer Feedback:" ><?=$description;?></textarea>
</div>




</div>




<div class="col-md-12 align-self-center mt-3">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="Post" >
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
</body>

</html>