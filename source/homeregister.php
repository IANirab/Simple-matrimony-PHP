<? 
include("commonfile.php");
//$sitethemefolder.".homeregister.php";
if(file_exists("source/".$sitethemefolder.".homeregister.php")){	
	include($sitethemefolder.".homeregister.php");
} else {
include("default.homeregister.php");
}