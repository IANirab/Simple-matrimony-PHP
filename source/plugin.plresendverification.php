<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span>Resend Verification Code</span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>


		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent leftpadds">
		<!-- ********* CONTENT START HERE *********-->
		<div class="errorbox"><span><? checkerror(); ?></span></div>
		
		<form name="frmLogin" class="Login form_sections" method="post" action="<?= $sitepath ?>plugin.resendverficiationinsert.php<?= $pro ?>" onSubmit="return validate();">

<fieldset>
<div class="form-group">
                    <label class="col-lg-4 control-label"><?= $loginemailadd  ?></label>
                     <div class="col-lg-8">
                    <INPUT TYPE="TEXT" class="form-control" NAME="txtEmailAddress" id="txtEmailAddress" MAXLENGTH="50" SIZE="40"></p>
</div>
</div>
<div class="form-group button_section">

                    <label class="col-lg-4 control-label">&nbsp;</label>
                     <div class="col-lg-8">
                     <div class="formbtn_outer">
                    <INPUT TYPE="SUBMIT" NAME="cmdSignIn" VALUE="SUBMIT" CLASS="formbtn">
                    </div>
                    </div>
                    </div>
                   
</fieldset>
</form>
<div class="extralink1">
<a href="<?= $sitepath ?>index.php"><?= $loginregisterbutton?></a> | 
<a href="<?= $sitepath ?>forgotpassword.php"><?= $loginregistereventorgfgpw?></a>
</div>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>