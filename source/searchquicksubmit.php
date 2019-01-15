<?

ob_start();
require_once("commonfile.php");
//require_once("chatfunction.php");
$session_id = session_id();
if($enable_search_without_registration=='N' && !isset($_SESSION[$session_name_initital . "memberuserid"])){
	header("location:login.php");	
	exit;
}	

$_SESSION[$session_name_initital . "q_search_work"] = "";
$_SESSION[$session_name_initital . "q_search_occupation"] = "";
$_SESSION[$session_name_initital . "q_search_mangalik"] = "";
$_SESSION[$session_name_initital . "q_search_marital"] = "";
$_SESSION[$session_name_initital . "q_search_social"] = "";
$_SESSION[$session_name_initital . "q_searchquickminage"] = "";
$_SESSION[$session_name_initital . "q_searchquickmaxage"] = "";
$_SESSION[$session_name_initital . "q_advheight1"] = "";
$_SESSION[$session_name_initital . "q_advheight2"] = "";
$_SESSION[$session_name_initital . "q_cmbreligian"] = "";
$_SESSION[$session_name_initital . "q_txtkeyword"] = "";
$_SESSION[$session_name_initital . "q_radsortsearchresult"] = "";
$_SESSION[$session_name_initital . "q_radshowmember"] = "";
$_SESSION[$session_name_initital . "q_raddispresult"] = "";
$_SESSION[$session_name_initital . "q_chkonline"] = "";
$_SESSION[$session_name_initital . "q_chkcast"] = "";
$_SESSION[$session_name_initital . "q_chkmool"] = "";
$_SESSION[$session_name_initital . "q_chksubcast"] = "";
$_SESSION[$session_name_initital . "q_work_country"] = "";
$_SESSION[$session_name_initital . "q_search_education"] = "";
$_SESSION[$session_name_initital . "q_search_annualincome"] = "";
$que = "";
//$que .=  setforsplitfield(check_lalid_length_input($_POST["advstate"]),"  ");
//}
$cnt_cast = getonefielddata("select count(id) from tbldatingcastmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
$cnt_subcast = getonefielddata("select count(id) from tbldatingsubcastmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
$cnt_children = getonefielddata("select count(id) from tbldatingkidsmaster where currentstatus =0 and languageid=$sitelanguageid order by title");

//for children start
$chkchildren = "";
for($i=1; $i<=$cnt_children; $i++){
	if(isset($_POST['chkhavechildren'.$i]) && $_POST['chkhavechildren'.$i]!=""){
		$chkchildren .= $_POST['chkhavechildren'.$i].",";
	}	
}
//for children end

//for cast start
$chkcast = "";
if(isset($_POST['cast_arr']) && $_POST['cast_arr']!=""){	
	$chkcast = implode(",",$_POST['cast_arr']);	
	$_SESSION[$session_name_initital . "q_chkcast"] = $chkcast;
}
$chkmool = "";
if(isset($_POST['mool_arr']) && $_POST['mool_arr']!=''){
	$chkmool = implode(",",$_POST['mool_arr']);
	$_SESSION[$session_name_initital . "q_chkmool"] = $chkmool;	
}
/*for($i=1; $i<$cnt_cast; $i++)	{
	if(isset($_POST['chkcast'.$i]) && $_POST['chkcast'.$i]!=""){
		$chkcast .= $_POST['chkcast'.$i].",";
	}
}*/

//for cast end

//for subcast start
$chksubcast = "";
if(isset($_POST['subcast_arr']) && $_POST['subcast_arr']!=""){
	$chksubcast = implode(",",$_POST['subcast_arr']);
	
}
/*for($i=1; $i<$cnt_subcast; $i++)	{
	if(isset($_POST['chksubcast'.$i]) && $_POST['chksubcast'.$i]!=""){
		$chksubcast .= $_POST['chksubcast'.$i].",";
	}
}
$chksubcast = substr($chksubcast,0,-1);*/
$_SESSION[$session_name_initital . "q_chksubcast"] = $chksubcast;
//for subcast end

$workin_str = "0";
if(isset($_POST['wic_arr']) && $_POST['wic_arr']!=""){
	$workin_str = implode(",",$_POST['wic_arr']);
	$_SESSION[$session_name_initital . "q_search_work"] = $workin_str;
}

/*if(isset($_SESSION['sqwork']) && $_SESSION['sqwork']!=""){
	$workin_str = "";
	$cnt_sqwork = getonefielddata("SELECT count(id) from tbldatingcountrymaster WHERE currentstatus=0");
	for($i=0; $i<$cnt_sqlwork; $i++){
		if(isset($_SESSION['sqwork'][$i]) && $_SESSION['sqwork'][$i]!=""){
			$workin_str .= $_SESSION['sqwork'][$i].",";
		}
	}
	$workin_str = substr($workin_str,0,1);	
}*/
/*$res_qwc = getdata("SELECT ih_id from tbl_ih_master WHERE cat='qwc' AND ih_session='".$session_id."'");
$mari_qwc = mysqli_num_rows($res_qwc);
if($mari_qwc>0){
	$workin_str = "";
	while($rs_qwc = mysqli_fetch_array($res_qwc)){
		$workin_str .= $rs_qwc[0].",";
	}
	$workin_str = substr($workin_str,0,-1);
}*/
/*if(isset($_POST['work_arr']) && $_POST['work_arr']!=""){
$workin_arr = $_POST['work_arr'];
$cnt_workin = count($workin_arr);
$workin_str = "";
for($i=0; $i<$cnt_workin; $i++){
	$workin_str .= $workin_arr[$i].",";
}
$workin_str = substr($workin_str,0,strlen($workin_str)-1);
$_SESSION[$session_name_initital . "q_search_work"]=$workin_str;
}*/
//work in country end

//occupation start
$occupation_str = "0";
if(isset($_POST['occ_arr']) && $_POST['occ_arr']!=""){
	$occupation_str = implode(",",$_POST['occ_arr']);
	$_SESSION[$session_name_initital . "q_search_occupation"] = $occupation_str;
}

$education_str = "0";
if(isset($_POST['edu_arr']) && $_POST['edu_arr']!=''){
	$education_str = implode(",",$_POST['edu_arr']);
	$_SESSION[$session_name_initital . "q_search_education"] = $education_str;
}
$annincome_str = "0";
if(isset($_POST['ann_arr']) && $_POST['ann_arr']!=''){
	$annincome_str = implode(",",$_POST['ann_arr']);
	$_SESSION[$session_name_initital . "q_search_annualincome"] = $annincome_str;	
}


/*if(isset($_SESSION['sqoccu']) && $_SESSION['sqoccu']){
	$occupation_str = "";
	$cnt_sqoccu = getonefielddata("SELECT count(id) from tbldatingoccupationmaster WHERE currentstatus=0");	
	for($i=0; $i<$cnt_sqoccu; $i++){
		if(isset($_SESSION['sqoccu'][$i]) && $_SESSION['sqoccu'][$i]!=""){
			$occupation_str .= $_SESSION['sqoccu'][$i].","; 
		}
	}
	$occupation_str = substr($occupation_str,0,-1);
}*/
/*$res_occ = getdata("SELECT ih_id from tbl_ih_master WHERE cat='qoc' AND ih_session='".$session_id."'");
$mari_occ = mysqli_num_rows($res_occ);
if($mari_occ>0){
	$occupation_str = "";
	while($rs_occ = mysqli_fetch_array($res_occ)){
		$occupation_str .= $rs_occ[0].",";
	}
	$occupation_str = substr($occupation_str,0,-1);
}*/
/*if(isset($_POST['occupation_arr']) && $_POST['occupation_arr']!="") {
$occupation_arr = $_POST['occupation_arr'];
$cnt_occupation = count($occupation_arr);
$occupation_str = "";
for($i=0; $i<$cnt_occupation; $i++){
	$occupation_str .= $occupation_arr[$i].",";
}
$occupation_str = substr($occupation_str,0,strlen($occupation_str)-1);
$_SESSION[$session_name_initital . "q_search_occupation"] = $occupation_str;
}*/
//occupation end


//for Mangalik Status start
//$mangalik_str = "0";
/*if(isset($_SESSION['sqmangalik']) && $_SESSION['sqmangalik']!=""){
	$mangalik_str = "";
	$cnt_sqmangalik = getonefielddata("SELECT count(id) from tbldatinggrahmaster WHERE currentstatus=0");
	for($i=0; $i<$cnt_sqmangalik; $i++){
		if(isset($_SESSION['sqmangalik'][$i]) && $_SESSION['sqmangalik'][$i]!=""){
			$mangalik_str .= $_SESSION['sqmangalik'][$i].",";
		}
	}	
	$mangalik_str = substr($mangalik_str,0,-1);
}
*//*$res_mang = getdata("SELECT ih_id from tbl_ih_master WHERE cat='qmm' AND ih_session='".$session_id."'");
$mari_mang = mysqli_num_rows($res_mang);
if($mari_mang>0){
	$mangalik_str = "";
	while($rs_mang = mysqli_fetch_array($res_mang)){
		$mangalik_str .= $rs_mang[0].",";
	}
	$mangalik_str = substr($mangalik_str,0,-1);
}*/
/*if(isset($_POST['mangalik_arr']) && $_POST['mangalik_arr']) {
$mangalik_arr = $_POST['mangalik_arr'];
$cnt_mangalik = count($mangalik_arr);
$mangalik_str = "";
for($i=0; $i<$cnt_mangalik; $i++){
	$mangalik_str .= $mangalik_arr[$i].",";
}
	$mangalik_str = substr($mangalik_str,0,strlen($mangalik_str)-1);
	$_SESSION[$session_name_initital . "q_search_mangalik"] = $mangalik_str;
}*/
$mangalik_str = "";
if(isset($_POST['mangalik_arr']) && $_POST['mangalik_arr']!=""){
	$mangalik_str = implode(",",$_POST['mangalik_arr']);
	$_SESSION[$session_name_initital . "q_search_mangalik"] = $mangalik_str;	
}

//for Mangalik Status end

//for Marital Status start
$marital_str = "0";
if(isset($_POST['marital_arr']) && $_POST['marital_arr']!=""){	
	$marital_str = implode(",",$_POST['marital_arr']);	
	$_SESSION[$session_name_initital . "q_search_marital"] = $marital_str;
}
/*if(isset($_SESSION['sqmarital']) && $_SESSION['sqmarital']!=""){
	$marital_str = "";
	$cnt_sqmarital = getonefielddata("SELECT count(id) from tbldatingmaritalstatusmaster WHERE currentstatus=0");
	for($i=0; $i<$cnt_sqmarital; $i++){
		if(isset($_SESSION['sqmarital'][$i]) && $_SESSION['sqmarital'][$i]!=""){
			$marital_str .= $_SESSION['sqmarital'][$i].",";
		}
	}
	$marital_str = substr($marital_str,0,-1);
}
*//*$res_mari = getdata("SELECT ih_id from tbl_ih_master WHERE cat='qms' AND ih_session='".$session_id."'");
$mari_num = mysqli_num_rows($res_mari);
if($mari_num>0){
	$marital_str = "";
	while($rs_mari = mysqli_fetch_array($res_mari)){
		$marital_str .= $rs_mari[0].",";
	}
	$marital_str = substr($marital_str,0,-1);
}*/
/*if(isset($_POST['marital_arr']) && $_POST['marital_arr']!="") {
$marital_arr = $_POST['marital_arr'];
$cnt_marital = count($marital_arr);	
$marital_str = "";
for($i=0; $i<$cnt_marital; $i++){
	$marital_str .= $marital_arr[$i].",";
}
	$marital_str = substr($marital_str,0,strlen($marital_str)-1);
	$_SESSION[$session_name_initital . "q_search_marital"] = $marital_str;
}*/
//for Marital Status end

//for social communities start
$social_str = "0";
if(isset($_SESSION['sqsocial']) && $_SESSION['sqsocial']!=""){
	$social_str = "";
	$cnt_sqsocial = getonefielddata("SELECT count(id) from tbldatingmothertonguemaster WHERE currentstatus=0");
	for($i=0; $i<$cnt_sqsocial; $i++){
		if(isset($_SESSION['sqsocial'][$i]) && $_SESSION['sqsocial'][$i]!=""){
			$social_str .= $_SESSION['sqsocial'][$i].",";
		}
	}
	$social_str = substr($social_str,0,-1);
}
/*$res_soc = getdata("SELECT ih_id from tbl_ih_master WHERE cat='qss' AND ih_session='".$session_id."'");
$soci_num = mysqli_num_rows($res_soc);
if($soci_num>0){
	$social_str = "";
	while($rs_soc = mysqli_fetch_array($res_soc)){
		$social_str .= $rs_soc[0].",";
	}
	$social_str = substr($social_str,0,-1);
}*/
/*if(isset($_POST['social_arr']) && $_POST['social_arr']!="") {
$social_arr = $_POST['social_arr'];
$cnt_social = count($social_arr);
$social_str = "";
for($i=0; $i<$cnt_social; $i++){
	$social_str .= $social_arr[$i].",";
}
	$social_str = substr($social_str,0,strlen($social_str)-1);
	$_SESSION[$session_name_initital . "q_search_social"] = $social_str;	
}*/
//for social communities end

$cast_id = '';
if(isset($_SESSION['sqcast']) && $_SESSION['sqcast']!=''){
	$cnt_sqcast = getonefielddata("SELECT count(id) from tbldatingcastmaster WHERE currentstatus=0");	
	for($i=0; $i<$cnt_sqcast; $i++){
		if(isset($_SESSION['sqcast'][$i]) && $_SESSION['sqcast'][$i]){
			$cast_id .= $_SESSION['sqcast'][$i].",";
		}	
	}
	$cast_id = substr($cast_id,0,-1);
}

if(isset($_POST['searchquickminage']) && $_POST['searchquickminage']!="")	{
	$_SESSION[$session_name_initital . "q_searchquickminage"] = $_POST['searchquickminage'];
}

if(isset($_POST['searchquickmaxage']) && $_POST['searchquickmaxage']!="")	{
	$_SESSION[$session_name_initital . "q_searchquickmaxage"] = $_POST['searchquickmaxage'];
}

if(isset($_POST['advheight1']) && $_POST['advheight1']!="")	{
	$_SESSION[$session_name_initital . "q_advheight1"] = $_POST['advheight1'];
}

if(isset($_POST['advheight2']) && $_POST['advheight2']!="")	{
	$_SESSION[$session_name_initital . "q_advheight2"] = $_POST['advheight2'];
}

if(isset($_POST['cmbreligian']) && $_POST['cmbreligian']!="")	{
	$_SESSION[$session_name_initital . "q_cmbreligian"] = $_POST['cmbreligian'];
}

if(isset($_POST['txtkeyword']) && $_POST['txtkeyword']!="")	{
	$_SESSION[$session_name_initital . "q_txtkeyword"] = $_POST['txtkeyword'];
}

if(isset($_POST['radsortsearchresult']) && $_POST['radsortsearchresult']!="")	{
	$_SESSION[$session_name_initital . "q_radsortsearchresult"] = $_POST['radsortsearchresult'];
}

if(isset($_POST['radshowmember']) && $_POST['radshowmember']!="")	{
	$_SESSION[$session_name_initital . "q_radshowmember"] = $_POST['radshowmember'];
}

if(isset($_POST['raddispresult']) && $_POST['raddispresult']!="")	{
	$_SESSION[$session_name_initital . "q_raddispresult"] = $_POST['raddispresult'];
	$_SESSION[$session_name_initital . "search_grid_design_display"] = $_POST['raddispresult'];
}

if(isset($_POST['chkonline']) && $_POST['chkonline']!="")	{
	$_SESSION[$session_name_initital . "q_chkonline"] = $_POST['chkonline'];
}

if (isset($_POST["location"]))
if ($_POST["location"] != "")
{
	$location =$_POST["location"];
	$que .= " (tbldatingusermaster.area like '%$location%' or tbldatingusermaster.state like '%$location%' or tbldatingusermaster.city like '%". $_POST["location"] . "%') and ";
}

if(isset($_REQUEST['st']) && $_REQUEST['st']!=''){
	$que .= "tbldatingusermaster.state='".$_REQUEST['st']."' and ";	
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


if ((isset($_POST["searchquicklookingfor"])) &&  (is_numeric($_POST["searchquicklookingfor"])))
if ($_POST["searchquicklookingfor"] != "0.0")
	$que .= " tbldatingusermaster.genderid=" . $_POST["searchquicklookingfor"] . " and " ;

if ((isset($_POST["searchquickminage"])) &&  (is_numeric($_POST["searchquickminage"])))
if ($_POST["searchquickminage"] != "0.0")
$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= " . $_POST["searchquickminage"] . " and " ;


if ((isset($_POST["searchquickmaxage"])) &&  (is_numeric($_POST["searchquickmaxage"])))
if ($_POST["searchquickmaxage"] != "0.0")
	$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <=" . $_POST["searchquickmaxage"] . " and " ;

$_SESSION[$session_name_initital . "searchincludereligian"]="";	
if (isset($_POST["cmbreligian"]))
if ($_POST["cmbreligian"] != "0.0")
{
	$que .= " tbldatingusermaster.religianid = ". $_POST["cmbreligian"] ." and ";
	$_SESSION[$session_name_initital . "searchincludereligian"]=$_POST["cmbreligian"];
}		

$useid="";	
if (isset($_POST["txtkeyword"]))
if ($_POST["txtkeyword"] != "")
{
	$keyword= check_lalid_length_input($_POST["txtkeyword"]);
	$que .= "(tbldatingusermaster.postcode like '%$keyword %' or  tbldatingusermaster.annualincome like '%$keyword %' or  tbldatingusermaster.personality like '%$keyword %' or  tbldatingusermaster.familybackground like '%$keyword %' or  tbldatingusermaster.profileheadline like '%$keyword %' or  tbldatingusermaster.hobbiesintrest like '%$keyword %' or tbldatingusermaster.state like '%$keyword%' or tbldatingusermaster.city like '%$keyword%' or tbldatingusermaster.area like '%$keyword%' or tbldatingusermaster.subcast like '%$keyword%' or tbldatingusermaster.gotra like '%$keyword%' ) and ";
$useid .=  finduseridsquicksearch("tbldatingreligianmaster","religianid",$keyword);
$useid .=  finduseridsquicksearch("tbldatingcastmaster","castid",$keyword);
$useid .=  finduseridsquicksearch("tbldatingcountrymaster","countryid",$keyword);
$useid .=  finduseridsquicksearch("tbldatingoccupationmaster","ocupationid",$keyword);
//$useid .=  finduseridsquicksearch("tbl_education_master","educationid",$keyword);
$useid .=  finduseridsquicksearch("tbl_education_master","educationid",$keyword);
//$useid .=  finduseridsquicksearch("tbldatingmaritalstatusmaster","maritalstatusid",$keyword);
if ($useid != "")
	$que .= "tbldatingusermaster.userid in ($useid) and ";
}	

$mothertongue = "0";
$result = getdata("select id,title from tbldatingmothertonguemaster where currentstatus =0 and languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkadvmothertongue" . $rs[0]]))	
		$mothertongue .= "," . $rs[0];
}
freeingresult($result);
if ($social_str != "0")
	$que .= " tbldatingusermaster.motherthoungid in ($social_str) and ";
	
