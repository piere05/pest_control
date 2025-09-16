<?php
function main() { 
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$DATE = date('Y-m-d');
$TIME = date('H:i:s');

$quotation_id_enc=encrypt_decrypt('encrypt',$ID);
$QUOTATION_id = $ID;

$sel_rows=mysqli_query($conn,"select * from quotation where id='$QUOTATION_id' ");
$rows_R = mysqli_fetch_object($sel_rows);

foreach($rows_R as $K1=>$V1) $$K1 = $V1;


$select_site=mysqli_query($conn,"select * from site where  id='$site_id'");

$row_site=mysqli_fetch_array($select_site);

$site_address=$row_site['site_address'];
$email_service=$row_site['email_service'];
$site_incharge_mail=$row_site['email'];

$select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
$row_customer=mysqli_fetch_array($select_customer);
$customer_name=addslashes($row_customer['customer_name']);
$customer_email=$row_customer['email'];

$address=addslashes($row_customer['address']);

$city=$row_customer['city'];

$mobile=$row_customer['mobile'];



$Company_address ="301, AL murar, Deira, Dubai, UAE, Coimbatore, Tamil Nadu 641107";
$Address_2="<table class=\"no-bdr\" style=\"width:100%;\" cellspacing=\"0\"><tr><td style=\"text-align:left;width:50%;font-size:15px;\">&nbsp;&nbsp;<b>Supernova, </b></td></tr></table>&nbsp;&nbsp;3/301, AL murar, Deira,<br>&nbsp;&nbsp;Dubai, UAE";

$Date2 =date('d-M-Y h:i A', strtotime($currentTime));

$select_price_log=mysqli_query($conn,"select *,count(id) as totrows from price_log where quotation_id=$ID ");


$row_price_log=mysqli_fetch_array($select_price_log);

$price_log_total=$row_price_log['totrows'];

$select_product=mysqli_query($conn,"select * from quotation_product where quotation_id='$ID'");
$total_rows=mysqli_num_rows($select_product);
if ($price_log_total!=$total_rows) {
   $revised_no= $price_log_total-$total_rows;
  
    $revised="( Revised"." - ". $revised_no." )";
}else{

    $revised="";
}


$message   =  '<style>
body{
  font-family: Roboto, sans-serif;
}
.fw-500{
  font-weight: bold;
}
.tr-head {
background-color:#fff;
color:#000;

}
.head{
background-color:#0d577a;
color:#fff;
}
.tb-row{
padding:30px;
margin-bottom:20px;
}
.adds-titl{
font-size: 12px;
color:#000;

}
th, td {
  padding: 6px 23px ;
  border: 0.5px solid #000;
  font-size:8px;
}
.no-bdr td, .no-bdr tr .no-bdr th{
  border: none;
  padding: 0px;
}
.li-line li{
  line-height:1.3;
}
.terms p{
  margin:0;
}
tbody{
  vertical-align: inherit !important;
}
</style>';

$Type_client = "<b>Quotation Confirmation</b> - SN".$QUOTATION_id."<br> ".
      
      "<b>The details of your quotation are given below: </b><br><br>";

$Type_supernova = "<b>New Quotation Created </b> - SN".$QUOTATION_id."<br> ".
      
      "<b>The details are given below: </b><br><br>";
 $message   .=  '<table class="no-bdr" style="width: 70%;"><tr><td style="width:100%;"><table style="padding:0px;border:1px solid #000;width:100%;"><tr style="vertical-align: middle;"><td style="width:100%;" ><p class="adds-titl" style="text-align:center;"><a href="https://pestcontrol.mistcareer.com/" target="_blank" style="text-align:center;"><img src="https://pestcontrol.mistcareer.com/adminln/assets/images/Our/new_head_logo.png" width="850px;"></a></p></td></tr></table>';

$message   .=  '<table style="padding: 7px 5px;width:100%;border:1px solid #000;border-bottom: 0px;padding-bottom: 0px;" cellspacing="0px">
  <tr style="background-color:#0d577a;color:#fff;width:100%;">
<td style="width: 100%;padding:8px 3px;text-align: center;font-size: 18px;color:#fff;font-weight:700;">QUOTATION DETAILS</td></tr>

<tr><td style="width:100%;border: 1px solid #000;" ><p class="adds-titl" style="line-height:1.7;font-size:15px;margin:2px 5px;" ><b>Quotation No: SN'.$QUOTATION_id.' '. $revised.'</b><br><b>Quotation Date: '.date("d-m-Y",strtotime($quotation_date)).'</b><br><b>Total Amount : AED '.$total_amount.'</b>
</p></td></tr>


</table><table  style="width: 100%;padding: 4px 3px;padding-top: 0px;border: 1px solid;border-top: 0px;">

<tr><td style="width:50%;border: 1px solid #000;" ><p class="adds-titl" style="line-height:1.9;font-size:14px;margin:2px 5px;" >To,</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Company Name: '.$company_name.'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Name: '.$customer_name.'<br>&nbsp;&nbsp;&nbsp;&nbsp; '.wordwrap($address, 30, "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n").'-'.$city.' 
</p></td><td style="width:50%;border: 1px solid #000;" ><p class="adds-titl" style="line-height:1.7;font-size:14px;margin:2px 5px;" ><span><b>Site Name:</b> '.$site_name.'<br><b>Site Address:  </b>  '.wordwrap($site_address, 20, "<br />\n").'<br>Phone: <b>+971 '.$mobile.'</b><br>Mail:  <b>'.$customer_email.'</b>  </span></p></td></tr>
</table>';

$message   .=  '<table cellpadding="3px" style="border-collapse: collapse;
width: 100%;border: 0px solid #ddd;padding:10px 7px;text-align:center;">

<tr class="tr-head" style="background-color:#0d577a;color:#fff">
<th style="width:4.5%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">#</th>  

<th style="width:30%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Job Type </th>
<th style="width:20%;text-align:center; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Scope of Work </th>  
<th style="width:20%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Duration</th>   
<th style="width:10%; font-weight: 600;text-align:center;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Amount</th> 
<th style="width:4%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">VAT(%)</th>
  
<th style="width:6.5%; font-weight: 600;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;">Total</th> 
 

</tr>'; 
$SNo=0;
$sel_product=mysqli_query($conn,"select * from quotation_product where quotation_id='$QUOTATION_id' ");
while($row_product=mysqli_fetch_array($sel_product))
{
  $SNo=$SNo+1;
 $job_type = $row_product['job_type'];
  $job_type_id = $row_product['job_type_id'];

  $select_job_type=mysqli_query($conn,"select * from job_type where id='$job_type_id'");

  $row_job_type=mysqli_fetch_array($select_job_type);
  $scope_of_work=$row_job_type['scope_of_work'];


  $duration = strtoupper($row_product['duration']);
  if ($duration=='AMC') {
     $amc_fromdate = date("d-m-Y",strtotime($row_product['amc_fromdate']));
  $amc_todate = date("d-m-Y",strtotime($row_product['amc_todate']));
  $amc_description = $row_product['amc_description'];

  $amc_details='<br>'.$amc_fromdate." - ".$amc_todate;
  $amc_Description="<br>"."AMC Description - ".$amc_description;
  }else{
    $amc_details="";
    $amc_Description="";
  }  
  $vat = $row_product['vat'];

  $amount = $row_product['amount'];
$vat_amount = ($amount * $vat) / 100;
$vatamt+=$vat_amount;
  $taxamt+=$amount;


  $Total_amount = $row_product['total'];
if($row_product['description']!=''){
  $description = $row_product['description'];
}else{
$description=' - ';
}




$message .= '<tr class="tr-head" style="color:#000">
<td style="text-align:center;width:4.5%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$SNo.'</td> 
<td style="text-align:left;width:30%; line-height:1.5;padding:3px;font-size:12px;border: 1px solid #000;"><b>'.$job_type.'</b><br>'.wordwrap($description, 30, "<br />\n").'<span style="line-height:0px;"><br></span></td>
<td style="text-align:left;width:20%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;"><br>'.$scope_of_work.'</td> 
<td style="text-align:center;width:20%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;"><br>'.$duration.$amc_details.'<br>
'.$amc_Description.'</td> 
<td style="text-align:center;width:10%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;"><br>AED '.number_format($amount, 2).'</td> 
<td style="text-align:center;width:4%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;"><br>'.$vat.'%</td> 

<td style="text-align:center;width:6.5%;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;"><br>AED '.$Total_amount.'</td> 
</tr>';

}

 

$message .= '</table><table cellpadding="6px" style="border: 1px;
    width: 100%;"><tr><td class="tb-row" style="width:61%; font-weight: normal;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;font-size:12px;text-align:center;"><table style="padding:0px 7px 7px 7px;width:100%"><tbody>';



$message .= '</tbody></table></td><td class="tb-row" style="width:38.4%; font-weight: normal;background-color:#fff;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;font-size:13px;text-align:right;"><table cellpadding="7px" style="padding:8px;width: 100%;"><tr><td class="tb-row" style="width:60%; font-weight: normal;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;padding:10px;background-color:#ffff92;text-align:right;"><b>Taxable Amount</b></td>  

<td class="tb-row" style="width:40%; font-weight: normal;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;padding:10px;background-color:#ffff92;">AED. '.number_format($taxamt, 2).'</td></tr>';

$message .= '';


$message .= '<tr ><td class="tb-row" style="width:60%; font-weight: normal;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;font-size:13px;text-align:right;padding:10px;"><b>VAT Amout</b></td>  

<td class="tb-row" style="width:40%; font-weight: normal;font-size:13px ;border: 1px solid #000;border-bottom: 1px solid #000;padding:10px;">AED.'.number_format($vatamt, 2).'</td></tr>';


$message .= '<tr ><td class="tb-row" style="width:60%; font-weight: normal;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;font-size:13px;background-color:#ffff92;text-align:right;padding:10px;"><b>Grand Total</b></td>  

<td class="tb-row" style="width:40%; font-weight: normal;font-size:13px ;border: 1px solid #000;border-bottom: 1px solid #000;background-color:#ffff92;padding:10px;">AED. '.$total_amount.'</td></tr></table>';

$message .= '</td></tr></table>';
 
if($terms_condition!=''){
$message   .=  '<table nobr="true" cellpadding="0px" style="width:100%;border-spacing: 6px 5px;padding:5px 5px;border: 1px solid #000;border-bottom: 0px solid #000;">
<tr class="no-bdr" nobr="true"><td style="width:100%;font-size:13px;" ><b>&nbsp;&nbsp;Terms & Conditions:</b></td></tr>
                 <tr class="no-bdr"><td style="width:100%;font-size:13px;line-height:1.9" class="terms">'.$terms_condition.'
                </td></tr></table>';
}


  $message   .=  '<div style="padding:0px 9px 5px 9px;line-height:0;background-color:#e8e8e8;border: 2px solid #000;">
                 <div style="display:flex;"><div style="width:73%;line-height:0; border-width:0px; margin:0px;"><b class="adds-titl" style="line-height:0.5;font-size:15px;"><br><br>Bank Details:</b></div>
                 <div style="width:27%;line-height:0; border-width:0px;text-align:center;margin:0px;"><p class="adds-titl" style="line-height:0.5;font-size:16px;"><br><b><br>For Supernova</b></p></div></div>
<div style="display:flex;">
<div class="" style="width:12%;line-height:1.6;font-size:13px;" >
Bank Name:<br>A/C Name:<br>A/C Number:<br>IBAN:<br>SWIFT Code:<br>A/C Branch:
</div>
<div class="" style="width:35%;line-height:1.6;font-size:13px;" >
<b>ABU DHABI COMMERCIAL BANK<br>SUPER NOVA PESTS CONTROL SER LLC<br>12516020920001<br>AE410030012516020920001<br>ADCBAEAAXXX<br>257 / MALL OF THE EMIRATES - DUBAI</b>
</div>
<div class="" style="width:8%;line-height:1.3;font-size:13px;" >

</div>
<div class="" style="width:29%;line-height:1.3;font-size:13px;" >

</div>
<div class="" style="width:27%;line-height:1.3;font-size:16px;text-align:center;" >

<img src="https://pestcontrol.mistcareer.com/adminln/assets/images/Our/sign.png" width="180px">
<p><b>Authorised Signatory</b></p>
</div>
</div>
</div>
';

$message .='<td style="width:20%;"></td></td></tr></table>';

$Client_Message2='<div>
<div width="9" height="30"><br><br>&nbsp;Best regards, <br><br>    </div>
<div width="782" height="30"><strong><a href="https://pestcontrol.mistcareer.com/" style="color:#000;">&nbsp;Supernova</a> </strong>
<div width="10" height="30">&nbsp;</div>
</div>';
$message   .=  '<table style="width: 70%;margin-top: 10px;"><tr><td style="border:0px solid;text-align:right;"><a style="    text-decoration: none; font-size:18px;" href="https://pestcontrol.mistcareer.com/export-invoice.php?id='.$quotation_id_enc.'" target="_blank">Download Now..</a></td></tr></table></body></html>';
//echo $message;

$subject="Quotation for SN".$QUOTATION_id;
$supernova_subject="New Quotation Created SN".$QUOTATION_id;
if ($email_service==0) {
 $usr_mail=$customer_email;
}elseif ($email_service==1) {
  $usr_mail=$site_incharge_mail;
}else{
  $usr_mail=$customer_email;
    $client_headers .= 'Bcc:'.$site_incharge_mail. "\r\n";
}
$supernova_mail='admin@supernovaemirates.com';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'Sender: <noreply@mistcareer.com>' . "\r\n";
$headers .= 'From: Supernova<noreply@mistcareer.com>' . "\r\n";
$client_headers .= 'Reply-To: Supernova <noreply@mistcareer.com>' . "\r\n";
$supernova_headers = 'Reply-To: Supernova <noreply@mistcareer.com>' . "\r\n";
$Client_Header=$headers.$client_headers;
$supernova_Header=$headers.$supernova_headers;
$Client_Message= $Type_client.$message.$Client_Message2;
$supernova_Message= $Type_supernova.$message;  


$subject = "New Quotation Received";

$res1 = mail($usr_mail,$subject,$Client_Message,$Client_Header,'-fnoreply@mistcareer.com');

$res2=mail($supernova_mail , $subject, $supernova_Message, $supernova_Header, '-fnoreply@mistcareer.com');


if ($res1 && $res2) {
$update_quotation=mysqli_query($conn,"update quotation set is_mail_sent=1 where id='$QUOTATION_id'");
 $msg = 'Quotation Mail Sent Successfully';
header('Location:list-quotation.php?msg='.$msg);
}else{
 $alert_msg = 'Quotation Mail Not Sent';
header('Location:list-quotation.php?alert_msg='.$alert_msg);
}
}
include 'template.php';

?>