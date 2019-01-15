<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$emp_mgmnt_emm_1 = emp_mgmnt_emm_1();
	$emp_mgmnt_emm_2 = emp_mgmnt_emm_2();
	$emp_mgmnt_emm_4 = emp_mgmnt_emm_4();
} else {	
	$emp_mgmnt_emm_1 = "N";
	$emp_mgmnt_emm_2 = "N";
	$emp_mgmnt_emm_4 = "N";
}
if($emp_mgmnt_emm_1 == 'Y' || $emp_mgmnt_emm_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
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
			<h1 class="pagetitle"><i class="fa fa-user"></i> Employee Manager</h1>
			<div class="addlink1"><?
			if($emp_mgmnt_emm_2 == 'Y' || $emp_mgmnt_emm_2 == 'N') { ?>
			<div class="addlink"><a href="employeemaster.php">Add new employee</a></div>
			<? } ?>
			
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>

  		<th scope="col">Id</th>
		<th scope="col">name</th>
		<th scope="col">user name</th>
		<th scope="col">Role</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbldatingadminloginmaster where tbldatingadminloginmaster.CurrentStatus in (0) and GroupId=2";
$fromqry .= $searchqry;
$FileNm = "employeemanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingadminloginmaster.LoginId) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select tbldatingadminloginmaster.LoginId,tbldatingadminloginmaster.name,username,tbldatingadminloginmaster.emp_role_id ". $fromqry ." order by tbldatingadminloginmaster.LoginId desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
 	$LoginId=$rs[0];
	$name=$rs[1];
	$username=$rs[2];
	if($rs[3]!='' && $rs[3]!='0.0' && is_numeric($rs[3])){
		$emp_role_id = getonefielddata("select title from tbl_employee_role_master WHERE id=".$rs[3]);
	} else {
		$emp_role_id = '';
	}
?>
	<tr valign="top">
    <td ><?=$LoginId?></td>
	<td><?=$name?></td>
	<td><?=$username?></td>
	<td><?=$emp_role_id?></td>
    <td>
		<?
			if($emp_mgmnt_emm_2 == 'Y' || $emp_mgmnt_emm_2 == 'N') { ?>
		<a href="employeemaster.php?b=<?= $LoginId ?>" class="actionbtn_m green">Modify</a>
	<?
		}	if($emp_mgmnt_emm_4 == 'Y' || $emp_mgmnt_emm_4 == 'N') { ?>
	<a href="employeedelete.php?b=<?= $LoginId ?>" class="actionbtndel">Delete</a>
	<? } ?>
    </td>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $winkmanager_help ?></div>
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
<? } else{
	header("location:dashboard.php?msg=no");
	exit;
} ?>