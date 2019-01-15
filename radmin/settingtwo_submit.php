<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
/*echo "<pre>";
print_r($_POST);
print_r($_FILES);
exit;*/

/*$action = $_GET["b"];
$CreateByfld = "ModifyBy";
$ipfldnm = "ModifyIP";
$ip = $_SERVER["REMOTE_ADDR"];*/
  
if(isset($_POST['welcome_txt'])){	
	execute("UPDATE tbldatingsettingmaster SET fldval='".$_POST['welcome_txt']."' WHERE settingid=114 AND fldnm='welcome_txt'");
}
//&quot;
if(isset($_POST['design_code'])){	
	//$design_code = str_replace('"','\"',$_POST['design_code']);
	//$design_code = str_replace("'",'\'',$design_code);		
	execute("UPDATE tbldatingsettingmaster SET fldval='".$_POST['design_code']."' WHERE settingid=116 AND fldnm='sp_offer_design_code'");
}

if(isset($_FILES['special_banner']) && $_FILES['special_banner']['name']!=""){
	$banner = $_FILES['special_banner']['name'];
	$old_file = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=115 AND fldnm='sp_offer_banner'");
	if($old_file!=""){
		if(file_exists("../uploadfiles/site_".$sitethemefolder."/" .$old_file)){
			unlink("../uploadfiles/site_".$sitethemefolder."/" .$old_file);
		}
	}
	$ext = strrev(substr(strrev($_FILES['special_banner']['name']),0,3));	
	$filenm = "special_banner115.".$ext;	
	copy($_FILES['special_banner']['tmp_name'],"../uploadfiles/site_".$sitethemefolder."/" .$filenm);		
	execute("UPDATE tbldatingsettingmaster SET fldval='".$filenm."' WHERE settingid=115 AND fldnm='sp_offer_banner'");
}

if(isset($_FILES['side_display']) && $_FILES['side_display']['name']!=""){
	$display = $_FILES['side_display']['name'];
	$old_display = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=117 AND fldnm='side_display'");
	//delete file procesing
	if($old_display != ""){
		if(file_exists("../uploadfiles/site_".$sitethemefolder."/" .$old_display)){
			unlink("../uploadfiles/site_".$sitethemefolder."/" .$old_display);
		}
	}
	$ext = strrev(substr(strrev($_FILES['side_display']['name']),0,3));
	$filenm = "side_display117.".$ext;
	copy($_FILES['side_display']['tmp_name'],"../uploadfiles/site_".$sitethemefolder."/" .$filenm);	
	execute("UPDATE tbldatingsettingmaster SET fldval='".$filenm."' WHERE settingid=117 AND fldnm='side_display'");	
}

if(isset($_FILES['favicon']) && $_FILES['favicon']['name']!=''){
	$favicon = $_FILES['favicon']['name'];	
	$old_favicon = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=125 AND fldnm='favicon'");	
	if($old_favicon != ""){
		if(file_exists("../uploadfiles/site_".$sitethemefolder."/" .$old_favicon)){
			unlink("../uploadfiles/site_".$sitethemefolder."/" .$old_favicon);
		}
	}		
	$ext = strrev(substr(strrev($_FILES['favicon']['name']),0,3));	
	$filenm = "favicon.".$ext;	
	copy($_FILES['favicon']['tmp_name'],"../uploadfiles/site_".$sitethemefolder."/" .$filenm);	
	execute("UPDATE tbldatingsettingmaster SET fldval='".$filenm."' WHERE settingid=125 AND fldnm='favicon'");
}

if(isset($_FILES['trust']) && $_FILES['trust']['name']!=''){
	$security_trust = $_FILES['trust']['name'];	
	$security_trust = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=171 AND fldnm='security_trust'");	
	if($security_trust != ""){
		if(file_exists("../uploadfiles/site_".$sitethemefolder."/" .$security_trust)){
			unlink("../uploadfiles/site_".$sitethemefolder."/" .$security_trust);
		}
	}		
	$ext = strrev(substr(strrev($_FILES['trust']['name']),0,3));	
	$filenm = "trust.".$ext;	
	copy($_FILES['trust']['tmp_name'],"../uploadfiles/site_".$sitethemefolder."/" .$filenm);	
	execute("UPDATE tbldatingsettingmaster SET fldval='".$filenm."' WHERE settingid=171 AND fldnm='security_trust'");
}



if(isset($_FILES['bottom_uploadimage']['name']) && $_FILES['bottom_uploadimage']['name']!=''){
	$filerev = strrev($_FILES['bottom_uploadimage']['name']);
	$filerev_arr = explode(".",$filerev);
	$ext = strrev($filerev_arr[0]);
	if($ext=='jpg' || $ext=='jpeg' || $ext=='gif' || $ext=='png'){
		$imgnm = 'bottomcardimage.'.$ext;
		$filenm = "../uploadfiles/site_".$sitethemefolder."/".$imgnm;		
		copy($_FILES['bottom_uploadimage']['tmp_name'],$filenm);
		execute("update tbldatingsettingmaster SET fldval='".$imgnm."' WHERE fldnm='bottom_card_image'");
	}
}

header("location:website_settingmaster.php");
?>