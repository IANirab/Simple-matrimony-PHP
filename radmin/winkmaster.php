<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$title = "";	
$image =0;	
$message = "";	
$flashcode ="";
$type_mail="";
$type_wink="";

$languageid= 0;
$filename ="winkinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$wink_show_ws_1 = wink_show_ws_1();
	$wink_show_ws_2 = wink_show_ws_2();
	$wink_show_ws_4 = wink_show_ws_4();
} else {	
	$wink_show_ws_1 = "N";
	$wink_show_ws_2 = "N";
	$wink_show_ws_4 = "N";
}
if($wink_show_ws_1 == 'Y' || $wink_show_ws_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,image,message,languageid,flashcode,winktype from tbldatingwinkmaster where currentstatus =0 and id=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];
		$image = $rs[1];
		$message= $rs[2];
		$languageid= $rs[3];
		$flashcode= $rs[4];
		if ($rs[5] == "W")
		{
			$type_mail="";
			$type_wink="selected";
		}
		else
		{
			$type_mail="selected";
			$type_wink="";
		}
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
			<h1 class="pagetitle">Add Wink/show intrest email</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($wink_show_ws_1 == 'Y' || $wink_show_ws_1 == 'N') { ?>
<form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal ">
      <div class="form-group singleline_class">
          <div class="widhtsetr">
       <label>Language</label>
              <select name="cmblanguage"  class="form-control">
<? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
</select>
              </div>
		    <div class="widhtsetr">
       <label>Type</label>
              <select name="cmbtype" class="form-control">
<option value="M" <?= $type_mail ?>>show intrest mail</option>
<option value="W" <?= $type_wink ?>>Wink</option>
</select>
              </div>
	   <div class="widhtsetr control-label_25">
           <label>title</label>
              <input type="text" name="txttitle"  class="form-control" value="<?= $title ?>">
              </div>
              </div>
		   <div class="form-group">
          
       <label>message</label>
			<textarea name="txtmessage"  class="form-control" rows="10" cols="50"><?= $message ?></textarea>
              </div>
		     <div class="form-group">
          
       <label>select image</label>
<input type='file' name='uploadimage' class="form-control" size="35" id='uploadimage'>
<? if ($image != "") { ?>
<img src="../uploadfiles/<?= $image ?>">
<? } ?>
</div>
 <div class="form-group">
           <label>or  flash code</label>
<textarea name="txtflashcode"  class="form-control" rows="3" cols="50"><?= $flashcode ?></textarea>
              </div>
         <div class="form-group common_button">
         <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>
	<? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $winkmaster_help ?></div>
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
}  ?>