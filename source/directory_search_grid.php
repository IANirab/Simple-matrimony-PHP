<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".directory_search_grid.php")){	
	include($sitethemefolder.".directory_search_grid.php");
} else {
	include("default.directory_search_grid.php");
}