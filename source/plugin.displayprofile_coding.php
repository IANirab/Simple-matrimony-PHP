<?
include("commonfile.php");
$dispayuserid = getusernameid("b");
$currgender=0;
if(isset($_SESSION[$session_name_initital . "memberuserid"]) && $_SESSION[$session_name_initital . "memberuserid"]!='')
{
$currgender = getonefielddata("SELECT genderid from tbldatingusermaster WHERE
 userid='".$_SESSION[$session_name_initital . "memberuserid"]."' ");
}
$displaygender = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$dispayuserid);

if(isset($_SESSION[$session_name_initital . "memberuserid"]) && $_SESSION[$session_name_initital . "memberuserid"]!='' && $_SESSION[$session_name_initital . "memberuserid"]!=$dispayuserid){
if($currgender==$displaygender){
	header("location:". $sitepath ."message.php?b=78"); exit;
}
}
$profile_viewedonly = getonefielddata("SELECT profile_viewedonly from tbldatingusermaster WHERE userid=".$dispayuserid);
$profile_full_view = 'Y';
if($profile_viewedonly=='R' && !isset($_SESSION[$session_name_initital . "memberuserid"])){
	$profile_full_view = 'N';
}
$pkgprice = '';


if (!isset($_SESSION[$session_name_initital . "send_email_view_profile_user_id"]))
{
	//session_register($session_name_initital . "send_email_view_profile_user_id");
	$_SESSION[$session_name_initital . "send_email_view_profile_user_id"] = "0";
}
//$dispayuserid = getsimpleid("b");

//checkweatherblacklist($curruserid,$dispayuserid);
$commonque = datinguserwhereque() . " and userid =$dispayuserid ";
if (isset($_SESSION[$session_name_initital . "adminlogin"]))
	if ($_SESSION[$session_name_initital . "adminlogin"] != "")
	$commonque = " userid =$dispayuserid ";
$religion_interest='';
$userid = "";
$name = "";
$genderid = "";
$countryid = "";
$state = "";
$city = "";
$area = "";
$imagenm = "";
$age = "";
$headline ="";
$dob = "";
$userid = "";
$nextlink ="";
$working_partner='';
$backlink ="";
$hiv = "";
$thelisimia = "";
$illiness = "";
$education_detail='';
$edudetails='';
$userid = "";
$edit_link = "";
$zodiacsign = "";
$born_year ="";
$revertid = "";
$denomination_val='';
$revert = "";
$prayer = "";
$zakat = "";
$fasting = "";
$quran = "";
$ethnic = "";
$native = "";
$hobbies = "";
$music = "";
$interest = "";
$fav_read = "";
$fav_cuisines = "";
$dress_styles = "";
$fitness = "";
$occupation_detail = "";
$denominationid ='';
$silsila ='';
$familystatusid='';
$familytypeid=''; 
$nristatus='';


if (isset($_SESSION[$session_name_initital . "searchquery"]) && $_SESSION[$session_name_initital . "searchquery"] != "")
{
$searchque = $_SESSION[$session_name_initital . "searchquery"];
$nextid = getonefielddata("select min(userid) from tbldatingusermaster where $searchque ". datinguserwhereque() . " and  userid > $dispayuserid");
if ($nextid != "")
$nextlink ="<a href='" . displayprofilelink($nextid) ."'>$displayprofilenextlink</a>";
$backid = getonefielddata("select max(userid) from tbldatingusermaster where $searchque ". datinguserwhereque() . " and  userid < $dispayuserid");

if ($backid != "")
$backlink ="<a href='" . displayprofilelink($backid) ."'>$displayprofilebacklink</a>";

}

$area ="";

