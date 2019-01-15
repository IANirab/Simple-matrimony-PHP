<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action=0;

$total_fld_csv = 21;
$fldnm_profile="email,nickname,password,name,genderid,dob,countryid,state,city,mobile,maritalstatusid,heightid,weightid,religianid,castid,motherthoungid,educationid,ocupationid,profileheadline,annual_income_currancyid,annual_income_id";

$retfile ="user_bulk_upload.php";
if (isset($_FILES['img']['tmp_name']))
if (is_uploaded_file($_FILES['img']['tmp_name']))
{
	$ext =strrev(substr(strrev($_FILES['img']['name']),0,3));
	$ext = strtolower($ext);
	if (!(($ext == "txt") || ($ext =="csv")))
	{
		$_SESSION[$session_name_initital . "adminerror"] = "you can upload only txt or csv file";
		header("location:$retfile");
		exit();
	}
	$filenm = "../uploadfiles/user_bulk_upload." . $ext;
	copy($_FILES['img']['tmp_name'],$filenm);
	//
	if (file_exists($filenm)) 
	{
	$ip = getip();
	$expiredate= findexpdate();
	
	
	$handle = fopen ("$filenm","r");
	$total_profile_uploaded = 0;	
	while ($data = fgetcsv ($handle, 1000, ",")) 
	{
	if ($total_profile_uploaded >= $maximum_record_can_bulk_upload_profile)
	{
		break;
	}
	if (count($data) >1)
	{
		$query ="";
		$allowed ="N";
		$checkalreadyregistered = getonefielddata("SELECT count(userid) from tbldatingusermaster where email='$data[0]'");
		if($checkalreadyregistered == 0)
			$allowed ="Y";
		else
			$allowed ="N";
		$checkalreadyregistered = getonefielddata("SELECT count(userid) from tbldatingusermaster where nickname='$data[1]'");
		if($checkalreadyregistered == 0)
		$allowed ="Y";
		else
		$allowed ="N";
		if ($allowed == "Y")
		{
		for($i=0;$i<$total_fld_csv;$i++)
		{
			$query .= sendtogeneratequery($action,"",$data[$i],"Y");
		}
		$zodiacsign ="";
		if ($data[5] != "")
		{
			$dob_arr = split("-",$data[5]);
			$zodiacsign =findzodiacsign($dob_arr[2],$dob_arr[1]);
		}
		if ($data[4] == 1)
			$lookingforid = 2;
		else
			$lookingforid = 1;
			
		$query .= sendtogeneratequery($action,"lookingforid",$lookingforid,"Y");
		$query .= sendtogeneratequery($action,"packageid",findsettingvalue("trialpackageid"),"Y");
		$query .= sendtogeneratequery($action,"expiredate",$expiredate,"Y");
		$query .= sendtogeneratequery($action,"emailverified","Y","Y");
		$query .= sendtogeneratequery($action,"zodiacsign",$zodiacsign,"Y");
		$query .= sendtogeneratequery($action,"CreateIP",$ip,"Y");
		
		$query = substr($query,1);
		
		execute("INSERT INTO tbldatingusermaster($fldnm_profile ,lookingforid,packageid,expiredate,emailverified,zodiacsign,CreateIP,createdate) values($query,curdate())");
		
		$userid = getonefielddata("select max(userid) from tbldatingusermaster");

		$emailverificationcode = rand();
		$emailverificationcode = $emailverificationcode . $userid;
		$profile_code = profile_id_code($userid);
		
		execute("update tbldatingusermaster set emailverificationcode='$emailverificationcode',profile_code='$profile_code' where userid=$userid");
		$total_profile_uploaded = $total_profile_uploaded+1;
		}
		}
	} 
}
fclose ($handle);
unlink($filenm);
//
}
$_SESSION[$session_name_initital . "adminerror"] = $total_profile_uploaded . " profile has been uploaded successfully";
header("location:$retfile");
?>