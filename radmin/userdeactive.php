<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filename ="userdeactiveinsert";
$userid = 0;
$status = 0;
if(isset($_GET['b']) && $_GET['b']!=''){
	$userid = $_GET['b'];	
}
if(isset($_GET['b1']) && $_GET['b1']!=''){
	$status = $_GET['b1'];	
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
			<div id="pagetitle"><h1>Reason</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $userid ?>&b1=<?=$status?>" >
      <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">
		<tr valign="top">
		  <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Reason :</th>
            <td <?= admintdclass ?>>
			<textarea name="title" cols="50" rows="10"></textarea>
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
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $settingmaster_help ?></div>
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