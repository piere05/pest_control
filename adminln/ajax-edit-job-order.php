<?
extract($_REQUEST);
include 'dilg/cnt/join.php';
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');
$ID = $_POST['id'];


if($ID !='0') {
$select_qry=mysqli_query($conn,"select * from job_order where id='$ID' "); 
$row_R=mysqli_fetch_array($select_qry);
foreach($row_R as $K1=>$V1) $$K1 = $V1;
}

?>


	<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />

<div class="card-title d-flex align-items-center">
<div><i class="bx bxs-user me-1 font-22 color-af251c"></i>
</div>
<h5 class="mb-0 text-primary color-af251c">Update Job Order</h5>
</div>
<hr>
<form action="#" method="post" class="row g-3" enctype="multipart/form-data">

<div class="col-md-12">
<label for="" class="form-label">Location:</label>
<input type="text" name="location" id="location" class="form-control" value="<?=$location;?>" placeholder="Location" required>
<input type="hidden" name="MainId" value="<?=$ID;?>">
</div>

<div class="col-md-6  ">
<label for="inputFirstName" class="form-label">Job Date:</label>
<input type="date" class="form-control" value="<?=$job_date;?>" min="<?=$currentdate;?>"  required name="job_date" placeholder="Job Date">
</div>

<?
if ($ID!='') {
    $time_part=explode(' ',$job_time);
     $hrmin=$time_part[0];
          $ampm=$time_part[1];
      $time_2=explode(':', $hrmin);
     $hour=$time_2[0];
       $min=$time_2[1];
}

?>
<div class="col-md-6">
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

<div class="col-md-12">
<label class="form-label">Select Supervisor </label>
<select class="single-select1" multiple="multiple" onchange="getsupervisor(this.val)" name="supervisor_id" id="supervisor_id" required>
    <option value="">Select Supervisor</option>
    <?
    $select_supervisor=mysqli_query($conn,"select * from user where user_type=2 and status=1");
   
    while ($row_supervisor=mysqli_fetch_array($select_supervisor)) {
        $Supervisor_id=$row_supervisor['Id'];
        $supervisor_name=$row_supervisor['name'];
        $supervisor_mobile=$row_supervisor['UserName'];
    ?>
    <option value="<?=$Supervisor_id;?>" <?if ($supervisor_id==$Supervisor_id) {
       echo "selected";
    }?>><?=$supervisor_name." - ".$supervisor_mobile;?></option>

    <?}?>
</select>

<div class="mt-3" id="output1">
    
</div>
</div>



<div class="col-6">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="Update Supervisor" >
</div>


</form>

<script>
	$('.single-select1').select2({
theme: 'bootstrap4',
width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
placeholder: $(this).data('placeholder'),
 maximumSelectionLength: 1,
allowClear: Boolean($(this).data('allow-clear')),
});

</script>
<script>
	
function getsupervisor(val){

    supervisor_id = $("#supervisor_id").val();

    $.ajax({
url: "ajax-supervisor-job-schedule.php", 
type: "POST",
data: "id="+supervisor_id,
success: function(result){
$("#output1").html(result);
}});

}
</script>

