<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".professional.php")){	
	include($sitethemefolder.".professional.php");
} else {
	include("default.professional.php");
}