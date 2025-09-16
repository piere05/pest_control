<?
$Pagename=basename($_SERVER['PHP_SELF']); 

$user_type=$_SESSION['USERTYPE'];

?>
<div class="sidebar-wrapper" data-simplebar="true">
<div class="sidebar-header">
<div style="width: 100%;text-align: center;">
<a href="home.php" class="logo-title">	<img src="assets/images/Our/logo.png" class="logo-icon width-100 pad-10" alt="logo icon" style="width: 180px !important;margin: 0px auto;display: block;" ></a>
</div>



<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
</div>
</div>
<!--navigation-->
<ul class="metismenu" id="menu">
<li class="<? if($Pagename=='home.php') { ?>mm-active<? } ?>">
<a href="home.php">
<div class="parent-icon"><i class='bx bx-home-circle'></i>
</div>
<div class="menu-title">Dashboard</div>
</a>
</li>


<?if ($user_type<='1') {?>
<li>
<a href="javascript:;" class="has-arrow" aria-expanded="false">
<div class="parent-icon"><i class="bx bx-repeat"></i>
</div>
<div class="menu-title">Manage Master</div>
</a>
<ul>
	<li class="<? if($Pagename=='manage-customer.php') { ?>mm-active<? } ?>"> <a href="manage-customer.php"><i class="bx bx-right-arrow-alt"></i>Manage Customer</a></li>
<li class="<? if($Pagename=='manage-site.php') { ?>mm-active<? } ?>"> <a href="manage-site.php"><i class="bx bx-right-arrow-alt"></i>Manage Site</a></li>
<li class="<? if($Pagename=='manage-lead-type.php') { ?>mm-active<? } ?>"> <a href="manage-lead-type.php"><i class="bx bx-right-arrow-alt"></i>Manage Lead Type</a></li>

<li class="<? if($Pagename=='manage-job-type.php') { ?>mm-active<? } ?>"> <a href="manage-job-type.php"><i class="bx bx-right-arrow-alt"></i>Manage Job Type</a></li>

<li class="<? if($Pagename=='manage-pestiside-used.php') { ?>mm-active<? } ?>"> <a href="manage-pestiside-used.php"><i class="bx bx-right-arrow-alt"></i>Manage Pestiside Used</a></li>

<li class="<? if($Pagename=='manage-safety-instruction.php') { ?>mm-active<? } ?>"> <a href="manage-safety-instruction.php"><i class="bx bx-right-arrow-alt"></i>Manage Safety Instruction </a></li>

<?
if ($user_type==0) {
?>
<li class="<? if($Pagename=='manage-users.php') { ?>mm-active<? } ?>"> <a href="manage-users.php"><i class="bx bx-right-arrow-alt"></i>Manage Users</a></li>
<?}?>
</ul>
</li>


 <li>
<a href="javascript:;" class="has-arrow" aria-expanded="false">
<div class="parent-icon"><i class="bx bx-coin-stack"></i>
</div>
<div class="menu-title">Manage Leads</div>
</a>
<ul>

<li class="<? if($Pagename=='create-leads.php') { ?>mm-active<? } ?>"> <a href="create-leads.php"><i class="bx bx-right-arrow-alt"></i>Add Lead</a></li>
<li class="<? if($Pagename=='list-leads.php' || $Pagename=='view-leads.php') { ?>mm-active<? } ?>"> <a href="list-leads.php"><i class="bx bx-right-arrow-alt"></i>List Leads</a></li>

<li class="<? if($Pagename=='list-inspection.php' || $Pagename=='update-inspection.php') { ?>mm-active<? } ?>"> <a href="list-inspection.php"><i class="bx bx-right-arrow-alt"></i>Manage Inspection</a></li>

</ul>
</li>


 <li>
<a href="javascript:;" class="has-arrow" aria-expanded="false">
<div class="parent-icon"><i class="bx bxs-book"></i>
</div>
<div class="menu-title">Manage Quotation</div>
</a>
<ul>

<li class="<? if($Pagename=='create-quotation.php') { ?>mm-active<? } ?>"> <a href="create-quotation.php"><i class="bx bx-right-arrow-alt"></i>Add Quotation</a></li>
<li class="<? if($Pagename=='list-quotation.php' || $Pagename=='view-quotation.php') { ?>mm-active<? } ?>"> <a href="list-quotation.php"><i class="bx bx-right-arrow-alt"></i>List Quotaion</a></li>

</ul>
</li>


<li class="<? if($Pagename=='create-job-order.php' || $Pagename=='list-job-order.php' || $Pagename=='view-job-order.php') { ?>mm-active<? } ?>">
<a href="list-job-order.php">
<div class="parent-icon"><i class="lni lni-revenue"></i>
</div>
<div class="menu-title">Manage Job Order</div>
</a>
</li>


<li>
<a href="javascript:;" class="has-arrow" aria-expanded="false">
<div class="parent-icon"><i class="bx bxs-file"></i>
</div>
<div class="menu-title">Manage AMC</div>
</a>
<ul>

<li class="<? if($Pagename=='list-amc-job.php') { ?>mm-active<? } ?>"> <a href="list-amc-job.php"><i class="bx bx-right-arrow-alt"></i>List AMC Jobs</a></li>
<li class="<? if($Pagename=='list-amc-remainder.php') { ?>mm-active<? } ?>"> <a href="list-amc-remainder.php"><i class="bx bx-right-arrow-alt"></i>AMC Remainder</a></li>

</ul>
</li>

<li>
<a href="javascript:;" class="has-arrow" aria-expanded="false">
<div class="parent-icon"><i class="bx bxs-book"></i>
</div>
<div class="menu-title">Feedback</div>
</a>
<ul>

<li class="<? if($Pagename=='view-customer-feedback.php') { ?>mm-active<? } ?>"> <a href="view-customer-feedback.php"><i class="bx bx-right-arrow-alt"></i>Completed Feedback</a></li>


<li class="<? if($Pagename=='view-pending-feedback.php') { ?>mm-active<? } ?>"> <a href="view-pending-feedback.php"><i class="bx bx-right-arrow-alt"></i>Pending Feedback</a></li>

</ul>
</li>

 <li>
<a href="javascript:;" class="has-arrow" aria-expanded="false">
<div class="parent-icon"><i class="lni lni-graph"></i>
</div>
<div class="menu-title">Reports</div>
</a>
<ul>

<li class="<? if($Pagename=='customer-report.php') { ?>mm-active<? } ?>"> <a href="customer-report.php"><i class="bx bx-right-arrow-alt"></i>Customer Report</a></li>

<li class="<? if($Pagename=='site-report.php' || $Pagename=='view-site-report.php') { ?>mm-active<? } ?>"> <a href="site-report.php"><i class="bx bx-right-arrow-alt"></i>Site Report</a></li>


<li class="<? if($Pagename=='quotation-report.php') { ?>mm-active<? } ?>"> <a href="quotation-report.php"><i class="bx bx-right-arrow-alt"></i>Quotation Report</a></li>


<li class="<? if($Pagename=='view-supervisor-report.php') { ?>mm-active<? } ?>"> <a href="view-supervisor-report.php"><i class="bx bx-right-arrow-alt"></i>Supervisor Report</a></li>

<li class="<? if($Pagename=='view-technician-report.php') { ?>mm-active<? } ?>"> <a href="view-technician-report.php"><i class="bx bx-right-arrow-alt"></i> Technician Report</a></li>

</ul>
</li>

<?}elseif($user_type=='2'){?>

<li>
<a href="list-inspection.php">
<div class="parent-icon"><i class="bx bx-coin-stack"></i>
</div>
<div class="menu-title">Manage Inspection</div>
</a>
</li>

<li class="<? if($Pagename=='supervisor-list-job.php' || $Pagename=='supervisor-edit-job.php' || $Pagename=='supervisor-view-job.php') { ?>mm-active<? } ?>">
<a href="supervisor-list-job.php">
<div class="parent-icon"><i class="lni lni-revenue"></i>
</div>
<div class="menu-title">Manage Job Order</div>
</a>
</li>

<li>
<a href="supervisor-view-feedback.php">
<div class="parent-icon"><i class="bx bx-coin-stack"></i>
</div>
<div class="menu-title">Customer Feedback</div>
</a>
</li>
<?}?>

<li>
<a href="change-password.php">
<div class="parent-icon"><i class="lni lni-keyword-research"></i>
</div>
<div class="menu-title">Change Password</div>
</a>
</li>

<li>
<a href="logout.php">
<div class="parent-icon"><i class="fadeIn animated bx bx-log-out"></i>
</div>
<div class="menu-title">Logout</div>
</a>
</li>
</ul>
<!--end navigation-->
</div>