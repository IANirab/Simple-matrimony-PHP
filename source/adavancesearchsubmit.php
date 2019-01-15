<? ob_start();
include("commonfile.php");
//require_once("chatfunction.php");
$session_id = session_id();
$_SESSION[$session_name_initital . "searchquery"] = '';
$_SESSION[$session_name_initital . "searchquery_original"] = ''; 
if($enable_search_without_registration=='N' && !isset($_SESSION[$session_name_initital . "memberuserid"])){
	header("location:login.php");	
	exit;
}
$cnt_children = getonefielddata("select count(id) from tbldatingkidsmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
$cnt_complexion = getonefielddata("select count(id) from tbldatingcomplexionmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
$cnt_specialcase = getonefielddata("select count(id) from tbldatingspecialcasemaster where currentstatus =0 and languageid=$sitelanguageid order by title");
$cnt_language = getonefielddata("select count(id) from tbldatinglanguagemaster where currentstatus =0 and languageid=$sitelanguageid order by title");
$cnt_education = getonefielddata("select count(id) from tbl_education_master where currentstatus =0 order by title");
$cnt_cast = getonefielddata("select count(id) from tbldatingcastmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
$cnt_subcast = getonefielddata("select count(id) from tbldatingsubcastmaster where currentstatus =0 and languageid=$sitelanguageid order by title");

$chkchildren = "";
for($i=1; $i<=$cnt_children; $i++){
	if(isset($_POST['chkhavechildren'.$i]) && $_POST['chkhavechildren'.$i]!=""){
		$chkchildren .= $_POST['chkhavechildren'.$i].",";
	}	
}
$chkchildren = substr($chkchildren,0,strlen($chkchildren)-1);

$chkcomplexion = "0";
//for cast start
$chkcast = "";

$annualincome = "";
if(isset($_POST['ann_arr']) && $_POST['ann_arr']!=""){
	$annualincome = implode(",",$_POST['ann_arr']);
}


$chkspecialcase = "0";
if(isset($_POST['special_arr']) && $_POST['special_arr']!=""){
	$chkspecialcase = implode(",",$_POST['special_arr']);
}
$chkcast = "";
if(isset($_POST['cast_arr']) && $_POST['cast_arr']!=""){
	$chkcast = implode(",",$_POST['cast_arr']);	
}

//for cast end

//for subcast start
$chksubcast = "";
if(isset($_POST['subcast_arr']) && $_POST['subcast_arr']!=""){
	$chksubcast = implode(",",$_POST['subcast_arr']);
}



//for subcast end


$chklanguage = "";
$languageuserid = "";
if(isset($_POST['lang_arr']) && $_POST['lang_arr']!=""){
	$chklanguage = implode(",",$_POST['lang_arr']);
	$languageuserid = implode(",",$_POST['lang_arr']);
}

$chkadveducation = "";

$chkadveducation = "";
if(isset($_POST['edu_arr']) && $_POST['edu_arr']){
	$chkadveducation = implode(",",$_POST['edu_arr']);
}



$_SESSION[$session_name_initital . "search_countries"] = "";
$_SESSION[$session_name_initital . "search_residence"] = "";
$_SESSION[$session_name_initital . "search_mangalik"] = "";
$_SESSION[$session_name_initital . "search_social"] = "";
$_SESSION[$session_name_initital . "search_work"] = "";
$_SESSION[$session_name_initital . "search_work_cntry"] = "";
$_SESSION[$session_name_initital."search_work_state"] = "";
$_SESSION[$session_name_initital."search_work_city"] = "";
$_SESSION[$session_name_initital . "search_occupation"] = "";
$_SESSION[$session_name_initital . "search_occupation_status"] = "";
$_SESSION[$session_name_initital . "search_diet"] = "";
$_SESSION[$session_name_initital . "search_smoke"] = "";
$_SESSION[$session_name_initital . "search_drinker"] = "";
$_SESSION[$session_name_initital . "search_bodytype"] = "";
$_SESSION[$session_name_initital . "search_marital"] = "";
$_SESSION[$session_name_initital . "search_state"] = "";
$_SESSION[$session_name_initital . "search_city"] = "";

$_SESSION[$session_name_initital . "search_advname"] = "";
if ($ethnic_field_enable == "Y"){
$_SESSION[$session_name_initital . "search_ethnic"] = "";
}
$_SESSION[$session_name_initital . "search_advminage"] = "";
$_SESSION[$session_name_initital . "search_advmaxage"] = "";
$_SESSION[$session_name_initital . "search_cmbreligian"] = "";

$_SESSION[$session_name_initital . "search_chkcast"] = "";
$_SESSION[$session_name_initital . "search_chksubcast"] = "";

$_SESSION[$session_name_initital . "search_advsubcast"] = "";
$_SESSION[$session_name_initital . "search_advweight1"] = "";
$_SESSION[$session_name_initital . "search_advweight2"] = "";
$_SESSION[$session_name_initital . "search_advheight1"] = "";
$_SESSION[$session_name_initital . "search_advheight2"] = "";
$_SESSION[$session_name_initital . "search_radshowmember"] = "";
$_SESSION[$session_name_initital . "search_radsortsearchresult"] = "";
$_SESSION[$session_name_initital . "search_raddispresult"] = "";
$_SESSION[$session_name_initital . "search_chkonline"] = "";
$_SESSION[$session_name_initital . "search_chkchildren"] = "";
$_SESSION[$session_name_initital . "search_chkcomplexion"] = "";
$_SESSION[$session_name_initital . "search_chkspecialcase"] = "";
$_SESSION[$session_name_initital . "search_chklanguage"] = "";
$_SESSION[$session_name_initital . "search_chkadveducation"] = "";
$_SESSION[$session_name_initital . "search_annualincome"] = "";

if($annualincome!=""){
	$_SESSION[$session_name_initital . "search_annualincome"] = $annualincome;
}



if(isset($_POST['advname']) && $_POST['advname']!=""){
	$_SESSION[$session_name_initital . "search_advname"] = $_POST['advname'];
}
if ($ethnic_field_enable == "Y"){
	if(isset($_POST['ethnic']) && $_POST['ethnic']!="0.0"){
		$_SESSION[$session_name_initital . "search_ethnic"] = $_POST['ethnic'];
	}
}

if(isset($_POST['advminage']) && $_POST['advminage']){
	$_SESSION[$session_name_initital . "search_advminage"] = $_POST['advminage'];
}

if(isset($_POST['advmaxage']) && $_POST['advmaxage']){
	$_SESSION[$session_name_initital . "search_advmaxage"] = $_POST['advmaxage'];
}

if(isset($_POST['cmbreligian']) && $_POST['cmbreligian']){
	$_SESSION[$session_name_initital . "search_cmbreligian"] = $_POST['cmbreligian'];
}

/*if(isset($_POST['cmbcast']) && $_POST['cmbcast']){
	$_SESSION[$session_name_initital . "search_cmbcast"] = $_POST['cmbcast'];
}*/

if(isset($_POST['advsubcast']) && $_POST['advsubcast']){
	$_SESSION[$session_name_initital . "search_advsubcast"] = $_POST['advsubcast'];
}

if(isset($_POST['advweight1']) && $_POST['advweight1']){
	$_SESSION[$session_name_initital . "search_advweight1"] = $_POST['advweight1'];
}

if(isset($_POST['advweight2']) && $_POST['advweight2']){
	$_SESSION[$session_name_initital . "search_advweight2"] = $_POST['advweight2'];
}

if(isset($_POST['advheight1']) && $_POST['advheight1']){
	$_SESSION[$session_name_initital . "search_advheight1"] = $_POST['advheight1'];
}

if(isset($_POST['advheight2']) && $_POST['advheight2']){
	$_SESSION[$session_name_initital . "search_advheight2"] = $_POST['advheight2'];
}

if(isset($_POST['radshowmember']) && $_POST['radshowmember']){
	$_SESSION[$session_name_initital . "search_radshowmember"] = $_POST['radshowmember'];
}

if(isset($_POST['radsortsearchresult']) && $_POST['radsortsearchresult']){
	$_SESSION[$session_name_initital . "search_radsortsearchresult"] = $_POST['radsortsearchresult'];
}

if(isset($_POST['raddispresult']) && $_POST['raddispresult']){
	$_SESSION[$session_name_initital . "search_raddispresult"] = $_POST['raddispresult'];
	$_SESSION[$session_name_initital . "search_grid_design_display"] = $_POST['raddispresult'];
}

if(isset($_POST['chkonline']) && $_POST['chkonline']){
	$_SESSION[$session_name_initital . "search_chkonline"] = $_POST['chkonline'];
}

if($chkcast!=""){
	$_SESSION[$session_name_initital . "search_chkcast"] = $chkcast;
}

if($chksubcast!=""){
	$_SESSION[$session_name_initital . "search_chksubcast"] = $chksubcast;
}

if($chkchildren!=""){
	$_SESSION[$session_name_initital . "search_chkchildren"] = $chkchildren;	
}

if($chkcomplexion!=""){
	$_SESSION[$session_name_initital . "search_chkcomplexion"] = $chkcomplexion;
}

if($chkspecialcase!=""){
	$_SESSION[$session_name_initital . "search_chkspecialcase"] = $chkspecialcase;
}
if($chklanguage!=""){
	$_SESSION[$session_name_initital . "search_chklanguage"] = $chklanguage;
}

if($chkadveducation!=""){
	$_SESSION[$session_name_initital . "search_chkadveducation"] = $chkadveducation;
}

$countries_str = "";
if(isset($_POST['cor_arr']) && $_POST['cor_arr']!=""){
	$countries_str = implode(",",$_POST['cor_arr']);
	$_SESSION[$session_name_initital . "search_countries"] = $countries_str;	
}

$residence_str = 0;
if(isset($_POST['crs_arr']) && $_POST['crs_arr']!=""){
	$residence_str = implode(",",$_POST['crs_arr']);
	$_SESSION[$session_name_initital . "search_residence"] = $residence_str;
}

$mangalik_str = 0;
if(isset($_POST['mangalik_arr']) && $_POST['mangalik_arr']!=""){
	$mangalik_str = implode(",",$_POST['mangalik_arr']);
	$_SESSION[$session_name_initital . "search_mangalik"] = $mangalik_str;	
}


$social_str = 0;
if(isset($_POST['social_arr']) && $_POST['social_arr']!=""){
	$social_str = implode(",",$_POST['social_arr']);	
	$_SESSION[$session_name_initital . "search_social"] = $social_str;
}


$work_str = 0;
if(isset($_POST['work_arr']) && $_POST['work_arr']!=""){
$work_arr = $_POST['work_arr'];
$work_str = "";
for($i=0; $i<count($work_arr); $i++){
	$work_str .= $work_arr[$i].",";
}
	$work_str = substr($work_str,0,strlen($work_str)-1);
	$_SESSION[$session_name_initital . "search_work"] = $work_str;
}

$work_country_str = 0;
if(isset($_POST['wic_arr']) && $_POST['wic_arr']!=""){
	$work_country_str = implode(",",$_POST['wic_arr']);
	$_SESSION[$session_name_initital . "search_work_cntry"] = $work_country_str;
}
$work_city_str = 0;
if(isset($_POST['pow_arr']) && $_POST['pow_arr']){
	$work_city_str = implode(",",$_POST['pow_arr']);
	$_SESSION[$session_name_initital."search_work_city"] = $work_city_str;		
}

$occupation_str = 0;
if(isset($_POST['occ_arr']) && $_POST['occ_arr']!=""){
	$occupation_str = implode(",",$_POST['occ_arr']); 
	$_SESSION[$session_name_initital . "search_occupation"] = $occupation_str;	
}


$occupation_status_str = 0;
if(isset($_POST['occs_arr']) && $_POST['occs_arr']!=""){
	$occupation_status_str = implode(",",$_POST['occs_arr']);
	$_SESSION[$session_name_initital . "search_occupation_status"] = $occupation_status_str;
}


$diet_str = 0;
if(isset($_POST['diet_arr']) && $_POST['diet_arr']!=""){
	$diet_str = implode(",",$_POST['diet_arr']);
	$_SESSION[$session_name_initital . "search_diet"] = $diet_str;
}

$smoker_str = 0;
if(isset($_POST['smoke_arr']) && $_POST['smoke_arr']!=""){
	$smoker_str = implode(",",$_POST['smoke_arr']);
	$_SESSION[$session_name_initital . "search_smoke"] = $smoker_str;	
}

$drinker_str = 0;
if(isset($_POST['drink_arr']) && $_POST['drink_arr']!=""){
	$drinker_str = implode(",",$_POST['drink_arr']);
	$_SESSION[$session_name_initital . "search_drinker"] = $drinker_str;		
}

$bodytype_str = 0;
if(isset($_POST['body_arr']) && $_POST['body_arr']!=""){
	$bodytype_str =  implode(",",$_POST['body_arr']);
	$_SESSION[$session_name_initital . "search_bodytype"] = $bodytype_str;	
}



$marital_str = 0;
if(isset($_POST['marital_arr']) && $_POST['marital_arr']!=""){
	$marital_str = implode(",",$_POST['marital_arr']);
	$_SESSION[$session_name_initital . "search_marital"] = $marital_str;	
}


$state_str = 0;
if(isset($_POST['sor_arr']) && $_POST['sor_arr']!=""){
	$state_str = implode(",",$_POST['sor_arr']);
	$_SESSION[$session_name_initital . "search_state"] = $state_str;
}


$city_str = 0;
if(isset($_POST['cityor_arr']) && $_POST['cityor_arr']!=""){
	$city_str = implode(",",$_POST['cityor_arr']);
	$_SESSION[$session_name_initital . "search_city"] = $city_str;
}

if (isset($advance_search_login_required))
if ($advance_search_login_required == "Y")
checklogin($sitepath);
$_SESSION[$session_name_initital . "searchincludelookingfor"] ="";
$_SESSION[$session_name_initital . "searchincludeminage"] ="";
$_SESSION[$session_name_initital . "searchincludemaxage"] ="";
$_SESSION[$session_name_initital . "searchincludecountry"] ="";
$_SESSION[$session_name_initital . "searchincludereligian"] ="";
$_SESSION[$session_name_initital . "searchincludecommunity"] ="";
$_SESSION[$session_name_initital . "searchincludewith_photo"] ="";

$que = "";
if (isset($_POST["advname"]))
if ($_POST["advname"] != "")
	$que .= " (tbldatingusermaster.name like '%". $_POST["advname"] . "%' or  tbldatingusermaster.nickname like '%". check_lalid_length_input($_POST["advname"]) . "%') and ";
	
if ($ethnic_field_enable == "Y"){
	if(isset($_POST['ethnic']) && $_POST['ethnic']!="0.0"){
		$que .="tbldatingusermaster.ethnic=".$_POST['ethnic']." AND ";
	}
}	

if ((isset($_POST["advlookingfor"])) &&  (is_numeric($_POST["advlookingfor"])))
if ($_POST["advlookingfor"] != "0.0")
{
	$que .= " tbldatingusermaster.genderid=" . $_POST["advlookingfor"] . " and " ;
	$_SESSION[$session_name_initital . "searchincludelookingfor"] = $_POST["advlookingfor"];
}
if ((isset($_POST["advminage"])) &&  (is_numeric($_POST["advminage"])))
if ($_POST["advminage"] != "0.0")
{
$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= " . $_POST["advminage"] . " and " ;
$_SESSION[$session_name_initital . "searchincludeminage"] = $_POST["advminage"];
}

if ((isset($_POST["advmaxage"])) &&  (is_numeric($_POST["advmaxage"])))
if ($_POST["advmaxage"] != "0.0")
{
	$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <=" . $_POST["advmaxage"] . " and " ;
	$_SESSION[$session_name_initital . "searchincludemaxage"] = $_POST["advmaxage"];
}	
	
//if ((isset($_POST["countries_arr"])) &&  (is_numeric($_POST["advcountry"])))
//if(isset($_POST['countries_arr']) && $_POST['countries_arr']!="")
if($countries_str != "")
{
	$country_arr = explode(",",$countries_str);
	$country_que = '(';
	for($i=0; $i<count($country_arr); $i++){
		$country_que .= "tbldatingusermaster.countryid = ".$country_arr[$i]." OR ";
	}
	$que .= substr($country_que,0,-4).") and ";
	//$que .= " tbldatingusermaster.countryid IN (" . $countries_str . ") and " ;
	$_SESSION[$session_name_initital . "searchincludecountry"] = $countries_str;
	
}
if(isset($_GET['cntry']) && $_GET['cntry']){
	$que .= " tbldatingusermaster.countryid IN (".$_GET['cntry'].") and ";
}
if ($residence_str != "0"){
	$residen_arr = explode(",",$residence_str);
	$residen_que = "(";
	for($i=0; $i<count($residen_arr); $i++){
		$residen_que .= "tbldatingusermaster.residancystatusid=".$residen_arr[$i]." OR ";
	}
	$que = substr($residen_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.residancystatusid in ($residence_str) and ";
}
	


if($state_str!="0"){
	$state_arr = explode(",",$state_str);
		$state_que = "(";
		for($i=0; $i<count($state_arr); $i++){
			$state_que .= "tbldatingusermaster.state=".$state_arr[$i]." OR ";
		}
		$que .= substr($state_que,0,-4).") and ";
		//$que .= " tbldatingusermaster.state in ($state_str) and ";

}	
	
/*if (isset($_POST["advcity"]))
if ($_POST["advcity"] != "")
	$que .= setforsplitfield(check_lalid_length_input($_POST["advcity"])," tbldatingusermaster.city ");*/
	//$que .= " tbldatingusermaster.city like '%". $_POST["advcity"] . "%' and ";
	
if($city_str != "0"){
	$cit_arr = explode(",",$city_str);
	$city_que = "(";
	for($i=0; $i<count($cit_arr); $i++){
		$city_que .= "tbldatingusermaster.city = ".$cit_arr[$i]." OR ";	
	}
	$que .= substr($city_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.city in ($city_str) and ";
}
	
if (isset($_POST["advarea"]))
if ($_POST["advarea"] != "")
	$que .= setforsplitfield(check_lalid_length_input($_POST["advarea"])," tbldatingusermaster.area ");
	//$que .= " tbldatingusermaster.area like '%". $_POST["advarea"] . "%' and ";

//if (isset($_POST["advreligiancast"]))
//if ($_POST["advreligiancast"] != "0.0")
//	$que .= " tbldatingusermaster.castid = ". $_POST["advreligiancast"] ." and ";
$_SESSION[$session_name_initital . "searchincludereligian"]="";
if (isset($_POST["cmbreligian"]))
if ($_POST["cmbreligian"] != "0.0")
{
	$que .= " tbldatingusermaster.religianid = ". $_POST["cmbreligian"] ." and ";
	$_SESSION[$session_name_initital . "searchincludereligian"]=$_POST["cmbreligian"];
}	
	
if ($Enable_cast_subcast_design_setting == "Y") 
{
/*if (isset($_POST["cmbcast"]))
if ($_POST["cmbcast"] != "0.0")*/
if($chkcast!=""){
	$chkcast_arr = explode(",",$chkcast);
	$chkcast_que = '(';
	for($i=0; $i<count($chkcast_arr); $i++){
		$chkcast_que .= "tbldatingusermaster.castid = ".$chkcast_arr[$i]." OR ";
	}
	$que .= substr($chkcast_que,0,-4).") and ";
	//$que .= " tbldatingusermaster.castid IN (". $chkcast .") and ";	
}

/*if (isset($_POST["advsubcast"]))
if ($_POST["advsubcast"] != "")*/
	//$que .= setforsplitfield(check_lalid_length_input($_POST["advsubcast"])," tbldatingusermaster.subcast ");
if($chksubcast!=""){
	//$que .= " tbldatingusermaster.castid IN (". $chksubcast .") and ";
	$chksbcast_arr = explode(",",$chksubcast);
	$chksbcast_que = '(';
	for($i=0; $i<count($chksbcast_arr); $i++){
		$chksbcast_que .= "tbldatingusermaster.subcast like '%".$chksbcast_arr[$i]."%' OR ";
	}
	$que .= substr($chksbcast_que,0,-4).") and ";
	//$que .= " tbldatingusermaster.subcast like '%". $chksubcast . "%' and ";
}
}
	

if (isset($_POST["advgotra"]))
{
if ($_POST["advgotra"] != "")
	$que .= setforsplitfield($_POST["advgotra"]," tbldatingusermaster.gotra ");
	//$que .= " tbldatingusermaster.gotra like '%". $_POST["advgotra"] . "%' and ";
}

if (isset($_POST["mangalik_arr"]))
if ($mangalik_str != "0")
	$que .= " tbldatingusermaster.grahid IN (". $mangalik_str . ") and ";
	
/*$mothertongue = "0";
$result = getdata("select id,title from tbldatingmothertonguemaster where currentstatus =0 and languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkadvmothertongue" . $rs[0]]))	
		$mothertongue .= "," . $rs[0];
}
freeingresult($result);*/
if ($social_str != "0"){
	$soci_arr = explode(",",$social_str);
	$soci_que = '(';
	for($i=0; $i<count($soci_arr); $i++){
		$soci_que .= "tbldatingusermaster.motherthoungid = ".$soci_arr[$i]." OR ";
	}
	$que .= substr($soci_que,0,-4).") and ";
	//$que .= " tbldatingusermaster.motherthoungid in ($social_str) and ";
}

if($work_str != 0)
	$que .= " tbldatingusermaster.work_in in ($work_str) and ";

if($work_country_str != "0"){
	$work_country_arr = explode(",",$work_country_str);
	$work_country_que = "(";
	for($i=0; $i<count($work_country_arr); $i++){
		$work_country_que .= "tbldatingusermaster.work_in_country = ".$work_country_arr[$i]." OR ";
	}
	$que .= substr($work_country_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.work_in_country in ($work_country_str) and ";
}
	
if($work_state_str != 0)
	$que .= " tbldatingusermaster.service_state in ($work_state_str) and ";
	
if($work_city_str != "0"){
	$work_city_arr = explode(",",$work_city_str);
	$work_city_que = "(";
	for($i=0; $i<count($work_city_arr); $i++){
		$work_city_que .= "tbldatingusermaster.service_city=".$work_city_arr[$i]." OR ";
	}
	$que .= substr($work_city_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.service_city in ($work_city_str) and ";
}
	
if($chkchildren !=""){
	$que .= " tbldatingusermaster.wantchildrenid in ($work_city_str) and ";
}

$familyvalues = "0";
$result = getdata("select id,title from tbldatingfamilyvaluemaster where currentstatus =0 and languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["advfamilyvalue" . $rs[0]]))	
		$familyvalues .= "," . $rs[0];
}
freeingresult($result);
if ($familyvalues != "0")
	$que .= " tbldatingusermaster.familyvalueid in ($familyvalues) and ";
	
/*$occupation = "0";
$result = getdata("select id,title from tbldatingoccupationmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["advoccupation" . $rs[0]]))	
		$occupation .= "," . $rs[0];
}
freeingresult($result);*/
if ($occupation_str != "0"){
	$occ_arr = explode(",",$occupation_str);
	$occ_que = '(';
	for($i=0; $i<count($occ_arr); $i++){
		$occ_que .= "tbldatingusermaster.ocupationid = ".$occ_arr[$i]." OR ";	
	}
	$que .= substr($occ_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.ocupationid in ($occupation_str) and ";
}
	
if($occupation_status_str != "0"){
	$occstatus_arr = explode(",",$occupation_status_str);
	$occstatus_que = '(';
	for($i=0; $i<count($occstatus_arr); $i++){
		$occstatus_que .= "tbldatingusermaster.occupationstatusid = ".$occstatus_arr[$i]." OR ";
	}
	$que .= substr($occstatus_que,0,-4).") and ";
	//$que .= " tbldatingusermaster.occupationstatusid in ($occupation_status_str) and ";
}
	
	
	
/*$educationid = "0";
$result = getdata("select id,title from tbl_education_master where currentstatus =0 and languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkadveducation" . $rs[0]]))	
		$educationid .= "," . $rs[0];
}
freeingresult($result);
if ($educationid != "0")
	$que .= " tbldatingusermaster.educationid in ($educationid) and ";*/
	
if($chkadveducation	!= ""){
	$chkedu_arr = explode(",",$chkadveducation);
	$chkedu_que = '(';
	for($i=0; $i<count($chkedu_arr); $i++){
		$chkedu_que .= "tbldatingusermaster.educationid = ".$chkedu_arr[$i]." OR ";
	}
	$que .= substr($chkedu_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.educationid in ($chkadveducation) and ";	
}


	
/*$dietid = "0";
$result = getdata("select id,title from tbldatingdietmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkadvdiet" . $rs[0]]))	
		$dietid .= "," . $rs[0];
}
freeingresult($result);*/
if ($diet_str != "0"){
	$diet_que_arr = explode(",",$diet_str);
	$diet_que = "(";
	for($i=0; $i<count($diet_que_arr); $i++){
		$diet_que .= "tbldatingusermaster.dietid = ".$diet_que_arr[$i]." OR ";	
	}
	$que .= substr($diet_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.dietid in ($diet_str) and ";
}
	

if ($smoker_str != "0"){
	$smoke_arr = explode(",",$smoker_str);
	$smoke_que = "(";
	for($i=0; $i<count($smoke_arr); $i++){
		$smoke_que .= "tbldatingusermaster.smokerstatusid = ".$smoke_arr[$i]." OR ";
	}
	$que .= substr($smoke_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.smokerstatusid in ($smoker_str) and ";
}
if ($drinker_str != "0"){
	$drinker_arr = explode(",",$drinker_str);
	$drinker_que = "(";
	for($i=0; $i<count($drinker_arr); $i++){
		$drinker_que .= "tbldatingusermaster.drinkerstatusid = ".$drinker_arr[$i]." OR ";
	}
	$que = substr($drinker_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.drinkerstatusid in ($drinker_str) and ";
}

if ($bodytype_str != "0"){
	$bodytype_arr = explode(",",$bodytype_str);
	$bodytype_que = "(";
	for($i=0; $i<count($bodytype_arr); $i++){
		$bodytype_que .= "tbldatingusermaster.bodytypeid = ".$bodytype_arr[$i]." OR ";
	}
	$que .= substr($bodytype_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.bodytypeid in ($bodytype_str) and ";
}
			
if (isset($_POST["advkeyword"]))
if ($_POST["advkeyword"] != "")
{
$keyword = check_lalid_length_input($_POST["advkeyword"]);
$que .= " (tbldatingusermaster.postcode like '%$keyword %' or  tbldatingusermaster.annualincome like '%$keyword %' or  tbldatingusermaster.personality like '%$keyword %' or  tbldatingusermaster.familybackground like '%$keyword %' or  tbldatingusermaster.profileheadline like '%$keyword %' or  tbldatingusermaster.hobbiesintrest like '%$keyword %'or  tbldatingusermaster.service_location like '%$keyword %'or  tbldatingusermaster.service_area like '%$keyword %') and ";
}
if(isset($_POST['with_photo']) && $_POST['with_photo']=='Y'){
	$que .= " imagenm!='' AND ";	
}
if(isset($_POST['left_searchkeyword']) && $_POST['left_searchkeyword']!=""){
$search_img = "";
	/*if(isset($_POST['with_photo']) && $_POST['with_photo']=="Y"){
		$search_img = "AND imagenm!=''";
	}*/	
	$string = $_POST['left_searchkeyword'];	
	$str = strstr($string,",");
	if($str != "" || $str=="" ){	
	//age operation start
	//$find_age = ereg_replace("[^0-9]", "*",$string);
	$find_age = preg_replace("[^0-9]", "*",$string);
	$find_more = strstr($find_age,"*");
	if($find_more!=""){
		$age_arr = explode("*",$find_age);
		$ar = array_unique($age_arr);
		$agr = array_values($ar);
		$count_agr = count($agr);
		$agge = "";
		for($i=0; $i<$count_agr; $i++){
			if($agr[$i]!=""){
				$agge .= $agr[$i].",";
			}
		}
		$agge = substr($agge,0,strlen($agge)-1);
		$arr_age = explode(",",$agge);
		if($arr_age!=''){
			$min = min($arr_age)-1;
			$max = max($arr_age)+1;
		} else {
			$min = '';
			$max = '';			
		}
		if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=""){
		$loginuserid = $_SESSION[$session_name_initital."memberuserid"];
		$genderid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$loginuserid);	
		if($min!='-1' && $max!='1'){
			$que .= "tbldatingusermaster.age between ".$min." AND ".$max." AND "; 	
		}
		$que .= "genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." OR round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >=".$min." AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <= ".$max." AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
		} else {
		if($min!='-1' && $max!='1'){
			$que .= "tbldatingusermaster.age between ".$min." AND ".$max." OR "; 	
		}	 
		$que .= "round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >=".$min." AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <= ".$max." AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
		}
	} if($find_age == "") {
		if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=""){
		$loginuserid = $_SESSION[$session_name_initital."memberuserid"];
		$genderid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$loginuserid);	
		$que .= "tbldatingusermaster.age=$find_age AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >=".$find_age." AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
		} else {
		//echo $find_age;
		$que .= "tbldatingusermaster.age=$find_age AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >=".$find_age." AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
		}
	}	
	//age operation end	
	if($str!=""){
	$arr = explode(",",$string);	
	$ss = "";
	$find_str = "";
	for($i=0; $i<count($arr); $i++){		
		//$ss = ereg_replace("[^0-9]", "",$arr[$i]);		
		$ss = preg_replace("[^0-9]", "",$arr[$i]);		
		if($ss == ""){
			$find_str .= str_replace($ss,"",$arr[$i]).",";
		}		
	}
	//echo "SELECT userid from tbldatingusermaster WHERE search_religion LIKE '%".$find_str."%'";
	$find_str = substr($find_str,0,strlen($find_str)-1);
	$find_arr = explode(",",$find_str);
	$cnt_arr = count($find_arr);
	//$religion_search = "SELECT userid from tbldatingusermaster WHERE ";
	$que .= " OR ";	
	if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=""){
		$loginuserid = $_SESSION[$session_name_initital."memberuserid"];
		$genderid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$loginuserid);		
		for($i=0; $i<count($find_arr); $i++){
		if($i==$cnt_arr-1){
			$que .= "search_religion LIKE '%".trim($find_arr[$i])."%' AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
		} else {
			$que .= "search_religion LIKE '%".trim($find_arr[$i])."%' AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." OR ";			
		}			
	}		 
	} 	
	else {		
		for($i=0; $i<count($find_arr); $i++){
			if($i==$cnt_arr-1){
				$que .= "search_religion LIKE '%".trim($find_arr[$i])."%' AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
			} else {
				$que .= "search_religionss LIKE '%".trim($find_arr[$i])."%' AND tbldatingusermaster.currentstatus=0 ".$search_img." OR ";			
			}
				
		}
	}
	
	//$religion_search;
	
	//$cast_search = "SELECT userid from tbldatingusermaster WHERE ";
	$que .= " OR ";
	if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=""){
		$loginuserid = $_SESSION[$session_name_initital."memberuserid"];
		$genderid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$loginuserid);
		for($i=0; $i<count($find_arr); $i++){
			if($i==$cnt_arr-1){
				$que .= "search_cast LIKE '%".trim($find_arr[$i])."%' AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
			} else {
				$que .= "search_cast LIKE '%".trim($find_arr[$i])."%' AND genderid!=".$genderid." ANd userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." OR ";
			}
		}
	} else {		
		for($i=0; $i<count($find_arr); $i++){
			if($i==$cnt_arr-1){
				$que .= "search_cast LIKE '%".trim($find_arr[$i])."%' AND tbldatingusermaster.currentstatus=0 ".$search_img." ";			
			} else {
				$que .= "search_cast LIKE '%".trim($find_arr[$i])."%' AND tbldatingusermaster.currentstatus=0 ".$search_img." OR ";
			}
		}
	}
	//$cast_search;
	
	//$location_search = "SELECT userid from tbldatingusermaster WHERE ";
	$que .= " OR ";
	if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=""){
		$loginuserid = $_SESSION[$session_name_initital."memberuserid"];
		$genderid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$loginuserid);
		for($i=0; $i<count($find_arr); $i++){
			if($i==$cnt_arr-1){
				$que .="search_location LIKE '%".trim($find_arr[$i])."%' AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
			} else {
				$que .="search_location LIKE '%".trim($find_arr[$i])."%' AND genderid!=".$genderid." ANd userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." OR ";
			}
		}
	} else {	
		for($i=0; $i<count($find_arr); $i++){
			if($i==$cnt_arr-1){
				$que .="search_location LIKE '%".trim($find_arr[$i])."%' AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
			} else {
				$que .="search_location LIKE '%".trim($find_arr[$i])."%' AND tbldatingusermaster.currentstatus=0 ".$search_img." OR ";
			}
		}
	}
	//$location_search;
	
	$que .= " OR ";
	if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=""){
		$loginuserid = $_SESSION[$session_name_initital."memberuserid"];
		$genderid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$loginuserid);
		for($i=0; $i<count($find_arr); $i++){
			if($i==$cnt_arr-1){
				$que .="subcast LIKE '%".trim($find_arr[$i])."%' AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
			} else {
				$que .="subcast LIKE '%".trim($find_arr[$i])."%' AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img." OR ";
			}
		}
	} else {	
		for($i=0; $i<count($find_arr); $i++){
			if($i==$cnt_arr-1){
				$que .="subcast LIKE '%".trim($find_arr[$i])."%' AND tbldatingusermaster.currentstatus=0 ".$search_img." ";
			} else {
				$que .="subcast LIKE '%".trim($find_arr[$i])."%' AND tbldatingusermaster.currentstatus=0 ".$search_img." OR ";
			}
		}
	}
	
	} if($str==""){
		if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=""){
			$loginuserid = $_SESSION[$session_name_initital."memberuserid"];
			$genderid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$loginuserid);
			//$que .= " OR ";
			$que .= "(search_religion LIKE '%".$string."%' AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img.") OR (search_cast LIKE '%".$string."%' AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img.") OR (city LIKE '%".$string."%' AND genderid!=".$genderid." AND userid!=".$loginuserid." AND tbldatingusermaster.currentstatus=0 ".$search_img.") ";
		} else {
			$que .= "(search_religion LIKE '%".$string."%' AND ".$search_img.") OR (search_cast LIKE '%".$string."%' AND ".$search_img." OR city LIKE '%".$string."%' AND tbldatingusermaster.currentstatus=0 ".$search_img.") ";
		}
	}
	$que = $que. " AND";	
	
	
	
}
}
if(isset($_POST['advkeyword']) && $_POST['advkeyword']!=""){
	$keyword = $_POST['advkeyword'];
	$arr_kw = explode(",",$keyword);
	$count_kws = count($arr_kw);
}

