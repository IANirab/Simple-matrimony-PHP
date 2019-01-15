<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "modifyby";
	  $ipfldnm = "modifyip";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "createby";
	  $ipfldnm = "createip";
	}
	$ext = strtolower(substr(strrchr($_FILES["title"]["name"],"."),1));
	$filenm_to_upload = "tbloffice_location" . $action . ".$ext";
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query="";
	//$query .= sendtogeneratequery($action,"title",$filenm_to_upload,"Y");
	//$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	//$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	//$query .= sendtogeneratequery($action,"pagenm",$_POST['pagenm'],"Y");
	$query .= sendtogeneratequery($action,"currentstatus","0.0","Y");
	
$query .= sendtogeneratequery($action,"CityID",$_POST['cityid'],"N");			
$query .= sendtogeneratequery($action,"StateID",$_POST['stateid'],"N");		
$query .= sendtogeneratequery($action,"CountryID",$_POST['countryid'],"N");	
$query .= sendtogeneratequery($action,"ContactPerson",$_POST['txtContactPerson'],"Y");			
$query .= sendtogeneratequery($action,"NameOfOffice",$_POST['txtNameOfOffice'],"Y");		
$query .= sendtogeneratequery($action,"StreetAdd",$_POST['txtStreetAdd'],"Y");			
$query .= sendtogeneratequery($action,"LandAdd",$_POST['txtLandAdd'],"Y");			
$query .= sendtogeneratequery($action,"Postcode",$_POST['numPostcode'],"N");			
$query .= sendtogeneratequery($action,"Email",$_POST['emailEmail'],"Y");			
$query .= sendtogeneratequery($action,"Phone",$_POST['telPhone'],"N");		

	
	
	
	$query = substr($query,1);

	if ($action == 0)
	{
		
	 	$sSql = "insert into tbloffice_location (currentstatus,CityID,StateID,CountryID,ContactPerson,NameOfOffice,StreetAdd,LandAdd,Postcode,Email,Phone) values($query)";		

		execute($sSql);
		$retfile ="OfficeLocationManager.php";
		$action = getonefielddata("select max(id) from tbloffice_location");
	}
	else
	{
		$sSql = "update tbloffice_location set $query where id=$action";
		execute($sSql);
		$retfile ="OfficeLocationManager.php";
	}

if(isset($_FILES["title"]["tmp_name"]))
{
if($_FILES["title"]["tmp_name"] != "")
{
$ext = strtolower(substr(strrchr($_FILES["title"]["name"],"."),1));
$filenm_to_upload = "matrimonyhome" . $action . ".$ext";
if (!file_exists('../uploadfiles/site_'.$sitethemefolder.'')) {
    mkdir('../uploadfiles/site_'.$sitethemefolder.'', 0777, true);
}
copy($_FILES["title"]["tmp_name"],"../uploadfiles" . "/site_".$sitethemefolder."/" .$filenm_to_upload);
$sSql = "update tbl_homepage_images set title='$filenm_to_upload' where id=$action";
execute($sSql);
}
}
$_SESSION["adminerror"] = "information saved successfully";
header("location:$retfile");
?>