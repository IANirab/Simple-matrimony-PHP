<?

ob_start();
require_once("commonfile.php");
checklogin($sitepath);

$ip =getip();
if(isset($_GET['b']) && is_numeric($_GET['b']))
	$userid = $_GET['b'];
else	  
	$userid = 0;	  

$action = 0;
$ipfldnm = "CreateIP";
$flddate = 'CreateDate';

$result = getdata( "select subject,message from tbldatingemailmaster where emailid=8");
	while($rs= mysqli_fetch_array($result))
	{
		$subject = $rs[0];
		$message = $rs[1];
	}
	freeingresult($result);
	$sendername = $_POST["YourName"];
	$senderemail = $_POST["YourEmail"];
	
	for ($i=1;$i <=7;$i++)
	{
	if((isset($_POST['FriendEmail'.$i]) && trim($_POST['FriendEmail'.$i])!=''))
	{
		$tempsubject = $subject;
		$tempmessage = $message;
		$email = $_POST['FriendEmail'.$i];
		if (isset($_POST['FriendName'.$i]))
			$name = $_POST['FriendName'.$i];
		else
		$name = "";
		$tempsubject = str_replace("[sendername]",$sendername,$tempsubject);
		$tempsubject = str_replace("[senderemail]",$senderemail,$tempsubject);
		$tempsubject = str_replace("[receivername]",$name,$tempsubject);
		$tempsubject = str_replace("[receiveremail]",$email,$tempsubject);
		
		$tempmessage = str_replace("[sendername]",$sendername,$tempmessage);
		$tempmessage = str_replace("[senderemail]",$senderemail,$tempmessage);
		$tempmessage = str_replace("[receivername]",$name,$tempmessage);
		$tempmessage = str_replace("[receiveremail]",$email,$tempmessage);
		$tempmessage = str_replace("[usermessage]",$email,$tempmessage);
		if ($userid != "")
			$tempmessage = str_replace("[link]",$sitepath ."displayprofiles/$userid",$tempmessage);
		$query = sendtogeneratequery($action,"userid",$userid,"Y");
		$query .= sendtogeneratequery($action,"sendername",$sendername,"Y");
		$query .=sendtogeneratequery($action,"senderemail",$senderemail,"Y");
		$query .= sendtogeneratequery($action,"recname",$name,"Y");
		$query .= sendtogeneratequery($action,"recemail",$email,"Y");
		$query .= sendtogeneratequery($action,"subject",$tempsubject,"Y");
		$query .= sendtogeneratequery($action,"message",$tempmessage,"Y");
		$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
		$query = substr($query,1);
		$sSql = "insert into tbldatingtellafriendmaster (userid,sendername,senderemail,recname,recemail,subject,message,$ipfldnm,$flddate) values(" . $query .",now())";
		execute($sSql);
		sendemaildirect($email,$tempsubject,$tempmessage,$senderemail);
	}
	}
header("location:" . $sitepath."message.php?b=6");
ob_flush();
?>