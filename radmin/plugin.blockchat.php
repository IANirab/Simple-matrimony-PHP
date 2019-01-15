<? 
include("commonfileadmin.php");
$action = 0;
if(isset($_GET['b']) && $_GET['b']!=''){
	$action = $_GET['b'];	
}
$status = '';
if(isset($_GET['b1']) && $_GET['b1']!=''){
	$status = $_GET['b1'];	
}
if($action!=0 && $status=='Y'){
	execute("update tbldatingusermaster SET blockchat='Y' WHERE userid=".$action);	
} else {
	execute("update tbldatingusermaster SET blockchat='' WHERE userid=".$action);
}
header("location:usermanager.php");
exit;
?>