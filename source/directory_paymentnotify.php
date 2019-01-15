<?  
ob_start();
 ?>
<? require_once("commonfile.php");
//if(isset($_GET['b']) && is_numeric($_GET['b']))
//{
//$currencycode = findlangsetting('paypalcurrancycode',$_GET['b']);}
// read the post from PayPal system and add 'cmd'
$header = "";
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) 
{
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}
// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);
// assign posted variables to local variables

$invoice = $_POST['invoice'];
$paymentdate = "'" . $_POST['payment_date'] . "'";
$paymentstatus = $_POST['payment_status'];
$paymentamount = $_POST['mc_gross'];
$paymentcurrency = $_POST['mc_currency'];
$txnid = $_POST['txn_id'];
$receiveremail = $_POST['receiver_email'];
$payeremail = $_POST['payer_email'];
//$pendingreason = "'" . $_POST['pending_reason'] . "'";
//$reasoncode = "'" . $_POST['reason_code'] . "'";
//$item_number = $_POST['item_number'];

if (!$fp) {
// HTTP ERROR
} 
else 
{
	fputs ($fp, $header . $req);
	while (!feof($fp)) 
	{
		$res = fgets ($fp, 1024);
		if (strcmp ($res, "VERIFIED") == 0) 
		{
			// check the payment_status is Completed
			if (($paymentstatus == "Completed") && (!($itemname == "")))
			{
				// check that txn_id has not been previously processed
				$txnidalreadyexist = getonefielddata("select txnid from tbl_directory_master where txnid=$txnid");
				$tobepaidamount    = getonefielddata("select amount from tbl_directory_master where directoryid=$invoice");	
				if ($txnidalreadyexist == "")
				{
					if (($tobepaidamount == $paymentamount))
					{
					// process payment
		   			execute("update tbl_directory_master set paymentstatus='$paymentstatus'," . " paymentdate='$paymentdate',txnid='$txnid',paidamount = $paymentamount,payment_completed='Y' where directoryid=$invoice");
					}
					else
					execute("update tbl_directory_master set paymentstatus='invoice amount mismatch' where directoryid=$invoice");
				}
				else
				execute("update tbl_directory_master set paymentstatus='duplicate txn id' where directoryid=$invoice");
			}
		}
		else 
		if (strcmp ($res, "INVALID") == 0) 
		{// log for manual investigation
if ($invoice != "")
execute("update tbl_directory_master set paymentstatus='invalid txn ' where directoryid=$invoice");
		}
	}
fclose ($fp);
}
ob_flush();
?>