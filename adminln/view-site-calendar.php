<?php
function main() {
extract($_REQUEST);
include 'dilg/cnt/join.php';
include 'global-functions.php';
$ID=$_GET['id'];
$Act=$_GET['act'];
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('Y-m-d H:i:s');

?>

<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
  

<div class="ms-auto">
<div class="col">
<a href="site-report.php" class="btn btn-danger">Back</a>

</div>
</div>
</div>
<hr/>



<div class="col-xl-7 col-lg-7 col-md-12">
  <div class="dashboard-list-wraps-head br-bottom py-3 px-3 bg-fff">
<div class="dashboard-list-wraps-flx">
<h4 class="mb-0 ft-medium fs-md">Site Job Order Calendar</h4>  
</div>
</div>
<? if($msg !=''){ ?> <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
<div class="d-flex align-items-center">
<div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
</div>
<div class="ms-3">

<div class="text-white" style="font-size: 14px;"><?=$msg; ?></div>
</div>
</div>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 10px;"></button>
</div> <? } ?>
  <div class="card">
<div class="card-body">
<div class="table-responsive">
<div id='calendar'></div>
</div>
<div class="dsd-single-book-footer">
<p class="note-p colr-red"></p><p class="note-tit">Upcoming/ Pending </p>
<p class="note-p colr-orange ml-30"></p><p class="note-tit"> Ongoing</p><p class="note-p colr-green ml-30"></p><p class="note-tit"> Completed</p></div>
</div>
</div>
</div>



<?php
}
include 'template.php';
?>

<script>
$(document).ready(function() {
   $('#calendar').fullCalendar({
       editable: true,
       header: {
           left: 'prev,next',
           center: 'title',
           right: 'month,agendaWeek,agendaDay'
       },
       events: 'load.php?site_id=<?=$ID;?>',
       selectable: true,
       selectHelper: true,
       eventClick: function(event) {
           var id = event.id;
           var status = event.status; 
           if(status == 'Completed' || status == 'Approved'){
               $('#login').modal('hide');
           }
       },
       eventRender: function(event, element) {
           element.find('.fc-title').prepend(event.title + '<br>');
       }
   });
});
</script>
