<?php
@ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$action = $curruserid;

if (isset($_POST['ignore_horoscope'])){
	$ignor_horo ="Y";
}else{
	$ignor_horo ="N";
}

$cmbreligian=get_form_data($_POST['cmbreligian'],1);
$cmbcountrybirthid=get_form_data($_POST['cmbcountrybirthid'],1);
$cmbcast=get_form_data($_POST['cmbcast'],1);
if(isset($_POST['txtsubcat']) && $_POST['txtsubcat']!='')
{
	$txtsubcat=$_POST['txtsubcat'];
}else{$txtsubcat='';}


$query = sendtogeneratequery($action,"religianid",$cmbreligian,"Y");
$query .= sendtogeneratequery($action,"countryofbirth",$cmbcountrybirthid,"Y");
$query .= sendtogeneratequery($action,"castid",$cmbcast,"Y");
$query .= sendtogeneratequery($action,"subcast",$txtsubcat,"Y");


if(isset($_POST['other_subcast']) && $_POST['other_subcast']!='')
{
	execute("INSERT into tbldatingsubcastmaster SET title = '".$_POST['other_subcast']."', currentstatus=5, languageid=1, castid='".$_POST['cmbcast']."'");
	$subcastid='';
	$subcastid = getonefielddata("SELECT max(id) from tbldatingsubcastmaster");
	$subcast = check_lalid_length_input($subcastid);
	$query .= sendtogeneratequery($action,"subcast",$subcast,"Y");
}

if($enable_religion_interest=="Y") 
{
	$rel_interest=get_form_data($_POST['rel_interest'],2);
	$query .= sendtogeneratequery($action,"religion_interest",$rel_interest,"Y");
}

if ($ethnic_field_enable == "Y")
{
	$ethnic=get_form_data($_POST['ethnic'],2);
	$query .= sendtogeneratequery($action,"ethnic",$ethnic,"Y");
}
if($enable_social_community == 'Y')
{ 
	$cmbmothertounge=get_form_data($_POST['cmbmothertounge'],2);
	$query .= sendtogeneratequery($action,"motherthoungid",$cmbmothertounge,"Y");
}

	$cmbfamilystatus=get_form_data($_POST['cmbfamilystatus'],1);
	$cmbfamilytype=get_form_data($_POST['cmbfamilytype'],1);
	$cmbfamilyvalue=get_form_data($_POST['cmbfamilyvalue'],1);
	$txtbirthtime=get_form_data($_POST['txtbirthtime'],1);
	$txtbirthplace=get_form_data($_POST['txtbirthplace'],1);

