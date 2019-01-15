<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

/*if(isset($_POST['specialoffercode']) && $_POST['specialoffercode']!=""){
	$code = $_POST['specialoffercode'];	
	$exist_code = getonefielddata("SELECT specialoffercode from tblscspecialoffermaster WHERE specialoffercode='".$code."'");
	if($exist_code!=""){
		$_SESSION[$session_name_initital . "adminerror"] = "This code is already existed.";
		header("location:addspecialoffer.php");	
		exit;
	}
} 
*/
if(isset($_POST['cmbtype']) && $_POST['cmbtype']=="p"){
	if(isset($_POST['specialsffervalue']) && $_POST['specialsffervalue']==100)	{
		$_SESSION[$session_name_initital . "adminerror"] = "Value must be less than 100";
		header("location:addspecialoffer.php");	
		exit;		
	}
}


if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
	if (isset($_POST['active']))
		$active = "Y";
	else
		$active = "N";
		
	$query = sendtogeneratequery($action,"specialoffertype",$_POST['cmbtype'],"Y");
	$query .= sendtogeneratequery($action,"specialoffercode",$_POST['specialoffercode'],"Y");
	$query .= sendtogeneratequery($action,"specialsffervalue",$_POST['specialsffervalue'],"Y");
	$query .= sendtogeneratequery($action,"specialsffervaluedisplay",$_POST['specialsffervaluedisplay'],"Y");
	$query .= sendtogeneratequery($action,"active",$active ,"Y");
	
	$query = substr($query,1);
	
	 if ($action == 0)
	 {
	 	if(isset($_POST['specialoffercode']) && $_POST['specialoffercode']!=""){
		$code = $_POST['specialoffercode'];	
		$exist_code = getonefielddata("SELECT specialoffercode from tblscspecialoffermaster WHERE specialoffercode='".$code."'");
			if($exist_code!=""){
				$_SESSION[$session_name_initital . "adminerror"] = "This code is already existed.";
				header("location:addspecialoffer.php");	
				exit;
			}
		} 

	 	$query .= sendtogeneratequery($action,"createby",$_SESSION['adminlogin'],"N");
		$query .= sendtogeneratequery($action,"createdate",findcurrentdate(),"Y");
		$sSql = "insert into tblscspecialoffermaster(specialoffertype,specialoffercode,specialsffervalue,specialsffervaluedisplay,active,createby,createdate) values($query)";
		$retfile ="specialoffermanager.php";
	}
	else
	{
		$query .= sendtogeneratequery($action,"modifyby",$_SESSION['adminlogin'],"N");
		$query .= sendtogeneratequery($action,"modifydate",findcurrentdate(),"Y");
		$sSql = "update tblscspecialoffermaster set $query where specialofferid=$action";
		$retfile ="specialoffermanager.php";		
	}
	execute($sSql);
	$_SESSION["error"] = $MessSaveInformation;
	header("location:$retfile");
?>