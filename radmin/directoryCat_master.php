<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;

$title = "";
$meta_description = "";
$meta_keyword = "";

$filename ="directoryCat_insert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$dir_mgmnt_dm_1 = dir_mgmnt_dm_1();
	$dir_mgmnt_dmd_1 = dir_mgmnt_dmd_1();	
	$dir_mgmnt_dmd_3 = dir_mgmnt_dmd_3();
} else {	
	$dir_mgmnt_dm_1 = "N";
	$dir_mgmnt_dmd_1 = "N";
	$dir_mgmnt_dmd_3 = "N";
}
if($dir_mgmnt_dm_1 == 'Y' || $dir_mgmnt_dm_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,meta_description,meta_keyword from tbl_directory_category_master where currentstatus =0 and categoryid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];
		$meta_description = $rs[1];
		$meta_keyword = $rs[2];
	}
	freeingresult($result);
}	
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
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
			<h1 class="pagetitle">Add directory</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

            
	<? if($dir_mgmnt_dmd_1 == 'Y' ||  $dir_mgmnt_dmd_1 == 'N') {?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>" class="form-horizontal ">
		  <div class="errorbox">
              <?= checkerroradmin()?>
            </div>
		 <div class="form-group singleline_class">
              
                <div class="widhtsetr">
                <label>Title :</label>
              <input type="text" name="title"  class="form-control" size=35 value="<?= $title ?>">
			 <note>please do not use special character in title except &  /  \\ \ ' , -</note>
              </div>
		   <div class="widhtsetr">
               <label>Meta description :</label>
              <input type="text"  class="form-control" name="meta_description" <?= admininputclass ?> size=35 value="<?= $meta_description ?>">
              </div>
		   <div class="widhtsetr control-label_25">
               <label>Meta keyword :</label>
              <input type="text" name="meta_keyword" class="form-control" size=35 value="<?= $meta_keyword ?>">
              </div>
              </div>
		
         <div class="form-group common_button"><input name="Submit" type="submit" class="btn"title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>      
	<? } ?>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			
        <div class="adminhelp">
          <h3>
            <?= $helphead ?>
          </h3>
          <?= $directorymaster_help ?>
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
<? 
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>