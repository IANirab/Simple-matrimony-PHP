<?

ob_start();
include("commonfile.php");

$EmailAddress = $_POST['txtEmailAddress'];
$directoryid =0;
$mess = $forgotpwdmessuserinvalid;
if ($EmailAddress != "" )
{
	$result = getdata("select subject,message from tbldatingemailmaster where emailid=19");
	while($rs= mysqli_fetch_array($result))
	{
		$subject = $rs[0];
		$message = $rs[1];
	}
		freeingresult($result);
	$result = getdata("select directoryid,password,title from tbl_directory_master where email ='$EmailAddress' and currentstatus in(0)");
	while ($rs = mysqli_fetch_array($result))
	{
		$directoryid=$rs[0];
		$password=$rs[1];
	 	$title=$rs[2];
		
		$extramessage = "title :$title<br>";
	$extramessage .= "<a style='text-decoration:underline' href='".$sitepath."directory_add.php?b=$directoryid&b1=$password'>click here to modify listing</a>";
		$message = $message ."<br>". $extramessage;
	//echo $message;exit;
		sendemaildirect($EmailAddress,$subject,$message,"");
	//exit;
	}
		freeingresult($result);
}

if($directoryid ==0){
header("location:message.php?b=63");
}else{
header("location:message.php?b=64");
}
ob_flush();
?>