$districtid = '';
$panchayat = '';
$district_name ='';
$panchayat_name ='';
$parish ='';
$ignore_horo='';
$result = getdata("select name,genderid,countryid,state,city,area,imagenm,". findage() . ",
profileheadline,date_format(dob,'$date_format'),userid,date_format(lastlogin,'$date_format'),hiv,
thelisimia,illiness,zodiacsign,year(dob),blood_group,image_password_protect,revert_islam_id, prayer_id,
 zakat_id, fasting_id, quran_id, ethnic,native_place,hobbies,music,interest,fav_read,fav_cuisines,dress_styles,
 fitness,occupationstatusid,service_state,service_city,birthrashi,prefer_star,
 date_format(modifydate,'$date_format')  as mdate,father_name,mother_name,mainimagenm,spiritual_order,denominationid,Born_reverted,jumma_preyer,tarawee_prayers,jumma_on_friday,districtid,panchayat,parish,religion_interest,familystatusid,familytypeid,education_detail,	edudetails,working_partner,nristatus,chr_denomination,ignore_horo FROM tbldatingusermaster where $commonque ");
$displayotherdetail = "";
while($rs= mysqli_fetch_array($result))
{
	$districtid = $rs['districtid'];
	if($districtid!='')
	{
$district_name = getonefielddata("select title from tbldating_district_master where id='".$districtid."' and  	currentstatus =0");
	}	
	$panchayat = $rs['panchayat'];
	if($panchayat!='')
	{
$panchayat_name = getonefielddata("select title from tbldating_panchayat_master where id='".$panchayat."' and  	currentstatus =0");
	}
	
	 $denominationid = $rs['chr_denomination'];
	if($denominationid!='')
	{
	 $denomination_val = getonefielddata("select title from tbl_muslim_denomination where id='".$denominationid."' and  	currentstatus =0");
	}
	$spiritual_order = $rs['spiritual_order'];
	$parish = $rs['parish'];
	if($spiritual_order!='')
	{
	$silsila = getonefielddata("select title from tbldatingspiritualmaster where id=".$spiritual_order." and  	currentstatus =0");
	}
	$name = $rs[0];	
	$nm = $rs[0];
	$dispnm = $rs[0];
	$genid = $rs[1];
	$genderid = findgender($rs[1]);
	$countryid = findcountryid($rs[2]);
	if($rs[3]!='' && $rs[3]!='0.0'){
		if(is_numeric($rs[3])){
			$state = getonefielddata("SELECT title from tbldating_state_master WHERE id=".$rs[3]);	
		} else {
			$state = $rs[3];
		}
	}
	if($rs[4]!='' && $rs[4]!='0.0' && is_numeric($rs[4])){
		if(is_numeric($rs[4])){
			$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[4]);
		} else {
			$city = $rs[4];
		}
	}
	//$state = $rs[3];
	//$city = $rs[4];
	//$area = $rs[5];
	$imagenm = $rs[6];	
	//$imagenm = find_user_image($dispayuserid,"Y","","");	
	$age  =$rs[7];
	$headline = substr($rs[8],0,500);
	$headline = strip_tags($headline);
	$dob = $rs[9];
	$userid = $rs[10];
	$lastlogin = $rs[11];
	$hiv = $rs[12];
	$thelisimia = $rs[13];
	$illiness = $rs[14];
	$zodiacsign = $rs[15];
	$born_year = $rs[16];
	$imageonrequest = $rs[18];
	$revertid = $rs[19];
	$modifydate = $rs['mdate'];
	$birthrashi = $rs['birthrashi'];
	$birthstar = $rs['prefer_star'];
	$father_name= $rs['father_name'];
	$mother_name= $rs['mother_name'];
	$religion_interest=$rs['religion_interest'];
	$familystatusid=$rs['familystatusid'];
	$familytypeid=$rs['familytypeid'];
	$education_detail=$rs['familytypeid'];
	$edudetails=$rs['edudetails'];
	$working_partner=$rs['working_partner'];
	$nristatus=$rs['nristatus'];
	$ignore_horo=$rs['ignore_horo'];
	
	if($birthstar!='' && $birthstar!='0.0' && is_numeric($birthstar)){
		$birthstar = getonefielddata("SELECT title from tbl_preferedstar_master WHERE currentstatus=0 AND prefered_id=".$birthstar);	
	} else {
		$birthstar = '';	
	}
	
	if($rs['native_place']!="" && $rs['native_place']!="0.0" ) {
		//$native = str_replace("0.0","",$rs['native_place']);
		//$native = str_replace("-","",$native);
		$native = $rs['native_place'];
	}
	if($rs['hobbies']!=""){
	    $hobbies=$rs['hobbies'];
		//$hobbies = findihtitle($rs['hobbies'],"tbl_hobbies_master");
	}
	if($rs['music']!=""){
		$music=$rs['music'];
		//$music = findihtitle($rs['music'],"tbl_music_master");
	}
	if($rs['interest']!=""){
		$interest=$rs['interest'];
		//$interest = findihtitle($rs['interest'],"tbl_interest_master");
	}
	if($rs['fav_read']!=""){
		$fav_read=$rs['fav_read'];
		//$fav_read = findihtitle($rs['fav_read'],"tbl_favourite_read_master");
	}
	if($rs['fav_cuisines']!=""){
		$fav_cuisines=$rs['fav_cuisines'];
		//$fav_cuisines = findihtitle($rs['fav_cuisines'],"tbl_favourite_cuisines_master"); 
	}
	if($rs['dress_styles']!=""){
		$dress_styles=$rs['dress_styles'];
		//$dress_styles = findihtitle($rs['dress_styles'],"tbl_favourite_dress_master"); 
	}
	if($rs['fitness']!=""){
		$fitness=$rs['fitness'];
		//$fitness = findihtitle($rs['fitness'],"tbl_fitness_master"); 
	}
	
	if($revertid!=""){
		if($revertid=='b'){
			$revert = "Born";
		} else {
			$revert = "Reverted";
		}
	}
	if($rs[20]!=""){
		$prayer = getonefielddata("SELECT title from tbldatingprayermaster WHERE id=".$rs[20]);	
	}
	if($rs[21]!=""){
		$zakat = getonefielddata("SELECT title from tbldatingzakatmaster WHERE id=".$rs[21]);
	}
	if($rs[22]!=""){
		$fasting = getonefielddata("SELECT title from tbldatingfastingmaster WHERE id=".$rs[22]);
	}
	if($rs[23]!=""){
		$quran = getonefielddata("SELECT title from tbldatingquranmaster WHERE id=".$rs[23]);
	}
	if($rs[24]!=""){
		$ethnic = getonefielddata("SELECT title from tbldatingethnicmaster WHERE id=".$rs[24]);
	}
	if($rs[33]!=""){
		$occ_status = getonefielddata("select title from tbldating_education_pg_master WHERE id=".$rs[33]);	
	} else {
		$occ_status = "";	
	}
	if($rs[34]!="" && $rs[34]!='0.0' && is_numeric($rs[34])){
		$service_state = getonefielddata("SELECT title from tbldating_state_master WHERE id=".$rs[34]);	
	} else {
		$service_state = "";	
	}
	if($rs[35]!="" && $rs[35]!='0.0' && is_numeric($rs[35])){
		$service_city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[35]);	
	} else {
		$service_city = "";	
	}
	$Born_reverted = $rs['Born_reverted'];
	$jumma_preyer = $rs['jumma_preyer'];
	$tarawee_prayers = $rs['tarawee_prayers'];
	$jumma_on_friday = $rs['jumma_on_friday'];
	/*if($rs['personal_value']!="" && $rs['personal_value']!="0.0"){		
		$personal_level = getonefielddata("SELECT title from tbldatingpersonalmaster WHERE id=".$rs['personal_value']);
	} else {*/
		$personal_level = "";	
	//}	
	$blood_group=findtitleofprofilefld($rs[17],"tbldating_blood_group_master");
	 if ($zodiacsign != "")
	 	$zodiacsign ="<img align=absmiddle src ='". $siteimagepath . "images/zodiac-$zodiacsign.gif' alt='". $zodiacsign ."'> $zodiacsign ";
			
	$profile_code = find_profile_code($dispayuserid);
	
	if ($hiv == "Y")
		$hiv = $updatepersonalprofilehiv_yes;
	else
		$hiv = $updatepersonalprofilehiv_no;
	if ($thelisimia == "Y")
		$thelisimia = $updatepersonalprofilethelisimia_yes;
	else
		$thelisimia = $updatepersonalprofilethelisimia_no;

	if ($curruserid == 0)	
	execute("update tbldatingusermaster set total_view_anonymous= ifnull(total_view_anonymous,0) +1 where userid =$dispayuserid");
	if($curruserid==0){
		execute("insert into tbldatingprofilehistorymaster (touserid,CreateDate,CreateIP,currentstatus) values ($dispayuserid,now(),'".getip()."',1) ");	
		
	}
	if ($curruserid != 0)
	if ($curruserid != $dispayuserid)
	{
	execute("update tbldatingusermaster set totalview= totalview +1 where userid =$dispayuserid");
	execute("update tbldatingusermaster set total_view_registered_user= ifnull(total_view_registered_user,0) +1 where userid =$dispayuserid");
	
	execute("insert into tbldatingprofilehistorymaster (fromuserid,touserid,CreateDate,CreateIP) values ($curruserid,$dispayuserid,now(),'" . getip() ."') ");
		//send_view_email($curruserid,$dispayuserid);
	
	
    
		
	}
	else
	$edit_link = "<a href='" . $sitepath . "updateprofilepersonal.php'><img src=". $siteimagepath . "images/editprofile.gif border=0 alt='$displayprofile_edit_link' align=absmiddle></a>";
	$mainimagenm = $rs['mainimagenm'];
	if($mainimagenm==''){
		$mainimagenm = 'big_noimage.png';	
	}
}
	freeingresult($result);


