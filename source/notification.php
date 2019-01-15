<?php
require_once('commonfile.php');
checklogin($sitepath);
$curruserid = 0;
if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
	$curruserid = $_SESSION[$session_name_initital."memberuserid"];
}

$packageid = "";
$profile_percentage = find_profile_fill_percentage($curruserid);
$curuserpkgid = getonefielddata("SELECT packageid from tbldatingusermaster WHERE userid=".$curruserid);
$totalnewmessage = pmb_new_message($curruserid);
$exdate = getonefielddata("SELECT expiredate from tbldatingusermaster WHERE userid=$curruserid");
if(file_exists("radmin/plugin.blockchat.php")){
	$blockchat = getonefielddata("SELECT blockchat from tbldatingusermaster WHERE userid=".$curruserid);
} else {
	$blockchat = '';	
}
$findexpireornot = "";
if($exdate<date("Y-m-d")){	
	$findexpireornot = 0;
} else {
	$findexpireornot = 1;
}

if ($findexpireornot == 0)
	$expmess = $dashboardexpmess;
else
	$expmess = "";
$ownprofilelink = displayprofilelink($curruserid);
$totalview ="";
$imagenm = "";
$result = getdata("select imagenm,totalview,date_format(expiredate,'$date_format'),packageid from tbldatingusermaster where userid =$curruserid");
while ($rs = mysqli_fetch_array($result))
{
	$imagenm = find_user_image($curruserid,"","","");
	$totalview = $rs[1];
	$expiredate = $rs[2];
	$packageid = $rs[3];
	if ($packageid != ""){
	$packageid = getonefielddata("select Description from tbldatingpackagemaster where PackageId=$packageid");
		$price = getonefielddata("SELECT Price from tbldatingpackagemaster WHERE PackageId=$rs[3]");
	}	
}
freeingresult($result);
$total_contact_can_view = user_can_see_contact_detail($curruserid,"Y");
$total_shortlisted_profile = total_shortlist_member($curruserid);
$total_preffered_partner = total_partner_profile_match($curruserid);
$since_date = getonefielddata("SELECT date_format(createdate,'$date_format') from tbldatingusermaster WHERE userid=$curruserid");
$lastlogin = getonefielddata("SELECT date_format(lastlogin,'$date_format') from tbldatingusermaster WHERE userid=$curruserid");
?>


<? 
$objbottombanner = new banner();
echo ($objbottombanner->Showbanner1(4));
?>










<?
if(isset($_GET['id'])){
    $id2 = $_GET['id'];

if($id2 == 1){
    $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $id=0;
    $id3=0;
    $id1=1;
    $sql1 = "UPDATE tbldatingpmbmaster SET
            notstatus = '$id1'
    where ToUserId='$curruserid' AND type='1' AND notstatus='$id'";
    $result1 = $db1->query($sql1);
    
    if($result1){
        header("location:notify.php");
    }
    
}


elseif($id2 == 2){
    $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $id=0;
    $id1=1;
    $sql1 = "UPDATE tbldatingprofilehistorymaster SET
            notstatus = '$id1'
    where touserid='$curruserid' AND notstatus='$id'";
    $result1 = $db1->query($sql1);
    
    if($result1){
        header("location:viewedmyprofile.php");
    }
    
}

elseif($id2 == 3){
    $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $id=0;
    $id3=0;
    $id1=1;
    $sql1 = "UPDATE tbldatingpmbmaster SET
            notstatus = '$id1'
    where FromUserId='$curruserid' AND type='1' AND notstatus='$id'";
    $result1 = $db1->query($sql1);
    
    if($result1){
        header("location:notify.php");
    }
    
}

elseif($id2 == 4){
    $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $id=0;
    $id3=0;
    $id1=1;
    $sql1 = "UPDATE tblphonerequestmaster SET
            notstatus = '$id1'
    where touserid='$curruserid' AND currentstatus='$id' AND notstatus='$id'";
    $result1 = $db1->query($sql1);
    
    if($result1){
        header("location:viewedmycontact.php");
    }
    
}


}
?>


































