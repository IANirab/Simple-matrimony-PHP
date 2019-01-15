<?php
@
include("commonfile.php");

//static code
/*
// Merchant key here as provided by Payu
$MERCHANT_KEY = "hDkYGPQe";
//$MERCHANT_KEY = "gtKFFx";
// Merchant Salt as provided by Payu
$SALT = "yIEkykqEH3";
//$SALT = "eCwWELxi";
// Change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";
//$PAYU_BASE_URL = "https://test.payu.in";
*/


$PAYUMONY=get_payment_settings_key(13);
$MERCHANT_KEY=$PAYUMONY[3];
$SALT=$PAYUMONY[4];
$PAYU_BASE_URL=$PAYUMONY[5];


$action = '';
$posted = array();
if(!empty($_POST)) {
foreach($_POST as $key => $value) {
 $posted[$key] = $value;
}
}
$formError = 0;
if(empty($posted['txnid'])) {
// Generate random transaction id
 $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

} else {
$txnid = $posted['txnid'];
}

?>


<?
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


 $name=getonefielddata("select name from tbldatingusermaster where userid='".$userid."' ");
 $email=getonefielddata("select email from tbldatingusermaster where userid='".$userid."' ");
 $phone=getonefielddata("select mobile from tbldatingusermaster where userid='".$userid."' ");
 $success="http://mobywebsite.com/live/Classified2/payu_success.php";
 $failure="http://mobywebsite.com/live/Classified2/fail.php";

?>    



<?
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0)
 {
	if(empty($posted['key'])
	|| empty($posted['txnid'])
	|| empty($posted['amount'])
	|| empty($posted['firstname'])
	|| empty($posted['email'])
	|| empty($posted['phone'])
	|| empty($posted['productinfo'])
	|| empty($posted['surl'])
	|| empty($posted['furl'])
	|| empty($posted['service_provider'])
	) {

	$formError = 1;
	} else {		
	//$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
	$hash_string = '';
	foreach($hashVarsSeq as $hash_var) {
	$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
	$hash_string .= '|';
	}

$hash_string .= $SALT;
$hash = strtolower(hash('sha512', $hash_string));
  $action = $PAYU_BASE_URL . '/_payment'; 
}	
} elseif(!empty($posted['hash'])) {
$hash = $posted['hash'];
$action = $PAYU_BASE_URL . '/_payment';

}

$sSql = "UPDATE tbldatingpaymentmaster SET txnid='".$txnid."' WHERE paymentid='".$paymentid."' "; 
execute($sSql);

?>
<html>
<head>
<title>PayUMoney Redirecting</title>
<!--for local -->
<!--<script type="text/javascript" src="<?=$sitepath?>assets/<?=$sitethemefolder?>/js/ajax.jquery.1.10.1.min.js"></script>-->
<!--for live -->
<script type="text/javascript" src="<?=$sitepath?>assets/<?=$sitethemefolder?>/js/ajax.jquery.1.10.1.min.js"></script>

<script>
$(document).ready(function(){
    $("#payuForm").submit();
});
</script>
</head>

<body>
<?php //echo $action; ?>


<form action="<?=$action?>" method="post" name="payuForm" id="payuForm">
<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
<input type="hidden" name="amount" value="<?=$amount?>" />
<input type="hidden" name="firstname" id="firstname" value="<?=$name?>" />
<input type="hidden" name="email" id="email" value="<?=$email?>" />
<input type="hidden" name="phone" value="<?=$phone?>" />
<input type="hidden" name="productinfo" value="<?=strip_tags($title)?>"  />
<input type="hidden" name="surl" value="<?=$success?>" size="64" />
<input  type="hidden" name="furl" value="<?=$failure?>" size="64" />
<input type="hidden" name="service_provider" value="payu_paisa" size="64" />

</form>

</body>
</html>

