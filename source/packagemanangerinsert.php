<?php

ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$i=0;
$fetch_cityid = getonefielddata("SELECT city_id from tbldatingusermaster WHERE userid=".$curruserid);
//if($fetch_cityid=="0.0" || $fetch_cityid==""){
//	header("location:message.php?b=76");
//	exit;
//}
if(isset($_POST['newmembershippackage'])){
	//echo $_POST["newmembershippackage"]; exit;
	$arr_package_ids[$i] = $_POST["newmembershippackage"];
	$i=$i+1;
}
if (isset($_POST["membershippackage"]))
{
	//echo $_POST["membershippackage"]; exit;
	$arr_package_ids[$i] = $_POST["membershippackage"];
	$i=$i+1;
}

if (isset($_POST["trustsealpackage"]))
{
	$arr_package_ids[$i] = $_POST["trustsealpackage"];
	$i=$i+1;
}

if (isset($_POST["offline_package"]))
{
	$arr_package_ids[$i] = $_POST["offline_package"];
	$i=$i+1;
}


if (isset($_POST["viewcontactdetailpackage"]))
{
	$arr_package_ids[$i] = $_POST["viewcontactdetailpackage"];
	$i=$i+1;
}

if(isset($_POST['sms_package'])){
	$arr_package_ids[$i] = $_POST["sms_package"];
	$i=$i+1;
}




$result = getdata("select PackageId,Price,Days from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=3");
while($rs= mysqli_fetch_array($result))
{
	if (isset($_POST["enhancementpackage" . $rs[0]]))
	{
		$arr_package_ids[$i] = $rs[0];
		$i=$i+1;
	}
}
freeingresult($result);


//print_r($arr_package_ids); exit;
//exit;
if (isset($arr_package_ids))
{
$retfilenm = invoiceinsert($curruserid,$arr_package_ids);
header("location:$retfilenm");
exit();
}
else
header("location:packagemanager.php");
ob_flush();
?>