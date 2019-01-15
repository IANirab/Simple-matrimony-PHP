<?
$arg= '';
$sister_unmied1='';
$brother_unmied1='';
$brother_mied1='';
$sister_mied1='';
?>


<!-- ********* TITLE START HERE *********-->

   

        <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <? if(enable_name_display=='Y'){ ?>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title">
    	<span><?=$name ?></span>
    </div>
	<? } ?>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>


		
        
        
        <!-- ********* TITLE END HERE *********-->
        
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        
		<div class="pagecontent deflt_profile_1">
		<!-- ********* CONTENT START HERE *********-->	
        <div class="displayprofilemain">
        <? 
        $pkgprice = getonefielddata("SELECT tbldatingpackagemaster.price from tbldatingpackagemaster,tbldatingusermaster WHERE tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND datediff(tbldatingusermaster.expiredate,curdate())>0 AND userid=".$dispayuserid);

 $user_packageid='';
$user_packageid = getonefielddata("SELECT tbldatingfeaturedusermaster.packageid from 
tbldatingfeaturedusermaster WHERE  userid=".$dispayuserid." and currentstatus=0 and expiredate>=curdate() order by featureid desc limit 1 ");
if($user_packageid!='' || $pkgprice>0)
{
	$premium_class='buyPac_sec';
}else{$premium_class='';}

		?>
        
        <div class="searchgridmain <?=$premium_class?>">
        	<div class="searchgridname ">
            <?
if(isset($_SESSION[$session_name_initital."memberuserid"])){
$memberid = $_SESSION[$session_name_initital . "memberuserid"];
if($dispayuserid!="" && $memberid!=""){
$fetch_cont = getonefielddata("SELECT phnerequestid from tbldatingphonerequestmaster WHERE touserid=".$dispayuserid." AND fromuserid=".$memberid." AND currentstatus=0");
$check_private = getonefielddata("SELECT private_phone_no from tbldatingusermaster WHERE userid=".$dispayuserid);
if($dispayuserid!=$memberid){
if($fetch_cont!="" && $check_private=='N'){
	$arg = 'Y';
} else if($fetch_cont=="" && $check_private=='Y'){
	$art = 'N';
} else {
	$arg = 'A';	
}
} else {
	$arg = 'Y';	
}
}
}

$imagenm_captcha = generate_img_captha($session_name_initital . "img_captch_no","img_captch_file_nm","");
$captch_no = get_img_captha_no($session_name_initital . "img_captch_no");
?>

<? if($print_profile=='Y'){?>
            <input title="Print" onClick="printPage('<?=$arg?>')" type="submit" value="Print" name="B1" class="onclickers" />  &nbsp;&nbsp;
   <? } ?>         
              
			<?= $edit_link ?>  <?= $acceptlink ?>  <?= $declinedlink ?>
				
                <? if(findsettingvalue('display_user_name')=='Y'){?>
					<?=$name?> &nbsp;&nbsp;
                    <? }else{ ?>
                    <?=display_name_round($name)?>
                    <? } ?>
            <strong class="pid"><?= $displayprofileprofile_code ?>   <?=$profile_code ?></strong>
            <strong>
            <? $lastlogin=find_lastlogin($dispayuserid); ?>
            	<span class="lastlogin">
                 <?=	$lastlogin ?></span>
                </strong>
            </div>
        	<div class="full_contacter">
            	<div class="searchgridimage">
 <? $get_thumbnil_image=getonefielddata("select thumbnil_image from tbldatingusermaster where userid='".$dispayuserid."' ") ?> <? $get_bigimg=getonefielddata("select imagenm from tbldatingusermaster where userid='".$dispayuserid."' ") ?>                               
                	

                    <div class="displayprofileimage">
					<? if($get_thumbnil_image!=''){?>
                    <img src="<?= $sitepath ?>uploadfiles/<?=$get_thumbnil_image?>"  border="0" >
					<? }else{ ?>
							<?
                             $genid=find_user_gendor($dispayuserid);
                             if($genid==1)
                             { ?>
                             <img src="<?= $sitepath ?>uploadfiles/maleimage.png" height="133" width="100" border="0" >
                            <? } ?>	 
							<? if($genid==2)
                             { ?>
                             <img src="<?= $sitepath ?>uploadfiles/femalenoimage.png" height="133" width="100" border="0" >
                            <? } ?>	 
                    <? } ?>
					</div>
				<? if($get_bigimg!=''){?>	
   				<div class="zoomin">                 
    			<a href="<?= $sitepath ?>uploadfiles/<?=$get_bigimg?>" class="fancybox"   data-fancybox-group="gallery" >
 				 <img src="<?= $siteimagepath ?>images/zoomin.png" /></a>
                </div>
                    <? } ?>
                </div>
            <div class="searchgridageetc">
            	<div class="left_exerge">
                		<?= $age ?> <?= $displayprofileyrs ?>,
		<?= $genderid ?><br />
		<?= $displayprofilelocation ?> <?= $area ?>
		<? if ( $city != "") { ?>, <?= $city ?><? } ?>
		<? if ( $state != "") { ?>, <?= $state ?><? } ?>
		<? if ( $state != "") { ?>, <?= $countryid ?><? } ?> 
		
			<div class="displayprofileheadline">



	<?= $headline ?><br />
	<? if ($partner_religianid_can_contact != "") { ?><span class="religionnote">
		<?= $partner_religianid_can_contact ?>
		<?= $displayprofile_partner_religianid_can_contact ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<? } ?>
	<? if ($partner_castid_can_contact != "") { ?>
	<span class="religionnote">
		<?= $partner_castid_can_contact ?>
		<?= $displayprofile_partner_castid_can_contact ?></span><? } ?>
	
    
	

</div>
            
            
                </div>
                <div class="right_icons">
                
          
        	<? if(enable_communication=='Y'){  ?>
			
            	<? include("iconcommon.php") ?>            
            
            <? } ?>
                </div>
            </div>
           
            </div>
            
        
        </div>
	
	<div class="displayprofileageetc">
	
        
	</div>
    


<div class="displayprofileicons">

</div>

<?
if(isset($_SESSION[$session_name_initital."memberuserid"])){
$memberid = $_SESSION[$session_name_initital . "memberuserid"];
if($dispayuserid!="" && $memberid!=""){
$fetch_cont = getonefielddata("SELECT phnerequestid from tbldatingphonerequestmaster WHERE touserid=".$dispayuserid." AND fromuserid=".$memberid." AND currentstatus=0");
$check_private = getonefielddata("SELECT private_phone_no from tbldatingusermaster WHERE userid=".$dispayuserid);
if($dispayuserid!=$memberid){
if($fetch_cont!="" && $check_private=='N'){
	$arg = 'Y';
} else if($fetch_cont=="" && $check_private=='Y'){
	$art = 'N';
} else {
	$arg = 'A';	
}
} else {
	$arg = 'Y';	
}
}
}

$imagenm_captcha = generate_img_captha($session_name_initital . "img_captch_no","img_captch_file_nm","");
$captch_no = get_img_captha_no($session_name_initital . "img_captch_no");
?>


<?
if(isset($_SESSION[$session_name_initital . "memberuserid"]) && $_SESSION[$session_name_initital . "memberuserid"]!=""){ ?>
<div class="pdflink"><?php /*?><a href="<?= $sitepath ?>html2pdf/createpdf.php?b=<?= $dispayuserid ?>"><img src="<?= $siteimagepath ?>images/pdficon.gif" alt="" border="0" /></a><?php */?>
<?php /*?><a href="<?=$sitepath?>generate_pdf.php?b=<?= $dispayuserid ?>"><img src="<?= $siteimagepath ?>images/pdficon.gif" alt="" border="0" /></a><?php */?>
</div>
<? } ?>
<br /><br /><br /><br />
<?
$referrering =  @$_SERVER['HTTP_REFERER'];
$_SESSION[$session_name_initital . "admin_enter"] = '';
$find_admin = stristr($referrering,"radmin");
if($find_admin!=''){
	$_SESSION[$session_name_initital . "admin_enter"] = 1;
}?>
</div>

	





	<?
 if(isset($_SESSION[$session_name_initital . "memberuserid"]) && 
 $_SESSION[$session_name_initital . "memberuserid"] != "")
{ ?>
	
	
									<!-- tab code start -->
 
 <div class="display_tabs">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#display_tab1"><?= $displayprofilehead1 ?></a></li>
    <li><a data-toggle="tab" href="#display_tab2"><?=$displayprofilehead4?></a></li>
     <li><a data-toggle="tab" href="#display_tab4"><?=$displayprofilehead2?></a></li>
     <li><a data-toggle="tab" href="#display_tab5"><?=$displayprofilehead3?></a></li>
     <li><a data-toggle="tab" href="#display_tab6"><?=$displayprofile_interst?></a></li>
     <li><a data-toggle="tab" href="#display_tab7"><?=$displayprofilepartner?></a></li>
     <li><a data-toggle="tab" href="#display_tab8"><?=$new_atitle?></a></li>
     <li><a data-toggle="tab" href="#display_tab9"><?=$displayprofileother?></a></li>
  </ul>
  <div class="tab-content">
    
    				<!-- tab1 code start -->
        <div id="display_tab1" class="tab-pane fade in active">
        	<div class="display_tab_info">
          <h3><?= $displayprofilehead1 ?></h3>
        	
            <ul>
            	
                <? if ($profilecreatebyid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilecreatedby) ?></strong>
                <span>: <?=$profilecreatebyid?> </span>
				</li>
				<? } ?>
				
                
                
                <? if ($lookingforid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilelookingfor) ?></strong>
                <span>: <?=$lookingforid?> </span>
				</li>
				<? } ?>
				
                
                  
                <? if ($maritalstatusid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilemaritalstatus) ?></strong>
                <span>: <?=$maritalstatusid?> </span>
				</li>
				<? } ?>
				
                
                   
               <? if ($kidsid != "" && ($maritalstatusid=='Divorced' || $maritalstatusid=='Widowed')) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilekids) ?></strong>
                <span>: <?=$kidsid?> </span>
				</li>
				<? } ?>
				
                
                
             <? if ($no_children != "0.0" && ($maritalstatusid=='Divorced' || $maritalstatusid=='Widowed')) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilenochildren) ?></strong>
                <span>: <?=$no_children?> </span>
				</li>
				<? } ?>
				
                
                 
        	<? if ($heightid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileheight) ?></strong>
                <span>: <?=$heightid?> </span>
				</li>
				<? } ?>
				
                
                  
        	<? if ($weightid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileweight) ?></strong>
                <span>: <?=$weightid?> </span>
				</li>
				<? } ?>
				
                
                 
        	<? if ($eyecolorid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileeyecolor) ?></strong>
                <span>: <?=$eyecolorid?> </span>
				</li>
				<? } ?>
				
                
                   
        	<? if ($bodytypeid != "") { ?>
            <li>
                <strong><?= str_replace(":","",$displayprofilebodytype) ?></strong>
                <span>: <?=$bodytypeid?> </span>
				</li>
            <? } ?>
                
            
        	<? if ($complexionid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilecomplexion) ?></strong>
                <span>: <?=$complexionid?> </span>
				</li>
                <? } ?>
                
                
        	<? if ($specialcasesid != "") { ?>
                 <li>
                <strong><?= str_replace(":","",$displayprofilespecialcase) ?></strong>
                <span>: <?=$specialcasesid?> </span>
				</li>
				<? } ?>
				
                
                
        	  <? if ($specialcasesid1 == '10') { ?>
              <li>
                <strong><?= str_replace(":","",$displayprofileartstatus) ?></strong>
                <span>: 
						<? if($artstatus =="N"){
                         echo "No";
                     } ?>
                     <? if($artstatus =="Y"){
                         echo "Yes";
                     } ?>
              </span>
				</li>
                <? } ?>
                
                
        	<? if ($hivsince != "" ) { ?>
             <li>
                <strong><?= str_replace(":","",$displayprofilehivsince) ?></strong>
                <span>: <?=$hivsince?> </span>
				</li>
                <? } ?>
                
                
        	<? if ($cd4count != "") { ?>
              <li>
                <strong><?= str_replace(":","",$displayprofilecd4count) ?></strong>
                <span>: <?=$cd4count?> </span>
				</li>
				<? } ?>
				
                
                <? if(findsettingvalue('form1_want_child')=="Y"){?>
        	    <? if ($wantchildren == "NS" || $wantchildren == "Y" || $wantchildren == "N") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilewantchildren) ?></strong>
                <span>: 
						<? if($wantchildren =="NS"){
                        echo "Not Sure";
                        } ?>
                        <? if($wantchildren =="Y"){
                        echo "Yes";
                        } ?>
                        <? if($wantchildren =="N"){
                        echo "No";
                        } ?>
                 </span>
				</li>
				<? } ?>
                <? } ?>
				
                
                
                
        	<? if ($illiness != "") { ?>
            <li>
                <strong><?= str_replace(":","",$displayprofileilliness) ?></strong>
                <span>: <?=$illiness?> </span>
				</li>
				<? } ?>
				
                
               
        	<? if ($blood_group != "") { ?>
             <li>
                <strong><?= str_replace(":","",$displayprofileblood_group) ?></strong>
                <span>: <?=$blood_group?> </span>
			</li>
            	<? } ?>
                
                <? if ($residancystatusid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileresidencystatus) ?></strong>
                <span>: <?=$residancystatusid?> </span>
				</li>
				<? } ?>
				
                
            </ul>	
      	
        	</div>
        </div>
        			<!-- tab1 code end -->
        
        
        			<!-- tab2 code start -->
        <div id="display_tab2" class="tab-pane fade">
          <div class="display_tab_info">
        
          <h3><?=$displayprofilehead4?></h3>
          
            <ul>
          
            	
                <? if ($dietid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilediet) ?></strong>
                <span>: <?=$dietid?> </span>
				</li>
				<? } ?>
				
                
               
                <? if ($smokerstatusid != "") { ?>
               <li>
                <strong><?= str_replace(":","",$displayprofilesmokerstatus) ?></strong>
                <span>: <?=$smokerstatusid?> </span>
				</li>
				<? } ?>
				
               
               
               <? if ($drinkerstatusid != "") { ?>
               <li>
                <strong><?= str_replace(":","",$displayprofiledrinkerstatus) ?></strong>
                <span>: <?=$drinkerstatusid?> </span>
				</li>
				<? } ?>
				
                
                
                <? if ($personalvalueid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilepersonalvalue) ?></strong>
                <span>: <?=$personalvalueid?> </span>
				</li>
            	<? } ?>
			
    
                
                <? if ($wantchildrenid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilewantchildren) ?></strong>
                <span>: <?=$wantchildrenid?> </span>
				</li>
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
                <li>
                <strong><?= str_replace(":","",$displayprofilelanguagecanspeak) ?></strong>
                 <? if($chklangmultiple!=''){ 
                            $lng='';
                            if(count($Array_chklangmultiple)>0){
                            for ($xi= 0; $xi< count($Array_chklangmultiple); $xi++) {?>
                            <? $lng.=$Array_chklangmultiple[$xi].", "; ?>
                            <? }} ?>
                            <span>:<?=substr($lng,0,-2)?></span>
                       <? } ?>
                </li>
				<? } ?>
				
  
 		     </ul>   
        
            </div>    
        </div>
        			<!-- tab2 code end -->
        
        
    
    	 			<!-- tab4 code start -->
        <div id="display_tab4" class="tab-pane fade">
          <div class="display_tab_info">
        
          <h3><?=$displayprofilehead2?></h3>
          
            <ul>
          
            	
                <? if ($ethnic != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileethnic) ?></strong>
                <span>: <?=$ethnic?> </span>
				</li>
				<? } ?>
				
                
                
                <? if ($religion_interest != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateprofile2relinterest) ?></strong>
                <span>: <? echo $a=getonefielddata("select title from tbldatingreligioninterestmaster where currentstatus=0 and id='".$religion_interest."' ");  ?> </span>
				</li>
				<? } ?>
				
                
                
                <? if ($religianid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilereligion) ?></strong>
                <span>: <?=$religianid?> </span>
				</li>
				<? } ?>
				
                
				<? if($ChristianDiocese!='' && $religianid=='Christian') { ?>
                <li>
                <strong> <?=$updateprofile2diocese?></strong>
                <span>: <?=$ChristianDiocese?> </span>
                </li>
                <? } ?>
				
                
				<? if($religianid=='Muslim') 
				{ ?>
                
                 
                <? if ($revert != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileborn) ?></strong>
                <span>: <?=$revert?> </span>
				</li>
				<? } ?>
				
                
                 
                <? if ($zakat != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilezakat) ?></strong>
                <span>: <?=$zakat?> </span>
				</li>
				<? } ?>
				
                
                 
                <? if ($fasting != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilefasting) ?></strong>
                <span>: <?=$fasting?> </span>
				</li>
				<? } ?>
				
                
                 
                <? if ($quran != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilequran) ?></strong>
                <span>: <?=$quran?> </span>
				</li>
				<? } ?>
				
             
			 <? } ?>
                   
                 
                <? if ($castid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilecaste) ?></strong>
                <span>: <?=$castid?> </span>
				</li>
            	<? } ?>
			
                
                
                <? if ($subcast != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilesubcaste) ?></strong>
                <span>: <?=$subcast?> </span>
				</li>
            	<? } ?>
			
                <? if ($denomination_val != "" && $religianid=='Christian' && $denomination_module=='Y'){?>
                <li>
                <strong><?= str_replace(":","",$denomination_lable) ?></strong>
                <span>: <?=$denomination_val?> </span>
				</li>
				<? } ?>
                
                <? if ($catholicyn != "" && $religianid=='Christian' && $catholic_module=='Y'){?>
                <li>
                <strong><?=$updateprofile2catholicque ?></strong>
                <span>:<?=$catholicyn?> </span>
				</li>
				<? } ?>
              
				
                <? if ($silsila != "") { ?>
                 <li>
                <strong><?= str_replace(":","",$silsila_lable) ?></strong>
                <span>: <?=$silsila?> </span>
				</li>
				<? } ?>
				
             
        <?php if($religianid=='Muslim') {  ?>
              	<li>
                <? if ($muslimsubcast != "") { ?>
                <strong><?= str_replace(":","",$muslimsubcaste) ?></strong>
                <span>: <?=$muslimsubcast?> </span>
				</li>
				<? } ?>
				
        <?php } ?>
        
		        <? if ($motherthoungid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilemothertoung) ?></strong>
                <span>: <?=$motherthoungid?> </span>
				</li>
				<? } ?>
				
       			
               <? if (findsettingvalue("Religion_field_display") == "H")  { ?>
               	 <? if ($gotra != "" && $religianid=='Hindu' || $religianid=='Jain') { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilegotra) ?></strong>
                <span>: <?=$gotra?> </span>
				</li>
				<? } ?>
               <? } ?>     
    	
               	 <? if ($familyvalueid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilefamilyvalue) ?></strong>
                <span>: <?=$familyvalueid?> </span>
				</li>
				<? } ?>
        
               	 <? if ($familytypeid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateprofile2familytype) ?></strong>
                <span>: <? echo $a1=getonefielddata("select title from tbldatingfamilyvaluemaster where  id=$familytypeid");  ?> </span>
				</li>
				<? } ?>
        
    
               	 <? if ($familystatusid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateprofile2familystatus) ?></strong>
                <span>: <? echo $a2=getonefielddata("select title from tbldatingfamilyvaluemaster where  id=$familystatusid");  ?></span>
				</li>
				<? } ?>
    
    
    				 <? if ($dob != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofiledob) ?></strong>
                <span>: <?=$dob?></span>
				</li>
				<? } ?>
                
                
                	 <? if ($birthtime != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilebirthtime) ?></strong>
                <span>: <?=$birthtime?></span>
				</li>
				<? } ?>
                
                <? if ($birthplace != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilebirthplace) ?></strong>
                <span>: <?=$birthplace?></span>
				</li>
				<? } ?>
    
   			  <? if ($countryofbirth != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilecountryofbirth) ?></strong>
                <span>: <?=$countryofbirth?></span>
				</li>
				<? } ?>
	
    		<? if (findsettingvalue("Religion_field_display") == "H")  { ?>		
           
           <? if ($moonsign != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilemoonsign) ?></strong>
                <span>: <?=$moonsign?></span>
				</li>
				<? } ?>
                
                <? if ($sunsignid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilesunsign) ?></strong>
                <span>: <?=$sunsignid?></span>
				</li>
				<? } ?>
                
                  <? if ($grahid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilegrahid) ?></strong>
                <span>: <?=$grahid?></span>
				</li>
				<? } ?>
                
                <? if($enable_astrological_module=='Y' && ($religianid=='Hindu' || $religianid=='Jain')){?>
				   <? if($ignore_horo!='Y') { ?> 
				   <? if($birthstar!='') { ?>
                        <li>
                        <strong>Birth Star</strong>
                        <span>: <?= $birthstar ?></span>
                        </li>
                   <? } if($birthrashi!='') { ?>
                        <li>
                        <strong>Birth Rashi</strong>
                        <span>: <?= $birthrashi ?></span>
                        </li>
                    <? } ?>
                   <? } ?> 
                <? }?>  
                
               
           <? } ?>

        <? if (findsettingvalue("Religion_field_display") == "M") { ?>
        
        	<? if ($religiosness_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilereligiosness_id) ?></strong>
                <span>: <?=$religiosness_id?></span>
				</li>
				<? } ?>
           
           <? if ($hijab_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilehijab_id) ?></strong>
                <span>: <?=$hijab_id?></span>
				</li>
				<? } ?>
           
            <? if ($beard_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilebeard_id) ?></strong>
                <span>: <?=$beard_id?></span>
				</li>
				<? } ?>
           
            <? if ($revert_islam_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilerevert_islam_id) ?></strong>
                <span>: <?=$revert_islam_id?></span>
				</li>
				<? } ?>
        
          <? if ($halal_strict_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilehalal_strict_id) ?></strong>
                <span>: <?=$halal_strict_id?></span>
				</li>
				<? } ?>
                
                 <? if ($salah_perform_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilesalah_perform_id) ?></strong>
                <span>: <?=$salah_perform_id?></span>
				</li>
				<? } ?>
                
                 <? if ($islamic_education != "") { ?>
                <li>
                <strong> Islamic Education</strong>
                <span>: <?=$islamic_education?></span>
				</li>
				<? } ?>
        
        
          <? } ?>
        
          <? if ($native != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_native) ?></strong>
                <span>: <?=$native?></span>
				</li>
				<? } ?>
		
 		     </ul>   
        
            </div>    
		<? 
        if($enable_astrological_module=="Y") { 
		
		$p1=getplanetname(1,1,$dispayuserid);
		$p2=getplanetname(2,1,$dispayuserid);
		$p3=getplanetname(3,1,$dispayuserid);
		$p4=getplanetname(4,1,$dispayuserid);
		$p5=getplanetname(5,1,$dispayuserid);
		$p6=getplanetname(6,1,$dispayuserid);
		$p7=getplanetname(7,1,$dispayuserid);
		$p8=getplanetname(8,1,$dispayuserid);
		$p9=getplanetname(9,1,$dispayuserid);
		$p10=getplanetname(10,1,$dispayuserid);
		$p11=getplanetname(11,1,$dispayuserid);
		$p12=getplanetname(12,1,$dispayuserid);
		
		if($p1!='' ||$p2!='' ||$p3!='' ||$p4!='' ||$p5!='' ||$p6!='' ||$p7!='' ||$p8!='' ||$p9!='' ||$p10!='' ||$p1!='' ||$p11!='' ||$p12!=''){
		?>
        
        <table border="0" width="100%" cellpadding="0" cellspacing="0" class="grahanlila">
                      <tbody>
                        <tr>
                            <td width="25%" valign="top"><span>(12)</span><?=getplanetname(12,1,$dispayuserid)?></td>
                            <td width="25%" valign="top"><span>(1)</span><?=getplanetname(1,1,$dispayuserid)?></td>
                            <td width="25%" valign="top"><span>(2)</span><?=getplanetname(2,1,$dispayuserid)?></td>
                            <td width="25%" valign="top"><span>(3)</span><?=getplanetname(3,1,$dispayuserid)?></td>
                        </tr>
                        
                        <tr>
                            <td valign="top"><span>(11)</span><?=getplanetname(11,1,$dispayuserid)?></td>
                            <td colspan="2" rowspan="2" class="grahanlila_title"><?=$displayprofile_kundli?></td>
                            <td valign="top"><span>(4)</span><?=getplanetname(4,1,$dispayuserid)?></td>
                        </tr>
                        
                        <tr>
                            <td valign="top"><span>(10)</span><?=getplanetname(10,1,$dispayuserid)?></td>	
                            <td valign="top"><span>(5)</span><?=getplanetname(5,1,$dispayuserid)?></td>
                        </tr>
                        
                        <tr>	
                            <td valign="top" width="25%"><span>(9)</span><?=getplanetname(9,1,$dispayuserid)?></td>
                            <td valign="top" width="25%"><span>(8)</span><?=getplanetname(8,1,$dispayuserid)?></td>
                            <td valign="top" width="25%"><span>(7)</span><?=getplanetname(7,1,$dispayuserid)?></td>
                            <td valign="top" width="25%"><span>(6)</span><?=getplanetname(6,1,$dispayuserid)?></td>
                        </tr>
                    </tbody>
                  </table>
            
        <? }}?>

            
        </div>
        			<!-- tab4 code end -->
        
        
        			<!-- tab5 code start -->
        <div id="display_tab5" class="tab-pane fade">
          <div class="display_tab_info">
        
          <h3><?=$displayprofilehead3?></h3>
          
            <ul>
          
            	
                <? if ($educationid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileeducation) ?></strong>
                <span>: <?=$educationid?><? if($cat_education!="") { ?> (<?=$cat_education ?>) <? }?>
                 </span>
				</li>
				<? } ?>
				
     	
                <? if ($edudetails != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateprofile3education_details) ?></strong>
                <span>: <?=$edudetails?>
                 </span>
				</li>
				<? } ?>
				
				 <? if ($education_detail != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateprofile3_additionalqualification) ?></strong>
                <span>: <?=$education_detail?>
                 </span>
				</li>
				<? } ?>
        
        		 <? if ($ocupationid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileoccupation) ?></strong>
               <span>: <?=$ocupationid?><? if($cat_occupation!="") { ?> (<?=$cat_occupation?>)<? }  ?>
                 </span>
				</li>
				<? } ?>
                
                <? if ($occ_status != "") { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_occupationstatus) ?></strong>
                <span>: <?=$occ_status?>
                 </span>
				</li>
				<? } ?>
        
        		 <? if ($annualincome != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileannualincome) ?></strong>
                <span>: <?=$annualincome?>
                 </span>
				</li>
				<? } ?>
                
                 <? if ($service_location != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileservice_location) ?></strong>
                <span>: 
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
				<?=$service_csc?>
                 </span>
				</li>
				<? } ?>
      
   			 <? if ($edu_pg_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileedu_pg) ?></strong>
                <span>: <?=$edu_pg_id?>
					<? if ($edu_pg_other != "") { ?>
                    [ <?= $edu_pg_other ?> ]
                    <? } ?>
                     </span>
				</li>
				<? } ?>
        
        	 <? if ($industry_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileindustry) ?></strong>
                <span>: <?=$industry_id?>
				<? if ($industry_other != "") { ?>
				[ <?= $industry_other ?> ]
				<? } ?>
                     </span>
				</li>
				<? } ?>
                
                <? if ($work_function_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilework_function) ?></strong>
                <span>: <?=$work_function_id?>
				<? if ($work_function_other != "") { ?>
				[ <?= $work_function_other ?> ]
				<? } ?>
                     </span>
				</li>
				<? } ?>
                
  			 <? if ($instituteid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileinstitute) ?></strong>
                <span>: <?=$instituteid?>
				<? if ($institute_other != "") { ?>
				&nbsp;&nbsp; [ <?= $institute_other ?> ]
			<? } ?>
                     </span>
				</li>
				<? } ?>
    
	
			 <? if ($annual_income_id != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileannualincome) ?></strong>
                <span>: <?= $annual_income_currancyid ?>&nbsp;<?= $annual_income_id ?></span>
				</li>
				<? } ?>
    
				 <? if ($service_area != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofileservice_area) ?></strong>
                <span>: <?= $service_area ?></span>
				</li>
				<? } ?>
    
  			  <? if ($working_partner != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateprofile3_preferworkingpartner) ?></strong>
                <span>: <?= $working_partner ?></span>
				</li>
				<? } ?>
    
               
 		     </ul>   
        
            </div>    
        </div>
        			<!-- tab5 code end -->
        
        			<!-- tab6 code start -->
        <div id="display_tab6" class="tab-pane fade">
          <div class="display_tab_info">
        
          <h3><?=$displayprofile_interst?></h3>
          
            <ul>
          
            	
                <? if ($hobbies != "") { ?>
				<? 
                $Array_hobbies=array();
                $hobbies_ids=explode(",",$hobbies);
                $hobbiesqrye = getdata("select id,title from tbl_hobbies_master where currentstatus=0 order by title ");
					while($rshobbies= mysqli_fetch_array($hobbiesqrye))
					{ 
						if(in_array($rshobbies[0],$hobbies_ids))
						{
					
						array_push($Array_hobbies,$rshobbies[1]);
						}
					}
                ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_hobbies) ?></strong>
                <? if($hobbies!=''){ 
					$arr_hobie='';
                     if(count($Array_hobbies)>0){
                                    for ($x = 0; $x < count($Array_hobbies); $x++) {?>
                                               <? $arr_hobie.=$Array_hobbies[$x].", "; ?>
                    <? }} ?>
                    <span> : <?=substr($arr_hobie,0,-2)?></span>
                    <? } ?>
				</li>
				<? } ?>
				
				<?  if($music != "") { ?>
				<?
                $Array_music=array();
                $music_ids=explode(",",$music);
                $musicqrye = getdata("select id,title from tbl_music_master where currentstatus=0 order by title ");
                while($rsmusic= mysqli_fetch_array($musicqrye)){ 
                      if(in_array($rsmusic[0],$music_ids)){
                         
                          array_push($Array_music,$rsmusic[1]);
                          
                        }
                }
                ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_music) ?></strong>
               <? if($music!=''){ 
			   	$arr_music='';
                     if(count($Array_music)>0){
                                    for ($x1 = 0; $x1< count($Array_music); $x1++) {?>
                                               <?  $arr_music.=$Array_music[$x1].", "; ?>
                    <? }} ?>
                    <span> : <?=substr($arr_music,0,-2)?></span>
                    <? } ?>
				</li>
        		<? } ?>
   
				<?  if($interest!="") { ?>
				<?
				$Array_interest=array();
				$interest_ids=explode(",",$interest);
				$interestqrye = getdata("select id,title from tbl_interest_master where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
				if(in_array($rsinterest[0],$interest_ids)){
				
				array_push($Array_interest,$rsinterest[1]);
				
				}
				}	
				?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_interest) ?></strong>
               <? if($interest!=''){ 
			   $arr_inter='';
                     if(count($Array_interest)>0){
                                    for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                               <?  $arr_inter.=$Array_interest[$x2].", "; ?>
                    <? }} ?>
                      <span> : <?=substr($arr_inter,0,-2)?></span>
                	<? } ?>    
				</li>
                <? } ?>

				<?  if($fav_read!="") { ?>
                <?
					$Array_fav_read=array();
					$fav_read_ids=explode(",",$fav_read);
					$fav_read_qrye = getdata("select id,title from tbl_favourite_read_master where currentstatus=0 order by title ");
					while($rsfav_read= mysqli_fetch_array($fav_read_qrye)){ 
					if(in_array($rsfav_read[0],$fav_read_ids)){
					
					array_push($Array_fav_read,$rsfav_read[1]);
					
					}
					}

				?>
                
                <li>
                <strong><?= str_replace(":","",$displayprofile_fav_read) ?></strong>
              <? if($fav_read!=''){ 
			  	$arr_fav='';
                     if(count($Array_fav_read)>0){
                                    for ($x3 = 0; $x3< count($Array_fav_read); $x3++) {?>
                                               <? $arr_fav.=$Array_fav_read[$x3].", "; ?>
                    <? }} ?>
                    <span> : <?=substr($arr_fav,0,-2)?></span>
					<? } ?>
				</li>
                <? } ?>

				<?  if($fav_cuisines!="") { ?>
                <?
					$Array_fav_cuisines=array();
					$fav_cuisines_ids=explode(",",$fav_cuisines);
					$fav_cuisines_qrye = getdata("select id,title from tbl_favourite_cuisines_master where currentstatus=0 order by title ");
					while($rsfav_cuisines= mysqli_fetch_array($fav_cuisines_qrye)){ 
					if(in_array($rsfav_cuisines[0],$fav_cuisines_ids)){
					
					array_push($Array_fav_cuisines,$rsfav_cuisines[1]);
					
					}
					}
				?>
				 <li>
                <strong><?= str_replace(":","",$displayprofile_fav_cuisine) ?></strong>
             <? if($fav_cuisines!=''){ 
			 	$arr_cuis='';
                     if(count($Array_fav_cuisines)>0){
                                    for ($x4 = 0; $x4< count($Array_fav_cuisines); $x4++) {?>
                                              <?  $arr_cuis.=$Array_fav_cuisines[$x4].", "; ?>
                    <? }} ?>
                      <span> : <?=substr($arr_cuis,0,-2)?></span>
					<? } ?>
				</li>
                <? } ?>

			<?  if($dress_styles!="") { ?>
            <?
			$Array_dress_styles=array();
			$dress_styles_ids=explode(",",$dress_styles);
			$dress_styles_qrye = getdata("select id,title from tbl_favourite_dress_master where currentstatus=0 order by title ");
			while($rsdress_styles= mysqli_fetch_array($dress_styles_qrye)){ 
			if(in_array($rsdress_styles[0],$dress_styles_ids)){
			
			array_push($Array_dress_styles,$rsdress_styles[1]);
			
			}
			}
			?>
 				<li>
                <strong><?= str_replace(":","",$displayprofile_fav_dress) ?></strong>
            <? if($dress_styles!=''){ 
			$arr_style='';
                     if(count($Array_dress_styles)>0){
                                    for ($x5 = 0; $x5< count($Array_dress_styles); $x5++) {?>
                                              <? $arr_style.=$Array_dress_styles[$x5].", "; ?>
                    <? }} ?>
                              <span> : <?=substr($arr_style,0,-2)?></span>
					<? } ?>
				</li>
                <? } ?>


			<?  if($fitness!="") { ?>
            <?
			$Array_fitness=array();
			$fitness_ids=explode(",",$fitness);
			$fitness_qrye = getdata("select id,title from tbl_fitness_master where currentstatus=0 order by title ");
			while($rsfitness= mysqli_fetch_array($fitness_qrye)){ 
			if(in_array($rsfitness[0],$fitness_ids)){
			
			array_push($Array_fitness,$rsfitness[1]);
			
			}
			}
			?>
				<li>
                <strong><?= str_replace(":","",$displayprofile_fitness) ?></strong>
           <? if($fitness!=''){ 
		   $arr_fit='';
                     if(count($Array_fitness)>0){
                                    for ($x6= 0; $x6< count($Array_fitness); $x6++) {?>
                                              <? $arr_fit.=$Array_fitness[$x6].", "; ?>
                    <? }} ?>
                  <span> : <?=substr($arr_fit,0,-2)?></span>
					<? } ?>
				</li>
                <? } ?>

 		     </ul>   
        
            </div>    
        </div>
        			<!-- tab6 code end -->
                    
        			<!-- tab7 code start -->
        <div id="display_tab7" class="tab-pane fade">
          <div class="display_tab_info">
        
          <h3><?=$displayprofilepartner?></h3>
          
            <ul>
  		<? if ($partner_genderid != "") { ?>
                
                <? if ($partner_heightfrom != "" && $partner_heightto != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_heightfrom) ?></strong>
                <span>: <?= $partner_heightfrom ?> To <?= $partner_heightto ?></span>
				</li>
				<? } ?>
				
   				<? if ($partner_agefrom != "" && $partner_ageto != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_agefrom) ?></strong>
                <span>: <?= $partner_agefrom ?> To <?= $partner_ageto ?></span>
				</li>
				<? } ?>
                
                <? if ($partner_smokeids != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_smokeids) ?></strong>
                <span>: <?= $partner_smokeids ?></span>
				</li>
				<? } ?>

                <? if ($partner_religianid != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_religianid) ?></strong>
                <span>: <?= $partner_religianid ?></span>
				</li>
				<? } ?>

                <? if ($partner_drinkids != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_drinkids) ?></strong>
                <span>: <?= $partner_drinkids ?></span>
				</li>
				<? } ?>
                
                  <? if ($partner_location != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_nativeplace) ?></strong>
                <span>: <?= $partner_location ?></span>
				</li>
				<? } ?>

				 <? if ($partner_states != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_nativeplacestate) ?></strong>
                <span>: <?= $partner_states ?></span>
				</li>
				<? } ?>

				 <? if ($partner_castid != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_castid) ?></strong>
                <span>: <?= $partner_castid ?></span>
				</li>
				<? } ?>

				 <? if ($partner_grahid != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_grahid) ?></strong>
                <span>: <?= $partner_grahid ?></span>
				</li>
				<? } ?>

				 <? if ($partner_education != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_education) ?></strong>
                <span>: <?= $partner_education ?></span>
				</li>
				<? } ?>

				 <? if ($partner_occupation != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_occupation) ?></strong>
                <span>: <?= $partner_occupation ?></span>
				</li>
				<? } ?>

				 <? if ($partner_occupation_status != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_occupationstatus) ?></strong>
                <span>: <?= $partner_occupation_status ?></span>
				</li>
				<? } ?>
		
		         <? if ($partner_maritalstatus != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_maritalstatus) ?></strong>
                <span>: <?= $partner_maritalstatus ?></span>
				</li>
				<? } ?>
                
				<? if ($partner_kidsids != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_kidsids) ?></strong>
                <span>: <?= $partner_kidsids ?></span>
				</li>
				<? } ?>
                
                <? if ($partner_ethnic != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_ethnicbackground) ?></strong>
                <span>: <?= $partner_ethnic ?></span>
				</li>
				<? } ?>

				 <? if ($partner_subcast != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_subcast) ?></strong>
                <span>: <?= $partner_subcast ?></span>
				</li>
				<? } ?>
                
                <? if ($partner_dietids != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_diet) ?></strong>
                <span>: <?= $partner_dietids ?></span>
				</li>
				<? } ?>
                
                <? if ($partner_annincome != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_annualincome."(".  $annual_income_currancyid_new.")") ?></strong>
                <span>:<?=$partner_annincome?></span>
				</li>
				<? } ?>

                <? if ($partner_pg_education != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_pg_education) ?></strong>
                <span>: <?= $partner_pg_education ?></span>
				</li>
				<? } ?>
                
                <? if ($partner_industry != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_industry) ?></strong>
                <span>: <?= $partner_industry ?></span>
				</li>
				<? } ?>

 				<? if ($partner_functional_area != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofile_partner_functional_area) ?></strong>
                <span>: <?= $partner_functional_area ?></span>
				</li>
				<? } ?>

				<? if (findsettingvalue("Religion_field_display") == "M") { ?>
				
                <? if ($partner_hijab_id != "" ) { ?>
                 <li>
                <strong><?= str_replace(":","",$displayprofile_partner_hijab_id) ?></strong>
                <span>: <?= $partner_hijab_id?></span>
				</li>
				<? } ?>

                <? if ($partner_beard_id != "" ) { ?>
                 <li>
                <strong><?= str_replace(":","",$displayprofile_partner_beard_id) ?></strong>
                <span>: <?= $partner_beard_id ?></span>
				</li>
				<? } ?>

                <? if ($partner_revert_islam_id != "" ) { ?>
                 <li>
                <strong><?= str_replace(":","",$displayprofile_partner_revert_islam_id) ?></strong>
                <span>: <?= $partner_revert_islam_id ?></span>
				</li>
				<? } ?>

                <? if ($partner_halal_strict_id != "" ) { ?>
                 <li>
                <strong><?= str_replace(":","",$displayprofile_partner_halal_strict_id) ?></strong>
                <span>: <?= $partner_halal_strict_id ?></span>
				</li>
				<? } ?>
                
                <? if ($salah_perform_id != "" ) { ?>
                 <li>
                <strong><?= str_replace(":","",$displayprofile_partner_salah_perform_id) ?></strong>
                <span>: <?= $salah_perform_id ?></span>
				</li>
				<? } ?>
                
                 <? if ($religiosness_id != "" ) { ?>
                 <li>
                <strong><?= str_replace(":","",$displayprofile_partner_religiosness_id) ?></strong>
                <span>: <?= $religiosness_id ?></span>
				</li>
				<? } ?>

                <? }?>	

         <? } ?>     
                
                



				
 		     </ul>   
        
            </div>    
        </div>
        			<!-- tab7 code end -->
                    
                    
     	    		<!-- tab8 code start -->
        <div id="display_tab8" class="tab-pane fade">
          <div class="display_tab_info">
        
          <h3><?=$new_atitle?></h3>
          
            <ul>
          
              <? if ($petranal_grand_father_name != "") { ?>
                <li>
                <strong><?= str_replace(":","",$adfgradfather) ?></strong>
                <span>: <?=$petranal_grand_father_name?> </span>
				</li>
				<? } ?>
		
            <? if ($petranal_grand_mother_name != "") { ?>
                <li>
                <strong><?= str_replace(":","",$adfgradmother) ?></strong>
                <span>: <?=$petranal_grand_mother_name?> </span>
				</li>
				<? } ?>
					
  			<? if ($metranal_grand_father_name != "") { ?>
                <li>
                <strong><?= str_replace(":","",$adfmgradfather) ?></strong>
                <span>: <?=$metranal_grand_father_name?> </span>
				</li>
				<? } ?>
			
          	  <? if ($metranal_grand_mother_name != "") { ?>
                <li>
                <strong><?= str_replace(":","",$adfmgradmother) ?></strong>
                <span>: <?=$metranal_grand_mother_name?> </span>
				</li>
				<? } ?>
			
            </ul>
         <div class="FamilyDetailsD">
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
		 
		  
		 
		    $get_advance_family_details = getdata("select name, `education`, `occupation`,married_to,`d/s_of`,type,ftype from tbldating_advancefamily where currentstatus=0 and userid=$dispayuserid order by ftype, id desc");
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
        
         
        
        <div class="advancefamily">
       <h3> <?=$ad_family_name?> <strong>(<?=$title?>)</strong></h3>
        <? if($ad_family_married_to!=''){?>
		<strong><?=$new_mt?> </strong> : <?=$ad_family_married_to?>
        <? } ?>
        <? if($ad_family_dsof!=''){ echo "<br>";?>
		<strong><?=$ds_type?></strong> : <?=$ad_family_dsof?><br>
        <? } ?>
        
		<? if($ad_family_education!=''){ 
	       echo "<strong>Education</strong> : ";
		                if(count($EDUArray)>0){
							$arr_family_edu='';
						for ($x = 0; $x < count($EDUArray); $x++) {
						      
							   //echo $EDUArray[$x].",";
							   if($EDUArray[$x]!='')
							   { 
							   		$arr_family_edu.=$EDUArray[$x].", ";
								}
							    
							  
						} 
						echo substr($arr_family_edu,0,-2);
			   
		 }
		
		 } ?>
         
         
        <? if($ad_family_occupation!=''){ 
		   echo "<br><strong>Occupation</strong> : ";
		  
		  if(count($OCCUArray)>0){
			  $arr_family_occ='';
						for ($x1 = 0; $x1 < count($OCCUArray); $x1++) {
						     
							  //echo $OCCUArray[$x1].",";
							   if($OCCUArray[$x1]!=''){
								    $arr_family_occ.=$OCCUArray[$x1].", ";
								}
						} 
						echo substr($arr_family_occ,0,-2);
			   
		 }
		 
		 }?>
         </div> 
    	<?  } ?>
        
 		  </div>
        
            </div>    
        </div>
        			<!-- tab8 code end -->
        
          			<!-- tab9 code start -->
        <div id="display_tab9" class="tab-pane fade">
          <div class="display_tab_info">
        
          <h3><?=$displayprofileother?></h3>
          <ul>
          
            	<? if ($personality != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilepersonality) ?></strong>
                <span>: <?=$personality?> </span>
				</li>
				<? } ?>
                
                <? if ($familybackground != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilefamilybackground) ?></strong>
                <span>: <?=$familybackground?> </span>
				</li>
				<? } ?>
                
                 <? if ($father_name != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateinterestfathername) ?></strong>
                <span>: <?=$father_name?>
                
                <? if ($father_status_id !="" || $father_occupation != "") { ?>
                (<?= $father_status_id ?>) <? if($father_occupation!="") { echo '('.$father_occupation.')'; } ?>
				<? } ?>
                
                 </span>
				</li>
				<? } ?>
				
             
                
			<?php /*?>	<? if ($father_status_id !="" || $father_occupation != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilefather_occupation) ?></strong>
                <span>: <?= $father_status_id ?> <? if($father_occupation!="") { echo $father_occupation; } ?> </span>
				</li>
				<? } ?><?php */?>

				 <? if ($mother_name != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateinterestmothername) ?></strong>
                <span>: <?=$mother_name?> 
                
                
                	<? if ($mother_status_id != "" || $mother_occupation != "") { ?>
                
                  (<?= $mother_status_id ?>)<? if($mother_occupation!="") { echo '('.$mother_occupation.')'; } ?> 
				<? } ?>
                
                
                   <? if ($father_company_address != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateinterestfatherofcname) ?></strong>
                <span>: <?=$father_company_address?> </span>
				</li>
				<? } ?>
                
                
                
                </span>
				</li>
				<? } ?>

				 <? if ($mother_company_address != "") { ?>
                <li>
                <strong><?= str_replace(":","",$updateinterestmotherofcname) ?></strong>
                <span>: <?=$mother_company_address?> </span>
				</li>
				<? } ?>

				<?php /*?><? if ($mother_status_id != "" || $mother_occupation != "") { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilemother_occupation) ?></strong>
                <span>: <?= $mother_status_id ?> <? if($mother_occupation!="") { echo $mother_occupation; } ?> </span>
				</li>
				<? } ?><?php */?>
				
                <? if ($hobbiesintrest != "" ) { ?>
                <li>
                <strong><?= str_replace(":","",$displayprofilehobbyinterest) ?></strong>
                <span>: <?= $hobbiesintrest ?> </span>
				</li>
				<? } ?>
				
                
                <? if ($countryofgrewup != "") { ?>
                <li>
                <strong><?= str_replace(":","",$countryofgrewup) ?></strong>
                <span>: <?=$countryofgrewup?> </span>
				</li>
				<? } ?>
				
                
                
                <? if ($city != "") { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_city) ?></strong>
                <span>: <?=$city?> </span>
				</li>
				<? } ?>
				
                
                 
                 
                <? if ($countryid != "") { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_country) ?></strong>
                <span>: <?=$countryid?> </span>
				</li>
				<? } ?>
				
                
                  
                  <? if ($state != "") { ?>
                <li>
                <strong><?= str_replace(":","",$default_displayprofile_state) ?></strong>
                <span>: <?=$state?> </span>
				</li>
				<? } ?>
					
				

 		     </ul>   
             
            <? if($brother_married1!='' || $brother_unmarried1!='' || $sister_married1!='' || $sister_unmarried1!=''){?> 
        <div class="BrotherSister">
<div class="row">
<div class="container">
<div class="col-lg-4"> &nbsp; </div>
<div class="col-lg-4"><?= $updateintrestprofilemarried ?> &nbsp;</div>
<div class="col-lg-4"><?= $updateintrestprofileunmarried ?> &nbsp; </div>
<!-- ROW--->
<div class="col-lg-4"><?= $updateintrestprofilebrother_married1 ?>&nbsp; </div>
<div class="col-lg-4"><? if ($brother_married1 != "") { ?><?= $brother_married1 ?><? } ?>&nbsp;</div>
<div class="col-lg-4"><? if ($brother_unmarried1 != "") { ?><?= $brother_unmarried1 ?><? } ?>&nbsp;</div>

<!-- ROW--->
<div class="col-lg-4"><?= $updateintrestprofilesister1 ?>&nbsp;</div>
<div class="col-lg-4"><? if ($sister_married1 != "") { ?><?= $sister_married1 ?><? } ?>&nbsp;</div>
<div class="col-lg-4"><? if ($sister_unmarried1 != "") { ?><?= $sister_unmarried1 ?><? } ?>&nbsp;</div>


</div>
</div>
</div>
			<? } ?>
            </div>    
        </div>
        			<!-- tab9 code end -->
        
        
                   
                    
  </div>  
