<?php
@ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$action = $curruserid;
//$religianid = getonefielddata("select religianid from tbldatingcastmaster where id =".$_POST['cmbreligian']);
//$dob = $_POST['dobyy'] . "-" . $_POST['dobmm'] . "-" . $_POST['dobdd'];
if (isset($_POST['ignore_horoscope'])){
	$ignor_horo ="Y";
}else{
	$ignor_horo ="N";
}

$query = sendtogeneratequery($action,"religianid",$_POST['cmbreligian'],"Y");
$query .= sendtogeneratequery($action,"countryofbirth",$_POST['cmbcountrybirthid'],"Y");
//$query .= sendtogeneratequery($action,"countryofgrewup",$_POST['cmbcountrygrewupid'],"Y");

if ($Enable_cast_subcast_design_setting == "Y") 
{
$query .= sendtogeneratequery($action,"castid",$_POST['cmbcast'],"Y");
if(isset($_POST['other_subcast']) && $_POST['other_subcast']!=''){
	execute("INSERT into tbldatingsubcastmaster SET title = '".$_POST['other_subcast']."', currentstatus=0, languageid=1, castid='".$_POST['cmbcast']."'");
	$subcastid='';
	$subcastid = getonefielddata("SELECT max(id) from tbldatingsubcastmaster");
	//$_POST['txtsubcat'] = $subcastid;
	//$subcast = check_lalid_length_input($_POST['other_subcast']);		
}
$subcast = check_lalid_length_input($subcastid);
$query .= sendtogeneratequery($action,"subcast",$subcast,"Y");
}

if($enable_religion_interest=="Y") { 
	if(isset($_POST['rel_interest']) && $_POST['rel_interest']!="0.0"){
		$rel_interest = $_POST['rel_interest'];
	} else {
		$rel_interest = "";
	}
$query .= sendtogeneratequery($action,"religion_interest",$rel_interest,"Y");
}

if ($ethnic_field_enable == "Y"){
	if(isset($_POST['ethnic']) && $_POST['ethnic']!="0.0"){
		$ethnic = $_POST['ethnic'];
	} else {
		$ethnic = "";
	}
	$query .= sendtogeneratequery($action,"ethnic",$ethnic,"Y");
}
if($enable_social_community == 'Y'){ 
$query .= sendtogeneratequery($action,"motherthoungid",$_POST['cmbmothertounge'],"Y");
}
//these two fields added by Nishit 
$query .= sendtogeneratequery($action,"familystatusid",$_POST['cmbfamilystatus'],"Y");
$query .= sendtogeneratequery($action,"familytypeid",$_POST['cmbfamilytype'],"Y");
//comment end
$query .= sendtogeneratequery($action,"familyvalueid",$_POST['cmbfamilyvalue'],"Y");
//if($enable_social_community=='Y'){ 
	$query .= sendtogeneratequery($action,"birthtime",check_lalid_length_input($_POST['txtbirthtime']),"Y");
	$query .= sendtogeneratequery($action,"birthplace",check_lalid_length_input($_POST['txtbirthplace']),"Y");
//}
if($enable_astrological_module=='Y'){ 
	if (findsettingvalue("Religion_field_display") == "H")
	{
		$query .= sendtogeneratequery($action,"gotra",check_lalid_length_input($_POST['txtgotra']),"Y");
		$query .= sendtogeneratequery($action,"grahid",$_POST['cmbgrahid'],"Y");
		$query .= sendtogeneratequery($action,"moonsignid",$_POST['txtmoonsign'],"Y");
		$query .= sendtogeneratequery($action,"sunsignid",$_POST['txtsunsign'],"Y");
		$query .= sendtogeneratequery($action,"birthrashi",$_POST['txtbirthrashi'],"Y");
	}
}


if(isset($_POST['cmbreligiosness_id']) && $_POST['cmbreligiosness_id']!="0.0"){
	$cmbreligiosness_id = $_POST['cmbreligiosness_id'];
} else {
	$cmbreligiosness_id = "";
}

