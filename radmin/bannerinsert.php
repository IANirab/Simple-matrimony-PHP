<?php
session_start();
require_once("commonfileadmin.php");
require_once("../dbinclude/bannerclass.php");
checkadminlogin();
$objbanner = new banner();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "ModifyBy";
	  $ipfldnm = "ModifyIP";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "CreateBy";
	  $ipfldnm = "CreateIP";
	}
	if (isset($_POST['TrackingCode']))
	$TrackingCode = $_POST['TrackingCode'];
	else
	$TrackingCode = "";
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"Title",$_POST['Title'],"Y");
	$query .= sendtogeneratequery($action,"AltText",$_POST['AltText'],"Y");
	$query .= sendtogeneratequery($action,"OnClickURL",$_POST['LandingURL'],"Y");
	$query .= sendtogeneratequery($action,"ImageLink",$_POST['ImgLink'],"Y");
	$query .= sendtogeneratequery($action,"TextOrFlashBannerCode",$_POST['Description'],"Y");
	$query .= sendtogeneratequery($action,"LSId",$_POST['LSId'],"Y");
	$query .= sendtogeneratequery($action,"expiryDays",$_POST['expiryDays'],"Y");
	$query .= sendtogeneratequery($action,"TemplateId",$_POST['TemplateId'],"Y");
	$query .= sendtogeneratequery($action,"TrackingCode",$TrackingCode,"Y");
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tblbannermaster (Title,AltText,OnClickURL,ImageLink,TextOrFlashBannerCode,LSId,expiryDays,TemplateId,TrackingCode,$CreateByfld,$ipfldnm,CreateDate) values($query,curdate())";		
		execute($sSql);
		$retfile ="bannermaster.php";
		$action = getonefielddata("select max(Bannerid) from tblbannermaster");
	}
	else
	{
		$sSql = "update tblbannermaster set $query,ModifyDate=curdate() where Bannerid=$action";
		execute($sSql);
		$retfile ="bannermanager.php";
	}

if(isset($_FILES["uploadimage"]['tmp_name']))
{
if($_FILES["uploadimage"]['tmp_name'] != "")
{
	$ext = strtolower(substr(strrchr($_FILES["uploadimage"]['name'],"."),1));
	$filenm = "banner" . $action . ".$ext";
	copy($_FILES["uploadimage"]['tmp_name'],"../uploadfiles/site_".$sitethemefolder."/" .$filenm);
	$sSql = "update tblbannermaster set ImageNm='$filenm',ImageLink=null where Bannerid=$action";
	execute($sSql);
	$imgnm ="[sitepath]/uploadfiles/site_".$sitethemefolder."/" .$filenm;
}
}

$imgnm = getonefielddata("select ImageNm from tblbannermaster where Bannerid=$action");
if ($imgnm != "")
	$imgnm ="[sitepath]uploadfiles/site_".$sitethemefolder."/" .$imgnm;
else
	$imgnm =$_POST['ImgLink'];

$width = 0;
$height = 0;
$query ="select Width,Height from tblbannerlocsizemaster where LocSizeId=".$_POST['LSId']." and CurrentStatus=0 ";
$result = getdata($query);
while($r=mysqli_fetch_array($result))
{
$width = $r[0];
$height = $r[1];
}
freeingresult($result);
 $bannercode = getonefielddata("select Code from tblbannertemplatemaster where TemplateId= ". $_POST['TemplateId']);

$bannercode = str_replace ("[--height--]",$height,$bannercode);
$bannercode = str_replace ("[--width--]",$width,$bannercode);
$bannercode = str_replace ("[--alt--]",$_POST['AltText'],$bannercode);
$bannercode = str_replace ("[--filenm--]",$imgnm,$bannercode);
$bannercode = str_replace ("[--TopX--]",$objbanner->findbannersetting("FlyingBannerTop"),$bannercode);
$bannercode = str_replace ("[--MoveTo--]",$objbanner->findbannersetting("FlyingBannerLeft"),$bannercode);
$bannercode = str_replace ("[--StartSec--]",$objbanner->findbannersetting("FlyingBannerStartSec"),$bannercode);
$bannercode = str_replace ("[--popupStartSec--]",$objbanner->findbannersetting("PopupBannerStartSec"),$bannercode);
$bannercode = str_replace ("[--Title--]",$_POST['Title'],$bannercode);

$bannercode = str_replace ("[--Description--]",$_POST['Description'],$bannercode);
$bannercode = str_replace  ("[--fontfamily--]",$objbanner->findbannersetting("TextBannerFontFamily"),$bannercode);
$bannercode = str_replace ("[--fontsize--]",$objbanner->findbannersetting("TextBannerFontSize"),$bannercode);
$bannercode = str_replace ("[--backcolor--]",$objbanner->findbannersetting("TextBannerBackColor"),$bannercode);
$bannercode = str_replace ("[--border--]",$objbanner->findbannersetting("TextBannerBorder"),$bannercode);

$bannercode = str_replace ("[--padding--]",$objbanner->findbannersetting("TextBannerPadding"),$bannercode);
$bannercode = str_replace ("[--morefontcolor--]",$objbanner->findbannersetting("TextBannerMoreLinkColor"),$bannercode);
$bannercode = str_replace ("'","''",$bannercode);

execute("update tblbannermaster set BannerCode='$bannercode' where Bannerid =$action");
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>