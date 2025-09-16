<?
ob_start();
ob_clean();
session_start();
include 'adminln/dilg/cnt/join.php';
include 'adminln/global-functions.php';
date_default_timezone_set("Asia/Kolkata");
$currentTime = date('Y-m-d H:i:s');
$currentDate = date('d-m-Y');
extract($_REQUEST);

$order_id = $_GET['id'];
$ID=encrypt_decrypt('decrypt',$order_id);



$sel_rows=mysqli_query($conn,"select * from pestcontrol_report where job_order_id='$ID' ");

$rows_R = mysqli_fetch_object($sel_rows);

foreach($rows_R as $K1=>$V1) $$K1 = $V1;

$job_order_date=date('d-m-Y', strtotime($job_order_date));


$report_id=$id;


if ($infestation_level==0) {
 $infestationlevel="Low";
}elseif ($infestation_level==1) {
$infestationlevel="Medium";
}else{
  $infestationlevel="High";
}
$select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
$row_customer=mysqli_fetch_array($select_customer);
$email=$row_customer['email'];


$select_job_order=mysqli_query($conn,"select * from job_order where id='$ID' ");

$row_job_order=mysqli_fetch_array($select_job_order);

$supervisor_name=$row_job_order['supervisor_name'];
$supervisor_id=$row_job_order['supervisor_id'];

$select_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");

$row_supervisor=mysqli_fetch_array($select_supervisor);
$supervisor_mobile=$row_supervisor['UserName'];

$type=$row_job_order['type_of_report'];

require_once('adminln/tcpdf/tcpdf.php'); 

class MYPDF extends TCPDF { 
public function Header() {
   $this->SetLineWidth(0.2); // border thickness
        $this->Rect(5, 5, $this->getPageWidth()-10, $this->getPageHeight()-10); 
}

public function Footer() {
  $this->SetY(-25);


        $this->Image('adminln/assets/images/Our/footer.png', 15, $this->GetY(), $this->getPageWidth()-30, 0, 'PNG');
}


}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->Rect(10, 10, 50, 10, 'D');
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetTitle('Super Nova');

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT-9, PDF_MARGIN_TOP-23, PDF_MARGIN_RIGHT-9);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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

.border-left-n{
  border-left:none;
}

.border-right-n{
  border-right:none;
}
.head{
background-color:#0d577a;
color:#fff;
}

