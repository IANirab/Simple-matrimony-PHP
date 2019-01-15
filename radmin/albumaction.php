<?
	session_start();
	require_once("commonfileadmin.php");
	checkadminlogin();
	$action = "";
	if(isset($_GET['b']) && $_GET['b']!="" && isset($_GET['b1']) && $_GET['b1']!=""){
		$action = $_GET['b'];	
		$status = $_GET['b1'];
	}
	execute("UPDATE tbldatingalbummaster SET currentstatus=$status WHERE albumid=".$action);
	$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
	header("location:".$_SERVER['HTTP_REFERER']);
?>