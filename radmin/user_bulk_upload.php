<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$user_mnager_umof_4 = user_mnager_umof_4();	
} else {	
	$user_mnager_umof_4 = "N";	
}
if($user_mnager_umof_4 == 'Y' || $user_mnager_umof_4 == 'N') { 
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
	<div class="container">		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">User Bulk Upload</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<form name=frmdocument method=post action ="user_bulk_upload_submit.php" class="form-horizontal " ENCTYPE="multipart/form-data">
<div class="form-group">
<label>csv file </label>
         <input type=file name="img" class="form-control"  id="img" size="35" alt="Upload" >
		<notetext>
        <?
        $pckgnm=getonefielddata(" select Description from tbldatingpackagemaster 
		where PackageId='".findsettingvalue("trialpackageid")."' ");
		?>
		<strong>Note : 1) supported file format : (csv, txt)<br>
			 	       2) Upload using text file, values must be comma separated<br>
                       3) Upload using CSV file,delete first row of "demo.csv"<br>
        			   4) duplicate email address not allowed<br>
                       5) Email & Nick name should be unique<br>
                       6) All user allocated to "<?=$pckgnm?>"</strong><br>
                       
		 click<a href='CSV/demo.csv'> <u>here</u> </a>for sample CSV file<br>
         click<a href='CSV/user_buk_upload_sample.txt' target="_blank"> <u>here</u> </a>for sample TEXT file<br><br>
		 
         <p><strong>CSV MUST BE IN FOLLOWING FORMAT</strong></p>
        
		 Email, Nick name, Password, Name,
         <a href='all_data.php?b=1' target="_blank"><u>gender id</u></a>,date of birth[yyyy-mm-dd], 
         <a href='all_data.php?b=2' target="_blank"><u>country id</u></a>,<br>
         <a href='all_data.php?b=3' target="_blank"><u>State id</u></a>,
         <a href='all_data.php?b=4' target="_blank"><u>City id</u></a>,mobile, 
         <a href='all_data.php?b=5' target="_blank"><u>Marital status id</u></a>,
         <a href='all_data.php?b=6' target="_blank"><u>Height id</u></a>,
         <a href='all_data.php?b=7' target="_blank"><u>Weight id</u></a>,
         <a href='all_data.php?b=8' target="_blank"><u>Religian id</u></a>,
         <a href='all_data.php?b=9' target="_blank"><u>Cast id</u></a>,
         <a href='all_data.php?b=10' target="_blank"><u>Community id</u></a>, <br>
         <a href='all_data.php?b=11' target="_blank"><u>Education id</u></a>,
         <a href='all_data.php?b=12' target="_blank"><u>Occupation id</u></a>, profile headline,
         <a href='all_data.php?b=13' target="_blank"><u>Currency id</u></a>,
         <a href='all_data.php?b=14' target="_blank"><u>Annual income id</u></a>
         </notetext>
         
         </div>
          <div class="form-group common_button">
          <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $eventmaster_help ?></div>
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
<?
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>