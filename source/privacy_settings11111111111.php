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
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets1/images/logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="assets1/images/logo-text.png" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
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
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="chat.php" id="2"> <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
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
                                <a class="dropdown-item" href="<?= $sitepath ?>updateprofilepersonal.php"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
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
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
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
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="https://www.paroshi.com/packagemanager.php" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Membership </span></a></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="album.php?b=<?= $curruserid?>" aria-expanded="false"><i class="far fa-images"></i><span class="hide-menu"> Galary </span></a></li>
                        
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
                        <h4 class="page-title">ACCOUNT SETTING</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ACCOUNT SETTING</li>
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

if(isset($_GET['t']) && $_GET['t']!=''){
	
	$tabtype=$_GET['t'];
	
	if($tabtype==1){
		
		$privasylink='active';
		
		$changepasswordlink='';
		
		$packagedetailslink='';
		
		$message = $messageerrmess86;
	
	}else if($tabtype==2){
		
	
		$privasylink='';
		
		$changepasswordlink='active';
		
		$packagedetailslink='';
		
		$message = $messageerrmess16;
	
	}else {
		
		
		$privasylink='';
		
		$changepasswordlink='';
		
		$packagedetailslink='active';
		
		$message = '';
	}
	
	
	
}else{

$tabtype='';

$privasylink='active';

$changepasswordlink='';

$packagedetailslink='';
	
$message = '';	
}




if(isset($_GET['v']) && $_GET['v']=='1'){
$vmessages='block';	
}else{
$vmessages='none';	
}

?>
                       
<div class="card">
                            <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"> Privacy Settings </span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"> Change password </span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"> Package Details </span></a> </li>
                    </ul>
                            <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active show" id="home" role="tabpanel">
                        <div class="row">
                        <div class="col-md-6" data-select2-id="16">  
                        
                        
                        
                <form action="" method="post">
            <?
        $chk_m = '';
        $chk_w = '';
        $chk_n = '';
        if($sendmeemail=='M'){
            $chk_m = 'checked="checked"';	
        } else if($sendmeemail=='W'){
            $chk_w = 'checked="checked"';
        } else if($sendmeemail=='N'){
            $chk_n = 'checked="checked"';
        }
        $req_y = '';
        $req_n = '';
        if($imgreq=='Y'){
            $req_y = 'checked="checked"';
        }
        if($imgreq=='N'){
            $req_n = 'checked="checked"';
        }
        $view_n = '';
        $view_r = '';
        $view_p = '';
        $view_a = '';
        if($profileiviewd=='N'){
            $view_n = 'checked="checked"';	
        }
        if($profileiviewd=='R'){
            $view_r = 'checked="checked"';
        }
        if($profileiviewd=='P'){
            $view_p = 'checked="checked"';	
        }
        if($profileiviewd=='A'){
            $view_a = 'checked="checked"';	
        }
        $con_y = '';
        $con_n = 'checked="checked"';
        $email_y = '';
        $email_n = 'checked="checked"';
        if($privateemail=='Y'){
            $email_y = 'checked="checked"';
            $email_n = '';		
        }
        if($privatecontact=='Y'){
            $con_y = 'checked="checked"';
            $con_n = '';			
        }
        ?>
                            <div class="container">
                                <br>
                                <br>
                                <h4 style="text-align:center;">PRIVACY SETTING</h4>
                                <hr>




  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0"> <?= $privacypartnermatchemail ?> :</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="partner_email" id="gridRadios1" value="M" <?=$chk_m?> >
          <label class="form-check-label" for="gridRadios1">
            <?= $privacymonthly ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="partner_email" id="gridRadios2" value="W" <?=$chk_w?> >
          <label class="form-check-label" for="gridRadios2">
            <?= $privacyweekly ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="partner_email" id="gridRadios3" value="N" <?=$chk_n?> >
          <label class="form-check-label" for="gridRadios3">
            <?= $privacydontknow ?>
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  
  
    <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0"><?= $privacyprofileviewedby ?> : </legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="profileviewdby" id="gridRadios1" value="R" <?=$view_r?>>
          <label class="form-check-label" for="gridRadios1">
            <?= $privacyregistered ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="profileviewdby" id="gridRadios2" value="A" <?=$view_a?> >
          <label class="form-check-label" for="gridRadios2">
            <?= $privacyallusers ?>
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  
  
  
  
  
    <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            First radio
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Second radio
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
          <label class="form-check-label" for="gridRadios3">
            Third disabled radio
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  
  
  
  
    <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            First radio
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Second radio
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
          <label class="form-check-label" for="gridRadios3">
            Third disabled radio
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  
  
  
  
  
  

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
                                
                                
                        </form>
                        
                        
                        </div>
                        </div>
                        </div>
                        
                    </div>
                        <div class="tab-pane p-20" id="profile" role="tabpanel">
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            </div>
                    <div class="tab-pane p-20" id="messages" role="tabpanel">
                        <div class="p-20">

                    </div>
                </div>
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
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
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