<?php
require_once('commonfile.php');
//$username = getusername();
//if($username !="")
//	header("location:dashboard.php");
$pro ="";	
if (isset($_GET["b"]))
	$pro = "?b=pro";
elseif (isset($_GET["fnm"]))
	$pro = "?fnm=". $_GET["fnm"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<Script Language="JavaScript">
<!--
function checkingForApplicationObjects()
	{
    if((document.frmLogin.txtEmailAddress.value==null) || (document.frmLogin.txtEmailAddress.value==""))
    {
    alert("<?= $loginmsg1 ?>");
    document.frmLogin.txtEmailAddress.focus();
    return false;
    }
    if((document.frmLogin.txtPassword.value==null) || (document.frmLogin.txtPassword.value==""))
    {
    alert("<?= $loginmsg2 ?>");
    document.frmLogin.txtPassword.focus();
    return false;
    }
    }
    function resetAplicationObjects()
    {
    document.frmLogin.reset();
    document.frmLogin.txtEmailAddress.focus();
    }
-->
function validate(){
	if(document.getElementById('txtEmailAddress').value==''){
		alert("Please Enter Email Address");
		document.getElementById('txtEmailAddress').focus();
		return false;
	} else if(document.getElementById('txtEmailAddress').value!=''){
		var chk = echeck(document.getElementById('txtEmailAddress').value);
		if(chk!=true){
			alert(chk);
			return false;				
		} else {
			return true;	
		}
		
	} else {
		return true;
	}
}
function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   return("Invalid E-mail ID")
		   //return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   return("Invalid E-mail ID")
		   //return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    return("Invalid E-mail ID")
		    //return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		     return("Invalid E-mail ID")
		    //return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    return("Invalid E-mail ID")
		    //return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		     return("Invalid E-mail ID")
		    //return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		     return("Invalid E-mail ID")
		    //return false
		 }

 		 return true					
	}
</Script>


<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.plresendverification.php");?>
    </div>
   
</div>
</div>
<div class="wrapper_blank">
	<div class="container">
    	 <div col-lg-9 col-md-9 col-sm-9 col-xs-12>
    			<div class="leftcms">
		 &nbsp;
    </div>
    </div>
    <div col-lg-3 col-md-3 col-sm-3 col-xs-12>
    			<div class="rightcms">
		 &nbsp;
    </div>
    </div>
    </div>
</div>

<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>