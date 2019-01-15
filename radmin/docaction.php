<? 
session_start();
include("commonfileadmin.php");
$action = 0;
$pgnm = 1;
if(isset($_GET['b']) && $_GET['b']!=''){
	$action = $_GET['b'];
}
$status = '';
if(isset($_GET['s1']) && $_GET['s1']!=''){
	$status = $_GET['s1'];	
}
if(isset($_GET['pg']) && $_GET['pg']!=''){
	$pgnm = $_GET['pg'];
}
execute("update tbldatingusermaster SET verified_doc='".$status."' WHERE userid=".$action);
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:usermanager.php?pgnm=".$pgnm);
exit;
?>