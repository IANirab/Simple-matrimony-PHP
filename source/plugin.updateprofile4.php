<? 
include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".plugin.updateprofile4.php")){	
	include($sitethemefolder.".plugin.updateprofile4.php");
} else {
	include("default.plugin.updateprofile4.php");
}