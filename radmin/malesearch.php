<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if(isset($_GET['b']) && $_GET['b']!='')
{
$action=$_GET['b'];
}
//$action = 0;


$title = "";	
$languageid= 0;
$filename ="monthlymaleregistrations";
/*$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$location_mgmnt_lc_1 = location_mgmnt_lc_1();
	$location_mgmnt_lc_2 = location_mgmnt_lc_2();		
} else {	
	$location_mgmnt_lc_1 = 'N';
	$location_mgmnt_lc_2 = 'N';
}
if($location_mgmnt_lc_1 == 'Y' || $location_mgmnt_lc_1 == 'N'){

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,languageid from tbldatingcountrymaster where currentstatus =0 and id=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];	
		$languageid= $rs[1];
	}
	freeingresult($result);
}*/
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
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
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">Male Registrations</h1>
			<!-- ********* TITLE END HERE *********-->
			
              <div class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>

     <form name="frmdocument" method="post" action ="<?= $filename ?>.php?b=<?=$action?>" class="form-horizontal" >
      <div class="form-group">
             <div class="widhtsetr"><label>Year :</label>
              <select name="year" class="form-control">
              <?php for($i=2000;$i<=2020;$i++) 
              { ?>
              <option value="<?=$i?>"><?=$i?></option>
              <?php } ?>
              </select>
              </div>
          <div class="widhtsetr control-label_25">
               <label>Month :</label>
           <select name="month" class="form-control">
       <option value="01">January</option>
       <option value="02">February</option>
       <option value="03">March</option>
       <option value="04">April</option>
       <option value="05">May</option>
       <option value="06">June</option>
       <option value="07">July</option>
       <option value="08">August</option>
       <option value="09">September</option>
       <option value="10">October</option>
       <option value="11">November</option>
       <option value="12">December</option>
	  
       </select>
       </div>
       </div>
		  
		  <?php /*?><tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Title :</th>
            <td <?= admintdclass ?>>
              <input type="text" name="title" <?= admininputclass ?> size=35 value ="<?= $title  ?>">
              </td>
          </tr><?php */?>
          
         <div class="form-group common_button">
         <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>     
	  
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $countrymaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
    </div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>
