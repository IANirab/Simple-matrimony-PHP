<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".dashboard_stats1.php")){	
	include($sitethemefolder.".dashboard_stats1.php");
} else {
	include("default.dashboard_stats1.php");
}