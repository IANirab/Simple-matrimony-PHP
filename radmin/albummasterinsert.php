<?php 
require_once("../translation.php");
require_once("../dbinclude/function.php");
require_once("../dbinclude/configuration.php");
include_once("../dbinclude/datingcommonfunction.php");
include_once('../assets/'.$sitethemefolder.'/design_config.php');

function remove_numbers($string) {
	$vowels = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
  	$string = str_replace($vowels, '*', $string);
  	return $string;
}
//include_once("reg_include.php");

$curruserid='';
if(isset($_GET['b']) && $_GET['b'] != "") {
	$curruserid = $_GET['b'];
}
$getid=$curruserid;
checkadminlogin();
$ip = getip();
$AlbumAutoApproval = findsettingvalue("AlbumAutoApproval");
if ($AlbumAutoApproval == "Y")
	$CurrentStatus = "0.0";
else
	$CurrentStatus = "1";
$totalallowed = findsettingvalue("AlbumTotalPhotoAllowed");



for($i=1;$i<=$totalallowed;$i++)
{
	
	if(isset($_FILES["uploadimage" . $i]['tmp_name']))
	{
		$ext = strtolower(substr(strrchr($_FILES["uploadimage" . $i]['name'],"."),1));
		if (($ext == "jpg") || ($ext =="jpeg") || ($ext == "gif") || ($ext == "png"))
		{	
		if ($_FILES["uploadimage" . $i]["size"] / 1024 < findsettingvalue("File_upload_size"))
		{
		$filenm = "albumuserpicture" . $curruserid . $i . ".$ext";
		//copy($_FILES["uploadimage".$i]['tmp_name'],"$siteuploadfilepath"."/".$filenm);
		$target_file ="../uploadfiles/thumbalbumuserpicture".$curruserid. $i . ".$ext";
		
		$width = findsettingvalue("album_Thumb_Image_Width");
		$height = findsettingvalue("album_Thumb_Image_Height");
		$type =$_FILES["uploadimage" . $i]["type"];
		$uploaded = resizeimage("uploadfiles/".$filenm,$type,$width,$height,$target_file);
		$filenmsave = "userpicture" . $curruserid . $i . ".$ext";
		$filenm = generatewatermarkimagetextimage($filenm,$filenmsave,$ext);
		$filenm1 = generatewatermarkimagetextimages($target_file,$filenmsave,$ext);
		$type = $files['imageupload']['type'];
	
		insertalbumdata($getid,$i,$filenm,check_lalid_length_input($_POST["txtpicdescription" . $i]),$CurrentStatus,$ip);
		}
		}
	}
}
//exit;
/*echo "<pre>";
print_r($_POST);
print_r($_FILES);
exit;*/
$_SESSION[$session_name_initital . 'error'] =$savemess;
//header("location:albummaster.php");
header("location:albummaster.php?b=".$curruserid);
function generatewatermarkimagetextimages($imgnm ,$savefilenm,$ext)
{
//echo $imgnm."<br/>".$savefilenm;
//exit;
$text = findsettingvalue("WaterMarkImageText");

$imagepath = "uploadfiles/";
@header("Content-type: image/jpeg");
if ($ext == "jpg" || $ext == "jpeg")
$im = @imagecreatefromjpeg($imgnm);
elseif ($ext == "gif")
$im = @imagecreatefromgif($imgnm);
elseif ($ext == "png")
$im = @imagecreatefrompng($imgnm);

$r=255;
$g=255;
$b=255;
	
$colornm = @imagecolorallocate($im, $r, $g, $b);
$white = @imagecolorallocate($im, 255, 255, 255);
$font = 'uploadfiles/font/trebuc.ttf';


$get_img_info = @getimagesize($imgnm);


$get_y = $get_img_info[1];
if($get_y == 100 || $get_y < 140){
	$get_x = $get_img_info[0]/12;
} else {
	$get_x = $get_img_info[0]/17;
}

@imagettftext($im, $get_x, 90, $get_x, $get_y, $colornm, $font, $text);
$savefilenm1 = $imgnm;
if ($ext == "jpg" || $ext == "jpe")
@imagejpeg($im,$savefilenm1);
elseif ($ext == "gif")
@imagegif($im,$savefilenm1);
elseif ($ext == "png")
@imagepng($im,$savefilenm1);
@imagedestroy($im);

return $savefilenm;
}
function insertalbumdata($curruserid,$i,$filenm,$description,$CurrentStatus,$ip)
{
$albumid = getonefielddata("select albumid from tbldatingalbummaster where CreateBy=$curruserid and ordno=$i ");
	if ($albumid == "")
		$action =0;
	else
		$action =$albumid ;
	
	if ($action != 0)
	{
	  $ipfldnm = "ModifyIP";
	  $fldby = 'ModifyBy';
	  $flddate = 'ModifyDate';
	}
	else
	{
	  $ipfldnm = "CreateIP";
	  $fldby = 'CreateBy';
	  $flddate = 'CreateDate';
	 }
	$query = sendtogeneratequery($action,"ordno",$i,"Y");
	$query .= sendtogeneratequery($action,"description",$description,"Y");
	$query .= sendtogeneratequery($action,"imagenm",$filenm,"Y");
	$query .= sendtogeneratequery($action,"$fldby",$curruserid,"Y");
	$query .= sendtogeneratequery($action,"currentstatus",$CurrentStatus,"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");

	$query = substr($query,1);
	if ($action == 0)
	{
	$refilenm  = "albummaster.php";
	$sSql = "insert into tbldatingalbummaster (ordno,description,imagenm,$fldby,currentstatus,$ipfldnm,$flddate) values(" . $query .",now())";
	execute($sSql);
	}
	else
	{
		$sSql = "update tbldatingalbummaster set " . $query .",$flddate=now() where albumid=$action and CreateBy=$curruserid";
		execute($sSql);
	}
}
ob_flush();
?>