<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

$action = '';
if(isset($_GET['c']) && $_GET['c']!=''){
	$action = $_GET['c'];	
}



$no_of_contact_display='';
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$pkg_mgmnt_pm_1 = pkg_mgmnt_pm_1();
	$pkg_mgmnt_pm_2 = pkg_mgmnt_pm_2();
	$pkg_mgmnt_pm_4 = pkg_mgmnt_pm_4();
	$pkg_mgmnt_pm_5 = pkg_mgmnt_pm_5();
} else {	
	$pkg_mgmnt_pm_1 = "N";
	$pkg_mgmnt_pm_2 = "N";
	$pkg_mgmnt_pm_4 = "N";
	$pkg_mgmnt_pm_5 = "N";
}
if($pkg_mgmnt_pm_1 == 'Y' || $pkg_mgmnt_pm_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


<script type="text/javascript" src="jquery/jquery.js"></script>
<script language="javascript">
	function select_parent(str){
		
		window.location.href ="packagemager.php?c="+str;
		
	}
</script>
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
	
	
    $.post('package_activedeactive.php',{
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
			<h1 class="pagetitle"><i class="fa fa-database"></i> Package Manager</h1>
			<div class="addlink1">
			<? if($pkg_mgmnt_pm_2 == 'Y' || $pkg_mgmnt_pm_2 == 'N') { ?>
			<div class="addlink"><? if($sitethemefolder=="cometomarryme"){ ?><a href="cometomarryme.packagemaster.php">Add new package</a><? } else { ?><a href="packagemaster.php">Add new package</a><? } ?></div>
			<? } ?>
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->




<?= checkerroradmin()?>

<div class="form-group singal_group">
			<select name="cmblocation" id="cmblocation"  class="form-control" onChange="select_parent(this.value);">
    <option value=""/>Pacakage Type</option>
<? fillcombo("select PackageTypeId,Description from tbldatingpackagetypemaster where CurrentStatus=0 order by Description "
,$action,""); ?>

</select>
             </div>



<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col" width="3%">Id</th>
		<th scope="col" width="20%">title</th>
		<th scope="col" width="5%" class="mobile_none">days</th>
		<th scope="col" width="8%">price</th>
        <th scope="col" width="8%">Contact Display</th>
  		<th scope="col" width="10%">Action</th>
		</tr>
        </thead>
        <tbody>
<?

$searchqry = "";
if($action>0){
	 $searchqry = " AND tbldatingpackagemaster.PackageTypeId=".$action;
}

$fromqry = " from tbldatingpackagemaster where tbldatingpackagemaster.currentstatus in (0,2) ";
$fromqry .= $searchqry;


$FileNm = "packagemager.php?";
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingpackagemaster.PackageId) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];


$result = getdata("select tbldatingpackagemaster.PackageId,tbldatingpackagemaster.Description,Days,Price,PackageTypeId,no_of_contact_display,active,CurrentStatus". $fromqry ." order by tbldatingpackagemaster.PackageId desc ". $NoOfRecord);





while($rs= mysqli_fetch_array($result))
{
		  	$PackageId=$rs[0];
			$Description=$rs[1];
			$Days=$rs[2];
			$Price =$rs[3];
			$PacakgeTypeID =$rs[4];
			if($PacakgeTypeID!=''){
		$PackageTypeDescription = getonefielddata("select Description from  tbldatingpackagetypemaster where PackageTypeId='".$PacakgeTypeID."'");
	}
	   $no_of_contact_display =$rs[5];
	   $active_status=$rs[6];
	   $currentstatus=$rs[7];
			
			$buylink =$sitepath . "package_buy.php?b=$PackageId";
		 ?>
            <tr valign="top">
           	<td ><?=$PackageId?></td>
			<td ><?=$Description?>&nbsp;
            <?php /*?><a class="actionbtn" href="<?=$buylink?>">View</a><?php */?>
            </td>
            
		<td class="mobile_none"><?=$Days?></td>
          	<td ><?=$Price?></td>
             	<td ><?=$no_of_contact_display?></td>
            <td>
			<? if($pkg_mgmnt_pm_2 == 'Y' || $pkg_mgmnt_pm_2 == 'N') { 
				 ?>
               <a href="packagemaster.php?b=<?= $PackageId ?>&c=<?=$action?>" class="actionbtn_m green">Modify</a>
            <? } if($pkg_mgmnt_pm_4 == 'Y' || $pkg_mgmnt_pm_4 == 'N') { ?>	
				<a href="packagedelete.php?b=<?= $PackageId ?>&c=<?=$action?>" class="actionbtndel">Delete</a>
			<? } ?>	
            
            
            
			<?php    
				      
					   if ($currentstatus==0){
                          $Ap_status=2;
                          $chk='checked';
						 }else{
						  $Ap_status=0;
						  $chk='';
						}
	       ?>
	<input  type="hidden" value="<?=$currentstatus?>" id="status<?= $PackageId ?>" name="status<?= $PackageId ?>"/>
    <label class="switch">
  <input type="checkbox" onChange="package_activedeactive(<?= $PackageId ?>,<?=$Ap_status?>)"  <?=$chk?>>
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
	<td class="nextbackmid">&nbsp;</td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $packagemanager_help ?></div>
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