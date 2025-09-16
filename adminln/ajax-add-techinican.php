<?
session_start();
extract($_REQUEST);
include 'dilg/cnt/join.php';
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');
$ID = $_POST['id'];
$sno = $_POST['sno'];

  $user_id=$_SESSION['UID'];
 $User_type=$_SESSION['USERTYPE'];


if ($User_type<=1) {
 $subqry.="or user_type=2";   
}else{
    $subqry.="or Id=$user_id";   
}

if($ID !='0') {
$select_qry=mysqli_query($conn,"select * from job_order where id='$ID' "); 
$row_R=mysqli_fetch_array($select_qry);
foreach($row_R as $K1=>$V1) $$K1 = $V1;
}?>

<link href="assets/plugins/select/chosen.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/select/select2.css" rel="stylesheet" type="text/css"/>

<div class="card-title d-flex align-items-center">

<h5 class="mb-0 text-primary color-af251c">Update Job Order | SNJO<?=$sno;?></h5>
</div>
<hr>

<form action="#" method="post" class="row g-3" enctype="multipart/form-data">

<div class="col-md-4">
<label for="" class="form-label mt-2">Job Date:</label>
<label class="form-label mt-2"><b><?=date("d-m-Y",strtotime($job_date));?></b></label>

</div>

<div class="col-md-4">
<label for="" class="form-label mt-2">Job Time:</label>
<label class="form-label mt-2"><b><?=$job_time;?></b></label>

</div>


<div class="col-md-12">
<label class="form-label">Select Technician </label>
<select class="multiple-select" name="technician[]" id="technician" required multiple="true" >
<?php 

$sql = mysqli_query($conn,"select * from  user where user_type=3 $subqry  and status=1 order by name asc"); 


while($row = mysqli_fetch_array($sql))
{
    $technician_id = $row['Id'];

    $select_tech = mysqli_query($conn,"select * from technician_log where technician_id='$technician_id' and job_order_id='$ID'");
    $row_old_tech = mysqli_fetch_array($select_tech);
    $old_technician_id = $row_old_tech['technician_id'];

?>
    <option value="<?= $technician_id ?>" <?php if ($old_technician_id == $technician_id) { echo 'selected'; } ?> >
        <?= stripslashes($row['name']) . " - " . $row['UserName'] ?>
    </option>
<?php } ?>
</select>


<div class="mt-3" id="output1">
    
</div>
</div>


<div class="col-6">
	<input type="hidden" name="MainId" value="<?=$ID;?>">
	<input type="hidden" name="supervisor_id" value="<?=$supervisor_id;?>">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<? if($ID !='0') {   echo  "Update"; } else echo "Add";?>" >
</div>


</form>



<script src="assets/plugins/select2/js/select2.min.js"></script>

<script>
	$('.multiple-select').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
allowClear: Boolean($(this).data('allow-clear')),
});
</script>