</div>
 
 
								<!-- tab code end--> 


    
	<? }else{ ?>
<div class="login_membership login_displayprofile">
<div class="send_frnd">
<div class="sendtofriend" align="center" >
<figure><img src="<?= $siteimagepath ?>images/AlertIconP.png" /></figure>


<button type="button" class="sfbtn" data-toggle="modal" data-target="#myModal_new" 
  onclick="change_url()"><?=$login_errr_msg?></button>

</div>
</div>
</div>
<script>
function change_url()
{
		document.getElementById("url1").value = "displayprofile.php?b=<?=$dispayuserid?>";
}
</script>


<div class="container">

  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal_new" role="dialog">
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <? include("login_popup1.php");?>
          </div>
           
      </div>
      
    </div>
  </div>
  
</div>

<?  } ?>




<div class="main_send_box">

<div class="sendtofriend">
<h4 class="frends">" <?=$displayTellaFriend?> "</h4>
<div class="sendtofriend1">
<form method="post" name="frm_send_friend" action="<?= $sitepath ?>send_email_friend.php?b=<?= $dispayuserid ?>" onSubmit="return check_email()">

<div class="form-group">
<label><?= $sendfriendtitle ?></label>
<input name="txtemail" id="txtemail" type="text" class="sendfriendform" maxlength="255" />
</div>
<!-- Code Start Here -->
<div class="form-group">
<label><?= $registercaptcha ?></label>
	<img style="vertical-align:middle" id="imagenmcaptcha" src='<?= $sitepath ?>uploadfiles/captcha/<?= $imagenm_captcha ?>'> &nbsp;
    <input type="hidden" name="hiddencaptcha" id="hiddencaptcha" value="<?=$captch_no?>" />
	<input type="text" name="Captcha"  id="Captcha"  class="form_new" value="" size="3" style="vertical-align:middle" title="<?= $registercaptcha_title ?>" >
<!-- Code ends Here -->
&nbsp;<input type="submit" class="sendfriendbtn" value="<?= $sendfriendsend ?>" />
</div>
</form>
</div>

</div>
</div>

</div>
</div>
</div> 