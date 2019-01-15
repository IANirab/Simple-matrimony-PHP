<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;

$title = "";	
$languageid= 0;

$filename ="emailbulksettinginsert";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select displaytext,fldval from tblemaillbulksettingmaster where currentstatus =0 and settingid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$displaytext = $rs[0];	
		$fldval= $rs[1];
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
			<h1 class="pagetitle">Change Bulk Email Settings</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>" class="form-horizontal" >
     <div class="form-group"><label><?=$displaytext?> </label>
              <input type="text" name="title" class="form-control" size=35 value ="<?= $fldval ?>">
              </div>
        <div class="form-group common_button">
        <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $emailbulksettingmaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
    </div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</body>
</html>