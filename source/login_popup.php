<?php

//require_once('commonfile.php');
//$username = getusername();
//if($username !="")
//	header("location:dashboard.php");
$pro ="";	
$cookies_user = '';
if (isset($_GET["b"]))
	$pro = "?b=pro";
elseif (isset($_GET["fnm"]))
	$pro = "?fnm=". $_GET["fnm"];
if(isset($_COOKIE['username'])){
		$cookies_user = $_COOKIE['username'];
		}

?>
<script type="text/javascript">
function timeout(divid,seconds){
	
	setTimeout(function() {
    	$(divid).hide('slow');
	}, seconds);	
}
</script>
<Script Language="JavaScript">




function echecklogin(str) {

		var at="@";
		var dot=".";
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){		   
		   return false
		}
		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){		   
		   return false
		}
		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){		 
		    return false
		}
		if (str.indexOf(at,(lat+1))!=-1){		    
		    return false
		}
		if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){		
		    return false
		}
		if (str.indexOf(dot,(lat+2))==-1){		 
		    return false
		}
		//if (str.indexOf(" ")!=-1){		
		  //  return false
		//}
 		 return true	
		 timeout("errormsg",3000)				
	}



function loginvalidate(){
		

		var msg="#errbx";
		if($("#txtEmailAddress1").val()==""){		
			$(msg).html("Please enter emailaddress.");
			$(msg).show();
			$(msg).show();
			$("#txtEmailAddress1").focus();
			timeout(msg,3000)			
			return false;
		} else if(echecklogin($("#txtEmailAddress1").val())==false){
			$(msg).html("Please enter valid emailaddress.");
			$(msg).show();
			$(msg).show();
			$("#UserEmail").focus();
			timeout(msg,3000)			
			return false;
		}  else if($("#txtPassword1").val()==""){
			$(msg).html("Please enter password.");
			$(msg).show();
			$(msg).show();
			$("#txtPassword1").focus();
			timeout(msg,3000)			
			return false;
		} 
		else
		{
			
			var txtEmailAddress1 = $("#txtEmailAddress1").val();
			var txtPassword1 = $("#txtPassword1").val();
			var chkrememberme1 = $("#chkrememberme1").val();
			var url = $("#url").val();
			
			$.post("<?=$sitepath?>loginsubmit_data.php",
			{
			txtEmailAddress1:txtEmailAddress1,
			txtPassword1:txtPassword1,
			chkrememberme1:chkrememberme1
			},
			
			function (data)
			{	
				if(data.trim()=='Sucess')
				{
					window.location = url;
				}
				else if(data.trim()=='SMS')
				{
					window.location = 'verifysms.php';
				}
				else
				{
					$(msg).html(data);
					$(msg).show();
					timeout(msg,3000)
					return false;
					window.stop();
				}
			})
			
			return false;
		}
		
		
	}



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
              
          <div class="error1" align="center" id="errbx" style="display:none">
		 </div>
		 
    
             <form name="frmLogin2"  class="Login LOginPopup"  onsubmit="return loginvalidate();">
                <fieldset>
                 <div class="form-group">
                    <label class="col-lg-4 control-label">
                      <?= $loginemailadd  ?>
                    </label>
                     <div class="col-lg-8">
                    <INPUT TYPE="TEXT" class="form-control" NAME="txtEmailAddress1" id="txtEmailAddress1" MAXLENGTH="50" SIZE="40" value="<? if($cookies_user!= ''){ echo $cookies_user;}?>">
                 </div>
                 </div>
                  <div class="form-group">
                   <label class="col-lg-4 control-label">
                      <?= $loginpassword ?>
                    </label>
                    <div class="col-lg-8">
                    <INPUT TYPE="PASSWORD" class="form-control" NAME="txtPassword1" id="txtPassword1" MAXLENGTH="50" SIZE="40">
                  </div>
                  </div>
                   <div class="form-group nolable">
                    <label class="col-lg-4 control-label">
                   &nbsp;</label>
                     <div class="col-lg-8">
                    <input type=checkbox name ="chkrememberme" id="chkrememberme1" size="35" value="Y">
                    <?= $loginremember ?>
                  </div>
                  </div>
                  <div class="form-group nolable">
                    <label class="col-lg-4 control-label">
                   &nbsp;</label>
                     <div class="col-lg-8">
                     <div class="formbtn_outer">
                     <input type="Submit" name="cmdSignIn" value="<?= $loginsubmit ?>"  
                      CLASS="formbtn" />
                      </div>
                   
                 </div>
                 </div>
                 <input type="hidden" id="url" name="url" value="dashboard.php">
                  
                  
                  
                </fieldset>
              </form>
              
              <div class="extralink1"> 

           <a  onclick="register_data(this.id)"  ><?=$registrationhere?></a>    |
              	<? if($sitethemefolder!='pom') { ?>
                <!--<a href="<?= $sitepath ?>registration.php">
                <?= $loginregisterbutton?>
                </a> | --><a href="<?= $sitepath ?>forgotpassword.php">
                <?= $loginregistereventorgfgpw?>
                </a>
                <? if(file_exists($abspath."english/plresendverification.php")) { 
					//	include("plugin.resendtranslation.php");?>
                | <a href="<?=$sitepath?>plresendverification.php">
                <? $plugin_resendlink ?>
                </a>
               <? } else { ?>
                <!--<a class="forgate_password" href="<?= $sitepath ?>forgotpassword.php"> <?= $loginregistereventorgfgpw?></a>-->                                
				<? //include("plugin.resendtranslation.php");?>
                <a class="resend_password" href="<?= $sitepath ?>plresendverification.php"> <? $plugin_resendlink ?></a>
                
                <!--<div class="login_bottm_link">New to Partner4Muslim.com?<a href="<?= $sitepath ?>registration.php">Sign up</a>now!</div>-->
              
                <? } ?>
                <? } ?>
              </div>                            
             
            </div>