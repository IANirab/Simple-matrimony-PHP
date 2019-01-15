<? 
include("commonfile.php");
//echo "source/".$sitethemefolder.".plugin.updateprofileintrest.php"; exit;
if(file_exists("source/".$sitethemefolder.".profilestoplinks.php")){

	include($sitethemefolder.".profilestoplinks.php");
} else {

	include("default.profilestoplinks.php");
}