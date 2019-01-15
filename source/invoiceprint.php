<? ob_start();
include_once("commonfile.php");
checklogin($sitepath,"N");
$invoice = "";
if (isset($_GET["b"]) && $_GET["b"] != "" && is_numeric($_GET["b"]))
{
	
	$invoiceid = $_GET["b"];
	$chekvalidpaymentid = getonefielddata("select paymentid from tbldatingpaymentmaster where paymentid=$invoiceid and CreateBy=$curruserid and currentstatus=0");
	
		
				  $taxigst=0;
				  $taxcgst=0;
				  $taxcess2=0;
                  	$taxigst = getonefielddata("SELECT count(paymentdetailid) from  tbldatingpaymentdetail WHERE paymentid='".$invoiceid."' and igst_v!='' ");
					
					     	$taxcgst = getonefielddata("SELECT count(paymentdetailid) from  tbldatingpaymentdetail WHERE paymentid='".$invoiceid."' and cgst_v!='' ");
							
					if($taxigst>0)
					{
						$taxtype1='igst';
					}elseif($taxcgst>0)
					{
						$taxtype1='cgst';
					}else{$taxtype1='xyz';}
					
					if($International_selling=='Y')		
					{
							$taxcess2 = getonefielddata("SELECT count(paymentdetailid) from  tbldatingpaymentdetail WHERE paymentid='".$invoiceid."' and cess2_v!='' ");
							if($taxcess2>0)
							{
								$taxtype1='cess2';
							}else{$taxtype1='xyz';}
					}
		
		
	
 display_billing_info($invoiceid,$_SESSION[$session_name_initital . "memberuserid"],$taxtype1,'0','invoice');
	
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>


</head>
<body >
    <form name="form1">
    <div style="width:670px" align="center">
	<?= $invoice ?>
	
	</div>
    </form>
</body>
</html>