$query .= sendtogeneratequery($action,"familystatusid",$cmbfamilystatus,"Y");
$query .= sendtogeneratequery($action,"familytypeid",$cmbfamilytype,"Y");
$query .= sendtogeneratequery($action,"familyvalueid",$cmbfamilyvalue,"Y");
$query .= sendtogeneratequery($action,"birthtime",$txtbirthtime,"Y");
$query .= sendtogeneratequery($action,"birthplace",$txtbirthplace,"Y");


	if (findsettingvalue("Religion_field_display") == "H")
	{
			$txtgotra=get_form_data($_POST['txtgotra'],1);
			
			if(isset($_POST['cmbgrahid']) && $_POST['cmbgrahid']!='')
			{
				$cmbgrahid=$_POST['cmbgrahid'];
			}else{$cmbgrahid='';}
			
			$txtmoonsign=get_form_data($_POST['txtmoonsign'],1);
			$txtsunsign=get_form_data($_POST['txtsunsign'],1);
			$txtbirthrashi=get_form_data($_POST['txtbirthrashi'],1);
		
		$query .= sendtogeneratequery($action,"gotra",$txtgotra,"Y");
		$query .= sendtogeneratequery($action,"grahid",$cmbgrahid,"Y");
		$query .= sendtogeneratequery($action,"moonsignid",$txtmoonsign,"Y");
		$query .= sendtogeneratequery($action,"sunsignid",$txtsunsign,"Y");
		$query .= sendtogeneratequery($action,"birthrashi",$txtbirthrashi,"Y");
	}

	$cmbreligiosness_id=get_form_data($_POST['cmbreligiosness_id'],2);
		if(isset($_POST['cmbhijab_id']) && $_POST['cmbhijab_id']!='')
	{
		$cmbhijab_id=$_POST['cmbhijab_id'];
	}else{$cmbhijab_id='';}
	
	if(isset($_POST['cmbbeard_id']) && $_POST['cmbbeard_id']!='')
	{
		$cmbbeard_id=$_POST['cmbbeard_id'];
	}else{$cmbbeard_id='';}
	

	$cmbhalal_strict_id=get_form_data($_POST['cmbhalal_strict_id'],2);
	$cmbsalah_perform_id=get_form_data($_POST['cmbsalah_perform_id'],2);
	$catholic=get_form_data($_POST['catholic'],1);
		
	$chr_denomination=get_form_data($_POST['chr_denomination'],1);			
	$chr_diocese=get_form_data($_POST['chr_diocese'],1);				
	$born=get_form_data($_POST['born'],1);					
	$prayer=get_form_data($_POST['prayer'],2);						
	$fasting=get_form_data($_POST['fasting'],2);								
	$quran=get_form_data($_POST['quran'],2);									
	
	if(isset($_POST['districtid']) && $_POST['districtid']!='')
	{
		$districtid=$_POST['districtid'];
	}else{$districtid='';}
	
	if(isset($_POST['panchayat']) && $_POST['panchayat']!='')
	{
		$panchayat=$_POST['panchayat'];
	}else{$panchayat='';}
	

$query .= sendtogeneratequery($action,"religiosness_id",$cmbreligiosness_id,"Y");
$query .= sendtogeneratequery($action,"hijab_id",$cmbhijab_id,"Y");
$query .= sendtogeneratequery($action,"beard_id",$cmbbeard_id,"Y");
$query .= sendtogeneratequery($action,"prayer_id",$prayer,"Y");
$query .= sendtogeneratequery($action,"fasting_id",$fasting,"Y");
$query .= sendtogeneratequery($action,"quran_id",$quran,"Y");
$query .= sendtogeneratequery($action,"revert_islam_id",$born,"Y");
$query .= sendtogeneratequery($action,"halal_strict_id",$cmbhalal_strict_id,"Y");
$query .= sendtogeneratequery($action,"salah_perform_id",$cmbsalah_perform_id,"Y");
//christian fields start
$query .= sendtogeneratequery($action,"catholic",$catholic,"Y");
$query .= sendtogeneratequery($action,"chr_denomination",$chr_denomination,"Y");
$query .= sendtogeneratequery($action,"chr_diocese",$chr_diocese,"Y");
//christian fields start

$maternal_name=get_form_data($_POST['maternal_name'],1);
$maternal_location=get_form_data($_POST['maternal_location'],1);

if(isset($_POST['spiritual_order']) && $_POST['spiritual_order']!='')
{
	$spiritual_order=$_POST['spiritual_order'];
}else{$spiritual_order='';}

if(isset($_POST['cmbkujaid']) && $_POST['cmbkujaid']!='')
{
	$cmbkujaid=$_POST['cmbkujaid'];
}else{$cmbkujaid='';}


/*$cmblagnaid=get_form_data($_POST['cmblagnaid'],1);
$cmbsuryaid=get_form_data($_POST['cmbsuryaid'],1);
$cmbchandraid=get_form_data($_POST['cmbchandraid'],1);
$cmbbudhaid=get_form_data($_POST['cmbbudhaid'],1);
$cmbvyazhamid=get_form_data($_POST['cmbvyazhamid'],1);
$cmbsukraid=get_form_data($_POST['cmbsukraid'],1);
$cmbshaniid=get_form_data($_POST['cmbshaniid'],1);
$cmbrahuid=get_form_data($_POST['cmbrahuid'],1);
$cmbketuid=get_form_data($_POST['cmbketuid'],1);
$cmbgulikanid=get_form_data($_POST['cmbgulikanid'],1);
$cmbmangalid=get_form_data($_POST['cmbmangalid'],1);
$cmbneptuneid=get_form_data($_POST['cmbneptuneid'],1);*/

