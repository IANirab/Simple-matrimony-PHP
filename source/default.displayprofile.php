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
$arg= '';
$sister_unmied1='';
$brother_unmied1='';
$brother_mied1='';
$sister_mied1='';
?>




<? ob_start();
include("commonfile.php");
$uid = getsimpleid("b");
$dispayuserid =$uid;
$accepted=find_image_on_request_or_not($curruserid,$dispayuserid);
if($enable_image_request_password=="N") {
if($curruserid==0){	
	execute("insert into tbldatingprofilehistorymaster (touserid,CreateDate,CreateIP,currentstatus) values ($dispayuserid,now(),'".getip()."',2) ");
}
}
 
 
if(!isset($_GET['act'])){
if(!isset($_SESSION[$session_name_initital."memberuserid"])){
	header("location:". $sitepath."message.php?b=26");	
	exit;	
}
}

$currgender = getonefielddata("SELECT genderid from tbldatingusermaster WHERE
 userid='".$curruserid."' ");

$displaygender = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid='".$uid."' ");

if($uid!=$curruserid && $currgender==$displaygender)
{
 	 header("location:". $sitepath ."message.php?b=78"); exit;
}

if ($curruserid != "")
checkweatherblacklist($curruserid,$uid);
?>




<?
require_once("plugin.displayprofile_coding.php"); ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>paroshi.com :: member profile</title>
    <!-- Custom CSS -->
    <link href="assets1/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme|KoHo|Roboto+Slab|Source+Code+Pro" rel="stylesheet">

<link href="assets1/libs/flot/css/float-chart.css" rel="stylesheet">

<style type="text/css">

.head-logo{
    width: 43%;
    position: relative;
    top: 14px;
    left: 23px;
}
@media (max-width:750px){
.head-logo {
    width: 17%;
    position: relative;
    top: -1px;
    left: 12px;
}
}
@media (max-width:450px){
.head-logo {
    width: 23%;
    position: relative;
    top: -1px;
    left: 12px;
}
}
    span.level {
    background: #E91E63;
    padding: 0px 5px;
    position: relative;
    top: -20px;
    left: -6px;
    border-radius: 2px;
}
</style>


<style type="text/css">
span {
    font-family: Source Code Pro;
}
ul.nav.nav-tabs {
    background: #ff1493;
}
a.nav-link.active.show {
    background: #27a9e3;
    color: white;
}
a.nav-link {
    color: white;
}
    .btn-green{
        background:#28b779 !important;
        border:1px solid #28b779 !important;
    }
    .btn-blue{
        background:#2255a4 !important;
        border:1px solid #2255a4 !important;
    }
    .btn-gray{
        background:#da542e !important;
        border:1px solid #da542e !important;
    }
    .btn {
        color:white !important;
    }
    
    div#notify_warning {
    display: none;
}
    div#notify_sucess {
    display: none;
}
    div#notify_danger {
    display: none;
}
    div#notify_info {
    display: none;
}
div .otherclass{
    display:block !important;
}

button.btn.btn-whiteblue.btn-lg.btn-block {
    background: #0ed5ef;
}
figure img {
    width: 100%;
}
</style>
        <? 
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        
        $useridmain = $_GET['b'];
        $sql = "select * from tbldatingusermaster where userid='$useridmain'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
            $packid = $data->packageid;
            if($packid == 64){
            
        ?>
        <style type="text/css">
            .back{
                background:yellow;
                /*color:white !important;*/
                padding: 30px 0px;
            }
            .borderpack{
                border:2px solid red;
            }
        </style>
        <?
        } 
        }
        ?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        
        
        
        
        
        
        
        
        
        
        
        
                <?
			$result_fav = getonefielddata("select count(ShortlistId) from  tbldatingshortlistmaster where currentstatus=0 and CreateBy=$curruserid");
			$result_exp = getonefielddata("select count(id) from tbldatingexpressintrestmaster where currentstatus=0 and fromuserid=$curruserid");
			$result_pmb = getonefielddata("SELECT count(PmbId) FROM tbldatingpmbmaster
WHERE CurrentStatus =0 AND FromUserId=$curruserid AND tbldatingpmbmaster.Subject NOT IN (Select title from tbldatingwinkmaster where currentstatus=0)");
			$result_wink = getonefielddata("SELECT count(PmbId) FROM tbldatingpmbmaster
WHERE CurrentStatus =0 AND FromUserId=$curruserid AND Subject IN (Select title from tbldatingwinkmaster where currentstatus=0)");
			$result_pmbreply = getonefielddata("select count(PmbId) from  tbldatingpmbmaster where currentstatus=0 and FromUserId=$curruserid");
			$genderid = getonefielddata("select genderid from tbldatingusermaster where userid=$curruserid and currentstatus=0 ");
			if($genderid!=''){
			$count = getonefielddata("select count(userid) from tbldatingusermaster where currentstatus=0 and genderid!=$genderid");
			} else {
			$count = 0;					
			}
			$percentage_exp = '';
			$percentage_fav = '';
			$percentage_pmb = '';
			$percentage_pmbrep = '';
			$percentage_wink = '';
			if($result_fav>0 && $count>0){
				$percentage_fav = percentage($result_fav,$count);
			} if($result_exp>0 && $count>0){
				$percentage_exp = percentage($result_exp,$count);
			} if($result_pmb>0 && $count>0){
				$percentage_pmb = percentage($result_pmb,$count);
			} if($result_wink>0 && $count>0){
				$percentage_wink = percentage($result_wink,$count);
			} if($result_pmbreply>0 && $count>0){
				$percentage_pmbrep = percentage($result_pmbreply,$count);
			}
			if($percentage_exp>0 && $percentage_fav>0 && $percentage_pmb>0 && $percentage_pmbrep>0 && $percentage_wink>0){
				$percentage1 = $percentage_exp + $percentage_fav + $percentage_pmb + $percentage_pmbrep + $percentage_wink;
			} else {
				$percentage1 = '';	
			}
			if($count>0){
				$div = $count * 5;
			}
			if($percentage1>0 && $div>0){
        		$percentage = percentage($percentage1,$div);
			} else {
				$percentage = '';	
			}
			if($percentage!=''){
				$query = execute("update tbldatingusermaster set activity_percentage=$percentage where userid=$curruserid and currentstatus=0");
			}
		?>
		
		
		
		
		
<? 

if($sms_module_enable=='Y' && $dashboard_mobile_verification_sms=='Y' ){
$userdata = getdata("SELECT country_code,mobile,smsverified,smsverificationcode from tbldatingusermaster WHERE userid=".$curruserid);
$user_rs = mysqli_fetch_array($userdata);
$sms_country_code = $user_rs[0];
$sms_mobile = $user_rs[1];
$sms_verified = $user_rs[2];
$sms_verificationcode = $user_rs[3];

?>
<?
if($sms_country_code=='' || $sms_mobile==''){ ?>
	
<?    
} else if($sms_verified!='Y' && $sms_country_code!='' && $sms_mobile!='' && $sms_verificationcode==''){ ?>
	<div class="smsmessage"><?=$dash_sms_txt3?> <a href="smsverify.php"><?=$dash_sms_txt1?></a> <?=$dash_sms_txt2?></div>
<?
} else if($sms_verified!='Y'){ ?>
	<div class="smsmessage"><?=$dash_sms_txt3?> <a href="verifysms.php"><?=$dash_sms_txt1?></a> <?=$dash_sms_txt2?></div>
<?
} 
}
?>
        
        
        
        
  
        
<?
$expresscount = getonefielddata("SELECT count(id) from tbldatingexpressintrestmaster WHERE touserid=".$curruserid); 
if($blockchat=='Y'){
	$chatonclick = '';	
} else {
	$chatonclick = 'onclick="showmessenger();"';
}
?>
<? 
$unread = getonefielddata("SELECT count(pmbid) from tbldatingpmbmaster WHERE touserid=".$curruserid." AND messagestatus=1 AND currentstatus=0");
?>



<?
$expresscount = getonefielddata("SELECT count(id) from tbldatingexpressintrestmaster WHERE touserid=".$curruserid); 
if($blockchat=='Y'){
	$chatonclick = '';	
} else {
	$chatonclick = 'onclick="showmessenger();"';
}
?>
      
      
      
      
      
<? 
$unread = getonefielddata("SELECT count(pmbid) from tbldatingpmbmaster WHERE touserid=".$curruserid." AND messagestatus=1 AND currentstatus=0");
?>
<div class="dashboardnewmessages">
<div class="newmessage">

</div>
</div>



<div class="dashboardnewmessages2">
<? 
if ($totalnewmessage == "")
	$totalnewmessage =0;
if ($totalnewmessage == 0)
	$clsnm = "newmessage2";
else
	$clsnm = "newmessage1";
?>


<? require_once("dashboard_stats1.php") ?>
<? require_once("dashborad_stats2.php") ?>
        
        
        
        
        
        
        
        
        
        
<!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!--<img src="assets1/images/logo-icon.png" alt="homepage" class="light-logo" />-->
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="https://www.paroshi.com/uploadfiles/site_default5/sitelogo.png" class="light-logo head-logo" />
                            
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Visit  <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.php">Home</a>
                                <a class="dropdown-item" href="https://www.paroshi.com/cmsdisplay.php?b=46">About Us</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Testimonials</a>
                            </div>
                        </li>

                    </ul>

                    <ul class="navbar-nav float-right">

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                            
        <?
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=0;
        $sql1 = "select * from tbldatingpmbmaster where ToUserId='$curruserid' AND notstatus='$id' AND type='1' limit 1";
        $result1 = $db1->query($sql1);
        
        if($result1){
        while($data1 = $result1->fetch_object()){
            $data = ".";
        }
        }
        ?> 
        
       <?
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=0;
        $sql2 = "select * from tbldatingprofilehistorymaster where touserid='$curruserid' AND notstatus='$id' limit 1";
        $result2 = $db2->query($sql2);
        if($result2){
        while($data2 = $result2->fetch_object()){
            $view = $data2->fromuserid;
            if($view){
                $data =".";
            }
        ?>
           
        <?
        }
        }
        ?> 
        
        <?
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=0;
        $sql3 = "select * from tbldatingpmbmaster where FromUserId='$curruserid' AND notstatus='$id' AND type='1' AND status='A' limit 1";
        $result3 = $db3->query($sql3);
        
        if($result3){
        while($data3 = $result3->fetch_object()){
            $data = ".";
            
        }
        }
        ?>
        <span class="level"><? echo $data; ?></span>
    </a>
    
    
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    
                                            
                                            
        <?
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=0;
        $sql1 = "select * from tbldatingpmbmaster where ToUserId='$curruserid' AND notstatus='$id' AND type='1' limit 1";
        $result1 = $db1->query($sql1);
        
        if($result1){
        while($data1 = $result1->fetch_object()){
        ?> 
        <li>
                    <div class="">                   
                    <!-- Message -->
                    <a href="https://www.paroshi.com/notification.php?id=1" class="link border-top">
                    <div class="d-flex no-block align-items-center p-10">
                    
                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                    
                    <div class="m-l-10">
                    <h5 class="m-b-0">Express Interest</h5> 
                    <span class="mail-desc">You Received A New Express Interest</span> 
                    </div>
                    </div>
                    </a>
                    <!-- Message -->
                    </div>
                </li>
        <?php } } ?> 
        
        
        
        
        
        
        <?
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=0;
        $sql2 = "select * from tbldatingprofilehistorymaster where touserid='$curruserid' AND notstatus='$id' limit 1";
        $result2 = $db2->query($sql2);
        
        if($result2){
        while($data2 = $result2->fetch_object()){
            $view = $data2->fromuserid;
            
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from tbldatingusermaster where userid='$view'";
        $result3 = $db3->query($sql3);
        
        if($result3){
        while($data3 = $result3->fetch_object()){
            
        ?> 
        <li>
                    <div class="">                   
                    <!-- Message -->
                    <a href="https://www.paroshi.com/notification.php?id=2" class="link border-top">
                    <div class="d-flex no-block align-items-center p-10">
                        <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                        <div class="m-l-10">
                    <h5 class="m-b-0"><? echo $data3->name; ?></h5> 
                        <span class="mail-desc">Just visit your profile!</span> 
                            </div>
                            </div>
                        </a>
                    <!-- Message -->
                    </div>
                </li>
        <?php } } } } ?> 
        
        
        




        
        
        <?
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=0;
        $sql1 = "select * from tbldatingpmbmaster where FromUserId='$curruserid' AND notstatus='$id' AND type='1' AND status='A' limit 1";
        $result1 = $db1->query($sql1);
        
        if($result1){
        while($data1 = $result1->fetch_object()){
            $view = $data1->ToUserId;
            
            
            
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from tbldatingusermaster where userid='$view'";
        $result3 = $db3->query($sql3);
        
        if($result3){
        while($data3 = $result3->fetch_object()){
            
            
            
        ?> 
        <li>
                    <div class="">                   
                    <!-- Message -->
                    <a href="https://www.paroshi.com/notification.php?id=3" class="link border-top">
                    <div class="d-flex no-block align-items-center p-10">
                    
                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                    
                    <div class="m-l-10">
                    <h5 class="m-b-0"><? echo $data3->name; ?></h5> 
                    <span class="mail-desc">Received Your Express Interest</span> 
                    </div>
                    </div>
                    </a>
                    <!-- Message -->
                    </div>
                </li>
        <?php } } } } ?> 
        
        
        
        
        
        
        
        
                <?
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=0;
        $sql1 = "select * from tblphonerequestmaster where touserid='$curruserid' AND currentstatus='$id' AND notstatus='$id' limit 1";
        $result1 = $db1->query($sql1);
        
        if($result1){
        while($data1 = $result1->fetch_object()){
            $view = $data1->fromuserid;
            
            
            
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from tbldatingusermaster where userid='$view'";
        $result3 = $db3->query($sql3);
        
        if($result3){
        while($data3 = $result3->fetch_object()){
            
            
            
        ?> 
        <li>
                    <div class="">                   
                    <!-- Message -->
                    <a href="https://www.paroshi.com/notification.php?id=4" class="link border-top">
                    <div class="d-flex no-block align-items-center p-10">
                    
                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                    
                    <div class="m-l-10">
                    <h5 class="m-b-0"><? echo $data3->name; ?></h5> 
                    <span class="mail-desc">Recently Viewed Your Contact</span> 
                    </div>
                    </div>
                    </a>
                    <!-- Message -->
                    </div>
                </li>
        <?php } } } } ?> 
        
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                           
        <? 
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster where userid='$curruserid'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
            
        ?>
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <? if($data->imagenm == NULL){?>
                <img src="assets1/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                <? } else { ?>
                <img src="uploadfiles/<? echo $data->imagenm; ?>" alt="user" width="61">
                <? } ?> 
                </a>
        <? } ?>     
                         
                         
                         

                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                               
                                <?  if ($Update_profile_Pages_design_setting == "D") { ?>
                                <a class="dropdown-item" href="<?= $sitepath ?>updateprofilepersonal.php"><i class="ti-user m-r-5 m-l-5"></i> Update Profile</a>
                                <? } ?>
                                
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> Find Partner </a>
                                <a class="dropdown-item" href="<?= $sitepath ?>notify.php"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= $sitepath ?>privacy_settings.php"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= $sitepath ?>signout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <!--
                                <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                                -->
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        
        

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?
$expresscount = getonefielddata("SELECT count(id) from tbldatingexpressintrestmaster WHERE touserid=".$curruserid); 
if($blockchat=='Y'){
	$chatonclick = '';	
} else {
	$chatonclick = 'onclick="showmessenger();"';
}
?>

<? 
$unread = getonefielddata("SELECT count(pmbid) from tbldatingpmbmaster WHERE touserid=".$curruserid." AND messagestatus=1 AND currentstatus=0");
?>
     
     
     
                    
<?
$msg_1 = getonefielddata("SELECT count(id) AS CNT FROM `tblphonerequestmaster` WHERE touserid=".$curruserid);
$msg_2 = getonefielddata("SELECT count(id) AS CNT FROM `tblphonerequestmaster` WHERE fromuserid=".$curruserid);
//$msg_3 = getonefielddata("SELECT count(historyid) AS CNT FROM `tbldatingprofilehistorymaster` WHERE touserid=".$curruserid);
//$msg_4 = getonefielddata("SELECT count(historyid) AS CNT FROM `tbldatingprofilehistorymaster` WHERE fromuserid=".$curruserid);
$genderid = getonefielddata("select genderid from tbldatingusermaster where userid =$curruserid");
if($genderid==1){
	$gendid = 2;	
} else {
	$gendid = 1;
}$genid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$curruserid);
$msg_3_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where  tbldatingprofilehistorymaster.touserid=$curruserid and  tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingprofilehistorymaster.fromuserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=".$genid."  group by touserid order by historyid DESC");
$msg_3 = mysqli_num_rows($msg_3_result);

