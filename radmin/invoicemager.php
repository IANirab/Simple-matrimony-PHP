<?
session_start();
require_once("commonfileadmin.php");
//checkadminlogin("Y");
if (!isset($_SESSION[$session_name_initital . "session_invoice"]))
	$_SESSION[$session_name_initital . "session_invoice"] = '';;
	
if (isset($_GET["b1"]))
$_SESSION[$session_name_initital . "session_invoice"]= "";

if (isset($_GET["b"]))
$clear =$_GET["b"];
else
$clear = "N";
if ($clear == "Y")
	$pgtitle = "Clear";
elseif ($clear == "N")
	$pgtitle = "Unclear";
elseif ($clear == "C")
	$pgtitle = "Cancel";
	
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$invoice_msgmnt_imu_1 = invoice_msgmnt_imu_1();
	$invoice_msgmnt_imu_2 = invoice_msgmnt_imu_2();
	$invoice_msgmnt_imu_3 = invoice_msgmnt_imu_3();
	$invoice_msgmnt_imu_4 = invoice_msgmnt_imu_4();	
} else {	
	$invoice_msgmnt_imu_1 = "N";
	$invoice_msgmnt_imu_2 = "N";
	$invoice_msgmnt_imu_3 = "N";
	$invoice_msgmnt_imu_4 = "N";	
}
if($invoice_msgmnt_imu_1 == 'Y' || $invoice_msgmnt_imu_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>
<?= $admintitle ?>
</title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">

    <!-- TOP START ######################## -->
    <?php include("admintop.php") ?>
    <!-- TOP END ######################## -->
<div class="pagewrapper">
	<div class="container">
      <!-- LEFT START ######################## -->
      <?php include("adminleft.php") ?>
      <!-- LEFT END ######################## --> 
      
      <!-- RIGHT START ######################## -->
      <?php include("adminright.php") ?>
      <!-- RIGHT END ######################## --> 
      
      <!-- CENTER START ######################## -->
     <div class="col-lg-9 center_right">
        <div id="center-in"> 
          <!-- ********* TITLE START HERE *********-->
          <h1 class="pagetitle">
              <i class="fa fa-list"></i> <?= $pgtitle ?> Invoice Manager</h1>
        
          <!-- ********* TITLE END HERE *********-->
          <div id="pagecontent"> 
            <!-- ********* CONTENT START HERE *********-->
            
            
              <?= checkerroradmin()?>
            
            
             <div class="form-wrapper inc_form">
               <form name="frm_search_profile" class="form_first" action="invoice_search_profileid.php" method="post">
                    <div class="form-group">
                    <label>search by profile id </label>
                    <input type="text" name="txtprofileid" class="form-control">
                    <input type="submit" value="Search" class="btn">
                    </div>
                  </form>
                  <form name="frmsearch"  class="form_first"method="post" action="invoicesearch_id.php?b=<?= $clear ?>">
                    <label> Search By Invoice ID</label>
                    <input type="text" name="txtinvoiceid" class="form-control">
                    <input type="submit" value="Search" class="btn">
                  </form>
                  <form name="frmsearch" method="post" class="form_first" action="invoicesearch.php?b=<?= $clear ?>">
                  
                   <label> Keyword</label>
                    <input type="text" name="txtsearch"  class="form-control">
                    <input type="submit" value="Search" class="btn">
                  </form>
              </div>
              <div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>

                <th scope="col" width="5%">Id</th>
                <th scope="col" width="10%" class="mobile_none">date</th>
                <th scope="col" width="5%">amount</th>
                <th scope="col" width="10%">status</th>
                <th scope="col" width="40%">user</th>
                <th scope="col" width="10%">Action</th>
              </tr>
              </thead>
              <tbody>
              <?


$searchqry = "";
$fromqry = " from tbldatingpaymentmaster,tbldatingusermaster where " . $_SESSION[$session_name_initital . "session_invoice"] . " tbldatingpaymentmaster.currentstatus in (0) and clear='$clear' and tbldatingusermaster.userid=tbldatingpaymentmaster.CreateBy
  and tbldatingpaymentmaster.paymenttypeid!='' ";
$fromqry .= $searchqry;
$FileNm = "invoicemager.php?b=$clear&";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
$totalnorecord = getonefielddata( "select count(paymentid) $fromqry ");		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];
$result = getdata("select paymentid,date_format(tbldatingpaymentmaster.CreateDate,'$date_format'),totalpaymentamount,paymentstatus,email,concat(substr(name,1,1),'-',profile_code),name,mobile,imagenm,tbldatingpaymentmaster.CreateBy,promo_code,tbldatingpaymentmaster.display_amount ". $fromqry ." order by paymentid desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$paymentid=$rs[0];
			$CreateDate=$rs[1];
			$totalpaymentamount=$rs[2];
			$paymentstatus =$rs[3];
			$CreateBy=$rs[4];
			
			//$profile_code = $rs[5];
			$profile_code = display_profile_code($rs[9]);
		 $name = $rs[6];
		 $mobile= $rs[7];
		 
		 $imagenm= $rs[8];
		 if ( $imagenm == "")
		 	 $imagenm ="noimage.gif";
			  $imagenm ="<img src='../uploadfiles/$imagenm' height=50 width=50 align=left  style=margin-right:10px>";
		$promo = $rs['promo_code'];	
		$display_amount = $rs['display_amount'];
		if($same_currency_code=="N" && $display_amount!=''){
		//changed by jp
		//	$totalpaymentamount = $display_amount;	
		}
		 
			//$CreateBy = getonefielddata("select email from tbldatingusermaster where userid=" . $rs[4]);
		 ?>
              <tr valign="top">
                <td ><span class="high_light"><?=$paymentid?></span>
                  &nbsp;</td>
                <td class="mobile_none"><?=$CreateDate?>
                  &nbsp;</td>
                <td ><?=$totalpaymentamount?>
                  &nbsp;</td>
                <td ><? if($paymentstatus!='') { ?>
                  <?=$paymentstatus?>
                  <? } else { ?>
                  <?=$pgtitle?>
                  ed
                  <? } ?>
                  &nbsp;</td>
                <td><?= $imagenm ?>
                  <strong>
                  <?= $name ?>
                  </strong> [
                  <?= $profile_code ?>
                  ]<br>
                  <strong>Email ID :</strong>
                  <?=$CreateBy?>
                  <br>
                  <strong>Mobile No. : </strong>
                  <?= $mobile ?>
                  <? if($promo!="") { ?>
                  <br>
                  <strong>Promo Code. : </strong>
                  <?= $promo ?>
                  <? } ?></td>
                <td ><? if($invoice_msgmnt_imu_2 == 'Y' || $invoice_msgmnt_imu_2 == 'N') { ?>
                  <a href="invoicedetail.php?b=<?= $paymentid ?>" class="actionbtn">Detail</a>
                  <a href="invoiceprint.php?b=<?= $paymentid ?>" class="actionbtn green">Print</a>
                  <? } ?>
                  <? if ($clear == "N") { 
				 if($invoice_msgmnt_imu_3 == 'Y' || $invoice_msgmnt_imu_3 == 'N') {	?>
                  <a href="invoiceclearmaster.php?b=<?= $paymentid ?>" class="actionbtn">Clear</a>
                  <?  }
				} if($invoice_msgmnt_imu_4 == 'Y' || $invoice_msgmnt_imu_4 == 'N') { ?>
                  <a href="invoicedelete.php?b=<?= $paymentid ?>&b1=<?= $clear ?>" class="actionbtndel red">Cancel</a>
                  <? } ?></td>
              </tr>
              <?
	}
	freeingresult($result);
	?>
    </tbody>
            </table>
            </div>
            <table width=100% align=center class="nextbackbox" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" <?= adminnextbackcls ?>><?= $BackStr ?></td>
                <td class="nextbackmid"><?= $page_no_str ?></td>
                <td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
              </tr>
            </table>
            <!-- ********* CONTENT END HERE *********--> 
          </div>
        </div>
        <div class="adminhelp">
          <h3>
            <?= $helphead ?>
          </h3>
          <?= $invoicemanager_help ?>
        </div>
        <br style="clear:both">
      </div>
      <!-- CENTER END ######################## --> 
    </div>
    
    <!-- FOOTER START ######################## -->
    <?php include("adminbottom.php") ?>
    <!-- FOOTER END ######################## --> 
  </div>
</div>
</body>
</html>
<? } else{
	header("location:dashboard.php?msg=no");
	exit;
} ?>