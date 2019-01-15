<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$testimonial_mgmnt_tm_1 = testimonial_mgmnt_tm_1();
	$testimonial_mgmnt_tm_2 = testimonial_mgmnt_tm_2();
	$testimonial_mgmnt_tm_4 = testimonial_mgmnt_tm_4();
} else {	
	$testimonial_mgmnt_tm_1 = "N";
	$testimonial_mgmnt_tm_2 = "N";
	$testimonial_mgmnt_tm_4 = "N";
}
if($testimonial_mgmnt_tm_1 == 'Y' || $testimonial_mgmnt_tm_1 == 'N') {
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
			<h1 class="pagetitle"><i class="fa fa-comments"></i> Testimonial Manager</h1>
			<div class="addlink1"><?
			if($testimonial_mgmnt_tm_2 == 'Y' || $testimonial_mgmnt_tm_2 == 'N') { ?>
			<div class="addlink"><a href="testimonialmaster.php">Add new testimonial</a></div>
			<? } ?>
			
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
		<th scope="col">title</th>
        <th scope="col">User Details</th>
		<th scope="col" class="mobile_none">Language</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbldatingtestimonialmaster,tbldatingsitelanguagemaster where tbldatingtestimonialmaster.languageid=tbldatingsitelanguagemaster.languageid  and tbldatingtestimonialmaster.currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "testimonialnamager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingtestimonialmaster.testimonialid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select tbldatingtestimonialmaster.testimonialid,tbldatingtestimonialmaster.title,tbldatingsitelanguagemaster.language,image,tbldatingtestimonialmaster.userid ". $fromqry ." order by tbldatingtestimonialmaster.testimonialid desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$testimonialid=$rs[0];
			$title=$rs[1];
			$language=$rs[2];
			$image =$rs[3];
			if ($image == "")
				$image = "noimagetestimonial.gif";
			$userid = $rs[4];
			if($userid==""){
				$detail = "Admin";	
			}else{
				$name = getonefielddata("select name from tbldatingusermaster where userid=$userid");
				$profile_code = find_profile_code($userid);
				$detail = "Name ".$name."<br>Profile Code :".$profile_code;
			}
			
		 ?>
            <tr valign="top">
           	<td ><?=$testimonialid?></td>
            <td><?= $detail ?></td>
			<td ><?=$title?><br><img src='../uploadfiles/<?=$image?>' width="100px" height="100px"></td>
          	<td class="mobile_none"><?=$language?></td>
            <td >
				<?
					if($testimonial_mgmnt_tm_2 == 'Y' || $testimonial_mgmnt_tm_2 == 'N') { ?>
		    	<a href="testimonialmaster.php?b=<?= $testimonialid ?>" class="actionbtn_m green">Modify</a>
				<? } if($testimonial_mgmnt_tm_4 == 'Y' || $testimonial_mgmnt_tm_4 == 'N') {  ?>
				<a href="testimonialdelete.php?b=<?= $testimonialid ?>" class="actionbtndel">Delete</a>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $testimonialmanager_help ?></div>
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