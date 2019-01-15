<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".dashboard.php")){	
	include($sitethemefolder.".dashboard.php");
} else {
	include("default.dashboard.php");
}