<? 
include("commonfile.php");
$imagenm_captcha = generate_img_captha($session_name_initital . "img_captch_no","img_captch_file_nm","");
$captch_no = get_img_captha_no($session_name_initital . "img_captch_no");
echo $ret = $imagenm_captcha."#".$captch_no;
?>