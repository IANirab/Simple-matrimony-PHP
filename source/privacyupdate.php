<?
ob_start();
include_once("commonfile.php");
checklogin($sitepath); 
$partner_match_email = '';
$imagerequest = '';
$profile_viewed_by = '';
$privatecontact = '';
$privateemail = '';

if(isset($_POST['partner_email']) && $_POST['partner_email']!=''){
	$partner_match_email = $_POST['partner_email'];	
}

if(isset($_POST['imagerequest']) && $_POST['imagerequest']!=''){
	$imagerequest = $_POST['imagerequest'];	
}

if(isset($_POST['profileviewdby']) && $_POST['profileviewdby']!=''){
	$profile_viewed_by = $_POST['profileviewdby'];
}

if(isset($_POST['privatecontact']) && $_POST['privatecontact']!=''){
	$privatecontact = $_POST['privatecontact'];
}

if(isset($_POST['privateemail']) && $_POST['privateemail']!=''){
	$privateemail = $_POST['privateemail'];
}

execute("update tbldatingpartnerprofilemaster SET sendmeemail='".$partner_match_email."' WHERE userid=".$curruserid);
execute("update tbldatingusermaster SET image_password_protect='".$imagerequest."', profile_viewedonly='".$profile_viewed_by."', private_email='".$privateemail."', private_phone_no='".$privatecontact."' WHERE userid=".$curruserid);

header("location:message.php?b=86");
ob_flush();
?>