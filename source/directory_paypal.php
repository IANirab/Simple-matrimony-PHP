<? ob_start();
include_once("commonfile.php");

$action = 0;
$totalpaymentamount = '';
$password = 0;

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
if ((isset($_GET["b1"])) && is_numeric($_GET["b1"]))
	$password = $_GET["b1"];

$totalpaymentamount= getonefielddata("select amount from tbl_directory_master where directoryid=$action and password='".$password."'");

if ($totalpaymentamount == "")
{
		header("location:message.php?b=58");
		exit();
}


$Directory_payment_method = findsettingvalue("Directory_payment_method");
if ($Directory_payment_method == "C")
{ 
require("ccavenue_libfuncs.php");
$Redirect_Url = "directory_ccavenue_redirecturl.php";
$Checksum = getCheckSum($Merchant_Id,$totalpaymentamount,$action ,$Redirect_Url,$WorkingKey);
}

if ($Directory_payment_method == "P")
{
$findbusinessemailid = findsettingvalue("PaypalBusinessID");
$findpackagename = findsettingvalue("PaypalPaymentTitle");
}
?>
<html>
<body onLoad="submitthisform()">
<? if ($Directory_payment_method == "P") { ?>
<form name="frmpayment" id="frmpayment" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?= $findbusinessemailid ?>">
<input type="hidden" name="item_name" value="<?= $direcroypayment_text ?>">
<input type="hidden" name="amount" value="<?= $totalpaymentamount ?>">
<input type="hidden" name="invoice" value="<?= $action ?>">
<input type="hidden" name="charset" value="utf-8">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="cancel_return" value="<?= $sitepath ?>message.php?b=59">
<input type="hidden" name="notify_url" value="<?= $sitepath ?>directory_paymentnotify.php?b=<?= $action ?>">
<input type="hidden" name="return" value="<?= $sitepath ?>message.php?b=60">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="cn" value="">
<input type="hidden" name="rm" value="2">
<!-- <input type="image" src="<?= $sitepath ?>/images/paypal.gif" 
name="submit" alt="Click Here To Payment With Paypal"> -->
</form>
<? 
}
else  
{

?>
<form name="frmpayment" id="frmpayment" action="ccavRequestHandler.php" method="post" >
<input type="hidden" name="tid" id="tid" readonly />
<input type="hidden" name="order_id" value="<?= $_GET["b"] ?>">
<input type="hidden" name="amount	" value="<?= $totalpaymentamount ?>">
<input type="hidden"name="merchant_id" value="<?= $Merchant_Id  ?>">
<input type=hidden name=Redirect_Url value="<?php echo $Redirect_Url; ?>">
<input type=hidden name=Checksum value="<?php echo $Checksum; ?>">
<input type="hidden" name="currency" value="INR"/>
<input type="hidden" name="redirect_url" value="<?php echo $Redirect_Url; ?>"/>
<input type="hidden" name="cancel_url" value="<?php echo $Redirect_Url; ?>"/>

<input type="hidden" name="language" value="EN"/>
<input type="hidden" name="billing_name" value="">
<input type="hidden" name="billing_address" value="">
<input type="hidden" name="billing_country" value="">
<input type="hidden" name="billing_tel" value="">
<input type="hidden" name="billing_email" value="">
<input type="hidden" name="billing_zip_code" value="">
<input type="hidden" name="billing_state" value="">
<input type="hidden" name="billing_cust_city" value="">
<input type="hidden" name="billing_cust_notes" value="">
<input type="hidden" name="delivery_cust_name" value="">
<input type="hidden" name="delivery_cust_address" value="">
<input type="hidden" name="delivery_cust_tel" value="">
<input type="hidden" name="delivery_zip_code" value="">
<input type="hidden" name="delivery_cust_state" value="">
<input type="hidden" name="delivery_cust_city" value="">


<!-- <input type="submit" value="Submit"> -->
</form>
<? } ?>
</body>
</html>
<script language="javascript">
function submitthisform()
{
    document.frmpayment.submit();
}
</script>
<?
ob_flush();
?>