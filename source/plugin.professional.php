<!-- ********* TITLE START HERE *********-->
 <div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $professionalpgtitle ?></span></div>
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
<div class="col-lg-8"><input type="text" name="txtkeyword" class="form-control" size="35" value="<?=$txtkeyword?>" maxlength="<?= $textbox_character_max_length ?>"></div></div>

<div class="form-group">

<label class="col-lg-4 control-label"><?= $searchquicklookingfor ?></label>
<div class="col-lg-8">
<select name='searchquicklookingfor' class="form-control">
<? fillcombo(lookingfor_query($curruserid),"",""); ?></select>
</div>
</div>

<!--<div class="form-group">

<label class="col-lg-4 control-label"> <?= $advancesearchheight ?></label>
<td class="formcont">
<div class="col-lg-8"><select name='advheight1' class="form form_patnerprofile same_select">
<? fillcombo("select id,title from tbldatingheightmaster where currentstatus =0 and languageid=$sitelanguageid order by id",$advheight1,$advancesearchcombotitle) ?>
</select> <?= $advancesearchto ?> 
<select name='advheight2' class="form form_patnerprofile same_select">
<? fillcombo("select id,title from tbldatingheightmaster where currentstatus =0 and languageid=$sitelanguageid order by id",$advheight2,$advancesearchcombotitle) ?>
</select></div>
</td>

</div>-->


<div class="form-group">

<label class="col-lg-4 control-label"> <?=$searchquickminage ?></label>
<div class="col-lg-8"><select name='searchquickminage' class="form form_patnerprofile same_select"><?  fillage($searchquickminage1) ?></select>
	<?=$searchquick_to ?> <select name='searchquickmaxage' class="form form_patnerprofile same_select"><? fillage($searchquickmaxage) ?></select>
</div>
</div>

<?
if($enable_social_community=='Y'){ ?>
<!--<div class="form-group">

<label class="col-lg-4 control-label"><?=$searchquickcommunity ?></label>
<div class="col-lg-8">
	<select name="searchcmbcommunity" id="searchcmbcommunity" class="form-control">
    	<? fillcombo("SELECT id,title from tbldatingmothertonguemaster WHERE currentstatus=0 AND languageid=".$sitelanguageid." order by title","","Select"); ?>
    </select>
</div>
</div>-->
<? } ?>




    
	<div class="form-group top_gap">
<label class="col-lg-4 control-label"><?= $advancesearchreligian ?></label>
<div class="col-lg-8"><select name="cmbreligian" class="form-control" onchange="check_casts(this.value)">
<? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$religionid,$advancesearchcountrycombotitle) ?></select></td>
</div>
</div>

<div id="loading123"></div>

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



<div class="form-group">
<label class="col-lg-4 control-label"><?= $searchquick_maritalstatus ?></label>
<div class="col-lg-8"> 	
<div class="select2-wrapper MYseletion">

    <select data-placeholder="<?=$dropdown_placeholder?>" class="form-control select2-multiple" multiple tabindex="4" name="marital_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
			$qry = getdata("select id,title from tbldatingmaritalstatusmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>"  <? //if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>    
    </div>
</div>

<? if (findsettingvalue("Religion_field_display") == "H") { ?>

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
<label class="col-lg-4 control-label">Annual Income : </label>
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
<!--Added by Nishit end-->






<input type="hidden" name="raddispresult" value ="d" />
<br/>
<div class="form-group">
<label class="col-lg-4 control-label"></label>
<div class="col-lg-8">
<div class="formbtn_outer">
<input name="Submitsearchquick" type="submit" class="formbtn"  value="<?= $searchquicksubmit ?>"> &nbsp; <input name="Reset" type="reset" class="resetbtn" value="<?= $searchquickreset ?>"></div></div>
</div>

</form>
		<!-- ********* CONTENT END HERE *********-->
		</div>