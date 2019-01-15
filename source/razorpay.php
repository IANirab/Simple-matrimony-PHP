<? 
include("commonfile.php");

$razerpay=get_payment_settings_key(16);
if(isset($_GET['b']) && $_GET['b']!='')
{
	$paymentid=$_GET['b'];
}else{$paymentid=0;}




$result = getdata("SELECT tbldatingpackagemaster.Description,tbldatingpaymentmaster.totalpaymentamount, 
tbldatingpaymentmaster.CreateBy,tbldatingpackagemaster.Description
from tbldatingpaymentmaster,tbldatingpackagemaster,tbldatingpaymentdetail WHERE tbldatingpaymentmaster.paymentid='".$paymentid."' AND tbldatingpaymentdetail.paymentid=tbldatingpaymentmaster.paymentid AND tbldatingpaymentdetail.packageid=tbldatingpackagemaster.packageid AND tbldatingpaymentmaster.currentstatus IN (0,2)");
while($rs= mysqli_fetch_array($result))
{
	$title=$rs[0];
	$amount=$rs[1];
	$userid=$rs[2];
	$desc=$rs[3];
    
}


$buyer_name=getonefielddata("select name from tbldatingusermaster where userid='".$userid."' ");
 $email=getonefielddata("select email from tbldatingusermaster where userid='".$userid."' ");
 $phone=getonefielddata("select mobile from tbldatingusermaster where userid='".$userid."' ");
 $purpose="Business";
 
$redirecturl= 'http://mobywebsite.com/live/smmatrimony/razer_sucess.php';
$webhook='http://mobywebsite.com/live/smmatrimony/razer_sucess.php';
?> 
<html>
<head>
<title>Razerpay Redirecting</title>

<!--for local -->
<!--<script type="text/javascript" src="<?=$sitepath?>assets/<?=$sitethemefolder?>/js/ajax.jquery.1.10.1.min.js"></script>-->
<!--for live -->
<script src="<?=$sitepath?>assets/<?=$sitethemefolder?>/js/ajax.jquery.1.10.1.min.js"></script>

<script>
$(document).ready(function(){

 $("#submit_razor").submit();
});
</script>
</head>

<body>


<?php


require_once($sourcepath."razorpay/razorpay_fun.php");
use Razorpay\Api\Api;

$api = new Api($razerpay[3], $razerpay[4]);

$order = $api->order->
create(array
			('receipt' => $paymentid,
			 'amount' => $amount,
			 'currency' => 'INR')
	   ); 

//print_r($order);
//$order = $api->order->fetch('order_8JQYAlcbpW6svn');


$txid=$order['id']; 


$sSql = "UPDATE tbldatingpaymentmaster SET txnid='".$txid."' WHERE paymentid='".$paymentid."' ";
execute($sSql);


?>

<form action="<?=$redirecturl."?b=".$txid?>" method="POST" id="submit_razor">
<!-- Note that the amount is in paise = 50 INR -->
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?=$razerpay[3]?>"
    data-amount="<?=$amount*100?>"
    data-buttontext="Pay with Razorpay"
    data-name=""
    data-description="<?=$desc?>"
    data-image="https://your-awesome-site.com/your_logo.jpg"
    data-prefill.name="<?=$buyer_name?>"
    data-prefill.email="<?=$email?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" value="Hidden Element" name="hidden">
</form>


</body>
</html>