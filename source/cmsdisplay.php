<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".cmsdisplay.php")){
	include($sitethemefolder.".cmsdisplay.php");
} else {

	include("default.cmsdisplay.php");
}