if ($marital_str != "0"){
	$mar_arr = explode(",",$marital_str);
	$mar_que = "(";
	for($i=0; $i<count($mar_arr); $i++){
		$mar_que .= "tbldatingusermaster.maritalstatusid = ".$mar_arr[$i]." OR ";		
	}
	$que .= substr($mar_que,0,-4).") and ";	
	//$que .= " tbldatingusermaster.maritalstatusid in ($marital_str) and ";
}
	
if($annualincome != ""){	
	$anninc_arr = explode(",",$annualincome);
	$anninc_que = "(";
	for($i=0; $i<count($anninc_arr); $i++){
		$anninc_que .= "tbldatingusermaster.annualincome = ".$anninc_arr[$i]." OR ";	
	}
	$que .= substr($anninc_que,0,-4).") and ";
	//$que .= " tbldatingusermaster.annualincome in ($annualincome) and ";
}
	
$kidsid = "0";
$result = getdata("select id,title from tbldatingkidsmaster where currentstatus =0 and languageid=$sitelanguageid 
order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkhavechildren" . $rs[0]]))	
		$kidsid .= "," . $rs[0];
}
freeingresult($result);
if ($kidsid != "0")
	$que .= " tbldatingusermaster.kidsid in ($kidsid) and ";

if ($chkcomplexion != "0")
	$que .= " tbldatingusermaster.complexionid in ($chkcomplexion) and ";
