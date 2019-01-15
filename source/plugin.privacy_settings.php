<div class="pagetitle">
  <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-1 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-10 midle_title"><span>
      <?=$left_privacysettings?>
      </span></div>
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-1 hidden-md trac_top">&nbsp;</div>
  </div>
</div>
<?

if(isset($_GET['t']) && $_GET['t']!=''){
	
	$tabtype=$_GET['t'];
	
	if($tabtype==1){
		
		$privasylink='active';
		
		$changepasswordlink='';
		
		$packagedetailslink='';
		
		$message = $messageerrmess86;
	
	}else if($tabtype==2){
		
	
		$privasylink='';
		
		$changepasswordlink='active';
		
		$packagedetailslink='';
		
		$message = $messageerrmess16;
	
	}else {
		
		
		$privasylink='';
		
		$changepasswordlink='';
		
		$packagedetailslink='active';
		
		$message = '';
	}
	
	
	
}else{

$tabtype='';

$privasylink='active';

$changepasswordlink='';

$packagedetailslink='';
	
$message = '';	
}




if(isset($_GET['v']) && $_GET['v']=='1'){
$vmessages='block';	
}else{
$vmessages='none';	
}

?>
<div class="pagecontent" style="display:<?=$vmessages?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="alerttable">
    <tbody>
      <tr>
        <td class="alerticon"><img src="<?= $siteimagepath ?>images/alerticon.gif" alt=""></td>
        <td><div class="error1" align="center">
            <p style="color:#fff;text-transform:capitalize"> <span class="error">
              <?=$message?>
              </span></p>
          </div></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="display_tabs pagepvSetting">
  <ul class="nav nav-tabs">
    <li class="<?=$privasylink?>"><a data-toggle="tab" href="#display_privacy">
      <?= $privacyheading ?>
      </a></li>
    <li class="<?=$changepasswordlink?>"><a data-toggle="tab" href="#display_changepass">
      <?= $updateprofilechangepasswordpgtitle ?>
      </a></li>
    <li class="<?=$packagedetailslink?>"><a data-toggle="tab" href="#display_packagedetails"><?=$pck_detail?></a></li>
  </ul>
  <div class="tab-content"> 
    
    <!----------- PRIVACY SETTINGS--------------------------------------->
    <div id="display_privacy" class="tab-pane fade in <?=$privasylink?>"> 
      
      <!-- ********* TITLE START HERE *********-->
      <div class="pagetitle">
        <div class="featured_title_div abtus">
          <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
          <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span>
            <?= $privacyheading ?>
            </h1>
            </span></div>
          <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
        </div>
      </div>
      
      <!-- ********* TITLE END HERE *********-->
      <div class="pagecontent"> 
        <!-- ********* CONTENT START HERE *********-->
        <form  ENCTYPE="multipart/form-data" class="update_form" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php">
          <? if($tabtype==1){?>
          <div class="errorbox"><span>
            <?php checkerror(); ?>
            </span></div>
          <? }?>
          <fieldset>
            <?
        $chk_m = '';
        $chk_w = '';
        $chk_n = '';
        if($sendmeemail=='M'){
            $chk_m = 'checked="checked"';	
        } else if($sendmeemail=='W'){
            $chk_w = 'checked="checked"';
        } else if($sendmeemail=='N'){
            $chk_n = 'checked="checked"';
        }
        $req_y = '';
        $req_n = '';
        if($imgreq=='Y'){
            $req_y = 'checked="checked"';
        }
        if($imgreq=='N'){
            $req_n = 'checked="checked"';
        }
        $view_n = '';
        $view_r = '';
        $view_p = '';
        $view_a = '';
        if($profileiviewd=='N'){
            $view_n = 'checked="checked"';	
        }
        if($profileiviewd=='R'){
            $view_r = 'checked="checked"';
        }
        if($profileiviewd=='P'){
            $view_p = 'checked="checked"';	
        }
        if($profileiviewd=='A'){
            $view_a = 'checked="checked"';	
        }
        $con_y = '';
        $con_n = 'checked="checked"';
        $email_y = '';
        $email_n = 'checked="checked"';
        if($privateemail=='Y'){
            $email_y = 'checked="checked"';
            $email_n = '';		
        }
        if($privatecontact=='Y'){
            $con_y = 'checked="checked"';
            $con_n = '';			
        }
        ?>
            <div class="form-group">
              <label class="col-lg-4 control-label">
                <?= $privacypartnermatchemail ?>
                : </label>
              <div class="col-lg-8">
                <input type="radio" name="partner_email" id="partner_email" value="M" <?=$chk_m?> />
                <?= $privacymonthly ?>
                <input type="radio" name="partner_email" id="partner_email" value="W" <?=$chk_w?> />
                <?= $privacyweekly ?>
                <input type="radio" name="partner_email" id="partner_email" value="N" <?=$chk_n?> />
                <?= $privacydontknow ?>
              </div>
            </div>
            <?php /*?><div class="form-group">
              <label class="col-lg-4 control-label">
                <?= $privacyimagerequerst ?>
                : </label>
              <div class="col-lg-8">
                <input type="radio" name="imagerequest" id="imagerequest" value="Y" <?=$req_y?> />
                <?= $privacyyes ?>
                <input type="radio" name="imagerequest" id="imagerequest" value="N" <?=$req_n?> />
                <?= $privacyno ?>
              </div>
            </div><?php */?>
            <div class="form-group">
              <label class="col-lg-4 control-label">
                <?= $privacyprofileviewedby ?>
                : </label>
              <div class="col-lg-8">
                <?php /*?><input type="radio" name="profileviewdby" id="profileviewdby" value="N" <?=$view_n?> /> <?= $privacynonregistered ?><?php */?>
                <input type="radio" name="profileviewdby" id="profileviewdby" value="R" <?=$view_r?> />
                <?= $privacyregistered ?>
                <?php /*?><input type="radio" name="profileviewdby" id="profileviewdby" value="P" <?=$view_p?> /> <?= $privacypaid ?><?php */?>
                <input type="radio" name="profileviewdby" id="profileviewdby" value="A" <?=$view_a?> />
                <?= $privacyallusers ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">
                <?= $privacyprivatecontact ?>
                : </label>
              <div class="col-lg-8">
                <input type="radio" name="privatecontact" id="privatecontact" value="Y" <?=$con_y?> />
                <?= $privacyyes ?>
                <input type="radio" name="privatecontact" id="privatecontact" value="N" <?=$con_n?> />
                <?= $privacyno ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">
                <?= $privacyprivateemail ?>
                : </label>
              <div class="col-lg-8">
                <input type="radio" name="privateemail" id="privateemail" value="Y" <?=$email_y?> />
                <?= $privacyyes ?>
                <input type="radio" name="privateemail" id="privateemail" value="N" <?=$email_n?>/>
                <?= $privacyno ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">
                <?=$ProfileActiveDeactive?>
                : </label>
              <div class="col-lg-8">
                <? $status = getonefielddata("select currentstatus from tbldatingusermaster  where userid =$curruserid"); ?>
                <? if ($status == 0) { ?>
                <li class="privacy_link"><a href="<?= $sitepath ?>profile_active_deactive.php?b=4">
                  <?= $leftlinkprofile_deactive ?>
                  </a></li>
                <? } else { ?>
                <li><a href="<?= $sitepath ?>profile_active_deactive_action.php?b=0">
                  <?= $leftlinkprofile_active ?>
                  </a></li>
                <? } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">&nbsp;</label>
              <div class="col-lg-8">
              <div class="formbtn_outer">
                <input name="Submit" type="submit"  class='formbtn' value="<?= $updatepersonalprofiledsubmit ?>">
                <input name="Reset" type="reset"  class='resetbtn'  value="<?= $updatepersonalprofiledreset ?>">
                </div>
              </div>
            </div>
          </fieldset>
        </form>
        <!-- ********* CONTENT END HERE *********--> 
      </div>
    </div>
    
    <!----------- PRIVACY SETTINGS--------------------------------------->
    <div id="display_changepass" class="tab-pane fade in <?=$changepasswordlink?>"> 
      
      <!-- ********* TITLE START HERE *********-->
      <div class="pagetitle">
        <div class="featured_title_div abtus">
          <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
          <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span>
            <?= $updateprofilechangepasswordpgtitle ?>
            </span></div>
          <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
        </div>
      </div>
      
      <!-- ********* TITLE END HERE *********-->
      <div class="pagecontent"> 
        <!-- ********* CONTENT START HERE *********-->
        
        <form ENCTYPE="multipart/form-data" class="login" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename1 ?>.php">
          <? if($tabtype==2){?>
          <div class="errorbox"><span>
            <?php checkerror(); ?>
            </span></div>
          <? }?>
          <fieldset>
            <div class="form-group">
              <label class="col-lg-4 control-label">
                <?= $updateprofilechangepasswordoldpass ?>
              </label>
              <div class="col-lg-8">
                <input type="password" name="txtoldpass" size="35" class="form-control" maxlength="<?= $textbox_character_max_length ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">
                <?= $updateprofilechangepasswordnewpass ?>
              </label>
              <div class="col-lg-8">
                <input type="password" name="txtnewpass" size="35" class="form-control" maxlength="<?= $textbox_character_max_length ?>"/>
              </div>
            </div>
            <div class="form-group button_section">
              <label class="col-lg-4 control-label">&nbsp;</label>
              <div class="col-lg-8">
              <div class="formbtn_outer">
                <input name="Submit" type="submit"  class='formbtn' value="<?= $updateprofilechangepassworddsubmit ?>">
                <input name="Reset" type="reset"  class='resetbtn'  value="<?= $updateprofilechangepassworddreset ?>"></div>
              </div>
            </div>
          </fieldset>
        </form>
        
        <!-- ********* CONTENT END HERE *********--> 
      </div>
    </div>
    <div id="display_packagedetails" class="tab-pane fade in <?=$packagedetailslink?>"> 
      
      <!-- ********* TITLE START HERE *********-->
      <div class="pagetitle">
        <div class="featured_title_div abtus">
          <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
          <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?=$pck_detail?></span></div>
          <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
        </div>
      </div>
      
      <!-- ********* TITLE END HERE *********-->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="Privacy-Package-Details"> 
          <!---<h3>Analytics</h3>--->
          
          <?
		   $packageid = getonefielddata("select packageid from tbldatingusermaster where userid='".$curruserid."' ");
		   
		  $package_name = getonefielddata("select Description from tbldatingpackagemaster where PackageId='".$packageid."' ");
		  
		  
		  $package_day= getonefielddata("select Days from tbldatingpackagemaster where PackageId='".$packageid."' ");
		  
		  
		  $package_exp = getonefielddata("select expiredate from tbldatingusermaster where userid='".$curruserid."' ");
		   
		  $express_count = getonefielddata("select express_count from tbldatingusermaster where userid='".$curruserid."' "); 
		   
		  $ecard_count = getonefielddata("select ecard_count from tbldatingusermaster where userid='".$curruserid."' "); 
		   
		   ?>
          <h3>
         <!-- <span class="P_name">
          <?=$packagename?>
          </span> -->
          <span class="P_name_ditai">
          <strong>
          <?=$package_name?><br>
          <em> <?=$pck_detail_exp?> : <?=$package_exp?></em>
          </strong></span>
          </h3>
          <ul>
            <li> <span class="lable">
              <?=$packagesdays?>
              </span> <span class="badge badge-default badge-pill">
              <? if($package_day!=''){echo $package_day;}else{echo '0';}?>
              </span> </li>
            
            <li class="PDlist-group-item"> <span class="lable">
              <?=$expresscount?>
              </span> <span class="badge badge-default badge-pill">
              <? if($express_count!=''){ echo $express_count;}else{echo '0';}?>
              </span> </li>
            <li class="PDlist-group-item"> <span class="lable">
              <?=$ecardcount?>
              </span> <span class="badge badge-default badge-pill">
              <? if($ecard_count!=''){ echo $ecard_count;}else{echo '0';}?>
              </span> </li>
            <li class="PDlist-group-item"> <span class="lable">
              <?=$usercanseecontact?>
              </span> <span class="badge badge-default badge-pill">
              <?=user_can_see_contact_detail($curruserid,"Y")?>
              </span> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
