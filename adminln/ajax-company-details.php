<?
extract($_REQUEST);
include 'dilg/cnt/join.php';
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');
$Company_name = $_POST['company_name'];


$select_customers=mysqli_query($conn,"select * from customers where company_name='$Company_name'");
if (mysqli_num_rows($select_customers)>>0) {

    $row_customer=mysqli_fetch_array($select_customers);

    $customer_name=$row_customer['customer_name'];
    $email=$row_customer['email'];
    $customer_id=$row_customer['id'];

    $mobile=$row_customer['mobile'];
    $alternate_mobile=$row_customer['alternate_mobile'];
    $address=$row_customer['address'];
    $city=$row_customer['city'];
    
$select_Site=mysqli_query($conn,"select * from site where company_name='$Company_name' and customer_id='$customer_id'");



?>


<script>
    
        $('#customer_name').val('<?=$customer_name?>');
        $('#email').val('<?=$email?>');
        $('#customer_mobile').val('<?=$mobile?>');
$('.customer_read').attr("readonly",true);
        $('#alternate_mobile').val('<?=$alternate_mobile?>');
        $('#address').val('<?=trim(json_encode($address), '"')?>');
        $('#city').val('<?=$city?>');

         <?
if (mysqli_num_rows($select_Site)==1) {
$row_site=mysqli_fetch_array($select_Site);
            $site_name=$row_site['site_name'];
$site_address=$row_site['site_address'];

$site_incharge=$row_site['incharge_name'];

$site_mobile=$row_site['mobile'];

$site_email=$row_site['email'];

$site_location=$row_site['location'];
?>  
$('#site_Name').html(`<input type="text" id="site_name" name="site_name" class="form-control remcl"  placeholder="Site Name" required="">`);   
$('#site_name').val('<?=$site_name?>');
$('#site_name').attr('readonly',true);

$('#incharge_name').val('<?=$site_incharge?>');
$('#incharge_phone').val('<?=$site_mobile?>');
$('#incharge_email').val('<?=$site_email?>');

$('#location').val('<?=$site_location?>');

$('#site_address').val('<?=trim(json_encode($site_address), '"')?>');
$('#site_address').attr('readonly',true);
        <?}else{

$selet_opt = '<select name="site_name" id="site_name" class="form-select" onchange="getsiteaddress(this.value)"  required><option value="">Select Site</option>';
while ($row_site = mysqli_fetch_array($select_Site)) {
    $selet_opt .= '<option value="' . $row_site['id'] . '">' . $row_site['site_name'] . '</option>';
}
$selet_opt .= '</select>';
 ?>
 $('#site_address').val('');
 $('#incharge_name').val('');
$('#incharge_phone').val('');
$('#incharge_email').val('');
   $('#site_Name').html(`<?=$selet_opt;?>`);
        <?}?>

</script>

<?}else{?>

    <script>
        $('.remcl').val('');
        $('.customer_read').attr("readonly",false);
        $('#site_Name').html(`<input type="text" id="site_name" name="site_name" class="form-control remcl"  placeholder="Site Name" required="">`); 
    </script>

    <?}?>
