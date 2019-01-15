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
			<h1 class="pagetitle">Change Password</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="passwordchange_submit.php" class="form-horizontal">
     <div class="form-group"><label>enter your current password</label>
              <input type="password" name="current_password"  class="form-control" size=35 >
              </div>
          <div class="form-group"><label>enter your new password </label>
              <input type="password" name="new_password"  class="form-control" size=35 >
              </div>
         <div class="form-group common_button">
         <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset"  class="btn"value="Reset" title="Reset" alt="Reset">
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