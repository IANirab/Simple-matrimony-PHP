<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$mobile="";
$sms_text="";

//$filename ="tbl_sms_master_insert";





$filename ="sms_insert";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select mobile,sms_text from tbl_sms_master where id=$action ");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$mobile=$rs[0];
$sms_text=$rs[1];

	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="javascript" type="text/javascript">
function validate(){
	if(document.getElementById("").value==""){alert("Plese Enter "); document.getElementById("").focus(); return false;}else {return true;}	
}
</script>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<div id="pagetitle"><h1>sms master</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<div class="errorbox"><?= checkerroradmin()?></div>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" onSubmit="return validate();">
      <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">
  	 <tr valign="top"><th scope="row" width="40%" <?= admintdclass ?>>mobile :</th><td <?= admintdclass ?>><input type="text" name="mobile" id="mobile" value="<?=$mobile?>"></td></tr>
<tr valign="top"><th scope="row" width="40%" <?= admintdclass ?>>sms_text :</th><td <?= admintdclass ?>><textarea name="sms_text" id="sms_text"><?=$sms_text?></textarea></td></tr>

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

	