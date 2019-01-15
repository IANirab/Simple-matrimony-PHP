<? 
include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".plugin.partnerprofile.php")){	
	include($sitethemefolder.".plugin.partnerprofile.php");
} else {
	include("default.plugin.partnerprofile.php");
}