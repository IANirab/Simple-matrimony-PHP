<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = '';
if(isset($_GET['b']) && $_GET['b']!=''){
	$action = $_GET['b'];	
}
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$cms_mgmnt_cmc_1 = cms_mgmnt_cmc_1();
	$cms_mgmnt_cmc_2 = cms_mgmnt_cmc_4();
	$cms_mgmnt_cmc_4 = cms_mgmnt_cmc_4();	
} else {	
	$cms_mgmnt_cmc_1 = "N";
	$cms_mgmnt_cmc_2 = "N";
	$cms_mgmnt_cmc_4 = "N";	
}

if($cms_mgmnt_cmc_1 == 'Y' || $cms_mgmnt_cmc_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="jquery/jquery.js"></script>
<script language="javascript">
	function select_parent(str){
		
		window.location.href ="cmsmanager.php?b="+str;
		
	}
</script>
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
			  <h1 class="pagetitle"><i class="fa fa-file-text"></i> CMS Manager</h1>
			<div class="addlink1">
			<? if($cms_mgmnt_cmc_2 == 'Y' || $cms_mgmnt_cmc_2 == 'N') { ?>
				<div class="addlink"><a href="cmsmaster.php">Add new CMS</a></div>
			<? } ?>
            

			</div>
            
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="form-group singal_group">
			<select name="cmblocation" id="cmblocation"  class="form-control" onChange="select_parent(this.value);">
<? fillcombo("select locationid,location from tblcmslocationmaster where currentstatus=0 order by location ",$action,"All Location"); ?>
</select>
             </div>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col" width="10%">Id</th>
		<th scope="col" width="45%">title</th>
		<th scope="col" class="mobile_none" width="15%">Language</th>
		<th scope="col" class="mobile_none" width="15%">Location</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$chk_uri = strstr($_SERVER['SCRIPT_FILENAME'],"radmin");
$searchqry = "";

if($action>0){
	$searchqry = " AND tblcmsmaster.LocationId=".$action;
}
$fromqry = " from tblcmsmaster,tbldatingsitelanguagemaster where tblcmsmaster.languageid=tbldatingsitelanguagemaster.languageid and tblcmsmaster.currentstatus in (0) ";
$fromqry .= $searchqry;
if(isset($_GET['b']) && $_GET['b']!='0.0'){
	
$FileNm = "cmsmanager.php?b=".$_GET['b']."&";
}
else
{
	$FileNm = "cmsmanager.php?";
}
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tblcmsmaster.cmsid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select tblcmsmaster.cmsid,tblcmsmaster.title,LocationId,tbldatingsitelanguagemaster.language,tblcmsmaster.staticlink ". $fromqry ." order by tblcmsmaster.cmsid desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$cmsid=$rs[0];
			$title=$rs[1];
			$locationid=getonefielddata("select location from tblcmslocationmaster where locationid=" . $rs[2]);
			$language = $rs[3];
			$staticlink=$rs[4];
		 ?>
            <tr valign="top">
           	<td ><?=$cmsid?></td>
			<td ><?=$title?>
             <? if($staticlink!=''){ ?>
             <br><strong>Static Link :</strong><?=$staticlink?>
			 <? } ?>
            </td>
			<td class="mobile_none"><?=$language?></td>
          	<td class="mobile_none"><?=$locationid?></td>
            <td >
				<? if($cms_mgmnt_cmc_2 == 'Y' || $cms_mgmnt_cmc_2 == 'N') { ?>
		    	<a href="cmsmaster.php?b=<?= $cmsid ?>" class="actionbtn_m green">Modify</a>
				<? } if($cms_mgmnt_cmc_4 == 'Y' || $cms_mgmnt_cmc_4 == 'N') {  ?>
				<a href="cmsdelete.php?b=<?= $cmsid ?>" class="actionbtndel">Delete</a>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $cmsmanager_help ?></div>
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
	exit;
} ?>