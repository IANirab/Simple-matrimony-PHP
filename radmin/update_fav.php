<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$userid = 0;
$favlist = '';
if(isset($_POST['userid']) && $_POST['userid']!=''){
	$userid = $_POST['userid'];
}
if(isset($_POST['favlist']) && $_POST['favlist']!=''){
	$favlist = $_POST['favlist'];
}
if($favlist!='' && $userid>0){
	$fav_arr = explode(",",$favlist);	
	$getgenderid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$userid);
	for($i=0; $i<count($fav_arr); $i++){
		$favusergendid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$fav_arr[$i]);		
		$checkexist = getonefielddata("SELECT shortlistid from tbldatingshortlistmaster WHERE currentstatus=0 AND userid=".$fav_arr[$i]." AND createby=".$userid);	
		if($checkexist=='' && $getgenderid!=$favusergendid){
			execute("INSERT into tbldatingshortlistmaster SET userid=".$fav_arr[$i].", createby=".$userid.", createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'");
		}
	}
	echo "Favourite updated successfully.";
}
?>