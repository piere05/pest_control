<?php
function main() { 
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
$Act=$_GET['act'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');

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


if ($Submit=="Update Inspection") {

   $select_lead=mysqli_query($conn,"select * from leads where id='$ID'");
   $row_lead=mysqli_fetch_array($select_lead);

   $Image1=$row_lead['image1'];
   $Image2=$row_lead['image2'];
   $Image3=$row_lead['image3'];
   $Image4=$row_lead['image4'];
   $Image5=$row_lead['image5'];

if ($_FILES['image1']['name']!='') {

unlink("uploads/inspection-images/$Image1");
     $filename1 = $_FILES['image1']['name'];
 $filesize1 = $_FILES['image1']['size'];
   $ext1 = strtolower(substr(strrchr($filename1, "."), 1));
  $image_size1 = ($filesize1 / 1024);
if($ext1 == 'jpg' or $ext1 == 'jpeg' or $ext1 == 'png' or $ext1 == 'webp')
{
$path1 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename1);
  $image_path1 = "uploads/inspection-images/".$path1;
$compressedImage4 = compressImage($_FILES["image1"]["tmp_name"], $image_path1, 75); 
chmod($image_path1,0777);
$imgqry .= ", image1 = '".$path1."'";

}
}else{
   $imgqry .= ", image1 = '".$Image1."'";
}


if ($_FILES['image2']['name']!='') {

   unlink("uploads/inspection-images/$Image2");
     $filename2 = $_FILES['image2']['name'];
 $filesize2 = $_FILES['image2']['size'];
   $ext2 = strtolower(substr(strrchr($filename2, "."), 1));
  $image_size2 = ($filesize2 / 1024);
if($ext2 == 'jpg' or $ext2 == 'jpeg' or $ext2 == 'png' or $ext2 == 'webp')
{
$path2 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename2);
 $image_path2 = "uploads/inspection-images/".$path2;
$compressedImage4 = compressImage($_FILES["image2"]["tmp_name"], $image_path2, 75); 
chmod($image_path2,0777);
$imgqry .= ", image2 = '".$path2."'";

}
}else{
   $imgqry .= ", image2 = '".$Image2."'";
}

if ($_FILES['image3']['name']!='') {

   unlink("uploads/inspection-images/$Image3");
     $filename3 = $_FILES['image3']['name'];
 $filesize3 = $_FILES['image3']['size'];
   $ext3 = strtolower(substr(strrchr($filename3, "."), 1));
  $image_size3 = ($filesize3 / 1024);
if($ext3 == 'jpg' or $ext3 == 'jpeg' or $ext3 == 'png' or $ext3 == 'webp')
{
$path3 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename3);
 $image_path3 = "uploads/inspection-images/".$path3;
$compressedImage4 = compressImage($_FILES["image3"]["tmp_name"], $image_path3, 75); 
chmod($image_path3,0777);
$imgqry .= ", image3 = '".$path3."'";

}
}else{
   $imgqry .= ", image3 = '".$Image3."'";
}


if ($_FILES['image4']['name']!='') {

   unlink("uploads/inspection-images/$Image4");
     $filename4 = $_FILES['image4']['name'];
 $filesize4 = $_FILES['image4']['size'];
   $ext4 = strtolower(substr(strrchr($filename4, "."), 1));
  $image_size5 = ($filesize4 / 1024);
if($ext4 == 'jpg' or $ext4 == 'jpeg' or $ext4 == 'png' or $ext4 == 'webp')
{
$path4 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename4);
 $image_path4 = "uploads/inspection-images/".$path4;
$compressedImage4 = compressImage($_FILES["image4"]["tmp_name"], $image_path4, 75); 
chmod($image_path4,0777);
$imgqry .= ", image4 = '".$path4."'";

}
}else{
   $imgqry .= ", image4 = '".$Image4."'";
}

