<? 
global $sitethemefolder;
global $sourcepath;
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".iconcommon.php")){	
	include($sitethemefolder.".iconcommon.php");
} else {
	include("default.iconcommon.php");
}