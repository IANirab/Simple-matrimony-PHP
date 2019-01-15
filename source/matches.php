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
    <title>Matches :: Paroshi.com</title>
    <!-- Custom CSS -->
    <link href="assets1/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="mechat/php/js.php" type="text/javascript"></script> 
<link rel="stylesheet" type="text/css" href="mechat/css/mechat.css">
<link rel="stylesheet" type="text/css" href="mechat/css/templates/developed.css">

<style type="text/css">
    .nav-tabs {
    border-bottom: 1px solid #ff1493 !important;
    background: #ff1493 !important;
}
a.nav-link.active.show {
    background: #00bfff;
    border: none;
    height: 39px;
}

</style>

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

<?
include('mechat/php/config.php'); // Load meChat PHP Configurations
include('mechat/php/functions.php');
if($_GET['uid']){
    meChat_Login($_GET['uid']);
    header("Location:dashboard.php");
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
                             <img src="https://www.paroshi.com/uploadfiles/site_default5/sitelogo.png" class="light-logo  head-logo " />
                            
                            
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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
<div class="">                

<ul class="nav nav-tabs" role="tablist">

    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#Recommended" role="tab" aria-selected="true"><span class="hidden-sm-up"></span> <span style="color:white;" class="hidden-xs-down">Recommendations</span></a> </li>
    
    
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Preferred " role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span style="color:white;" class="hidden-xs-down">Preferred </span></a> </li>
    
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#1way" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span style="color:white;" class="hidden-xs-down">1-Way</span></a> </li>
    
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#2way" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span style="color:white;" class="hidden-xs-down">2-Way</span></a> </li>
    
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Handpicked" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span style="color:white;" class="hidden-xs-down">Hand Picked Matches</span></a> </li>
    
</ul>

</div>
</div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
<div class="tab-content tabcontent-border">
    
    
    
    
    
<div class="tab-pane active show" id="Recommended" role="tabpanel">
<div class="row el-element-overlay">


        <? 
        
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbldatingusermaster where userid='$curruserid'";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){
        
        
        
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster order by userid desc";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
        
    
$nnn = $data1->dob;
$birthday_timestamp = strtotime($nnn);  

$age = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);
  
  
$nnn1 = $data->dob;
$birthday_timestamp = strtotime($nnn1);  

$age1 = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);


$gender = $data1->genderid;            
$gender1 = $data->genderid;            
    
$religion = $data1->religion_interest;            
$religion1 = $data->religianid;

if($age > $age1) {  
    if($gender != $gender1){ 
        if($religion == $religion1){
           
        ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">

    <?
    $imgst = $data->imagenm;
    if($imgst == NULL){ ?>
                                <div class="el-card-avatar el-overlay-1"> <img src="https://cdn.wccftech.com/images/default_avatar.png" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="https://cdn.wccftech.com/images/default_avatar.png"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
<? } else { ?>

                                    <div class="el-card-avatar el-overlay-1"> <img src="uploadfiles/<? echo $data->imagenm; ?>" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="uploadfiles/<? echo $data->imagenm; ?>"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

<? } ?>


                                <div class="el-card-content">
        <? 
        $dd = $data1->packageid;
        if($dd > 28){ 
        ?>

        <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><h4 class="m-b-0"><? echo $data->name; ?></h4></a>
        <? } else { 
        $myvalue = $data->name;
        $arr = explode(' ',trim($myvalue));
        
        ?> 
        <h4 class="m-b-0"><a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><? echo $arr[0].''.' '; ?></a><i class="fas fa-lock" data-toggle="tooltip" data-placement="top" title="Full Name is Avaiable For Prenium Members">
</i></h4>
        <? } ?>


    <? 
        $curruserid2 = $data->ocupationid;
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from  tbldatingoccupationmaster where id='$curruserid2'";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){
    ?>
        <span class="text-muted"> <? echo $data2->title ?><br>
      <? if($data->company_name != NULL) {?>
      at <? echo $data->company_name; ?>
      <? } ?> </span><br>


<? } ?>
      
    

<? if($data->address !=NULL){?>
<span class="text-muted">From <? echo $data->address; ?> </span><br>
<? } ?>


                            </div>
                       </div>
                </div>
                </div>

<? } } } } } ?>

