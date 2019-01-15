<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"]))&& ($_GET["b"] != "") && (is_numeric($_GET["b"])))
	$uid = $_GET["b"];
else
	$uid = 0;
$result = getdata("select name,country_code,mobile from tbldatingusermaster where userid=$uid");
while($rs= mysqli_fetch_array($result))
{
	$name=$rs[0];
	$country_code=$rs[1];
	$mobile = $rs[2];
	
	
	$find_plus = strstr($country_code,"+");
	if($find_plus!=""){
		$country_code = substr($country_code,1);	
	}	
	$num = $country_code.$mobile;
}	
freeingresult($result);
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
			<div id="pagetitle"><h1>Send SMS</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="sms_send_submit.php?b=<?= $uid ?>" >
      <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">
		<tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>name :</th>
            <td <?= admintdclass ?>>
              <?= $name ?>
              </td>
          </tr>
		<tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Mobile :</th>
            <td <?= admintdclass ?>>
              <?= $num ?>
			  <input type="hidden" name="num" value="<?= $num ?>">
              </td>
          </tr>           
		  <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>message :</th>
            <td <?= admintdclass ?>>
              <textarea name="message" cols="50" rows="10"></textarea>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $passwordchange_help ?></div>
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