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
	/*if (document.frmdocument.txtpassword.value == "")
	{
  		alert("Please Enter Password");
		document.frmdocument.txtpassword.focus();
		return false;
  	}*/
	document.frmdocument.action = "forgetinsert.php"
	document.frmdocument.submit();
}
//-->
function forgetpassword()
{
window.location="forgetpassword.php";
}
</script>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()" background="#F5F0F0;">

<div  class="container">
<!-- TOP START ######################## -->

<div class="login_bac">
<div class="outer_page_login">

<span class="errorbox"><?= checkerroradmin()?></span>
<div class="page_login">
<h2>Forget Password</h2>

<form name =frmdocument method=post onsubmit = "return validateform()">
	<div class="form-group">
    <input type="text" name="txtusername" title="User Name" class="form-control" alt="User Name" placeholder="User Id"></div>
<div class="form-group common_button"><input name="Submit" type="submit" class="btn" value="Submit" title="Submit"></div>
<p ><a href="login.php">Sign in</a></p>
</form>

</div>

</div>

</div>
	<!-- FOOTER START ######################## -->

	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>