if($chkspecialcase != "0"){
	$chkspecial_arr = explode(",",$chkspecialcase);
	$chkspecial_que = "(";
	for($i=0; $i<count($chkspecial_arr); $i++){
		$chkspecial_que .= "tbldatingusermaster.specialcasesid=".$chkspecial_arr[$i]." OR ";
	}
	$que .= substr($chkspecial_que,0,-4).") AND ";
	//$que .= " tbldatingusermaster.specialcasesid in ($chkspecialcase) and ";
}



if ((isset($_POST["advweight1"])) &&  (is_numeric($_POST["advweight1"])))
if ($_POST["advweight1"] != "0.0")
	$que .= " tbldatingusermaster.weightid >=" . $_POST["advweight1"] . " and " ;
if ((isset($_POST["advweight2"])) &&  (is_numeric($_POST["advweight2"])))
if ($_POST["advweight2"] != "0.0")
	$que .=" tbldatingusermaster.weightid <=". $_POST["advweight2"] ." and ";

if ((isset($_POST["advheight1"])) &&  (is_numeric($_POST["advheight1"])))
if ($_POST["advheight1"] != "0.0")
	$que .= " tbldatingusermaster.heightid >=" . $_POST["advheight1"] . " and " ;
if ((isset($_POST["advheight2"])) &&  (is_numeric($_POST["advheight2"])))
if ($_POST["advheight2"] != "0.0")
	$que .=" tbldatingusermaster.heightid <=". $_POST["advheight2"] ." and ";

