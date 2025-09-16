<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
$Act=$_GET['act'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$currentdate = date('Y-m-d');

function compressImage($source, $destination, $quality) { 
$imgInfo = getimagesize($source); 
$mime = $imgInfo['mime']; 
switch($mime){ 
case 'image/jpeg': 
$image = imagecreatefromjpeg($source); 
break; 
case 'image/png': 
$image = imagecreatefrompng($source); 
break; 
case 'image/webp':
$image = imagecreatefromwebp($source);
break;
case 'image/gif': 
$image = imagecreatefromgif($source); 
break; 
default: 
$image = imagecreatefromjpeg($source); 
} 
imagejpeg($image, $destination, $quality); 
return $destination; 
}

function convert_filesize($bytes, $decimals = 2) { 
$size = array('B','KB','MB','GB','TB','PB','EB','ZB','YB'); 
$factor = floor((strlen($bytes) - 1) / 3); 
return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor]; 
}


if ($Submit=="Update Job") {

    $select_deatils=mysqli_query($conn,"select * from job_order_details where job_order_id='$ID'");
if ($_FILES['inspection_image1']['name']!='') {
$inspection_filename1 = $_FILES['inspection_image1']['name'];
$inspection_filesize1 = $_FILES['inspection_image1']['size'];
$inspection_ext1 = strtolower(substr(strrchr($inspection_filename1, "."), 1));
$inspection_image_size1 = ($inspection_filesize1 / 1024);
if($inspection_ext1 == 'jpg' or $inspection_ext1 == 'jpeg' or $inspection_ext1 == 'png' or $inspection_ext1 == 'webp'){
$inspection_path1 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$inspection_filename1);
$inspection_image_path1 = "uploads/job-inspection-images/".$inspection_path1;
$inspection_compressedImage1 = compressImage($_FILES["inspection_image1"]["tmp_name"], $inspection_image_path1, 30); 
chmod($inspection_image_path1,0777);
$inspection_imgqry .= "inspection_image1 = '".$inspection_path1."'";
}
}


if ($_FILES['inspection_image2']['name']!='') {
$inspection_filename2 = $_FILES['inspection_image2']['name'];
$inspection_filesize2 = $_FILES['inspection_image2']['size'];
$inspection_ext2 = strtolower(substr(strrchr($inspection_filename2, "."), 1));
$inspection_image_size2 = ($inspection_filesize2 / 1024);
if($inspection_ext2 == 'jpg' or $inspection_ext2 == 'jpeg' or $inspection_ext2 == 'png' or $inspection_ext2 == 'webp')
{
$inspection_path2 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$inspection_filename2);
$inspection_image_path2 = "uploads/job-inspection-images/".$inspection_path2;
$inspection_compressedImage2 = compressImage($_FILES["inspection_image2"]["tmp_name"], $inspection_image_path2, 30); 
chmod($inspection_image_path2,0777);
$inspection_imgqry .= ", inspection_image2 = '".$inspection_path2."'";
}
}

if ($_FILES['inspection_image3']['name']!='') {
$inspection_filename3 = $_FILES['inspection_image3']['name'];
$inspection_filesize3 = $_FILES['inspection_image3']['size'];
$inspection_ext3 = strtolower(substr(strrchr($inspection_filename3, "."), 1));
$inspection_image_size3 = ($inspection_filesize3 / 1024);
if($inspection_ext3 == 'jpg' or $inspection_ext3 == 'jpeg' or $inspection_ext3 == 'png' or $inspection_ext3 == 'webp')
{
$inspection_path3 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$inspection_filename3);
$inspection_image_path3 = "uploads/job-inspection-images/".$inspection_path3;
$inspection_compressedImage3 = compressImage($_FILES["inspection_image3"]["tmp_name"], $inspection_image_path3, 30); 
chmod($inspection_image_path3,0777);
$inspection_imgqry .= ", inspection_image3 = '".$inspection_path3."'";
}
}


