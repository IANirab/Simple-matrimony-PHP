<? 
include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".plugin.updateprofile3.php")){	
	include($sitethemefolder.".plugin.updateprofile3.php");
} else {
	include("default.plugin.updateprofile3.php");
}