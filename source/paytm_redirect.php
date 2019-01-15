<?
 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".paytm_redirect.php")){	
	include($sitethemefolder.".paytm_redirect.php");
} else {
	include("default.paytm_redirect.php");
}
