
<!-- ********* TITLE START HERE *********-->
 <div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $searchquickpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>

		<?
$basic_clr_code = 'style="color:#F57D20"';
$adv_clr_code = '';
$astro_clr_code = '';
	$spl_clr_code = '';
	include("searchtab.php");
?>
        
        
       
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent basic_common Choosan_Form">
		<!-- ********* CONTENT START HERE *********-->
<?
$q_search_work = "";
if(isset($_SESSION[$session_name_initital . "q_search_work"]) && $_SESSION[$session_name_initital . "q_search_work"]!="") {
	 $q_search_work = explode(",",$_SESSION[$session_name_initital . "q_search_work"]);
}

$q_search_annualincome = "";
if(isset($_SESSION[$session_name_initital."q_search_annualincome"]) && $_SESSION[$session_name_initital . "q_search_annualincome"]!=""){
	$q_search_annualincome = explode(",",$_SESSION[$session_name_initital . "q_search_annualincome"]);
}

$q_search_occupation = "";
if(isset($_SESSION[$session_name_initital . "q_search_occupation"]) && $_SESSION[$session_name_initital . "q_search_occupation"]!=""){
	$q_search_occupation = explode(",",$_SESSION[$session_name_initital . "q_search_occupation"]);
}

$q_search_education = "";
if(isset($_SESSION[$session_name_initital . "q_search_education"]) && $_SESSION[$session_name_initital . "q_search_education"]!=""){
	$q_search_education = explode(",",$_SESSION[$session_name_initital . "q_search_education"]);
}



$q_search_mangalik = "";
if(isset($_SESSION[$session_name_initital . "q_search_mangalik"]) && $_SESSION[$session_name_initital . "q_search_mangalik"]!="") {
	$q_search_mangalik = explode(",",$_SESSION[$session_name_initital . "q_search_mangalik"]);
}
$q_search_marital = "";
if(isset($_SESSION[$session_name_initital . "q_search_marital"]) && $_SESSION[$session_name_initital . "q_search_marital"]!=""){
	$q_search_marital = explode(",",$_SESSION[$session_name_initital . "q_search_marital"]);
	
}
$q_search_cast = "";
if(isset($_SESSION[$session_name_initital . "q_chkcast"]) && $_SESSION[$session_name_initital . "q_chkcast"]!=""){
	$q_search_cast = explode(",",$_SESSION[$session_name_initital . "q_chkcast"]);	
}

$q_search_mool = "";
if(isset($_SESSION[$session_name_initital . "q_chkmool"]) && $_SESSION[$session_name_initital . "q_chkmool"]!=""){
	$q_search_mool = explode(",",$_SESSION[$session_name_initital . "q_chkmool"]);	
}

$q_search_social = "";
if(isset($_SESSION[$session_name_initital . "q_search_social"]) && $_SESSION[$session_name_initital . "q_search_social"]!=""){
	$q_search_social = explode(",",$_SESSION[$session_name_initital . "q_search_social"]);
}
$searchquickminage1 = "";
if(isset($_SESSION[$session_name_initital . "q_searchquickminage"]) && $_SESSION[$session_name_initital . "q_searchquickminage"]!=""){
	$searchquickminage1 = $_SESSION[$session_name_initital . "q_searchquickminage"];
}
$searchquickmaxage = "";
if(isset($_SESSION[$session_name_initital . "q_searchquickmaxage"]) && $_SESSION[$session_name_initital . "q_searchquickmaxage"]!=""){
	$searchquickmaxage = $_SESSION[$session_name_initital . "q_searchquickmaxage"];
}

$advheight1 = "";
if(isset($_SESSION[$session_name_initital . "q_advheight1"]) && $_SESSION[$session_name_initital . "q_advheight1"]!=""){
	$advheight1 = $_SESSION[$session_name_initital . "q_advheight1"];
}

$advheight2 = "";
if(isset($_SESSION[$session_name_initital . "q_advheight2"]) && $_SESSION[$session_name_initital . "q_advheight2"]!=""){
	$advheight2 = $_SESSION[$session_name_initital . "q_advheight2"];
}

if(isset($_SESSION[$session_name_initital . "q_cmbreligian"]) && $_SESSION[$session_name_initital . "q_cmbreligian"]!=""){
	$religionid = $_SESSION[$session_name_initital . "q_cmbreligian"];
}

