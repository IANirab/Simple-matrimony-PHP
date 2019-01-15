<?
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

@
include("commonfile.php");

$paymentid=0;
if(isset($_GET['b']) && $_GET['b']!=''){

	$paymentid=$_GET['b'];
}
else
{
	$paymentid=0;

}

//tbldatingpaymentdetail
//tbldatingpaymentmaster
//tbldatingpackagemaster

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

$name=getonefielddata("select name from tbldatingusermaster where userid='".$userid."' ");
$email=getonefielddata("select email from tbldatingusermaster where userid='".$userid."' ");
$phone=getonefielddata("select mobile from tbldatingusermaster where userid='".$userid."' ");
$success="http://mobywebsite.com/live/Classified2/success.php";
$failure="http://mobywebsite.com/live/Classified2/fail.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Paytm Redirecting</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<!--for local -->
<!--<script type="text/javascript" src="<?=$sitepath?>assets/<?=$sitethemefolder?>/js/ajax.jquery.1.10.1.min.js"></script>-->
<!--for live -->
<script src="<?=$sitepath?>assets/<?=$sitethemefolder?>/js/ajax.jquery.1.10.1.min.js"></script>


<script>
$(document).ready(function(){
    $("#paytmform").submit();
});
</script>
</head>
<body>

<form method="post" action="<?=$sitepath?>paytm_redirect.php" name="paytmform" id="paytmform">

<input id="ORDER_ID" name="ORDER_ID" tabindex="1" maxlength="20" size="20" autocomplete="off" 
value="<?php echo  "ORDS" . rand(10000,99999999)?>" type="hidden">
<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?=$userid?>" type="hidden">
<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" type="hidden">
<input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" type="hidden">
<input id="email" tabindex="4" maxlength="12" size="12" name="email" autocomplete="off" value="<?=$email?>" type="hidden">
<input id="phone" tabindex="4" maxlength="12" size="12" name="phone" autocomplete="off" value="<?=$phone?>" type="hidden">
<input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?=$amount?>" type="hidden">
<input title="paymentid" tabindex="10" type="text" name="paymentid" value="<?=$paymentid?>" type="hidden">


</form>
</body>
</html>

