<?
extract($_REQUEST);
include 'dilg/cnt/join.php';
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');
$site_id = $_POST['site_id'];


	

$select_site=mysqli_query($conn,"select * from site where id='$site_id'");

if (mysqli_num_rows($select_site)>>0) {
$row_Site=mysqli_fetch_array($select_site);
 $site_incharge=$row_Site['incharge_name'];
 $site_mobile=$row_Site['mobile'];
 $Site_name=$row_Site['site_name'];

 $site_email=$row_Site['email'];
 $site_location=$row_Site['location'];
$site_address=$row_Site['site_address'];

?>


<script>
	$("#site_address").val("<?=trim(json_encode($site_address), '"')?>");
	$('#incharge_name').val('<?=$site_incharge?>');
$('#incharge_phone').val('<?=$site_mobile?>');
$('#incharge_email').val('<?=$site_email?>');
$('#location').val('<?=$site_location?>');
$('#site_name_lead').val('<?=$Site_name?>');
</script>
<?}else{?>


<script>
	$("#site_address").val("");
	$('#incharge_name').val("");
$('#incharge_phone').val("");
$('#incharge_email').val("");
$('#location').val("");
$('#site_name_lead').val("");
</script>
<?}

?>