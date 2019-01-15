<? 
include("commonfile.php");
$religionid = "";
$castid ='';
?>
			  <!-----------cast start------------->
<?
if(isset($_POST['cat']) && $_POST['cat']=='topsearch') 
{
if(isset($_POST['religionid']) && $_POST['religionid']!="" && $_POST['type']==1) 
{		$religionid = $_POST['religionid'];	
		?>
    
    <div class="botttom_sunya">
	<label class="col-lg-4 control-label"><?= $search_cast ?> : </label>
    <div class="col-lg-8">
	<select name="cmbcast" class="searchincludecountry form-control caster_bloc" id="cmbcast" 
    <? if($enable_quick_search_long_2=='Y') {?>onchange="change_cast(this.value,2)" <? } ?>>
	<? echo fillcombo("select id,title from tbldatingcastmaster where currentstatus=0 and religianid=".$religionid." 
	and languageid=$sitelanguageid order by title",$_SESSION[$session_name_initital . "searchincludecast"],
	$advancesearchcountrycombotitle); ?>
	</select>
    </div></div>
<?	} } ?>
			  <!-----------cast end------------->
              
             <!-----------subcast start------------->
<?
if(isset($_POST['cat']) && $_POST['cat']=='topsearch') 
{
if(isset($_POST['religionid']) && $_POST['religionid']!="" && $_POST['type']==2) 
{
	$cmbcast = $_POST['religionid'];	

	?>
    
    <div class="botttom_sunya">
	<label class="col-lg-4 control-label"><?=$default_displayprofile_subcast?> : </label>
    <div class="col-lg-8">
	<select name="cmbsubcast" class="searchincludecountry form-control caster_bloc" id="cmbsubcast" 
    onchange="other_sub(this.value)">
	<? echo fillcombo("select id,title from tbldatingsubcastmaster where currentstatus=0 and castid=".$cmbcast." 
	and languageid=$sitelanguageid order by title",$_SESSION[$session_name_initital . "searchincludecmbsubcast"],
	$advancesearchcountrycombotitle); ?>
	<option value="other">Other</option>
	</select>
    </div></div>
<?	} } ?>
 			<!-----------subcast end------------->


<? 
if(isset($_POST['cat']) && $_POST['cat']=='upd'){
	if(isset($_POST['religionid']) && $_POST['religionid']!=""){
		$religionid = $_POST['religionid']; 		
		
		
	  if($religionid==4 )
	{
		if($christian_cast_module=='Y')
		{
			$hide_cast_div='style=display:block';
		}
		elseif($christian_cast_module=='N')
		{
			$hide_cast_div='style=display:none';
		}
	}
	else{$hide_cast_div='style=display:block';}
	

		?>
		<div class="form-group" <?=$hide_cast_div?>>
	<label class="col-lg-4 control-label"><?= $updateprofile2cast ?></label>
   <div class="col-lg-8">
<select name="cmbcast"  id="cmbcast" class="form-control" onchange="change_subcast(this.value)" >
<? echo
fillcombo("select id,title from tbldatingcastmaster where currentstatus=0 and religianid=".$religionid." and languageid=$sitelanguageid order by title",$castid,$updatepersonalprofiledprofileselect_sel)
 ?>
 <option value="other">Other</option>
</select>

</div></div>
<?
	}
}
?>





<? 
if(isset($_POST['cat']) && $_POST['cat']=='search_subcast')	{
	if(isset($_POST['castid']) && $_POST['castid']!=""){
		$castid = $_POST['castid']; 
		$chksubcast = getonefielddata("SELECT count(id) from tbldatingsubcastmaster WHERE currentstatus=0 
		AND castid='".$castid."' ");
		if($chksubcast>0){
		?>
		<div class="form-group">
	<label class="col-lg-4 control-label"><?= $updateprofile2subcast ?></label>
     <div class="col-lg-8">
		<select name="txtsubcat"  id="txtsubcat" class="form-control" onchange="changedata(this.value)">
		<?
fillcombo("select id,title from tbldatingsubcastmaster where currentstatus=0 and castid='".$castid."' and languageid=$sitelanguageid order by title","",$updatepersonalprofiledprofileselect_sel)
 ?>
 	<option value="other">Other</option>
</select>


</div></div>
<?		
		}
	}
}
?>