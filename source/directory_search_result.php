<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".directory_search_result.php")){	
	include($sitethemefolder.".directory_search_result.php");
} else {
	include("default.directory_search_result.php");
}