if ($_FILES['inspection_image4']['name']!='') {
$inspection_filename4 = $_FILES['inspection_image4']['name'];
$inspection_filesize4 = $_FILES['inspection_image4']['size'];
$inspection_ext4 = strtolower(substr(strrchr($inspection_filename4, "."), 1));
$inspection_image_size5 = ($inspection_filesize4 / 1024);
if($inspection_ext4 == 'jpg' or $inspection_ext4 == 'jpeg' or $inspection_ext4 == 'png' or $inspection_ext4 == 'webp')
{
$inspection_path4 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$inspection_filename4);
$inspection_image_path4 = "uploads/job-inspection-images/".$inspection_path4;
$inspection_compressedImage4 = compressImage($_FILES["inspection_image4"]["tmp_name"], $inspection_image_path4, 30); 
chmod($inspection_image_path4,0777);
$inspection_imgqry .= ", inspection_image4 = '".$inspection_path4."'";
}
}
if ($_FILES['inspection_image5']['name']!='') {
$inspection_filename5 = $_FILES['inspection_image5']['name'];
$inspection_filesize5 = $_FILES['inspection_image5']['size'];
$inspection_ext5 = strtolower(substr(strrchr($inspection_filename5, "."), 1));
$inspection_image_size5 = ($inspection_filesize5 / 1024);
if($inspection_ext5 == 'jpg' or $inspection_ext5 == 'jpeg' or $inspection_ext5 == 'png' or $inspection_ext5 == 'webp'){
$inspection_path5 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$inspection_filename5);
$inspection_image_path5 = "uploads/job-inspection-images/".$inspection_path5;
$inspection_compressedImage5 = compressImage($_FILES["inspection_image5"]["tmp_name"], $inspection_image_path5, 30); 
chmod($inspection_image_path5,0777);
$inspection_imgqry .= ", inspection_image5 = '".$inspection_path5."'";
}
}




    if ($_FILES['image1']['name']!='') {
$filename1 = $_FILES['image1']['name'];
$filesize1 = $_FILES['image1']['size'];
$ext1 = strtolower(substr(strrchr($filename1, "."), 1));
$image_size1 = ($filesize1 / 1024);
if($ext1 == 'jpg' or $ext1 == 'jpeg' or $ext1 == 'png' or $ext1 == 'webp'){
$path1 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename1);
$image_path1 = "uploads/before-images/".$path1;
$compressedImage4 = compressImage($_FILES["image1"]["tmp_name"], $image_path1, 75); 
chmod($image_path1,0777);
$imgqry .= "before_image1 = '".$path1."'";
}
}

if ($_FILES['image2']['name']!='') {
$filename2 = $_FILES['image2']['name'];
$filesize2 = $_FILES['image2']['size'];
$ext2 = strtolower(substr(strrchr($filename2, "."), 1));
$image_size2 = ($filesize2 / 1024);
if($ext2 == 'jpg' or $ext2 == 'jpeg' or $ext2 == 'png' or $ext2 == 'webp')
{
$path2 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename2);
$image_path2 = "uploads/before-images/".$path2;
$compressedImage4 = compressImage($_FILES["image2"]["tmp_name"], $image_path2, 75); 
chmod($image_path2,0777);
$imgqry .= ", before_image2 = '".$path2."'";
}
}

if ($_FILES['image3']['name']!='') {
$filename3 = $_FILES['image3']['name'];
$filesize3 = $_FILES['image3']['size'];
$ext3 = strtolower(substr(strrchr($filename3, "."), 1));
$image_size3 = ($filesize3 / 1024);
if($ext3 == 'jpg' or $ext3 == 'jpeg' or $ext3 == 'png' or $ext3 == 'webp')
{
$path3 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename3);
$image_path3 = "uploads/before-images/".$path3;
$compressedImage4 = compressImage($_FILES["image3"]["tmp_name"], $image_path3, 75); 
chmod($image_path3,0777);
$imgqry .= ", before_image3 = '".$path3."'";
}
}
if ($_FILES['image4']['name']!='') {
$filename4 = $_FILES['image4']['name'];
$filesize4 = $_FILES['image4']['size'];
$ext4 = strtolower(substr(strrchr($filename4, "."), 1));
$image_size5 = ($filesize4 / 1024);
if($ext4 == 'jpg' or $ext4 == 'jpeg' or $ext4 == 'png' or $ext4 == 'webp')
{
$path4 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename4);
$image_path4 = "uploads/before-images/".$path4;
$compressedImage4 = compressImage($_FILES["image4"]["tmp_name"], $image_path4, 75); 
chmod($image_path4,0777);
$imgqry .= ", before_image4 = '".$path4."'";
}
}

