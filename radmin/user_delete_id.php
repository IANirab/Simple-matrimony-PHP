<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");

if(isset($_GET['b']))
	$status = $_GET['b'];
else
	$status = "";
$filenm = "usermanager.php?b=$status";

if ((isset($_POST["txt_del_uid"])) && is_numeric($_POST["txt_del_uid"]))
	$action = $_POST["txt_del_uid"];

else
	$action = 0;
// Haresh code starts Here
	
	$result = getdata("select imagenm,thumbnil_image from tbldatingusermaster where userid = $action");
 	while($rs = mysqli_fetch_array($result)){
		$imagenm = $rs[0];
		$thumbnm = $rs[1];
		@unlink("../uploadfiles/".$rs[0]);
		@unlink("../uploadfiles/".$rs[1]);
	}
	
	$result1 = getdata("select imagenm from tbldatingalbummaster where CreateBy = $action");
	while($rs1 = mysqli_fetch_array($result1)){
		$album_imgnm = $rs1[0];
		if($album_imgnm != ''){
			@unlink("../uploadfiles/".$rs1[0]);
		}
	}
	
// Haresh code ends Here 	
$sSql = "delete from tbldatingusermaster where userid=$action";
execute($sSql);
$sSql = "delete from tbldatingalbummaster where CreateBy=$action ";
execute($sSql);
$sSql = "delete from tbldatingautorepondermaster where userid=$action";
execute($sSql);

$sSql = "delete from tbldatingexpressintrestmaster where fromuserid=$action and touserid=$action";
execute($sSql);

$sSql = "delete from tbldatingimagerequestmaster where fromuserid=$action and touserid=$action";
execute($sSql);

$sSql = "delete from tbldatingmessangermaster where fromuserid=$action and touserid=$action";
execute($sSql);


$sSql = "delete from tbldatingpmbmaster where FromUserId=$action or ToUserId=$action";
execute($sSql);

$sSql = "delete from tbldatingprofilehistorymaster where fromuserid=$action or touserid=$action";
execute($sSql);

$sSql = "delete from tbldatingshortlistmaster where UserId=$action or CreateBy=$action";
execute($sSql);

$sSql = "delete from tbldatingusertrustsealmaster where userid=$action or CreateBy=$action";
execute($sSql);

$_SESSION[$session_name_initital . "adminerror"] = "information deleted successfully";
header("location:$filenm");
?>