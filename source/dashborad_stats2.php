<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".dashborad_stats2.php")){	
	include($sitethemefolder.".dashborad_stats2.php");
} else {
	include("default.dashborad_stats2.php");
}