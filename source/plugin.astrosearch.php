<!-- ********* TITLE START HERE *********-->
	<div class="pagetitle">
		<!-- ********* TITLE END HERE *********-->
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $astrosearchpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
	<? 
	$astro_clr_code = 'style="color:#F57D20"';
	$adv_clr_code = '';
	$basic_clr_code = '';
	$spl_clr_code = '';
	include("searchtab.php");
?>	        

    
    	
		<div class="pagecontent basic_common">
		<!-- ********* CONTENT START HERE *********-->
<div class="errorbox"><span><? checkerror(); ?></span></div>
<form name ='form1' method='post' action ="<?= $filename ?>.php" class="update_form">


<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchlookingfor ?></label>
<div class="col-lg-8"><select name='advlookingfor' class="form-control">
<? fillcombo(lookingfor_query($curruserid),"",""); ?></select></div></div>



<div class="form-group">
<label class="col-lg-4 control-label"><?= $searchquickminage ?></label>
<div class="col-lg-8"><select name='advminage' class="form form_patnerprofile same_select"> <?  fillage($searchquickminage1) ?> </select>
<strong class="stronger_normal"> <?=$searchquick_to ?></strong> <select name='advmaxage' class="form form_patnerprofile same_select"> <? fillage($searchquickmaxage) ?></select>
</div></div>

<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchreligian ?></label>
<div class="col-lg-8"><select name="cmbreligian" class="form-control"> <? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$religionid,$advancesearchcountrycombotitle) ?> </select>
</div></div>

<div class="form-group">
<label class="col-lg-4 control-label"><input type="radio" name="sign" id="sign" value="S" checked="checked" /><?= $updateprofile2sunsign ?><input type="radio" name="sign" id="sign" value="M" /><?= $updateprofile2moonsign ?>
</label>
<div class="col-lg-8"><select name="txtsign" class="form-control">
<? fillcombo("select id,title from tbldatingsunsignmaster where currentstatus=0 and languageid=$sitelanguageid   order by title",$moonsignid,$updatepersonalprofiledprofileselect_sel) ?>
</select></div></div>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_grah?></label>
<div class="col-lg-8"><select name="cmbgrah" class="form-control">
<? fillcombo("select id,title from  tbldatinggrahmaster where currentstatus=0 and languageid=$sitelanguageid   order by title",$grahid,$updatepersonalprofiledprofileselect_sel) ?>
<option value="">Select</option>
</select></div></div>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2preferedstars?></label>
<div class="col-lg-8"><select name="cmbpreferstarid" class="form-control">
<?  fillcombo("select prefered_id,title from tbl_preferedstar_master where currentstatus=0 order by title",$preferstarid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_lagna?></label>
<div class="col-lg-8"><select name="cmblagnaid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$lagna,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_surya?></label>
<div class="col-lg-8"><select name="cmbsuryaid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$surya,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_chandra?></label>
<div class="col-lg-8"><select name="cmbchandraid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$chandra,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofile2_mangal ?>(<?= $updateprofile2_kucho ?>) :</label>
<div class="col-lg-8"><select name="cmbmangalid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$mangal,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_budha?></label>
<div class="col-lg-8"><select name="cmbbudhaid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$budha,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_vyazham?></label>
<div class="col-lg-8"><select name="cmbvyazhamid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$vyazham,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_sukra?></label>
<div class="col-lg-8"><select name="cmbsukraid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$sukra,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_shani?></label>
<div class="col-lg-8"><select name="cmbshaniid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$shani,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_rahu?></label>
<div class="col-lg-8"><select name="cmbrahuid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$rahu,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_ketu?> :</label>
<div class="col-lg-8"><select name="cmbketuid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$ketu,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2_gulikan?></label>
<div class="col-lg-8"><select name="cmbgulikanid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$gulikan,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofile2_neptune ?></label>
<div class="col-lg-8"><select name="cmbneptuneid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$neptune,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>

<div class="form-group">
<label class="col-lg-4 control-label"></label>
<div class="col-lg-8"><div class="formbtn_outer"><input name="Submitsearchquick" type="submit" class="formbtn"  value="<?= $searchquicksubmit ?>"> &nbsp; <input name="Reset" type="reset" class="resetbtn" value="<?= $searchquickreset ?>"></div></div></div>
</table>

</form>
		<!-- ********* CONTENT END HERE *********-->
		</div>