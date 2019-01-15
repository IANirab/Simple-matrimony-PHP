<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$activestatuschk='';
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>        
function active_deactive_tax(id){

	var a=$("#activetax"+id).val();
	
	if(a==0){
	   $("#activetax"+id).val(1);
	   var status=1;
	}
	if(a==1){
	   $("#activetax"+id).val(0);
	   var status=0;
	}
	
	
	
		$.post('taxactivedeactive.php',{
			id:id,
			status:status	
			
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
			<h1 class="pagetitle">Tax Manager</h1>
			<div class="addlink1">
			
			<div class="addlink"><a href="taxmaster.php">Add</a></div>
		
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
        <th scope="col">HSN Code</th>
	   <th scope="col">From Date / To Date</th>
  		<th scope="col" width="15%">Action / Status</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
if(isset($_SESSION[$session_name_initital . "admin_user_search"]) && $_SESSION[$session_name_initital . "admin_user_search"]!='')
{
	$searchqry=$_SESSION[$session_name_initital . "admin_user_search"];
	
}

$fromqry = " from tbldatingtaxmaster where currentstatus in (0,1) ";
$fromqry .= $searchqry;
$FileNm = "taxmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];
$result = getdata("select title,hsncode,fromdate,todate,currentstatus,id ". $fromqry ." order by tbldatingtaxmaster.id desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		$title = $rs[0];			
		$hsncode =$rs[1];
		$fromdate =date_format(date_create("$rs[2]"),"M d, Y");
		$todate =date_format(date_create("$rs[3]"),"M d, Y");;
		$currentstatus=$rs[4];
		if($currentstatus==0){
			$activestatuschk='checked';
		}else{
		   $activestatuschk='';	
		}
		
		$id=$rs[5];
		 ?>
            <tr>
           	<td ><?=$id?></td>
          	<td ><?=$title?></td>
            <td ><?=$hsncode?></td>
            <td ><?=$fromdate?>  <br/> <?=$todate?> </td>
          	<td >
	
		    	<a href="taxmaster.php?b=<?=$id?>" class="actionbtn_m green">Modify</a>

				<a href="taxdelete.php?b=<?=$id?>" class="actionbtndel">Delete</a>
				
                
                  <input type="hidden" id="activetax<?=$id?>" name="activetax" value="<?=$currentstatus?>" class="form-control" />
              
               <div class="form-group">
                      <div class="widhtsetr">                    
                      <checkbox>
<label class="switch">
  <input name="tax_active" id="tax_active"  type="checkbox" <?= adminbuttonclass ?> onChange="active_deactive_tax(<?=$id?>);" <?=$activestatuschk?>>
  <span class="slider round"></span>
</label></checkbox>
                    </div>
              </div>
              
                
                
                
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $countrymanager_help ?></div>
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
