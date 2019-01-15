<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$page_name = "userregistration";
$action = 0;
if(isset($_GET['b']) && $_GET['b']!='' && is_numeric($_GET['b'])){
	$action = $_GET['b'];
}
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link type="text/css" href="../jquery/smoothness/jquery-ui-1.7.1.custom.css" rel="stylesheet" />	
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../jquery/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../jquery/jquery-ui-1.7.1.custom.min.js" type=text/javascript></script>
<script language="javascript" type="text/javascript">
$(function() {		
		$("#from_date").datepicker({
			dateFormat: 'dd-mm-yy',				
			changeMonth: true,
			changeYear: true			
		});
		$("#to_date").datepicker({
			dateFormat: 'dd-mm-yy',	
			changeMonth: true,
			changeYear: true			
		});
	});
</script>	
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">
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
			<div id="pagetitle"><h1>userregistration report</h1>
			<div class="addlink1"></div></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? 
$from_date = date("d-m-Y");
$to_date = date('d-m-Y', strtotime("+30	days"));
?>
<table width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="formborder">

    	<form name="userregistration" id="userregistration" action="userregistration_generatedreport.php" method="post">

            <tr>
            	<th>From Date</th>
                <td><input type="text" name="from_date" size="15" id="from_date" value="<?=$from_date?>"></td>
            </tr>
            <tr>
            	<th>To Date</th>
                <td><input type="text" name="to_date" id="to_date" size="15" value="<?=$to_date?>"></td>
            </tr>            
            <tr>
                <th>&nbsp;</th>
            	<td><input type="submit" name="submit" class="g_btn1" value="Generate Report"></td>
            </tr>

        </form>

</table>
<!-- ********* CONTENT END HERE *********-->
</div>
</div></div>
<br style="clear:both">
</div></div></div>
<!-- CENTER END ######################## -->
</div>
<!-- FOOTER START ######################## -->
<?php include("adminbottom.php") ?>
<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>