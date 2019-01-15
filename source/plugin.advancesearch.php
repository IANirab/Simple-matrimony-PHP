<div class="pagetitle"></div>
         <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $advancesearchpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div> 
 <? 
	$adv_clr_code = 'style="color:#F57D20"';
	$basic_clr_code = '';
	$astro_clr_code = '';
	$spl_clr_code = '';
	//include("searchinclude.php");
	include("searchtab.php");
?>	 
<!-- ********* TITLE START HERE *********-->
		
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent basic_common Choosan_Form">
		<!-- ********* CONTENT START HERE *********-->
		<div class="errorbox"><span><? checkerror(); ?></span></div>

<form class="update_form searchPanelForm" name ='form1' method='post' action ="<?=$filename ?>.php" style="font-family:Verdana, Geneva, sans-serif;">
<?php /*?><p class="advsearchmessage"><?= $advancesearchmessage ?></p><?php */?>
<? 
if (findsettingvalue("Religion_field_display") == "M"){ ?>
<div class="form-group">
<label class="col-lg-4 control-label">
Denomination</label>
<div class="col-lg-8"><select name="cmbdenomination_id" class="form-control"><? fillcombo("select id,title from tbldating_religiousness_master where currentstatus=0 and languageid=$sitelanguageid order by title ","",$updatepersonalprofiledprofileselect_sel) ?>
</select></div></div>

<div class="form-group">
<label class="col-lg-4 control-label">
Silsila</label>
<div class="col-lg-8"><select name="spiritual_id" class="form-control"><? fillcombo("select id,title from tbldatingspiritualmaster where currentstatus=0 and languageid=$sitelanguageid order by title ","",$updatepersonalprofiledprofileselect_sel) ?>
</select></div></div>
<? } ?>

