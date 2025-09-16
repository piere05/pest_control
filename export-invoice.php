<?
ob_start();
ob_clean();
session_start();
if($_SESSION['UID']=='' ) header('Location:index.php');
include 'adminln/dilg/cnt/join.php';
include 'adminln/global-functions.php';
date_default_timezone_set("Asia/Kolkata");
$currentTime = date('Y-m-d H:i:s');
$currentDate = date('d-m-Y');
extract($_REQUEST);

$order_id = $_GET['id'];
$ID=encrypt_decrypt('decrypt',$order_id);

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

$address=addslashes($row_customer['address']);

$city=$row_customer['city'];

$mobile=$row_customer['mobile'];
$email=$row_customer['email'];


require_once('adminln/tcpdf/tcpdf.php'); 

class MYPDF extends TCPDF { 
public function Header() {
   $this->SetLineWidth(0.2);
        $this->Rect(5, 5, $this->getPageWidth()-10, $this->getPageHeight()-10); 
}

public function Footer() {
  $this->SetY(-25);
        $this->Image('adminln/assets/images/Our/footer.png', 12, $this->GetY(), $this->getPageWidth()-30, 0, 'PNG');
}



}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetTitle('Super Nova');

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT-9, PDF_MARGIN_TOP-23, PDF_MARGIN_RIGHT-9);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, 10);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('helvetica', '', 15); 

$pdf->AddPage();


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

 $htmlData   .=  '<table style="padding:10px 8px; outline:1px solid"><tr style="vertical-align: top;" class="no-bdr tr"><td style="width:100%;" class="no-right-bdr">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="adminln/assets/images/Our/new_head_logo.png" width="800px"></td> </tr></table>';


 $htmlData   .=  '<table style="padding:5px 5px;"><tr style="background-color:#0d577a;color:#fff"><td style="width:100%;" ><h1 style="text-align:center;font-size:14px;color:#fff;">QUOTATION DETAILS</h1></td></tr><tr><td style="width:100%;" ><p class="adds-titl" style="line-height:1.8;font-size:11px;" ><b>Quotation No: SN'.$ID.' '. $revised.'</b><br><b>Quotation Date: '.date('d-m-Y', strtotime($quotation_date)).' </b><br><b >Total Amount :  <span style="font-size:14px;"> AED '.$total_amount.' </span></b></p></td></tr>
                <tr><td style="width:50%;" ><p class="adds-titl" style="line-height:1.5;font-size:11px;" ><b>To,</b><br> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Company Name: </b>  '.$company_name.'<br>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Customer Name: </b>  '.$customer_name.'<br>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.wordwrap($address, 30, "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n").'-'.$city.'  </span></p></td>
                <td style="width:50%;"><p style="line-height:1.5;font-size:11px;" ><span><b>Site Name:</b> '.$site_name.'<br><b>Site Address:  </b>  '.wordwrap($site_address, 20, "<br />\n").'<br>Phone: <b>+971 '.$mobile.'</b><br>Mail:  <b>'.$email.'</b>  </span></p></td></tr></table>';


$htmlData   .=  '<table style="padding:4px;"><tr class="tr-head" class="head"> 

</tr></table><br><table cellpadding="3px" style="border-collapse: collapse;
width: 100%;border: 0px solid #ddd;padding:10px 7px;text-align:center;">

<tr class="tr-head" style="background-color:#0d577a;color:#fff">
<th style="width:4.5%; font-weight: 600;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;">#</th>  

<th style="width:20%; font-weight: 600;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;">Job Type </th> 
<th style="width:32%;text-align:center; font-weight: 600;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;">Scope of Work</th>   
<th style="width:18%; font-weight: 600;text-align:center;font-size:11px;border: 1px solid #000;border-bottom: 1px solid #000;">Duration</th> 

<th style="width:11%;text-align:center; font-weight: 600;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">Amount</th>   
<th style="width:5%; font-weight: 600;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">VAT</th>  

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

$htmlData .= '<tr class="tr-head" style="color:#000">
<td style="text-align:center;width:4.5%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$SNo.'</td> 
<td style="text-align:left;width:20%; padding: 0px;font-size:10px;border: 1px solid #000;line-height:2;"><b>'.wordwrap($job_type, 30, "<br />\n").'<br>'.wordwrap($description, 35, "<br />\n").'</b></td>  
<td style="text-align:left;width:32%;font-size:10px;line-height:1.7;border: 1px solid #000;border-bottom: 1px solid #000;">'.$scope_of_work.'</td>
<td style="text-align:center;width:18%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$duration.$amc_details.'<br>
'.$amc_Description.'</td>  
<td style="text-align:center;width:11%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">AED '.number_format($amount, 2).'</td> 
<td style="text-align:center;width:5%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$vat.'%</td> 

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
$htmlData   .=  '<table nobr="true" cellpadding="0px" style="border-spacing: 6px 5px;padding:5px 5px;">
<tr class="no-bdr"><td style="width:100%;font-size:14px;font" ><b>Terms & Conditions:</b></td></tr>
                 <tr class="no-bdr" style="padding:0px 5px;"><td style="line-height:2;width:100%;font-size:11px;" >'.$terms_condition.'
                </td></tr></table>';
}


$htmlData   .=  '<table cellpadding="0px" style="background-color:#e8e8e8;border-spacing: 6px 5px;border: 1px solid #000;border-bottom: 0px solid #000;padding-top:10px;">
<tr class="no-bdr" nobr="true">

<td style="width:50%;font-size:12px;line-height:20px;" ><b>Bank Details:</b><br>
Bank Name  :   <b>ABU DHABI COMMERCIAL BANK</b><br>
ACC Name   :   <b>SUPER NOVA PESTS CONTROL SER LLC</b><br>
ACC Number :   <b>12516020920001</b><br>
IBAN       : <b>AE410030012516020920001</b><br>
BIC/SWIFT  : <b>ADCBAEAAXXX</b><br>
Branch Name: <b>257 / MALL OF THE EMIRATES - DUBAI</b>
</td>



<td style=" width:50%;font-size:12px;text-align:right;" ><b style="margin-right:50px;">For Super Nova:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<br><br>
<img src="adminln/assets/images/Our/sign.png" width="150px"><br>
<b>Authorised Signatory &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>

</td>

</tr></table>';



$htmlData   .=  '</body></html>';

$pdf->writeHTML($htmlData, true, false, true, false, '');

$pdf->lastPage();

$pdf_file_name = "SN<?=$ID;?>-<?=$company_name;?>-$quotation_date.pdf";


$pdf->Output($pdf_file_name, 'I');