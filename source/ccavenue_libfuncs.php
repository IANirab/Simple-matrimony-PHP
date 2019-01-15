<?php
$CCAVENUE=get_payment_settings_key(3);
//$Merchant_Id ="M_vik45438_45438";
//$WorkingKey = "mcs17j9ydkmcmf0oi6"  ;//put in the 32 bit alphanumeric key in the quotes provided here.Please note that get this key ,login to your CCAvenue merchant account and visit the "Generate Working Key" section at the "Settings & Options" page.

/*$Merchant_Id = "111429"; //This merchemnt id for the Manzilamtrimony
$WorkingKey = "93F488E717C8D03689134521DEC2FB6A"; // this key For manzilmatrimony only*/


$Merchant_Id = $CCAVENUE[3]; //This merchemnt id for the Manzilamtrimony
$WorkingKey = $CCAVENUE[6]; // this key For manzilmatrimony only
$access_code = $CCAVENUE[4];
$submiturl = $CCAVENUE[5];


$Redirect_Url = $sitepath . "message.php?b=66";

function getchecksum($MerchantId,$Amount,$OrderId ,$URL,$WorkingKey)
{
	$str ="$MerchantId|$OrderId|$Amount|$URL|$WorkingKey";
	$adler = 1;
	$adler = adler32($adler,$str);
	return $adler;
}
function verifychecksum($MerchantId,$OrderId,$Amount,$AuthDesc,$CheckSum,$WorkingKey)
{
	$str = "$MerchantId|$OrderId|$Amount|$AuthDesc|$WorkingKey";
	$adler = 1;
	$adler = adler32($adler,$str);
	if($adler == $CheckSum)
		return "true" ;
	else
		return "false" ;
}
function adler32($adler , $str)
{
	$BASE =  65521 ;
	$s1 = $adler & 0xffff ;
	$s2 = ($adler >> 16) & 0xffff;
	for($i = 0 ; $i < strlen($str) ; $i++)
	{
		$s1 = ($s1 + Ord($str[$i])) % $BASE ;
		$s2 = ($s2 + $s1) % $BASE ;
		//echo "s1 : $s1 <BR> s2 : $s2 <BR>";
	}
	return leftshift($s2 , 16) + $s1;
}
function leftshift($str , $num)
{
	$str = DecBin($str);
	for( $i = 0 ; $i < (64 - strlen($str)) ; $i++)
		$str = "0".$str ;
	for($i = 0 ; $i < $num ; $i++) 
	{
		$str = $str."0";
		$str = substr($str , 1 ) ;
		//echo "str : $str <BR>";
	}
	return cdec($str) ;
}
function cdec($num)
{
	$dec =0;
	for ($n = 0 ; $n < strlen($num) ; $n++)
	{
	   $temp = $num[$n] ;
	   $dec =  $dec + $temp*pow(2 , strlen($num) - $n - 1);
	}
	return $dec;
}
?>