if($cast_id!='')	{
	$que .= " tbldatingusermaster.castid in ($cast_id) and ";
}

$maritalstatusid = "0";
$result = getdata("select id,title from tbldatingmaritalstatusmaster where currentstatus =0 and languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
	if (isset($_POST["chkmaritalstatus" . $rs[0]]))	
		$maritalstatusid .= "," . $rs[0];
}
freeingresult($result);
if ($marital_str != "0"){
	$arr_marital = explode(",",$marital_str);
	$mari_status_query = '(';
	for($i=0; $i<count($arr_marital); $i++){
		$mari_status_query .= "tbldatingusermaster.maritalstatusid = ".$arr_marital[$i]." OR ";	
	}
	$mari_status_query = substr($mari_status_query,0,-4);
	$mari_status_query .= ") and ";
	$que .= $mari_status_query;	
	//$que .= " tbldatingusermaster.maritalstatusid in ($marital_str) and ";
}


if ($mangalik_str != ""){
	$mangalik_qarr = explode(",",$mangalik_str);
	$mang_qry = '(';
	for($i=0; $i<count($mangalik_qarr); $i++){
		$mang_qry .= "tbldatingusermaster.grahid = ".$mangalik_qarr[$i]." OR ";
	}
	$que .= substr($mang_qry,0,-4).") and ";
	//$que .= " tbldatingusermaster.grahid in ($mangalik_str) and ";
}
if ($workin_str != "0"){
	$wrokin_arr = explode(",",$workin_str);
	$workin_que = "(";
	for($i=0; $i<count($wrokin_arr); $i++){
		$workin_que .= "tbldatingusermaster.work_in_country=".$wrokin_arr[$i]." OR ";
	}
	$que .= substr($workin_que,0,-4).") and ";	
	//$que .= " tbldatingusermaster.work_in_country in ($workin_str) and ";
}

	
if($occupation_str != "0"){
	$occu_qarr = explode(",",$occupation_str);
	$occu_qry = "(";
	for($i=0; $i<count($occu_qarr); $i++){
		$occu_qry .= "tbldatingusermaster.ocupationid = ".$occu_qarr[$i]." OR ";
	}
	$que .= substr($occu_qry,0,-4).") and ";	
	//$que .= " tbldatingusermaster.ocupationid in ($occupation_str) and ";
}
if($education_str!="0"){
	$edu_qarr = explode(",",$education_str);
	$edu_qry = "(";	
	for($i=0; $i<count($edu_qarr); $i++){
		$edu_qry .= "tbldatingusermaster.educationid = ".$edu_qarr[$i]." OR ";	
	}
	$que .= substr($edu_qry,0,-4).") and ";
}
if($annincome_str!="0"){
	$ann_qarr = explode(",",$annincome_str);
	$ann_qry = "(";	
	for($i=0; $i<count($ann_qarr); $i++){
		$ann_qry .= "tbldatingusermaster.annual_income_id=".$ann_qarr[$i]." OR ";
	}
	$que .= substr($ann_qry,0,-4).") and ";
}
if($chkcast!=""){	
	$chkcast_arr = explode(",",$chkcast);
	$castqry = '(';
	for($i=0; $i<count($chkcast_arr); $i++){
		$castqry .= "tbldatingusermaster.castid = ".$chkcast_arr[$i]." OR ";
	}
	$que .= substr($castqry,0,-4).") and ";		
	
}
if($chkmool!=""){
	$chkmool_arr = explode(",",$chkmool);
	$moolqry = '(';	
	for($i=0; $i<count($chkmool_arr); $i++){
		$moolqry .= "tbldatingusermaster.mool = ".$chkmool_arr[$i]." OR ";	
	}
	$que .= substr($moolqry,0,-4).") and ";
}

