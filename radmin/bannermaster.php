<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$Title = "";
$AltText = "";
$OnClickURL = "";
$ImageLink = "";
$ImageNm = "";
$path = "";
$TextOrFlashBannerCode = "";
$LSId ="";
$expiryDays = '365';
$TemplateId = "";
$Description = "";
$TrackingCode = "";
$languageid = "";
$filename ="bannerinsert";

$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$banner_mgmnt_bm_1 = banner_mgmnt_bm_1();
	$banner_mgmnt_bm_2 = banner_mgmnt_bm_2();
	$banner_mgmnt_bm_4 = banner_mgmnt_bm_4();
	$banner_mgmnt_bm_5 = banner_mgmnt_bm_5();
	$banner_mgmnt_bm_6 = banner_mgmnt_bm_6();
} else {	
	$banner_mgmnt_bm_1 = "N";
	$banner_mgmnt_bm_2 = "N";
	$banner_mgmnt_bm_4 = "N";
	$banner_mgmnt_bm_5 = "N";
	$banner_mgmnt_bm_6 = "N";
}
if($banner_mgmnt_bm_1 == 'Y' || $banner_mgmnt_bm_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select Title,AltText,OnClickURL,ImageLink,ImageNm,LSId,TemplateId,expiryDays,Description,TrackingCode,TextOrFlashBannerCode from tblbannermaster where Bannerid=$action ");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$Title = $rs[0];
		$AltText = $rs[1];
		$OnClickURL = $rs[2];
		$ImageLink = $rs[3];
		$ImageNm = $rs[4];
		if($ImageNm!='')
			$path = "../uploadfiles/site_".$sitethemefolder."/" .$ImageNm;
	  	elseif($ImageLink!='')
			 $path = $ImageLink;   
	  	$LSId = $rs[5];
	  	$TemplateId = $rs[6];
	  	$expiryDays = $rs[7];
	  	$Description = $rs[8];
	  	$TrackingCode = $rs[9];
		$TextOrFlashBannerCode= $rs[10];
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
			<h1 class="pagetitle">Add Banner</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>

<?
if($banner_mgmnt_bm_2 == 'Y' || $banner_mgmnt_bm_2 == 'N') { ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal">
	<!-- <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Language :</th>
            <td <?= admintdclass ?>>
              <select name="cmblanguage"  class="form-control">
<? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
</select> -->
		   <div class="form-group">
             <div class="widhtsetr"><label>Title</label>
			 <input type="text" name="Title"  class="form-control" title="Title" alt="Title" size=35 value ="<?= $Title  ?>">
			</div>
         
       
         <div class="widhtsetr control-label_25">
               <label>Template</label>
            <select name="TemplateId" class="form-control">
            <?
            fillcombo("select TemplateId,TemplateName from tblbannertemplatemaster where CurrentStatus=0 order by TemplateName ",$TemplateId,"");
			?>
            </select>
			</div>
            </div>
		 
        
        <div class="form-group">
             <div class="widhtsetr"><label>Location-Size</label>
           
            <select name="LSId"  class="form-control">
            <?
            fillcombo("select LocSizeId,Title from tblbannerlocsizemaster where CurrentStatus=0 order by Title ",$LSId,"");
			?>
            </select>
			</div>
                              
      
       
      <div class="widhtsetr control-label_25"><label>Landing Url (Destination URL)</label>
			<input type="text" name="LandingURL"  class="form-control" title="Landing Url " alt="Landing Url " size=35 value ="<?= $OnClickURL  ?>">	
			</div>
            </div>
     <div class="form-group">
     <label>Banner Image</label>
             <div class="widhtsetr">
   			<strong>Link :</strong><br>
            <input type="text" name="ImgLink"  class="form-control" title="Image Link " alt="Image Link  " size=35 value="<?=$ImageLink?>" >
			<note>(e.g. www.yahoo.com/images/img1.jpg)</note>
            </div>
            
            
            <div class="widhtsetr control-label_25">
     <label>Image Alt Text</label>
			<input type="text" name="AltText" class="form-control" title="Image Alt Text " alt="Image Alt Text " size=35 value ="<?= $AltText  ?>">			
            </div>
            </div>
          <div class="form-group">  
             <div class="widhtsetr">
	        <label>Or Select File to upload : </label>
		<input type="file" name="uploadimage" class="form-control" title="Banner Image  " alt=" Banner Image  " size=35 >
        </div>
        <div class="widhtsetr control-label_25">
			
			<? if($path!=""){echo "<img src=\"$path\" width=100 height=100>";}?>	
            </div>
            </div>
	    
	   <div class="form-group">
     <label>Text or flash banner code</label>
			 <textarea name="Description" class="form-control" title="Description" alt="Description" cols="30" rows="4" ><?= $TextOrFlashBannerCode ?></textarea>
			</div>
     <div class="form-group">
     <label>Expiry Days</label>
   			<input type="text" name="expiryDays" class="form-control" title="Expiry Days " alt="Expiry Days " size=35 value="<?=$expiryDays?>" maxlength="4">
			</div>
	
<!--	 <tr valign="top">
            <th scope="row" <?= admintdclass ?>>Tracking Code :</th>
            <td <?= admintdclass ?>>
   			<input type="text" name="Trackcode" <?= admininputclass ?> title="Tracking Code " alt="Tracking Code " size=35 value="<?=$TrackingCode?>">
			</td>
	</tr>-->

         <div class="form-group common_button">
         <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>  <? } ?>    
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $bannermaster_help ?></div>
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