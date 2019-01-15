<? include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".updateprofile2.php")){	

	include($sitethemefolder.".updateprofile2.php");
} else {

	include("default.updateprofile2.php");
}