if (isset($_POST["radshowmember"]))
if ($_POST["radshowmember"] == "p")
	$que .=" tbldatingusermaster.imagenm is not null and ";

if ($Enable_HIV_thelesima_illiness_blood_group_design_setting == "Y") 
{	


if (isset($_POST["radhiv"]))
if ($_POST["radhiv"] != "")
	$que .=" tbldatingusermaster.hiv='" . $_POST["radhiv"] . "' and ";
	
if (isset($_POST["radthelisimia"]))
if ($_POST["radthelisimia"] != "")
	$que .=" tbldatingusermaster.thelisimia='" . $_POST["radthelisimia"] . "' and ";
	
if (isset($_POST["txt_illiness"]))
if ($_POST["txt_illiness"] != "")
	$que .=" tbldatingusermaster.illiness like '%" . check_lalid_length_input($_POST["txt_illiness"]) . "%' and ";

if ((isset($_POST["cmbblood_group"])) &&  (is_numeric($_POST["cmbblood_group"])))
if ($_POST["cmbblood_group"] != "0.0")
  $que .=" tbldatingusermaster.blood_group =". $_POST["cmbblood_group"] ." and ";
}


if (isset($_POST["chkonline"]))
if ($_POST["chkonline"] != "")
{
	$online_user_id = findonline_users_userid();
	if ($online_user_id == "")
		$online_user_id =0;
	$que .=" tbldatingusermaster.userid in(" . $online_user_id . ") and ";
}	

