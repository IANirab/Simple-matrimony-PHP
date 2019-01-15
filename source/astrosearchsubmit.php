<?

ob_start();
require_once("commonfile.php");
//require_once("chatfunction.php");
$session_id = session_id();
if($enable_search_without_registration=='N' && !isset($_SESSION[$session_name_initital . "memberuserid"])){
	header("location:login.php");	
	exit;
}
if(isset($_POST['sign'])){
	$sign = $_POST['sign'];
}
$query = '';
if(isset($_POST['advlookingfor']) && $_POST['advlookingfor']!=''){
	$lookingfor = $_POST['advlookingfor'];
	$query .= " tbldatingusermaster.genderid=".$lookingfor." and " ;		
}

if ((isset($_POST["advminage"])) &&  (is_numeric($_POST["advminage"])) && $_POST["advminage"] != "0.0"){
	$query .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= " . $_POST["advminage"] . " and ";
}

if ((isset($_POST["advmaxage"])) &&  (is_numeric($_POST["advmaxage"])) && $_POST["advmaxage"] != "0.0"){
	$query .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <=" . $_POST["advmaxage"] . " and ";
}
	
if(isset($_POST['searchquickminage']) && $_POST['searchquickminage']!='' && $_POST['searchquickminage']!='0.0'){
	$minage = $_POST['searchquickminage'];
	$query .= " tbldatingusermaster.age >= $minage and ";
}
if(isset($_POST['searchquickmaxage']) && $_POST['searchquickmaxage']!='' && $_POST['searchquickmaxage']!='0.0'){
	$maxage = $_POST['searchquickmaxage'];
	$query .= " tbldatingusermaster.age <= $maxage and ";
}
if(isset($_POST['txtsign']) && $_POST['txtsign']!='' && $_POST['txtsign']!='0.0'){
	$signid = $_POST['txtsign'];
	if(isset($_POST['sign']) && $_POST['sign']!=''){
		$sign = $_POST['sign'];		
	}
	if($sign == 'M'){
		$query .= " tbldatingusermaster.moonsign = $signid and ";
	}
	if($sign == 'S'){
		$query .= " tbldatingusermaster.sunsignid = $signid and ";
	}	
}

if(isset($_POST['cmbreligian']) && $_POST['cmbreligian']!='' && $_POST['cmbreligian']!='0.0'){
	$cmbreligian = $_POST['cmbreligian'];
	$query .= " tbldatingusermaster.religianid = $cmbreligian and ";
}

if(isset($_POST['cmbgrah']) && $_POST['cmbgrah']!='' && $_POST['cmbgrah']!='0.0'){
	$grah = $_POST['cmbgrah'];
	$query .= " tbldatingusermaster.grahid = $grah and ";
}
if(isset($_POST['cmbpreferstarid']) && $_POST['cmbpreferstarid']!='' && $_POST['cmbpreferstarid']!='0.0'){
	$star = $_POST['cmbpreferstarid'];
	$query .= " tbldatingusermaster.prefer_star = $star and ";
}
if(isset($_POST['cmblagnaid']) && $_POST['cmblagnaid']!='' && $_POST['cmblagnaid']!='0.0'){
	$lagnaid = $_POST['cmblagnaid'];
	$query .= " tbldatingusermaster.lagnaid = $lagnaid and ";
}
if(isset($_POST['cmbsuryaid']) && $_POST['cmbsuryaid']!='' && $_POST['cmbsuryaid']!='0.0'){
	$suryaid = $_POST['cmbsuryaid'];
	$query .= " tbldatingusermaster.suryaid = $suryaid and ";
}
if(isset($_POST['cmbchandraid']) && $_POST['cmbchandraid']!='' && $_POST['cmbchandraid']!='0.0'){
	$chandraid = $_POST['cmbchandraid'];
	$query .= " tbldatingusermaster.chandraid = $chandraid and ";
}
if(isset($_POST['cmbmangalid']) && $_POST['cmbmangalid']!='' && $_POST['cmbmangalid']!='0.0'){
	$mangalid = $_POST['cmbmangalid'];
	$query .= " tbldatingusermaster.mangalid = $mangalid and ";
}
if(isset($_POST['cmbbudhaid']) && $_POST['cmbbudhaid']!='' && $_POST['cmbbudhaid']!='0.0'){
	$budhaid = $_POST['cmbbudhaid'];
	$query .= " tbldatingusermaster.budhaid = $budhaid and ";
}
if(isset($_POST['cmbvyazhamid']) && $_POST['cmbvyazhamid']!='' && $_POST['cmbvyazhamid']!='0.0'){
	$vyazhamid = $_POST['cmbvyazhamid'];
	$query .= " tbldatingusermaster.vyazham_id = $vyazhamid and ";
}
if(isset($_POST['cmbsukraid']) && $_POST['cmbsukraid']!='' && $_POST['cmbsukraid']!='0.0'){
	$sukraid = $_POST['cmbsukraid'];
	$query .= " tbldatingusermaster.sukraid = $sukraid and ";
}
if(isset($_POST['cmbshaniid']) && $_POST['cmbshaniid']!='' && $_POST['cmbshaniid']!='0.0'){
	$shaniid = $_POST['cmbshaniid'];
	$query .= " tbldatingusermaster.shaniid = $shaniid and ";
}
if(isset($_POST['cmbketuid']) && $_POST['cmbketuid']!='' && $_POST['cmbketuid']!='0.0'){
	$ketuid = $_POST['cmbketuid'];
	$query .= " tbldatingusermaster.ketuid = $ketuid and ";
}
if(isset($_POST['cmbgulikanid']) && $_POST['cmbgulikanid']!='' && $_POST['cmbgulikanid']!='0.0'){
	$gulikanid = $_POST['cmbgulikanid'];
	$query .= " tbldatingusermaster.gulikan = $gulikanid and ";
}
if(isset($_POST['cmbneptuneid']) && $_POST['cmbneptuneid']!='' && $_POST['cmbneptuneid']!='0.0'){
	$neptuneid = $_POST['cmbneptuneid'];
	$query .= " tbldatingusermaster.neptuneid = $neptuneid and ";
}
/*if($query!=''){
	$query .= $query." and ";	
}*/
if ($query !=""){
	$_SESSION[$session_name_initital . "searchquery"] = $query;
	$_SESSION[$session_name_initital . "searchquery_original"] =$query;
	
	header("location:searchresult.php");
}
/*echo $query;
exit;
$result = getdata("select * from tbldatingusermaster where currentstatus=0 $query ");*/
ob_flush();
?>