$msg_1 = getonefielddata("SELECT count(tblphonerequestmaster.id) from tblphonerequestmaster,tbldatingusermaster WHERE tblphonerequestmaster.touserid=$curruserid AND tblphonerequestmaster.fromuserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus in (0,1) AND tblphonerequestmaster.currentstatus=0");

$msg_2 = getonefielddata("SELECT count(tblphonerequestmaster.id) from tblphonerequestmaster,tbldatingusermaster WHERE tblphonerequestmaster.fromuserid=$curruserid AND tblphonerequestmaster.touserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus in (0,1) AND tblphonerequestmaster.currentstatus=0");

//$msg_4_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where tbldatingprofilehistorymaster.fromuserid=$curruserid and tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus=0 and tbldatingprofilehistorymaster.touserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=".$genid." group by fromuserid order by historyid DESC");
$msg_4_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where tbldatingprofilehistorymaster.fromuserid=$curruserid and tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingprofilehistorymaster.touserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=$genid group by touserid order by historyid");
$msg_4 = mysqli_num_rows($msg_4_result);


?>

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= $sitepath ?>dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= $sitepath ?>matches.php" aria-expanded="false"><i class="mdi mdi-account-convert"></i><span class="hide-menu">All Matches</span></a></li>
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= $sitepath ?>club.php" aria-expanded="false"><i class="fas fa-globe"></i><span class="hide-menu">My Club </span></a></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= $sitepath ?>packagemanager.php" aria-expanded="false"><i class="fas fa-cubes"></i><span class="hide-menu">My Packages</span></a></li>
                        
                        
                        <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-user"></i><span class="hide-menu"> My Profile</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                
                                <? 
                                $curruserid_status = getonefielddata("select currentstatus from  tbldatingusermaster where userid='".$curruserid."' "); 
                                ?>
                                
                                <? if($curruserid_status==0){?>
                                <li class="sidebar-item"><a href="<?= $ownprofilelink ?>" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> View Profile </span></a></li>
                                <? } ?>
                                
                                <?
                                if ($Update_profile_Pages_design_setting == "D") {    
                                ?>
                                <li class="sidebar-item"><a href="<?= $sitepath ?>updateprofilepersonal.php" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Update Profile </span></a></li>
                                <? } ?>
                                
                                <?
                                if ($Update_profile_Pages_design_setting == "S") {    
                                ?>
                                <li class="sidebar-item"><a href="<?= $sitepath ?>registration2.php" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Update Profile </span></a></li>
                                <? } ?>
                                
                                <li class="sidebar-item"><a href="<?= $sitepath ?>updateprofilepicture2.php" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Profile Picture </span></a></li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= $sitepath ?>notify.php" aria-expanded="false"><i class="far fa-envelope"></i><span class="hide-menu">My Inbox</span></a></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="https://www.paroshi.com/advancesearch.php" aria-expanded="false"><i class="fas fa-search"></i><span class="hide-menu">Search </span></a></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="https://www.paroshi.com/profileweek.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile of the week </span></a></li>
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="https://www.paroshi.com/consultant.php" aria-expanded="false"><i class="mdi mdi-account-switch"></i><span class="hide-menu">Consultant</span></a></li>
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="https://www.paroshi.com/packagemanager.php" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Membership </span></a></li>
                        
                        <!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="album.php?b=<?= $curruserid?>" aria-expanded="false"><i class="far fa-images"></i><span class="hide-menu"> Galary </span></a></li>-->
                        
                        <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-question-circle"></i><span class="hide-menu"> Help</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="https://www.paroshi.com/faq.php" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Faq's  </span></a></li>
                            <li class="sidebar-item"><a href="https://www.paroshi.com/contactus.php" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu">  Contact Us </span></a></li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= $sitepath ?>privacy_settings.php" aria-expanded="false"><i class="fas fa-cog"></i><span class="hide-menu">Settings</span></a></li>
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= $sitepath ?>signout.php" aria-expanded="false"><i style="margin:0px;" class="fa fa-power-off m-r-5 m-l-5"></i><span class="hide-menu"> Log-out</span></a></li>
                    
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"> Profile</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
        <? 
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        
        $useridmain = $_GET['b'];
        $sql = "select * from tbldatingusermaster where userid='$useridmain'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
            
        ?>
<div class="container-fluid">
<div class="borderpack">
<div style="background:#6c757d !important" class="d-flex align-items-center p-3 my-3 text-white-50
 rounded shadow-sm">
    
<? if($print_profile=='Y'){?>
<a href="https://www.paroshi.com/displayprofile_print_detail.php?b=<? echo $_GET['b']; ?>" target="_blank">
<i style="font-size: 20px;
    margin: 0px 10px;
    color: #29ffb2;" class=" mdi mdi-arrow-down-bold-circle-outline"></i>
</a>    
<? } ?>  
 
 <? if($curruserid==$userid){?>  
 <a href="https://www.paroshi.com/updateprofilepersonal.php">
<i style="font-size: 20px;
    margin: 0px 10px;
    color: #29ffb2;" class="mdi mdi-account-settings-variant"></i>
</a>    
<? } ?>
    
    <h5 style="width: 357px;
    background: #ffffff;
    padding: 5px;
    color: black !important;
    border-radius: 3px;
    padding-left: 15px;" class="mb-0 text-white lh-100"><? echo "Profile-ID : ".$data->profile_code; ?></h5>
    
        <div class="lh-100">
            <?
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbldatingusermaster where userid='$curruserid'";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){
            $pack = $data1->packageid;
            if($pack > 28)
            {
                $h5 = "";
                $h5e = "";
                if($pack == 64){
                    $h5 = "<b style='font-size: 22px;
    position: relative;
    left: 10px;
    font-weight: 900;'>";
                    $h5e = "</b>";
                }
            ?>
          <h6 style="margin-left: 20px;" class="mb-0 text-white lh-100"><? echo "Full Name : ".$h5.$data->name.$h5e; ?></h6>
          <? } else { ?>
        <?  
        $myvalue = $data->name;
        $arr = explode(' ',trim($myvalue));
        ?>
          <h6 style="margin-left: 20px;" class="mb-0 text-white lh-100"><? echo "Sort Name : ".$arr[0].' <i class="fas fa-lock" data-toggle="tooltip" data-placement="right" title="Full Name is Avaiable For Prenium Members">
</i>'; ?></h6>
          <? } } ?>
        </div>
