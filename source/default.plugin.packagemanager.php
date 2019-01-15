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
    <title>paroshi.com :: Store</title>
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


<?
include('mechat/php/config.php'); // Load meChat PHP Configurations
include('mechat/php/functions.php');
if($_GET['uid']){
    meChat_Login($_GET['uid']);
    header("Location:dashboard.php");
}else {
    meChatLogged_Logout();
    meChat_Login($curruserid);
}
?>

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

<link href="https://fonts.googleapis.com/css?family=Acme|Fredoka+One|Monoton|Orbitron|Righteous|Russo+One" rel="stylesheet">
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
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Package Manager</li>
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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Pricing</h1>
      <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>



<div class="container">
      <div class="card-deck mb-3 text-center">
          
          
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">GIGA</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">49,000 TK. <small class="text-muted"></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>See Contact 50</li>
              <li>Unlimited Private Chat</li>
              <li>Express Interest 100</li>
              <li>Consultant (3-hr. Max)</li>
              <li>Validity 3 months</li>
            </ul>
            <button style="background-color: #029de2;
    border-color: #27a9e3;"  type="button" class="btn btn-lg btn-block btn-primary"  data-toggle="modal" data-target="#exampleModalLong1"> Read More</button>
          </div>
        </div>
        
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">LUXURY</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">89,000 TK. <small class="text-muted"></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>See Contact 100</li>
              <li>Unlimited Private Chat</li>
              <li>Express Interest 200</li>
              <li>Consultant (6-hr. Max)</li>
              <li>Validity 6 months</li>
            </ul>
            <button style="background-color: #029de2;
    border-color: #27a9e3;"  type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#exampleModalLong2"> Read More</button>
          </div>
        </div>
        
        
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">SUPREME</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">1,69000 TK. <small class="text-muted"></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>See Contact 200</li>
              <li>Unlimited Private Chat</li>
              <li>Express Interest 500</li>
              <li>Consultant (12-hr. Max)</li>
              <li>Validity 12 months</li>
            </ul>
            <button style="background-color: #029de2;
    border-color: #27a9e3;"  type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#exampleModalLong3"> Read More</button>
          </div>
        </div>
        
        
      </div>
    </div>






<!-- Modal 1-->
<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="
    font-family: Orbitron;
    color: #ffb848;
    font-size: 27px;
    width:100%;
    text-align: center;" class="modal-title" id="exampleModalLongTitle">GIGA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ol>
            <li>See Contacts 50</li>
            <li>Express Interest 100</li>
            <li>Consultant (3-hr. max)</li>
            <li>Club Membership (gold)</li>
            <li>Gold Club Member will be featured in Home page</li>
            <li>Got Gold Badge in Your Profile</li>
            <li>Enlisted in Featured Profiles</li>
            <li>Hand Picked Matches</li>
            <li>Unlimited Private Chat</li>
            <li>All Prenium Member got their matches by Email</li>
            <li>Got Notification By Mail</li>
            <li><del>Dedicated Profile Maneger</del></li>
            <li><del>Highlight Profile</del></li>
            <li>Validity 3 months</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<a href="payment.php?id=gold">-->
        <form action="" method="post">
        <input type="hidden" name="contact" value="50" />
        <input type="hidden" name="interest" value="100" />
        <input type="hidden" name="packID" value="62" />
        <input type="hidden" name="consult" value="3" />
        <button type="submit" class="btn btn-primary">Subscribe Now</button>
        </form>
        <!--</a>-->
      </div>
    </div>
  </div>
</div>
<!-- Modal 1-->





<!-- Modal 2-->
<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="font-family: Orbitron;
    color: plum;
    font-size: 27px;
    width:100%;
    text-align: center;" class="modal-title" id="exampleModalLongTitle">LUXURY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ol>
            <li>See Contacts 100</li>
            <li>Express Interest 200</li>
            <li>Consultant (6-hr. max)</li>
            <li>Club Membership (platinum)</li>
            <li>Got Gold Badge in Your Profile</li>
            <li>Hand Picked Matches</li>
            <li>Unlimited Private Chat</li>
            <li>All Prenium Member got their matches by Email</li>
            <li>Got Notification By Mail</li>
            <li>Dedicated Profile Maneger</li>
            <li><del>Enlisted in Featured Profiles</del></li>
            <li><del>Highlight Profile</del></li>
            <li>Validity 6 months</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<a href="payment.php?id=platinum">-->
        <form action="" method="post">
        <input type="hidden" name="contact" value="100" />
        <input type="hidden" name="interest" value="200" />
        <input type="hidden" name="packID" value="63" />
        <input type="hidden" name="consult" value="6" />
        <button type="submit" class="btn btn-primary">Subscribe Now</button>
        </form>
        <!--</a>-->
      </div>
    </div>
  </div>
</div>
<!-- Modal 2-->




<!-- Modal 3-->
<div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="font-family: Orbitron;
    color: #25bfd0;
    font-size: 27px;
    width:100%;
    text-align: center;" class="modal-title" id="exampleModalLongTitle"> SUPREME </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ol>
            <li>See Contacts 200</li>
            <li>Express Interest 500</li>
            <li>Consultant (12-hr. max)</li>
            <li>Club Membership (Elite)</li>
            <li>Got Elite Badge in Your Profile</li>
            <li>Hand Picked Matches</li>
            <li>Unlimited Private Chat</li>
            <li>All Prenium Member got their matches by Email</li>
            <li>Got Notification By Mail</li>
            <li>Dedicated Profile Maneger</li>
            <li>Highlight Profile</li>
            <li>Validity 12 months</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<a href="payment.php?id=elite">-->
        
        <?
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $contact = $_POST['contact'];
            $interest = $_POST['interest'];
            $packID = $_POST['packID'];
            $consult = $_POST['consult'];
            $expire = $_POST['expire'];
            
            
            if($contact="" || $interest="" || $contact="" || $interest=""){
                
                
            } else {
                
            $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
            $sql = "UPDATE tbldatingusermaster SET
            express_count = '$interest',
            packageid = '$packID',
            consultant = '$consult',
            expiredate = '$expire'
            where userid='$curruserid'";
            $result = $db->query($sql);
                if($result){
                    echo "<script>alert('Added Successfully')</script>";
                }
            }
        }
        ?>
        
        <form action="" method="post">
        <input type="hidden" name="contact" value="200" />
        <input type="hidden" name="interest" value="50" />
        <input type="hidden" name="packID" value="64" />
        <input type="hidden" name="consult" value="12" />
        <?
        $futureDate=date('Y-m-d', strtotime('+1 year'));
        ?>
        
        <input type="hidden" name="expire" value="<? echo $futureDate; ?>" />
        
    <script
    src="https://checkout.stripe.com/checkout.js"
    class="stripe-button"
    data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
    data-image="/square-image.png"
    data-name="Demo Site"
    data-description="2 widgets ($20.00)"
    data-amount="2000">
  </script>
        
    <!--<button type="submit" class="btn btn-primary">Subscribe Now</button>-->
        </form>
        <!--</a>-->
      </div>
    </div>
  </div>
</div>
<!-- Modal 3-->


                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
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