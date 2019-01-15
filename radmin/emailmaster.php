<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$action = 0;

$subject = "";	
$message= "";
$title= "";

$languageid= 0;

$filename ="emailinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$web_setting_wss_5 = web_setting_wss_5();
	$web_setting_wss_6 = web_setting_wss_6();
} else {	
	$web_setting_wss_5 = "N";
	$web_setting_wss_6 = "N";
}
if($web_setting_wss_5 == 'Y' || $web_setting_wss_5 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select subject,message,title from tbldatingemailmaster where currentstatus =0 and emailid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$subject = $rs[0];	
		$message= $rs[1];
		$title= $rs[2];
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<script language=JavaScript src='../scripts/innovaeditor.js'></script>-->

<script language=JavaScript src="../tinymce/js/tinymce/tinymce.min.js"></script>
  <script>
  
  tinymce.init({
  selector: 'textarea.desc',
  height: 300,
  width:700,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: 'jquery/tinymce/js/css/codepen.min.css'
});
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
			<h1 class="pagetitle">Add Email</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
			<!-- ********* TITLE END HERE *********-->
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? if($web_setting_wss_6 == 'Y' || $web_setting_wss_6 == 'N') { ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  class="form-horizontal">
       <h4><strong><?= $title ?></strong></h4>
     <div class="form-group">
   <label>Subject</label>
			<input type="text" name="txtsubject"  class="form-control" value="<?= $subject ?>" >
			</div>
		 <div class="form-group">
   <label>message</label>
   <textarea id="description" class="form-control desc" name="description" rows="10" cols="50"><?=$message?></textarea>
<?php /*?><div class="editortable">             <textarea id="description" name="description" rows=4 cols=30>
<? function encodeHTML($sHTML)
{
$sHTML=str_replace("&","&amp;",$sHTML);
$sHTML=str_replace("<","&lt;",$sHTML);
$sHTML=str_replace(">","&gt;",$sHTML);
return $sHTML;
}
if($action!=0)
{
$sContent=stripslashes($message); 
echo encodeHTML($sContent);
}
?>
</textarea>
<script>
var oEdit1 = new InnovaEditor("oEdit1");
oEdit1.REPLACE("description");
</script></div><?php */?>
              </div>
          
        <div class="form-group common_button">
            <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form><? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $emailmaster_help ?></div>
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