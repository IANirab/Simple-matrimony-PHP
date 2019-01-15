<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".searchresult.php")){	
	include($sitethemefolder.".searchresult.php");
} else {
	include("default.searchresult.php");
}