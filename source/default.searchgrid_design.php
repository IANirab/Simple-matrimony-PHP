<?  
function display_search_grid_design_designview($classnm,$imagenm,$packimg,$userlink,$name,$profile_code,$zodiacsign,$userid,$mobile,$age,$genderid,$city,$state,$countryid,$religianid,$castid,$maritalstatusid,$lastlogin,$profileheadline,$imageonrequest,$ocupationid,$annual_income_id,$annual_income_currancyid,$educationid,$k,$heightid,$weightid){ 
global $searchgridprofile_id,$mobilenumber,$searchgriddisplayprofilefromtext,$searchgridreligian,$searchgridcast,$searchgridmaritalstatus,$searchgridlastlogin,$siteimagepath,$sitepath,$searchgridimagerequest,$curruserid,$Enable_cast_subcast_design_setting,$searchgrid_occupation,$searchgrid_annual_income,$searchgrid_education,$default_searchgrid_design_height,$default_searchgrid_design_weight;
$userimg = getonefielddata("SELECT imagenm from tbldatingusermaster WHERE userid=".$userid);
$smsverified = getonefielddata("SELECT smsverified from tbldatingusermaster WHERE userid=".$userid);

 $pkgprice = getonefielddata("SELECT tbldatingpackagemaster.price from tbldatingpackagemaster,tbldatingusermaster WHERE tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND datediff(tbldatingusermaster.expiredate,curdate())>0 AND userid=".$userid);

 $user_packageid='';
$user_packageid = getonefielddata("SELECT tbldatingfeaturedusermaster.packageid from 
tbldatingfeaturedusermaster WHERE  userid=".$userid." and currentstatus=0 and expiredate>=curdate() order by featureid desc limit 1 ");
if($user_packageid!='' || $pkgprice>0)
{
	$premium_class='buyPac_sec';
}else{$premium_class='';}

?>    
<div class="searchgridbox">
<div style="width:100%; float:left; position:relative;" class="<?= $classnm ?>">
<div class="searchgridmain <?=$premium_class?>">
<div class="searchgridname">

<!-- Haresh code starts Here --> 
<input type="checkbox" name="chk_user_<?= $userid ?>" id="chk_user_<?=$k?>" value="<?= $userid ?>" />
<!--  Haresh code ends Here -->

&nbsp;<a href='<?= $userlink ?>'> 
<? if(findsettingvalue('display_user_name')=='Y'){?>
<?=$name?> &nbsp;&nbsp;
<? }else{ ?>
<?=display_name_round($name)?>
<? } ?>
<strong class="pid"><?= $searchgridprofile_id ?> <?= $profile_code ?></strong> 
</a>
<div class="lefter_srch"><?= $zodiacsign ?> 

<? 
if ($mobile != "" && $smsverified=='Y' ) { ?>
<img src="<?= $siteimagepath ?>images/mobileicon.png" border="0" title="Mobile Number Verified" />
<? } ?></div>
<?

$active_day=find_lastlogin($userid);

?>

<span class="lastlogin"><strong>
<?= $active_day ?> </strong></span>

</div>

<div class="search_badge_grid">


	 <?
	$ul=1;
	$badge_ckh=0;
	
	$result12 = getdata("SELECT `id`,`image`,`badge_image`,`bagde_assoc`
	FROM `tbldating_docmaster` WHERE currentstatus=0 ");
	while ($rs12 = mysqli_fetch_array($result12))
	{
		$badge_id=$rs12[0];
		$badge_image=$rs12[1];
		$get_image=$rs12[2];
		$bagde_assoc=$rs12[3];
	
		$badge_ckh = getonefielddata("SELECT count(id) from tbldating_userdoc where userid=".$userid." 
		and docid='".$badge_id."' and currentstatus=0 ");
		
			if($bagde_assoc=='free')
			{ 
            	$display_badge='Y';
			}
			elseif($bagde_assoc=='tru')
			{ 
         	
           		$trust_chk=getonefielddata("select count(id) from  tbldatingusertrustsealmaster
				where userid='".$userid."' and currentstatus=0
				and expiredate>=curdate() ");
				if($trust_chk>0)
				{
					$display_badge='Y';
				}else
				{
					$display_badge='N';
				}
			}
			elseif($bagde_assoc=='mem')
			{ 
         		$trialpckg=findsettingvalue("trialpackageid");
           		$mem_chk=getonefielddata("select count(userid) from  tbldatingusermaster
				where userid='".$userid."' and currentstatus in (0,1)
				and expiredate>=curdate() and packageid!=".$trialpckg." ");
				if($mem_chk>0)
				{
					$display_badge='Y';
				}
				else
				{
					$display_badge='N';
				}
			}
			else{$display_badge='N';}
		
	?>	
			<? if($badge_ckh>=2 && $display_badge=='Y') { ?>
            <figure class="bigBadgeImg"><img src="<?= $siteimagepath ?>images/<?=$get_image?>" 
       width="50" height="50"></figure>
			<? } ?>	   			
    
	<? } ?>
    <div class="badge_mg">
	<?=findverificationsealmember($userid) ?>
	<?php /*?><img align="absmiddle" src="<?= $siteimagepath ?>images/badge1.png"/><?php */?>
</div>
</div>


<div class="full_contacter">
<div class="searchgridimage"><?= $imagenm ?><br />
<? if($userimg!=''){?>	
<div class="zoomin">                 
<a href="<?= $sitepath ?>uploadfiles/<?=$userimg?>" class="fancybox"   data-fancybox-group="gallery" >
<img src="<?= $siteimagepath ?>images/zoomin.png" /></a>
</div>
<? } ?>

</div>
<div class="packageimage"><?= $packimg ?></div>
<div class="searchgridageetc">
<div class="left_exerge">

<?= $age ?>, <?= $genderid  ?> <?= $searchgriddisplayprofilefromtext ?> <? //$area ?> <?= $city  ?> <?= $state ?> <?= $countryid ?>
<br />
<strong><?= $searchgridreligian ?> :</strong>  <?= $religianid ?>
<? if ($Enable_cast_subcast_design_setting == "Y") { ?>
<label><strong class=""><?= $searchgridcast ?> :</strong> <?= $castid ?></label>
<? } ?>
<label><strong><?= $searchgridmaritalstatus ?> :</strong> <?= $maritalstatusid ?></label>

<? if ($ocupationid != "") { ?>
<label><strong><?= $searchgrid_occupation ?> :</strong>  <?= $ocupationid ?></label>
<? } ?>
<? if ($annual_income_id != "") { ?>
<label><strong><?= $searchgrid_annual_income ?> :</strong> <?= $annual_income_currancyid ?><?= $annual_income_id ?></label>
<? } ?>

<? if ($educationid != "") { ?>
<label><strong><?=$searchgrid_education?> :</strong> <?= $educationid ?></label>
<? } ?>

<? if ($heightid != "") { ?>
<label><strong><?=$default_searchgrid_design_height ?> :</strong> <?= $heightid ?></label>
<? } ?>

<? if ($weightid != "") { ?>
<label><strong><?=$default_searchgrid_design_weight?> :</strong><?= $weightid ?></label>
<? } ?>

<br />
<div class="searchgridheadline"><?= $profileheadline ?>...</div>



</div>

<div class="right_icons">
<? include("iconcommon.php") ?>
</div>
</div>
<br />

</div>
</div>
</div>
</div><br />
<?
}
function call_next_back()
{ 
global $BackStr,$NextStr,$page_no_str
?>
	
    <div class="nextback">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr valign="top">
	<td class="backtext">&nbsp;<?= $BackStr ?></td>
	<td class="pgnumber"><?= $page_no_str ?></td>
	<td class="nexttext">&nbsp;<?= $NextStr ?></td>
	</tr>
	</table>

	
	</div>

	
	<br />
	<br />
	<br	/>
<? }
function display_search_grid_design_photoview($classnm,$imagenm,$packimg,$userlink,$name,$profile_code,$zodiacsign,$userid,$mobile,$age,$genderid,$city,$state,$countryid,$religianid,$castid,$maritalstatusid,$lastlogin,$profileheadline,$imageonrequest,$ocupationid,$annual_income_id,$annual_income_currancyid,$packageid,$educationid,$k,$heightid,$weightid) { 

global $searchgridprofile_id,$mobilenumber,$searchgriddisplayprofilefromtext,$searchgridreligian,$searchgridcast,$searchgridmaritalstatus,$searchgridlastlogin,$siteimagepath,$sitepath,$searchgridimagerequest,$curruserid,$searchgrid_occupation,$searchgrid_annual_income,$PhoneRequestDisplay_design_setting,$searchgrid_education;

global $searchgridrequestsendwink,$searchgridrequest_send_intrest_emails,$searchgridrequestphonelink,$searchgriddisplayprofilelink,$searchgridemaillink,$searchgridaddtofavoritelink,$searchgridaddtochatlink;
$partner_agefrom = "";
$partner_ageto = "";
$partner_data = getdata("SELECT genderid,agefrom,ageto from tbldatingpartnerprofilemaster WHERE userid=".$userid);
$partner_rs = mysqli_fetch_array($partner_data);
$partner_genderid = findgender($partner_rs[0]);
$partner_agefrom = $partner_rs[1];
$partner_ageto = $partner_rs[2];
if($city!="0.0" && is_numeric($city)){
	$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$city);		
}
if($city=="0.0"){
	$city = "";	
}
if($packageid!=""){
	$packagenm = getonefielddata("SELECT Description from tbldatingpackagemaster WHERE PackageId=".$packageid);
} else {
	$packagenm = "";
}
$userimg = getonefielddata("SELECT imagenm from tbldatingusermaster WHERE userid=".$userid);
$headline = getonefielddata("SELECT profileheadline from tbldatingusermaster WHERE userid=".$userid);
$headline = substr($headline,0,50);
?>
<div class="photosearchgridmain">
<div class="<?= $classnm ?>">

<div class="photosearchgridimage">
<a class="thumbnail" href='<?= $userlink ?>'><?= $imagenm ?></a></div><br />
<? if($userimg!="") { ?>
<div class="zoomin_photo"><img src="<?= $siteimagepath ?>images/zoomin.png" onclick="open_box('<?=$userid?>')"  /></div>
<? } ?>
<div class="packageimagephoto"><?= $packimg ?></div>
<div class="photosearchgridzodiac"><?= $zodiacsign ?></div>
<div class="photosearchgridseal"><?= findverificationsealmember($userid) ?></div>

<div class="photosearchgridname">
<input type="checkbox" name="chk_user_<?= $userid ?>" value="<?= $userid ?>" />
<a href='<?= $userlink ?>'><?= $name?></a></div>
<div class="photosearchgridageetc">
<?=$headline ?><br />
<?= $default_searchgrid_design_age ?><?= $age ?><br /><br /> 
	<?= $default_searchgrid_design_seeking ?> <?=$partner_genderid?> 
<? 
	if($partner_agefrom!="" && $partner_agefrom!="0.0"){
		$partner_agefrom = $partner_agefrom;
	}
	if($partner_ageto!="" && $partner_ageto!="0.0"){
		$partner_ageto = "-".$partner_ageto;
	}
?>    
	
	<?=$partner_agefrom?> <?=$partner_ageto?><br />
	<?php /*?><?= $genderid  ?><?php */?> <?php /*?><?= $searchgriddisplayprofilefromtext ?><?php */?> <? //$area ?> <?=$default_searchgrid_design_livesin ?> <?= $city  ?> <?= $state ?> <?= $countryid ?><br />
    <? if($packagenm!="") { ?>
    <?=$default_searchgrid_design_package ?> <?=$packagenm?>
    <? } ?>
    
    <div class="search_photoview_icon">
    <a href="<?=$userlink ?>">
    	<img src="<?= $siteimagepath ?>images/displayprofileicon.gif" border="0" alt="<?= $searchgriddisplayprofilelink ?>" title="<?= $searchgriddisplayprofilelink ?>" /></a>
    
    
    

    
    <a href='<?= $sitepath ?>favoriteadd.php?b=<?= $userid ?>'>
    	<img align="absmiddle" src="<?= $siteimagepath ?>images/addtofavoriteicon.gif" border="0" alt="<?= $searchgridaddtofavoritelink ?>" title="<?= $searchgridaddtofavoritelink ?>" /></a>
    
    <a href='#' onClick="goforprivatemsging('<?= $userid ?>')">
    	<img align="absmiddle" src="<?= $siteimagepath ?>images/chaticon.gif" border="0" alt="<?= $searchgridaddtochatlink ?>" title="<?= $searchgridaddtochatlink ?>" /></a>
    
	<? if ($PhoneRequestDisplay_design_setting == "N") { ?>    
     <a href='#' onclick="popup_window('<?= $sitepath ?>phonerequest.php?b=<?= $userid ?>')">
    	<img align="absmiddle" src="<?= $siteimagepath ?>images/requestphoneicon.gif" border="0" alt="<?= $searchgridrequestphonelink ?>" title="<?= $searchgridrequestphonelink ?>" /></a>         
    <? } ?>
    <?
    if ($PhoneRequestDisplay_design_setting == "Y") { ?>
	<a href='<?= $sitepath ?>phone_request_add.php?b=<?= $userid ?>'>
    	<img align="absmiddle" src="<?= $siteimagepath ?>images/requestphoneicon.gif" border="0" title="<?= $searchgridrequestphonelink ?>" alt="<?= $searchgridrequestphonelink ?>" /></a>
	<? } ?>
    
    </div>
</div>


<div class="photosearchgridheadline"><?= $profileheadline ?></div>

<? if ($ocupationid != "") { ?>
<div style="display:none"><?= $searchgrid_occupation ?> : <?= $ocupationid ?></div>
<? } ?>

<? if ($annual_income_id != "") { ?>
<div style="display:none"><?= $searchgrid_annual_income ?> : <?= $annual_income_currancyid ?><?= $annual_income_id ?></div>
<? } ?>

<? if ($educationid != "") { ?>
<div style="display:none"><?=$searchgrid_education ?> : <?= $educationid ?></div>
<? } ?>

<? if ($heightid != "") { ?>
<div style="display:none">Height : <?= $heightid ?></div>
<? } ?>

<? if ($weightid != "") { ?>
<div style="display:none">Weight : <?= $weightid ?></div>
<? } ?>

<div class="photosearchgridicons"><a href='<?= $userlink ?>'><img src="<?= $siteimagepath ?>images/displayprofileicon.gif" border="0" alt="" /> <?= $searchgriddisplayprofilelink ?></a>

<a href='<?= $sitepath ?>favoriteadd.php?b=<?= $userid ?>'><img align="absmiddle" src="<?= $siteimagepath ?>images/addtofavoriteicon.gif" border="0" alt="" /> <?= $searchgridaddtofavoritelink ?></a> 
<a href='#' onClick="goforprivatemsging('<?= $userid ?>')"><img align="absmiddle" src="<?= $siteimagepath ?>images/chaticon.gif" border="0" alt="" /> <?= $searchgridaddtochatlink ?> <?= $chatrimgalt ?></a> 
<a href='<?= $sitepath ?>albums/<?= $userid ?>'><img align="absmiddle" src="<?= $siteimagepath ?>images/albumicon.gif" border="0" alt="" /> <?= $searchgridalbumlink ?></a></div>
</div>
</div>
<? } ?>