</div>


<div class="back">    
<div class="container">
    <div class="row">
    <div class="col-sm-3">

    <? 
    $imagenm = $data->imagenm;
    if($imagenm != NULL)
    {
    ?>
    <img style="width:92%;margin-top: 33px;" src="<?= $sitepath ?>uploadfiles/<? echo $data->imagenm; ?>" border="0">
    <? } else { ?>
    
    <img style="width:92%;" src="https://cdn.wccftech.com/images/default_avatar.png" alt="user">
    
    <? } ?>
    </div>

		
		
    <div class="col-sm-4">
      <p style="font-family: acme;">
          <? echo $data->profileheadline; ?>
      </p>

		
    </div>
    
    
    <?

global $searchgriddisplayprofilelink,$searchgridemaillink,$searchgridrequestsendwink,$searchgridaddtofavoritelink,$searchgridaddtochatlink,$chatrimgalt,$searchgridrequestphonelink,$searchgridrequestaddtomessanger,$searchgridimagerequest,$searchgridrequest_send_intrest_emails,$PhoneRequestDisplay_design_setting,$enable_astrological_module,$session_name_initital,$abspath,$default_searchgrid_design_viewhoroscope,$enable_chat,$sitethemefolder,$enable_parichay,$searchgridalbumlink,$displaysendexpressinterst,$notifyexpressintrest,$displaysendalbumrequest;
?>


<?		
if($curruserid!='')
{
$pkgprice = getonefielddata("SELECT tbldatingpackagemaster.price from tbldatingpackagemaster,tbldatingusermaster WHERE tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND datediff(tbldatingusermaster.expiredate,curdate())>0 AND userid=".$curruserid);

}
else
{
	$pkgprice =  0;
}
?>






    
    <div class="col-sm-4">
  
  
        
<div class="alert alert-warning"  id="notify_warning"  role="alert">
  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
   <span id="notify_warning_txt"> </span></strong>
</div>

<div class="alert alert-success"  id="notify_sucess"  role="alert">
<i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
<span id="notify_sucess_txt"> </span></strong>
</div>

<div class="alert alert-danger"  id="notify_danger">
 <i class="fa fa-close" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
 <span id="notify_danger_txt"> </span></strong>
 </div>


<div class="alert alert-info"  id="notify_info" >
  <i class="fa fa-life-ring" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
   <span id="notify_info_txt"> </span></strong>
