<script type="text/javascript">

function slidingtoggle(divid){
	//alert(divid)
	var arr = new Array("profstatus","expint_sent","implinks","src1_keyword");
	
	document.getElementById('divid').value = divid;	

	for(var i=0; i<arr.length; i++){
		if(divid!=arr[i]){			
			<!--$('#'+arr[i]).slideUp();-->
			$('#'+arr[i]).slideUp();
		} else if(document.getElementById('divid').value==divid){
			//alert('asdf');
			$('#'+divid).slideToggle();
		}else {
			document.getElementById('divid').value = divid;
			$('#'+divid).slideDown();			
		}
	}
	//$('#'+divid).slideToggle();	
}
</script>

<h4><?= $dashboardlinkhead ?>  <!--<img src="<?= $siteimagepath ?>images/plus.png" alt="" class="rightsider">--> </h4>
<?
$gender_where = '';

$totalnewmessage = getonefielddata("SELECT count(pmbid) from tbldatingpmbmaster WHERE currentstatus not in (1,2,4) AND touserid=".$curruserid);

$intrest_received = getonefielddata("select count(id) from tbldatingexpressintrestmaster where currentstatus =0 and touserid=$curruserid");

$intrest_sent = getonefielddata("select count(id) from tbldatingexpressintrestmaster where currentstatus =0 and createby=$curruserid");

$image_on_request_sent = getonefielddata(" select count(requestid) from tbldatingimagerequestmaster where currentstatus=0 and fromuserid=$curruserid");

$image_on_request_received = getonefielddata("SELECT count(requestid) from tbldatingimagerequestmaster WHERE currentstatus=0 AND touserid=$curruserid");


$intrest_received = getonefielddata("SELECT count(tbldatingexpressintrestmaster.id) from tbldatingexpressintrestmaster,tbldatingusermaster WHERE tbldatingusermaster.userid=tbldatingexpressintrestmaster.fromuserid and tbldatingusermaster.currentstatus=0 and touserid=$curruserid and tbldatingexpressintrestmaster.currentstatus=0");
$intrest_sent = getonefielddata("SELECT count(tbldatingexpressintrestmaster.id) from tbldatingexpressintrestmaster,tbldatingusermaster WHERE tbldatingusermaster.userid=tbldatingexpressintrestmaster.touserid AND tbldatingusermaster.currentstatus=0 and fromuserid=$curruserid and tbldatingexpressintrestmaster.currentstatus=0");
$image_on_request_sent = getonefielddata("SELECT count(requestid) from tbldatingimagerequestmaster,tbldatingusermaster WHERE tbldatingimagerequestmaster.fromuserid=$curruserid and tbldatingimagerequestmaster.touserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus=0 and tbldatingimagerequestmaster.currentstatus=0");
$image_on_request_received = getonefielddata("SELECT count(requestid) from tbldatingimagerequestmaster,tbldatingusermaster WHERE tbldatingimagerequestmaster.touserid=$curruserid and tbldatingimagerequestmaster.fromuserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus=0 and tbldatingimagerequestmaster.currentstatus=0");


$total_favorite_member =total_shortlist_member($curruserid);
$total_preffered_partner = total_partner_profile_match($curruserid);

$total_blocked_ignore = getonefielddata("select count(black_list_id) from tbl_user_blacklist_master where currentstatus=0 and from_user_id=$curruserid");

$total_contact_can_view = user_can_see_contact_detail($curruserid,"Y");
$arr_messanger_users = messager_statstics($curruserid);
$total_messager_contact=$arr_messanger_users["total_messager_contact"];
$total_messager_contact_online=$arr_messanger_users["total_messager_contact_online"];
$partner_query = "";
$mtch_alert = "0";
$fromque ="from tbldatingusermaster where $partner_query ". datinguserwhereque();
$match_alert = getdata("select userid, name," . findage() . ",countryid,state,area,imagenm,substr(profileheadline,1,200),city,zodiacsign,nickname $fromque order by userid desc");
$mtch_alert = mysqli_num_rows($match_alert);
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
$tot = getdata("select userid, name," . findage() . ",countryid,state,area,imagenm,substr(profileheadline,1,200),city,zodiacsign,nickname $fromque order by userid desc limit 0,9");
$total_preffered_partner = mysqli_num_rows($tot);
$partnerprofile_result = getdata("SELECT states,agefrom,ageto,heightfrom,heightto,maritalstatus,religianid,castid,subcast,education,work_in,occupation,annincome,work_in_country,workin_state,location,states,dietids from tbldatingpartnerprofilemaster WHERE userid=".$curruserid);
$partner_rs = mysqli_fetch_array($partnerprofile_result);
	$partner_state = $partner_rs[0];	
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
	$whque = '';
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
/*if($partner_state!='' && $partner_state!='0.0' && is_numeric($partner_state)){
	$whque .= " AND city=".$partner_state."  ";
}*/
if($partner_agefrom!='' && $partner_agefrom!='0.0' && is_numeric($partner_agefrom)){
	$whque .= " AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= ".$partner_agefrom."  " ;
}
if($partner_ageto!='' && $partner_ageto!='0.0' && is_numeric($partner_ageto)){	
	$whque .= " AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <=" . $partner_ageto . "  " ;
}
$fromqry ="from tbldatingusermaster where ". datinguserwhereque().$whque.$gender_where;
$dbtotal_preffered_partner = getonefielddata("select count(userid) $fromqry ");
$msg_1 = getonefielddata("SELECT count(id) AS CNT FROM `tblphonerequestmaster` WHERE touserid=".$curruserid);
$msg_2 = getonefielddata("SELECT count(id) AS CNT FROM `tblphonerequestmaster` WHERE fromuserid=".$curruserid);
$genderid = getonefielddata("select genderid from tbldatingusermaster where userid =$curruserid");
if($genderid==1){
	$gendid = 2;	
} else {
	$gendid = 1;
}$genid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$curruserid);
$msg_3_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where  tbldatingprofilehistorymaster.touserid=$curruserid and  tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus=0 and tbldatingprofilehistorymaster.fromuserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=".$genid."  group by touserid order by historyid DESC");
$msg_3 = mysqli_num_rows($msg_3_result);

