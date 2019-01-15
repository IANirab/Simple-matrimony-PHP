<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".plugin.displayprofile.php")){
	//echo $sitethemefolder.".plugin.displayprofile.php";	
	include($sitethemefolder.".plugin.displayprofile.php");
} else {
	include("default.plugin.displayprofile.php");
}