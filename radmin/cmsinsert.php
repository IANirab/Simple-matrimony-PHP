<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!="")
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
	/*if ($_POST['cmblocation'] == 6)
	{
		$cmsid = getonefielddata("select cmsid from tblcmsmaster where LocationId=" . $_POST['cmblocation'] ." and languageid=" . $_POST['cmblanguage'] . " and CurrentStatus=0");
		if ($cmsid != "")
			$action =$cmsid;
	}*/
	$txtmetadesc = '';
	if(isset($_POST['txtmetadesc']) && $_POST['txtmetadesc']!=''){
		$txtmetadesc = str_replace("'","&rsquo;",$_POST['txtmetadesc']);
		$txtmetadesc = substr($txtmetadesc,0,150);			
	}
	$txtmeta = '';
	if(isset($_POST['txtmeta']) && $_POST['txtmeta']!=''){
		$txtmetadata = str_replace("'","&rsquo;",$_POST['txtmeta']);
		$txtmeta_arr = explode(",",$txtmetadata);
		$txtmeta = '';		
		if(count($txtmeta_arr)>6){
			for($i=0; $i<6; $i++){
				$txtmeta .= $txtmeta_arr[$i].",";
			}
		$txtmeta = substr($txtmeta,0,-1);		
		} else {
			$txtmeta = $_POST['txtmeta'];	
		}
			
	}	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"Title",str_replace("'","&rsquo;",$_POST['txttitle']),"Y");
	$query .= sendtogeneratequery($action,"staticlink",$_POST['txtstaticlink'],"Y");
	$query .= sendtogeneratequery($action,"Meta_kw",$txtmeta,"Y");
	$query .= sendtogeneratequery($action,"Description",str_replace("'","&rsquo;",$_POST['description']),"Y","N");
	$query .= sendtogeneratequery($action,"LocationId",$_POST['cmblocation'],"Y");
	$query .= sendtogeneratequery($action,"languageid",$_POST['cmblanguage'],"Y");
	$query .= sendtogeneratequery($action,"Meta_desc",$txtmetadesc,"Y");
	$query .= sendtogeneratequery($action,"orderby",$_POST['order'],"Y");
	$query .= sendtogeneratequery($action,"parentid",$_POST['parent'],"Y");
	$query .= sendtogeneratequery($action,"authorid",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");	
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tblcmsmaster (Title,staticlink,Meta_kw,Description,LocationId,languageid,Meta_desc,orderby,parentid,authorid,CreateBy,$ipfldnm,CreateDate) values($query,curdate())";
		execute($sSql);
		
		 $result = getdata("select cmsid from tblcmsmaster where currentstatus=0 order by cmsid desc limit 0,1");
          $rs = mysqli_fetch_array($result);
		  $id=$rs['cmsid'];
	 	   if (is_uploaded_file($_FILES['cmsimage']['tmp_name']))
			{ 
			    $ext=$_FILES['cmsimage']['type'];
				if($ext=='image/png' ||  $ext=='image/jpeg' || $ext=='image/jpe' || $ext=='image/gif'){
				$t=time() ;
				$filenm = "cmsimage$id$t." . strrev(substr(strrev($_FILES['cmsimage']['name']),0,3));
				copy($_FILES['cmsimage']['tmp_name'],"../uploadfiles/$filenm");
				execute("update tblcmsmaster set ImgNm='$filenm' where cmsid=$id");
				}else{
					 $retfile ="cmsmanager.php";
					 $_SESSION[$session_name_initital . "adminerror"] = "Please select valide image";
					 header("location:$retfile");
					 exit;
				 }
			}
		
		$retfile ="cmsmanager.php";
	}
	else
	{
		  $sSql = "update tblcmsmaster set $query,ModifyDate=curdate() where cmsid='".$action."'";
		  execute($sSql);
		   if (is_uploaded_file($_FILES['cmsimage']['tmp_name']))
			{  
			     $ext=$_FILES['cmsimage']['type'];
				 if($ext=='image/png' ||  $ext=='image/jpeg' || $ext=='image/jpg' || $ext=='image/gif'){
					$t=time() ; 
					$filenm = "cmsimage$action$t." . strrev(substr(strrev($_FILES['cmsimage']['name']),0,3));
					copy($_FILES['cmsimage']['tmp_name'],"../uploadfiles/$filenm");
					execute("update tblcmsmaster set ImgNm='$filenm' where cmsid=$action");
				 }else{
					 $retfile ="cmsmaster.php?b=$action";
					 $_SESSION[$session_name_initital . "adminerror"] = "Please upload Image in png,jpeg,jpe or gif Fromat";
					 header("location:$retfile");
					 exit;
				 }
			}
		
		$retfile ="cmsmanager.php";
	}
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>