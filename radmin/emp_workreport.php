<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;

$title = "";	
$languageid= 0;
$filename ="emp_workreport";
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">
<div align="center" id="pagealign">
<div align="center" id="container">
<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
	<div id="content-wrap">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div id="center">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<div id="pagetitle"><h1>Search Sales</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>

     <form name="frmdocument" method="post" action ="<?=$filename ?>.php" >
      <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">
      	<tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Employee :</th>
            <td <?= admintdclass ?>>
              <select name="empid" <?= admindropdownclass ?>>
              	<? fillcombo("SELECT loginid,name from tbldatingadminloginmaster WHERE currentstatus=0 AND loginid!=1","","Select") ?>
              </select>
              </td>
          </tr>
          
        <tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Month :</th>
            <td <?= admintdclass ?>>
           <select name="month" <?= admindropdownclass ?>>
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
       </td>
          </tr>  
          
		<tr valign="top">
            <th scope="row" width="30%" <?= adminthclass ?>>Year :</th>
            <td <?= admintdclass ?>>
              <select name="year" <?= admindropdownclass ?>>
              <?php for($i=2000;$i<=2020;$i++) { ?>
              	<option value="<?=$i?>"><?=$i?></option>
              <?php } ?>
              </select>
              </td>
          </tr>
          
          
         <tr valign="top">
            <th scope="row" <?= adminthclass ?>>&nbsp;</th>
            <td <?= admintdclass ?>><input name="Submit" type="submit" <?=adminbuttonclass ?> title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" <?= adminbuttonclass ?> value="Reset" title="Reset" alt="Reset">
            </td>
          </tr>
      </table>
    </form>     
	  
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $countrymaster_help ?></div>
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
