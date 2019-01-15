<? include("commonfile.php");
$filename = "islamicsearchsubmit";
$totaldisplay = 4;
if (isset($advance_search_login_required))
if ($advance_search_login_required == "Y")
checklogin($sitepath);
$marital="";
$grahid = "";
$work_in ="";
$work_in_country = "";
$religionid = findsettingvalue("Religion_default_id");
//$religionid = 0;
$search_annualincome = "";
if(isset($_SESSION[$session_name_initital."search_annualincome"]) && $_SESSION[$session_name_initital . "search_annualincome"]!=""){
	$search_annualincome = explode(",",$_SESSION[$session_name_initital . "search_annualincome"]);
}
$search_countries = "";
if(isset($_SESSION[$session_name_initital . "search_countries"]) && $_SESSION[$session_name_initital . "search_countries"]!=""){
	$search_countries = explode(",",$_SESSION[$session_name_initital . "search_countries"]);
}
$search_residence = "";
if(isset($_SESSION[$session_name_initital . "search_residence"]) && $_SESSION[$session_name_initital . "search_residence"]!=""){
	$search_residence = explode(",",$_SESSION[$session_name_initital . "search_residence"]);
}
$search_mangalik = "";
if(isset($_SESSION[$session_name_initital . "search_mangalik"]) && $_SESSION[$session_name_initital . "search_mangalik"]!=""){
	$search_mangalik = explode(",",$_SESSION[$session_name_initital . "search_mangalik"]);
}
$search_social = "";
if(isset($_SESSION[$session_name_initital . "search_social"]) && $_SESSION[$session_name_initital . "search_social"]!=""){
	$search_social = explode(",",$_SESSION[$session_name_initital . "search_social"]);
}
$search_work = "";
if(isset($_SESSION[$session_name_initital . "search_work"]) && $_SESSION[$session_name_initital . "search_work"]!= ""){
	$search_work = explode(",",$_SESSION[$session_name_initital . "search_work"]);	
}
$search_work_cntry = ""; 
if(isset($_SESSION[$session_name_initital . "search_work_cntry"]) && $_SESSION[$session_name_initital . "search_work_cntry"]!=""){
	$search_work_cntry = explode(",",$_SESSION[$session_name_initital . "search_work_cntry"]);
}

//for work state start
$search_work_state = "";
if(isset($_SESSION[$session_name_initital."search_work_state"]) && $_SESSION[$session_name_initital."search_work_state"]!="")	{
	$search_work_state = explode(",",$_SESSION[$session_name_initital."search_work_state"]);
}
//for work state end

//for work city start
$search_work_city = "";
if(isset($_SESSION[$session_name_initital."search_work_city"]) && $_SESSION[$session_name_initital."search_work_city"]!="")	{
	$search_work_city = explode(",",$_SESSION[$session_name_initital."search_work_city"]);
}
//for work city end
$search_occupation = "";
if(isset($_SESSION[$session_name_initital . "search_occupation"]) && $_SESSION[$session_name_initital . "search_occupation"]!=""){
	$search_occupation = explode(",",$_SESSION[$session_name_initital . "search_occupation"]);
}
$search_occupation_status = "";
if(isset($_SESSION[$session_name_initital . "search_occupation_status"]) && $_SESSION[$session_name_initital . "search_occupation_status"]!=""){
	$search_occupation_status = explode(",",$_SESSION[$session_name_initital . "search_occupation_status"]);	
}
$search_diet = "";
if(isset($_SESSION[$session_name_initital . "search_diet"]) && $_SESSION[$session_name_initital . "search_diet"]!=""){
	$search_diet = explode(",",$_SESSION[$session_name_initital . "search_diet"]);
}
$search_smoke = "";
if(isset($_SESSION[$session_name_initital . "search_smoke"]) && $_SESSION[$session_name_initital . "search_smoke"]!=""){
	$search_smoke = explode(",",$_SESSION[$session_name_initital . "search_smoke"]);
}
$search_drinker = "";
if(isset($_SESSION[$session_name_initital . "search_drinker"]) && $_SESSION[$session_name_initital . "search_drinker"]!=""){
	$search_drinker = explode(",",$_SESSION[$session_name_initital . "search_drinker"]);
}
$search_bodytype = "";
if(isset($_SESSION[$session_name_initital . "search_bodytype"]) && $_SESSION[$session_name_initital . "search_bodytype"]!=""){
	$search_bodytype = explode(",",$_SESSION[$session_name_initital . "search_bodytype"]);
}
$search_marital = "";
if(isset($_SESSION[$session_name_initital . "search_marital"]) && $_SESSION[$session_name_initital . "search_marital"]!=""){
	$search_marital = explode(",",$_SESSION[$session_name_initital . "search_marital"]);
}

