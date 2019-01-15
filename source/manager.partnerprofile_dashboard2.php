<!-- ********* TITLE START HERE *********-->

 
 
 		<div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $partnerprofile_dashboard ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div> 
 


		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
		<form method='post' name='frmmodify'><input type='hidden' name='hidid'></form>

<div class="errorbox"><span><?php checkerror(); ?></span></div>
<div class="table-responsive grlink">
<table border=0 width="100%" align="center" cellpadding="0" cellspacing="0"  class="grborder">
<thead>
<tr>
<th class="grhead"><?= $partnerprofile_image ?></th>
<th class="grhead"><?= $partnerprofile_details ?></th>
<? if(enable_communication=='Y'){ ?>
<th class="grhead"><?= $partnerprofile_action ?></th>
<? } ?>
</tr>
</thead>
<tbody>
<?
			$FileNm = $sitepath . "partnerprofile_dashboard2.php?";
			if (isset($_GET["pgnm"]))
				$Pgnm = $_GET["pgnm"];
			else
				$Pgnm = 1;
			$userid = "";
$name = "";
$age = "";
$countryid = "";
$state = "";
$area = "";
$imagenm = "";
$profileheadline = "";
$city = "";
$zodiacsign = "";
$nickname= "";
$imagenm = "";
$userlink = "";
$display_all_link = "N";
//$partner_query = "";
$patner_query = "";
$_SESSION[$session_name_initital . "memberuserid"];
if(isset($_SESSION[$session_name_initital . "memberuserid"]) && $_SESSION[$session_name_initital . "memberuserid"]!=''){
	$get_genderid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$_SESSION[$session_name_initital . "memberuserid"]);
} else {
	$get_genderid = "";
}
if($get_genderid=='1'){
	$gender_where = " AND genderid!=1";
}else if($get_genderid=='2'){
	$gender_where = " AND genderid!=2";
} else {
	$gender_where = "";	
}

$partnerprofile_result = getdata("SELECT states,agefrom,ageto,heightfrom,heightto,maritalstatus,religianid,castid,subcast,education,work_in,occupation,annincome,work_in_country,workin_state,location,states,dietids,grahid from tbldatingpartnerprofilemaster WHERE userid=".$curruserid);
$partner_rs = mysqli_fetch_array($partnerprofile_result);
	$partner_state = $partner_rs[0];
	//$partner_religiousness = $partner_rs[1];
	$partner_agefrom = $partner_rs[1];
	$partner_ageto = $partner_rs[2];
	$partner_heightfrom = $partner_rs[3];
	$partner_heightto = $partner_rs[4];
	$partner_marital = $partner_rs[5];
	$partner_religianid = $partner_rs[6];
	$partner_castid = $partner_rs[7];
	$partner_subcast = $partner_rs[8];
	$partner_education = $partner_rs[9];
	$partner_workin = $partner_rs[10];
	$partner_occupation = $partner_rs[11];
	$partner_annincome = $partner_rs[12];
	$partner_work_country = $partner_rs[13];
	$partner_workin_state = $partner_rs[14];
	$partner_location = $partner_rs[15];
	$partner_states = $partner_rs[16];
	$partner_dietid = $partner_rs[17];
	$partner_grah = $partner_rs[18];
	$whque = '';
