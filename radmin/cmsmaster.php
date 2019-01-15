<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$cms_mgmnt_cmc_1 = cms_mgmnt_cmc_1();
	$cms_mgmnt_cmc_2 = cms_mgmnt_cmc_4();
	$cms_mgmnt_cmc_4 = cms_mgmnt_cmc_4();	
} else {	
	$cms_mgmnt_cmc_1 = "N";
	$cms_mgmnt_cmc_2 = "N";
	$cms_mgmnt_cmc_4 = "N";	
}
if($cms_mgmnt_cmc_1 == 'Y' || $cms_mgmnt_cmc_1 == 'N') {

$action = 0;
$order = "";
$Title = "";	
$Meta_kw= "";
$Meta_desc= "";
$Description = "";	
$LocationId= 0;
$languageid= 0;
$staticlink= "";
$authorid =0;
$filename ="cmsinsert";
$parentid = "";
$cmsimage='';

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select Title,Meta_kw,Description,LocationId,languageid,staticlink , Meta_desc,authorid, orderby,parentid,ImgNm from tblcmsmaster where CurrentStatus =0 and cmsid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$Title = $rs[0];	
		$Meta_kw= $rs[1];
		$Description = $rs[2];	
		$LocationId= $rs[3];
		$languageid= $rs[4];
		$staticlink= $rs[5];
		$Meta_desc= $rs[6];
		$authorid= $rs[7];
		$order = $rs[8];
		$parentid = '';
		$cmsimage = $rs['ImgNm'];
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
			<h1 class="pagetitle">Add CMS</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($cms_mgmnt_cmc_2 == 'Y' || $cms_mgmnt_cmc_2 == 'N') { ?>
     <form name="frmdocument" method="post" action ="<?= $filename ?>.php?b=<?= $action ?>"   class="form-horizontal" enctype="multipart/form-data">
     <div class="form-group">
             <div class="widhtsetr"><label>Language</label>
              <select name="cmblanguage" class="form-control">
<? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
</select>
              </div>
              
         <div class="widhtsetr control-label_25">
               <label>Parent :</label>
              <select name="parent" id="parent" class="form-control">
				<? fillcombo("select cmsid,title from tblcmsmaster where currentstatus=0 AND parentid=0",$parentid,"No Parent"); ?>
			  </select>
              </div>
              </div>
		   <div class="form-group">
             <div class="widhtsetr"><label>Location :</label>
              <select name="cmblocation" class="form-control">
<? fillcombo("select locationid,location from tblcmslocationmaster where currentstatus=0 order by location ",$LocationId,""); ?>
</select>
              </div>
		  	<!-- 	  <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Author :</th>
            <td <?= admintdclass ?>>
           <select name="cmbauthor" <?= admindropdownclass ?>>
			  <option value="0">Select</option>
				<? fillcombo("select authorid,name from tblcms_article_author_master where currentstatus=0 order by name ",$authorid,""); ?>
</select><div class="note">use for only article</div>
              </td>
          </tr> -->

		  
		   <div class="widhtsetr control-label_25">
               <label>title :</label>
              <input type="text" name="txttitle" value="<?= $Title ?>" class="form-control">
              </div>
              </div>
		   <div class="form-group"><label>static link</label>
              <input type="text" name="txtstaticlink" value="<?= $staticlink ?>"  class="form-control">
              <note>If static link keyword,summary,description is not required.</note>
              </div>
             
             
		   <div class="form-group">
           <label>Meta </label>
             <textarea name="txtmeta" rows="3" cols="40" class="form-control"><?= $Meta_kw?></textarea>
     <note>Please enter keywords here for meta tags. e.g. keyword1, keyword2, keyword3...<br>
Please do not put more than 6 keywords.</note>
              </div>
		  	<div class="form-group">
           <label>summary</label>
             <textarea name="txtmetadesc" rows="3" cols="40" class="form-control"><?= $Meta_desc?></textarea>
			 <note>Please enter summary here. It will also used as description for meta tags.<br>
Please do not put more than 150 characters.</note>
              </div>
		  
		  <div class="form-group">
           <label>Order</label>
           
             	<input type="text" name="order" value="<?= $order ?>" class="form-control">
				<note>It will be in effect if location is Top</note>
              </div>

		  
          	<note>Do not copy data from MS-Word</note>
		  <div class="form-group">
           <label>description</label>
            
            <textarea id="description" name="description" class="form-control desc" rows="20" cols="100"><?=$Description?></textarea>
<?php /*?><div class="editortable">         <textarea id="description" name="description" rows=4 cols=30>
<? function encodeHTML($sHTML)
{
	$sHTML=str_replace("&","&amp;",$sHTML);
	$sHTML=str_replace("<","&lt;",$sHTML);
	$sHTML=str_replace(">","&gt;",$sHTML);
	return $sHTML;
}
if($action!=0)
{
	$sContent=stripslashes($Description); 
	echo encodeHTML($sContent);
}
?>
</textarea><?php */?>
<!--<script>
var oEdit1 = new InnovaEditor("oEdit1");
oEdit1.REPLACE("description");
</script></div>-->
              </div>
          
          
     
          
          
          
             <div class="form-group">
                <div class="widhtsetr"><label>Image</label>
                  <input  type="file" name="cmsimage"  id="cmsimage" value="" 
                 accept="image/*"/>
                 
                 
                 
              </div>
		 
                <div class="widhtsetr control-label_25 ">
                  
                  
                  <? if ($cmsimage  != "") { ?>
            <img  src="../uploadfiles/<?= $cmsimage ?>" height=80 width=80 align="absmiddle">
            
            <a href="deletecmsimage.php?b=<?=$action?>">Delete</a>
            
			<? } ?>

                  
              </div>
              </div>
          
        
          
         <div class="form-group common_button">
         <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form><? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $cmsmaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
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
<? } else {
	header("location:dashboard.php?msg=no");
} ?>