if ($userid == "")
{
	header("location :message.php?b=50");
	exit();
}

$profilecreatebyid = "";
$lookingforid = "";
$maritalstatusid= "";
$kidsid = "";
$heightid = "";
$weightid= "";
$eyecolorid = "";
$bodytypeid = "";
$complexionid= "";
$specialcasesid= "";
$phone = "";
$address = "";
$email = "";
$remarks = "";
$contact_person_on_phone = "";
$artstatus="";
$hivsince="";
$cd4count="";
$wantchildren="";

$result = getdata("select profilecreatebyid,lookingforid,maritalstatusid,kidsid,heightid,weightid, eyecolorid,bodytypeid,complexionid,specialcasesid,mobile,landline,callingtime,country_code,city_code,address,email,remarks,contact_person_on_phone,no_children,art_status,hiv_since,cd4_count,want_children FROM tbldatingusermaster where $commonque ");
while($rs= mysqli_fetch_array($result))
{ 
   
	$profilecreatebyid = findtitleofprofilefld($rs[0],"tbldatingprofilecreatedbymaster");
	$lookingforid = findtitleofprofilefld($rs[1],"tbldatinglookingformaster");
	$maritalstatusid= findtitleofprofilefld($rs[2],"tbldatingmaritalstatusmaster");
	$kidsid = findtitleofprofilefld($rs[3],"tbldatingkidsmaster");
	$heightid = findtitleofprofilefld($rs[4],"tbldatingheightmaster");
	$weightid= findtitleofprofilefld($rs[5],"tbldatingweightmaster");
	$eyecolorid = findtitleofprofilefld($rs[6],"tbldatingeyemaster");
	$bodytypeid = findtitleofprofilefld($rs[7],"tbldatingbodymaster");
	$complexionid= findtitleofprofilefld($rs[8],"tbldatingcomplexionmaster");
	$specialcasesid= findtitleofprofilefld($rs[9],"tbldatingspecialcasemaster");
	$specialcasesid1 = $rs[9];
	$country_code = $rs['country_code'];
	$city_code = $rs['city_code'];
	$mobile = $rs['mobile'];
	$phno = $rs['landline'];
	$no_children = $rs['no_children'];
	
	$callingtime = $rs['callingtime'];
	if($country_code!="" && $mobile!="")	{
		$mobile = $country_code."-".$mobile;	
	}
	$landline = $rs['landline'];
	$phone = "";	
	if($country_code!=""){
		$phone .= $country_code."-";	
	}
	if($city_code!=""){
		$phone .= $city_code."-";
	}
	if($phno!=''){
		$phone .= $phno;
	} else {
		$phone .= $landline;
	}
	$address = $rs['address'];
	$email = $rs['email'];
	if($rs['remarks']!="") {
		$remarks = $rs['remarks'];
	}
	if($rs['contact_person_on_phone']!=""){
		$contact_person_on_phone = $rs['contact_person_on_phone'];
	}
	
 	$artstatus= $rs['art_status'];
	$hivsince= $rs['hiv_since'];
	$cd4count=$rs['cd4_count'];
	$wantchildren= $rs['want_children'];
}
	freeingresult($result);

$religianid = "";
$castid = "";
$subcast= "";
$motherthoungid = "";
$familyvalueid = "";
$gotra= "";
$grahid="";
$sunsignid="";
$maternal_name = "";
$maternal_location = "";
$islamic_education="";
$ChristianDiocese='';
$catholic='';
if (findsettingvalue("Religion_field_display") == "M")
$exfield = ",religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id,islamic_education";
else
$exfield = "";