if($partner_state!='' && $partner_state!='0.0' && is_numeric($partner_state)){
	$whque .= " AND city=".$partner_state."  ";
}
//if($partner_religiousness!='' && $partner_religiousness!='0.0' && is_numeric($partner_religiousness)){
//	$whque .= " AND religion_interest=".$partner_religiousness."  ";	
//}
if($partner_religianid!='' && $partner_religianid!='0.0'){
	$partner_religian_arr = explode(",",$partner_religianid);
	$whque .= " AND ( ";	
	for($i=0; $i<count($partner_religian_arr); $i++){
		$whque .= "religianid=".$partner_religian_arr[$i]." OR ";
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_castid!=''){
	$partner_cast_arr = explode(",",$partner_castid);	
	$whque .= " AND ( ";	
	for($i=0; $i<count($partner_cast_arr); $i++){
		$whque .= " castid=".$partner_cast_arr[$i]." OR ";	
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($enable_fully_partnermatch=='Y'){
if($partner_heightfrom!=''){
	$whque .= " AND heightid>=".$partner_heightfrom." ";	
}
if($partner_heightto!=''){
	$whque .= " AND heightid<=".$partner_heightto." ";	
}	
if($partner_marital!=''){
	$partner_marital_arr = explode(",",$partner_marital);	
	$whque .= " AND (";		
	for($i=0; $i<count($partner_marital_arr); $i++){
		$whque .= " maritalstatusid=".$partner_marital_arr[$i]." OR ";
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_subcast!=''){
	$partner_subcast_arr = explode(",",$partner_subcast);	
	$whque .= " AND ( ";	
	for($i=0; $i<count($partner_subcast_arr); $i++){
		$whque .= " subcast=".$partner_subcast_arr[$i]." OR ";
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_education!=''){
	$partner_education_arr = explode(",",$partner_education);
	$whque .= " AND ( ";
	for($i=0; $i<count($partner_education_arr); $i++){
		$whque .= " educationid=".$partner_education_arr[$i]." OR ";	
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";	
}
if($partner_workin!=''){
	$partner_workin_arr = explode(",",$partner_workin);
	$whque .= " AND ( ";
	for($i=0; $i<count($partner_workin_arr); $i++){
		$whque .= " occupationstatusid = ".$partner_workin_arr[$i]." OR ";	
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_occupation!=''){
	$partner_occupation_arr = explode(",",$partner_occupation);
	$whque .= " AND ( ";
	for($i=0; $i<count($partner_occupation_arr); $i++){
		$whque .= "	ocupationid = ".$partner_occupation_arr[$i]." OR ";	
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_annincome!=''){
	$partner_annincome_arr = explode(",",$partner_annincome);
	$whque .= " AND ( ";
	for($i=0; $i<count($partner_annincome_arr); $i++){
		$whque .= " annualincome=".$partner_annincome_arr[$i]." OR ";	
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_work_country!=''){
	$partner_work_countryarr = explode(",",$partner_work_country);
	$whque .= " AND ( ";	
	for($i=0; $i<count($partner_work_countryarr); $i++){
		//$whque .= " work_in_country=".$partner_work_countryarr[$i]." OR ";	
		$whque .= " service_location=".$partner_work_countryarr[$i]." OR ";
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_workin_state!=''){
	$partner_workin_statearr = explode(",",$partner_workin_state);
	$whque .= " AND ( ";
	for($i=0; $i<count($partner_workin_statearr); $i++){
		//$whque .= " workin_state=".$partner_workin_statearr[$i]." OR ";	
		$whque .= " service_state=".$partner_workin_statearr[$i]." OR ";	
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_location!=''){
	$partner_location_arr = explode(",",$partner_location);
	$whque .= " AND ( ";
	for($i=0; $i<count($partner_location_arr); $i++){
		$whque .= " countryid=".$partner_location_arr[$i]." OR ";	
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_states!=''){
	$partner_states_arr = explode(",",$partner_states);
	$whque .= " AND ( ";
	for($i=0; $i<count($partner_states_arr); $i++)	{
		$whque .= " state=".$partner_states_arr[$i]." OR ";	
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_dietid!=''){
	$partner_diet_arr = explode(",",$partner_dietid);
	$whque .= " AND ( ";
	for($i=0; $i<count($partner_diet_arr); $i++){
		$whque .= " dietid=".$partner_diet_arr[$i]." OR ";	
	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
if($partner_grah!=''){
	$partner_grah_arr = explode(",",$partner_grah);
	$whque .= " AND ( ";	
	for($i=0; $i<count($partner_grah_arr); $i++){
		$whque .= " grahid=".$partner_grah_arr[$i]." OR ";	

	}
	$whque = substr($whque,0,-4);
	$whque .= ")";
}
}
if($partner_agefrom!='' && $partner_agefrom!='0.0' && is_numeric($partner_agefrom)){
	$whque .= " AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= ".$partner_agefrom."  " ;
}
if($partner_ageto!='' && $partner_ageto!='0.0' && is_numeric($partner_ageto)){	
	$whque .= " AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <=" . $partner_ageto . "  " ;
}
$fromqry ="from tbldatingusermaster where $patner_query ". datinguserwhereque().$whque.$gender_where;
$totalnorecord = getonefielddata("select count(userid) $fromqry ");
		$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,$express_intrest_receivedmngrltnext,$express_intrest_receivedmngrltback);
		$NoOfRecord = $arrval["NoOfRecord"];
		$BackStr = $arrval["BackStr"];
		$NextStr = $arrval["NextStr"];
		
		$result = getdata("select userid, name," . findage() . ",countryid,state,area,imagenm,substr(profileheadline,1,200),city,zodiacsign,nickname,heightid,maritalstatusid,educationid,ocupationid,castid,religianid $fromqry $NoOfRecord");
		while($rs= mysqli_fetch_array($result))
		{
		 $userid = $rs[0] ;
		$name = $rs[1] ;
		$age = $rs[2];
		$countryid = "";
		if ($rs[3] !="")
		 $countryid = findcountryid($rs[3]);
		if($rs[4]!="" && $rs[4]!="0.0" && is_numeric($rs[4])) {
			$state = getonefielddata("SELECT title from tbldating_state_master WHERE id=".$rs[4]);	
		} else {
			$state = "";
		}	
		$area = $rs[5];
		//$imagenm = $rs[6];
		$profileheadline = $rs[7];
		if($rs[8]!="" && $rs['8']!="0.0" && is_numeric($rs[8])){
			$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[8]);
		} else {
			$city = "";	
		}
		$zodiacsign = $rs[9];
		if ($zodiacsign != "")
			$zodiacsign ="<img src ='". $siteimagepath . "images/zodiac-$zodiacsign.png' alt='". $zodiacsign ."'>";
		$nickname = $rs[10];	
		$height = $rs['heightid'];
		 if($height != '' && is_numeric($height)){
			$con = " / ";
			$height = getonefielddata("select title from tbldatingheightmaster where id=$height and currentstatus=0");
			$height = $con . $height;
		 }
		 $maritalstatus = $rs['maritalstatusid'];
		 if($maritalstatus!='' && is_numeric($maritalstatus)){
			$maritalstatus = getonefielddata("select title from tbldatingmaritalstatusmaster where id=$maritalstatus and currentstatus=0"); 
		 }
		 $educationid = $rs['educationid'];
		 if($educationid != '' && is_numeric($educationid)){
			$educationid = getonefielddata("select title from tbl_education_master where id=$educationid and currentstatus=0"); 
		 }
		 $occupationid = $rs['ocupationid'];
		 if($occupationid != '' && is_numeric($occupationid)){
			$occupationid = getonefielddata("select title from tbldatingoccupationmaster where id=$occupationid and currentstatus=0");		 	
		 }		 
		 if(isset($rs['castid']) && $rs['castid']!='' && is_numeric($rs['castid']) && $rs['castid']=='0.0'){
			$castid = getonefielddata("select title from tbldatingcastmaster WHERE currentstatus=0 AND id=".$rs['castid']);	 
		 }else {
			$castid = ''; 
		 } 		
		 if(isset($rs['religianid']) && $rs['religianid']!='' && is_numeric($rs['religianid']) && $rs['religianid']=='0.0'){
			$religianid = getonefielddata("select title from  tbldatingreligianmaster WHERE currentstatus=0 AND id=".$rs['religianid']);	 
		 }else {
			$religianid = ''; 
		 } 		
		 $imagenm = find_user_image($userid,"","","");
		 $userlink = displayprofilelink($userid);
		 $profile_code = find_profile_code($userid);
		 $display_all_link ="Y";
			?>
            	<tr>
                	<td class="fav_bg" colspan="3" height="35">
                    	 	    <?
                $arr_name = explode(" ",$name);
                
                if(count($arr_name)>=2)
                {
                    $name=substr($arr_name[0],0,1).substr($arr_name[1],0,1);
                }
                elseif(count($arr_name)==1)
                {
                    $name=substr($arr_name[0],0,1);
                }
                ?>
						<? if($name != ''){ ?>
							<span class="resultRoundName"><?= $name?></span><i>[<?= $profile_code ?>]</i>
                		<? } ?>
                    </td>
                </tr>
				<tr>
				<td  class="gritem"><div class="gridimage">                
				<?= setdisplayprofilelink($userid,$imagenm) ?></div></td>
				<td class="gritem">
                	<div class="gritem_l"> 				
<? if($age != '' && $height!= ''){?>
					<strong><?= $express_intrest_receivedhead02age ?> / <?= $express_intrest_receivedhead02height ?></strong> <?= $age ?> <?= $height ?> <?= $castid ?><br />
                <? } else if($age!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02age ?></strong> <?= $age ?> <?= $castid ?><br />
         		<? } else if($height!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02height ?></strong> <?= $height ?> <?= $castid ?><br />
				<? } ?><? if($maritalstatus != ''){?>
                	<strong><?= $express_intrest_receivedhead03 ?></strong> <?= $maritalstatus ?><br />
                <? } ?><? if($castid != ''){?>
                	<strong><?= $express_intrest_receivedhead04 ?></strong> <?= $castid ?><br />
                <? } ?><? if($religianid != ''){?>
                	<strong><?= $express_intrest_receivedhead05 ?></strong> <?= $religianid ?><br />
                <? } ?></div><div class="gritem_r"> 	<? if($city != ''){?>
					<strong><?= $express_intrest_receivedhead06 ?></strong> <?= $city ?><br />
                <? } ?><? if($countryid != ''){?>
                	<strong><?= $express_intrest_receivedhead07 ?></strong> <?= $countryid ?><br />
                <? } ?><? if($educationid != ''){?>
                	<strong><?= $express_intrest_receivedhead08 ?></strong> <?= $educationid ?><br />
                <? } ?><? if($occupationid != ''){?>
                	<strong><?= $express_intrest_receivedhead09 ?></strong> <?= $occupationid ?><br />
                <? } ?></div>	
				</td>
                <? if(enable_communication=='Y'){ ?>
                <td class="gritem">
                <img src="<?= $siteimagepath ?>images/displayprofileicon.png" border="0" alt="" />&nbsp;<?= setdisplayprofilelink($userid,$favoriteaction2) ?> <br />					
        
                        <a href="javascript:void(0);" onclick="notify_send(2,'<?= $userid ?>')" title="Send Message">
                <i class="fa fa-envelope-o" aria-hidden="true"></i> <?= $searchgridemaillink ?></a>
                    
    
                </td><? } ?>
				</tr>
			<?
			}
				freeingresult($result);
			?>
            </tbody>
			</table>	
</div>
<div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<!-- < ?= $objapp->NoofPages ?>-->
<div class="nexttext"><?= $NextStr ?></div>
</div>

		</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>