<?php
function main() { 
include 'dilg/cnt/join.php';
include 'global-functions.php';

session_start();

 $User_type=$_SESSION['USERTYPE'];

$ID=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');
$DATE = date('Y-m-d');
$TIME = date('H:i:s');

$job_id_enc=encrypt_decrypt('encrypt',$ID);
$job_order_id = $ID;

$select_job_order=mysqli_query($conn,"select * from job_order where id='$ID' ");

$row_job_order=mysqli_fetch_array($select_job_order);

$supervisor_name=$row_job_order['supervisor_name'];
$type_of_report=$row_job_order['type_of_report'];
$supervisor_id=$row_job_order['supervisor_id'];


$site_id=$row_job_order['site_id'];
$customer_id=$row_job_order['customer_id'];

$select_supervisor=mysqli_query($conn,"select * from user where Id='$supervisor_id'");

$row_supervisor=mysqli_fetch_array($select_supervisor);
$supervisor_mobile=$row_supervisor['UserName'];

if ($type_of_report!=1) {
$sel_rows=mysqli_query($conn,"select * from pestcontrol_report where job_order_id='$job_order_id' ");
}else{
    $sel_rows=mysqli_query($conn,"select * from watertank_report where job_order_id='$job_order_id' ");
}
$rows_R = mysqli_fetch_object($sel_rows);

foreach($rows_R as $K1=>$V1) $$K1 = $V1;

$report_id=$id;


$select_site=mysqli_query($conn,"select * from site where  id='$site_id'");

$row_site=mysqli_fetch_array($select_site);

$site_address=$row_site['site_address'];
$email_service=$row_site['email_service'];
$site_incharge_mail=$row_site['email'];

$select_customer=mysqli_query($conn,"select * from customers where id='$customer_id'");
$row_customer=mysqli_fetch_array($select_customer);

$customer_email=$row_customer['email'];



if ($infestation_level==0) {
 $infestationlevel="Low";
}elseif ($infestation_level==1) {
$infestationlevel="Medium";
}else{
  $infestationlevel="High";
}



$Date2 =date('d-M-Y h:i A', strtotime($currentTime));
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
  border: 1px solid #000;
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

$Type_client = "<b>PEST CONTROL INSPECTION & JOB COMPLETION REPORT</b> - SN".$job_order_id."<br> ".
      
      "<b>The details of your Job Order are given below: </b><br><br>";

$Type_supernova = "<b>PEST CONTROL INSPECTION & JOB COMPLETION REPORT </b> - SN".$job_order_id."<br> ".
      
      "<b>The details are given below: </b><br><br>";
      $message   .=  '<table style="width: 100%;">';
 $message   .=  '<table class="no-bdr" style="width: 60%;"><tr><td style="width:100%;"><table style="padding:0px;border:1px solid #000;width:100%;"><tr style="vertical-align: middle;"><td style="width:100%;" ><p class="adds-titl" style="text-align:center;"><a href="https://pestcontrol.mistcareer.com/" target="_blank" style="text-align:center;"><img src="https://pestcontrol.mistcareer.com/adminln/assets/images/Our/new_head_logo.png" width="850px;"></a></p></td></tr></table>';

$message   .=  '<table style="width:100%;border:1px solid #000;border-bottom: 0px;padding-bottom: 0px;" cellspacing="0px">
  <tr style="background-color:#0d577a;color:#fff;width:100%;">
<td style="width: 100%;padding:8px 3px;text-align: center;font-size: 18px;color:#fff;font-weight:700;">PEST CONTROL INSPECTION & JOB COMPLETION REPORT</td></tr>



</table>
<table  style="width: 100%;padding-top: 0px;border: 1px solid;border-top: 0px;">

<tr><td style="width:55%;border: 1px solid #000; " ><p class="adds-titl" style="line-height:2;font-size:14px;margin:2px 5px;" ><b>Client Name: '.$client_name.'</b><br><b>Address:  '.$address.'</b><br><b>Contact No : '.$mobile.'</b><br><b>Site Incharge:  '.$site_incharge.'</b><br><b>Visit No: '.$visit_no.'</b>
</p></td>
<td style="width:45%;border: 1px solid #000;" ><p class="adds-titl" style="line-height:2;font-size:14px;margin:2px 5px;" ><b>SL .NO: '.$sl_no.'</b><br><b>Date:  '.date("d-m-Y",strtotime($date)).'</b><br>';
if ($type_of_report!=1) {
   

$message   .=  '
<b>Start Time :  '.$start_time.'</b><br><b>End Time : '.$end_time.'</b>';
}else{
    $message   .=  '
<b>Start Date :  '.date("d-m-Y",strtotime($start_date)).'</b><br><b>End End Date : '.date("d-m-Y",strtotime($completed_date)).'</b>';
}
$message   .=  '
</p></td></tr>
</table>';
   if ( $type_of_report==0 || $type_of_report==1) {
$message   .=  '<table border="1" style="width:100%;"><tr><td style="background-color:#0d577a;padding:10px 10px;"></td></tr></table>';
}


$message   .=  '<table style="width:100%;" border=1>';

if($type_of_report==0){ 
 if ($inspection_details!='') {

$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Inspection Details: </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$inspection_details.'  </td>
 </tr>';

  }

   if ($sanitation_level!='') {

$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Sanitation Level: </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$sanitation_level.'  </td>
 </tr>';

  }

   if ($infestationlevel!='' && $type_of_report==0) {

$message   .=  ' <tr ><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Infestation Level: </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$infestationlevel.'  </td>
 </tr>';

  }


   if ($type_of_treatment!='') {

$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Type of Treatment: </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$type_of_treatment.'  </td>
 </tr>';

  }


  if ($area!='') {

$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Area of Treatment: </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$area.'  </td>
 </tr>';

  }

}elseif ($type_of_report==1) {

     if ($type_of_facility!='') {
$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Type of Facility: </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$type_of_facility.'  </td>
 </tr>';

  }

   if ($nature_of_job !='') {
$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Nature of Job: </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$nature_of_job.'  </td>
 </tr>';

  }

   if ($defects!='') {
$message   .=  ' <tr ><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Defects Found, Rectifications/ Actions Taken: </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$defects.'  </td>
 </tr>';

  }


   if ($chemical_used!='') {
$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Chemical Used :  </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$chemical_used.'  </td>
 </tr>';

  }

     if ($date_of_cleaning!='') {
$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Date of Cleaning :  </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.date("d-m-Y",strtotime($date_of_cleaning)).'  </td>
 </tr>';

  }


     if ($next_cleaning_date!='') {
$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Next Cleaning Date :  </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.date("d-m-Y",strtotime($next_cleaning_date)).'  </td>
 </tr>';

  }


     if ($gas_leveling_finding!='') {
$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Gas Level Finding :   </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$gas_leveling_finding.'  </td>
 </tr>';

  }

       if ($further_action!='') {
$message   .=  ' <tr style="padding:5px 5px;"><td style="line-height:1.8;font-size:13px;width:25%;padding:8px;border: 1px solid #000;">
 <b>Further Action Required : </b> </td>
<td style="line-height:1.8;font-size:13px;width:75%;padding:8px; border: 1px solid #000;">
 '.$further_action.'  </td>
 </tr>';

  }
   
}
$message   .=  '</table>';

if ($type_of_report!=1) {
  


$message   .=  '<table cellpadding="5px" style="border-collapse: collapse;
width: 100%;border: 0px solid #ddd;padding:10px 7px;text-align:center;">

<tr class="tr-head" style="background-color:#0d577a;color:#fff">
<th style="width:5%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">#</th>  


<th style="width:30%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Pestiside Used</th>  
<th style="width:30%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Concentration </th>  
<th style="width:35%; font-weight: 600;text-align:center;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Remarks</th> 
 

</tr>'; 
$SNo=0;
$sel_product=mysqli_query($conn,"select * from pestcontrol_report_product where pest_control_report_id='$report_id' ");
while($row_product=mysqli_fetch_array($sel_product))
{
  $SNo=$SNo+1;
 $concentration = $row_product['concentration'];
  $pestiside_used = $row_product['pestiside_used'];

  $product_remarks = $row_product['remarks'];
$message .= '<tr class="tr-head" style="color:#000;padding:10px;">
<td style="text-align:center;width:5%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;    padding: 10px;">'.$SNo.'</td> 
<td style="text-align:center;width:30%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$pestiside_used.'</td> 
<td style="text-align:center;width:30%; line-height:1.5;padding:3px;font-size:12px;border: 1px solid #000;">'.$concentration.'</td>
<td style="text-align:center;width:35%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$product_remarks.'</td>  
</tr>';

}

}else{
    $message   .=  '<table cellpadding="5px" style="border-collapse: collapse;
width: 100%;border: 0px solid #ddd;padding:10px 7px;text-align:center;">

<tr class="tr-head" style="background-color:#0d577a;color:#fff">
<th style="width:5%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">#</th>  

<th style="width:30%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Type of Tank & Quality </th> 
<th style="width:30%; font-weight: 600;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Size of Tank</th>   
<th style="width:35%; font-weight: 600;text-align:center;font-size:13px;border: 1px solid #000;border-bottom: 1px solid #000;">Location</th> 
 

</tr>'; 
$SNo=0;
$sel_product=mysqli_query($conn,"select * from watertank_report_product where watertank_report_id='$report_id' ");
while($row_product=mysqli_fetch_array($sel_product))
{
  $SNo=$SNo+1;
 $type_of_tank = $row_product['type_of_tank'];
  $size_of_tank = $row_product['size_of_tank'];

  $location = $row_product['location'];
$message .= '<tr class="tr-head" style="color:#000;padding:10px;">
<td style="text-align:center;width:5%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;    padding: 10px;">'.$SNo.'</td> 
<td style="text-align:left;width:30%; line-height:1.5;padding:3px;font-size:12px;border: 1px solid #000;"><b>'.$type_of_tank.'</b></td><td style="text-align:center;width:30%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$size_of_tank.'</td> 
<td style="text-align:center;width:35%;font-size:12px;border: 1px solid #000;border-bottom: 1px solid #000;">'.$location.'</td>  
</tr>';

}
}

 $message   .=  '</table>';
if($remarks!=''){
$message   .=  '<table nobr="true" cellpadding="0px" style="width:100%;border-spacing: 6px 5px;padding:10px 10px;border: 1px solid #000;border-bottom: 0px solid #000;">
<tr class="no-bdr" nobr="true"><td style="width:100%;font-size:13px;padding:10px 10px;" ><b>&nbsp;&nbsp;Remarks to Customers for Improvement :</b></td></tr>
                 <tr class="no-bdr"><td style="width:100%;font-size:13px;line-height:1.9;padding:5px;" class="terms">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$remarks.'
                </td></tr></table>';
}


  $message   .=  '<div style="padding:0px 9px 5px 9px;line-height:0;background-color:#e8e8e8;border: 2px solid #000;">          
<div style="display:flex;">
<div class="" style="width:50%;line-height:1.3;font-size:16px;text-align:left;" >
<br><br>
<p>Name: '.$supervisor_name.'</p>
<p>Mobile: '.$supervisor_mobile.'</p>
<b>Supervisor Signature</b>
</div>

<div class="" style="width:50%;line-height:1.3;font-size:16px;text-align:right;" >
<br><br>
<p>Name: '.$customer_sign_name.'</p>
<p>Mobile: +971  '.$customer_sign_mobile.'</p>
<b>Customer Signature</b>
</div>
</div>
</div>
';
$message .='
<table nobr="true" cellpadding="0px" style="width:100%;border-spacing: 6px 5px;padding:10px 10px;border: 1px solid #000;border-top: 0px solid #000;">
<tr><td style="width:100%;font-size:13px;padding:10px 10px;text-align:center;" >
<img src="https://pestcontrol.mistcareer.com/adminln/assets/images/Our/footer.png" width="60%">
</td>
</tr>
</table>
';


$message .='</td></tr></table><br>';

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

 $message   .=  '<table class="no-bdr" style="width: 60%;margin-top:10px;"><tr><td style="width:100%;"><table style="padding:0px;border:1px solid #000;width:100%;"><tr style="vertical-align: middle;"><td style="width:100%;" ><p class="adds-titl" style="text-align:center;"><a href="https://pestcontrol.mistcareer.com/" target="_blank" style="text-align:center;"><img src="https://pestcontrol.mistcareer.com/adminln/assets/images/Our/new_head_logo.png" width="850px;"></a></p></td></tr></table>';
 $message   .=  '<table style="padding: 7px 5px;width:100%;border:1px solid #000;border-bottom: 0px;padding-bottom: 0px;" cellspacing="0px">
</table>';

if($inspection_image1!=''){
$message .= '<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr bgcolor="#0d577a">
    <td colspan="3" align="center" style="color:white; font-size:18px;">
        <b>Inspection Pictures</b>
    </td>
</tr>';

$message .= '<tr>';

    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/job-inspection-images/'.$inspection_image1.'" width="200" height="150"></td>';

if($inspection_image2!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/job-inspection-images/'.$inspection_image2.'" width="200" height="150"></td>';
}
if($inspection_image3!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/job-inspection-images/'.$inspection_image3.'" width="200" height="150"></td>';
}
$message .= '</tr>';

$message .= '<tr>';
if($inspection_image4!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/job-inspection-images/'.$inspection_image4.'" width="200" height="150"></td>';
}
if($inspection_image5!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/job-inspection-images/'.$inspection_image5.'" width="200" height="150"></td>';
}
$message .= '</tr></table>';
}



if($before_image1!=''){
$message .= '<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr bgcolor="#0d577a">
    <td colspan="3" align="center" style="color:white; font-size:18px;">
        <b>Before Pictures</b>
    </td>
</tr>';

$message .= '<tr>';

    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/before-images/'.$before_image1.'" width="200" height="150"></td>';

if($before_image2!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/before-images/'.$before_image2.'" width="200" height="150"></td>';
}
if($before_image3!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/before-images/'.$before_image3.'" width="200" height="150"></td>';
}
$message .= '</tr>';

$message .= '<tr>';
if($before_image4!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/before-images/'.$before_image4.'" width="200" height="150"></td>';
}
if($before_image5!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/before-images/'.$before_image5.'" width="200" height="150"></td>';
}
$message .= '</tr></table>';
}



if($service_image1!=''){
$message .= '<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr bgcolor="#0d577a">
    <td colspan="3" align="center" style="color:white; font-size:18px;">
        <b>Service Pictures</b>
    </td>
</tr>';

$message .= '<tr>';

    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/service-images/'.$service_image1.'" width="200" height="150"></td>';

if($service_image2!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/service-images/'.$service_image2.'" width="200" height="150"></td>';
}
if($service_image3!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/service-images/'.$service_image3.'" width="200" height="150"></td>';
}
$message .= '</tr>';

$message .= '<tr>';
if($service_image4!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/service-images/'.$service_image4.'" width="200" height="150"></td>';
}
if($service_image5!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/service-images/'.$service_image5.'" width="200" height="150"></td>';
}
$message .= '</tr></table>';
}



if($after_image1!=''){
$message .= '<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr bgcolor="#0d577a">
    <td colspan="3" align="center" style="color:white; font-size:18px;">
        <b>After Pictures</b>
    </td>
</tr>';

$message .= '<tr>';

    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/after-images/'.$after_image1.'" width="200" height="150"></td>';

if($after_image2!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/after-images/'.$after_image2.'" width="200" height="150"></td>';
}
if($after_image3!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/after-images/'.$after_image3.'" width="200" height="150"></td>';
}
$message .= '</tr>';

$message .= '<tr>';
if($after_image4!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/after-images/'.$after_image4.'" width="200" height="150"></td>';
}
if($after_image5!=''){
    $message .= '<td width="33%" align="center" style="border:1px solid;padding:10px;"><img src="https://pestcontrol.mistcareer.com/adminln/uploads/after-images/'.$after_image5.'" width="200" height="150"></td>';
}
$message .= '</tr>';
}

$message .= '</table>';
$message .='
<table nobr="true" cellpadding="0px" style="width:100%;border-spacing: 6px 5px;padding:10px 10px;border: 1px solid #000;border-top: 0px solid #000;">
<tr><td style="width:100%;font-size:13px;padding:10px 10px;text-align:center;" >
<img src="https://pestcontrol.mistcareer.com/adminln/assets/images/Our/footer.png" width="60%">
</td>
</tr>
</table>
</table>';



if ($type_of_report==0) {
    

$select_instruction=mysqli_query($conn,"select * from safety_instructions");

$row_safety_instruction=mysqli_fetch_array($select_instruction);

$safety_instruction=$row_safety_instruction['safety_instruction'];

$message   .=  '<table class="no-bdr" style="margin-top:10px;width:60%;"><tr><td style="width:100%;"><table style="padding:0px;border:1px solid #000;width:100%;"><tr style="vertical-align: middle;"><td style="width:100%;" ><p class="adds-titl" style="text-align:center;"><a href="https://pestcontrol.mistcareer.com/" target="_blank" style="text-align:center;"><img src="https://pestcontrol.mistcareer.com/adminln/assets/images/Our/new_head_logo.png" width="850px;"></a></p></td></tr></table>';
 $message   .=  '<table style="padding: 7px 5px;width:100%;border:1px solid #000;border-bottom: 0px;padding-bottom: 0px;" cellspacing="0px">
</table>';


$message .= '<table border="1" cellpadding="5" width="100%" cellspacing="0" >
<tr bgcolor="#0d577a">
    <td colspan="3" align="center" style="color:white; font-size:18px;">
        <b>Pest Conrol Safety Instruction</b>
    </td>
</tr>
<tr>
    <td colspan="3" style="font-size:14px;line-height:40px;padding:10px;">
        '.$safety_instruction.'
    </td>
</tr>';


$message .= '</table>';

}
$Client_Message2='<div>
<div width="9" height="30"><br><br>&nbsp;Best regards, <br><br>    </div>
<div width="782" height="30"><strong><a href="https://pestcontrol.mistcareer.com/" style="color:#000;">&nbsp;Supernova</a> </strong>
<div width="10" height="30">&nbsp;</div>
</div>';


if ($type_of_report!=1) {
    $download_report="https://pestcontrol.mistcareer.com/export-pestcontrol-report.php?id=$job_id_enc";
}else{
     $download_report="https://pestcontrol.mistcareer.com/export-watertank-report.php?id=$job_id_enc";
}

$message   .=  '</table><table style="width: 60%;margin-top: 10px;"><tr><td style="border:0px solid;text-align:right;"><a style="    text-decoration: none; font-size:18px;" href="'.$download_report.'" target="_blank">Download Now..</a></td></tr></table></body></html>';
echo $message;

$subject="PEST CONTROL REPORT FOR SN".$job_order_id;
$supernova_subject="PEST CONTROL INSPECTION & JOB COMPLETION REPORT SN".$job_order_id;

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
$headers .= 'From: Supernova<noreply@mistcareer.com>' . "\r\n";
$headers .= 'Sender: <noreply@mistcareer.com>' . "\r\n";

$client_headers .= 'Reply-To: Supernova <noreply@mistcareer.com>' . "\r\n";
$supernova_headers = 'Reply-To: Supernova <noreply@mistcareer.com>' . "\r\n";
 $Client_Header=$headers.$client_headers;
$supernova_Header=$headers.$supernova_headers;
$Client_Message= $Type_client.$message.$Client_Message2;
$supernova_Message= $Type_supernova.$message;  


$res1 = mail($usr_mail,$subject,$Client_Message,$Client_Header,'-fnoreply@mistcareer.com');
$res2=mail($supernova_mail , $subject, $supernova_Message, $supernova_Header, '-fnoreply@mistcareer.com');


if ($User_type==2) {
   $location_url="supervisor-list-job.php";
}else{
     $location_url="list-job-order.php";
}
if ($res1 && $res2) {
   $update_job_order=mysqli_query($conn,"update job_order set is_mail_sent=1 where id='$job_order_id'");
 $msg = 'Job Order Report Mail Sent Successfully';
header('Location:'.$location_url.'?msg='.$msg);
}else{
 $alert_msg = 'Job Order Report Mail Not Sent';
header('Location:'.$location_url.'?alert_msg='.$alert_msg);
}

}
include 'template.php';
?>