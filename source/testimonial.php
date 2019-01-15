<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".testimonial.php")){	
	include($sitethemefolder.".testimonial.php");
} else {
	include("default.testimonial.php");
}