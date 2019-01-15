<?
 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".paytm.php")){	
	include($sitethemefolder.".paytm.php");
} else {
	include("default.paytm.php");
}