if($chksubcast!="")	
	$que .= " tbldatingusermaster.castid IN ('". $chksubcast ."') and ";
	
if($chkchildren !=""){
	$que .= " tbldatingusermaster.wantchildrenid in ($work_city_str) and ";
}			


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
}

if(isset($_POST['searchcmbcommunity']) && $_POST['searchcmbcommunity']!='0.0'){
	$que .= " tbldatingusermaster.motherthoungid = ". $_POST["searchcmbcommunity"] ." and ";	
}

if (isset($_POST["radshowmember"]))
if ($_POST["radshowmember"] == "p")
	$que .=" tbldatingusermaster.imagenm is not null and ";
	
if (isset($_POST["chkonline"]))
if ($_POST["chkonline"] != "")
	$que .=" tbldatingusermaster.userid in(" . findonline_users_userid() . ") and ";

$ordby = "";
if (isset($_POST["radsortsearchresult"]))
{
	$ordby = searchresultsortby($_POST["radsortsearchresult"]);
}
if ($que !="")
{
	$_SESSION[$session_name_initital . "searchquery"] = $que;
	$_SESSION[$session_name_initital . "searchquery_original"] =$que;
	//echo($que);
	$filenm = searchresultfilenm($_POST["raddispresult"]); 

	header("location:$filenm");
}
function finduseridsquicksearch($tablenm,$fldnm,$keyword)
{
$useid =0;
$result = getdata("select userid from tbldatingusermaster,$tablenm where tbldatingusermaster.$fldnm=$tablenm.id and $tablenm.title like '%$keyword%'");
while($rs= mysqli_fetch_array($result))
{
	$useid = $useid . "," . $rs[0];
}
freeingresult($result);
if ($useid != "")
return $useid;
}
ob_flush();
?>