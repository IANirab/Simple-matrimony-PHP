<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript">
function changetransfee(filenm,id)
{
document.frmmodify.action = filenm;
document.frmmodify.submit();
}
</script>
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
			<div id="pagetitle"><h1>User Manager</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<form name='frmmodify' method='POST'>
<?= checkerroradmin()?>
<table width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="greytableborder">
        <tr>

        <th scope="col">User Id</th>
        <th scope="col">Name</th>
	    <th scope="col">Email(User Name)</th>
		<th scope="col">Password</th>
		<th scope="col">Email Verified</th>
		<th scope="col">Verification Code</th>
		<th scope="col">Status</th>
  		
		</tr>
<?
$searchqry = "";
$fromqry = " from tbldatingusermaster";
$result = getdata("select userid,name,email,password,emailverified,emailverificationcode,currentstatus ". $fromqry ." order by name,email ");
while($rs= mysqli_fetch_array($result))
{
	$userid=$rs[0];
	$name=$rs[1];
	$email = $rs[2];
	$password=$rs[3];
	$emailverified=$rs[4];
	$emailverificationcode = $rs[5];
	$status = $rs[6];
?>
<tr valign="top">

          	<td <?= admintdclass ?>><?=$userid?></td>
          	<td <?= admintdclass ?>><?=$name?></td>          	           	
          	<td <?= admintdclass ?>><?=$email?></td>
			<td <?= admintdclass ?>><?=$password?></td>
			<td <?= admintdclass ?>><?=$emailverified?></td>
			<td <?= admintdclass ?>><?=$emailverificationcode?></td>
			<td <?= admintdclass ?>><?= $status ?></td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
	</table>
</form>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
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