</div>

    <?
    $chk_exp=getonefielddata("select status from tbldatingpmbmaster where FromUserId='".$curruserid."' 
            and ToUserId='".$userid."' and type='1' and CurrentStatus=0 order by PmbId desc limit 1 ");
    ?>
    <? if($chk_exp=='Y'){ ?>
    <a href="javascript:void(0);" onclick="notify_send(1,'<?=$userid?>');">
    <button type="button" class="btn btn-green btn-lg btn-block"><i class="far fa-heart"></i> Send Express Interest</button>
    </a>
    <? }  elseif($chk_exp=='D'){ ?>
    
    <a href="javascript:void(0);" onclick="notify_send(1,'<?=$userid?>');">
    <button type="button" class="btn btn-green btn-lg btn-block"><i class="far fa-heart"></i> Send Express Interest</button>

    <? } elseif($chk_exp=='W'){ ?>
    
    <a href="javascript:void(0);" onclick="notify_send(1,'<?=$userid?>');">
    <button type="button" class="btn btn-green btn-lg btn-block"><i class="far fa-heart"></i> Send Express Interest</button>

    <? }else{ ?>
    
    <a href="javascript:void(0);" onclick="notify_send(1,'<?=$userid?>');">
    <button type="button" class="btn btn-green btn-lg btn-block"><i class="far fa-heart"></i> Send Express Interest</button>

    <? } ?>
    

<div class="UpgradePopupAll modal fade" id="myModal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog animated">    
      <!-- Modal content-->
      <div class="modal-content">
      <button type="button" class="close" id="close_contact_popup" data-dismiss="modal">&times;</button>           
          <div class="modal-body" id="show_contact_info" style="display:none">                 
          </div>      
      </div>
  </div>
</div>
<button onclick="send_contactreq('<?= $userid ?>');" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-orange btn-lg btn-block"><i class="fas fa-list-ul"></i> Contact Details</button>
    
<script>
function send_contactreq(id)
{
			$.ajax({
			type: "GET",
			url: "<?=$sitepath?>phonerequest.php",
			data:'b='+id,
			success: function(data)
			{
				 	$("#show_contact_info").show(); 
					$("#show_contact_info").html(data); 
			}
			});

}
</script>
    
    
    

                    <?
                    $chk_album_req=getonefielddata("select image_password_protect from tbldatingusermaster 
					 where userid='".$userid."' ");
					 
					 if($chk_album_req=='Y')
					 { 
					 	$chk_alb='';

					  $chk_alb = getonefielddata("select status from  tbldatingpmbmaster where 
	FromUserId='".$curruserid."' and ToUserId='".$userid."' and CurrentStatus=0 and type=4 order by PmbId desc limit 1 ");
					 ?>	
						
						<? if($chk_alb=='Y')
						{
					 	?>
					 	
    <a href="<?= $sitepath ?>albums/<?= $userid ?>">
    <button type="button" class="btn btn-gray btn-lg btn-block"><i class="far fa-file-image"></i> Album</button>
    </a>
    <? }else{?>
    
    <a href="javascript:void(0);" onclick="notify_send(4,'<?= $userid ?>')">
    <button type="button" class="btn btn-gray btn-lg btn-block"><i class="far fa-file-image"></i> Album</button>
    </a>
    <? } ?>
    <? }else{ ?>
    <a href="album.php?b=<?= $userid ?>">
    <button type="button" class="btn btn-gray btn-lg btn-block"><i class="far fa-file-image"></i> Album</button>
    </a>
    <? } ?>
    
    
    <? if($curruserid!=$userid){?>
<!--    <a href="javascript:void(0);" onclick="notify_send(2,'<?=$userid?>')">-->
<!--    <button type="button" id="button-open" class="btn btn-whiteblue btn-lg btn-block"><i class="fas fa-envelope"></i> Message</button>-->
<!--    </a>-->
<!--    <script>         -->
<!--    $('#button-open').click(function(){-->
<!--        meChat_Open();-->
<!--    });-->
<!--</script>-->
    <? } ?>
    
    
    
    <? $chk_ShortlistId = getonefielddata("select count(ShortlistId) from tbldatingshortlistmaster where 
	UserId='".$userid."' and CreateBy='".$curruserid."' and CurrentStatus=0 and list_status='Y' limit 1 ");	 ?>
	<? if($chk_ShortlistId>0){ ?>
	
    <a href="javascript:void(0);" onclick="notify_send(5,'<?=$userid?>');">
    <button type="button" class="btn btn-blue btn-lg btn-block"><i class="far fa-star"></i> Favourite</button></a>
    <? }else{ ?>
        <a onclick="notify_send(5,'<?=$userid?>');" href="javascript:void(0);">
    <button type="button" class="btn btn-blue btn-lg btn-block"><i class="far fa-star"></i> Add To Favourite</button></a>
    <? } ?>
    
    
    
<script language="JavaScript">
function popup_window(url)
{

  window.open(url,'newwin','toolbar=no,location=no,directories=no,status=no,menubar=no,width=500,height=500,scrollbars=yes');
}
</script>



    
    
     <script>
                
                    function show_demo_messanger()
                    { 
                        
                        if(document.getElementById("demo_messanger").className=='MessangerUser_bt'
                        && document.getElementById("notify_message_data").style.display!='none')
                        {
                            
                        }
                        else if(document.getElementById("demo_messanger").className=='MessangerUser_bt mess_popup_animate'
                        && document.getElementById("notify_message_data").style.display!='none')
                        {
                            $("#demo_messanger").hide();
                            $("#demo_messanger").removeClass("mess_popup_animate");
                        }
                        else if(document.getElementById("demo_messanger").className=='MessangerUser_bt')
                        {
                            $("#demo_messanger").show();
                            $("#demo_messanger").addClass("mess_popup_animate");
                        }
                        else if(document.getElementById("demo_messanger").className=='MessangerUser_bt mess_popup_animate')
                        {
                            $("#demo_messanger").removeClass("mess_popup_animate");
                        }
                        $("#notify_message_data").hide();
                        
                    }
                
                    
                    function auto_refresh()
                        {
                                    var pmbid=$("#last_PmbId").val();
                                    var touserid=$("#to_PmbId").val();
                                    
                                    $.ajax({
                                    type: "POST",
                                    url: "<?=$sitepath?>check_messanger_data.php",
                                    data:'touserid='+touserid+'&pmbid='+pmbid,
                                    success: function(data)
                                    {
                                        var find_data = data.split("LASTPMB_");
                                        var pmb_data=find_data[0].trim();
                                        var res_data = find_data[1].replace("LASTPMB_", "");
                                        $("#get_new_msg").append(res_data);
                                        $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                                        $("#last_PmbId").val(pmb_data);
                                        
                                    }
                                    
                                    });
                        }
                    
                    
                         function closeNav() 
                         {
                             $("#notify_message_data").hide();
                         }
                         function close_chat()
                         {
                             $("#notify_message_data").hide();
                         }
                         
                        
                        function close_ecard()
                        {
                            $("#notify_ecard_panel").hide();	
                        }
                        
        function notify_send(type,touserid)
        {
                $.ajax({
                type: "POST",
                url: "<?=$sitepath?>notify_send.php",
                data:'touserid='+touserid+'&type='+type,
                success: function(data)
                {
                    
                    if(type==1 || type==5 || type==4)
                    {
                        var find_fail = data.search("fail_");
                        if(find_fail>0)
                        {
                            
                            var d = document.getElementById("notify_warning");
                            d.className += " otherclass";
                            
                            
                            var fail_msg = data.split("fail_");
                            error_notify_add('notify_warning',fail_msg[1],'','');
                            error_notify_remove('notify_warning',5000);
                        }
                        var find_suc = data.search("sucess_");
                        if(find_suc>0)
                        {
                            var d = document.getElementById("notify_sucess");
                            d.className += " otherclass";
                            var suc_msg = data.split("sucess_");
                            error_notify_add('notify_sucess',suc_msg[1],'','');
                            error_notify_remove('notify_sucess',5000);
                        }
                        
                    }
                    
                    if(type==2)
                    {
                        var find_fail = data.search("fail_");
                        if(find_fail>0)
                        {
                            var d = document.getElementById("notify_warning");
                            d.className += " otherclass";
                            
                            var fail_msg = data.split("fail_");
                            error_notify_add('notify_warning',fail_msg[1],'','');
                            error_notify_remove('notify_warning',5000);
                        }
						else
                        {
                        
						var messanger_clsnm=document.getElementById("demo_messanger").className;
                        $("#demo_messanger").show();
                        $("#notify_message_data").show();
                        $("#notify_message_data").html(data);
                        $("#notify_chat_loader").show();
                        $("#notify_chat_loader").html('<i class="fa fa-circle-o faa-burst animated " style="font-size:50px"></i>');
                        
                        setTimeout(function(){ 
                        $("#notify_chat_loader").hide();
                        $("#get_new_msg").show();
                        $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                        }, 3000);
						
						}
						
                    }
                    if(type==3)
                    {
                        $("#notify_ecard_panel").toggle();
                        $("#notify_ecard_panel").html(data);
                    }
                        if(type==13 || type==14)
                        {
                            var find_fail = data.search("fail_");
                            if(find_fail>0)
                            {
                               var d = document.getElementById("notify_warning");
                               d.className += " otherclass";
                                
                                var fail_msg = data.split("fail_");
                                error_notify_add('notify_warning',fail_msg[1],'','');
                                error_notify_remove('notify_warning',5000);
                            }
                            var find_suc = data.search("sucess_");
                            if(find_suc>0)
                            {
                                var d = document.getElementById("notify_warning");
                                d.className += " otherclass";
                                
                                var suc_msg = data.split("sucess_");
                                error_notify_add('notify_info',suc_msg[1],'','');
                                error_notify_remove('notify_info',5000);
                            }
                        }
                }
                });	
        }
        
        
        
        
                function send_message1(touserid,type,imageid)
                {
                    if(type==2)
                    {
                        var mess=$("#message_txt").val();
                    }
                    if(type==3)
                    {
                        $('#notify_ecard'+imageid).addClass('active');
                    }
                    if(mess=='' && type==2)
                    {
                        $("#message_txt_error").show();
                        $("#message_txt_error").html('please enter message');
                        setTimeout(function(){
                            $("#message_txt_error").hide(); 
                         }, 4000);
                        return false;
                    }else{ 
                            $.ajax({
                            type: "POST",
                            url: "<?=$sitepath?>notify_send_message.php",
                            data:'touserid='+touserid+'&mess='+mess+'&imageid='+imageid+'&type='+type,
                            success: function(data)
                            {	
                                if(type==2){
                                    $("#message_txt").val('');
                                }
                                
                                    var find_fail = data.search("membuy_");
                                    if(find_fail>0)
                                    {
                                        document.getElementById('notify_membersip_id').click();
                                        var fail_msg = data.split("membuy_");
                                        $("#notify_membersip_txt").show();
                                        $("#notify_membersip_txt").html(fail_msg[1]);	
                                        if(type==3)
                                        {
                                            $('#notify_ecard'+imageid).removeClass('active');
                                        }
                                    }
                                    else
                                    {
                                        if(type==3)
                                        {
                                            
                                            $("#get_new_msg").append('<li class="right-chatA notify_li" id="notify_loader_id'+imageid+'"><div class="notify_loader"></div></li>');
                                            $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                                            
                                            setTimeout(function() {
                                            $('#notify_ecard'+imageid).removeClass('active');
                                            $("#notify_loader_id"+imageid).remove();
                                            $("#get_new_msg").append(data);
                                            $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                                            }, 3000);
                                            
                                            
                                        }
                                        else if(type==2)
                                        {
                                            $("#get_new_msg").append(data);
                                            $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                                        }
                                    }
                            }
                            });
                        }
                    return false;
                }
        
        </script>
            <!----------------------------	Notify script end -------------------------->
            
            
            
            
	<!--------------------------------- new error msg start --------------------------------->    


<script>
function error_notify_add(divid,msg,focusid,focuscolor)
{
	if(focusid!='')
	{
		$('#'+focusid).addClass(focuscolor);
	}
	if(focuscolor!='')
	{
		document.getElementById(focusid).focus();
	}
	
	
	$('#'+divid).addClass('alertPozition');
	$('#'+divid+'_txt').html(msg);
	
	setTimeout(function() {
    			$('#'+focusid).removeClass(focuscolor);
		}, 5000);
		
}

function error_notify_remove(divid,seconds)
{
		setTimeout(function() {
    	$("#"+divid).removeClass('alertPozition');
		}, seconds);	
	
}

</script>


    </div>
    </div>
</div>
</div>
</div>

<br><br>
<div class="container">
    <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#personal" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Personal</span></a> </li>
                                
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lifestyle" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">LifeStyle</span></a> </li>
                                
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#religion" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Religion</span></a> </li>
                                
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#education" role="tab" aria-selected="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Education</span></a> </li>
                                                                
                                                                
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#interests" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Interests</span></a> </li>
                                
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#partner" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Partner Pref</span></a> </li>
                                
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#details" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Family Details</span></a> </li>
                                
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#other" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Other</span></a> </li>
                                                                
                            </ul>
                            
                            
                            
                            
                            
                            
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                
                                
        <?
        $id = $_GET['b'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
                                
                                ?>
        <div class="tab-pane" id="personal" role="tabpanel">
            <div class="p-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
       
        <?
        $profileby = $data->profilecreatebyid;
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbldatingprofilecreatedbymaster where id='$profileby'";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){
                                
        ?>                             
                                     
            <b>Profile created by </b>: <span><? echo $data1->title; ?></span><br><br>
        <? } ?>
                                
                                 
        <?
        $maritalstatusid = $data->maritalstatusid;
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbldatingmaritalstatusmaster where id='$maritalstatusid'";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){
                                
        ?>                          
            <b>Marital status </b>: <span><? echo $data2->title; ?></span><br><br>
        <? } ?>                         
                                 
                                 
        <?
        $weightid = $data->weightid;
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from tbldatingweightmaster where id='$weightid'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
                                
        ?>                          
                <b>Weight </b>: <span><? echo $data3->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $bodytypeid = $data->bodytypeid;
        $db4 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql4 = "select * from tbldatingbodymaster where id='$bodytypeid'";
        $result4 = $db4->query($sql4);
        
        while($data4 = $result4->fetch_object()){
                                
        ?>                          
               <b>Body type </b>: <span><? echo $data4->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $blood_group = $data->blood_group;
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbldating_blood_group_master where id='$blood_group'";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){
                                
        ?>                         
                <b>Blood group </b>: <span><? echo $data5->title; ?></span><br><br>
        <? } ?>
                                </div>
                                                
                                 <div class="col-sm-6">
            
        <?
        $lookingforid = $data->lookingforid;
        $db6 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql6 = "select * from tbldatinglookingformaster where id='$lookingforid'";
        $result6 = $db6->query($sql6);
        
        while($data6 = $result6->fetch_object()){
                                
        ?>
            <b>Looking for </b>: <span><? echo $data6->title; ?></span><br><br>
                                 
        <? } ?>
                                 
        
        <?
        $heightid = $data->heightid;
        $db7 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql7 = "select * from  tbldatingheightmaster where id='$heightid'";
        $result7 = $db7->query($sql7);
        
        while($data7 = $result7->fetch_object()){
                                
        ?>                        
            <b>Height </b>: <span><? echo $data7->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $eyecolorid = $data->eyecolorid;
        $db8 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql8 = "select * from  tbldatingeyemaster where id='$eyecolorid'";
        $result8 = $db8->query($sql8);
        
        while($data8 = $result8->fetch_object()){
                                
        ?>                         
            <b>Eye color </b>: <span><? echo $data8->title; ?></span><br><br>
        <? } ?>
        
        <?
        $complexionid = $data->complexionid;
        $db9 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql9 = "select * from  tbldatingcomplexionmaster where id='$complexionid'";
        $result9 = $db9->query($sql9);
        
        while($data9 = $result9->fetch_object()){
                                
        ?> 
            <b>Complexion </b>: <span><? echo $data9->title; ?></span><br><br>
        <? } ?>
        
        </div>
        </div>
        </div>
        </div>
        </div>
        <? } ?>
                                
                                
                                
      
      
      
                                
                                
        <?
        $id = $_GET['b'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
                                
                                ?>
        <div class="tab-pane" id="lifestyle" role="tabpanel">
            <div class="p-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
       
       
                <? if ($dietid != "") { ?>
                <b><?= str_replace(":","",$displayprofilediet) ?></b>
                <span>: <?=$dietid?> </span><br><br>
				<? } ?>
				
                
               
                <? if ($smokerstatusid != "") { ?>
                <b><?= str_replace(":","",$displayprofilesmokerstatus) ?></b>
                <span>: <?=$smokerstatusid?> </span><br><br>
				<? } ?>
				
               
               
               <? if ($drinkerstatusid != "") { ?>
                <b><?= str_replace(":","",$displayprofiledrinkerstatus) ?></b>
                <span>: <?=$drinkerstatusid?> </span><br><br>
				<? } ?>
				
                
                
                <? if ($personalvalueid != "") { ?>
                <b><?= str_replace(":","",$displayprofilepersonalvalue) ?></b>
                <span>: <?=$personalvalueid?> </span><br><br>
            	<? } ?>
			
    
                
                <? if ($wantchildrenid != "") { ?>
                <b><?= str_replace(":","",$displayprofilewantchildren) ?></b>
                <span>: <?=$wantchildrenid?> </span><br><br>
				<? } ?>
				
                
  			 	
                <? if ($language != "") { 
				
				   $Array_chklangmultiple=array();
					
					$chklangmultiple = getonefielddata("select languageid from tbldatinguserlanguagemaster where userid='".$dispayuserid."' ");
					
					$chklangmultiple_ids=explode(",",$chklangmultiple);
					
					$languages = getdata("select id,title from tbldatinglanguagemaster where currentstatus=0 and languageid =$sitelanguageid order by title ");
					while($languages_rs= mysqli_fetch_array($languages))
					{ 
					   if(in_array($languages_rs[0],$chklangmultiple_ids))
					        { 
							   array_push($Array_chklangmultiple,$languages_rs[1]); 
							      
								  }
					}
	
				?>
                <b><?= str_replace(":","",$displayprofilelanguagecanspeak) ?></b>
                 <? if($chklangmultiple!=''){ 
                            $lng='';
                            if(count($Array_chklangmultiple)>0){
                            for ($xi= 0; $xi< count($Array_chklangmultiple); $xi++) {?>
                            <? $lng.=$Array_chklangmultiple[$xi].", "; ?>
                            <? }} ?>
                            <span>:<?=substr($lng,0,-2)?></span><br><br>
                       <? } ?>
				<? } ?>
				

        </div>
        <div class="col-sm-6">
        <!---->
        <!---->
        <!---->
        <!---->
        </div>
        </div>
        </div>
        </div>
        </div>
        <? } ?>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
        <?
        $id = $_GET['b'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
                                
        ?>
        <div class="tab-pane" id="religion" role="tabpanel">
            <div class="p-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
       
        <?
        $religion_interest = $data->religion_interest;
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbldating_religiousness_master where id='$religion_interest'";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){
                                
        ?>                             
                                     
            <b>Religion Interest </b>: <span><? echo $data1->title; ?></span><br><br>
        <? } ?>
         
 
        <? if ($revert != "") { ?>
        <b><?= str_replace(":","",$displayprofileborn) ?></b>
        <span>: <?=$revert?> </span><br><br>
		<? } ?>
         
                                 
                                 
        <?
        $quran_id = $data->quran_id;
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from tbldatingquranmaster where id='$quran_id'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
                                
        ?>                          
                <b>Read Quran </b>: <span><? echo $data3->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $castid = $data->castid;
        $db4 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql4 = "select * from tbldatingcastmaster where id='$castid'";
        $result4 = $db4->query($sql4);
        
        while($data4 = $result4->fetch_object()){
                                
        ?>                          
               <b>Social Community </b>: <span><? echo $data4->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $familytypeid = $data->familytypeid;
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbldatingfamilyvaluemaster where id='$familytypeid'";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){
                                
        ?>                         
                <b>Family Type </b>: <span><? echo $data5->title; ?></span><br><br>
        <? } ?>
        
        
        
        
        
        <?
        $dob = $data->dob;
        ?>                          
        <b>Birth Date </b>: <span><? echo $dob; ?></span><br><br>

                                 
                                 
                                 
        <?
        $genderid = $data->genderid;
        if($genderid == '2'){
        $hijab_id = $data->hijab_id;
        $db4 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql4 = "select * from tbldating_hijab_wear_master where id='$hijab_id'";
        $result4 = $db4->query($sql4);
        
        while($data4 = $result4->fetch_object()){
                                
        ?>                          
               <b>Wears a Hijab ? </b>: <span><? echo $data4->title; ?></span><br><br>
        <? } } ?>
                                 
                                 
                                 
        <?
        $salah_perform_id = $data->salah_perform_id;
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbldating_salah_perform_master where id='$salah_perform_id'";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){
                                
        ?>                         
                <b>How often perform Salaah ? </b>: <span><? echo $data5->title; ?></span><br><br>
        <? } ?>
        
        
                                </div>
                                                
                                 <div class="col-sm-6">
            
        <?
        $religianid = $data->religianid;
        $db6 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql6 = "select * from tbldatingreligianmaster where id='$religianid'";
        $result6 = $db6->query($sql6);
        
        while($data6 = $result6->fetch_object()){
                                
        ?>
            <b>Religion </b>: <? echo $data6->title; ?><br><br>
                                 
        <? } ?>
                                 
        
        <?
        $fasting_id = $data->fasting_id;
        $db7 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql7 = "select * from  tbldatingfastingmaster where id='$fasting_id'";
        $result7 = $db7->query($sql7);
        
        while($data7 = $result7->fetch_object()){
                                
        ?>                        
            <b>Fasting </b>: <span><? echo $data7->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $castid = $data->castid;
        $db8 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql8 = "select * from tbldatingcastmaster where id='$castid'";
        $result8 = $db8->query($sql8);
        
        while($data8 = $result8->fetch_object()){
                                
        ?>                         
            <b>Caste </b>: <span><? echo $data8->title; ?></span><br><br>
        <? } ?>
        
        <?
        $familyvalueid = $data->familyvalueid;
        $db9 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql9 = "select * from tbldatingfamilyvaluemaster where id='$familyvalueid'";
        $result9 = $db9->query($sql9);
        
        while($data9 = $result9->fetch_object()){
                                
        ?> 
            <b>Family value </b>: <span><? echo $data9->title; ?></span><br><br>
        <? } ?>
        
        
        
        
        
        <?
        $familystatusid = $data->familystatusid;
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from tbldatingfamilyvaluemaster where id='$familystatusid'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
                                
        ?>                          
            <b>Family Status </b>: <span><? echo $data3->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $religiosness_id = $data->religiosness_id;
        $db4 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql4 = "select * from tbldating_religiousness_master where id='$religiosness_id'";
        $result4 = $db4->query($sql4);
        
        while($data4 = $result4->fetch_object()){
                                
        ?>                          
               <b>Religiousness </b>: <span><? echo $data4->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $halal_strict_id = $data->halal_strict_id;
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbldating_halal_strict_master where id='$halal_strict_id'";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){
                                
        ?>                         
            <b>How strict about Halaal ? </b>: <span><? echo $data5->title; ?></span><br><br>
        <? } ?>
        
        
        
        <?
        $islamic_education = $data->islamic_education;
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbl_islamiceducation_master where id='$islamic_education'";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){
                                
        ?>                         
            <b>Islamic Education </b>: <span><? echo $data5->title; ?></span><br><br>
        <? } ?>
        
        </div>
        </div>
        </div>
        </div>
        </div>
        <? } ?>
                                
                                
                                
                                
                                
     
     
     
                                
         
        <?
        $id = $_GET['b'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
                                
        ?>
        <div class="tab-pane p-20 active show" id="education" role="tabpanel">
            <div class="p-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
       
        <?
        $educationid = $data->educationid;
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbl_education_master where id='$educationid'";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){
            
            
        $edu_pg_id = $data->edu_pg_id;
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbl_education_category_master where id='$edu_pg_id'";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){
                                
        ?>                             
                                     
            <b>Education </b>: <span><? echo $data1->title." ( ".$data2->title." )"; ?></span><br><br>
        <? } } ?>
                                
        
        
        <? if ($occ_status != "") { ?>
        <b><?= str_replace(":","",$default_displayprofile_occupationstatus) ?></b>
        <span>: <?=$occ_status?>
        </span><br><br>
		<? } ?>
                                
                                 
        <?
        $edu_pg_id = $data->edu_pg_id;
        $db4 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql4 = "select * from tbldating_education_pg_master where id='$edu_pg_id'";
        $result4 = $db4->query($sql4);
        
        while($data4 = $result4->fetch_object()){
                                
        ?>                          
               <b>Post Graduate </b>: <span><? echo $data4->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $work_function_id = $data->work_function_id;
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbl_dating_work_function_area_master where id='$work_function_id'";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){
                                
        ?>                         
                <b>Functional Area </b>: <span><? echo $data5->title; ?></span><br><br>
        <? } ?>
        
        
              
                                 
                                 
        <?
        $annual_income_currancyid = $data->annual_income_currancyid;
        $annual_income_id = $data->annual_income_id;
        
        $db4 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql4 = "select * from tbldating_annual_income_master where id='$annual_income_id'";
        $result4 = $db4->query($sql4);
        
        while($data4 = $result4->fetch_object()){
            
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbldating_annual_income_currancy_master where id='$annual_income_currancyid'";
        $result5 = $db4->query($sql5);
        
        while($data5 = $result5->fetch_object()){
                                
        ?>                          
               <b>Annual income </b>: <span><? echo $data5->title." ".$data4->title; ?></span><br><br>
        <? } } ?>
                                 
                                 
        
        
                                </div>
                                                
                                 <div class="col-sm-6">
            

                                

        
        <?
        $ocupationid = $data->ocupationid;
        $db9 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql9 = "select * from tbldatingoccupationmaster where id='$ocupationid'";
        $result9 = $db9->query($sql9);
        
        while($data9 = $result9->fetch_object()){
                                
        ?> 
            <b>Occupation </b>: <span><? echo $data9->title; ?></span><br><br>
        <? } ?>
        
        
        
        
        
                <?
        $work_in_country = $data->work_in_country;
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from tbldatingcountrymaster where id='$work_in_country'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
                                
        ?>                          
                <b>Work In </b>: <span><? echo $data3->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $industry_id = $data->industry_id;
        $db4 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql4 = "select * from tbl_dating_industry_master where id='$industry_id'";
        $result4 = $db4->query($sql4);
        
        while($data4 = $result4->fetch_object()){
                                
        ?>                          
               <b>Industry </b>: <span><? echo $data4->title; ?></span><br><br>
        <? } ?>
                                 
                                 
                                 
        <?
        $instituteid = $data->instituteid;
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbl_dating_institute_master where id='$instituteid'";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){
                                
        ?>                         
                <b>Institute </b>: <span><? echo $data5->title; ?></span><br><br>
        <? } ?>
        
        
        
        <?
        $working_partner = $data->working_partner;
        if($working_partner != NULL){
        ?>                         
                <b>Prefer a Working Partner </b>: <span><? echo $working_partner; ?></span><br><br>
        <? } ?>
        
        
        
        
        
        
        
        
                                 </div>
                                </div>
                                </div>
                                </div>
                                </div>
        <? } ?>
         
                                
                                
                                
                                

                                
                                
        <?
        $id = $_GET['b'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
                                
        ?>
        <div class="tab-pane" id="interests" role="tabpanel">
            <div class="p-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
       
        <?
        $hobbies = $data->hobbies;
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbl_hobbies_master where id='$hobbies'";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){
                                
        ?>
            <b>Hobbies </b>: <span><? echo $data1->title; ?></span><br><br>
        <? } ?>
                                
                                 
           <?
        $interest = $data->interest;
         ?>                          
         
         		<?  if($interest!="") { ?>
				<?
				$Array_interest=array();
				$interest_ids=explode(",",$interest);
				$interestqrye = getdata("select id,title from tbl_interest_master where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
				if(in_array($rsinterest[0],$interest_ids)){
				
				array_push($Array_interest,$rsinterest[1]);
				
				}
				}	
				?>
                <b><?= str_replace(":","",$displayprofile_interest) ?></b>
               <? if($interest!=''){ 
			   $arr_inter='';
                     if(count($Array_interest)>0){
                                    for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                               <?  $arr_inter.=$Array_interest[$x2].", "; ?>
                    <? }} ?>
                      <span> : <?=substr($arr_inter,0,-2)?></span><br><br>
                	<? } ?>
                <? } ?>
         
         
         
         
         
         
         
         
                                 
                                 
        <?
        $fav_cuisines = $data->fav_cuisines;
        ?>                          
        
        				<?  if($fav_cuisines!="") { ?>
                <?
					$Array_fav_cuisines=array();
					$fav_cuisines_ids=explode(",",$fav_cuisines);
					$fav_cuisines_qrye = getdata("select id,title from tbl_favourite_cuisines_master where currentstatus=0 order by title ");
					while($rsfav_cuisines= mysqli_fetch_array($fav_cuisines_qrye)){ 
					if(in_array($rsfav_cuisines[0],$fav_cuisines_ids)){
					
					array_push($Array_fav_cuisines,$rsfav_cuisines[1]);
					
					}
					}
				?>
                <b><?= str_replace(":","",$displayprofile_fav_cuisine) ?></b>
             <? if($fav_cuisines!=''){ 
			 	$arr_cuis='';
                     if(count($Array_fav_cuisines)>0){
                                    for ($x4 = 0; $x4< count($Array_fav_cuisines); $x4++) {?>
                                              <?  $arr_cuis.=$Array_fav_cuisines[$x4].", "; ?>
                    <? }} ?>
                      <span> : <?=substr($arr_cuis,0,-2)?></span><br><br>
					<? } ?>
                <? } ?>
                
                
                

                                 
                                 
                                 
        <?
        $fitness = $data->fitness;
        ?>                          
       
        	<?  if($fitness!="") { ?>
            <?
			$Array_fitness=array();
			$fitness_ids=explode(",",$fitness);
			$fitness_qrye = getdata("select id,title from tbl_fitness_master where currentstatus=0 order by title ");
			while($rsfitness= mysqli_fetch_array($fitness_qrye)){ 
			if(in_array($rsfitness[0],$fitness_ids)){
			
			array_push($Array_fitness,$rsfitness[1]);
			
			}
			}
			?>
                <b><?= str_replace(":","",$displayprofile_fitness) ?></b>
           <? if($fitness!=''){ 
		   $arr_fit='';
                     if(count($Array_fitness)>0){
                                    for ($x6= 0; $x6< count($Array_fitness); $x6++) {?>
                                              <? $arr_fit.=$Array_fitness[$x6].", "; ?>
                    <? }} ?>
                  <span> : <?=substr($arr_fit,0,-2)?></span><br><br>
					<? } ?>
                <? } ?>
                                 
                                 
        
                                </div>
                                                
                                 <div class="col-sm-6">
            
        <?
        $music = $data->music;
        ?>

        	 <?  if($music != "") { ?>
				<?
                $Array_music=array();
                $music_ids=explode(",",$music);
                $musicqrye = getdata("select id,title from tbl_music_master where currentstatus=0 order by title ");
                while($rsmusic= mysqli_fetch_array($musicqrye)){ 
                      if(in_array($rsmusic[0],$music_ids)){
                         
                          array_push($Array_music,$rsmusic[1]);
                          
                        }
                }
                ?>
                <b><?= str_replace(":","",$displayprofile_music) ?></b>
               <? if($music!=''){ 
			   	$arr_music='';
                     if(count($Array_music)>0){
                                    for ($x1 = 0; $x1< count($Array_music); $x1++) {?>
                                               <?  $arr_music.=$Array_music[$x1].", "; ?>
                    <? }} ?>
                    <span> : <?=substr($arr_music,0,-2)?></span><br><br>
                    <? } ?>
        		<? } ?>
        		
        		
        		
                                 
        
        <?
        $fav_read = $data->fav_read;
        ?>                        
           
           				<?  if($fav_read!="") { ?>
                <?
					$Array_fav_read=array();
					$fav_read_ids=explode(",",$fav_read);
					$fav_read_qrye = getdata("select id,title from tbl_favourite_read_master where currentstatus=0 order by title ");
					while($rsfav_read= mysqli_fetch_array($fav_read_qrye)){ 
					if(in_array($rsfav_read[0],$fav_read_ids)){
					
					array_push($Array_fav_read,$rsfav_read[1]);
					
					}
					}

				?>
                
                <b><?= str_replace(":","",$displayprofile_fav_read) ?></b>
              <? if($fav_read!=''){ 
			  	$arr_fav='';
                     if(count($Array_fav_read)>0){
                                    for ($x3 = 0; $x3< count($Array_fav_read); $x3++) {?>
                                               <? $arr_fav.=$Array_fav_read[$x3].", "; ?>
                    <? }} ?>
                    <span> : <?=substr($arr_fav,0,-2)?></span><br><br>
					<? } ?>
                <? } ?>
                
                
                                 
                                 
                                 
        <?
        $dress_styles = $data->dress_styles;
        ?>                         
         
         
			<?  if($dress_styles!="") { ?>
            <?
			$Array_dress_styles=array();
			$dress_styles_ids=explode(",",$dress_styles);
			$dress_styles_qrye = getdata("select id,title from tbl_favourite_dress_master where currentstatus=0 order by title ");
			while($rsdress_styles= mysqli_fetch_array($dress_styles_qrye)){ 
			if(in_array($rsdress_styles[0],$dress_styles_ids)){
			
			array_push($Array_dress_styles,$rsdress_styles[1]);
			
			}
			}
			?>
                <b><?= str_replace(":","",$displayprofile_fav_dress) ?></b>
            <? if($dress_styles!=''){ 
			$arr_style='';
                     if(count($Array_dress_styles)>0){
                                    for ($x5 = 0; $x5< count($Array_dress_styles); $x5++) {?>
                                              <? $arr_style.=$Array_dress_styles[$x5].", "; ?>
                    <? }} ?>
                              <span> : <?=substr($arr_style,0,-2)?></span><br><br>
					<? } ?>
                <? } ?>

        
        </div>
        </div>
        </div>
        </div>
        </div>
                                
        <? } ?>
        
                            
                            
                            
                            