</div>
</div>
    
    
    
    
    
    
    
    
    
    
    
    
<!-- Prefer Section -->    
    
<div class="tab-pane" id="Preferred" role="tabpanel">
<div class="row el-element-overlay">


        <? 
        
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbldatingusermaster where userid ='$curruserid' ";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){
            
        
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbldatingpartnerprofilemaster where userid='$curruserid'";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){

        
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster order by userid desc";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
       

    
$age = $data1->agefrom;
  
  
$nnn1 = $data->dob;
$birthday_timestamp = strtotime($nnn1);  

$age1 = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);



$gender1 = $data1->genderid;
$gender2 = $data->genderid;

$location1 = $data1->location;
$location2 = $data->countryid;

$religianid1 = $data1->religianid;
$religianid2 = $data->religianid;

$castid1 = $data1->castid;
$castid2 = $data->castid;

$subcast1 = $data1->subcast;
$subcast2 = $data->subcast;

$occupation1 = $data1->occupation;
$occupation2 = $data->ocupationid;

$annincome1 = $data1->annincome;
$annincome2 = $data->annual_income_id;

$annincome_curr1 = $data1->annincome_curr;
$annincome_curr2 = $data->annual_income_currancyid;

$work_in1 = $data1->work_in;
$work_in2 = $data->work_in;



$work_in_country1 = $data1->work_in_country;
$work_in_country2 = $data->work_in_country;

$education1 = $data1->education;
$education2 = $data->educationid;

$maritalstatus1 = $data1->maritalstatus;
$maritalstatus2 = $data->maritalstatusid;

$heightfrom1 = $data1->heightfrom;
$heightto1   = $data1->heightto;
$heightid = $data->heightid;

$dietids1 = $data1->dietids;
$dietids2 = $data->dietid;

$smokeids1 = $data1->smokeids;
$smokeids2 = $data->smokerstatusid;

$drinkids1 = $data1->drinkids;
$drinkids2 = $data->drinkerstatusid;

$kidsids1 = $data1->kidsids;
$kidsids2 = $data->kidsid;

$grahid1 = $data1->grahid;
$grahid2 = $data->grahid;

$religiosness_id1 = $data1->religiosness_id;
$religiosness_id2 = $data->religiosness_id;

$beard_id1 = $data1->beard_id;
$beard_id2 = $data->beard_id;

$halal_strict_id1 = $data1->halal_strict_id;
$halal_strict_id2 = $data->halal_strict_id;


$salah_perform_id1 = $data1->salah_perform_id;
$salah_perform_id2 = $data->salah_perform_id;

$denominationid1 = $data1->denominationid;
$denominationid2 = $data->denominationid;



