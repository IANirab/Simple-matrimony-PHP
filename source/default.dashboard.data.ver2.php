<!-- ********* TITLE START HERE *********-->

<div class="pagetitle">
  <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span>
      <?= $dashboardwelcome ?>
     <?= getusername(); ?>
     </span></div>
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
  </div>
</div>

<!-- ********* TITLE END HERE *********-->
<div class="pagecontent"> 
  
  <!-- ********* CONTENT START HERE *********--> 
  <!--Express Intrest Count -->
  
  <?
$result_fav      = getonefielddata("select count(ShortlistId) from  tbldatingshortlistmaster where currentstatus=0 and CreateBy=$curruserid");
$result_exp      = getonefielddata("select count(id) from tbldatingexpressintrestmaster where currentstatus=0 and fromuserid=$curruserid");
$result_pmb      = getonefielddata("SELECT count(PmbId) FROM tbldatingpmbmaster
        WHERE CurrentStatus =0 AND FromUserId=$curruserid AND tbldatingpmbmaster.Subject NOT IN (Select title from tbldatingwinkmaster where currentstatus=0)");
$result_wink     = getonefielddata("SELECT count(PmbId) FROM tbldatingpmbmaster
        WHERE CurrentStatus =0 AND FromUserId=$curruserid AND Subject IN (Select title from tbldatingwinkmaster where currentstatus=0)");
$result_pmbreply = getonefielddata("select count(PmbId) from  tbldatingpmbmaster where currentstatus=0 and FromUserId=$curruserid");
$genderid        = getonefielddata("select genderid from tbldatingusermaster where userid=$curruserid and currentstatus=0 ");
if ($genderid != '') {
    $count = getonefielddata("select count(userid) from tbldatingusermaster where currentstatus=0 and genderid!=$genderid");
} else {
    $count = 0;
}
$percentage_exp    = '';
$percentage_fav    = '';
$percentage_pmb    = '';
$percentage_pmbrep = '';
$percentage_wink   = '';
if ($result_fav > 0 && $count > 0) {
    $percentage_fav = percentage($result_fav, $count);
}
if ($result_exp > 0 && $count > 0) {
    $percentage_exp = percentage($result_exp, $count);
}
if ($result_pmb > 0 && $count > 0) {
    $percentage_pmb = percentage($result_pmb, $count);
}
if ($result_wink > 0 && $count > 0) {
    $percentage_wink = percentage($result_wink, $count);
}
if ($result_pmbreply > 0 && $count > 0) {
    $percentage_pmbrep = percentage($result_pmbreply, $count);
}
if ($percentage_exp > 0 && $percentage_fav > 0 && $percentage_pmb > 0 && $percentage_pmbrep > 0 && $percentage_wink > 0) {
    $percentage1 = $percentage_exp + $percentage_fav + $percentage_pmb + $percentage_pmbrep + $percentage_wink;
} else {
    $percentage1 = '';
}
if ($count > 0) {
    $div = $count * 5;
}
if ($percentage1 > 0 && $div > 0) {
    $percentage = percentage($percentage1, $div);
} else {
    $percentage = '';
}
if ($percentage != '') {
    $query = execute("update tbldatingusermaster set activity_percentage=$percentage where userid=$curruserid and currentstatus=0");
}
?>
 <!-- End --> 

<!--Error Message Block Was Here -->

  
  <!-- ================| Left Side Start |================ -->
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="das-user-image-outer">
      <div class="das-left-inner">
      		<div class="user-pic-das">
      			<span class="lay-over-imge"><?= $imagenm ?></span>	
		      	<div class="user-id-number"> 		      	
		      		<span>
			          <?= $dashboardmyprofileid ?>
			         </span> <strong>
			          <?= display_profile_code($curruserid) ?>
			         </strong> 
			     </div>
		        <figure><a href='<?= $ownprofilelink ?>' target="_blank">
		          <?= $imagenm ?>
		         </a></figure>
		     </div>

		        <div class="but-with-icon">
		          <ul>
		            <?
		$curruserid_status = getonefielddata("select currentstatus from  tbldatingusermaster where userid='" . $curruserid . "' ");
		?>
		           <?
		if ($curruserid_status == 0) {
		?>
		           <li> <a href='<?= $ownprofilelink ?>' target="_blank"><i class="fa fa-user"></i>
		              <br><?= $dashboardviewmyprofile ?>
		             </a> </li>
		            <?
		}
		?>
		           <li> <a href='album.php?b=<?= $curruserid ?>' target="_blank" class="icon_album"><i class="fa fa-image"></i>
		              <br>
		              <?= $dashboardviewalbum ?>
		             </a> </li>
		          </ul>
		        </div>
      
      <?
$expresscount = getonefielddata("SELECT count(id) from tbldatingexpressintrestmaster WHERE touserid=" . $curruserid);
if ($blockchat == 'Y') {
    $chatonclick = '';
} else {
    $chatonclick = 'onclick="showmessenger();"';
}
?>
     <?
$unread = getonefielddata("SELECT count(pmbid) from tbldatingpmbmaster WHERE touserid=" . $curruserid . " AND messagestatus=1 AND currentstatus=0");
?>
     <div class="dashboardselfprofile">
        <div class="dashboard_profile_stuttas_main">
          <div class="dashboard_profile_tital">
            <?= $profilestatushead ?>
         </div>
          <div border="0" class="profilestatus">
            <div>
              <div style="width:<?= $profile_percentage ?>%" class="profilestatusfill">&nbsp;</div>
            </div>
          </div>
          <div class="dashboard_profile_txt">
            <?= $dashboard_profile_complete_mess1 ?>
           <?= $profile_percentage ?>
           %
            <?= $dashboard_profile_complete_mess2 ?>
         </div>
        </div>
      </div>      

      <div class="AllpackagesBlock_outer"> 
        <h3>
          Package Details
        </h3>


      <!-- <a class="btn" href="javascript:void(0)" onclick="pckg_info_dash()"><i class="fa fa-cube" aria-hidden="true"></i>
        <?= $dash_pck_info ?>
       </a>-->
        <!--<div id="pckg_info_dash" style="display:none"> </div>-->
        <div id="pckg_info_dash"> <? include("get_package_info.php")  ?> </div>
      </div>
      </div>
    </div>
  </div>  
  <!-- ================| Left Side End |================ --> 
  
  
  <!-- ================| Right Side Start |================ -->
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="right-dasboard-outer">
      <div class="right-dasboard-inner">
        <div class="cover-das-imges"> <img src="<?= $siteimagepath ?>images/das-cuver-image.jpg" alt=""  /> </div>

<!-- Error Message Block Start (Previously on Line 73@A)-->

 <div class="errorbox-blocks"> 
        <?
$expresscount = getonefielddata("SELECT count(id) from tbldatingexpressintrestmaster WHERE touserid=" . $curruserid);
if ($blockchat == 'Y') {
    $chatonclick = '';
} else {
    $chatonclick = 'onclick="showmessenger();"';
}
?>
       <?php
/*?><div class="dashboardmessenger"><img src="<?= $siteimagepath ?>images/messengerbtn.png" alt="" <?=$chatonclick?> /></div><?php */
?>
       <?php
/*?><div class="dashboardselfprofile_2"><a href="updateprofilepicture2.php"><?=$dashboard_manage_photos ?></a></div><?php */
?>
       <?php
/*?><div class="dashboardselfprofile"><a href='<?= $ownprofilelink ?>' target="_blank"><?= $dashboardviewmyprofile ?></a></div><?php */
?>
     
      <div class="Dalert alert-warning">
        <span>
        <?= $expmess ?>
       </span>
       <span>
        <?php
checkerror();
?>
       </span>

     </div>    




<?

if ($sms_module_enable == 'Y' && $dashboard_mobile_verification_sms == 'Y') {
    $userdata             = getdata("SELECT country_code,mobile,smsverified,smsverificationcode from tbldatingusermaster WHERE userid=" . $curruserid);
    $user_rs              = mysqli_fetch_array($userdata);
    $sms_country_code     = $user_rs[0];
    $sms_mobile           = $user_rs[1];
    $sms_verified         = $user_rs[2];
    $sms_verificationcode = $user_rs[3];
    
?>
     <?
    if ($sms_country_code == '' || $sms_mobile == '') {
?>
     <?
    } else if ($sms_verified != 'Y' && $sms_country_code != '' && $sms_mobile != '' && $sms_verificationcode == '') {
?>
     <div class="smsmessage">
        <div class="Dalert alert-info">
        <?= $dash_sms_txt3 ?>
       <a href="smsverify.php">
        <?= $dash_sms_txt1 ?>
       </a>
        <?= $dash_sms_txt2 ?>
        </div>
     </div>
      <?
    } else if ($sms_verified != 'Y') {
?>
     <div class="smsmessage">
       <div class="Dalert alert-info">
        <?= $dash_sms_txt3 ?>
       <a href="verifysms.php">
        <?= $dash_sms_txt1 ?>
       </a>
        <?= $dash_sms_txt2 ?>
      </div>
     </div>
      <?
    }
}
?>

     </div>

     <!--Error Message Block End-->



        <div class="login-time-text"> <strong>
          <?= $dashboard_current_login_ip ?>
         :
          <?= getip() ?>
         |
          <?= $dashboard_lastlogin ?>
         :
          <?= $lastlogin ?>
         </strong> </div>
         <div class="special_blockDas">
        <ul>
            <li>
            <div class="spBlock"> 
             <figure>
                 <a href='enhance_packagemanager.php' target="_blank" class="icon_album">
                   <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/Enhance_icon.png" alt="" /> 
                 </a>
             </figure>
                <strong> <a href='enhance_packagemanager.php' target="_blank" class="icon_album">
         <?=$dashboardenhance ?>                  
                 </a></strong>
             </div>
            </li>
            
            <? if($enable_admin_search=='Y'){?>
            <li>
            <div class="spBlock"> 
             <figure>
                 <a href='elite.php' target="_blank" class="icon_album">
                   <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/elite_icon.png" alt="" />
                 </a>
             </figure>
             <strong><a href='elite.php' target="_blank" class="icon_album"> <?=$dashboardelitepackage?> </a></strong>
              </div>
            </li>
            <? } ?>
            <li>
             <div class="spBlock">  
             <figure>
                 <a href='badges.php' target="_blank" class="icon_album">
                   <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/baDges_icon.png" alt="" />
                 </a>
             </figure>
               <strong><a href='badges.php' target="_blank" class="icon_album"><?=$dashboardpremiumbadges?> </a></strong>
               </div>
            </li>
          </ul>
        </div>


      
   
<div class="">
  <div class="dashboard_wrap">
    <div>
      <?php //include("announcement.php") 
?>
     <? //find_announcement(3) 
?>
   </div>
  </div>
  <?
$expresscount = getonefielddata("SELECT count(id) from tbldatingexpressintrestmaster WHERE touserid=" . $curruserid);
if ($blockchat == 'Y') {
    $chatonclick = '';
} else {
    $chatonclick = 'onclick="showmessenger();"';
}
?>
 <?php
/*?><div class="dashboardmessenger"><img src="<?= $siteimagepath ?>images/messengerbtn.png" alt="" <?=$chatonclick?> /></div><?php */
?>
 <?php
/*?><div class="dashboardselfprofile_2"><a href="updateprofilepicture2.php"><?=$dashboard_manage_photos ?></a></div><?php */
?>
 <?php
/*?><div class="dashboardselfprofile"><a href='<?= $ownprofilelink ?>' target="_blank"><?= $dashboardviewmyprofile ?></a></div><?php */
?>
</div>

<?
$unread = getonefielddata("SELECT count(pmbid) from tbldatingpmbmaster WHERE touserid=" . $curruserid . " AND messagestatus=1 AND currentstatus=0");
?>
<div class="dashboardnewmessages">
  <div class="newmessage"> </div>
</div>
<div class="dashboardnewmessages2">
  <?
if ($totalnewmessage == "")
    $totalnewmessage = 0;
if ($totalnewmessage == 0)
    $clsnm = "newmessage2";
else
    $clsnm = "newmessage1";
?>
 <?php
/*?><div class="newmessage"><div class="<?= $clsnm ?>"><span><?= $dashboardtotalnewmessage ?></span> <a href='<?= $sitepath ?>pmbmanager.php?goto=Inbox'><?= $totalnewmessage ?></a></div><?php */
?>
</div>

<input type="hidden" id="divid" value="" />
<!--<div class="dashboardinfo">-->
<div class="dashboardinfonew">
  <div class="dashboardinfo2">
    <?
require_once("dashboard_stats1.php");
?>
 </div>
</div>
<?
require_once("dashborad_stats2.php");
?>
<?php
/*?><div class="dashboardtotalexpressinterest"><span><?= $dashboardtotal_express_intrest_pending ?>:</span> <a href='<?= $sitepath ?>express_intrest_received.php'><?= express_intrest_pending($curruserid) ?></a></div><?php */
?>
<? //check_weather_to_display_trust_seal_banner($curruserid) 
?>
<?php
/*?><div class="dashboarddata1">
<span><?= $dashboardtotal_contact_view ?> </span> 
<a href='<?= $sitepath ?>contact_viewd_master.php'><?= $total_contact_can_view ?></a></div><?php */
?>
<?php
/*?><div class="dashboarddata2 lefter_dash">
<span class="design_block"><label><?= $dashboard_preffered_partner ?> <?= $preffered_partner_match_default_days ?> <?= $dashboard_preffered_partner_1 ?></label> <b> <?= $total_preffered_partner ?></b></span> </div><?php */
?>
<?php
/*?><div class="dashboarddata3 lefter_dash"><span class="design_block"><label><?= $dashboard_web_messagner_online_1 ?> <?= $total_messager_contact ?> <?= $dashboard_web_messagner_online_2 ?> </label><b> <?= $total_messager_contact_online ?></b></span> </div><?php */
?>
<div class="dashboardboxes">
  <div class="dashboardbox1">
    <?
if ($Update_profile_Pages_design_setting == "D") {
?>
   <a href="<?= $sitepath ?>updateprofilepersonal.php"> <img src="<?= $siteimagepath ?>images/iconupdateprofile.png" alt=""> <span>
    <?= $dashboardprofiles ?>
   </span></a>
    <?
}
?>
   <?
if ($Update_profile_Pages_design_setting == "S") {
?>
   <a href="<?= $sitepath ?>registration2.php"><img src="<?= $siteimagepath ?>images/iconupdateprofile.png" alt=""> <span>
    <?= $dashboardprofiles ?>
   </span></a>
    <?
}
?>
 </div>
  <div class="dashboardbox1"> <a href="<?= $sitepath ?>updateprofilepicture2.php"> <img src="<?= $siteimagepath ?>images/profile_pic_icon.png" alt=""> <span>
    <?= $dashboardprofilepicture ?>
   </span></a> </div>
  <div class="dashboardbox1"> <a href='<?= $sitepath ?>favoritemanager.php'><img src="<?= $siteimagepath ?>images/iconfavorite.png" alt=""> <span>
    <?= $dashboardmyfavorite ?>
   </span></a></div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>albummaster.php'><img src="<?= $siteimagepath ?>images/iconalbum.png" alt=""> <span>
    <?= $dashboardalbummanager ?>
   </span></a> </div>
  <div class="dashboardbox1"> <a href="<?= $sitepath ?>notify.php"> <img src="<?= $siteimagepath ?>images/in_out_icon.png" alt=""> <span>
    <?= $dashboardInbox ?>
   </span></a> </div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>packagemanager.php'><img src="<?= $siteimagepath ?>images/iconpackagemanager.png" alt=""> <span>
    <?= $dashboardpackagemanager ?>
   </span></a></div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>invoicemanager.php'><img src="<?= $siteimagepath ?>images/iconinvoicemanager.png" alt=""> <span>
    <?= $dashboardinvoicemanager ?>
   </span></a></div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>search_crieteria_manager.php'><img src="<?= $siteimagepath ?>images/iconsearchcrieteriamanager.png" alt=""><span>
    <?= $dashboard_search_criteria ?>
   </span></a></div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>viewedothercontacts.php'> <img src="<?= $siteimagepath ?>images/viewedBYcontact_icon.png" alt=""> <span>
    <?= $dashborad_stats2_memberscontactsviewedbyme ?>
   (
    <?= $msg_2 ?>
   )</span></a></div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>notify_analytics.php'><img src="<?= $siteimagepath ?>images/Analytics_icon.png" alt=""> <span>
    <?= $dash_analytic ?>
   </span></a></div>
  <?
$msg_1    = getonefielddata("SELECT count(id) AS CNT FROM `tblphonerequestmaster` WHERE touserid=" . $curruserid);
$msg_2    = getonefielddata("SELECT count(id) AS CNT FROM `tblphonerequestmaster` WHERE fromuserid=" . $curruserid);
//$msg_3 = getonefielddata("SELECT count(historyid) AS CNT FROM `tbldatingprofilehistorymaster` WHERE touserid=".$curruserid);
//$msg_4 = getonefielddata("SELECT count(historyid) AS CNT FROM `tbldatingprofilehistorymaster` WHERE fromuserid=".$curruserid);
$genderid = getonefielddata("select genderid from tbldatingusermaster where userid =$curruserid");
if ($genderid == 1) {
    $gendid = 2;
} else {
    $gendid = 1;
}
$genid        = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=" . $curruserid);
$msg_3_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where  tbldatingprofilehistorymaster.touserid=$curruserid and  tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingprofilehistorymaster.fromuserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=" . $genid . "  group by touserid order by historyid DESC");
$msg_3        = mysqli_num_rows($msg_3_result);

$msg_1 = getonefielddata("SELECT count(tblphonerequestmaster.id) from tblphonerequestmaster,tbldatingusermaster WHERE tblphonerequestmaster.touserid=$curruserid AND tblphonerequestmaster.fromuserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus in (0,1) AND tblphonerequestmaster.currentstatus=0");

$msg_2 = getonefielddata("SELECT count(tblphonerequestmaster.id) from tblphonerequestmaster,tbldatingusermaster WHERE tblphonerequestmaster.fromuserid=$curruserid AND tblphonerequestmaster.touserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus in (0,1) AND tblphonerequestmaster.currentstatus=0");

//$msg_4_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where tbldatingprofilehistorymaster.fromuserid=$curruserid and tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus=0 and tbldatingprofilehistorymaster.touserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=".$genid." group by fromuserid order by historyid DESC");
$msg_4_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where tbldatingprofilehistorymaster.fromuserid=$curruserid and tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingprofilehistorymaster.touserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=$genid group by touserid order by historyid");
$msg_4        = mysqli_num_rows($msg_4_result);


?>
 <div class="dashboardbox1"><a href='<?= $sitepath ?>viewedmycontact.php'> <img src="<?= $siteimagepath ?>images/viewedcontact_icon.png" alt=""> <span>
    <?= $dashborad_stats2_membersviewedmycontacts ?>
   (
    <?= $msg_1 ?>
   )</span></a></div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>viewedmyprofile.php'> <img src="<?= $siteimagepath ?>images/viewedmyProfile_icon.png" alt=""> <span>
    <?= $dashborad_stats2_membersviewedmyprofile ?>
   (
    <?= $msg_3 ?>
   )</span></a></div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>viewedotherprofiles.php'> <img src="<?= $siteimagepath ?>images/viewedmyuser_icon.png" alt=""> <span>
    <?= $dashborad_stats2_membersviewebyme ?>
   (
    <?= $msg_4 ?>
   )</span></a></div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>privacy_settings.php'><img src="<?= $siteimagepath ?>images/iconprivacy_settings.png" alt=""> <span>
    <?= $left_privacysettings ?>
   </span></a></div>
  <div class="dashboardbox1"><a href='<?= $sitepath ?>signout.php'><img src="<?= $siteimagepath ?>images/iconlogout.png" alt=""> <span>
    <?= $dashboardlogout ?>
   </span></a></div>
</div>
    
    </div>
    </div>
  </div>
</div>
</div>
<!-- ================| Right Side End |================ -->

</div>
</div>

<!-- ********* CONTENT END HERE *********--> 