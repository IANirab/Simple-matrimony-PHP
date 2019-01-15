<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".announcement.php")){	
	include($sitethemefolder.".announcement.php");
} else {
	include("default.announcement.php");
}