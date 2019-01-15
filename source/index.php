<? 
include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".index.php")){	
	include($sitethemefolder.".index.php");
} else {
	include("default.index.php");
//include("mayank.default.index.php");
}