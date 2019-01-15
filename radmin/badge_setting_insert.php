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

if(isset($_POST['type']) && $_POST['type']!='')
{
	$type=$_POST['type'];
}
			
			if($type=='C')
			{
				execute("UPDATE  tbldating_docmaster SET currentstatus='".$val."' 
				WHERE id=".$id);
			}
			
			if($type=='S')
			{
				execute("UPDATE  tbldating_docmaster SET bagde_assoc='".$val."' 
				WHERE id=".$id);
			}

?>