if ($_FILES['image5']['name']!='') {
   unlink("uploads/inspection-images/$Image5");
     $filename5 = $_FILES['image5']['name'];
 $filesize5 = $_FILES['image5']['size'];
   $ext5 = strtolower(substr(strrchr($filename5, "."), 1));
  $image_size5 = ($filesize5 / 1024);
if($ext5 == 'jpg' or $ext5 == 'jpeg' or $ext5 == 'png' or $ext5 == 'webp')
{
$path5 = date('YmdHis').rand(1,99999).'_'.str_replace(" ","_",$filename5);
 $image_path5 = "uploads/inspection-images/".$path5;
$compressedImage4 = compressImage($_FILES["image5"]["tmp_name"], $image_path5, 75); 
chmod($image_path5,0777);
$imgqry .= ", image5 = '".$path5."'";

}
}else{
   $imgqry .= ", image5 = '".$Image5."'";
}


$update_inspection=mysqli_query($conn,"update leads set inspection_description='$inspection_description',inspected_datetime='$currentTime',inspection_status=1 $imgqry where id='$ID'");

if ($update_inspection) {
$msg = 'Updated Successfully';
header('Location:list-inspection.php?msg='.$msg);
}
else
{
$alert_msg = 'Could not able to update try once again!!!';
header('Location:list-inspection.php?alert_msg='.$alert_msg);
}


}


$select_leads=mysqli_query($conn,"select * from leads where id='$ID'"); 
$row_leads=mysqli_fetch_array($select_leads);
foreach($row_leads as $K1=>$V1) $$K1 = $V1;

if ($Act=='lead') {
    $backurl="list-leads.php";
}else{
     $backurl="list-inspection.php";
}

?>



<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
<div class="breadcrumb-title border-0 pe-3">Update Inspection</div>

<div class="ms-auto">
<div class="col">
<!-- Button trigger modal -->
<a href="<?=$backurl;?>" class="text-white btn btn-danger">Back</a>
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

<div class="row g-3">


<div class="col-md-3 me-5">
<label for="inputFirstName" class="form-label">Inspection Description : </label>
<textarea class="form-control" name="inspection_description" placeholder="Inspection Description" required><?=$inspection_description;?></textarea>
</div>
<div class="col-md-3 me-5">
<label for="inputFirstName" class="form-label">Image 1: </label>
<input type="file" name="image1" class="form-control" value="<?=$name;?>" <?if($image1==''){echo "required";}?>>
<? if($image1!=''){?>
<img src="uploads/inspection-images/<?=$image1;?>" width="80px" class="mt-3">
<?}?>
</div>

<div class="col-md-3 me-5">
<label for="inputFirstName" class="form-label">Image 2: </label>
<input type="file" name="image2" class="form-control" value="<?=$name;?>">

<? if($image2!=''){?>
<img src="uploads/inspection-images/<?=$image2;?>" width="80px" class="mt-3">
<?}?>
</div>



<div class="col-md-3 me-5">
<label for="inputFirstName" class="form-label">Image 3: </label>
<input type="file" name="image3" class="form-control" value="<?=$name;?>">

<? if($image3!=''){?>
<img src="uploads/inspection-images/<?=$image3;?>" width="80px" class="mt-3">
<?}?>
</div>



<div class="col-md-3 me-5">
<label for="inputFirstName" class="form-label">Image 4: </label>
<input type="file" name="image4" class="form-control" value="<?=$name;?>">

<? if($image4!=''){?>
<img src="uploads/inspection-images/<?=$image4;?>" width="80px" class="mt-3">
<?}?>
</div>



<div class="col-md-3 me-5">
<label for="inputFirstName" class="form-label">Image 5: </label>
<input type="file" name="image5" class="form-control" value="<?=$name;?>">
<? if($image5!=''){?>
<img src="uploads/inspection-images/<?=$image5;?>" width="80px" class="mt-3">
<?}?>
</div>





<div class="col-md-9 align-self-center mt-5">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="Update Inspection" >
</div>




</div>
</div>
</div>
</div>
</div>
</form>



<script>
function getedit(val){

$.ajax({
url: "ajax-modal.php", 
type: "POST",
data: "id="+val+"&act=job_type",
success: function(result){
$("#output").html(result);
}});
}
</script> 
<?php
}
include 'template.php';
?>