$result = getdata("select religianid,castid,subcast,motherthoungid,familyvalueid,educationid,gotra,grahid,birthtime, birthplace,moonsignid,date_format(dob,'%d-%m-%Y'),sunsignid,maternal_name,maternal_location,mool $exfield,muslimsubcast,chr_diocese,catholic  FROM tbldatingusermaster where $commonque ");
while($rs= mysqli_fetch_array($result))
{
	$religianid = findtitleofprofilefld($rs[0],"tbldatingreligianmaster");
	$castid = findtitleofprofilefld($rs[1],"tbldatingcastmaster");
	if($rs[2]!="" && $rs[2]!="0.0" && is_numeric($rs[2])){
		$subcast= findtitleofprofilefld($rs[2],"tbldatingsubcastmaster");	
	} else if($rs[2]=="0.0"){
		$subcast = "";	
	} else {
		$subcast = $rs[2];
	}
	if($rs['muslimsubcast']!='')
	{
		$muslimsubcast=findtitleofprofilefld($rs['muslimsubcast'],"tbldatingmuslimcastmaster");
	}
	else
	{
		$muslimsubcast="";
	}
	
	//$subcast= $rs[2];
	$motherthoungid = findtitleofprofilefld($rs[3],"tbldatingmothertonguemaster");
	$familyvalueid = findtitleofprofilefld($rs[4],"tbldatingfamilyvaluemaster");
	$gotra= $rs[6];
	$grahid= findtitleofprofilefld($rs[7],"tbldatinggrahmaster");
	$birthtime= $rs[8];
	$birthplace= $rs[9];
	$moonsign= findtitleofprofilefld($rs[10],"tbldatingmoonsignmaster");
	$dob= $rs[11];
	$sunsignid= findtitleofprofilefld($rs[12],"tbldatingsunsignmaster");
	$maternal_name = $rs["maternal_name"];
	$maternal_location = $rs["maternal_location"];
	if(isset($rs["mool"]) && $rs["mool"]!=''){
		$mool = getonefielddata("SELECT title from tbldatingmool_master WHERE currentstatus=0 AND id=".$rs['mool']);	
	} else {
		$mool = '';	
	}
	
	if (findsettingvalue("Religion_field_display") == "M")
	{ 
	
	$religiosness_id= findtitleofprofilefld($rs['religiosness_id'],"tbldating_religiousness_master");
	
	if(isset($rs['hijab_id']) && $rs['hijab_id']!='' && $rs['hijab_id']!='0.0' && is_numeric($rs['hijab_id'])){
		$hijab_id= findtitleofprofilefld($rs['hijab_id'],"tbldating_hijab_wear_master");
	} else {
		$hijab_id = '';
	}
	if(isset($rs['beard_id']) && $rs['beard_id']!='' && $rs['beard_id']!='0.0' && is_numeric($rs['beard_id'])){
		$beard_id= findtitleofprofilefld($rs['beard_id'],"tbldating_beard_master");
	} else {
		$beard_id = '';	
	}
	if(isset($rs['revert_islam_id']) && $rs['revert_islam_id']!='' && $rs['revert_islam_id']!='0.0' && is_numeric($rs['revert_islam_id'])){
		$revert_islam_id= findtitleofprofilefld($rs['revert_islam_id'],"tbldating_revert_islam_master");
	} else {
		$revert_islam_id = '';
	}
	
	if($rs['halal_strict_id']!="" && is_numeric($rs['halal_strict_id'])){ 
		$halal_strict_id= findtitleofprofilefld($rs['halal_strict_id'],"tbldating_halal_strict_master");
	} else {
		$halal_strict_id = "";
	}	
	$salah_perform_id= findtitleofprofilefld($rs['salah_perform_id'],"tbldating_salah_perform_master");
	$islamic_education=findtitleofprofilefld($rs['islamic_education'],"tbl_islamiceducation_master");
	
	}
	 
	
     $ChristianDiocese=findtitleofprofilefld($rs['chr_diocese'],"tbl_christian_diocese"); 
	 $catholic=$rs['catholic'];
	 if($catholic=='Y' && $catholic!=''){
	  	   $catholicyn="Catholic";
	 }else{
           $catholicyn="Non Catholic";
	 }
}
	freeingresult($result);

$educationid= "";
$ocupationid = "";
$annualincome= "";
$education_detail ="";
$occupation_detail ="";
$service_location="";
$service_area="";
$cat_education = "";
$annual_income_currancyid='';



$result = getdata("select educationid,ocupationid,annualincome,education_detail,occupation_detail,edu_pg_id,edu_pg_other,industry_id,industry_other,work_function_id,work_function_other,instituteid,institute_other,service_location,service_area,annual_income_currancyid,annual_income_id  FROM tbldatingusermaster where $commonque ");
while($rs= mysqli_fetch_array($result))
{
	$educationid= findtitleofprofilefld($rs[0],"tbl_education_master");
	if($rs[0]!=""){	
	$cat_education = getonefielddata("SELECT tbl_education_category_master.title from tbl_education_category_master,tbl_education_master WHERE tbl_education_master.cat_id=tbl_education_category_master.id AND tbl_education_master.id=".$rs[0]);
	}
	$ocupationid = findtitleofprofilefld($rs[1],"tbldatingoccupationmaster");
	if($rs[1]!=""){
		$cat_occupation='';
//		$cat_occupation = getonefielddata("SELECT tbl_occupation_category_master.title from tbl_occupation_category_master,tbldatingoccupationmaster WHEREtbldatingoccupationmaster.cat_id=tbl_occupation_category_master.id ANDtbldatingoccupationmaster.id=".$rs[1]);	
	}
	//$ocupationid = $rs[1];
	$annualincome= $rs[2];
	$education_detail = $rs[3];
	$occupation_detail = $rs[4];
	$edu_pg_id=findtitleofprofilefld($rs[5],"tbldating_education_pg_master");
	$edu_pg_other = $rs[6];
	$industry_id=findtitleofprofilefld($rs[7],"tbl_dating_industry_master");
	$industry_other = $rs[8];
	$work_function_id=findtitleofprofilefld($rs[9],"tbl_dating_work_function_area_master");
	$work_function_other = $rs[10];
	$instituteid=findtitleofprofilefld($rs[11],"tbl_dating_institute_master");
	$institute_other = $rs[12];
	$service_location = '';
	if($rs[13]!=''){
		if(is_numeric($rs[13])){
			$service_location= getonefielddata("SELECT title from tbldatingcountrymaster WHERE id=".$rs[13]);	
		} else {
			$service_location = $rs[13];
		}
	} else {
		$service_location = '';
	}		
	$service_area= $rs[14];
	
	$annual_income_currancyid=findtitleofprofilefld($rs[15],"tbldating_annual_income_currancy_master");
	 
	 $annual_income_currancyid_get = getonefielddata("select annincome_curr from tbldatingpartnerprofilemaster where userid =$dispayuserid");;
	   if($annual_income_currancyid_get!='0.0'){
$annual_income_currancyid_new=findtitleofprofilefld($annual_income_currancyid_get,"tbldating_annual_income_currancy_master");	
	   }
	 
	 $annual_income_id=findtitleofprofilefld($rs[16],"tbldating_annual_income_master");
}
	freeingresult($result);
