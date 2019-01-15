<?php
require_once("commonfileadmin.php");

if ((isset($_POST["userid"]))&& $_POST["userid"] != "")
{
	$uid = $_POST["userid"];
}
else
{
	$uid = 0;
}


$sql = "update tbldatingusermaster set smsverified='Y' where userid='".$uid."' "; 		 
execute($sql);
echo "SMS Verified Sucessfully";


//if ((isset($_POST["smscode"]))&& $_POST["smscode"] != "")
//{
//	$smscode = $_POST["smscode"];
//}
//else
//{
//	$smscode = 0;
//}
//


	//$chkcode='';
//  $chkcode = getonefielddata("SELECT count(userid) from tbldatingusermaster where smsverificationcode='".$smscode."' 
//  and userid='".$uid."' ");
//			
//				
//		if($chkcode!='' && $chkcode!=0)
//		{
//			$sql = "update tbldatingusermaster set smsverified='Y' where userid='".$uid."' "; 		 
//			execute($sql);
//			echo "SMS Verified Sucessfully";
//		}else
//		{
//			echo "SMS Code Incorrect";
//		}		
				
				 



?>