$cmblagnaid=get_form_data($_POST['cmbid1'],1);
$cmbsuryaid=get_form_data($_POST['cmbid2'],1);
$cmbchandraid=get_form_data($_POST['cmbid3'],1);
$cmbbudhaid=get_form_data($_POST['cmbid5'],1);
$cmbvyazhamid=get_form_data($_POST['cmbid6'],1);
$cmbsukraid=get_form_data($_POST['cmbid7'],1);
$cmbshaniid=get_form_data($_POST['cmbid8'],1);
$cmbrahuid=get_form_data($_POST['cmbid9'],1);
$cmbketuid=get_form_data($_POST['cmbid10'],1);
$cmbgulikanid=get_form_data($_POST['cmbid11'],1);
$cmbmangalid=get_form_data($_POST['cmbid4'],1);
$cmbneptuneid=get_form_data($_POST['cmbid12'],1);



$cmbpreferstarid=get_form_data($_POST['cmbpreferstarid'],1);



if(isset($_POST['mool']) && $_POST['mool']!='')
{
	$mool=$_POST['mool'];
}else{$mool='';}

if(isset($_POST['muslimsubcast']) && $_POST['muslimsubcast']!='')
{
	$muslimsubcast=$_POST['muslimsubcast'];
}else{$muslimsubcast='';}

if(isset($_POST['denominationid']) && $_POST['denominationid']!='')
{
	$denominationid=$_POST['denominationid'];
}else{$denominationid='';}

if(isset($_POST['parish']) && $_POST['parish']!='')
{
	$parish=$_POST['parish'];
}else{$parish='';}

$islamic_education=get_form_data($_POST['islamic_education'],1);


$query .= sendtogeneratequery($action,"maternal_name",$maternal_name,"Y");
$query .= sendtogeneratequery($action,"maternal_location",$maternal_location,"Y");
$query .= sendtogeneratequery($action,"lagnaid",$cmblagnaid,"Y");
$query .= sendtogeneratequery($action,"suryaid",$cmbsuryaid,"Y");
$query .= sendtogeneratequery($action,"chandraid",$cmbchandraid,"Y");
$query .= sendtogeneratequery($action,"spiritual_order",$spiritual_order,"Y");
$query .= sendtogeneratequery($action,"kujaid",$cmbkujaid,"Y");
$query .= sendtogeneratequery($action,"budhaid",$cmbbudhaid,"Y");
$query .= sendtogeneratequery($action,"vyazham_id",$cmbvyazhamid,"Y");
$query .= sendtogeneratequery($action,"sukraid",$cmbsukraid,"Y");
$query .= sendtogeneratequery($action,"shaniid",$cmbshaniid,"Y");
$query .= sendtogeneratequery($action,"rahuid",$cmbrahuid,"Y");
$query .= sendtogeneratequery($action,"ketuid",$cmbketuid,"Y");
$query .= sendtogeneratequery($action,"gulikan",$cmbgulikanid,"Y");
$query .= sendtogeneratequery($action,"mangalid",$cmbmangalid,"Y");
$query .= sendtogeneratequery($action,"neptuneid",$cmbneptuneid,"Y");
$query .= sendtogeneratequery($action,"prefer_star",$cmbpreferstarid,"Y");
$query .= sendtogeneratequery($action,"ignore_horo",$ignor_horo,"Y");
$query .= sendtogeneratequery($action,"mool",$mool,"Y");
$query .= sendtogeneratequery($action,"muslimsubcast",$muslimsubcast,"Y");
$query .= sendtogeneratequery($action,"islamic_education",$islamic_education,"Y");
$query .= sendtogeneratequery($action,"denominationid",$denominationid,"Y");
$query .= sendtogeneratequery($action,"panchayat",$panchayat,"Y");
$query .= sendtogeneratequery($action,"districtid",$districtid,"Y");
$query .= sendtogeneratequery($action,"parish",$parish,"Y");


