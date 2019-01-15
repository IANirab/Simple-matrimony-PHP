<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".dashboard.data.php")){	
	include($sitethemefolder.".dashboard.data.php");
} else {
	include("default.dashboard.data.php"); //version 1
    //  include("default.dashboard.data.ver2.php"); //version 2
}