.h6{
  padding-bottom:1px;
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

.no-left-bdr{
    border-left: none;
}

.no-right-bdr{
    border-right: none;
}
.li-line li{
  line-height:1.3;
}
</style>';




 $htmlData   .=  '<table style="padding:10px 8px; outline:1px solid"><tr style="vertical-align: top;" class="no-bdr tr"><td style="width:100%;" class="no-right-bdr">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="adminln/assets/images/Our/new_head_logo.png" width="850px"></td> </tr></table>';


 $htmlData   .=  '<table style="padding:5px 5px;">
 <tr style="" class="no-bdr tr"><td style="width:100%;"><h2 style="text-align:center;font-size:16px;padding:10px; border-radius:10px;background-color:#0d577a;color:white;">PEST CONTROL INSPECTION & JOB COMPLETION REPORT</h2></td></tr>


 <tr class=""><td style="width:55%;" ><p class="adds-titl" style="line-height:1.8;font-size:13px;" ><b>Client Name:  '.$client_name.' </b><br><b>Address:   '.$address.'</b><br><b >Contact  No :  '.$mobile.' </b><br><b >Site Incharge :  '.$site_incharge.' </b><br><b >Visit No:  '.$visit_no.'</b></p></td>
 <td style="width:45%;" ><p class="adds-titl" style="line-height:1.8;font-size:13px;" ><b>SL.NO: '.$sl_no.'</b><br><b >Date :  '.date("d-m-Y",strtotime($date)).'</b>
 <br><b >Start Time :  '.$start_time.'</b><br>
<b>End Time :  '.$end_time.'<span style="font-size:12px;"> </span></b></p></td></tr>
                </table>';
if ($type!=2) {
  

$htmlData   .=  '<table style="padding:5px 5px;"><tr class=""><td style="background-color:#0d577a;"></td></tr></table>';
}
$htmlData   .=  '<table style="padding:5px 5px;">';
 

 if ($inspection_details!='') {

$htmlData   .=  ' <tr class=""><td style="line-height:1.8;font-size:13px;width:25%;">
 <b>Inspection Details: </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;">
 '.$inspection_details.'  </td>
 </tr>';

  }

   if ($sanitation_level!='') {
 $htmlData   .=  ' <tr class=""><td style="line-height:1.8;font-size:13px;width:25%;">
 <b>Sanitation Level : </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;">
 '.$sanitation_level.'  </td>
 </tr>';

}
 if ($infestationlevel!='' && $type!=2) {
 $htmlData   .=  '  <tr class=""><td style="line-height:1.8;font-size:13px;width:25%;">
 <b>Infestation Level : </b> </td>
 <td style="line-height:1.8;font-size:13px;width:75%;">
 '.$infestationlevel.'  </td>

 </tr>';
}

 if ($type_of_treatment!='') {

 $htmlData   .=  '   <tr class=""><td style="line-height:1.8;font-size:13px;width:25%;">
 <b>Type of Treatment : </b> </td>
 <td style="line-height:1.8;font-size:13px;width:75%;">
 '.$type_of_treatment.' </td>
 </tr>';
}
$htmlData   .=  '</table><br><br><table style="padding:4px;padding-top:10px;"><tr class="tr-head" class="head"> 

</tr></table><br><table cellpadding="3px" style="border-collapse: collapse;
width: 100%;border: 0px solid #ddd;padding:10px 7px;text-align:center;">

<tr class="tr-head" style="background-color:#0d577a;color:#fff">
<th style="width:5%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;"><b>#</b></th>  

<th style="width:30%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;"><b>Area of treatment</b></th>   
<th style="width:30%; font-weight: 600;text-align:center;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;"><b>Pestiside Used</b></th> 

<th style="width:35%;text-align:center; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;"><b>Remarks</b></th>   

</tr>'; 
$SNo=0;
$sel_product=mysqli_query($conn,"select * from pestcontrol_report_product where pest_control_report_id='$report_id' ");

while($row_product=mysqli_fetch_array($sel_product))
{
  $SNo=$SNo+1;
  $area = $row_product['area'];
  $pestiside_used = $row_product['pestiside_used'];
  $product_remarks = $row_product['remarks'];

 
$htmlData .= '<tr class="tr-head" style="color:#000">
<td style="text-align:center;width:5%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$SNo.'</td> 
<td style="text-align:center;width:30%; padding: 0px;font-size:10px;border: 1px solid #000;line-height:2;"><b>'.$area.'</b></td>  
<td style="text-align:center;width:30%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$pestiside_used.'</td>  
<td style="text-align:center;width:35%;font-size:10px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$product_remarks.'</td> 
</tr>';
}
$htmlData .= '</table>';
 
if($remarks!=''){
$htmlData   .=  '<table cellpadding="0px" style="border-spacing: 6px 5px;padding:5px 5px;border: 1px solid #000;border-bottom: 0px solid #000;">
<tr class="no-bdr" nobr="true"><td></td></tr>
<tr class="no-bdr" nobr="true"><td style="width:100%;font-size:14px;font" ><b>Remarks to Customers for Improvement :</b></td></tr>
                 <tr class="no-bdr" nobr="true" style="padding:0px 5px;"><td style="width:100%;font-size:14px;line-height:25px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$remarks.'
                </td></tr></table>';
}



$htmlData   .=  '<table cellpadding="0px" style="background-color:#e8e8e8;border-spacing: 6px 5px;padding:5px 5px;border: 1px solid #000;border-bottom: 0px solid #000;padding-top:10px;">


                <tr class="no-bdr" nobr="true"><td style="width:100%;font-size:12px;font" ><b></b></td></tr>
              
                 <tr class="no-bdr" nobr="true"><td style="width:100%;font-size:12px;font" ><b></b></td></tr>
             
               <tr class="no-bdr" nobr="true">

<td style="width:42%;line-height:1.8;font-size:12px;font" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Name: '.$supervisor_name.'</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Mobile: '.$supervisor_mobile.'</b></td>

<td style="width:55%;line-height:1.8;font-size:12px;text-align:right;" ><b>Name: '.$customer_sign_name.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><b>Mobile: +971 '.$customer_sign_mobile.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>



               </tr>

                 <tr class="no-bdr" nobr="true" style="padding:0px 5px;">
                 <td style="width:42%;font-size:14px;">
              <b>Supervisor Signature</b>
                </td>

                <td style="width:55%;font-size:14px; text-align:right;"><b>Customer Signature</b>
                </td>
                </tr>

                </table>';



$htmlData   .=  '</body></html>';


 $htmlData1   .=  '<table style="padding:10px 8px; outline:1px solid"><tr style="vertical-align: top;" class="no-bdr tr"><td style="width:100%;" class="no-right-bdr">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="adminln/assets/images/Our/head_logo1.png" width="850px"></td> </tr></table>';

$select_job_details=mysqli_query($conn,"select * from job_order_details where job_order_id='$ID'");
$row_job_details=mysqli_fetch_array($select_job_details);

$inspection_image1=$row_job_details['inspection_image1'];
$inspection_image2=$row_job_details['inspection_image2'];
$inspection_image3=$row_job_details['inspection_image3'];
$inspection_image4=$row_job_details['inspection_image4'];
$inspection_image5=$row_job_details['inspection_image5'];


$before_image1=$row_job_details['before_image1'];
$before_image2=$row_job_details['before_image2'];
$before_image3=$row_job_details['before_image3'];
$before_image4=$row_job_details['before_image4'];
$before_image5=$row_job_details['before_image5'];


$service_image1=$row_job_details['service_image1'];
$service_image2=$row_job_details['service_image2'];
$service_image3=$row_job_details['service_image3'];
$service_image4=$row_job_details['service_image4'];
$service_image5=$row_job_details['service_image5'];

$after_image1=$row_job_details['after_image1'];
$after_image2=$row_job_details['after_image2'];
$after_image3=$row_job_details['after_image3'];
$after_image4=$row_job_details['after_image4'];
$after_image5=$row_job_details['after_image5'];

 if ($before_image1!='' && $after_image1!='') {
$htmlData1   .=  '<br><br><table border="1" cellpadding="5" cellspacing="0"><tr><td width="50%" bgcolor="#0d577a" align="center" style="color:white; font-size:16px;">
      <b>Before Pictures</b>
    </td><td width="50%" bgcolor="#0d577a" align="center" style="color:white; font-size:16px;">
      <b>After Pictures</b>
    </td>
  </tr>';


 if ($before_image1!='' || $after_image1!='') {
$htmlData1   .=  '<tr>';

$htmlData1   .=  '<td width="50%;text-align:center;" align="center">';
  if ($before_image1!='') {
  $htmlData1   .=  '<img src="adminln/uploads/before-images/'.$before_image1.'" width="200px" height="140px">';
 }else{
    $htmlData1   .=  ' - ';
 }
$htmlData1   .=  '</td><td width="50%;text-align:center;" align="center">';

   if ($after_image1!='') {
  $htmlData1   .=  '<img src="adminln/uploads/after-images/'.$after_image1.'" width="200px" height="140px">';
 }else{
    $htmlData1   .=  ' - ';
 }
 $htmlData1   .=  '</td></tr>';
}

 if ($before_image2!='' || $after_image2!='') {
 $htmlData1   .=  '<tr><td width="50%;" align="center" >';
        if($before_image2!=''){      
$htmlData1   .=  '<img src="adminln/uploads/before-images/'.$before_image2.'" width="200px" height="140px" >';
       }else{
    $htmlData1   .=  ' - ';
 }
       $htmlData1   .=  '</td><td width="50%;text-align:center;" align="center">';

if ($after_image2!='') {
  $htmlData1   .=  '<img src="adminln/uploads/after-images/'.$after_image2.'" width="200px" height="140px">';
 }else{
    $htmlData1   .=  ' - ';
 }
$htmlData1   .=  '</td></tr>';
}

 if ($before_image3!='' || $after_image3!='') {
$htmlData1   .=  '<tr><td width="50%;text-align:center;" align="center">';
           if($before_image3!=''){
$htmlData1   .=  '<img src="adminln/uploads/before-images/'.$before_image3.'" width="200px" height="140px">';
       }else{
    $htmlData1   .=  ' - ';
 }
$htmlData1   .=  '</td><td width="50%;text-align:center;" align="center">';
       if ($after_image3!='') {
  $htmlData1   .=  '<img src="adminln/uploads/after-images/'.$after_image3.'" width="200px" height="140px">
    ';
 }else{
    $htmlData1   .=  ' - ';
 }
       $htmlData1   .=  '</td></tr>';
   }

 if ($before_image4!='' || $after_image4!='') {
    $htmlData1   .=  '   <tr><td width="50%;text-align:center;" align="center">';
      if($before_image4!=''){
$htmlData1   .=  '<img src="adminln/uploads/before-images/'.$before_image4.'" width="200px" height="140px">';
 }else{
    $htmlData1   .=  ' - ';
 }
$htmlData1   .=  '</td><td width="50%;text-align:center;" align="center">';

 if ($after_image4!='') {
  $htmlData1   .=  '<img src="adminln/uploads/after-images/'.$after_image4.'" width="200px" height="140px">
    ';
 }else{
    $htmlData1   .=  ' - ';
 }
 $htmlData1   .=  '</td></tr>';

}
 if ($before_image5!='' || $after_image5!='') {
 $htmlData1   .=  '<tr><td width="50%;text-align:center;" align="center">';
    if($before_image5!=''){
$htmlData1   .=  '<img src="adminln/uploads/before-images/'.$before_image5.'" width="200px" height="140px">';
       }else{
    $htmlData1   .=  ' - ';
 }
       $htmlData1   .=  '</td><td width="50%;text-align:center;" align="center">';
       if ($after_image5!='') {
  $htmlData1   .=  '
<img src="adminln/uploads/after-images/'.$after_image5.'" width="200px" height="140px">
    ';
 }else{
    $htmlData1   .=  ' - ';
 }
$htmlData1   .=  '</td></tr>';
}
       $htmlData1   .=  '</table>';

}



//aSSASAS
 if ($inspection_image1!='' && $service_image1!='') {
      $htmlData2   .=  '<br><br><table border="1" cellpadding="5" cellspacing="0"><tr><td width="50%" bgcolor="#0d577a" align="center" style="color:white; font-size:16px;">
      <b>Inspection Pictures</b>
    </td><td width="50%" bgcolor="#0d577a" align="center" style="color:white; font-size:16px;">
      <b>Service Pictures</b>
    </td>
  </tr>';

  
 if ($inspection_image1!='' || $service_image1!='') {
$htmlData2   .=  '<tr>';

$htmlData2   .=  '<td width="50%;text-align:center;" align="center">';
  if ($inspection_image1!='') {
  $htmlData2   .=  '<img src="adminln/uploads/job-inspection-images/'.$inspection_image1.'" width="200px" height="140px">';
 }else{
    $htmlData2   .=  ' - ';
 }
$htmlData2   .=  '</td><td width="50%;text-align:center;" align="center">';

   if ($service_image1!='') {
  $htmlData2   .=  '<img src="adminln/uploads/service-images/'.$service_image1.'" width="200px" height="140px">';
 }else{
    $htmlData2   .=  ' - ';
 }
 $htmlData2   .=  '</td></tr>';
}

 if ($inspection_image2!='' || $service_image2!='') {
 $htmlData2   .=  '<tr><td width="50%;" align="center" >';
        if($inspection_image2!=''){      
$htmlData2   .=  '<img src="adminln/uploads/job-inspection-images/'.$inspection_image2.'" width="200px" height="140px" >';
       }else{
    $htmlData2   .=  ' - ';
 }
       $htmlData2   .=  '</td><td width="50%;text-align:center;" align="center">';

if ($service_image2!='') {
  $htmlData2   .=  '<img src="adminln/uploads/service-images/'.$service_image2.'" width="200px" height="140px">';
 }else{
    $htmlData2   .=  ' - ';
 }
$htmlData2   .=  '</td></tr>';
}

 if ($inspection_image3!='' || $service_image3!='') {
$htmlData2   .=  '<tr><td width="50%;text-align:center;" align="center">';
           if($inspection_image3!=''){
$htmlData2   .=  '<img src="adminln/uploads/job-inspection-images/'.$inspection_image3.'" width="200px" height="140px">';
       }else{
    $htmlData2   .=  ' - ';
 }
$htmlData2   .=  '</td><td width="50%;text-align:center;" align="center">';
       if ($service_image3!='') {
  $htmlData2   .=  '<img src="adminln/uploads/service-images/'.$service_image3.'" width="200px" height="140px">
    ';
 }else{
    $htmlData2   .=  ' - ';
 }
       $htmlData2   .=  '</td></tr>';
   }

 if ($inspection_image4!='' || $service_image4!='') {
    $htmlData2   .=  '   <tr><td width="50%;text-align:center;" align="center">';
      if($inspection_image4!=''){
$htmlData2   .=  '<img src="adminln/uploads/job-inspection-images/'.$inspection_image4.'" width="200px" height="140px">';
 }else{
    $htmlData2   .=  ' - ';
 }
$htmlData2   .=  '</td><td width="50%;text-align:center;" align="center">';

 if ($service_image4!='') {
  $htmlData2   .=  '<img src="adminln/uploads/service-images/'.$service_image4.'" width="200px" height="140px">
    ';
 }else{
    $htmlData2   .=  ' - ';
 }
 $htmlData2   .=  '</td></tr>';

}
 if ($inspection_image5!='' || $service_image5!='') {
 $htmlData2   .=  '<tr><td width="50%;text-align:center;" align="center">';
    if($inspection_image5!=''){
$htmlData2   .=  '<img src="adminln/uploads/job-inspection-images/'.$inspection_image5.'" width="200px" height="140px">';
       }else{
    $htmlData2   .=  ' - ';
 }
       $htmlData2   .=  '</td><td width="50%;text-align:center;" align="center">';
       if ($service_image5!='') {
  $htmlData2   .=  '
<img src="adminln/uploads/service-images/'.$service_image5.'" width="200px" height="140px">
    ';
 }else{
    $htmlData2   .=  ' - ';
 }
$htmlData2   .=  '</td></tr>';
}
       $htmlData2   .=  '</table>';

}
//sdada


$select_instruction=mysqli_query($conn,"select * from safety_instructions");

$row_safety_instruction=mysqli_fetch_array($select_instruction);

$safety_instruction=$row_safety_instruction['safety_instruction'];

 $htmlData3   .=  '<table style="padding:10px 8px; outline:1px solid"><tr style="vertical-align: top;" class="no-bdr tr"><td style="width:100%;" class="no-right-bdr">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="adminln/assets/images/Our/head_logo1.png" width="850px"></td> </tr></table>';


    $htmlData3   .=  '<table border="1" cellpadding="5" cellspacing="0"><tr>
    <td width="100%" bgcolor="#0d577a" align="center" style="color:white; font-size:16px;">
      <b> Pest Conrol Safety Instruction</b>
    </td>

    <span style="padding-right:10px;">'.$safety_instruction.'</span></tr>

  </table>';


$pdf->writeHTML($htmlData, true, false, true, false, '');


$pdf->AddPage();


$pdf->writeHTML($htmlData1, true, false, true, false, '');
if ($before_image1!="" || $after_image1!="") {
$pdf->AddPage();
$pdf->writeHTML($htmlData2, true, false, true, false, '');
}
if ($type!=2) {
$pdf->AddPage();
$pdf->writeHTML($htmlData3, true, false, true, false, '');
 $pdf->lastPage();
}
$jobdate=date('d-m-Y',strtotime($date));
if ($pdf->GetY() < PDF_MARGIN_BOTTOM) {
    $pdf->deletePage($pdf->getPage());
}
$pdf_file_name = "SN<?=$ID;?>-<?=$client_name;?>-<?=$jobdate;?>.pdf";
$pdf->Output($pdf_file_name, 'I');