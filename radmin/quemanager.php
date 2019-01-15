<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = 0;
if(isset($_SESSION[$session_name_initital . 'adminlogin']) && $_SESSION[$session_name_initital . 'adminlogin']!=''){
	$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
}

$action = 0;
if(isset($_GET['b1']) && $_GET['b1']!=''){
	$action = $_GET['b1'];
	
}


?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META NAME="ROBOTS" CONTENT="INDEX,NOFOLLOW">
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
        <h1 class="pagetitle"><i class="fa fa-info-circle"></i>  
            
          
            <?
			if(isset($_GET['b1']) && $_GET['b1']=='-2'){
				 echo "Asked Question Manager";
			}
			
			if(isset($_GET['b1']) && $_GET['b1']=='1'){
				 echo "Public Question Manager";
			}
			
			if(isset($_GET['b1']) && $_GET['b1']=='2'){
				 echo "Private Question Manager";
			}
			if(isset($_GET['b1']) && $_GET['b1']=='-1'){
				 echo "Question Manager";
			}
			?>
            
            </h1>
			<div class="addlink1">	
            	
				<div class="addlink">
                
                <a href="quemaster.php?b1=-1">Add new Que</a>
                
                </div>
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<? checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
		<th scope="col">Question</th>
        <th scope="col" class="mobile_none ">Privacy</th>
        <th scope="col">Views</th>
		
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$chk_uri = strstr($_SERVER['SCRIPT_FILENAME'],"radmin");
$searchqry = "";
if(isset($_GET['b1']) && $_GET['b1']=="1"){
	$fromqry = "from tblkb_quemaster WHERE  tblkb_quemaster.currentstatus in (0) AND privacyid=1";	
}
else if(isset($_GET['b1']) && $_GET['b1']=="2"){
	$fromqry = "from tblkb_quemaster WHERE tblkb_quemaster.currentstatus in (0) AND privacyid=2";	
}
else if(isset($_GET['b1']) && $_GET['b1']=="-2"){
	$fromqry = " from tblkb_quemaster WHERE tblkb_quemaster.currentstatus in (5) ";
} else {
$fromqry = " from tblkb_quemaster WHERE  tblkb_quemaster.currentstatus in (0) ";
}
$fromqry .= $searchqry;
$FileNm = "quemanager.php?b1=$action&";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata("select count(tblkb_quemaster.cmsid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str = $arrval["PageStr"];

if(isset($_GET['b1']) && $_GET['b1']=="-2"){
	$result = getdata("select cmsid,tblkb_quemaster.title  ". $fromqry ." order by tblkb_quemaster.cmsid desc ". $NoOfRecord);
	
} else {
	
	$result = getdata("select cmsid,tblkb_quemaster.title,tblkb_quemaster.privacyid,tblkb_quemaster.View  ". $fromqry ." order by tblkb_quemaster.cmsid desc ". $NoOfRecord);
	
	
}
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$title=$rs[1];
			if(isset($_GET['b1']) && $_GET['b1']=="-2"){
				$category= "No Category";	
			} else {
				$category=$rs[2];			
			}
			$privacy = "";
			
			
			if($_GET['b1']!=-2){
			$pri = $rs[3];
			if($pri==1){
				$privacy = "Public";
			} else if ($pri==2){
				$privacy = "Private";
			} 
			
			else {
				$privacy = "No Privacy";	
			}
			$view = $rs[3];
			}	else{
				$privacy = "No Privacy";
				$view='';
			}
		 ?>
            <tr valign="top">
           	<td ><?=$id ?></td>
			<td ><?=$title ?>&nbsp;</td>
            <td class="mobile_none "><?=$privacy ?>&nbsp;</td>
            <td><?=$view ?>&nbsp;</td>
			<td >
               			
		    	<a href="quemaster.php?b=<?= $id ?>" class="actionbtn_m green">Modify</a>&nbsp;
               
                				
				<a href="quedelete.php?b=<?= $id ?>" class="actionbtndel">Delete</a>
              &nbsp;</td>
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
