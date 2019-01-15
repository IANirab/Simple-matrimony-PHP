<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".advancesearch.php")){	
	include($sitethemefolder.".advancesearch.php");
} else {
	include("default.advancesearch.php");
}