<?
session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");
require_once("translation.php");
checkadminlogin();
$country_code = '';
$curruserid = '';
$Horoscope ='';
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){
	$user_mnager_um_1 = user_mnager_um_1();
	$user_mnager_um_2 = user_mnager_um_2();
	$user_mnager_um_3 = user_mnager_um_3();
	$user_mnager_um_4 = user_mnager_um_4();
	$user_mnager_um_5 = user_mnager_um_5();
	$user_mnager_um_6 = user_mnager_um_6();
	$user_mnager_um_7 = user_mnager_um_7();
	$user_mnager_um_8 = user_mnager_um_8();
	$user_mnager_um_9 = user_mnager_um_9();
} else {
	$user_mnager_um_1 = "N";	
	$user_mnager_um_2 = "N";
	$user_mnager_um_3 = "N";
	$user_mnager_um_4 = "N";
	$user_mnager_um_5 = "N";
	$user_mnager_um_6 = "N";
	$user_mnager_um_7 = "N";
	$user_mnager_um_8 = "N";	
	$user_mnager_um_9 = "N";
} 
function insert_phone_request($uid,$userid)
{
$phnerequestid = getonefielddata("select phnerequestid from tbldatingphonerequestmaster where touserid=$uid and fromuserid=$userid and currentstatus=0");

if ($phnerequestid == "")
{
	$action =0;
	$query = sendtogeneratequery($action,"touserid",$uid,"Y");
	$query .= sendtogeneratequery($action,"fromuserid",$userid,"Y");
	$query .= sendtogeneratequery($action,"CreateBy",$userid,"Y");
	$query .= sendtogeneratequery($action,"CreateIP",getip(),"Y");
	$query = substr($query,1);
	execute("insert into tbldatingphonerequestmaster (touserid,fromuserid,CreateBy,CreateIP,CreateDate) values(" . $query .",now())");
}
}
//$view_contact_packageid = user_can_see_contact_detail($curruserid);
$remain = 0;
/*if($view_contact_packageid!=""){
	$remain = getonefielddata("SELECT sum(total_contact_can_view - total_contact_already_viewd) from tbldating_view_conact_package_user_master WHERE featureid=".$view_contact_packageid);	
}*/
require_once("displayprofile_coding.php");

//checkdesklogin();




?>

 
 <? 

if($user_mnager_um_9=='Y' || $user_mnager_um_9=='N')	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Page</title>

<link href="css/style.css" rel="stylesheet" type="text/css">

<script language="javascript" type="text/javascript">
function check_contacts(rem,uid){	
	var ans = confirm ("Your remaining contact is "+rem+" Do you want to continue?");
	if(ans){
		window.location.href = "displayprofile_print_detail.php?b="+uid+"&act=ph";
	} else {
		window.location.href = "displayprofile_print_detail.php?b="+uid+"&act=no";
	}
}
</script>
</head>

<body style="background-image:none;">
<?
$action = "0";
//$imagenm = "";
if(isset($_GET['b']) && $_GET['b']!=""){
	$action = $_GET['b'];

//$imagenm = getonefielddata("SELECT imagenm from tbldatingusermaster WHERE userid=".$action);
$imagenm = getonefielddata("SELECT thumbnil_image from tbldatingusermaster WHERE userid=".$action);
}


?>
<div class="printmaindiv publish">
<div class="printtitle">
<h1><?=$name?><span class="Butten"><a href="#" onclick="javscript:window.print();"><?= $directorydisplay_print_detail_print ?></a></span></h1></div>
<div class="printsubtitle"><h2>[ <strong><?= $displayprofileprofile_code ?><?=$profile_code ?></strong> ]</h2></div>
<? if($imagenm!="") { ?>
<div class="PhoTO_section">
<div class="mainphoto">
<img src="../uploadfiles/<?=$imagenm?>"></div>
<? }else{ ?>
<div class="PhoTO_section">
<div class="mainphoto">
<img  src="<?=$sitepath?>uploadfiles/noimage.gif" /></div>
<? } ?>
<div class="address"><?= $age ?> <?= $displayprofileyrs ?>,<?= $genderid ?><br /></div>
<div class="address"><?= $displayprofilelocation ?> <?= $area ?>
		<? if ( $city != "") { ?>, <?= $city ?><? } ?>
		<? if ( $state != "") { ?>, <?= $state ?><? } ?>
		<? if ( $state != "") { ?>, <?= $countryid ?><? } ?><br /><br /> 
		<?php /*?><?= $displayprofilebd ?> <?= $dob ?> &nbsp;&nbsp;|&nbsp;&nbsp;<?php */?><?= $zodiacsign ?>  <!--&nbsp;&nbsp;|&nbsp;&nbsp;-->  
		<span class="lastlogin"><?= $displayprofilelastlogin ?> : <?=	$lastlogin ?></span></div>

        <? 
        if($headline!=""){
		?>
        <?= $headline ?><br />
        <? } ?>
        </div>