$dietid= "";
$smokerstatusid = "";
$drinkerstatusid= "";
$familyvalues= "";
$familystatus= "";
$verificationdoctype= "";


$result = getdata("select dietid, smokerstatusid,drinkerstatusid,family_values,family_status,verified_doc_type  FROM tbldatingusermaster where $commonque ");
while($rs= mysqli_fetch_array($result))
{   

	$dietid= findtitleofprofilefld($rs[0],"tbldatingdietmaster");
	$smokerstatusid = findtitleofprofilefld($rs[1],"tbldatingsmokerstatusmaster");
	$drinkerstatusid = findtitleofprofilefld($rs[2],"tbldatingdrinkerstatusmaster");
    $familyvalues = findtitleofprofilefld($rs[3],"tbl_family_values");
	$familystatus = findtitleofprofilefld($rs[4],"tbl_family_status");
	$verificationdoctype = findtitleofprofilefld($rs[5],"tbl_verification_document");
}
	freeingresult($result);

$residancystatusid= "";
$countryofbirth = "";
$countryofgrewup= "";


$result = getdata("select residancystatusid,countryofbirth,countryofgrewup FROM tbldatingusermaster where $commonque ");
while($rs= mysqli_fetch_array($result))
{
	$residancystatusid= findtitleofprofilefld($rs[0],"tbldatingresidencystatusmaster");
	$countryofbirth = findcountryid($rs[1]);
	$countryofgrewup= findcountryid($rs[2]);
}
	freeingresult($result);
	
$personality= "";
$familybackground = "";
$hobbiesintrest= "";
$personalvalueid ="";
$wantchildrenid ="";
$father_occupation ="";
$mother_occupation ="";
$brother_married1 ="";
$brother_married2 ="";
$brother_unmarried1 ="";
$brother_unmarried2 ="";
$sister_married1 ="";
$sister_married2 ="";
$sister_unmarried1 ="";
$sister_unmarried2 ="";
$father_status_id = "";
$mother_status_id = "";
$occupation_statusid = "";

$father_name = "";
$mother_name = "";	
$father_company_address = "";
$mother_company_address = "";
	
$petranal_grand_father_name ='';
$petranal_grand_mother_name ='';
$metranal_grand_father_name  ='';
$metranal_grand_mother_name  ='';


$result = getdata("select personality,familybackground,hobbiesintrest, personalvalueid,wantchildrenid,father_occupation,mother_occupation,brother_married1, brother_married2,brother_unmarried1,brother_unmarried2,sister_married1,sister_married2, sister_unmarried1,sister_unmarried2,father_status_id,mother_status_id,occupationstatusid,father_name,mother_name,father_nameofc,mother_nameofc,adfpgrandfather,adfpgrandmother,adfmgrandfather,adfmgrandmother  FROM tbldatingusermaster where $commonque ");
while($rs= mysqli_fetch_array($result))
{
	$personality = strip_tags($rs[0]);
	$familybackground = strip_tags($rs[1]);
	$hobbiesintrest= $rs[2];
	$personalvalueid= findtitleofprofilefld($rs[3],"tbldatingpersonalvaluemaster");
	$wantchildrenid= findtitleofprofilefld($rs[4],"tbldatingwantchildrenmaster");
	$father_occupation = $rs[5];
	$mother_occupation = $rs[6];
	$brother_married1= $rs[7];
	$brother_married2 = $rs[8];
	$brother_unmarried1 = $rs[9];
	$brother_unmarried2= $rs[10];
	$sister_married1 = $rs[11];
	$sister_married2 = $rs[12];
	$sister_unmarried1= $rs[13];
	$sister_unmarried2 = $rs[14];
	$father_status_id = $rs[15];
	$mother_status_id = $rs[16];
	if($rs[17]!=""){
		$occupation_statusid = getonefielddata("select title from tbldating_education_pg_master WHERE id=".$rs[17]);
	}	
	$status_query = "select title from tbldatingfathermotherstatusmaster where id=";
	if ($father_status_id  != "")
		$father_status_id  = getonefielddata($status_query . $father_status_id);
	if ($mother_status_id  != "")
		$mother_status_id  = getonefielddata($status_query . $mother_status_id);
		
		
    $father_name = $rs['father_name'];
	$mother_name = $rs['mother_name'];	
	$father_company_address = $rs['father_nameofc'];	
	$mother_company_address = $rs['mother_nameofc'];	
	
	$petranal_grand_father_name = $rs['adfpgrandfather'];	
	$petranal_grand_mother_name = $rs['adfpgrandmother'];
	$metranal_grand_father_name = $rs['adfmgrandfather'];	
	$metranal_grand_mother_name = $rs['adfmgrandmother'];	
	
	
	
	
	
}
	freeingresult($result);
$language = "";
$result = getdata("select tbldatinglanguagemaster.title FROM tbldatinguserlanguagemaster,tbldatinglanguagemaster where tbldatinguserlanguagemaster.languageid=tbldatinglanguagemaster.id and tbldatinguserlanguagemaster.userid=$dispayuserid");
while($rs= mysqli_fetch_array($result))
{
	if ($language != "")
		$language .= ", ";
	$language .= $rs[0];
}


