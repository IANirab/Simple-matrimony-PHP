<?
session_start();
require_once("commonfileadmin.php");

checkadminlogin();
$table_name = find_table_name();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$question_mgmnt_qm_1 = question_mgmnt_qm_1();
	$question_mgmnt_qm_2 = question_mgmnt_qm_2();		
	$question_mgmnt_qm_4 = question_mgmnt_qm_4();
	
} else {	
	$question_mgmnt_qm_1 = "N";
	$question_mgmnt_qm_2 = "N";

	$question_mgmnt_qm_4 = "N";
}
if($question_mgmnt_qm_1 == 'Y' || $question_mgmnt_qm_1 == 'N') { 
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
			<h1 class="pagetitle">House Keeping Manager</h1>
			  <div class="addlink1">
			<?
			if($question_mgmnt_qm_2 == 'Y' || $question_mgmnt_qm_2 == 'N'){
			?>
			<div class="addlink"><a href="housekeepingmaster.php?tab=<?= $table_name ?>">Add New</a></div>
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
		<th scope="col" width="10%">ID</th>
  		<th scope="col" width="70%">Title</th>
		<th scope="col" width="20%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
if($table_name=='tbldating_state_master'){
	$fromqry = " from $table_name where currentstatus=9 ";
} else {
	$fromqry = " from $table_name where currentstatus=0 ";
}	
$fromqry .= $searchqry;
$FileNm = "housekeepingmanager.php?tab=$table_name&";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select title,id ". $fromqry ."  order by title ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$title=$rs[0];
			$id=$rs[1];
			
		 ?>
            <tr>
			<td <?= admintdclass ?>><?=$id?></td>
           	<td <?= admintdclass ?>><?=$title?></td>
            <td <?= admintdclass ?>>
			<?
				if($question_mgmnt_qm_2 == 'Y' || $question_mgmnt_qm_2 == 'N') {
			?>	
		    	<a href="housekeepingmaster.php?b=<?= $id ?>&tab=<?= $table_name ?>" class="actionbtn green">Modify</a>
			<? } if($question_mgmnt_qm_4 == 'Y' || $question_mgmnt_qm_4 == 'N') { ?>	
				<a href="housekeepingdelete.php?tab=<?= $table_name ?>&b=<?= $id ?>" class="actionbtndel">Delete</a>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $hosukeepingmanager_help ?></div>
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
<? } else {
	header("location:dashboard.php?msg=no");
	exit;
} ?>