if(isset($_POST['cmbhijab_id']) && $_POST['']!="0.0"){
	$cmbhijab_id = $_POST['cmbhijab_id'];
} else {
	$cmbhijab_id = "";
}
if(isset($_POST['cmbbeard_id']) && $_POST['cmbbeard_id']!="0.0"){
	$cmbbeard_id = $_POST['cmbbeard_id'];
} else {
	$cmbbeard_id = "";
}
if(isset($_POST['cmbrevert_islam_id']) && $_POST['cmbrevert_islam_id']!="0.0"){
	$cmbrevert_islam_id = $_POST['cmbrevert_islam_id'];
} else {
	$cmbrevert_islam_id = "";
}

if(isset($_POST['cmbhalal_strict_id']) && $_POST['cmbhalal_strict_id']!="0.0"){
	$cmbhalal_strict_id = $_POST['cmbhalal_strict_id'];
} else {
	$cmbhalal_strict_id = "";
}
if(isset($_POST['cmbsalah_perform_id']) && $_POST['cmbsalah_perform_id']!="0.0"){
	$cmbsalah_perform_id = $_POST['cmbsalah_perform_id'];
} else {
	$cmbsalah_perform_id = "";
}
//christian field start
if(isset($_POST['catholic']) && $_POST['catholic']!= ""){
	$catholic = $_POST['catholic'];
} else {
	$catholic = "";
}
if(isset($_POST['spiritual_order']) && $_POST['spiritual_order']!="")
{
$spiritual_order = $_POST['spiritual_order'];
}
else
{
	$spiritual_order = "";
}
if(isset($_POST['chr_denomination']) && $_POST['chr_denomination']!= ""){
	$chr_denomination = $_POST['chr_denomination'];
} else {
	$chr_denomination = "";
}
if(isset($_POST['chr_diocese']) && $_POST['chr_diocese']!= ""){
	$chr_diocese = $_POST['chr_diocese'];
} else {
	$chr_diocese = "";
}
//christian field end
if(isset($_POST['born'])){
	$born = $_POST['born'];
} else {
	$born = "";
}
if(isset($_POST['prayer']) && $_POST['prayer']!="0.0"){
	$prayer = $_POST['prayer'];
} else {
	$prayer = "";
}
if(isset($_POST['zakat']) && $_POST['zakat']!="0.0"){
	$zakat = $_POST['zakat'];
} else {
	$zakat = "";
}
if(isset($_POST['fasting']) && $_POST['fasting']!="0.0"){
	$fasting = $_POST['fasting'];
} else {
	$fasting = "";
}
if(isset($_POST['quran']) && $_POST['quran']!="0.0"){
	$quran = $_POST['quran'];
} else {
	$quran = "";
}
if (isset($_POST['type_of_horoscope'])){
	$horoscope = $_POST['type_of_horoscope'];
}

if(isset($_POST['districtid']) && $_POST['districtid']!=""){
	$districtid = $_POST['districtid'];
} else {
	$districtid = "";
}

if(isset($_POST['panchayat']) && $_POST['panchayat']!=""){
	$panchayat = $_POST['panchayat'];
} else {
	$panchayat = "";
}
/*else
	$horoscope = '';*/
