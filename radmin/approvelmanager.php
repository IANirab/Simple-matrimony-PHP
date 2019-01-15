<?
session_start();
require_once("commonfileadmin.php");
//checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$cast_mgmnt_cm_1 = cast_mgmnt_cm_1();	
	$cast_mgmnt_cm_2 = cast_mgmnt_cm_2();	
	$cast_mgmnt_cm_4 = cast_mgmnt_cm_4();
} else {	
	$cast_mgmnt_cm_1 = "N";
	$cast_mgmnt_cm_2 = "N";
	$cast_mgmnt_cm_4 = "N";
}

if(isset($_GET['b1']) && $_GET['b1']=='-1')
{
	$_SESSION[$session_name_initital . "admin_user_search"]='';
}

if($cast_mgmnt_cm_1 == 'Y' || $cast_mgmnt_cm_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>

div.tabs {
  font-size: 80%;
  float:left;
  width:100%;
}

a.tab { float:left;
  background-color: #FF5639;
  border:0;
  border-bottom:none;
  padding: 2px 1em 2px 1em;
  text-decoration: none;
  color: #fff;
  margin:0 3px 0px 0; font-size:12px; 
  cursor:pointer;
  float: left;
  margin:0px 15px 6px 0;
  font-size:15px;
  position:relative;
}

a.tab:hover, a.tab:focus, a.tab.active{
  color: #fff; background-color: #000;
}



/*
 * note that by default all tab content areas
 * have display set to 'none'
 */
div.tabContent { 
display: none;
    float: left;
    width: 100%;
}

.count {
    background-color: #00a1f1;
    color: #fff;
    border-radius: 50%;
    width: 22px;
    float: right;
    text-align: center;
    height: 22px;
    line-height: 22px;
    font-size: 12px;
    position: absolute;
    top: -10px;
    right: -7px;
	z-index:2;
}
</style>
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
			
            
              <div id="pagetitle" class="float_lefter">
                <h1 class="pagetitle">Approve Manager</h1>
                </div>
                        
            
            
            

<!-- ********* CONTENT START HERE *********-->
<script>
	  var tabs =  ["tab1","tab2","tab3","tab4","tab5","tab6","tab7","tab8","tab9","tab10"];
      function showTab( tab ){

        // first make sure all the tabs are hidden
        for(i=0; i < tabs.length; i++)
		{
			$("#"+tabs[i]).hide();
			$("#link"+tabs[i]).removeClass("active");
        }
        // show the tab we're interested in
		$("#link"+tab).addClass("active");
		$("#"+tab).show();
       
      }
</script>

<script>
function approve_data(id,tbl,rowid)
{
	$.ajax
	({
		type: "POST",
		url: "approvel.php",
		data:'b='+id+'&t='+tbl,
		success: function(data)
		{
	    	error_add("notify_sucess","Approved successfully",'','');	
			error_remove("notify_sucess",4000);
			$("#"+rowid+id).remove();
		}

	});

}
</script>
  
 <?
function get_approval_cnt($tblnm)
{
	 $tab_cnt=getonefielddata("select count(id) from ".$tblnm." where currentstatus=5");
	 if($tab_cnt>99)
	 {
		 $tab_cnt_txt='<span class="count">99+</span>';
	 }
	 elseif($tab_cnt==0)
	 {
		$tab_cnt_txt='';
	 }else
	 {
	 	$tab_cnt_txt='<span class="count">'.$tab_cnt.'</span>';
	 }
	 return $tab_cnt_txt;	
}

?>


<div id="pagecontent">
<?= checkerroradmin()?>

<div class="tabs">
	<a class="tab active" id="linktab1" onClick="showTab('tab1')">
    Cast  <?=get_approval_cnt('tbldatingcastmaster')?></a>
    <a class="tab" id="linktab2" onClick="showTab('tab2')">
    Sub cast<?=get_approval_cnt('tbldatingsubcastmaster')?></a>
    <a class="tab" id="linktab3" onClick="showTab('tab3')">
    Mother Tongue<?=get_approval_cnt('tbldatingmothertonguemaster')?></a>
    <a class="tab" id="linktab4" onClick="showTab('tab4')">
    Father Occupation<?=get_approval_cnt('tbldatingfathermotherstatusmaster')?></a>
    <a class="tab" id="linktab5" onClick="showTab('tab5')">
    Institute<?=get_approval_cnt('tbl_dating_institute_master')?></a>    
    <a class="tab" id="linktab6" onClick="showTab('tab6')">
    Country <?=get_approval_cnt('tbldatingcountrymaster')?></a>    
    <a class="tab" id="linktab7" onClick="showTab('tab7')">
    State<?=get_approval_cnt('tbldating_state_master')?></a>        
    <a class="tab" id="linktab8" onClick="showTab('tab8')">
    City<?=get_approval_cnt('tbldating_city_master')?></a>        
    <a class="tab" id="linktab9" onClick="showTab('tab9')">
    Denomation<?=get_approval_cnt('tbl_muslim_denomination')?></a>        
</div>

<div id="tab1" class="tabContent" style="display:block">
			
    <div id="pagetitle" class="float_lefter">
    <h1 class="pagetitle">Cast Manager</h1>
    </div>
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

$fromqry = " from tbldatingcastmaster where currentstatus=5 ";
$FileNm = "approvelmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count( tbldatingcastmaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title,languageid,currentstatus  ".$fromqry .  $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language="english";
			$table = " tbldatingcastmaster";
			$currentstatus = $rs['currentstatus'];
			if($currentstatus="5")
			{
				$status = "Pending Approval";
			}
			else
			{
				$status = "Approved";
			}
			
		 ?>
            <tr valign="top" id="tab1_row<?=$id?>">
           	<td><?=$id?></td>
			<td><?=$title?></td>
            <td>
				<?
				if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="javascript:void(0);" class="actionbtn"
                onClick="approve_data('<?=$id?>','<?=$table?>','tab1_row');">Approve</a>
				<? } 
				?>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="approvelmaster.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="approveldelete.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtndel">Delete</a>
				<? }  
				?>
                
          </td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
    </div>