<div class="form-group top_gap">
<label class="col-lg-4 control-label"><?= $advancesearchreligian ?></label>
<div class="col-lg-8"><select name="cmbreligian" class="form-control" onchange="check_casts(this.value)"><? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$religionid,$advancesearchcountrycombotitle) ?></select></div></div>
<div id='advcasts_hide'>
<div class="form-group" >
<label class="col-lg-4 control-label"><?= $searchquick_caste ?></label>
<div class="col-lg-8">   	
<div class="select2-wrapper MYseletion">
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="cast_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
		  $cast2='';
		$qry = getdata("select id,title from tbldatingcastmaster where currentstatus =0 and religianid=$religionid and 
	languageid=$sitelanguageid order by title"); 
		  while($rs = mysqli_fetch_array($qry)){
			   $cast2 .= $rs[0].","; ?>	 
                    <option value="<?=$rs[0]?>" >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>    
    </div>
    </div>
</div>
<div class="form-group" >
<? $cast2=substr($cast2,0,-1);?>
<label class="col-lg-4 control-label"><?= $check_cast_subcast_subcast ?></label>
<div class="col-lg-8">   	
<div class="select2-wrapper MYseletion">
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="subcast_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
		$qry = getdata("select id,title from tbldatingsubcastmaster where currentstatus =0 and castid IN ('".$cast2."') AND languageid=$sitelanguageid order by title"); 
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>" >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>    
    </div>
</div>
</div>

<div id="advcasts_show" ></div>

<? if($enable_advance_search=='Y') { ?>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$advancesearch_keyword ?> <?php /*?>/ <?= $advancesearchname ?><?php */?></label>
<div class="col-lg-8"><input type="text" name="advname" class="form-control" size="35" maxlength="<?= $textbox_character_max_length ?>" value="<?=$advname?>"></div></div>
<? } ?>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchlookingfor ?></label>
<div class="col-lg-8"><select name='advlookingfor' class="form-control">
<? fillcombo(lookingfor_query($curruserid),"",""); ?></select></div></div>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchminage ?></label>
<div class="col-lg-8">
<select name='advminage' class="form form_advace2">
	<? 
	if($advminage!="") {
		fillage($advminage);
	} else {
		fillage($_SESSION[$session_name_initital . 'searchincludeminage']);
	}	
	 ?></select> <?=$advancesearchto?>  <select name='advmaxage' class="form form_advace2">	 
	 <? 
	 if($advmaxage!= ""){
	 	fillage($advmaxage);
	 } else {	
		fillage($_SESSION[$session_name_initital . 'searchincludemaxage']);
	 } 	
	?></select></div></div>
    
    
<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchheight ?></label>

<div class="col-lg-8"><select name='advheight1' class="form form_advace2">
<? fillcombo("select id,title from tbldatingheightmaster where currentstatus =0 and languageid=$sitelanguageid order by id",$advheight1,$advancesearchcombotitle) ?>
</select> <?= $advancesearchto ?> 
<select name='advheight2' class="form form_advace2">
<? fillcombo("select id,title from tbldatingheightmaster where currentstatus =0 and languageid=$sitelanguageid order by id",$advheight2,$advancesearchcombotitle) ?>
</select></div></div>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchweight ?></label>
<div class="col-lg-8"><select name='advweight1' class="form form_advace2">
<? fillcombo("select id,title from tbldatingweightmaster where currentstatus=0 and languageid=$sitelanguageid order by id",$advweight1,$advancesearchcombotitle) ?>
</select> <?= $advancesearchto ?> 
<select name='advweight2' class="form form_advace2">
<? fillcombo("select id,title from tbldatingweightmaster where currentstatus=0 and languageid=$sitelanguageid order by id",$advweight2,$advancesearchcombotitle) ?>
</select></div></div>


<div class="form-group">
   <label class="col-lg-4 control-label"><?=$advancesearch_maritalstats ?></label>
   <div class="col-lg-8">
   	<div class="select2-wrapper MYseletion">
	              <? $qry = getdata("select id,title from tbldatingmaritalstatusmaster where currentstatus =0 and languageid=$sitelanguageid order by id");?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="marital_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>
    </div>  
    
    </div>
</div>
<?
$sessionID = session_id();
//$check_exist = getdata("SELECT ih_id from tbl_ih_master WHERE ih_session='".$sessionID."' AND cat='ams' AND user_id='$uid'");
$amms = "";
/*$chk_style = 'style="display:none;"';
if(mysqli_num_rows($check_exist)>0){
	while($rs= mysqli_fetch_array($check_exist)){
		$amms .= $rs[0].",";
	}
}*/
if($amms!=""){
$amms = substr($amms,0,-1);
$three = strstr($amms,'3');
$two = strstr($amms,'2');
if($three!="" || $two!=""){
	$chk_style = 'style="display:table-row;"';
}
}else {
	$chk_style = 'style="display:none;"';
}
?>
<!--style="display:none;"-->

<div class="form-group"id="have_children" <?=$chk_style?> >
<label class="col-lg-4 control-label">

<?= $advancesearchhavechildren ?></label>
<div class="col-lg-8"><!--<div class="formcontainer">-->
<input type="checkbox" name="chkchildren" value="" /><?=$advancesearch_any ?>
<? 
$i = 1;
$j=0;
$chk_children ="";
$result = getdata("select id,title from tbldatingkidsmaster where currentstatus =0 and languageid=$sitelanguageid order by id");
	while ($rs = mysqli_fetch_array($result))
	{		
	if ($i ==$totaldisplay) 
	{
	$i =1; 
	?>
	<!--<br />-->
	<? }
	if(isset($chkchildren) && $chkchildren!=""){
	if($j<=count($chkchildren)) {
	$cnt_children = count($chkchildren);
	$chkchildren[$cnt_children] = "";
	if($rs[0]==$chkchildren[$j]){
			$chk_children = 'checked="checked"';
		} else {
			$chk_children = "";
		}
	}
	}
	?>
	<!--<span>--><input type="checkbox" <?=$chk_children?> name="chkhavechildren<?= $rs[0] ?>" value="<?= $rs[0] ?>" /> <?= $rs[1] ?><!--</span>-->
	<? 
	$i= $i+1;
	$j++;
	} 
	freeingresult($result);
	?>
	<!--</div>-->
	</div></div>

<? if ($Enable_cast_subcast_design_setting == "Y") { ?>

<?
if($enable_astrological_module=='Y') {
if(findsettingvalue("Religion_field_display")=="H"){
if($enable_mangalik_status=='Y') { 
	 ?>
     
     
     <div class="form-group">
   <label class="col-lg-4 control-label"><?=$advancesearch_manglikstatus ?></label>
   <div class="col-lg-8">
   	<div class="select2-wrapper MYseletion">
	              <? $qry = getdata("select id,title from tbldatinggrahmaster where currentstatus =0 and languageid=$sitelanguageid order by title");?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="mangalik_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>
    </div>  
    
    </div>
</div>
     
     
     
<?php /*?><tr>
	<td colspan="2">    	
    <br /><strong class="up4title7"><?=$advancesearch_manglikstatus ?></strong>
    <div id="pro_cst">
    	<div class="productPriceWrapRight product_left"  style="float:left; width:40%; height:200px; overflow-y:scroll">
	<?	
	$qry = getdata("select id,title from tbldatinggrahmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
	$i=1;
	$cast2 = '';	
	while($rs = mysqli_fetch_array($qry)){			
	$cast2 .= $rs[0].",";
	 ?>
     	<div id="toggleh<?=$i?>">
			<img src="<?=$uploadfilepath?>add.gif" alt="Add To Cast" onclick="add('showmangalik<?=$i?>','mangalikshow<?=$i?>')" border="0" />
			<?=$rs['title']?><br />
        </div>    
					
	<? $i++;
	} 
	$cast2 = substr($cast2,0,-1);
	?>
	</div>
    <div id="basketItemsWrap" style="overflow-y:scroll; height:200px; width:40%">
    <?	
    	$qry = getdata("select id,title from tbldatinggrahmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
		$i=1;
		while($rs = mysqli_fetch_array($qry)){		
		if($search_mangalik!="")	{
			$chk_mangalik = in_array($rs[0],$search_mangalik);
			if($chk_mangalik==1){
				$str_mangalik = 'style="display:inline;"';
				$mangalik_disable = "";
			} else {
				$str_mangalik = 'style="display:none;"';
				$mangalik_disable = 'disabled="disabled"';
			}
		} else {
			$str_mangalik = 'style="display:none;"';
			$mangalik_disable = 'disabled="disabled"';
		}
	?>
    	<div class="showmangalik<?=$i?>" id="hide<?=$i?>" <?=$str_mangalik ?> onclick="remove('showmangalik<?=$i?>','mangalikshow<?=$i?>')">
        	<img src="jquery/droppable/images/delete.png" alt="Add To Cast" border="0"  /><?=$rs[1]?><br />
        </div>
        <input type="hidden" id="mangalikshow<?=$i?>" name="mangalik_arr[]" <?=$mangalik_disable ?> value="<?=$rs[0]?>"/>
    <? $i++;
	} ?>		
	</div>
    </div>    
    </td>
</tr><?php */?>

<? } ?>
<? } } ?>
<?
if ($ethnic_field_enable == "Y"){ ?>
<tr valign="top">
<td class="up4title7"><b><?=$updateprofile2ethnicbg ?></b></td>
<td class="formcont"><select name="ethnic" id="ethnic" class="form">
		<? fillcombo("select id,title from tbldatingethnicmaster where currentstatus=0 order by title",$ethnic,$updatepersonalprofiledprofileselect_sel) ?>
	</select></td>
</tr>
<? } ?>
<?
if($enable_advance_search=='Y'){
	if(enable_subcast_scommunity_advancesearch=='Y'){
?>
<tr>
	<td colspan="2">    	
    <br /><strong class="up4title7"><?=$advancesearch_socialcommunity ?></strong>
    <div id="pro_cst">
    	<div class="productPriceWrapRight product_left">
	<?	
	$qry = getdata("select id,title from tbldatingmothertonguemaster where currentstatus =0 and languageid=$sitelanguageid order by title");
	$i=1;
	$cast2 = '';	
	while($rs = mysqli_fetch_array($qry)){			
	$cast2 .= $rs[0].",";
	 ?>
     	<div id="toggleh<?=$i?>">
			<img src="jquery/droppable/images/add.gif" alt="Add To Cast" onclick="add('showsocial<?=$i?>','socialshow<?=$i?>')" border="0" />
			<?=$rs['title']?><br />
        </div>    
					
	<? $i++;
	} 
	$cast2 = substr($cast2,0,-1);
	?>
	</div>
    
    
    <div id="basketItemsWrap" class="product_right">
    <?	
    	$qry = getdata("select id,title from tbldatingmothertonguemaster where currentstatus =0 and languageid=$sitelanguageid order by title");
		$i=1;
		while($rs = mysqli_fetch_array($qry)){		
		if($search_social!="")	{
			$chk_social = in_array($rs[0],$search_social);
			if($chk_social==1){
				$str_social = 'style="display:inline;"';
				$social_disable = "";
			} else {
				$str_social = 'style="display:none;"';
				$social_disable = 'disabled="disabled"';
			}
		} else {
			$str_social = 'style="display:none;"';
			$social_disable = 'disabled="disabled"';
		}		
	?>
    	<div class="showsocial<?=$i?>" id="hide<?=$i?>" <?=$str_social ?> onclick="remove('showsocial<?=$i?>','socialshow<?=$i?>')">
        	<img src="jquery/droppable/images/delete.png" alt="Add To Cast" border="0" /><?=$rs[1]?><br />
        </div>
        <input type="hidden" id="socialshow<?=$i?>" name="social_arr[]" <?=$social_disable ?> value="<?=$rs[0]?>"/>
    <? $i++;
	} ?>		
	</div>
    </div>    
    </td>
</tr>
<? }
} ?>
<? } ?>




<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_countryresidence ?></label>   	
		<div class="col-lg-8">
        	<div class="select2-wrapper MYseletion">
              <? $qry = getdata("select id,title from tbldatingcountrymaster where currentstatus =0 and languageid=$sitelanguageid order by title");?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="cor_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
        <option value="<?=$rs['id']?>" ><?=$rs['title']?></option> 
		<? } ?>
   	</select>  
    </div>
    </div>
</div>

<?
$chkstateavailable = getdata("select id,title from tbldating_state_master where currentstatus =$default_val and languageid=$sitelanguageid order by title");
if(mysqli_num_rows($chkstateavailable)>0){
?>
<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_stateresidence ?></label>    	

      <div class="col-lg-8">
      	<div class="select2-wrapper MYseletion">
            <? $qry = getdata("select id,title from tbldating_state_master where currentstatus =$default_val and languageid=$sitelanguageid order by title");?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="sor_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>   
    </div>
    </div>
</div>
<? } ?>
<?
if($enable_advance_search=='Y') {
?>
<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_cityresidence ?></label>    	
	<div class="col-lg-8">
    <div class="select2-wrapper MYseletion">
       <? $qry = getdata("select id,title from tbldating_city_master where currentstatus =0 and languageid=$sitelanguageid order by title");?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="cityor_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>  
    </div>  
    </div>
</div>
<? } ?>
<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_education ?></label>    	
	<div class="col-lg-8">
    	<div class="select2-wrapper MYseletion">
      <? $qry = getdata("select id,title from tbl_education_master where currentstatus =$advance_search_edu_var order by title");?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="edu_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>   
    </div>
    </div>
</div>

<? if($enable_advance_search=='Y') { ?>
<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_occupation ?></label>   	
<div class="col-lg-8">
	<div class="select2-wrapper MYseletion">
    	<?	
	$qry = getdata("select id,title from tbldatingoccupationmaster where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="occ_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>
    </div>
    
    </div>
</div>
<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_occupationstatus ?></label>    	
<div class="col-lg-8">
	<div class="select2-wrapper MYseletion">
       	<?	
	$qry = getdata("select id,title from tbldating_education_pg_master where currentstatus =1 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="occs_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select> 
    </div>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_annualincome ?></label>     	
	<div class="col-lg-8">
    	<div class="select2-wrapper MYseletion">
         	<?	
	$qry = getdata("select id,title from tbldating_annual_income_master where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="ann_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>
    </div>  
    </div>
</div>

<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_workcountry ?></label>      	
	<div class="col-lg-8">
    	<div class="select2-wrapper MYseletion">
             	<?	
	$qry = getdata("select id,title from tbldatingcountrymaster where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="wic_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>  
    </div>  
    </div>
</div>

<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_currentresidentstatus ?></label>  	
	<div class="col-lg-8">
    	<div class="select2-wrapper MYseletion">
             	<?	
	$qry = getdata("select id,title from tbldatingresidencystatusmaster where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="crs_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>    
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_placework ?></label>  	
	<div class="col-lg-8">  	
    	<div class="select2-wrapper MYseletion">
         	<?	
	$qry = getdata("select id,title,state_id from tbldating_city_master where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="pow_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>  
    </div>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_diet ?></label>  	
	<div class="col-lg-8"> 	
    	<div class="select2-wrapper MYseletion">
     	<?	
	$qry = getdata("select id,title from tbldatingdietmaster where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="diet_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>  
    </div>  
    </div>
</div>
<? } ?>




<? if($enable_advance_search=='Y') { ?>
<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_smokestatus ?></label>  	
	<div class="col-lg-8">    	
    	<div class="select2-wrapper MYseletion">

        <?	
	$qry = getdata("select id,title from tbldatingsmokerstatusmaster where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="smoke_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>    
    </div>
    </div>
</div>
<? } ?>


<? if($enable_advance_search=='Y'){ ?>

<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_drinkstatus ?></label>  	
	<div class="col-lg-8">  	
    	<div class="select2-wrapper MYseletion">

         <?	
	$qry = getdata("select id,title from tbldatingdrinkerstatusmaster where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="drink_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>  
    </div>  
    </div>
</div>


<? } ?>

<?
if($enable_advance_search=='Y') { ?>
<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_bodytype ?></label>  	
	<div class="col-lg-8">    	
    	<div class="select2-wrapper MYseletion">

            <?	
	$qry = getdata("select id,title from tbldatingbodymaster where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="body_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>    
    </div>
    </div>
</div>


<? } ?>


<?php ?><? if ($Enable_keyword_based_search_inadvance_search_design_setting == "Y") { ?>
<tr valign="top">
<td class="formhead"><?= $advancesearchkeyword ?></td>
<td class="formcont"><input type="text" name="advkeyword" class="form" size="35" maxlength="<?= $textbox_character_max_length ?>"><br />
<?= $advancesearchkeyword1 ?>
</td>
</tr>
<? } ?><?php ?>



<?
if($enable_advance_search=='Y') { ?>



<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearch_specialcases ?></label>  	
	<div class="col-lg-8">    	
    	<div class="select2-wrapper MYseletion">

              <?	
	$qry = getdata("select id,title from tbldatingspecialcasemaster where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="special_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select>  
    </div> 
    </div>
</div>

<div class="form-group">
    <label class="col-lg-4 control-label"><?=$advancesearh_language ?></label>  	
	<div class="col-lg-8">    	
    	<div class="select2-wrapper MYseletion">

            <?	
	$qry = getdata("select id,title from tbldatinglanguagemaster where currentstatus =0 and languageid=$sitelanguageid order by title");

	?>
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="lang_arr[]">
       <option value="0.0" disabled>Select </option>
     <? while($rs = mysqli_fetch_array($qry)){?>                
                    <option value="<?=$rs['id']?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs['title']?></option> 
             <? } ?>        
   	</select> 
    </div>    
    </div>
</div>

<? } ?>

<? 
if($enable_advance_search=='Y'){ 
	
?>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchshowme ?></label>
<div class="col-lg-8">
<?
	$d="";
	if($radshowmember=="p"){
		$c = 'checked="checked"';
	} else {
		$d = 'checked="checked"';
		$c = "";
	}
?>	
<input type="radio" name="radshowmember" <?=$d?> value ="a" /> <?= $advancesearchshowmeall  ?> &nbsp;&nbsp;
<input type="radio" name="radshowmember" value ="p" <?=$c?> /> <?= $advancesearchshowmephoto  ?>

</div>
</div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchsortsearchresult ?></label>
<div class="col-lg-8">
<? 
if($radsortsearchresult=='' || $radsortsearchresult=='1' ){
	$f = 'checked="checked"';
} else {
	$f = "";
}
?>
<input type="radio" name="radsortsearchresult" <?=$f?> value ="l"/> <?= $advancesearchsortsearchresultall  ?>
<? 
if($radsortsearchresult=='n'){
	$n = 'checked="checked"';
} else {
	$n = "";
}
?>
<input type="radio" name="radsortsearchresult" value ="n" <?=$n?>/> <?= $advancesearchsortsearchresultnew  ?>
<? 
if($radsortsearchresult=='a'){
	$a = 'checked="checked"';
} else {
	$a = "";
}
?>
<input type="radio" name="radsortsearchresult" value ="a" <?=$a?>/> <?= $advancesearchsortsearchresultmostactive  ?>
<? 
if($radsortsearchresult=='p'){
	$p = 'checked="checked"';
} else {
	$p = "";
}
?>
<input type="radio" name="radsortsearchresult" value ="p" <?=$p?>/> <?= $advancesearchsortsearchresultmostpopular  ?> </div></div>
<input type="hidden" name="raddispresult" value ="d" />
<?php /*?><tr valign="top">
<td class="up4title7"><b><?= $advancesearchdisplayresult ?></b></td>
<td class="formcont">
<? 
if($raddispresult=='' || $raddispresult=='d'){
	$d = 'checked="checked"';
} else {
	$d = "";
}
?>
	<input type="radio" name="raddispresult" value ="d" <?=$d?>/> <?= $advancesearchraddispresultdetail  ?> &nbsp; 
<? 
if($raddispresult=='p'){
	$pl = 'checked="checked"';
} else {
	$pl = "";
}
?>	
	<input type="radio" name="raddispresult" value ="p" <?=$pl?>/> <?= $advancesearchraddispresultphoto  ?></td>
</tr><?php */?>

<div class="form-group">
<label class="col-lg-4 control-label"></label>
<div class="col-lg-8">
<? 
if($chkonline=='Y'){
	$y = 'checked="checked"';
} else {
	$y = "";
}
?>
<input type="checkbox" name="chkonline" id="chkonline" <?=$y?> value="Y"/> <?= $searchquickonline ?>
</div></div>
<? } ?>
<?php ?><? if ($Enable_HIV_thelesima_illiness_blood_group_design_setting == "Y") { ?>
<div class="form-group">
    <label class="col-lg-4 control-label"><?= $updatepersonalprofilehiv ?></label>
    <div class="col-lg-8">
        <input type="radio" name="radhiv" value="N"  checked="checked" /> <?= $updatepersonalprofilehiv_no  ?> &nbsp; 
        <input type="radio" name="radhiv" value="Y"  /> <?= $updatepersonalprofilehiv_yes  ?> 
</div>

<div class="form-group">
    <label class="col-lg-4 control-label"><?= $updatepersonalprofileblood_group ?></label>
	<div class="col-lg-8">
<select name="cmbblood_group" class="form-control formbigcombo">
<? fillcombo("select id,title from tbldating_blood_group_master where currentstatus=0 and languageid=$sitelanguageid  order by title ",$blood_group,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>
<div class="form-group">
    <label class="col-lg-4 control-label"><?= $updatepersonalprofilethelisimia ?></label>
	<div class="col-lg-8">
<input type="radio" name="radthelisimia" value="N" checked="checked" /> <?= $updatepersonalprofilethelisimia_no  ?> &nbsp; 
<input type="radio" name="radthelisimia" value="Y" /> <?= $updatepersonalprofilethelisimia_yes  ?>
</div>
</div>
<div class="form-group">
    <label class="col-lg-4 control-label"><?= $updatepersonalprofileilliness ?></label>
	<div class="col-lg-8">

<input class="form-control" type="text" name="txt_illiness" maxlength="<?= $textbox_character_max_length ?>" />
</div>
</div>
</div>
<? } ?><?php ?>

<?php /*?><tr valign="top">
<td class="up4title7"><span><?= $advancesearcheducation ?></span></td>
<td class="formcont"><div class="formcontainer">
<span><input type="checkbox" checked="checked" /> <?= $textany ?></span>
<? 
$i = 1;
$k=0;
$j=0;
$chk_adveducation = "";
//$result = getdata("select id,title from tbl_education_master where currentstatus =$advance_search_edu_var and languageid=$sitelanguageid order by title");
$result = getdata("select id,title from tbl_education_master where currentstatus =$advance_search_edu_var order by title");
	while ($rs = mysqli_fetch_array($result))
	{ 
	//if ($i ==$totaldisplay) 
	//{
	//$i =1; 
	?>
	<? //}
	if(isset($chkadveducation) && $chkadveducation!=""){
	if($j<=count($chkadveducation)){
		$cnt_edu = count($chkadveducation);
		$chkadveducation[$cnt_edu]= "";
		if($rs[0]==$chkadveducation[$j]){
			$chk_adveducation = 'checked="checked"';;
		} else {
			$chk_adveducation = "";
		}
	}
	}
	?>
	<span><input type="checkbox" <?=$chk_adveducation?> name="chkadveducation<?=$k ?>" value="<?= $rs[0] ?>" /> <?= $rs[1] ?></span>
	<? 
	$i= $i+1;
	$k++;
	$j++;
	} 
	freeingresult($result);
	?></div></td>
</tr><?php */?>


<?php /*?><? if ($Enable_pg_industry_functional_area_field_design_setting == "Y") { ?>
<tr valign="top">
<td class="formhead"><?= $advancesearch_edu_pg ?></td>
<td class="formcont"><div class="formcontainer">
<span><input type="checkbox" checked="checked" /> <?= $textany ?></span>
<? 
$i = 1;
$result = getdata("select id,title from tbldating_education_pg_master where currentstatus =0 and languageid=$sitelanguageid order by title");
	while ($rs = mysqli_fetch_array($result))
	{ 
	if ($i ==$totaldisplay) 
	{
	$i =1; ?>
	<!--<br />-->
	<? }
	?>
	<span><input type="checkbox" name="chkedu_pg<?=$rs[0]?>" value="<?=$rs[0]?>" /> <?= $rs[1] ?></span>
	<? 
	$i= $i+1;
	} 
	freeingresult($result);
	?></div></td>
</tr>

<tr valign="top">
<td class="formhead"><?= $advancesearch_industry ?></td>
<td class="formcont"><div class="formcontainer">
<span><input type="checkbox" checked="checked" /> <?= $textany ?></span>
<? 
$i = 1;
$result = getdata("select id,title from tbl_dating_industry_master where currentstatus =0 and languageid=$sitelanguageid order by title");
	while ($rs = mysqli_fetch_array($result))
	{ 
	if ($i ==$totaldisplay) 
	{
	$i =1; ?>
	<!--<br />-->
	<? }
	?>
	<span><input type="checkbox" name="chkindustry<?=$rs[0]?>" value="<?=$rs[0]?>" /> <?= $rs[1] ?></span>
	<? 
	$i= $i+1;
	} 
	freeingresult($result);
	?></div></td>
</tr>

<tr valign="top">
<td class="formhead"><?= $advancesearch_function_area_master ?></td>
<td class="formcont"><div class="formcontainer">
<span><input type="checkbox" checked="checked" /> <?= $textany ?></span>
<? 
$i = 1;
$result = getdata("select id,title from tbl_dating_work_function_area_master where currentstatus =0 and languageid=$sitelanguageid order by title");
	while ($rs = mysqli_fetch_array($result))
	{ 
	if ($i ==$totaldisplay) 
	{
	$i =1; ?>
	<!--<br />-->
	<? }
	?>
	<span><input type="checkbox" name="chkfunction_area<?=$rs[0]?>" value="<?=$rs[0]?>" /> <?= $rs[1] ?></span>
	<? 
	$i= $i+1;
	} 
	freeingresult($result);
	?></div></td>
</tr>

<tr valign="top">
<td class="formhead"><?= $advancesearch_institute ?></td>
<td class="formcont"><div class="formcontainer">
<span><input type="checkbox" checked="checked" /> <?= $textany ?></span>
<? 
$i = 1;
$result = getdata("select id,title from tbl_dating_institute_master where currentstatus =0 and languageid=$sitelanguageid order by title");
	while ($rs = mysqli_fetch_array($result))
	{ 
	if ($i ==$totaldisplay) 
	{
	$i =1; ?>
	<!--<br />-->
	<? }
	?>
	<span><input type="checkbox" name="chkinstitute<?=$rs[0]?>" value="<?=$rs[0]?>" /> <?= $rs[1] ?></span>
	<? 
	$i= $i+1;
	} 
	freeingresult($result);

	?></div></td>
</tr>
<? } 
?><?php */?>

<? if (findsettingvalue("Religion_field_display") == "M"){ ?>
<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updateprofile2religiosness ?></label>
<div class="col-lg-8"><select name="cmbreligiosness_id" class="form-control"><? fillcombo("select id,title from tbldating_religiousness_master where currentstatus=0 and languageid=$sitelanguageid order by title ","",$updatepersonalprofiledprofileselect_sel) ?>
</select></div></div>

<? if (find_user_gendor($curruserid) == 1) { ?>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilehijab ?></label>
<div class="col-lg-8"><select name="cmbhijab_id" class="form-control"><? fillcombo("select id,title from tbldating_hijab_wear_master where currentstatus=0 and languageid=$sitelanguageid order by title ","",$updatepersonalprofiledprofileselect_sel) ?></select></div></div>
<? } ?>
<? if (find_user_gendor($curruserid) == 2) { ?>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilebeard ?></label>
<div class="col-lg-8"><select name="cmbbeard_id" class="form-control">
<? fillcombo("select id,title from tbldating_beard_master where currentstatus=0 and languageid=$sitelanguageid order by title ","",$updatepersonalprofiledprofileselect_sel) ?>
</select></div></div>
<? } ?>
<div class="form-group">
<label class="col-lg-4 control-label" ><?= $partnerprofilerevert_islam ?></label>
<div class="col-lg-8"><select name="cmbrevert_islam_id" class="form-control"><? fillcombo("select id,title from tbldating_revert_islam_master where currentstatus=0 and languageid=$sitelanguageid order by title ","","Both"); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilehalal_strict ?></label>
<div class="col-lg-8"><select name="cmbhalal_strict_id" class="form-control"><? fillcombo("select id,title from tbldating_halal_strict_master where currentstatus=0 and languageid=$sitelanguageid order by title ","",$updatepersonalprofiledprofileselect_sel) ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilesalah_perform ?></label>
<div class="col-lg-8"><select name="cmbsalah_perform_id" class="form-control"><? fillcombo("select id,title from tbldating_salah_perform_master where currentstatus=0 and languageid=$sitelanguageid order by title ","",$updatepersonalprofiledprofileselect_sel) ?>
</select></div></div>
<? } ?>
<div class="form-group">
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8"><div class="formbtn_outer"><input name="Submitadvancesearch" type="submit" class="formbtn"  value="<?= $advancesearchsubmit ?>"> &nbsp; <input name="Reset" type="reset" class="resetbtn" value="<?= $advancesearchreset ?>"></div></div></div>
</table>

</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>