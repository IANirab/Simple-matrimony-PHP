<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".plugin.searchresult.php")){	
	include($sitethemefolder.".plugin.searchresult.php");
} else {
	include("default.plugin.searchresult.php");
}