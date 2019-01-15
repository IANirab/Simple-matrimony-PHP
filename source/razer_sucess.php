<?
include("commonfile.php");
require_once($sourcepath."razorpay/razorpay_fun.php");
use Razorpay\Api\Api;
$razerpay=get_payment_settings_key(16);
$api = new Api($razerpay[3], $razerpay[4]);

if(isset($_GET['b']) && $_GET['b']!='')
{
	$action=$_GET['b'];
}else{$action=0;}
$status='';

$order = $api->order->fetch($action);

$status=$order['status']; 

		if($status=='captured')
		{
 	$sSql = "UPDATE tbldatingpaymentmaster SET clear='Y',createdate='".date("Y-m-d")."' 
				where txnid='".$action."'  ";
				execute($sSql);
		}else
		{
			  echo "Invalid Transaction. Please try again";
		}

?>