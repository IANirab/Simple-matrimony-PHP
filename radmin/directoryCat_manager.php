<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$dir_mgmnt_dm_1 = dir_mgmnt_dm_1();
	$dir_mgmnt_dmd_1 = dir_mgmnt_dmd_1();	
	$dir_mgmnt_dmd_3 = dir_mgmnt_dmd_3();
} else {	
	$dir_mgmnt_dm_1 = "N";
	$dir_mgmnt_dmd_1 = "N";
	$dir_mgmnt_dmd_3 = "N";
}
if($dir_mgmnt_dm_1 == 'Y' || $dir_mgmnt_dm_1 == 'N') {
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
			<h1 class="pagetitle">Directory Category Manager</h1>
			<div class="addlink1">
			<?
			if($dir_mgmnt_dmd_1 == 'Y' || $dir_mgmnt_dmd_1 == 'N') { ?>
			<div class="addlink"><a href="directoryCat_master.php">Add new Category</a></div>
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
  		<th scope="col">Categoryid Id</th>
	    <th scope="col">Title</th>
  		<th scope="col" width="100">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbl_directory_category_master where currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "directoryCat_manager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(categoryid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select categoryid,title ". $fromqry ." order by title ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$categoryid=$rs[0];
			$title=$rs[1];
			
		 ?>
            <tr>
           	<td ><?=$categoryid?></td>
          	<td ><?=$title?></td>
            <td>
				<?
					if($dir_mgmnt_dmd_1 == 'Y' || $dir_mgmnt_dmd_1 == 'N') { ?>
				<a href="directoryCat_master.php?b=<?= $categoryid ?>" class="actionbtn_m">Modify</a>
				<? } if($dir_mgmnt_dmd_3 == 'Y' || $dir_mgmnt_dmd_3 == 'N') {   ?>
				<a href="directoryCat_delete.php?b=<?= $categoryid ?>" class="actionbtndel">Delete</a>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $directoryCatmanager_help ?></div>
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
	}
?>