<!-- ********* TITLE START HERE *********-->
        <div class="featured_title_div abtus left_add_title">

    <span>
   <?= $directory_detail_inquiryfor ?> : <?= $ttle ?></span>
   <i>
   <a href="<?= $sitepath ?>directory.php"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory1.png" alt="" onclick="close_form();" class="" /> <?=$directory_search_result_browsedirectory ?>
   
   </a>
<a href="<?= $sitepath ?>directory_add.php"><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory2.png" alt="" onclick="close_form();" class="" /> <?= $directory_search_result_adddirecotorylisting ?>



</a>
<a href="<?= $sitepath ?>directory_lostpassword.php"><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory3.png" alt="" onclick="close_form();" class=""  /> <?= $directory_search_result_lostdirectorypassword ?>

</a>
<a href="directory.php">
    <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/back.png" alt="" onclick="close_form();" class="" /> Back</a>
</i>
    </div>
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent leftpadds">
		<!-- ********* CONTENT START HERE *********-->
<form name="frm_directory_inquiry" class="login" method="post" action="<? $sitepath ?>directory_inquiry.php?b=<?= $id ?>">

<fieldset>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $directory_detail_name ?> : </label>
<div class="col-lg-8">
<input type="text" name="name" class="form-control " size="35" />
</div>
</div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $directory_detail_email ?> : </label>
<div class="col-lg-8">
<input type="text" name="email" class="form-control" size="35" />
</div>
</div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $directory_detail_phone ?> : </label>
<div class="col-lg-8">
<input type="text" name="phone" class="form-control" size="35" />
</div>
</div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $directory_detail_msg ?> : </label>
<div class="col-lg-8">
<textarea id="message" name="message" rows="5" cols="55" class="form-control"></textarea>
</div>
</div>
<div class="form-group none_play button_section">
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8">
<div class="formbtn_outer">
<input type="submit" class="formbtn" onclick="MM_validateForm('name','','R','email','','RisEmail','phone','','R');return document.MM_returnValue" value="<?=$directory_detail_btn_submit  ?>" />
</div>
</div>
</div>
</fieldset>
</form>


		<!-- ********* CONTENT END HERE *********-->
		</div>