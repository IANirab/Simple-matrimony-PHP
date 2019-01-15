<?
include("commonfileadmin.php");
//checkloginteam();
$page_name = "Monthly Male Registration";

if(isset($_GET['b']) && $_GET['b'])
{
	$action=$_GET['b'];
}
//$action = 0;
/*if(isset($_GET['b']) && $_GET['b']!='' && is_numeric($_GET['b'])){
	$action = $_GET['b'];
}*/
//$logo = "";
//$compname = "";
//$address = "";
//$phone = "";
$userid="";
$name="";
$email="";
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
  <!--<input type="button" value="&nbsp;" class="printicon" onClick="send_for_print()">-->
<!--<form method="post" action="invoice_report_csv.php"><input type="submit" class="excellicon" value="&nbsp;" ></form>-->
<!--<form method="post" action="invoice_report_pdf.php" target="_blank"><input type="submit" value="&nbsp;" class="pdficon" ></form>-

->    
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
 <h1>Monthly Sales Report 
  <?php /*?><? if(isset($_POST['from_date']) && $_POST['from_date']!='' && isset($_POST['to_date']) && $_POST['to_date']!=''){ ?>
  (<?=$_POST['from_date']?> To <?=$_POST['to_date']?>)
  <? } ?><?php */?>
  </h1>
  <table width="100%" cellpadding="0" cellspacing="0" border="0" class="reporttable">
    <tr>
      <th scope="col">Sales Month</th>
      <th scope="col">Sales Amount</th>
      
      
      <!--<th scope="col">Potential Revenue</th>
      <th scope="col">Assigned To</th>--> 
      <!--$month = 7;

$tempDate = mktime(0, 0, 0, $month, 1, 1900); 

echo date("m",$tempDate);-->

      
      <?php $months=$_POST['month'];
	  //$tempDate = mktime(0, 0, 0, $months, 1, 1900);
	  
	  ?>        
      <?php
//$monthNum = 5;
$monthName = date("F", mktime(0, 0, 0,$months));
//echo $monthName; //output: May
?>     
    
    <h1>Monthly Male Registration Report <br> <?=$monthName?> - <?=$_POST['year']?>
  <?php /*?><? if(isset($_POST['from_date']) && $_POST['from_date']!='' && isset($_POST['to_date']) && $_POST['to_date']!=''){ ?>
  (<?=$_POST['from_date']?> To <?=$_POST['to_date']?>)
  <? } ?><?php */?>
  </h1>
  <table width="100%" cellpadding="0" cellspacing="0" border="0" class="reporttable">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      
      
      <!--<th scope="col">Potential Revenue</th>
      <th scope="col">Assigned To</th>-->              
    </tr>
<?
//$fromqry = "";
//$searchq = "";
$searchq = "";
if(isset($_POST['year']) && $_POST['year']!='')
{
	$year=$_POST['year'];
	$searchq .=" AND DATE_FORMAT(tbldatingusermaster.createdate,'%Y')='".$_POST['year']."' ";
}
if(isset($_POST['month']) && $_POST['month']!='')
{
	$year=$_POST['month'];
	$searchq .=" AND DATE_FORMAT(tbldatingusermaster.createdate,'%m')='".$_POST['month']."' ";
}
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

/*$fromqry = "from  tbldatingusermaster where currentstatus=0 ".$searchq." and genderid=$action and DATE_FORMAT(createdate,'%Y-%m')

='".date('Y-m')."' order by createdate asc";*/


$fromqry = "from  tbldatingusermaster where currentstatus=0 ".$searchq." and genderid=$action  order by createdate asc";
$FileNm = "monthlymaleregistrations.php?";
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;
if ($Pgnm == "")
	$Pgnm = 1;
$totalnorecord = getonefielddata("select count(tbldatingusermaster.userid) $fromqry ");
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
/*echo "select  userid,email,name,createdate $fromqry  $NoOfRecord "; exit;*/
$result = getdata("select  userid,email,name,createdate $fromqry  $NoOfRecord ");
//$paxtotal = 0;
//$amnttotal = 0;
//$nighttotal = 0;
while($rs = mysqli_fetch_array($result)){
	
	$userid=$rs[0];
	
	$email=$rs[1];
	$name=$rs[2];
	$createdate=$rs[3];
	
	
?>    
    <tr valign="top">
    <td><?=$name?>&nbsp;</td>
    <td><?=$email?>&nbsp;</td>
    <td><?=$createdate?>&nbsp;</td>
     
    </tr>    
<? } ?>
      </table>  
</div>
</body>
</html>