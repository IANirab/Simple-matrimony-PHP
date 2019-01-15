<?

ob_start();
include("commonfile.php");

if(isset($_POST['id']) && $_POST['id']!='')
{
	$id=$_POST['id'];
}
$userid=$_SESSION[$session_name_initital."memberuserid"];

	execute("UPDATE `tbldating_userdoc` SET   `currentstatus`=3,`modifyby`='".$userid."',
	`modifyip`='".$_SERVER['REMOTE_ADDR']."',`modifydate`='".date('Y-m-d')."' WHERE id='".$id."' ");
	$image='';
	$image=getonefielddata("select image from  tbldating_userdoc where id='".$id."' ");
	if($image!='' && file_exists("uploadfiles/document/".$image.""))
	{
		unlink("uploadfiles/document/".$image."");	
	}
	echo "Document Deleted Successfully"; exit;
	

?>