$search_state = "";
if(isset($_SESSION[$session_name_initital . "search_state"]) && $_SESSION[$session_name_initital . "search_state"]!=""){
	$search_state = explode(",",$_SESSION[$session_name_initital . "search_state"]);
}

$search_city = "";
if(isset($_SESSION[$session_name_initital . "search_city"]) && $_SESSION[$session_name_initital . "search_city"]!=""){
	$search_city = explode(",",$_SESSION[$session_name_initital . "search_city"]);
}

//normal search sessions
$advname = "";
if(isset($_SESSION[$session_name_initital . "search_advname"]) && $_SESSION[$session_name_initital . "search_advname"]!="") {
	$advname = $_SESSION[$session_name_initital . "search_advname"];
}

$advminage = "";
if(isset($_SESSION[$session_name_initital . "search_advminage"]) && $_SESSION[$session_name_initital . "search_advminage"]!="") {
	$advminage = $_SESSION[$session_name_initital . "search_advminage"];
}
$advmaxage = "";
if(isset($_SESSION[$session_name_initital . "search_advmaxage"]) && $_SESSION[$session_name_initital . "search_advmaxage"]!="") {
	$advmaxage = $_SESSION[$session_name_initital . "search_advmaxage"];
}

$religionid = findsettingvalue("Religion_default_id");
if(isset($_SESSION[$session_name_initital . "search_cmbreligian"]) && $_SESSION[$session_name_initital . "search_cmbreligian"]!="") {
	$religionid = $_SESSION[$session_name_initital . "search_cmbreligian"];
}

$cmbcast = "0.0";
if(isset($_SESSION[$session_name_initital . "search_cmbcast"]) && $_SESSION[$session_name_initital . "search_cmbcast"]!="") {
	$cmbcast = $_SESSION[$session_name_initital . "search_cmbcast"];
}

$advsubcast = "";
if(isset($_SESSION[$session_name_initital . "search_advsubcast"]) && $_SESSION[$session_name_initital . "search_advsubcast"]!="") {
	$advsubcast = $_SESSION[$session_name_initital . "search_advsubcast"];
}

$advweight1 = "0.0";
if(isset($_SESSION[$session_name_initital . "search_advweight1"]) && $_SESSION[$session_name_initital . "search_advweight1"]!="") {
	$advweight1 = $_SESSION[$session_name_initital . "search_advweight1"];
}

$advweight2 = "0.0";
if(isset($_SESSION[$session_name_initital . "search_advweight2"]) && $_SESSION[$session_name_initital . "search_advweight2"]!="") {
	$advweight2 = $_SESSION[$session_name_initital . "search_advweight2"];
}

$advheight1 = "0.0";
if(isset($_SESSION[$session_name_initital . "search_advheight1"]) && $_SESSION[$session_name_initital . "search_advheight1"]!="") {
	$advheight1 = $_SESSION[$session_name_initital . "search_advheight1"];
}

$advheight2 = "0.0";
if(isset($_SESSION[$session_name_initital . "search_advheight2"]) && $_SESSION[$session_name_initital . "search_advheight2"]!="") {
	$advheight2 = $_SESSION[$session_name_initital . "search_advheight2"];
}

