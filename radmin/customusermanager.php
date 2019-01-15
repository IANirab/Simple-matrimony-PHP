<?
session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");
checkadminlogin();
$status  = "0,1,2,4";
$quer_st = "";
$ex_quer_st="";
$genderid = '';
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

function change_allocation(val,userid){
	if(val=='a'){
		document.getElementById('agent'+userid).style.display = 'inline';
		document.getElementById('emp'+userid).style.display = 'none';
	} else if(val=='e'){
		document.getElementById('emp'+userid).style.display = 'inline';
		document.getElementById('agent'+userid).style.display = 'none';
	} else if(val = 'n'){
		document.getElementById('emp'+userid).style.display = 'none';
		document.getElementById('agent'+userid).style.display = 'none';
	
	}
}

function allocate(cat,val,userid){
	if(cat!='' && val!=''){
		document.getElementById('a'+userid).style.display = 'none';
		document.getElementById('agent'+userid).style.display = 'none';
		document.getElementById('e'+userid).style.display = 'none';
		document.getElementById('emp'+userid).style.display = 'none';
		document.getElementById('n'+userid).style.display = 'none';		
		document.getElementById('process'+userid).style.display = 'inline';
		$.post("allocation.php",
				{category:cat,
				value:val,
				userid:userid},
				function (data){
					if(data!=""){						
						document.getElementById('process'+userid).style.display = 'none';
						document.getElementById('msg'+userid).style.display = 'inline';
						
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
			//alert(data);
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
			
			  <h1 class="pagetitle">Custom Service User Manager</h1>
			
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>

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
<h4>Please use single userlogin at a time, after log out you can login with other user details</h4>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
        <tr>

        <th scope="col" width="7%">User Id</th>
        <th scope="col" width="33%">Name</th>
	    <th width="30%" scope="col">Detail</th>
		<th width="25%" scope="col" class="mobile_none">Allocation</th>
		<?php /*?><th scope="col" width="42%">Status</th><?php */?>
  		<!--<th scope="col" width="12%">Action</th>-->
		</tr>
        </thead>
        <tbody>
<?


if ($_SESSION[$session_name_initital . "admin_user_search"] != "")
	$searchqry = $_SESSION[$session_name_initital . "admin_user_search"];
else
	$searchqry = "";

$searchqry = $searchqry . " " . $exque;
$fromqry = " from tbldatingusermaster,tbldatingpackagemaster where tbldatingusermaster.currentstatus in ($status) AND tbldatingusermaster.custom_pkg_id=tbldatingpackagemaster.PackageId AND PackageTypeId = 8 ";

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

$result = getdata("select userid,name,email,password,emailverified,emailverificationcode,tbldatingusermaster.currentstatus,mobile,phno,date_format(tbldatingusermaster.createdate,'%d-%m-%Y'),tbldatingusermaster.packageid,date_format(custom_exp_date,'%d-%m-%Y'), staff_agentid, tbldatingpackagemaster.PackageId ". $fromqry ." order by userid DESC ". $NoOfRecord);
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
		
	$staff_agentid = $rs['staff_agentid'];
	if($staff_agentid!=""){
		$get_userid = getonefielddata("SELECT id from tblallocationmaster WHERE user_id=".$userid);
		if($get_userid==""){
			execute("INSERT into tblallocationmaster SET user_id =".$userid.", category ='a', allocate_id =".$staff_agentid);
		}	
	}
	$get_fav = getdata("SELECT UserId from tbldatingshortlistmaster WHERE CreateBy=".$userid);
	$fav = "";	
	while($rs_fav = mysqli_fetch_array($get_fav)){		
		$hrf = $sitepath."displayprofile.php?b=".$rs_fav['UserId'];
		$fav .= "<a target=\"_blank\" href='$hrf'>".$rs_fav['UserId']."</a>".",";
	}
	$fav = substr($fav,0,strlen($fav)-1);
	$favlist = getonefielddata("SELECT group_concat(userid) from tbldatingshortlistmaster WHERE createby=".$userid);	
	//echo $sitepath."<br>";
?>

<tr valign="top">

          	<td ><?=$userid?></td>
          	<td class="user_details">
			<?=$name?><br>
			<b><strong>Profile ID: </strong> <?=$profile_code?><br></b>
			<b><strong>Email: </strong> <a class="bluelink" href='user_email.php?b=<?= $userid ?>'><?= $email ?></a> <br/></b>
			<b><strong>Mobile:</strong> 
            <a href="tel:'sms_send.php?b=<?= $userid ?>'"><?= $mobile ?></a>
            <br/> </b>
			<b><strong>Password:</strong> <a href='user_change_password.php?b=<?= $userid ?>' class="bluelink"><?=$password?></a><br/></b>
			
		
           <div class="edit_contact_block">
           <a href="javascript:void(0)" onClick="enable_favourite('<?=$userid?>');" class="bluelink edit_detail">Update Favourite</a> 
            <span id="spfav<?=$userid?>" style="display:none;">
                <textarea id="fav<?=$userid?>" name="fav<?=$userid?>"><?=$favlist?></textarea>
                <input type="button" id="button" value="Update" onClick="update_fav(<?=$userid?>)">
            </span>
            </div>
</td>
          	<td><strong>Register Date:</strong> <?= $createdate ?><br>
			<?php /*?><strong>Membership:</strong> <?= $package ?><br><?php */?>
			<strong>Expiry date:</strong> <?= $expiredate ?><br>			
			<? 
				if($fav == ""){
					$fav = "No Favourites";
				}
			?>
			<strong>Favourites:</strong> <?=$fav?><br>
			</td>
			<?php /*?><strong>Email Verified:</strong> <?=$emailverified?>   -  Code:<?=$emailverificationcode?></td><?php */?>
			
			<td class="mobile_none">
			<? 
				$find_record = getonefielddata("SELECT id from tblallocationmaster WHERE user_id=".$userid);
				if($find_record=="") {
			?>
				<div id="a<?=$userid?>">
				<input type="radio" name="allocation" value="a" onClick="change_allocation(this.value,'<?=$userid?>')"> Agent<br></div>
				<div id="agent<?=$userid?>" style="display:none;">
					<select name="agent" id="agent" onChange="allocate('a',this.value,'<?=$userid?>')">
						<? fillcombo("select agentid,name from tbl_agent_master where currentstatus=0","$genderid","Select Agent"); ?>
					</select>
					<br>
				</div>
				<div id="e<?=$userid?>">
				<input type="radio" name="allocation" value="e" onClick="change_allocation(this.value,'<?=$userid?>')"> Employee</div>
				<div id="emp<?=$userid?>" style="display:none;">
					<select name="emp" id="emp" onChange="allocate('e',this.value,'<?=$userid?>')">
						<? fillcombo("select LoginId,UserName from tbldatingadminloginmaster where currentstatus=0 AND emp_role_id!=0","$genderid","Select Employee"); ?>
						
					</select>
					<br>
				</div>
				<div id="n<?=$userid?>">
				<input type="radio" name="allocation" id="n" value="n" onClick="change_allocation(this.value,'<?=$userid?>')"> None</div>
				<img src="indicator.gif" id="process<?=$userid?>" style="display:none">
				<div id="msg<?=$userid?>" style="display:none">
					Allocated
				</div>
				<? } else { 
					$find_allocation = getdata("SELECT allocate_id,category from tblallocationmaster WHERE id=".$find_record);
					$rs_allocation = mysqli_fetch_array($find_allocation);
						$find_cat = $rs_allocation['category'];
						$allocation ="";	
						if($find_cat == 'e'){
							$allocation = getonefielddata("SELECT UserName from tbldatingadminloginmaster WHERE LoginId=".$rs_allocation['allocate_id']); 
						}
						if($find_cat == 'a'){
							$allocation = getonefielddata("SELECT name from tbl_agent_master WHERE agentid=".$rs_allocation['allocate_id']); 
						}					
					echo "Allocated to $allocation";
				?>
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