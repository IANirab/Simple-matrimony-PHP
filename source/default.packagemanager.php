<? include_once("commonfile.php");
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
<head><?=findsettingvalue("seo_package_manager")?>
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







<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">







</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    <? if(isset($_SESSION[$session_name_initital."memberuserid"]) && 
	$_SESSION[$session_name_initital."memberuserid"]!=''){ 
	if(findsettingvalue("package_view_login")=='Y')
	{ 
		header("location:userpackagemanager.php");
	}
	?>
   <? }else{ ?>      
  <?php /*?> <div class="login_membership">
         <div class="send_frnd">
<div class="sendtofriend" align="center" >
Kindly 
<button type="button" class="sfbtn" data-toggle="modal" data-target="#myModal_new" 
  onclick="change_url()">Login</button>
 to view full profile.
</div>
</div>

<script>
function change_url()
{
		document.getElementById("url1").value = "packagemanager.php";
}
</script>



<div class="container">

  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal_new" role="dialog">
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <? include("login_popup1.php");?>
          </div>
           
      </div>
      
    </div>
  </div>
  
</div>


         </div><?php */?>
         <?
         if(findsettingvalue("package_view_login")=='N')
		{	 include("plugin.packagemanager.php");
		 ?>
         <? }else{?>
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
        <? } ?>
   <? } ?>

        
    </div>
</div>
</div>


<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>

</body>
</html>