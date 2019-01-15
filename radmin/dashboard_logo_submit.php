<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Nss");

$action = 64;
$createbyfld = "modifyby";
$ipfldnm = "modifyip";
$ip = $_SERVER["REMOTE_ADDR"];

$query = sendtogeneratequery($action,"fldval",$_POST['txt_logo_link_nm'],"Y");
$query .= sendtogeneratequery($action,"$createbyfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
$query = substr($query,1);

$sSql = "update tbldatingsettingmaster set $query,modifydate=curdate() where fldnm='Logo_link'";
execute($sSql);

if(isset($_POST['txt_logo_slogan']) && $_POST['txt_logo_slogan']!=''){
	execute("update tbldatingsettingmaster SET fldval='".$_POST['txt_logo_slogan']."' WHERE fldnm='logo_slogan' ");	
}

if(isset($_FILES["uploadimage"]['tmp_name']))
{
if($_FILES["uploadimage"]['tmp_name'] != "")
{
	$ext = strtolower(substr(strrchr($_FILES["uploadimage"]['name'],"."),1));
	$filenm = "sitelogo.$ext";
	if (!file_exists('../uploadfiles/site_'.$sitethemefolder.'')) {
    mkdir('../uploadfiles/site_'.$sitethemefolder.'', 0777, true);
}
	copy($_FILES["uploadimage"]['tmp_name'],"../uploadfiles" ."/site_".$sitethemefolder."/" .$filenm);
	$imagenm = '../uploadfiles/site_'.$sitethemefolder.'/'.$filenm;
	$type = $_FILES['uploadimage']['type'];
	$max_width = 250;
	$max_height = 60;
 $target_file = "../uploadfiles/site_".$sitethemefolder."/thumb_".$filenm; 
	//resizeimage($imagenm,$type,$max_width,$max_height,$target_file);
	$sSql = "update tbldatingsettingmaster set fldval='$filenm' where fldnm='Logo_filenm'";
	execute($sSql);	
}
}

if(isset($_FILES["invoicelogo"]['tmp_name'])){
if($_FILES["invoicelogo"]['tmp_name'] != "")
{
	$ext = strtolower(substr(strrchr($_FILES["invoicelogo"]['name'],"."),1));
	$filenm = "invoicelogo.$ext";
	if (!file_exists('../uploadfiles/site_'.$sitethemefolder.'')) {
    mkdir('../uploadfiles/site_'.$sitethemefolder.'', 0777, true);
}
	copy($_FILES["invoicelogo"]['tmp_name'],"../uploadfiles" ."/site_".$sitethemefolder."/" .$filenm);
	$imagenm = '../uploadfiles/site_'.$sitethemefolder.'/'.$filenm;
	$type = $_FILES['invoicelogo']['type'];	
	$sSql = "update tbldatingsettingmaster set fldval='$filenm' where fldnm='invLogo_filenm'";
	execute($sSql);	
}
}

if(isset($_FILES["emaillogo"]['tmp_name'])){
if($_FILES["emaillogo"]['tmp_name'] != "")
{
	
	$ext = strtolower(substr(strrchr($_FILES["emaillogo"]['name'],"."),1));
	$filenm = "emaillogo.$ext";
	if (!file_exists('../uploadfiles/site_'.$sitethemefolder.'')) {
    mkdir('../uploadfiles/site_'.$sitethemefolder.'', 0777, true);
}
	copy($_FILES["emaillogo"]['tmp_name'],"../uploadfiles" ."/site_".$sitethemefolder."/" .$filenm);
	$imagenm = '../uploadfiles/site_'.$sitethemefolder.'/'.$filenm;
	$type = $_FILES['emaillogo']['type'];	
	$sSql = "update tbldatingsettingmaster set fldval='$filenm' where fldnm='emailLogo_filenm'";
	execute($sSql);	
}
}

if(isset($_FILES["main_uploadimage"]['tmp_name']))
if($_FILES["main_uploadimage"]['tmp_name'] != "")
{
	$ext = strtolower(substr(strrchr($_FILES["main_uploadimage"]['name'],"."),1));
	$filenm = "site_main_image.$ext";
	copy($_FILES["main_uploadimage"]['tmp_name'],"../uploadfiles" ."/site_".$sitethemefolder."/".$filenm);
	$sSql = "update tbldatingsettingmaster set fldval='$filenm' where fldnm='Home_page_main_image_nm'";
	execute($sSql);
	execute("update tbl_homepage_images SET title = '".$filenm."' where id=1");
}



function scale_images($filenm,$small_img)
{
$uploaddir_admin ="../uploadfiles";
$ext = strrev(substr(strrev($filenm),0,3));
$ext = strtolower($ext);
$img = "$uploaddir_admin/$filenm";
list($original_width, $original_height, $type, $attr) = getimagesize($img);


//$small_img = "productsmall" . $productid . ".$ext";
$small_img_with_path = "$uploaddir_admin/$small_img";
//$h_temp = findsettingvalue("Small_Image_Height");
$w = 250;//findsettingvalue("Thumbnil_Image_Width");

if ($w > $original_width)
	$w = $original_width;

// get image size of img
$x = getimagesize($img);
// image width
$sw = $x[0];
// image height
$sh = $x[1];

$w_gen = ($w * 100)/$sw;

$h = ($w_gen * $sh)/100;

$height_setting = 60;//findsettingvalue("Thumbnil_Image_Height");
if ($h > $height_setting)
	$h= $height_setting;

if (($ext == "jpg") || ($ext == "jpe") || ($ext == "jpeg"))
$im = imagecreatefromjpeg ($img); // Read JPEG Image
elseif ($ext == "png")
$im = imagecreatefrompng ($img); // or PNG Image
elseif ($ext == "gif")
$im = imagecreatefromgif ($img); // or GIF Image
else
$im = false; // If image is not JPEG, PNG, or GIF

if (!$im) {
	// We get errors from PHP's ImageCreate functions...
	// So let's echo back the contents of the actual image.
	readfile ($img);
} else {
	// Create the resized image destination
	$thumb = imagecreatetruecolor ($w, $h);
	//$bg = ImageColorAllocateAlpha($thumb, 255, 255, 255, 127); 
	//imagefill($thumb, 0, 0 , $bg);

	// Copy from image source, resize it, and paste to image destination
	imagecopyresampled ($thumb, $im, 0, 0, 0, 0, $w, $h, $sw, $sh);
	// Output resized image
	//imagejpeg($dst_r,$savefilenm_path,$jpeg_quality);
	if ($ext == "png")
		$quality =9;
	else
		$quality =70;
	//imagejpeg ($thumb,$small_img_with_path,$quality);
	if (($ext == "jpg") || ($ext == "jpe") || ($ext == "jpeg"))
imagejpeg ($thumb,$small_img_with_path,$quality);
elseif ($ext == "png")
imagepng ($thumb,$small_img_with_path,$quality);
elseif ($ext == "gif")
imagegif ($thumb,$small_img_with_path,$quality);

	return $small_img;
	}
}

function resizeimagenew($imagenm,$type,$max_width,$max_height,$target_file){
  switch(strtolower($type)){
	  case 'image/jpeg':
		  $image = imagecreatefromjpeg($imagenm);
		  break;
	  case 'image/png':
		  $image = imagecreatefrompng($imagenm);
		  break;
	  case 'image/gif':
		  $image = imagecreatefromgif($imagenm);
		  break;
	  default:
		  exit('Unsupported type: '.$_FILES['image']['type']);
  }
  // Get current dimensions
  $old_width  = imagesx($image);
  $old_height = imagesy($image);
  
  // Calculate the scaling we need to do to fit the image inside our frame
  $scale      = min($max_width/$old_width, $max_height/$old_height);
  
  // Get the new dimensions
  $new_width  = ceil($scale*$old_width);
  $new_height = ceil($scale*$old_height);
  
  // Create new empty image
  $new = imagecreatetruecolor($new_width, $new_height);
  
  // Resize old image into new
  imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
	  
  // Catch the imagedata
  ob_start();
  //imagejpeg($new, NULL, 90);
  imagejpeg($new, $target_file, 90);
  $data = ob_get_clean();		
}
$retfile ="website_settingmaster.php";
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>