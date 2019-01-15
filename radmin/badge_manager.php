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
	function show_user(id,dockid)
	{
		
	
			$.ajax({
			type: "POST",
			url: "user_dockinfo.php",
			data:'b='+id+'&d='+dockid,
			success: function(data){
				$("#show_user_dockdetails").html(data);
			}
			});
			
		
			
			
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

<?
if(isset($_GET['b1']) && $_GET['b1']!='')
{
	$b1=$_GET['b1'];
}else{$b1='0,1,2';}

if(isset($_GET['b']) && $_GET['b']!='')
{
	$b=" and userid=".$_GET['b']." ";
	
}else{$b='';}


?>

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">
            <?
            if(isset($_GET['b']) && $_GET['b']!='')
			{
				echo "Identification Manager";
			}
			else
			{
				if($b1==0){echo "Approve Identification Manager";}
				if($b1==1){echo "Pending Identification Manager";}
				if($b1==2){echo "Disapprove Identification Manager";}
			}
			?>
            </h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
            
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
        <th scope="col">User Info</th>
         <th scope="col">Badge Info / Doc type</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
</tr>
</thead>
        <tbody>
<?
$searchqry = "";

$fromqry = " from tbldating_userdoc where currentstatus in ($b1) $b ";

$FileNm = "badge_manager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];

 if(isset($_GET['b']) && $_GET['b']!='')
{
	$NoOfRecord='';
}

$result = getdata("select tbldating_userdoc.id,tbldating_userdoc.userid,tbldating_userdoc.docid,tbldating_userdoc.typeid,tbldating_userdoc.refno,
tbldating_userdoc.image,tbldating_userdoc.currentstatus ". $fromqry ." order by tbldating_userdoc.id desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		$id = $rs[0];			
		$userid =$rs[1];
		$docid =$rs[2];
		$typeid =$rs[3];
		$refno =$rs[4];
		$image =$rs[5];
		$currentstatus =$rs[6];
		
		if($currentstatus==0){
		  $stausimage="active.png";	
		}else if($currentstatus==2){
		  $stausimage="deactive.png";
		}else{
		   $stausimage="pending.png";
		}
		
		//user details
		$profile_code = find_profile_code($userid);
		$resultuserdata = getdata("select name,email,phno from tbldatingusermaster where currentstatus in (0) and userid='".$userid."'");
        $rsuser_data= mysqli_fetch_array($resultuserdata);
		$username=$rsuser_data['name'];
		$useremail=$rsuser_data['email'];
		$userphone=$rsuser_data['phno'];
		
		//badges details
		$result_badges_data = getdata("select title,image from tbldating_docmaster where currentstatus in (0) and id='".$docid."'");
        $rsbadges_data= mysqli_fetch_array($result_badges_data);
		$badgename=$rsbadges_data['title'];
		$badgeimage=$rsbadges_data['image'];
		
		
		
		//dock details
        $result_doc_data = getdata("select title from tbldating_doct_detail where currentstatus in (0) and id='".$typeid."'");
        $rsdock_data= mysqli_fetch_array($result_doc_data);
		$dockname=$rsdock_data['title'];

		
		
		
		
		
		
		 ?>
            <tr>
           	<td ><?=$id?></td>
          	<td >
            <? if($profile_code!=''){?><strong>Profile ID:</strong>&nbsp;<?=$profile_code?><br/> <? }?>
            <? if($username!=''){?><strong>Name:</strong>&nbsp;<?=$username?><br/><? }?>
            <? if($useremail!=''){?><strong>Email:</strong>&nbsp;<?=$useremail?><br/><? }?>
            <? if($userphone!=''){?><strong>Phone:</strong>&nbsp;<?=$userphone?><? }?>
             </td>
            <td ><strong><?=$badgename?></strong>&nbsp;
            <? if($dockname!=''){?>
            (<?=$dockname?>)
            <? } ?>
            <br/> 
             <img src="../assets/<?=$sitethemefolder?>/images/<?=$badgeimage?>" height="100" width="100">
             </td>
             <td ><img src="images/<?=$stausimage?>"></td>
             <td>
               
               <a  href="#" class="actionbtn actionbtnHig" data-toggle="modal" data-target="#myModal"
            onclick="show_user(<?=$userid?>,<?=$id?>);">View Document</a>
            
            
              <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                          <div class="modal-content">
                          	<div class="modal-body">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h2 class="pagetitle">User Document Details</h2>
                                <div id="show_user_dockdetails" class="show_user_dockdetails">
                                </div>  
                            </div>                         
                          </div>
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
