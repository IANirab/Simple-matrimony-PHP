<?php
require_once("commonfileadmin.php");
$display_contact_info='';
$userid='';

if(isset($_GET['b'])){
	
	 $userid=$_GET['b'];
	
}

if(isset($_GET['c'])){
	
	 $display_contact_info=$_GET['c'];
	
}

//Fetch Persona Information////////////////////////////////////////////////////////////////////////////////////////

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
$illiness='';
$blood_group='';
$malfemale='';
$mstatusid='';
$illenessid='';
  
$dietid='';
$smokerstatusid='';
$drinkerstatusid='';
$personalvalueid='';
$language='';
$music='';

$music='';
$interest='';
$fav_read='';
$fav_cuisines='';
$dress_styles='';
$fitness='';

$prayer='';
$zakat='';
$quran='';
$fasting='';

//echo $userid;

 
$result = getdata("select profilecreatebyid,lookingforid,maritalstatusid,kidsid,heightid,weightid, eyecolorid,bodytypeid,complexionid,specialcasesid,mobile,landline,callingtime,country_code,city_code,address,email,remarks,contact_person_on_phone,no_children,art_status,hiv_since,cd4_count,want_children FROM tbldatingusermaster where userid=$userid and currentstatus=0");
$rs= mysqli_fetch_array($result);

 
    $malfemale=$rs[1];
	$mstatusid=$rs[2];
	$illenessid=$rs[9];
	
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


//Fetch Familey Information//////////////////////////////////////////////////////////////////////////////////////

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
$father_name='';
$mother_name='';
$mother_company_address='';
$mother_company_address='';
$hobbies='';
$native ='';
$petranal_grand_father_name ='';
$petranal_grand_mother_name ='';
$metranal_grand_father_name  ='';
$metranal_grand_mother_name  ='';
$company_name='';
$working_partner='';
$familystatusid='';
$familystatus='';
$familytypeid='';
$familytype='';
$edudetails='';
$familystatus_m='';
$chr_denomination='';



	    $prtranal_uncale_name='';
		$prtranal_uncale_married_to='';
		$prtranal_uncale_occupation='';
		
		$prtranal_aunty_name='';
	    $prtranal_aunty_married_to='';
	    $prtranal_aunty_occupation='';
		
		$maternal_uncale_name='';
		$maternal_uncale_married_to='';
		$maternal_uncale_occupation='';
		
		$maternal_aunty_name='';
		$maternall_aunty_married_to='';
		$maternal_aunty_occupation='';
		
			$islamic_education="";
			$ChristianDiocese='';
			$catholic='';


