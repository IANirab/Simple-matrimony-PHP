<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".plugin.searchgrid.php")){	
	include($sitethemefolder.".plugin.searchgrid.php");
} else {
	include("default.plugin.searchgrid.php");
}