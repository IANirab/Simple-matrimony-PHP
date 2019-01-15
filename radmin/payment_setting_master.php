<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$action = 0;

$totalpaymentamount = "";
$paidamount = "";
$usernote= "";
$paymentstatus = "";
$adminnote = "";
$txnid  = "";

$imgnm  = "";
$key1  = "";
$key2  = "";
$key3  = "";	
$key4  = "";


$filename ="payment_setting_insert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$invoice_msgmnt_imu_1 = invoice_msgmnt_imu_1();
	$invoice_msgmnt_imu_2 = invoice_msgmnt_imu_2();
	$invoice_msgmnt_imu_3 = invoice_msgmnt_imu_3();
	$invoice_msgmnt_imu_4 = invoice_msgmnt_imu_4();	
} else {	
	$invoice_msgmnt_imu_1 = "N";
	$invoice_msgmnt_imu_2 = "N";
	$invoice_msgmnt_imu_3 = "N";
	$invoice_msgmnt_imu_4 = "N";	
}
if($invoice_msgmnt_imu_1 == 'Y' || $invoice_msgmnt_imu_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select paymenttypeid,description,imgnm,key1,key2,key3,key4 from tbldatingpaymenttypemaster where currentstatus =0 and paymenttypeid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$id = $rs[0];
		$desc = $rs[1];	
		$imgnm = $rs[2];	
		$key1 = $rs[3];	
		$key2 = $rs[4];	
		$key3 = $rs[5];	
		$key4 = $rs[6];		
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
                <h1 class="pagetitle">Payment Setting</h1></div>
                <!-- ********* TITLE END HERE *********-->
                <div id="pagecontent" class="common-form">
    <!-- ********* CONTENT START HERE *********-->
    
    <?= checkerroradmin()?>
    <? if($invoice_msgmnt_imu_3 == 'Y' || $invoice_msgmnt_imu_3 == 'N') { ?>
    <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"   ENCTYPE="multipart/form-data" class="form-horizontal ">
    
    <div class="form-group">
    	<label>Mode of Payment :</label>
        <select name="payment_mode" id="payment_mode" class="form-control">
                        <?=fillcombo("SELECT paymenttypeid, paymenttype from tbldatingpaymenttypemaster WHERE currentstatus=0",$id,'')?>
                    </select>
        
    </div>
    <div class="form-group">
    	<label>Description :</label>       
        <textarea class="form-control" name="description" rows="7" cols="50"><?= $desc ?></textarea>            
        
    </div>
    
    <div class="form-group">
            <? if ($imgnm  != "") { ?>
            <img  src="../uploadfiles/<?= $imgnm ?>" height=80 width=80 align="absmiddle">
			<? } ?>
    </div>
    
      <div class="form-group">
    <label>Image :</label>  
    <input type="file" name="imgnm" id="imgnm" class="form-control"/>
     </div>
    
    
     
    <div class="form-group">
    <label>Key 1 :</label>  
    <input type="text" name="key1" id="key1" class="form-control" value="<?=$key1?>"/>
     </div>
    
    <div class="form-group">
    <label>Key 2 :</label>  
    <input type="text" name="key2" id="key2" class="form-control" value="<?=$key2?>"/>
     </div>
     
     <div class="form-group">
    <label>Key 3 :</label>  
    <input type="text" name="key3" id="key3" class="form-control" value="<?=$key3?>"/>
     </div>
     
     <div class="form-group">
    <label>Key 4 :</label>  
    <input type="text" name="key4" id="key4" class="form-control" value="<?=$key4?>"/>
     </div>
    
    
    
    <div class="form-group common_button">
    	<input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
        <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
    </div>

        </form><? } ?>      
    <!-- ********* CONTENT END HERE *********-->
                </div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $invoiceclearmaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>    
</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->

</body>
</html>
<? } ?>