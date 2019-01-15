<?
function generate_img_captha($session_img_captch_no,$session_img_captch_file_nm,$chk_cms_path="")
{
	//if (!session_is_registered("$session_img_captch_no"))
	if(!isset($_SESSION["$session_img_captch_no"]))
	{
		//session_register("$session_img_captch_no");
		$_SESSION["$session_img_captch_no"]="";
	}		
	if(!isset($_SESSION["$session_img_captch_file_nm"]))
	{
		//session_register("$session_img_captch_file_nm");
		$_SESSION["$session_img_captch_file_nm"]="";
	}
	
	$rand_no = rand();
	$rand_no = substr($rand_no,0,4);
	$text = $rand_no;
	$text = md5($text);
	
	if (strlen($text) > 5)
		$text = substr($text,0,4);
		
	$imagepath = $chk_cms_path. "uploadfiles/captcha/";
	$captchapath =$chk_cms_path . "captcha/";
	
	if ($_SESSION["$session_img_captch_file_nm"] != "")
	if (file_exists($imagepath . $_SESSION["$session_img_captch_file_nm"]))
		unlink($imagepath . $_SESSION["$session_img_captch_file_nm"]);
	
	
	$imgnm = "captcha.jpg";
	$ext = strrev(substr(strrev($imgnm),0,3));
	$ext = strtolower($ext);
	

	$savefilenm = "captcha_$rand_no.jpg";
	$_SESSION["$session_img_captch_file_nm"]=$savefilenm;
	if ($ext == "jpg" || $ext == "jpeg")
	$im = imagecreatefromjpeg($captchapath . $imgnm);
	elseif ($ext == "gif")
	$im = imagecreatefromgif($captchapath . $imgnm);
	elseif ($ext == "png")
	$im = imagecreatefrompng($captchapath . $imgnm);
	
	$r=0;
	$g=0;
	$b=0;
	$colornm = imagecolorallocate($im, $r, $g, $b);
	$white = imagecolorallocate($im, 255, 255, 255);
	$font = $captchapath. "40240___.ttf";
	imagettftext($im, 15, 5, 15, 18, $colornm, $font, $text);
	$savefilenm1 = $imagepath . $savefilenm;
	if ($ext == "jpg" || $ext == "jpe")
	imagejpeg($im,$savefilenm1);
	elseif ($ext == "gif")
	imagegif($im,$savefilenm1);
	elseif ($ext == "png")
	imagepng($im,$savefilenm1);
	imagedestroy($im);
	$_SESSION["$session_img_captch_no"] = $text;
	return $savefilenm;
}
function get_img_captha_no($session_img_captch_no)
{
	return $_SESSION[$session_img_captch_no];
}
?>