<?
        $id = $_GET['b'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingpartnerprofilemaster where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
                                
        ?>
        <div class="tab-pane" id="partner" role="tabpanel">
            <div class="p-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
       
        <?
        $partner_genderid = $data->genderid;
        ?>  
        
        <?
        $heightfrom = $data->heightfrom;
        $heightto = $data->heightto;
        
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbldatingheightmaster where id='$heightfrom'";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){
        
        $partner_heightfrom = $data2->title;
        
        }
        
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from tbldatingheightmaster where id='$heightto'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
        
        $partner_heightto = $data3->title;
        
        }
        
        
        ?>
        
        
        <? if ($partner_heightfrom != "" && $partner_heightto != "") { ?>
        <b><?= str_replace(":","",$displayprofile_partner_heightfrom) ?></b>
        <span>: <?= $partner_heightfrom ?> To <?= $partner_heightto ?></span><br><br>
		<? } ?>


                                
          
          
                                 
        <?
        $partner_agefrom = $data->agefrom;
        $partner_ageto = $data->ageto;                        
        ?>      
         
         
        <? if ($partner_agefrom != "" && $partner_ageto != "") { ?>
        <b><?= str_replace(":","",$displayprofile_partner_agefrom) ?></b>
        <span>: <?= $partner_agefrom ?> To <?= $partner_ageto ?></span><br><br>
		<? } ?>
  
        
        
        <? if ($partner_smokeids != "" ) { ?>
        <b><?= str_replace(":","",$displayprofile_partner_smokeids) ?></b>
        <span>: <?= $partner_smokeids ?></span><br><br>
		<? } ?>
        
        
 <?
 $religianid = $data->religianid;
 $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