</div>    
    
<div id="tab2" class="tabContent" style="display:none">
	<div id="pagetitle" class="float_lefter">
	<h1 class="pagetitle">SubCast Manager</h1>
    </div>
    <div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
		<th scope="col">title</th>
		<th scope="col" width="15%">Action</th>
		</tr>
<?

$fromqry = " from  tbldatingsubcastmaster where currentstatus=5 ";
$FileNm = "approvelmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingsubcastmaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title,languageid,currentstatus  ".$fromqry .  $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language="english";
			$table = " tbldatingsubcastmaster";
			$currentstatus = $rs['currentstatus'];
			if($currentstatus="5")
			{
				$status = "Pending Approval";
			}
			else
			{
				$status = "Approved";
			}
			
		 ?>
            <tr valign="top"  id="tab2_row<?=$id?>">
           	<td ><?=$id?></td>
			<td ><?=$title?></td>
          	<td >
				<? if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="javascript:void(0);" class="actionbtn"
                onClick="approve_data('<?=$id?>','<?=$table?>','tab2_row');">Approve</a>
				<? } 
				?>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="approvelmaster.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="approveldelete.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtndel">Delete</a>
				<? }  
				?>
				
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </thead>
	</table>
    </div>
</div>    

<div id="tab3" class="tabContent" style="display:none">
    <div id="pagetitle" class="float_lefter">
    <h1 class="pagetitle">Mother Tongue Manager</h1>
    </div>
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

