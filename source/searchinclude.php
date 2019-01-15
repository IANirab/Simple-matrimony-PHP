<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".searchinclude.php")){	
	include($sitethemefolder.".searchinclude.php");
} else {
	include("default.searchinclude.php");
}