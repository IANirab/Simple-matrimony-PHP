<? 
include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".plugin.updateprofilecontact.php")){	
	include($sitethemefolder.".plugin.updateprofilecontact.php");
} else {
	include("default.plugin.updateprofilecontact.php");
}