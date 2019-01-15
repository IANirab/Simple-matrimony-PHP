<? 

include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".advance_family.php")){	

	include($sitethemefolder.".advance_family_delete.php");
} else {

	include("default.advance_family_delete.php");
}