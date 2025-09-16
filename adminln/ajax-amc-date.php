<?
extract($_REQUEST);
include 'dilg/cnt/join.php';
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');

$RowID= $_POST['RowID'];
$act=$_POST['act'];
if ($act=='amc') {


?>
   <div class="mt-3">
    <div class="date-c">
        <div class="w-50">
            <label class="form-label">From Date</label>
    <input type="date" id="modal_amcfrom" min="<?=$currentDate;?>" name="modal_amcfrom" class="font-14  form-control" required>
</div>
<div  class="w-50">
    <label class="form-label">To Date</label>
    <input type="date" id="modal_amcto"  min="<?=$currentDate;?>" name="modal_amcto" class="font-14 form-control" required>
</div>
    </div>  
</div>

<div  class="w-100 mt-3">
    <label class="form-label">AMC Description</label>
    <textarea class="form-control" id="modal_amc_description" name="modal_amc_description" placeholder="AMC Description" ></textarea>
    
</div>

<div>
    <button type="button" onclick="amcdata(<?=$RowID;?>)"  name="submit" class="btn btn-primary mt-3">OK</button>

</div>







<?}?>