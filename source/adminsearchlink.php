<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".adminsearchlink.php")){	
	include($sitethemefolder.".adminsearchlink.php");
} else {
	include("default.adminsearchlink.php");
}