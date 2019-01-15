<? session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");



$new_link ='https://www.paroshi.com';
$old_link ='http://90.0.0.8/work2015/DemoMatrimony';






$tbl_name='tblcmsmaster,tblbannermaster,tbl_homepage_images';
$colmnnm='staticlink,OnClickURL,link';
$pid='cmsid,Bannerid,id';

$tbl_name=explode(",",$tbl_name);
$colmnnm=explode(",",$colmnnm);
$pid=explode(",",$pid);


for($i=0;$i<count($tbl_name);$i++)
{
	$result = getdata("select ".$colmnnm[$i].",".$pid[$i]." from ".$tbl_name[$i]." where currentstatus=0 ");
	while($rs= mysqli_fetch_array($result))
	{
		$link=$rs[0];
		$get_pid=$rs[1];
		$get_newlink=str_replace($old_link,$new_link,$link);
		 
		$sSql = "update ".$tbl_name[$i]." set ".$colmnnm[$i]."='".$get_newlink."' where ".$pid[$i]."='".$get_pid."' ";
		execute($sSql);
	}
}


$logo_link = getonefielddata("select fldval from tbldatingsettingmaster where fldnm='Logo_link' ");
$get_newlogolink=str_replace($old_link,$new_link,$logo_link);
$sSql = "update tbldatingsettingmaster set fldval='".$get_newlogolink."' where fldnm='Logo_link' "; 
execute($sSql);

echo '<h1>Links are changed sucessfully</h1>';


?>