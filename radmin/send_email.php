<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();



if(isset($_POST['touid']) && $_POST['touid']!='')
{
	$touid=$_POST['touid'];
}

if(isset($_POST['uid']) && $_POST['uid']!='')
{
	$uid=$_POST['uid'];
}

 //$email=getonefielddata("SELECT email from  tbldatingusermaster where userid='".$uid."' ");
  $email="admin@mobywebsite.com";
  $message="new";
  $result = getdata("select subject,message from tbldatingemailmaster where emailid =14");
	while($rs= mysqli_fetch_array($result))
	{ 
		$subject = $rs[0];
		$message = $rs[1];
	}
		freeingresult($result);
	//$message = str_replace("[sendername]",$sendername,$message);
	$message = str_replace("[senderimage]",$senderimage,$message);
	
 
sendemaildirect($email,$subject,$message,"");

echo "aaa";



//$sSql = "delete from tbldatingmessangermaster where fromuserid=$action and touserid=$action";
//execute($sSql);


?>