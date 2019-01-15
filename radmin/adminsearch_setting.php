<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$home_search_hp_1 = home_search_hp_1();
	$home_search_hp_2 = home_search_hp_2();	
	$home_search_hp_4 = home_search_hp_4();	
} else {	
	$home_search_hp_1 = "N";
	$home_search_hp_2 = "N";
	$home_search_hp_4 = "N";
}
if($home_search_hp_1 == 'Y' || $home_search_hp_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script>
function active_search(val,id)
{

		$.ajax({
		type: "POST",
		url: "adminsearch_setting_insert.php",
		data:'val='+val+'&id='+id,
		success: function(data){
			if(val==0)
			{
				$("#chk"+id).val(1);
			}
			if(val==1)
			{
				$("#chk"+id).val(0);
			}
			
			
		}
		});

}
</script>
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
			<h1 class="pagetitle">Popular Search Setting</h1>
	
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
		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?

$fromqry = " from tbldatingadminsearchsetting where currentstatus in (0,1) ";

$FileNm = "adminsearch_setting.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,note,currentstatus ". $fromqry. $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$currentstatus=$rs[2];
		 ?>
            <tr valign="top">
                <td ><?=$id?></td>
                <td ><?=$title?></td>
                <td>
                    <label class="switch">
             <input id="chk<?=$id?>" onClick="active_search(this.value,'<?=$id?>')"
              type="checkbox" <? if($currentstatus==0){?>checked value="1" <? }else{ ?> value="0" <? } ?>>
                    <span class="slider round"></span>
                    </label>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $adminsearchmanager_help ?></div>
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
<? } else{
	header("location:dashboard.php?msg=no");
	exit;
} ?>