$fromqry = " from  tbldatingmothertonguemaster where currentstatus=5 ";
$FileNm = "approvelmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingmothertonguemaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title,languageid,currentstatus  ".$fromqry .  $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language="english";
			$table = " tbldatingmothertonguemaster";
			$currentstatus = $rs['currentstatus'];
			if($currentstatus="5")
			{
				$status = "Pending Approval";
			}
			else
			{
				$status = "Approved";
			}
			
		 ?>
            <tr valign="top"  id="tab3_row<?=$id?>">
           	<td ><?=$id?></td>
			<td><?=$title?></td>
          	<td>
				<?
				if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="javascript:void(0);" class="actionbtn"
                onClick="approve_data('<?=$id?>','<?=$table?>','tab3_row');">Approve</a>
				<? } 
				?>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="approvelmaster.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="approveldelete.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtndel">Delete</a>
				<? }  ?>
                
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
    </div>
</div>

<div id="tab4" class="tabContent" style="display:none">
    <div id="pagetitle" class="float_lefter">
    <h1 class="pagetitle">Father Occupation Manager</h1>
    </div>
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

$fromqry = " from  tbldatingfathermotherstatusmaster where currentstatus=5 ";
$FileNm = "approvelmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingfathermotherstatusmaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title,languageid,currentstatus  ".$fromqry .  $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language="english";
			$table = " tbldatingfathermotherstatusmaster";
			$currentstatus = $rs['currentstatus'];
			if($currentstatus="5")
			{
				$status = "Pending Approval";
			}
			else
			{
				$status = "Approved";
			}
			
		 ?>
            <tr valign="top"  id="tab4_row<?=$id?>">
           	<td ><?=$id?></td>
			<td><?=$title?></td>
            <td >
				<?
				if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="javascript:void(0);" class="actionbtn"
                onClick="approve_data('<?=$id?>','<?=$table?>','tab4_row');">Approve</a>
				<? } 
				?>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="approvelmaster.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="approveldelete.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtndel">Delete</a>
				<? }  ?>
                
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
    </div>
</div>

<div id="tab5" class="tabContent" style="display:none">
    <div id="pagetitle" class="float_lefter">
    <h1 class="pagetitle">Institute Manager</h1>
    </div>
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

$fromqry = " from   tbl_dating_institute_master where currentstatus=5 ";
$FileNm = "approvelmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count( tbl_dating_institute_master.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title,languageid,currentstatus  ".$fromqry .  $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language="english";
			$table = "  tbl_dating_institute_master";
			$currentstatus = $rs['currentstatus'];
			if($currentstatus="5")
			{
				$status = "Pending Approval";
			}
			else
			{
				$status = "Approved";
			}
			
		 ?>
            <tr valign="top"  id="tab5_row<?=$id?>">
           	<td ><?=$id?></td>
			<td ><?=$title?></td>
          	<td  class="mobile_none ">
				<?
				if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="javascript:void(0);" class="actionbtn"
                onClick="approve_data('<?=$id?>','<?=$table?>','tab5_row');">Approve</a>
				<? } 
				?>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="approvelmaster.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="approveldelete.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtndel">Delete</a>
				<? }  ?>
                
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
    </div>
</div>

<div id="tab6" class="tabContent" style="display:none">
    <div id="pagetitle" class="float_lefter">
   <h1 class="pagetitle">Country Manager</h1>
    </div>
    <div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
		<th scope="col">title</th>
		<th scope="col" width="100">Action</th>
		</tr>
        </thead>
        <tbody>
<?

$fromqry = " from  tbldatingcountrymaster where currentstatus=5 ";
$FileNm = "approvelmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingcountrymaster.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title,languageid,currentstatus  ".$fromqry .  $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language="english";
			$table = " tbldatingcountrymaster";
			$currentstatus = $rs['currentstatus'];
			if($currentstatus="5")
			{
				$status = "Pending Approval";
			}
			else
			{
				$status = "Approved";
			}
			
		 ?>
            <tr valign="top"  id="tab6_row<?=$id?>">
           	<td ><?=$id?></td>
			<td ><?=$title?></td>
          	<td >
				<? 
				if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="javascript:void(0);" class="actionbtn"
                onClick="approve_data('<?=$id?>','<?=$table?>','tab6_row');">Approve</a>
				<? } 
				?>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="approvelmaster.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="approveldelete.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtndel">Delete</a>
				<? }  ?>
                
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
    </div>
