<? include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".displayprofile.php")){	
	include($sitethemefolder.".displayprofile.php");
} else {
	include("default.displayprofile.php");
}
