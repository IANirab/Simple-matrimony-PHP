<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".footer.php")){	
	include($sitethemefolder.".footer.php");
} else {
	include("default.footer.php");
}