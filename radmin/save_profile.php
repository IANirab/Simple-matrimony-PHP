<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$id = '';
if(isset($_POST['id']) && $_POST['id']!=''){
	$id = $_POST['id'];
}
if($id!=''){
	execute("update tbl_modified_field_master SET vals='".$_POST['val']."' WHERE id=".$id);
	$result = getdata("SELECT userid,name from tbl_modified_field_master WHERE id=".$id);
	$rs = mysqli_fetch_array($result);
		$userid = $rs[0];
		$name = $rs[1];
		$vals = $_POST['val'];		
		execute("update tbldatingusermaster SET ".$name."='".$vals."' WHERE userid=".$userid);
	echo $vals;			
}
?>