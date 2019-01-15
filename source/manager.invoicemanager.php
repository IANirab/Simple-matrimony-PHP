<div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $invoicemngrpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div> 

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
		<div class="MyBillingPage">		
		<form method='post' name='frmmodify'><input type='hidden' name='hidid'></form>

<div class="errorbox"><span><?php checkerror(); ?></span></div>
<div class="table-responsive grlink">
<table border=0 width="100%" align="center" cellpadding="0" cellspacing="0" class="grborder">
	<thead>
			<tr>
			<th width="8%" class="grhead right_brd"><?= $invoicemngrid ?></th>
            <th width="13%" class="grhead right_brd"><?= $invoicemngrpackage ?></th>
            <th width="13%" class="grhead right_brd"><?= $invoicemngrpaymenttype ?></th>
			<th width="10%" class="grhead right_brd"><?= $invoicemngramount ?></th>            
			<th width="22%" class="grhead right_brd"><?= $invoicemngrpaymentdate ?></th>
			<th width="8%" class="grhead right_brd"><?= $invoicemngrcleardate ?></th>
           <th class="grhead" width="18%" align="center"><?= $invoicemngrutaction ?></th>
			</tr>
            </thead>
            <tbody>
			<?
			$FileNm = $sitepath . "invoicemanager.php";
			$fromqry = "from tbldatingpaymentmaster,tbldatingpaymentdetail,tbldatingpackagemaster where tbldatingpaymentmaster.CreateBy=$curruserid AND tbldatingpaymentmaster.paymentid=tbldatingpaymentdetail.paymentid AND tbldatingpaymentdetail.packageid=tbldatingpackagemaster.Packageid AND tbldatingpaymentmaster.currentstatus in(0) AND tbldatingpackagemaster.PackageTypeId!=3 and tbldatingpaymentmaster.paymenttypeid!='' order by tbldatingpaymentmaster.paymentid desc  ";
			if (isset($_GET["pgnm"]))
				$Pgnm = $_GET["pgnm"];
			else
				$Pgnm = 1;
		$totalnorecord = getonefielddata( "select count(tbldatingpaymentmaster.paymentid) $fromqry ");
		
		$arrval = setpaging($Pgnm,$totalnorecord,$FileNm ."?",$invoicemngrltnext,$invoicemngrltback);
		$NoOfRecord = $arrval["NoOfRecord"];
		$BackStr = $arrval["BackStr"];
		$NextStr = $arrval["NextStr"];
	
		$result = getdata("select tbldatingpaymentmaster.paymentid, tbldatingpaymentmaster.totalpaymentamount,
		tbldatingpaymentmaster.clear,date_format(tbldatingpaymentmaster.cleardate,'$date_format'),
		date_format(tbldatingpaymentmaster.createdate,'$date_format'), tbldatingpackagemaster.Description,
		promo_code,txnid,paymenttypeid,tbldatingpaymentdetail.paymentdetailid $fromqry $NoOfRecord");
		while($rs= mysqli_fetch_array($result))
		{
		 $paymentid = $rs[0] ;
		 //$paymentid = $rs['paymentdetailid'];
		 $totalpaymentamount = $rs[1];
		 $clear = $rs[2];
		 if($rs[3]!=''){
		 	$cleardate = $rs[3];
		 } else {
			$cleardate = $badgesPending; 
		 }
		 $paymentdate= $rs[4];
		 $package = $rs[5];
		 $promocode = $rs[6];
		 if($same_currency_code=="N"){
		 $list_pkgs = getdata("SELECT packageid from tbldatingpaymentdetail WHERE paymentid=".$paymentid);		 
		 $pkgs = "";
		 while($list_rs = mysqli_fetch_array($list_pkgs)){
			$pkgs .= $list_rs[0].",";
		 }
		 
		 }
		 $txnid = $rs['txnid'];
		 $paymenttypeid = $rs['paymenttypeid'];
		 if($rs['paymenttypeid']!=''){
			$paymenttype = getonefielddata("SELECT paymenttype from tbldatingpaymenttypemaster WHERE paymenttypeid=".$rs['paymenttypeid']);	 
		 } else {
			 $paymenttype = '';
		 }
		 
		 $paymentdetailid1 = $rs['paymentdetailid'];
		?>
			<tr>
		    <td class="gritem right_brd"><?= $paymentid ?>&nbsp;</td>
            <td class="gritem right_brd"><?= $package ?>&nbsp;</td>
            <td class="gritem right_brd"><?= $paymenttype ?>&nbsp;</td>
			<td class="gritem right_brd"><?= $totalpaymentamount  ?>&nbsp;</td>
			<td class="gritem right_brd"><?= $paymentdate  ?>&nbsp;</td>            
			<td class="gritem right_brd"><?= $cleardate  ?>&nbsp;</td>
           <td align="center" class="gritem">
			<? if($clear=='Y'){ ?>
            <a target="_blank" href='<?= $sitepath ?>invoiceprint.php?b=<?= $paymentid?>'><?= $invoicemngrprint ?></a>
			<? } ?>
			<? if (($clear == "N")&&($totalpaymentamount>0)) { ?>
			 
		<a href='<?= $sitepath ?>payment.php?b=<?= $paymentid?>'><span class="deletelink"><?= $invoicemngrpaynow ?></span></a>
	<?       }
			}
				freeingresult($result);
			?>
			</td></tr> 
            </tbody>
            </table>
</div>		
	
<div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<!-- < ?= $objapp->NoofPages ?>-->
<div class="nexttext"><?= $NextStr ?></div>
</div>

</div>
		
		
		<!-- ********* CONTENT END HERE *********-->
		</div>