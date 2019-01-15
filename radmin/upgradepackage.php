<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$trustsealpackageid = '';
$trustseal_dd='';
$trustseal_mm = '';
$trustseal_yy = '';
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){
	$user_mnager_um_4 = user_mnager_um_4();
} else {
	$user_mnager_um_4 = "N";
}
if($user_mnager_um_4 == 'Y' || $user_mnager_um_4 == 'N') {
if ((isset($_GET["b"]))&& ($_GET["b"] != "") && (is_numeric($_GET["b"])))
	$uid = $_GET["b"];
else
	$uid = 0;
	$updatepersonalprofiledprofileselect  ='';
$result = getdata("select name,email,password,day(dob),month(dob),year(dob),genderid,admin_disable_address_phone_no,packageid,day(expiredate),month(expiredate),year(expiredate) from tbldatingusermaster where userid=$uid");
while($rs= mysqli_fetch_array($result))
{
	$name=$rs[0];
	$email=$rs[1];
	$password=$rs[2];
	$dob_dd=$rs[3];
	$dob_mm=$rs[4];
	$dob_yy=$rs[5];
	$genderid=$rs[6];
	$packageid = $rs[8];	
	$membership_dd = $rs[9];
	$membership_mm = $rs[10];
	$membership_yy = $rs[11];
	if ($rs[7] == "Y"){
		$admin_disable_address_phone_no="checked";
	} else {
		$admin_disable_address_phone_no="";
	}
}
if ($packageid == 1)
	$packagetypeid = 1;
else
	$packagetypeid = 2;
	
freeingresult($result);	
$result = getdata("select 
packageid,day(expiredate),month(expiredate),year(expiredate) from tbldatingusertrustsealmaster where userid=$uid and currentstatus=0");
while($rs= mysqli_fetch_array($result))
{
$trustsealpackageid=$rs[0];
$trustseal_dd=$rs[1];
$trustseal_mm=$rs[2];
$trustseal_yy=$rs[3];
}
freeingresult($result);	
/*  */

?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
<div class="pagewrapper">
	<div class="container">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">Change Password</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="upgradepackageinsert.php?b=<?= $uid ?>" class="form-horizontal">
      
		<?php /*?><tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>name :</th>
            <td <?= admintdclass ?>>
              <?= $name ?>
              </td>
          </tr>
		<tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>email :</th>
            <td <?= admintdclass ?>>
			 <input type="text" name="email" <?= admininputclass ?> size=35  value="<?= $email ?>">
              </td>
          </tr>
    
           <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>new password :</th>
            <td <?= admintdclass ?>>
              <input type="text" name="new_password" <?= admininputclass ?> size=35  value="<?= $password ?>">
              </td>
          </tr>
		  
           <tr valign="top">
          <th scope="row" width="30%" <?= adminthclass ?>>gender :</th>
            <td <?= admintdclass ?>>
			<select name='gender' class="form" style="width:207px">
<? fillcombo("select genderid,gender from tbldatingendermaster where currentstatus=0 order by gender ","$genderid",""); ?>
</select>

              </td>
          </tr>

 <tr valign="top">
          <th scope="row" width="30%" <?= adminthclass ?>>birth date :</th>
            <td <?= admintdclass ?>>
			<select name="dobdd" class="form"><? fillnumdata(1,31,$updatepersonalprofiledprofileselect,"$dob_dd") ?></select>
<select name="dobmm" class="form"><? fillnumdata(1,12,$updatepersonalprofiledprofileselect,"$dob_mm","Y") ?> </select>
<select name="dobyy" class="form"><? fillnumdata(date("Y")-100,date("Y")-18,$updatepersonalprofiledprofileselect,"$dob_yy") ?>
</select>
              </td>
          </tr>
		  
<tr valign="top">
<th scope="row" width="30%" <?= adminthclass ?>>disable display phone number address :</th>
<td <?= admintdclass ?>>
<input type="checkbox" name="chk_display_phone_address" <?= $admin_disable_address_phone_no ?> value="Y">
</td>
</tr><?php */?>
 <div class="form-group"><label>membership package</label>
<? if($sitethemefolder=="cometomarryme"){ ?>
<select name='membership_package' class="form-control" >
<? fillcombo("select PackageId, Description from tbldatingpackagemaster where CurrentStatus=0 and main_package_typeid IN (1,2)","$packageid",""); ?>
<?php /*?><? fillcombo("select PackageId, Description from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId IN (1,2) and PackageId <> 1","$packageid",""); ?><?php */?>
</select>
<? } else { ?>
<select name='membership_package' class="form-control">
<? fillcombo("select PackageId, Description from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=$packagetypeid","$packageid",""); ?>
<?php /*?><? fillcombo("select PackageId, Description from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId IN (1,2) and PackageId <> 1","$packageid",""); ?><?php */?>
</select>
<? } ?>
<note>
	If member's existing package is free then membership packages will be shown else renewal package will be shown.</note>
              </div>
		  
		  <div class="form-group singleline_class"> 
          <label>membership expiry date</label>
      <div class="widhtsetr">
            
			<select name="membership_dd" class="form-control"><? fillnumdata(1,31,$updatepersonalprofiledprofileselect,"$membership_dd") ?></select>
            </div>
                <div class="widhtsetr">
<select name="membership_mm" class="form-control"><? fillnumdata(1,12,$updatepersonalprofiledprofileselect,"$membership_mm","Y") ?> </select>
</div>
    <div class="widhtsetr control-label_25">
<select name="membership_yy" class="form-control"><? fillnumdata(date("Y")-5,date("Y")+10,$updatepersonalprofiledprofileselect,"$membership_yy") ?>
</select>
</div>
              </div>
<div class="form-group"><label>trust seal package </label>
<select name='trustsealpackage' class="form-control" >
<? fillcombo("select PackageId, Description,Price,Days,display_price,display_price_curr_code from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=4 and PackageId <> 1 ","$trustsealpackageid","select"); ?>
</select>
              </div>
		  
		  <div class="form-group singleline_class"> 
          <label>trust seal expiry date </label>
           <div class="widhtsetr">
			<select name="trustseal_dd" class="form-control"><? fillnumdata(1,31,$updatepersonalprofiledprofileselect,"$trustseal_dd") ?></select>
            </div>
              <div class="widhtsetr">
<select name="trustseal_mm" class="form-control"><? fillnumdata(1,12,$updatepersonalprofiledprofileselect,"$trustseal_mm","Y") ?> </select>
</div>
    <div class="widhtsetr control-label_25">
<select name="trustseal_yy" class="form-control"><? fillnumdata(date("Y")-5,date("Y")+10,$updatepersonalprofiledprofileselect,"$trustseal_yy") ?>
</select>
</div>
              </div>
		  
         <div class="form-group common_button">
         <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $passwordchange_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	</div>
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>
<? } else { 
	header("location:dashboard.php?msg=no");
	exit;
}	
?>