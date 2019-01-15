<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$inq_mgmnt_imi_1 = inq_mgmnt_imi_1();	
	$inq_mgmnt_imis_1 = inq_mgmnt_imis_1();
	$inq_mgmnt_imis_2 = inq_mgmnt_imis_2();
} else {	
	$inq_mgmnt_imi_1 = "N";
	$inq_mgmnt_imis_1 = "N";
	$inq_mgmnt_imis_2 = "N";
}
if($inq_mgmnt_imi_1 == 'Y' || $inq_mgmnt_imi_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
function chkforrec() {
	if(document.getElementById("allrec").value == 0) {
		document.getElementById("hideifnot").style.display = "none";
	}
}
function chkall() {
	
	var newvar = "";
	var tot = document.getElementById("allrec").value;

	for(var i = 1; i <= tot; i++) {

		if(document.getElementById("chk"+i).checked == false) {
		document.getElementById("chk"+i).checked = true;
		} else {
			document.getElementById("chk"+i).checked = false;
		}
		if(document.getElementById("chk"+i).checked == true) {
			newvar += document.getElementById("chk"+i).value + ",";
		}else{
			newvar += "";
		}
		
		document.getElementById("deleteall").value = newvar;
		//alert(document.getElementById("deleteall").value);
	}
}
/*function chkall() {
	
	var newvar = "";
	var tot = document.getElementById("allrec").value;

	for(var i = 1; i <= tot; i++) {

		if(document.getElementById("chk"+i).checked == false) {
		document.getElementById("chk"+i).checked = true;
		} /*else if(document.getElementById("chk"+i).checked == true){
			document.getElementById("chk"+i).checked = false;
		}* else{
			document.getElementById("chk"+i).checked = false;
		}
		if(document.getElementById("chk"+i).checked == true) {
			newvar += document.getElementById("chk"+i).value + ",";
		}
		/*if(document.getElementById("chk"+i).checked == false) {
			newvar += ",";
		}*
		document.getElementById("deleteall").value = newvar;
	}
}*/
function confirmmsg() {
	if(document.getElementById("deleteall").value == "") {
		alert("Please select at leat one checkbox");
		return false;
	}
	var ok = confirm("Are You Sure You Want To Delete");
	if(!ok) {
		return false;
	}
}


function change_check(id) {

	//alert(id)
	if(document.getElementById(id).checked == true){
	var first = document.getElementById(id).value+",";
	document.getElementById("deleteall").value += first;
	//var second = document.getElementById(id).value;
	}else{
	var first = "";
	document.getElementById("deleteall").value += first;
	}
	//alert(first)
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
			 <h1 class="pagetitle"> <i class="fa fa-question-circle"></i> Inquiry Manager</h1>
			
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
            
            
<?= checkerroradmin()?>
            <div class="form-group all_group">
           
            <input type="button" value="Check All" class="btn" name="chkall" onClick="chkall()">
   <form name="delall" method="post" action="inquiry_delete_all.php">
<input type="hidden" name="deleteall" id="deleteall" value="">
<input type="submit" name="all" id="all" class="btn" value="Delete all" onClick="return confirmmsg();" >

            </div>
<!-- ********* CONTENT START HERE *********-->

<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
	    <th scope="col">inquiry for</th>
		<th scope="col">subject</th>
		<th scope="col" class="mobile_none ">create date</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
if(isset($_GET['b']) && $_GET['b']!='')
{
	$subjectid = '('.$_GET['b'].')';
}else{ $subjectid = '(1,2,3,4,5,6)'; }

$searchqry = "";
$fromqry = " from tbl_dating_inquiry_master,tbl_dating_inquiry_subject_master where tbl_dating_inquiry_master.subjectid=tbl_dating_inquiry_subject_master.id and tbl_dating_inquiry_master.currentstatus in (0)  and tbl_dating_inquiry_master.subjectid in $subjectid";
$fromqry .= $searchqry;
$FileNm = "inquirymanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbl_dating_inquiry_master.id) $fromqry ");
?>
    <input type="hidden" name="allrec" id="allrec" value="<?=$totalnorecord?>">
    <?		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$result = getdata("select tbl_dating_inquiry_master.id,tbl_dating_inquiry_master.subject,date_format(createdate,'$date_format'),tbl_dating_inquiry_subject_master.title,eventid ". $fromqry ." order by tbl_dating_inquiry_master.id desc ". $NoOfRecord);
$j = 1;
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$subject=$rs[1];
			$createdate=$rs[2];
			$title =$rs[3];
			$eventid = $rs[4];
			if($j%2==0){
	$class1 = '';	
}
			
		if ($eventid != "")
			$eventid = getonefielddata("select title from tbl_event_master where eventid=$eventid");
		 ?>
            <tr valign="top">
           	<td><input type="checkbox" name="chk[]" id="chk<?=$j?>" value="<?=$id?>" onClick="change_check(this.id)"><?=$id?></td>
			<td><?=$title?></td>
          	<td><?=$subject?><br><?= $eventid ?></td>
          	<td class="mobile_none "><?=$createdate?></td>
            <td>
			<? if($inq_mgmnt_imis_1 == 'Y' || $inq_mgmnt_imis_1 == 'N') { ?>
		    	<a href="inquiry_display.php?b=<?= $id ?>" class="actionbtn">Display</a>
			<? } if($inq_mgmnt_imis_2 == 'Y' || $inq_mgmnt_imis_2 == 'N') {  ?>	
				<a href="inquiry_delete.php?b=<?= $id ?>&b1=<?= $subjectid ?>" class="actionbtndel">Delete</a>
			<? } ?>	
            	</td>
            </tr>
		<?
		$j++;
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
	</form>
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