$result_family = getdata("select personality,familybackground,hobbiesintrest, personalvalueid,wantchildrenid,father_occupation,mother_occupation,brother_married1, brother_married2,brother_unmarried1,brother_unmarried2,sister_married1,sister_married2, sister_unmarried1,sister_unmarried2,father_status_id,mother_status_id,occupationstatusid,father_name,
mother_name,father_nameofc,mother_nameofc,adfpgrandfather,adfpgrandmother,adfmgrandfather,
adfmgrandmother,company_name,working_partner,familystatusid,familytypeid,edudetails,chr_denomination,chr_diocese,catholic   FROM tbldatingusermaster where userid=$userid and currentstatus=0 ");
    $rs_family= mysqli_fetch_array($result_family);
    $personality = strip_tags($rs_family[0]);
	$familybackground = strip_tags($rs_family[1]);
	$hobbiesintrest= $rs_family[2];
	$personalvalueid= findtitleofprofilefld($rs_family[3],"tbldatingpersonalvaluemaster");
	$wantchildrenid= findtitleofprofilefld($rs_family[4],"tbldatingwantchildrenmaster");
	$father_occupation = $rs_family[5];
	$mother_occupation = $rs_family[6];
	$brother_married1= $rs_family[7];
	$brother_married2 = $rs_family[8];
	$brother_unmarried1 = $rs_family[9];
	$brother_unmarried2= $rs_family[10];
	$sister_married1 = $rs_family[11];
	$sister_married2 = $rs_family[12];
	$sister_unmarried1= $rs_family[13];
	$sister_unmarried2 = $rs_family[14];
	$father_status_id = $rs_family[15];
	$mother_status_id = $rs_family[16];
	if($rs_family[17]!=""){
		$occupation_statusid = getonefielddata("select title from tbldating_education_pg_master WHERE id=".$rs_family[17]);
	}	
	$status_query = "select title from tbldatingfathermotherstatusmaster where id=";
	if ($father_status_id  != "")
		$father_status_id  = getonefielddata($status_query . $father_status_id);
	if ($mother_status_id  != "")
		$mother_status_id  = getonefielddata($status_query . $mother_status_id);
	
	$father_name = $rs_family[18];
	$mother_name = $rs_family[19];	
	$father_company_address = $rs_family[20];	
	$mother_company_address = $rs_family[21];
	
	$petranal_grand_father_name = $rs_family['adfpgrandfather'];	
	$petranal_grand_mother_name = $rs_family['adfpgrandmother'];
	$metranal_grand_father_name = $rs_family['adfmgrandfather'];	
	$metranal_grand_mother_name = $rs_family['adfmgrandmother'];
	
	$company_name=$rs_family['company_name'];
	$working_partner=$rs_family['working_partner'];
	
   $familystatusid =$rs_family['familystatusid'];
	if($familystatusid!= ''){
	 $familystatus_m = getonefielddata("select title from tbldatingfamilyvaluemaster WHERE id=".$familystatusid);
	}
	$familytypeid = $rs_family['familytypeid'];
	if($familytypeid!= ''){
	$familytype = getonefielddata("select title from tbldatingfamilyvaluemaster WHERE id=".$familytypeid);
	}
	
	$edudetails = $rs_family['edudetails'];
	$chr_denomination = $rs_family['chr_denomination'];

	
     $ChristianDiocese=findtitleofprofilefld($rs_family['chr_diocese'],"tbl_christian_diocese"); 
	 $catholic=$rs_family['catholic'];
	 if($catholic=='Y' && $catholic!=''){
	  	   $catholicyn="Catholic";
	 }else{
           $catholicyn="Non Catholic";
	 }
	
	
//social details fetch //////////////////////////////////////////////////////////////////////////////////////////



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
if (findsettingvalue("Religion_field_display") == "M")
$exfield = ",religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id,islamic_education";
else
$exfield = "";



$result_social = getdata("select religianid,castid,subcast,motherthoungid,familyvalueid,educationid,gotra,grahid,birthtime, birthplace,moonsignid,date_format(dob,'%d-%m-%Y'),sunsignid,maternal_name,maternal_location,mool $exfield,muslimsubcast  FROM tbldatingusermaster where userid=$userid and currentstatus=0");
$rs_social= mysqli_fetch_array($result_social);

	$religianid = findtitleofprofilefld($rs_social[0],"tbldatingreligianmaster");
	$castid = findtitleofprofilefld($rs_social[1],"tbldatingcastmaster");
	if($rs[2]!="" && $rs[2]!="0.0" && is_numeric($rs_social[2])){
		$subcast= findtitleofprofilefld($rs_social[2],"tbldatingsubcastmaster");	
	} else if($rs_social[2]=="0.0"){
		$subcast = "";	
	} else {
		$subcast = $rs_social[2];
	}
	if($rs_social['muslimsubcast']!='')
	{
		$muslimsubcast=findtitleofprofilefld($rs_social['muslimsubcast'],"tbldatingmuslimcastmaster");
	}
	else
	{
		$muslimsubcast="";
	}
	
	//$subcast= $rs[2];
	$motherthoungid = findtitleofprofilefld($rs_social[3],"tbldatingmothertonguemaster");
	$familyvalueid = findtitleofprofilefld($rs_social[4],"tbldatingfamilyvaluemaster");
	$gotra= $rs_social[6];
	$grahid= findtitleofprofilefld($rs_social[7],"tbldatinggrahmaster");
	$birthtime= $rs_social[8];
	$birthplace= $rs_social[9];
	$moonsign= findtitleofprofilefld($rs_social[10],"tbldatingmoonsignmaster");
	$dob= $rs_social[11];
	$sunsignid= findtitleofprofilefld($rs_social[12],"tbldatingsunsignmaster");
	$maternal_name = $rs_social["maternal_name"];
	$maternal_location = $rs_social["maternal_location"];
	if(isset($rs_social["mool"]) && $rs_social["mool"]!=''){
		$mool = getonefielddata("SELECT title from tbldatingmool_master WHERE currentstatus=0 AND id=".$rs_social['mool']);	
	} else {
		$mool = '';	
	}
	
	if (findsettingvalue("Religion_field_display") == "M")
	{	
	$religiosness_id= findtitleofprofilefld($rs_social['religiosness_id'],"tbldating_religiousness_master");
	if(isset($rs_social['hijab_id']) && $rs_social['hijab_id']!='' && $rs_social['hijab_id']!='0.0' && is_numeric($rs_social['hijab_id'])){
		$hijab_id= findtitleofprofilefld($rs_social['hijab_id'],"tbldating_hijab_wear_master");
	} else {
		$hijab_id = '';
	}
	if(isset($rs_social['beard_id']) && $rs_social['beard_id']!='' && $rs_social['beard_id']!='0.0' && is_numeric($rs_social['beard_id'])){
		$beard_id= findtitleofprofilefld($rs_social['beard_id'],"tbldating_beard_master");
	} else {
		$beard_id = '';	
	}
	if(isset($rs_social['revert_islam_id']) && $rs_social['revert_islam_id']!='' && $rs_social['revert_islam_id']!='0.0' && is_numeric($rs_social['revert_islam_id'])){
		$revert_islam_id= findtitleofprofilefld($rs_social['revert_islam_id'],"tbldating_revert_islam_master");
	} else {
		$revert_islam_id = '';
	}
	
	if($rs_social['halal_strict_id']!="" && is_numeric($rs_social['halal_strict_id'])){
		$halal_strict_id= findtitleofprofilefld($rs_social['halal_strict_id'],"tbldating_halal_strict_master");
	} else {
		$halal_strict_id = "";
	}	
	$salah_perform_id= findtitleofprofilefld($rs_social['salah_perform_id'],"tbldating_salah_perform_master");
	$islamic_education=findtitleofprofilefld($rs_social['islamic_education'],"tbl_islamiceducation_master");
	}
	 


// other imfo like hobby ///////////////////////////////////////////////////////////////////////////////////////////////
	
$dispayuserid=$userid; 
$districtid = '';
$panchayat = '';
$district_name ='';
$panchayat_name ='';
$parish ='';
$state='';
$city='';
$silsila='';
$denomination='';
$religion_interest='';
$ignore_horo='';
$area='';
$postcode='';
$calling_timezone='';
$altemail='';
$relation='';

$result = getdata("select name,genderid,countryid,state,city,area,imagenm,". findage() . ",
profileheadline,date_format(dob,'$date_format'),userid,date_format(lastlogin,'$date_format'),hiv,
thelisimia,illiness,zodiacsign,year(dob),blood_group,image_password_protect,revert_islam_id, prayer_id,
 zakat_id, fasting_id, quran_id, ethnic,native_place,hobbies,music,interest,fav_read,fav_cuisines,dress_styles,
 fitness,occupationstatusid,service_state,service_city,birthrashi,prefer_star,
 date_format(modifydate,'$date_format')  as mdate,father_name,mother_name,mainimagenm,spiritual_order,denominationid,Born_reverted,jumma_preyer,tarawee_prayers,jumma_on_friday,districtid,panchayat,parish,religion_interest,ignore_horo,postcode,calling_timezone,altemail,relation FROM tbldatingusermaster where userid=$userid and currentstatus=0");
$displayotherdetail = "";
  $rs= mysqli_fetch_array($result);
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
	
    $denominationid = $rs['denominationid'];
	if($denominationid!='')
	{
    $denomination = getonefielddata("select title from tbl_muslim_denomination where id='".$denominationid."' and  	currentstatus =0");
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
	$area = $rs[5];
	
	$imagenm = $rs[6];	
	$imagenm = find_user_image($dispayuserid,"Y","","");	
	$age  =$rs[7];
	$headline = substr($rs[8],0,500);
	$headline = strip_tags($headline);
	$dob = $rs[9];
	//$userid = $rs[10];
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
		$hobbies = $rs['hobbies'];
		//$hobbies = findihtitle($rs['hobbies'],"tbl_hobbies_master");
	}
	if($rs['music']!=""){
		$music = $rs['music'];
		//$music = findihtitle($rs['music'],"tbl_music_master");
	}
	if($rs['interest']!=""){
		$interest = $rs['interest'];
		//$interest = findihtitle($rs['interest'],"tbl_interest_master");
	}
	if($rs['fav_read']!=""){
		$fav_read = $rs['fav_read'];
		//$fav_read = findihtitle($rs['fav_read'],"tbl_favourite_read_master");
	}
	if($rs['fav_cuisines']!=""){
		$fav_cuisines = $rs['fav_cuisines'];
		//$fav_cuisines = findihtitle($rs['fav_cuisines'],"tbl_favourite_cuisines_master"); 
	}
	if($rs['dress_styles']!=""){
		$dress_styles = $rs['dress_styles'];
		//$dress_styles = findihtitle($rs['dress_styles'],"tbl_favourite_dress_master"); 
	}
	if($rs['fitness']!=""){
		$fitness = $rs['fitness'];
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
	$personal_level = "";	
	$blood_group=findtitleofprofilefld($rs[17],"tbldating_blood_group_master");
	$religion_interest= $rs['religion_interest'];
	$postcode= $rs['postcode'];
	$calling_timezone= $rs['calling_timezone'];
	$altemail= $rs['altemail'];
	$relation= $rs['relation'];

		

//  residental details  ////////////////////////////////////////////////
$residancystatusid= "";
$countryofbirth = "";
$countryofgrewup= "";
$nristatus= "";


$result = getdata("select residancystatusid,countryofbirth,countryofgrewup,nristatus FROM tbldatingusermaster where userid=$userid and currentstatus=0");
$rs= mysqli_fetch_array($result);

	$residancystatusid= findtitleofprofilefld($rs[0],"tbldatingresidencystatusmaster");
	$countryofbirth = findcountryid($rs[1]);
	$countryofgrewup= findcountryid($rs[2]);
	$nristatus=$rs['nristatus'];

//   other details  ////////////////////////////////////////


$educationid= "";
$ocupationid = "";
$annualincome= "";
$education_detail ="";
$occupation_detail ="";
$service_location="";
$service_area="";
$cat_education = "";
$cat_occupation='';
$industry_id='';
$work_function_id='';

$result = getdata("select educationid,ocupationid,annualincome,education_detail,occupation_detail,edu_pg_id,edu_pg_other,industry_id,industry_other,work_function_id,work_function_other,instituteid,institute_other,service_location,service_area,annual_income_currancyid,annual_income_id  FROM tbldatingusermaster where userid=$userid and currentstatus=0");
 $rs= mysqli_fetch_array($result);

	$educationid= findtitleofprofilefld($rs[0],"tbl_education_master");
	if($rs[0]!=""){	
	$cat_education = getonefielddata("SELECT tbl_education_category_master.title from tbl_education_category_master,tbl_education_master WHERE tbl_education_master.cat_id=tbl_education_category_master.id AND tbl_education_master.id=".$rs[0]);
	}
	$ocupationid = findtitleofprofilefld($rs[1],"tbldatingoccupationmaster");
	if($rs[1]!=""){
		$cat_occupation='';
		//$cat_occupation = getonefielddata("SELECT tbl_occupation_category_master.title from tbl_occupation_category_master,tbldatingoccupationmaster WHERE tbldatingoccupationmaster.cat_id=tbl_occupation_category_master.id AND tbldatingoccupationmaster.id=".$rs[1]);	
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
	$annual_income_id=findtitleofprofilefld($rs[16],"tbldating_annual_income_master");
    
	 $annual_income_currancyid_get = getonefielddata("select annincome_curr from tbldatingpartnerprofilemaster where userid =$dispayuserid");;
	   if($annual_income_currancyid_get!='0.0'){
$annual_income_currancyid_new=findtitleofprofilefld($annual_income_currancyid_get,"tbldating_annual_income_currancy_master");	
	   }


// fetch image 

$image1='';
$imagenm_user ='';



$result_image = getdata("select imagenm FROM tbldatingusermaster where userid=$userid and currentstatus=0");
$rs= mysqli_fetch_array($result_image);

$image1= $rs['imagenm'];
if($image1!='')
{$imagenm_user = $rs['imagenm'];}
else{
$imagenm_user = "noimage.gif";	
}


////////// lifestyle //////////////////////////////////////////

$dietid= "";
$smokerstatusid = "";
$drinkerstatusid= "";
$familyvalues= "";
$familystatus= "";
$verificationdoctype= "";


$result_lifestyle = getdata("select dietid, smokerstatusid,drinkerstatusid,family_values,family_status,verified_doc_type  FROM tbldatingusermaster where userid=$userid and currentstatus=0 ");
while($rs_lifestyle= mysqli_fetch_array($result_lifestyle))
{   
   $dietid= findtitleofprofilefld($rs_lifestyle[0],"tbldatingdietmaster");
	$smokerstatusid = findtitleofprofilefld($rs_lifestyle[1],"tbldatingsmokerstatusmaster");
	$drinkerstatusid = findtitleofprofilefld($rs_lifestyle[2],"tbldatingdrinkerstatusmaster");
    $familyvalues = findtitleofprofilefld($rs_lifestyle[3],"tbl_family_values");
	$familystatus = findtitleofprofilefld($rs_lifestyle[4],"tbl_family_status");
	$verificationdoctype = findtitleofprofilefld($rs_lifestyle[5],"tbl_verification_document");
}

$language = "";
$result_lng = getdata("select tbldatinglanguagemaster.title FROM tbldatinguserlanguagemaster,tbldatinglanguagemaster where tbldatinguserlanguagemaster.languageid=tbldatinglanguagemaster.id and tbldatinguserlanguagemaster.userid=$dispayuserid");
while($rs_lng= mysqli_fetch_array($result_lng))

{	if ($language != "")
		$language .= ", ";
	$language .= $rs_lng[0];
}
freeingresult($result_lng);





    $country_code = '';
	$city_code = '';
	$mobile = '';
	$phno = '';
	$email='';
	$landline='';
	$phone='';
	$address='';
	$callingtime='';
	$contact_person_on_phone='';
	$remarks='';
  
  
 $result_contact = getdata("select mobile,landline,callingtime,country_code,city_code,address,email,remarks,contact_person_on_phone FROM tbldatingusermaster where userid=$userid and currentstatus=0");
while($rs_contact= mysqli_fetch_array($result_contact))
{
	$country_code = $rs_contact['country_code'];
	$city_code = $rs_contact['city_code'];
	$mobile = $rs_contact['mobile'];
	$phno = $rs_contact['landline'];
	
	
	$callingtime = $rs_contact['callingtime'];
	if($country_code!="" && $mobile!="")	{
		$mobile = $country_code."-".$mobile;	
	}
	$landline = $rs_contact['landline'];
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
	$address = $rs_contact['address'];
	$email = $rs_contact['email'];
	if($rs_contact['remarks']!="") {
		$remarks = $rs_contact['remarks'];
	}
	if($rs_contact['contact_person_on_phone']!=""){
		$contact_person_on_phone = $rs_contact['contact_person_on_phone'];
	}
	
}
	freeingresult($result_contact);
  
 
 
 
 ////////////////////////////////////////////////////////Partner details //////////////////////////////////////////////////
 
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
	
	$partner_agefrom=$rs[1];
	$partner_ageto=$rs[2];
	$partner_location=findtitleofprofilefld($rs[3],"tbldatingcountrymaster");
	$partner_location = str_replace(",",", ",$partner_location);
	$partner_religianid = findtitleofprofilefld($rs[4],"tbldatingreligianmaster");
	$partner_castid = findtitleofprofilefld($rs[5],"tbldatingcastmaster");
	$partner_subcast=$rs[6];
	$partner_occupation= findtitleofprofilefld($rs[7],"tbldatingoccupationmaster");
	
	$partner_education= findtitleofprofilefld($rs[8],"tbl_education_master");
	$partner_maritalstatus=findtitleofprofilefld($rs[9],"tbldatingmaritalstatusmaster");
	$partner_heightfrom=findtitleofprofilefld($rs[10],"tbldatingheightmaster");
	$partner_heightto= findtitleofprofilefld($rs[11],"tbldatingheightmaster");
	$partner_dietids= findtitleofprofilefld($rs[12],"tbldatingdietmaster");
	$partner_smokeids= findtitleofprofilefld($rs[13],"tbldatingsmokerstatusmaster");
	$partner_drinkids= findtitleofprofilefld($rs[14],"tbldatingdrinkerstatusmaster");
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
	
	
	
	
	$partner_kidsids=findtitleofprofilefld($rs[16],"tbldatingkidsmaster");
	$partner_grahid =findtitleofprofilefld($rs[17],"tbldatinggrahmaster");
	$selected_religion_can_contact=$rs[18];
	
	$selected_cast_contact_me=$rs[19];
	
	$partner_pg_education=findtitleofprofilefld($rs[20],"tbldating_education_pg_master");
	$partner_industry=findtitleofprofilefld($rs[21],"tbl_dating_industry_master");
	$partner_functional_area=findtitleofprofilefld($rs[22],"tbl_dating_work_function_area_master");	
	
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

 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
 
 
 
 
 
 


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<!-----<link rel="stylesheet" href="css/main.css" type="text/css" />-------->

</head>
<body>

 

<!-----------------------About-------------------------->

<table  cellpadding="10" cellspacing="0" width="100%">
  <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Profile</h1></td>
  </tr>  
  <tr>
     <td  style="border:1px solid #29a7da;padding: 15px;" align="center"><br />
       
       <span class="TextH" style="text-align:center ;font-size:12px"><img  src="<?=$sitepath?>uploadfiles/<?=$imagenm_user?>" height="160px" width="120px"/><br/><?= $headline ?></span>
     </td>
  </tr>
   <tr>
    <td  style="border:1px solid #29a7da; padding: 15px;">
        <strong class="scolor">About</strong><br/>
        <span class="TextH" style=" font-size:12px">&nbsp;&nbsp;<?=$personality?></span> <br/>
   </td>
  </tr>
  
  <tr>
    <td  style="border:1px solid #29a7da;
 padding: 15px;">
        <table border="0" cellpadding="10" cellspacing="0">
         <tr>
              
              <? if($countryid!=''){?>
                <th width="33.3%">
                <span style="font-size:12px ;color:#89888f"><strong>Country:&nbsp;</strong>&nbsp;<?=$countryid?></span> 
                </th><? }?>
                
              <? if($state!=''){?>
               <th width="33.3%">
                <span style="font-size:12px ;color:#89888f"><strong>State:&nbsp;</strong>&nbsp;<?=$state?></span> 
                </th><? }?>
              
              <? if($city!=''){?>
                 <th width="33.3%">
                <span style="font-size:12px ;color:#89888f"><strong>city:&nbsp;</strong>&nbsp;<?=$city?></span> 
                </th><? }?>
               
        </tr>
         
        
          
         <tr>
         
            <th width="30%">
                <span style="font-size:12px ;color:#89888f"><strong>NRI:&nbsp;</strong>&nbsp;<? if($nristatus!=''){ echo "Yes";}else{echo "No";} ?></span> 
                </th>
         
         </tr>
         
         
         
        
       </table>
   </td>
  </tr>
  
  
  
  
 </table>


<!---------------------------------------------------------->





<!------------------------------------------Personal--------------------->


<table  style="margin-bottom: 50px;" cellpadding="0" cellspacing="0" width="100%">
 <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Personal</h1></td>
  </tr>

  <tr>
    <td width="50%" valign="top">
      <table class="" cellpadding="7" cellspacing="0" width="100%">
        <tr>
          <td>            
          <table  style="border:3px solid #29a7da;" cellpadding="7" cellspacing="0" width="100%">
              
              <? if($profilecreatebyid!=''){?>
              <tr class="colorWD" style="font-size:12px">
                <th>Profile Created by</th>
                <td><?= $profilecreatebyid ?></td>
              </tr>
              <? } ?>
         
               <? if($mstatusid==2 || $mstatusid==3) { ?> 
              <? if ($kidsid != "") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Kids</th>
                <td><?= $kidsid ?></td>
              </tr><? }}?>
                
                <? if($heightid!='' || $heightid!='0.0'){?>
              <tr class="colorWD" style="font-size:12px">
                <th>Height</th>
                <td><?= $heightid ?></td>
              </tr><? }?>
              
                <? if($eyecolorid!=''){?>
               <tr class="colorWD" style="font-size:12px">
                <th>Eye color</th>
                <td><?= $eyecolorid ?></td>
              </tr><? }?>
           
              <? if($complexionid!=''){?>
               <tr class="colorWD" style="font-size:12px">
                <th>Complexion</th>
                <td><?= $complexionid ?></td>
              </tr>
              <? }?>
       
            <? if($illiness!=''){?>
               <tr class="colorWD" style="font-size:12px">
                <th>Other Illiness</th>
                <td><?= $illiness ?></td>
              </tr>
            <? }?>
            
              </table>
             </td>
       </tr>
 
      </table>
 
        
      
   </td>
       
       
       
      
    <td width="50%" valign="top">
      <table  cellpadding="7" cellspacing="0" width="100%">
  
        
        <tr>
          <td >
          <table  style="border:3px solid #29a7da;" cellpadding="7" cellspacing="0" width="100%">
          
            <? if($maritalstatusid!='' || $maritalstatusid!='0.0'){?>
              <tr class="colorWD" style="font-size:12px">
                <th>Marital Status </th>
                <td><?= $maritalstatusid ?></td>
              </tr>
              <? }?>
         
              <? if($no_children!='' && $maritalstatusid!='Single'){?>
              <tr class="colorWD" style="font-size:12px">
                <th>No. of Children</th>
                <td><? if($no_children!='') { ?><?= $no_children ?><? } ?></td>
              </tr>
                <? }?>
                
              <? if($weightid!='' || $weightid!='0.0'){?>
              <tr class="colorWD" style="font-size:12px">
                <th>Weight </th>
                <td><?=$weightid?></td>
              </tr>
              <? }?>
              
                <? if($bodytypeid!='' || $weightid!='0.0'){?>
               <tr class="colorWD" style="font-size:12px">
                <th>Body Type</th>
                <td><?=$bodytypeid?></td>
              </tr>
              <? }?>
            
             <? if($specialcasesid!=''){?>
               <tr class="colorWD" style="font-size:12px">
                <th>Special Case</th>
                <td><?=$specialcasesid?></td>
              </tr>
              <? }?>

           
            <? if($wantchildren!=''){?>
               <tr class="colorWD" style="font-size:12px">
                <th>Want Children</th>
                <td>
				<? if($wantchildren='Y'){?>Y<? }else if($wantchildren='N'){?>N<? }else{?>Not Sure<? }?>
				</td>
              </tr>
           <? }?>
           
              <? if($blood_group!='' || $blood_group!='0.0'){?>
               <tr class="colorWD" style="font-size:12px">
                <th>Blood Group</th>
                <td><?=$blood_group?></td>
              </tr>
              <? }?>
        
                </table>
             </td>
        </tr>
   
      </table>
     </td>
     
     
  </tr>
</table><br /><br />




 <!------------------------------------------Education--------------------->
 
 
 
 
 
 
 
 
 <table   cellpadding="0" cellspacing="0" width="100%">
 <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Education And Occupation</h1></td>
  </tr>

  <tr>
    <td width="50%" valign="top">
      <table class="" cellpadding="7" cellspacing="0" width="100%">
        <tr>
          <td>            
          <table  style="border:3px solid #29a7da;" cellpadding="7" cellspacing="0" width="100%">
              
              <? if($edudetails!='' || $edudetails!='0.0'){?>
              <tr class="colorWD" style="font-size:12px">
                <th>Education</th>
                <td><?= $edudetails ?></td>
              </tr>
              <? }?>
         
           
              <tr class="colorWD" style="font-size:12px">
                <th>Qualifications</th>
                <td> <?= $educationid ?><? if($cat_education!="") { ?> (<?=$cat_education ?>) <? } if ($education_detail != "") { ?><?= $education_detail ?><? } ?></td>
              </tr>
           
                
              <tr class="colorWD" style="font-size:12px">
                <th>Institute</th>
                <td><?= $instituteid ?>
			<? if ($institute_other != "") { ?>
	      &nbsp;&nbsp; [ <?= $institute_other ?> ]
	      <? } ?></td>
              </tr>
              
              
              <? if($company_name!=''){?>
               <tr class="colorWD" style="font-size:12px">
                <th>Company Name</th>
                <td><?= $company_name ?></td>
              </tr>
              <? }?>
              
              <? if($work_function_id!=''){?>
                <tr class="colorWD" style="font-size:12px">
                <th>Function Area</th>
                <td><?= $work_function_id ?></td>
              </tr>
              <? }?>
               
           
          </table>
             </td>
       </tr>
 
      </table>
 
        
      
   </td>
       
       
       
      
    <td width="50%" valign="top">
      <table  cellpadding="7" cellspacing="0" width="100%">
  
        
        <tr>
          <td >
          <table  style="border:3px solid #29a7da;" cellpadding="7" cellspacing="0" width="100%">
          
            <? if ($occ_status !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Occupations Status</th>
                <td><?= $occ_status ?></td>
              </tr>
          <? } ?>
          
          <? if ($ocupationid != "") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Occupation</th>
                <td><?= $ocupationid ?><? if($cat_occupation!="") { ?> (<?=$cat_occupation?>)<? }  ?></td>
              </tr>
              <? } ?>
                
                
                  <? if ($service_location != "") { ?>
                        <? 
                        $service_csc = "";
                        if($service_city!=""){
                            $service_csc .= $service_city."-";		
                        }
                        if($service_state!=""){
                            $service_csc .= $service_state."-";	
                        }
                        if($service_location!=""){
                            $service_csc .= $service_location;	
                        }
                        ?>
                
              <tr class="colorWD" style="font-size:12px">
                <th>Work In </th>
                <td><?= $service_csc ?></td>
              </tr>
              <? }?>
              
              <? if ($annual_income_id != "") { ?>
               <tr class="colorWD" style="font-size:12px">
                <th>Package</th>
                <td><?= $annual_income_currancyid ?><?= $annual_income_id ?></td>
              </tr>
              <? }?>
           
               <? if ($industry_id != "" || $industry_id!='0.0') { ?>
                 <tr class="colorWD" style="font-size:12px">
                <th>Industry</th>
                <td><?= $industry_id ?></td>
              </tr>
               <? }?>
        
                </table>
             </td>
        </tr>
   
      </table>
     </td>
     
     
  </tr>
</table><br />
 
 
 
 
 

  
  <!------------------------------------------Social--------------------->
  
  
  
  
  <table  style="margin-bottom: 50px;" cellpadding="0" cellspacing="0" width="100%">
 <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Social</h1></td>
  </tr>

  <tr>
    <td width="100%" valign="top">
      <table class="" cellpadding="7" cellspacing="0" width="100%">
        <tr>
          <td>            
          <table  style="border:3px solid #29a7da;" cellpadding="7" cellspacing="0" width="100%">
              
             
            
             
             <? if ($dob !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Birth Date:&nbsp;</th>
                <td><?= $dob ?></td>
              </tr>
              <? }?>
             
             
            <? if ($birthtime !="" || $birthplace !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Birth Time & Place:&nbsp;</th>
                <td><?= $birthtime ?>&nbsp;<?= $birthplace ?></td>
              </tr>
              <? }?>
             
             
             
           
           <? if ($religianid !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Religion</th>
                <td><?= $religianid ?></td>
              </tr>
              <? }?>
              
                <? if ($castid !="") { ?> 
              <tr class="colorWD" style="font-size:12px">
                <th>Cast</th>
                <td><?= $castid ?></td>
              </tr>
              <? }?>
                
                <? if ($subcast !="") { ?> 
              <tr class="colorWD" style="font-size:12px">
                <th>Subcast</th>
                <td><?= $subcast ?></td>
              </tr>
              <? }?>
              
              <? $a=''; if ($religion_interest !="") { ?>
               <tr class="colorWD" style="font-size:12px">
                <th>Religion Interest</th>
                <td>
				
				<? echo $a=getonefielddata("select title from tbldatingreligioninterestmaster where currentstatus=0 and id=$religion_interest");  ?> </td>
              </tr>
             <? }?>
              
               
              <? if ($motherthoungid !="") { ?>
                <tr class="colorWD" style="font-size:12px">
               <th>Social Community</th>
                <td><?= $motherthoungid ?></td>
              </tr>
              <? }?>
              
               <? if ($maternal_name !="") { ?>
               <tr class="colorWD" style="font-size:12px">
               <th>Maternal Sirname</th>
                <td><?= $maternal_name  ?></td>
              </tr>
                <? }?>
              
               <? if ($maternal_location !="") { ?>
               <tr class="colorWD" style="font-size:12px">
               <th>Maternal Location </th>
                <td><?= $maternal_location  ?></td>
              </tr>
                <? }?>
              
              </table>
             </td>
       </tr>
 
      </table>
 
        
      
   </td>
       
   
  </tr>
</table>
  
  
  
<? if($religianid=='Muslim') { ?>
   <table  cellpadding="0" cellspacing="0" width="100%">
<?php /*?> <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Social2(M)</h1></td>
  </tr><?php */?>

  <tr>
    <td width="100%" valign="top">
      <table  cellpadding="7" cellspacing="0" width="100%">
        <tr>
          <td>            
          <table style="border:3px solid #29a7da;"   cellpadding="7" cellspacing="0" width="100%">
              
             
           
         
              <? if ($revert !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Born or Reverted</th>
                <td><?= $revert ?></td>
              </tr>
              <? }?>
                
                <? if ($prayer !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Prayer</th>
                <td><?= $prayer ?></td>
              </tr>
              <? }?>
           
              <? if ($fasting !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Fasting</th>
                <td><?= $fasting ?></td>
              </tr>
              <? }?>
              
                <? if ($quran !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Read Quran</th>
                <td><?= $quran ?></td>
              </tr>
                 <? }?>
              
            
              
                <? if (findsettingvalue("Religion_field_display") == "M") { ?>  
              
                <? if($genderid=='Female'){?>
                <? if ($hijab_id != "") { ?>
			   <tr class="colorWD" style="font-size:12px">
                <th>Wears a Hijab?</th>
                <td><?= $hijab_id ?></td>
               </tr>
               <? }?>
                <? }?>
             
              
               <? if ($halal_strict_id != "") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>How strict about Halaal?</th>
                <td><?= $halal_strict_id ?></td>
              </tr>
              <? }?>
              
              <? if($genderid=='Male'){?>
              <? if ($beard_id != "") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Have a beard?</th>
                <td><?= $beard_id ?></td>
              </tr>
              <? }?>
                <? }?>
              
              <? if ($salah_perform_id != "") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>How often perform Salaah?</th>
                <td><?= $salah_perform_id ?></td>
              </tr>
              <? }?>
              
              
                <? if ($islamic_education != "") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Islamic Education</th>
                <td><?= $islamic_education ?></td>
              </tr>
               <? }?>
              
              <? }?>
              
              
              
                
              </table>
             </td>
       </tr>
 
      </table>
 
        
      
   </td>
       
       
   
     
  </tr>