//$query .= sendtogeneratequery($action,"dob",$dob,"Y");
/*if (findsettingvalue("Religion_field_display") == "M")
{*/
$query .= sendtogeneratequery($action,"religiosness_id",$cmbreligiosness_id,"Y");
$query .= sendtogeneratequery($action,"hijab_id",$cmbhijab_id,"Y");
$query .= sendtogeneratequery($action,"beard_id",$cmbbeard_id,"Y");
$query .= sendtogeneratequery($action,"prayer_id",$prayer,"Y");
$query .= sendtogeneratequery($action,"zakat_id",$zakat,"Y");
$query .= sendtogeneratequery($action,"fasting_id",$fasting,"Y");
$query .= sendtogeneratequery($action,"quran_id",$quran,"Y");
//$query .= sendtogeneratequery($action,"revert_islam_id",$cmbrevert_islam_id,"Y");
$query .= sendtogeneratequery($action,"revert_islam_id",$born,"Y");
$query .= sendtogeneratequery($action,"halal_strict_id",$cmbhalal_strict_id,"Y");
$query .= sendtogeneratequery($action,"salah_perform_id",$cmbsalah_perform_id,"Y");
//christian fields start
$query .= sendtogeneratequery($action,"catholic",$catholic,"Y");
$query .= sendtogeneratequery($action,"chr_denomination",$chr_denomination,"Y");
$query .= sendtogeneratequery($action,"chr_diocese",$chr_diocese,"Y");
//christian fields start
$query .= sendtogeneratequery($action,"maternal_name",$_POST['maternal_name'],"Y");
$query .= sendtogeneratequery($action,"maternal_location",$_POST['maternal_location'],"Y");
$query .= sendtogeneratequery($action,"lagnaid",$_POST['cmblagnaid'],"Y");
$query .= sendtogeneratequery($action,"suryaid",$_POST['cmbsuryaid'],"Y");
$query .= sendtogeneratequery($action,"chandraid",$_POST['cmbchandraid'],"Y");
$query .= sendtogeneratequery($action,"spiritual_order",$_POST['spiritual_order'],"Y");
$query .= sendtogeneratequery($action,"kujaid",$_POST['cmbkujaid'],"Y");
$query .= sendtogeneratequery($action,"budhaid",$_POST['cmbbudhaid'],"Y");
$query .= sendtogeneratequery($action,"vyazham_id",$_POST['cmbvyazhamid'],"Y");
$query .= sendtogeneratequery($action,"sukraid",$_POST['cmbsukraid'],"Y");
$query .= sendtogeneratequery($action,"shaniid",$_POST['cmbshaniid'],"Y");
$query .= sendtogeneratequery($action,"rahuid",$_POST['cmbrahuid'],"Y");
$query .= sendtogeneratequery($action,"ketuid",$_POST['cmbketuid'],"Y");
$query .= sendtogeneratequery($action,"gulikan",$_POST['cmbgulikanid'],"Y");
$query .= sendtogeneratequery($action,"mangalid",$_POST['cmbmangalid'],"Y");
$query .= sendtogeneratequery($action,"neptuneid",$_POST['cmbneptuneid'],"Y");
$query .= sendtogeneratequery($action,"horoscopeid",$horoscope,"Y");
$query .= sendtogeneratequery($action,"prefer_star",$_POST['cmbpreferstarid'],"Y");
$query .= sendtogeneratequery($action,"ignore_horo",$ignor_horo,"Y");
$query .= sendtogeneratequery($action,"mool",$_POST['mool'],"Y");
$query .= sendtogeneratequery($action,"muslimsubcast",$_POST['muslimsubcast'],"Y");
$query .= sendtogeneratequery($action,"islamic_education",$_POST['islamic_education'],"Y");
$query .= sendtogeneratequery($action,"denominationid",$_POST['denominationid'],"Y");
$query .= sendtogeneratequery($action,"panchayat",$panchayat,"Y");
$query .= sendtogeneratequery($action,"districtid",$districtid,"Y");
$query .= sendtogeneratequery($action,"parish",$_POST['parish'],"Y");
$query .= sendtogeneratequery($action,"star",$_POST['star'],"Y");
$query .= sendtogeneratequery($action,"sishata_dasa",$_POST['sishata_dasa'],"Y");
//$query .= sendtogeneratequery($action,"denomination_other",$_POST['denomination_other'],"Y");
//$query .= sendtogeneratequery($action,"spiritual_order_other",$_POST['spiritual_order_other'],"Y");
updateprofile($query,$curruserid);
if($_POST['denomination_other']!='' )
{
	execute("Insert into tbl_muslim_denomination (title,currentstatus) values ('".$_POST['denomination_other']."','5') ");
	
	$action = getonefielddata("SELECT max(id) from tbl_muslim_denomination");
	execute("update tbldatingusermaster set denominationid=".$action." where userid=".$curruserid);
	
}
if($_POST['cast_other']!='' )
{
	execute("Insert into tbldatingcastmaster (title,currentstatus,religianid) values ('".$_POST['cast_other']."','5','".$_POST['cmbreligian']."') ");
	
	$action = getonefielddata("SELECT max(id) from tbldatingcastmaster");
	execute("update tbldatingusermaster set castid =".$action." where userid=".$curruserid);
	}
