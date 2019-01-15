<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".enhance_packagemanager.php")){
	include($sitethemefolder.".enhance_packagemanager.php");
} else {
	include("default.enhance_packagemanager.php");
	//include("coding/packagemanager.php");
}