$txtkeyword= "";
if(isset($_SESSION[$session_name_initital . "q_txtkeyword"]) && $_SESSION[$session_name_initital . "q_txtkeyword"]!=""){
	$txtkeyword = $_SESSION[$session_name_initital . "q_txtkeyword"];
}
$radsortsearchresult = "";
if(isset($_SESSION[$session_name_initital . "q_radsortsearchresult"] ) && $_SESSION[$session_name_initital . "q_radsortsearchresult"] !=""){
	$radsortsearchresult = $_SESSION[$session_name_initital . "q_radsortsearchresult"] ;
}

$radshowmember="";
if(isset($_SESSION[$session_name_initital . "q_radshowmember"] ) && $_SESSION[$session_name_initital . "q_radshowmember"] !=""){
	$radshowmember = $_SESSION[$session_name_initital . "q_radshowmember"]; 
}

$raddispresult = "";
if(isset($_SESSION[$session_name_initital . "q_raddispresult"] ) && $_SESSION[$session_name_initital . "q_raddispresult"] !=""){
	$raddispresult = $_SESSION[$session_name_initital . "q_raddispresult"] ;
}

$chkonline = "";
if(isset($_SESSION[$session_name_initital . "q_chkonline"] ) && $_SESSION[$session_name_initital . "q_chkonline"] !=""){
	$chkonline = $_SESSION[$session_name_initital . "q_chkonline"];
}

?>
		
<div class="errorbox"><span><? checkerror(); ?></span></div>
<form class="update_form" name ='form1' method='post' action ="<?= $filename ?>.php">

<div class="form-group top_gap">
<label class="col-lg-4 control-label"><?= $searchquick_keyword ?></label>
<div class="col-lg-8">
<input type="text" name="txtkeyword" class="form-control" size="35" value="<?=$txtkeyword?>" maxlength="<?= $textbox_character_max_length ?>">
<div class="basic_keyword_note">search in familybackground,profileheadline,personality</div>
</div>
</div>

<div class="form-group">

<label class="col-lg-4 control-label"><?= $searchquicklookingfor ?></label>
<div class="col-lg-8">
<select name='searchquicklookingfor' class="form-control">
<? fillcombo(lookingfor_query($curruserid),"",""); ?></select>
</div>
</div>

<div class="form-group">

<label class="col-lg-4 control-label"> <?= $advancesearchheight ?></label>
<td class="formcont">
<div class="col-lg-8"><select name='advheight1' class="form form_patnerprofile same_select">
<? fillcombo("select id,title from tbldatingheightmaster where currentstatus =0 and languageid=$sitelanguageid order by id",$advheight1,$advancesearchcombotitle) ?>
</select> <?= $advancesearchto ?> 
<select name='advheight2' class="form form_patnerprofile same_select">
<? fillcombo("select id,title from tbldatingheightmaster where currentstatus =0 and languageid=$sitelanguageid order by id",$advheight2,$advancesearchcombotitle) ?>
</select></div>
</td>

</div>


<div class="form-group">

<label class="col-lg-4 control-label"> <?=$searchquickminage ?></label>
<div class="col-lg-8"><select name='searchquickminage' class="form form_patnerprofile same_select"><?  fillage($searchquickminage1) ?></select>
	<?=$searchquick_to ?> <select name='searchquickmaxage' class="form form_patnerprofile same_select"><? fillage($searchquickmaxage) ?></select>
</div>
</div>

<?
if($enable_social_community=='Y'){ ?>
<div class="form-group">

<label class="col-lg-4 control-label"><?=$searchquickcommunity ?></label>
<div class="col-lg-8">
	<select name="searchcmbcommunity" id="searchcmbcommunity" class="form-control">
    	<? fillcombo("SELECT id,title from tbldatingmothertonguemaster WHERE currentstatus=0 AND languageid=".$sitelanguageid." order by title","","Select"); ?>
    </select>
</div>
</div>
<? } ?>

