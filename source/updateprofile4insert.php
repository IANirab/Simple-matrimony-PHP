<?php
ob_start();
include_once("commonfile.php");

$action = $curruserid;

$hobbies="";
if(isset($_POST['hobbies_arr']) && $_POST['hobbies_arr']!=""){
	$hobbies = implode(",",$_POST['hobbies_arr']);
}
$music="";

if(isset($_POST['music_arr']) && $_POST['music_arr']!=""){
	$music = implode(",",$_POST['music_arr']);
}
$interest="";
if(isset($_POST['interest_arr']) && $_POST['interest_arr']!=""){
	$interest = implode(",",$_POST['interest_arr']);
}
$book="";
if(isset($_POST['read_arr']) && $_POST['read_arr']!=""){
	$book = implode(",",$_POST['read_arr']);
}
$cuisine="";
if(isset($_POST['cuisine_arr']) && $_POST['cuisine_arr']!=""){
	$cuisine = implode(",",$_POST['cuisine_arr']);
}
$dress = "";
if(isset($_POST['dress_arr']) && $_POST['dress_arr']!=""){
	$dress = implode(",",$_POST['dress_arr']);
}
$sports = "";
if(isset($_POST['fitness_arr']) && $_POST['fitness_arr']!=""){
	$sports = implode(",",$_POST['fitness_arr']);
}

$query = sendtogeneratequery($action,"hobbies",$hobbies,"Y");
$query .= sendtogeneratequery($action,"music",$music,"Y");
$query .= sendtogeneratequery($action,"interest",$interest,"Y");
$query .= sendtogeneratequery($action,"fav_read",$book,"Y");
$query .= sendtogeneratequery($action,"fav_cuisines",$cuisine,"Y");
$query .= sendtogeneratequery($action,"dress_styles",$dress,"Y");
$query .= sendtogeneratequery($action,"fitness",$sports,"Y");
updateprofile($query,$curruserid);

$_SESSION[$session_name_initital . "error"] = $messageerrmess12;
header("location:updateprofilepicture2.php");
ob_flush();
?>