<?php include_once("commonfile.php"); ?>
<? require("ccavenue_libfuncs.php"); ?>
<?php include('Crypto.php')?>
<?php

	error_reporting(0);
	
	//$workingKey='4529D052D3A5F60CD5B693B0EE17187D';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$WorkingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	//$orderid=$encResponse['order_id'];
	//echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==0)
		{
			$paymentid=$information[1];
		}
		if($i==1)
		{
			$txnid=$information[1];
		}
		if($i==3)
		{
			$order_status=$information[1];
		}
	}

	if($order_status==="Success")
	{   
	 echo "<br><h2>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.</h2>";
	    	$sqlinsertresponse= "update tbldatingpaymentmaster SET txnid='".$txnid."' where paymentid='".$paymentid."'"; 
		  execute($sqlinsertresponse);
	}
	else if($order_status==="Aborted")
	{
		echo "<br><h2>Thank you for shopping with us.We will keep you posted regarding the status of your order through 
		e-mail</h2>";
	
	}
	else if($order_status==="Failure")
	{
		echo "<br><h2>Thank you for shopping with us.However,the transaction has been declined.</h2>";
	}
	else
	{
		echo "<br><h2>Security Error. Illegal access detected</h2>";
	
	}

	//echo "<br><br>";

	//echo "<table cellspacing=4 cellpadding=4>";
	
	
//	for($i = 0; $i < $dataSize; $i++) 
	
//	{
		  $information=explode('=',$decryptValues[$i]);
	    //  echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';

		 
//	}

	//echo "</table><br>";
	//echo "</center>";
	
	
	
?>