$radshowmember = "";
if(isset($_SESSION[$session_name_initital . "search_radshowmember"]) && $_SESSION[$session_name_initital . "search_radshowmember"]!="") {
	$radshowmember = $_SESSION[$session_name_initital . "search_radshowmember"];
}

$radsortsearchresult = "";
if(isset($_SESSION[$session_name_initital . "search_radsortsearchresult"]) && $_SESSION[$session_name_initital . "search_radsortsearchresult"]!="") {
	$radsortsearchresult = $_SESSION[$session_name_initital . "search_radsortsearchresult"];
}

$raddispresult = "";
if(isset($_SESSION[$session_name_initital . "search_raddispresult"]) && $_SESSION[$session_name_initital . "search_raddispresult"]!="") {
	$raddispresult = $_SESSION[$session_name_initital . "search_raddispresult"];
}

$chkonline = "";
if(isset($_SESSION[$session_name_initital . "search_chkonline"]) && $_SESSION[$session_name_initital . "search_chkonline"]!="") {
	$chkonline = $_SESSION[$session_name_initital . "search_chkonline"];
}

$chkchildren = "";
if(isset($_SESSION[$session_name_initital . "search_chkchildren"]) && $_SESSION[$session_name_initital . "search_chkchildren"]!="") {
	$chkchildren = explode(",",$_SESSION[$session_name_initital . "search_chkchildren"]);
}

$chkcomplexion = "";
if(isset($_SESSION[$session_name_initital . "search_chkcomplexion"]) && $_SESSION[$session_name_initital . "search_chkcomplexion"]!="") {
	$chkcomplexion = explode(",",$_SESSION[$session_name_initital . "search_chkcomplexion"]);
}

//for cast start
$chkcast = "";
if(isset($_SESSION[$session_name_initital . "search_chkcast"]) && $_SESSION[$session_name_initital . "search_chkcast"]!="") {
	$chkcast =	explode(",",$_SESSION[$session_name_initital . "search_chkcast"]);
}
//for cast end

//for subcast start
$chksubcast = "";
if(isset($_SESSION[$session_name_initital . "search_chksubcast"]) && $_SESSION[$session_name_initital . "search_chksubcast"]!="") {
	$chksubcast = explode(",",$_SESSION[$session_name_initital . "search_chksubcast"]);
}
//for subcast end

$chkspecialcase = "";
if(isset($_SESSION[$session_name_initital . "search_chkspecialcase"]) && $_SESSION[$session_name_initital . "search_chkspecialcase"]!="") {
	$chkspecialcase = explode(",",$_SESSION[$session_name_initital . "search_chkspecialcase"]);
}

$chklanguage = "";
if(isset($_SESSION[$session_name_initital . "search_chklanguage"]) && $_SESSION[$session_name_initital . "search_chklanguage"]!="") {
	$chklanguage = explode(",",$_SESSION[$session_name_initital . "search_chklanguage"]);
}

$chkadveducation = "";
if(isset($_SESSION[$session_name_initital . "search_chkadveducation"]) && $_SESSION[$session_name_initital . "search_chkadveducation"]!="") {
	$chkadveducation = explode(",",$_SESSION[$session_name_initital . "search_chkadveducation"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?=findsettingvalue("seo_islamic_search")?>
<? include('topjs.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.box {
	width:200px;
	height:100px;
	border:1px solid;
	float:left;
	margin:5px;
	padding:15px;
	overflow:auto;
}
.big_box {
	width:500px;
	height:1500px;
	border:1px solid;		
	
}

.chbx{
	padding:0px;
	margin:0px;
	width:16px;
	height:16px;
	border:none;
}
.div_text{
	z-index:auto;
}
</style>
<style type="text/css">
body {

}

#mainWrap {
	margin: 0 auto;
	width: 900px;
}

#wrdInfoWrap {
	background-color: #FFFF99;
	height: 80px;
}

#wrdInfoWrapLeft {
	float: left;
	width: 300px;
	padding: 10px;
}

#wrdInfoWrapRight {
	float: right;
}

