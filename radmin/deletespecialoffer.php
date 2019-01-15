<?php 
session_start();
ob_start();
require_once("../dbinclude/function.php");
$filenm = "deletespecialoffer.php";
$action = commonfordelete("tblscspecialoffermaster","specialofferid","specialoffermanager");
?>
<html>
<head>
<title><?= $websiteadmintitle ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="adminstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
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
			<div id="pagetitle"><h1>Confirm Delete</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<form name =frmdocument method=post action ="<?= $filenm ?>?b=<?= $action ?>">
          <input type="hidden" name="txtdelete" value ="Y">


<input name="Submit" type="submit" class="admindelbtn" value="Are You Sure You Want To Delete" alt="Are You Sure You Want To Delete" title="Are You Sure You Want To Delete"> 
            
        </form>
<p>&nbsp;</p>
			
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
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