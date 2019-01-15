<?php
include("commonfile.php");

$ch = curl_init();
$a=$_GET['payment_request_id'];
//$a="ece86aff62e04fb59ab1487b7bf4cd91";
$b="https://test.instamojo.com/api/1.1/payment-requests/".$a."/";
curl_setopt($ch, CURLOPT_URL, $b);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:9da9b56b2a9db09b16b33e0401d52fee",
                  "X-Auth-Token:0eefa9b0c523c5d860758d70d6ff8ea7"));

$response = curl_exec($ch);
curl_close($ch); 

//echo $response;

$books = json_decode($response, true);
$status=$books['payment_request']['payments'][0]['status']; 
//echo $status;
//$link_sub=$books['payments']['status'];
if($status=='Credit'){
	$sSql = "UPDATE tbldatingpaymentmaster SET clear='Y',createdate='".date("Y-m-d")."' 
		where txnid='".$a."'  ";
		execute($sSql);
}
?>