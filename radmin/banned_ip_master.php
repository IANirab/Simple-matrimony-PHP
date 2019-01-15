<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$ip = "";	

$filename ="banned_ip_insert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$ban_ip_bi_1 = ban_ip_bi_1();
	$ban_ip_bi_2 = ban_ip_bi_2();
	$ban_ip_bi_3 = ban_ip_bi_3();
	$ban_ip_bi_5 = ban_ip_bi_5();
} else {	
	$ban_ip_bi_1 = "N";
	$ban_ip_bi_2 = "N";
	$ban_ip_bi_3 = "N";
	$ban_ip_bi_5 = "N";
}
if($ban_ip_bi_1 == 'Y' || $ban_ip_bi_1 == 'N') {	

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select ip from tbl_banned_ip_master where currentstatus =0 and id=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$ip = $rs[0];	
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript src='../scripts/innovaeditor.js'></script>
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
			<h1 class="pagetitle">Add IP </h1>
			
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent"  class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? if($ban_ip_bi_3 == 'Y' || $ban_ip_bi_3 == 'N') {	 ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal ">
    <div class="form-group text-form">
        <label>IP :</label>
              <input type="text" name="ip" value="<?= $ip ?>" class="form-control">
              </div>		  
          
        <div class="form-group common_button">
        <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form><? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $testimonialmaster_help ?></div>
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