$msg_1 = getonefielddata("SELECT count(tblphonerequestmaster.id) from tblphonerequestmaster,tbldatingusermaster WHERE tblphonerequestmaster.touserid=$curruserid AND tblphonerequestmaster.fromuserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus=0 AND tblphonerequestmaster.currentstatus=0");

$msg_2 = getonefielddata("SELECT count(tblphonerequestmaster.id) from tblphonerequestmaster,tbldatingusermaster WHERE tblphonerequestmaster.fromuserid=$curruserid AND tblphonerequestmaster.touserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus=0 AND tblphonerequestmaster.currentstatus=0");

$msg_4_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where tbldatingprofilehistorymaster.fromuserid=$curruserid and tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus=0 and tbldatingprofilehistorymaster.touserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=$genid group by touserid order by historyid");
$msg_4 = mysqli_num_rows($msg_4_result);
?>
<span id="implinks">
<div>
	<label><?= $dashborad_stats1_new_messages ?>:</label>
	<a href='pmbmanager.php?goto=Inbox'><?= $totalnewmessage  ?></a>&nbsp;</div>
<div><label><?= $dashborad_stats1_new_intrest_received ?> :</label>
	<a href='express_intrest_received.php'><?= $intrest_received  ?></a>&nbsp;</div>
<div><label><?= $dashborad_stats1_new_intrest_sent ?> :</label>
	<a href='express_intrest_sent.php'><?= $intrest_sent  ?></a>&nbsp;</div>
<div><label><?= $dashborad_stats1_new_image_request_received ?> :</label>
	<a href='image_on_request_received.php'><?= $image_on_request_received  ?></a>&nbsp;</div>
<div><label><?= $dashborad_stats1_new_image_request_sent ?> :</label>
	<a href='image_on_request_sent.php'><?= $image_on_request_sent  ?></a>&nbsp;</div>
<div><label><?= $dashborad_stats1_favorite_member ?> :</label>
	<a href='favoritemanager.php'><?= $total_favorite_member  ?></a>&nbsp;</div>
<div><label><?= $dashborad_stats1_preferred_partner ?> :</label>
	<a href='partnerprofile_dashboard2.php'><?=$dbtotal_preffered_partner  ?><? //$mtch_alert?></a>&nbsp;</div>
<div><label><?= $dashborad_stats1_profile_blocked_ignore ?> :</label>
	<a href='profile_block.php'><?= $total_blocked_ignore  ?></a>&nbsp;</div>
<div><label><?=$dashboard_contactslefttoview ?> :</label>
</div>    
<div><label><?= $dashborad_stats1_profile_online_messager ?> :</label> <a href='#' onclick="MM_openBrWindow('messanger.php','messenger','status=yes,scrollbars=yes,width=300,height=300')"> <?= $total_messager_contact_online  ?></a>&nbsp;</div>
<div><label><?= $dashborad_stats2_membersviewedmycontacts ?></label> <a href='viewedmycontact.php'><?=$msg_1 ?></a></div>
		<div><label><?= $dashborad_stats2_memberscontactsviewedbyme ?></label> <a href='viewedothercontacts.php'><?=$msg_2 ?></a></div>
		<div><label><?= $dashborad_stats2_membersviewedmyprofile?></label> <a href='viewedmyprofile.php'><?=$msg_3 ?></a></div>
		<div><label><?= $dashborad_stats2_membersviewebyme ?></label> <a href='viewedotherprofiles.php'><?=$msg_4 ?></a></div>
</span>