$edu_pg = "0";
$result = getdata("select id,title from tbldating_education_pg_master where currentstatus =0 and
 languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkedu_pg" . $rs[0]]))	
		$edu_pg .= "," . $rs[0];
}
freeingresult($result);
if ($edu_pg != "0")
	$que .= " tbldatingusermaster.edu_pg_id in ($edu_pg) and ";
	
$industry = "0";
$result = getdata("select id,title from tbl_dating_industry_master where currentstatus =0 and languageid=$sitelanguageid
 order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkindustry" . $rs[0]]))	
		$industry .= "," . $rs[0];
}
freeingresult($result);
if ($industry != "0")
	$que .= " tbldatingusermaster.industry_id in ($industry) and ";	
	
$function_area = "0";
$result = getdata("select id,title from tbl_dating_work_function_area_master where currentstatus =0 and 
languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkfunction_area" . $rs[0]]))	
		$function_area .= "," . $rs[0];
}
freeingresult($result);
if ($function_area != "0")
	$que .= " tbldatingusermaster.work_function_id in ($function_area) and ";

$institute = "0";
$result = getdata("select id,title from tbl_dating_institute_master where currentstatus =0 and languageid=$sitelanguageid
 order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkinstitute" . $rs[0]]))	
		$institute .= "," . $rs[0];
}
freeingresult($result);
if ($institute != "0")
	$que .= " tbldatingusermaster.instituteid in ($institute) and ";


