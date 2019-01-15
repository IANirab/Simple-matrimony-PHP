<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".searchgrid_design.php")){	
	include($sitethemefolder.".searchgrid_design.php");
} else {
	include("default.searchgrid_design.php");
}