<div class="form-group">
<label class="col-lg-4 control-label"><?= $searchquick_maritalstatus ?></label>
<div class="col-lg-8">   	
<div class="select2-wrapper MYseletion">

    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="marital_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
		$qry = getdata("select id,title from tbldatingmaritalstatusmaster where currentstatus =0 and 		languageid=$sitelanguageid order by title"); 
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>    
    </div>
</div>

<div class="form-group" style="display:none">
<label class="col-lg-4 control-label"><?= $advancesearchhavechildren ?></label>
<div class="col-lg-8"><div class="formcontainer">
<? 
$i = 1;
$j=0;
$chk_children ="";
$result = getdata("select id,title from tbldatingkidsmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
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
	<span><input type="checkbox" <?=$chk_children?> name="chkhavechildren<?= $rs[0] ?>" value="<?= $rs[0] ?>" class="form-control" /> <?= $rs[1] ?></span>
	<? 
	$i= $i+1;
	$j++;
	} 
	freeingresult($result);
	?>
	</div>
    </div>
    </div>
    
	
<div class="form-group top_gap">
<label class="col-lg-4 control-label"><?= $advancesearchreligian ?></label>
<div class="col-lg-8"><select name="cmbreligian" class="form-control" onchange="check_casts(this.value)">
<? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$religionid,$advancesearchcountrycombotitle) ?></select></td>
</div>
</div>