if ($_FILES['image5']['name']!='') {
$filename5 = $_FILES['image5']['name'];
$filesize5 = $_FILES['image5']['size'];
$ext5 = strtolower(substr(strrchr($filename5, "."), 1));
$image_size5 = ($filesize5 / 1024);
if($ext5 == 'jpg' or $ext5 == 'jpeg' or $ext5 == 'png' or $ext5 == 'webp')
{
$path5 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename5);
$image_path5 = "uploads/before-images/".$path5;
$compressedImage5 = compressImage($_FILES["image5"]["tmp_name"], $image_path5, 75); 
chmod($image_path5,0777);
$imgqry .= ", before_image5 = '".$path5."'";
}
}

if ($_FILES['service_image1']['name']!='') {
$servicefilename1 = $_FILES['service_image1']['name'];
$servicefilesize1 = $_FILES['service_image1']['size'];
$service_ext1 = strtolower(substr(strrchr($servicefilename1, "."), 1));
$service_image_size1 = ($servicefilesize1 / 1024);
if($service_ext1 == 'jpg' or $service_ext1 == 'jpeg' or $service_ext1 == 'png' or $service_ext1 == 'webp'){
$service_path1 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$servicefilename1);
$service_image_path1 = "uploads/service-images/".$service_path1;
$service_compressedImage4 = compressImage($_FILES["service_image1"]["tmp_name"], $service_image_path1, 75); 
chmod($service_image_path1,0777);
$service_imgqry .= "service_image1 = '".$service_path1."'";
}
}


if ($_FILES['service_image2']['name']!='') {
$servicefilename2 = $_FILES['service_image2']['name'];
$servicefilesize2 = $_FILES['service_image2']['size'];
$service_ext2 = strtolower(substr(strrchr($servicefilename2, "."), 1));
$service_image_size2 = ($servicefilesize2 / 1024);
if($service_ext2 == 'jpg' or $service_ext2 == 'jpeg' or $service_ext2 == 'png' or $service_ext2 == 'webp')
{
$service_path2 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$servicefilename2);
$service_image_path2 = "uploads/service-images/".$service_path2;
$service_compressedImage4 = compressImage($_FILES["service_image2"]["tmp_name"], $service_image_path2, 75); 
chmod($service_image_path2,0777);
$service_imgqry .= ", service_image2 = '".$service_path2."'";
}
}

if ($_FILES['service_image3']['name']!='') {
$servicefilename3 = $_FILES['service_image3']['name'];
$servicefilesize3 = $_FILES['service_image3']['size'];
$service_ext3 = strtolower(substr(strrchr($servicefilename3, "."), 1));
$service_image_size3 = ($servicefilesize3 / 1024);
if($service_ext3 == 'jpg' or $service_ext3 == 'jpeg' or $service_ext3 == 'png' or $service_ext3 == 'webp')
{
$service_path3 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$servicefilename3);
$service_image_path3 = "uploads/service-images/".$service_path3;
$service_compressedImage4 = compressImage($_FILES["service_image3"]["tmp_name"], $service_image_path3, 75); 
chmod($service_image_path3,0777);
$service_imgqry .= ", service_image3 = '".$service_path3."'";
}
}
if ($_FILES['service_image4']['name']!='') {
$servicefilename4 = $_FILES['service_image4']['name'];
$servicefilesize4 = $_FILES['service_image4']['size'];
$service_ext4 = strtolower(substr(strrchr($servicefilename4, "."), 1));
$service_image_size5 = ($servicefilesize4 / 1024);
if($service_ext4 == 'jpg' or $service_ext4 == 'jpeg' or $service_ext4 == 'png' or $service_ext4 == 'webp')
{
$service_path4 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$servicefilename4);
$service_image_path4 = "uploads/service-images/".$service_path4;
$service_compressedImage4 = compressImage($_FILES["service_image4"]["tmp_name"], $service_image_path4, 75); 
chmod($service_image_path4,0777);
$service_imgqry .= ", service_image4 = '".$service_path4."'";
}
}

