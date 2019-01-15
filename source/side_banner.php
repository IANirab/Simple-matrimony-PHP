<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".side_banner.php")){	
	include($sitethemefolder.".side_banner.php");
} else {
	include("default.side_banner.php");
}