<? include("commonfile.php"); 
if(isset($_POST['cat']) && $_POST['cat']=='state'){	 
	$state = "";
	$stateqry = getdata("select id,title from tbldating_state_master where currentstatus=0 and country_id=".$_POST['countryid']);	
	$stnmrows = mysqli_num_rows($stateqry);
	//if($stnmrows>0){
?>
	<div class="form-group">
	<label class="col-lg-4 control-label"><?=$updatecontactprofilestate ?> :</label> 
        <div class="col-lg-8 samer_length">
        <? if($stnmrows>0){?>
        <select name="cmbstateid" id="cmbstateid" class="form-control"  onchange="get_city(this.value)">
        <?=fillcombo("select id,title from tbldating_state_master where currentstatus=0 and country_id=".$_POST['countryid']." and languageid=$sitelanguageid order by title",$state,$updatepersonalprofiledprofileselect_sel); ?>
        </select>
        <? } ?>
        <? if($stnmrows<=0){?>
         <input type="text" name="otherstate" id="otherstates" value="" class="form-control form_1 form_other"  />
         <? } ?>
        </div>
	</div>

		<? if($stnmrows<=0){?>
    <div class="form-group">
	<label class="col-lg-4 control-label"><?=$updatecontactprofilecity ?> </label> 
        <div class="col-lg-8 samer_length">
        <input type="text" name="city_other" id="city_other" value="" class="form-control form_1 form_other"  />
        </div>
	</div>
    <? } ?>


<?	
	//}
}
?>





	
<?
if(isset($_POST['cat']) && $_POST['cat']=='city'){
	$city_id = "";
	$city_qry = getdata("select id,title from  tbldating_city_master where currentstatus=0 AND state_id=".$_POST['stateid']." and languageid=$sitelanguageid order by title");
	$citynmrows = mysqli_num_rows($city_qry);
	//if($citynmrows>0){
?>
<div class="form-group">
<label class="col-lg-4 control-label"><?=$updatecontactprofilecity ?></label>
<div class="col-lg-8 samer_length">
 	<select name="cmbcityid" id="cmbcityid" class="form-control" >
	<? fillcombo("select id,title from tbldating_city_master where currentstatus=0 AND state_id=".$_POST['stateid']." and languageid=$sitelanguageid order by title",$city_id,$updatepersonalprofiledprofileselect_sel); ?>
</select>

    <input type="text" name="city_other" id="city_other" value="" class="form-control form_1 form_other"  /></div>
    <div class="col-lg-8 samer_length"></div>
    </div>
<?	

	//}
} 
?>


<?
if((isset($_POST['cat'])) && $_POST['cat']=='agt'){
	$emp_id = $_POST['agentid'];	
	$code = getonefielddata("SELECT agent_code from tbl_agent_master WHERE emp_id=".$emp_id);
	if($code!=""){
		$ant_code = $code;
	} else {
		$ant_code = "No Code";
	}
	echo $ant_code;
}
if(isset($_POST['nat']) && $_POST['nat']=="nat"){
	if(isset($_POST['nat_cat']) && $_POST['nat_cat']=="state"){
	$country = $_POST['country'];
	$country_id = getonefielddata("select id from tbldatingcountrymaster where currentstatus=0 and languageid=$sitelanguageid AND title='".$country."'");?>
	<div class="form-group">
<label class="col-lg-4 control-label"><?= $state_auto_generate_statenative ?> :</label>
<div class="col-lg-8">
	<select name="nativecmbstateid" id="nativecmbstateid" class="form-control"  onchange="get_nativecity(this.value)">
		<? fillcombo("select title,title from tbldating_state_master where currentstatus=0 and country_id=".$country_id." and languageid=$sitelanguageid order by title",$natcountry,$updatepersonalprofiledprofileselect_sel); ?>
</select><span onclick="enableother('otherstate1')" class="otherstatebox" style="cursor:pointer;"><?= $state_auto_generate_other ?></span><input type="text" name="otherstate" id="otherstate1" value="" style="display:none; width:79px;" /></div></div>
	<?
	}
	?>
    
 
    <?
	if(isset($_POST['nat_cat']) && $_POST['nat_cat']=="city"){
		$state = $_POST['state'];
		$state_id = getonefielddata("SELECT id from tbldating_state_master WHERE currentstatus=0 AND languageid=$sitelanguageid AND title='".$state."'"); ?>
	   <div class="form-group">	
<label class="col-lg-4 control-label"><?= $state_auto_generate_citynative ?> :</label>
<div class="col-lg-8">
		<select name="nativecmbcityid" id="nativecmbcityid" class="form-control">
			<? fillcombo("SELECT title,title from tbldating_city_master WHERE currentstatus=0 AND state_id=".$state_id." AND languageid=$sitelanguageid order by title",$natstate,$updatepersonalprofiledprofileselect_sel); ?>
		</select><span onclick="enableother('othercity1')" class="otherstatebox" style="cursor:pointer;"><?= $state_auto_generate_other ?></span><input type="text" name="othercity" id="othercity1" value="" style="display:none; width:79px;" /></div></div>
<?		
	}	
}
?>