$sql3 = "select * from tbldatingreligianmaster where id='$religianid'";
 $result3 = $db3->query($sql3);
        
 while($data3 = $result3->fetch_object()){
        
  $partner_religianid2 = $data3->title;
        
 }
?> 

<? if ($partner_religianid2 != "" ) { ?>
    <b><?= str_replace(":","",$displayprofile_partner_religianid) ?></b>
    <span>: <?= $partner_religianid2 ?></span><br><br>
<? } ?>

        <? if ($partner_drinkids != "" ) { ?>
        <b><?= str_replace(":","",$displayprofile_partner_drinkids) ?></b>
        <span>: <?= $partner_drinkids ?></span><br><br>
		<? } ?>

                                 
<?
 $location = $data->location;
 $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
$sql3 = "select * from tbldatingcountrymaster where id='$location'";
 $result3 = $db3->query($sql3);
        
 while($data3 = $result3->fetch_object()){
  $partner_location2 = $data3->title;
?> 
            
        <? if ($partner_location2 != "" ) { ?>
       <b><?= str_replace(":","",$default_displayprofile_nativeplace) ?></b>
        <span>: <?= $partner_location2 ?></span><br><br>
		<? } ?>
		<? } ?>
                                 
                                 
                                 
				 <? if ($partner_states != "" ) { ?>
                <b><?= str_replace(":","",$default_displayprofile_nativeplacestate) ?></b>
                <span>: <?= $partner_states ?></span><br><br>
				<? } ?>
        
        
        
            <? if ($partner_ethnic != "" ) { ?>
                <b><?= str_replace(":","",$default_displayprofile_ethnicbackground) ?></b>
                <span>: <?= $partner_ethnic ?></span><br><br>
				<? } ?>
				

         <? if ($partner_subcast != "" ) { ?>
                <b><?= str_replace(":","",$default_displayprofile_subcast) ?></b>
                <span>: <?= $partner_subcast ?></span><br><br>
				<? } ?>
				