</table>
<? } ?>
  
  
  
  
  <? if($religianid=='Hindu' || $religianid=='Jain'){?>
  
  <table  cellpadding="0" cellspacing="0" width="100%">
   <?php /*?><tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Social3(H)</h1></td>
  </tr><?php */?>

  <tr>
    <td width="100%" valign="top">
      <table class="" cellpadding="7" cellspacing="0" width="100%">
        <tr>
          <td>            
          <table  style="border:3px solid #29a7da;"  cellpadding="7" cellspacing="0" width="100%">
              
             
             <? if($enable_mangalik_status=='Y'){?>            
              <? if ($grahid !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Manglic</th>
                <td><?= $grahid ?></td>
              </tr>
              <? }?>
              <? }?>
              
                <? if ($countryofbirth !="") { ?>
               <tr class="colorWD" style="font-size:12px">
               <th>Country of Birth</th>
                <td><?= $countryofbirth ?></td>
              </tr>
               <? }?>
             
              
              <? if($enable_astrological_module=='Y' && ($religianid=='Hindu' || $religianid=='Jain')){?>
			  <? if($ignore_horo!='Y') { ?> 
				   <? if($birthstar!='') { ?>
                  <tr class="colorWD" style="font-size:12px">
                    <th>Birth Star</th>
                    <td><?= $birthstar ?></td>
                  </tr>
                  <? }?>
                 
                 <? if($birthrashi!='') { ?>
                  <tr class="colorWD" style="font-size:12px">
                    <th>Birth Rashi</th>
                    <td><?= $birthrashi ?></td>
                  </tr>
                  <? }?>
              <? }}?>
              
              
              
              <? if (findsettingvalue("Religion_field_display") == "H")  { ?>
                <? if ($moonsign !="") { ?>
               <tr class="colorWD" style="font-size:12px">
                <th>Moonsign</th>
                <td><?= $moonsign ?></td>
              </tr>
               <? }?>
               
                 <? if ($sunsignid !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Sunsign</th>
                <td><?= $sunsignid ?></td>
              </tr>
               <? }?>
               
               <? if ($gotra !="" && $religianid=='Hindu' || $religianid=='Jain') { ?>
			  <tr class="colorWD" style="font-size:12px">
                <th>Gotra</th>
                <td><?= $gotra ?></td>
              </tr>
              <? }?>
         
               <? }?>
              
              
             
              </table>
             </td>
       </tr>
 
      </table>
 
        
      
   </td>
       
       
          
      
    
     
  </tr>
</table>
  
  <? }?>
  
  
  
 <? if($religianid=='Christian') { ?>
<table  cellpadding="0" cellspacing="0" width="100%">
<?php /*?> <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Social4(C)</h1></td>
  </tr><?php */?>

  <tr>
    <td width="100%" valign="top">
      <table class="" cellpadding="7" cellspacing="0" width="100%">
        <tr>
          <td>            
          <table  style="border:3px solid #29a7da;"   cellpadding="7" cellspacing="0" width="100%">
              
               <? if($ChristianDiocese!=''){ ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Christian Diocese</th>
                <td><?= $ChristianDiocese ?></td>
              </tr>
              <? }?>
                
               
                <? if($catholicyn!='' && $catholic_module=='Y'){ ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Catholic</th>
                <td><?= $catholicyn ?></td>
              </tr>  <? }?>
              
             <? if($chr_denomination!='' && $denomination_module=='Y'){ ?>
                <tr class="colorWD" style="font-size:12px">
                <th>Denomination</th>
                <td><?  echo $b=getonefielddata("select title from tbl_christian_denomination where currentstatus=0 and id=$chr_denomination ");  ?></td>
              </tr>
               <? }?>
              
          
              </table>
             </td>
       </tr>
 
      </table>
 
        
      
   </td>
       
       
       
      
    
     
     
  </tr>
</table>
 <? }?> 
  
  
  




 <br />
