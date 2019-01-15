<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".membership.php")){
	include($sitethemefolder.".membership.php");
} else {
	include("default.packagemanager.php");
}