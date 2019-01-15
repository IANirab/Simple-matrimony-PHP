<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $forgetpasswordtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent leftpadds">
		<!-- ********* CONTENT START HERE *********-->
		<div class="errorbox"><span><? checkerror(); ?></span></div>
		
		<form name="frmforgetpassword" class="Login form_sections" method="post" action="<?= $sitepath ?>forgetpasswordsubmit.php">

<fieldset>

 <div class="form-group">
                    <label class="col-lg-4 control-label">
					<?= $forgetpasswordemailadd  ?></label>
                    <div class="col-lg-8">
                    <INPUT TYPE="TEXT" class="form-control" NAME="txtEmailAddress" MAXLENGTH="50" SIZE="40">
                    </div>
                    </div>
 <div class="form-group button_section">
 <label class="col-lg-4 control-label">&nbsp;</label>
 <div class="col-lg-8">
<div class="formbtn_outer"> <INPUT TYPE="SUBMIT" NAME="cmdSignIn" VALUE="<?= $forgetpasswordsubmit ?>" CLASS="formbtn" onCLick="return checkingForApplicationObjects();"></div>
</div>
</div>
</fieldset>
</form>
<div class="extralink1"><a href="<?= $sitepath ?>index.php"><?= $loginregisterbutton?></a> | <a href="<?= $sitepath ?>forgotpassword.php"><?= $loginregistereventorgfgpw?></a></div>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>