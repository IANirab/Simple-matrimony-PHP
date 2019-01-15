<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$title = '';
$imgnm = '';
$type= '';
$help  = '';
$filename ='packagefeaturedinsert';
		


if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,imgnm,type,help from tbldatingpackagefeaturedmaster where CurrentStatus =0 and id=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];
		$imgnm = $rs[1];
		$type= $rs[2];
		$help = $rs[3];
		
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript src='../scripts/innovaeditor.js'></script>
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
			<h1 class="pagetitle">Add Package Feature</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="package_added">
            <div class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>

<form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal ">

           <input type="hidden" name="type" id="type" value="1"  class="form-control"/>

          <div class="form-group">
                <label>title :</label>
                <input type="text" name="title" id="title" value="<?=$title?>" class="form-control" />
           </div>
           
              <div class="form-group">
               <? if ($imgnm  != "") { ?>
            <img  src="../uploadfiles/<?= $imgnm ?>" height=80 width=80 align="absmiddle">
			<? } ?>
              </div>
          
          
           <div class="form-group">
                <label>Image :</label>
                <input type="file" name="imgnm" id="imgnm" value="" class="form-control" />
           </div>
          
          <div class="form-group">
                <label>Help :</label>
                <input type="text" name="help" id="help" value="<?=$help?>" class="form-control" />
           </div>

     

         <div class="form-group common_button">
         <input name="Submit" type="submit" class="btn"title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
   
    </form>
     
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $packagemaster_help ?></div>
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
