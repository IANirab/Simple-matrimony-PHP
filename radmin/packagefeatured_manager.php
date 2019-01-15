<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();


	$id='';
	$title='';
	$help='';
	$type='';
	$imgnm='';;


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
			<h1 class="pagetitle"><i class="fa fa-database"></i> Package Feature Manager</h1>
			
            
            <div class="addlink1">
			
			<div class="addlink"><a href="packagefeaturedmaster.php">Add Feature</a></div>
		
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
		<th scope="col" width="30%">title</th>
		<th scope="col" width="15%" class="mobile_none">Image</th>
        <th scope="col" width="20%" class="mobile_none">Help</th>
		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbldatingpackagefeaturedmaster where tbldatingpackagefeaturedmaster.currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "packagefeatured_manager.php?";
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingpackagefeaturedmaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];



$result = getdata("select tbldatingpackagefeaturedmaster.id,tbldatingpackagefeaturedmaster.title,tbldatingpackagefeaturedmaster.help,tbldatingpackagefeaturedmaster.type,tbldatingpackagefeaturedmaster.imgnm". $fromqry ." order by tbldatingpackagefeaturedmaster.id desc ". $NoOfRecord);





while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$help=$rs[2];
			$type =$rs[3];
			$imgnm =$rs[4];
		
		 ?>
            <tr valign="top">
           	<td ><?=$id?></td>
			<td ><?=$title?></td>
            <td >
            <? if ($imgnm  != "") { ?>
            <img  src="../uploadfiles/<?= $imgnm ?>" height=80 width=80 align="absmiddle">
			<? } ?>
            </td>
            <td ><?=$help?></td>
          

         
            
                <td >
			
                <a href="packagefeaturedmaster.php?b=<?= $id ?>" class="actionbtn_m green">Modify</a>
                <a href="packagefeatureddelete.php?b=<?= $id ?>" class="actionbtndel">Delete</a>
	
            	</td>
                
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
