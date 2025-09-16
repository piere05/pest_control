<?
extract($_REQUEST);
include 'dilg/cnt/join.php';
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');
  $ID = $_POST['id'];
 $date=$_POST['job_date'];



if ($ID!='') {


$select_job_order=mysqli_query($conn,"select * from job_order where supervisor_id='$ID' and job_date='$date'  and status!='3'");

if (mysqli_num_rows($select_job_order)>>0) {

?>

<div class="w-100">
	<h6><b>Supervisor Job Schedule</b></h6>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr class="table-active">
      <th scope="col">Sno</th>
      <th scope="col">Job Date</th>
      <th scope="col">Job Time</th>
   
    </tr>
  </thead>
  <tbody>

  	<?
  	$sno=0;
while($row_job_order=mysqli_fetch_array($select_job_order)){

$sno=$sno+1;

$job_date=$row_job_order['job_date'];
$job_time=$row_job_order['job_time'];

  	?>
    <tr>
      <th scope="row"><?=$sno;?></th>
      <td><?=date('d-m-Y',strtotime($job_date));?></td>
      <td><?=$job_time;?></td>
     
    </tr>

    <?}?>
    </tbody>
</table>
</div>



<?


	
}

}
?>