<br />
<br /> 

<!------------------------------------------Lifestyle--------------------->


<table  cellpadding="0" cellspacing="0" width="100%">
 <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Life Style</h1></td>
  </tr>

  <tr>
    <td width="50%" valign="top">
      <table class="" cellpadding="7" cellspacing="0" width="100%">
        <tr>
          <td>            
          <table  style="border:3px solid #29a7da;"   cellpadding="7" cellspacing="0" width="100%">
              
             <? if ($dietid !="") { ?>
              <tr class="colorWD" style="font-size:12px">
                <th>Diet</th>
                <td><?= $dietid ?></td>
              </tr>
              <? }?>
                
             <? if ($smokerstatusid !="") { ?>  
              <tr class="colorWD" style="font-size:12px">
                <th>Smoker status</th>
                <td><?= $smokerstatusid ?></td>
              </tr>
                <? }?>
              
               <? if ($language !="") { 
		   
		       $Array_chklangmultiple=array();
	
					$chklangmultiple = getonefielddata("select languageid from tbldatinguserlanguagemaster where userid='".$dispayuserid."' ");
					
					$chklangmultiple_ids=explode(",",$chklangmultiple);
					
					$languages = getdata("select id,title from tbldatinglanguagemaster where currentstatus=0 and languageid =1 order by title ");
					while($languages_rs= mysqli_fetch_array($languages))
					{ 
					   if(in_array($languages_rs[0],$chklangmultiple_ids))
					        { 
							   array_push($Array_chklangmultiple,$languages_rs[1]); 
							      
								  }
					}
			  
		   
		   
		   ?>
              
              <tr class="colorWD" style="font-size:12px">
                <th>Language</th>
                <td><? if($chklangmultiple!=''){ 
                            $lng='';
                            if(count($Array_chklangmultiple)>0){
                            for ($xi= 0; $xi< count($Array_chklangmultiple); $xi++) {?>
                            <? $lng.=$Array_chklangmultiple[$xi].", "; ?>
                            <? }} ?>
                            <?=substr($lng,0,-2)?>
                            <? } ?></td>
              </tr>
            
              
              
            <? } ?>
              
              
              
          
              </table>
             </td>
       </tr>
 
      </table>
 
        
      
   </td>
       
       
       
      
    <td width="50%" valign="top">
     <table  cellpadding="7" cellspacing="0" width="100%">
  
        
        <tr>
          <td >
          <table   style="border:3px solid #29a7da;"  cellpadding="7" cellspacing="0" width="100%">
          
            
               <? if ($drinkerstatusid !="") { ?>  
                <tr class="colorWD" style="font-size:12px">
                <th>Drinker status</th>
                <td><?= $drinkerstatusid ?></td>
              </tr>
              <? }?>
              
            
              
              <? if ($working_partner !="") { ?> 
              <tr class="colorWD" style="font-size:12px">
                <th>Working Partner</th>
                <td><?= $working_partner ?></td>
              </tr>
                <? }?>
              
			 
         
          
              
        
        
                </table>
             </td>
        </tr>
   
      </table>
     </td>
     
     
  </tr>