if($_POST['spiritual_order_other']!='' )
{
	execute("Insert into tbldatingspiritualmaster (title,currentstatus) values ('".$_POST['spiritual_order_other']."','5') ");
	$action = getonefielddata("SELECT max(id) from tbldatingspiritualmaster");
	execute("update tbldatingusermaster set spiritual_order =".$action." where userid=".$curruserid);
}
if($_POST['subcast_other']!='' )
{
	execute("Insert into tbldatingsubcastmaster (title,currentstatus,castid) values ('".$_POST['subcast_other']."','5','".$_POST['cmbcast']."') ");
	$action = getonefielddata("SELECT max(id) from tbldatingsubcastmaster");
	execute("update tbldatingusermaster set subcast =".$action." where userid=".$curruserid);
}
if($_POST['motherthoungue_other']!='' )
{
execute("Insert into tbldatingmothertonguemaster (title,currentstatus) values ('".$_POST['motherthoungue_other']."','5') ");
	$action = getonefielddata("SELECT max(id) from tbldatingmothertonguemaster");
	execute("update tbldatingusermaster set motherthoungid =".$action." where userid=".$curruserid);
}
/*if(isset($_FILES["video"]['tmp_name']) && $_FILES["video"]['tmp_name']!=''){ 			
	        $ext = strtolower(substr(strrchr($_FILES["video"]['name'],"."),1));
		$filename = "video".$action.".".$ext; 
			copy($_FILES["video"]['tmp_name'],"../uploadfiles/".$filename);			
	  	   execute("update tbl_blog_master set video = '".$filename."' where  BlogId = $action"); 
        }*/


	//$ext=substr(strrev($_FILES['uploadparichay']['name']),0,3);
		//upload_user_horoscope("uploadhoroscope",$curruserid);}
	//echo strrev($_FILES['uploadparichay']['tmp_name']);
	//echo $ext;exit; 
if(file_exists($abspath."coding/plmodified_fields.php")){
	$_SESSION[$session_name_initital."pl"] = "multiple";
	include("plmodified_fields.php");
}
/*$gethidden = explode(",",$_POST['gethidden']);
$valfield = explode(",",$_POST['valfield']);
$datehidden = $_POST['datehidden'];
$count = count($gethidden);
for($i = 0; $i<$count; $i++) {
	execute("insert into tbl_modified_field_master(userid,name,vals,timing)values('$curruserid','$gethidden[$i]','$valfield[$i]','$datehidden')");
}*/



