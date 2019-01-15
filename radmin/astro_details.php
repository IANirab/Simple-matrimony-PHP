<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];

if ((isset($_GET["b"]))&& ($_GET["b"] != "") && (is_numeric($_GET["b"])))
	$uid = $_GET["b"];
else
	$uid = 0;
$selectt_data= getdata("select day(dob) as day,month(dob) as month,year(dob) as year,txtbirthtime_second,txtbirthtime_hour,txtbirthtime_am_pm,genderid,name,birthplace,countryofbirth,Latitude,Longitude from  tbldatingusermaster where userid='".$uid."'");
while($row = mysqli_fetch_array($selectt_data))
{
	$code= display_profile_code($uid);
	$day =$row['day'];
	$month = $row['month'];
	$year = $row['year'];
	$txtbirthtime_second = $row['txtbirthtime_second'];
	$txtbirthtime_hour = $row['txtbirthtime_hour'];
	$txtbirthtime_am_pm = $row['txtbirthtime_am_pm'];
	$Latitude = $row['Latitude'];
	$Longitude = $row['Longitude'];
	
//day(dob),month(dob),year(dob)
	$genderid = $row['genderid'];
	if($genderid==1)
	{
		$gender = "male";
	}
	else if($genderid==2)
	{
		$gender ="female";
	}
	$name = $row['name'];
	$birthplace = $row['birthplace'];
	$countryofbirth = $row['countryofbirth'];
	$country ='';
	if($countryofbirth!='')
	{
		$country = getonefielddata("select title from tbldatingcountrymaster where id='".$countryofbirth."' ");
	}
	else
	{
		$country ='';
	}
}

?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">
<div align="center" id="pagealign">
<div align="center" id="container">
<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
	<div id="content-wrap">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div id="center">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<div id="pagetitle"><h1>AStro Details</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
    
      <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">
		<tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Userid :</th>
            <td <?= admintdclass ?>>
              <?= $uid ?>
              </td>
          </tr>
          <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Name :</th>
            <td <?= admintdclass ?>>
              <?= $name ?>
              </td>
          </tr>
          <? if($day!='') { ?>
          <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Birth Date :</th>
            <td <?= admintdclass ?>>
              <?= $day ?>
              </td>
          </tr>
          <? } 
		  if($month!='') {
		  ?>
          
          <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Birth Month :</th>
            <td <?= admintdclass ?>>
              <?= $month ?>
              </td>
          </tr>
          <? } 
		  if($year!='') {
		  ?>
           <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Birth Year :</th>
            <td <?= admintdclass ?>>
              <?= $year ?>
              </td>
              </tr>
              <? } 
		  if($txtbirthtime_hour!='') {
		  ?>
              
              <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Hour :</th>
            <td <?= admintdclass ?>>
              <?= $txtbirthtime_hour ?>
              </td>
              </tr>
           
            <? } 
		  if($txtbirthtime_second!='') {
		  ?>
             
              
              <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Minute :</th>
            <td <?= admintdclass ?>>
              <?= $txtbirthtime_second." ".$txtbirthtime_am_pm ?> 
              </td>
              </tr>
              
              <? } 
		  if($Latitude!='') {
		  ?>
               <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Latitude :</th>
            <td <?= admintdclass ?>>
              <?= $Latitude; ?> 
              </td>
              </tr>
               <? } 
		  if($Longitude!='') {
		  ?>
               <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Longitude :</th>
            <td <?= admintdclass ?>>
              <?= $Longitude; ?> 
              </td>
              </tr>
                  <? } 
		  if($birthplace!='') {
		  ?>
            
              <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Birthplace :</th>
            <td <?= admintdclass ?>>
              <?= $birthplace; ?> 
              </td>
              </tr>
              <? } 
		  if($country!='') {
		  ?>
            
              
                <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>country :</th>
            <td <?= admintdclass ?>>
              <?= $country; ?> 
              </td>
              </tr>
              <? } ?>
		
      </table>
       
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $passwordchange_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>