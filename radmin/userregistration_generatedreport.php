<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$logo = getonefielddata("SELECT logo from tbl_company_master WHERE id=1");
$compname = getonefielddata("SELECT name from tbl_company_master WHERE id=1");
$address = getonefielddata("SELECT address from tbl_company_master WHERE id=1");
$phone = getonefielddata("SELECT phone from tbl_company_master WHERE id=1");

?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>userregistration</title>
<link href="reportstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div class="reportbody">
  <div class="reportbuttons">    
  <input type="button" value="&nbsp;" class="printicon" onClick="send_for_print()">
  
  
<?php /*?><form method="post" action="userregistration_csv.php"><input type="submit" class="excellicon" value="&nbsp;" ></form>
<form method="post" action="userregistration_pdf.php" target="_blank"><input type="submit" value="&nbsp;" class="pdficon" ></form><?php */?>
  </div>
  <?
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
  </address>
  <h1>userregistration Report <?=$_POST['from_date']?> TO <?=$_POST['to_date']?></h1>
  <table width="100%" cellpadding="0" cellspacing="0" border="0" class="reporttable">
  <th scope='col'>userid</th><th scope='col'>email</th><th scope='col'>password</th><th scope='col'>name</th><th scope='col'>genderid</th><th scope='col'>dob</th><th scope='col'>countryid</th><th scope='col'>state</th><th scope='col'>city</th><th scope='col'>postcode</th><th scope='col'>nickname</th><th scope='col'>religianid</th><th scope='col'>motherthoungid</th><th scope='col'>mobile</th><th scope='col'>maritalstatusid</th><th scope='col'>heightid</th><th scope='col'>weightid</th><th scope='col'>castid</th><th scope='col'>educationid</th><th scope='col'>ocupationid</th><th scope='col'>profileheadline</th><th scope='col'>annual_income_currancyid</th><th scope='col'>annual_income_id</th>
<?
$searchq = "";
$_SESSION[$session_name_initital . 'userregistrationfrmdate'] = '';
$_SESSION[$session_name_initital . 'userregistrationtodate'] = '';
if(isset($_POST['from_date']) && $_POST['from_date']!=''){
	$from_date = change_date_format($_POST['from_date']);
	$searchq .= " AND createdate>='".$from_date."' ";
	$_SESSION[$session_name_initital . 'userregistrationfrmdate'] = $from_date;
}
if(isset($_POST['to_date']) && $_POST['to_date']!=''){	
	$to_date = change_date_format($_POST['to_date']);
	$searchq .= " AND createdate<='".$to_date."' ";
	$_SESSION[$session_name_initital . 'userregistrationtodate'] = $to_date;
}
$fromqry = " from tbldatingusermaster where currentstatus in (0) ".$searchq." ";
$FileNm = "userregistration_report.php?";
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;
if ($Pgnm == "")
	$Pgnm = 1;
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$result = getdata("select userid,email,password,name,genderid,dob,countryid,state,city,postcode,nickname,religianid,motherthoungid,mobile,maritalstatusid,heightid,weightid,castid,educationid,ocupationid,profileheadline,annual_income_currancyid,annual_income_id $fromqry  $NoOfRecord ");
while($rs = mysqli_fetch_array($result)){
	$userid = $rs[0];$email = $rs[1];$password = $rs[2];$name = $rs[3];$genderid = $rs[4];$dob = $rs[5];$countryid = $rs[6];$state = $rs[7];$city = $rs[8];$postcode = $rs[9];$nickname = $rs[10];$religianid = $rs[11];$motherthoungid = $rs[12];$mobile = $rs[13];$maritalstatusid = $rs[14];$heightid = $rs[15];$weightid = $rs[16];$castid = $rs[17];$educationid = $rs[18];$ocupationid = $rs[19];$profileheadline = $rs[20];$annual_income_currancyid = $rs[21];$annual_income_id = $rs[22];
	
?>    
    <tr valign="top">
      <td><?=$userid?>&nbsp;</td><td><?=$email?>&nbsp;</td><td><?=$password?>&nbsp;</td><td><?=$name?>&nbsp;</td><td><?=$genderid?>&nbsp;</td><td><?=$dob?>&nbsp;</td><td><?=$countryid?>&nbsp;</td><td><?=$state?>&nbsp;</td><td><?=$city?>&nbsp;</td><td><?=$postcode?>&nbsp;</td><td><?=$nickname?>&nbsp;</td><td><?=$religianid?>&nbsp;</td><td><?=$motherthoungid?>&nbsp;</td><td><?=$mobile?>&nbsp;</td><td><?=$maritalstatusid?>&nbsp;</td><td><?=$heightid?>&nbsp;</td><td><?=$weightid?>&nbsp;</td><td><?=$castid?>&nbsp;</td><td><?=$educationid?>&nbsp;</td><td><?=$ocupationid?>&nbsp;</td><td><?=$profileheadline?>&nbsp;</td><td><?=$annual_income_currancyid?>&nbsp;</td><td><?=$annual_income_id?>&nbsp;</td>
    </tr>    
<? } ?>
      </table>
  <table width=100% align=center class="nextbackbox" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left" class="backlink"></td>
      <td class="nextbackpgnum"></td>
      <td align="right" class="nextlink"></td>
    </tr>
  </table>
</div>
</body>
</html>
<script language="javascript">
function send_for_print()
{
	window.print();
}
</script>