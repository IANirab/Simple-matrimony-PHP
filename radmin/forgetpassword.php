<? require_once("commonfileadmin.php");
$username = '';
$loginid = 0;
if(isset($_POST['txtusername']) && $_POST['txtusername']!=''){
	$username = $_POST['txtusername'];
	$loginid = getonefielddata("SELECT loginid from tbladminloginmaster WHERE username='".$username."'");	
}
$mess = ""; 
$rand = "admin".rand();
execute("update tbldatingadminloginmaster set Password='" . md5($rand) . "' WHERE loginid=".$loginid);

$result = getdata("select Password,UserName,EmailAddress from tbldatingadminloginmaster where CurrentStatus =0 AND loingid=".$loginid);
	while ($row = mysqli_fetch_array($result))
	{
		$adminemail = findsettingvalue("AdminMail");
		sendemaildirect($row[2],"forget password","user name:" . $row[1]. "<br>password:" . $rand ,$adminemail);
		$mess = "password has been sent successfully";
	}
	freeingresult($result);
?>
<?=$mess ?>