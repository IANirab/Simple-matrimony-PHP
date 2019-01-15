<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;

$message = "";	
$subject= "";
$newsletter_subsciber_all ="selected";
$newsletter_subsciber_yes ="";
$newsletter_subsciber_no ="";
$newsletter_subsciber_pro ="";

$filename ="emailbulkinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$bulk_email_be_1 = bulk_email_be_1();
	$bulk_email_be_2 = bulk_email_be_2();	
	$bulk_email_be_4 = bulk_email_be_4();
	$bulk_email_be_5 = bulk_email_be_5();
} else {	
	$bulk_email_be_1 = "N";
	$bulk_email_be_2 = "N";	
	$bulk_email_be_4 = "N";
	$bulk_email_be_5 = "N";
}
if($bulk_email_be_1 == 'Y' || $bulk_email_be_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select message,subject,newsletter_subsciber from tblemailbulkmaster where currentstatus =0 and sendid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$message = $rs[0];	
		$subject= $rs[1];
		$newsletter_subsciber= $rs[1];
		if ($newsletter_subsciber == "Y")
		{
			$newsletter_subsciber_all ="";
			$newsletter_subsciber_yes ="selected";
			$newsletter_subsciber_no ="";
			$newsletter_subsciber_pro ="";
		}
		elseif ($newsletter_subsciber == "N")
		{
			$newsletter_subsciber_all ="";
			$newsletter_subsciber_yes ="";
			$newsletter_subsciber_no ="selected";
			$newsletter_subsciber_pro ="";
		}
		elseif ($newsletter_subsciber == "P")
		{
			$newsletter_subsciber_all ="";
			$newsletter_subsciber_yes ="";
			$newsletter_subsciber_no ="";
			$newsletter_subsciber_pro ="selected";
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
<!--<script language=JavaScript src='../scripts/innovaeditor.js'></script>
-->

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
			<h1 class="pagetitle">Send bulk email</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? if($bulk_email_be_2 == 'Y' || $bulk_email_be_2 == 'N') { ?>
<form name=frmdocument method=post action ="<?=$filename ?>.php?b=<?= $action ?>" class="form-horizontal " >
<div class="form-group">
         <div class="widhtsetr">
               <label>send email to</label>
<select name="newsletter_subsciber" id="newsletter_subsciber" class="form-control">
<option value="A" <?= $newsletter_subsciber_all ?>>All</option>
<option value="Y" <?= $newsletter_subsciber_yes ?>>Subscibed</option>
<option value="N" <?= $newsletter_subsciber_no ?>>Unsubscibed</option>
<option value="P" <?= $newsletter_subsciber_pro ?>>Promotional</option>
</select>
</div>
<div class="widhtsetr control-label_25">
               <label>subject</label>
             <input type="text" name="txtsubject" value="<?= $subject ?>" class="form-control">
              </div>
              </div>
		  <div class="form-group">
            <label>message</label>
            <textarea id="message" name="message" rows="10" cols="50" class="form-control"><?=$message?></textarea>
<?php /*?><div class="editortable">             <textarea id="message" name="message" rows=4 cols=30>
<? function encodeHTML($sHTML)
{
$sHTML=ereg_replace("&","&amp;",$sHTML);
$sHTML=ereg_replace("<","&lt;",$sHTML);
$sHTML=ereg_replace(">","&gt;",$sHTML);
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
oEdit1.REPLACE("message");
</script>
[name],[email],[date]</div><?php */?>
              </div>
          
       <div class="form-group common_button">
       <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form><? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $emailbulkmaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
</div>	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
    
     <script language=JavaScript src="../tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
	tinymce.init({
  selector: '#message',
  plugins: 'image code,textcolor colorpicker,codesample,link,emoticons,preview,print,pagebreak,media,insertdatetime,anchor,hr,nonbreaking,template,table',
  toolbar: 'undo redo | link image | code | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent inden |print preview media | forecolor backcolor emoticons | codesample help |print |table',
  // enable title field in the Image dialog
  image_title: true, 
  // enable automatic uploads of images represented by blob or data URIs
  automatic_uploads: true,
  // URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
  images_upload_url: 'postAcceptor.php',
  // here we add custom filepicker only to Image dialog
  file_picker_types: 'image', 
  // and here's our custom image picker
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    
    // Note: In modern browsers input[type="file"] is functional without 
    // even adding it to the DOM, but that might not be the case in some older
    // or quirky browsers like IE, so you might want to add it to the DOM
    // just in case, and visually hide it. And do not forget do remove it
    // once you do not need it anymore.

    input.onchange = function() {
      var file = this.files[0];
      
      var reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = function () {
        // Note: Now we need to register the blob in TinyMCEs image blob
        // registry. In the next release this part hopefully won't be
        // necessary, as we are looking to handle it internally.
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        // call the callback and populate the Title field with the file name
        cb(blobInfo.blobUri(), { title: file.name });
      };
    };
    
    input.click();
  }
});
	
	</script>
    
</div>
</div>
</body>
</html>
<? } ?>