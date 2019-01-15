<?
session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");
checkadminlogin();
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
<script language="javascript">
function changetransfee(filenm,id)
{
document.frmmodify.action = filenm;
document.frmmodify.submit();
}

function upd_cmnt(aid,msg,i){
	if(aid != '' && msg!='' ){
	document.getElementById('cmnt'+i).style.display = 'none';
	document.getElementById('cmnt_process'+i).style.display = 'inline';
	document.getElementById('cmnt'+i).value = msg;	
		$.post("allocation.php",
				{aid:aid,
				 msg:msg},
			function (data){
				if(data!=""){
					document.getElementById('cmnt_process'+i).style.display = 'none';
					document.getElementById('msg'+i).style.display = 'inline';
				}
			}		
		)
		
	}
} 

function send_sms(userid,allocated_id,i){
	if(userid!=""){
	document.getElementById('send_sms'+i).style.display = 'none';
	document.getElementById('sms_process'+i).style.display = 'inline';
		var sms = 'sms';
		$.post("allocation.php",
			{uid:userid,
			 sms:sms,
			 allid:allocated_id},
			function (data) {
				if(data!=""){
				document.getElementById('sms_process'+i).style.display = 'none';
				document.getElementById('msg_sms'+i).style.display = 'inline';
					
				}
			}
		)
	}
}

function edit_cmnt(i){
	document.getElementById('msg'+i).style.display = 'none';
	//alert(document.getElementById('msg'+i).value);
	document.getElementById('cmnt'+i).style.display = 'inline';
}
</script>
</head>
<body onLoad="start()">
<div align="center" id="pagealign">
<div align="center" id="container">
<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
	<div id="content-wrap">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div id="center">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<div id="pagetitle">
			  <h1>Custom Service User Manager</h1>
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<?php /*?><iframe src="#" width="740px" height="250px;" frameborder="0" scrolling="auto" name="previewprofile" style="border:solid 1px #333333;"></iframe><?php */?>
<div class="errorbox"><?= checkerroradmin()?></div>
<?php /*?><table width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="greytableborder">
<tr>
<th scope="col">
<form name="frm_search_profile" action="user_search_profileid.php" method="post">
search by profile id : 
<input type="text" name="txtprofileid" class="usersearch1">
<input type="submit" value="Search" class="usersearch1btn">
</form>
</th>
</tr>
<tr>
<td height="40px">
<form name="frm_search_profile_detail" action="user_search_detail.php?b=<?= $quer_st ?>" method="post">
Lookig for : <select name='LookingFor' class="usersearch1">
<? fillcombo(lookingfor_query($curruserid),"",""); ?>
</select>

Age from : <select name='MinAge' class="usersearch1"><?  fillage("") ?></select>  
To : <select name='MaxAge' class="usersearch1"><? 	fillage("") ?></select>
Country : <select name='Country' class="usersearch1" style="width:140px">
<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus=0 order by title ","","select"); ?>
</select>
Keyword : <input type="text" name="txtkeyword" class="usersearch1" style="width:100px">
<input type="submit" value="Search" class="usersearch1btn">
</form>
</td>
</tr>

</table><?php */?>
<?
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){
	$user_mnager_um_1 = user_mnager_um_1();
	$user_mnager_um_2 = user_mnager_um_2();
	$user_mnager_um_3 = user_mnager_um_3();
	$user_mnager_um_4 = user_mnager_um_4();
	$user_mnager_um_5 = user_mnager_um_5();
	$user_mnager_um_6 = user_mnager_um_6();
	$user_mnager_um_7 = user_mnager_um_7();
	$user_mnager_um_8 = user_mnager_um_8();
} else {
	$user_mnager_um_1 = "N";	
	$user_mnager_um_2 = "N";
	$user_mnager_um_3 = "N";
	$user_mnager_um_4 = "N";
	$user_mnager_um_5 = "N";
	$user_mnager_um_6 = "N";
	$user_mnager_um_7 = "N";
	$user_mnager_um_8 = "N";	
}
?>
<table width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="greytableborder">
        <tr>

        <th scope="col" width="7%">User Id</th>
        <th scope="col" width="15%">Name</th>
	    <th width="24%" scope="col">Detail</th>
		<th width="24%" scope="col">Comment</th>
		<?php /*?><th scope="col" width="42%">Status</th><?php */?>
  		<th scope="col" width="12%">Action</th>
		</tr>
