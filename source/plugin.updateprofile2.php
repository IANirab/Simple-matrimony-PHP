<? 
include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".plugin.updateprofile2.php")){	
	include($sitethemefolder.".plugin.updateprofile2.php");
} else {
	include("default.plugin.updateprofile2.php");
}