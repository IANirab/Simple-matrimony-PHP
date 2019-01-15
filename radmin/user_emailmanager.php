<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
$action = 0;
if(isset($_GET['b']) && $_GET['b']!=''){
	$action = $_GET['b'];	
}
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
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
            <h1 class="pagetitle"><i class="fa fa-envelope"></i> User Email Manager</h1>
			
			<div class="addlink1">			
				<div class="addlink"><a href="user_email.php?b=<?=$action?>">Send Email</a></div>
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
        <tr>
  		<th scope="col" width="10%">Id</th>
	    <th scope="col" width="35%">Subject</th>
		<th scope="col" class="mobile_none" width="35%">Message</th>		
        <th scope="col" width="20%">Date</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbldatinguseremailmaster where userid=$action and tbldatinguseremailmaster.currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "announcementnamager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatinguseremailmaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,subject,message,senddate". $fromqry ." order by tbldatinguseremailmaster.id desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$subject=$rs[1];
			$message=$rs[2];
			$date=$rs[3];								
		 ?>
            <tr valign="top">
           	<td ><?=$id?></td>
          	<td ><?=$subject?></td>
          	<td  class="mobile_none" ><?=$message?></td>
			<td ><?=$date?></td>            
            </tr>
            </tbody>
		<?
	}
	freeingresult($result);
	?>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $announcementmanager_help ?></div>
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