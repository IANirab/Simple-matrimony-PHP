<?

ob_start();
include_once("commonfile.php");
checklogin($sitepath);

$action = 0;
$totalpaymentamount = '';


if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	/* $result = getdata("select totalpaymentamount from tbldatingpaymentmaster where currentstatus in(0) and paymentid=$action and CreateBy=$curruserid and clear='N'");
	while ($rs = mysql_fetch_array($result))
	{
		$totalpaymentamount = $rs[0];
	}*/
	$totalpaymentamount= payment_amount($action,$curruserid);
}
if ($totalpaymentamount == ""){
	header("location:message.php?b=31");
	exit();
}
$findbusinessemailid = findsettingvalue("PaypalBusinessID");
$findpackagename = findsettingvalue("PaypalPaymentTitle");
?>
<html>
<body onLoad="submitthisform()">
<form name="frmpaypal" id="frmpaypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?= $findbusinessemailid ?>">
<input type="hidden" name="item_name" value="<?= $findpackagename ?>">
<input type="hidden" name="amount" value="<?= $totalpaymentamount ?>">
<input type="hidden" name="invoice" value="<?= $action ?>">
<input type="hidden" name="charset" value="utf-8">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="cancel_return" value="<?= $sitepath ?>message.php?b=34">
<input type="hidden" name="notify_url" value="<?= $sitepath ?>paymentnotify.php?b=<?= $action ?>">
<input type="hidden" name="return" value="<?= $sitepath ?>message.php?b=35">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="cn" value="">
<input type="hidden" name="rm" value="2">
<INPUT TYPE="hidden" NAME="currency_code" value="USD">
<!-- <input type="image" src="<?= $sitepath ?>/images/paypal.gif" 
name="submit" alt="Click Here To Payment With Paypal"> -->
</form>
</body>
</html>
<script language="javascript">
function submitthisform()
{
    document.frmpaypal.submit();
}
</script>
<?
ob_flush();
?>