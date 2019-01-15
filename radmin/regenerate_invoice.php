<? session_start();
require_once("commonfileadmin.php");
checkadminlogin();


$inv_end=findsettingvalue("invoice_end");
$inv_strt=findsettingvalue("invoice_start");


$i=1;
$result = getdata("select CreateDate,new_paymetid2,paymentid from   tbldatingpaymentmaster where
 new_paymetid2!='' and clear!='C' order by new_paymetid2 asc ");

while($rs= mysqli_fetch_array($result))
{
	
	$CreateDate=$rs[0];
	$new_paymetid2=$rs[1];
	$paymentid=$rs[2];
	
	if($inv_end>=$CreateDate && $inv_strt<=$CreateDate)
	{
		//echo $paymentid."<br>";
		 $sSql = "update tbldatingpaymentmaster set new_paymetid2='".$i."'  where paymentid='".$paymentid."' ";
		execute($sSql);
		$i++;
	}

}


echo "Regenerate Invoiceid Successfully";

?>