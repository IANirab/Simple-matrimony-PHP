<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
/*if($pkg_mgmnt_pm_1 == 'Y' || $pkg_mgmnt_pm_1 == 'N') {*/

$searchqry = "";
$empid = "";
$from_date = "";
$to_date = "";
$username = '';
if(isset($_POST['empid']) && $_POST['empid']!=''){
	$empid = $_POST['empid'];
	$searchqry .= " empid=".$empid." AND ";	
}
if(isset($_POST['from_date']) && $_POST['from_date']!=''){
	$from_date = $_POST['from_date'];
	$from_date=date_create($from_date);
	$from_date= date_format($from_date,"Y-m-d");
	$searchqry .= " tbldatingactivity_logmaster.work_date>='".$from_date."' AND ";	
}
if(isset($_POST['to_date']) && $_POST['to_date']!=''){
	$to_date = $_POST['to_date'];
	$to_date=date_create($to_date);
	$to_date= date_format($to_date,"Y-m-d");
	$searchqry .= " tbldatingactivity_logmaster.work_date<='".$to_date."' AND ";
}

?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


  

<script language="javascript" type="text/javascript">
function validate(){
	if(document.getElementById('empid').value=='0.0'){
		alert("Please Select Employee  ");	
		document.getElementById('empid').focus();
		return false;
	} else {
		return true;	
	}
		
}
</script>
<title><?= $admintitle ?></title>
<link href="../jquery/smoothness/jquery-ui-1.7.1.custom.css" rel="stylesheet" type="text/css">
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<h1 class="pagetitle">Activity Log Reports</h1>
			<div class="addlink1">
			<? //if($pkg_mgmnt_pm_2 == 'Y' || $pkg_mgmnt_pm_2 == 'N') { ?>
			<!--<div class="addlink"><a href="addspecialoffer.php">Add new Offer</a></div>-->
			<? //} ?>
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
<? if(!isset($_GET['msg'])) { ?>
<div class="form-wrapper">
<form name="search_recs" class="form_second" method="post" action="activity_log_report.php"  onsubmit="return validate();">

    <? $current_admin_id = 0;
if(isset($_SESSION[$session_name_initital . 'desklogin']) && $_SESSION[$session_name_initital . 'desklogin']!=''){
	$current_admin_id=$_SESSION[$session_name_initital . 'desklogin'];
}
		?> 
        <div class="form-group">
    	<label>Employee </label>
         <Select name="empid" id="empid" class="form-control">
		    <? //fillcombo("select LoginId,name from tbldatingadminloginmaster where LoginId!='$current_admin_id'",$empid,"select"); ?>
            <? fillcombo("SELECT LoginId,name from tbldatingadminloginmaster WHERE currentstatus=0 AND loginid!=1",$empid,"Select"); ?>
    	</Select>
        </div>
        <div class="form-group">
		<label>Date</label>
        <span> 
		<input type="text" name="from_date" value="<?=$from_date?>" id="from_date" class="form-control">
		<i>To</i>
		<input type="text" name="to_date" value="<?=$to_date?>" id="to_date" class="form-control">
        </span>
        </div>
		<input type="submit" name="submit" class="btn" value="Search">

</form>
</div>
<? } ?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th  scope="col" width="20%">Emp Name</th>
		<th  scope="col" width="20%">User Name</th>
		<th scope="col" width="40%">Description</th>
		<th width="20%" scope="col">Date</th>
		</tr>
        </thead>
        <tbody>
<?

/*if(isset($_POST['from_date']) && isset($_POST['to_date']) && $_POST['from_date']!="" AND $_POST['to_date']!="" && isset($_POST['empid']) && $_POST['empid']){
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$empid = $_POST['empid'];	
	if($empid>0){
		$searchqry .= "empid='".$empid."' and  tbldatingactivity_logmaster.work_date between '".$from_date."' AND '".$to_date."' AND ";
	}
	if($from_date!=''){
		$searchqry .= "tbldatingactivity_logmaster.work_date=> '".$from_date."' AND ";
	}
	if($to_date!=''){
		$searchqry .= "tbldatingactivity_logmaster.work_date=< '".$to_date."' AND ";
	}
}*/

$fromqry = " from tbldatingactivity_logmaster where ".$searchqry."currentstatus=0 ";
//$fromqry .= $searchqry;
$FileNm = "activity_log_report.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
//echo "select count(tblscspecialoffermaster.specialofferid) $fromqry";
$totalnorecord = getonefielddata("select count(tbldatingactivity_logmaster.id 	) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];


$result = getdata("select empid,userid,description,work_date". $fromqry." ".$NoOfRecord);



while($rs= mysqli_fetch_array($result))
{
	$empid=$rs[0];
	$userid=$rs[1];
	$description=$rs[2]; 
	$work_date=$rs[3];
	
$empname = getonefielddata("select UserName from  tbldatingadminloginmaster where LoginId='$empid'");
$username = getonefielddata("select name from  tbldatingusermaster where userid='".$userid."' ");
			
		 ?>
            <tr valign="top">
           	<td><?=$empname?></td>
			<td><?=$username ?></td>
			<td><?=$description ?></td>
          	<td><?=$work_date ?></td>
         
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
    </div>
	<table width=100% align=center class="nextbackbox" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" <?= adminnextbackcls ?>><?= $BackStr ?></td>
	<td class="nextbackmid">&nbsp;</td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $packagemanager_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
	
	 $( function() {
    $( "#from_date" ).datepicker();
  } );
  
   $( function() {
    $( "#to_date" ).datepicker();
  } );
	

</script>

</body>
</html>
<?php /*?><? } else {
	header("location:dashboard.php?msg=no");
} ?><?php */?>