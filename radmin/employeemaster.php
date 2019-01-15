<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$action = 0;
$name = "";	
$UserName ="";
$email = "";
$allowed_ip = "";
$emp_role_id ='';
$reg_commission = "";
$membership_commission = "";
$discount_percentage = "";

$filename ="employeeinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$emp_mgmnt_emm_1 = emp_mgmnt_emm_1();
	$emp_mgmnt_emm_2 = emp_mgmnt_emm_2();
	$emp_mgmnt_emm_4 = emp_mgmnt_emm_4();
} else {	
	$emp_mgmnt_emm_1 = "N";
	$emp_mgmnt_emm_2 = "N";
	$emp_mgmnt_emm_4 = "N";
}
if($emp_mgmnt_emm_1 == 'Y' || $emp_mgmnt_emm_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select name,UserName,emp_role_id,EmailAddress,allowed_ip from tbldatingadminloginmaster where CurrentStatus =0 and LoginId=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$name = $rs[0];
		$UserName = $rs[1];	
		$emp_role_id = $rs[2];		
		$email = $rs[3];
		$allowed_ip = $rs[4];
	}
	if($agent_module_enable=='Y') {
	$agt_result = getdata("SELECT reg_commission,membership_commission,discount_percentage from tbl_agent_master WHERE emp_id=".$action);
	$agt_rs = mysqli_fetch_array($agt_result);
		$reg_commission = $agt_rs[0];
		$membership_commission = $agt_rs[1];
		$discount_percentage = $agt_rs[2];
	freeingresult($result);
	}
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
			<h1 class="pagetitle">Add Employee</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? if($emp_mgmnt_emm_1 == 'Y' || $emp_mgmnt_emm_1 == 'N') { ?>
<form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal">
      <div class="form-group">
             <div class="widhtsetr"><label>name</label>
              <input type="text" name="txtname"  class="form-control" value="<?= $name ?>">
              </div>
		  <div class="widhtsetr control-label_25">
               <label>user name</label>
              <input type="text" name="txtusername" class="form-control" value="<?= $UserName ?>">(Username for Admin side Login)
              </div>
              </div>
		  
		  <div class="form-group singleline_class">
             <div class="widhtsetr"><label>password</label>
              <input type="password" name="txtpassword" class="form-control">
              </div>
		  
		 <div class="widhtsetr"><label>Email</label>
           
              <input type="text" name="email" class="form-control" value="<?=$email?>"><note><? if($agent_module_enable=='Y') { ?> (Username for Agent Side Login) <? } ?></note>
            </div>
		  
		 <div class="widhtsetr control-label_25"><label>Employee Role :</label>
              <select name="emp_role" class="form-control">
			  <option value="0">Select</option>
			  <? fillcombo("select id,title from tbl_employee_role_master  where currentstatus=0 order by title",$emp_role_id,"") ?></select>
              </div>
              </div>
          
           <div class="form-group"><label>List of Allowed IP</label>
              <textarea name="allowed_ip" class="form-control" rows="5" cols="40"><?=$allowed_ip?></textarea>
              <note>(Enter IP Comma Separated) </note>
              </div>
          <? if($agent_module_enable=='Y') { ?>
        <div class="form-group singleline_class">
             <div class="widhtsetr"><label>registration commission </label>
              <input type="text" name="reg_commission" class="form-control"  value="<?= $reg_commission ?>">
              </div>
		 <div class="widhtsetr"><label>membership commission</label>
              <input type="text" name="membership_commission" class="form-control" value="<?= $membership_commission ?>">
              </div>
		 <div class="widhtsetr control-label_25"><label>discount percentage</label>
              <input type="text" name="discount_percentage" class="form-control" value="<?= $discount_percentage ?>">
              </div>
              </div>
		 <? } ?> 
         <div class="form-group common_button">
         <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form><? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $winkmaster_help ?></div>
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
<? 
 } else{
 	header("location:dashboard.php?msg=no");
 }
?>