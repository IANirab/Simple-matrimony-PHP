<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;

$title = "";	
$languageid= 0;
$filename ="countryinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$location_mgmnt_lc_1 = location_mgmnt_lc_1();
	$location_mgmnt_lc_2 = location_mgmnt_lc_2();		
} else {	
	$location_mgmnt_lc_1 = 'N';
	$location_mgmnt_lc_2 = 'N';
}
if($location_mgmnt_lc_1 == 'Y' || $location_mgmnt_lc_1 == 'N'){

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,languageid from tbldatingcountrymaster where currentstatus =0 and id=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];	
		$languageid= $rs[1];
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">
<div align="center" id="pagealign">
<div align="center" id="container">
<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
	<div id="content-wrap">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div id="center">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<div id="pagetitle"><h1>Add Country</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($location_mgmnt_lc_2 == 'Y' || $location_mgmnt_lc_2 == 'N') { ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>" >
      <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">	
		  
		  <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Title :</th>
            <td <?= admintdclass ?>>
              <input type="text" name="title" <?= admininputclass ?> size=35 value ="<?= $title  ?>">
              </td>
          </tr>
          
         <tr valign="top">
            <th scope="row" <?= adminthclass ?>>&nbsp;</th>
            <td <?= admintdclass ?>><input name="Submit" type="submit" <?= adminbuttonclass ?> title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" <?= adminbuttonclass ?> value="Reset" title="Reset" alt="Reset">
            </td>
          </tr>
      </table>
    </form>     
	<? } ?>  
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $countrymaster_help ?></div>
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
} ?>