<div class="form-group" id="searchquick_casts_hide">
<label class="col-lg-4 control-label"><?= $searchquick_caste ?></label>
<div class="col-lg-8">   	
<div class="select2-wrapper MYseletion">

    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="cast_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
		$qry = getdata("select id,title from tbldatingcastmaster where currentstatus =0 and religianid=$religionid and 
	languageid=$sitelanguageid order by title"); 
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>" >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>    
    </div>
</div>


<div id="searchquick_casts_show" class="form-group" >
</div>

<!--<tr>
	<td colspan="2">
    	<div id="searchquick_mools">        
    	<table style="width:100%">
        	<tr>
            <td>
    <br /><strong class="up4title7">Mool : </strong>
    <div id<?php /*?><?php */?>="pro_cst">
    	<div class="productPriceWrapRight product_left"  style="float:left; height:100px; overflow-y:scroll;">
	<?	
	$qry = getdata("select id,title from tbldatingmool_master where currentstatus =0 and languageid=$sitelanguageid order by title");
	$i=1;
	$mool = '';	
	while($rs = mysqli_fetch_array($qry)){			
	$mool .= $rs[0].",";
	 ?>
     	<div id="toggleh<?=$i?>">
			<img src="jquery/droppable/images/add.gif" alt="Add To Mool" onclick="add('showmool<?=$i?>','moolshow<?=$i?>')" border="0" />
			<?=$rs['title']?><br />
        </div>    
					
	<? $i++;
	} 
	$mool = substr($mool,0,-1);
	?>
	</div>
    <div id="basketItemsWrap" class="right" style="overflow-y:scroll; height:100px">
    <?	
    	$qry = getdata("SELECT id,title from tbldatingmool_master WHERE currentstatus=0 AND languageid=$sitelanguageid order by title");
		$i=1;
		while($rs = mysqli_fetch_array($qry)){
			if($q_search_mool!="")	{
			$chk_mool = in_array($rs[0],$q_search_mool);
			if($chk_mool==1){
				$str_mool = 'style="display:inline;"';
				$mool_disable = "";
			} else {
				$str_mool = 'style="display:none;"';
				$mool_disable = 'disabled="disabled"';
			}
		} else {
			$str_mool = 'style="display:none;"';
			$mool_disable = 'disabled="disabled"';
		}			
	?>
    	<div class="showmool<?=$i?>" id="hide<?=$i?>" <?=$str_mool?> onclick="remove('showmool<?=$i?>','moolshow<?=$i?>')">
        	<img src="jquery/droppable/images/delete.png" alt="Add To Mool" border="0"  /><?=$rs[1]?><br />
        </div>
        <input type="hidden" id="moolshow<?=$i?>" name="mool_arr[]" <?=$mool_disable?>  value="<?=$rs[0]?>"/>
    <? $i++;
	} ?>		
	</div>
    </div>
    </td></tr></table></div>
    </td>
</tr>-->


<? if (findsettingvalue("Religion_field_display") == "H") { ?>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $searchquick_mangalikstatus ?></label>
<div class="col-lg-8">   	
<div class="select2-wrapper MYseletion">

	<select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="mangalik_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
	$qry = getdata("select id,title from tbldatinggrahmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>        
    </div>
</div>
<!-- <p><label><?= $partnerprofilegotra  ?></label><input type="text" name="txtgotra"  value="<?= $gotra ?>" /></p> -->
<? } ?>
<? if(enable_enhance_basicsearch=='Y') { ?>
<div class="form-group">
<label class="col-lg-4 control-label">Education :</label>
<div class="col-lg-8">  	
<div class="select2-wrapper MYseletion">

    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="edu_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
		$qry = getdata("select id,title from tbl_education_master where currentstatus =0 and languageid=$sitelanguageid order by title");
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>    
    </div>
</div>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $searchquick_occupation ?></label>
<div class="col-lg-8">   	
<div class="select2-wrapper MYseletion">
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="occ_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
			$qry = getdata("select id,title from tbldatingoccupationmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>    
    </div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label">Annual Income :</label>
<div class="col-lg-8">  	
<div class="select2-wrapper MYseletion">
    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="ann_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
			$qry = getdata("select id,title from tbldating_annual_income_master where currentstatus =0 and languageid=$sitelanguageid order by title");
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>    
    </div>
</div>
<? } ?>
<!--Added by Nishit-->
<div class="form-group">
<label class="col-lg-4 control-label"><?= $searchquick_workcountry ?></label>
<div class="col-lg-8">   	
<div class="select2-wrapper MYseletion">

    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="wic_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
			$qry = getdata("select id,title from tbldatingcountrymaster where currentstatus =0 and languageid=$sitelanguageid order by title"); 
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>    
    </div>
</div>



<div class="form-group group_bottoms">
<label class="col-lg-4 control-label"><?= $searchquickshowme ?></label>
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
<input type="radio" name="radshowmember" <?=$d?> value ="a"  /> <?= $advancesearchshowmeall  ?> &nbsp;&nbsp;
<input type="radio" name="radshowmember" <?=$c?> value ="p"  /><?= $advancesearchshowmephoto  ?>
</div></div>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $searchquicksortsearchresult ?></label>
<div class="col-lg-8">
<? 
if($radsortsearchresult=='' || $radsortsearchresult=='1' ){
	$f = 'checked="checked"';
} else {
	$f = "";
}
?>
<input type="radio" name="radsortsearchresult" <?=$f?> value ="l"/> <?= $advancesearchsortsearchresultall  ?> &nbsp;
<? 
if($radsortsearchresult=='n'){
	$n = 'checked="checked"';
} else {
	$n = "";
}
?>
<input type="radio" name="radsortsearchresult" <?=$n?> value ="n"/> <?= $advancesearchsortsearchresultnew  ?> &nbsp;
<? 
if($radsortsearchresult=='a'){
	$a = 'checked="checked"';
} else {
	$a = "";
}
?>
<input type="radio" name="radsortsearchresult" <?=$a?> value ="a"/> <?= $advancesearchsortsearchresultmostactive  ?> &nbsp;
<? 
if($radsortsearchresult=='p'){
	$p = 'checked="checked"';
} else {
	$p = "";
}
?>
<input type="radio" name="radsortsearchresult" <?=$p?> value ="p"/> <?= $advancesearchsortsearchresultmostpopular  ?>
</div>
</div>
<input type="hidden" name="raddispresult" value ="d" />
<?php /*?><tr valign="top">
<td class="up4title7"><?= $searchquickdisplayresult ?></td>
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
<input type="radio" name="raddispresult" <?=$pl?> value ="p"/> <?= $advancesearchraddispresultphoto  ?> </td>
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

<input type="checkbox" name="chkonline" id="chkonline" <?=$y?>  value="Y"/> <?= $searchquickonline ?></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"></label>
<div class="col-lg-8">
<div class="formbtn_outer">
<input name="Submitsearchquick" type="submit" class="formbtn"  value="<?= $searchquicksubmit ?>"> &nbsp; <input name="Reset" type="reset" class="resetbtn" value="<?= $searchquickreset ?>"></div></div></div>

</form>
		<!-- ********* CONTENT END HERE *********-->
		</div>