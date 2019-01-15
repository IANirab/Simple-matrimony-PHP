<?

ob_start();
include_once("commonfile.php");
checklogin($sitepath,"Y");
$title = '';
$desc = '';
if(isset($_POST['success_title']) && $_POST['success_title']!=''){
	$title = $_POST['success_title'];	
}
if(isset($_POST['desc']) && $_POST['desc']!=''){
	$desc = strip_tags($_POST['desc']);
}

if($_SESSION['sucstory_captcha']!=$_POST['imgcaptcha']){
	$_SESSION[$session_name_initital . "error"] = "Please Enter valid Imagecode";
	header("location:successstoriesadd.php");	
	exit;
}

if($title!='' && $desc!=''){
	$chkexist = getonefielddata("SELECT testimonialid from tbldatingtestimonialmaster WHERE currentstatus IN (0,1) AND userid=".$curruserid);
	if($chkexist==''){
		$sql = "INSERT into tbldatingtestimonialmaster SET title='".$title."', description='".$desc."', userid='".$curruserid."', createdate=curdate(), createby='".$curruserid."', createip='".$_SERVER['REMOTE_ADDR']."'";	
		execute($sql);
		$chkexist = getonefielddata("SELECT max(testimonialid) from tbldatingtestimonialmaster");
	} else {
		$sql = "update tbldatingtestimonialmaster SET title='".$title."', description ='".$desc."', modifydate=curdate(), modifyby='".$curruserid."', modifyip='".$_SERVER['REMOTE_ADDR']."' WHERE testimonialid=".$chkexist;
		execute($sql);		
	}
	if(isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name']!=''){
		$ext = strtolower(substr(strrchr($_FILES["image"]['name'],"."),1));
		$filenm = "testimonial" . $chkexist . ".$ext";
		copy($_FILES["image"]['tmp_name'],"uploadfiles"."/".$filenm);
		$sSql = "update tbldatingtestimonialmaster set image='$filenm' where testimonialid=$chkexist";
		execute($sSql);
	}
} else {
	$_SESSION[$session_name_initital . "error"] = "Please Enter Title and Description";
	header("location:successstoriesadd.php");	
	exit;
}
ob_flush();
?>