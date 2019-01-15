<? include_once("commonfile.php");
require("ccavenue_libfuncs.php");
//require("ccavenue_libfuncs.php");
checklogin($sitepath);
$action = 0;
//$Redirect_Url = $sitepath . "message.php?b=66";
$Redirect_Url = $sitepath . "ccavResponseHandler.php";
$totalpaymentamount = '';
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$totalpaymentamount= payment_amount($action,$curruserid);
}
if ($totalpaymentamount == "")
{
		header("location:message.php?b=31");
		exit();
}
//$Checksum = getCheckSum($Merchant_Id,$totalpaymentamount,$action ,$Redirect_Url,$WorkingKey);

$name ='';
$address ='';
$country_name ='';
$mobile ='';
$email ='';
$state_name  ='';
$get_data = getdata("select name,address,countryid,mobile,email,state from tbldatingusermaster where userid='".$curruserid."'");
while($rs = mysqli_fetch_array($get_data))
{
	$name  = $rs['name'];
	$address = $rs['address'];
	$countryid = $rs['countryid'];
	$mobile=$rs['mobile'];
	$email = $rs['email'];
	$state = $rs['state'];
	if($countryid!='')
	{
		$country_name = getonefielddata("select title from  tbldatingcountrymaster where id='".$countryid."'");
	}
	if($state!='')
	{
		$state_name  = getonefielddata("select title from tbldating_state_master where id='".$state."'");
	}
}
?>
<html>
<body onLoad="submitthisform()">
<form name="frmccavenue" action="ccavRequestHandler.php" method="post" >
<!--<form name="frmccavenue" action="https://secure.ccavenue.com" method="post" >-->

<input type="hidden" name="tid" id="tid" readonly />
<input type="hidden"name="merchant_id" value="<?=$Merchant_Id?>">
<input type="hidden" name="order_id" value="<?=$action?>"/>
<input type="hidden" name="amount" value="<?=$totalpaymentamount?>">
<input type="hidden" name="currency" value="INR"/>
<!--<input type="hidden" name=Redirect_Url value="<?php echo $Redirect_Url; ?>">-->
<input type="hidden" name="redirect_url" value="<?php echo $Redirect_Url; ?>"/>
<input type="hidden" name="cancel_url" value="<?php echo $Redirect_Url; ?>"/>
<!--<input type="hidden" name=Checksum value="<?php echo $Checksum; ?>">	-->
<input type="hidden" name="language" value="EN"/>
<input type="hidden" name="billing_name" value="<?=$name?>">
<input type="hidden" name="billing_address" value="<?=$address?>">
<input type="hidden" name="billing_country" value="<?=$country_name?>">
<input type="hidden" name="billing_tel" value="<?=$mobile?>">
<input type="hidden" name="billing_email" value="<?=$email?>">
<input type="hidden" name="billing_zip_code" value="">
<input type="hidden" name="billing_state" value="<?=$state_name?>">
<input type="hidden" name="billing_cust_city" value="">
<input type="hidden" name="billing_cust_notes" value="">
<input type="hidden" name="delivery_cust_name" value="">
<input type="hidden" name="delivery_cust_address" value="">
<input type="hidden" name="delivery_cust_tel" value="">
<input type="hidden" name="delivery_zip_code" value="">
<input type="hidden" name="delivery_cust_state" value="">
<input type="hidden" name="delivery_cust_city" value="">

</form>
</body>
</html>
<script language="javascript">
function submitthisform()
{
    document.frmccavenue.submit();
}
</script>
<?
ob_flush();
?>