freeingresult($result);
$result = getdata("select socialbookmarkcode,feedurl,externalvideourl, externalbioprofile FROM tbldatingusermaster where $commonque ");
while($rs= mysqli_fetch_array($result))
{
	//$socialbookmarkcode = $rs[0];
	$feedurl = $rs[1];
	$externalvideourl= $rs[2];
	$externalbioprofile= $rs[3];
}
	freeingresult($result);
$socialbookmarkcode =  findsettingvalue("SocialBookMarkCode");

$partner_genderid =  "";
$partner_agefrom="";
$partner_ageto="";
$partner_location="";
$partner_religianid="";
$partner_castid="";
$partner_subcast="";
$partner_occupation="";
$partner_education="";
$partner_maritalstatus="";
$partner_heightfrom="";
$partner_heightto="";
$partner_dietids="";
$partner_smokeids="";
$partner_drinkids="";
$partner_states="";
$partner_kidsids="";
$partner_grahid="";
$partner_religianid_can_contact ="";
$partner_castid_can_contact ="";
$partner_occupation_status = "";
$partner_ethnic = "";
$partner_subcast = "";
$partner_dietids = "";
$partner_annincome = "";
$partner_states = "";
$partner_pg_education = "";
$partner_industry = "";
$partner_functional_area = "";

		
//partner profile
if ($userid != "")
{
$result = getdata("select genderid,agefrom,ageto,location,religianid,castid, subcast,occupation,education,maritalstatus,heightfrom,heightto,dietids,smokeids,drinkids,states,kidsids,grahid,selected_religion_can_contact,selected_cast_contact_me,pg_education,industry,functional_area,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id,religiosness_id,work_in,ethnic,subcast,dietids,annincome,states  FROM tbldatingpartnerprofilemaster where userid =$dispayuserid");
while($rs= mysqli_fetch_array($result))
{	
	$partner_genderid =  findgender($rs[0]);
	$partner_genderid_new=$rs[0];
	$partner_agefrom=$rs[1];
	$partner_ageto=$rs[2];
	$partner_location=findtitleofprofilefld_multiple($rs[3],"tbldatingcountrymaster");
	$partner_location = str_replace(",",", ",$partner_location);
	$partner_religianid = findtitleofprofilefld($rs[4],"tbldatingreligianmaster");
	$partner_castid = findtitleofprofilefld($rs[5],"tbldatingcastmaster");
	$partner_subcast=$rs[6];
	$partner_occupation= findtitleofprofilefld_multiple($rs[7],"tbldatingoccupationmaster");
	//$partner_education= findtitleofprofilefld_multiple($rs[8],"tbl_education_master");
	$partner_education= findtitleofprofilefld_multiple($rs[8],"tbl_education_master");
	$partner_maritalstatus=findtitleofprofilefld_multiple($rs[9],"tbldatingmaritalstatusmaster");
	$partner_heightfrom=findtitleofprofilefld_multiple($rs[10],"tbldatingheightmaster");
	$partner_heightto= findtitleofprofilefld_multiple($rs[11],"tbldatingheightmaster");
	$partner_dietids= findtitleofprofilefld_multiple($rs[12],"tbldatingdietmaster");
	$partner_smokeids= findtitleofprofilefld_multiple($rs[13],"tbldatingsmokerstatusmaster");
	$partner_drinkids= findtitleofprofilefld_multiple($rs[14],"tbldatingdrinkerstatusmaster");
	$partner_states=$rs[15];	
	$find_states = preg_replace("[^0-9]", "",$partner_states);	
	if($find_states!=""){		
		$fnd_states = getdata("SELECT title from tbldating_state_master WHERE id IN ($partner_states)");		
		$partner_states = "";		
		while($rees = mysqli_fetch_array($fnd_states)){
			$partner_states .= $rees['title'].",";
		}		
		$partner_states = substr($partner_states,0,strlen($partner_states)-1);
	}	
	
	
	
	
	$partner_kidsids=findtitleofprofilefld_multiple($rs[16],"tbldatingkidsmaster");
	$partner_grahid =findtitleofprofilefld_multiple($rs[17],"tbldatinggrahmaster");
	$selected_religion_can_contact=$rs[18];
	
	$selected_cast_contact_me=$rs[19];
	
	$partner_pg_education=findtitleofprofilefld_multiple($rs[20],"tbldating_education_pg_master");
	$partner_industry=findtitleofprofilefld_multiple($rs[21],"tbl_dating_industry_master");
	$partner_functional_area=findtitleofprofilefld_multiple($rs[22],"tbl_dating_work_function_area_master");	
	
	$partner_hijab_id=findtitleofprofilefld($rs[23],"tbldating_hijab_wear_master");
	$partner_beard_id=findtitleofprofilefld($rs[24],"tbldating_beard_master");
	$partner_revert_islam_id=findtitleofprofilefld($rs[25],"tbldating_revert_islam_master");
	if($rs[26]!="" && is_numeric($rs[26])){
		$partner_halal_strict_id=findtitleofprofilefld($rs[26],"tbldating_halal_strict_master");
	} else {
		$partner_halal_strict_id="";
	}	
	$partner_salah_perform_id=findtitleofprofilefld($rs[27],"tbldating_salah_perform_master");
	$partner_religiosness_id=findtitleofprofilefld($rs[28],"tbldating_religiousness_master");
	$partner_occupation_status = findtitleofprofilefld($rs[29],"tbldating_education_pg_master");	
	
	$partner_ethnic = findtitleofprofilefld($rs[30],"tbldatingethnicmaster");
	if($rs[31]!='' && $rs[31]!='0.0'){
		$partner_subcast = '';
		$partner_scresult = getdata("SELECT title from tbldatingsubcastmaster WHERE currentstatus =0 AND id IN (".$rs[31].")");
		while($partner_rs = mysqli_fetch_array($partner_scresult)){
			$partner_subcast .= $partner_rs[0].", ";
		}
		$partner_subcast = substr($partner_subcast,0,-2);
	} else {
		$partner_subcast = '';
	}
	//$partner_subcast = findtitleofprofilefld($rs[31],"tbldatingsubcastmaster");
	/*if($rs[31]!="" && $rs[31]!="0.0" && is_numeric($rs[31])){
		$partner_subcast = findtitleofprofilefld($rs[31],"tbldatingsubcastmaster");	
	} else if($rs[31]=="0.0"){
		$partner_subcast = "";
	} else {
		$partner_subcast = $rs[31];
	}*/
	$partner_dietids = findtitleofprofilefld($rs[32],"tbldatingdietmaster");
	$partner_annincome = findtitleofprofilefld($rs[33],"tbldating_annual_income_master");
	//$partner_states = findtitleofprofilefld($rs[34],"tbldating_state_master");
	
		
	if ($selected_religion_can_contact == "Y")
		$partner_religianid_can_contact = $partner_religianid;
	if ($selected_cast_contact_me == "Y")
		$partner_castid_can_contact = $partner_castid;
	
}
	freeingresult($result);
}
//$pagetitle = $born_year ." $diaplayprofilepgtitle_mess3 " . $genderid . " " . $motherthoungid . $diaplayprofilepgtitle_mess1 . $city ." ". $countryid . $diaplayprofilepgtitle_mess2 . $lookingforid ." " . $partner_castid ." ". $partner_subcast;