if($age < $age1){

if($gender1 == $gender2 )  {

    
$location = explode(',', $data1->location);
for ($i=0; $i < count($location); $i++) {
if($location[$i] == $location2) { 

     
if($religianid1 == $religianid2){

 
$castid = explode(',', $data1->castid);
for ($i=0; $i < count($castid); $i++) { 
if($castid[$i] == $castid2 )  {

    
$subcast = explode(',', $data1->subcast);
for ($i=0; $i < count($subcast); $i++) {      
if($subcast[$i] == $subcast2) { 

     
$occupation = explode(',', $data1->occupation);
for ($i=0; $i < count($occupation); $i++) { 
if($occupation[$i] == $occupation2){


$annincome = explode(',', $data1->annincome);
for ($i=0; $i < count($annincome); $i++) { 
if($annincome[$i] == $annincome2){

     
if($annincome_curr1 == $annincome_curr2)  {


$work_in = explode(',', $data1->work_in);
for ($i=0; $i < count($work_in); $i++) {
if($work_in[$i] == $work_in2) {

     
if($religianid1 == $religianid2){



$work_in_country = explode(',', $data1->work_in_country);
for ($i=0; $i < count($work_in_country); $i++) {
if($work_in_country[$i] == $work_in_country2 )  {


    
$education = explode(',', $data1->education);
for ($i=0; $i < count($education); $i++) { 
if($education[$i] == $education2) {
 


$maritalstatus = explode(',', $data1->maritalstatus);
for ($i=0; $i < count($maritalstatus); $i++) {
if($maritalstatus[$i] == $maritalstatus2){  

    
if($heightfrom1 < $heightid){
if($heightid < $heightto1)  {

$dietids = explode(',', $data1->dietids);
for ($i=0; $i < count($dietids); $i++) {
if($dietids[$i] == $dietids2) { 

    
$smokeids = explode(',', $data1->smokeids);
for ($i=0; $i < count($smokeids); $i++) {   
if($smokeids[$i] == $smokeids2){


$drinkids = explode(',', $data1->drinkids);
for ($i=0; $i < count($drinkids); $i++) { 
if($drinkids[$i] == $drinkids2 )  {

    
if($kidsids1 == $kidsids2) {

    
    
$grahid = explode(',', $data1->grahid);
for ($i=0; $i < count($grahid); $i++) {     
if($grahid[$i] == $grahid2){ 


$religiosness_id = explode(',', $data1->religiosness_id);
for ($i=0; $i < count($religiosness_id); $i++) {     
if($religiosness_id[$i] == $religiosness_id2)  {

    
if($beard_id1 == $beard_id2) { 

    
if($halal_strict_id1 == $halal_strict_id2){ 

    
if($salah_perform_id1 == $salah_perform_id2){

   
  /* 
 $denominationid = explode(',', $data1->denominationid);
for ($i=0; $i < count($denominationid); $i++) { 
if($denominationid[$i] == $denominationid2)  {
    echo "success denominationid<br>";
 */  
 
?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">

    <?
    $imgst = $data->imagenm;
    if($imgst == NULL){ ?>
                                <div class="el-card-avatar el-overlay-1"> <img src="https://cdn.wccftech.com/images/default_avatar.png" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="https://cdn.wccftech.com/images/default_avatar.png"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
<? } else { ?>

                                    <div class="el-card-avatar el-overlay-1"> <img src="uploadfiles/<? echo $data->imagenm; ?>" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="uploadfiles/<? echo $data->imagenm; ?>"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

<? } ?>


                                <div class="el-card-content">
        <? 
        $dd = $data2->packageid;
        if($dd > 28){ 
        ?>

        <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><h4 class="m-b-0"><? echo $data->name; ?></h4></a>
        <? } else { 
        $myvalue = $data->name;
        $arr = explode(' ',trim($myvalue));
        
        ?> 
        <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><h4 class="m-b-0"><? echo $arr[0].'</a> <i class="fas fa-lock" data-toggle="tooltip" data-placement="right" title="Full Name is Avaiable For Prenium Members">
</i> '; ?></h4>
        <? } ?>


    <? 
        $curruserid2 = $data->ocupationid;
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from  tbldatingoccupationmaster where id='$curruserid2'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
    ?>
        <span class="text-muted"> <? echo $data3->title ?><br>
      <? if($data->company_name != NULL) {?>
      at <? echo $data->company_name; ?>
      <? } ?> </span><br>


<? } ?>
      
    

<? if($data->address !=NULL){?>
<span class="text-muted">From <? echo $data->address; ?> </span><br>
<? } ?>


                            </div>
                       </div>
                </div>
                </div>

<? } 
}
} } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } ?>
</div>
</div>







<!-- 1-way Section -->


<div class="tab-pane" id="1way" role="tabpanel">
<div class="row el-element-overlay">


        <? 
        
    $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $sql = "select * from tbldatingusermaster where userid='$curruserid'";
    $result = $db->query($sql);
        
    while($data = $result->fetch_object()){
        
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbldatingpartnerprofilemaster";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){


    
$age = $data1->agefrom;
  
  
$nnn1 = $data->dob;
$birthday_timestamp = strtotime($nnn1);  

$age1 = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);



$gender1 = $data1->genderid;
$gender2 = $data->genderid;

$location1 = $data1->location;
$location2 = $data->countryid;

$religianid1 = $data1->religianid;
$religianid2 = $data->religianid;

$castid1 = $data1->castid;
$castid2 = $data->castid;

$subcast1 = $data1->subcast;
$subcast2 = $data->subcast;

$occupation1 = $data1->occupation;
$occupation2 = $data->ocupationid;

$annincome1 = $data1->annincome;
$annincome2 = $data->annual_income_id;

$annincome_curr1 = $data1->annincome_curr;
$annincome_curr2 = $data->annual_income_currancyid;

$work_in1 = $data1->work_in;
$work_in2 = $data->work_in;



$work_in_country1 = $data1->work_in_country;
$work_in_country2 = $data->work_in_country;

$education1 = $data1->education;
$education2 = $data->educationid;

$maritalstatus1 = $data1->maritalstatus;
$maritalstatus2 = $data->maritalstatusid;

$heightfrom1 = $data1->heightfrom;
$heightto1   = $data1->heightto;
$heightid = $data->heightid;

$dietids1 = $data1->dietids;
$dietids2 = $data->dietid;

$smokeids1 = $data1->smokeids;
$smokeids2 = $data->smokerstatusid;

$drinkids1 = $data1->drinkids;
$drinkids2 = $data->drinkerstatusid;

$kidsids1 = $data1->kidsids;
$kidsids2 = $data->kidsid;

$grahid1 = $data1->grahid;
$grahid2 = $data->grahid;

$religiosness_id1 = $data1->religiosness_id;
$religiosness_id2 = $data->religiosness_id;

$beard_id1 = $data1->beard_id;
$beard_id2 = $data->beard_id;

$halal_strict_id1 = $data1->halal_strict_id;
$halal_strict_id2 = $data->halal_strict_id;


$salah_perform_id1 = $data1->salah_perform_id;
$salah_perform_id2 = $data->salah_perform_id;

$denominationid1 = $data1->denominationid;
$denominationid2 = $data->denominationid;



if($age < $age1){

if($gender1 == $gender2 )  {
    
$location = explode(',', $data1->location);
for ($i=0; $i < count($location); $i++) {
if($location[$i] == $location2) { 
     
if($religianid1 == $religianid2){
 
$castid = explode(',', $data1->castid);
for ($i=0; $i < count($castid); $i++) { 
if($castid[$i] == $castid2 )  {
    
$subcast = explode(',', $data1->subcast);
for ($i=0; $i < count($subcast); $i++) {      
if($subcast[$i] == $subcast2) { 
     
$occupation = explode(',', $data1->occupation);
for ($i=0; $i < count($occupation); $i++) { 
if($occupation[$i] == $occupation2){

$annincome = explode(',', $data1->annincome);
for ($i=0; $i < count($annincome); $i++) { 
if($annincome[$i] == $annincome2){
     
if($annincome_curr1 == $annincome_curr2)  {

$work_in = explode(',', $data1->work_in);
for ($i=0; $i < count($work_in); $i++) {
if($work_in[$i] == $work_in2) {

if($religianid1 == $religianid2){

$work_in_country = explode(',', $data1->work_in_country);
for ($i=0; $i < count($work_in_country); $i++) {
if($work_in_country[$i] == $work_in_country2 )  {
    
$education = explode(',', $data1->education);
for ($i=0; $i < count($education); $i++) { 
if($education[$i] == $education2) {

$maritalstatus = explode(',', $data1->maritalstatus);
for ($i=0; $i < count($maritalstatus); $i++) {
if($maritalstatus[$i] == $maritalstatus2){  
    
if($heightfrom1 < $heightid){
if($heightid < $heightto1)  {
    

$dietids = explode(',', $data1->dietids);
for ($i=0; $i < count($dietids); $i++) {
if($dietids[$i] == $dietids2) { 
    
$smokeids = explode(',', $data1->smokeids);
for ($i=0; $i < count($smokeids); $i++) {   
if($smokeids[$i] == $smokeids2){

$drinkids = explode(',', $data1->drinkids);
for ($i=0; $i < count($drinkids); $i++) { 
if($drinkids[$i] == $drinkids2 )  {
    
if($kidsids1 == $kidsids2) {
    
$grahid = explode(',', $data1->grahid);
for ($i=0; $i < count($grahid); $i++) {     
if($grahid[$i] == $grahid2){ 


$religiosness_id = explode(',', $data1->religiosness_id);
for ($i=0; $i < count($religiosness_id); $i++) {     
if($religiosness_id[$i] == $religiosness_id2)  {
    
if($beard_id1 == $beard_id2) { 
    
if($halal_strict_id1 == $halal_strict_id2){ 
    
if($salah_perform_id1 == $salah_perform_id2){
   
  /* 
 $denominationid = explode(',', $data1->denominationid);
for ($i=0; $i < count($denominationid); $i++) { 
if($denominationid[$i] == $denominationid2)  {
    echo "success denominationid<br>";
 */ 
 
 
    $id = $data1->userid;

    
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbldatingusermaster where userid ='$id' ";
        $result2 = $db2->query($sql2);
        if($result2){
        while($data2 = $result2->fetch_object()){
 
 
?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">

    <?
    $imgst = $data2->imagenm;
    if($imgst == NULL){ ?>
                                <div class="el-card-avatar el-overlay-1"> <img src="https://cdn.wccftech.com/images/default_avatar.png" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="https://cdn.wccftech.com/images/default_avatar.png"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data2->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
<? } else { ?>

                                    <div class="el-card-avatar el-overlay-1"> <img src="uploadfiles/<? echo $data2->imagenm; ?>" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="uploadfiles/<? echo $data2->imagenm; ?>"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data2->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

<? } ?>


                                <div class="el-card-content">
        <? 
        $dd = $data->packageid;
        if($dd > 28){ 
        ?>

        <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><h4 class="m-b-0"><? echo $data2->name; ?></h4></a>
        <? } else { 
        $myvalue = $data2->name;
        $arr = explode(' ',trim($myvalue));
        
        ?> 
        <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><h4 class="m-b-0"><? echo $arr[0].'</a> <i class="fas fa-lock" data-toggle="tooltip" data-placement="right" title="Full Name is Avaiable For Prenium Members">
</i> '; ?></h4>
        <? } ?>


    <? 
        $curruserid2 = $data2->ocupationid;
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from  tbldatingoccupationmaster where id='$curruserid2'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
    ?>
        <span class="text-muted"> <? echo $data3->title ?><br>
      <? if($data2->company_name != NULL) {?>
      at <? echo $data2->company_name; ?>
      <? } ?> </span><br>


<? } ?>
      
    

<? if($data2->address !=NULL){?>
<span class="text-muted">From <? echo $data2->address; ?> </span><br>
<? } ?>


                            </div>
                       </div>
                </div>
                </div>

<? } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } ?>




</div>
</div>






<!-- 1-way Section -->


<div class="tab-pane" id="2way" role="tabpanel">
<div class="row el-element-overlay">


        <? 
        
    $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $sql = "select * from tbldatingpartnerprofilemaster where userid='$curruserid'";
    $result = $db->query($sql);
        
    while($data = $result->fetch_object()){
        
        
        

        
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbldatingpartnerprofilemaster";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){


    
 $age = $data1->agefrom;
 $age1 = $data->agefrom;


 $gender1 = $data1->genderid;
 $gender2 = $data->genderid;

 $location1 = $data1->location;
 $location2 = $data->location;

$religianid1 = $data1->religianid;
$religianid2 = $data->religianid;

$castid1 = $data1->castid;
$castid2 = $data->castid;

$subcast1 = $data1->subcast;
$subcast2 = $data->subcast;

$occupation1 = $data1->occupation;
$occupation2 = $data->occupation;

$annincome1 = $data1->annincome;
$annincome2 = $data->annincome;

$annincome_curr1 = $data1->annincome_curr;
$annincome_curr2 = $data->annincome_curr;

$work_in1 = $data1->work_in;
$work_in2 = $data->work_in;



$work_in_country1 = $data1->work_in_country;
$work_in_country2 = $data->work_in_country;

$education1 = $data1->education;
$education2 = $data->education;

$maritalstatus1 = $data1->maritalstatus;
$maritalstatus2 = $data->maritalstatus;

$heightfrom1 = $data1->heightfrom;
$heightto1   = $data1->heightto;

$heightfrom2 = $data->heightfrom;
$heightto2   = $data->heightto;


$dietids1 = $data1->dietids;
$dietids2 = $data->dietids;

$smokeids1 = $data1->smokeids;
$smokeids2 = $data->smokeids;

$drinkids1 = $data1->drinkids;
$drinkids2 = $data->drinkids;

$kidsids1 = $data1->kidsids;
$kidsids2 = $data->kidsids;

$grahid1 = $data1->grahid;
$grahid2 = $data->grahid;

$religiosness_id1 = $data1->religiosness_id;
$religiosness_id2 = $data->religiosness_id;

$beard_id1 = $data1->beard_id;
$beard_id2 = $data->beard_id;

$halal_strict_id1 = $data1->halal_strict_id;
$halal_strict_id2 = $data->halal_strict_id;


$salah_perform_id1 = $data1->salah_perform_id;
$salah_perform_id2 = $data->salah_perform_id;

$denominationid1 = $data1->denominationid;
$denominationid2 = $data->denominationid;



if($age == $age1){
    
if($gender1 == $gender2 )  {
    
$location = explode(',', $data1->location);
for ($i=0; $i < count($location); $i++) {
    
    $location2 = explode(',', $data->location);
for ($i=0; $i < count($location2); $i++) {
if($location[$i] == $location2[$i]) {
     
if($religianid1 == $religianid2){


$castid = explode(',', $data1->castid);
for ($i=0; $i < count($castid); $i++) {
    $castid2 = explode(',', $data->castid);
for ($i=0; $i < count($castid2); $i++) {
    
if($castid[$i] == $castid2[$i])  {
    
$subcast = explode(',', $data1->subcast);
for ($i=0; $i < count($subcast); $i++) { 
    $subcast2 = explode(',', $data->subcast);
for ($i=0; $i < count($subcast2); $i++) {
    
if($subcast[$i] == $subcast2[$i]) {
     
$occupation = explode(',', $data1->occupation);
for ($i=0; $i < count($occupation); $i++) { 
    $occupation2 = explode(',', $data->occupation);
for ($i=0; $i < count($occupation2); $i++) { 
if($occupation[$i] == $occupation2[$i]){

$annincome = explode(',', $data1->annincome);
for ($i=0; $i < count($annincome); $i++) { 
    $annincome2 = explode(',', $data->annincome);
for ($i=0; $i < count($annincome2); $i++) {
if($annincome[$i] == $annincome2[$i]){
     
if($annincome_curr1 == $annincome_curr2)  {

$work_in = explode(',', $data1->work_in);
for ($i=0; $i < count($work_in); $i++) {
    $work_in2 = explode(',', $data->work_in);
for ($i=0; $i < count($work_in2); $i++) {
if($work_in[$i] == $work_in2[$i]) {

if($religianid1 == $religianid2){

$work_in_country = explode(',', $data1->work_in_country);
for ($i=0; $i < count($work_in_country); $i++) {
    $work_in_country2 = explode(',', $data->work_in_country);
for ($i=0; $i < count($work_in_country2); $i++) {
if($work_in_country[$i] == $work_in_country2[$i] )  {
  
  
$education = explode(',', $data1->education);
for ($i=0; $i < count($education); $i++) { 
    $education2 = explode(',', $data->education);
for ($i=0; $i < count($education2); $i++) { 
if($education[$i] == $education2[$i]) {

$maritalstatus = explode(',', $data1->maritalstatus);
for ($i=0; $i < count($maritalstatus); $i++) {
    $maritalstatus2 = explode(',', $data->maritalstatus);
for ($i=0; $i < count($maritalstatus2); $i++) {
if($maritalstatus[$i] == $maritalstatus2[$i]){  
    
if($heightfrom1 == $heightfrom2){
if($heightto2 == $heightto1)  {
    

if($beard_id1 == $beard_id2) { 
    
if($halal_strict_id1 == $halal_strict_id2){ 
    
if($salah_perform_id1 == $salah_perform_id2){
   

$dietids = explode(',', $data1->dietids);
for ($i=0; $i < count($dietids); $i++) {
    $dietids2 = explode(',', $data->dietids);
for ($i=0; $i < count($dietids2); $i++) {
if($dietids[$i] == $dietids2[$i]) { 
   
$smokeids = explode(',', $data1->smokeids);
for ($i=0; $i < count($smokeids); $i++) {
    $smokeids2 = explode(',', $data->smokeids);
for ($i=0; $i < count($smokeids2); $i++) {
if($smokeids[$i] == $smokeids2[$i]){
 
$drinkids = explode(',', $data1->drinkids);
for ($i=0; $i < count($drinkids); $i++) { 
    $drinkids2 = explode(',', $data->drinkids);
for ($i=0; $i < count($drinkids2); $i++) {
if($drinkids[$i] == $drinkids2[$i] )  {
    
if($kidsids1 == $kidsids2) {
    
$grahid = explode(',', $data1->grahid);
for ($i=0; $i < count($grahid); $i++) { 
    $grahid2 = explode(',', $data->grahid);
for ($i=0; $i < count($grahid2); $i++) {
if($grahid[$i] == $grahid2[$i]){ 


$religiosness_id = explode(',', $data1->religiosness_id);
for ($i=0; $i < count($religiosness_id); $i++) {  
$religiosness_id2 = explode(',', $data->religiosness_id);
for ($i=0; $i < count($religiosness_id2); $i++) {
if($religiosness_id[$i] == $religiosness_id2[$i])  { 
 
if($data1->userid == $curruserid){
    
} else {
    
  /* 
 $denominationid = explode(',', $data1->denominationid);
for ($i=0; $i < count($denominationid); $i++) { 
if($denominationid[$i] == $denominationid2)  {
    echo "success denominationid<br>";
 */ 
 
 
 

        $db4 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql4 = "select * from tbldatingusermaster where userid ='$curruserid' ";
        $result4 = $db4->query($sql4);
        
        while($data4 = $result4->fetch_object()){
 
 
 
 
 
        $id = $data1->userid;

        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbldatingusermaster where userid ='$id' ";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){
            
            
        
    
?>





                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">

    <?
    $imgst = $data2->imagenm;
    if($imgst == NULL){ ?>
                                <div class="el-card-avatar el-overlay-1"> <img src="https://cdn.wccftech.com/images/default_avatar.png" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="https://cdn.wccftech.com/images/default_avatar.png"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data2->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
<? } else { ?>

                                    <div class="el-card-avatar el-overlay-1"> <img src="uploadfiles/<? echo $data2->imagenm; ?>" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="uploadfiles/<? echo $data2->imagenm; ?>"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data2->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

<? } ?>


                                <div class="el-card-content">
        <? 
        $dd = $data4->packageid;
        if($dd > 28){ 
        ?>

        <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><h4 class="m-b-0"><? echo $data2->name; ?></h4></a>
        <? } else { 
        $myvalue = $data2->name;
        $arr = explode(' ',trim($myvalue));
        
        ?> 
        <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><h4 class="m-b-0"><? echo $arr[0].'</a> <i class="fas fa-lock" data-toggle="tooltip" data-placement="right" title="Full Name is Avaiable For Prenium Members">
</i> '; ?></h4>
        <? } ?>


    <? 
        $curruserid2 = $data2->ocupationid;
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from  tbldatingoccupationmaster where id='$curruserid2'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
    ?>
        <span class="text-muted"> <? echo $data3->title ?><br>
      <? if($data2->company_name != NULL) {?>
      at <? echo $data2->company_name; ?>
      <? } ?> </span><br>


<? } ?>
      
    

<? if($data2->address !=NULL){?>
<span class="text-muted">From <? echo $data2->address; ?> </span><br>
<? } ?>


                            </div>
                       </div>
                </div>
                </div>



<?
$religiosness_id = explode(',', $data1->religiosness_id);
for ($i=0; $i < count($religiosness_id); $i++) {  
$religiosness_id2 = explode(',', $data->religiosness_id);
for ($i=0; $i < count($religiosness_id2); $i++) {
if($religiosness_id[$i] == $religiosness_id2[$i])  {
?>



<? } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } } }
} } } } ?>
</div>
</div>








<div class="tab-pane" id="Handpicked" role="tabpanel">
<div class="row el-element-overlay">
    <? 
    
    $db4 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $sql4 = "select * from tbldatingusermaster where userid='$curruserid'";
    $result4 = $db->query($sql4);
        
    while($data4 = $result4->fetch_object()){
        

    
    if($data4->packageid != 64){
    echo '
    
    
    <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title></title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }
        
        .ReadMsgBody {
            width: 100%;
        }
        
        .ExternalClass {
            width: 100%;
        }
        
        .ExternalClass * {
            line-height: 100%;
        }
        
        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }
        
        p {
            display: block;
            margin: 13px 0;
        }
    </style>
    <!--[if !mso]><!-->
    <style type="text/css">
        @media only screen and (max-width:480px) {
            @-ms-viewport {
                width: 320px;
            }
            @viewport {
                width: 320px;
            }
        }
    </style>
    <!--<![endif]-->
    <!--[if mso]><xml>  <o:OfficeDocumentSettings>    <o:AllowPNG/>    <o:PixelsPerInch>96</o:PixelsPerInch>  </o:OfficeDocumentSettings></xml><![endif]-->
    <!--[if lte mso 11]><style type="text/css">  .outlook-group-fix {    width:100% !important;  }</style><![endif]-->
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Cabin);
    </style>
    <!--<![endif]-->
    <style type="text/css">
        @media only screen and (min-width:480px) {
            .mj-column-per-50 {
                width: 50%!important;
            }
        }
    </style>
</head>

<body style="background: #FFFFFF;">
    <div class="mj-container" style="background-color:#FFFFFF;">
        <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" border="0">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;">
                                            <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:300px;">      <![endif]-->
                                            <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;" align="center">
                                                                <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;" align="center" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width:300px;"><img alt="" title="" height="auto" src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/5bb8969b4986d/1538824145.jpg" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;" width="300"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td><td style="vertical-align:top;width:300px;">      <![endif]-->
                                            <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:72px 20px 72px 20px;" align="left">
                                                                <div style="cursor:auto;color:#B9A9A9;font-family:Cabin, sans-serif;font-size:15px;line-height:22px;text-align:left;">
                                                                    <h2 style="color: #F05D22; line-height: 100%;">Hand Picked Matches is Unavaible For you</h2>
                                                                    <p><i>Note :&#xA0; its avaiable for Elite Prenium Member&apos;s .</i></p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
    </div>
</body>

</html>
    
    
    ';
} else {
    
    
    
    
    
    
    
    
    
    
    
    
        
    
        
        
    $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $sql = "select * from tbl_handpick where userid='$curruserid'";
    $result = $db->query($sql);
        
    while($data = $result->fetch_object()){
        
        
    $profile = $data->profileid;
        
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbldatingusermaster where userid=$profile";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){



    













    
    
?>





                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">

    <?
    $imgst = $data1->imagenm;
    if($imgst == NULL){ ?>
                                <div class="el-card-avatar el-overlay-1"> <img src="https://cdn.wccftech.com/images/default_avatar.png" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="https://cdn.wccftech.com/images/default_avatar.png"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data1->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
<? } else { ?>

                                    <div class="el-card-avatar el-overlay-1"> <img src="uploadfiles/<? echo $data1->imagenm; ?>" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="uploadfiles/<? echo $data1->imagenm; ?>"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://www.paroshi.com/displayprofile.php?b=<? echo $data1->userid; ?>"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

<? } ?>


                                <div class="el-card-content">
 


        <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data1->userid; ?>"><h4 class="m-b-0"><? echo $data1->name; ?></h4></a>



    <? 
        $curruserid2 = $data1->ocupationid;
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from  tbldatingoccupationmaster where id='$curruserid2'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
    ?>
        <span class="text-muted"> <? echo $data3->title ?><br>
      <? if($data1->company_name != NULL) {?>
      at <? echo $data1->company_name; ?>
      <? } ?> </span><br>


<? } ?>
      
    

<? if($data1->address !=NULL){?>
<span class="text-muted">From <? echo $data1->address; ?> </span><br>
<? } ?>


                            </div>
                       </div>
                </div>
                </div>







<? } } } } ?>
</div>
</div>

</div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets1/libs/jquery/dist/jquery.min.js"></script>
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
</body>

</html>