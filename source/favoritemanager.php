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
    <title>Favorite Manager :: Paroshi.com</title>
    <!-- Custom CSS -->
    <link href="assets1/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
    b {
       color: #ff6697;
    }
    b:hover {
       color: black;
    }
    figure img {
    width: 100%;
}
</style>

<script src="mechat/php/js.php" type="text/javascript"></script> 
<link rel="stylesheet" type="text/css" href="mechat/css/mechat.css">
<link rel="stylesheet" type="text/css" href="mechat/css/templates/developed.css">

<?
include('mechat/php/config.php'); // Load meChat PHP Configurations
include('mechat/php/functions.php');
if($_GET['uid']){
    meChat_Login($_GET['uid']);
    header("Location:dashboard.php");
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
                        <h4 class="page-title">All Favourite</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage Favourite</li>
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





      <?
        $pkgprice = getonefielddata("SELECT tbldatingpackagemaster.price from tbldatingpackagemaster,tbldatingusermaster WHERE tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND datediff(tbldatingusermaster.expiredate,curdate())>0 AND userid=".$curruserid);
	  ?>
	  






<div class="card">
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Profile</th>
                                            <th scope="col">Profile Details</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody class="customtable">
                                            
      <?
			$FileNm = $sitepath . "favoritemanager.php";
			if (isset($_GET["pgnm"]))
				$Pgnm = $_GET["pgnm"];
			else
				$Pgnm = 1;
				
			$fromqry = "from tbldatingshortlistmaster,tbldatingusermaster where tbldatingshortlistmaster.UserId=tbldatingusermaster.userid and  tbldatingshortlistmaster.CurrentStatus in (0,1) and tbldatingusermaster.currentstatus in (0,1) and tbldatingshortlistmaster.CreateBy=$curruserid 
			and tbldatingshortlistmaster.list_status='Y'
			order by ShortlistId DESC ";			
		$totalnorecord = getonefielddata( "select count(ShortlistId) $fromqry ");		
		$arrval = setpaging($Pgnm,$totalnorecord,$FileNm ."?",$favoritemngrltnext,$favoritemngrltback);
		$NoOfRecord = $arrval["NoOfRecord"];
		$BackStr = $arrval["BackStr"];
		$NextStr = $arrval["NextStr"];

		$result = getdata("select ShortlistId, name,date_format(tbldatingshortlistmaster.CreateDate,'$date_format'),tbldatingshortlistmaster.UserId,imagenm,concat(substr(name,1,1),'-',profile_code)," . findage() . ",religianid,castid,area,state,
city,countryid,sel_id,comment,heightid,maritalstatusid,educationid,ocupationid,tbldatingshortlistmaster.CurrentStatus 
$fromqry $NoOfRecord");
		while($rs= mysqli_fetch_array($result))
		{
		 $ShortlistId = $rs[0] ;
		 $name = findnameuser($rs[3]);
		 if ($rs[2] != "")
		 $CreateDate =$rs[2];
		 else
		 $CreateDate = "";
		 $UserId= $rs[3];
		 $imagenm = $rs[4];
		// $profile_code = $rs[5];
		$profile_code = display_profile_code($UserId);
		 $age = $rs[6];
		 $religianid= $rs[7];
		 if ($religianid != "")
		 	$religianid = getonefielddata("select title from tbldatingreligianmaster where id=$religianid");
		 $castid= $rs[8];
		 if ($castid != "")
		 	$castid = getonefielddata("select title from tbldatingcastmaster where id=$castid");
		 $area= $rs[9];
		 $state= $rs[10];
		 
		 if($rs[10]!=''  && $rs[10]!='0.0' && is_numeric($rs[10]) ){
			$state = getonefielddata("SELECT title from tbldating_state_master WHERE id=".$rs[10]);	 
		 } else {
			$state = '';	 
		 }		 
		 $city= $rs[11];
		 if($rs[11]!='' && $rs[11]!='0.0' && is_numeric($rs[11])){
		 	$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[11]);
		 } else {
			$city = '';	 
		 }	
		 $countryid= findcountryid($rs[12]);
		 $sel_id = $rs[13];
		 $comment = $rs[14];
		 $height = $rs['heightid'];
		 if($height != '' && is_numeric($height)){
			$con = " / ";
			$height = getonefielddata("select title from tbldatingheightmaster where id=$height and currentstatus=0");
			//$height = $con . $height;
			$height = $height;
		 }
		 $maritalstatus = $rs['maritalstatusid'];
		 if($maritalstatus!='' && is_numeric($maritalstatus)){
			$maritalstatus = getonefielddata("select title from tbldatingmaritalstatusmaster where id=$maritalstatus and currentstatus=0"); 
		 }
		 $educationid = $rs['educationid'];
		 if($educationid != '' && is_numeric($educationid)){
			$educationid = getonefielddata("select title from tbl_education_master where id=$educationid and currentstatus=0"); 
		 }
		 $occupationid = $rs['ocupationid'];
		 if($occupationid != '' && is_numeric($occupationid)){
			$occupationid = getonefielddata("select title from tbldatingoccupationmaster where id=$occupationid and currentstatus=0");		 	
		 }	 
		 $imagenm = find_user_image($UserId,"","","");
		 $CurrentStatus=$rs['CurrentStatus'];
			?>
      
      
      
      
      
      
      
    <tr>
      <td width="30%">
          <? if(enable_name_display=='Y' && $name != ''){ ?>
          <b><?= $name?></b><br><br>
           <? } ?>
          <?=setdisplayprofilelink($UserId,$imagenm) ?> <?= $CreateDate?>
      </td>
      <td>
          <? if($age!= '' ){ ?>
          <b>Age :</b> <?= $age ?> <?= $castid ?> <br>
          
          <? } if($height!= '' ){ ?>
          <b>Height :</b> <?= $height ?> <br>
          
          <? } if($maritalstatus != ''){?>
          <b>Marital Status :</b> <?= $maritalstatus ?> <br>
          
          <? } ?><? if($castid != ''){?>
          <b>Caste / Sec :</b> <?= $castid ?> <br>
          
          <? } ?><? if($religianid != ''){?>
          <b>Religion  :</b> <?= $religianid ?> <br>
          <? } ?>
          
          <? if($city != ''){ ?>
          <b>City  :</b> <?= $city ?> <br>
          
          <? } ?><? if($countryid != ''){?>
          <b>Country :</b> <?= $countryid ?> <br>
          
          <? } ?><? if($educationid != ''){?>
          <b>Education  :</b> <?= $educationid ?> <br>
          
          <? } ?><? if($occupationid != ''){?>
          <b>Occupation  :</b> <?= $occupationid ?> <br>
          <? } ?>
          
      </td>
      <td>
          <a href="<?=$sitepath?>displayprofile.php?b=<?=$UserId?>"><b><i class="fas fa-user"></i> Display Profile</b></a><br><br>
          
            <? if(enable_communication=='Y' && $pkgprice>0 ){ ?>
               <?
				}if(enable_communication=='Y'){
               ?>
          <a onclick="send_contactreq(<?= $UserId ?>);" href="javascript:void(0);" 
                    data-toggle="modal" data-target="#myModal"><b><i class="fas fa-phone"></i> Contact Details</b></a><br><br>
           <? } ?>
          
          <a href="<?= $sitepath ?>favoritedelete.php?b=<?= $ShortlistId?>"><b><i class="far fa-trash-alt"></i> Remove</b></a><br><br>
          
          <? if($CurrentStatus==0){?>
          <a href="javascript:void(0)" onclick="notify_send(13,<?=$UserId?>);"><b><i class="fas fa-lock"></i> <?=$notify_block?></b></a>
          <? }?>
          <? if($CurrentStatus==1){?> 
          <a href="javascript:void(0)" onclick="notify_send(14,<?=$UserId?>);"><b><i class="fas fa-lock"></i> <?=$notify_unblock?></b></a>
          <? }?>
      </td>
    </tr>
    
    
    
    
    
    <!-- 
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    -->
    
    
    
    
 <div class="UpgradePopupAll modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog animated">    
      <!-- Modal content-->
      <div class="modal-content">
      <button type="button" class="close" id="close_contact_popup" data-dismiss="modal">&times;</button>           
          <div class="modal-body" id="show_contact_info" style="display:none">                 
          </div>      
      </div>
  </div>
</div>   
    
    
    
    
    
    
    		<?
			}
				freeingresult($result);
			?>
    
                                            
                                        </tbody>
                                    </table>
                                </div>
                        </div>






                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
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
    
    <script type="text/javascript">
                                
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
                            var fail_msg = data.split("fail_");
                            error_notify_add('notify_warning',fail_msg[1],'','');
                            error_notify_remove('notify_warning',5000);
                        }
                        var find_suc = data.search("sucess_");
                        if(find_suc>0)
                        {
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
                                var fail_msg = data.split("fail_");
                                error_notify_add('notify_warning',fail_msg[1],'','');
                                error_notify_remove('notify_warning',5000);
                            }
                            var find_suc = data.search("sucess_");
                            if(find_suc>0)
                            {
                                var suc_msg = data.split("sucess_");
                                error_notify_add('notify_info',suc_msg[1],'','');
                                error_notify_remove('notify_info',5000);
                            }
                        }
                }
                });	
        }
    </script>
    
    
    
    
    
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