<? 

include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".updateprofileintrestinsert.php")){	
	include($sitethemefolder.".updateprofileintrestinsert.php");
} else {
	include("default.updateprofileintrestinsert.php");
}