</table>





<!------------------------------------------Interests--------------------->


<table style="" cellpadding="10" cellspacing="0" width="100%">
  
  <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Interest</h1></td>
  </tr>  
  
   <tr>
    <td  style="border:1px solid #29a7da; padding: 15px;">
        <table border="0" cellpadding="10" cellspacing="0">
         
           
            <? if ($music !="") { 
		 
			$Array_music=array();
			$music_ids=explode(",",$music);
			$musicqrye = getdata("select id,title from tbl_music_master where currentstatus=0 order by title ");
			while($rsmusic= mysqli_fetch_array($musicqrye)){ 
				  if(in_array($rsmusic[0],$music_ids)){
					 
					  array_push($Array_music,$rsmusic[1]);
					  
					}
			}
		 
		 ?>
          <tr>
               <th width="100%">
                <? if($music!=''){?> 
                <span style="font-size:12px ;color:#89888f"><strong>Music:&nbsp;</strong>&nbsp;
                  <? if($music!=''){ 
                                        if(count($Array_music)>0){
                                                        for ($x1 = 0; $x1< count($Array_music); $x1++) {?>
                                                                  <span><? echo $Array_music[$x1].","; ?></span>
                                        <? }}} ?>
                </span> 
				<? }?>
                
               </th>
           </tr>
         
         
           <? } ?>
          
          
          
          
          <? if ($interest !="") { 
		 
				$Array_interest=array();
				$interest_ids=explode(",",$interest);
				$interestqrye = getdata("select id,title from tbl_interest_master where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
					  if(in_array($rsinterest[0],$interest_ids)){
						 
						  array_push($Array_interest,$rsinterest[1]);
						  
						}
				}	 
						 ?>
                         
                          <tr>
               <th width="100%">
                <? if($interest!=''){?> 
                <span style="font-size:12px ;color:#89888f"><strong>Interest:&nbsp;</strong>&nbsp;
                  <? if($interest!=''){ 
                                         if(count($Array_interest)>0){
                                                        for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                                                  <? echo $Array_interest[$x2].","; ?>
                                        <? }}} ?>
                </span> 
				<? }?>
                
               </th>
           </tr>
               <? } ?>
          
          
          
          
          
             <? if ($fav_read !="") {
		                        $Array_fav_read=array();
								$fav_read_ids=explode(",",$fav_read);
								$fav_read_qrye = getdata("select id,title from tbl_favourite_read_master where currentstatus=0 order by title ");
								while($rsfav_read= mysqli_fetch_array($fav_read_qrye)){ 
								if(in_array($rsfav_read[0],$fav_read_ids)){
								
								array_push($Array_fav_read,$rsfav_read[1]);
								
								}
								}	  
			  
			  
		  ?>
          
          
              <tr>
               <th width="100%">
                <? if($fav_read!=''){?> 
                <span style="font-size:12px ;color:#89888f"><strong>Read:&nbsp;</strong>&nbsp;
                  <? if($fav_read!=''){ 
                     if(count($Array_fav_read)>0){
                                    for ($x3 = 0; $x3< count($Array_fav_read); $x3++) {?>
                                              <? echo $Array_fav_read[$x3].","; ?>
                    <? }}} ?>
                </span> 
				<? }?>
                </th>
               </tr>
          
            
            <? } ?>
          
          
          
          
          
          <? if ($fav_cuisines !="") { 
		      
			                    $Array_fav_cuisines=array();
								$fav_cuisines_ids=explode(",",$fav_cuisines);
								$fav_cuisines_qrye = getdata("select id,title from tbl_favourite_cuisines_master where currentstatus=0 order by title ");
								while($rsfav_cuisines= mysqli_fetch_array($fav_cuisines_qrye)){ 
								if(in_array($rsfav_cuisines[0],$fav_cuisines_ids)){
								
								array_push($Array_fav_cuisines,$rsfav_cuisines[1]);
								
								}
								} 
		  
		  
		  ?>
           
            
             <tr>
               <th width="100%">
                <? if($fav_cuisines!=''){?> 
                <span style="font-size:12px ;color:#89888f"><strong>Cuisines:&nbsp;</strong>&nbsp;
                 <? if($fav_cuisines!=''){ 
                     if(count($Array_fav_cuisines)>0){
                                    for ($x4 = 0; $x4< count($Array_fav_cuisines); $x4++) {?>
                                              <? echo $Array_fav_cuisines[$x4].","; ?>
                    <? }}} ?>
                </span> 
				<? }?>
                </th>
               </tr>
            
            <? } ?>
        
           
           <? if ($dress_styles !="") {
		                		$Array_dress_styles=array();
			$dress_styles_ids=explode(",",$dress_styles);
			$dress_styles_qrye = getdata("select id,title from tbl_favourite_dress_master where currentstatus=0 order by title ");
			while($rsdress_styles= mysqli_fetch_array($dress_styles_qrye)){ 
			if(in_array($rsdress_styles[0],$dress_styles_ids)){
			
			array_push($Array_dress_styles,$rsdress_styles[1]);
			
			}
			}	   
			   
		   ?>
           
             <tr>
               <th width="100%">
                <? if($dress_styles!=''){?> 
                <span style="font-size:12px ;color:#89888f"><strong>Dress Styles:&nbsp;</strong>&nbsp;
                  <? if($fav_read!=''){ 
                     if(count($Array_dress_styles)>0){
                                    for ($x5 = 0; $x5< count($Array_dress_styles); $x5++) {?>
                                             <? echo $Array_dress_styles[$x5].","; ?>
                    <? }}} ?>
                </span> 
				<? }?>
                </th>
               </tr>
            
            
            <? } ?>
        
          
           <? if ($fitness !="") { 
		       	$Array_fitness=array();
								$fitness_ids=explode(",",$fitness);
								$fitness_qrye = getdata("select id,title from tbl_fitness_master where currentstatus=0 order by title ");
								while($rsfitness= mysqli_fetch_array($fitness_qrye)){ 
								if(in_array($rsfitness[0],$fitness_ids)){
								
								array_push($Array_fitness,$rsfitness[1]);
								
								}
								}
			   
		   ?>
          
            
             <tr>
               <th width="100%">
                <? if($fitness!=''){?> 
                <span style="font-size:12px ;color:#89888f"><strong>Sports/Fitness:&nbsp;</strong>&nbsp;
                  <? if($fav_read!=''){ 
                      if(count($Array_fitness)>0){
                                    for ($x6= 0; $x6< count($Array_fitness); $x6++) {?>
                                              <? echo $Array_fitness[$x6].","; ?>
                    <? }}} ?>
                </span> 
				<? }?>
                </th>
               </tr>
            
            <? } ?>
          
          
            
            
          
         
        
       </table>
   </td>
  </tr>

</table>




<br/><br/><br/>

  <!------------------------------------------Familey Details--------------------->