//////////////////////////////////////// Kundali ////////////////////////////////////////////////////
if(isset($_POST['default_kundali_type']) && $_POST['default_kundali_type']==0){

$planetname1 = "";
if(isset($_POST['pname1']) && $_POST['pname1'] != '')
{
	$planetname1 = $_POST['pname1'];
	
}
else
{
	$planetname1 = "";
}
if(isset($_POST['pname2']) && $_POST['pname2'] != '')
{
	$planetname2 = $_POST['pname2'];
	
}
else
{
	$planetname2 = "";
}
if(isset($_POST['pname3']) && $_POST['pname3'] != '')
{
	$planetname3 = $_POST['pname3'];
}
else
{
	$planetname3 = "";
}
if(isset($_POST['pname4']) && $_POST['pname4'] != '')
{
	$planetname4 = $_POST['pname4'];
}
else
{
	$planetname4 = "";
}
if(isset($_POST['pname5']) && $_POST['pname5'] != '')
{
	$planetname5 = $_POST['pname5'];
}
else
{
	$planetname5 = "";
}
if(isset($_POST['pname6']) && $_POST['pname6'] != '')
{
	$planetname6 = $_POST['pname6'];
}
else
{
	$planetname6 = "";
}
if(isset($_POST['pname7']) && $_POST['pname7'] != '')
{
	$planetname7 = $_POST['pname7'];
}
else
{
	$planetname7 = "";
}
if(isset($_POST['pname8']) && $_POST['pname8'] != '')
{
	$planetname8 = $_POST['pname8'];
}
else
{
	$planetname8 = "";
}

if(isset($_POST['pname9']) && $_POST['pname9'] != '')
{
	$planetname9 = $_POST['pname9'];
}
else
{
	$planetname9 = "";
}
if(isset($_POST['pname10']) && $_POST['pname10'] != '')
{
	$planetname10 = $_POST['pname10'];
}
else
{
	$planetname10 = "";
}
if(isset($_POST['pname11']) && $_POST['pname11'] != '')
{
	$planetname11 = $_POST['pname11'];
}
else
{
	$planetname11 = "";
}
if(isset($_POST['pname12']) && $_POST['pname12'] != ''){
	$planetname12 = $_POST['pname12'];
}else{
	$planetname12 = "";
}

$planethome1 = '0.0';
if(isset($_POST['cmblagnaid']) && $_POST['cmblagnaid'] != '')
{
	$planethome1 = $_POST['cmblagnaid'];
	
}
else
{
	$planethome1 = "";
}


if(isset($_POST['cmbsuryaid']) && $_POST['cmbsuryaid'] != '')
{
	$planethome2 = $_POST['cmbsuryaid'];
}
else
{
	$planethome2 = "";
}

if(isset($_POST['cmbchandraid']) && $_POST['cmbchandraid'] != '')
{
	$planethome3 = $_POST['cmbchandraid'];
}
else
{
	$planethome3 = "";
}
if(isset($_POST['cmbneptuneid']) && $_POST['cmbneptuneid'] != ''){
	$planethome4 = $_POST['cmbneptuneid'];
} else {
	$planethome4 = "";
}

if(isset($_POST['cmbbudhaid']) && $_POST['cmbbudhaid'] != '')
{
	$planethome5 = $_POST['cmbbudhaid'];
}
else
{
	$planethome5 = "";
}
if(isset($_POST['cmbvyazhamid']) && $_POST['cmbvyazhamid'] != '')
{
	$planethome6 = $_POST['cmbvyazhamid'];
}
else
{
	$planethome6 = "";
}

if(isset($_POST['cmbsukraid']) && $_POST['cmbsukraid'] != '')
{
	$planethome7 = $_POST['cmbsukraid'];
}
else
{
	$planethome7 = "";
}
if(isset($_POST['cmbshaniid']) && $_POST['cmbshaniid'] != '')
{
	$planethome8 = $_POST['cmbshaniid'];
}
else
{
	$planethome8 = "";
}
if(isset($_POST['cmbrahuid']) && $_POST['cmbrahuid'] != '')
{
	$planethome9 = $_POST['cmbrahuid'];
}
else
{
	$planethome9 = "";
}
if(isset($_POST['cmbketuid']) && $_POST['cmbketuid'] != '')
{
	$planethome10 = $_POST['cmbketuid'];
}
else
{
	$planethome10 = "";
}
if(isset($_POST['cmbgulikanid']) && $_POST['cmbgulikanid'] != '')
{
	$planethome11 = $_POST['cmbgulikanid'];
}
else
{
	$planethome11 = "";
}
if(isset($_POST['cmbmangalid']) && $_POST['cmbmangalid']!=''){
	$planethome12 = $_POST['cmbmangalid'];
} else {
	$planethome12 = '';
}
$act = 0;
execute("DELETE from tbldatingusergrahmaster WHERE userid='".$curruserid."' and type=0");
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname1,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome1,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname2,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome2,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname3,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome3,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname4,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome4,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname5,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome5,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname6,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome6,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname7,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome7,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname8,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome8,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname9,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome9,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname10,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome10,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname11,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome11,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname12,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome12,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome)values($query1) ";
execute($insert);
}
//////////////////////////////////////// Kundali ////////////////////////////////////////////////////