<?


if ($_SESSION[$session_name_initital . "admin_user_search"] != "")
	$searchqry = $_SESSION[$session_name_initital . "admin_user_search"];
else
	$searchqry = "";

$searchqry = $searchqry . " " . $exque;
$fromqry = " from tbldatingusermaster,tbldatingpackagemaster,tblallocationmaster where tbldatingusermaster.currentstatus in ($status) AND tbldatingusermaster.custom_pkg_id=tbldatingpackagemaster.PackageId AND PackageTypeId = 8 AND tblallocationmaster.user_id=tbldatingusermaster.userid AND tblallocationmaster.category='e' AND tblallocationmaster.allocate_id=$login_id";

$FileNm = "usermanager.php?b=$quer_st&";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
$ex_quer_st .="*pgnm=".$Pgnm;
$totalnorecord = getonefielddata( "select count(tbldatingusermaster.userid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];
$result = getdata("select userid,name,email,password,emailverified,emailverificationcode,tbldatingusermaster.currentstatus,mobile,phno,date_format(tbldatingusermaster.createdate,'%d-%m-%Y'),tbldatingusermaster.packageid,date_format(custom_exp_date,'%d-%m-%Y'), staff_agentid, tbldatingpackagemaster.PackageId,tblallocationmaster.id ". $fromqry ." order by userid DESC ". $NoOfRecord);
$i=1;
while($rs= mysqli_fetch_array($result))
{
	$userid=$rs[0];
	$name=$rs[1];
	$email = $rs[2];
	$password=$rs[3];
	$emailverified=$rs[4];
	$emailverificationcode = $rs[5];
	$currentstatus = $rs[6];
	$mobile= $rs[7];
	$phno= $rs[8];
	$createdate= $rs[9];
	$package= $rs[10];
	$expiredate = $rs[11];
	if ($package != "")
		$package = getonefielddata("select Description from tbldatingpackagemaster where PackageId=$package");
		
	$profile_code = find_profile_code($userid);
	
	if($currentstatus == 0)
		$status = 'Active';
	elseif($currentstatus == 1)
		$status = 'Pendig approval';
	else
		$status = 'Deactive';
	$allocated_id = $rs['id'];	
		
	$staff_agentid = $rs['staff_agentid'];
	$get_fav = getdata("SELECT UserId from tbldatingshortlistmaster WHERE CreateBy=".$userid);
	$fav = "";	
	while($rs_fav = mysqli_fetch_array($get_fav)){		
		$hrf = $sitepath."displayprofile.php?b=".$rs_fav['UserId'];
		$fav .= "<a target=\"_blank\" href='$hrf'>".$rs_fav['UserId']."</a>".",";
	}
	$fav = substr($fav,0,strlen($fav)-1);	
?>
<tr valign="top">

          	<td <?= admintdclass ?>><?=$userid?></td>
          	<td <?= admintdclass ?>><?=$name?><br>
			<strong>Profile ID:</strong> <?=$profile_code?><br>
			<strong>Email:</strong> <a class="bluelink" href='user_email.php?b=<?= $userid ?>'><?= $email ?></a>
			
				
			<?php /*?><a href='user_change_password.php?b=<?= $userid ?>' class="bluelink">Edit Detail</a> |  <a href='user_contact_detail.php?b=<?= $userid ?>' class="bluelink">Contact Detail</a><?php */?>

          	<td <?= admintdclass ?>><strong>Register Date:</strong> <?= $createdate ?><br>
			<?php /*?><strong>Membership:</strong> <?= $package ?><br><?php */?>
			<strong>Expiry date:</strong> <?= $expiredate ?><br>
			<? 
				if($fav == ""){
					$fav = "No Favourites";
				}
			?>
			<strong>Favourites :</strong> <?= $fav ?><br>
			
			<?php /*?><strong>Email Verified:</strong> <?=$emailverified?>   -  Code:<?=$emailverificationcode?></td><?php */?>
			
			<td <?= admintdclass ?>>
			<? 
				$get_cmnts = getonefielddata("SELECT comments from tblallocationmaster WHERE id=".$allocated_id);			
				if($get_cmnts==""){
					$style = 'style="display:inline"';				 
				} else { 					
					$style = 'style="display:none"';
				}	
			?>
				<input type="text" id="cmnt<?=$i?>" name="cmnt" value="<?=$get_cmnts?>" <?=$style?> onBlur="upd_cmnt('<?=$allocated_id?>',this.value,'<?=$i?>')">
				<img src="indicator.gif" id="cmnt_process<?=$i?>" style="display:none">
			<?
				if($get_cmnts==""){
				$style = 'style="display:none"';				 
				} else { 
					$style = 'style="display:inline"';
				}			
			?>	
				<div id="msg<?=$i?>" <?=$style?> >Commented<br><a href="#" onClick="edit_cmnt(<?=$i?>);" style="text-decoration:none;">Edit Comment</a><br></div>
			<? 
				//if(file_exists("../dbinclude/routesmsfunction.php")){
				if($sms_module_enable=="Y") {
				$get_sms_dt = getonefielddata("SELECT sms_sent_date from tblallocationmaster WHERE id=".$allocated_id);
				//if($get_sms_dt==""){
			?>	
				<a href="#" style="text-decoration:none;" id="send_sms<?=$i?>" onClick="send_sms('<?=$userid?>','<?=$allocated_id?>','<?=$i?>')">Send SMS</a><br>
				<? //} ?>
				<img src="indicator.gif" id="sms_process<?=$i?>" style="display:none">
			<? //}
				
				if($get_sms_dt!="") {
					$style = 'style="display:inline"';
				} else {
					$get_sms_dt = date("Y-m-d");
					$style = 'style="display:none"'; 
				}	
			?>			
				<div id="msg_sms" <?=$style?> >SMS sent on <?=$get_sms_dt?></div><br>
				
			<? $i++;
			} ?>	
			</td>
			<?php /*?><td <?= admintdclass ?>><?= $status ?></td><?php */?>
			
            <td <?= admintdclass ?>>
		
<?php /*?><a href="useraction.php?b=<?= $userid ?>&b1=0&ex=<?=$ex_quer_st ?>" class="actionbtn">Active</a>
<a href="useraction.php?b=<?= $userid ?>&b1=2&ex=<?=$ex_quer_st ?>" class="actionbtn">Deactive</a>

<a href="useraction.php?b=<?= $userid ?>&b1=5&ex=<?=$ex_quer_st ?>" class="actionbtn">Offline</a>

<a href="../<?= $default_folder_name ?>/displayprofile.php?b=<?= $userid ?>" class="actionbtn" target='previewprofile'>Display</a><?php */?>

<a href="userdologin.php?b=<?= $userid ?>" target="_blank" class="actionbtn">Update Profile</a>
<a href="userdologin.php?b=<?= $userid ?>&cat=partner" target="_blank" class="actionbtn">Update Partnerprofile</a>



           	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
	</table>
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
<?php /*?><form name="form_delete" action="user_delete_id.php?b=<?= $quer_st ?>" method="post">
<div class="delete1"><h3>Delete User</h3>
User ID : 
<input type="text" name="txt_del_uid" class="usersearch1">
<input type="button"  onClick="send_for_delete()" value="Delete" class="usersearch1btn" style="background-color:#F00; color:#FFF;">

&nbsp;&nbsp; <strong>This Will delete user detail permanent</strong>
</div>
</form><?php */?>			
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
<script language="javascript">
function send_for_delete()
{
	if (confirm("are you sure want to delete"))
	{
		document.form_delete.submit();
	}
}
</script>