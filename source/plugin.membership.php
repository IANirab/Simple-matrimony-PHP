<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".plugin.membership.php")){
//	echo $sitethemefolder.".plugin.membership.php"; 	
	include($sitethemefolder.".plugin.membership.php");
} else {
	include("default.plugin.membership.php");
}