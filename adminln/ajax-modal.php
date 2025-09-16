<?
extract($_REQUEST);
include 'dilg/cnt/join.php';
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');
$ID = $_POST['id'];

if($_POST['act']=='site') 
{ 
if($ID !='0') {
$select_qry=mysqli_query($conn,"select * from site where id='$ID' "); 
$row_R=mysqli_fetch_array($select_qry);
foreach($row_R as $K1=>$V1) $$K1 = $V1;
}

?>

	<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<div class="card-title d-flex align-items-center">
<div><i class="bx bxs-user me-1 font-22 color-af251c"></i>
</div>
<h5 class="mb-0 text-primary color-af251c"><? if($ID !=''){echo "Add";}else{echo "Update";}?> Site</h5>
</div>
<hr>
<form action="#" method="post" class="row g-3" enctype="multipart/form-data">

<div class="col-md-12">
<label  class="form-label">Select Customer Name:</label>
<select class="single-select1" multiple="multiple" name="customer_id" id="customer_id" required>
<?
$select_customer=mysqli_query($conn,"select * from customers where status=1");
while ($row_customer=mysqli_fetch_array($select_customer)) {

	$customer_name=$row_customer['customer_name'];
	$mobile_no=$row_customer['mobile'];
	$Customer_id=$row_customer['id'];
	$Company_name=$row_customer['company_name'];
?>
<option value="<?=$Customer_id?>" <?if($Customer_id==$customer_id){echo "selected";}?>><?=$Company_name." ( ".$customer_name." - ".$mobile_no." )";?></option>
<?
}
?>
</select>
</div>

<div class="col-md-6">
<label  class="form-label">Site Name</label>
<input type="text" name="site_name" id="site_name" class="form-control" value="<?=$site_name;?>" placeholder="Site Name" required>
<input type="hidden" name="MainId" value="<?=$ID;?>">
</div>

<div class="col-md-6">
<label  class="form-label">Site Address</label>
<textarea  name="site_address" id="site_address" class="form-control" placeholder="Site Address" required><?=$site_address;?></textarea>

</div>
<div class="col-md-6">
<label  class="form-label">Incharge Name</label>
<input type="text" name="incharge_name" id="incharge_name" class="form-control" value="<?=$incharge_name;?>" placeholder="Incharge Name" required>

</div>
<div class="col-md-6">
<label  class="form-label">Phone Number</label>
<input type="text" name="mobile" id="mobile" class="form-control" value="<?=$mobile;?>" placeholder="Phone Number" required pattern="[0-9]{9}" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="9" min="9">
</div>


<div class="col-md-6">
<label  class="form-label">Email</label>
<input type="email" name="email" id="email" class="form-control" value="<?=$email;?>" placeholder="Email" required>
</div>
<div class="col-md-6">
<label class="form-label width-100" >Mail Service</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="mail_service" id="inlineRadio1" value="0" <? if($email_service =='0' || $email_service=='') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio1">Company</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="mail_service" id="inlineRadio2" value="1" <? if($email_service =='1') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio2">Incharge</label>
</div>


<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="mail_service" id="inlineRadio3" value="2" <? if($email_service =='2') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio3">Both</label>
</div>
</div>

<div class="col-md-6">
<label  class="form-label">Location URL</label>
<input type="url" name="location" id="location" class="form-control" value="<?=$location;?>" placeholder="Location">
</div>

<div class="col-md-6">
<label  class="form-label">Description</label>
<textarea  name="description" id="description" class="form-control" placeholder="Description"><?=$description;?></textarea>

</div>

<div class="col-md-12">
<label class="form-label width-100" >Status</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" <? if($status =='1' || $status=='') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio1">Active</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" <? if($status =='0') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio2">Inactive</label>
</div>

</div>

<div class="col-6">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<? if($ID !='0') {   echo  "Update"; } else echo "Add";?>" >
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

<?}
if($_POST['act']=='lead_type') 
{ 
if($ID !='0') {
$select_qry=mysqli_query($conn,"select * from lead_type where id='$ID' "); 
$row_R=mysqli_fetch_array($select_qry);
foreach($row_R as $K1=>$V1) $$K1 = $V1;
}

?>

<div class="card-title d-flex align-items-center">
<div><i class="bx bxs-user me-1 font-22 color-af251c"></i>
</div>
<h5 class="mb-0 text-primary color-af251c"><? if($ID !=''){echo "Add";}else{echo "Update";}?> Lead Type</h5>
</div>
<hr>
<form action="#" method="post" class="row g-3" enctype="multipart/form-data">

<div class="col-md-12">
<label for="" class="form-label">Lead Type</label>
<input type="text" name="lead_type" id="lead_type" class="form-control" value="<?=$lead_type;?>" placeholder="Lead Type" required>
<input type="hidden" name="MainId" value="<?=$ID;?>">
</div>

<div class="col-md-12">
<label for="inputAddress" class="form-label width-100" >Status</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" <? if($status =='1' || $status=='') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio1">Active</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" <? if($status =='0') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio2">Inactive</label>
</div>

</div>

<div class="col-6">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<? if($ID !='0') {   echo  "Update"; } else echo "Add";?>" >
</div>


</form>

<?}
if($_POST['act']=='pestiside_used') 
{ 
if($ID !='0') {
$select_qry=mysqli_query($conn,"select * from pestiside_used where id='$ID' "); 
$row_R=mysqli_fetch_array($select_qry);
foreach($row_R as $K1=>$V1) $$K1 = $V1;
}

?>

<div class="card-title d-flex align-items-center">
<div><i class="bx bxs-user me-1 font-22 color-af251c"></i>
</div>
<h5 class="mb-0 text-primary color-af251c"><? if($ID !=''){echo "Add";}else{echo "Update";}?> Pestiside Used</h5>
</div>
<hr>
<form action="#" method="post" class="row g-3" enctype="multipart/form-data">

<div class="col-md-12">
<label for="" class="form-label">Pestiside Used</label>
<input type="text" name="pestiside_used" id="pestiside_used" class="form-control" value="<?=$pestiside_used;?>" placeholder="Pestiside Used" required>
<input type="hidden" name="MainId" value="<?=$ID;?>">
</div>

<div class="col-md-12">
<label for="inputAddress" class="form-label width-100" >Status</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" <? if($status =='1' || $status=='') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio1">Active</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" <? if($status =='0') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio2">Inactive</label>
</div>

</div>

<div class="col-6">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<? if($ID !='0') {   echo  "Update"; } else echo "Add";?>" >
</div>


</form>
<?}if($_POST['act']=='job_type') 
{ 
if($ID !='0') {
$select_qry=mysqli_query($conn,"select * from job_type where id='$ID' "); 
$row_R=mysqli_fetch_array($select_qry);
foreach($row_R as $K1=>$V1) $$K1 = $V1;
}

?>

<div class="card-title d-flex align-items-center">
<div><i class="bx bxs-user me-1 font-22 color-af251c"></i>
</div>
<h5 class="mb-0 text-primary color-af251c"><? if($ID !=''){echo "Add";}else{echo "Update";}?> Job Type</h5>
</div>
<hr>
<form action="#" method="post" class="row g-3" enctype="multipart/form-data">

<div class="col-md-12">
<label for="" class="form-label">Job Type</label>
<input type="text" name="job_type" id="job_type" class="form-control" value="<?=$job_type;?>" placeholder="Job Type" required>
<input type="hidden" name="MainId" value="<?=$ID;?>">
</div>

<div class="col-md-12">
<label for="" class="form-label">Socpe of Work:</label>
<textarea type="text" name="scope_of_work" rows=6 id="scope_of_work" class="form-control" placeholder="Socpe of Work" required><?=$scope_of_work;?></textarea>
</div>
<div class="col-md-12">
<label for="inputAddress" class="form-label width-100" >Status</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" <? if($status =='1' || $status=='') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio1">Active</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" <? if($status =='0') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio2">Inactive</label>
</div>

</div>

<div class="col-6">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="<? if($ID !='0') {   echo  "Update"; } else echo "Add";?>" >
</div>


</form>
<?}if($_POST['act']=='inspection') 
{ 
if($ID !='0') {
$select_qry=mysqli_query($conn,"select * from leads where id='$ID' "); 
$row_R=mysqli_fetch_array($select_qry);
foreach($row_R as $K1=>$V1) $$K1 = $V1;
}

?>

<div class="card-title d-flex align-items-center">
<div><i class="bx bxs-user me-1 font-22 color-af251c"></i>
</div>
<h5 class="mb-0 text-primary color-af251c">Update Inspection</h5>
</div>
<hr>
<form action="#" method="post" class="row g-3" enctype="multipart/form-data">

<div class="col-md-12">
<label for="" class="form-label">Description:</label>
<textarea type="text" name="description" rows=6 id="description" class="form-control" placeholder="Description" required><?=$description;?></textarea>
<input type="hidden" name="MainId" value="<?=$ID;?>">
<input type="hidden" name="Lead_id" value="<?=$lead_id;?>">
</div>

<div class="col-6">
<input type="submit" name="Submit" class="btn btn-primary px-5" value="Update Status" >
</div>


</form>


<?}if($_POST['act']=='scopeofwork') 
{ 


	$select_scopeof_Work=mysqli_query($conn,"select * from job_type where id='$ID'");

$row_scope=mysqli_fetch_array($select_scopeof_Work);

$scope_of_work=$row_scope['scope_of_work'];

if ($scope_of_work!='') {
$Scope_of_work=$scope_of_work;
}else{
	$Scope_of_work=" - ";
}

$job_type=$row_scope['job_type'];
?>
<div class="card-title d-flex align-items-center">
<h5 class="mb-0 text-primary color-af251c">Scope of Work</h5>
</div>
<hr>



<div class="row">

	<div class="col-md-12">
<label for="" class="form-label"><b>Job Type:</b></label>
<p class="form-label"><?=$job_type;?>
</p>
</div>
	<div class="col-md-12">
<label for="" class="form-label"><b>Scope of Work:</b></label>
<p class="form-label"><? echo wordwrap($Scope_of_work, 50, "<br />\n"); ?>
</p>
</div>
</div>
<?}if($_POST['act']=='feedback') 
{ ?>


<div class="card-title d-flex align-items-center">
<div><i class="bx bxs-message-detail me-1 font-22 color-af251c"></i>
</div>
<h5 class="mb-0 text-primary color-af251c">Add Job Order Feedback</h5>
</div>
<hr>
<form action="#" method="post" class="row g-3" enctype="multipart/form-data">


<div class="col-md-12">
<label for="inputAddress" class="form-label width-100" >Type of Feedback</label>
<input type="hidden" name="MainId" value="<?=$ID;?>">
<div class="form-check form-check-inline">
<input class="form-check-input" onclick="addfeedback(1)" type="radio" name="type" id="inlineRadio1" value="1" <? if($type=='') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio1">Send Mail</label>

</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" onclick="addfeedback(0)" name="type" id="inlineRadio2" value="0" <? if($type =='0') { echo 'checked'; } ?>>
<label class="form-check-label" for="inlineRadio2">Mannual</label>
</div>

</div>


<div   id="feed-back" style="display: none;">

	<div class="col-md-12 ">
		<label for="inputAddress" class="form-label width-100" >Ratings</label>
		<div class="star-rating">
            <input type="radio" id="star5" class="rating-star" name="rating" value="5">
            <label for="star5"><i class="bx bxs-star"></i></label>

            <input type="radio" id="star4" class="rating-star" name="rating" value="4">
            <label for="star4"><i class="bx bxs-star"></i></label>

            <input type="radio" id="star3" class="rating-star" name="rating" value="3">
            <label for="star3"><i class="bx bxs-star"></i></label>

            <input type="radio" id="star2" class="rating-star" name="rating" value="2">
            <label for="star2"><i class="bx bxs-star"></i></label>

            <input type="radio" id="star1" class="rating-star" name="rating" value="1">
            <label for="star1"><i class="bx bxs-star"></i></label>
        </div>
		
	</div>

	<div class="col-md-12 mt-2">
<label for="" class="form-label">Customer Feedback:</label>
<textarea type="text" name="description" rows=6 id="description" class="form-control rating-star" placeholder="Customer Feedback:" ><?=$description;?></textarea>
</div>


	
</div>

<div class="col-6">
<input type="submit" name="feedback" id="feedbackbtn" class="btn btn-primary px-5" value="Send" >
</div>


</form>
	<?}?>
<script>
	
	function addfeedback(type){
	


		if (type==0) {
				$("#feed-back").css("display","block");
				$(".rating-star").attr("required",true);
				$("#feedbackbtn").val("Post");

		}else{
$("#feed-back").css("display","none");
				$(".rating-star").attr("required",false);
				$("#feedbackbtn").val("Send");
		}
	}
</script>

