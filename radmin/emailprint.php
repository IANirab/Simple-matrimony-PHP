<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y"); 
if(isset($_GET['b']) && $_GET['b']!= "" && is_numeric($_GET['b'])){
	$action = $_GET['b'];
} else {
	$action = '0';
}
echo $email_detail = getonefielddata("SELECT message from tbldatingemailmaster WHERE emailid=".$action);
?>
<br>
<input type="button" name="print" value="Print" onclick="javascript:window.print();" />