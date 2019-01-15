<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".homeregistrationsubmit.php")){
	include($sitethemefolder.".homeregistrationsubmit.php");
} else {
	include("default.homeregistrationsubmit.php");
}?>