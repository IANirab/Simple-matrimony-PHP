<? require_once("commonfileadmin.php");
session_start();

$mess = ""; 
$rand = "admin".rand(10,1000);
$getconfirmuser = getonefielddata("SELECT LoginId from tbldatingadminloginmaster WHERE UserName='".$_POST['txtusername']."'");
if($getconfirmuser!=""){
execute("update tbldatingadminloginmaster set Password='" . md5($rand) . "' WHERE UserName='".$_POST['txtusername']."'");
$result = getdata("select Password,UserName,EmailAddress from tbldatingadminloginmaster where CurrentStatus =0 AND UserName='".$_POST['txtusername']."'");
	while ($row = mysqli_fetch_array($result))
	{
		$adminemail = findsettingvalue("AdminMail");
		sendemaildirect($adminemail,"forget password","user name:" . $row[1]. "<br>password:" . $rand ,$adminemail);
		if($_POST['txtusername']!="admin"){
			sendemaildirect($row[2],"forget password","user name:" . $row[1]. "<br>password:" . $rand ,$row[2]);
		}	
		$mess = "password has been sent successfully";
	}
	freeingresult($result);
} else {
	$mess = "Please enter proper Username";
}
if($mess!=""){
	$_SESSION[$session_name_initital . "adminerror"] = $mess;
}
header("location:login.php");
?>