</div>

<div id="tab7" class="tabContent" style="display:none">
    <div id="pagetitle" class="float_lefter">
    	<h1 class="pagetitle">State Manager</h1>
    </div>
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

$fromqry = " from  tbldating_state_master where currentstatus=5 ";
$FileNm = "approvelmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldating_state_master.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title,languageid,currentstatus  ".$fromqry .  $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language="english";
			$table = " tbldating_state_master";
			$currentstatus = $rs['currentstatus'];
			if($currentstatus="5")
			{
				$status = "Pending Approval";
			}
			else
			{
				$status = "Approved";
			}
			
		 ?>
            <tr valign="top"  id="tab7_row<?=$id?>">
           	<td ><?=$id?></td>
			<td ><?=$title?></td>
            <td  class="mobile_none ">
				<?
				if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="javascript:void(0);" class="actionbtn"
                onClick="approve_data('<?=$id?>','<?=$table?>','tab7_row');">Approve</a>
				<? } 
				?>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="approvelmaster.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="approveldelete.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtndel">Delete</a>
				<? }  ?>
                
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
    </div>
</div>

<div id="tab8" class="tabContent" style="display:none">
    <div id="pagetitle" class="float_lefter">
	<h1 class="pagetitle">City Manager</h1>
    </div>
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

$fromqry = " from  tbldating_city_master where currentstatus=5 ";
$FileNm = "approvelmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldating_city_master.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title,languageid,currentstatus  ".$fromqry .  $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language="english";
			$table = " tbldating_city_master";
			$currentstatus = $rs['currentstatus'];
			if($currentstatus="5")
			{
				$status = "Pending Approval";
			}
			else
			{
				$status = "Approved";
			}
			
		 ?>
            <tr valign="top"  id="tab8_row<?=$id?>">
           	<td ><?=$id?></td>
			<td><?=$title?></td>
          	<td >
				<?
				if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="javascript:void(0);" class="actionbtn"
                onClick="approve_data('<?=$id?>','<?=$table?>','tab8_row');">Approve</a>
				<? } 
				?>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="approvelmaster.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="approveldelete.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtndel">Delete</a>
				<? }  ?>
                
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
</div>
</div>

<div id="tab9" class="tabContent" style="display:none">
    <div id="pagetitle" class="float_lefter">
   <h1 class="pagetitle">Denomation Manager</h1>
    </div>
    <div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
	    <th scope="col">title</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
<?

$fromqry = " from   tbl_muslim_denomination where currentstatus=5 ";
$FileNm = "approvelmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbl_muslim_denomination.id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title,languageid,currentstatus  ".$fromqry .  $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			$language="english";
			$table = "tbl_muslim_denomination";
			$currentstatus = $rs['currentstatus'];
			if($currentstatus="5")
			{
				$status = "Pending Approval";
			}
			else
			{
				$status = "Approved";
			}
			
		 ?>
            <tr valign="top"  id="tab9_row<?=$id?>">
           	<td ><?=$id?></td>
			<td ><?=$title?></td>
            <td >
				<?
				if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="javascript:void(0);" class="actionbtn"
                onClick="approve_data('<?=$id?>','<?=$table?>','tab9_row');">Approve</a>
				<? } 
				?>
				<? if($cast_mgmnt_cm_2 == 'Y' || $cast_mgmnt_cm_2 == 'N') { ?>				
		    	<a href="approvelmaster.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtn_m green">Modify</a> 
				<? } if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N') { ?>
				<a href="approveldelete.php?b=<?= $id ?>&t=<?=$table;?>" class="actionbtndel">Delete</a>
				<? }  ?>
                
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </thead>
	</table>
    </div>
</div>

    
</div>    
    
			</div>
        </div>    
    
    </div>
 </div>   
 
 

	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->

</body>
</html>
<? } else { 
	header("location:dashboard.php?msg=no");
} ?>