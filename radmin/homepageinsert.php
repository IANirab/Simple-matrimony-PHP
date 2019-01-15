<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();



if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "modifyby";
	  $ipfldnm = "modifyip";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "createby";
	  $ipfldnm = "createip";
	}
	$ext = strtolower(substr(strrchr($_FILES["title"]["name"],"."),1));
	$filenm_to_upload = "tbl_homepage_images" . $action . ".$ext";
	
	
	if(isset($_POST['transition']) && $_POST['transition']!='0.0'){
	  $transition=$_POST['transition'];	
	}else{
	  $transition='';	
	}
	
	if(isset($_POST['trigger']) && $_POST['trigger']!='0.0'){
	  $trigger=$_POST['trigger'];	
	}else{
	  $trigger='';	
	}
	
	if(isset($_POST['content_type']) && $_POST['content_type']!='0.0'){
	  $content_type=$_POST['content_type'];	
	}else{
	  $content_type='';	
	}
	
	if(isset($_POST['page_type']) && $_POST['page_type']!='0.0'){
	  $page_type=$_POST['page_type'];	
	}else{
	  $page_type='';	
	}
	
	
	if(isset($_POST['newtitle']) && $_POST['newtitle']!=''){
	  $newtitle=$_POST['newtitle'];	
	}else{
	  $newtitle='';	
	}
	
	
	if(isset($_POST['bgclr']) && $_POST['bgclr']!=''){
	  $bgclr=$_POST['bgclr'];	
	}else{
	  $bgclr='';	
	}
	
	if(isset($_POST['clr']) && $_POST['clr']!=''){
	  $clr=$_POST['clr'];	
	}else{
	  $clr='';	
	}
	
	
	
	 $en_exit =1;
	if(isset($_POST['status']) && $_POST['status']!=''){
	   $en_exit=$_POST['status']; 	
	}else{
	  $en_exit=1;	
	}
	
	if(isset($_POST['cmblanguage']) && $_POST['cmblanguage']!=''){
	   $cmblanguage=$_POST['cmblanguage']; 	
	}else{
	  $cmblanguage='';	
	}

	
	
	
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query="";
	//$query .= sendtogeneratequery($action,"title",$filenm_to_upload,"Y");
	//$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	//$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	$query .= sendtogeneratequery($action,"pagenm",$_POST['pagenm'],"Y");
	$query .= sendtogeneratequery($action,"currentstatus","0.0","Y");
	$query .= sendtogeneratequery($action,"link",$_POST['link'],"Y");
	$query .= sendtogeneratequery($action,"description",$_POST['description'],"Y");
	$query .= sendtogeneratequery($action,"transition",$transition,"Y");
	$query .= sendtogeneratequery($action,"trigger_name",$trigger,"Y");
	$query .= sendtogeneratequery($action,"content_type",$content_type,"Y");
	$query .= sendtogeneratequery($action,"page_type",$page_type,"Y");
	
	$query .= sendtogeneratequery($action,"title1",$newtitle,"Y");
	$query .= sendtogeneratequery($action,"bg_colour",$bgclr,"Y");
	$query .= sendtogeneratequery($action,"colour",$clr,"Y");
	$query .= sendtogeneratequery($action,"en_exit",$en_exit,"Y");	
	$query .= sendtogeneratequery($action,"languageid",$cmblanguage,"Y");	
	
	
	
	$query = substr($query,1);

	if ($action == 0)
	{
		
	 	 $sSql = "insert into tbl_homepage_images (pagenm,currentstatus,link,description,transition,trigger_name,content_type,page_type,title1,bg_colour,colour,en_exit,languageid,createip,createdate) values($query,'".$_SERVER['REMOTE_ADDR']."',curdate())";
		execute($sSql);  
		$retfile ="homepagemanager.php";
		$action = getonefielddata("select max(id) from tbl_homepage_images");
	
		
	}
	else
	{
		$sSql = "update tbl_homepage_images set $query where id=$action";  
		execute($sSql);
		
		
		
		$retfile ="homepagemanager.php";
	}

if(isset($_FILES["title"]["tmp_name"]))
{
if($_FILES["title"]["tmp_name"] != "")
{
$ext = strtolower(substr(strrchr($_FILES["title"]["name"],"."),1));
$filenm_to_upload = "matrimonyhome" . $action . ".$ext";
if (!file_exists('../uploadfiles/site_'.$sitethemefolder.'')) {
    mkdir('../uploadfiles/site_'.$sitethemefolder.'', 0777, true);
}
copy($_FILES["title"]["tmp_name"],"../uploadfiles" . "/site_".$sitethemefolder."/" .$filenm_to_upload);
$sSql = "update tbl_homepage_images set title='$filenm_to_upload' where id=$action";
execute($sSql);
}
}
$_SESSION["adminerror"] = "information saved successfully";
header("location:$retfile");
?>