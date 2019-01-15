<? 
include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".plugin.updateprofileintrest.php")){	
	include($sitethemefolder.".plugin.updateprofileintrest.php");
} else {
	include("default.plugin.updateprofileintrest.php");
}