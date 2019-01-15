<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$Description = "";	
$PackageTypeId =0;	
$Price = "";	
$Days = "";	
$display_price = "";	
$display_price_curr_code = "";	

$formattypeid =0;	

$languageid= 0;
$templateid = 0;
$locationid = 0;
$no_of_contact_display = "";
$sms_qty = "";
$default_type = "";
$allow_messanger = "";
$main_packagetypeid = "";
			
$filename ="packageinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$pkg_mgmnt_pm_1 = pkg_mgmnt_pm_1();
	$pkg_mgmnt_pm_2 = pkg_mgmnt_pm_2();
	$pkg_mgmnt_pm_4 = pkg_mgmnt_pm_4();
	$pkg_mgmnt_pm_5 = pkg_mgmnt_pm_5();
} else {	
	$pkg_mgmnt_pm_1 = "N";
	$pkg_mgmnt_pm_2 = "N";
	$pkg_mgmnt_pm_4 = "N";
	$pkg_mgmnt_pm_5 = "N";
}
if($pkg_mgmnt_pm_1 == 'Y' || $pkg_mgmnt_pm_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select Description,PackageTypeId,Price,Days,formattypeid ,display_price,display_price_curr_code,no_of_contact_display, sms_qty,default_type,allow_messenger,main_package_typeid from tbldatingpackagemaster where CurrentStatus =0 and PackageId=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$Description = $rs[0];
		$PackageTypeId = $rs[1];
		$Price= $rs[2];
		$Days = $rs[3];
		$formattypeid = $rs[4];
		$display_price = $rs[5];
		$display_price_curr_code= $rs[6];
		$no_of_contact_display = $rs[7];
		$sms_qty = $rs['sms_qty'];
		$default_type = $rs['default_type'];
		$allow_messanger = $rs['allow_messenger'];
		$main_package_typeid = $rs['main_package_typeid'];
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript src='../scripts/innovaeditor.js'></script>
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
			<div id="pagetitle"><h1>Add Package</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($pkg_mgmnt_pm_2 == 'Y' || $pkg_mgmnt_pm_2 == 'N') { ?>
<form name=frmdocument method=post action ="<?=$filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data">
      <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">
      <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Main Package Type :</th>
            <td <?= admintdclass ?>>              
            	<select name="main_package_typeid" id="main_package_typeid" <?= admindropdownclass ?>>
                	<? fillcombo("SELECT id,title from tbl_main_package_type_master WHERE currentstatus=0",$main_package_typeid,"Select"); ?>
                </select>			  
              </td>
          </tr>
	  <tr valign="top">
          <th scope="row" width="30%" <?=adminthclass ?>>title :</th>
          <td <?= admintdclass ?>>              
            <textarea name="txttitle" rows="8" cols="30" <?= admininputclass ?>><?= $Description ?></textarea>
          </td>
      </tr>
	<tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>package type :</th>
            <td <?= admintdclass ?>>
              <select name="cmbpackagetype" <?= admindropdownclass ?>>
<? fillcombo("select PackageTypeId,Description from tbldatingpackagetypemaster where CurrentStatus=0 order by Description ",$PackageTypeId,""); ?>
</select>
              </td>
          </tr>
		   <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>price :</th>
            <td <?= admintdclass ?>>
              <input type="text" name="txtprice" <?= admininputclass ?> value="<?= $Price ?>">&nbsp;this price will use in payment
              </td>
          </tr>
		  <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>display price :</th>
            <td <?= admintdclass ?>>
              <input type="text" name="display_price" <?= admininputclass ?> value="<?= $display_price ?>">&nbsp;this price is only for display purpose
              </td>
          </tr>
		  
		  <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>display price currancy code :</th>
            <td <?= admintdclass ?>>
              <input type="text" name="display_price_curr_code" <?= admininputclass ?> value="<?= $display_price_curr_code ?>">
              </td>
          </tr>
		
		
		   <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>days :</th>
            <td <?= admintdclass ?>>
              <input type="text" name="txtdays" <?= admininputclass ?> value="<?= $Days ?>">&nbsp;not for manyata seal package
              </td>
          </tr>
		  
		   <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>No. of SMS :</th>
            <td <?= admintdclass ?>>
              <input type="text" name="sms_qty" <?= admininputclass ?> value="<?= $sms_qty?>">&nbsp;Only for SMS Package
              </td>
          </tr>
		  
	     <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>&nbsp;max no of profile's contact detail can view</th>
            <td <?= admintdclass ?>>
			<input type="text" name="no_of_contact_display" <?= admininputclass ?> value="<?= $no_of_contact_display ?>">&nbsp;used for only membership and membership renew packages.
              </td>
          </tr>		
		
		  <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>format :</th>
            <td <?= admintdclass ?>>
              <select name="cmbformat" <?= admindropdownclass ?>>
<? fillcombo("select FormatTypeId,Description from tbldatingpackageformattypemaster where CurrentStatus=0 order by Description ",$formattypeid,"Select"); ?>
</select> &nbsp;Used for only listing enhancement package.
              </td>
          </tr>
		  
		  <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Default Package :</th>
            <td <?= admintdclass ?>>
			<? 
			  	if($default_type==1) {
					$y_selected = 'selected="selected"';
					$n_selected = "";
				} else {
					$n_selected = 'selected="selected"';
					$y_selected = "";
				}
			  ?>
              <select name="cmbdefault" <?= admindropdownclass ?>>			  			  
			  	<option value="1" <?=$y_selected?>>Yes</option>
				<option value="0" <?=$n_selected?>>No</option>
			  </select> 
              </td>
          </tr>
          
          <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Allow Messenger :</th>
            <td <?= admintdclass ?>>
			<? 
			  	if($allow_messanger=="Y") {
					$y_selected = 'checked';
					$n_selected = "";
				} else {
					$n_selected = 'checked';
					$y_selected = "";
				}
			  ?>
              <input type="radio"  name="allow_messanger"  id="allow_messanger" value="Y" <?=$y_selected?>>Yes
              <input type="radio" name="allow_messanger"  id="allow_messanger" value="N" <?=$n_selected?>>No
              </td>
          </tr>
		  
         <tr valign="top">
            <th scope="row" <?= adminthclass ?>>&nbsp;</th>
            <td <?= admintdclass ?>><input name="Submit" type="submit" <?= adminbuttonclass ?> title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" <?= adminbuttonclass ?> value="Reset" title="Reset" alt="Reset">
            </td>
          </tr>
      </table>
    </form>
	<? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $packagemaster_help ?></div>
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
<? } else {
	header("location:dashboard.php?msg=no");
	exit;

} ?>