<table  cellpadding="10" cellspacing="0" width="100%">
  <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Family Details</h1></td>
  </tr>  
     <? if ($familybackground !="") { ?>
   <tr>
    <td  style="border:1px solid #29a7da; padding: 15px;">
        <strong class="scolor">Background</strong><br/>
        <span class="TextH" style=" font-size:12px">&nbsp;&nbsp;<?=$familybackground?></span> <br/>
   </td>
  </tr>
  <? } ?>
  
  <tr>
    <td  style="border:1px solid #29a7da;
 padding: 15px;">
        <table border="0" cellpadding="10" cellspacing="0">
         <tr>
               <? if ($familystatus_m !="") { ?>
                <th width="33.3%">
                <span style="font-size:12px ;color:#89888f"><strong>Family Status:&nbsp;</strong>&nbsp;<?=$familystatus_m?></span> 
                </th>
                <? }?>
                
                <? if ($familytype !="") { ?>
                <th width="33.3%">
                <span style="font-size:12px ;color:#89888f"><strong>Family Type:&nbsp;</strong>&nbsp;<?=$familytype?></span> 
                </th>
                <? }?>
                
                  <? if ($familyvalueid !="") { ?>
                <th width="33.3%">
                <span style="font-size:12px ;color:#89888f"><strong>Family Type:&nbsp;</strong>&nbsp;<?=$familyvalueid?></span> 
                </th>
                <? }?>
                
          </tr>
         
       
       
   
         
         
         
        
          <tr>
               
              <? if ($father_name !="") { ?>
               <th width="50%">
                <span style="font-size:12px ;color:#89888f"><strong>Father Name:&nbsp;</strong>&nbsp;<?=$father_name?></span> 
                </th>
              <? }?>
             <? if ($mother_name !="") { ?> 
              <th width="50%">
                <span style="font-size:12px ;color:#89888f"><strong>Mother Name:&nbsp;</strong>&nbsp;<?=$mother_name?></span> 
                </th>
              
               <? }?>
              
        
        </tr>
         
            <? if ($father_status_id !="" || $father_occupation != "") { ?>
          <tr>
               <th width="100%">
        <span style="font-size:12px ;color:#89888f"><strong>Father Occupation:&nbsp;</strong>&nbsp;<?= $father_status_id ?><? if($father_occupation!=""){ echo $father_occupation; } ?>
            <? if ($father_company_address !="") { ?>,<?= $father_company_address?><? } ?></span> 
                </th>
              </tr> <? }?>
         
         
         
         

        
         
         <? if ($mother_status_id != "" || $mother_occupation != "") { ?>
          <tr>
               <th width="100%">
                <span style="font-size:12px ;color:#89888f"><strong>Mother Occupation:&nbsp;</strong>&nbsp;<?= $mother_status_id ?> <? if($mother_occupation!="") { echo $mother_occupation; } ?>
                                                  
            <? if ($mother_company_address !="") { ?>,<?= $mother_company_address?><? } ?>  </span> 
                </th>
              </tr><? }?>
     
     
     
        
        
         
    
     
 <strong class="scolor">Siblings</strong><br/>  
     
     

     <? if($brother_married1!='' || $brother_unmarried1!=''){?> 
       <tr><strong class="scolor">Brother</strong><br/>  
              <? if($brother_married1!=''){?>
              <th width="50%">
                <span style="font-size:12px ;color:#89888f"><strong>Married:&nbsp;</strong>&nbsp;<?=$brother_married1?></span> 
                </th><? }?>
               <? if($brother_unmarried1!=''){?> <th width="50%">
                <span style="font-size:12px ;color:#89888f"><strong>Unmarried:&nbsp;</strong>&nbsp;<?=$brother_unmarried1?></span> 
                </th><? }?>
             
        </tr><? }?>
     
     
     
     <? if($sister_married1!='' || $sister_unmarried2!=''){?> 
       <tr><strong class="scolor">Sister</strong><br/> 
              <? if($sister_married1!=''){?>
              <th width="50%">
                <span style="font-size:12px ;color:#89888f"><strong>Married:&nbsp;</strong>&nbsp;<?=$sister_married1?></span> 
                </th><? }?>
                  <? if($sister_unmarried2!=''){?>
                <th width="50%">
                <span style="font-size:12px ;color:#89888f"><strong>Unmarried:&nbsp;</strong>&nbsp;<?=$sister_unmarried2?></span> 
                </th><? }?>
        </tr><? }?>
     
         
         
         
               <?php 
		
	  $get_petranaldata_uncale=getdata("select name,occupation,married_to,type,ftype from tbldating_advancefamily where currentstatus=0 and ftype='f' and type=5 and userid =$userid order by id desc");
			while($rs_pateranal_uncale= mysqli_fetch_array($get_petranaldata_uncale))
			{  
			    $prtranal_uncale_name=$rs_pateranal_uncale['name'];
				$prtranal_uncale_married_to=$rs_pateranal_uncale['married_to'];
				if($rs_pateranal_uncale['occupation']!=""){
				$partner_occupation= findtitleofprofilefld($rs_pateranal_uncale['occupation'],"tbldatingoccupationmaster");	
		   //      $prtranal_uncale_occupation = findihtitle($rs_pateranal_uncale['occupation'],"tbldatingoccupationmaster");
	            }
			
	  ?>
         <br/>
         <tr>
    <td  style="border:1px solid #29a7da; padding: 15px;">
        <?=$prtranal_uncale_name?>&nbsp;(<strong class="scolor">Brother</strong>&nbsp;)<br/>
     
    
    <span style="font-size:12px ;color:#89888f"><strong>Married To:&nbsp;</strong>&nbsp;<?=$prtranal_uncale_married_to?></span><br/>
    
    <span style="font-size:12px ;color:#89888f"><strong>Occupation:&nbsp;</strong>&nbsp;<?=$partner_occupation?></span>
     
    
   
   </td>
  </tr>
         
          <? } ?>
            
         
         
     <br/>
         
         <?php 
		
	 $get_petranaldata_aunty=getdata("select name,occupation,married_to,type,ftype from tbldating_advancefamily where currentstatus=0 and ftype='f' and type=6 and userid =$userid order by id desc");
			while($rs_pateranal_aunty= mysqli_fetch_array($get_petranaldata_aunty))
			{  
			    $prtranal_aunty_name=$rs_pateranal_aunty['name'];
				$prtranal_aunty_married_to=$rs_pateranal_aunty['married_to'];
				if($rs_pateranal_aunty['occupation']!=""){
		     	$partner_occupation= findtitleofprofilefld($rs_pateranal_aunty['occupation'],"tbldatingoccupationmaster");
			 //    $prtranal_aunty_occupation = findihtitle($rs_pateranal_aunty['occupation'],"tbldatingoccupationmaster");
	            }
			
        ?>
         
           <tr>
    <td  style="border:1px solid #29a7da; padding: 15px;">
        <?=$prtranal_aunty_name?>&nbsp;(<strong class="scolor">Sister</strong>&nbsp;)<br/>
     
    
    <span style="font-size:12px ;color:#89888f"><strong>Married To:&nbsp;</strong>&nbsp;<?=$prtranal_aunty_married_to?></span><br/>
    
    <span style="font-size:12px ;color:#89888f"><strong>Occupation:&nbsp;</strong>&nbsp;<?=$partner_occupation?></span>
     
    
   
   </td>
  </tr>
  <? }?>
         
         
         
         
         
        
       </table>
   </td>
  </tr>
  
  
  
  
 </table>


<!------------------------------------------Paternal Family  Details--------------------->   

