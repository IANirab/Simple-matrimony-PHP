<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$audit_msgs_am_1 = audit_msgs_am_1();
	$audit_msgs_am_2 = audit_msgs_am_2();
} else {	
	$audit_msgs_am_1 = "N";
	$audit_msgs_am_2 = "N";	
}
if($audit_msgs_am_1=='Y' || $audit_msgs_am_1 == 'N'){
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.messagetd img{ width:100px; height:100px;}
</style>
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui-1.7.1.custom.min.js"></script>





<script src="../jquery/datetimepicker/jquery13/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../jquery/datetimepicker/jquery_ui_datepicker/jquery_ui_datepicker.js" type="text/javascript"></script>
<script src="../jquery/datetimepicker/jquery_ui_datepicker/i18n/ui.datepicker-de.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="../jquery/datetimepicker/jquery_ui_datepicker/timepicker_plug/css/style.css">
<link rel="stylesheet" type="text/css" href="../jquery/datetimepicker/jquery_ui_datepicker/smothness/jquery_ui_datepicker.css">



<script type="text/javascript">
$(function() {
	$.noConflict();	
	$('#from_dt').datepicker(
	
	{
		changeMonth: true,
		changeYear: true,
		
	});	
});


$(function() {
		$('#to_dt').datepicker({
		changeMonth: true,
		changeYear: true,
	});	
});
</script>
</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
<div class="pagewrapper">
	<div class="container">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle"><i class="fa fa-envelope"></i> Audit Messages</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
<div class="form-wrapper">
<form name="search_recs" class="form_second" method="post" action="">
 <div class="form-group">   
    	<label>Search</label>
        
        <input type="text" name="keyword" value="" id="keyword" class="form-control"> 
        </div>
         <div class="form-group"> 
		<label>Date</label>
		<input type="text" name="from_dt" value="" id="from_dt" class="form-control"> 
        </div>
		<input type="submit" name="submit" class="btn" value="Search">
       
</form>
</div>

<?php
if(isset($_REQUEST['b']))
{
$got=$_REQUEST['b'];
}
else
{
$got=30;
}

$searchqry1 = "";
if(isset($_POST['from_dt']) && $_POST['from_dt']!="" ){
	$from_dt = $_POST['from_dt'];
$searchqry1 = "and tbldatingpmbmaster.CreateDate IN ('".$from_dt."') ";
}

$searchqry2 ="";



if(isset($_POST['keyword']) && $_POST['keyword']!="" ){
	$keyword = $_POST['keyword'];
$searchqry2 = "and tbldatingpmbmaster.Subject like '%".$keyword."%' OR  tbldatingpmbmaster.Message like '%".$keyword."%'";
}
?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
<th scope="col" width="20%">From</th>
<th scope="col" width="20%">To</th>
<th scope="col" width="40%"> Message</th>
<th scope="col" width="15%" >Action</th>
</tr>
</thead>
<tbody>
<?
$searchqry = "";
$fromqry = " from tbldatingpmbmaster where CurrentStatus in (0) and to_days(curdate())-to_days(create_date) <='$got'   
 and type='2' $searchqry1 $searchqry2";
$fromqry .= $searchqry;
$FileNm = "pmbmanager.php?";
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
$Pgnm = 1;	

$totalnorecord = getonefielddata( "select count(tbldatingpmbmaster.PmbId) $fromqry ");		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select PmbId,Subject,Message,ToUserId,FromUserId,date_format(CreateDate,'%d-%m-%Y') ". $fromqry ." order by PmbId desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
 	$PmbId=$rs[0];
	$Subject=$rs[1];
	$Message=$rs[2];
	$ToUserId=$rs[3];
	$FromUserId=$rs[4];
	if ($ToUserId != "")
		$ToUserId=find_user_name($ToUserId);
	if ($FromUserId != "")
		$FromUserId=find_user_name($FromUserId);
?>
            <tr valign="top">
           	<td ><?=$FromUserId?></td>
          	<td ><?=$ToUserId?></td>	
          	<td > <?= $Message ?></td>
            <td >
			<?
			if($audit_msgs_am_2=='Y' || $audit_msgs_am_2 == 'N'){ ?>
		    <a href="pmbdelete.php?b=<?= $PmbId ?>" class="actionbtndel">Delete</a>
			<? } ?>
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
	<table width=100% align=center class="nextbackbox" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" <?= adminnextbackcls ?>><?= $BackStr ?></td>
	<td class="nextbackmid">&nbsp;</td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div></div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $pmbmanager_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>
<?
} else {
	header("location:dashboard.php?msg=no");
	exit;
} 
?>