<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$location_mgmnt_lc_1 = location_mgmnt_lc_1();
	$location_mgmnt_lc_2 = location_mgmnt_lc_2();
	$location_mgmnt_lc_4 = location_mgmnt_lc_4();
} else {	
	$location_mgmnt_lc_1 = 'N';
	$location_mgmnt_lc_2 = 'N';
	$location_mgmnt_lc_4 = 'N';
}
if(isset($_GET['b1']) && $_GET['b1']=='-1')
{
	$_SESSION[$session_name_initital . "admin_country_search"]='';
}
?>
<? if($location_mgmnt_lc_1 == 'Y' || $location_mgmnt_lc_1 == 'N'){ ?>
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
			<h1 class="pagetitle">Country Manager</h1>
			<div class="addlink1">
			<?
			if($location_mgmnt_lc_2 == 'Y' || $location_mgmnt_lc_2 == 'N') {
			?>
			<div class="addlink"><a href="countrymaster.php">Add new country</a></div>
			<? } ?>
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
         <div class="form-wrapper">
            <form method="post" action="country_query.php" name="country" class="form_second">
             <div class="form-group">
<label>Title :</label>
              <input type="text" name="country" id="country" value="" class="form-control">
              </div>
              <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              
            </form>
            </div>
           
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
 <br>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Country Id</th>
	    <th scope="col">Country Name</th>
		<th scope="col" class="mobile_none ">Language</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
if(isset($_SESSION[$session_name_initital . "admin_country_search"]) && $_SESSION[$session_name_initital . "admin_country_search"]!='')
{
	$searchqry=$_SESSION[$session_name_initital . "admin_country_search"];
}
$fromqry = " from tbldatingcountrymaster,tbldatingsitelanguagemaster where tbldatingcountrymaster.languageid=tbldatingsitelanguagemaster.languageid and tbldatingcountrymaster.currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "countrymanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata("select count(tbldatingcountrymaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];
//echo "select tbldatingcountrymaster.id,tbldatingcountrymaster.title,imagenm,tbldatingsitelanguagemaster.language ". $fromqry ." order by tbldatingcountrymaster.title ". $NoOfRecord; 

$result = getdata("select tbldatingcountrymaster.id,tbldatingcountrymaster.title,imagenm,tbldatingsitelanguagemaster.language ". $fromqry ." order by tbldatingcountrymaster.title ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$LocationId=$rs[0];
			$LocationName=$rs[1];
			$imagenm=$rs[2];
			$language=$rs[3];
			if ($imagenm == "")
				$imagenm ="noimage.gif";
		 ?>
            <tr>
           	<td ><?=$LocationId?></td>
          	<td ><?=$LocationName?></td>
          	<td  class="mobile_none "><?=$language?></td>
            <td>
				<?
					if($location_mgmnt_lc_2 == 'Y' || $location_mgmnt_lc_2 == 'N') {
				?>
		    	<a href="countrymaster.php?b=<?= $LocationId ?>" class="actionbtn_m green">Modify</a>
				<? } if($location_mgmnt_lc_4 == 'Y' || $location_mgmnt_lc_4 == 'N') {  ?>
				<a href="countrydelete.php?b=<?= $LocationId ?>" class="actionbtndel">Delete</a>
				<? } ?>
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
	<td class="nextbackmid"><?= $page_no_str ?></td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $countrymanager_help ?></div>
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
<? } else {
	header("location:dashboard.php?msg=no");
} ?>