<table  cellpadding="10" cellspacing="0" width="100%">
  <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Paternal Family Details</h1></td>
  </tr>  
   
  <tr>
    <td >
        <table border="0" cellpadding="10" cellspacing="0">
         
         
       
       
                <?php 
		 $ad_family_occupation_paternal_uncle='';
	  $get_petranaldata_uncale=getdata("select name,occupation,married_to,type,ftype from tbldating_advancefamily where currentstatus=0 and ftype='p' and type=1 and userid =$userid order by id desc");
			while($rs_pateranal_uncale= mysqli_fetch_array($get_petranaldata_uncale))
			{  
			    $prtranal_uncale_name=$rs_pateranal_uncale['name'];
				$prtranal_uncale_married_to=$rs_pateranal_uncale['married_to'];
				if($rs_pateranal_uncale['occupation']!=""){
				//$partner_occupation= findtitleofprofilefld($rs_pateranal_uncale['occupation'],"tbldatingoccupationmaster");	
		        //$prtranal_uncale_occupation = findihtitle($rs_pateranal_uncale['occupation'],"tbldatingoccupationmaster");
	            $ad_family_occupation_paternal_uncle=$rs_pateranal_uncale['occupation'];
				
				   	     
				$OCCUArray=array();
			    $occupation1=explode(",",$rs_pateranal_uncale['occupation']);
				 $qryo = getdata("select id,title from tbldatingoccupationmaster where currentstatus=0 order by title ");
				while($rso = mysqli_fetch_array($qryo)){ 
				      if(in_array($rso[0],$occupation1)){
						   //echo  $rso[1]; 
						   array_push($OCCUArray,$rso[1]);
					  }
				}
				   
				   
				   
				
				
				
				
			}
			
	  ?>
         <br/>
         <tr>
    <td  style="border:1px solid #29a7da; padding: 15px;">
        <?=$prtranal_uncale_name?>&nbsp;(<strong class="scolor">Chacha,Tau</strong>&nbsp;)<br/>
     
    
    <span style="font-size:12px ;color:#89888f"><strong>Married To:&nbsp;</strong>&nbsp;<?=$prtranal_uncale_married_to?></span><br/>
    
    <span style="font-size:12px ;color:#89888f"><strong>Occupation:&nbsp;</strong>&nbsp;  <? if($ad_family_occupation_paternal_uncle!=''){ 
		
		  
		  if(count($OCCUArray)>0){
						for ($x1 = 0; $x1 < count($OCCUArray); $x1++) {
						     
							  echo $OCCUArray[$x1].",";
						} 
			   
		 }
		 
		 }?></span>
      
   </td>
  </tr>
  <? } ?>
            
          <br/>
         
     
         
             <?php 
		$ad_family_occupation_paternal_aunty='';
	 $get_petranaldata_aunty=getdata("select name,occupation,married_to,type,ftype from tbldating_advancefamily where currentstatus=0 and ftype='p' and type=2 and userid =$userid order by id desc");
			while($rs_pateranal_aunty= mysqli_fetch_array($get_petranaldata_aunty))
			{  
			    $prtranal_aunty_name=$rs_pateranal_aunty['name'];
				$prtranal_aunty_married_to=$rs_pateranal_aunty['married_to'];
				if($rs_pateranal_aunty['occupation']!=""){
		         $ad_family_occupation_paternal_aunty=$rs_pateranal_aunty['occupation'];
		   //	$prtranal_aunty_occupation= findtitleofprofilefld($rs_pateranal_aunty['occupation'],"tbldatingoccupationmaster");	
		    //$prtranal_aunty_occupation = findihtitle($rs_pateranal_aunty['occupation'],"tbldatingoccupationmaster");
			
			     
				$OCCUArray_aunty=array();
			    $occupation1_aunty=explode(",",$rs_pateranal_aunty['occupation']);
				 $qryo_aunty = getdata("select id,title from tbldatingoccupationmaster where currentstatus=0 order by title ");
				while($rsaunty = mysqli_fetch_array($qryo_aunty)){ 
				      if(in_array($rsaunty[0],$occupation1_aunty)){
						   //echo  $rso[1]; 
						   array_push($OCCUArray_aunty,$rsaunty[1]);
					  }
				}
				 
			
	            }
			
        ?>
         
           <tr>
    <td  style="border:1px solid #29a7da; padding: 15px;">
        <?=$prtranal_aunty_name?>&nbsp;(<strong class="scolor">Aunty,Bua</strong>&nbsp;)<br/>
     
    
    <span style="font-size:12px ;color:#89888f"><strong>Married To:&nbsp;</strong>&nbsp;<?=$prtranal_aunty_married_to?></span><br/>
    
    <span style="font-size:12px ;color:#89888f"><strong>Occupation:&nbsp;</strong>&nbsp;<? if($ad_family_occupation_paternal_aunty!=''){ 
		
		  
		  if(count($OCCUArray_aunty)>0){
						for ($x1 = 0; $x1 < count($OCCUArray_aunty); $x1++) {
						     
							  echo $OCCUArray_aunty[$x1].",";
						} 
			   
		 }
		 
		 }?></span>
     
    
   
   </td>
  </tr>
  
  
  
  <? }?>
         
         
         
         
         
        
       </table>
   </td>
  </tr>
  
  
  
    
 </table>


 
    
 <!------------------------------------------Maternal Family  Details--------------------->   
   
 
  
  
  <table style="" cellpadding="10" cellspacing="0" width="100%">
  <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Maternal Family Details</h1></td>
  </tr>  
   
  <tr>
    <td >
        <table border="0" cellpadding="10" cellspacing="0">
         
         
       
       
         <?php 
		$ad_family_occupation_metrnal_uncle='';
	   $get_maternaldata_uncale=getdata("select name,occupation,married_to,type,ftype from tbldating_advancefamily where currentstatus=0 and ftype='m' and type=3 and userid =$userid order by id desc");
			while($rs_maternal_uncale= mysqli_fetch_array($get_maternaldata_uncale))
			{  
			    $maternal_uncale_name=$rs_maternal_uncale['name'];
				$maternal_uncale_married_to=$rs_maternal_uncale['married_to'];
				if($rs_maternal_uncale['occupation']!=""){
					$ad_family_occupation_metrnal_uncle=$rs_maternal_uncale['occupation'];
					//$maternal_uncale_occupation= findtitleofprofilefld($rs_maternal_uncale['occupation'],"tbldatingoccupationmaster");
		         //$maternal_uncale_occupation = findihtitle($rs_maternal_uncale['occupation'],"tbldatingoccupationmaster");
	                     
						$OCCUArray_metranla_uncle=array();
						$occupation1_met_unc=explode(",",$rs_maternal_uncale['occupation']);
						$qryo_met_unc = getdata("select id,title from tbldatingoccupationmaster where currentstatus=0 order by title ");
						while($rsmu = mysqli_fetch_array($qryo_met_unc)){ 
						if(in_array($rsmu[0],$occupation1_met_unc)){
						//echo  $rso[1]; 
						array_push($OCCUArray_metranla_uncle,$rsmu[1]);
						}
						}
				   
						 
				
			}
			
	  ?>
         <br/>
         <tr>
    <td  style="border:1px solid #29a7da; padding: 15px;">
    <?=$maternal_uncale_name?>&nbsp;(<strong class="scolor">Uncles,Mama</strong>&nbsp;)<br/>
     
    
    <span style="font-size:12px ;color:#89888f"><strong>Married To:&nbsp;</strong>&nbsp;<?=$maternal_uncale_married_to?></span><br/>
    
    <span style="font-size:12px ;color:#89888f"><strong>Occupation:&nbsp;</strong>&nbsp;  <? if($ad_family_occupation_paternal_uncle!=''){ 
		
		  
		  if(count($OCCUArray_metranla_uncle)>0){
						for ($x1 = 0; $x1 < count($OCCUArray_metranla_uncle); $x1++) {
						     
							  echo $OCCUArray_metranla_uncle[$x1].",";
						} 
			   
		 }
		 
		 }?></span>
      
   </td>
  </tr>
  
  
    
  <? } ?>
            
          <br/>
         
     
         
                <?php 
		 $ad_family_occupation_metrnal_aunty='';
	 $get_metranaldata_aunty=getdata("select name,occupation,married_to,type,ftype from tbldating_advancefamily where currentstatus=0 and ftype='m' and type=4 and userid =$userid order by id desc");
			while($rs_maternal_aunty= mysqli_fetch_array($get_metranaldata_aunty))
			{  
			    $maternal_aunty_name=$rs_maternal_aunty['name'];
				$maternall_aunty_married_to=$rs_maternal_aunty['married_to'];
				if($rs_maternal_aunty['occupation']!=""){
		           	
					 $ad_family_occupation_metrnal_aunty=$rs_maternal_aunty['occupation'];
					//$maternal_aunty_occupation11= findtitleofprofilefld($rs_maternal_aunty['occupation'],"tbldatingoccupationmaster");
				// $maternal_aunty_occupation = findihtitle($rs_maternal_aunty['occupation'],"tbldatingoccupationmaster");
				
			            $OCCUArray_metranla_aunty=array();
						$occupation1_met_aunty=explode(",",$rs_maternal_aunty['occupation']);
						$qryo_met_aunty = getdata("select id,title from tbldatingoccupationmaster where currentstatus=0 order by title ");
						while($rsma = mysqli_fetch_array($qryo_met_aunty)){ 
						if(in_array($rsma[0],$occupation1_met_aunty)){
						//echo  $rso[1]; 
						array_push($OCCUArray_metranla_aunty,$rsma[1]);
						}
						}	
				
				
				
	        }
			
	  ?>
         
           <tr>
    <td  style="border:1px solid #29a7da; padding: 15px;">
        <?=$maternal_aunty_name?>&nbsp;(<strong class="scolor">Masi</strong>&nbsp;)<br/>
     
    
    <span style="font-size:12px ;color:#89888f"><strong>Married To:&nbsp;</strong>&nbsp;<?=$maternall_aunty_married_to?></span><br/>
    
    <span style="font-size:12px ;color:#89888f"><strong>Occupation:&nbsp;</strong>&nbsp;<? if($ad_family_occupation_metrnal_aunty!=''){ 
		
		  
		    if(count($OCCUArray_metranla_aunty)>0){
						for ($x1 = 0; $x1 < count($OCCUArray_metranla_aunty); $x1++) {
						     
							  echo $OCCUArray_metranla_aunty[$x1].",";
						} 
			   
		 }
		 
		 }?></span>
     
    
   
   </td>
  </tr>
  
  
     
  
  
  
  
  <? }?>
         
         
         
         
         
        
       </table>
   </td>
  </tr>
  
  
  
  
 </table>
  
  

  
  
  
  
  
  
  
  

