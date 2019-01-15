<? 
include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".plugin.updateprofilepersonal.php")){	
	include($sitethemefolder.".plugin.updateprofilepersonal.php");
} else {
	include("default.plugin.updateprofilepersonal.php");
}