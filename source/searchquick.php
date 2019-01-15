<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".searchquick.php")){	
	include($sitethemefolder.".searchquick.php");
} else {
	include("default.searchquick.php");
}