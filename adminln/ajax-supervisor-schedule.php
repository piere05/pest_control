<?
extract($_REQUEST);
include 'dilg/cnt/join.php';
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');
 $ID = $_POST['id'];
 $date=$_POST['date'];



if ($ID && $date !='') {


$select_inspection=mysqli_query($conn,"select * from leads where supervisor_id='$ID' and inspection_date='$date' and inspection_status!='1'");
if (mysqli_num_rows($select_inspection)>>0) {

?>

<div class="w-25">
	<h6><b>Supervisor Inspection Schedule</b></h6>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr class="table-active">
      <th scope="col">Sno</th>
      <th scope="col">Inspection Date</th>
      <th scope="col">Inspection Visiting Time</th>
   
    </tr>
  </thead>
  <tbody>

  	<?
  	$sno=0;
while($row_inspection=mysqli_fetch_array($select_inspection)){

$sno=$sno+1;

$inspection_date=$row_inspection['inspection_date'];
$inspection_time=$row_inspection['inspection_time'];
$inspection_status=$row_inspection['status'];

  	?>
    <tr>
      <th scope="row"><?=$sno;?></th>
      <td><?=date('d-m-Y',strtotime($inspection_date));?></td>
      <td><?=$inspection_time;?></td>
     
    </tr>

    <?}?>
    </tbody>
</table>
</div>



<?


	
}

}
?>