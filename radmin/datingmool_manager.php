<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if(isset($_GET['b1']) && $_GET['b1']=='-1')
{
	$_SESSION[$session_name_initital . "admin_user_search"]='';
}
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" href="../jquery/smoothness/jquery-ui-1.7.1.custom.css" rel="stylesheet" />
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../jquery/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../jquery/jquery-ui-1.7.1.custom.min.js" type=text/javascript></script>
<script language="javascript" type="text/javascript">
function chkforrec() {
	if(document.getElementById("allrec").value == 0) {
		document.getElementById("hideifnot").style.display = "none";
	}
}
function chkall(tot) {
	var newvar = "";
	for(var i = 1; i < tot; i++) {
		if(document.getElementById("chk"+i).checked == false) {
			document.getElementById("chk"+i).checked = true;
		} else {
			document.getElementById("chk"+i).checked = false;
		}
		if(document.getElementById("chk"+i).checked == true) {
			newvar += document.getElementById("chk"+i).value + ",";
		}
		document.getElementById("deleteall").value = newvar;
	}
}
function onchange(id) {
	var first = document.getElementById(id).value+",";
	document.getElementById("deleteall").value += first;
	//var second = document.getElementById(id).value;
}
function confirmmsg() {
	if(document.getElementById("deleteall").value == "") {
		alert("Please select at least one checkbox");
		return false;
	}
	var ok = confirm("Are You Sure You Want To Delete");
	if(!ok) {
		return false;
	}
}
$(function() {		
	$("#from_date").datepicker({
		dateFormat: 'dd-mm-yy',			
		changeMonth: true,
		changeYear: true			
	});
});
$(function() {		
	$("#to_date").datepicker({
		dateFormat: 'dd-mm-yy',			
		changeMonth: true,
		changeYear: true			
	});
});
</script>
</head>
<body onLoad="start(),chkforrec()">
<div align="center" id="pagealign">
<div align="center" id="container">
<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
	<div id="content-wrap">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div id="center">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<div id="pagetitle"><h1>mool Manager</h1>
			<div class="addlink1"><div class="addlink"><a href="datingmool_master.php">Add new</a></div></div></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
            <form method="post" action="mool_query.php" name="cast">
             <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0"  style="margin-bottom:20px;" class="formborder">
		<tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Search :</th>
            <td <?= admintdclass ?>>
            
              
              <select name="cmbsubcast" <?= admindropdownclass ?>>
<? fillcombo("select id,title from tbldatingsubcastmaster where currentstatus=0","","Select SubCast"); ?>
</select>
              <input type="text" name="mool" id="mool" value="" <?= admininputclass ?>>
             <input name="Submit" type="submit" <?= adminbuttonclass ?> title="Submit" value="Submit" alt="Submit">
              </td>
          </tr>
          </table>
            </form>
            
            
<!-- ********* CONTENT START HERE *********-->
                <?php  if(isset($_SESSION["adminerror"]) && $_SESSION["adminerror"]!='') {?>
              <div class="errorbox">
              <?php echo $_SESSION["adminerror"]; ?>
              <?php unset($_SESSION["adminerror"]); ?>
              </div>
              <?php } ?>




<?php /*?><form name="searchkey" method="post" action="datingmool_search.php">
<table  width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="greytableborder">
<tr>
<td>Keyword</td>
<td><input type="text" name="key" id="key"></td>
</tr>
<tr>
<td>From Date</td>
<td><input type="text" name="from_date" id="from_date"></td>
</tr>
<tr>
<td>To Date</td>
<td><input type="text" name="to_date" id="to_date"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="search" id="search" value="Search"></td>
</tr>
</table>
</form><?php */?>
<span id="hideifnot">
<input type="button" name="chkall" value="Check All" onClick="return chkall('20');" <?= adminbuttonclass ?> >
<form name="delall" method="post" action="datingmool_delete.php">
<input type="hidden" name="deleteall" id="deleteall" value="">
<input type="submit" name="all" id="all" value="Delete" onClick="return confirmmsg();" <?= adminbuttonclass ?>>
</form>
</span>
<? 
if(isset($_GET['t']) && $_GET['t']!=''){
	$t = '?t='.$_GET['t'];
} else {
	$t = '';	
}
?>
<table width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="greytableborder">
        <tr>
  		<th scope="col">Id</th>
        <th scope='col' width='100'>subcaste</th><th scope='col' width='100'>title</th><th scope='col' width='100'>language</th>
		<?php /*?><? for ($i=1;$i<count($table_field_title_arr);$i++) { ?>
		<th scope="col" width="100"><?= $table_field_title_arr[$i] ?></th>
		<? } ?><?php */?>		
  		<th scope="col" width="100">Action</th>
		</tr>
<?
$searchqry = "";
if(isset($_SESSION[$session_name_initital . "admin_user_search"]) && $_SESSION[$session_name_initital . "admin_user_search"]!='')
{
	$searchqry=$_SESSION[$session_name_initital . "admin_user_search"];
	//$jointab="tbldating_city_master.tit";
}
$ordby = 'order by id desc';
if(isset($_SESSION['sorting']) && $_SESSION['sorting']!=''){
	$ordby = $_SESSION['sorting'];	
}
$fromqry = " from tbldatingmool_master where currentstatus in (0) ".$searchqry." ".$ordby;
//$fromqry .= $searchqry;
$FileNm = "datingmool_manager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
?>
<input type="hidden" name="allrec" id="allrec" value="<?=$totalnorecord?>">
<?

$result = getdata("select id,languageid,subcasteid,title $fromqry  $NoOfRecord ");
$j = 1;
while($rs= mysqli_fetch_array($result))
{
$id=$rs[0];
$languageid=$rs[1];
$subcasteid=$rs[2];
$title=$rs[3];
$languagename=getonefielddata("select language from tbldatingsitelanguagemaster where currentstatus=0 and languageid=$languageid");
$subcastename=getonefielddata("select title from tbldatingsubcastmaster where currentstatus=0 and id=$subcasteid");

$class1 = '';
if($j%2==0){
	$class1 = '';	
}
?>
<tr valign="top" <?=$class1?>>
<td <?= admintdclass ?> width="5"><?= $id ?><input type="checkbox" name="chk[]" id="chk<?=$j?>" value="<?=$id?>" onClick="onchange('chk<?=$j?>')"></td>
<td <?= admintdclass ?> width="10"><?=$subcastename ?>&nbsp;</td>
<td <?= admintdclass ?> width="10"><?=$title ?>&nbsp;</td>
<td <?= admintdclass ?> width="10"><?=$languagename ?>&nbsp;</td>
<?php /*?><? for ($i=1;$i<4;$i++) { ?>
<td <?= admintdclass ?>><?=$rs[$i] ?>&nbsp;</td>
<? } ?><?php */?>
<td <?= admintdclass ?>>
<a href="datingmool_master.php?b=<?= $id ?>" class="actionbtn_m">Modify</a>
 <a href="datingmool_delete.php?b=<?= $id ?>" class="actionbtndel">Delete</a>
</td>
</tr>
<?
$j++;
}
freeingresult($result);
?>
</table>
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
<?
$_SESSION["searchquery"] = "";
?>