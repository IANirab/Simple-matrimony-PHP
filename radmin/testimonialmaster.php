<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$title = "";	
$image = "";	
$description = "";	
$languageid= 0;

$filename ="testimonialinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$testimonial_mgmnt_tm_1 = testimonial_mgmnt_tm_1();
	$testimonial_mgmnt_tm_2 = testimonial_mgmnt_tm_2();
	$testimonial_mgmnt_tm_4 = testimonial_mgmnt_tm_4();
} else {	
	$testimonial_mgmnt_tm_1 = "N";
	$testimonial_mgmnt_tm_2 = "N";
	$testimonial_mgmnt_tm_4 = "N";
}
if($testimonial_mgmnt_tm_1 == 'Y' || $testimonial_mgmnt_tm_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,description,languageid,image from tbldatingtestimonialmaster where currentstatus =0 and testimonialid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];
		$description = $rs[1];
		$languageid= $rs[2];
		$image = $rs[3];
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
			<h1 class="pagetitle">Add Testimonial</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($testimonial_mgmnt_tm_1 == 'Y' || $testimonial_mgmnt_tm_1 == 'N') { ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal ">
       <div class="form-group">
                <div class="widhtsetr "><label>Language</label>
              <select name="cmblanguage" class="form-control">
<? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
</select>
              </div>
		  	 <div class="widhtsetr  control-label_25">
           <label>title :</label>
              <input type="text" name="txttitle" value="<?= $title ?>" class="form-control">
              </div>
              </div>
		  <div class="form-group">
          <label>description</label>
          <textarea id="description" class="form-control desc" name="description" rows="10" cols="50"><?=$description?></textarea>

 <?php /*?><div class="editortable">            <textarea id="description" name="description" rows=4 cols=30>
<? function encodeHTML($sHTML)
{
$sHTML=ereg_replace("&","&amp;",$sHTML);
$sHTML=ereg_replace("<","&lt;",$sHTML);
$sHTML=ereg_replace(">","&gt;",$sHTML);
return $sHTML;
}
if($action!=0)
{
$sContent=stripslashes($description); 
echo encodeHTML($sContent);
}
?>
</textarea>
<script>
var oEdit1 = new InnovaEditor("oEdit1");
oEdit1.REPLACE("description");
</script></div><?php */?>
              </div>
         <div class="form-group">
               
                <label>select image</label>
<input type='file' name='uploadimage'  size="35" id='uploadimage' class="form-control">
<? if ($image != "") { ?>
<img src="../uploadfiles/<?= $image ?>" width="100px" height="100px">
<? } ?>
              </div>
        <div class="form-group common_button">
            <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>
	<? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $testimonialmaster_help ?></div>
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