//////////////////////////////////////// Grahanila ////////////////////////////////////////////////////
if(isset($_POST['kundali_type1']) && $_POST['kundali_type1']==1){

$kundali_type=$_POST['kundali_type1'];	
$planetname1 = "";
if(isset($_POST['pname1']) && $_POST['pname1'] != '')
{
	$planetname1 = $_POST['pname1'];
	
}
else
{
	$planetname1 = "";
}
if(isset($_POST['pname2']) && $_POST['pname2'] != '')
{
	$planetname2 = $_POST['pname2'];
	
}
else
{
	$planetname2 = "";
}
if(isset($_POST['pname3']) && $_POST['pname3'] != '')
{
	$planetname3 = $_POST['pname3'];
}
else
{
	$planetname3 = "";
}
if(isset($_POST['pname4']) && $_POST['pname4'] != '')
{
	$planetname4 = $_POST['pname4'];
}
else
{
	$planetname4 = "";
}
if(isset($_POST['pname5']) && $_POST['pname5'] != '')
{
	$planetname5 = $_POST['pname5'];
}
else
{
	$planetname5 = "";
}
if(isset($_POST['pname6']) && $_POST['pname6'] != '')
{
	$planetname6 = $_POST['pname6'];
}
else
{
	$planetname6 = "";
}
if(isset($_POST['pname7']) && $_POST['pname7'] != '')
{
	$planetname7 = $_POST['pname7'];
}
else
{
	$planetname7 = "";
}
if(isset($_POST['pname8']) && $_POST['pname8'] != '')
{
	$planetname8 = $_POST['pname8'];
}
else
{
	$planetname8 = "";
}

if(isset($_POST['pname9']) && $_POST['pname9'] != '')
{
	$planetname9 = $_POST['pname9'];
}
else
{
	$planetname9 = "";
}
if(isset($_POST['pname10']) && $_POST['pname10'] != '')
{
	$planetname10 = $_POST['pname10'];
}
else
{
	$planetname10 = "";
}
if(isset($_POST['pname11']) && $_POST['pname11'] != '')
{
	$planetname11 = $_POST['pname11'];
}
else
{
	$planetname11 = "";
}
if(isset($_POST['pname12']) && $_POST['pname12'] != ''){
	$planetname12 = $_POST['pname12'];
}else{
	$planetname12 = "";
}	
	

$planethome1 = '0.0';
if(isset($_POST['cmblagnaid1']) && $_POST['cmblagnaid1'] != '')
{
	$planethome1 = $_POST['cmblagnaid1'];
	
}
else
{
	$planethome1 = "";
}


if(isset($_POST['cmbsuryaid1']) && $_POST['cmbsuryaid1'] != '')
{
	$planethome2 = $_POST['cmbsuryaid1'];
}
else
{
	$planethome2 = "";
}

if(isset($_POST['cmbchandraid1']) && $_POST['cmbchandraid1'] != '')
{
	$planethome3 = $_POST['cmbchandraid1'];
}
else
{
	$planethome3 = "";
}

if(isset($_POST['cmbneptuneid1']) && $_POST['cmbneptuneid1'] != ''){
	$planethome4 = $_POST['cmbneptuneid1'];
} else {
	$planethome4 = "";
}

if(isset($_POST['cmbbudhaid1']) && $_POST['cmbbudhaid1'] != '')
{
	$planethome5 = $_POST['cmbbudhaid1'];
}
else
{
	$planethome5 = "";
}
if(isset($_POST['cmbvyazhamid1']) && $_POST['cmbvyazhamid1'] != '')
{
	$planethome6 = $_POST['cmbvyazhamid1'];
}
else
{
	$planethome6 = "";
}

if(isset($_POST['cmbsukraid1']) && $_POST['cmbsukraid1'] != '')
{
	$planethome7 = $_POST['cmbsukraid1'];
}
else
{
	$planethome7 = "";
}
if(isset($_POST['cmbshaniid1']) && $_POST['cmbshaniid1'] != '')
{
	$planethome8 = $_POST['cmbshaniid1'];
}
else
{
	$planethome8 = "";
}
if(isset($_POST['cmbrahuid1']) && $_POST['cmbrahuid1'] != '')
{
	$planethome9 = $_POST['cmbrahuid1'];
}
else
{
	$planethome9 = "";
}
if(isset($_POST['cmbketuid1']) && $_POST['cmbketuid1'] != '')
{
	$planethome10 = $_POST['cmbketuid1'];
}
else
{
	$planethome10 = "";
}
if(isset($_POST['cmbgulikanid1']) && $_POST['cmbgulikanid1'] != '')
{
	$planethome11 = $_POST['cmbgulikanid1'];
}
else
{
	$planethome11 = "";
}
if(isset($_POST['cmbmangalid1']) && $_POST['cmbmangalid1']!=''){
	$planethome12 = $_POST['cmbmangalid1'];
} else {
	$planethome12 = '';
}
$act = 0;

execute("DELETE from tbldatingusergrahmaster WHERE userid='".$curruserid."' and type=".$kundali_type);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname1,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome1,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);

$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname2,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome2,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname3,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome3,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname4,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome4,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname5,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome5,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname6,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome6,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname7,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome7,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname8,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome8,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname9,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome9,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname10,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome10,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname11,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome11,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname12,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome12,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);

}

//////////////////////////////////////// Grahanila ////////////////////////////////////////////////////




