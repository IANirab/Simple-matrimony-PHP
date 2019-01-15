<? 

include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".updateprofile2insert.php")){	
	include($sitethemefolder.".updateprofile2insert.php");
} else {
	include("default.updateprofile2insert.php");
}