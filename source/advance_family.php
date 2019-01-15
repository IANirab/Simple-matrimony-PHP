<? 

include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".advance_family.php")){	

	include($sitethemefolder.".advance_family.php");
} else {

	include("default.advance_family.php");
}