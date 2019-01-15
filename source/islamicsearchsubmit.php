<?

ob_start();
include("commonfile.php");
$searchiscasts = '';
$searchissubcasts = '';
$searchsiscommunity = '';
$cmbdenomination_id = '';
$spiritual_id = '';
$cmbreligiosness_id = '';
$cmbhijab_id = '';
$cmbbeard_id = '';
$cmbrevert_islam_id = '';
$cmbhalal_strict_id = '';
$cmbsalah_perform_id = '';
$advlookingfor = '';
$cmbreligian = '';

if(isset($_POST['cmbreligian']) && $_POST['cmbreligian']!=''){
	$cmbreligian = $_POST['cmbreligian'];
}
if(isset($_POST['advlookingfor']) && $_POST['advlookingfor']!=''){
	$advlookingfor = $_POST['advlookingfor'];
}
if(isset($_POST['searchcasts']) && $_POST['searchcasts']!=''){
	$searchiscasts = $_POST['searchcasts'];
}
if(isset($_POST['searchsubcasts']) && $_POST['searchsubcasts']!=''){
	$searchissubcasts = $_POST['searchsubcasts'];
}
if(isset($_POST['searchsocialcommunity']) && $_POST['searchsocialcommunity']!=''){
	$searchsiscommunity = $_POST['searchsocialcommunity'];
}
if(isset($_POST['cmbdenomination_id']) && $_POST['cmbdenomination_id']!=''){
	$cmbdenomination_id = $_POST['cmbdenomination_id'];
}
if(isset($_POST['spiritual_id']) && $_POST['spiritual_id']!=''){
	$spiritual_id = $_POST['spiritual_id'];
}
if(isset($_POST['cmbreligiosness_id']) && $_POST['cmbreligiosness_id']!=''){
	$cmbreligiosness_id = $_POST['cmbreligiosness_id'];
}
if(isset($_POST['cmbhijab_id']) && $_POST['cmbhijab_id']!=''){
	$cmbhijab_id = $_POST['cmbhijab_id'];	
}
if(isset($_POST['cmbbeard_id']) && $_POST['cmbbeard_id']!=''){
	$cmbbeard_id = $_POST['cmbbeard_id'];
}
if(isset($_POST['cmbrevert_islam_id']) && $_POST['cmbrevert_islam_id']!=''){
	$cmbrevert_islam_id = $_POST['cmbrevert_islam_id'];
}
if(isset($_POST['cmbhalal_strict_id']) && $_POST['cmbhalal_strict_id']!=''){
	$cmbhalal_strict_id = $_POST['cmbhalal_strict_id'];
}
if(isset($_POST['cmbsalah_perform_id']) && $_POST['cmbsalah_perform_id']!=''){
	$cmbsalah_perform_id = $_POST['cmbsalah_perform_id'];
}
$whque = "";
if($cmbreligian>0){
	$whque .= " tbldatingusermaster.religianid=".$cmbreligian." AND ";	
}
if($searchiscasts!=''){
	$searchiscasts_arr = $searchiscasts;
	$cast_que = "(";
	for($i=0; $i<count($searchiscasts_arr); $i++){
		$cast_que .= " tbldatingusermaster.castid = ".$searchiscasts_arr[$i]." OR ";
	}
	$cast_que = substr($cast_que,0,-4);
	if($cast_que!=''){
		$whque .= $cast_que.") and ";
	}
}
if($searchissubcasts!=''){
	$searchissubcasts_arr = $searchissubcasts;
	$subcast_que = "(";
	for($i=0; $i<count($searchissubcasts_arr); $i++){
		$subcast_que .= " tbldatingusermaster.subcast = ".$searchissubcasts_arr[$i]." OR ";	
	}
	$subcast_que = substr($subcast_que,0,-4);
	if($subcast_que!=''){
		$whque .= $subcast_que.") and ";
	}
}
if($searchsiscommunity!=''){
	$searchsiscom_arr = $searchsiscommunity;
	$searchcomm_que = "(";	
	for($i=0; $i<count($searchsiscom_arr); $i++){
		$searchcomm_que .= " tbldatingusermaster.motherthoungid = ".$searchsiscom_arr[$i]." OR ";
	}
	$searchcomm_que = substr($searchcomm_que,0,-4);
	if($searchcomm_que!=''){
		$whque .= $searchcomm_que.") and ";
	}
}
if($cmbdenomination_id!=''){
	$searchisdenomination_arr = $cmbdenomination_id;
	$search_denominque = "(";	
	for($i=0; $i<count($searchisdenomination_arr); $i++){
		$search_denominque .= " tbldatingusermaster.denominationid = ".$searchisdenomination_arr[$i]." OR ";	
	}
	$search_denominque = substr($search_denominque,0,-4);
	if($search_denominque!=''){
		$whque .= $search_denominque.") and ";
	}
}
if($spiritual_id!=''){
	$spiritual_arr = $spiritual_id;
	$spiritual_que = "(";	
	for($i=0; $i<count($spiritual_arr); $i++){
		$spiritual_que .= " tbldatingusermaster.spiritual_order=".$spiritual_arr[$i]." OR ";	
	}
	$spiritual_que = substr($spiritual_que,0,-4);
	if($spiritual_que!=''){
		$whque .= $spiritual_que .") and ";
	}
}
if($advlookingfor>0){
	$whque .= " tbldatingusermaster.genderid=".$advlookingfor." AND "; 	
}
if($cmbreligiosness_id>0){
	$whque .= " tbldatingusermaster.religiosness_id=".$cmbreligiosness_id." AND ";	
}
if($cmbhijab_id>0){
	$whque .= " tbldatingusermaster.hijab_id=".$hijab_id." AND ";	
}
if($cmbbeard_id>0){
	$whque .= " tbldatingusermaster.beard_id=".$cmbbeard_id." AND ";	
}
if($cmbrevert_islam_id>0){
	$whque .= " tbldatingusermaster.revert_islam_id=".$cmbrevert_islam_id." AND ";	
}
if($cmbhalal_strict_id>0){
	$whque .= " tbldatingusermaster.halal_strict_id=".$cmbhalal_strict_id." AND ";	
}
if($cmbsalah_perform_id>0){
	$whque .= " tbldatingusermaster.salah_perform_id=".$cmbsalah_perform_id." AND ";	
}
if(isset($_POST['raddispresult']) && $_POST['raddispresult']){
	$_SESSION[$session_name_initital . "search_raddispresult"] = $_POST['raddispresult'];
	$_SESSION[$session_name_initital . "search_grid_design_display"] = $_POST['raddispresult'];
}
$_SESSION[$session_name_initital . "searchquery"] = $whque;
$_SESSION[$session_name_initital . "searchquery_original"] =$whque;
$filenm = searchresultfilenm($_POST["raddispresult"]);
header("location:".$filenm);
exit;
?>