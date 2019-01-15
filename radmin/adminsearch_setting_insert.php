<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();


if(isset($_POST['val']) && $_POST['val']!='')
{
	$val=$_POST['val'];
}


if(isset($_POST['id']) && $_POST['id']!='')
{
	$id=$_POST['id'];
}


				execute("UPDATE tbldatingadminsearchsetting SET currentstatus='".$val."' 
				WHERE id=".$id);

?>