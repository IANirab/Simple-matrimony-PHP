<? 
$enable_nri_search='';
if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
	 $curruserid = $_SESSION[$session_name_initital."memberuserid"]; 
}
?>
<script type="text/javascript" language="javascript">
	function change_cast(val,type)
	{		
		if(val!="")
		{
			
			if(document.getElementById('cast').style.display=='inline' && type==1)
			{
				document.getElementById('cast').style.display = 'none';
			}
			
	      <? if($enable_quick_search_long_2=='Y') {?>		
			
			if(document.getElementById('subcast_dr').style.display=='inline' && type==2)
			{
				document.getElementById('subcast_dr').style.display = 'none';
			}
			<? }?>
			
			if(type==1)
			{
				document.getElementById('indicator').style.display = 'inline';
				document.getElementById('casts').style.display = 'none';
			}
			if(type==2)
			{
				document.getElementById('indicator1').style.display = 'inline';
				document.getElementById('subcast_drs').style.display = 'none';		
			}
			
			$.post("<?=$sitepath?>search_cast.php",
				{religionid:val,type:type,
				 cat:"topsearch"},
				function (data)
				{					
						var str = data;
						if(str!="" && type==1)
						{
							document.getElementById('indicator').style.display = 'none';
							document.getElementById('cast').style.display = 'inline';
							document.getElementById('cast').innerHTML = str;
						}
						if(str!="" && type==2)
						{
							document.getElementById('indicator1').style.display = 'none';
							document.getElementById('subcast_dr').style.display = 'inline';
							document.getElementById('subcast_dr').innerHTML = str;
						}
				}
			)
		}
	}
	
	function setvisiblity1(){

    if (document.getElementById("divparameter1").style.display =="block"){
        document.getElementById("divparameter1").style.display ='none';
    }else
        document.getElementById("divparameter1").style.display ='block';
}
</script>
<div class="searchinclude">

<h4><?=$searchead?></h4>


<div class="text_header">
<div class="searchincludeimage"></div>
<div class="profileidSearch">
          <a href="#" onclick="setvisiblity1()"><?=$pindex_profileidsearch?></a>
          
          </div>
          <div id="divparameter1" class="pops_profiled" style="display:none;">
		<?php include("searchbyprofileid.php") ?>
		</div> 
        <form name='searchpartner' method='POST' class="" action='<?= $sitepath ?>searchresultque.php'>
<nice>

<div class="form-group">
	
<label class="col-lg-4"><?= $searchlookingfor ?>: </label>
<?
if(isset($_SESSION[$session_name_initital . "searchincludelookingfor"]) && 
$_SESSION[$session_name_initital . "searchincludelookingfor"]!='')
{
	$search_sel_lookingfor=$_SESSION[$session_name_initital . "searchincludelookingfor"];
}else{$search_sel_lookingfor='';}
?>
<div class="col-lg-8"> 
	<select name='LookingFor' class="form-control   small_lengths">
		<? fillcombo(lookingfor_query($curruserid),$search_sel_lookingfor,""); ?>
	</select>
 </div>
 </div>
 <div class="form-group  ">
<label  class="col-lg-4"><?= $searchminage ?> :</label>
<div class="col-lg-8 yers_city"> 


	<?
    if(isset($_SESSION[$session_name_initital . 'searchincludeminage']) 
    && $_SESSION[$session_name_initital . 'searchincludeminage']!='')
    {
        $search_sel_minage=$_SESSION[$session_name_initital . 'searchincludeminage'];
    }else{$search_sel_minage='';}
    ?>
	<select name='MinAge' class="form-control  ex_small">
		<?  fillage($search_sel_minage) ?>
   </select>  


	<span class="agg_year"> <?= $searchmaxage ?> </span> 

	<?
    if(isset($_SESSION[$session_name_initital . 'searchincludemaxage']) 
    && $_SESSION[$session_name_initital . 'searchincludemaxage']!='')
    {
        $search_sel_maxage=$_SESSION[$session_name_initital . 'searchincludemaxage'];
    }else{$search_sel_maxage='';}
    ?>
	<select name='MaxAge' class="form-control  ex_small pull-right ">
	<? fillage($search_sel_maxage) ?>
    </select>
	
	
</div>
</div>
 <div class="form-group   religon_spacer">    
    <label class="col-lg-4"><?= $default_searchgrid_design_religion?>  : </label>	
    <div class="col-lg-8"> 
    <?
    if(isset($_SESSION[$session_name_initital . "searchincludereligian"]) && $_SESSION[$session_name_initital . "searchincludereligian"]!='')
	{
		$search_sel_religian=$_SESSION[$session_name_initital . "searchincludereligian"];
	}else{$search_sel_religian='';}
	
	if(isset($_SESSION[$session_name_initital . "searchincludecast"]) && $_SESSION[$session_name_initital . "searchincludecast"]!='')
	{
		$search_sel_cast=$_SESSION[$session_name_initital . "searchincludecast"];
	}else{$search_sel_cast='';}
	

	?>
    <select name="cmbreligion" class="form-control searchincludecountry" onchange="change_cast(this.value,1)">
		<? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$search_sel_religian,$advancesearchcountrycombotitle) ?></select>
        </div>
        </div>
         <!-----------cast start------------->
