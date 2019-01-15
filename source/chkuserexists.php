<? include_once("commonfile.php");
$email = '';
if(isset($_POST['email']) && $_POST['email']!=''){
	$email = $_POST['email'];	
}
$chkexist = getonefielddata("SELECT count(userid) from tbldatingusermaster where email='".$email."' AND currentstatus!=3");
if($chkexist>0){
	echo 'N';	
} else {
	echo 'Y';	
}
?>