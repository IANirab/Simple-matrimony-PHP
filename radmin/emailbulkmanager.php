<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$bulk_email_be_1 = bulk_email_be_1();
	$bulk_email_be_2 = bulk_email_be_2();	
	$bulk_email_be_4 = bulk_email_be_4();
	$bulk_email_be_5 = bulk_email_be_5();
} else {	
	$bulk_email_be_1 = "N";
	$bulk_email_be_2 = "N";
	$bulk_email_be_4 = "N";
	$bulk_email_be_5 = "N";
}
if($bulk_email_be_1 == 'Y' || $bulk_email_be_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>
<?= $admintitle ?>
</title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<h1 class="pagetitle"><i class="fa fa-envelope"></i> Bulk email manager</h1>
            <div class="addlink1">
              <? if($bulk_email_be_2 == 'Y' || $bulk_email_be_2 == 'N') { ?>
              <div class="addlink"><a href="emailbulkmaster.php">Send new mail</a></div>
              <? } ?>
            </div>
          <div class="errorbox">
              <?= checkerroradmin()?>
            </div>
          
          <!-- ********* TITLE END HERE *********-->
          <div id="pagecontent"> 
            <!-- ********* CONTENT START HERE *********-->
            
            
            
            
           <div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
                <th scope="col">Id</th>
                <th scope="col">subject</th>
                <th scope="col">Total User</th>
                <th scope="col">Sent email user</th>
                <th scope="col">Remain user</th>
                <th scope="col" width="15%">Action</th>
              </tr>
              </thead>
              <tbody>
              <?
$searchqry = "";
$fromqry = " from tblemailbulkmaster where tblemailbulkmaster.currentstatus in (0) AND userid is NULL ";
$fromqry .= $searchqry;
$FileNm = "emailbulkmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(sendid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select sendid,subject,totallot,totallotsend,totalmailsend,newsletter_subsciber ". $fromqry ." order by tblemailbulkmaster.sendid desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$sendid=$rs[0];
			$subject=$rs[1];
			$totallot=$rs[2];
			$totallotsend=$rs[3];
			$totalmailsend=$rs[4];
			$newsletter_subsciber=$rs[5];
			
			if($newsletter_subsciber=='A')
	{
		$a=" ";
	}elseif($newsletter_subsciber=='Y')
	{
		$a=" and news_letter_subscribe='Y' ";
	}elseif($newsletter_subsciber=='N')
	{
		$a=" and news_letter_subscribe='N' ";
	}
	
		 ?>
              <tr valign="top">
                <td><?=$sendid?></td>
                <td><?=$subject?>
                  <br></td>
                <td><? echo $tot_user = getonefielddata("SELECT count(id) FROM tbl_user_emailbulk
				 where  currentstatus=0 and templateid='".$sendid."' ");?></td>
                
                <td><? echo $sent_user = getonefielddata("SELECT count(id) FROM tbl_user_emailbulk
				 where  currentstatus=0 and templateid='".$sendid."' and status='Y' ");?></td>
                
                <td><? echo $remain_user = getonefielddata("SELECT count(id) FROM tbl_user_emailbulk
				 where  currentstatus=0 and templateid='".$sendid."' and status='N' ");?></td>
                
                
                
                <td><? if($bulk_email_be_4 == 'Y' || $bulk_email_be_4 == 'N') { ?>
                  <a href="emailbulkdelete.php?b=<?= $sendid ?>" class="actionbtndel">Delete</a>
                  <? } ?>
                  <? if($bulk_email_be_4 == 'Y' || $bulk_email_be_4 == 'N') { ?>
                  <a href="send_bulk_email.php?b=<?= $sendid ?>" class="actionbtn">Send Email</a>
                  <? } ?>
                  <? if($bulk_email_be_4 == 'Y' || $bulk_email_be_4 == 'N') { ?>
                  <a href="emailbulksendagain.php?b=<?= $sendid ?>" class="actionbtn">Send Again</a>
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
            <table width=100% align="center" class="nextbackbox" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" <?= adminnextbackcls ?>><?= $BackStr ?></td>
                <td class="nextbackmid">&nbsp;</td>
                <td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
              </tr>
            </table>
            <!-- ********* CONTENT END HERE *********--> 
          </div>
        </div>
        <div class="adminhelp">
          <h3>
            <?= $helphead ?>
          </h3>
          <?= $emailbulkmanager_help ?>
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
<? } else {
	header("location:dashboard.php?msg=no");
	exit;
} ?>