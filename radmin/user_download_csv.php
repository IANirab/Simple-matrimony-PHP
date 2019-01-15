<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$user_mnager_umof_4 = user_mnager_umof_4();	
} else {	
	$user_mnager_umof_4 = "N";	
}
if($user_mnager_umof_4 == 'Y' || $user_mnager_umof_4 == 'N') { 
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
	<div class="container">		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">User CSV Dowanload</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>







<form name="form_download1" class="form-horizontal" action="user_download1.php" method="post">
<div class="form-group">
<label>User ID From :</label> 
<input type="text" name="txt_uid_from" size="15" class="form-control">
</div>

<div class="form-group">
<label>User ID To  :</label> 
<input type="text" name="txt_uid_to" class="form-control" size="15">
</div>
<input type="submit" value="Download In CSV Format" class="btn">


</form>








    
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $eventmaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
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