<? if ($partner_dietids != "" ) { ?>
                <b><?= str_replace(":","",$default_displayprofile_diet) ?></b>
                <span>: <?= $partner_dietids ?></span><br><br>
				<? } ?>
        
        <?
         $annincome = $data->annincome;
        ?>                          
         
         		<?  if($annincome!="") { ?>
				<?
				$Array_interest=array();
				$interest_ids=explode(",",$annincome);
				$interestqrye = getdata("select id,title from tbldating_annual_income_master where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
				if(in_array($rsinterest[0],$interest_ids)){
				
				array_push($Array_interest,$rsinterest[1]);
				
				}
				}	
				?>
                <b><?= str_replace(":","",$default_displayprofile_annualincome) ?></b>
               <? if($annincome!=''){ 
			   $arr_inter='';
                     if(count($Array_interest)>0){
                                    for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                               <?  $arr_inter.=$Array_interest[$x2].", "; ?>
                    <? } } ?>
                      <span> : <?=substr($arr_inter,0,-2)?></span><br><br>
        <? } ?>
        <? } ?>
        
        
        
                <? if ($partner_pg_education != "" ) { ?>
                <b><?= str_replace(":","",$displayprofile_partner_pg_education) ?></b>
                <span>: <?= $partner_pg_education ?></span><br><br>
				<? } ?>        
        
                <? if ($partner_industry != "" ) { ?>
                <b><?= str_replace(":","",$displayprofile_partner_industry) ?></b>
                <span>: <?= $partner_industry ?></span><br>
				<? } ?>
        
        
         		<? if ($partner_functional_area != "" ) { ?>
                <b><?= str_replace(":","",$displayprofile_partner_functional_area) ?></b>
                <span>: <?= $partner_functional_area ?></span><br><br>
				<? } ?>
        
        
        
        <? if (findsettingvalue("Religion_field_display") == "M") { ?>
				
                <? if ($partner_hijab_id != "" ) { ?>

                <b><?= str_replace(":","",$displayprofile_partner_hijab_id) ?></b>
                <span>: <?= $partner_hijab_id?></span><br><br>
				<? } ?>

                <? if ($partner_beard_id != "" ) { ?>
                <b><?= str_replace(":","",$displayprofile_partner_beard_id) ?></b>
                <span>: <?= $partner_beard_id ?></span><br><br>
				<? } ?>
				
				<? if ($partner_revert_islam_id != "" ) { ?>
                <b><?= str_replace(":","",$displayprofile_partner_revert_islam_id) ?></b>
                <span>: <?= $partner_revert_islam_id ?></span><br><br>
				<? } ?>
        <? } ?>
        
    </div>
                                                
          
          
        <div class="col-sm-6">
        <?
         $castid = $data->castid;
        ?>                          
         
         		<?  if($castid!="") { ?>
				<?
				$Array_interest=array();
				$interest_ids=explode(",",$castid);
				$interestqrye = getdata("select id,title from tbldatingcastmaster where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
				if(in_array($rsinterest[0],$interest_ids)){
				
				array_push($Array_interest,$rsinterest[1]);
				
				}
				}	
				?>
                <b><?= str_replace(":","",$displayprofile_partner_castid) ?></b>
               <? if($castid!=''){ 
			   $arr_inter='';
                     if(count($Array_interest)>0){
                                    for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                               <?  $arr_inter.=$Array_interest[$x2].", "; ?>
                    <? }} ?>
                      <span> : <?=substr($arr_inter,0,-2)?></span><br><br>
        <? } ?>
        <? } ?>




                                 
        
        <?
         $grahid = $data->grahid;
        ?>                          
         
         		<?  if($grahid!="") { ?>
				<?
				$Array_interest=array();
				$interest_ids=explode(",",$grahid);
				$interestqrye = getdata("select id,title from tbldatinggrahmaster where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
				if(in_array($rsinterest[0],$interest_ids)){
				
				array_push($Array_interest,$rsinterest[1]);
				
				}
				}	
				?>
                <b><?= str_replace(":","",$displayprofile_partner_grahid) ?></b>
               <? if($grahid!=''){ 
			   $arr_inter='';
                     if(count($Array_interest)>0){
                                    for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                               <?  $arr_inter.=$Array_interest[$x2].", "; ?>
                    <? }} ?>
                      <span> : <?=substr($arr_inter,0,-2)?></span><br><br>
        <? } ?>
        <? } ?>
        
        
        
                                 
                                 
                                 
        <?
         $education = $data->education;
        ?>                          
         
         		<?  if($education!="") { ?>
				<?
				$Array_interest=array();
				$interest_ids=explode(",",$education);
				$interestqrye = getdata("select id,title from tbl_education_master where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
				if(in_array($rsinterest[0],$interest_ids)){
				
				array_push($Array_interest,$rsinterest[1]);
				
				}
				}	
				?>
                <b><?= str_replace(":","",$displayprofile_partner_education) ?></b>
               <? if($education!=''){ 
			   $arr_inter='';
                     if(count($Array_interest)>0){
                                    for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                               <?  $arr_inter.=$Array_interest[$x2].", "; ?>
                    <? } } ?>
                      <span> : <?=substr($arr_inter,0,-2)?></span><br><br>
        <? } ?>
        <? } ?>
        
        
      
      
      
       
        
        <?
         $occupation = $data->occupation;
        ?>                          
         
         		<?  if($education!="") { ?>
				<?
				$Array_interest=array();
				$interest_ids=explode(",",$occupation);
				$interestqrye = getdata("select id,title from tbldatingoccupationmaster where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
				if(in_array($rsinterest[0],$interest_ids)){
				
				array_push($Array_interest,$rsinterest[1]);
				
				}
				}	
				?>
                <b><?= str_replace(":","",$displayprofile_partner_occupation) ?></b>
               <? if($occupation!=''){ 
			   $arr_inter='';
                     if(count($Array_interest)>0){
                                    for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                               <?  $arr_inter.=$Array_interest[$x2].", "; ?>
                    <? } } ?>
                      <span> : <?=substr($arr_inter,0,-2)?></span><br><br>
        <? } ?>
        <? } ?>
        
        
        
        
        
        
        		<? if ($partner_occupation_status != "" ) { ?>
                <b><?= str_replace(":","",$default_displayprofile_occupationstatus) ?></b>
                <span>: <?= $partner_occupation_status ?></span><br><br>
				<? } ?>
        
        
                                 
                                 
                                 
		         <? if ($partner_maritalstatus != "" ) { ?>
                <b><?= str_replace(":","",$displayprofile_partner_maritalstatus) ?></b>
                <span>: <?= $partner_maritalstatus ?></span><br><br>
				<? } ?>
                                 
                                 
                                 
				<? if ($partner_kidsids != "" ) { ?>
                <b><?= str_replace(":","",$displayprofile_partner_kidsids) ?></b>
                <span>: <?= $partner_kidsids ?></span><br><br>
				<? } ?>
				
			<? if (findsettingvalue("Religion_field_display") == "M") { ?>
        
                <? if ($partner_halal_strict_id != "" ) { ?>
                <b><?= str_replace(":","",$displayprofile_partner_halal_strict_id) ?></b>
                <span>: <?= $partner_halal_strict_id ?></span><br><br>
				<? } ?>
                
              
           
              
              
        <?
         $salah_perform_id = $data->salah_perform_id;
        ?>                          
         
         		<?  if($education!="") { ?>
				<?
				$Array_interest=array();
				$interest_ids=explode(",",$salah_perform_id);
				$interestqrye = getdata("select id,title from tbldating_salah_perform_master where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
				if(in_array($rsinterest[0],$interest_ids)){
				
				array_push($Array_interest,$rsinterest[1]);
				
				}
				}	
				?>
                <b><?= str_replace(":","",$displayprofile_partner_salah_perform_id) ?></b>
               <? if($salah_perform_id!=''){ 
			   $arr_inter='';
                     if(count($Array_interest)>0){
                                    for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                               <?  $arr_inter.=$Array_interest[$x2].", "; ?>
                    <? } } ?>
                      <span> : <?=substr($arr_inter,0,-2)?></span><br><br>
        <? } ?>
        <? } ?>

		
				
                
        <?
         $religiosness_id = $data->religiosness_id;
        ?>                          
         
         		<?  if($religiosness_id!="") { ?>
				<?
				$Array_interest=array();
				$interest_ids=explode(",",$religiosness_id);
				$interestqrye = getdata("select id,title from tbldating_religiousness_master where currentstatus=0 order by title ");
				while($rsinterest= mysqli_fetch_array($interestqrye)){ 
				if(in_array($rsinterest[0],$interest_ids)){
				
				array_push($Array_interest,$rsinterest[1]);
				
				}
				}	
				?>
                <b><?= str_replace(":","",$displayprofile_partner_religiosness_id) ?></b>
               <? if($religiosness_id!=''){ 
			   $arr_inter='';
                     if(count($Array_interest)>0){
                                    for ($x2 = 0; $x2< count($Array_interest); $x2++) {?>
                                               <?  $arr_inter.=$Array_interest[$x2].", "; ?>
                    <? } } ?>
                      <span> : <?=substr($arr_inter,0,-2)?></span><br><br>
        <? } ?>
        <? } ?>
        
        
        
        
            <? } ?>
            </div>
            </div>
            </div>
            </div>
            </div>
        <? } ?>
        
        
        
        
        
        
        
        
        <?
        $id = $_GET['b'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
                                
        ?>
        <div class="tab-pane" id="details" role="tabpanel">
            <div class="p-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
       
              <? if ($petranal_grand_father_name != "") { ?>
                <b><?= str_replace(":","",$adfgradfather) ?></b>
                <span>: <?=$petranal_grand_father_name?> </span><br><br>
				<? } ?>
                                
                                 
           <? if ($petranal_grand_mother_name != "") { ?>
                <b><?= str_replace(":","",$adfgradmother) ?></b>
                <span>: <?=$petranal_grand_mother_name?> </span><br><br>
				<? } ?>
					
  			<? if ($metranal_grand_father_name != "") { ?>
                <b><?= str_replace(":","",$adfmgradfather) ?></b>
                <span>: <?=$metranal_grand_father_name?> </span><br><br>
				<? } ?>
			
          	  <? if ($metranal_grand_mother_name != "") { ?>
                <b><?= str_replace(":","",$adfmgradmother) ?></b>
                <span>: <?=$metranal_grand_mother_name?> </span><br><br>
				<? } ?>
                                 
                </div>
                                                
        <div class="col-sm-6">
            

<? //Some CWorks Aren't Completed !! ?>
        
        </div>
        </div>
        </div>
        </div>
        </div>
                                
        <? } ?>
        

        
                            
                                
        <?
        $id = $_GET['b'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
                                
        ?>
        <div class="tab-pane" id="other" role="tabpanel">
            <div class="p-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
       
                 <? if ($personality != "") { ?>
                <b><?= str_replace(":","",$displayprofilepersonality) ?></b>
                <span>: <?=$personality?> </span><br><br>
				<? } ?>
                
                <? if ($familybackground != "") { ?>
                <b><?= str_replace(":","",$displayprofilefamilybackground) ?></b>
                <span>: <?=$familybackground?> </span><br><br>
				<? } ?>
                
                 <? if ($father_name != "") { ?>
                <b><?= str_replace(":","",$updateinterestfathername) ?></b>
                <span>: <?=$father_name?>
                
                <? if ($father_status_id !="" || $father_occupation != "") { ?>
                (<?= $father_status_id ?>) <? if($father_occupation!="") { echo '('.$father_occupation.')'; } ?>
				<? } ?>
                 </span><br><br>
				<? } ?>
	
				<? if ($mother_name != "") { ?>
                <b><?= str_replace(":","",$updateinterestmothername) ?></b>
                <span>: <?=$mother_name?> 
                
                
                <? if ($mother_status_id != "" || $mother_occupation != "") { ?>
                
                  (<?= $mother_status_id ?>)<? if($mother_occupation!="") { echo '('.$mother_occupation.')'; } ?> 
				<? } ?>
                
                
                <? if ($father_company_address != "") { ?>
                <b><?= str_replace(":","",$updateinterestfatherofcname) ?></b>
                <span>: <?=$father_company_address?> </span>
				<? } ?>
                
                </span><br><br>
				<? } ?>

				 <? if ($mother_company_address != "") { ?>
                <b><?= str_replace(":","",$updateinterestmotherofcname) ?></b>
                <span>: <?=$mother_company_address?> </span><br><br>
				<? } ?>
				
                </div>
                                                
        <div class="col-sm-6">
            
                <? if ($hobbiesintrest != "" ) { ?>
                <b><?= str_replace(":","",$displayprofilehobbyinterest) ?></b>
                <span>: <?= $hobbiesintrest ?> </span><br><br>
				<? } ?>
				
                
                <? if ($countryofgrewup != "") { ?>
                <b><?= str_replace(":","",$countryofgrewup) ?></b>
                <span>: <?=$countryofgrewup?> </span><br><br>
				<? } ?>
				
                
                
                <? if ($city != "") { ?>
                <b><?= str_replace(":","",$default_displayprofile_city) ?></b>
                <span>: <?=$city?> </span><br><br>
				<? } ?>
				
                
                 
                 
                <? if ($countryid != "") { ?>
                <b><?= str_replace(":","",$default_displayprofile_country) ?></b>
                <span>: <?=$countryid?> </span><br><br>
				<? } ?>
				
                
                  
                 <? if ($state != "") { ?>
                <b><?= str_replace(":","",$default_displayprofile_state) ?></b>
                <span>: <?=$state?> </span><br><br>
				<? } ?>
				
				
        
        </div>
        </div>
        </div>
        </div>
        </div>
                                
        <? } ?>
        
        
                                
                                
    </div>
</div>
                        
