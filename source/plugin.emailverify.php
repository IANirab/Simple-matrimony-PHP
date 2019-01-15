 <!-- ********* TITLE START HERE *********-->
            <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span>Verify your email</span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>
            
            
          
            <!-- ********* TITLE END HERE *********-->
            <div class="pagecontent leftpadds"> 
              <!-- ********* CONTENT START HERE *********-->
              <div class="errorbox"><span>
                <? checkerror(); ?>
                </span></div>
              <form ENCTYPE="multipart/form-data" name ='form1' class="login" id='form1' method='post' action ="<?= $filename ?>.php" onSubmit="MM_validateForm('code','','R');return document.MM_returnValue;">
                <fieldset>
                 <div class="form-group">
                    <label class="col-lg-4 control-label">
                      <?= $emailverifyhead ?>
                    </label>
                     <div class="col-lg-8">
                    <INPUT TYPE="TEXT" class="form-control" value="<?=$code?>" name="code" MAXLENGTH="50" SIZE="40">
                 </div>
                 </div>
                   
                  <div class="form-group button_section">
                    <label class="col-lg-4 control-label">
                   &nbsp;</label>
                     <div class="col-lg-8">
                     <div class="formbtn_outer">
                    <INPUT TYPE="SUBMIT" NAME="cmdSignIn" VALUE="Submit" CLASS="formbtn">
                    </div>
                 </div>
                 </div>
                </fieldset>
              </form>
              
              <div class="extralink1"> 
              
                
                <a href="<?= $sitepath ?>forgotpassword.php"> <?= $loginregistereventorgfgpw?>
                </a>
                
                |&nbsp;<a href="<?= $sitepath ?>plresendverification.php">Resend Verification Code</a>
                
                
                
              </div>                            
             
            </div>