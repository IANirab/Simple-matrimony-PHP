<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$cast_mgmnt_cm_1 = cast_mgmnt_cm_1();	
	$cast_mgmnt_cm_2 = cast_mgmnt_cm_2();	
	$cast_mgmnt_cm_4 = cast_mgmnt_cm_4();
} else {	
	$cast_mgmnt_cm_1 = "N";
	$cast_mgmnt_cm_2 = "N";
	$cast_mgmnt_cm_4 = "N";
}
if(isset($_GET['b1']) && $_GET['b1']=='-1')
{
	$_SESSION[$session_name_initital . "admin_user_search"]='';
}
if($cast_mgmnt_cm_1 == 'Y' || $cast_mgmnt_cm_1 == 'N') {
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
			<h1 class="pagetitle">Subcaste Manager</h1>
			<div class="addlink1">
			<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2=='N') { ?>			
			<div class="addlink"><a href="subcastmaster.php">Add new Subcaste</a></div>
			<? } ?>
			
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
            <div class="form-wrapper">
            <form method="post" action="subcast_query.php" class="form_second" name="cast">
            <div class="form-group">
            <label>Search </label>
           
              
              <select name="cmbcast" class="form-control">
<? fillcombo("select id,title from tbldatingcastmaster where currentstatus=0","","Select Caste"); ?>
</select>
</div>
<div class="form-group">
<label> &nbsp;</label>
              <input type="text" name="subcast" id="subcast" value="" class="form-control">
              </div>
             <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              
            </form>
            </div>
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col" width="5%">Id</th>
		<th scope="col">cast</th>
	    <th scope="col">title</th>
		<th scope="col" class="mobile_none ">Language</th>		
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
if(isset($_SESSION[$session_name_initital . "admin_user_search"]) && $_SESSION[$session_name_initital . "admin_user_search"]!='')
{
	$searchqry=$_SESSION[$session_name_initital . "admin_user_search"];
	//$jointab="tbldating_city_master.tit";
}
//$fromqry = " from tbldatingcastmaster,tbldatingsitelanguagemaster,tbldatingreligianmaster where tbldatingcastmaster.languageid=tbldatingsitelanguagemaster.languageid and tbldatingcastmaster.currentstatus in (0) and tbldatingreligianmaster.id=tbldatingcastmaster.religianid ";
$fromqry = " from tbldatingsubcastmaster,tbldatingsitelanguagemaster,tbldatingcastmaster where tbldatingsubcastmaster.languageid=tbldatingsitelanguagemaster.languageid and tbldatingsubcastmaster.currentstatus in (0) and tbldatingcastmaster.id=tbldatingsubcastmaster.castid ";
$fromqry .= $searchqry;
$FileNm = "subcastmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingsubcastmaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select tbldatingsubcastmaster.id,tbldatingsubcastmaster.title,tbldatingsitelanguagemaster.language,tbldatingcastmaster.title ". $fromqry ." order by tbldatingcastmaster.title,tbldatingsubcastmaster.title ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language=$rs[2];
			$religian=$rs[3];
		 ?>
            <tr valign="top">
           	<td ><?=$id?></td>
			<td ><?=$religian?></td>
          	<td ><?=$title?></td>
          	<td class="mobile_none "><?=$language?></td>
            <td>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="subcastmaster.php?b=<?= $id ?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="subcastdelete.php?b=<?= $id ?>" class="actionbtndel">Delete</a>
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
<? } else { 
	header("location:dashboard.php?msg=no");
} ?>