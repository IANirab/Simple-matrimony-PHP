<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".plugin.enhance_packagemanager.php")){	
	include($sitethemefolder.".plugin.enhance_packagemanager.php");
} else {
	include("default.plugin.enhance_packagemanager.php");
}