if ($_FILES['service_image5']['name']!='') {
$servicefilename5 = $_FILES['service_image5']['name'];
$servicefilesize5 = $_FILES['service_image5']['size'];
$service_ext5 = strtolower(substr(strrchr($servicefilename5, "."), 1));
$service_image_size5 = ($servicefilesize5 / 1024);
if($service_ext5 == 'jpg' or $service_ext5 == 'jpeg' or $service_ext5 == 'png' or $service_ext5 == 'webp')
{
$service_path5 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$servicefilename5);
$service_image_path5 = "uploads/service-images/".$service_path5;
$service_compressedImage5 = compressImage($_FILES["service_image5"]["tmp_name"], $service_image_path5, 75); 
chmod($service_image_path5,0777);
$service_imgqry .= ", service_image5 = '".$service_path5."'";
}
}



    if ($job_status==1) {  
$update_job_order=mysqli_query($conn,"update job_order set  status=2 where id='$ID'");
$technician_count=count($technician_id);
for ($i=0; $i <$technician_count ; $i++) { 
  $clock_in_time=$time_hr[$i].":".$time_min[$i]." ".$time_am[$i];
$clock_in_date=$clockin[$i];
$technician_Id=$technician_id[$i];
$update_technician=mysqli_query($conn,"update technician_log set clock_in_time='$clock_in_time' where technician_id='$technician_Id' and job_order_id='$ID'");
}

}elseif ($job_status==2) {
   
if ($_FILES['after_image1']['name']!='') {
$filename1 = $_FILES['after_image1']['name'];
$filesize1 = $_FILES['after_image1']['size'];
$ext1 = strtolower(substr(strrchr($filename1, "."), 1));
$image_size1 = ($filesize1 / 1024);
if($ext1 == 'jpg' or $ext1 == 'jpeg' or $ext1 == 'png' or $ext1 == 'webp'){
$path1 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename1);
$image_path1 = "uploads/after-images/".$path1;
$compressedImage1 = compressImage($_FILES["after_image1"]["tmp_name"], $image_path1, 30); 
chmod($image_path1,0777);
$imgqry .= "after_image1 = '".$path1."'";
}
}


if ($_FILES['after_image2']['name']!='') {
$filename2 = $_FILES['after_image2']['name'];
$filesize2 = $_FILES['after_image2']['size'];
$ext2 = strtolower(substr(strrchr($filename2, "."), 1));
$image_size2 = ($filesize2 / 1024);
if($ext2 == 'jpg' or $ext2 == 'jpeg' or $ext2 == 'png' or $ext2 == 'webp')
{
$path2 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename2);
$image_path2 = "uploads/after-images/".$path2;
$compressedImage2 = compressImage($_FILES["after_image2"]["tmp_name"], $image_path2, 30); 
chmod($image_path2,0777);
$imgqry .= ", after_image2 = '".$path2."'";
}
}

if ($_FILES['after_image3']['name']!='') {
$filename3 = $_FILES['after_image3']['name'];
$filesize3 = $_FILES['after_image3']['size'];
$ext3 = strtolower(substr(strrchr($filename3, "."), 1));
$image_size3 = ($filesize3 / 1024);
if($ext3 == 'jpg' or $ext3 == 'jpeg' or $ext3 == 'png' or $ext3 == 'webp')
{
$path3 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename3);
$image_path3 = "uploads/after-images/".$path3;
$compressedImage3 = compressImage($_FILES["after_image3"]["tmp_name"], $image_path3, 30); 
chmod($image_path3,0777);
$imgqry .= ", after_image3 = '".$path3."'";
}
}


if ($_FILES['after_image4']['name']!='') {
$filename4 = $_FILES['after_image4']['name'];
$filesize4 = $_FILES['after_image4']['size'];
$ext4 = strtolower(substr(strrchr($filename4, "."), 1));
$image_size5 = ($filesize4 / 1024);
if($ext4 == 'jpg' or $ext4 == 'jpeg' or $ext4 == 'png' or $ext4 == 'webp')
{
$path4 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename4);
$image_path4 = "uploads/after-images/".$path4;
$compressedImage4 = compressImage($_FILES["after_image4"]["tmp_name"], $image_path4, 30); 
chmod($image_path4,0777);
$imgqry .= ", after_image4 = '".$path4."'";
}
}

$update_job_order=mysqli_query($conn,"update job_order set  status=3 where id='$ID'");

$technician_count=count($technician_id);
for ($i=0; $i <$technician_count ; $i++) { 

  $clock_out_time=$time_out_hr[$i].":".$time_out_min[$i]." ".$time_out_am[$i];

$technician_Id=$technician_id[$i];
     $update_technician=mysqli_query($conn,"update technician_log set clock_out_time='$clock_out_time' where technician_id='$technician_Id' and job_order_id='$ID'");
}
}

