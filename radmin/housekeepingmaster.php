<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$table_name = find_table_name();
$action = 0;

$title = "";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$question_mgmnt_qm_1 = question_mgmnt_qm_1();
	$question_mgmnt_qm_2 = question_mgmnt_qm_2();	
} else {	
	$question_mgmnt_qm_1 = "N";
	$question_mgmnt_qm_2 = "N";
}
$filename ="housekeepinginsert.php?tab=$table_name";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,languageid from $table_name where currentstatus =0 and id=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];
		$languageid=$rs[1];

	}
	freeingresult($result);
}
?>
<? 
if($question_mgmnt_qm_1 == 'Y' || $question_mgmnt_qm_1 == 'N'){
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
			<h1 class="pagetitle">House Keeping  Master</h1>
		<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? 
if($question_mgmnt_qm_2 == 'Y' || $question_mgmnt_qm_1 == 'N'){
?>
   <form name=frmdocument method=post action="<?= $filename ?>&b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal">
     <div class="form-group"><label>Language</label>
            	<select name="languageid" id="languageid" class="form-control">
                	<? fillcombo("SELECT languageid,language from tbldatingsitelanguagemaster WHERE currentstatus=0",$languageid,"Select"); ?>
                </select>
              </div>
          <div class="form-group"><label>Title</label>
              <input type="text" name="title"  class="form-control" size=35 value ="<?= $title  ?>">
              </div>
          
        <div class="form-group common_button">
           			  
			  <input name="Submit" type="submit" title="Submit" value="Submit" alt="Submit"  class="btn" >
              <input name="Reset" type="reset" value="Reset" title="Reset" alt="Reset"   class="btn" >
            </div>
    </form>
<? } ?>	
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $hosukeepingmaster_help ?></div>
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
<? } else {
	header("location:dashboard.php?msg=no");
	exit;
} ?>