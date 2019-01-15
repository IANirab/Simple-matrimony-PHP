<?php ob_start();
include_once("commonfile.php");
checklogin($sitepath);

if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
	$curruserid = $_SESSION[$session_name_initital."memberuserid"];	
}





if(isset($_GET['b']) && $_GET['b']!='' && is_numeric($_GET['b']))
{ 
	$action = $_GET['b'];
	execute("update tbldatingpaymentmaster SET paymenttypeid='".$_POST["cmbpaymentmode"]."' WHERE paymentid=".$action);		
		
	
	if (($_POST["cmbpaymentmode"] == 2) && ($_POST["Description"] == ""))
	{
		$_SESSION[$session_name_initital . "error"] = $paymentadd_message_1;
		header("location:payment.php?b=$action");
		exit();
	}
	
	$inv_start=findsettingvalue("invoice_start");
	$inv_end=findsettingvalue("invoice_end");
	
	
	 $newmaxid = getonefielddata("select new_paymetid2 from tbldatingpaymentmaster
	where new_paymetid2!='' order by paymentid desc limit 1 ");

	$new_CreateDate = getonefielddata("select CreateDate from tbldatingpaymentmaster 
	where new_paymetid2='".$newmaxid."' ");
	
		
	
	$newinvoice_id1="DM-".substr($inv_start,2,2).substr($inv_end,2,2)."-";
	


	if($newmaxid!='' && $inv_end>=$new_CreateDate && $inv_start<=$new_CreateDate)
	{
		$newinvoice_id2=$newmaxid+1;
	}else
	{
		$newinvoice_id2=1;
	}
	
	
	execute("update tbldatingpaymentmaster SET new_paymetid='".$newinvoice_id1."'
	,new_paymetid2='".$newinvoice_id2."' WHERE paymentid='".$action."'
	and new_paymetid is NULL ");		
	
	
	
	
	
	if($same_currency_code=="N"){			
		sendemail(16,"",generateshubhlabhinvoicedisplay($action),findsettingvalue("AdminMail"));
	} else {
		sendemail(16,"",generateinvoice($action),findsettingvalue("AdminMail"));	
	}	
	if ($agent_module_enable == "Y")
	{		
		$franchisee_code='';
		$franchisee_code = getonefielddata("select franchisee_code from tbldatingpaymentmaster
	where paymentid='".$action."' ");
		
		update_agent_commision(3,$curruserid,$action,$franchisee_code);	
	}	
	
	

	//echo $_POST['cmbpaymentmode']; exit;
	if ($_POST['cmbpaymentmode'] == 1){
		$refilenm  = "paypal.php?b=$action";
		//$refilenm  = "stripe.php?b=$action";
		//$refilenm  = "epay.php?b=$action";
		header("location:$refilenm");
		exit;
	}
	elseif ($_POST['cmbpaymentmode'] == 3)
	{
		
		$refilenm  = "ccavenue_2015.php?b=$action";
		header("location:$refilenm");
		exit;
	}
	elseif ($_POST['cmbpaymentmode'] == 4)
	{
		$refilenm  = "authorized.php?b=$action";
		header("location:$refilenm");
		exit;
	} else if($_POST['cmbpaymentmode']==9){
		//$retfilenm = "2co_checkout.php?b=".$action;	
		//$retfilenm = "2co_start.php?b=".$action;	
		header("location:$retfilenm");
		exit;
	} else if($_POST['cmbpaymentmode']==10){
		$retfilenm = "moneybookers.php?b=".$action;	
		header("location:$retfilenm");
		exit;
	} else if($_POST['cmbpaymentmode']==15){
		//echo "insta mozo";
		//$retfilenm = "insta.php?&t=15&b=".$action;	
		$retfilenm = "PaymentGateway1.php?&t=15&b=".$action;	
		header("location:$retfilenm");
		exit;
	}else if($_POST['cmbpaymentmode']==14){
		//echo "paytm";
		//$retfilenm = "paytm.php?&t=14&b=".$action;	
		$retfilenm = "PaymentGateway1.php?&t=14&b=".$action;	
		header("location:$retfilenm");
		exit;
	}else if($_POST['cmbpaymentmode']==16){
		//echo "paytm";
		//$retfilenm = "paytm.php?&t=14&b=".$action;	
		$retfilenm = "razorpay.php?b=".$action;	
		header("location:$retfilenm");
		exit;
	}
	else if($_POST['cmbpaymentmode']==17){ 
		$retfilenm = "sslcommerz.php?b=".$action;	
		header("location:$retfilenm");
		exit;
	}
	else if($_POST['cmbpaymentmode']==13){
		//echo "payumoney";
		//$retfilenm = "payumoney.php?&t=13&b=".$action;	
		$retfilenm = "PaymentGateway1.php?&t=13&b=".$action;	
		header("location:$retfilenm");
		exit;
	}else
	{
		$refilenm  = "message.php?b=32";
		header("location:$refilenm");
		exit;	
	}
}
ob_flush();
?>