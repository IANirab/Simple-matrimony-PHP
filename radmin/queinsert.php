<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action=0;
$login_id = 0;
if(isset($_SESSION[$session_name_initital . 'adminlogin']) && $_SESSION[$session_name_initital . 'adminlogin']!=''){
	$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
}
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "ModifyBy";
	  $ipfldnm = "ModifyIP";
	  $CreateDate = "ModifyDate";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "CreateBy";
	  $ipfldnm = "CreateIP";
	  $CreateDate = "CreateDate";
	}
	
	
	if(isset($_POST['cmbcategory']) && $_POST['cmbcategory']!='' && $_POST['cmbcategory']!='0.0'){
		$_SESSION['cmbcategory'] = $_POST['cmbcategory'];
	}
	if(isset($_POST['txttitle']) && $_POST['txttitle']!='' && $_POST['txttitle']!='0.0'){
		$_SESSION['txttitle'] = $_POST['txttitle'];
	}
	if(isset($_POST['cmbprivacy']) && $_POST['cmbprivacy']!='' && $_POST['cmbprivacy']!='0.0'){
		$_SESSION['cmbprivacy'] = $_POST['cmbprivacy'];
	}
	if(isset($_POST['txtmetakeywords']) && $_POST['txtmetakeywords']!='' && $_POST['txtmetakeywords']!='0.0'){
		$_SESSION['txtmetakeywords'] = $_POST['txtmetakeywords'];
	}
	if(isset($_POST['txtmetadesc']) && $_POST['txtmetadesc']!='' && $_POST['txtmetadesc']!='0.0'){
		$_SESSION['txtmetadesc'] = $_POST['txtmetadesc'];
	}
	if(isset($_POST['description']) && $_POST['description']!='' && $_POST['description']!='0.0'){
		$_SESSION['description'] = $_POST['description'];
	}
	
	if(isset($_POST['cmbcategory']) && ($_POST['cmbcategory']=='' ||   $_POST['cmbcategory']=='')){
		$_SESSION[$session_name_initital . "adminerror"] = "Please select Category";	
		header("location:quemaster.php?b=$action");
		exit;
	}
	if(isset($_POST['txttitle']) && $_POST['txttitle']==''){
		$_SESSION[$session_name_initital . "adminerror"] = "Please select Question";	
		header("location:quemaster.php?b=$action");
		exit;
	}
	
	if(isset($_POST['cmbprivacy']) && $_POST['cmbprivacy']=='0.0'){
		$_SESSION[$session_name_initital . "adminerror"] = "Please select privacy";	
		header("location:quemaster.php?b=$action");
		exit;
	}
	
	
	if(isset($_FILES['upload_path']['tmp_name']) && $_FILES['upload_path']['tmp_name']!=''){
		$allowedExts = array("jpg", "jpeg", "gif", "png");
	$ext = strtolower(substr(strrchr($_FILES["upload_path"]['name'],"."),1));
	
	//exit;
	if(!in_array($ext, $allowedExts)){
		$_SESSION[$session_name_initital . "adminerror"] = "Please use Jpg, Jpeg ,Gif or Png image to upload";	
		header("location:quemaster.php?b=$action");
		exit;
	}	
}
	
	
if(isset($_FILES['upload_image']['tmp_name']) && $_FILES['upload_image']['tmp_name']!=''){
	$allowedExts1 = array("doc", "docx", "pdf");
	
$ext1 = strtolower(substr(strrchr($_FILES["upload_image"]['name'],"."),1));
	if(!in_array($ext1, $allowedExts1)){
		$_SESSION[$session_name_initital . "adminerror"] = "Please use DOC, DOCX OR PDF document to upload";	
		header("location:quemaster.php?b=$action");
		exit;
	}	
}
	
	/*if ($_POST['cmblocation'] == 6)
	{
		$cmsid = getonefielddata("select cmsid from tblkb_quemaster where LocationId=" . $_POST['cmblocation'] ." and languageid=" . $_POST['cmblanguage'] . " and CurrentStatus=0");
		if ($cmsid != "")
			$action =$cmsid;
	}*/
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$dt = date("Y-m-d");
	$query = sendtogeneratequery($action,"Title",$_POST['txttitle'],"Y","N");
	$query .= sendtogeneratequery($action,"categoryid",$_POST['cmbcategory'],"Y");
	$query .= sendtogeneratequery($action,"privacyid",$_POST['cmbprivacy'],"Y");
	$query .= sendtogeneratequery($action,"Description",$_POST['description'],"Y","N");
	$query .= sendtogeneratequery($action,"meta_keywords",$_POST['txtmetakeywords'],"Y");
	$query .= sendtogeneratequery($action,"Meta_desc",$_POST['txtmetadesc'],"Y");	
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");	
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");	
	$query .= sendtogeneratequery($action,"$CreateDate",$dt,"Y");		

	$query = substr($query,1);

	if ($action == 0)
	{	 	
	
		
		 $sSql = "insert into tblkb_quemaster (Title,categoryid,privacyid,Description,meta_keywords,Meta_desc,$CreateByfld,$ipfldnm,$CreateDate) values($query)";
		
		execute($sSql);
		$action = getonefielddata("SELECT max(cmsid) from tblkb_quemaster");
		//$retfile ="quemaster.php?b=".$action;
		$retfile ="quemanager.php?b1=-1";
	}
	else
	{
		 $sSql = "update tblkb_quemaster set $query where cmsid=$action";
		
		execute($sSql);
		$get_status = getonefielddata("SELECT currentstatus from tblkb_quemaster WHERE cmsid=".$action);
		if($get_status==5){
			execute("UPDATE tblkb_quemaster SET currentstatus=0 WHERE cmsid=".$action);
			$email = getonefielddata("SELECT email from tblkb_quemaster WHERE cmsid=".$action);
			if($email!=""){
				$subject = "Answer of ".$_POST['title'];
				$message = "Answer of ".$_POST['title']." as below.<br>".$_POST['description'];
				//sendemaildirect($email,$subject,$message);
			}
			//email will be fired.	
		}
		$retfile ="quemaster.php?b=".$action;
	}
	
