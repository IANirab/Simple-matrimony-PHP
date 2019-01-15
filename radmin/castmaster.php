<?
error_reporting(0);
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$title = "";	
$languageid= 0;
$religianid= 0;

$filename ="castinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$cast_mgmnt_cm_1 = cast_mgmnt_cm_1();	
	$cast_mgmnt_cm_2 = cast_mgmnt_cm_2();
} else {	
	$cast_mgmnt_cm_1 = "N";
	$cast_mgmnt_cm_2 = "N";
}
if($cast_mgmnt_cm_1 == 'Y' || $cast_mgmnt_cm_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,languageid,religianid from tbldatingcastmaster where currentstatus =0 and id=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];	
		$languageid= $rs[1];
		$religianid= $rs[2];
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript src='../scripts/innovaeditor.js'></script>
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
			<h1 class="pagetitle">Add Cast</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  class="form-horizontal " >
       <div class="form-group">
          <div class="widhtsetr">
          <label>Language</label>
              <select name="cmblanguage" class="form-control">
<? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
</select>
              </div>
		 <div class="widhtsetr control-label_25">
           <label>Religion</label>
              <select name="cmbreligion" class="form-control">
<? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 order by title ",$religianid,""); ?>
</select>
              </div>
              </div>
		
		  
		 <div class="form-group"><label>Title</label>
              <input type="text" name="title" value="<?=$title ?>" class="form-control">
              </div>
		 
          
       <div class="form-group common_button">
         <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form> 
	<? } ?>     
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $announcementmaster_help ?></div>
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