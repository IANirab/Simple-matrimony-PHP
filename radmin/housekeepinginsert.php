<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$table_name = find_table_name();
$languageid=1;
if(isset($_POST['languageid']) && $_POST['languageid']!=''){
	$languageid = $_POST['languageid'];	
}

if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	}
else
	{
	  $action = 0;
	
	}
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"title",$_POST['title'],"Y");
	//if($table_name!="tbl_favourite_cuisines_master" && $table_name!="tbl_hobbies_master" && $table_name!="tbl_music_master" && $table_name!="tbl_interest_master" && $table_name!="tbl_favourite_read_master"){
	$query .= sendtogeneratequery($action,"languageid",$languageid,"Y");
	//}

	$query = substr($query,1);

	if ($action == 0)
	{
		/*if($table_name!="tbl_favourite_cuisines_master"  && $table_name!="tbl_hobbies_master"  && $table_name!="tbl_music_master" && $table_name!="tbl_interest_master" && $table_name!="tbl_favourite_read_master"){
	 		$sSql = "insert into $table_name (title,languageid) values($query)";
		} else {
			$sSql = "insert into $table_name (title) values($query)";
		}*/
		$sSql = "insert into $table_name (title,languageid) values($query)"; 
		execute($sSql);
		$action = getonefielddata("SELECT max(id) from $table_name");
		$retfile ="housekeepingmaster.php?tab=$table_name";
	}
	else
	{
		$sSql = "update $table_name set $query where id=$action";		
		execute($sSql);		
		$retfile ="housekeepingmanager.php?tab=$table_name";
	}

execute("UPDATE $table_name SET currentstatus=0 WHERE id=".$action);
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>