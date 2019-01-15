<?
session_start();
require_once("commonfileadmin.php");
//checkadminlogin("Y");
$action = 0;
$totalpaymentamount = "";
$paidamount = "";
$usernote= "";
$paymentstatus = "";
$adminnote = "";
$txnid  = "";
$filename ="invoiceclear";
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
	$result = getdata("select totalpaymentamount,paidamount,usernote,paymentstatus,adminnote,txnid,display_amount,paymenttypeid from tbldatingpaymentmaster where currentstatus =0 and paymentid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$totalpaymentamount = $rs[0];
		$paidamount = $rs[1];
		$usernote= $rs[2];
		$paymentstatus = $rs[3];
		$adminnote = $rs[4];
		$txnid  = $rs[5];
		$display_amount = $rs[6];
		if(isset($rs[7]) && $rs[7]!=''){
			$paymenttype = getonefielddata("SELECT paymenttype from tbldatingpaymenttypemaster WHERE paymenttypeid=".$rs[7]);
		} else {
			$paymenttype = '';	
		}		
		if($same_currency_code=="N"){
		//changed by jp
		//	$totalpaymentamount = $display_amount;
		}		
	}
	freeingresult($result);
}
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<h1 class="pagetitle"><i class="fa fa-list"></i>Clear invoice</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
            
            
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? if($invoice_msgmnt_imu_3 == 'Y' || $invoice_msgmnt_imu_3 == 'N') { ?>
<form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal">
     <div class="form-group text-form">
     <label>invoice id :</label> <?= $action ?>
	</div>
 <div class="form-group text-form">
     <label>total payment amount :</label>
              <?= $totalpaymentamount ?>
              </div>
		 <div class="form-group text-form">
     <label>user note :</label>
              <?= $usernote ?></div>
		   <div class="form-group text-form">
     <label>payment status :</label>
              <?= $paymentstatus ?></div>
		 <div class="form-group text-form">
     <label>Transaction id :</label>
              <?= $txnid ?></div>
           <div class="form-group text-form">
     <label>Payment Type :</label>
              <?= $paymenttype ?></div>
  <div class="form-group">
     <label>paid amount :</label>
              <input type="text" name="txtpaidamount" class="form-control" value="<?= $totalpaymentamount ?>">
              </div>
	 <div class="form-group text-form">
     <label>admin note :</label>
              <textarea name="txtnote" class="form-control" rows="7" cols="50"><?= $adminnote ?></textarea>
</select>
              </div>
        <div class="common_button">
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
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>
<? } ?>