<?
if(isset($_POST['bill_state']) && $_POST['bill_state']=='state'){	 
	$state = "";
	$stateqry = getdata("select id,title from tbldating_state_master where currentstatus=0 and country_id=".$_POST['countryid']);	
	$stnmrows = mysqli_num_rows($stateqry);
	
?>
	<div class="form-group">
<label class="col-lg-12 control-label"><?=$updatecontactprofilestate ?> :</label> 
<div class="col-lg-12">
	<select name="cmbstateid" id="cmbstateid" class="form-control"  onchange="get_city(this.value)">
		<?=fillcombo("select id,title from tbldating_state_master where currentstatus=0 and country_id=".$_POST['countryid']." and languageid=$sitelanguageid order by title",$state,$updatepersonalprofiledprofileselect_sel); ?>
</select>
<?	} ?>


<?
if(isset($_POST['bill_city']) && $_POST['bill_city']=='city'){
	$city_id = "";
	$city_qry = getdata("select id,title from  tbldating_city_master where currentstatus=0 AND state_id=".$_POST['stateid']." and languageid=$sitelanguageid order by title");
	$citynmrows = mysqli_num_rows($city_qry);
	//if($citynmrows>0){
?>
<div class="form-group">
<label class="col-lg-12 control-label"><?=$updatecontactprofilecity ?></label>
<div class="col-lg-12">
 	<select name="cmbcityid" id="cmbcityid" class="form-control" >
	<? fillcombo("select id,title from tbldating_city_master where currentstatus=0 AND state_id=".$_POST['stateid']." and languageid=$sitelanguageid order by title",$city_id,$updatepersonalprofiledprofileselect_sel); ?>
</select>
	
<?	} ?>

					<!-----------------------munciple code start------------------------->

				<? if(isset($_POST['munciple_cat']) && $_POST['munciple_cat']!='')
				  {
					  $munciple_cat=$_POST['munciple_cat'];
				  }else{$munciple_cat='';}
				  
				  if(isset($_POST['mun_id']) && $_POST['mun_id']!='')
				  {
					  $mun_id=$_POST['mun_id'];
				  }else{$mun_id='';}
				?>
                
                <?
                if($munciple_cat=='mun_s')
				{ ?>
					<div class="form-group">
						<label class="col-lg-4 control-label"><?=$updatecontactprofilestate ?> :</label> 
						<div class="col-lg-8 samer_length">
						<select name="cmbstateid" id="cmbstateid" class="form-control" 
                         onchange="get_munciple_value('mun_d',this.value)">
		<?=fillcombo("select id,title from tbldating_state_master where currentstatus=0 and country_id='".$mun_id."' and languageid=$sitelanguageid order by title",'',$updatepersonalprofiledprofileselect_sel); ?>
						</select>
						</div>
                   </div>
				<? 
				}
				?>
                
                
                
                
                <?
                if($munciple_cat=='mun_d')
				{ ?>
					<div class="form-group">
						<label class="col-lg-4 control-label"><?=$mun_district ?> :</label> 
						<div class="col-lg-8 samer_length">
						<select name="cmbdistrictid" id="cmbdistrictid" class="form-control" 
                         onchange="get_munciple_value('mun_c',this.value)">
		<?=fillcombo("select id,title from  tbldating_district_master where currentstatus=0 and state_id='".$mun_id."' and languageid=$sitelanguageid order by title",'',$select_district); ?>
						</select>
						</div>
                   </div>
				<? 
				}
				?>
                
                <?
                if($munciple_cat=='mun_c')
				{ ?>
					<div class="form-group">
						<label class="col-lg-4 control-label"><?=$mun_city ?> :</label> 
						<div class="col-lg-8 samer_length">
						<select name="cmbcityid" id="cmbcityid" class="form-control" 
                         onchange="get_munciple_value('mun_p',this.value)">
		<?=fillcombo("select id,title from  tbldating_city_master where currentstatus=0 and district_id='".$mun_id."' and languageid=$sitelanguageid order by title",'',$updatepersonalprofiledprofileselect_sel); ?>
						</select>
						</div>
                   </div>
				<? 
				}
				?>
                
                  <?
                if($munciple_cat=='mun_p')
				{ ?>
					<div class="form-group">
						<label class="col-lg-4 control-label"><?=$mun_panchayat ?> :</label> 
						<div class="col-lg-8 samer_length">
						<select name="cmbpanchayatid" id="cmbpanchayatid" class="form-control" >
		<?=fillcombo("select id,title from   tbldating_panchayat_master where currentstatus=0 and city_id='".$mun_id."' and languageid=$sitelanguageid order by title",'',$select_panchayat); ?>
						</select>
						</div>
                   </div>
				<? 
				}
				?>
              

					<!-----------------------munciple end start------------------------->


