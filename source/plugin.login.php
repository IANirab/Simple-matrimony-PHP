<?php

$pro ="";	
if (isset($_GET["b"]))
	$pro = "?b=pro";
elseif (isset($_GET["fnm"]))
	$pro = "?fnm=". $_GET["fnm"];

?>
<Script Language="JavaScript">
<!--
function checkingForApplicationObjects()
//alert(1)
	{
		//alert(document.frmLogin1.txtEmailAddress.value);
    if((document.frmLogin1.txtEmailAddress.value==null) || (document.frmLogin1.txtEmailAddress.value==""))
    {
    alert("<?= $loginmsg1 ?>");
    document.frmLogin1.txtEmailAddress.focus();
    return false;
    }
    if((document.frmLogin1.txtPassword.value==null) || (document.frmLogin1.txtPassword.value==""))
    {
    alert("<?= $loginmsg2 ?>");
    document.frmLogin1.txtPassword.focus();
    return false;
    }
    }
    function resetAplicationObjects()
    {
    document.frmLogin1.reset();
    document.frmLogin1.txtEmailAddress.focus();
    }
-->
</Script>
 <!-- ********* TITLE START HERE *********-->
            <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $logintitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>
            
            
          
            <!-- ********* TITLE END HERE *********-->
            <div class="pagecontent leftpadds"> 
              <!-- ********* CONTENT START HERE *********-->
              
                 <? if(isset($_SESSION[$session_name_initital . 'error'])) 
	  {
		  ?>
          <div class="error" align="center" id="errbx"><?
		  echo $_SESSION[$session_name_initital . 'error']; 
		 
		 ?>
         </div><?
	  }
	  
	  ?>
             <form name="frmLogin1"  class="Login form_sections" method="post" action="loginsubmit.php" >
                <fieldset>
                 <div class="form-group">
                    <label class="col-lg-4 control-label">
                      <?= $loginemailadd  ?>
                    </label>
                     <div class="col-lg-8">
                    <INPUT TYPE="TEXT" class="form-control" NAME="txtEmailAddress" MAXLENGTH="50" SIZE="40">
                 </div>
                 </div>
                  <div class="form-group">
                   <label class="col-lg-4 control-label">
                      <?= $loginpassword ?>
                    </label>
                    <div class="col-lg-8">
                    <INPUT TYPE="PASSWORD" class="form-control" NAME="txtPassword" MAXLENGTH="50" SIZE="40">
                  </div>
                  </div>
                   <div class="form-group button_section">
                    <label class="col-lg-4 control-label">
                   &nbsp;</label>
                     <div class="col-lg-8">
                    <input type=checkbox name ="chkrememberme" id="chkrememberme" size="35" value="Y">
                    <?= $loginremember ?>
                  </div>
                  </div>
                  <div class="form-group button_section">
                    <label class="col-lg-4 control-label">
                   &nbsp;</label>
                     <div class="col-lg-8">
                     <div class="formbtn_outer">
                     <input type="submit" name="cmdSignIn" value="<?= $loginsubmit ?>"   CLASS="formbtn" />
                   <!--  
                    <INPUT TYPE="SUBMIT" NAME="cmdSignIn" VALUE="<?= $loginsubmit ?>" CLASS="formbtn" onCLick="return checkingForApplicationObjects();">--></div>
                 </div>
                 </div>
                </fieldset>
              </form>
              
              <div class="extralink1"> 
           <!-- <a href="<?=$sitepath?>index.php">Registration Here</a>    |-->
           <a href="registration.php" onclick="register_data(this.id)"><?=$login_reg_btn?></a> |
              	<? if($sitethemefolder!='pom') { ?>
                <!--<a href="<?= $sitepath ?>registration.php">
                <?= $loginregisterbutton?>
                </a> | --><a href="<?= $sitepath ?>forgotpassword.php">
                <?= $loginregistereventorgfgpw?>
                </a>
                <? if(file_exists($abspath."english/plresendverification.php")) { 
						include("plugin.plresendtranslation.php");?>
                        
                | <a href="<?=$sitepath?>plresendverification.php">| <?=$login_resend_btn?>

                </a>
               <? } else { ?>
                <!--<a class="forgate_password" href="<?= $sitepath ?>forgotpassword.php"> <?= $loginregistereventorgfgpw?></a>-->                                
				<? //include("plugin.plresendtranslation.php");?>
               | <a class="resend_password" href="<?= $sitepath ?>plresendverification.php"><?=$login_resend_btn?> </a>
                
                <!--<div class="login_bottm_link">New to Partner4Muslim.com?<a href="<?= $sitepath ?>registration.php">Sign up</a>now!</div>-->
              
                <? } ?>
                <? } ?>
              </div>                            
             
            </div>