updateprofile($query,$curruserid);
if(isset($_POST['denomination_other']) && $_POST['denomination_other']!='' )
{
	execute("Insert into tbl_muslim_denomination (title,currentstatus) values ('".$_POST['denomination_other']."','5') ");
	$action = getonefielddata("SELECT max(id) from tbl_muslim_denomination");
	execute("update tbldatingusermaster set denominationid=".$action." where userid=".$curruserid);
}

if(isset($_POST['cast_other']) && $_POST['cast_other']!='' )
{
	execute("Insert into tbldatingcastmaster (title,currentstatus,religianid) values ('".$_POST['cast_other']."','5','".$_POST['cmbreligian']."') ");
	$action = getonefielddata("SELECT max(id) from tbldatingcastmaster");
	execute("update tbldatingusermaster set castid =".$action." where userid=".$curruserid);
}

if( isset($_POST['spiritual_order_other']) && $_POST['spiritual_order_other']!='' )
{
	execute("Insert into tbldatingspiritualmaster (title,currentstatus) values ('".$_POST['spiritual_order_other']."','5') ");
	$action = getonefielddata("SELECT max(id) from tbldatingspiritualmaster");
	execute("update tbldatingusermaster set spiritual_order =".$action." where userid=".$curruserid);
}

if(isset($_POST['subcast_other']) && $_POST['subcast_other']!='' )
{
	execute("Insert into tbldatingsubcastmaster (title,currentstatus,castid) values ('".$_POST['subcast_other']."','5','".$_POST['cmbcast']."') ");
	$action = getonefielddata("SELECT max(id) from tbldatingsubcastmaster");
	execute("update tbldatingusermaster set subcast =".$action." where userid=".$curruserid);
}

if(isset($_POST['motherthoungue_other']) && $_POST['motherthoungue_other']!='' )
{
execute("Insert into tbldatingmothertonguemaster (title,currentstatus) values ('".$_POST['motherthoungue_other']."','5') ");
	$action = getonefielddata("SELECT max(id) from tbldatingmothertonguemaster");
	execute("update tbldatingusermaster set motherthoungid =".$action." where userid=".$curruserid);
}




//************ New Kundali Code Function impliment by mayank**************************//
execute("DELETE from tbldatingusergrahmaster WHERE userid='".$curruserid."' and type=1");
for ($x = 1; $x <= 12; $x++) {

		        $planetname= "";
				if(isset($_POST['pname'.$x]) && $_POST['pname'.$x] != '')
				{$planetname= $_POST['pname'.$x];
				}else {$planetname= "";}
				
				
				$planethome= "";
				if(isset($_POST['cmbid'.$x]) && $_POST['cmbid'.$x] != '')
				{$planethome= $_POST['cmbid'.$x];
				}else {$planethome= "";}
				
			   $insert = "insert into tbldatingusergrahmaster(userid,planetname,planethome,type)values('".$curruserid."','".$planetname."','".$planethome."','1') ";
execute($insert);
} 
//************ New Kundali Code Function End**************************//


 /*?>//////////////////////////////////////// Kundali ////////////////////////////////////////////////////
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
}<?php */
if($enable_astrological_module=='Y'){
	if(isset($_FILES['uploadhoroscope']['name']) && $_FILES['uploadhoroscope']['name']!=""){
		upload_user_horoscope("uploadhoroscope",$curruserid);	
	}
}

$_SESSION[$session_name_initital . "error"] = $messageerrmess8;
header("location:updateprofilecontact.php");

ob_end_flush();
?>