if (findsettingvalue("Religion_field_display") == "M")
{
if (isset($_POST["cmbreligiosness_id"]))
if ($_POST["cmbreligiosness_id"] != "0.0")
$que .= " tbldatingusermaster.religiosness_id in(" . $_POST["cmbreligiosness_id"] . ") and ";

if (isset($_POST["cmbdenomination_id"]))
if ($_POST["cmbdenomination_id"] != "0.0")
$que .= " tbldatingusermaster.denominationid in(" . $_POST["cmbdenomination_id"] . ") and ";

if (isset($_POST["spiritual_id"]))
if ($_POST["spiritual_id"] != "0.0")
$que .= " tbldatingusermaster.spiritual_order in(" . $_POST["spiritual_id"] . ") and ";

if (isset($_POST["cmbhijab_id"]))
if ($_POST["cmbhijab_id"] != "0.0")
$que .= " tbldatingusermaster.hijab_id in(" . $_POST["cmbhijab_id"] . ") and ";

if (isset($_POST["cmbbeard_id"]))
if ($_POST["cmbbeard_id"] != "0.0")
$que .= " tbldatingusermaster.beard_id in(" . $_POST["cmbbeard_id"] . ") and ";


if (isset($_POST["cmbrevert_islam_id"]))
if ($_POST["cmbrevert_islam_id"] != "0.0")
$que .= " tbldatingusermaster.revert_islam_id in(" . $_POST["cmbrevert_islam_id"] . ") and ";

if (isset($_POST["cmbhalal_strict_id"]))
if ($_POST["cmbhalal_strict_id"] != "0.0")
$que .= " tbldatingusermaster.halal_strict_id in(" . $_POST["cmbhalal_strict_id"] . ") and ";

if (isset($_POST["cmbsalah_perform_id"]))
if ($_POST["cmbsalah_perform_id"] != "0.0")
$que .= " tbldatingusermaster.salah_perform_id in(" . $_POST["cmbsalah_perform_id"] . ") and ";
}

