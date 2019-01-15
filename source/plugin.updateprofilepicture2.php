<? 
include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".plugin.updateprofilepicture2.php")){	
	include($sitethemefolder.".plugin.updateprofilepicture2.php");
} else {
	include("default.plugin.updateprofilepicture2.php");
}