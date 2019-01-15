<?

ob_start();
require_once('commonfile.php');
$profileid = 0;
if ((isset($_GET['b'])) && is_numeric($_GET['b']))
{
	$profileid = $_GET['b'];
	if ((isset($_POST["txtemail"])) && ($_POST["txtemail"] != ""))
	{
	$result = getdata("select subject,message from tbldatingemailmaster where emailid =8");
	while ($rs = mysqli_fetch_array($result))
	{
		$subject = $rs[0];
		$message = $rs[1];
	}	
	freeingresult($result);
	//$link = "<a href='" .displayprofilelink($profileid) ."'>$send_email_friend_name</a>";
	$link = displayprofilelink($profileid);
	
	$subject = str_replace("[sitename]",$sitename,$subject);
	$message = str_replace("[sitename]",$sitename,$message);
	
	
	if ($message != "")
		$message = str_replace("[website_profile_link]",$link,$message);
	 
	//echo($message);	
	sendemaildirect($_POST["txtemail"],$subject,$message);
	header("location:message.php?b=49&b1=$profileid");
	exit();
}
}
if ($profileid !=0)
header("location:displayprofile.php?b=$profileid");
else
header("location:index.php");
exit();
ob_flush();
?>