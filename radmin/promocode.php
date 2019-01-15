<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
/*if($pkg_mgmnt_pm_1 == 'Y' || $pkg_mgmnt_pm_1 == 'N') {*/
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui-1.7.1.custom.min.js"></script>





<script src="../jquery/datetimepicker/jquery13/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../jquery/datetimepicker/jquery_ui_datepicker/jquery_ui_datepicker.js" type="text/javascript"></script>
<script src="../jquery/datetimepicker/jquery_ui_datepicker/i18n/ui.datepicker-de.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="../jquery/datetimepicker/jquery_ui_datepicker/timepicker_plug/css/style.css">
<link rel="stylesheet" type="text/css" href="../jquery/datetimepicker/jquery_ui_datepicker/smothness/jquery_ui_datepicker.css">



<script type="text/javascript">
$(function() {
	$.noConflict();	
	$('#from_dt').datepicker(
	
	{
		changeMonth: true,
		changeYear: true,
		
	});	
});


$(function() {
		$('#to_dt').datepicker({
		changeMonth: true,
		changeYear: true,
	});	
});
</script>
<title><?= $admintitle ?></title>
<link href="../jquery/smoothness/jquery-ui-1.7.1.custom.css" rel="stylesheet" type="text/css">
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<h1 class="pagetitle">Special Offer Reports</h1>
			<div class="addlink1">
			<? //if($pkg_mgmnt_pm_2 == 'Y' || $pkg_mgmnt_pm_2 == 'N') { ?>
			<!--<div class="addlink"><a href="addspecialoffer.php">Add new Offer</a></div>-->
			<? //} ?>
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
<? if(!isset($_GET['msg'])) { ?>
<div class="form-wrapper">
<form name="search_recs" class="form_second" method="post" action="">
		<div class="form-group"><label>From Date</label>
		<input type="text" name="from_dt" value="" id="from_dt" class="form-control"></div>
		<div class="form-group"><label>To Date</label>
		<input type="text" name="to_dt" value="" id="to_dt" class="form-control"></div>
		<input type="submit" name="submit" class="btn" value="Search">
	
</form>
</div>
<? } ?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th width="5%" scope="col">ID</th>
		<th width="" scope="col">Date</th>
		<th width="" scope="col">InvoiceID</th>
		<th width="" scope="col">Agent OR Direct</th>
  		<th scope="col" width="">Promo Codes</th>
		<th scope="col" width="">Agent ID</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
if(isset($_POST['from_dt']) && isset($_POST['to_dt']) && $_POST['from_dt']!="" AND $_POST['to_dt']!=""){
	$from_dt = $_POST['from_dt'];
	$to_dt = $_POST['to_dt'];
	$searchqry = "tbldatingpaymentmaster.CreateDate between '".$from_dt."' AND '".$to_dt."' AND ";
}


$fromqry = " from tbldatingpaymentmaster, tblscspecialoffermaster where promo_code!='' AND clear='Y' AND ".$searchqry." tbldatingpaymentmaster.currentstatus in (0) ";
//$fromqry .= $searchqry;
$file= $_SERVER['REQUEST_URI'];
$file1 = "http://90.0.0.150".$file;
$site = "promocode.php?msg=u";


$arr = explode("/",$_SERVER['REQUEST_URI']);
$files=  end($arr);


if($files==$site)
{
$FileNm = "promocode.php?msg=u&";
}
else
{
	$FileNm = "promocode.php?";
}
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
//echo "select count(tblscspecialoffermaster.specialofferid) $fromqry";
$totalnorecord = getonefielddata("select count(tblscspecialoffermaster.specialofferid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
if(isset($_GET['msg']) && $_GET['msg']=='u'){	
	$result = getdata("select tbldatingpaymentmaster.CreateBy,tbldatingpaymentmaster.CreateDate,paymentid,promo_code". $fromqry." group by promo_code order by count(promo_code) desc ".$NoOfRecord);
} else {	
	$result = getdata("select tbldatingpaymentmaster.CreateBy as CreateBy,tbldatingpaymentmaster.CreateDate
	as CreateDate,paymentid,promo_code". 
	$fromqry." order by tbldatingpaymentmaster.CreateDate desc ".$NoOfRecord);
}
$cnt_promo = "";
while($rs= mysqli_fetch_array($result))
{
			if(isset($_GET['msg']) && $_GET['msg']=='u'){
			$cnt_promo = getonefielddata("SELECT count(promo_code) ".$fromqry." AND promo_code='".$rs['promo_code']."' 
			group by promo_code");
			}
		  	$userid=$rs['CreateBy'];
			$date=$rs['CreateDate'];
			$inv=$rs['paymentid'];
			$agent = getonefielddata("SELECT staff_agentid from tbldatingusermaster WHERE userid=".$userid);
			if($agent!=""){
				$agt = "Agent";
				$agent_id = $agent;
			} else {
				$agt = "Direct";
				$agent_id = "No Agent";
			}
			$promo = $rs['promo_code'];
			 
			
			
			//$buylink =$sitepath . "$default_folder_name/package_buy.php?b=$PackageId";
		 ?>
            <tr valign="top">
           	<td ><?=$userid?></td>
			<td ><?=$date?></td>
			<td><?=$inv?></td>
          	<td><?=$agt?></td>
            <td><?=$promo?>
			<? 	if(isset($_GET['msg']) && $_GET['msg']=='u'){ ?>
				<strong>(<?=$cnt_promo." times"?>)</strong>
			<? } ?>
			</td>
			<td ><?=$agent_id?></td>
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
	<td class="nextbackmid">&nbsp;</td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $packagemanager_help ?></div>
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
<?php /*?><? } else {
	header("location:dashboard.php?msg=no");
} ?><?php */?>