<? if($enable_quick_search_long=='Y') {?>
<img src="uploadfiles/indicator.gif"/ id="indicator" style="display:none;">
 <div class="form-group" id="casts"> 
	<label class="col-lg-4"><?= $default_searchgrid_design_caste?> : </label>
    <div class="col-lg-8 default_grids1_actions"> 
	<select name="cmbcast" class="form-control searchincludecountry default_grids1" id="cmbcast" 
    <? if($enable_quick_search_long_2=='Y') {?>onchange="change_cast(this.value,2)" <? }?>>
	<? echo fillcombo("select id,title from tbldatingcastmaster where currentstatus=0 and religianid=".$search_sel_religian." and languageid=$sitelanguageid order by title",$search_sel_cast,$advancesearchcountrycombotitle); ?>
	</select>
</div>
</div>
<div id="cast" class="form-group   silsila_position" style="display:none;"></div>
<? } ?>
		   <!-----------cast end------------->
           
<? if($enable_quick_search_long_2=='Y') {?>
			  <!-----------subcast start------------->
<img src="uploadfiles/indicator.gif"/ id="indicator1" style="display:none;">
<div class="form-group" id="subcast_drs"> 
<?

	if(isset($_SESSION[$session_name_initital . "searchincludecmbsubcast"]) && $_SESSION[$session_name_initital . "searchincludecmbsubcast"]!='')
	{
		$search_sel_subcast=$_SESSION[$session_name_initital . "searchincludecmbsubcast"];
	}else{$search_sel_subcast='';}

?>
	<label class="col-lg-4"><?=$default_displayprofile_subcast?> : </label>
    <div class="col-lg-8 default_grids1_actions"> 
	<select name="cmbsubcast" class="form-control searchincludecountry default_grids1" id="cmbsubcast">
	<? echo fillcombo("select id,title from tbldatingsubcastmaster where currentstatus=0 and castid=".$search_sel_subcast." and languageid=$sitelanguageid order by title",$search_sel_subcast,$advancesearchcountrycombotitle); ?>
	</select>
</div>
</div>
<div id="subcast_dr" class="form-group   silsila_position" style="display:none;"></div>
<? } ?>
			<!-----------subcast end------------->
		
		
		<?	if($enable_quick_search_long=='Y') { ?>
         <div class="form-group search-com">
		<label  class="col-lg-4"><?=$default_searchgrid_design_community ?>  : </label>	
        <div class="col-lg-8"> 
        <?
		if(isset($_SESSION[$session_name_initital . "searchincludecommunity"]) && $_SESSION[$session_name_initital . "searchincludecommunity"]!='')
	{
		$search_sel_community=$_SESSION[$session_name_initital . "searchincludecommunity"];
	}else{$search_sel_community='';}
        
		?>
        <select name="cmbcommunity" class="form-control searchincludecountry">
		<? fillcombo("select id,title from tbldatingmothertonguemaster where currentstatus =0 and languageid=$sitelanguageid order by title",$search_sel_community,$advancesearchcountrycombotitle) ?></select>
        </div>
        </div>
<?
	
 }
 ?>

<?

if($enable_nri_search == 'Y') { ?>
<div class="form-group  ">
<label class="col-lg-4"><?=$searchNRI?>:</label>
<div class="col-lg-8"> 
<?
	if(isset($_SESSION[$session_name_initital . "searchincludenri"]) && $_SESSION[$session_name_initital . "searchincludenri"]!='')
	{
		$search_sel_nri=$_SESSION[$session_name_initital . "searchincludenri"];
	}else{$search_sel_nri='';}

?>
<select name="nri" id="nri" class="form-control">
<option value="0.0">select</option>
<option value="113" <?php if (isset($search_sel_nri) =='113'){ ?> selected="selected" <?php } ?>>India</option>
<option value="nri" <?php if (isset($search_sel_nri) =='nri'){ ?> selected="selected" <?php } ?>><?=$searchNRI?></option>
</select>
</div>
</div>
<?php } else {
 ?>
 <div class="form-group seach-country">
<label class="col-lg-4"><?= $searchCountry ?> : </label>	
<div class="col-lg-8 grids_srchfs_fiver" >
<?
	if(isset($_SESSION[$session_name_initital . "searchincludecountry"]) && $_SESSION[$session_name_initital . "searchincludecountry"]!='')
	{
		$search_sel_country=$_SESSION[$session_name_initital . "searchincludecountry"];
	}else{$search_sel_country='';}

?>
<select name='Country' class="form-control searchincludecountry grids_srchfs">	
<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus=0  and languageid=$sitelanguageid  order by title ",$search_sel_country,"$searchincludecountrycombotitle"); ?>
</select>
</div>
</div>
  
<?php /*?><div><input type="image" src="<?=$sitepath?>uploadfiles/search_btn.png" name="submit"  style="margin-top:-19px; margin-left:99px; float:right;"/></div><?php */?>
</nice>
<div class="button_eftdr">

<? } if(isset($_SESSION[$session_name_initital . "searchincludewith_photo"]) && $_SESSION[$session_name_initital . "searchincludewith_photo"]=='checked') {
	$wphchk = 'checked="checked"';	
} else {
	$wphchk = "";
}	
?>
 <div class="form-group   extand_largeer">
 
    
	<input type="checkbox" name="with_photo" class="flefterput" value="with" <?=$wphchk?>/>  
    <span><?= $default_searchgrid_design_withphoto?></span>
    
      <a href='advancesearch.php'><?= $searchincludeadvsearch ?></a>

   </div>

 
    <i class="text-center"><input type="submit" name='Search' value='<?= $searchsubmit ?>'></i>
    
<!--was cut [class="btn"] -->
  
  
    </div>
</div>
</form>
</div>