if ($inspection_imgqry!='' && $imgqry!='') {
  $Imgqry=", ".$imgqry;
}else{
     $Imgqry=$imgqry;
}




if (mysqli_num_rows($select_deatils)>>0) {

    if ($service_imgqry!='' && $imgqry!='') {
  $Serviceimgqry=", ".$service_imgqry;
}else{
     $Serviceimgqry=$service_imgqry;
}


   $update_job_details=mysqli_query($conn,"update job_order_details set $imgqry  $Serviceimgqry  where job_order_id='$ID'");
   }else{
$update_job_details=mysqli_query($conn,"insert into  job_order_details set  $inspection_imgqry $Imgqry, job_order_id='$ID'");

}



if ($update_job_details || $update_job_order || $update_technician) {
$msg = 'Updated Successfully';
 header('Location:supervisor-list-job.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
header('Location:supervisor-list-job.php?alert_msg='.$alert_msg);
}


}






$select_leads=mysqli_query($conn,"select * from job_order where id='$ID'"); 
$row_leads=mysqli_fetch_array($select_leads);
foreach($row_leads as $K1=>$V1) $$K1 = $V1;


?>



<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<div class="breadcrumb-title border-0 pe-3">Update Job Order</div>

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




<?
$select_job_order_Det=mysqli_query($conn,"select * from job_order_details where job_order_id='$ID'");
$row_job_details=mysqli_fetch_array($select_job_order_Det);

$inspection_image1=$row_job_details['inspection_image1'];
$inspection_image2=$row_job_details['inspection_image2'];
$inspection_image3=$row_job_details['inspection_image3'];
$inspection_image4=$row_job_details['inspection_image4'];
$inspection_image5=$row_job_details['inspection_image5'];
$inspection_description=$row_job_details['inspection_description'];

$before_image1=$row_job_details['before_image1'];
$before_image2=$row_job_details['before_image2'];
$before_image3=$row_job_details['before_image3'];
$before_image4=$row_job_details['before_image4'];
$before_image5=$row_job_details['before_image5'];

$after_image1=$row_job_details['after_image1'];
$after_image2=$row_job_details['after_image2'];
$after_image3=$row_job_details['after_image3'];
$after_image4=$row_job_details['after_image4'];
$after_image5=$row_job_details['after_image5'];


$service_image1=$row_job_details['service_image1'];
$service_image2=$row_job_details['service_image2'];
$service_image3=$row_job_details['service_image3'];
$service_image4=$row_job_details['service_image4'];
$service_image5=$row_job_details['service_image5'];
    ?>
    <?if($inspection_image1!=''){?>
<div class="row g-3">
<div class="col-md-12 me-5">
    
<label class="form-label">Inspection Images: </label>
<div class="row">
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/job-inspection-images/<?=$inspection_image1;?>" class="btn-gallery">
<img src="uploads/job-inspection-images/<?=$inspection_image1;?>" width="100px" class="mt-3"></a></p> 
</div>
<?if($inspection_image2!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/job-inspection-images/<?=$inspection_image2;?>" class="btn-gallery">
<img src="uploads/job-inspection-images/<?=$inspection_image2;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($inspection_image3!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/job-inspection-images/<?=$inspection_image3;?>" class="btn-gallery">
<img src="uploads/job-inspection-images/<?=$inspection_image3;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($inspection_image4!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/job-inspection-images/<?=$inspection_image4;?>" class="btn-gallery">
<img src="uploads/job-inspection-images/<?=$inspection_image4;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($inspection_image5!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/job-inspection-images/<?=$inspection_image5;?>" class="btn-gallery">
<img src="uploads/job-inspection-images/<?=$inspection_image5;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($inspection_description!=''){?>
<label class="form-label mt-3">Inspection Description: </label>
<p ><?=$inspection_description;?></p>

<?}?>
</div>
</div>

</div>
<?}else{?>

    
    <div class="row g-3 mt-3">


<div class="col-md-3 me-5">
<label class="form-label">Inspection Image 1: </label>
<input type="file" required name="inspection_image1" id="inspection_image1" class="form-control">
</div>

<div class="col-md-3 me-5">
<label class="form-label">Inspection Image 2: </label>
<input type="file" name="inspection_image2" class="form-control">
</div>

<div class="col-md-3 me-5">
<label class="form-label">Inspection Image 3: </label>
<input type="file" name="inspection_image3" class="form-control">
</div>

<div class="col-md-3 me-5">
<label class="form-label">Inspection Image 4: </label>
<input type="file" name="inspection_image4" class="form-control">
</div>


<div class="col-md-3 me-5">
<label class="form-label">Inspection Image 5: </label>
<input type="file" name="inspection_image5" class="form-control">
</div>


<div class="col-md-3 me-5">
<label class="form-label">Inspection Description: </label>
<textarea  name="inspection_description" placeholder="Inspection Description" id="inspection_description" class="form-control"></textarea>
</div>

</div>
<hr>
    <?}?>


