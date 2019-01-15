<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".testimonialdetail.php")){	
	include($sitethemefolder.".testimonialdetail.php");
} else {
	include("default.testimonialdetail.php");
}