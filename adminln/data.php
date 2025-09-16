<?
ob_start();
ob_clean();
session_start();
if($_SESSION['UID']=='' ) header('Location:index.php');
include 'dilg/cnt/join.php';
date_default_timezone_set("Asia/Kolkata");
$currentTime = date('Y-m-d H:i:s');
$currentDate = date('d-m-Y');
extract($_REQUEST);

$ID = $_GET['id'];
$order_id = $ID;

$sel_rows=mysqli_query($conn,"select * from quotation where id='$ID' ");
$rows_R = mysqli_fetch_object($sel_rows);

foreach($rows_R as $K1=>$V1) $$K1 = $V1;

$quotation_date=date('d-m-Y', strtotime($quotation_date));


$select_site=mysqli_query($conn,"select * from site where  id='$site_id'");

$row_site=mysqli_fetch_array($select_site);

$site_address=$row_site['site_address'];
$select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
$row_customer=mysqli_fetch_array($select_customer);
$customer_name=addslashes($row_customer['customer_name']);
$gst=$row_customer['gst'];
$address=addslashes($row_customer['address']);

$city=$row_customer['city'];

$mobile=$row_customer['mobile'];
$email=$row_customer['email'];



$htmlData   .=  '<style>
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
line-height: 10px !important;
font-size: 12px;
color:#000;

}
th, td {
  padding: 15px;
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
</style>';

if($OrderDate >= $Dates){
$product_amount = $product_amount + $discount_amount;
}
else{
$product_amount = $product_amount;
}

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

 $htmlData   .=  '<table style="padding:5px 5px;"><tr style="vertical-align: top;"><td style="width:30%;" ><img src="assets/images/Our/logo.png"></td><td width="70%" style="border:1px solid #000;"><p class="adds-titl" style="text-align:left;font-size:11px;line-height:15px;font-weight:normal;">&nbsp;&nbsp;<b>301, AL murar, Deira, </b><br>&nbsp;&nbsp;Dubai, UAE <br>&nbsp;&nbsp;Phone: +971 565115970<br>&nbsp;&nbsp;E-mail:info@supernovaemirates.com</p></td></tr></table>';


 $htmlData   .=  '<table style="padding:5px 5px;"><tr style="background-color:#0d577a;color:#fff"><td style="width:100%;" ><h1 style="text-align:center;font-size:14px;color:#fff;">QUOTATION DETAILS</h1></td></tr><tr><td style="width:100%;" ><p class="adds-titl" style="line-height:1.8;font-size:11px;" ><b>Quotation No: SN'.$ID.' '. $revised.'</b><br><b>Quotation Date: '.date('d-m-Y', strtotime($quotation_date)).' </b><br><b >Total Amount :  <span style="font-size:14px;"> AED '.$total_amount.' </span></b></p></td></tr>
                <tr><td style="width:50%;" ><p class="adds-titl" style="line-height:1.5;font-size:11px;" ><b>To,</b><br> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Company Name: </b>  '.$company_name.'<br>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Customer Name: </b>  '.$customer_name.'<br>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.wordwrap($address, 30, "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n").'-'.$city.'  </span></p></td>
                <td style="width:50%;"><p style="line-height:1.5;font-size:11px;" ><span><b>Site Name:</b> '.$site_name.'<br><b>Site Address:  </b>  '.wordwrap($site_address, 20, "<br />\n").'<br>Phone: <b>+971 '.$mobile.'</b><br>Mail:  <b>'.$email.'</b>  </span></p></td></tr></table>';


$htmlData   .=  '<table style="padding:4px;"><tr class="tr-head" class="head"> 

</tr></table><br><table cellpadding="3px" style="border-collapse: collapse;
width: 100%;border: 0px solid #ddd;padding:10px 7px;text-align:center;">

<tr class="tr-head" style="background-color:#0d577a;color:#fff">
<th style="width:4.5%; font-weight: 600;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;">#</th>  

<th style="width:19%; font-weight: 600;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;">Job Type </th>   
<th style="width:20%; font-weight: 600;text-align:center;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;">Duration</th> 

<th style="width:11%;text-align:center; font-weight: 600;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">Amount</th>   
<th style="width:8%; font-weight: 600;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">VAT (%)</th>  
<th style="width:28%;text-align:center; font-weight: 600;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;">Description </th> 
<th style="width:9.5%;text-align:center; font-weight: 600;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;">Total </th> 

</tr>'; 
$SNo=0;
$sel_product=mysqli_query($conn,"select * from quotation_product where quotation_id='$ID' ");
$taxamt=0;
$vatamt=0;
while($row_product=mysqli_fetch_array($sel_product))
{
  $SNo=$SNo+1;
  $job_type = $row_product['job_type'];
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

$htmlData .= '<tr class="tr-head" style="color:#000">
<td style="text-align:center;width:4.5%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$SNo.'</td> 
<td style="text-align:left;width:19%; padding: 0px;font-size:10px;border: 1px solid #000;line-height:2;"><b>'.$job_type.'</b></td>  
<td style="text-align:center;width:20%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$duration.$amc_details.'</td>  
<td style="text-align:center;width:11%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">AED '.number_format($amount, 2).'</td> 
<td style="text-align:center;width:8%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$vat.'%</td> 
<td style="text-align:center;width:28%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$description.''.$amc_Description.'</td>
<td style="text-align:center;width:9.5%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">AED '.$Total_amount.'</td></tr>';
}
$htmlData .= '</table>';
 

  $htmlData .= '<table cellpadding="6px" style="padding:10px;"><tr><td class="tb-row" style="width:61%; font-weight: normal;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;font-size:12px;text-align:center;"><table style="padding:7px;"><tr class="tr-head" style="background-color:#ffff92;color:#000">
</tr>';




$htmlData .= '</table></td><td class="tb-row" style="width:39%; font-weight: normal;background-color:#fff;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;font-size:11px;text-align:right;"><table cellpadding="7px" style="padding:8px;"><tr><td class="tb-row" style="width:60%; font-weight: normal;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;padding:15px;background-color:#ffff92;"><b>Taxable Amount</b></td>  

<td class="tb-row" style="width:40%; font-weight: normal;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;padding:15px;background-color:#ffff92;">AED '.number_format($taxamt, 2).'</td></tr>';





$htmlData .= '<tr ><td class="tb-row" style="width:60%; font-weight: normal;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;font-size:11px;text-align:right;"><b>VAT Amount</b></td>  

<td class="tb-row" style="width:40%; font-weight: normal;font-size:11px ;border: 1px solid #000;border-bottom: 1px solid #000;padding:15px;">AED '.number_format($vatamt, 2).'</td></tr>';


$htmlData .= '<tr ><td class="tb-row" style="width:60%; font-weight: normal;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;font-size:11px;background-color:#ffff92;text-align:right;"><b>Grand Total</b></td>  

<td class="tb-row" style="width:40%; font-weight: normal;font-size:11px ;border: 1px solid #000;border-bottom: 1px solid #000;background-color:#ffff92;padding:15px;">AED. '.$total_amount.'</td></tr></table>';

$htmlData .= '</td></tr></table>';

if($terms_condition!=''){
$htmlData   .=  '<table cellpadding="0px" style="border-spacing: 6px 5px;padding:5px 5px;border: 1px solid #000;border-bottom: 0px solid #000;">
<tr class="no-bdr" nobr="true"><td style="width:100%;font-size:12px;font" ><b>Terms & Conditions:</b></td></tr>
                 <tr class="no-bdr" nobr="true" style="padding:0px 5px;"><td style="width:100%;font-size:12px;line-height:25px;" >'.$terms_condition.'
                </td></tr></table>';
}


$htmlData   .=  '<table cellpadding="0px" style="background-color:#e8e8e8;border-spacing: 6px 5px;padding:5px 5px;border: 1px solid #000;border-bottom: 0px solid #000;padding-top:10px;">
<tr class="no-bdr" nobr="true"><td style="width:85%;font-size:12px;font" ><b>Bank Details:</b></td><td style=" width:15%;font-size:12px;" ><b style="margin-right:50px;">For Super Nova:</b></td></tr>
                 <tr class="no-bdr" nobr="true" style="padding:0px 5px;"><td style="width:11%;font-size:11px;" >Bank Name:
                </td><td style="width:16%;font-size:11px;"><b>Emirates NBD</b>
                </td></tr>
                 <tr class="no-bdr" nobr="true" style="padding:0px 5px;"><td style="width:11%;font-size:11px;" >ACC Name:
                </td>
                <td style="width:16%;font-size:11px;"><b>John Ahmed</b>
                </td></tr>
                 <tr class="no-bdr" nobr="true" style="padding:0px 5px;"><td style="width:11%;font-size:11px;" >ACC Number:
                </td>

                <td style="width:16%;font-size:11px;"><b>101020304050</b>
                </td></tr>
                <tr class="no-bdr" nobr="true" style="padding:0px 5px;"><td style="width:11%;font-size:11px;" >IBAN:
                </td>

                <td style="width:40%;font-size:11px;"><b>AE7600300000123456789012</b>
                </td></tr>
                <tr class="no-bdr" nobr="true" style="padding:0px 5px;"><td style="width:11%;font-size:11px;" >SWIFT Code:
                </td>

                <td style="width:16%;font-size:11px;"><b>ADCBAEAA</b>
                </td></tr>
                 <tr class="no-bdr" nobr="true" style="padding:0px 5px;"><td style="width:11%;font-size:11px;" >Branch:
                </td>
                 <td style="width:30%;font-size:11px;"><b>Deira Branch, Dubai</b>
                </td>

                <td style="width:56%;font-size:11px; text-align:right;"><b>Authorised Signatory</b>
                </td>
                </tr>

                </table>';



$htmlData   .=  '</body></html>';
echo $htmlData;

?>