<?
if(isset($_POST['sendfriend']) || isset($_POST['g-recaptcha-response'])){
    //var_dump($_POST);
    $secret = "6LeqjXIUAAAAAOovXEvf3MRnz79HpCcJ2M9p-sY5";
    $ip = $_SERVER['REMOTE_ADDR'];
    $capcha = $_POST['g-recaptcha-response'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$capcha&remoteip=$ip");

//var_dump($rsp);
$arr = json_decode($rsp,true);



	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer();

    $mail->Host='mail.paroshi.com';
    $mail->Port=465;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='pronirab@paroshi.com';
    $mail->Password='nirabAB00$$';

  $mail->setFrom('pronirab@paroshi.com','paroshi Recommendation Matches');
  $mail->addAddress("kingb5861@gmail.com");
  $mail->addReplyTo('pronirab@paroshi.com');

	$mail->isHTML(true);
	$mail->Subject='Sent Matches Profiles From Your Friend';
	
	
	
	
	$html_string ='

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <title>MOSAICO Responsive Email Designer</title>
  
  <style type="text/css">
    body{ margin: 0; padding: 0; }
    img{ border: 0px; display: block; }

    .socialLinks{ font-size: 6px; }
    .socialLinks a{
      display: inline-block;
    }

    .long-text p{ margin: 1em 0px; }
    .long-text p:last-child{ margin-bottom: 0px; }
    .long-text p:first-child{ margin-top: 0px; }
  </style>
  <style type="text/css">
    /* yahoo, hotmail */
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height: 100%; }
    .yshortcuts a{ border-bottom: none !important; }
    .vb-outer{ min-width: 0 !important; }
    .RMsgBdy, .ExternalClass{
      width: 100%;
      background-color: #3f3f3f;
      background-color: #3f3f3f}

    [o365] button{ margin: 0 !important; }

    /* outlook */
    table{ mso-table-rspace: 0pt; mso-table-lspace: 0pt; }
    #outlook a{ padding: 0; }
    img{ outline: none; text-decoration: none; border: none; -ms-interpolation-mode: bicubic; }
    a img{ border: none; }

    @media screen and (max-width: 600px) {
      table.vb-container, table.vb-row{
        width: 95% !important;
      }

      .mobile-hide{ display: none !important; }
      .mobile-textcenter{ text-align: center !important; }

      .mobile-full{ 
        width: 100% !important;
        max-width: none !important;
      }
    }
    
  </style>
  <style type="text/css">
    
    #ko_sideArticleBlock_4 .links-color a, #ko_sideArticleBlock_4 .links-color a:link, #ko_sideArticleBlock_4 .links-color a:visited, #ko_sideArticleBlock_4 .links-color a:hover{
      color: #3f3f3f;
      color: #3f3f3f;
      text-decoration: underline
    }
    
    #ko_sideArticleBlock_7 .links-color a, #ko_sideArticleBlock_7 .links-color a:link, #ko_sideArticleBlock_7 .links-color a:visited, #ko_sideArticleBlock_7 .links-color a:hover{
      color: #3f3f3f;
      color: #3f3f3f;
      text-decoration: underline
    }
    
    #ko_sideArticleBlock_6 .links-color a, #ko_sideArticleBlock_6 .links-color a:link, #ko_sideArticleBlock_6 .links-color a:visited, #ko_sideArticleBlock_6 .links-color a:hover{
      color: #3f3f3f;
      color: #3f3f3f;
      text-decoration: underline
    }
    
    #ko_footerBlock_2 .links-color a, #ko_footerBlock_2 .links-color a:link, #ko_footerBlock_2 .links-color a:visited, #ko_footerBlock_2 .links-color a:hover{
      color: #cccccc;
      color: #cccccc;
      text-decoration: underline
    }
    </style>
  
</head>
<body bgcolor="#3f3f3f" text="#919191" alink="#cccccc" vlink="#cccccc" style="margin: 0; padding: 0; background-color: #3f3f3f; color: #919191;"><center>

  

  <table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_logoBlock_3">
      <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
      <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="9" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;" width="570" class="vb-row">
        
        <tbody><tr>
      <td align="center" valign="top" style="font-size: 0;"><div style="vertical-align: top; width: 100%; max-width: 276px; -mru-width: 0px;"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="276" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px;">
          
          <tbody><tr><td width="100%" valign="top" align="center" class="links-color"><!--[if (lte ie 8)]><div style="display: inline-block; width: 258px; -mru-width: 0px;"><![endif]--><img alt="" border="0" hspace="0" align="center" vspace="0" width="258" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #f3f3f3; font-size: 18px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 258px; height: auto;" src="https://www.paroshi.com/uploadfiles/site_default5/sitelogo.png"><!--[if (lte ie 8)]></div><![endif]--></td></tr>
        
        </tbody></table></div></td>
    </tr>
      
      </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
      
    </td></tr>
    </tbody>
  </table>

';


	
	
	 $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
	 $id = $_GET['b'];
    $sql = "select * from tbldatingusermaster where userid = '$id'";
    $result = $db->query($sql);
    while($data = $result->fetch_object()){
	
	
	
	
	
	
	    $userid = $data->userid;
        $annual_income_id = $data->annual_income_id;
        $annual_income = " ";
        
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbldating_annual_income_master where id ='$annual_income_id' ";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){
        
        $annual_income = $data5->title;
        
        }
        
        
        
        $annual_income_currancyid = $data->annual_income_currancyid;
        $annual_income_currancy = " ";
        
        $db6 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql6 = "select * from tbldating_annual_income_currancy_master where id ='$annual_income_currancyid' ";
        $result6 = $db6->query($sql6);
        
        while($data6 = $result6->fetch_object()){
        
        $annual_income_currancy = $data6->title;
        
        }
        
        $annualincome = "Annual Income : ".$annual_income." ".$annual_income_currancy;
        
        
        $nnn1 = $data->dob;
        $birthday_timestamp = strtotime($nnn1);  

        $age2 = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);
        
        $age3 = "Age : ".$age2." Yrs";
        
        $dd = $data1->packageid;
        if($dd > 28){ 
       
        $name = $data->name;
         } else { 
        $myvalue = $data->name;
        $arr = explode(' ',trim($myvalue));
        
        $name = $arr[0];
        
        }
           
           
           
    $imgst = $data->imagenm;
    if($imgst == NULL){
        $img1 = "https://cdn.wccftech.com/images/default_avatar.png";
    }else{
        $img1 = "paroshi.com/uploadfiles/".$data->imagenm;
    }
    
    if($data->address !=NULL){
        $address = "From ".$data->address;
    } else {
        $address = " ";
    }
    
        
        $curruserid2 = $data->ocupationid;
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from  tbldatingoccupationmaster where id='$curruserid2'";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){
    
         $occ = $data2->title;
         
        if($data->company_name != NULL){
        $company_name = "at ".$data->company_name; 
       } else {
           $company_name = " ";
       }


 } 


	
	
	$html_string .= '

    <table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_sideArticleBlock_4">
      <tbody>
      <tr>
      <td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
      
      <!--[if (gte mso 9)|(lte ie 8)]>
      
      <table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="9" bgcolor="#ffffff" width="570" class="vb-row" style="border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;">
        
        <tbody><tr>
      <td align="center" valign="top" style="font-size: 0;"><div style="width: 100%; max-width: 552px; -mru-width: 0px;"><!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="552"><tr><![endif]--><!--
        --><!--
          --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="184"><![endif]--><!--
      --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 184px; -mru-width: 0px; min-width: calc(33.333333333333336%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="184" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr><td width="100%" valign="top" align="center" class="links-color"><!--[if (lte ie 8)]><div style="display: inline-block; width: 166px; -mru-width: 0px;"><![endif]--><img alt="" border="0" hspace="0" align="center" vspace="0" width="166" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 166px; height: auto;" src="'.$img1.'"><!--[if (lte ie 8)]></div><![endif]--></td></tr>
          
        </tbody>
        </table>
        </div>
      <div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 368px; -mru-width: 0px; min-width: calc(66.66666666666667%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="368" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr>
      <td width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: left;"><span style="font-weight: normal;">
      '.$name.'
      </span></td>
    </tr>
            <tr><td class="long-text links-color" width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: left; line-height: normal;"><p style="margin: 1em 0px; margin-bottom: 0px; margin-top: 0px;">
            
            '.$age3.'<br>
            '.$annualincome.'<br>
            '.$company.'<br>
            '.$address.'<br>
            
            </p></td></tr>
            <tr>
      <td valign="top" align="left"><table role="presentation" cellpadding="6" border="0" align="left" cellspacing="0" style="border-spacing: 0; mso-padding-alt: 6px 6px 6px 6px; padding-top: 4px;"><tbody><tr>
        <td width="auto" valign="middle" align="left" bgcolor="#bfbfbf" style="text-align: center; font-weight: normal; padding: 6px; padding-left: 18px; padding-right: 18px; background-color: #bfbfbf; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; border-radius: 4px;"><a style="text-decoration: none; font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif;" target="_new" href="https://www.paroshi.com/displayprofile.php?b='.$userid.'">Read More</a></td>
      </tr></tbody></table></td>
    </tr>
          
        </tbody></table><!--
      --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
          --><!--
        --><!--
      --><!--[if (gte mso 9)|(lte ie 8)]></tr></table><![endif]--></div></td>
    </tr>
      
      </tbody>
    </table>
      </div>
      <!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    </td></tr>
    </tbody>
  </table>
';
	
}
	
	
	
	
$html_string.='<!-- footerBlock -->
    <table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#3f3f3f" style="background-color: #3f3f3f;" id="ko_footerBlock_2">
      <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
    <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; width: 100%; mso-cellspacing: 0px; border-spacing: 0px; max-width: 570px; -mru-width: 0px;" width="570" class="vb-row">
        
      <tbody><tr>
      <td align="center" valign="top" style="font-size: 0; padding: 0 9px;"><div style="vertical-align: top; width: 100%; max-width: 552px; -mru-width: 0px;"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px;" width="552">
          
        <tbody><tr><td class="long-text links-color" width="100%" valign="top" align="center" style="font-weight: normal; color: #919191; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: center;"></td></tr>
        <tr><td width="100%" valign="top" align="center" style="font-weight: normal; color: #ffffff; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: center;"><a href="[unsubscribe_link]" style="color: #ffffff; text-decoration: underline;" target="_new"></a></td></tr>
        <tr style="text-align: center;"><td width="100%" valign="top" align="center" class="links-color" style="text-align: center;"><!--[if (lte ie 8)]><div style="display: inline-block; width: 170px; -mru-width: 0px;"><![endif]--><a target="_new" href="https://mosaico.io/?footerbadge" style="color: #cccccc; color: #cccccc; text-decoration: underline;"><img alt="MOSAICO Responsive Email Designer" border="0" hspace="0" align="center" vspace="0" width="170" src="https://www.paroshi.com/uploadfiles/site_default5/sitelogo.png" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 170px;"></a><!--[if (lte ie 8)]></div><![endif]--></td></tr>
        </tbody></table></div></td>
    </tr>
    
      </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
  </td></tr>
    </tbody></table>
    <!-- /footerBlock -->
    
</center></body></html>';

  
  
  $mail->Body= $html_string;	
	

	

	if ($mail->send()) {
		echo "<script>alert('Sent Successfully')</script>";
	} else {
		$result= "Try Again !! Message Not Sent";
	}




}
?>
      
<div class="card text-white mb-3" style="max-width: 25rem;margin: 0 auto;">
  <div class="card-header bg-primary">" TELL A FRIEND "</div>
  <div class="card-body">
<form action="" method="post">
  <div class="form-group">
    <label style="color:black;" for="formGroupExampleInput">Enter Your Friend Email Address :</label>
    <input type="email" name="frndemail" class="form-control" id="formGroupExampleInput" placeholder="Email Address" required>
  </div>
  <div class="form-group">
      <div class="container">
          <input type='hidden' name='comment_parent' id='comment_parent' value='<?php echo $_GET['b']; ?>' />
<div class="g-recaptcha" data-sitekey="6LeqjXIUAAAAAEpbhCKv4MgFkNtyfTsD1b1w26EY"></div>
</div>
  </div>
  <button type="submit" name="sendfriend" class="btn btn-primary btn-lg"> Send </button>
</form>    
</div>
     
</div>



            </div>
        </div>
        <? } ?>
    </div>
    <!--<script src="assets1/libs/jquery/dist/jquery.min.js"></script>-->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets1/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets1/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets1/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets1/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets1/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets1/libs/magnific-popup/meg.init.js"></script>
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>