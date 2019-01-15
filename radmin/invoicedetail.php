<?
session_start();
require_once("commonfileadmin.php");
//require_once("../coding/commonfile.php");
//checkadminlogin("Y");
$action = 0;
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
	$result = getdata("select totalpaymentamount,paidamount,usernote,paymentstatus,adminnote,txnid ,paymenttypeid,clear,cleardate,CreateBy,date_format(CreateDate,'$date_format'),promo_code from tbldatingpaymentmaster where currentstatus =0 and paymentid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$totalpaymentamount = $rs[0];
		$paidamount = $rs[1];
		$usernote= $rs[2];
		$paymentstatus = $rs[3];
		$adminnote = $rs[4];
		$txnid  = $rs[5];		
		$paymenttypeid= $rs[6];
		if ($paymenttypeid != "")
			$paymenttypeid =  getonefielddata("SELECT paymenttype FROM tbldatingpaymenttypemaster  where paymenttypeid=$paymenttypeid");
		$clear = $rs[7];
		$cleardate = $rs[8];
		$CreateBy  = $rs[9];
		if ($CreateBy != "")
			$CreateBy =  getonefielddata("SELECT concat(name,'[',email,']') FROM tbldatingusermaster  where userid=$CreateBy");
		$paymentdate= $rs[10];
		$promocode = $rs[11];
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
			<h1 class="pagetitle">Invoice Detail</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
            			<!-- ********* TITLE END HERE *********-->
<!-- ********* CONTENT START HERE *********-->
<div class="common-form">
<?= checkerroradmin()?>
<? if($invoice_msgmnt_imu_2 == 'Y' || $invoice_msgmnt_imu_2 == 'N') { ?>

<div class="form-group text-form">
           <label>invoice id :</label>
           
              <?= $action ?>&nbsp;
              </div>
	<div class="form-group text-form">
           <label>total payment amount :</label>
              <?= $totalpaymentamount ?></div>
		  <? if ($agent_module_enable == "Y") { ?>
		  	<div class="form-group text-form">
           <label>agent discount percentage :</label>
              <?= getonefielddata("select agent_discount_per from tbldatingpaymentmaster where currentstatus =0 and paymentid=$action"); ?> %&nbsp;
              </div>
<? } ?>
		<? if ($usernote!=''){?>
	      <div class="form-group text-form">
           <label>user note :</label>
              <?= $usernote ?></div>
           <? } ?>   
		   <? if($txnid!=''){?>
		  <div class="form-group text-form">
           <label>txn id :</label>
              <?= $txnid ?></div>
              <?  } ?>
 			<? if($paidamount!=''){?>
            <div class="form-group text-form">
           <label>paid amount :</label>
             <?= $paidamount ?></div>
             <? } ?>
		<? if($adminnote!=''){?>
        <div class="form-group text-form">
           <label>admin note :</label>
              <?= $adminnote ?></div>
              <? } ?>
		  <div class="form-group text-form">
           <label>payment type :</label>
              <?= $paymenttypeid ?></div>
		<div class="form-group text-form">
           <label>payment clear :</label>
              <?= $clear ?></div>
		<? if($clear=='Y'){ ?>
        <div class="form-group text-form">
           <label>payment clear date :</label>
              <?= $cleardate ?></div>
		<? } ?>
         <div class="form-group text-form">
           <label>user :</label>
              <?= $CreateBy ?></div>
		 <div class="form-group text-form">
           <label>date :</label>
              <?= $paymentdate ?></div>
         <?php /*?><div class="form-group text-form">
           <label>Promocode :</label>
              <?=$promocode ?></div><?php */?>
	  
	  </div>
<?php /*?><div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
<th <?= adminthclass ?>>package</th>
<th <?= adminthclass ?>>price</th>
<th <?= adminthclass ?>>days</th>
<th <?= adminthclass ?>></th>
<th <?= adminthclass ?>></th>
<th <?= adminthclass ?>></th>
<th <?= adminthclass ?>></th>
<th <?= adminthclass ?>></th>
<th <?= adminthclass ?>></th>
</tr>
</thead>
<tbody>
<? 
if ($action != "")
{
$result = getdata("select tbldatingpackagemaster.Description,tbldatingpaymentdetail.price,tbldatingpaymentdetail.days from tbldatingpaymentdetail,tbldatingpackagemaster where tbldatingpaymentdetail.packageid= tbldatingpackagemaster.PackageId and paymentid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$Description = $rs[0];
		$price = $rs[1];
		$days= $rs[2]; ?>
		<td <?= adminthclass ?>><?= $Description ?></td>
		<td <?= adminthclass ?>><?= $price ?></td>
		<td <?= adminthclass ?>><?= $days ?></td>
	<? }
	freeingresult($result);
}	
?>
</tbody>
</table>
</div><?php */?>
<? } ?>
<?
$admin_state=findsettingvalue("tax_state");
$user_state =  getonefielddata("SELECT bill_state FROM tbldatingpaymentmaster where paymentid=$action");

if($International_selling=='Y')
{
	$taxtype2='cess2';
}
else
{
		if($enable_tax_module=='Y' && $admin_state==$user_state)
		{
			$taxtype2='cgst';
		}
		elseif($enable_tax_module=='Y' && $admin_state!=$user_state)
		{
			$taxtype2='igst';
		}else{$taxtype2='xyz';}
}

?>

<?=display_billing_info($action,0,$taxtype2,'0','0')?>

<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $invoicedetail_help ?></div>
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