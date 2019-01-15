<!-- ********* TITLE START HERE *********-->
	
        
        
        <div class="pagetitle">
        
           <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span>Special Search</span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
    	<? 
	$spl_clr_code = 'style="color:#F57D20"';	
	$adv_clr_code = '';
	$basic_clr_code = '';
	$astro_clr_code = '';
	
	include("searchtab.php");
?>
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent basic_common">
		<!-- ********* CONTENT START HERE *********-->
	
<div class="errorbox"><span><? checkerror(); ?></span></div>
<form name ='form1' method='post' action ="<?= $filename ?>.php" class="update_form">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formborder">

<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchlookingfor ?></label>
<div class="col-lg-8"><select name='advlookingfor' class="form-control">
<? fillcombo(lookingfor_query($curruserid),"",""); ?></select>
</div>


</div>
<?
if(isset($searchquickminage1)!='')
{
	$searchquickminage1 =$searchquickminage1;
}
else
{
	$searchquickminage1 ='';
}
if(isset($searchquickmaxage)!='')
{
	$searchquickmaxage =$searchquickmaxage;
}
else
{
	$searchquickmaxage ='';
}
?>
<div class="form-group">

<label class="col-lg-4 control-label"><?= $searchquickminage ?></label>
<div class="col-lg-8"><select name='advminage' class="form form_patnerprofile same_select"><?  fillage($searchquickminage1) ?></select>
<?=$searchquick_to ?> <select name='advmaxage' class="form form_patnerprofile same_select"><? fillage($searchquickmaxage) ?></select>
</div>


</div>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$advancesearch_specialcases?> </label>
<div class="col-lg-8">
<? 
$resullt = getdata("SELECT id,title from tbldatingspecialcasemaster WHERE currentstatus=0");
while($rs = mysqli_fetch_array($resullt)){
	$id = $rs[0];
	$title = $rs[1];
?>
<input type="checkbox" name="speci_case[]" id="speci_case<?=$id?>" value="<?=$id?>" />&nbsp;<?=$title?><br />
<? } ?>
</div>


</div>

<?
if(isset($religionid)!='')
{
	$religionid = $religionid;
}
else
{
	$religionid ='';
}
?>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$adminsearchlink_religion?> : </label>
<div class="col-lg-8"><select name="cmbreligionid" id="cmbreligionid" class="form-control"><? fillcombo("select id,title from  tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$religionid,$advancesearchcountrycombotitle) ?></select>
</div>


</div>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$leftsearchMothertongue?> : </label>
<div class="col-lg-8"><select name="cmbmothertongueid" id="cmbmothertongueid" class="form-control"><? fillcombo("select id,title from  tbldatingmothertonguemaster where currentstatus=0 and languageid=$sitelanguageid order by title","",$advancesearchcountrycombotitle) ?></select>
</div>


</div>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2cast?> </label>
<div class="col-lg-8"><select name="cmbcasteid" id="cmbcasteid" class="form-control"><? fillcombo("select id,title from  tbldatingcastmaster where currentstatus=0 and languageid=$sitelanguageid order by title","",$advancesearchcountrycombotitle) ?></select>
</div>


</div>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$displayprofile_backup_country?> : </label>
<div class="col-lg-8"><select name="cmbcountryid" id="cmbcountryid" class="form-control"><? fillcombo("select id,title from  tbldatingcountrymaster where currentstatus=0 and languageid=$sitelanguageid order by title","",$advancesearchcountrycombotitle) ?></select>
</div>


</div>


<div class="form-group">
<label class="col-lg-4 control-label"></label>
<div class="col-lg-8"><div class="formbtn_outer"><input name="Submitsearchquick" type="submit" class="formbtn"  value="<?= $searchquicksubmit ?>"> &nbsp; <input name="Reset" type="reset" class="resetbtn" value="<?= $searchquickreset ?>"></div></div>


</div>
</table>

</form>
		<!-- ********* CONTENT END HERE *********-->
		</div>