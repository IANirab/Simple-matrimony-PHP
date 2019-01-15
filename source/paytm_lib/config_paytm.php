<?php
$PAYTM=get_payment_settings_key(14);
/*

- Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
- Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
- Above details will be different for testing and production environment.

*/

				 /////////////////// Static Start/////////////////////////////////
//define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
//define('PAYTM_MERCHANT_KEY', 'bKMfNxPPf_QdZppa'); //Change this constant's value with Merchant key downloaded from portal
//define('PAYTM_MERCHANT_MID', 'DIY12386817555501617'); //Change this constant's value with MID (Merchant ID) received from Paytm
//define('PAYTM_MERCHANT_WEBSITE', 'DIYtestingweb'); //Change this constant's value with Website name received from Paytm

//Link (Payment Links) :
//$PAYTM_DOMAIN = "pguat.paytm.com";
//if (PAYTM_ENVIRONMENT == 'PROD') {
//	$PAYTM_DOMAIN = 'secure.paytm.in';
//}

	 /////////////////// Static end/////////////////////////////////


define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
//Key (MERCHANT KEY) 
define('PAYTM_MERCHANT_KEY', $PAYTM[3]); //Change this constant's value with Merchant key downloaded from portal
//Salt (Authentication KEY) 
define('PAYTM_MERCHANT_MID', $PAYTM[4]); //Change this constant's value with MID (Merchant ID) received from Paytm
//Key (Owner Name) 
define('PAYTM_MERCHANT_WEBSITE', $PAYTM[6]); //Change this constant's value with Website name received from Paytm

//Link (Payment Links) :
$PAYTM_DOMAIN = $PAYTM[5];
//if (PAYTM_ENVIRONMENT == 'PROD') {
//	$PAYTM_DOMAIN = $PAYTM[5];
//}

define('PAYTM_REFUND_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/REFUND');
define('PAYTM_STATUS_QUERY_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/TXNSTATUS');
define('PAYTM_STATUS_QUERY_NEW_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/getTxnStatus');
define('PAYTM_TXN_URL', 'https://'.$PAYTM_DOMAIN.'/oltp-web/processTransaction');

?>