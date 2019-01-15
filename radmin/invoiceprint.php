<?
session_start();
include_once("commonfileadmin.php");
checkadminlogin("Y");
//$sitethemefolder ="";


$invoice = "";
if (isset($_GET["b"]) && $_GET["b"] != "" && is_numeric($_GET["b"]))
{
	
	$invoiceid = $_GET["b"];
	$chekvalidpaymentid = getonefielddata("select paymentid from tbldatingpaymentmaster where paymentid=$invoiceid  and currentstatus=0");
	
		
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
		
		
	
 display_billing_info($invoiceid,0,$taxtype1,'0','invoice');
}




exit;
$invoice = "";
function generateinvoiceprint($invoiceid)
{
	//$sitethemefolder="";
 	global $sitepath;
	$logo = findsettingvalue("invLogo_filenm");
    $curr = findsettingvalue("CurrencySymbol");
    $companyname = findsettingvalue("CompanyName");
	$companyaddress = findsettingvalue("CompanyAddress");
    global $sitethemefolder;
	
    $InvoiceVar = "<style>";
    $InvoiceVar .= ".tableborder1 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px solid #666666;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #000000;";
    $InvoiceVar .= "}";
    $InvoiceVar .=".boldtext1 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px none #666666;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".parabig1 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #000000;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".topbottomborder {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "border-top: 1px solid #666666;";
    $InvoiceVar .= "border-right: 1px none #666666;";
    $InvoiceVar .= "border-bottom: 1px solid #666666;";
    $InvoiceVar .= "border-left: 1px none #666666;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".boldtext2 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px none #666666;";
    $InvoiceVar .= "font-size: 18px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".boldtext3 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px none #666666;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".bottomborder {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "border-top: 1px none #666666;";
    $InvoiceVar .= "border-right: 1px none #666666;";
    $InvoiceVar .= "border-bottom: 1px solid #666666;";
    $InvoiceVar .= "border-left: 1px none #666666;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".small {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 10px;";
    $InvoiceVar .= "color: #333333;";
    $InvoiceVar .= "}";	
	$InvoiceVar .= ".printPageBreak {";
    $InvoiceVar .= "page-break-before: always;";
    $InvoiceVar .= "}";	
    $InvoiceVar .= "</style>";
    $InvoiceVar .= "<table cellspacing='7' cellpadding='5' width='670' border='0'>";
    $InvoiceVar .= "<tbody>";
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='tableborder1' align='middle' colspan='2'>";
	$InvoiceVar .= "<table width='100%' cellpadding='0' cellspacing='0' border='0'>";
//	$InvoiceVar .= "<img src=".$sitepath."uploadfiles/".$logo ." border='0' align='absmiddle' />&nbsp;</td>";

	$InvoiceVar .= "<img src=".$sitepath."uploadfiles/site_"; 
	$InvoiceVar .= $sitethemefolder."/".$logo ." border='0' align='absmiddle' />&nbsp;</td>";
	
	
	$InvoiceVar .= "<td class='parabig1'><span class='boldtext2'>" . $companyname . "</span>";
    $InvoiceVar .="<br />";
    $InvoiceVar .= $companyaddress . "</td></tr></table></td>";
    $InvoiceVar .="</tr>";
    $InvoiceVar .="<tr valign='top'>";
    $InvoiceVar .="<td class='tableborder1' width='331'>";
    $InvoiceVar .="<span class='boldtext1'>Bill / Ship To :</span>";
    $InvoiceVar .="<br />";
 
    //$result = getdata("select date_format(paymentdate, '%m-%d-%Y'),totalpaymentamount,paidamount,name,address,city,area,countryid,postcode,state from tbldatingpaymentmaster,tbldatingusermaster  where tbldatingpaymentmaster.CreateBy=tbldatingusermaster.userid and paymentid =$invoiceid");
	global $date_format;
	//$result = getdata("select date_format(tbldatingpaymentmaster.CreateDate, '$date_format'),totalpaymentamount,paidamount,name,city,area,countryid,postcode,state,profile_code,email,mobile from tbldatingpaymentmaster,tbldatingusermaster  where tbldatingpaymentmaster.CreateBy=tbldatingusermaster.userid and paymentid =$invoiceid");
	$result = getdata("select date_format(tbldatingpaymentmaster.CreateDate, '$date_format'),totalpaymentamount,paidamount,name,city_id,area,countryid,postcode,state,profile_code,email,mobile from tbldatingpaymentmaster,tbldatingusermaster  where tbldatingpaymentmaster.CreateBy=tbldatingusermaster.userid and paymentid =$invoiceid");
	while ($rs = mysqli_fetch_array($result))
	{
		$invoicedate = $rs[0];
	  	$invoiceamount = $rs[1];
	  	$paidinvoiceamount = $rs[2];
		$name = $rs[3];
		if($rs[4]!='0.0' && $rs[4]!="" && is_numeric($rs[4])){		
			$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[4]);			
		} else {
			$city = "";
		}	  	
	  	$area = $rs[5];
	  	$country ="";
	  	if ($rs[6] != "" && $rs[6]!='0.0' && is_numeric($rs[6])){
	  		$country = getonefielddata("select title from tbldatingcountrymaster where id=$rs[6]");
		} else {
			$country = '';	
		}
			$pin ="";
	  	if ($rs[7] !="")
	  	$pin = "pin : " . $rs[7];
		$state = $rs[8];
		$profile_code = $rs[9];
		$email = $rs[10];
		$phone = $rs[11];
    }  
	freeingresult($result);       
    $InvoiceVar .=  "Mr/Ms." . $name . "<br />";
	$InvoiceVar .=  "Profile Code. - " . $profile_code . "<br />";
	$InvoiceVar .=  "Email. - " . $email . "<br />";
	$InvoiceVar .=  "Contact No. - " . $phone . "<br />";
    //$InvoiceVar  .= $address . "<br>";
	$InvoiceVar  .= $area . "<br>";
	$InvoiceVar  .= $city . "<br>";
    $InvoiceVar  .= $state . "<br>";
    $InvoiceVar  .= $country . "<br>";
    $InvoiceVar  .= $pin . "<br>";
    $InvoiceVar  .= "</td>";
    $InvoiceVar  .= "<td class='tableborder1' width='298'>";
    $InvoiceVar  .= "<span class='boldtext3'>Invoice ID : " . $invoiceid . "</span>";
    $InvoiceVar  .= "<br />";
    $InvoiceVar  .= "<br />";
    $InvoiceVar  .= "<span class='boldtext3'>Date : " . $invoicedate . "</span>";
    $InvoiceVar  .= "<br/>";
    $InvoiceVar  .= "<br/>";
             
	$InvoiceVar       .= "</tr>";
    $InvoiceVar       .= "<tr valign='top'>";
    $InvoiceVar       .= "<td class='tableborder1' colspan='2'>";
    $InvoiceVar       .= "<table cellspacing='0' cellpadding='3' width='100%' border='0'>";
    $InvoiceVar       .= "<tbody>";
    $InvoiceVar       .= "<tr valign='top'>";
    $InvoiceVar       .= "<td class='bottomborder' width='39%'>";
    $InvoiceVar       .= "Transactions Details</td>";
    $InvoiceVar       .= "<td class='bottomborder' width='10%'>";
    $InvoiceVar       .= "&nbsp;</td>";
    $InvoiceVar       .= "<td class='bottomborder' width='10%'>";
    $InvoiceVar       .= "&nbsp;</td>";
    $InvoiceVar       .= "<td class='bottomborder' align='center' width='14%'>";
    $InvoiceVar       .= "Days</td>";
    $InvoiceVar       .= "<td class='bottomborder' align='right' width='27%'>";
    $InvoiceVar       .= "Amount ( ". $curr ." )</td>";
    $InvoiceVar       .= "</tr>";
  	 
    $totqty =0;
	
	
	$result = getdata("select tbldatingpackagemaster.Description,tbldatingpaymentdetail.days,tbldatingpaymentdetail.price from tbldatingpaymentdetail,tbldatingpackagemaster where tbldatingpaymentdetail.packageid=tbldatingpackagemaster.PackageId and paymentid =$invoiceid");
	while ($rs = mysqli_fetch_array($result))
	{
		$packagename = $rs[0];
		$days = $rs[1];
		$price = $rs[2];
		
    $InvoiceVar  .= "<tr valign='top'>";
    $InvoiceVar  .= "<td class='parabig1'>$packagename</td>";
    $InvoiceVar  .= "<td class='parabig1'>&nbsp;</d>";
	$InvoiceVar  .= "<td class='parabig1'>&nbsp;</d>";
	$InvoiceVar  .= "<td class='parabig1' align='center'>$days</d>";
    $InvoiceVar  .= "<td class='parabig1' align='right'>$price</td>";
    $InvoiceVar  .= "</tr>";
	}
	freeingresult($result);
    //$InvoiceVar .="<tr valign='top'>";
//    $InvoiceVar .= "<td class='boldtext1' align='right'>";
//    $InvoiceVar .= "Others :</td>";
//    $InvoiceVar .= "<td class='boldtext1' colspan=3 align='middle'>";
//    $InvoiceVar .= "</td>";
//    $InvoiceVar .= "<td class='boldtext1' align='right'>";
//    $InvoiceVar .= "&nbsp;</td></tr>";
	
	global $agent_module_enable;
	if ($agent_module_enable == "Y") 
	{ 
	$discount = getonefielddata("select agent_discount_per from tbldatingpaymentmaster where currentstatus =0 and paymentid=$invoiceid");
	if($discount>0){
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "agent discount :</td>";
    $InvoiceVar .= "<td class='boldtext1' align='middle'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=3 align='right'>";
    //$InvoiceVar .= $curr . " " . $discount . "%</td>";
	$InvoiceVar .= $discount . "%</td>";
    $InvoiceVar .= "</tr>";
	}
	}	 
 	$InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "Invoice Amount :</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=3 align='middle'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= $curr . $invoiceamount . "</td>";
    $InvoiceVar .= "</tr>";
	
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "Paid Amount :</td>";
    $InvoiceVar .= "<td class='boldtext1' align='middle'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=3 align='right'>";
    $InvoiceVar .= $curr . $paidinvoiceamount . "</td>";
    $InvoiceVar .= "</tr>";
    $InvoiceVar .= "</tbody>";
    $InvoiceVar .= "</table>";
    $InvoiceVar .= "</td>";
    $InvoiceVar .= "</tr>";
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='small' colspan='2'>";
    $InvoiceVar .= findsettingvalue("InvoiceFooter") . "</td>";
    $InvoiceVar .= "</tr>";
	return $InvoiceVar;
}
if (isset($_GET["b"]) && $_GET["b"] != "" && is_numeric($_GET["b"]))
{
	$invoiceid = $_GET["b"];
	$chekvalidpaymentid = getonefielddata("select paymentid from tbldatingpaymentmaster where paymentid=$invoiceid and currentstatus=0");
	if ($chekvalidpaymentid != "")
		$invoice = generateinvoiceprint($invoiceid);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<script language="javascript">
function printPage()
{
if (window.print) {
		agree = confirm("<?= $invoiceprintmess ?>");
		if (agree) window.print();
		}
}
</script>
</head>
<body onLoad="printPage()">
    <form name="form1">
    <div style="width:670px" align="center">
	<?= $invoice ?>
	<!--<input onClick="printPage()" type="submit" value="<?= $invoiceprintbuttontext ?>" name="B1" />-->
	</div>
    </form>

</body>
</html>