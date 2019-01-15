<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$action =0;
if(isset($_GET['b']) && $_GET['b']!=""){
	$action = $_GET['b'];
}
if($action != 0){
	if(isset($_FILES['uploadimage']['name']) && $_FILES['uploadimage']['name']!=''){
		$realfilenm = strrev($_FILES['uploadimage']['name']);
		$fnm_arr = explode(".",$realfilenm);
		$ext = strtolower(strrev($fnm_arr[0]));
		$imgnm = "userpicture".$action.".".$ext;	
		$thumbimgnm = "userpicture_thumbnil".$action.".".$ext;
		$filenm = "userpicture_temp" . $action . ".$ext";
		copy($_FILES['uploadimage']['tmp_name'],"../uploadfiles/".$imgnm);
		copy($_FILES['uploadimage']['tmp_name'],"../uploadfiles/".$thumbimgnm);

		execute("update tbldatingusermaster SET thumbnil_image='".$thumbimgnm."', imagenm='".$imgnm."' WHERE userid=".$action);		
		generatewatermarkimagetextimages($imgnm,$imgnm,$ext);
		scale_images($thumbimgnm,$thumbimgnm);
		generatewatermarkimagetextimages($thumbimgnm,$thumbimgnm,$ext);		
	}
	//upload_user_picture("uploadimage",$action);
}
$_SESSION[$session_name_initital . "adminerror"] = "Picture has been uploaded successfully.";
header("location:".$_SERVER['HTTP_REFERER']);
exit;

function scale_images($filenm,$small_img)
{
$uploaddir_admin ="../uploadfiles";
$ext = strrev(substr(strrev($filenm),0,3));
$ext = strtolower($ext);
$img = "$uploaddir_admin/$filenm";
list($original_width, $original_height, $type, $attr) = getimagesize($img);



$small_img_with_path = "$uploaddir_admin/$small_img";

$w = findsettingvalue("Thumbnil_Image_Width");

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

$height_setting = findsettingvalue("Thumbnil_Image_Height");
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

function generatewatermarkimagetextimages($imgnm ,$savefilenm,$ext)
{
$text = findsettingvalue("WaterMarkImageText");
$imagepath = "../uploadfiles/";
//@header("Content-type: image/jpeg");
// Create the image
if ($ext == "jpg" || $ext == "jpeg")
$im = @imagecreatefromjpeg($imagepath . $imgnm);
elseif ($ext == "gif")
$im = @imagecreatefromgif($imagepath . $imgnm);
elseif ($ext == "png")
$im = @imagecreatefrompng($imagepath . $imgnm);

$r=255;
$g=255;
$b=255;
	
$colornm = @imagecolorallocate($im, $r, $g, $b);
// Create some colors
$white = @imagecolorallocate($im, 255, 255, 255);
//$grey = imagecolorallocate($im, 128, 128, 128);
//$black = imagecolorallocate($im, 0, 0, 0);
//imagefilledrectangle($im, 0, 0, 399, 29, $white);
// The text to draw
// Replace path by your own font path
//$font = 'font/ENGLISHT.TTF';
$font = '../uploadfiles/font/trebuc.ttf';

// Add some shadow to the text
//imagettftext  ( resource $image  , float $size  , float $angle  , int $x  , int $y  , int $color  , string $fontfile  , string $text  )

$get_img_info = @getimagesize($imagepath . $imgnm);

//$get_x = $get_img_info[0]/17; big img

$get_y = $get_img_info[1];
if($get_y == 100 || $get_y < 140){
	$get_x = $get_img_info[0]/12;
} else {
	$get_x = $get_img_info[0]/17;
}
//echo $get_y."<br>";
//imagettftext($im, 25, 90, 25, 185, $colornm, $font, $text);
//imagettftext($im, 10, 90, 10, 85, $colornm, $font, $text); nishit
@imagettftext($im, $get_x, 90, $get_x, $get_y, $colornm, $font, $text);

// Add the text
//imagettftext($im, 20, 0, 10, 20, $black, $font, $text);
// Using imagepng() results in clearer text compared with imagejpeg()
//imagejpeg($im);
$savefilenm1 = $imagepath . $savefilenm;
if ($ext == "jpg" || $ext == "jpe")
@imagejpeg($im,$savefilenm1);
elseif ($ext == "gif")
@imagegif($im,$savefilenm1);
elseif ($ext == "png")
@imagepng($im,$savefilenm1);
@imagedestroy($im);
return $savefilenm;
}

exit;
header("location:usermanager.php");
exit;
?>