$pagetitle = $name . " - " . $motherthoungid .", " . $city . " ".$religianid."  " . $castid . " ".$subcast."  " . $genderid . "" . $diaplayprofilepgtitle_mess2 . $lookingforid;
if($genid==1){
	$gend = 'Bride';	
} else {
	$gend = 'Groom';	
}
$name_arr = explode(" ",$name);
$nm = $name_arr[count($name_arr)-1];
//$pagetitle = $nm." from ".$countryid." is looking for ".$religianid." ".$gend;
if(isset($_SESSION[$session_name_initital . "memberuserid"]) && $_SESSION[$session_name_initital . "memberuserid"]!=''){
	$pagetitle = $nm." from ".$countryid." is looking for ".$religianid." matrimonial partner ";
} else {
	$pagetitle = $profile_code." from ".$countryid." is looking for ".$religianid." matrimonial partner ";
}


//$sitetitle = "<title>" . $pagetitle ."</title>";
$meta_key = "<meta name='keywords' content='" . $genderid  . "," . $motherthoungid  . "," . $countryid . "," . $religianid . "," . $castid . "," .	$subcast . "," . $educationid . "'>";
$meta_desc = "<meta name='description' content='$headline $pagetitle $motherthoungid $religianid $diaplayprofilepgtitle_mess4' />";

$acceptlink = "";
$declinedlink = "";

if ($curruserid != 0)
{

$id = getonefielddata("select id from tbldatingexpressintrestmaster where touserid=$curruserid and fromuserid=$dispayuserid and currentstatus=0 and accepted ='W'");
if ($id != "")
{
$acceptlink = "<a href='" . $sitepath . "express_intrest_received_action.php?b=$id&b1=A'>$displayprofile_intrest_accept</a>";
$declinedlink ="<a href='" .  $sitepath . "express_intrest_received_action.php?b=$id&b1=D'>$displayprofile_intrest_decline</a>";
}
}
function returncommondetailwithlink($data)
{
	global $sitepath;
	$resultdata = "";
	if ($data != "")
	{
		$tempdata = split(",",$data);
		foreach ($tempdata as $str)
		{
		   $strtemp = $str;
  		   $strtemp = str_replace(" ","_",$strtemp);
		   $strtemp = str_replace("'","*",$strtemp);
		   $strtemp = str_replace("\'","-",$strtemp);
		   $resultdata .= "&nbsp;<a href='" . $sitepath . "profilecommon/" .$strtemp ."'>$str</a>";
		}
	}
	return $resultdata;
}
function generatestylesheet($dispayuserid)
{
$result = getdata("select tabborderstyle,tabbordersize,tabbordercolor,tabbackcolor,fontname,fontsize,fontcolor, pgbackcolor,pgbackimage FROM tbldatingusermaster where userid =$dispayuserid");
while($rs= mysqli_fetch_array($result))
{
	$tabborderstyle = $rs[0];
	$tabbordersize = $rs[1];
	$tabbordercolor = $rs[2];
	$tabbackcolor = $rs[3];
	$fontname = $rs[4];
	$fontsize = $rs[5];
	$fontcolor = $rs[6];
	$pgbackcolor = $rs[7];
	$pgbackimage = $rs[8];
}
	freeingresult($result);
return "<style>body {background-color:#$pgbackcolor; background-image:url('uploadfiles/". $pgbackimage . "') } .displayprofileblock1 { border:$tabborderstyle ". $tabbordersize. "px #$tabbordercolor;background-color:#$tabbackcolor} .displayprofileblock2 { border:$tabborderstyle ". $tabbordersize. "px #$tabbordercolor;background-color:#$tabbackcolor} .displayprofileblock3 { border:$tabborderstyle ". $tabbordersize. "px #$tabbordercolor;background-color:#$tabbackcolor} .displayprofileblock4 { border:$tabborderstyle ". $tabbordersize. "px #$tabbordercolor;background-color:#$tabbackcolor} .displayprofileblock5 { border:$tabborderstyle ". $tabbordersize. "px #$tabbordercolor;background-color:#$tabbackcolor} .displayprofileblock6 { border:$tabborderstyle ". $tabbordersize. "px #$tabbordercolor;background-color:#$tabbackcolor} .displayprofileblocks fieldset label { font-family:$fontname; font-size:". $fontsize. "px ; color:#$fontcolor} .displayprofileblocks p { font-family:$fontname; font-size:". $fontsize. "px ; color:#$fontcolor} /*.displayprofileblocks fieldset label { font-family:$fontname; font-size:". $fontsize. "px ;color:#$fontcolor}*/.displayprofileageetc {font-family:$fontname; font-size:". $fontsize. "px ; color:#$fontcolor}</style>";
}




