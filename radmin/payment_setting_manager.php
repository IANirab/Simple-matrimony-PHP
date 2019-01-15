<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");	
if(!isset($_SESSION[$session_name_initital . "session_invoice"]))	{
	$_SESSION[$session_name_initital . "session_invoice"] = '';
}
	
if (isset($_GET["b1"]))
$_SESSION[$session_name_initital . "session_invoice"]= "";

if (isset($_GET["b"]))
$clear =$_GET["b"];
else
$clear = "N";
if ($clear == "Y")
	$pgtitle = "Clear";
elseif ($clear == "N")
	$pgtitle = "Unclear";
elseif ($clear == "C")
	$pgtitle = "Cancel";
	
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$invoice_msgmnt_imu_1 = invoice_msgmnt_imu_1();
	$invoice_msgmnt_imu_2 = invoice_msgmnt_imu_2();
	$invoice_msgmnt_imu_3 = invoice_msgmnt_imu_3();
	$invoice_msgmnt_imu_4 = invoice_msgmnt_imu_4();	
} else {	
	$invoice_msgmnt_imu_1 = "N";
	$invoice_msgmnt_imu_2 = "N";
	$invoice_msgmnt_imu_3 = "N";
	$invoice_msgmnt_imu_4 = "N";	
}
if($invoice_msgmnt_imu_1 == 'Y' || $invoice_msgmnt_imu_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>


function package_activedeactive(id,status){
	
	var a=$("#status"+id).val();
    
	if(a==0){
	  var  new_status=2;	
	  var a=$("#status"+id).val(2);
	}
	
	if(a==2){
	  var  new_status=0;
	  var a=$("#status"+id).val(0);
	}
	
	
    $.post('payment_setting_activedesctive.php',{
			id:id,
			status:new_status	
			
		}, function (data){
			  
			   //location.reload();
		})	
	

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
			<h1 class="pagetitle">Payment Setting Manager</h1>
		
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th width="" scope="col">Id</th>
		<th width="" scope="col">Payment Type</th>
		<th width="" scope="col">Description</th>
        <th width="" scope="col">Status</th>
		<th scope="col" width="15%">Action</th>		
		</tr>
        </thead>
        <tbody>
<?


$searchqry = "";
$fromqry = " from tbldatingpaymenttypemaster WHERE currentstatus IN (0,2)";
$fromqry .= $searchqry;
$FileNm = "payment_setting_manager.php?b=$clear&";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
		
$totalnorecord = getonefielddata( "select count(paymenttypeid) $fromqry ");		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];
$result = getdata("select paymenttypeid,description,paymenttype,currentstatus ". $fromqry ." order by paymenttypeid desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$desc=$rs[1];
			$title = $rs[2];
			$cstatus = $rs[3];
			$currentstatus= $rs[3];
			if($cstatus==0){
				$status = 'Active';	
				$st_action = 'Deactive';
				$st_id = '1';
			} else {
				$status = 'Deactive';	
				$st_action = 'Active';
				$st_id = '0';
			}
		 ?>
<tr valign="top">
<td><?=$id?></td>
<td ><?=$title?></td>
<td ><?=$desc?>&nbsp;</td>
<td ><?=$status?>&nbsp;</td>
<td >
	<a href="payment_setting_master.php?b=<?= $id ?>" class="actionbtn_m green">Modify</a>
   <!---<a href="payment_setting_action.php?b=<?= $id ?>&b1=<?=$st_id?>" class="actionbtn"><?=$st_action?></a>--->
    
    
    
    
    		<?php    
				       if ($currentstatus==0){
                          $Ap_status=2;
                          $chk='checked';
						 }else{
						  $Ap_status=0;
						  $chk='';
						}
						
						
					
						
						
						
						
						
             ?>
	<input  type="hidden" value="<?=$currentstatus?>" id="status<?= $id ?>" name="status<?= $id ?>"/>
    <label class="switch">
  <input type="checkbox" onChange="package_activedeactive(<?= $id ?>,<?=$Ap_status?>)"  <?=$chk?>>
  <div class="slider round"></div>
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
	<td class="nextbackmid"><?= $page_no_str ?></td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $invoicemanager_help ?></div>
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