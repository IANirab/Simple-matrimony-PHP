<?
include("commonfileadmin.php");
//checkloginteam();
$page_name = "Top 10 Promo Code";
//$action = 0;
/*if(isset($_GET['b']) && $_GET['b']!='' && is_numeric($_GET['b'])){
	$action = $_GET['b'];
}*/
//$logo = "";
//$compname = "";
//$address = "";
//$phone = "";
$specialoffercode="";
$specialoffertype="";
$specialsffervalue="";
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Report</title>
<link href="reportstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div class="reportbody">
  <div class="reportbuttons">
  <input type="button" value="&nbsp;" class="printicon" onClick="send_for_print()">
<form method="post" action="invoice_report_csv.php"><input type="submit" class="excellicon" value="&nbsp;" ></form>
<form method="post" action="invoice_report_pdf.php" target="_blank"><input type="submit" value="&nbsp;" class="pdficon" ></form>    
  </div>
  <?php /*?><?
  if($logo!=''){
  ?>
  <img src="../uploadfiles/<?=$logo?>" class="reportlogo" />
  <? } if($compname!='') { ?>
  <h2><?=$compname?></h2>
  <? } ?>
  <address>
  <?
  if($address!='') { ?>
  <?=$address?><br />
  <? } if($phone!='') { ?>
  Phone : <?=$phone?>
  <? } ?>
  </address><?php */?>
  <h1>Top 10 Promo Code 
  <?php /*?><? if(isset($_POST['from_date']) && $_POST['from_date']!='' && isset($_POST['to_date']) && $_POST['to_date']!=''){ ?>
  (<?=$_POST['from_date']?> To <?=$_POST['to_date']?>)
  <? } ?><?php */?>
  </h1>
  <table width="100%" cellpadding="0" cellspacing="0" border="0" class="reporttable">
    <tr>
      <th scope="col">specialoffercode</th>
      <th scope="col">specialoffertype</th>
      <th scope="col">specialsffervalue</th>
      <!--<th scope="col">Potential Revenue</th>
      <th scope="col">Assigned To</th>-->              
    </tr>
<?
//$fromqry = "";
//$searchq = "";
//$from_date = "";
/*if(isset($_POST['from_date']) && $_POST['from_date']!=''){
	$from_date = $_POST['from_date'];		
	$searchq .= " AND tblcrm_ticket_master.createdate>='".$from_date."' ";
}
if(isset($_POST['to_date']) && $_POST['to_date']!=''){
	$to_date = $_POST['to_date'];
	$searchq .= " AND tblcrm_ticket_master.createdate<='".$to_date."'";
}
if(isset($_POST['status']) && $_POST['status']!='0.0'){
	$status = $_POST['status'];
	$searchq .= " AND tblcrm_ticket_master.lead_status=".$status;
}*/
$pastdate=date('Y-m-d',strtotime("-365 days")); 

$currentdate=date('Y-m-d');


$fromqry = "from tblscspecialoffermaster INNER JOIN  tbldatingpaymentmaster ON  tblscspecialoffermaster.specialofferid=tbldatingpaymentmaster.promo_code AND  tbldatingpaymentmaster.currentstatus=0 AND  tblscspecialoffermaster.currentstatus=0 AND  tbldatingpaymentmaster.CreateDate>='".$pastdate."' AND tbldatingpaymentmaster.CreateDate<='".$currentdate."' group by tblscspecialoffermaster.specialoffercode order by count(*) desc";
$FileNm = "toppromocode.php?";
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;
if ($Pgnm == "")
	$Pgnm = 1;
$totalnorecord = getonefielddata("select count(tblscspecialoffermaster.specialofferid) $fromqry ");
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$result = getdata("select tblscspecialoffermaster.specialoffercode,tblscspecialoffermaster.specialoffertype,tblscspecialoffermaster.specialsffervalue,count(*) $fromqry  $NoOfRecord ");
//$paxtotal = 0;
//$amnttotal = 0;
//$nighttotal = 0;
while($rs = mysqli_fetch_array($result)){
	$specialoffercode=$rs[0];
	$specialoffertype=$rs[1];
	$specialsffervalue=$rs[2];
	
	
?>    
    <tr valign="top">
     <td><?=$specialoffercode?>&nbsp;</td>
     <td><?=$specialoffertype?>&nbsp;</td>
     <td><?=$specialsffervalue?>&nbsp;</td>
    </tr>    
<? } ?>
      </table>  
</div>
</body>
</html>