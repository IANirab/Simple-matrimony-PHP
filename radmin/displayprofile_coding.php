<?
//@session_start();
//ob_start();

//include("commonfileadmin.php");

require_once("xml_parser.php");
//checkdesklogin();
if(isset($_GET['b']) && $_GET['b']!=''){
	$dispayuserid = $_GET['b'];	
}
$genid ="";
$profile_code = "";
$blood_group = "";
$lastlogin = "";
$birthtime = "";
$birthplace = "";
$religiosness_id = "";
$hijab_id = "";
$beard_id = "";
$revert_islam_id = "";
$halal_strict_id = "";
$salah_perform_id = "";
$birthstar = "";
$occ_status = "";
$edu_pg_id = "";
$industry_id = "";
$work_function_id = "";
$instituteid = "";
$annual_income_id = "";
$father_name = "";
$mother_name = "";
$nristatus='';
$profile_viewedonly = getonefielddata("SELECT profile_viewedonly from tbldatingusermaster WHERE userid=".$dispayuserid);
$profile_full_view = 'Y';





$pkgprice = '';

if (!isset($_SESSION[$session_name_initital . "send_email_view_profile_user_id"]))
{
	//session_register($session_name_initital . "send_email_view_profile_user_id");
	$_SESSION[$session_name_initital . "send_email_view_profile_user_id"] = "0";
}
//$dispayuserid = getsimpleid("b");
$chatrimg = "";
$chatrimgalt = "";
$commonque = datinguserwhereque() . " and userid =$dispayuserid ";
if (isset($_SESSION[$session_name_initital . "adminlogin"]))
	if ($_SESSION[$session_name_initital . "adminlogin"] != "")
	$commonque = " userid =$dispayuserid ";

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
$backlink ="";
$hiv = "";
$thelisimia = "";
$illiness = "";
$userid = "";
$edit_link = "";
$zodiacsign = "";
$born_year ="";
$revertid = "";
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


