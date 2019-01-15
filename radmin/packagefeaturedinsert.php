<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
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

	$query = sendtogeneratequery($action,"title",$_POST['title'],"Y");
	$query .= sendtogeneratequery($action,"help",$_POST['help'],"Y");
	$query .= sendtogeneratequery($action,"type",$_POST['type'],"Y");
	$query .= sendtogeneratequery($action,"languageid","1","Y");


	

	$query = substr($query,1);
     //echo $query; exit;
	if ($action == 0)
	{
		
 	     $sSql = "insert into tbldatingpackagefeaturedmaster (title,help,type,languageid) values($query)";				
		 execute($sSql);
		 
		  $result = getdata("select id from tbldatingpackagefeaturedmaster where currentstatus=0 order by id desc limit 0,1");
          $rs = mysqli_fetch_array($result);
		  $id=$rs['id'];
	 	
		 
			if (is_uploaded_file($_FILES['imgnm']['tmp_name']))
			{
				$filenm = "packagefeatured$id." . strrev(substr(strrev($_FILES['imgnm']['name']),0,3));
				copy($_FILES['imgnm']['tmp_name'],"../uploadfiles/$filenm");
				execute("update tbldatingpackagefeaturedmaster set imgnm='$filenm' where id=$id");
			}
		 
		   $retfile ="packagefeatured_manager.php";
		
	}
	else
	{
		
		$sSql = "update tbldatingpackagefeaturedmaster set $query where id=$action";
		execute($sSql);
		
	      if (is_uploaded_file($_FILES['imgnm']['tmp_name']))
			{
				$filenm = "packagefeatured$id." . strrev(substr(strrev($_FILES['imgnm']['name']),0,3));
				copy($_FILES['imgnm']['tmp_name'],"../uploadfiles/$filenm");
				execute("update tbldatingpackagefeaturedmaster set imgnm='$filenm' where id=$action");
			}
		
		
		
	 	$retfile ="packagefeatured_manager.php";
		
		
	} 
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>