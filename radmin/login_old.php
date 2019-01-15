<?
session_start();
require_once("commonfileadmin.php");
//echo(md5("admin"));
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<script language="JavaScript" type="text/JavaScript">
<!--
function validateform() { //v2.0
	if (document.frmdocument.txtusername.value == "")
	{
  		alert("Please Enter User Name");
		document.frmdocument.txtusername.focus();
		return false;
  	}
	if (document.frmdocument.txtpassword.value == "")
	{
  		alert("Please Enter Password");
		document.frmdocument.txtpassword.focus();
		return false;
  	}
	document.frmdocument.action = "checklogin.php"
	document.frmdocument.submit();
}
//-->
function forgetpassword()
{
//window.location="forgetpassword.php";
window.location="forgetmaster.php";
}
</script>
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
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div id="center" style="margin-left:0px; background:none; background-color:#dff5fe; padding:0px; margin:0px;">
			<div id="center-in" style="margin:0px; padding:0px;">
			<!-- ********* TITLE START HERE *********-->
			<!--<div id="pagetitle"><h1>Login</h1></div>-->
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<table width="960px" align="center" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="middle" style="background-image:url(images/adminbg1.gif); background-repeat:repeat-x; height:447px" align="center">
	<table width="774" align="center" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td>
	<!-- leftside start -->
	<table width="420" align="center" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td><img src="images/admin3.jpg" alt=""></td>
  	</tr>
  	<tr>
    <td>
	<span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000000;">
<br>
	<strong>Administrator control panel help you in :</strong>

<table width="100%" border="0" cellspacing="5" cellpadding="0">
<tr>
<td><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000000;"><img src="images/adminbullete.gif" alt=""> User management can control user info.</span></td>
</tr>
<tr>
<td><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000000;"><img src="images/adminbullete.gif" alt=""> Want to update your website content? Its is quite easy.</span></td>
</tr>
<tr>
<td><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000000;"><img src="images/adminbullete.gif" alt=""> Easy to handle marketing activities.</span></td>
</tr>
<tr>
<td><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000000;"><img src="images/adminbullete.gif" alt=""> Setting your preferrence for control panel.</span></td>
</tr>
</table>
</span>
	</td>
  	</tr>
	</table>

	<!-- leftside end -->
	</td>
    <td style="background-image:url(images/adminbg2.gif); background-repeat:no-repeat; height:385px; width:272px;">
		<table width="95%" align="center" border="0" cellspacing="0" cellpadding="0">
  		<tr>
    	<td height="275" align="center">
		
<form name =frmdocument method=post onsubmit = "return validateform()">
<table width="215" align="center" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="bottom" height="120px"><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#FF0000"><?= checkerroradmin()?></span></td>
</tr>
<tr>
<td valign="bottom" height="35px"><img src="images/admin1.gif" alt=""></td>
</tr>
<tr>
<td>
<span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#FF0000"><?= checkerroradmin()?></span>

<input type="text" name="txtusername" class="input" title="User Name" alt="User Name" size="35" style="border:solid 1px #808080; background-color:#FEFDDC; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#000000; width:215px; height:25px;"></td>
</tr>
<tr>
<td valign="bottom" height="40px"><img src="images/admin2.gif" alt=""></td>
</tr>
<tr>
<td><input type="password" name="txtpassword" class="input" title="Password" alt="Password" size="35" style="border:solid 1px #808080; background-color:#FEFDDC; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#000000; width:215px; height:25px;"></td>
</tr>
<tr>
<td valign="bottom" align="center" height="35"><input name="Submit" type="submit" class="btn1" value="Submit" title="Submit" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#666666; background-color:#EEEEEE; border:solid 1px #808080; width:100px; font-weight:bold;"></td>
</tr>
</table>
</form>
<br>
<input name="button" type="button" class="btn1" value="Forgot Password" title="Forgot Password" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#666666; background-color:#EEEEEE; border:solid 1px #808080; margin-top:5px; font-weight:bold;" onClick="forgetpassword()">
<br>
<br>
<br>

		</td>
  		</tr>

		</table>

	</td>
  	</tr>
	</table>
</td>
</tr>
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


