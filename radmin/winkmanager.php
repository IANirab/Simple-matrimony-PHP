<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$wink_show_ws_1 = wink_show_ws_1();
	$wink_show_ws_2 = wink_show_ws_2();
	$wink_show_ws_4 = wink_show_ws_4();
} else {	
	$wink_show_ws_1 = "N";
	$wink_show_ws_2 = "N";
	$wink_show_ws_4 = "N";
}
if($wink_show_ws_1 == 'Y' || $wink_show_ws_1 == 'N') {
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
			<h1 class="pagetitle">Wink/show intrest email Manager</h1>
			<div class="addlink1">
			<?
			if($wink_show_ws_2 == 'Y' || $wink_show_ws_2 == 'N') { ?>
			<div class="addlink"><a href="winkmaster.php">Add new wink</a></div>
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
		<th scope="col">title</th>
		<th scope="col">image</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbldatingwinkmaster where tbldatingwinkmaster.currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "winkmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingwinkmaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select tbldatingwinkmaster.id,tbldatingwinkmaster.title,image ". $fromqry ." order by tbldatingwinkmaster.title ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
 	$id=$rs[0];
	$title=$rs[1];
	$image=$rs[2];
	if ($image == "")
		$image = "noimage.gif";
?>
	<tr valign="top">
    <td ><?=$id?></td>
	<td ><?=$title?>&nbsp;</td>
	<td ><img src='../uploadfiles/<?=$image?>'></td>
    <td >
	<?
		if($wink_show_ws_2 == 'Y' || $wink_show_ws_2 == 'N') { ?>
	<a href="winkmaster.php?b=<?= $id ?>" class="actionbtn_m green">Modify</a>
	<? } if($wink_show_ws_4 == 'Y' || $wink_show_ws_4 == 'N') {  ?>
	<a href="winkdelete.php?b=<?= $id ?>" class="actionbtndel">Delete</a>
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
<? } else {
	header("location:dashboard.php?msg=no");
	exit;
} ?>