if(isset($_POST['advcmbspecialcase']) && $_POST['advcmbspecialcase']!='0.0'){
	$que .= " tbldatingusermaster.specialcasesid = ".$_POST['advcmbspecialcase']." and ";
}

//astro search start
if(isset($_POST['txtsign']) && $_POST['txtsign']!='' && $_POST['txtsign']!='0.0'){
	$signid = $_POST['txtsign'];
	if(isset($_POST['sign']) && $_POST['sign']!=''){
		$sign = $_POST['sign'];		
	}		
	if($sign == 'M'){
		$que .= " tbldatingusermaster.moonsign = $signid and ";
	}
	if($sign == 'S'){
		$que .= " tbldatingusermaster.sunsignid = $signid and ";
	}
}
if(isset($_POST['cmbgrah']) && $_POST['cmbgrah']!='' && $_POST['cmbgrah']!='0.0'){
	$grah = $_POST['cmbgrah'];
	$que .= " tbldatingusermaster.grahid = $grah and ";
}
if(isset($_POST['cmbpreferstarid']) && $_POST['cmbpreferstarid']!='' && $_POST['cmbpreferstarid']!='0.0'){
	$star = $_POST['cmbpreferstarid'];
	$que .= " tbldatingusermaster.prefer_star = $star and ";
}
if(isset($_POST['cmblagnaid']) && $_POST['cmblagnaid']!='' && $_POST['cmblagnaid']!='0.0'){
	$lagnaid = $_POST['cmblagnaid'];
	$que .= " tbldatingusermaster.lagnaid = $lagnaid and ";
}
if(isset($_POST['cmbsuryaid']) && $_POST['cmbsuryaid']!='' && $_POST['cmbsuryaid']!='0.0'){
	$suryaid = $_POST['cmbsuryaid'];
	$que .= " tbldatingusermaster.suryaid = $suryaid and ";
}
if(isset($_POST['cmbchandraid']) && $_POST['cmbchandraid']!='' && $_POST['cmbchandraid']!='0.0'){
	$chandraid = $_POST['cmbchandraid'];
	$que .= " tbldatingusermaster.chandraid = $chandraid and ";
}
if(isset($_POST['cmbmangalid']) && $_POST['cmbmangalid']!='' && $_POST['cmbmangalid']!='0.0'){
	$mangalid = $_POST['cmbmangalid'];
	$que .= " tbldatingusermaster.mangalid = $mangalid and ";
}
if(isset($_POST['cmbmangalid']) && $_POST['cmbmangalid']!='' && $_POST['cmbmangalid']!='0.0'){
	$mangalid = $_POST['cmbmangalid'];
	$que .= " tbldatingusermaster.mangalid = $mangalid and ";
}
if(isset($_POST['cmbbudhaid']) && $_POST['cmbbudhaid']!='' && $_POST['cmbbudhaid']!='0.0'){
	$budhaid = $_POST['cmbbudhaid'];
	$que .= " tbldatingusermaster.budhaid = $budhaid and ";
}
if(isset($_POST['cmbvyazhamid']) && $_POST['cmbvyazhamid']!='' && $_POST['cmbvyazhamid']!='0.0'){
	$vyazhamid = $_POST['cmbvyazhamid'];
	$que .= " tbldatingusermaster.vyazham_id = $vyazhamid and ";
}
if(isset($_POST['cmbsukraid']) && $_POST['cmbsukraid']!='' && $_POST['cmbsukraid']!='0.0'){
	$sukraid = $_POST['cmbsukraid'];
	$que .= " tbldatingusermaster.sukraid = $sukraid and ";
}
if(isset($_POST['cmbshaniid']) && $_POST['cmbshaniid']!='' && $_POST['cmbshaniid']!='0.0'){
	$shaniid = $_POST['cmbshaniid'];
	$que .= " tbldatingusermaster.shaniid = $shaniid and ";
}
if(isset($_POST['cmbketuid']) && $_POST['cmbketuid']!='' && $_POST['cmbketuid']!='0.0'){
	$ketuid = $_POST['cmbketuid'];
	$que .= " tbldatingusermaster.ketuid = $ketuid and ";
}
if(isset($_POST['cmbgulikanid']) && $_POST['cmbgulikanid']!='' && $_POST['cmbgulikanid']!='0.0'){
	$gulikanid = $_POST['cmbgulikanid'];
	$que .= " tbldatingusermaster.gulikan = $gulikanid and ";
}
if(isset($_POST['cmbneptuneid']) && $_POST['cmbneptuneid']!='' && $_POST['cmbneptuneid']!='0.0'){
	$neptuneid = $_POST['cmbneptuneid'];
	$que .= " tbldatingusermaster.neptuneid = $neptuneid and ";
}
//astro search end
$ordby = "";
if (isset($_POST["radsortsearchresult"]))
{
$ordby = searchresultsortby($_POST["radsortsearchresult"]);
}
if ($que !="")
{
	 $_SESSION[$session_name_initital . "searchquery"] = $que; 
	 $_SESSION[$session_name_initital . "searchquery_original"] =$que; 
}
$filenm = searchresultfilenm($_POST["raddispresult"]);
/*echo $que;
exit;*/
header("location:$filenm");
exit;
function findlanguageuserid($languageid)
{
$languageuserid="";
$result = getdata("select userid from tbldatinguserlanguagemaster where languageid =$languageid");
while ($rs = mysqli_fetch_array($result))
{ 
	if ($languageuserid != "")
		$languageuserid .= ",";
	$languageuserid .= $rs[0];
}
freeingresult($result);
return $languageuserid;
}
function setforsplitfield($tobesplitval,$quefld)
{
	$quesplit = "";
	$que = "";
	$advarr = split(",", $tobesplitval);
	foreach ($advarr as $val)
	{
	if ($quesplit != "")
		$quesplit .= " or ";
	$quesplit .= " $quefld like '%". $val . "%' ";
	//$que .= " tbldatingusermaster.state like '%". $_POST["advstate"] . "%' and ";
	}
	if ($quesplit != "")
	$que = " ($quesplit) and ";
	
return $que;
}
ob_flush();
?>