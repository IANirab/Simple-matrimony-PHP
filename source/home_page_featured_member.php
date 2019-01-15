<? 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".home_page_featured_member.php")){	
	include($sitethemefolder.".home_page_featured_member.php");
} else {
	include("default.home_page_featured_member.php");
}