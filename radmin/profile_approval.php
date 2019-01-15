<?
session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$status  = "0,1,2,4";
$quer_st = "";
$ex_quer_st="";
if (isset($_GET["b"]))
if ($_GET["b"] != "")
{
	$status = $_GET["b"];
	$quer_st = $status;
	$ex_quer_st ="*b=$status";
}
$exque ="";
if (isset($_GET["b2"]))
if ($_GET["b2"] != "")
{
	if ($_GET["b2"] =="e")
	$exque = " datediff(expiredate,curdate()) < 0 and ";
	else
	$exque = " datediff(expiredate,curdate()) > 0 and packageid<>1 and ";
	$status =0;
	$quer_st = $status ."&b2=" . $_GET["b2"];
	$ex_quer_st .="*b2=".$_GET["b2"];
}
$remove_query = "";
if (isset($_GET["b1"]))
if ($_GET["b1"] != "")
	$remove_query = $_GET["b1"];
if ($remove_query == "-1")
	$_SESSION[$session_name_initital . "admin_user_search"]="";
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript" type="text/javascript">
function chkall(val){
	for(var i=1; i<=val; i++)	{
		document.getElementById('chkbox'+i).checked = true;	
	}
}
function unchkall(val){
	for(var i=1; i<=val; i++)	{
		document.getElementById('chkbox'+i).checked = false;	
	}
}
function modify(id){
	document.getElementById('old'+id).style.display = 'none';
	document.getElementById('new'+id).style.display = 'inline';
	document.getElementById('m'+id).style.display = 'none';
	document.getElementById('s'+id).style.display = 'inline';	
}
function save(id){
	if(id!=''){
		var val = document.getElementById('new'+id).value;
		if(val!=''){
			$.post("save_profile.php",{
				val:val,id:id},
					function (data){
						if(data!=''){
							document.getElementById('old'+id).innerHTML = data;
							document.getElementById('old'+id).style.display = 'inline';
							document.getElementById('new'+id).style.display = 'none';
							document.getElementById('m'+id).style.display = 'inline';
							document.getElementById('s'+id).style.display = 'none';	
						}
					}
				)	
		}
	}
}
function changepaging(val){
	window.location.href = 'profile_approval.php?rec='+val;
}
</script>
</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<div class="pagewrapper">
<!-- TOP END ######################## -->
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
			<h1  class="pagetitle">Profile Fields For Approval</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?=checkerroradmin()?>
<div class="form-group singal_group">
<select name="paging" id="paging"  class="form-control" onChange="changepaging(this.value)">
    <? for($i=20; $i<=100; $i=$i+20) { 
		if(isset($_GET['rec']) && $_GET['rec']!='' && $_GET['rec']==$i){
			$c = ' selected';	
		} else {
			$c = '';
		}
	?>
        <option value="<?=$i?>" <?=$c?>><?=$i?></option>
    <? } ?>
</select>
</div>
<?
$records = 20;
if(isset($_GET['rec']) && $_GET['rec']!=''){
	$records = $_GET['rec'];
}
$fromqry = "from tbl_modified_field_master,tbldatingusermaster WHERE tbl_modified_field_master.name!='' AND tbl_modified_field_master.vals!='' AND tbldatingusermaster.userid=tbl_modified_field_master.userid";
$FileNm = "profile_approval.php?";
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
$totalnorecord = getonefielddata( "select count(tbl_modified_field_master.id) $fromqry ");
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N",$records);
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];
	
$result = getdata("select tbl_modified_field_master.id,tbl_modified_field_master.userid,tbl_modified_field_master.name,tbl_modified_field_master.vals,tbl_modified_field_master.timing,thumbnil_image,tbldatingusermaster.modifyip $fromqry ".$NoOfRecord);
if(mysqli_num_rows($result)>0){
?>
<form name="modify_fields" method="post" action="profile_approval.php?b1=0">
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
        <thead>
        <tr>

        <th scope="col" width="7%">Profile Id</th>
        <th scope="col" width="20%">Name</th>
	    <th scope="col" class="mobile_none">Value</th>
        <th scope="col" width="20%">IP Address</th>
		<th scope="col" width="10%" class="mobile_none">Date &amp; Timing</th>  
        <th scope="col" width="15%">Action</th>  		
		</tr>
        </thead>
        <tbody>
<?
$i=1;
while($rs= mysqli_fetch_array($result))
{	
	$id = $rs[0];
	$userid = find_profile_code($rs[1]);
	$name = $rs[2];
	$vals = $rs[3];
	$valscount = strlen($vals);
	$timing = $rs[4];
	$imagenm = $rs[5];
	$ipaddress = $rs[6];
	if($imagenm==''){
		$imagenm = 'noimageprofile.gif';
	}
	if($valscount > 15) {
		$rowfortextarea = $valscount/15;
	} else {
		$rowfortextarea = 15/$valscount;
	}
?>
<tr valign="top">			
          	<td>
            	<input type="checkbox" name="chkbox[]" id="chkbox<?=$i?>" value="<?=$id?>">
			<?=$userid?><br>
            <img src="../uploadfiles/<?=$imagenm?>">
            </td>
            <td <?= admintdclass ?>><?=$name?></td>
            <td>
				<span id="old<?=$id?>"><?=$vals?></span>
                <textarea name="<?=$id?>" id="new<?=$id?>" cols="30" rows="2" style="display:none;"><?=$vals?></textarea>
            </td>
            <td  class="mobile_none">
            	<?=$ipaddress ?>
            </td>
            <td class="mobile_none"><?=$timing?></td>
            <td >
            	<a class="actionbtn_m green" href="#<?=$id?>" onClick="modify('<?=$id?>')" id="m<?=$id?>" >Modify</a>
                <a class="actionbtn green" href="#<?=$id?>" onClick="save('<?=$id?>')" id="s<?=$id?>" style="display:none; width:100%;">Save</a>
				<a class="actionbtn" target="_blank" href="<?=$sitepath?>displayprofile.php?b=<?=$rs[1]?>">Display Profile</a>
			</td>
            </tr>
		<?
		$i++;
	}
	freeingresult($result);
	?>
	<div class="form-group all_group ">
    	<input type="hidden" name="cnt" class="btn" id="cnt" value="<?=$i?>">
    	<input type="button" class="btn" name="checkall" id="checkall" value="Check All" onClick="chkall('<?=$i?>')">
        <input type="button" name="checkall" class="btn" id="checkall" value="Unheck All" onClick="unchkall('<?=$i?>')">
        <input type="submit" name="approve"  class="btn"id="approve" value="Approve">
    </div>	
</tbody>    
	</table>
    </div>
    </form>
    <table width=100% align=center class="nextbackbox" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" <?= adminnextbackcls ?>><?= $BackStr ?></td>
	<td class="nextbackmid"><?= $page_no_str ?></td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<? } ?>    	
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>			
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $usermanager_help ?></div>
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