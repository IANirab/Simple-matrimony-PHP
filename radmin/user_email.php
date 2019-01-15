<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"]))&& ($_GET["b"] != "") && (is_numeric($_GET["b"])))
	$uid = $_GET["b"];
else
	$uid = 0;
$result = getdata("select name,email from tbldatingusermaster where userid=$uid");
while($rs= mysqli_fetch_array($result))
{
	$name=$rs[0];
	$email=$rs[1];
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
			<h1 class="pagetitle"><i class="fa fa-envelope"></i> Send Email</h1>
            

			<!-- ********* TITLE START HERE *********-->
		
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="package_added Choosan_Form">
            <div class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="user_email_submit.php?b=<?= $uid ?>" class="form-horizontal ">
     <div class="form-group text-form">
                <label>Name :</label>
              <?= $name ?>
              </div>
		<div class="form-group text-form">
                <label>Email :</label>
              <?= $email ?>
			  <input type="hidden" name="email" value="<?= $email ?>">
              </div>
           <div class="form-group text-form">
                <label>subject :</label>
              <input type="text" name="subject" class="form-control" size=35 >
              </div>
		  <div class="form-group text-form">
                <label>Message :</label>
              <textarea name="message" cols="50" class="form-control" rows="10"></textarea>
              </div>
         <div class="form-group common_button">
         

         
         
         <input name="Submit" type="submit" class="btn"  title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
            
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $passwordchange_help ?></div>
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