<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$countryid ="";
$stateid ="";

$title = "";	
$languageid= 0;
$filename ="cityinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
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
	$result = getdata("select title,languageid,state_id from tbldating_city_master where currentstatus =0 and id=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];	
		$languageid= $rs[1];
		$stateid =$rs[2];
	}
	freeingresult($result);
}
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
			<h1 class="pagetitle">Add City / Village</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">

<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($location_mgmnt_lc_2 == 'Y' || $location_mgmnt_lc_2 == 'N') { ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>" class="form-horizontal" >
      
      
      <div class="form-group">
      <div class="widhtsetr">
      <label>Language </label>
            
              <select name="cmblanguage"  class="form-control">
<? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
</select>
              </div>
		 
         
         <?
         if($enable_muncipale=='Y')
		{
		 ?> 
         <div class=" widhtsetr control-label_25"><label>District</label>
           
              <select name="cmbstate" class="form-control">
<? fillcombo("select id,title from tbldating_district_master where currentstatus=0",$stateid,"Select"); ?>
</select>
              </div>
		 
        <? }else{ ?> 
         	<div class=" widhtsetr control-label_25"><label>State</label>
           
              <select name="cmbstate" class="form-control">
<? fillcombo("select id,title from tbldating_state_master where currentstatus=0",$stateid,"Select"); ?>
</select>
              </div>
        <? } ?>  
              
              
              </div>
		 
            <div class="form-group">
         <label>Title</label>
           
              <input type="text" name="title" class="form-control" size=35 value ="<?= $title  ?>">
              </div>
                  
         <div class="form-group common_button">
         <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>     
	<? } ?>  
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
<? } else {
	header("location:dashboard.php?msg=no");
} ?>