function getusernameid($idnm)
{
	$id = find_querystr_array_id($idnm);
	
	
	if ($id == "")
		$id =0;
	if (!is_numeric($id))
		$id =0;
	return $id;
	//return find_querystr_array_id($idnm);
}
function findtitleofprofilefld_multiple($fldval,$tablenm)
{
	$res = "";
	if ($fldval != "")
	{
	$result = getdata("select title from $tablenm where id in(" . $fldval .")");
	
	while($rs= mysqli_fetch_array($result))
	{
	if ($res != "")
		$res = $res .",";
	$res .= $rs[0];
	}
		freeingresult($result);
	}
	return $res;
}


function send_view_email($fromuserid,$touserid)
{
global $session_name_initital;
	if (($touserid != 0) && ($fromuserid !=0))
	if ($_SESSION[$session_name_initital . "send_email_view_profile_user_id"] != $touserid)
	{
	
	$subject = "";
	$message = "";
	$sendername = "";
	$senderimage = "";
	$senderlink = "";
	$receivername = "";
	
	$result = getdata("select name,email from tbldatingusermaster where userid =$touserid");
	while($rs= mysqli_fetch_array($result))
	{
	    $recname = $rs[0] ;
		$recemail = $rs[1];
	}
		freeingresult($result);
	global $sitepath;
	
	$result = getdata("select name,imagenm,email,thumbnil_image,name,genderid,".findage().",countryid,religianid,castid,	educationid,ocupationid from tbldatingusermaster where userid =$fromuserid");
	/*while($rs= mysqli_fetch_array($result))
	{*/
	$rs= mysqli_fetch_array($result);
	    $userid = $fromuserid ;
	    $sendername = $rs[0] ;
	    $mainimage = $rs[1];
		$email = $rs[2];
		$senderimage = $rs[3];
		$name = $rs[4];
		$gender = findgender($rs[5]);
		$age = $rs[6];
		if($rs[7]!=''){
			if(is_numeric($rs[7])){
				$country = getonefielddata("SELECT title from tbldatingcountrymaster WHERE id=".$rs[7]);
			} else {
				$country = $rs[7];
			}	
		} else {
			$country = '';
		}
		if($rs[8]!=''){
			$religion = getonefielddata("SELECT title from tbldatingreligianmaster WHERE id=".$rs[8]);
		} else {
			$religion = '';
		}
		if($rs[9]!=''){
			$cast = getonefielddata("SELECT title from tbldatingcastmaster WHERE id=".$rs[9]);
		} else {
			$cast = '';
		}
		if($rs[10]!=''){
			$education = getonefielddata("SELECT title from tbl_education_master WHERE id=".$rs[10]);
		} else {
			$education = '';
		}
		if($rs[11]!=''){
			$occupation = getonefielddata("SELECT title from tbldatingoccupationmaster WHERE id=".$rs[11]);
		} else {
			$occupation = '';
		}
		$profile_details = '';
		$profile_details .= "Name: ".$name.",".$age."yrs from ".$country."<br>";
		if($religion!=''){
			$profile_details .= "Religion:".$religion."<br>";
		}
		if($cast!=''){
			$profile_details .= "Cast:".$castid."<br>";
		}
		if($education!=''){
			$profile_details .= "Education:".$education."<br>";
		}
		if($occupation!=''){
			$profile_details .= "Occupation:".$occupation;
		}		
		
	    if ($senderimage == "")
			$senderimage = "noimageprofile.gif";
		 $senderimage = "<img src='". $sitepath . "uploadfiles/" . $senderimage . "'>";
		$senderlink = displayprofilelink($fromuserid);
	//}
		freeingresult($result);
	$receivername =getonefielddata("select name from tbldatingusermaster where userid =$touserid");
	
	
	$result = getdata("select subject,message from tbldatingemailmaster where emailid =14");
	while($rs= mysqli_fetch_array($result))
	{ 
		$subject = $rs[0];
		
		$message = $rs[1];
	}
		freeingresult($result);
	$subject = str_replace("[sendername]",$sendername,$subject);
	$subject = str_replace("[senderimage]",$senderimage,$subject);
	$subject = str_replace("[senderlink]",$senderlink,$subject);
	$subject = str_replace("[receivername]",$receivername,$subject);

	//$message = str_replace("[sendername]",$sendername,$message);
	$message = str_replace("[senderimage]",$senderimage,$message);
	$message = str_replace("[senderlink]",$senderlink,$message);
	$message = str_replace("[receivername]",$receivername,$message);
	$message = str_replace("[profile_details]",$profile_details,$message);
	
	
	$_SESSION[$session_name_initital . "send_email_view_profile_user_id"] = $touserid;
	if ($message != "")
		sendemaildirect($recemail,$subject,$message);
	}
}



//Get PATERNAL FAMILY DETAILS (Uncale)

/*$prtranal_uncale_name='';
$prtranal_uncale_education='';
$prtranal_uncale_married_to='';
$prtranal_uncale_occupation='';
$prtranal_uncale_ds_of='';

  
  
 $get_petranaldata_uncale = getdata("select name,education,occupation,married_to,`d/s_of` from tbldating_advancefamily where currentstatus=0 and userid=$dispayuserid and ftype='p' and type='1' ");
while($rs_pateranal_uncale= mysqli_fetch_array($get_petranaldata_uncale))
{
	$prtranal_uncale_name = $rs_pateranal_uncale['name'];

	
}
	freeingresult($get_petranaldata_uncale);*/
  













?>