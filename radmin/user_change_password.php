<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$updatepersonalprofiledprofileselect='';
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
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
$staff_agentid = 0;

$result = getdata("select name,email,password,day(dob),month(dob),year(dob),genderid,admin_disable_address_phone_no,packageid,day(expiredate),month(expiredate),year(expiredate),country_code,mobile,landline,city_code,staff_agentid from tbldatingusermaster where userid=$uid");
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
	$country_code = $rs[12];
	$mobile = $rs[13];
	$landline = $rs[14];
	$city_code = $rs[15];
	$staff_agentid = $rs[16];
	if ($rs[7] == "Y")
		$admin_disable_address_phone_no="checked";
	else
		$admin_disable_address_phone_no="";
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
			<h1 class="pagetitle">Change Password</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
               <div class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="user_change_password_submit.php?b=<?= $uid ?>"  class="form-horizontal">
		<div class="form-group text-form">
        <label>name :</label>
              <b><?= $name ?></b>
              </div>
		<div class="form-group singleline_class">
        <div class="widhtsetr">
        <label>email :</label>
			 <input type="text" name="email"  class="form-control" size=35  value="<?= $email ?>" >
              </div>
    
           <div class="widhtsetr "><label>new password :</label>
              <input type="text" name="new_password"  class="form-control" size=35  value="<?= $password ?>">
              </div>
              <div class="widhtsetr  control-label_25">
           <label>gender :</label>
			<select name='gender' class="form-control" >
<? fillcombo("select genderid,gender from tbldatingendermaster where currentstatus=0 order by gender ","$genderid",""); ?>
</select>
              </div>
              </div>
		  
          
           
             

 <div class="form-group singleline_class three_section">

 <label>birth date :</label>
  <div class="widhtsetr">
			<select name="dobdd" class="form-control"><? fillnumdata(1,31,$updatepersonalprofiledprofileselect,"$dob_dd") ?></select>
       </div>
         <div class="widhtsetr  ">     
<select name="dobmm" class="form-control"><? fillnumdata(1,12,$updatepersonalprofiledprofileselect,"$dob_mm","Y") ?> </select>
</div>
  <div class="widhtsetr  control-label_25">
  
<select name="dobyy" class="form-control"><? fillnumdata(date("Y")-100,date("Y")-18,$updatepersonalprofiledprofileselect,"$dob_yy") ?>
</select>
</select>
              </div>
              </div>
          
<div class="form-group two_section">
<label>Mobile :</label>
<div class="widhtsetr">
				<input type="text" name="country_code"  class="form-control" size=6  value="<?=$country_code ?>">
                </div>
                <div class="widhtsetr  control-label_25">
                <input type="text" name="mobile"  class="form-control" size=35  value="<?=$mobile?>">
              </div>
          </div>
          <div class="form-group two_section">
          <label>Phone :</label>
          <div class="widhtsetr">
				<input type="text" name="city_code"  class="form-control" size=6  value="<?=$city_code ?>">
                </div>
                <div class="widhtsetr  control-label_25">
                <input type="text" name="landline"  class="form-control" size=35  value="<?=$landline?>">
              </div>
              </div>
          
		  

<div class="form-group">
<div class="widhtsetr">
<label>disable display phone number address :</label>

<input type="checkbox" name="chk_display_phone_address" <?= $admin_disable_address_phone_no ?> value="Y">
</div>


<div class="widhtsetr  control-label_25">
<label>Employee :</label>
			<select name='employeeid' id="employeeid" class="form-control" style="">
			<? 
							fillcombo("SELECT loginid,username from tbldatingadminloginmaster,tbl_employee_role_setting WHERE tbldatingadminloginmaster.emp_role_id=tbl_employee_role_setting.role_id AND tbl_employee_role_setting.mydesk_access='Y' AND loginid!=1 ",$staff_agentid,"Select");
							?>
</select>
              </div>
              </div>

<?php /*?><tr valign="top">
<div class="form-group"><div class="widhtsetr  control-label_25"><label>membership package :</th>
<td  >
<select name='membership_package' class="form" style="width:207px">
<? fillcombo("select PackageId, Description from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=$packagetypeid and PackageId <> 1","$packageid",""); ?>
</select>
              </div>
		  
		  <div class="form-group"><div class="widhtsetr  control-label_25"><label>membership expiry date :</label>
			<select name="membership_dd" class="form"><? fillnumdata(1,31,$updatepersonalprofiledprofileselect,"$membership_dd") ?></select>
<select name="membership_mm" class="form"><? fillnumdata(1,12,$updatepersonalprofiledprofileselect,"$membership_mm","Y") ?> </select>
<select name="membership_yy" class="form"><? fillnumdata(date("Y")-5,date("Y")+10,$updatepersonalprofiledprofileselect,"$membership_yy") ?>
</select>
              </div>

<tr valign="top">
<div class="form-group"><div class="widhtsetr  control-label_25"><label>trust seal package :</th>
<td  >
<select name='trustsealpackage' class="form" style="width:207px">
<? fillcombo("select PackageId, Description,Price,Days,display_price,display_price_curr_code from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=4 and PackageId <> 1 ","$trustsealpackageid","select"); ?>
</select>
              </div>
		  
		  <div class="form-group"><div class="widhtsetr  control-label_25"><label>trust seal expiry date :</label>
			<select name="trustseal_dd" class="form"><? fillnumdata(1,31,$updatepersonalprofiledprofileselect,"$trustseal_dd") ?></select>
<select name="trustseal_mm" class="form"><? fillnumdata(1,12,$updatepersonalprofiledprofileselect,"$trustseal_mm","Y") ?> </select>
<select name="trustseal_yy" class="form"><? fillnumdata(date("Y")-5,date("Y")+10,$updatepersonalprofiledprofileselect,"$trustseal_yy") ?>
</select>
              </div><?php */?>
		  
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
