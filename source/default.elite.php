<? include_once("commonfile.php");
//checklogin($sitepath);
$packageid = "";
$expiredate = "";
$packagename = "";
$expdays ="";
if (isset($_GET["disp_enh"]))
	$disp_enh=$_GET["disp_enh"];
else
	$disp_enh="Y";

if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
	$curruserid = $_SESSION[$session_name_initital."memberuserid"];	
}/*else{
die("<script>window.location = 'login.php'</script>");	
}*/



if ($curruserid != "")
{
	$result = getdata("select tbldatingusermaster.packageid,date_format(expiredate,'$date_format'),Description,to_days(expiredate)-to_days(curdate()) from tbldatingusermaster,tbldatingpackagemaster where  tbldatingusermaster.packageid=tbldatingpackagemaster.PackageId and userid=$curruserid");
	while($rs= mysqli_fetch_array($result))
	{
		$packageid = $rs[0];
		$expiredate = $rs[1];
		$packagename = $rs[2];
		$expdays  = $rs[3];		
	}
		freeingresult($result);
}

if ($packageid == "")
	$packageid = 1;
if ($packageid == 1) {
	$packagetypeid = 1;
} else {
	$packagetypeid = 2;
	$chkrenewalpackages = getonefielddata("SELECT count(packageid) from tbldatingpackagemaster WHERE packagetypeid=2 AND currentstatus=0");
	if($chkrenewalpackages==0){
		$packagetypeid = 1;
	}
}
$payment_terms = findsettingvalue("payment_Terms");
$curr  = findsettingvalue("CurrencySymbol");
//for sms package details start
//echo "SELECT sms_exp_date, sms_package_id from tbldatingusermaster WHERE userid=$curruserid";
$sms_pkg_nm = "";
if($curruserid!=""){
$sms_pkg_details = getdata("SELECT sms_exp_date, sms_package_id from tbldatingusermaster WHERE userid=$curruserid");
$rs_sms_pkg = mysqli_fetch_array($sms_pkg_details);
$sms_exp_date = $rs_sms_pkg['sms_exp_date'];
$sms_package_id = $rs_sms_pkg['sms_package_id'];
if($sms_package_id != ""){
	$sms_pkg_nm = getonefielddata("SELECT Description from tbldatingpackagemaster WHERE PackageId=".$sms_package_id);
} else {
	$sms_pkg_nm = "";
}
}
//for sms package details end
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_elite")?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script language="javascript" type="text/javascript">
function enable_more(spanid){
	
	if(document.getElementById(spanid).style.display = 'none'){
		document.getElementById(spanid).style.display = 'inline';
	} else {
		alert(document.getElementById(spanid).style.display);
		document.getElementById(spanid).style.display = 'none';
	}
}
function getprice(id,pkgid){	
if(document.getElementById(id).checked==true){
		$.post("getprice.php",{
			pkgid:pkgid	
		}, function (data){
			//alert(data)
			$("#ppkgprice").html(data);
			$('#newmembershippackage').val(pkgid);
			//alert(data);	
		})	
	}
}
</script>

<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<?
		if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
		 include("plugin.elite.php");		 
		}else{?>
		 <div class="google_images google_images1 packege_banner_section">
 <? 

	 $select = getdata("select title,pagenm,link,description from tbl_homepage_images where pagenm=7"); 
	while($row = mysqli_fetch_array($select))
	{
		$title = $row[0];
		$description = $row[3];
		$description1 =  substr($description,0,800);
	    $link = $row[2];
		?>
  
    <img src="<?= $sitepath ?>uploadfiles/<?="site_".$sitethemefolder?>/<?=$title?>" />
     
      <bannertext>
     <? if($description!= ''){ ?>    <p><?=$description?></p><? }?>
     
	<? if($link!= ''){ ?>
    <span><a href="<?=$link?>">Click Here to Login</a></span><? }?>
    </bannertext>
        <?
	}
	
	 ?>
        </div>  
        <?
		}
		?>
    </div>
    </div>
    
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Dancing+Script:400,700');
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,500');
/*font-family: 'Dancing Script', cursive;
font-family: 'Montserrat', sans-serif;
*/
.wrapper_about{
	background-color:#ececec;
}
.container{
	max-width:1920px;
}
.member-hg-profile{
	float:left;
	width:100%;
}
.hg-banner{
	float:left;
	width:100%;
}
.hg-banner img{
	float:left;
	width:100%;
	max-height:550px;
}
.content-wrap{
	width:600px;
	margin:0 auto;
}
.text-containt{
	float:left;
	width:100%;
	background-color:rgba(180,155,116,0.75);
	margin-top: -265px;
    text-align: center;
	padding:15px;
}
.content-wrap h3{
	color:#fff;
	font-size:46px;
	margin-bottom:15px;
	font-family: 'Dancing Script', cursive
}
.content-wrap p{
	color:#fff;
	font-size:17px;
	line-height:28px;
	font-family: 'Montserrat', sans-serif;
}
.icon-colom{
	float:left;
	width:100%;
	margin:40px 0;
}
.vip-grid{
	width: 320px;
    display: inline-block;
    background-color: #FFF;
    padding: 15px;
	border: 1px solid #ddd;
}

.vip-grid h4{
	color: #858585;
    float: left;
    width: 100%;
    margin: 10px 0;
    font-weight: 500;
	font-family: 'Montserrat', sans-serif;
	    text-transform: uppercase;
}
.vip-grid p{
	    color: #909090;
    line-height: 24px;
    font-weight: 300;
}
.vip-grid img{
	background-color: #f18872;
    border-radius: 50%;
}
.icon-colom .text-center:nth-child(2) .vip-grid img{
	background-color:#2e77bb;
}
.icon-colom .text-center:nth-child(3) .vip-grid img{
	background-color:#49b8a5;
}
.connected{
float: left;
    width: 64%;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin: 0 18% 28px;
    text-align: center;
}
.buy-left{
	width:100%;
	float:left;
	text-align:left
}
.buy-left h4{
	width: 100%;
    float: left;
    font-size: 23px;
    color: #b59067;
    font-weight: 600;
}
.buy-left p{
	width:100%;
	float:left;
	font-size:20px;
	    padding: 6px 0;
}
.buy-left .col-sm-9{
	border-right: 1px solid #ddd;
}
.connected .btn{
	border: 0;
    outline: none;
    font-size: 18px;
    border-radius: 5px;
	float:left;
}
.connected .buy-right{
	float: right;
    padding: 5px 30px;
    font-size: 24px;
    border-radius: 30px;
	margin-top: 10%;
}
</style>    
    
    
    


    

<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>