//////////////////////////////////////// AMSAKAM ////////////////////////////////////////////////////
if(isset($_POST['kundali_type2']) && $_POST['kundali_type2']==2){

$kundali_type=$_POST['kundali_type2'];	
$planetname1 = "";
if(isset($_POST['pname1']) && $_POST['pname1'] != '')
{
	$planetname1 = $_POST['pname1'];
	
}
else
{
	$planetname1 = "";
}
if(isset($_POST['pname2']) && $_POST['pname2'] != '')
{
	$planetname2 = $_POST['pname2'];
	
}
else
{
	$planetname2 = "";
}
if(isset($_POST['pname3']) && $_POST['pname3'] != '')
{
	$planetname3 = $_POST['pname3'];
}
else
{
	$planetname3 = "";
}
if(isset($_POST['pname4']) && $_POST['pname4'] != '')
{
	$planetname4 = $_POST['pname4'];
}
else
{
	$planetname4 = "";
}
if(isset($_POST['pname5']) && $_POST['pname5'] != '')
{
	$planetname5 = $_POST['pname5'];
}
else
{
	$planetname5 = "";
}
if(isset($_POST['pname6']) && $_POST['pname6'] != '')
{
	$planetname6 = $_POST['pname6'];
}
else
{
	$planetname6 = "";
}
if(isset($_POST['pname7']) && $_POST['pname7'] != '')
{
	$planetname7 = $_POST['pname7'];
}
else
{
	$planetname7 = "";
}
if(isset($_POST['pname8']) && $_POST['pname8'] != '')
{
	$planetname8 = $_POST['pname8'];
}
else
{
	$planetname8 = "";
}

if(isset($_POST['pname9']) && $_POST['pname9'] != '')
{
	$planetname9 = $_POST['pname9'];
}
else
{
	$planetname9 = "";
}
if(isset($_POST['pname10']) && $_POST['pname10'] != '')
{
	$planetname10 = $_POST['pname10'];
}
else
{
	$planetname10 = "";
}
if(isset($_POST['pname11']) && $_POST['pname11'] != '')
{
	$planetname11 = $_POST['pname11'];
}
else
{
	$planetname11 = "";
}
if(isset($_POST['pname12']) && $_POST['pname12'] != ''){
	$planetname12 = $_POST['pname12'];
}else{
	$planetname12 = "";
}	
	

$planethome1 = '0.0';
if(isset($_POST['cmblagnaid2']) && $_POST['cmblagnaid2'] != '')
{
	$planethome1 = $_POST['cmblagnaid2'];
	
}
else
{
	$planethome1 = "";
}


if(isset($_POST['cmbsuryaid2']) && $_POST['cmbsuryaid2'] != '')
{
	$planethome2 = $_POST['cmbsuryaid2'];
}
else
{
	$planethome2 = "";
}

if(isset($_POST['cmbchandraid2']) && $_POST['cmbchandraid2'] != '')
{
	$planethome3 = $_POST['cmbchandraid2'];
}
else
{
	$planethome3 = "";
}

if(isset($_POST['cmbneptuneid2']) && $_POST['cmbneptuneid2'] != ''){
	$planethome4 = $_POST['cmbneptuneid2'];
} else {
	$planethome4 = "";
}

if(isset($_POST['cmbbudhaid2']) && $_POST['cmbbudhaid2'] != '')
{
	$planethome5 = $_POST['cmbbudhaid2'];
}
else
{
	$planethome5 = "";
}
if(isset($_POST['cmbvyazhamid2']) && $_POST['cmbvyazhamid2'] != '')
{
	$planethome6 = $_POST['cmbvyazhamid2'];
}
else
{
	$planethome6 = "";
}

if(isset($_POST['cmbsukraid2']) && $_POST['cmbsukraid2'] != '')
{
	$planethome7 = $_POST['cmbsukraid2'];
}
else
{
	$planethome7 = "";
}
if(isset($_POST['cmbshaniid2']) && $_POST['cmbshaniid2'] != '')
{
	$planethome8 = $_POST['cmbshaniid2'];
}
else
{
	$planethome8 = "";
}
if(isset($_POST['cmbrahuid2']) && $_POST['cmbrahuid2'] != '')
{
	$planethome9 = $_POST['cmbrahuid2'];
}
else
{
	$planethome9 = "";
}
if(isset($_POST['cmbketuid2']) && $_POST['cmbketuid2'] != '')
{
	$planethome10 = $_POST['cmbketuid2'];
}
else
{
	$planethome10 = "";
}
if(isset($_POST['cmbgulikanid2']) && $_POST['cmbgulikanid2'] != '')
{
	$planethome11 = $_POST['cmbgulikanid2'];
}
else
{
	$planethome11 = "";
}
if(isset($_POST['cmbmangalid2']) && $_POST['cmbmangalid2']!=''){
	$planethome12 = $_POST['cmbmangalid2'];
} else {
	$planethome12 = '';
}
$act = 0;

execute("DELETE from tbldatingusergrahmaster WHERE userid='".$curruserid."' and type=".$kundali_type);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname1,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome1,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);

