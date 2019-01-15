<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".top.php")){
	include($sitethemefolder.".top.php");
} else {
	include("default.top.php");
}

