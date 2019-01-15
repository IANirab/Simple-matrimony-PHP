<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".plugin.packagemanager.php")){	
	include($sitethemefolder.".plugin.packagemanager.php");
} else {
	include("default.plugin.packagemanager.php");
}