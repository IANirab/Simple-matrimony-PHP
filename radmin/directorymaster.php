<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;

$title = "";	
$categoryid= 0;
$description="";
$image="";
$link="";
$mobile="";
$email="";
$code="";
$password="";
$typeid=0;
$amount="";
$deactive ="";
$chk_free = "";
$chk_paid ="";

$filename ="directoryinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$dir_mgmnt_dm_1 = dir_mgmnt_dm_1();
	$dir_mgmnt_dm_2 = dir_mgmnt_dm_2();		
} else {	
	$dir_mgmnt_dm_1 = "N";
	$dir_mgmnt_dm_2 = "N";
}
if($dir_mgmnt_dm_1 == 'Y' || $dir_mgmnt_dm_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,categoryid,description,image_nm,link,mobile,email,code,password,typeid,amount,payment_completed,txnid,paymentstatus,date_format(paymentdate,'$date_format'),paidamount,deactive,date_format(createdate,'$date_format') from tbl_directory_master where currentstatus =0 and directoryid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];	
		$categoryid= $rs[1];
		$description=$rs[2];	
		$image=$rs[3];	
		$link=$rs[4];	
		$mobile=$rs[5];	
		$email=$rs[6];	
		$code=$rs[7];	
		$password=$rs[8];	
		$typeid=$rs[9];	
		$amount=$rs[10];
		$payment_completed=$rs[11];
		$txnid=$rs[12];
		$paymentstatus=$rs[13];
		$paymentdate=$rs[14];
		$paidamount=$rs[15];	
		$deactive=$rs[16];	
		if ($deactive =="Y")
			$deactive ="checked";
		else
			$deactive ="";
		$createdate=$rs[17];
		if ($typeid == 1)
		{
			$chk_free ="selected";
			$chk_paid ="";
		}
		else
		{
			$chk_free ="";
			$chk_paid ="selected";
		}

	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
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
			<h1 class="pagetitle">Add directory</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? 
if($dir_mgmnt_dm_2=="Y" || $dir_mgmnt_dm_2=="N") { ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  class="form-horizontal ">
     <div class="form-group text-form"><label>Txnid :</label>  <?= $txnid ?></div>
      <div class="form-group text-form"><label>payment Status :</label> <?= $paymentstatus ?></div>
		 <div class="form-group text-form"><label>payment Date :</label>
             <?= $paymentdate ?>
              </div>
		 <div class="form-group text-form"><label>Amount :</label>
             <?= $amount ?>
              </div>
	   <div class="form-group text-form"><label>Payment completed :</label>
             <?= $payment_completed ?>
              </div>
		 <div class="form-group text-form"><label>Paid amount :</label>
             <?= $paidamount ?>
              </div>
		 <div class="form-group text-form"><label>Create date :</label>
             <?= $createdate ?>
              </div>
		 <div class="form-group">
         <label>Category </label>
              <select name="categoryid"  class="form-control">
<? fillcombo("select categoryid,title from tbl_directory_category_master where currentstatus=0 order by title ",$categoryid,""); ?>
</select>
              </div>
		  
		  <div class="form-group"><label>Title </label>
              <input type="text" name="title"  class="form-control" size=35 value ="<?= $title  ?>">
              </div>
		    <div class="form-group"><label>Description </label>
               <textarea name="description"  class="form-control" size=35 col="35" rows="5" ><?= $description  ?></textarea>
              </div>
		   <div class="form-group"><label>Image </label>
           <div class="widhtsetr">
            <input type=file name="img"  id="img"  class="form-control"  size="35" alt="Upload Image" >
           
		
			 <? if ($image  != "") { ?>
            <img  src="../uploadfiles/<?= $image ?>" height=117 width=100 align="absmiddle">
			<? } ?>
              </div>
             
		 	<div class="widhtsetr  control-label_25">
          <label>Link</label>
              <input type="text" name="link" class="form-control" size=35 value ="<?= $link  ?>">
              </div>
              </div>
		  <div class="form-group singleline_class">
          <div class="widhtsetr">
          <label>Mobile</label> 
              <input type="text" name="mobile"  class="form-control" size=35 value ="<?= $mobile  ?>">
              </div>
		    <div class="widhtsetr">
          <label>Email </label>
              <input type="text" name="email"  class="form-control" size=35 value ="<?= $email  ?>">
              </div>
		   <div class="widhtsetr  control-label_25">
          <label>Password </label>
              <input type="text" name="password"  class="form-control" size=35 value ="<?= $password  ?>">
              </div>
              </div>
		 <div class="form-group">
          <div class="widhtsetr">
          <label>Type </label>
             <select name="typeid" class="form-control">
			 <option <?= $chk_free ?> value="1">Free</option>
			 <option <?= $chk_paid ?> value="2">Paid</option>			 
			</select>
			
           </div>
          <div class="widhtsetr  control-label_25">
          <label>Deactive</label>
          <input type="checkbox" name="chkdeactive" <?= $deactive ?> value="Y" > 
           </div>
           </div>
		  
		<div class="form-group common_button">
        <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
        <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
      
    </form>
	<? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $directorymaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
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
	exit;
} ?>