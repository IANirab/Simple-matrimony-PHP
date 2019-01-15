<?
session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");
checkadminlogin();
if(isset($_SESSION[$session_name_initital . 'adminlogin']) && $_SESSION[$session_name_initital . 'adminlogin']!='')
{
	$currentuserid=$_SESSION[$session_name_initital . 'adminlogin'];
}
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript">
function changetransfee(filenm,id)
{
	document.frmmodify.action = filenm;
	document.frmmodify.submit();
}
function search_cast(val){
		if(val!=''){
			document.getElementById('indicator').style.display = 'inline';
			$.post("search_cast.php",{
				religionid:val},
				function (data){
					if(data!=''){
						document.getElementById('indicator').style.display = 'none';
						document.getElementById('span_cast').innerHTML = data;
					}	
				
				}
				)
		}
	
	}
</script>
<script language="javascript" type="text/javascript">
function update_fav(id){
	var favlist = document.getElementById('fav'+id).value;
	if(favlist!=''){
		$.post("update_fav.php",{
			favlist:favlist,
			userid:id	
		}, function (data){
			alert(data);
		})
	}
}
function enable_favourite(id){
	if(document.getElementById('spfav'+id).style.display=='none'){
		document.getElementById('spfav'+id).style.display = 'block';
	} else {
		document.getElementById('spfav'+id).style.display = 'none';
	}
}

function removeimage(userid,imagenm,tname,id){
	$.post("removeimage.php",{
	 userid:userid,
	 imagenm:imagenm,
	 tname:tname
	},
		function(data){			
			if(data!=''){
				document.getElementById(id).style.display='none';
			}
			//alert(data)
		}
	)
}
function approveimage(userid,id){
	$.post("removeimage.php",{
		type:"approve",
		userid:userid
	}, function (data){
		if(data!='')	{
			document.getElementById(id).style.display = 'none';	
		}
	})	
}
</script>
</head>
<body onLoad="start(),chkforrec()">

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
<!-- TOP END ######################## -->
	<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">Template Manager</h1>
			<div class="addlink1"><div class="addlink"><?php /*?><a href="crmlead_emails_master.php">Add new</a><?php */?></div></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<div class="errorbox"><?= checkerroradmin()?></div>
<? 
if(isset($_GET['t']) && $_GET['t']!=''){
	$t = '?t='.$_GET['t'];
} else {
	$t = '';	
}
?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
        <th scope='col' width=''>subject</th><th scope='col' width='100'>title</th>
		<?php /*?><? for ($i=1;$i<count($table_field_title_arr);$i++) { ?>
		<th scope="col" width="100"><?= $table_field_title_arr[$i] ?></th>
		<? } ?><?php */?>		
  		<th scope="col" class="admingrhead_bn" width="15%">Action</th>
		</tr>
        </thead>
       <tbody>
<?
$searchqry = "";
if(isset($_SESSION['searchquery']) && $_SESSION['searchquery'] != "") {
	$searchqry = $_SESSION['searchquery'];
}
$ordby = 'order by emailid desc';
if(isset($_SESSION['sorting']) && $_SESSION['sorting']!=''){
	$ordby = $_SESSION['sorting'];	
}
$fromqry = " from tbldatingtemplatemaster where currentstatus in (0) ".$searchqry." ".$ordby;
//$fromqry .= $searchqry;
$FileNm = "crmlead_emails_manager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(emailid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
?>
<input type="hidden" name="allrec" id="allrec" value="<?=$totalnorecord?>">
<?
$result = getdata("select emailid,subject,title $fromqry  $NoOfRecord ");
$j = 1;
while($rs= mysqli_fetch_array($result))
{
$emailid=$rs[0];
$class1 = '';
if($j%2==0){
	$class1 = '';	
}
?>
<?php /*?><?php echo "<pre>"; print_r($rs); exit;?>  <?php */?>
<tr valign="top" <?=$class1?>>
<td  width="5"><?= $emailid ?><input type="checkbox" name="chk[]" id="chk<?=$j?>" value="<?=$emailid?>" onClick="onchange('chk<?=$j?>')"></td>
<? for ($i=1;$i<3;$i++) { ?>
<td ><?=$rs[$i] ?>&nbsp;</td>
<? } ?>
<td >
<a href="template_master.php?b=<?= $emailid ?>" class="actionbtn_m green">Modify</a>
<a href="template_delete.php?b=<?= $emailid ?>" onClick="return confirm('Are you sure want to delete?');" class="actionbtndel red">Delete</a>
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
<?
$_SESSION["searchquery"] = "";
?>