#wrdInfoWrapRight A:link, #wrdInfoWrapRight A:visited, #wrdInfoWrapRight A:active {
	color: #333333;
	text-decoration: underline;
}

#wrdInfoWrapRight A:hover {
	color: #669900;
}

#wrdTutorialInfo {
	margin: 25px 10px; 0 0;
	background-color: #FFFFFF;
	padding: 5px;
}

#headerWrap {
	width: 100%;
	height: 30px;
	background-color: #666666;
	border: 1px #999999 solid;
}

#contentWrapLeft {
	float: left;
	width: 650px;
}


#contentWrapRight {
	float: right;
	width: 250px;
}

.productWrap {
	float:left;
	width: 170px;
	margin: 5px;
	padding:10px;
	text-align:center;
	color:#7a7a7a;
	border: 1px #EBEBEB solid;
}

.productPriceWrap {
	background-color: #CCCCCC;
	padding: 5px;
	color: #000000;
	font-weight: bold;
}

.productPriceWrap img {
	border: 0;
}

#basketWrap {
	margin: 10px;
	background-color: #EBEBEB;
	padding-bottom: 5px;
}

#basketTitleWrap {
	background-color: #669900;
	border: 3px #CCCCCC solid;
	padding: 5px;
	color: #FFFFFF;
	font-weight: bold;
	height: 20px;
}

#basketItemsWrap img {
	border: 0;
}

#basketItemsWrap ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

.basketItemLeft {
	float: left;
}

.basketItemRight {
	float: right;
}

#bannerWrap {
	margin: 10px;
	padding-bottom: 5px;
}
/*new css for music*/
#basketItemsWrap1 img {
	border: 0;
}

#basketItemsWrap1 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap1 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for interest*/
#basketItemsWrap2 img {
	border: 0;
}

#basketItemsWrap2 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap2 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for Favourite Read*/
#basketItemsWrap3 img {
	border: 0;
}

#basketItemsWrap3 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap3 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for Favourite Cuisines*/
#basketItemsWrap4 img {
	border: 0;
}

#basketItemsWrap4 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap4 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for Favourite Dress*/
#basketItemsWrap5 img {
	border: 0;
}

#basketItemsWrap5 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap5 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for Fitness*/
#basketItemsWrap6 img {
	border: 0;
}
	
#basketItemsWrap6 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap6 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}
/*.box {
	width:200px;
	height:100px;
	border:1px solid;
	float:left;
	margin:5px;
	padding:15px;
	overflow:auto;
}
.big_box {
	width:500px;
	height:1500px;
	border:1px solid;		
	
}

.chbx{
	padding:0px;
	margin:0px;
	width:16px;
	height:16px;
	border:none;
}
.div_text{
	z-index:auto;
}*/
</style>