$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname2,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome2,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname3,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome3,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname4,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome4,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname5,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome5,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname6,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome6,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname7,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome7,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname8,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome8,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname9,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome9,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname10,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome10,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname11,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome11,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);
$query1 = sendtogeneratequery($act,"userid",$curruserid,"Y");
$query1 .= sendtogeneratequery($act,"planetname",$planetname12,"Y");
$query1 .= sendtogeneratequery($act,"planethome",$planethome12,"Y");
$query1 .= sendtogeneratequery($act,"type",$kundali_type,"Y");
$query1 = substr($query1,1);
$insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values($query1) ";
execute($insert);

}

//////////////////////////////////////// Grahanila ////////////////////////////////////////////////////

















/*}*/
//code added by Nishit for horosocope upload
if($enable_astrological_module=='Y'){
	if(isset($_FILES['uploadhoroscope']['name']) && $_FILES['uploadhoroscope']['name']!=""){
		upload_user_horoscope("uploadhoroscope",$curruserid);	
	}
}
//code added by Nishit for horosocope upload

//if($enable_parichay=='Y'){ 
//	if(isset($_FILES['uploadparichay']['tmp_name']) && $_FILES['uploadparichay']['tmp_name']!=''){
//		
//	}
//}


/*function upload_user_parichay($ctrlnm,$userid){
if(isset($_FILES[$ctrlnm]['tmp_name']))
{
	global $siteuploadfilepath;
	$ext = strtolower(substr(strrchr($_FILES[$ctrlnm]['name'],"."),1));
	
	
	if (($ext == "jpg") || ($ext =="jpe") || ($ext == "gif") || ($ext == "png") || $ext = "pdf")
	{
	if ($_FILES[$ctrlnm]["size"] / 1024 < findsettingvalue("File_upload_size"))
	{		
	$filenm = "userparichay" . $userid . ".$ext";	
	$filenm_temp = "userparichay" . $userid . ".$ext";
	if (file_exists("$siteuploadfilepath" . "/" . $filenm_temp))
	unlink("$siteuploadfilepath" . "/" . $filenm_temp);	
	copy($_FILES[$ctrlnm]['tmp_name'],"$siteuploadfilepath" . "/" .$filenm);
	$filenmsave = "userparichay".$userid.".$ext";		
	//$filenm = generatewatermarkimagetextimage($filenm ,$filenmsave,$ext);	
	//$filenm_temp_thumb = "userpicture_thumbnil_temp" . $userid . ".$ext";
	//$filenm_thumb = "userpicture_thumbnil" . $userid . ".$ext";
	//$filenm_temp_thumb = scale_image($filenm_temp,$filenm_temp_thumb);
	//$filenm_thumb = generatewatermarkimagetextimage($filenm_temp_thumb ,$filenm_thumb,$ext);
	$action = $userid;
	$query = sendtogeneratequery($action,"uploadparichay",$filenm,"Y");
	//$query .= sendtogeneratequery($action,"thumbnil_image",$filenm_thumb,"Y");
	updateprofile($query,$userid);
	
	//if (file_exists("$siteuploadfilepath" . "/" . $filenm_temp_thumb))
	//unlink("$siteuploadfilepath" . "/" . $filenm_temp_thumb);
	} /*else {
		echo "higher";
		exit;
	}/
	}
}
}*/
//header("location:message.php?b=8");
$_SESSION[$session_name_initital . "error"] = $messageerrmess8;
//header("location:updateprofilecontact.php");
header("location:updateprofile2.php");

ob_end_flush();
?>