<? if($before_image1=='' ){?>


<div class="row g-3">
<h6>Before Images:</h6>
<div class="col-md-3 me-5">
<label class="form-label">Before Image 1: </label>
<input type="file" <? if($type_of_report!='0' ){echo "required";}?> name="image1" class="form-control">
</div>
<div class="col-md-3 me-5">
<label class="form-label">Before Image 2: </label>
<input type="file" name="image2" class="form-control">
</div>

<div class="col-md-3 me-5">
<label class="form-label">Before Image 3: </label>
<input type="file" name="image3" class="form-control">
</div>

<div class="col-md-3 me-5">
<label class="form-label">Before Image 4: </label>
<input type="file" name="image4" class="form-control">
</div>

<div class="col-md-3 me-5">
<label class="form-label">Before Image 5: </label>
<input type="file" name="image5" class="form-control">
</div>
<hr>
</div>
<?}else{?>
<div class="row g-3 mt-0">
<div class="col-md-12 me-5">
<label class="form-label">Before Images: </label>
<div class="row">
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/before-images/<?=$before_image1;?>" class="btn-gallery">
<img src="uploads/before-images/<?=$before_image1;?>" width="100px" class="mt-3"></a></p> 
</div>
<?if($before_image2!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/before-images/<?=$before_image2;?>" class="btn-gallery">
<img src="uploads/before-images/<?=$before_image2;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($before_image3!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/before-images/<?=$before_image3;?>" class="btn-gallery">
<img src="uploads/before-images/<?=$before_image3;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($before_image4!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/before-images/<?=$before_image4;?>" class="btn-gallery">
<img src="uploads/before-images/<?=$before_image4;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($before_image5!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/before-images/<?=$before_image5;?>" class="btn-gallery">
<img src="uploads/before-images/<?=$before_image5;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}?>
</div>
</div>
</div>
<?}?>

<?if ($status==2) {
if ($service_image1=='') {

    ?>
<div class="row g-3 mt-1">
<h6>Service Images:</h6>
<div class="col-md-3 me-5">
<label class="form-label">Service Image 1: </label>
<input type="file" name="service_image1" required class="form-control">
</div>
<div class="col-md-3 me-5">
<label class="form-label">Service Image 2: </label>
<input type="file" name="service_image2" class="form-control">
</div>

<div class="col-md-3 me-5">
<label class="form-label">Service Image 3: </label>
<input type="file" name="service_image3" class="form-control">
</div>

<div class="col-md-3 me-5">
<label class="form-label">Service Image 4: </label>
<input type="file" name="service_image4" class="form-control">
</div>

<div class="col-md-3 me-5">
<label class="form-label">Service Image 5: </label>
<input type="file" name="service_image5" class="form-control">
</div>
<hr>
</div>
<?}else{?>
<div class="row g-3">
<div class="col-md-12 me-5">
<label class="form-label">Service Images: </label>
<div class="row">
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/service-images/<?=$service_image1;?>" class="btn-gallery">
<img src="uploads/service-images/<?=$service_image1;?>" width="100px" class="mt-3"></a></p> 
</div>
<?if($service_image2!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/service-images/<?=$service_image2;?>" class="btn-gallery">
<img src="uploads/service-images/<?=$service_image2;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($service_image3!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/service-images/<?=$service_image3;?>" class="btn-gallery">
<img src="uploads/service-images/<?=$service_image3;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($service_image4!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/service-images/<?=$service_image4;?>" class="btn-gallery">
<img src="uploads/service-images/<?=$service_image4;?>" width="100px" class="mt-3"></a></p> 
</div>
<?}if($service_image5!=''){?>
<div class="col-md-3 col-sm-6 w-sm-50">
<p><a href="uploads/service-images/<?=$service_image5;?>" class="btn-gallery">
<img src="uploads/service-images/<?=$service_image5;?>" width="100px" class="mt-3"></a></p> 
</div>

<?}?>
</div>
</div>
</div>



<?}}if ($status==2) {?>
<div class="row g-3">
     <h6 class="mb-2 mt-4">After Images:</h6>
<div class="col-md-3 me-5">
   
<label class="form-label">After Image 1: </label>
<input type="file" name="after_image1" class="form-control" <? if($type_of_report!='0' ){echo "required";}?>>
</div>
<div class="col-md-3 me-5">
<label class="form-label">After Image 2: </label>
<input type="file" name="after_image2" class="form-control">
</div>
<div class="col-md-3 me-5">
<label class="form-label">After Image 3: </label>
<input type="file" name="after_image3" class="form-control">
</div>
<div class="col-md-3 me-5">
<label class="form-label">After Image 4: </label>
<input type="file" name="after_image4" class="form-control">
</div>
<div class="col-md-3 me-5">
<label class="form-label">After Image 5: </label>
<input type="file" name="after_image5" class="form-control">
</div>
<hr>
</div>
    <?}?>

<div class="row">
 
    <h5>Technicians Details:</h5>

<?
$select_technician=mysqli_query($conn,"select * from technician_log where job_order_id='$ID'");
$Sno=0;
while($row_technican=mysqli_fetch_array($select_technician)){

$Sno=$Sno+1;
$technician_name=$row_technican['technician_name'];
$technician_mobile=$row_technican['technician_mobile'];
$technician_id=$row_technican['technician_id'];
$clock_in_time=$row_technican['clock_in_time'];
?>
<div class="row mt-3">
<?if ($Sno>>1) {
   
?>
<div class="mt-4 mb-3 bdr-tp-gray">
    
</div>
<?}
?>
    <div class="col-md-3  col-lg-3 col-xl-2 ">
<label class="form-label">Technician Details: </label><br>
<label class="form-label"><?=$technician_name." - ".$technician_mobile?></label>
<input type="hidden" name="technician_id[]" value="<?=$technician_id;?>">
</div>


<?
if ($status=='1') {
    $time_part=explode(' ',$job_time);
     $hrmin=$time_part[0];
          $ampm=$time_part[1];
      $time_2=explode(':', $hrmin);
     $hour=$time_2[0];
       $min=$time_2[1];
?>
<div class="col-md-4 col-lg-3 sm-mt-3 col-xl-3">
<label class="form-label">Technician Clock In Time:</label>
<div class="row timess">
<div class="col-md-4 w-sm-33  pr-8">  
<select class="form-select pad-select " required name="time_hr[]" id="time_hr"><option value="">Hr</option>
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
<div class="col-md-4 w-sm-33 p-0 pr-8">  
<select class="form-select pad-select" required name="time_min[]" id="time_min">
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
<div class="col-md-4 w-sm-33  p-0 pr-8">  
<select class="form-select pad-select" required name="time_am[]" id="time_am"><option value="AM" <?if ($ampm=='AM') {
echo "selected";
}?>>AM</option>
<option value="PM" <?if ($ampm=='PM') {
echo "selected";
}?>>PM</option>
</select>
</div>
</div>
</div>
<?}elseif ($status==2) {?>

<div class="col-md-4 col-lg-4 sm-mt-3">
<label class="form-label">Technician Clock Out Time:</label>
<div class="row timess">
<div class="col-md-4 w-sm-33  pr-8">  
<select class="form-select pad-select " required name="time_out_hr[]" id="time_out_hr"><option value="">Hr</option>
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
<div class="col-md-4 w-sm-33 p-0 pr-8">  
<select class="form-select pad-select" required name="time_out_min[]" id="time_out_min">
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
<div class="col-md-4 w-sm-33  p-0 pr-8">  
<select class="form-select pad-select" required name="time_out_am[]" id="time_out_am"><option value="AM" <?if ($ampm=='AM') {
echo "selected";
}?>>AM</option>
<option value="PM" <?if ($ampm=='PM') {
echo "selected";
}?>>PM</option>
</select>
</div>
</div>
</div>
    <?}?>
</div>
<?}?>
</div>

<div class="col-md-9 align-self-center mt-5">
    <input type="hidden" name="job_status" value="<?=$status;?>">
<input type="submit" name="Submit" id="submit-btn" class="btn btn-primary px-5" value="Update Job" >
</div>


</div>
</div>
</div>
</form>




<?php
}
include 'template.php';
?>