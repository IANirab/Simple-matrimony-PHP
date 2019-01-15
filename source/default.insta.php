<? include("commonfile.php");
$INSTAMOJO=get_payment_settings_key(15);
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
 
$redirecturl= $sitepath.'insta_sucess.php';
$webhook=$sitepath.'insta_sucess.php';
?> 
<html>
<head>
<title>InstaMojo Redirecting</title>


<script type="text/javascript" src="<?=$sitepath?>2018js/ajax.jqeury.3.min.js"></script>

<script>
$(document).ready(function(){
	$("#instaform").submit();
});
</script>
</head>

<body>


<?php

$ch = curl_init();
//static link
/*curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:9da9b56b2a9db09b16b33e0401d52fee",
                  "X-Auth-Token:0eefa9b0c523c5d860758d70d6ff8ea7"));*/

// for live https://www.instamojo.com/api/1.1/payment-requests/

curl_setopt($ch, CURLOPT_URL, $INSTAMOJO[5]);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:".$INSTAMOJO[3]."",
                  "X-Auth-Token:".$INSTAMOJO[4].""));
				  
				  
				  
				  
$payload = Array(
    'purpose' => $purpose,
    'amount' => $amount,
    'phone' => $phone,
    'buyer_name' => $buyer_name,
    'redirect_url' => $redirecturl,
    'send_email' => true,
    'webhook' => $webhook,
    'send_sms' => false,
    'email' => $email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 


$books = json_decode($response, true);
$txid=$books['payment_request']['id']; 
$link_sub=$books['payment_request']['longurl'];
//$txid=$books['payment_requests'][0]['id']; 
//$link_sub=$books['payment_requests'][0]['longurl'];


$sSql = "UPDATE tbldatingpaymentmaster SET txnid='".$txid."' WHERE paymentid='".$paymentid."' ";
execute($sSql);
?>


<form action="<?=$link_sub?>" name="instaform" id="instaform">
</form>

</body>
</html>