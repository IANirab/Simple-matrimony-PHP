<?
session_start();
require_once("commonfileadmin.php");
//echo(md5("admin"));


if (isset($_SESSION[$session_name_initital . "adminlogin"]))
{
header("location:dashboard.php");	
}

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
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()" background="" class="login_body">


<!-- TOP START ######################## -->

<!-- TOP END ######################## -->
<div class="login_bac">
<div class="outer_page_login">


<?php /*?><span class="errorbox"></span><?php */?>

<div class="page_login">
<h2>Sign in</h2>
<div class="login_user">
	<div class="user_picture"></div>
</div>
<form action="checklogin.php" method="post" name="frmdocument">

<?=checkerrorlogin();?>

	<div class="form-group">
    <input type="text" value="User Name" alt="User Name" title="User Name" name="txtusername" class="form-control" onFocus="javascript: if(this.value=='User Name'){this.value=''}"></div>
	<div class="form-group">
    <input type="Password" value="Password" alt="Password" class="form-control" title="Password" name="txtpassword" onFocus="javascript: if(this.value=='Password'){this.value=''}"></div>
	<div class="form-group common_button"><input type="submit" title="Submit" value="Sign in" class="btn" name="Submit"></div>
	<p style="margin:0 0 0 0"><a href="forgetmaster.php">Forgot Password</a></p> 
</form>

</div>



   <? if (findsettingvalue("makeyoursoftware_logo")=='Y'){ ?>  
<div class="loginlogo">
<strong>Powered by</strong>
<img src="images/loginlogo.png"/>
</div>
<? } ?>
</div>

</div>
	
	<!-- FOOTER START ######################## -->

	<!-- FOOTER END ######################## -->


</body>
</html>


