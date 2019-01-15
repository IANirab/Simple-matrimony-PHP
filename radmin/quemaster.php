<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = 0;
if(isset($_SESSION[$session_name_initital . 'adminlogin']) && $_SESSION[$session_name_initital . 'adminlogin']!=''){
	$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
}
$action = 0;
$catid = '';
$title = '';
$privacyid = '';
$metakeywords = '';
$metadesc = '';
$description = '';
$img_path = '';
$imgnm_doc='';
$filename ="queinsert";


if(isset($_SESSION['cmbcategory']) && $_SESSION['cmbcategory']!=''){
	$catid = $_SESSION['cmbcategory'];
}
if(isset($_SESSION['txttitle']) && $_SESSION['txttitle']!=''){
	$title = $_SESSION['txttitle'];
}
if(isset($_SESSION['cmbprivacy']) && $_SESSION['cmbprivacy']!=''){
	$privacyid = $_SESSION['cmbprivacy'];
}
if(isset($_SESSION['txtmetakeywords']) && $_SESSION['txtmetakeywords']!=''){
	$metakeywords = $_SESSION['txtmetakeywords'];
}
if(isset($_SESSION['txtmetadesc']) && $_SESSION['txtmetadesc']!=''){
	$metadesc = $_SESSION['txtmetadesc'];
}
if(isset($_SESSION['description']) && $_SESSION['description']!=''){
	$description = $_SESSION['description'];
}


//echo $sitepath;
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select Title,privacyid,meta_keywords,Meta_desc,Description,img_path,ImgNm from tblkb_quemaster where CurrentStatus IN (0,5) and cmsid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		
		$title = $rs[0];
		$privacyid = $rs[1];	
		$metakeywords = $rs[2];
		$metadesc = $rs[3];
		$description = $rs[4];
		$img_path = $rs[5];
		$imgnm_doc = $rs[6];
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META NAME="ROBOTS" CONTENT="INDEX,NOFOLLOW">
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<script type="text/javascript" language="javascript">
function validate(){
	if(document.getElementById('cmbcategory').value=='' || document.getElementById('cmbcategory').value=='0.0'){
		alert("Please select category");
		return false;
	}
	if(document.getElementById('txttitle').value=='' || document.getElementById('txttitle').value=='0.0'){
		alert("Please select Question");
		return false;
	}
	
	
}
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
			<h1 class="pagetitle">Add Question</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<? checkerroradmin()?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>" enctype="multipart/form-data" class="form-horizontal" onSubmit="return validate();">
      <div class="form-group">
      <div class="widhtsetr">
             <label>Question</label>
              <input type="text" name="txttitle" id="txttitle" value="<?= $title ?>"  class="form-control">
              <? if(isset($_GET['b1']) && $_GET['b1']==3){ ?>
            	<input type="hidden" name="cmbcategory" id="cmbcategory" value="3">
            <? } else { ?>										
             	<input type="hidden" name="cmbcategory" id="cmbcategory" value="1">
            <? } ?>
              </div>
          
          <div class="widhtsetr control-label_25">
               <label>Privacy</label>
              <select name="cmbprivacy" class="form-control">
<? fillcombo("select id,title from tblkb_privacy_master where currentstatus=0",$privacyid,"Select"); ?>
</select>
<note>Only Logged in users can see Private Que-Ans.</note>
              </div>
              </div>
          
		      <div class="form-group"><label>Meta keyword:</label>
             <textarea name="txtmetakeywords" class="form-control" rows="3" cols="40"  class="form-control"><?= $metakeywords?></textarea>
<note>Please enter keywords here for meta tags. e.g. keyword1, keyword2, keyword3...<br>
Please do not put more than 6 keywords.</note>
              </div>
          
		   <div class="form-group"><label>Meta Description</label>
             <textarea name="txtmetadesc" rows="3" cols="40"  class="form-control"><?= $metadesc?></textarea>
			 <note>Please enter summary here. It will also used as description for meta tags.<br>
Please do not put more than 150 characters.</note>
              </div>
          
          <div class="form-group"><label>Image Upload Path</label>
                 <input type="file" class="form-control" name="upload_path" id="upload_path" value=""><br>
                 <? //=$img_path?>	
                 
                 <? 
				 if($img_path!=''){
					 ?>
                     <img src="<?=$img_path ?>" height="100" width="100">
                     <a href="que_img_del.php?b=<?=$action ?>">Delete image</a>
                     <?
					 
				 }
				 ?>		 
                 
                 
                 
              </div>
          
          <div class="form-group"><label>Doc</label>
                 <input type="file" name="upload_image" class="form-control" id="upload_image" value="">
                 <note>Use only DOC, DOCX OR PDF document to upload<note>
                 <? 
				 if($imgnm_doc!=''){ ?>
                 <a href="../uploadfiles/<?=$imgnm_doc ?>">Download</a>
                 <a href="que_doc_del.php?b=<?=$action ?>">Delete Doc</a>
                 <?
				 } 
				 ?>
              </div>
		  		  
		  
		<div class="form-group"><label>Answer</label>
            <textarea id="description"  class="form-control" name="description"  rows="6" cols="50"><?=$description?></textarea>
              </div>
          
       <div class="form-group common_button">
       <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>			
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	</div>
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
    
         <script language=JavaScript src="../tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
	tinymce.init({
  selector: '#description',
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