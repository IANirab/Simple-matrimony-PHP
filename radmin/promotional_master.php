<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$email="";
$name = '';
$nm = '';
//$filename ="tbldatingpromotionalemailmaster_insert";



if(isset($_SESSION["email"]) && $_SESSION["email"] != "") {
		$email = $_SESSION["email"];
		}

$filename ="promotional_insert";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select email,name from tbldatingpromotionalemailmaster where id=$action ");
	while ($rs = mysqli_fetch_array($result)){		  	
		$email=$rs[0];
		$nm = $rs[1];

	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="javascript" type="text/javascript">
function validate(){
	if(document.getElementById('name').value==""){
		alert("Please Enter Name");
		document.getElementById('name').focus();
		return false;		
	}else if(document.getElementById("email").value==""){
		alert("Plese Enter email"); 
		document.getElementById("email").focus(); 
		return false;
	}else {
		return true;
	}	
}
</script>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<h1 class="pagetitle">promotional master</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" onSubmit="return validate();"
     class="form-horizontal ">
       <div class="form-group">
        <div class="widhtsetr">  
       <label>Name</label>
       <input type="text" name="name" id="name" value="<?=$nm?>" class="form-control">
       </div>
       <div class="widhtsetr control-label_25">
       email </th><input type="text" name="email" id="email" class="form-control" value="<?=$email?>">
       </div>
       </div>
     <div class="form-group common_button">
     <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
     <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
	</div>
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	</div>
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>

	