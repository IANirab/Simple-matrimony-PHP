<?

ob_start();	
require_once('commonfile.php');
if(isset($_GET['statid']) && $_GET['statid']!='')
{  $statid = $_GET['statid'];}
else
{	$statid = 0;}
$bannerid = getonefielddata("select BannerId from tblbannerstatsmaster where StatsId=$statid");
execute("update tblbannerstatsmaster set Click=Click+1 where StatsId=$statid");
$websiteUrl = $sitepath;
$result = getdata("select OnClickURL,TrackingCode from tblbannermaster where BannerId=$bannerid");
while($recordset = mysqli_fetch_array($result))
{
 setcookie($websiteUrl."_statid",$statid);
 $OnClickURL = $recordset[0];
 $TrackingCode = $recordset[1];
 if($TrackingCode!='' && $OnClickURL!='')
  	$OnClickURL .= "?trk=".$TrackingCode;
}
freeingresult($result);
$is_IIS = strstr($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') ? 1 : 0;
$objban = new banner;
$objban->uploadsts("CLICK",$bannerid);
setcookie('onepagebanner_statid', $statid, time() + 864000, '', '');
if($OnClickURL!=''){
	if ($is_IIS){
		header("Refresh: 0;url=$OnClickURL");
	}else{
		header("location:$OnClickURL");
	}
} else {
	header("location:".$_SERVER['HTTP_REFERER']);
	exit;
}
ob_flush();
?>