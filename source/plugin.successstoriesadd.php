
  <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $successstoriesadd_updatestory ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
</div>

		
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
<form style="margin:0px" ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php" onsubmit="return validate();">
<div class="errorbox"><span><?php checkerror(); ?></span></div>
<fieldset>
<p><label><?= $successstoriesadd_title ?> : </label><input type="text" name="success_title" id="success_title" value="<?=$success_title?>" class="form"  /> </p>
<p><label><?= $successstoriesadd_description ?> : </label><textarea name="desc" id="desc" class="form" rows="5" cols="35"><?=$desc?></textarea></p>
<p><label><?= $successstoriesadd_uploadphoto ?> : </label><input type="file" name="image" id="image" class="form" /><? if($image!='') { ?><img src="uploadfiles/<?=$image?>" height="150" width="150" /><? } ?></p>
<p><label><?= $successstoriesadd_imagecode ?>: </label><img style="vertical-align:middle" id="imagenmcaptcha" src='<?= $sitepath ?>uploadfiles/captcha/<?= $imagenm_captcha ?>'><input type="text" name="imgcaptcha" id="imgcaptcha" value="" />
	</p>

<p><label>&nbsp;</label><div class="formbtn_outer"><input name="Submit" type="submit"  class='formbtn' value="<?= $updateprofilechangepassworddsubmit ?>"> <input name="Reset" type="reset"  class='resetbtn'  value="<?= $updateprofilechangepassworddreset ?>"></div></p>
</fieldset>


</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>
		