<script language="javascript">
	function add_countries(val){
		document.getElementById('remove_rc').style.display = 'none';
		if(document.getElementById('countries_'+val).style.display == 'none'){
			document.getElementById('countries_'+val).style.display = 'inline';		
			document.getElementById('country_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_countries(val){
		document.getElementById('countries_'+val).style.display = 'none';
		document.getElementById('country_'+val).disabled = true;	
	}
	
	function add_residence(val){
		document.getElementById('remove_crs').style.display = 'none';
		if(document.getElementById('residences_'+val).style.display == 'none'){
			document.getElementById('residences_'+val).style.display = 'inline';		
			document.getElementById('residence_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_residence(val){
		document.getElementById('residences_'+val).style.display = 'none';
		document.getElementById('residence_'+val).disabled = true;	
	}
	
	function add_mangalik(val){
		document.getElementById('remove_mcs').style.display = 'none';
		if(document.getElementById('mangaliks_'+val).style.display == 'none'){
			document.getElementById('mangaliks_'+val).style.display = 'inline';		
			document.getElementById('mangalik_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_mangalik(val){
		document.getElementById('mangaliks_'+val).style.display = 'none';
		document.getElementById('mangalik_'+val).disabled = true;	
	}
	
	function add_social(val){
		document.getElementById('remove_sc').style.display = 'none';
		if(document.getElementById('socials_'+val).style.display == 'none'){
			document.getElementById('socials_'+val).style.display = 'inline';		
			document.getElementById('social_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_social(val){
		document.getElementById('socials_'+val).style.display = 'none';
		document.getElementById('social_'+val).disabled = true;	
	}
	
	function add_work_in(val){
		document.getElementById('remove_wi').style.display = 'none';
		if(document.getElementById('works_'+val).style.display == 'none'){
			document.getElementById('works_'+val).style.display = 'inline';		
			document.getElementById('work_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_work_in(val){
		document.getElementById('works_'+val).style.display = 'none';
		document.getElementById('work_'+val).disabled = true;	
	}	
	
	function add_work_c(val){
		document.getElementById('remove_wic').style.display = 'none';
		if(document.getElementById('workcs_'+val).style.display == 'none'){
			document.getElementById('workcs_'+val).style.display = 'inline';		
			document.getElementById('workc_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_work_c(val){
		document.getElementById('workcs_'+val).style.display = 'none';
		document.getElementById('workc_'+val).disabled = true;	
	}
	
	function add_work_s(val){
		document.getElementById('remove_wis').style.display = 'none';
		if(document.getElementById('workcss_'+val).style.display == 'none'){
			document.getElementById('workcss_'+val).style.display = 'inline';		
			document.getElementById('workcst_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_work_s(val){		
		document.getElementById('workcss_'+val).style.display = 'none';
		document.getElementById('workcs_'+val).disabled = true;	
	}
	
	function add_work_city(val){
		document.getElementById('remove_wicc').style.display = 'none';
		if(document.getElementById('workcssc_'+val).style.display == 'none'){
			document.getElementById('workcssc_'+val).style.display = 'inline';		
			document.getElementById('workcsc_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_work_city(val){		
		document.getElementById('workcssc_'+val).style.display = 'none';
		document.getElementById('workcsc_'+val).disabled = true;	
	}
	
	function add_occupation(val){
		document.getElementById('remove_o').style.display = 'none';
		if(document.getElementById('occupations_'+val).style.display == 'none'){
			document.getElementById('occupations_'+val).style.display = 'inline';		
			document.getElementById('occupation_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_occupation(val){
		document.getElementById('occupations_'+val).style.display = 'none';
		document.getElementById('occupation_'+val).disabled = true;	
	}
	
	
	function add_occupation_status(val){
		document.getElementById('remove_os').style.display = 'none';
		if(document.getElementById('occupss_'+val).style.display == 'none'){
			document.getElementById('occupss_'+val).style.display = 'inline';		
			document.getElementById('occups_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_occupation_status(val){
		document.getElementById('occupss_'+val).style.display = 'none';
		document.getElementById('occups_'+val).disabled = true;	
	}	
	
	function add_diet(val){
		document.getElementById('remove_d').style.display = 'none';
		if(document.getElementById('diets_'+val).style.display == 'none'){
			document.getElementById('diets_'+val).style.display = 'inline';		
			document.getElementById('diet_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_diet(val){
		document.getElementById('diets_'+val).style.display = 'none';
		document.getElementById('diet_'+val).disabled = true;	
	}
	
	function add_smoker(val){
		document.getElementById('remove_sm').style.display = 'none';
		if(document.getElementById('smokers_'+val).style.display == 'none'){
			document.getElementById('smokers_'+val).style.display = 'inline';		
			document.getElementById('smoker_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_smoker(val){
		document.getElementById('smokers_'+val).style.display = 'none';
		document.getElementById('smoker_'+val).disabled = true;	
	}
	
	function add_drinker(val){
		document.getElementById('remove_dr').style.display = 'none';
		if(document.getElementById('drinkers_'+val).style.display == 'none'){
			document.getElementById('drinkers_'+val).style.display = 'inline';		
			document.getElementById('drinker_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_drinker(val){
		document.getElementById('drinkers_'+val).style.display = 'none';
		document.getElementById('drinker_'+val).disabled = true;	
	}
	
	function add_bodytype(val){
		document.getElementById('remove_b').style.display = 'none';
		if(document.getElementById('bodytypes_'+val).style.display == 'none'){
			document.getElementById('bodytypes_'+val).style.display = 'inline';		
			document.getElementById('bodytype_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_bodytype(val){
		document.getElementById('bodytypes_'+val).style.display = 'none';
		document.getElementById('bodytype_'+val).disabled = true;	
	}
	
	function add_marital(val){
		if(val==2 || val==3) {
			document.getElementById('have_children').style.display = 'table-row';
		}	
		
		document.getElementById('remove_m').style.display = 'none';
		if(document.getElementById('maritals_'+val).style.display == 'none'){
			document.getElementById('maritals_'+val).style.display = 'inline';		
			document.getElementById('marital_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_marital(val){
		document.getElementById('maritals_'+val).style.display = 'none';
		document.getElementById('marital_'+val).disabled = true;	
	}
	
	function add_state(val){
		document.getElementById('remove_s').style.display = 'none';
		if(document.getElementById('states_'+val).style.display == 'none'){
			document.getElementById('states_'+val).style.display = 'inline';		
			document.getElementById('state_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_state(val){
		document.getElementById('states_'+val).style.display = 'none';
		document.getElementById('state_'+val).disabled = true;	
	}
	
	function add_city(val){
		document.getElementById('remove_rcs').style.display = 'none';
		if(document.getElementById('cities_'+val).style.display == 'none'){
			document.getElementById('cities_'+val).style.display = 'inline';		
			document.getElementById('city_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_city(val){
		document.getElementById('cities_'+val).style.display = 'none';
		document.getElementById('city_'+val).disabled = true;	
	}
	
	function remove_any(val) {
		document.getElementById('remove_'+val).style.display = 'none';
	}
	
	function add_cast(div){	
		document.getElementById(div).disabled = true;
		$('div.showhide'+div+',h1').show("slow");
		document.getElementById(div).disabled = false;
	}

	function remove_cast(div){
		$('div.showhide'+div+',h1').hide("slow");
		document.getElementById(div).disabled = true;
	}
	
	

	function add(div,div1){
		document.getElementById(div1).disabled = true;
		$('div.'+div+',h1').show("slow");
		document.getElementById(div1).disabled = false;
	}

	function remove(div,div1){
		$('div.'+div+',h1').hide("slow");
		document.getElementById(div1).disabled = true;
	}
	function check_casts(religionid){	
	$.post("check_cast_subcast.php",{
			religionid:religionid
		},function (data){			
			//alert(data);
			document.getElementById('advcasts').innerHTML = data;
		}		
		)

}
</script>	

<?=findsettingvalue("Webstats_code"); ?>

</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about wrapper_advancesearch raw">
	<div class="container">
    	<? include("plugin.islamicsearch.php");?>
    </div>
   
</div>
</div>
<div class="wrapper_blank">
	<div class="container">
    	 <div col-lg-9 col-md-9 col-sm-9 col-xs-12>
    			<div class="leftcms">
		 &nbsp;
    </div>
    </div>
    <div col-lg-3 col-md-3 col-sm-3 col-xs-12>
    			<div class="rightcms">
		 &nbsp;
    </div>
    </div>
    </div>
</div>
<? include('formjs.php'); ?>
<script type="text/javascript">
   
	
	function getcastbox(religionid){
	$("#quickcasts").hide();
	if(parseInt(religionid)>0){
		$.post("get_boxdata.php",{
			type:"castbox",
			religionid:religionid	
		}, function (data){			
			$("#quickcasts").html(data);			
			$("#quickcasts").show();
		})
	}
	}
	function getsubcastbox(castid){		
	$("#quicksubcasts").hide();
	if(parseInt(castid)>0){
		$.post("get_boxdata.php",{
			type:"subcastbox",
			castid:castid	
		}, function (data){			
			$("#quicksubcasts").html(data);
			$("#quicksubcasts").show();
		})
	}
	}
	
  </script>

<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>

</body>
</html>