<!------------------------------------------contact------------------------------------>
<? if($display_contact_info=='Y') {?>

<table  cellpadding="10" cellspacing="0" width="100%">
  
  <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Contact</h1></td>
  </tr>  
  
   <tr>
    <td  style="border:1px solid #29a7da;
 padding: 15px;">
        <table border="0" cellpadding="10" cellspacing="0">
         
           
              
                 <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Address:&nbsp;</strong>&nbsp;
              
            
              <? if ($address !="") { ?><?=$address?><? } ?>
              <? if ($area !="") { ?>&nbsp;<?=$area?> <? }?>
               <? if ($postcode !="") {?>-<?=$postcode?> <? }?>
              
              
                </span></th>
                </tr>
               
                
           
          <? if ($residancystatusid !="") { ?>
           <tr>
               <th width="100%">
                <span style="font-size:12px ;color:#89888f"><strong>Residential Address:&nbsp;</strong>&nbsp; <?=$residancystatusid?>
                </span></th>
                </tr> 
                
             <? }?>
             
             
             
         
             
             
             
             
                
                <? if ($native !="") { ?>
                <tr>
                <th width="100%">
            <span style="font-size:12px ;color:#89888f"><strong>Native Place:&nbsp;</strong>&nbsp;
             <?=$native?>
                </span></th>
                </tr> 
                 <? }?>
                 
                 
                  
           
                <tr>
               
                  <? if ($contact_person_on_phone !="") { ?>  
               <th width="50%">
                <span style="font-size:12px ;color:#89888f"><strong>Contact Person:&nbsp;</strong>&nbsp;
              <?=$contact_person_on_phone?>   <? if ($relation !="") { ?>(<?=$relation?>)<? }?>
                </span></th>
                  <? } ?> 
                  
                   <? if ($callingtime !="") { ?>
               <th width="50%">
                  <span style="font-size:12px ;color:#89888f"><strong>Calling Time:&nbsp;</strong>&nbsp;
             <?= $callingtime ?> <? if ($calling_timezone !="") { ?>( <?= $calling_timezone ?> )<? }?>
                </span>
                </th>
                
                 <? } ?>
                 
                
                </tr>
                
                
                    
              <tr>
               
                <? if ($mobile !="") { ?> 
               <th width="50%">
               <span style="font-size:12px ;color:#89888f"><strong>Mobile NO:&nbsp;</strong>&nbsp;
              <?=$mobile?>
                </span></th>
                  <? } ?> 
               
               
               <? if ($phone !="") { ?> 
                 <th width="50%">
               <span style="font-size:12px ;color:#89888f"><strong>Landline NO:&nbsp;</strong>&nbsp;
              <?=$phone?>
                </span></th>
                 <? } ?> 
                 
               </tr>
               
                
         
                  
                
            
                  
			<tr>
                
               <? if ($email !="") { ?> 
                <th width="50%">
                   <span style="font-size:12px ;color:#89888f"><strong>Email ID:&nbsp;</strong>&nbsp;
              <?= $email ?>
                </span>
                </th>
                <? }?> 
                
              <? if ($altemail !="") { ?>   
                 <th width="50%">
                   <span style="font-size:12px ;color:#89888f"><strong>Alternate Email:&nbsp;</strong>&nbsp;
              <?= $altemail ?>
                </span>
                </th>
                <? }?> 
                
              </tr>
               
               
               
             
               
                 
                
                  <? if ($remarks !="") { ?>  
                <tr>
                <th width="100%">
                   <span style="font-size:12px ;color:#89888f"><strong>Remarks:&nbsp;</strong>&nbsp;
              <?=$remarks?>
                </span>
                </th>
                </tr><? }?> 
                
                
             
          
         
        
       </table>
   </td>
  </tr>

</table>



<br />
<br />
<br />     
<? } ?>
  
  
<!------------------------------Partner---------------------------------------------->  



<table style="" cellpadding="10" cellspacing="0" width="100%">
  
  <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Partner Preferences</h1></td>
  </tr>  
  
   <tr>
    <td  style="border:1px solid #29a7da;
 padding: 15px;">
        <table border="0" cellpadding="10" cellspacing="0">
         
           
               
                 <tr>
               
               
               <th width="50%">
                 <span style="font-size:12px ;color:#89888f"><strong>Height From:&nbsp;</strong>&nbsp;
              <? if($partner_heightfrom!='') { ?><?= $partner_heightfrom ?> <? }?>
            <? if($partner_heightfrom!='') { ?>To <?= $partner_heightto ?> <? }?>
                </span></th>
                
                
                 <th width="50%">
                 <span style="font-size:12px ;color:#89888f"><strong>Age From:&nbsp;</strong>&nbsp;
              <? if($partner_heightfrom!='') { ?><?= $partner_heightfrom ?> <? }?>
            <? if($partner_heightfrom!='') { ?>To <?= $partner_heightto ?> <? }?>
                </span></th>
                
                
                
                </tr>
               
                
                
                    
                   <tr>
                   
                    <? if ($partner_smokeids != "") { ?>
                    <th width="50%">
                 <span style="font-size:12px ;color:#89888f"><strong>Smoking:&nbsp;</strong> &nbsp;<?=$partner_smokeids?></span></th>	<? }?>
                 
                 <? if ($partner_drinkids != "") { ?>
                 
                 <th width="50%">
                 <span style="font-size:12px ;color:#89888f"><strong>Drinking:&nbsp;</strong> &nbsp;<?=$partner_drinkids?></span></th>
                
                 
                 <? }?>
                 
                 
                </tr>
				
				    <? if ($partner_dietids != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Diet:&nbsp;</strong> &nbsp;<?= $partner_dietids ?></span></th>
                </tr><? }?>
				
				
			          
       <? if ($partner_ethnic != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Ethnic Background:&nbsp;</strong> &nbsp;<?= $partnepartner_ethnicr_states ?></span></th>
                </tr><? }?>
                
                
                 <? if ($partner_location != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Native Place:&nbsp;</strong> &nbsp;<?= $partner_location ?></span></th>
                </tr><? }?>
                
                
                  <? if ($partner_states != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>State:&nbsp;</strong> &nbsp;<?= $partner_states ?></span></th>
                </tr><? }?>
                
                
                
                 <? if ($partner_kidsids != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Children:&nbsp;</strong> &nbsp;<?= $partner_kidsids ?></span></th>
                </tr><? }?>
             
          
          
           
                   <tr>
                   
                    <? if ($partner_religianid != "") { ?>
                   <th width="50%">
                 <span style="font-size:12px ;color:#89888f"><strong>Religion:&nbsp;</strong> &nbsp;<?= $partner_religianid ?></span></th>
                 <? }?>
                 
                    <? if ($partner_grahid != "") { ?>
                   <th width="50%">
                 <span style="font-size:12px ;color:#89888f"><strong>Mangalik:&nbsp;</strong> &nbsp;<?= $partner_grahid ?></span></th>
                 <? }?>
                 
                </tr>
             
          
          
            <? if ($partner_castid != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Caste:&nbsp;</strong> &nbsp;<?= $partner_castid ?></span></th>
                </tr><? }?>
          
           
          
            <? if ($partner_subcast != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Subcast:&nbsp;</strong> &nbsp;<?= $partner_subcast ?></span></th>
                </tr><? }?>
        
          
         
          
              
            
          
          
               <? if ($partner_maritalstatus != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Marital Status:&nbsp;</strong> &nbsp;<?= $partner_maritalstatus ?></span></th>
                </tr><? }?>
          
         
         
          
          

          
          
                 
          
          
             
          
            
                     
            
            
               <? if ($partner_education != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Education:&nbsp;</strong> &nbsp;<?= $partner_education ?></span></th>
                </tr><? }?>
          
          
           <? if ($partner_occupation != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Occupation:&nbsp;</strong> &nbsp;<?= $partner_occupation ?></span></th>
                </tr><? }?>
          
            
            
            
            <? if ($partner_pg_education != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Post Graduate:&nbsp;</strong> &nbsp;<?= $partner_pg_education ?></span></th>
                </tr><? }?>
            
            
             <? if ($partner_occupation_status != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Occupation Status:&nbsp;</strong> &nbsp;<?= $partner_occupation_status ?></span></th>
                </tr><? }?>
            
         
          <? if ($partner_industry != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Industry:&nbsp;</strong> &nbsp;<?= $partner_industry ?></span></th>
                </tr><? }?>
         
          
        
          <? if ($partner_functional_area != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Functional Area:&nbsp;</strong> &nbsp;<?= $partner_functional_area ?></span></th>
                </tr><? }?>
        
         
         
              <? if ($partner_annincome != "") { ?>
                   <tr>
               <th width="100%">
                 <span style="font-size:12px ;color:#89888f"><strong>Ann. Income (In <?=$annual_income_currancyid_new?>)&nbsp;</strong> &nbsp;<?= $partner_annincome ?></span></th>
                </tr><? }?>
         
       
          
     
          
          
          
          
        
       </table>
   </td>
  </tr>

</table>



  <br />
<br />
  <!------------------------------------------Album--------------------->

  <table cellpadding="10" cellspacing="0" width="100%">
  <tr>
    <td align="center"><h1 style="font-size:18px; color:#29a7da">Album</h1></td>
  </tr>
  <tr>
    <td align="center">    
   		 <table border="0" cellpadding="10">
                            
        <tr>
        
        <?php
		
            $imagenm_extra='';
			$result_extra_image=getdata("select imagenm,substr(description,0,100),albumid from tbldatingalbummaster where currentstatus=0 and CreateBy =$dispayuserid limit 0,3");
			while($rs_extra_images= mysqli_fetch_array($result_extra_image))
			{  
			    $imagenm_extra=$rs_extra_images['imagenm'];
			 ?>
         
                    <th scope="col" width="33.33%">
                                        
       
                    <?php if($imagenm_extra!=""){?>
            	<img src="<?= $sitepath ?>uploadfiles/<?= $imagenm_extra ?>" />
                <?php } else {?><img  src="<?=$sitepath?>uploadfiles/noimage.gif" />   <?php } ?>
                    
                                                    
                    </th>
                    
                      <?  } ?>
            
         </tr>   
         
         
            <tr>
        
        <?php
		
            $imagenm_extra='';
			$result_extra_image=getdata("select imagenm,substr(description,0,100),albumid from tbldatingalbummaster where currentstatus=0 and CreateBy =$dispayuserid limit 3,5");
			while($rs_extra_images= mysqli_fetch_array($result_extra_image))
			{  
			    $imagenm_extra=$rs_extra_images['imagenm'];
			 ?>
         
                    <th scope="col" width="33.33%">
                                        
       
                    <?php if($imagenm_extra!=""){?>
            	<img src="<?= $sitepath ?>uploadfiles/<?= $imagenm_extra ?>" />
                <?php } else {?><img  src="<?=$sitepath?>uploadfiles/noimage.gif" />   <?php } ?>
                                                     
                    </th>
                    
                      <?  } ?>
            
         </tr> 
                 
                
        </table>
      </td>
      </tr>
      </table>
  
  
  
  
  
  
  

<!------------------------------------------footer--------------------->         



<?
$companynamesetting=findsettingvalue("CompanyName");
$companyaddresssetting=findsettingvalue("CompanyAddress");
$footerlink=findsettingvalue("footerlink");
?>

<table style=""width="100%" cellspacing="0" cellpadding="15">
  <tbody>
     
    
    <tr style="background-color:#29a7da;">
      <td>
            <span>
            <?=$footerlink?>-<?=$companynamesetting?><br/>
            <? //=$companyaddresssetting?>
            </span>
      </td>
    </tr>
  </tbody>
</table>
     
    
     

     
     
      
</body>