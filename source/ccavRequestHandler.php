<?php include_once("commonfile.php"); ?>
<? require("ccavenue_libfuncs.php"); ?>
<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php include('Crypto.php')?>
<?php 

//	error_reporting(0);
	
	//$merchant_data='143892';
//	$working_key='4529D052D3A5F60CD5B693B0EE17187D';//Shared by CCAVENUES
//	$access_code='AVJY72EH41AS95YJSA';//Shared by CCAVENUES
	
	
	
	foreach ($_POST as $key => $value){
		$Merchant_Id.=$key.'='.$value.'&';
	}

	$encrypted_data=encrypt($Merchant_Id,$WorkingKey); // Method for encrypting the data.



?>
<form method="post" name="redirect" action="<?=$submiturl?>"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";

?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

