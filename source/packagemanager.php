<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".packagemanager.php")){
	include($sitethemefolder.".packagemanager.php");
} else {
	include("default.packagemanager.php");
}