<?
//if(isset($_SESSION[$session_name_initital . "memberuserid"]) && $_SESSION[$session_name_initital . "memberuserid"]!="") {
?>		
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="printmaintable">
  <tr>
    <td width="50%" align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="HlfTD">
      <tr>
        <td scope="row">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="printinnertable">
          <tr>
            <td colspan="2" scope="row"><h4 class="highlight_topic">
              <?= $displayprofilehead1 ?>
            </h4></td>
          </tr>
          <? if ($profilecreatebyid != "") { ?>
          <tr>
            <td width="170" scope="row"><span>
              <?= $displayprofilecreatedby ?>
            </span></td>
            <td scope="row"><span>
              <?= $profilecreatebyid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($lookingforid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilelookingfor ?>
            </span></td>
            <td scope="row"><span>
              <?= $lookingforid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($maritalstatusid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilemaritalstatus ?>
            </span></td>
            <td scope="row"><span>
              <?= $maritalstatusid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($kidsid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilekids ?>
            </span></td>
            <td scope="row"><span>
              <?= $kidsid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($heightid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofileheight ?>
            </span></td>
            <td scope="row"><span>
              <?= $heightid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($weightid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofileweight ?>
            </span></td>
            <td scope="row"><span>
              <?= $weightid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($eyecolorid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofileeyecolor ?>
            </span></td>
            <td scope="row"><span>
              <?= $eyecolorid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($bodytypeid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilebodytype ?>
            </span></td>
            <td scope="row"><span>
              <?= $bodytypeid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($complexionid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilecomplexion ?>
            </span></td>
            <td scope="row"><span>
              <?= $complexionid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($specialcasesid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilespecialcase ?>
            </span></td>
            <td scope="row"><span>
              <?= $specialcasesid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($illiness != "") { ?>
      <tr>
        <td scope="row"><span>
          <?= $displayprofileilliness ?>
        </span></td>
        <td scope="row"><span>
          <?= $illiness ?>
        </span></td>
      </tr>
      <? } ?>
      <? if ($blood_group != "") { ?>
      <tr>
        <td scope="row"><span>
          <?= $displayprofileblood_group ?>
        </span></td>
        <td scope="row"><span>
          <?= $blood_group ?>
        </span></td>
      </tr>
      <? } ?>
      
      <tr>
        <td scope="row"><span>
          NRI
        </span></td>
        <td scope="row"><span>
         <? if($nristatus!=''){ echo "Yes";}else{echo "No";} ?>
        </span>
      </tr>
      
      
        </table></td>
      </tr>
      <tr>
        <td scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="printinnertable">
              <tr>
                <td colspan="2" scope="row"><h4 class="highlight_topic">
                  <?= $displayprofilehead4 ?>
                </h4></td>
              </tr>
              <? if ($dietid != "") { ?>
              <tr>
                <td width="170" scope="row"><span>
                  <?= $displayprofilediet ?>
                </span></td>
                <td scope="row"><span>
                  <?= $dietid ?>
                </span></td>
              </tr>
              <? } ?>
              <? if ($smokerstatusid != "") { ?>
              <tr>
                <td scope="row"><span>
                  <?= $displayprofilesmokerstatus ?>
                </span></td>
                <td scope="row"><span>
                  <?= $smokerstatusid ?>
                </span></td>
              </tr>
              <? } ?>
              <? if ($drinkerstatusid != "") { ?>
              <tr>
                <td scope="row"><span>
                  <?= $displayprofiledrinkerstatus ?>
                </span></td>
                <td scope="row"><span>
                  <?= $drinkerstatusid ?>
                </span></td>
              </tr>
              <? } ?>
              <? if ($personalvalueid != "") { ?>
              <tr>
                <td scope="row"><span>
                  <?= $displayprofilepersonalvalue ?>
                </span></td>
                <td scope="row"><span>
                  <?= $personalvalueid ?>
                </span></td>
              </tr>
              <? } ?>
               <? if ($wantchildrenid != "") { ?>
              <tr>
                <td scope="row"><span>
                  <?= $displayprofilewantchildren ?>
                </span></td>
                <td scope="row"><span>
                  <?= $wantchildrenid ?>
                </span></td>
              </tr>
              <? } ?>
              <? if ($language != "") { 
			  
			   $Array_chklangmultiple=array();
	
					$chklangmultiple = getonefielddata("select languageid from tbldatinguserlanguagemaster where userid='".$dispayuserid."' ");
					
					$chklangmultiple_ids=explode(",",$chklangmultiple);
					
					$languages = getdata("select id,title from tbldatinglanguagemaster where currentstatus=0 and languageid =$sitelanguageid order by title ");
					while($languages_rs= mysqli_fetch_array($languages))
					{ 
					   if(in_array($languages_rs[0],$chklangmultiple_ids))
					        { 
							   array_push($Array_chklangmultiple,$languages_rs[1]); 
							      
								  }
					}
			  
			  
			  
			  
			  
			  ?>
              <tr>
                <td scope="row"><span>
                  <?= $displayprofilelanguagecanspeak ?>
                </span></td>
                <td scope="row"><span>
                            <? if($chklangmultiple!=''){ 
                            $lng='';
                            if(count($Array_chklangmultiple)>0){
                            for ($xi= 0; $xi< count($Array_chklangmultiple); $xi++) {?>
                            <? $lng.=$Array_chklangmultiple[$xi].", "; ?>
                            <? }} ?>
                            <?=substr($lng,0,-2)?>
                            <? } ?>
                </span></td>
              </tr>
              <? } ?>
            </table></td>
      </tr>
      
      <tr>
      	<td scope="row">      
      					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="printinnertable">
                              <tr>
                                <td colspan="2" scope="row"><h4 class="highlight_topic">
                                  <?= $displayprofilehead5 ?>
                                </h4></td>
                              </tr>
                                          
                              <? if ($countryofgrewup != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                  <?= $displayprofilegrewupcountry ?>
                                </span></td>
                                <td scope="row"><span>
                                  <?= $countryofgrewup ?>
                                </span></td>
                              </tr>
                              <? } ?>
                              <? if ($city != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                 <?= $directorydisplay_print_detail_city ?> :
                                </span></td>
                                <td scope="row"><span>
                                  <?= $city ?>
                                </span></td>
                              </tr>
                              <? } ?> 
                              <? if ($state != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                 <?=$directorydisplay_print_detail_state ?> :
                                </span></td>
                                <td scope="row"><span>
                                  <?= $state ?>
                                </span></td>
                              </tr>
                              <? } ?> 
                              <? if ($countryid != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                 <?=$directorydisplay_print_detail_country ?> :
                                </span></td>
                                <td scope="row"><span>
                                  <?= $countryid ?>
                                </span></td>
                              </tr>
                              <? } ?> 
                               <? if ($residancystatusid != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                  <?= $displayprofileresidencystatus ?>
                                </span></td>
                                <td scope="row"><span>
                                  <?= $residancystatusid ?>
                                </span></td>
                              </tr>
                              <? } ?> 
                            </table>
      
      
      	</td>
      </tr>      
    </table>
    </td>
    <td width="50%" align="left" valign="top">
    <table class="HlfTD" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th scope="row">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">        
        <tr>
        <td>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="printinnertable">
          <tr>
            <td colspan="2" scope="row"><h4 class="highlight_topic">
              <?= $displayprofilehead2 ?>
            </h4></td>
          </tr>
          <? if ($ethnic != "") { ?>
          <tr>
            <td width="142" scope="row"><span><?= $displayprofileethnic ?></span></td>
            <td scope="row"><span>
              <?= $ethnic ?>
            </span></td>
          </tr>
          <? } 
		 if ($religianid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilereligion ?>
            </span></td>
            <td scope="row"><span>
              <?= $religianid ?>
            </span></td>
          </tr>
          <? } if($religianid=='Muslim') { 
			if($revert!="") {
			?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofileborn ?>
            </span></td>
            <td scope="row"><span>
              <?= $revert ?>
            </span></td>
          </tr>
          <? } if($prayer!="") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofileprayer ?>
            </span></td>
            <td scope="row"><span>
              <?= $prayer ?>
            </span></td>
          </tr>
          <? } if($zakat!="") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilezakat ?>
            </span></td>
            <td scope="row"><span>
              <?= $zakat ?>
            </span></td>
          </tr>
          <? } if($fasting!="") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilefasting ?>
            </span></td>
            <td scope="row"><span>
              <?= $fasting ?>
            </span></td>
          </tr>
          <? } if($quran != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilequran ?>
            </span></td>
            <td scope="row"><span>
              <?= $quran ?>
            </span></td>
          </tr>
          <? } ?>
          <? } ?>
          <? if ($castid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilecaste ?>
            </span></td>
            <td scope="row"><span>
              <?= $castid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($subcast != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilesubcaste ?>
            </span></td>
            <td scope="row"><span>
              <?= $subcast ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($motherthoungid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilemothertoung ?>
            </span></td>
            <td scope="row"><span>
              <?= $motherthoungid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if (findsettingvalue("Religion_field_display") == "H")  { ?>
          <? if ($gotra != "" && $religianid=='Hindu' || $religianid=='Jain') { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilegotra ?>
            </span></td>
            <td scope="row"><span>
              <?= $gotra ?>
            </span></td>
          </tr>
          <? } 
		}
		?>
          <? if ($familyvalueid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilefamilyvalue ?>
            </span></td>
            <td scope="row"><span>
              <?= $familyvalueid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($dob != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofiledob ?>
            </span></td>
            <td scope="row"><span>
              <?= $dob ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($birthtime != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilebirthtime ?>
            </span></td>
            <td scope="row"><span>
              <?= $birthtime ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($birthplace != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilebirthplace ?>
            </span></td>
            <td scope="row"><span>
              <?= $birthplace ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($countryofbirth != "") { ?>
              <tr>
                <td scope="row"><span>
                  <?= $displayprofilecountryofbirth ?>
                </span></td>
                <td scope="row"><span>
                  <?= $countryofbirth ?>
                </span></td>
              </tr>
              <? } ?>
          <? //if ($maternal_name != "") { ?>
          <!---<tr>
            <td scope="row"><span>
              <?php /*?><?= $displayprofilebirthplace ?><?php */?><?= $directorydisplay_print_detail_maternalname ?> :
            </span></td>
            <td scope="row"><span>
              <?= $maternal_name ?>
            </span></td>
          </tr>--->
          <? //} ?>
          <? //if ($maternal_location != "") { ?>
          <!---<tr>
            <td scope="row"><span>
              <?php /*?><?= $displayprofilebirthplace ?><?php */?><?= $directorydisplay_print_detail_maternallocation ?> :
            </span></td>
            <td scope="row"><span>
              <?= $maternal_location ?>
            </span></td>
          </tr>---->
          <? //} ?>
          <? if (findsettingvalue("Religion_field_display") == "H")  { ?>
          <? if ($moonsign != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilemoonsign ?>
            </span></td>
            <td scope="row"><span>
              <?= $moonsign ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($sunsignid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilesunsign ?>
            </span></td>
            <td scope="row"><span>
              <?= $sunsignid ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($grahid != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilegrahid ?>
            </span></td>
            <td scope="row"><span>
              <?= $grahid ?>
            </span></td>
          </tr>
          <? } ?>
          <? } ?>
          <? if (findsettingvalue("Religion_field_display") == "M") { ?>
          <?
		 if ($religiosness_id != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilereligiosness_id ?>
            </span></td>
            <td scope="row"><span>
              <?= $religiosness_id ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($hijab_id != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilehijab_id ?>
            </span></td>
            <td scope="row"><span>
              <?= $hijab_id ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($beard_id != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilebeard_id ?>
            </span></td>
            <td scope="row"><span>
              <?= $beard_id ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($revert_islam_id != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilerevert_islam_id ?>
            </span></td>
            <td scope="row"><span>
              <?= $revert_islam_id ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($halal_strict_id != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilehalal_strict_id ?>
            </span></td>
            <td scope="row"><span>
              <?= $halal_strict_id ?>
            </span></td>
          </tr>
          <? } ?>
          <? if ($salah_perform_id != "") { ?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofilesalah_perform_id ?>
            </span></td>
            <td scope="row"><span>
              <?= $salah_perform_id ?>
            </span></td>
          </tr>
          <? } ?>
          <? } 
			if($native!="") {
		?>
          <tr>
            <td scope="row"><span>
              <?= $displayprofile_native ?>
            </span></td>
            <td scope="row"><span>
              <?= $native ?>
            </span></td>
          </tr>
          <? } ?>
          
          
          <? if($ChristianDiocese!='' && $religianid=='Christian') { ?>
          <tr>
            <td scope="row"><span>
              <?=$updateprofile2diocese?>
            </span></td>
            <td scope="row"><span>
              <?= $ChristianDiocese ?>
            </span></td>
          </tr>
          <? } ?>
          
         <? if ($catholicyn != "" && $religianid=='Christian'){?>
		   <td scope="row"><span>
              <?=$updateprofile2catholicque?>
            </span></td>
            <td scope="row"><span>
              <?= $catholicyn ?>
            </span></td>
          </tr>
          
		<? } ?>
          
          
           <? if($enable_astrological_module=='Y' && ($religianid=='Hindu' || $religianid=='Jain')){?>
			  <? if($ignore_horo!='Y') { ?> 
			  <? if($birthstar!='') { ?>
              <tr>
                <td scope="row"><span>
                  Birth Star 
                </span></td>
                <td scope="row"><span>
                  <?= $birthstar ?>
                </span></td>
              </tr>
              <? }if($birthrashi!='') {?>
                      <tr>
                        <td scope="row"><span>
                          Birth Rashi
                        </span></td>
                        <td scope="row"><span>
                          <?= $birthrashi ?>
                        </span></td>
                      </tr>
              <? } ?>
              <? } ?>
            <? }?>  
          
          
          <? $a=''; if ($religion_interest !="") { ?>
          <tr>
            <td scope="row"><span>
              Religion Interest
            </span></td>
            <td scope="row"><span>
               <? echo $a=getonefielddata("select title from tbldatingreligioninterestmaster where currentstatus=0 and id=$religion_interest");  ?>
            </span></td>
          </tr>
          <? } ?>
          
          <? $b=''; if($religianid=='Christian'){?>
          <?   if ($chr_denomination !="") { ?>
          <tr>
            <td scope="row"><span>
              Denomination
            </span></td>
            <td scope="row"><span>
             <?  echo $b=getonefielddata("select title from tbl_christian_denomination where currentstatus=0 and id=$chr_denomination ");  ?>
            </span></td>
          </tr>
          <? } ?>
          <? } ?>
          
          
        </table>
        
        </td>
        </tr>
        
        </table></th>
      </tr>
      <tr>
        <td scope="row">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="printinnertable">
                      <tr>
                        <td colspan="2" scope="row"><h4 class="highlight_topic">
                          <?= $displayprofilehead3 ?>
                        </h4></td>
                      </tr>
                      <? if ($educationid != "") { ?>
                      <tr>
                        <td width="142" scope="row"><span>
                          <?= $displayprofileeducation ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $educationid ?> <? if($education_detail!='') { echo $education_detail; } ?>
                        </span></td>
                      </tr>
                      <? } ?>
                      
                      
                      <? if ($edudetails != "") { ?>    
                      <tr>
                        <td width="142" scope="row"><span>
                          <?= $eduindet ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $edudetails ?>
                        </span></td>
                      </tr>
                        <? } ?>
                        
                        <? if ($occ_status != "") { ?>
                      <tr>
                        <td scope="row"><span>
                         <?= $directorydisplay_print_detail_employedin ?> :
                        </span></td>
                        <td scope="row"><span>
                         <?= $occ_status ?>
                        </span></td>
                      </tr>
                      <? } ?>
                      <? if ($ocupationid != "") { ?>
                      <tr>
                        <td scope="row"><span>
                          <?= $displayprofileoccupation ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $ocupationid ?>
                        </span></td>
                      </tr>
                      <? } ?>
                      
                      <? if ($company_name != "") { ?>    
                      <tr>
                        <td width="142" scope="row"><span>
                          <?=$cmpname ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $company_name ?>
                        </span></td>
                      </tr>
                        <? } ?>
                       <? if ($service_location != "") { ?>
                      <? 
                        $service_csc = "";
                        if($service_city!=""){
                            $service_csc .= $service_city."-";		
                        }
                        if($service_state!=""){
                            $service_csc .= $service_state."-";	
                        }
                        if($service_location!=""){
                            $service_csc .= $service_location;	
                        }
                        ?>
                      <tr>
                        <td scope="row"><span>
                          <?= $displayprofileservice_location ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $service_csc ?>
                        </span></td>
                      </tr>
                      <? } ?>          
                      <? if ($edu_pg_id != "") { ?>
                      <tr>
                        <td scope="row"><span>
                          <?= $displayprofileedu_pg ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $edu_pg_id ?>
                        </span></td>
                      </tr>
                      <? } ?>
                      <? if ($industry_id != "") { ?>
                      <tr>
                        <td scope="row"><span>
                          <?= $displayprofileindustry ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $industry_id ?>
                        </span></td>
                      </tr>
                      <? } ?>
                      <? if ($work_function_id != "") { ?>
                      <tr>
                        <td scope="row"><span>
                          <?= $displayprofilework_function ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $work_function_id ?>
                        </span></td>
                      </tr>
                      <? } ?>
                      <? if ($instituteid != "") { ?>
                      <tr>
                        <td scope="row"><span>
                          <?= $displayprofileinstitute ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $instituteid ?>
                        </span></td>
                      </tr>
                      <? } ?>
                      <? if ($annual_income_id != "") { ?>
                      <tr>
                        <td scope="row"><span>
                          <?= $displayprofileannualincome ?>
                        </span></td>
                        <td scope="row"><span>
                           <?= $annual_income_currancyid ?><?= $annual_income_id ?>
                        </span></td>
                      </tr>
                      <? } ?>
                      <? if ($service_area != "") { ?>
                      <tr>
                        <td scope="row"><span>
                          <?= $displayprofileservice_area ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $service_area ?>
                        </span></td>
                      </tr>
                      <? } ?>
                      <? if ($working_partner != "") { ?>    
                      <tr>
                        <td width="142" scope="row"><span>
                          <?= $updateprofile3_preferworkingpartner ?>
                        </span></td>
                        <td scope="row"><span>
                          <?= $working_partner ?>
                        </span></td>
                      </tr>
                        <? } ?>
                    </table>
        </td>
      </tr>
      
    </table></td>
  </tr>
  <? 
  if(isset($_GET['act']) && $_GET['act']=='ph')   {	 
  $view_contact_packageid = user_can_see_contact_detail($curruserid);
  if($view_contact_packageid!=""){
	  if($dispayuserid!=$curruserid){
		  echo $remain = getonefielddata("SELECT sum(total_contact_can_view - total_contact_already_viewd) from tbldating_view_conact_package_user_master WHERE featureid=".$view_contact_packageid);	
		  update_view_contact_detail_package($view_contact_packageid,$curruserid,$dispayuserid);
		  echo $remain = getonefielddata("SELECT sum(total_contact_can_view - total_contact_already_viewd) from tbldating_view_conact_package_user_master WHERE featureid=".$view_contact_packageid);	;	
			insert_phone_request($dispayuserid,$curruserid);
			$chk_exist = getonefielddata("SELECT id from tblphonerequestmaster WHERE fromuserid=".$curruserid." AND touserid=".$dispayuserid."");
			if($chk_exist==""){
				
				execute("INSERT into tblphonerequestmaster SET fromuserid=".$curruserid.", touserid=".$dispayuserid.", accepted='A', currentstatus=0, createdate='".date("Y-m-d")."', createby=".$curruserid.", createip='".$_SERVER['REMOTE_ADDR']."', response_received_date='".date("Y-m-d")."'");
			}
		 }
  ?>
  <tr>
    <td colspan="2" align="left" valign="top">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="HlfTD">
     		<tbody>
             	<tr>
                    <td scope="row">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="printinnertable hide_table">
                                  <tr>
                                    <td colspan="2" scope="row"><h4 class="highlight_topic">
                                      <?= $directorydisplay_print_detail_contactinfo ?> :
                                    </h4></td>
                                  </tr> 
                                  <? if($mobile!="") { ?>     
                                  <tr>
                                    <td width="124" scope="row"><span>
                                      <?= $directorydisplay_print_detail_mobileno ?>
                                    </span></td>
                                    <td width="293" scope="row"><span>
                                      <?=$mobile?>
                                    </span></td>
                                  </tr>
                                  <? } if($phone != ""){
                                   ?>
                                  <tr>
                                    <td width="124" scope="row"><span>
                                      <?= $directorydisplay_print_detail_landlineno ?>
                                    </span></td>
                                    <td width="293" scope="row"><span>
                                      <?=$phone ?>
                                    </span></td>
                                  </tr>
                                  <? } if($callingtime != "") { ?>
                                  <tr>
                                    <td width="124" scope="row"><span>
                                      <?= $directorydisplay_print_detail_callingtime ?>
                                    </span></td>
                                    <td width="293" scope="row"><span>
                                      <?=$callingtime ?>
                                    </span></td>
                                  </tr>      
                                  <? } if($contact_person_on_phone != "") { ?>
                                  <tr>
                                    <td width="124" scope="row"><span>
                                      <?= $directorydisplay_print_detail_contactperson ?> :
                                    </span></td>
                                    <td width="293" scope="row"><span>
                                      <?=$contact_person_on_phone ?>
                                    </span></td>
                                  </tr>
                                  <? } if($address != "") { ?>
                                  <tr>
                                    <td width="124" scope="row"><span>
                                      <?= $directorydisplay_print_detail_address ?>
                                    </span></td>
                                    <td width="293" scope="row"><span>
                                      <?=$address ?>
                                    </span></td>
                                  </tr>
                                  <? } if($email!="") { ?>
                                  <tr>
                                    <td width="124" scope="row"><span>
                                      <?= $directorydisplay_print_detail_email ?>
                                    </span></td>
                                    <td width="293" scope="row"><span>
                                      <?=$email?>
                                    </span></td>
                                  </tr>
                                  <? }
                                  if($remarks!=""){
                                  ?>
                                  <tr>
                                    <td width="124" scope="row"><span>
                                      <?= $directorydisplay_print_detail_remarks ?>
                                    </span></td>
                                    <td width="293" scope="row"><span>
                                      <?=$remarks?>
                                    </span></td>
                                  </tr>
                                  <? } ?>
                                </table>
                </td>
    			</tr>
             </tbody>
         </table>
  </tr>
  <? 
  }
  }
if($hobbies!= "" || $music!="" || $interest != "" || $fav_read!="" || $fav_cuisines != "" || $dress_styles != "" || $fitness !="" ) {
?>
  <tr>
    <td colspan="2" align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="HlfTD">                
     		<tbody>
             	<tr>
                	<td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="printinnertable2 hide_table">				
                          <tr>
                            <td colspan="2" scope="row"><h4 class="highlight_topic">
                              <?=$displayprofile_interst ?>
                            </h4></td>
                          </tr>
                          <? if($hobbies!="") { 
						  
						  	           $Array_hobbies=array();
$hobbies_ids=explode(",",$hobbies);
$hobbiesqrye = getdata("select id,title from tbl_hobbies_master where currentstatus=0 order by title ");
while($rshobbies= mysqli_fetch_array($hobbiesqrye)){ 
	  if(in_array($rshobbies[0],$hobbies_ids)){
		 
		  array_push($Array_hobbies,$rshobbies[1]);
		  
		}
}
						  
						  ?>
                          <tr>
                            <td width="200" scope="row"><span>
                              <?=$displayprofile_hobbies ?>
                            </span></td>
                            <td scope="row">
                              <? if($hobbies!=''){ 
                     if(count($Array_hobbies)>0){
                                    for ($x = 0; $x < count($Array_hobbies); $x++) {?>
                                              <span><? echo $Array_hobbies[$x].","; ?></span>
                    <? }}} ?>
                            </td>
                          </tr>
                          <? } if($music != "") { 
						  
						  	  $Array_music=array();
$music_ids=explode(",",$music);
$musicqrye = getdata("select id,title from tbl_music_master where currentstatus=0 order by title ");
while($rsmusic= mysqli_fetch_array($musicqrye)){ 
	  if(in_array($rsmusic[0],$music_ids)){
		 
		  array_push($Array_music,$rsmusic[1]);
		  
		}
}
						  
						  ?>
                          <tr>
                            <td scope="row"><span>
                              <?=$displayprofile_music ?>
                            </span></td>
                            <td scope="row">
												 <? if($music!=''){ 
                                         if(count($Array_music)>0){
                                                        for ($x1 = 0; $x1< count($Array_music); $x1++) {?>
                                                                  <span><? echo $Array_music[$x1].","; ?></span>
                                        <? }}} ?>
                            </td>
                          </tr>
                          <? } if($interest!="") {
							  
						 	  $Array_interest=array();
$interest_ids=explode(",",$interest);
$interestqrye = getdata("select id,title from tbl_interest_master where currentstatus=0 order by title ");
while($rsinterest= mysqli_fetch_array($interestqrye)){ 
	  if(in_array($rsinterest[0],$interest_ids)){
		 
		  array_push($Array_interest,$rsinterest[1]);
		  
		}
}	  
						  	  
						 ?>
                          <tr>
                            <td scope="row"><span>
                              <?=$displayprofile_interest ?>
                            </span></td>
                            <td scope="row">
													 <? if($interest!=''){ 
                                         if(count($Array_interest)>0){
                                                        for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                                                  <span><? echo $Array_interest[$x2].","; ?></span>
                                        <? }}} ?>
                            </td>
                          </tr>
                          <? } if($fav_read!="") { 
						  
								$Array_fav_read=array();
								$fav_read_ids=explode(",",$fav_read);
								$fav_read_qrye = getdata("select id,title from tbl_favourite_read_master where currentstatus=0 order by title ");
								while($rsfav_read= mysqli_fetch_array($fav_read_qrye)){ 
								if(in_array($rsfav_read[0],$fav_read_ids)){
								
								array_push($Array_fav_read,$rsfav_read[1]);
								
								}
								}
						  
						  ?>
                          <tr>
                            <td scope="row"><span>
                              <?=$displayprofile_fav_read ?>
                            </span></td>
                            <td scope="row">
                                         <? if($fav_read!=''){ 
                     if(count($Array_fav_read)>0){
                                    for ($x3 = 0; $x3< count($Array_fav_read); $x3++) {?>
                                              <span><? echo $Array_fav_read[$x3].","; ?></span>
                    <? }}} ?>
                            </td>
                          </tr>
                          <? } if($fav_cuisines!="") {
							  
								$Array_fav_cuisines=array();
								$fav_cuisines_ids=explode(",",$fav_cuisines);
								$fav_cuisines_qrye = getdata("select id,title from tbl_favourite_cuisines_master where currentstatus=0 order by title ");
								while($rsfav_cuisines= mysqli_fetch_array($fav_cuisines_qrye)){ 
								if(in_array($rsfav_cuisines[0],$fav_cuisines_ids)){
								
								array_push($Array_fav_cuisines,$rsfav_cuisines[1]);
								
								}
								}  
						 ?>
                          <tr>
                            <td scope="row"><span>
                              <?=$displayprofile_fav_cuisine ?>
                            </span></td>
                            <td scope="row">
                                          <? if($fav_cuisines!=''){ 
                     if(count($Array_fav_cuisines)>0){
                                    for ($x4 = 0; $x4< count($Array_fav_cuisines); $x4++) {?>
                                              <span><? echo $Array_fav_cuisines[$x4].","; ?></span>
                    <? }}} ?>
                            </td>
                          </tr>
                          <? } if($dress_styles!="") { 
						  
						  
			$Array_dress_styles=array();
			$dress_styles_ids=explode(",",$dress_styles);
			$dress_styles_qrye = getdata("select id,title from tbl_favourite_dress_master where currentstatus=0 order by title ");
			while($rsdress_styles= mysqli_fetch_array($dress_styles_qrye)){ 
			if(in_array($rsdress_styles[0],$dress_styles_ids)){
			
			array_push($Array_dress_styles,$rsdress_styles[1]);
			
			}
			}
						  
						  
						  ?>
                          <tr>
                            <td scope="row"><span>
                              <?=$displayprofile_fav_dress ?>
                            </span></td>
                            <td scope="row">
                                    <? if($dress_styles!=''){ 
                     if(count($Array_dress_styles)>0){
                                    for ($x5 = 0; $x5< count($Array_dress_styles); $x5++) {?>
                                              <span><? echo $Array_dress_styles[$x5].","; ?></span>
                    <? }}} ?>
                            </td>
                          </tr>
                          <? } if($fitness!="") { 
						  
								$Array_fitness=array();
								$fitness_ids=explode(",",$fitness);
								$fitness_qrye = getdata("select id,title from tbl_fitness_master where currentstatus=0 order by title ");
								while($rsfitness= mysqli_fetch_array($fitness_qrye)){ 
								if(in_array($rsfitness[0],$fitness_ids)){
								
								array_push($Array_fitness,$rsfitness[1]);
								
								}
								}
						  
						  ?>
                          <tr>
                            <td scope="row"><span>
                              <?=$displayprofile_fitness ?>
                            </span></td>
                            <td scope="row">
                                  <? if($fitness!=''){ 
                     if(count($Array_fitness)>0){
                                    for ($x6= 0; $x6< count($Array_fitness); $x6++) {?>
                                              <span><? echo $Array_fitness[$x6].","; ?></span>
                    <? }}} ?>
                            </td>
                          </tr>
                        </table>
                    </td>
	    </tr>
             </tbody>
         </table>
    
    </td>
  </tr>
  </table>
  <? }
	} ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="HlfTD">
     
     		<tbody>
             	<tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="printinnertable2 hide_table" style="margin-top:5px;">                
                              <tr>
                                <td colspan="2" scope="row"><h4 class="highlight_topic">
                                  <?= $displayprofileother ?>
                                </h4></td>
                              </tr>
                              <? if ($personality != "") { ?>
                              <tr>
                                <td scope="row" colspan="2"><span>
                                  <div style="height:20px; margin:0 0 5px 0; color:#d93037; line-height:20px;"><?= $displayprofilepersonality ?></div>
                                  <?= $personality ?>
                                </span></td>
                              </tr>
                              <? } ?>
                              <? if ($familybackground != "") { ?>
                              <tr>
                                <td scope="row" colspan="2"><span>
                                  <div style="height:20px; margin:0 0 5px 0; color:#d93037; line-height:20px;"><?= $displayprofilefamilybackground ?></div>
                                  <?= $familybackground ?>
                                </span></td>
                              </tr>
                              <? } ?>
                              <? if ($hobbiesintrest != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                  <?= $displayprofilehobbyinterest ?>
                                </span></td>
                                <td scope="row"><span>
                                  <?= $hobbiesintrest ?>
                                </span></td>
                              </tr>
                              <? } ?>
                              <tr>
                                <td colspan="2" scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="53%" rowspan="2" align="left" valign="top" scope="row" style="padding-left:7px; border:0px solid #999999;  border:0px solid #999999;">
                                    <? if($brother_married1 !="" || $brother_unmarried1!="" || $sister_married1!="" || $sister_unmarried1!=""){ ?>
                                   <!--- <table width="308" border="0" cellspacing="0" cellpadding="0" class="printinnertable" style="margin-left:0px; border:1px solid #999999; padding:5px 0;">            
                                      <tr>
                                        <td scope="row"><h4>&nbsp;</h4></td>
                                        <td width="87" scope="row" style="font-size:12px; font-weight:bold;"><?= $updateintrestprofilemarried ?></td>
                                        <td width="68" scope="row" style="font-size:12px; font-weight:bold;"><?= $updateintrestprofileunmarried ?></td>
                                      </tr>
                                      <? 
                                      if($brother_married1 !="" || $brother_unmarried1!=""){
                                      ?>
                                      <tr>
                                        <td width="134" scope="row"><span>
                                          <?= $updateintrestprofilebrother_married1 ?>
                                        </span></td>
                                        <td scope="row" style="font-size:12px; font-weight:bold;">
                                                <? if ($brother_married1 != "") { ?>
                                                     <?= $brother_married1 ?>
                                                  <? } ?></td>
                                        <td scope="row" style="font-size:12px; font-weight:bold;"><? if ($brother_unmarried1 != "") { ?>
                                                  <?= $brother_unmarried1 ?>
                                          <? } ?></td>
                                      </tr>
                                      <? } if($sister_married1!="" || $sister_unmarried1!="" ) { ?>
                                      <tr>
                                        <td scope="row"><span><?=$directorydisplay_print_detail_sister ?> :</span></td>
                                        <td scope="row" style="font-size:12px; font-weight:bold;"><? if ($sister_married1 != "") { ?>
                                                  <?= $sister_married1 ?>
                                          <? } ?></td>
                                        <td scope="row" style="font-size:12px; font-weight:bold;"><? if ($sister_unmarried1 != "") { ?>
                                                  <?= $sister_unmarried1 ?>
                                          <? } ?></td>
                                      </tr>
                                      <? }  ?>
                                    </table>---><? } ?></td>
                                   <!--- <td width="47%" height="44" align="left" valign="top" style="border:0px solid #999999; padding-right:7px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #999999;">
                                      <? if ($father_status_id !="" || $father_occupation != "") { ?>
                                      <tr>
                                        <td align="center" valign="top" scope="row"><span><b>                                         
                                          <?= $displayprofilefather_occupation ?> 
                                          </b></span><br />
                                          <span>
                                         
                                            <?= $father_status_id ?> 
                                            <?= $father_occupation ?>
                                          </span></td>
                                      </tr>
                                      <? } ?>
                                    </table></td>---->
                                  </tr>
                                  <tr>
                                    <!---<td align="left" valign="top" style="border:0px solid #999999; padding-right:7px;">
                                     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #999999;">
                                      <? if ($mother_status_id != "" || $mother_occupation != "") { ?>
                                      <tr>
                                        <td align="center" valign="top" scope="row"><span><b>
                                          <?= $displayprofilemother_occupation ?>
                                          </b></span><br />
                                          <span>
                                            <?= $mother_status_id ?>
                                            <?= $mother_occupation ?>
                                          </span></td>
                                      </tr>
                                      <? } ?>
                                    </table></td>--->
                                  </tr>
                                </table></td>
                              </tr>
                              <? if ($personalvalueid != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                  <?= $displayprofilepersonalvalue ?>
                                </span></td>
                                <td scope="row"><span>
                                  <?= $personalvalueid ?>
                                </span></td>
                              </tr>
                              <? } ?>
                              <? if ($wantchildrenid != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                  <?= $displayprofilewantchildren ?>
                                </span></td>
                                <td scope="row"><span>
                                  <?= $wantchildrenid ?>
                                </span></td>
                              </tr>
                              <? } ?>
                              
                              <?php /*?><? if ($hiv != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                  <?= $displayprofilehiv ?>
                                </span></td>
                                <td scope="row"><span>
                                  <?= $hiv ?>
                                </span></td>
                              </tr>
                              <? } ?>
                              <? if ($thelisimia != "") { ?>
                              <tr>
                                <td scope="row"><span>
                                  <?= $displayprofilethelisimia ?>
                                </span></td>
                                <td scope="row"><span>
                                  <?= $thelisimia ?>
                                </span></td>
                              </tr>
                              <? } ?><?php */?>
                            </table>
                        </td>	
    </tr>
             </tbody>
         </table>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="HlfTD">                
     		<tbody>
             	<tr>
                <td>
					    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="printinnertable2 hide_table">    			
                          <tr>
                            <td colspan="4" scope="row"><h4 class="highlight_topic">
                              <?= $displayprofilepartner ?>
                            </h4></td>
                            
                          </tr>
                          <? if ($partner_genderid != "") { ?>
                          <tr>
                            <td width="30%" scope="row"><span>
                              <?= $displayprofile_partnergender ?>
                            </span></td>
                            <td width="30%" scope="row"><span>
                              <?= $partner_genderid ?>
                            </span></td>
                            
                            <? } ?>
                          <? if ($partner_heightfrom != "") { ?>
                            <td width="20%" scope="row"><span>
                              <?= $displayprofile_partner_heightfrom ?>
                            </span>
                            </td>
                            <td width="20%" scope="row">
                            <span>
                              <?= $partner_heightfrom ?>
                            </span>
                            
                            <br />
                             <? } ?>
                          <? if ($partner_heightto != "") { ?>
                            <span>
                              <?= $partner_heightto ?>
                            </span>
                            
                            
                            </td>
                          </tr>
                          <? } ?>
                          <? if ($partner_agefrom != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_agefrom ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_agefrom ?>
                              <? } ?>
                          <? if ($partner_ageto != "") { ?>
                          <?= $displayprofile_partner_ageto ?><?= $partner_ageto ?>
                            </span></td>
                            <? } ?>
                          <? if ($partner_smokeids != "") { ?>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_smokeids ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_smokeids ?>
                            </span>
                            </td>
                            
                          </tr>
                          <? } ?>
                          
                          
                          <? if ($partner_location != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?php /*?><?= $displayprofile_partner_location ?><?php */?>
                              <?= $directorydisplay_print_detail_nativeplace ?> :
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_location ?>
                            </span></td>
                            
                            <? if ($partner_drinkids != "") { ?>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_drinkids ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_drinkids ?>
                            </span></td>
                            
                          </tr>
                          <? } ?>
                            
                            
                            <? } ?>
                          <? if ($partner_kidsids != "") { ?>
                            <tr>
                              <td scope="row"><span>
                              <?= $displayprofile_partner_kidsids ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_kidsids ?>
                            </span></td>
                            <td scope="row">&nbsp;</td>
                            <td scope="row">&nbsp;</td>
                            
                          </tr>
                          <? } ?>
                          <? if ($partner_religianid != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_religianid ?>
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_religianid ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if ($partner_castid != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_castid ?>
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_castid ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if ($partner_grahid != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $directorydisplay_print_detail_mangalikstatus ?> :
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_grahid ?>
                            </span></td>
                            </tr>
                          <? } ?>
                          <? if ($partner_education != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_education ?>
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_education ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if ($partner_occupation != "") { ?>
                          <tr>
                            <td scope="row" ><span>
                              <?= $displayprofile_partner_occupation ?>
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_occupation ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <?
                          if($partner_occupation_status!="") {?>
                          <tr>
                            <td scope="row" ><span>
                              <?= $directorydisplay_print_detail_occstatus ?>
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_occupation_status ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if ($partner_maritalstatus != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_maritalstatus ?>
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_maritalstatus ?>
                            </span></td>
                          </tr>  
                          <? } ?>
                          <? if ($partner_states != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $directorydisplay_print_detail_nativestates ?> :
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_states ?>
                            </span></td>
                          </tr>      
                          <? } ?>
                          <? if ($partner_ethnic != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $directorydisplay_print_detail_ethnicbackground ?> :
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_ethnic ?>
                            </span></td>
                          </tr>      
                          <? } ?>
                          <? if ($partner_subcast != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $directorydisplay_print_detail_subcast ?> :
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_subcast ?>
                            </span></td>
                          </tr>      
                          <? } ?>
                          <? if ($partner_dietids != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $directorydisplay_print_detail_diet ?> :
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_dietids ?>
                            </span></td>
                          </tr>      
                          <? } ?>
                          <? if ($partner_annincome != "") { ?>
                          <tr>
                            <td scope="row"><span>
             <?= str_replace(":","",$directorydisplay_print_detail_annincome."(". $annual_income_currancyid_new.")") ?>
                              :
                            </span></td>
                            <td scope="row" colspan="3"><span>
                              <?= $partner_annincome ?>
                            </span></td>
                          </tr>      
                          <? } ?>
                          <? if ($partner_pg_education != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_pg_education ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_pg_education ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if ($partner_industry != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_industry ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_industry ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if ($partner_functional_area != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_functional_area ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_functional_area ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if (findsettingvalue("Religion_field_display") == "M") { ?>
                          <? if ($partner_functional_area != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_hijab_id ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_hijab_id ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <?
                          $partner_beard_id='';
                          $partner_revert_islam_id ='';
                          $partner_halal_strict_id='';
                          ?>
                          <? if ($partner_beard_id != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_beard_id ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_beard_id ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if ($partner_revert_islam_id != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_revert_islam_id ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_revert_islam_id ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if ($partner_halal_strict_id != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_halal_strict_id ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $partner_halal_strict_id ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? if ($salah_perform_id != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_salah_perform_id ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $salah_perform_id ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          
						<? if ($islamic_education != "") { ?>
                        <tr>
                          <td scope="row"><span>
                           Islamic Education
                         </span></td>
                         <td scope="row"><span>
                          <?= $islamic_education ?>
                         </span></td>
                        </tr>
                        <? } ?>
                          
                          <? if ($religiosness_id != "") { ?>
                          <tr>
                            <td scope="row"><span>
                              <?= $displayprofile_partner_religiosness_id ?>
                            </span></td>
                            <td scope="row"><span>
                              <?= $religiosness_id ?>
                            </span></td>
                          </tr>
                          <? } ?>
                          <? } ?>
                        </table>
                </td>
                        
   				</tr>
             </tbody>
         </table>
<? //} ?>



<table width="100%" border="0" cellspacing="0" cellpadding="0" class="HlfTD">
     		<tbody>
             	<tr>
                <td>
                <table class="printinnertable2 hide_table Family_detailsC" cellpadding="0" cellspacing="0" width="100%">
                    <thead class="TittleHead">
                        <tr>
                            <th colspan="4">
							<h4 class="highlight_topic"><?=$new_atitle?></h4></th>
                        </tr>
                    </thead>
                    <tbody>    	  
                    
                    
                               <tr>
                        <? if($familystatus!=''){ ?>
                            <td width="40%">
                                <strong><?= $updateprofile2familystatus ?></strong>
                            </td>
                            <td colspan="3">
                                 <?= $familystatus ?>
                            </td>
                           <? } ?> 
                        </tr>
                        
                        
                            <tr>
                       <? if($familytype!=''){ ?>
                            <td width="40%">
                                <strong><?= $updateprofile2familytype ?></strong>
                            </td>
                            <td colspan="3">
                                  <?= $familytype ?>
                            </td>
                           <? } ?>
                        </tr>
                    
                    
                    
                      <tr>
                      <? if($father_name!=''){?>
                            <td width="40%">
                                <strong><?= $fathername ?></strong>
                            </td>
                            <td colspan="3">
                                 <?= $father_name ?>
                            </td>
                             <? }?>
                        </tr>
                        
                       
                           <tr>
                            <? if($father_occupation!='' || $father_status_id!=''){?>
                            <td width="40%">
                                <strong><?= $displayprofilefather_occupation ?> </strong>
                            </td>
                            <td colspan="3">
                                 <?= $father_status_id ?> <?= $father_occupation ?>
                         </td>
                          <? }?>
                        </tr>
                        
                        <tr>
                         <? if($father_company_address!='' ){?>
                          <td width="40%">
                                <strong><?= $fatherconameaddress ?> </strong>
                            </td>
                            <td colspan="3">
                             <?= $father_company_address ?> 
                         </td>
                        <? } ?> 
                        </tr>
                    
                     
                        <tr>
                        <? if($mother_name!=''){?>
                            <td width="40%">
                                <strong><?= $mothername ?></strong>
                            </td>
                            <td colspan="3">
                                 <?= $mother_name ?>
                            </td>
                             <? }?>
                        </tr>
                       
                        
                             <tr>
                             <? if($mother_occupation!='' || $mother_status_id!=''){?>
                            <td width="40%">
                                <strong><?= $displayprofilemother_occupation ?> </strong>
                            </td>
                            <td colspan="3">
                                 <?= $mother_status_id ?><?= $mother_occupation ?>
                         </td>
                          <? }?>
                        </tr>
                        
                            
                         <tr>
                         <? if($mother_company_address!='' ){?>
                          <td width="40%">
                                <strong><?= $motherconameaddress ?> </strong>
                            </td>
                            <td colspan="3">
                              <?= $mother_company_address ?>
                         </td>
                         <? } ?>
                        </tr>
                        
                        
                         <tr>
                             <? if($petranal_grand_father_name!=''){?>
                            <td width="40%">
                                <strong><?= $adfgradfather ?> </strong>
                            </td>
                            <td>
                                 <?= $petranal_grand_father_name ?>
                         </td>
                          <? }?>
                        </tr>
                        
                        <tr>
                             <? if($petranal_grand_mother_name!=''){?>
                            <td width="40%">
                                <strong><?= $adfgradmother ?> </strong>
                            </td>
                            <td colspan="3">
                                 <?= $petranal_grand_mother_name ?>
                         </td>
                          <? }?>
                        </tr>
                        
                        <tr>
                             <? if($metranal_grand_father_name!=''){?>
                            <td width="40%">
                                <strong><?= $adfmgradfather ?> </strong>
                            </td>
                            <td colspan="3">
                                 <?= $metranal_grand_father_name ?>
                         </td>
                          <? }?>
                        </tr>
                        
                        <tr>
                             <? if($metranal_grand_mother_name!=''){?>
                            <td width="40%">
                                <strong><?= $adfmgradmother ?> </strong>
                            </td>
                            <td colspan="3">
                                 <?= $metranal_grand_mother_name ?>
                         </td>
                          <? }?>
                        </tr>
                        
                   <br>
                    <tr>
                    <td colspan="4"><h3 class="highlight_topic">Family Members</h3>
                    </td>
                    </tr>
                          
                          <?php
                         
                        
                            $ad_family_name='';
                            $ad_family_education='';
                            $ad_family_married_to='';
                            $ad_family_occupation='';
                            $ad_family_dsof='';
                            $type='';
                            $title='';
                            $ds_type='';
                            $head_title='';
                            $fp_title='';
                            $ftype='';
                            
                        
                         
                       
						 $get_advance_family_details = getdata("select name,education,occupation,married_to,`d/s_of`,type,ftype from tbldating_advancefamily where $commonque and currentstatus=0  order by ftype, id desc");
                          while($rsfamilydetails= mysqli_fetch_array($get_advance_family_details)){
                         
                                 $ad_family_name=$rsfamilydetails['name'];
                                 
                                 $ad_family_married_to=$rsfamilydetails['married_to'];
                                 
                                 $ad_family_dsof=$rsfamilydetails[4];
                                 
                                 if($rsfamilydetails['occupation']!=""){
                                 $ad_family_occupation = findihtitle($rsfamilydetails['occupation'],"tbldatingoccupationmaster");
                                 }
                                 
                                 if($rsfamilydetails['education']!=""){
                                 $ad_family_education = findihtitle($rsfamilydetails['education'],"tbl_education_master");
                                 }
                                 
                                 $type=$rsfamilydetails['type'];
                                 if($type!=""){	
                                 $title = getonefielddata("SELECT title from tbl_advance_family_type where currentstatus=0  AND id=".$type);
                                  
                                 }
                                 
                                 if($type==1 || $type==3 || $type== 5)
                                 { $ds_type=$new_do; }else{$ds_type=$new_so; }
                                 
                                  $ftype=$rsfamilydetails['ftype'];
                                  if($ftype=='p'){
                                      $fp_title=$new_ptitle;
                                  }elseif($ftype=='m'){
                                      $fp_title=$new_mtitle;
                                  }elseif($ftype=='f'){
                                      $fp_title=$new_atitle;
                                  }else{
                                      $fp_title='';
                                  }
								  
								  
								      $EDUArray=array();
				$OCCUArray=array();
			    $education1=explode(",",$rsfamilydetails['education']);
	        	$occupation1=explode(",",$rsfamilydetails['occupation']);
				
			    $qrye = getdata("select id,title from tbl_education_master where currentstatus=0 order by title ");
				while($rse= mysqli_fetch_array($qrye)){ 
				      if(in_array($rse[0],$education1)){
					      //echo  $rse[1]; 
						  array_push($EDUArray,$rse[1]);
						}
				}
				
				 $qryo = getdata("select id,title from tbldatingoccupationmaster where currentstatus=0 order by title ");
				while($rso = mysqli_fetch_array($qryo)){ 
				      if(in_array($rso[0],$occupation1)){
						   //echo  $rso[1]; 
						   array_push($OCCUArray,$rso[1]);
					  }
				}
			   
								  
								  
								  
                        ?>
                        
                        <tr>
                        <td colspan="4"> 
                        
                          <h4><?=$ad_family_name?><strong>(<?=$title?>)</strong></h4>
                         <? if($ad_family_dsof!=''){ ?>
                         <?=$ds_type?>:<?=$ad_family_dsof?>
                         <? } ?>
                         <? if($ad_family_married_to!=''){ echo ","; ?>
                         <?=$new_mt?>:<?=$ad_family_married_to."<br> "?>
                         <? }?> 
                         
                         
                         
                            
		<? if($ad_family_education!=''){ 
		
		                if(count($EDUArray)>0){ echo "<br>";
						for ($x = 0; $x < count($EDUArray); $x++) {
						      
							 // echo $EDUArray[$x].",";
							  if($EDUArray[$x]!=''){ echo $EDUArray[$x].",";}else{}
						} 
			   
		 }
		
		 } ?>
         
         
        <? if($ad_family_occupation!=''){ 
		
		  
		  if(count($OCCUArray)>0){ echo "<br>";
						for ($x1 = 0; $x1 < count($OCCUArray); $x1++) {
						     
							  //echo $OCCUArray[$x1].",";
							  if($OCCUArray[$x1]!=''){echo $OCCUArray[$x1].",";}else{}
						} 
			   
		 }
		 
		 }?>
                     <?php /*?>   <? if($ad_family_education!=''){ ?><?=$ad_family_education."<br> "?> <? } ?>
                         <? if($ad_family_occupation!=''){ ?><?=$ad_family_occupation."<br> "?><? } ?><?php */?>
                            
                        </td>
                      </tr>
                       <?  } ?>
                                      
                    </tbody>	
                </table>

				</td>
                        
   				</tr>
             </tbody>
         </table>







</div>
</body>
</html>


<? } else { 
	header("location:dashboard.php?msg=no");
} ?>