$petranal_grand_father_name ='';
$petranal_grand_mother_name ='';
$metranal_grand_father_name  ='';
$metranal_grand_mother_name  ='';
$religion_interest='';
$chr_denomination='';
$ignore_horo='';



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
// Haresh code starts Here
		$planetname1 = '';
		$platname1_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 1 and userid=$dispayuserid");
		$nmrows1 = mysqli_num_rows($platname1_qry);
		$i=1;
		while($planet1_rs = mysqli_fetch_array($platname1_qry)){
			if($i==$nmrows1){
				$planetname1 .= $planet1_rs[0];
			} else {
				$planetname1 .= $planet1_rs[0].", ";	
			}	
			$i++;
		}
		
		
		$planetname2 = '';
		$platname2_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 2 and userid=$dispayuserid");
		$nmrows2 = mysqli_num_rows($platname2_qry);
		$i=1;
		while($planet2_rs = mysqli_fetch_array($platname2_qry)){
			if($i==$nmrows2){
				$planetname2 .= $planet2_rs[0];
			} else {
				$planetname2 .= $planet2_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname2 = substr($planetname2,0,-1);
		
		
		$planetname3 = '';
		$platname3_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 3 and userid=$dispayuserid");
		$nmrows3 = mysqli_num_rows($platname3_qry);
		$i=1;
		while($planet3_rs = mysqli_fetch_array($platname3_qry)){
			if($i==$nmrows3){
				$planetname3 .= $planet3_rs[0];
			} else {
				$planetname3 .= $planet3_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname3 = substr($planetname3,0,-1);
		
		
		$planetname4 = '';
		$platname4_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 4 and userid=$dispayuserid");
		$nmrows4 = mysqli_num_rows($platname4_qry);
		$i=1;
		while($planet4_rs = mysqli_fetch_array($platname4_qry)){
			if($i==$nmrows4){
				$planetname4 .= $planet4_rs[0];
			} else {
				$planetname4 .= $planet4_rs[0].", ";	
			}	
			$i++;

		}
		//$planetname4 = substr($planetname4,0,-1);
		
		
		$planetname5 = '';
		$platname5_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 5 and userid=$dispayuserid");
		$nmrows5 = mysqli_num_rows($platname5_qry);
		$i=1;
		while($planet5_rs = mysqli_fetch_array($platname5_qry)){
			if($i==$nmrows5){
				$planetname5 .= $planet5_rs[0];
			} else {
				$planetname5 .= $planet5_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname5 = substr($planetname5,0,-1);
		
		$planetname6 = '';
		$platname6_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 6 and userid=$dispayuserid");
		$nmrows6 = mysqli_num_rows($platname6_qry);
		$i=1;
		while($planet6_rs = mysqli_fetch_array($platname6_qry)){
			if($i==$nmrows6){
				$planetname6 .= $planet6_rs[0];
			} else {
				$planetname6 .= $planet6_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname6 = substr($planetname6,0,-1);
		
		$planetname7 = '';
		$platname7_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 7 and userid=$dispayuserid");
		$nmrows7 = mysqli_num_rows($platname7_qry);
		$i=1;
		while($planet7_rs = mysqli_fetch_array($platname7_qry)){
			if($i==$nmrows7){
				$planetname7 .= $planet7_rs[0];
			} else {
				$planetname7 .= $planet7_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname7 = substr($planetname7,0,-1);	
		
		$planetname8 = '';
		$platname8_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 8 and userid=$dispayuserid");
		$nmrows8 = mysqli_num_rows($platname8_qry);
		$i=1;
		while($planet8_rs = mysqli_fetch_array($platname8_qry)){
			if($i==$nmrows8){
				$planetname8 .= $planet8_rs[0];
			} else {
				$planetname8 .= $planet8_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname8 = substr($planetname8,0,-1);
		
		$planetname9 = '';
		$platname9_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 9 and userid=$dispayuserid");
		$nmrows9 = mysqli_num_rows($platname9_qry);
		$i=1;
		while($planet9_rs = mysqli_fetch_array($platname9_qry)){
			if($i==$nmrows9){
				$planetname9 .= $planet9_rs[0];
			} else {
				$planetname9 .= $planet9_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname9 = substr($planetname9,0,-1);
		
		
		$planetname10 = '';
		$platname10_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 10 and userid=$dispayuserid");
		$nmrows10 = mysqli_num_rows($platname10_qry);
		$i=1;
		while($planet10_rs = mysqli_fetch_array($platname10_qry)){
			if($i==$nmrows10){
				$planetname10 .= $planet10_rs[0];
			} else {
				$planetname10 .= $planet10_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname10 = substr($planetname10,0,-1);
		
		
		$planetname11 = '';
		$platname11_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 11 and userid=$dispayuserid");
		$nmrows11 = mysqli_num_rows($platname11_qry);
		$i=1;
		while($planet11_rs = mysqli_fetch_array($platname11_qry)){
			if($i==$nmrows11){
				$planetname11 .= $planet11_rs[0];
			} else {
				$planetname11 .= $planet11_rs[0].", ";	
			}	
			$i++;
		}
		
		$planetname12 = '';
		$platname12_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 12 and userid=$dispayuserid");
		$nmrows12 = mysqli_num_rows($platname12_qry);
		$i=1;
		while($planet12_rs = mysqli_fetch_array($platname12_qry)){
			if($i==$nmrows12){
				$planetname12 .= $planet12_rs[0];
			} else {
				$planetname12 .= $planet12_rs[0].", ";	
			}	
			$i++;
		}

$result = getdata("select name,genderid,countryid,state,city,area,imagenm,". findage() . ",profileheadline,date_format(dob,'$date_format'),userid,date_format(lastlogin,'$date_format'),hiv,thelisimia,illiness,zodiacsign,year(dob),blood_group,image_password_protect,revert_islam_id, prayer_id, zakat_id, fasting_id, quran_id, ethnic,native_place,hobbies,music,interest,fav_read,fav_cuisines,dress_styles,fitness,occupationstatusid,service_state,service_city,birthrashi,prefer_star,date_format(modifydate,'$date_format') as mdate,father_name,mother_name,mainimagenm,father_nameofc,mother_nameofc,adfpgrandfather,adfpgrandmother,adfmgrandfather,adfmgrandmother,religion_interest,chr_denomination,nristatus,ignore_horo  FROM tbldatingusermaster where $commonque ");
$displayotherdetail = "";
while($rs= mysqli_fetch_array($result))
{
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
	
	
	$petranal_grand_father_name = $rs['adfpgrandfather'];	
	$petranal_grand_mother_name = $rs['adfpgrandmother'];
	$metranal_grand_father_name = $rs['adfmgrandfather'];	
	$metranal_grand_mother_name = $rs['adfmgrandmother'];
		
     $religion_interest = $rs['religion_interest'];
	 $chr_denomination = $rs['chr_denomination'];
	 
	
	
	
	
	$imagenm = $rs[6];	
	$imagenm = find_user_image($dispayuserid,"Y","","");	
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
	    $hobbies =$rs['hobbies'];
		//$hobbies = findihtitle($rs['hobbies'],"tbl_hobbies_master");
	}
	if($rs['music']!=""){
		$music =$rs['music'];
		//$music = findihtitle($rs['music'],"tbl_music_master");
	}
	if($rs['interest']!=""){
		$interest =$rs['interest'];
		//$interest = findihtitle($rs['interest'],"tbl_interest_master");
	}
	if($rs['fav_read']!=""){
		$fav_read =$rs['fav_read'];
		//$fav_read = findihtitle($rs['fav_read'],"tbl_favourite_read_master");
	}
	if($rs['fav_cuisines']!=""){
		$fav_cuisines =$rs['fav_cuisines'];
		//$fav_cuisines = findihtitle($rs['fav_cuisines'],"tbl_favourite_cuisines_master"); 
	}
	if($rs['dress_styles']!=""){
		$dress_styles =$rs['dress_styles'];
		//$dress_styles = findihtitle($rs['dress_styles'],"tbl_favourite_dress_master"); 
	}
	if($rs['fitness']!=""){
		$fitness =$rs['fitness'];
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
	/*if($rs['personal_value']!="" && $rs['personal_value']!="0.0"){		
		$personal_level = getonefielddata("SELECT title from tbldatingpersonalmaster WHERE id=".$rs['personal_value']);
	} else {*/
		$personal_level = "";	
	//}	
	$blood_group=findtitleofprofilefld($rs[17],"tbldating_blood_group_master");
	
			
	$profile_code = find_profile_code($dispayuserid);
	
	if ($hiv == "Y")
		$hiv = $updatepersonalprofilehiv_yes;
	else
		$hiv = $updatepersonalprofilehiv_no;
	if ($thelisimia == "Y")
		$thelisimia = $updatepersonalprofilethelisimia_yes;
	else
		$thelisimia = $updatepersonalprofilethelisimia_no;
	

	$nristatus=$rs['nristatus'];
	
	
	$mainimagenm = $rs['mainimagenm'];
	if($mainimagenm==''){
		$mainimagenm = 'big_noimage.png';	
	}
}
	freeingresult($result);



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

$result = getdata("select profilecreatebyid,lookingforid,maritalstatusid,kidsid,heightid,weightid, eyecolorid,bodytypeid,complexionid,specialcasesid,mobile,landline,callingtime,country_code,city_code,address,email,remarks,contact_person_on_phone  FROM tbldatingusermaster where $commonque ");
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
	$country_code = $rs['country_code'];
	$city_code = $rs['city_code'];
	$mobile = $rs['mobile'];
	$phno = $rs['landline'];
	
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
$edudetails='';
$company_name='';
$working_partner= '';
$result = getdata("select educationid,ocupationid,annualincome,education_detail,occupation_detail,edu_pg_id,edu_pg_other,industry_id,industry_other,work_function_id,work_function_other,instituteid,institute_other,service_location,service_area,annual_income_currancyid,annual_income_id,edudetails,company_name,working_partner  FROM tbldatingusermaster where $commonque ");
while($rs= mysqli_fetch_array($result))
{
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
	
	$edudetails=$rs['edudetails'];
	$company_name=$rs['company_name'];
	$working_partner=$rs['working_partner'];
	
	 $annual_income_currancyid_get = getonefielddata("select annincome_curr from tbldatingpartnerprofilemaster where userid =$dispayuserid");;
	   if($annual_income_currancyid_get!='0.0'){
$annual_income_currancyid_new=findtitleofprofilefld($annual_income_currancyid_get,"tbldating_annual_income_currancy_master");	
	   }
	
	
	
}
	freeingresult($result);
$dietid= "";
$smokerstatusid = "";
$drinkerstatusid= "";

$result = getdata("select dietid, smokerstatusid,drinkerstatusid  FROM tbldatingusermaster where $commonque ");
while($rs= mysqli_fetch_array($result))
{
	$dietid= findtitleofprofilefld($rs[0],"tbldatingdietmaster");
	$smokerstatusid = findtitleofprofilefld($rs[1],"tbldatingsmokerstatusmaster");
	$drinkerstatusid = findtitleofprofilefld($rs[2],"tbldatingdrinkerstatusmaster");
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


$familystatusid='';
$familystatus='';
$familytypeid='';
$familytype='';

$father_company_address='';
$mother_company_address='';


$result = getdata("select personality,familybackground,hobbiesintrest, personalvalueid,wantchildrenid,father_occupation,mother_occupation,brother_married1, brother_married2,brother_unmarried1,brother_unmarried2,sister_married1,sister_married2, sister_unmarried1,sister_unmarried2,father_status_id,mother_status_id,occupationstatusid,familystatusid,familytypeid,father_nameofc,mother_nameofc  FROM tbldatingusermaster where $commonque ");
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
		
	
	
	$familystatusid = $rs['familystatusid'];
	if($familystatusid!= ''){
	$familystatus = getonefielddata("select title from tbldatingfamilyvaluemaster WHERE id=".$familystatusid);
	}
	$familytypeid = $rs['familytypeid'];
	if($familytypeid!= ''){
	$familytype = getonefielddata("select title from tbldatingfamilyvaluemaster WHERE id=".$familytypeid);
	}
	
	
	
	$father_company_address = $rs['father_nameofc'];	
	$mother_company_address = $rs['mother_nameofc'];
	
	
	
	
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
$pagetitle = $profile_code." from ".$countryid." is looking for ".$religianid." matrimonial partner ";

$sitetitle = "<title>" . $pagetitle ."</title>";
$meta_key = "<meta name='keywords' content='" . $genderid  . "," . $motherthoungid  . "," . $countryid . "," . $religianid . "," . $castid . "," .	$subcast . "," . $educationid . "'>";
$meta_desc = "<meta name='description' content='$headline $pagetitle $motherthoungid $religianid $diaplayprofilepgtitle_mess4' />";

$acceptlink = "";
$declinedlink = "";


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
ob_flush();
?>