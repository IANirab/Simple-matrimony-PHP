<?
 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".payumoney.php")){	
	include($sitethemefolder.".payumoney.php");
} else {
	include("default.payumoney.php");
}