if(isset($_FILES['upload_path']['tmp_name']) && $_FILES['upload_path']['tmp_name']!=''){
	$rand = rand(1,100);
	$ext = strtolower(substr(strrchr($_FILES["upload_path"]['name'],"."),1));	
	$filenm = "cmsupload_path" .$rand.$action . ".$ext";
	copy($_FILES["upload_path"]['tmp_name'],"../uploadfiles" . "/" .$filenm);
	//$uploadpath = str_replace("../","",$uploadfilepath);	
	$uploadpath = $sitepath.uploadfiles."/".$filenm;
	$sSql = "update tblkb_quemaster set img_path='$uploadpath' where cmsid=$action";
	execute($sSql);
}

if(isset($_FILES['upload_image']['tmp_name']) && $_FILES['upload_image']['tmp_name']!=''){
	$ext = strtolower(substr(strrchr($_FILES["upload_image"]['name'],"."),1));	
	$filenm = "cmsimage" . $action . ".$ext";
	copy($_FILES["upload_image"]['tmp_name'],"../uploadfiles" . "/" .$filenm);
	$uploadpath = str_replace("../","",$uploadfilepath);	
	$sSql = "update tblkb_quemaster set ImgNm ='$filenm' where cmsid=$action";
	//exit;
	
	execute($sSql);
}
	
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";




$_SESSION['cmbcategory']="";
$_SESSION['txttitle']="";
$_SESSION['cmbprivacy']="";
$_SESSION['txtmetakeywords']="";
$_SESSION['txtmetadesc']="";
$_SESSION['description']="";



header("location:$retfile");
?>